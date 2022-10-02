<?php

use App\Http\Controllers\Api\ProposalController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use App\Models\Client;
use App\Models\SubDistrict;
use App\Models\Proposal;
use App\Models\User;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('client/{id}/account', function ($id) {
        $client = Client::with('subdistrict', 'subdistrict.district')->find($id);
        if (!$client) return response()->json(['message' => "data tidak ditemukan!"], 404);
        return response()->json($client, 200);
    });

    Route::delete('proposal/{id}/delete', [ProposalController::class, 'destroy']);

    Route::post('proposal/create', [ProposalController::class, 'store']);

    Route::get('users/{districtID}', function ($districtID) {
        $users = User::with('areaOfElection:area_of_elections.id,name', 'fraction')->isNotAdmin()->districtID($districtID)->get();
        return response()->json($users);
    });

    Route::get('client/proposals/{clientID}', function ($clientID) {

        $proposals = Proposal::whereHas("client", function ($query) use ($clientID) {
            $query->where('id', $clientID);
        })->latest()->get();
        return response()->json($proposals, 200);
    });

    Route::get('client/{clientID}/home', function ($clientID = null) {

        $latestProposals = Proposal::with('users')->whereHas('client', function ($query) use ($clientID) {
            $query->where('id', $clientID);
        })->latest()->limit(7)->get();

        $totalProposal = Client::select('name')->withCount('proposals')->find($clientID);
        $totalDraft = Client::select('name')->withCount(['proposals' => function ($query) {
            $query->draft();
        }])->find($clientID);
        $totalSent = Client::select('name')->withCount(['proposals' => function ($query) {
            $query->draft(0);
        }])->find($clientID);
        return response()->json(["totalProposal" => $totalProposal->proposals_count, "totalDraft" => $totalDraft->proposals_count, "totalSent" => $totalSent->proposals_count, "latestProposals" => $latestProposals]);
    });
    // TODO: Change edit proposal http method, it should be http put method right?
    Route::put('proposals/{proposalID}/edit', function (Request $request, $proposalID) {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category' => ['required', Rule::in(['BANSOS', 'SAPRAS', 'JALAN', 'BANGUNAN', 'SALURAN', 'LAINNYA'])],
            'address' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'unit' => 'required|max:20',
            'is_draft' => 'boolean',
            'client_id' => 'required|integer|numeric',
            'user_ids' => 'required|array'
        ]);
        $proposal = Proposal::find($proposalID);
        $proposal->title = $validatedData['title'];
        $proposal->description = $validatedData['description'];
        $proposal->address = $validatedData['address'];
        $proposal->category = $validatedData['category'];
        $proposal->latitude = $validatedData['latitude'];
        $proposal->longitude = $validatedData['longitude'];
        $proposal->quantity = $validatedData['quantity'];
        $proposal->unit = $validatedData['unit'];
        $proposal->is_draft = $validatedData['is_draft'];

        $client = Client::find($validatedData['client_id']);

        $proposal->client()->associate($client);

        if (!$proposal->save()) return response()->json(['messages' => 'Gagal Mengubah Data!'], 409);
        $proposal->users()->attach($validatedData['user_ids']);
        return response()->json(['message' => 'Berhasil mengubah data usulan!'], 200);
    });
});
Route::put('change-device', function (Request $request) {
    $validatedData = $request->validate([
        'nik' => 'required|max:20',
        'phone_name' => 'required',
        'security_answer' => 'required|string',
    ]);
    $client = Client::where('nik', $request->nik)->first();
    if (!$client) {
        throw ValidationException::withMessages([
            'nik' => ['Identitas yang di masukkan salah!.'],
        ]);
    }
    if ($validatedData['security_answer'] != strtolower($client->security_answer)) {
        throw ValidationException::withMessages([
            'security_answer' => ['Jawaban pertanyaan keamanan salah.'],
        ]);
    }
    $client->security_answer = $validatedData['security_answer'];
    $client->phone_name = $validatedData['phone_name'];
    $client->save();
    return response()->json(['message' => "berhasil mengganti jenis hp digunakan dengan nik $validatedData[nik]"], 200);
});
// TODO: Get the mobile application id before registration to make sure security
Route::post('registration', [ClientController::class, 'store']);
Route::post('login', function (Request $request) {

    $request->validate([
        'nik' => 'required|max:20',
        'phone_name' => 'string|nullable'
    ]);

    $client = Client::where('nik', $request->nik)->first();

    if (!$client) {
        throw ValidationException::withMessages([
            'nik' => ['Identitas yang di masukkan salah!.'],
        ]);
    }
    /**
     * Client login ke aplikasi
     * 1. pertama kali daftar
     * 2. sudah daftar tidak ada token
     */
    if ($client->phone_name !== $request->phone_name) return response()->json([
        'message' => "NIK $request->nik sudah login dengan hp lain"
    ], 403);

    $client->tokens()->delete();

    $token = $client->createToken($request->phone_name)->plainTextToken;

    return response()->json([
        'message' => 'Berhasil login!',
        'token' => $token,
        'client' => $client,
        'district' => $client->district()
    ], 200);
});

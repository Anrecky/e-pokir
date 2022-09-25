<?php

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


    Route::delete('proposal/{proposal}/delete', function (Proposal $proposal) {
        try {
            // if ($proposal->delete() == null) return response()->json(['message' => 'Data proposal tidak ditemukan!'], 404);
            if ($proposal->delete()) return response()->json(['message' => 'Berhasil menghapus data usulan!'], 200);
            return response()->json(['message' => 'Gagal menghapus data'], 404);
        } catch (\Throwable $e) {
            return response()->json(json_encode($e));
        }
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/proposal/create', function (Request $request) {
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
            'user_id' => 'required|integer|numeric'
        ]);
        $proposal = new Proposal;
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
        $user = User::find($validatedData['user_id']);

        $proposal->client()->associate($client);
        $proposal->user()->associate($user);

        if (!$proposal->save()) return response()->json(['messages' => 'Gagal Mengirim Data!'], 409);
        return response()->json(['message' => 'Berhasil mengajukan usulan!'], 201);
    });

    Route::get('/users/{district}', function ($district = null) {
        $users = User::whereDistrict($district)->get();
        return response()->json($users);
    });

    Route::get('/client/proposals/{clientID}', function ($clientID) {

        $proposals = Proposal::whereHas("client", function ($query) use ($clientID) {
            $query->where('id', $clientID);
        })->latest()->get();
        return response()->json($proposals, 200);
    });

    Route::get('/client/{clientID}/home-resource', function ($clientID = null) {

        $latestProposals = Proposal::whereHas('client', function ($query) use ($clientID) {
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
    Route::post('/proposals/{proposalID}/edit', function (Request $request, $proposalID) {

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
            'user_id' => 'required|integer|numeric'
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
        $user = User::find($validatedData['user_id']);

        $proposal->client()->associate($client);
        $proposal->user()->associate($user);

        if (!$proposal->save()) return response()->json(['messages' => 'Gagal Mengubah Data!'], 409);
        return response()->json(['message' => 'Berhasil mengubah data usulan!'], 200);
    });
});



// TODO: Get the mobile application id before registration to make sure security
Route::post('/registration', [ClientController::class, 'store']);
Route::post('/sanctum/token', function (Request $request) {

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

    $client->tokens()->delete();

    $token = $client->createToken($request->phone_name)->plainTextToken;

    return response()->json([
        'message' => 'Berhasil login!',
        'token' => $token,
        'client' => $client,
        'district' => $client->district()

    ], 200);
});

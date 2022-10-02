<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\User;
use App\Models\Proposal;
use Illuminate\Validation\Rule;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $proposal->client()->associate($client);

        if (!$proposal->save()) return response()->json(['message' => 'Gagal Mengirim Data!'], 409);
        $proposal->users()->attach($validatedData['user_ids']);
        return response()->json(['message' => 'Berhasil mengajukan usulan!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::find($id);
        if ($proposal->delete()) return response()->json(['message' => 'Berhasil menghapus data usulan!'], 200);
        return response()->json(['message' => 'Gagal menghapus data'], 404);
    }
}

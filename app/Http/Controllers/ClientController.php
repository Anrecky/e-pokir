<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class ClientController extends Controller
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
            'nik' => 'required|max:20|unique:App\Models\Client,nik',
            'name' => 'required|string|max:90',
            'street_name' => 'required',
            'phone_name' => 'nullable',
            'sub_district_name' => 'string|required',
        ]);

        $subDistrict = SubDistrict::where('name', $validatedData['sub_district_name'])->first();

        $client = new Client;
        $client->nik = $validatedData['nik'];
        $client->name = $validatedData['name'];
        $client->street_name = $validatedData['street_name'];
        $client->phone_name = $validatedData['phone_name'];
        $client->subDistrict()->associate($subDistrict);
        $client->save();

        return response()->json(["message" => "Berhasil melakukan pendaftarkan dengan NIK: $client->nik"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

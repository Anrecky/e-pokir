<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render("Proposal", [
            'proposals' => Proposal::with('users.fraction')->paginate($request->paginate ?? 10),
            'paginateNumber' => $request->paginate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        $proposal->load('users:users.id');
        $proposal->load('client.subdistrict');
        $users = User::isNotAdmin()->districtID($proposal->client->subdistrict->district_id)->get();
        return Inertia::render("EditProposal", [
            'proposal' => $proposal,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
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
            'users' => 'required|array'
        ]);

        $proposal->title = $validatedData['title'];
        $proposal->description = $validatedData['description'];
        $proposal->address = $validatedData['address'];
        $proposal->category = $validatedData['category'];
        $proposal->latitude = $validatedData['latitude'];
        $proposal->longitude = $validatedData['longitude'];
        $proposal->quantity = $validatedData['quantity'];
        $proposal->unit = $validatedData['unit'];

        if (!$proposal->save()) return redirect()->back();
        $proposal->users()->sync(Arr::pluck($validatedData['users'], 'id'));
        return redirect()->route('proposals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}

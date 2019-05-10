<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Http\Requests\StoreVoterPost;
use App\Http\Requests\UpdateVoterPatch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = auth()->user()->organization->voters()->paginate(20);
        return view('voters.index', compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoterPost $request)
    {
        $validated = $request->validated();

        $voter = auth()->user()->organization->voters()->create($validated);

        return redirect()->route('voters.show', $voter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        abort_unless($voter->organization->is(auth()->user()->organization), 403);
        return view('voters.show', compact('voter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        abort_unless($voter->organization->is(auth()->user()->organization), 403);
        return view('voters.edit', compact('voter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoterPatch $request, Voter $voter)
    {
        abort_unless($voter->organization->is(auth()->user()->organization), 403);
        $organization = auth()->user()->organization->id;

        $validated = $request->validated();

        $voter->update($validated);

        return redirect()->route('voters.show', $voter->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        //
    }
}

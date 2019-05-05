<?php

namespace App\Http\Controllers;

use App\Voter;
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
    public function store(Request $request)
    {
        $organization = auth()->user()->organization->id;

        $request->validate([
            'identity' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('identity', $request->get('identity'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'name' => 'required',
            'email' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('email', $request->get('email'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'phone_number' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('phone_number', $request->get('phone_number'))
                                 ->where('organization_id', $organization);
                }),
            ],
        ]);

        $voter = auth()->user()->organization->voters()->create($request->all());

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
    public function update(Request $request, Voter $voter)
    {
        abort_unless($voter->organization->is(auth()->user()->organization), 403);
        $organization = auth()->user()->organization->id;

        $request->validate([
            'identity' => [
                'required',
                'unique' => Rule::unique('voters')->ignore($voter)->where(function($query) use ($request, $organization) {
                    return $query->where('identity', $request->get('identity'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'name' => 'required',
            'email' => [
                'required',
                'unique' => Rule::unique('voters')->ignore($voter)->where(function($query) use ($request, $organization) {
                    return $query->where('email', $request->get('email'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'phone_number' => [
                'required',
                'unique' => Rule::unique('voters')->ignore($voter)->where(function($query) use ($request, $organization) {
                    return $query->where('phone_number', $request->get('phone_number'))
                                 ->where('organization_id', $organization);
                }),
            ],
        ]);

        $voter->update($request->all());

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

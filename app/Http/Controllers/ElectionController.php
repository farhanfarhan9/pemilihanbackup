<?php

namespace App\Http\Controllers;

use App\Election;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreElectionPostRequest;
use App\Organization;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = auth()->user()->organization->elections()->paginate(9);
        return view('elections.index', compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectionPostRequest $request)
    {
        dd($request);
        $validate = $request->validated();
        $election = auth()->user()->organization->elections()
                                 ->create($validate);

        $voters = auth()->user()->organization->voters->pluck('id');
        $election->voters()->attach($voters, ['status' => true]);

        return redirect()->route('elections.show', $election->hash_id)
                         ->with('success', 'Berhasil menambahkan pemilihan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        abort_unless($election->organization->is(auth()->user()->organization), 403);
        $election->loadCount([
            'candidates',
            'voters',
            'voters as voters_active_count' => function ($query) {
                $query->selectRaw('count(voters.id) as aggregate')->where('status', 1);
            },
            'voters as voters_inactive_count' => function ($query) {
                $query->selectRaw('count(voters.id) as aggregate')->where('status', 0);
            }
        ]);

        return view('elections.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        abort_unless($election->organization->is(auth()->user()->organization), 403);
        return view('elections.edit', compact('election'));
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
        $election = \App\Election::findOrFail($id);

        $election->name = $request->get('name');
        $election->registration_opened_on = $request->get('registration_opened_on');
        $election->registration_closed_on = $request->get('registration_closed_on');
        $election->voting_starts_on = $request->get('voting_starts_on');
        $election->voting_ends_on = $request->get('voting_ends_on');
        $election->save();
        return redirect()->route('elections.index')->with('status', 'Berhasil mengubah pemilihan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Election $election)
    {
        abort_unless($election->organization->is(auth()->user()->organization), 403);

        if ($election->hash_id != $request->election_id)
            return redirect()->route('elections.show', $election->hash_id)->with('error', 'Gagal menghapus pemilihan');

        $election->delete();
        return redirect()->route('elections.index')->with('status', 'Berhasil menghapus pemilihan');
    }

    /**
     * Show voters belongs to the election
     * @param  Election $election
     * @return \Illuminate\Http\Response
     */
    public function voters(Election $election)
    {
        abort_unless($election->organization->is(auth()->user()->organization), 403);
        $voters = $election->voters()->withPivot('status')->simplePaginate(20);
        return view('elections.voters', compact('election', 'voters'));
    }

    /**
     * Update status of election voters
     * @param  Request  $request
     * @param  Election $election
     * @param  int  $voter
     * @return null
     */
    public function updateVoters(Request $request, Election $election, $voter)
    {
        abort_unless($election->organization->is(auth()->user()->organization), 403);
        $voter = $election->voters()->withPivot('status')->findOrFail($voter);
        $election->voters()->updateExistingPivot($voter->id, [
            'status' => !$voter->pivot->status
        ]);
    }
}

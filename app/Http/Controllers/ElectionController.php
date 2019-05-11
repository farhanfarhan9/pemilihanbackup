<?php

namespace App\Http\Controllers;

use App\Election;
use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'registration_opened_on' => 'required',
            'registration_closed_on' => 'required',
            'voting_starts_on' => 'required',
            'voting_ends_on' => 'required',
        ]);

        $election = auth()->user()->organization->elections()
                                 ->create($request->all());

        return redirect()->route('elections.show', $election->id)
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
        return view('elections.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $election = \App\Election::findOrFail($id);
        return view('elections.edit', ['election'=>$election]);
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
        $updated=$request->validate([
            'name' => 'required',
            'registration_opened_on' => 'required',
            'registration_closed_on' => 'required',
            'voting_starts_on' => 'required',
            'voting_ends_on' => 'required',
        ]);
        $election->update($updated);
        return redirect()->route('elections.index')->with('status', 'Berhasil mengubah pemilihan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = \App\Election::findOrFail($id);
        $election->delete();
        return redirect()->route('elections.index')->with('status', 'Berhasil menghapus pemilihan');
    }
}

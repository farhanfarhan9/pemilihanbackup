<?php

namespace App\Http\Controllers\Admin\Organization;
use App\Http\Controllers\Controller;
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
        $elections = \App\Election::paginate(10);
        return view('Organizations.organization.index',['elections'=>$elections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Organizations.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $election = new \App\Election;
        $election->organization_id = \Auth::user()->organization_id;
        $election->name = $request->get('name');
        $election->registration_opened_at = $request->get('registration_opened_at');
        $election->registration_ends_at = $request->get('registration_ends_at');
        $election->voting_starts_at = $request->get('voting_starts_at');
        $election->voting_closed_on = $request->get('voting_closed_on');
        $election->save();
        return redirect()->route('admin.elections.index')->with('status','Berhasil menambahkan pemilihan');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $election = \App\Election::findOrFail($id);
        return view('Organizations.organization.edit',['election'=>$election]);
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
        $election->registration_opened_at = $request->get('registration_opened_at');
        $election->registration_ends_at = $request->get('registration_ends_at');
        $election->voting_starts_at = $request->get('voting_starts_at');
        $election->voting_closed_on = $request->get('voting_closed_on');
        $election->save();
        return redirect()->route('admin.elections.index')->with('status','Berhasil mengubah pemilihan');
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
        return redirect()->route('admin.elections.index')->with('status', 'Berhasil menghapus pemilihan');
    }
}

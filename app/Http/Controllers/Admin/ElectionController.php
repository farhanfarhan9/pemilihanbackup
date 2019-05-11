<?php

namespace App\Http\Controllers\Admin;
use App\Election;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elections = \App\Election::where('organization_id',$id)->paginate(20);
        return view('admin.elections.show', ['elections'=>$elections]);
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
        return view('admin.elections.edit', ['election'=>$election]);
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
        return redirect()->route('admin.elections.show',['election'=>$election])->with('status', 'Berhasil mengubah pemilihan');
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
        $delete = \App\Election::findOrFail($id);
        $delete->delete();
        return redirect()->route('admin.elections.show',['election'=>$election]);
    }
}

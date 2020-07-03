<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Played;
use App\Track;
class PlayedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $played['played'] = Played::all(); 
        return view('played.index')->with($played);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $played['track']=Track::all();
        return view ('played.create')->with($played);
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
            'track_id'=> 'required',
            'play_date'=> 'required',
    ],[
        'track_id' => 'Nama Artis tidak boleh kosong',
        'play_date' => 'Nama Album tidak boleh kosong'
    ]);
        $played = new Played;
        $played->track_id = $request->input('track_id');
        $played->play_date = $request->input('play_date');
        $played->save();
        return redirect('/played')->with('success', 'Data berhasil ditambah');
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
        $played['played'] = Played::find($id);
        $played['track'] = Track::all();
        return view('played.edit')->with($played);
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
        $request->validate([
            'track_id'=> 'required',
            'play_date'=> 'required',
    ],[
        'track_id' => 'Nama Artis tidak boleh kosong',
        'play_date' => 'Nama Album tidak boleh kosong'
    ]);
        $played = Played::find($id);
        $played->track_id = $request->input('track_id');
        $played->play_date = $request->input('play_date');
        $played->save();
        return redirect('/played')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $played=Played::find($id);
        $played->delete();
        return redirect('/played')->with('success', 'Data berhasil dihapus');
    }
}

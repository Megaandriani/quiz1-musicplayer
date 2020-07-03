<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist = Artist::all();
        return view('artist.index',compact('artist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input('artist_name');
        $request->validate([
            'artist_name'=> 'required|min:2',
    ],[
        'artist_name.required' => 'Nama Artis Tidak boleh kosong'
    ]);
        
        $artist = new Artist([
            'artist_name'=>$request->input('artist_name')
        ]);
        $artist->save();
        return redirect('/artist')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artists = Artist::find($id);
        return view('artist.edit', compact('artists'));
        // return $id;
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
        $artist=Artist::find($id);
        $artist->artist_name=$request->input('artist_name');
        $artist->save();
        return redirect('/artist')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();
        return redirect('/artist')->with('success', 'Data berhasil dihapus');
    }
}

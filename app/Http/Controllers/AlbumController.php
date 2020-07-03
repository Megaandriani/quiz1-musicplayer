<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Album;
use App\Artist;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album['album'] = Album::all(); 
        return view('album.index')->with($album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album['artist']=Artist::all();
        return view ('album.create')->with($album);
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
            'artist_id'=> 'required',
            'album_name'=> 'required',
    ],[
        'artist_id' => 'Nama Artis tidak boleh kosong',
        'album_name' => 'Nama Album tidak boleh kosong'
    ]);
        $album = new Album;
        $album->artist_id = $request->input('artist_id');
        $album->album_name = $request->input('album_name');
        $album->save();
        return redirect('/album')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $album['album'] = Album::find($id);
        $album['artist'] = Artist::all();
        return view('album.edit')->with($album);
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
            'artist_id'=> 'required',
            'album_name'=> 'required',
    ],[
        'artist_id' => 'Nama Artis tidak boleh kosong',
        'album_name' => 'Nama Album tidak boleh kosong'
    ]);
        $album = Album::find($id);
        $album->artist_id = $request->input('artist_id');
        $album->album_name = $request->input('album_name');
        $album->save();
        return redirect('/album')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::find($id);
        $album->delete();
        return redirect('/album')->with('success', 'Data berhasil dihapus');
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
    
}

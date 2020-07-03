<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;
use App\Album;
use App\Track;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $track['track'] = Track::all(); 
        return view('track.index')->with($track);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $track['artist'] = Artist::all();
       $track['album'] = Album::all();
       return view('track.create')->with($track);
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
            'track_name'=> 'required',
            'artist_id'=> 'required',
            'album_id'=> 'required',
            'track_file'=> 'required',
            'track_time'=> 'required',
    ],[
        'track_name' => 'Judul Lagu tidak boleh kosong',
        'artist_id' => 'Nama Artis tidak boleh kosong',
        'album_id' => 'Nama Album tidak boleh kosong',
        'track_file' => 'File tidak boleh kosong',
        'track_time' => 'Durasi tidak boleh kosong'
    ]);
        $track = new Track;
        $track->track_name = $request->input('track_name');
        $track->artist_id = $request->input('artist_id');
        $track->album_id = $request->input('album_id');
        $track_file = $request->file('track_file');
        $track->track_file = $track_file->getClientOriginalName();
        $track_file->move(public_path('music_mp3'), $track_file->getClientOriginalName());
        $track->track_time = $request->input('track_time');
        $track->save();
        return redirect('track')->with('status', 'Data Berhasil Ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track['track'] = Track::find($id);
        $track['artist'] = Artist::all();
        $track['album'] = Album::all();
        return view('track.edit')->with($track);
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
            'track_name'=> 'required',
            'artist_id'=> 'required',
            'album_id'=> 'required',
            'track_file'=> 'required',
            'track_time'=> 'required',
    ],[
        'track_name' => 'Judul Lagu tidak boleh kosong',
        'artist_id' => 'Nama Artis tidak boleh kosong',
        'album_id' => 'Nama Album tidak boleh kosong',
        'track_file' => 'File tidak boleh kosong',
        'track_time' => 'Durasi tidak boleh kosong'
    ]);
        $track = Track::find($id);
        $track->track_name = $request->input('track_name');
        $track->artist_id = $request->input('artist_id');
        $track->album_id = $request->input('album_id');
        $track_file = $request->file('track_file');
        $track->track_file = $track_file->getClientOriginalName();
        $track_file->move(public_path('music_mp3'), $track_file->getClientOriginalName());
        $track->track_time = $request->input('track_time');
        $track->save();
        return redirect('track')->with('status', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track=Track::find($id);
        $track->delete();
        return redirect('/track')->with('success', 'Data berhasil dihapus');
    }
}

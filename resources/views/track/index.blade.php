@extends('layouts.app')
@section('content')

<div class="container">
 
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">
                    <h2>Data Lagu</h2>
                </div>
                <a href="{{ url("/track/create") }}" class="btn btn-success">Tambah data</a>
                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session()->get('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    <div class="text-center">
                        
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>                
                                <th>Judul Lagu</th>
                                <th>Nama Artis</th>
                                <th>Nama Album</th>
                                <th>Lagu</th>
                                <th>Durasi</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($track as $item)
                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->track_name }}</td>
                                <td>{{ $item->artist->artist_name }}</td>
                                <td>{{ $item->album->album_name }}</td>  
                                <td>
                                    <audio controls>
                                        <source src="music_mp3/{{ $item->track_file }} " type="audio/mpeg" >
                                    </audio>
                                    
                                </td>  
                                <td>{{ $item->track_time }}</td>  
                            <td>
                                <a class="btn btn-primary" href="{{ url("/track/{$item->track_id}/edit") }}">Edit</a>
                                
                            </td>
            
                            <td>
                                <form action="{{url ("track/{$item->track_id}")}}" method="post"
                                    onsubmit="return confirm('Yakin Hapus Data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


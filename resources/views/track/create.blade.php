@extends('layouts.app')
@section('content')


<div class="container">
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Lagu</h2>
                </div>
                
                <div class="card-body">
                        <form action="{{ url("/track") }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="album_name">Judul Lagu</label>
                                        <input class="form-control @error('track_name') is-invalid @enderror" type="text" name="track_name">
                                        @error('track_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>   
                                        @enderror
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="artist_name">Nama Artis</label>
                                    
                                        <select name="artist_id" id="artist_id" type="text" class="form-control" required>
                                            <option value="">-Pilih Nama Artis-</option>
                                            @foreach ($artist as $item)
                                        <option value="{{$item->artist_id}}">{{$item->artist_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="album_name">Nama Album</label>
                                    
                                        <select name="album_id" id="album_id" type="text" class="form-control" required>
                                            <option value="">-Pilih Nama Album-</option>
                                            @foreach ($album as $item)
                                        <option value="{{$item->album_id}}">{{$item->album_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    {{--  <input class="form-control" type="text" name="artist_name">  --}}
                                </div>
                                <div class="form-group">
                                    <label for="track_file">Lagu</label>
                                    <input class="form-control @error('track_name') is-invalid @enderror" type="file" name="track_file"
                                    value="{{old('track_name')}}">
                                    @error('track_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="track_time">Durasi</label>
                                    <input class="form-control @error('track_time') is-invalid @enderror" type="text" name="track_time"
                                    value="{{old('track_time')}}">
                                    @error('track_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>   
                                @enderror
                                </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url("/track") }}" class="btn btn-secondary">Kembali</a>
                            </form> 
      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
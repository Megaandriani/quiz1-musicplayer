@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Lagu</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-sm-2">
                            <form action="{{ url("/track/{$track->track_id}") }}" method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="album_name">Judul Lagu</label>
                                        <input class="form-control @error('track_name') is-invalid @enderror" type="text" name="track_name" value="{{old('track_name', $track->track_name)}}">
                                        @error('track_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                    </div>
                        
                                        <div class="form-group">
                                            <label for="artist_name">Nama Artis</label>
                                        
                                            <select name="artist_id" id="artist_id" type="text" class="form-control" required>
                                                <option value="{{$track->artist->artist_id}}" selected>{{$track->artist->artist_name}}</option>
                                                @foreach ($artist as $item)
                                            <option value="{{$item->artist_id}}">{{$item->artist_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="album_name">Nama Album</label>
                                        
                                            <select name="album_id" id="album_id" type="text" class="form-control" required>
                                                <option value="{{$track->album->album_id}}" selected>{{$track->album->album_name}}</option>
                                                @foreach ($album as $item)
                                            <option value="{{$item->album_id}}">{{$item->album_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        {{--  <input class="form-control" type="text" name="artist_name">  --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="track_file">Lagu</label>
                                        
                                    <input class="form-control @error('track_name') is-invalid @enderror" type="file" name="track_file" value="{{$track->track_file}}" required>
                                    @error('track_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>   
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="track_time">Durasi</label>
                                        
                                        <input class="form-control @error('track_time') is-invalid @enderror" type="text" name="track_time" value="{{old('track_time', $track->track_time)}}">
                                        @error('track_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>   
                                    @enderror
                                    </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ url("/track") }}" class="btn btn-secondary">Kembali</a>
                                </form>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
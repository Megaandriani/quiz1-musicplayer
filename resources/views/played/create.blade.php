@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Putar</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-sm-2">
                            <form action="{{ url("/played") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="track_name">Judul Lagu</label>
                                
                                    <select name="track_id" id="track_name" type="text" class="form-control" required>
                                        <option value="{{old('artist_id')}}">-Pilih Judul Lagu-</option>
                                        @foreach ($track as $item)
                                    <option value="{{$item->track_id}}">{{$item->track_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="play_date">Tanggal Putar</label>
                            <input class="form-control 
                            @error('play_date') is-invalid @enderror" value="{{old('album_name')}}" type="date" name="play_date">
                            @error('play_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>   
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url("/played") }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
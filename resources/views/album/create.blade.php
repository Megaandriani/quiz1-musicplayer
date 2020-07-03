@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Album</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-sm-2">
                            <form action="{{ url("/album") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="artist_name">Nama Artis</label>
                                
                                    <select name="artist_id" id="artist_name" type="text" class="form-control" required>
                                        <option value="{{old('artist_id')}}">-Pilih Nama Artis-</option>
                                        @foreach ($artist as $item)
                                    <option value="{{$item->artist_id}}">{{$item->artist_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="album_name">Nama Album</label>
                            <input class="form-control 
                            @error('album_name') is-invalid @enderror" value="{{old('album_name')}}" type="text" name="album_name">
                            @error('album_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>   
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url("/album") }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Artis</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-sm-2">
                            <form action="{{ url("/artist") }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="artist_name">Nama Artis</label>
                                        <input class="form-control" type="text" name="artist_name">
                                    </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ url("/artist") }}" class="btn btn-secondary">Kembali</a>
                                </form>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
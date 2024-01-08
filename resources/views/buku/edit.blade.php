@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Edit Data</h1>
        <form action="/buku/{{ $buku->id_buku }}" method="post">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="id" name="id_buku" value ="{{ $buku->id_buku }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="judul buku" name="judul_buku" value ="{{ $buku->judul_buku }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="penulis" name="penulis" value ="{{ $buku->penulis }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="penerbit" name="penerbit" value ="{{ $buku->penerbit }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="tahun terbit" name="tahun_terbit" value ="{{ $buku->tahun_terbit }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Genre</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="genre" name="genre" value ="{{ $buku->genre }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jumlah Halaman</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="jumlah halaman" name="jumlah_halaman" value ="{{ $buku->jumlah_halaman }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Synopsis</label>
                <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="synopsis" name="synopsis" value ="{{ $buku->synopsis }}"></textarea>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Stok</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="stok" name="stok" value ="{{ $buku->stok }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Harga</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="harga" name="harga" value ="{{ $buku->harga }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
            </div>
        </form>
    </div>

@endsection
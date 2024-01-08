@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Buku</h1><br>
    <form action="/buku/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">ID</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="id_buku" name="id_buku">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="judul buku" name="judul_buku">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="penulis" name="penulis">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="penerbit" name="penerbit">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="tahun terbit" name="tahun_terbit">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Genre</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="genre" name="genre">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Jumlah Halaman</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="jumlah halaman" name="jumlah_halaman">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Synopsis</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="synopsis" name="synopsis"></textarea>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Stok</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="stok" name="stok">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Harga</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="harga" name="harga">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
        </div>
    </form>
</div>
@endsection
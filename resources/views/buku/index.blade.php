@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buku') }}</div>
                
                <div class="card-body">
                    <a class="btn btn-primary" href="/buku/create">Add buku</a>
                    <table border="1" class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Genre</th>
                        <th>Jumlah Halaman</th>
                        <th>Synopsis</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Waktu Update</th>
                        <th>aksi</th>
                    </tr>
                    @foreach($buku as $b)
                        <tr>
                            <td>{{ $b->id_buku }}</td>
                            <td>{{ $b->judul_buku }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahun_terbit }}</td>
                            <td>{{ $b->genre }}</td>
                            <td>{{ $b->jumlah_halaman }}</td>
                            <td>{{ $b->synopsis }}</td>
                            <td>{{ $b->stok }}</td>
                            <td>{{ $b->harga }}</td>
                            <td>{{ $b->updated_at }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="/buku/{{ $b->id_buku }}/edit/" class="btn btn-warning">edit</a>
                                <form action="/buku/{{ $b->id_buku }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure')" class="btn btn-danger">
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
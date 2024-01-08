@extends('layouts.app')
@section('content')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="card">
    <div class="card-body">
        <form action="/transaksi/store" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="id_buku">Daftar Buku</label>
                    <select class="form-control" id="id_buku">
                        @foreach($daftars as $daftar)
                        <option value="{{ $daftar->id_buku }}" data-judul_buku="{{ $daftar->judul_buku }}" data-harga="{{ $daftar->harga }}" data-id="{{ $daftar->id_buku }}">
                        {{ $daftar->judul_buku }} Rp.{{ number_format($daftar->harga) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah Item</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="transaksiItem">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Jumlah</th>
                            <th class="quantity">0</th>
                            <th class="totalHarga">0</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="total_harga" value="0">
                <button class="btn btn-success">Simpan Transaksi</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script>
        var totalHarga = 0;
        var quantity = 0;
        var listItem = [];

        function tambahItem(){
            updateTotalHarga(parseInt($('#id_buku').find(':selected').data('harga')))
            var item = listItem.filter((el) =>el.id === $('#id_buku').find(':selected').data('id'));
            console.log(item);
            if (item.length > 0){
                item[0].quantity += 1
            }else {
                var item = {
                    id: $('#id_buku').find(':selected').data('id'),
                    judul_buku: $('#id_buku').find(':selected').data('judul_buku'),
                    harga: $('#id_buku').find(':selected').data('harga'),
                    quantity : 1
                }
                listItem.push(item)
            }
            updateQuantity(1)
            updateTable()
        }

        function updateTable(){
            var html = '';
            listItem.map((el, index)=>{
                var harga = formatRupiah(el.harga.toString())
                var quantity = formatRupiah(el.quantity.toString())
                html += `
                <tr>
                    <td>${index +1}</td>
                    <td>${el.judul_buku}</td>
                    <td>${quantity}</td>
                    <td>${harga}</td>
                    <td>
                        <input type="submit" name="id_buku[]" value="${el.id_buku}"    
                        <input type="hidden" name="quantity[]" value="${el.quantity}"
                        <button type="button" onclick="deleteItem(${index})" class="btn btn-link"><i class="fas fa-fw fa-trash text-danger"></i>Delete</button>
                    </td>
                </tr>
                `
            })
            $('.transaksiItem').html(html)
        }

        function deleteItem(index) {
            var item = listItem[index]
            if (item.quantity > 1){
                listItem[index].quantity -= 1
                updateTotalHarga(-(item.harga * item.quantity))
            } else {
                listItem.splice(index, 1)
                updateTotalHarga(-(item.harga * item.quantity)) 
                updateQuantity(-(item.quantity))
            }
            updateTable()
        }

        function updateTotalHarga(nom){
            totalHarga += nom;
            $('[name=total_harga]').val(totalHarga)
            $('.totalHarga').html(totalHarga.toString())
        }
        
        function updateQuantity(nom){
            quantity += nom;
            $('.quantity').html(quantity.toString())
        }
    </script>
    @endsection
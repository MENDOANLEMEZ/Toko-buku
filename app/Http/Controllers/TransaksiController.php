<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\TransaksiItem;
use App\Models\Transaksi;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() 
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index',compact(['transaksi']));
    }
    public function create()
    {
        $daftars = Buku::all();
        return view('transaksi/create', ['daftars' => $daftars]);
    }

    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->fill([
            'user_id' => Auth::id(),
            'total_harga' => $request->get('total_harga')
        ]);
        $transaksi->save();

        $id_buku_array = $request->filled('id_buku') ? $request->get('id_buku') : [];
        $quantity_array = $request->filled('quantity') ? $request->get('quantity') : [];

        $no_daftar = 0;
        foreach ($id_buku_array as $id_buku) {
            $daftar = Buku::findOrFail($id_buku);
            $transaksi_item = new TransaksiItem();
            $transaksi_item->fill([
                'id_transaksi' => $transaksi->id,
                'id_buku' => $id_buku,
                'nama' => $daftar->nama,
                'harga' => $daftar->harga,
                'quantity' => isset($quantity_array[$no_daftar]) ? $quantity_array[$no_daftar] : 0
            ]);
            $transaksi_item->save();
            $no_daftar++;
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->back();
    }
}

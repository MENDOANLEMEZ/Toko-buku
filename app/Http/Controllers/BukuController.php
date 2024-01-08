<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $buku = Buku::all();
        return view('buku.index',compact(['buku']));
    }

    function create()
    {
        return view('buku.create');    
    }

    function store(Request $request)
    {
        Buku::create($request->except(['_token','submit']));
        return redirect('/buku');
    }
    
    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('buku.edit', compact('buku'));
    }
    
    public function update(Request $request, $id_buku)
    {
        $buku =Buku::find($id_buku);
        $buku->update($request->except(['_token','submit']));
        return redirect('/buku');
    }
    public function destroy($id_buku)
    {
        $buku=Buku::find($id_buku);
        $buku->delete();
        return redirect('/buku');
    }

}

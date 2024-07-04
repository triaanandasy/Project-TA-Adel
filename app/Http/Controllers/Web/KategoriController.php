<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kategori_produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori_produk::all();
        return view('kategoris.index',compact('kategoris'));
    }

    public function create(){
        return view('kategoris.create');
    }

    public function store(Request $request){
        $request->validate(['nama'=>'required']);
        $kategori = Kategori_produk::create($request->all());
        return redirect()->route('kategoris.index');
    }

    public function edit($id){
        $kategori = Kategori_produk::findOrFail($id);
        return view('kategoris.edit',compact('kategori'));
    }
    public function show($id){
        $kategori = Kategori_produk::findOrFail($id);
        return view('kategoris.show',compact('kategori'));
    }

    public function update(Request $request,$id){
        $kategori = Kategori_produk::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('kategoris.index');
    }

    public function destroy($id){
        $kategori = Kategori_produk::findOrFail($id);
        $kategori->delete();
        return redirect()->back();
    }
}

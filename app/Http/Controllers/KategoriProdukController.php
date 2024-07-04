<?php

namespace App\Http\Controllers;

use App\Models\Kategori_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategoriProduk = Kategori_produk::all();
            $resKategori = [];
            $resKategori = $kategoriProduk;
        return response()->json([
            'status' => 'success',
            'message' => 'fetch data success',
            'data' => $resKategori
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {try {
        $validation = Validator::make($request->all(),[
            'nama'=> 'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=> 'validation error',
                'message'=> 'input unauthorized',
                'error'=> $validation->errors()
            ],403);
    }
    Kategori_produk::create($request->all());
    return response()->json([
        'status' => 'success',
        'message' => 'create data success',
    ], 200);
} catch (\Exception $e) {
    return response()->json([
        'status' => 'success',
        'message' => $e->getMessage(),
    ], 500);
}
}

    /**
     * Display the specified resource.
     */
    public function show(Kategori_produk $kategori_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori_produk $kategori_produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori_produk $kategori_produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori_produk $kategori_produk)
    {
        //
    }
}

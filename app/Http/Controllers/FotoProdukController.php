<?php

namespace App\Http\Controllers;

use App\Models\Detail_penjualan;
use App\Models\Foto_produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FotoProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $fotoproduk = Foto_produk::all();
            $resFotoproduk = [];
            $resFotoproduk = $fotoproduk;
        return response()->json([
            'status' => 'success',
            'message' => 'fetch data success',
            'data' => $resFotoproduk
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
            'id_produk'=> 'required',
            'link_foto'=> 'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=> 'validation error',
                'message'=> 'input unauthorized',
                'error'=> $validation->errors()
            ],403);
    }
    Foto_produk::create($request->all());
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
    public function show(Foto_produk $foto_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto_produk $foto_produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto_produk $foto_produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto_produk $foto_produk)
    {
        //
    }
}

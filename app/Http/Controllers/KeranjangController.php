<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $keranjangs= DB::table('keranjangs')
            ->join('pelanggans', 'keranjangs.id_pelanggan', '=', 'pelanggans.id')
            ->join('produks', 'keranjangs.id_produk', '=', 'produks.id')
            ->leftJoin('foto_produks', 'produks.id', '=', 'foto_produks.id_produk')
            ->select(
                'keranjangs.id AS id',
                'pelanggans.nama AS pelanggan_nama',
                'produks.nama AS produk_nama',
                'produks.keterangan AS produk_keterangan',
                'keranjangs.harga_jual AS keranjang_harga_jual',
                'keranjangs.jumlah AS keranjang_jumlah',
                'produks.harga_jual AS produk_harga_jual',
                'foto_produks.link_foto AS produk_foto'
            )
            ->get();
            return response()->json([
                'status' => 'success',
                'message' => 'fetch data success',
                'data' => $keranjangs
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
    {
        try {
            $validation = Validator::make($request->all(),[
                'id_pelanggan'=> 'required',
                'id_produk'=> 'required',
                'jumlah'=> 'required',
                
            ]);
            if($validation->fails()){
                return response()->json([
                    'status'=> 'validation error',
                    'message'=> 'input unauthorized',
                    'error'=> $validation->errors()
                ],403);
            }

            $input = $request->all();
            $produk = Produk::find($input['id_produk']);
            $input['harga_jual'] = $produk->harga_jual;
            
            Keranjang::create($input);
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
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}

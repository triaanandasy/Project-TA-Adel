<?php

namespace App\Http\Controllers;

use App\Models\Foto_produk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Produk = Foto_produk::with('produk')->get();
            $resProduk = [];

            foreach ($Produk as $key => $value) {
                $resProduk[] = [
                    'id' => $value->produk->id,
                    'nama_produk' => $value->produk->nama,
                    'keterangan' => $value->produk->keterangan,
                    'harga_jual' => $value->produk->harga_jual,
                    'kategori' => $value->produk->kategori->nama,
                    'foto_link' => $value->link_foto
                ];
            }
            return response()->json([
                'status' => 'success',
                'message' => 'fetch data success',
                'data' => $resProduk
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
            $validation = Validator::make($request->all(), [
                'id_kategori_produk',
                'nama' => 'required',
                'keterangan' => 'required',
                'harga_jual' => 'required',


            ]);
            if ($validation->fails()) {
                return response()->json([
                    'status' => 'validation error',
                    'message' => 'input unauthorized',
                    'error' => $validation->errors()
                ], 403);
            }
            $input = $request->all();

            $produk = Produk::create([
                'id_kategori_produk' => $request->id_kategori_produk,
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'harga_jual' => $request->harga_jual,
            ]);
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('produk'), $imageName);
            $imageUrl = url('produk/' . $imageName);
            Foto_produk::create([
                'id_produk' => $produk->id,
                'link_foto' => $imageUrl
            ]);
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
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}

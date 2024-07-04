<?php

namespace App\Http\Controllers;

use App\Models\Detail_penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $detailpenjualan = Detail_penjualan::all();
            $resDetailpenjualan = [];
            $resDetailpenjualan = $detailpenjualan;
        return response()->json([
            'status' => 'success',
            'message' => 'fetch data success',
            'data' => $resDetailpenjualan
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
            'id_penjualan'=> 'required',
            'id_produk'=> 'required',
            'harga_jual'=> 'required',
            'jumlah'=> 'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=> 'validation error',
                'message'=> 'input unauthorized',
                'error'=> $validation->errors()
            ],403);
    }
    Detail_penjualan::create($request->all());
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
    public function show(Detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail_penjualan $detail_penjualan)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Metode_pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $MetodePembayaran = Metode_pembayaran::all();
            $resMetodePembayaran = [];
            $resMetodePembayaran = $MetodePembayaran;
        return response()->json([
            'status' => 'success',
            'message' => 'fetch data success',
            'data' => $resMetodePembayaran
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
                'judul'=> 'required',
                'keterangan'=> 'required',
                
            ]);
            if($validation->fails()){
                return response()->json([
                    'status'=> 'validation error',
                    'message'=> 'input unauthorized',
                    'error'=> $validation->errors()
                ],403);
            }
            
            Metode_Pembayaran::create($request->all());
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
    public function show(Metode_pembayaran $metode_pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metode_pembayaran $metode_pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Metode_pembayaran $metode_pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metode_pembayaran $metode_pembayaran)
    {
        //
    }
}

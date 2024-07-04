<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pelanggan = Pelanggan::all();
            $datapelanggan = [];
            $datapelanggan = $pelanggan;

            return response()->json([
                'status' => 'success',
                'message' => 'fetch success',
                'data' => $datapelanggan
            ]);
        } catch (\Throwable $th) {
            //throw $th;
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
            'nama'=> 'required',
            'email'=> 'required',
            'noHp'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required|max:1024|mimes:png,jpeg,jpg,svg',
                
            ]);
            if($validation->fails()){
                return response()->json([
                    'status'=> 'validation error',
                    'message'=> 'input unauthorized',
                    'error'=> $validation->errors()
                ],403);
            }
            
            Pelanggan::create($request->all());
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
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}

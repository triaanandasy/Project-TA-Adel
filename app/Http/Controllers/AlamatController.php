<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $alamat = Alamat::all();
            $resAlamat = [];
            $resAlamat = $alamat;
        return response()->json([
            'status' => 'success',
            'message' => 'fetch data success',
            'data' => $resAlamat
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
                'alamat'=> 'required',
                'prioritas'=> 'required',
                
            ]);
            if($validation->fails()){
                return response()->json([
                    'status'=> 'validation error',
                    'message'=> 'input unauthorized',
                    'error'=> $validation->errors()
                ],403);
    
            }
            Alamat::create([
                'id_pelanggan' => $request->id_pelanggan,
                'alamat' => $request->alamat,
                'prioritas' => $request->prioritas
            ]);
    
    
            return response()->json([
                'status' => 'success',
                'message' => 'create data success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fails',
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alamat $alamat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}

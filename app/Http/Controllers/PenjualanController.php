<?php

namespace App\Http\Controllers;

use App\Models\Detail_penjualan;
use App\Models\Keranjang;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $penjualan = Penjualan::all();
            $resPenjualan = [];
            $resPenjualan = $penjualan;
            return response()->json([
                'status' => 'success',
                'message' => 'fetch data success',
                'data' => $resPenjualan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function getpenjualandipesan(Request $request){
        try {
         $data = Penjualan::where('status_penjualan','=','dipesan')->where('id_pelanggan','=',$request->id_pelanggan)->get();
         
      //   $data = Detail_penjualan::where('status_penjualan','=','dipesan')->get();
            // $data = Detail_penjualan::whereHas('penjualan', function($query) {
            //     $query->where('status_penjualan', 'dipesan');
            // })->with('produk','produk.foto_produk')->get();

            // $data_kirim = [];
            // foreach ($data as $d) {
            //     # code...
            //     $data_kirim[] = [
            //         "id_penjualan" => $d->id_penjualan,
            //         "id_produk" => $d->id_produk,
            //         "harga_jual" => $d->harga_jual,
            //         "jumlah" => $d->jumlah,
            //         "nama_produk" => $d->produk?->nama,
            //         "link_foto" => $d->produk?->foto_produk?->link_foto,
            //     ];
            // }

            return response()->json([
                'status' => 'success',
                'message' => 'fetch success',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fails',
                'message' => 'fetch fails',
                'data' => null
            ]);
        }
    }

    public function getpenjualandikirim(Request $request){
        try {
            $data = Penjualan::where('status_penjualan','=','dikirim')->where('id_pelanggan','=',$request->id_pelanggan)->get();
            // $data = Detail_penjualan::whereHas('penjualan', function($query) {
            //     $query->where('status_penjualan', 'dikirim');
            // })->with('produk','produk.foto_produk')->get();

            // $data_kirim = [];
            // foreach ($data as $d) {
            //     # code...
            //     $data_kirim[] = [
            //         "id_penjualan" => $d->id_penjualan,
            //         "id_produk" => $d->id_produk,
            //         "harga_jual" => $d->harga_jual,
            //         "jumlah" => $d->jumlah,
            //         "nama_produk" => $d->produk?->nama,
            //         "link_foto" => $d->produk?->foto_produk?->link_foto,
            //     ];
            // }

            return response()->json([
                'status' => 'success',
                'message' => 'fetch success',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fails',
                'message' => 'fetch fails',
                'data' => null
            ]);
        }
    }

    public function getpenjualanditerima(Request $request){
        try {
            $data = Penjualan::where('status_penjualan','=','diterima')->where('id_pelanggan','=',$request->id_pelanggan)->get();
            // $data = Detail_penjualan::whereHas('penjualan', function($query) {
            //     $query->where('status_penjualan', 'diterima');
            // })->with('produk','produk.foto_produk')->get();

            // $data_kirim = [];
            // foreach ($data as $d) {
            //     # code...
            //     $data_kirim[] = [
            //         "id_penjualan" => $d->id_penjualan,
            //         "id_produk" => $d->id_produk,
            //         "harga_jual" => $d->harga_jual,
            //         "jumlah" => $d->jumlah,
            //         "nama_produk" => $d->produk?->nama,
            //         "link_foto" => $d->produk?->foto_produk?->link_foto,
            //     ];
            // }

            return response()->json([
                'status' => 'success',
                'message' => 'fetch success',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fails',
                'message' => 'fetch fails',
                'data' => null
            ]);
        }
    }

    public function getprodukrincianpesanan(Request $request){
        try {
            // dd($request->all());
            $data = Detail_penjualan::where('id_penjualan','=',$request->id_penjualan)->get();
            // dd($data);
            $data_kirim = [];
            foreach ($data as $d) {
                
                $data_kirim[] = [
                    "id_penjualan" => $d->id_penjualan,
                    "id_produk" => $d->id_produk,
                    "harga_jual" => $d->harga_jual,
                    "jumlah" => $d->jumlah,
                    "nama_produk" => $d->produk?->nama,
                    "link_foto" => $d->produk?->foto_produk?->link_foto,
                ];
            }


            return response()->json([
                'status' => 'success',
                'message' => 'fetch success',
                'data' => $data_kirim
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fails',
                'message' => 'fetch fails',
                'data' => null
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
        Log::info($request->all());
        try {


            $input = $request->all();
            $decodedData = base64_decode($input['bukti_bayar']);
            // Get the current timestamp
            $currentTimestamp = time();

            $fileExtension = 'jpg'; // Change this to your desired extension

            // Define the file name with the timestamp and extension
            $fileName = $currentTimestamp . '.' . $fileExtension;

            $directory = 'bukti_bayar/';

            // Save the decoded data to a file
            file_put_contents($directory . $fileName, $decodedData);

            $penjualan = Penjualan::create([
                'id_pelanggan' => $input['id_pelanggan'],
                'alamat' => $input['alamat'],
                'metode_pembayaran' => $input['metode_pembayaran'],
                'status_penjualan' => $input['status_penjualan'],
                'status_pembayaran' => $input['status_pembayaran'],
                'jumlah_bayar' => $input['jumlah_bayar'],
                'bukti_bayar' => $fileName,
                'catatan' => $input['catatan'] ?? null,
            ]);

            // Create Detail_penjualan entries
            foreach ($input['products'] as $product) {
                $productData = Produk::findOrFail($product['id']);
                Log::info($productData);
                Detail_penjualan::create([
                    'id_penjualan' => $penjualan->id,
                    'id_produk' => $productData->id,
                    'harga_jual' => $productData->harga_jual,
                    'jumlah' => $product['jumlah_beli'],
                    // 'jumlah' => count($input['products']),
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'create data success',
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function create_keranjang(Request $request)
    {
        Log::info($request->all());
        try {


            $input = $request->all();
            $decodedData = base64_decode($input['bukti_bayar']);
            // Get the current timestamp
            $currentTimestamp = time();

            $fileExtension = 'jpg'; // Change this to your desired extension

            // Define the file name with the timestamp and extension
            $fileName = $currentTimestamp . '.' . $fileExtension;

            $directory = 'bukti_bayar/';

            // Save the decoded data to a file
            file_put_contents($directory . $fileName, $decodedData);

            $penjualan = Penjualan::create([
                'id_pelanggan' => $input['id_pelanggan'],
                'alamat' => $input['alamat'],
                'metode_pembayaran' => $input['metode_pembayaran'],
                'status_penjualan' => $input['status_penjualan'],
                'status_pembayaran' => $input['status_pembayaran'],
                'jumlah_bayar' => $input['jumlah_bayar'],
                'bukti_bayar' => $fileName,
                'catatan' => $input['catatan'] ?? null,
            ]);

            // Create Detail_penjualan entries
            foreach ($input['products'] as $item) {
                $keranjang = Keranjang::find($item['id']);

                $productData = Produk::findOrFail($keranjang->id_produk);
                Log::info($productData);
                Detail_penjualan::create([
                    'id_penjualan' => $penjualan->id,
                    'id_produk' => $productData->id,
                    'harga_jual' => $productData->harga_jual,
                    'jumlah' => $item['keranjang_jumlah'],
                    // 'jumlah' => count($input['products']),
                ]);
                $keranjang->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'create data success',
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}

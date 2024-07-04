<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Detail_penjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $detailpenjualan = Penjualan::where('id_pelanggan','=',$id)->with('detailpenjualan','pelanggan')->get();
        return view('penjualans.detail', compact('detailpenjualan'));
    }
}

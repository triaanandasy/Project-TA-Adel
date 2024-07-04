<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        return view('penjualans.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'status_penjualan' => 'required|in:dipesan,disiapkan,dikirim,diterima',
            'status_pembayaran' => 'required|in:sedang diperiksa,lunas',
            'jumlah_bayar' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'catatan' => 'nullable|string',
        ]);

        // Create Penjualan
        $penjualan = new Penjualan();
        $penjualan->id_pelanggan = $request->id_pelanggan;
        $penjualan->alamat = $request->alamat;
        $penjualan->metode_pembayaran = $request->metode_pembayaran;
        $penjualan->status_penjualan = $request->status_penjualan;
        $penjualan->status_pembayaran = $request->status_pembayaran;
        $penjualan->jumlah_bayar = $request->jumlah_bayar;

        // Handle file upload
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $penjualan->bukti_bayar = 'uploads/' . $filename;
        }

        $penjualan->catatan = $request->catatan;
        $penjualan->save();

        // Redirect
        return redirect()->route('penjualans.index')->with('success', 'Penjualan created successfully.');
    }

    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualans.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualans.edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        // Find the penjualan
        $penjualan = Penjualan::findOrFail($id);

        // Update penjualan data
        $penjualan->status_penjualan = $request->status_penjualan;
        $penjualan->status_pembayaran = $request->status_pembayaran;

        // Save the updated penjualan
        $penjualan->save();

        // Redirect
        return redirect()->route('penjualans.index')->with('success', 'Penjualan updated successfully.');
    }


    public function destroy($id)
    {
        // Find and delete penjualan
        $penjualan = Penjualan::findOrFail($id);
        // Delete the penjualan record
        $penjualan->delete();
        // Redirect
        return redirect()->back()->with('success', 'Penjualan deleted successfully.');
    }
}

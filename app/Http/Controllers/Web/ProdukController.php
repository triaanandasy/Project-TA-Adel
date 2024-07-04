<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Foto_produk;
use App\Models\Kategori_produk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produks.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori_produk::all();
        return view('produks.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'harga_jual' => 'required',
            'id_kategori_produk' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Create a new product
        $produks = Produk::create($request->all());
    
        // Handle the file upload
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('produk'), $filename); // Move the file to public/produk directory
            $url = url('produk/' . $filename); // Generate the URL
            $foto_produk = Foto_produk::create([
                'id_produk' => $produks->id,
                'link_foto' => $url,
            ]);
        }
    
        // You may want to add a redirect or a response here
        return redirect()->route('produks.index')->with('success', 'Produk created successfully.');
    }
    

    public function edit($id)
    {
        $produk = Produk::with('foto_produk')->findOrFail($id);
        $kategoris = Kategori_produk::all();
        return view('produks.edit', compact('produk','kategoris'));
    }


    public function show($id)
    {
        $produk = Produk::with('foto_produk', 'kategori')->findOrFail($id);
        return view('produks.show', compact('produk'));
    }


    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'nama' => 'required',
        'keterangan' => 'required',
        'harga_jual' => 'required',
        'id_kategori_produk' => 'required',
        'foto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Not required, but if present must be a valid image
    ]);

    // Find the existing product by its ID
    $produk = Produk::findOrFail($id);

    // Update the product details
    $produk->update($request->all());

    // Handle the file upload if a new file is provided
    if ($request->hasFile('foto_produk')) {
        $file = $request->file('foto_produk');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('produk'), $filename); // Move the file to public/produk directory

        // Generate the URL for the stored file
        $url = url('produk/' . $filename);

        // Find the existing photo record or create a new one if not found
        $foto_produk = Foto_produk::firstOrNew(['id_produk' => $produk->id]);

        // If there's an existing photo, delete the old file from storage
        // if ($foto_produk->exists) {
        //     unlink(public_path(str_replace('/produk/', 'produk/', $foto_produk->link_foto)));
        // }

        // Update the photo record with the new URL
        $foto_produk->link_foto = $url;
        $foto_produk->save();
    }

    // Redirect or respond with a success message
    return redirect()->route('produks.index')->with('success', 'Produk updated successfully.');
}


    public function destroy($id)
    {
        $produks = Produk::findOrFail($id);
        $produks->delete();
        return redirect()->back();
    }
}

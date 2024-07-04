@extends('layout')

@section('title', 'Edit Produk')

@section('content')
    <h1 class="mb-4">Edit Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $produk->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Deskripsi Produk</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan', $produk->keterangan) }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga_jual">Harga Produk</label>
            <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}" required>
        </div>
        <div class="form-group">
            <label for="id_kategori_produk">Kategori Produk</label>
            <select class="form-control" id="id_kategori_produk" name="id_kategori_produk" required>
                <option value="">Pilih kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori_produk', $produk->id_kategori_produk) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto_produk">Foto Produk</label>
            @if($produk->foto_produk)
                <div class="mb-2">
                    <img src="{{ $produk->foto_produk->link_foto }}" alt="Current Product Photo" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" class="form-control-file" id="foto_produk" name="foto_produk">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@extends('layout')
@section('title', 'Create New Produk')
@section('content')
    <h1 class="mb-4">Tambahkan Produk Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga_jual">Harga</label>
            <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" required>
        </div>
        <div class="form-group">
            <label for="id_kategori_produk">Kategori Produk</label>
            <select class="form-control" id="id_kategori_produk" name="id_kategori_produk" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori_produk') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto_produk">Foto Produk</label>
            <input type="file" class="form-control-file" id="foto_produk" name="foto_produk" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@extends('layout')
@section('title', 'Produk Details')
@section('content')
    <h1 class="mb-4">Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->nama }}</h5>
            <p class="card-text"><strong>Deskripsi Produk:</strong> {{ $produk->keterangan }}</p>
            <p class="card-text"><strong>Harga Produk:</strong> ${{ $produk->harga_jual }}</p>
            <p class="card-text"><strong>Kategori Produk:</strong> {{ $produk->kategori->nama }}</p>
            @if($produk->foto_produk)
                <img src="{{ $produk->foto_produk->link_foto }}" alt="Product Photo" style="max-width: 200px;">
            @else
                <p>No photo available</p>
            @endif
        </div>
    </div>
@endsection

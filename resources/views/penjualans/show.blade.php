@extends('layout')

@section('title', 'Penjualan Details')

@section('content')
    <h1 class="mb-4">Detail Penjualan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Penjualan ID: {{ $penjualan->id }}</h5>
            <p class="card-text">Pelanggan: {{ $penjualan->pelanggan->nama ?? 'N/A' }}</p>
            <p class="card-text">Alamat: {{ $penjualan->alamat }}</p>
            <p class="card-text">Status Penjualan: {{ ucfirst($penjualan->status_penjualan) }}</p>
            <p class="card-text">Status Pembayaran: {{ ucfirst($penjualan->status_pembayaran) }}</p>
            <!-- Add more details here -->
        </div>
    </div>

    <h1 class="mb-4">Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="" style="background-color: #e26464; color:white">
                    <tr>
                        {{-- <th>Pelanggan</th> --}}
                        <th>Produk</th>
                        <th>Harga Jual</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($penjualan->detailpenjualan as $detail)
                            <tr>
                                {{-- <td>{{ $penjualan->pelanggan->nama }}</td> --}}
                                <td>{{ $detail->produk?->nama }}</td>
                                <td>{{ $detail->harga_jual }}</td>
                                <td>{{ $detail->jumlah }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('penjualans.index') }}" class="btn btn-secondary">Kembali Ke list</a>
    </div>
@endsection

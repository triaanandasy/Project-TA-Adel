@extends('layout')

@section('title', 'Detail Penjualan')

@section('content')
    <h1 class="mb-4">Detail Penjualan</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Harga Jual</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailpenjualan as $penjualan)
                        @foreach ($penjualan->detailpenjualan as $detail)
                            <tr>
                                <td>{{ $penjualan->pelanggan->nama }}</td>
                                <td>{{ $detail->id_produk }}</td>
                                <td>{{ $detail->harga_jual }}</td>
                                <td>{{ $detail->jumlah }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('penjualans.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

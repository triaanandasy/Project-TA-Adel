@extends('layout')
@section('title', 'Produk List')
@section('content')
<style>

    .table .col-deskripsi {
        width: 400px; /* Atur lebar kolom deskripsi */
        overflow: hidden; /* Sembunyikan teks yang melampaui lebar kolom */
        text-overflow: ellipsis; /* Tambahkan tiga titik untuk teks yang terpotong */
    }
</style>
    <h1 class="mb-4">List Produk Songket</h1>
    <a href="{{ route('produks.create') }}" class="btn btn-primary mb-3">Tambahkan Produk Baru</a>
    <table class="table table-sm">
        <thead class="" style="background-color: #e26464; color:white">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th class="col-deskripsi">Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
                <tr>
                    <td>{{ $produk->id }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td class="col-deskripsi">{{ $produk->keterangan }}</td>
                    <td>{{ $produk->harga_jual }}</td>
                    <td>
                        <a href="{{ route('produks.show', $produk->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

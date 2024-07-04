@extends('layout')

@section('title', 'Kategori List')

@section('content')
    <h1 class="mb-4">List Kategori Produk</h1>

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">Tambahkan Kategori</a>

    <table class="table">
        <thead class="" style="background-color: #e26464; color:white">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

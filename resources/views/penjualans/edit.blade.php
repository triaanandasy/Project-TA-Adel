@extends('layout')

@section('title', 'Edit Penjualan')

@section('content')
    <h1 class="mb-4">Edit Penjualan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjualans.update', $penjualan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_pelanggan">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                <option value="{{ $penjualan->pelanggan->id }}" selected>{{ $penjualan->pelanggan->nama }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status_penjualan">Status Penjualan</label>
            <select name="status_penjualan" id="status_penjualan" class="form-control">
                @foreach(['dipesan','disiapkan','dikirim','diterima'] as $status)
                    <option value="{{ $status }}" {{ $penjualan->status_penjualan == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                @foreach(['sedang diperiksa','lunas'] as $status)
                    <option value="{{ $status }}" {{ $penjualan->status_pembayaran == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Penjualan</button>
    </form>
@endsection

@extends('layout')

@section('title', 'Kategori Details')

@section('content')
    <h1 class="mb-4">Kategori Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kategori->nama }}</h5>
            <p class="card-text">ID: {{ $kategori->id }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

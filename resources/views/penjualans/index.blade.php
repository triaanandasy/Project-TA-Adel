@extends('layout')

@section('title', 'Penjualan List')

@section('content')
    <h1 class="mb-4">Penjualan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- <a href="{{ route('penjualans.create') }}" class="btn btn-primary mb-3">Create New Penjualan</a> --}}

    <table class="table table-bordered">
        <thead class="" style="background-color: #e26464; color:white">
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Jumlah Bayar</th>
                <th>Catatan</th>
                <th>Bukti Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->id }}</td>
                    <td>{{ $penjualan->pelanggan->nama ?? 'N\A' }}</td>
                    <td>{{ $penjualan->alamat }}</td>
                    <td>{{ $penjualan->jumlah_bayar }}</td>
                    <td>{{ $penjualan->catatan }}</td>
                    <td><img src="/bukti_bayar/{{$penjualan->bukti_bayar}}" alt="" width="50px" data-toggle="modal" data-target="#imageModal" onclick="showImageModal(this)"></td>
                    <td>
                        {{-- <a href="{{ route('detailpenjualan', $penjualan->pelanggan->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                        <a href="{{ route('penjualans.show', $penjualan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('penjualans.edit', $penjualan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('penjualans.destroy', $penjualan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this penjualan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Bukti Bayar">
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImageModal(element) {
            var imgSrc = element.getAttribute('src');
            var modalImg = document.getElementById('modalImage');
            modalImg.setAttribute('src', imgSrc);
        }
    </script>
@endsection

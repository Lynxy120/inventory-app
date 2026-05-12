@extends('layouts.main')

@section('content')

    <div class="container mt-4">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Daftar Barang Inventaris</h4>
                <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">
                    + Tambah Barang
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                                <tr>
                                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                    <td class="fw-semibold">{{ $p->name }}</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $p->category->name }}
                                        </span>
                                    </td>
                                    <td class="text-success fw-semibold">
                                        Rp {{ number_format($p->price) }}
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $p->stock }}
                                        </span>
                                    </td>
                                    <td style="max-width:250px">
                                        {{ $p->description }}
                                    </td>
                                    <td>
                                        @if($p->stock == 0)
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @elseif($p->stock <= 20)
                                            <span class="badge bg-warning text-dark">Menipis</span>
                                        @else
                                            <span class="badge bg-success">Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $p->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin mau hapus barang ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
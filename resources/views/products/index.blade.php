@extends('layouts.main')
@section('content')
    <h1>Daftar Barang Inventaris </h1>
    <a href="/insert" class="btn btn-primary mb-3">Tambah Barang</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Barang </th>
                <th>Kategori </th>
                <th>Harga </th>
                <th>Stok </th>
                <th>Deskripsi</th>
                <th>Status </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }} </td>
                    <td>{{ $p->category->name }} </td>
                    <td>Rp {{ number_format($p->price) }} </td>
                    <td>{{ $p->stock }} </td>
                    <td>{{ $p->description }} </td>
                    <td>{{ $p->status }} </td>
                    <td>
                        <a href="/update/{{ $p->id }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/delete/{{ $p->id }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
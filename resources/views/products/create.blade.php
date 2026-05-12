@extends('layouts.main')

@section('content')

    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    @if(isset($product))
                        Edit Produk
                    @else
                        Tambah Produk
                    @endif
                </h4>
            </div>
            <div class="card-body">

                @if(isset($product))
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @method('PUT')
                @else
                        <form action="{{ route('products.store') }}" method="POST">
                    @endif

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ isset($product) ? $product->name : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Pilih Kategori</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(isset($product) && $product->category_id == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Harga</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ isset($product) ? $product->price : '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stok</label>
                                <input type="number" name="stock" class="form-control"
                                    value="{{ isset($product) ? $product->stock : '' }}" required>
                            </div>
                        </div>
                        <textarea name="description" class="form-control"
                            rows="4">{{ isset($product) ? $product->description : '' }}</textarea>
                        <div class="mb-4"></div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button class="btn btn-primary">

                                @if(isset($product))
                                    Update Produk
                                @else
                                    Simpan Produk
                                @endif

                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
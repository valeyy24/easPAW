@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add New Product</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('penjualan.create') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk:</label>
                    <input type="text" name="product_name" id="product_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah:</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Harga :</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Tanggal Penjualan:</label>
                    <input type="date" name="sale_date" id="sale_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Gambar Produk:</label>
                    <input type="file" name="gambarJual" id="gambarJual" class="form-control">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

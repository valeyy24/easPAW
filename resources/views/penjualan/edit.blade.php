@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penjualan</h1>
    <form method="POST" action="{{ url('penjualan', $penjualan->id) }}" enctype="multipart/form-data">
        {{csrf_field()  }}
        <input type="hidden" class="form-control" id="id" name="
        id" value="{{ $penjualan->id }}" aria-describedby="emailHelp">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $penjualan->product_name) }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $penjualan->quantity) }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $penjualan->price) }}" required>
        </div>
        <div class="form-group">
            <label for="sale_date">Sale Date</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date', $penjualan->sale_date) }}" required>
        </div>
        <div class="form-group">
            <label for="product_name">Gambar Produk</label>
            <input type="file" class="form-control" id="gambarJual" name="gambarJual" value="{{$penjualan->gambarJual}}" required>
        </div>
        <div class="form-group">
            <label for="product_name">Gambar Sebelumnya</label>
            <img src="{{url('gambarJual/'. $penjualan->gambarJual)}}" alt="" 
            style="width: 145px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
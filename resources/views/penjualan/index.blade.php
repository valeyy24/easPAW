<!-- resources/views/penjualan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Penjualan</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Products</h1>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Penjualan</th>
                <th>Gambar Produk</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach($penjualans as $index => $penjualan)
            <tr>
                <td>{{ $index + $penjualans ->firstItem()}}</td>
                <td>{{ $penjualan->product_name }}</td>
                <td>{{ $penjualan->quantity }}</td>
                <td>{{ $penjualan->price }}</td>
                <td>{{ $penjualan->sale_date }}</td>
                <td><img src="{{url('gambarJual/'. $penjualan->gambarJual)}}" alt="" 
                    style="width: 145px;"></td>
                <td>
                        <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                     
                        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" style="display:inline;">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $penjualans->links() }}
    </div>
</div>
@endsection

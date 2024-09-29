<!-- resources/views/pembelian/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pembelian</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
            <tr>
                <td>{{ $pembelian->id }}</td>
                <td>{{ $pembelian->product_name }}</td>
                <td>{{ $pembelian->quantity }}</td>
                <td>{{ $pembelian->price }}</td>
                <td>{{ $pembelian->purchase_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

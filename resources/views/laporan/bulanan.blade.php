<!-- resources/views/laporan/bulanan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Bulanan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
            <tr>
                <td>{{ $penjualan->id }}</td>
                <td>{{ $penjualan->product_name }}</td>
                <td>{{ $penjualan->quantity }}</td>
                <td>{{ $penjualan->price }}</td>
                <td>{{ $penjualan->sale_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

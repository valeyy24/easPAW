<?php

namespace App\Http\Controllers;
use App\Models\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        return view('pembelian.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        $pembelian = new Pembelian();
        $pembelian->product_name = $request->product_name;
        $pembelian->quantity = $request->quantity;
        $pembelian->price = $request->price;
        $pembelian->purchase_date = $request->purchase_date;
        $pembelian->save();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->product_name = $request->product_name;
        $pembelian->quantity = $request->quantity;
        $pembelian->price = $request->price;
        $pembelian->purchase_date = $request->purchase_date;
        $pembelian->save();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus.');
    }

}



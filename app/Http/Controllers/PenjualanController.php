<?php

namespace App\Http\Controllers;

use App\Models\penjualan; // Ensure the 'Penjualan' model is correctly imported
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = penjualan::paginate(5);
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        return view('penjualan.create');
    }
    
    public function addJual(Request $request)
    {
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'quantity' => 'required|integer|min:1',
        //     'price' => 'required|numeric|min:0',
        //     'sale_date' => 'required|date',
        // ]);
        $file =$request->gambarJual;
        $fileName = $file->getClientOriginalName();

        // Create a new Penjualan instance and save it to the database
        $penjualan = new penjualan();
        $penjualan->product_name = $request->product_name;
        $penjualan->quantity = $request->quantity;
        $penjualan->price = $request->price;
        $penjualan->sale_date = $request->sale_date;
        $penjualan->gambarJual = $fileName;

        $file->move(public_path().'/gambarJual', $fileName);
        $penjualan->save();

        // Redirect to the penjualan index page with a success message
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = penjualan::findOrFail($id);
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, string $id)
    {
        $ubah = penjualan::findorfail($id);
        $awal = $ubah->gambarJual;

        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'quantity' => 'required|integer|min:1',
        //     'price' => 'required|numeric|min:0',
        //     'sale_date' => 'required|date',
        //     'gambarJual' => 'required|file|max:2048',
            
        // ]);
        $penjualan=[
            'product_name' =>$request['product_name'],
            'quantity' =>$request['quantity'],
            'price' =>$request['price'],
            'sale_date' =>$request['sale_date'],
            'gambarJual' =>$awal
        ];

        $request->gambarJual->move(public_path().'/gambarJual', $awal);
        $ubah->update($penjualan);

        // Find the Penjualan instance and update it
        // $penjualan = penjualan::findOrFail($id);
        // $penjualan->product_name = $validatedData['product_name'];
        // $penjualan->quantity = $validatedData['quantity'];
        // $penjualan->price = $validatedData['price'];
        // $penjualan->sale_date = $validatedData['sale_date'];
        // $penjualan->gambarJual = $awal['gambarJual'];
        $ubah->save();

        // Redirect to the penjualan index page with a success message
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Find the Penjualan instance and delete it
        $penjualan = penjualan::findOrFail($id);
        $penjualan->delete();

        // Redirect to the penjualan index page with a success message
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
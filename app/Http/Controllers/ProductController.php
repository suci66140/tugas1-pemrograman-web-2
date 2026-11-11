<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk (Read)
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Tampilkan form tambah produk (Create Form)
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Simpan data produk baru ke database (Store)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:products,code',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit produk (Edit Form)
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Perbarui data produk di database (Update)
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:products,code,' . $product->id,
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus data produk dari database (Delete)
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data berhasil dihapus');
    }
}
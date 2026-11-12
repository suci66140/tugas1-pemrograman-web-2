<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'title' => 'Product',
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['title' => 'Create Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|string|unique:products,code',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ],
        [
            'name.required' => 'Nama produk wajib diinput',
            'code.required' => 'Kode produk wajib diinput',
            'code.unique' => 'Kode produk sudah terdaftar',
            'price.required' => 'Harga wajib diinput',
            'price.numeric' => 'Harga wajib berupa angka',
            'stock.required' => 'Stok wajib diinput',
            'stock.integer' => 'Stok wajib berupa angka bulat',
            'category.required' => 'Kategori wajib diinput',
        ]);

        Product::create($validated);
        return to_route('products.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'title' => 'Edit Product',
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|string|unique:products,code,' . $product->id,
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ],
        [
            'name.required' => 'Nama produk wajib diinput',
            'code.required' => 'Kode produk wajib diinput',
            'code.unique' => 'Kode produk sudah terdaftar',
            'price.required' => 'Harga wajib diinput',
            'price.numeric' => 'Harga wajib berupa angka',
            'stock.required' => 'Stok wajib diinput',
            'stock.integer' => 'Stok wajib berupa angka bulat',
            'category.required' => 'Kategori wajib diinput',
        ]);

        $product->update($validated);
        return to_route('products.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->withSuccess('Data berhasil dihapus');
    }
}
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
        $products = Product::all();
        return response()->json($products, 200, ['message' => 'Get All Products Successfully!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric'
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201, ['message' => 'Product Created Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200, ['message' => 'Get Product Successfully!']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id)->update($request->all());
        return response()->json($product, 200, ['message' => 'Product Updated Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204, ['message' => 'Product Deleted Successfully!']);
    }
}

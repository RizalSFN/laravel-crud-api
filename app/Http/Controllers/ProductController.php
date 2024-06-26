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
        return response()->json(['message' => 'Get All Products Successfully!', 'data' => $products], 200);
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
        return response()->json(['message' => 'Product Created Successfully!', 'data' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['message' => 'Get Product Successfully!', 'data' => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json(['message' => 'Product Updated Successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product Deleted Successfully!'], 204);
    }
}

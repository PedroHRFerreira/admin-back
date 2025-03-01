<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'message'  => 'Produto adicionado com sucesso!',
            'products' => Product::all(),
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message'  => 'Produto removido com sucesso!',
            'products' => Product::all(),
        ], 200);
    }
}

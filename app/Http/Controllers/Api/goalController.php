<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class goalController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric',
        ]);

        $quantity = $validatedData['quantity'];
        $priceTotal = Product::sum('price');

        $goalTotal = $quantity > 0 ? $priceTotal / $quantity : 0;

        return response()->json([
            'data' => [
                'price_total' => $priceTotal,
                'goal_total'  => $goalTotal,
            ]
        ], 200);
    }
}

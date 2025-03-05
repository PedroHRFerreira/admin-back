<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GoalMonth;

class GoalMonthController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $totalPrice = $products->sum('price');
        $goal = GoalMonth::first();
        if (!$goal) {
            $goal = GoalMonth::create(['goal_value' => 0]);
        }
        return response()->json([
            'total_price' => $totalPrice,
            'goal_value'  => $goal->goal_value,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric|min:0',
        ]);

        $goal = GoalMonth::first();
        if (!$goal) {
            return response()->json(['message' => 'Meta não encontrada.'], 404);
        }

        $inputValue = $request->input('value');
        $goal->goal_value = $goal->goal_value + $inputValue;
        $goal->save();

        return response()->json([
            'message'    => 'Meta atualizada com sucesso!',
            'goal_value' => $goal->goal_value,
        ]);
    }
}

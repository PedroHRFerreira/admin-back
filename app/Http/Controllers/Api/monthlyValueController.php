<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Expense;

class monthlyValueController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required|string|in:JANEIRO,FEVEREIRO,MARÇO,ABRIL,MAIO,JUNHO,JULHO,AGOSTO,SETEMBRO,OUTUBRO,NOVEMBRO,DEZEMBRO',
            'sales_quantity' => 'required|integer',
            'value_of_expenses' => 'required|numeric',
        ]);

        $month = strtoupper($validated['month']);
        $salesQuantity = $validated['sales_quantity'];
        $expensesValue = $validated['value_of_expenses'];

        $sale = Sale::where('label', $month)->first();
        if ($sale) {
            $sale->value += $salesQuantity;
            $sale->save();
        } else {
            $sale = Sale::create([
                'label' => $month,
                'value' => $salesQuantity,
            ]);
        }

        $expense = Expense::where('label', $month)->first();
        if ($expense) {
            $expense->value += $expensesValue;
            $expense->save();
        } else {
            $expense = Expense::create([
                'label' => $month,
                'value' => $expensesValue,
            ]);
        }

        return response()->json([
            'message' => 'Valores mensais atualizados com sucesso',
            'sale' => $sale,
            'expense' => $expense
        ], 200);
    }
}

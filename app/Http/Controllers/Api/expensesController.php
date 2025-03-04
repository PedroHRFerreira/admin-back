<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class expensesController extends Controller
{
    public function index(Request $request)
    {
        $expenses = Expense::orderBy('id')->get();

        if ($request->filled('with')) {
            $monthParam = strtoupper($request->input('with'));
            $filteredKey = null;
            $filteredExpense = null;

            foreach ($expenses as $key => $expense) {
                if ($expense->label === $monthParam) {
                    $filteredKey = $key;
                    $filteredExpense = $expense;
                    break;
                }
            }

            if (!$filteredExpense) {
                return response()->json(['error' => 'Mês não encontrado'], 404);
            }

            if ($filteredKey > 0) {
                $prevExpense = $expenses[$filteredKey - 1];
                $filteredExpense->more_current_month = ($filteredExpense->value > $prevExpense->value);
            } else {
                $filteredExpense->more_current_month = false;
            }

            $expenses = $filteredExpense;
        }

        $data = [
            'expenses' => [
                'month' => $expenses
            ],
        ];

        return response()->json($data);
    }
}

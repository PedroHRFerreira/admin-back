<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('with')) {
            $monthParam = strtoupper($request->input('with'));
            $sale = Sale::where('label', $monthParam)->first();
            
            if (!$sale) {
                return response()->json(['error' => 'Mês não encontrado'], 404);
            }
            
            $sales = $sale;
        } else {
            $sales = Sale::orderBy('id')->get();
        }

        $data = [
            'sale' => [
                'month' => $sales,
            ],
        ];

        return response()->json($data);
    }
}

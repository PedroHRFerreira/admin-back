<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $months = [
            [
                'label' => 'JANEIRO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'FEVEREIRO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'MARÇO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'ABRIL',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'MAIO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'JUNHO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'JULHO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'AGOSTO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'SETEMBRO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'OUTUBRO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'NOVEMBRO',
                'value' => 0,
                'product' => '',
            ],
            [
                'label' => 'DEZEMBRO',
                'value' => 0,
                'product' => '',
            ],
        ];

        if ($request->filled('with')) {
            $monthParam = strtoupper($request->input('with'));
            
            $filtered = collect($months)->firstWhere('label', $monthParam);

            if (!$filtered) {
                return response()->json(['error' => 'Mês não encontrado'], 404);
            }

            $months = $filtered;
        }

        $data = [
            'sale' => [
                'month' => $months,
            ],
        ];

        return response()->json($data);
    }
}

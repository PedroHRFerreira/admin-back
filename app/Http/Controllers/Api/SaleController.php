<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $data = [
            'sale' => [
                'month' => [
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
                ],
            ],
        ];

        return response()->json($data);
    }
}

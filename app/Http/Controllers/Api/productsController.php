<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        $data = [
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Product 1',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 1 description',
                ],
                [
                    'id' => 2,
                    'name' => 'Product 2',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 2 description',
                ],
                [
                    'id' => 3,
                    'name' => 'Product 3',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 3 description',
                ],
                [
                    'id' => 4,
                    'name' => 'Product 4',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 4 description',
                ],
                [
                    'id' => 5,
                    'name' => 'Product 5',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 5 description',
                ], [
                    'id' => 6,
                    'name' => 'Product 6',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'Product 6 description',
                ]
            ]
        ];

        return response()->json($data);
    }
}

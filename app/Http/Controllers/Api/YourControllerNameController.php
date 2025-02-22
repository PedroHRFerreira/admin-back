<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YourControllerNameController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'API funcionando!']);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'Dados salvos com sucesso!'], 201);
    }
}

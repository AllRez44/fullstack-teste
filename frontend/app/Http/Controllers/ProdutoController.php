<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    public function showProdutos()
    {
        $res = Http::get(getenv('APP_BACKEND_URL') . '/produtos');
        $data = $res->json();
        $produtos = [];
        foreach ($data as $produto) {
            $produtos[] = new Produto($produto);
        }
        return view('dashboard', ['produtos' => $produtos]);
    }

    public function showProduto($id)
    {
        return view('Produto');
    }

    public function createProduto()
    {
        return view('Produto');
    }

    public function storeProduto(Request $request)
    {
        return view('Dashboard');
    }
}

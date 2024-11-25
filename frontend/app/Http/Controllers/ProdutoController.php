<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{
    public function showProdutos()
    {
        $produtos = [];
        try {
            $res = Http::get(getenv('APP_BACKEND_URL') . '/produtos');
            $data = $res->json();
            foreach ($data as $produto) {
                $produtos[] = new Produto($produto);
            }
        } catch (\Exception $e) {
            report($e);
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

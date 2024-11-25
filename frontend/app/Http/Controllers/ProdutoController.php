<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function createProduto()
    {
        return view('produto');
    }

    public function updateProduto(int $id)
    {
        try {
            $res = Http::get(getenv('APP_BACKEND_URL') . '/produtos/' . $id);
            $data = $res->json();
            $produto = new Produto($data);
        } catch (\Exception $e) {
            redirect(route('dashboard'));
        }
        return view('produto', ['produto' => $produto]);
    }
}

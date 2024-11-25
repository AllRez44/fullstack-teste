<?php

namespace App\Livewire;

use App\Models\Produto;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ProdutoForm extends Component
{
    public ?Produto $produto;
    #[Validate('required')]
    public $nome = '';

    public $descricao = '';

    #[Validate('categoria')]
    public $categoria = '';

    #[Validate('required')]
    public $preco = '';

    public function save()
    {
        $this->validate();
        $payload = [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria,
            'preco' => $this->preco,
        ];
        if ($this->produto) {
            Http::put(getenv('APP_BACKEND_URL') . '/produtos/' . $this->produto->id, $payload);
        } else {
            Http::post(getenv('APP_BACKEND_URL') . '/produtos', $payload);
        }

        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.produto-form');
    }
}

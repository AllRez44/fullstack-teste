<?php

namespace App\Livewire;

use App\Models\Produto;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ProdutoForm extends Component
{
    public ?Produto $produto;

    public $id = '';

    #[Validate]
    public $nome = '';

    public $descricao = '';

    #[Validate]
    public $categoria = '';

    #[Validate]
    public $preco = '';

    public function rules(): array
    {
        return [
            'nome' => 'required',
            'categoria' => 'required',
            'preco' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'categoria.required' => 'O campo categoria é obrigatório',
            'preco.required' => 'O campo preço é obrigatório',
            'preco.numeric' => 'O campo preço deve ser um número',
        ];
    }

    public function mount()
    {
        $this->id = $this->produto->id;
        $this->nome = $this->produto->nome;
        $this->descricao = $this->produto->descricao;
        $this->categoria = $this->produto->categoria;
        $this->preco = $this->produto->preco;
    }

    public function save()
    {
        $this->validate();
        $payload = [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria,
            'preco' => $this->preco,
        ];
        if (!empty($this->id)) {
            Http::put(getenv('APP_BACKEND_URL') . '/produtos/' . $this->id, $payload);
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

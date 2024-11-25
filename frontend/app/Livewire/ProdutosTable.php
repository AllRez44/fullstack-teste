<?php

namespace App\Livewire;

use App\Models\Produto;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ProdutosTable extends Component
{
    /**
     * @var Produto[]
     */
    public array $produtos;

    public function delete(int $id)
    {
        try {
            Http::delete(getenv('APP_BACKEND_URL') . '/produtos/' . $id);
            $this->produtos = array_filter($this->produtos, fn($produto) => $produto->id !== $id);
            $this->redirect(route('dashboard'));
        } catch (\Exception $e) {
            report($e);
        }
    }

    public function render()
    {
        return view('livewire.produtos-table');
    }
}

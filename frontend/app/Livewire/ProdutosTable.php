<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class ProdutosTable extends Component
{
    /**
     * @var Produto[]
     */
    public array $produtos;

    public function render()
    {
        return view('livewire.produtos-table');
    }
}

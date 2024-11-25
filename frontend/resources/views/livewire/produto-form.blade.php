<x-form class="sm:max-w-[425px]" wire:submit="save">
    @csrf
    <input type="hidden" class="hidden" wire:model="id" />
    <x-form.input
        wire:model="nome"
        label="Nome"
        placeholder="Nome do produto"
        required
    />
    <x-form.input
        wire:model="preco"
        type="number"
        label="Preço"
        placeholder="Preço do produto"
        x-on:input="handlePrecoInput"
        min="0.00"
        step="0.01"
        required
    />
    <x-form.input
        wire:model="descricao"
        label="Descrição"
        placeholder="Descrição do produto"
    />
    <x-form.input
        wire:model="categoria"
        label="Categoria"
        placeholder="Categoria do produto"
        required
    />
    <x-button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">
        @if ($produto)
            Salvar
        @else
            Enviar
        @endif
    </x-button>
</x-form>

<script>
    function handlePrecoInput (event) {
        const { value } = event.target;
        event.target.value = value.replace(/[^0-9.]/g, '');
    }
</script>

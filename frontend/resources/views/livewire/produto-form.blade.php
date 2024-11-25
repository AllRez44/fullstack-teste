<x-form class="sm:max-w-[425px]" wire:submit="save">
    @csrf
    <x-form.input
        wire:model="nome"
        label="Nome"
        placeholder="Nome do produto"
        required
    />
    <x-form.input
        wire:model="preco"
        min="0.0"
        required
        label="Preço"
        placeholder="Preço do produto"
        x-on:input="handlePrecoInput"
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

@props(["produto"])

<x-form class="sm:max-w-[425px]" method="POST">
    <x-form.input
        label="Nome"
        placeholder="Nome do produto"
        value="{{ $produto?->nome ?? '' }}"
        required
    />
    <x-form.input
        min="0.0"
        required
        label="Preço"
        placeholder="Preço do produto"
        value="{{ $produto?->preco ?? '' }}"
        x-on:input="handlePrecoInput"
    />
    <x-form.input
        label="Descrição"
        placeholder="Descrição do produto"
        value="{{ $produto?->descricao ?? '' }}"
    />
    <x-form.input
        label="Categoria"
        placeholder="Categoria do produto"
        value="{{ $produto?->categoria ?? '' }}"
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

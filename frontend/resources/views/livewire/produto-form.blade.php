<x-form class="sm:max-w-[425px]">
    <x-form.input
        wire:model="nome"
        label="Nome"
        placeholder="Nome do produto"
        value="{{ $produto?->nome ?? '' }}"
    />
    @error('nome') <span class="error">{{ $message }}</span> @enderror
    <x-form.input
        min="0.0"
        required
        wire:model="preco"
        label="Preço"
        placeholder="Preço do produto"
        value="{{ $produto?->preco ?? '' }}"
        x-on:input="handlePrecoInput"
    />
    @error('preco') <span class="error">{{ $message }}</span> @enderror
    <x-form.input
        wire:model="descricao"
        label="Descrição"
        placeholder="Descrição do produto"
        value="{{ $produto?->descricao ?? '' }}"
    />
    @error('descricao') <span class="error">{{ $message }}</span> @enderror
    <x-form.input
        wire:model="categoria"
        label="Categoria"
        placeholder="Categoria do produto"
        value="{{ $produto?->categoria ?? '' }}"
    />
    @error('categoria') <span class="error">{{ $message }}</span> @enderror
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

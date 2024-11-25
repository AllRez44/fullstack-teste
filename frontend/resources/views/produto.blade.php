<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produto') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-4 px-2">
        @livewire('produto-form', ['produto' => $produto ?? null])
    </div>
</x-app-layout>

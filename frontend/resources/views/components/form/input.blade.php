@props([
    'type' => 'text',
    'label' => 'Label',
    'descriptionTrailing' => '',
    'value' => '',
])

<x-form.item>
    <x-form.label>
        {{ $label }}
    </x-form.label>

    <x-input
        type="{{ $type }}"
        x-form:control
        :value="$value"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    />

    @if ($descriptionTrailing)
        <x-form.description>
            {{ $descriptionTrailing }}
        </x-form.description>
    @endif

    <x-form.message
        name="{{ $attributes->has('wire:model') ? $attributes->get('wire:model') : $attributes->get('name') }}"
    />
</x-form.item>
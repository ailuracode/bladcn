@props([
    'as' => 'button',
    'variant' => 'default',
])

<x-button {{ $attributes }}
    as="{{ $as }}"
    data-slot="sheet-trigger"
    x-on:click="open=true">
    {{ $slot }}
</x-button>

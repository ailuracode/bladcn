@props([
    'as' => 'button',
    'variant' => 'outline',
])

<x-button {{ $attributes }}
    as="{{ $as }}"
    data-slot="sheet-close"
    variant="{{ $variant }}"
    x-on:click="open=false">
    {{ $slot }}
</x-button>

@props([])

@php
    $base = 'min-w-16 flex-1 outline-none';
@endphp

<input {{ $attributes->twMerge($base) }}
    data-slot='combobox-chip-input'
    x-model='text'
    x-on:blur='closeCombobox'
    x-on:focus='openCombobox'
    x-on:input.debounce.500ms='search'
    x-on:keydown.escape.window='closeCombobox'>
{{ $slot }}
</input>

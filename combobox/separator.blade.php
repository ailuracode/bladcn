@props([])

@php
    $base = 'bg-border -mx-1 my-1 h-px';
@endphp

<div {{ $attributes->class($base) }}
    data-slot='combobox-separator'>
    {{ $slot }}
</div>

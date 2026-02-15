@props([])

@php
    $base =
        'text-muted-foreground hidden w-full justify-center py-2 text-center text-sm group-data-empty/combobox-content:flex';
@endphp

<div {{ $attributes->class($base) }}
    data-slot='combobox-empty'>
    {{ $slot }}
</div>

@props([])

@php
    $base = 'text-muted-foreground px-2 py-1.5 text-xs';
@endphp

<div {{ $attributes->class($base) }}
    data-slot='combobox-label'>
    {{ $slot }}
</div>

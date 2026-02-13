@props([])

@php
    $base =
        'rounded-none border-0 bg-transparent shadow-none ring-0 focus-visible:ring-0 disabled:bg-transparent aria-invalid:ring-0 dark:bg-transparent dark:disabled:bg-transparent flex-1';
@endphp

<x-input {{ $attributes->class($base) }}
    data-slot="input-group-control" />

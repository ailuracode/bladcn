@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'rounded-none text-sm border-0 bg-transparent shadow-none !ring-0 focus-visible:ring-0 disabled:bg-transparent aria-invalid:ring-0 dark:bg-transparent dark:disabled:bg-transparent flex-1';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'input-group-control',
    ];
@endphp

<x-bladcn::input {{ $attributes->class($classes)->merge($attrs) }} />

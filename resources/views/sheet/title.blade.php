@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'text-base font-medium text-foreground';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'sheet-title'];
@endphp

<h2 {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</h2>

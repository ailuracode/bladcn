@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'max-h-64 overflow-auto p-1';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'combobox-list'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

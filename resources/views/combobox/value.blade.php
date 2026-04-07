@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [$class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'combobox-value'];
@endphp

<span
    {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</span>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [$class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'pagination-item'];
@endphp

<li {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</li>

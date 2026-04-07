@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [$class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tooltip-trigger',
        'x-on:blur' => 'hide()',
        'x-on:focus' => 'show()',
        'x-on:mouseenter' => 'show()',
        'x-on:mouseleave' => 'hide()',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

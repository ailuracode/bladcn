@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['text-lg font-semibold', $class];

    $largeAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'large',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($largeAttrs) }}>
    {{ $slot }}
</div>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['scroll-m-20 text-2xl font-semibold tracking-tight', $class];

    $h3Attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'h3',
    ];
@endphp

<h3 {{ $attributes->class($classes)->merge($h3Attrs) }}>
    {{ $slot }}
</h3>

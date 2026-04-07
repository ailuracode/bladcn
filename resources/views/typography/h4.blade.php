@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['scroll-m-20 text-xl font-semibold tracking-tight', $class];

    $h4Attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'h4',
    ];
@endphp

<h4 {{ $attributes->class($classes)->merge($h4Attrs) }}>
    {{ $slot }}
</h4>

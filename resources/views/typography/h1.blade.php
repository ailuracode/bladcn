@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [
        'scroll-m-20 text-center text-4xl font-extrabold tracking-tight text-balance',
        $class,
    ];

    $h1Attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'h1',
    ];
@endphp

<h1 {{ $attributes->class($classes)->merge($h1Attrs) }}>
    {{ $slot }}
</h1>

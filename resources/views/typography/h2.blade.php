@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [
        'scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight first:mt-0',
        $class,
    ];

    $h2Attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'h2',
    ];
@endphp

<h2 {{ $attributes->class($classes)->merge($h2Attrs) }}>
    {{ $slot }}
</h2>

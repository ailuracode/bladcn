@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['my-6 ml-6 list-disc [&>li]:mt-2', $class];

    $listAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'list',
    ];
@endphp

<ul {{ $attributes->class($classes)->merge($listAttrs) }}>
    {{ $slot }}
</ul>

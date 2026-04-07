@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['text-sm leading-none font-medium', $class];

    $smallAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'small',
    ];
@endphp

<small {{ $attributes->class($classes)->merge($smallAttrs) }}>
    {{ $slot }}
</small>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'src' => null,
    'alt' => null,
])

@php
    $base = 'size-full rounded-full object-cover';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'alt' => $alt,
        'src' => $src,
        'data-slot' => 'avatar-image',
    ];
@endphp

<img {{ $attributes->class($classes)->merge($attrs) }} />

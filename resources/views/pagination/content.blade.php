@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'gap-0.5 flex items-center';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'pagination-content',
    ];
@endphp

<ul {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</ul>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'mx-auto flex w-full justify-center';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'aria-label' => 'pagination',
        'data-slot' => 'pagination',
        'role' => 'navigation',
    ];
@endphp

<nav {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</nav>

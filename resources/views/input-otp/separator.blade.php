@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'flex items-center justify-center px-2';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'input-otp-separator',
        'role' => 'separator',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>-</div>

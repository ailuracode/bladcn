@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'size-4 animate-spin';
@endphp

<x-lucide-loader-2
    {{ $attributes->class([$base, $class])->merge([
        'id' => $id,
        'style' => $style,
        'data-slot' => 'spinner',
        'aria-label' => 'loading',
        'role' => 'status',
    ]) }} />

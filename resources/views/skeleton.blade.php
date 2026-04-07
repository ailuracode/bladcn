@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'bg-muted rounded-md animate-pulse';
@endphp

<div
    {{ $attributes->class([$base, $class])->merge([
        'id' => $id,
        'style' => $style,
        'data-slot' => 'skeleton',
    ]) }}>
</div>

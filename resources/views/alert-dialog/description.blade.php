@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'text-muted-foreground *:[a]:hover:text-foreground text-sm text-balance md:text-pretty *:[a]:underline *:[a]:underline-offset-3';
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog-description',
    ];
@endphp

<div {{ $attributes->class([$base, $class])->merge($attrs) }}>
    {{ $slot }}
</div>

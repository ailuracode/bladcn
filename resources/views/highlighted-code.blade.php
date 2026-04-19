@blaze(fold: true)

@use(Spatie\ShikiPhp\Shiki)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['divide-y overflow-hidden rounded-2xl', $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

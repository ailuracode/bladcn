@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['text-muted-foreground text-xl', $class];

    $leadAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'lead',
    ];
@endphp

<p {{ $attributes->class($classes)->merge($leadAttrs) }}>
    {{ $slot }}
</p>

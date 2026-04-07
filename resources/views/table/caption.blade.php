@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['text-muted-foreground mt-4 text-sm', $class];

    $captionAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-caption',
    ];
@endphp

<caption {{ $attributes->class($classes)->merge($captionAttrs) }}>
    {{ $slot }}
</caption>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['text-muted-foreground text-sm', $class];

    $mutedAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'muted',
    ];
@endphp

<p {{ $attributes->class($classes)->merge($mutedAttrs) }}>
    {{ $slot }}
</p>

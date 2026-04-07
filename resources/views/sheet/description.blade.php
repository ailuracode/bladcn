@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'text-sm text-muted-foreground';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'sheet-description',
    ];
@endphp

<p {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</p>

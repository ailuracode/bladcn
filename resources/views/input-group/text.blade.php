@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        "text-muted-foreground gap-2 text-sm [&_svg:not([class*='size-'])]:size-4 flex items-center [&_svg]:pointer-events-none";
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'input-group-text',
    ];
@endphp

<span
    {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</span>

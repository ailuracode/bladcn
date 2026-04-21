@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'mb-1.5 font-medium data-[variant=label]:text-sm data-[variant=legend]:text-base';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'field-legend',
        'data-variant' => 'label',
    ];
@endphp

<legend {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</legend>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['leading-7 not-first:mt-6', $class];

    $pAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'p',
    ];
@endphp

<p {{ $attributes->class($classes)->merge($pAttrs) }}>
    {{ $slot }}
</p>

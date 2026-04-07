@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['mt-6 border-l-2 pl-6 italic', $class];

    $blockquoteAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'blockquote',
    ];
@endphp

<blockquote {{ $attributes->class($classes)->merge($blockquoteAttrs) }}>
    {{ $slot }}
</blockquote>

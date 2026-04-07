@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'text' => 'Previous',
])

@php
    $base = 'pl-1.5!';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'aria-label' => 'Go to previous page',
    ];
@endphp

<x-bladcn::pagination.link {{ $attributes->class($classes)->merge($attrs) }}
    size="default"><x-bladcn::icon class="cn-rtl-flip h-4 w-4"
        data-icon="inline-start"
        name="chevron-left" /><span
        class="hidden sm:block">{{ $text }}</span></x-bladcn::pagination.link>

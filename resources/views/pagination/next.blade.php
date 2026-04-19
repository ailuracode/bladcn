@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'text' => 'Next',
])

@php
    $base = 'pr-1.5!';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'aria-label' => 'Go to next page',
    ];
@endphp

<x-bladcn::pagination.link {{ $attributes->class($classes)->merge($attrs) }}
    size="default"><span
        class="hidden sm:block">{{ $text }}</span><x-lucide-chevron-right
        class="cn-rtl-flip h-4 w-4"
        data-icon="inline-start" /></x-bladcn::pagination.link>

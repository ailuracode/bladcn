@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        "size-8 [&_svg:not([class*='size-'])]:size-4 flex items-center justify-center";
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'aria-hidden' => 'true',
        'data-slot' => 'pagination-ellipsis',
    ];
@endphp

<span {{ $attributes->class($classes)->merge($attrs) }}><x-bladcn::icon
        class="h-4 w-4"
        name="more-horizontal" /><span class="sr-only">More pages</span></span>

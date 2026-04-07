@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'gap-2 text-sm font-medium flex w-fit items-center leading-snug';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'field-label'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'flex flex-col gap-2 p-4 mt-auto';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'sheet-footer'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

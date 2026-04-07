@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = 'gap-2 flex flex-col';
    $classes = [$base, $class];
    $attrs = ['id' => $id, 'style' => $style, 'data-slot' => 'dialog-header'];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

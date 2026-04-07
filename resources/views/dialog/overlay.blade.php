@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'data-open:animate-in data-closed:animate-out data-closed:fade-out-0 data-open:fade-in-0 bg-black/10 duration-100 supports-backdrop-filter:backdrop-blur-xs fixed inset-0 isolate z-50';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'dialog-overlay',
        'x-show' => 'open',
        'x-transition:enter-end' => 'opacity-100',
        'x-transition:enter-start' => 'opacity-0',
        'x-transition:enter' => 'transition ease-out duration-200',
        'x-transition:leave-end' => 'opacity-0',
        'x-transition:leave-start' => 'opacity-100',
        'x-transition:leave' => 'transition ease-in duration-150',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}></div>

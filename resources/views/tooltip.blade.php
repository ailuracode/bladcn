@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'delay' => 0,
])

@php
    $delay = (int) $delay;
    $base = 'relative inline-block w-min';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tooltip',
        'x-data' =>
            '{ open: false, timer: null, delay: ' .
            $delay .
            ', show() { clearTimeout(this.timer); this.timer = setTimeout(() => this.open = true, this.delay); }, hide() { clearTimeout(this.timer); this.open = false; } }',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'value' => null,
])

@aware([
    'defaultValue' => null,
])

@php
    $base = 'text-sm flex-1 outline-none';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tabs-content',
        'x-show' => "active === '" . $value . "'",
    ];
    if ($value !== $defaultValue) {
        $attrs['x-cloak'] = '';
    }
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Orientation)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => Orientation::Horizontal,
    'defaultValue' => null,
])

@php
    $orientation = Orientation::coerceFrom($orientation);
    $base =
        'gap-2 group/tabs flex' .
        ($orientation->isVertical() ? ' flex-col' : '');
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tabs',
        'data-orientation' => $orientation->toHtml(),
        'x-data' =>
            '{ active: ' .
            ($defaultValue ? "'" . $defaultValue . "'" : 'null') .
            ", init() { this.\$watch('active', (value) => { this.\$dispatch('change', value); }); }, setActive(value) { this.active = value; } }",
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

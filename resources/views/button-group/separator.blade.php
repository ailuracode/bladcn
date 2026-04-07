@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Orientation)

@aware([
    'orientation' => Orientation::Horizontal,
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => Orientation::Horizontal,
])

@php
    $orientation = Orientation::coerceFrom($orientation);
@endphp

<x-bladcn::separator
    {{ $attributes->class(['bg-input relative self-stretch data-horizontal:mx-px data-horizontal:w-auto data-vertical:my-px data-vertical:h-auto', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'button-group-separator', 'orientation' => $orientation->toHtml()]) }} />

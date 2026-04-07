@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'isActive' => false,
    'size' => Size::Default,
])

@php
    $isActive = (bool) $isActive;
    $size = Size::coerceFrom($size);
    $variant = $isActive ? Variant::Outline : Variant::Ghost;
@endphp

<x-bladcn::button :$class
    :$id
    :$style
    :size="$size"
    :variant="$variant"
    {{ $attributes->merge(['aria-current' => $isActive ? 'page' : null, 'data-active' => $isActive ? 'true' : null, 'data-slot' => 'pagination-link']) }}>{{ $slot }}</x-bladcn::button>

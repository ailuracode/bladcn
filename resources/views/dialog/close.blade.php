@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
    'variant' => Variant::Default,
])

@php
    $size = Size::coerceFrom($size);
    $variant = Variant::coerceFrom($variant);
@endphp

<x-bladcn::button :$class
    :$id
    :$style
    :size="$size"
    :variant="$variant"
    x-on:click="open = false">
    <div
        {{ $attributes->class([$class])->merge(['data-slot' => 'dialog-close']) }}>
        {{ $slot }}</div>
</x-bladcn::button>

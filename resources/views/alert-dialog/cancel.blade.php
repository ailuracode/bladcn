@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
    'variant' => Variant::Outline,
    'asChild' => AsChild::False,
])

@php
    $size = Size::coerceFrom($size);
    $variant = Variant::coerceFrom($variant);
    $isAsChild = AsChild::coerceFrom($asChild);
@endphp

<x-bladcn::button :$class
    :$id
    :$style
    :asChild="$isAsChild"
    :size="$size"
    :variant="$variant"
    {{ $attributes }}
    data-slot="alert-dialog-cancel"
    x-on:click="close">{{ $slot }}</x-bladcn::button>

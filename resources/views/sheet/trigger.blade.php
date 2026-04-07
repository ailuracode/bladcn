@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
    'variant' => Variant::Default,
    'asChild' => AsChild::False,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $size = Size::coerceFrom($size);
    $variant = Variant::coerceFrom($variant);
    $base = 'gap-2';
    $classes = [$base, $class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'sheet-trigger',
        'x-on:click' => 'open=true',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$triggerAttrs"
    :class="$classes"
    tag="button"><x-bladcn::button :$class
        :$id
        :$size
        :$style
        :$variant
        {{ $attributes->except('class')->merge(['data-slot' => 'sheet-trigger']) }}>{{ $slot }}</x-bladcn::button></x-bladcn::as-child>

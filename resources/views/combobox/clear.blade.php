@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => AsChild::False,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $classes = ['opacity-50 hover:opacity-100', $class];
    $clearAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'combobox-clear',
        'x-on:click' => 'clearCombobox',
    ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$clearAttrs"
    :class="$classes"
    tag="div"><x-bladcn::button :$class
        :$id
        :$style
        asChild="AsChild::True"
        data-slot="combobox-clear"
        size="icon-xs"
        variant="ghost"><x-bladcn::icon class="h-4 w-4"
            name="x" /></x-bladcn::button></x-bladcn::as-child>

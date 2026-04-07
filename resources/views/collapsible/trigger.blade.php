@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => AsChild::False,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $base = 'cursor-pointer';
    $classes = [$base, $class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'collapsible-trigger',
        'x-on:click' => 'toggle',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$triggerAttrs"
    :class="$classes"
    tag="div">{{ $slot }}</x-bladcn::as-child>

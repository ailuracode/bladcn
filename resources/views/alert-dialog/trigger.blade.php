@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => AsChild::False,
])

@php
    $classes = ['cursor-pointer', $class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog-trigger',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="AsChild::coerceFrom($asChild)"
    :attrs="$triggerAttrs"
    :class="$classes"
    tag="div"
    x-on:click="open = !open">{{ $slot }}</x-bladcn::as-child>

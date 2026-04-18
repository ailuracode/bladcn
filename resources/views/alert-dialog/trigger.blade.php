@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('alert-dialog.trigger', [
        'asChild' => ['value' => $asChild, 'options' => [true, false]],
    ]);

    $classes = ['cursor-pointer', $class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog-trigger',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$asChild"
    :attrs="$triggerAttrs"
    :class="$classes"
    tag="div"
    x-on:click="open = !open">{{ $slot }}</x-bladcn::as-child>

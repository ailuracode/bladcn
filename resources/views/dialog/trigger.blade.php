@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('dialog.trigger', [
        'as-child' => ['value' => $asChild, 'options' => [true, false]],
    ]);
    $classes = [$class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'dialog-trigger',
        'x-on:click' => 'open = !open',
        'x-ref' => 'trigger',
    ];
@endphp

<x-bladcn::as-child :asChild="$asChild"
    :attrs="$triggerAttrs"
    :class="$classes"
    tag="div">
    {{ $slot }}
</x-bladcn::as-child>

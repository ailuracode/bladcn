@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
    'variant' => 'outline',
    'asChild' => false,
])

@php
    bladcnOptionsValidator('alert-dialog.cancel', [
        'size' => [
            'value' => $size,
            'options' => ['sm', 'default', 'lg', 'icon'],
        ],
        'variant' => [
            'value' => $variant,
            'options' => [
                'default',
                'destructive',
                'outline',
                'secondary',
                'ghost',
                'link',
            ],
        ],
        'asChild' => ['value' => $asChild, 'options' => [true, false]],
    ]);

    $classes = [$class];
@endphp

<x-bladcn::button
    :class="$class"
    :id="$id"
    :style="$style"
    :asChild="$asChild"
    :size="$size"
    :variant="$variant"
    {{ $attributes }}
    data-slot="alert-dialog-cancel"
    x-on:click="close">{{ $slot }}</x-bladcn::button>

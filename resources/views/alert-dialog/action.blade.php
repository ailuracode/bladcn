@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
    'variant' => 'default',
    'asChild' => false,
])

@php
    bladcnOptionsValidator('alert-dialog.action', [
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
    data-slot="alert-dialog-action">{{ $slot }}</x-bladcn::button>

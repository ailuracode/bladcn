@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
    'variant' => 'default',
])

@php
    bladcnOptionsValidator('dialog.close', [
        'size' => [
            'value' => $size,
            'options' => [
                'default',
                'xs',
                'sm',
                'lg',
                'icon',
                'icon-xs',
                'icon-sm',
                'icon-lg',
            ],
        ],
        'variant' => [
            'value' => $variant,
            'options' => [
                'default',
                'outline',
                'secondary',
                'ghost',
                'destructive',
                'link',
            ],
        ],
    ]);
@endphp

<x-bladcn::button :class="$class"
    :id="$id"
    :size="$size"
    :style="$style"
    :variant="$variant"
    x-on:click="close()">
    <div
        {{ $attributes->class([$class])->merge(['data-slot' => 'dialog-close']) }}>
        {{ $slot }}
    </div>
</x-bladcn::button>

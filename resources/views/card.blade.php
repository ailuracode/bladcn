@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
])

@php
    bladcnOptionsValidator('card', [
        'size' => ['value' => $size, 'options' => ['sm', 'default']],
    ]);
    $classes = [
        'ring-foreground/10 bg-card text-card-foreground gap-4 overflow-hidden rounded-xl py-4 text-sm ring-1 has-data-[slot=card-footer]:pb-0 has-[>img:first-child]:pt-0',
        $size === 'sm'
            ? 'data-[size=sm]:gap-3 data-[size=sm]:py-3 data-[size=sm]:has-data-[slot=card-footer]:pb-0'
            : '',
        '*:has([img:first-child]):rounded-t-xl *:has([img:last-child]):rounded-b-xl group/card flex flex-col',
        $class,
    ];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'card',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

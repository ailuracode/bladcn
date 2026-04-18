@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
])

@php
    bladcnOptionsValidator('avatar', [
        'size' => ['value' => $size, 'options' => ['sm', 'default', 'lg']],
    ]);

    $base =
        'group/avatar relative flex size-8 shrink-0 rounded-full select-none data-[size=lg]:size-10 data-[size=sm]:size-6';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'avatar',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

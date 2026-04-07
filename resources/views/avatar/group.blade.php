@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        '*:data-[slot=avatar]:ring-background group/avatar-group flex -space-x-2 *:data-[slot=avatar]:ring-2';
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'avatar-group',
    ];
@endphp

<div {{ $attributes->class([$base, $class])->merge($attrs) }}>
    {{ $slot }}
</div>

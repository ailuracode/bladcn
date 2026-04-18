@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => false,
])

@php
    bladcnOptionValidator('alert.action', 'as-child', $asChild, [true, false]);

    $base = 'absolute top-2 right-2 z-20';
    $classes = [$base, $class];

    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-action',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild='$asChild'
    :attrs='$attrs'
    :class='$classes'>
    {{ $slot }}
</x-bladcn::as-child>

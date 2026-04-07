@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'text-base font-medium sm:group-data-[size=default]/alert-dialog-content:group-has-data-[slot=alert-dialog-media]/alert-dialog-content:col-start-2';
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog-title',
    ];
@endphp

<div {{ $attributes->class([$base, $class])->merge($attrs) }}>
    {{ $slot }}
</div>

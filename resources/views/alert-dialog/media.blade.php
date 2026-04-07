@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'bg-muted mb-2 inline-flex size-10 items-center justify-center rounded-md sm:group-data-[size=default]/alert-dialog-content:row-span-2 *:[svg:not([class*=\'size-\'])]:size-6';
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert-dialog-media',
    ];
@endphp

<div {{ $attributes->class([$base, $class])->merge($attrs) }}>
    {{ $slot }}
</div>

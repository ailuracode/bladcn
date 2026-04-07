@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['[&_tr:last-child]:border-0', $class];

    $bodyAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-body',
    ];
@endphp

<tbody {{ $attributes->class($classes)->merge($bodyAttrs) }}>
    {{ $slot }}
</tbody>

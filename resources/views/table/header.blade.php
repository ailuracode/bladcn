@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = ['[&_tr]:border-b', $class];

    $headerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-header',
    ];
@endphp

<thead {{ $attributes->class($classes)->merge($headerAttrs) }}>
    {{ $slot }}
</thead>

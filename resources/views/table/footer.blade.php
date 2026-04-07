@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [
        'bg-muted/50 border-t font-medium [&>tr]:last:border-b-0',
        $class,
    ];

    $footerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-footer',
    ];
@endphp

<tfoot {{ $attributes->class($classes)->merge($footerAttrs) }}>
    {{ $slot }}
</tfoot>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [
        'hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors',
        $class,
    ];

    $rowAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-row',
    ];
@endphp

<tr {{ $attributes->class($classes)->merge($rowAttrs) }}>
    {{ $slot }}
</tr>

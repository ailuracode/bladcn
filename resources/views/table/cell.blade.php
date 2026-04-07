@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'colspan' => null,
    'rowspan' => null,
    'headers' => null,
])

@php
    $classes = [
        'p-2 align-middle whitespace-nowrap [&:has([role=checkbox])]:pr-0',
        $class,
    ];
    $colspan = is_numeric($colspan) && $colspan > 1 ? (int) $colspan : null;
    $rowspan = is_numeric($rowspan) && $rowspan > 1 ? (int) $rowspan : null;

    $cellAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'table-cell',
        'colspan' => $colspan,
        'rowspan' => $rowspan,
        'headers' => $headers,
    ];
@endphp

<td {{ $attributes->class($classes)->merge($cellAttrs) }}>
    {{ $slot }}
</td>

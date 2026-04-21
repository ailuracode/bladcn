@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'gap-5 data-[slot=checkbox-group]:gap-3 *:data-[slot=field-group]:gap-4 group/field-group @container/field-group flex w-full flex-col';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'field-group',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

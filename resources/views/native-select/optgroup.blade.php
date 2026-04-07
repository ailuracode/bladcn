@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [$class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'native-select-optgroup',
    ];
@endphp

<optgroup {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}
</optgroup>

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
        'data-slot' => 'native-select-option',
    ];
@endphp

<option {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}
</option>

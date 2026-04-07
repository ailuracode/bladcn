@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'text-muted-foreground text-left text-sm [[data-variant=legend]+&]:-mt-1.5 leading-normal font-normal group-has-data-horizontal/field:text-balance last:mt-0 nth-last-2:-mt-1 [&>a:hover]:text-primary [&>a]:underline [&>a]:underline-offset-4';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'field-description',
    ];
@endphp

<p {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</p>

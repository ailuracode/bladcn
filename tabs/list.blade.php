@props([
    'variant' => 'default',
])

@php
    $base =
        'rounded-lg p-[3px] group-data-horizontal/tabs:h-8 data-[variant=line]:rounded-none group/tabs-list text-muted-foreground inline-flex w-fit items-center justify-center group-data-vertical/tabs:h-fit group-data-vertical/tabs:flex-col';

    $variants = [
        'default' => 'bg-muted',
        'line' => 'gap-1 bg-transparent',
    ];
@endphp

<div {{ $attributes->merge([
    'class' => $base . ' ' . $variants[$variant],
]) }}
    data-slot='tabs-list'
    data-variant='{{ $variant }}'>
    {{ $slot }}
</div>

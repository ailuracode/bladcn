@props([
    'align' => 'inline-start',
])

@php
    $base =
        'text-muted-foreground h-auto gap-2 py-1.5 text-sm font-medium group-data-[disabled=true]/input-group:opacity-50 [&>kbd]:rounded-[calc(var(--radius)-5px)] [&>svg:not([class*=\'size-\'])]:size-4 flex cursor-text items-center justify-center select-none';

    $variants = [
        'inline-start' =>
            'pl-2 has-[>button]:ml-[-0.3rem] has-[>kbd]:ml-[-0.15rem] order-first',
        'inline-end' =>
            'pr-2 has-[>button]:mr-[-0.3rem] has-[>kbd]:mr-[-0.15rem] order-last',
        'block-start' =>
            'px-2.5 pt-2 group-has-[>input]/input-group:pt-2 [.border-b]:pb-2 order-first w-full justify-start',
        'block-end' =>
            'px-2.5 pb-2 group-has-[>input]/input-group:pb-2 [.border-t]:pt-2 order-last w-full justify-start',
    ];

    $alignClasses = $variants[$align] ?? $variants['inline-start'];

@endphp

<div {{ $attributes->merge([
    'class' => $base . ' ' . $alignClasses,
]) }}
    data-align="{{ $align }}"
    data-slot="input-group-addon"
    role="group"
    x-on:mousedown.prevent>
    {{ $slot }}
</div>

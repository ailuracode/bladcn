@props([
    'type' => 'button',
    'variant' => 'ghost',
    'size' => 'xs',
])

@php
    $base = 'gap-2 text-sm shadow-none flex items-center';

    $sizes = [
        'xs' => "h-6 gap-1 rounded-[calc(var(--radius)-3px)] px-1.5 [&>svg:not([class*='size-'])]:size-3.5",
        'sm' => '',
        'icon-xs' => 'size-6 rounded-[calc(var(--radius)-3px)] p-0 has-[>svg]:p-0',
        'icon-sm' => 'size-8 p-0 has-[>svg]:p-0',
    ];

    $sizeClasses = $sizes[$size] ?? $sizes['xs'];

    $classes = "$base $sizeClasses";
@endphp

<x-button :type="$type"
    :variant="$variant"
    {{ $attributes->twMerge($classes) }}
    data-size="{{ $size }}"
    data-slot="input-group-button">
    {{ $slot }}
</x-button>

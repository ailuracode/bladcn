@props([])

@php
    $base =
        "text-muted-foreground gap-2 text-sm [&_svg:not([class*='size-'])]:size-4 flex items-center [&_svg]:pointer-events-none";
@endphp

<span {{ $attributes->class($base) }}
    data-slot="input-group-text">
    {{ $slot }}
</span>

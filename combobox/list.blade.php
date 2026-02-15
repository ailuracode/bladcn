@props([])

@php
    $base =
        'no-scrollbar max-h-[min(calc(--spacing(72)-var(--spacing(9))),calc(var(--available-height)-var(--spacing(9))))] scroll-py-1 p-1 data-empty:p-0 overflow-y-auto overscroll-contain';
@endphp

<div {{ $attributes->class($base) }}
    data-slot='combobox-list'>
    {{ $slot }}
</div>

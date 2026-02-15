@props([
    'value' => null,
])

@php
    $base =
        'not-data-[variant=destructive]:hover:**:text-accent-foreground hover:bg-accent hover:text-accent-foreground data-highlighted:bg-accent data-highlighted:text-accent-foreground gap-2 rounded-md py-1 pr-8 pl-1.5 text-sm [&_svg:not([class*=\'size-\'])]:size-4 relative flex w-full cursor-default items-center outline-hidden select-none data-disabled:pointer-events-none data-disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0';
@endphp

<div {{ $attributes->class($base) }}
    data-slot='combobox-item'
    x-on:click.prevent.stop="selectItem('{{ $value ?? $slot }}')">
    {{ $slot }}
    <span class='pointer-events-none absolute right-2 flex size-4 items-center justify-center'
        x-show="isSelected('{{ $value ?? $slot }}')">
        <x-lucide-check class='pointer-events-none' />
    </span>
</div>

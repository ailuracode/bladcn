@props([
    'showRemove' => true,
])

@php
    $base =
        'bg-muted text-foreground flex h-[calc(--spacing(5.25))] w-fit items-center justify-center gap-1 rounded-sm px-1.5 text-xs font-medium whitespace-nowrap has-data-[slot=combobox-chip-remove]:pr-0 has-disabled:pointer-events-none has-disabled:cursor-not-allowed has-disabled:opacity-50';
@endphp

<div {{ $attributes->twMerge($base) }}
    data-slot='combobox-chip'
    x-on:mousedown.prevent>
    @if ($slot->isEmpty())
        <span x-text='option'></span>
    @else
        {{ $slot }}
    @endif

    @if ($showRemove)
        <div>
            <x-button class='-ml-1 opacity-50 hover:opacity-100'
                data-slot='combobox-chip-remove'
                size='icon-xs'
                variant='ghost'
                x-on:click.stop='removeItem(option)'>
                <x-lucide-x class='pointer-events-none size-3' />
            </x-button>
        </div>
    @endif
</div>

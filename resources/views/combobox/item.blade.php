@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'value' => null,
])

@php
    $base =
        'not-data-[variant=destructive]:hover:**:text-accent-foreground hover:bg-accent hover:text-accent-foreground data-highlighted:bg-accent data-highlighted:text-accent-foreground gap-2 rounded-md py-1 pr-8 pl-1.5 text-sm [&_svg:not([class*=\'size-\'])]:size-4 relative flex w-full cursor-default items-center outline-hidden select-none data-disabled:pointer-events-none data-disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0';
    $classes = [$base, $class];
    $itemAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'combobox-item',
        'x-on:click.prevent.stop' => "selectItem('" . ($value ?? $slot) . "')",
    ];
@endphp

<div {{ $attributes->class($classes)->merge($itemAttrs) }}>
    {{ $slot }}
    <span
        class="pointer-events-none absolute right-2 flex size-4 items-center justify-center"
        x-show="isSelected('{{ $value ?? $slot }}')">
        {{-- <x-bladcn::icon class="pointer-events-none h-4 w-4"
            name="check" /> --}}
    </span>
</div>

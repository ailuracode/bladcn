@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base = '&_svg:not([class*=\'size-\'])]:size-4 relative';
    $classes = [$base, $class];
    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'combobox-trigger',
        'x-on:click.away' => 'closeCombobox',
        'x-on:click' => 'toggleCombobox',
        'x-on:keydown.escape.window' => 'closeCombobox',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($triggerAttrs) }}>
    {{ $slot }}
    {{-- <x-bladcn::icon
        class="text-muted-foreground pointer-events-none absolute right-2 top-1/2 h-4 w-4 -translate-y-1/2"
        name="chevron-down" /> --}}
</div>

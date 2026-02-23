<div {{ $attributes->merge([
    'class' => '&_svg:not([class*=\'size-\'])]:size-4 relative',
]) }}
    data-slot='combobox-trigger'
    x-on:click.away='closeCombobox'
    x-on:click='toggleCombobox'
    x-on:keydown.escape.window='closeCombobox'>
    {{ $slot }}
    <x-lucide-chevron-down
        class='text-muted-foreground pointer-events-none absolute right-2 top-1/2 size-4 -translate-y-1/2' />
</div>

@props([
    'disabled' => false,
])

@php
    $base =
        'dark:bg-input/30 border-input focus-within:border-ring focus-within:ring-ring/50 has-aria-invalid:ring-destructive/20 dark:has-aria-invalid:ring-destructive/40 has-aria-invalid:border-destructive dark:has-aria-invalid:border-destructive/50 flex min-h-8 flex-wrap items-center gap-1 rounded-lg border bg-transparent bg-clip-padding px-2.5 py-1 text-sm transition-colors focus-within:ring-3 has-aria-invalid:ring-3 has-data-[slot=combobox-chip]:px-1';

    $disabledStyles = $disabled
        ? 'cursor-not-allowed opacity-50 pointer-events-none'
        : '';
@endphp

<div {{ $attributes->twMerge($base, $disabledStyles) }}
    data-slot='combobox-chips'
    o-on:click.away='closeCombobox'
    x-on:click='openCombobox'>
    {{ $slot }}
</div>

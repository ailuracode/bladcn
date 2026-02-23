@props([
    'variant' => 'default',
    'size' => 'default',
    'disabled' => false,
])

@php
    $base =
        'hover:text-foreground aria-pressed:bg-muted focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[state=on]:bg-muted gap-1 rounded-lg text-sm font-medium transition-all [&_svg:not([class*=\'size-\'])]:size-4 group/toggle hover:bg-muted inline-flex items-center justify-center whitespace-nowrap outline-none focus-visible:ring-[3px] disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0';

    $variants = [
        'default' => 'bg-transparent',
        'outline' => 'border-input hover:bg-muted border bg-transparent',
    ];

    $sizes = [
        'default' => 'h-8 min-w-8 px-2',
        'sm' =>
            'h-7 min-w-7 rounded-[min(var(--radius-md),12px)] px-1.5 text-[0.8rem]',
        'lg' => 'h-9 min-w-9 px-2.5',
    ];
@endphp

<button
    {{ $attributes->merge([
        'class' => $base . ' ' . $variants[$variant] . ' ' . $sizes[$size],
    ]) }}
    @disabled($disabled)
    data-slot="toggle"
    x-bind:data-state="state ? 'on' : 'off'"
    x-data="_toggle"
    x-on:click="state = !state">
    {{ $slot }}
</button>

@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('_toggle', () => ({
                state: false,
                init() {
                    this.$watch('state', (value) => {
                        this.$dispatch('change', value);
                    });
                },
            }));
        });
    </script>
@endonce

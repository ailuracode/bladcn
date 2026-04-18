@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'variant' => 'default',
    'size' => 'default',
    'disabled' => false,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('button-group.text', [
        'variant' => [
            'value' => $variant,
            'options' => [
                'default',
                'outline',
                'secondary',
                'ghost',
                'destructive',
                'link',
            ],
        ],
        'size' => [
            'value' => $size,
            'options' => [
                'default',
                'xs',
                'sm',
                'lg',
                'icon',
                'icon-xs',
                'icon-sm',
                'icon-lg',
            ],
        ],
        'disabled' => [
            'value' => $disabled,
            'options' => [true, false],
        ],
        'as-child' => [
            'value' => $asChild,
            'options' => [true, false],
        ],
    ]);
    $base =
        'focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 rounded-lg border border-transparent bg-clip-padding text-sm font-medium focus-visible:ring-3 aria-invalid:ring-3 [&_svg:not([class*=\'size-\'])]:size-4 inline-flex items-center justify-center whitespace-nowrap transition-all [&_svg]:pointer-events-none shrink-0 [&_svg]:shrink-0 outline-none group/button select-none';
    $variantClass = match ($variant) {
        'default'
            => 'bg-primary text-primary-foreground [a]:hover:bg-primary/80',
        'outline'
            => 'border-border bg-background hover:bg-muted hover:text-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 aria-expanded:bg-muted aria-expanded:text-foreground',
        'secondary'
            => 'bg-secondary text-secondary-foreground hover:bg-secondary/80 aria-expanded:bg-secondary aria-expanded:text-secondary-foreground',
        'ghost'
            => 'hover:bg-muted hover:text-foreground dark:hover:bg-muted/50 aria-expanded:bg-muted aria-expanded:text-foreground',
        'destructive'
            => 'bg-destructive/10 hover:bg-destructive/20 focus-visible:ring-destructive/20 dark:focus-visible:ring-destructive/40 dark:bg-destructive/20 text-destructive focus-visible:border-destructive/40 dark:hover:bg-destructive/30',
        'link' => 'text-primary underline-offset-4 hover:underline',
    };
    $sizeClass = match ($size) {
        'default'
            => 'h-8 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-2 has-data-[icon=inline-start]:pl-2',
        'xs'
            => 'h-6 gap-1 rounded-[min(var(--radius-md),10px)] px-2 text-xs in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3',
        'sm'
            => 'h-7 gap-1 rounded-[min(var(--radius-md),12px)] px-2.5 text-[0.8rem] in-data-[slot=button-group]:rounded-lg has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*=\'size-\'])]:size-3.5',
        'lg'
            => 'h-9 gap-1.5 px-2.5 has-data-[icon=inline-end]:pr-3 has-data-[icon=inline-start]:pl-3',
        'icon' => 'size-8',
        'icon-xs'
            => 'size-6 rounded-[min(var(--radius-md),10px)] in-data-[slot=button-group]:rounded-lg [&_svg:not([class*=\'size-\'])]:size-3',
        'icon-sm'
            => 'size-7 rounded-[min(var(--radius-md),12px)] in-data-[slot=button-group]:rounded-lg',
        'icon-lg' => 'size-9',
    };

    $classes = [$base, $variantClass, $sizeClass, $class];

    if ($disabled) {
        $classes[] = 'pointer-events-none opacity-50';
    }

    $buttonTextAttrs = [
        'id' => $id,
        'style' => $style,
        'data-disabled' => $disabled ?: null,
        'data-size' => $size,
        'data-slot' => 'group-button-text',
        'data-variant' => $variant,
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$asChild"
    :attrs="$buttonTextAttrs"
    :class="$classes"
    tag="span">
    {{ $slot }}
</x-bladcn::as-child>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'variant' => 'default',
])

@php
    bladcnOptionsValidator('alert', [
        'variant' => [
            'value' => $variant,
            'options' => ['default', 'destructive'],
        ],
    ]);
    $base =
        'grid gap-0.5 rounded-lg border px-2.5 py-2 text-left text-sm has-data-[slot=alert-action]:relative has-data-[slot=alert-action]:pr-18 has-[>svg]:grid-cols-[auto_1fr] has-[>svg]:gap-x-2 *:[svg]:row-span-2 *:[svg]:translate-y-0.5 *:[svg]:text-current *:[svg:not([class*=\'size-\'])]:size-4 w-full relative group/alert';

    $variantClasses = match ($variant) {
        'default' => 'bg-card text-card-foreground',
        'destructive'
            => 'text-destructive bg-card *:data-[slot=alert-description]:text-destructive/90 *:[svg]:text-current',
    };
    $classes = [$base, $variantClasses, $class];

    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert',
        'data-variant' => $variant,
        'role' => 'alert',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Tabs\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'variant' => Variant::Default,
])

@php
    $variant = Variant::coerceFrom($variant);
    $base =
        'rounded-lg p-[3px] group-data-horizontal/tabs:h-8 data-[variant=line]:rounded-none group/tabs-list text-muted-foreground inline-flex w-fit items-center justify-center group-data-vertical/tabs:h-fit group-data-vertical/tabs:flex-col';
    $variantClasses = match ($variant) {
        Variant::Default => 'bg-muted',
        Variant::Line => 'gap-1 bg-transparent',
    };
    $classes = [$base, $variantClasses, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tabs-list',
        'data-variant' => $variant->toHtml(),
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

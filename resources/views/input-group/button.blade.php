@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'type' => 'button',
    'variant' => Variant::Ghost,
    'size' => Size::Default,
])

@php
    $size = Size::coerceFrom($size);
    $variant = Variant::coerceFrom($variant);
    $base = 'gap-2 text-sm shadow-none flex items-center';
    $sizeClasses = match ($size) {
        Size::Default => '',
        Size::Sm => '',
        Size::Lg => '',
        default
            => 'h-6 gap-1 rounded-[calc(var(--radius)-3px)] px-1.5 [&>svg:not([class*=\'size-\'])]:size-3.5',
    };
    $classes = [$base, $sizeClasses, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size->toHtml(),
        'data-slot' => 'input-group-button',
    ];
@endphp

<x-bladcn::button :$class
    :$id
    :$style
    :$type
    :$variant
    {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</x-bladcn::button>

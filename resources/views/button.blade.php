@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Basic\Disabled)
@use(AiluraCode\Bladcn\Enums\Button\Size)
@use(AiluraCode\Bladcn\Enums\Button\Type)
@use(AiluraCode\Bladcn\Enums\Button\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'type' => Type::Button,
    'variant' => Variant::Default,
    'size' => Size::Default,
    'disabled' => Disabled::False,
    'asChild' => AsChild::False,
])

@php
    $base =
        'focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 rounded-lg border border-transparent bg-clip-padding text-sm font-medium focus-visible:ring-3 aria-invalid:ring-3 [&_svg:not([class*=\'size-\'])]:size-4 inline-flex items-center justify-center whitespace-nowrap transition-all [&_svg]:pointer-events-none shrink-0 [&_svg]:shrink-0 outline-none group/button select-none';
    $variant = Variant::coerceFrom($variant);
    $size = Size::coerceFrom($size);
    $disabled = Disabled::coerceFrom($disabled);
    $isAsChild = AsChild::coerceFrom($asChild);

    $classes = [$base, $variant->toClass(), $size->toClass(), $class];

    if ($disabled->isTrue()) {
        $classes[] = $disabled->toClass();
    }

    $buttonAttrs = [
        'id' => $id,
        'style' => $style,
        'type' =>
            $type instanceof Type
                ? $type->toHtml()
                : Type::coerceFrom($type)->toHtml(),
        'disabled' => $disabled->toHtml(),
        'data-disabled' => $disabled->toHtml(),
        'data-size' => $size->toHtml(),
        'data-slot' => 'button',
        'data-variant' => $variant->toHtml(),
        ...$attributes->toArray(),
    ];

    if ($isAsChild->isTrue()) {
        $buttonAttrs['role'] = 'button';
    }
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$buttonAttrs"
    :class="$classes"
    tag="button">
    {{ $slot }}
</x-bladcn::as-child>

@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Badge\Variant)
@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'variant' => Variant::Default,
    'asChild' => AsChild::False,
])

@php
    $base =
        'inline-flex items-center justify-center rounded-full border border-transparent px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden';
    $variant = Variant::coerceFrom($variant);
    $isAsChild = AsChild::coerceFrom($asChild);

    $classes = [$base, $variant->toClass(), $class];

    $badgeAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'badge',
        'data-variant' => $variant->toHtml(),
        ...$attributes->toArray(),
    ];

    if ($isAsChild->isTrue()) {
        $badgeAttrs['role'] = 'status';
    }
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$badgeAttrs"
    :class="$classes"
    tag="span">
    {{ $slot }}
</x-bladcn::as-child>

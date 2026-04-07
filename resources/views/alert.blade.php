@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Alert\Variant)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'variant' => Variant::Default,
])

@php
    $variant = Variant::coerceFrom($variant);
    $base =
        'grid gap-0.5 rounded-lg border px-2.5 py-2 text-left text-sm has-data-[slot=alert-action]:relative has-data-[slot=alert-action]:pr-18 has-[>svg]:grid-cols-[auto_1fr] has-[>svg]:gap-x-2 *:[svg]:row-span-2 *:[svg]:translate-y-0.5 *:[svg]:text-current *:[svg:not([class*=\'size-\'])]:size-4 w-full relative group/alert';
    $classes = [$base, $variant->toClass(), $class];

    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'alert',
        'data-variant' => $variant->toHtml(),
        'role' => 'alert',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

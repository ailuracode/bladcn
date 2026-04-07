@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => AsChild::False,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $classes = [
        'bg-muted gap-2 rounded-lg border px-2.5 text-sm font-medium [&_svg:not([class*=\'size-\'])]:size-4 flex items-center [&_svg]:pointer-events-none',
        $class,
    ];
    $textAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'button-group-text',
    ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$textAttrs"
    :class="$classes"
    tag="div">{{ $slot }}</x-bladcn::as-child>

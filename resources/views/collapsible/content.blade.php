@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'asChild' => AsChild::False,
])

@aware(['open'])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $classes = [$class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'collapsible-content',
        'x-show' => 'open',
        ...$attributes->toArray(),
    ];
    if (!$open) {
        $attrs['x-cloak'] = '';
    }
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$attrs"
    :class="$classes"
    tag="div">{{ $slot }}</x-bladcn::as-child>

@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'href' => null,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('breadcrums.link', [
        'as-child' => [
            'value' => $asChild,
            'options' => [true, false],
        ],
    ]);
    $classes = [
        'hover:text-foreground transition-colors hover:cursor-pointer',
        $class,
    ];
    $linkAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'breadcrumb-link',
        'href' => $href,
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild='$asChild'
    :attrs='$linkAttrs'
    :class='$classes'
    tag='a'>
    {{ $slot }}
</x-bladcn::as-child>

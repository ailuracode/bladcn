@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Card\Size)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => Size::Default,
])

@php
    $size = Size::coerceFrom($size);
    $sizeClass = $size->toHtml();
    $classes = [
        'ring-foreground/10 bg-card text-card-foreground gap-4 overflow-hidden rounded-xl py-4 text-sm ring-1 has-data-[slot=card-footer]:pb-0 has-[>img:first-child]:pt-0',
        $sizeClass === 'sm'
            ? 'data-[size=sm]:gap-3 data-[size=sm]:py-3 data-[size=sm]:has-data-[slot=card-footer]:pb-0'
            : '',
        '*:has([img:first-child]):rounded-t-xl *:has([img:last-child]):rounded-b-xl group/card flex flex-col',
        $class,
    ];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $sizeClass,
        'data-slot' => 'card',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

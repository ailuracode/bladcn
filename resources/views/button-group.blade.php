@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Orientation)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => Orientation::Horizontal,
])

@php
    $orientation = Orientation::coerceFrom($orientation);
    $base =
        'has-[>[data-slot=button-group]]:gap-2 has-[select[aria-hidden=true]:last-child]:[&>[data-slot=select-trigger]:last-of-type]:rounded-r-lg flex w-fit items-stretch *:focus-visible:z-10 *:focus-visible:relative [&>[data-slot=select-trigger]:not([class*=\'w-\'])]:w-fit [&>input]:flex-1';
    $classes = match ($orientation) {
        Orientation::Vertical
            => '[&>[data-slot]:not(:has(~[data-slot]))]:rounded-b-lg! flex-col [&>*:not(:first-child)]:rounded-t-none [&>*:not(:first-child)]:border-t-0 [&>*:not(:last-child)]:rounded-b-none',
        default
            => '[&>[data-slot]:not(:has(~[data-slot]))]:rounded-r-lg! [&>*:not(:first-child)]:rounded-l-none [&>*:not(:first-child)]:border-l-0 [&>*:not(:last-child)]:rounded-r-none',
    };
    $classes = [$base, $classes, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-orientation' => $orientation->toHtml(),
        'data-slot' => 'button-group',
        'role' => 'group',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

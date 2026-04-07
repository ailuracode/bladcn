@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Tooltip\Side)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'side' => Side::Bottom,
    'sideOffset' => 6,
    'align' => 'start',
    'alignOffset' => 0,
    'anchor' => null,
])

@aware(['transition', 'expanded'])

@php
    $side = Side::coerceFrom($side);
    $base =
        'bg-popover text-popover-foreground data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 ring-foreground/10 *:data-[slot=input-group]:bg-input/30 *:data-[slot=input-group]:border-input/30 overflow-hidden rounded-lg shadow-md ring-1 duration-100 *:data-[slot=input-group]:m-1 *:data-[slot=input-group]:mb-0 *:data-[slot=input-group]:h-8 *:data-[slot=input-group]:shadow-none data-[side=inline-start]:slide-in-from-right-2 data-[side=inline-end]:slide-in-from-left-2 group/combobox-content relative max-h-(--available-height) w-(--anchor-width) max-w-(--available-width) min-w-[calc(var(--anchor-width)+--spacing(7))] origin-(--transform-origin) data-[chips=true]:min-w-(--anchor-width)';
    $marginStyles = match ($side) {
        Side::Top->value => 'margin-bottom: ' . $sideOffset . 'px;',
        Side::Bottom->value => 'margin-top: ' . $sideOffset . 'px;',
        Side::Left->value => 'margin-right: ' . $sideOffset . 'px;',
        Side::Right->value => 'margin-left: ' . $sideOffset . 'px;',
        default => '',
    };
    $classes = [$base, $class];
    $contentAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'combobox-content',
    ];
@endphp

<div class="relative">
    <div @if (!$expanded) x-cloak @endif
        @if ($transition) x-transition @endif
        class="absolute isolate z-50 w-full"
        data-align="{{ $align }}"
        data-side="{{ $side->toHtml() }}"
        style="{{ $marginStyles }}"
        x-on:mousedown.prevent
        x-show="open">
        <div {{ $attributes->class($classes)->merge($contentAttrs) }}>
            {{ $slot }}</div>
    </div>
</div>

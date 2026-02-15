@props([
    'side' => 'bottom', // top, bottom, left, right, inline-start, inline-end, null
    'sideOffset' => 6,
    'align' => 'start',
    'alignOffset' => 0,
    'anchor' => null,
])

@aware(['transition', 'expanded'])

@php
    $base =
        'bg-popover text-popover-foreground data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 ring-foreground/10 *:data-[slot=input-group]:bg-input/30 *:data-[slot=input-group]:border-input/30 overflow-hidden rounded-lg shadow-md ring-1 duration-100 *:data-[slot=input-group]:m-1 *:data-[slot=input-group]:mb-0 *:data-[slot=input-group]:h-8 *:data-[slot=input-group]:shadow-none data-[side=inline-start]:slide-in-from-right-2 data-[side=inline-end]:slide-in-from-left-2 group/combobox-content relative max-h-(--available-height) w-(--anchor-width) max-w-(--available-width) min-w-[calc(var(--anchor-width)+--spacing(7))] origin-(--transform-origin) data-[chips=true]:min-w-(--anchor-width)';

    $marginStyles = match ($side) {
        'top' => 'margin-bottom: {$sideOffset}px;',
        'bottom' => 'margin-top: {$sideOffset}px;',
        'left' => 'margin-right: {$sideOffset}px;',
        'right' => 'margin-left: {$sideOffset}px;',
        'inline-start' => 'margin-inline-end: {$sideOffset}px;',
        'inline-end' => 'margin-inline-start: {$sideOffset}px;',
        default => '',
    };
@endphp

{{-- Portal --}}
<div class='relative'>
    {{-- Positioner --}}
    <div @if (!$expanded) x-cloak @endif
        @if ($transition) x-transition @endif
        class='absolute isolate z-50 w-full'
        data-align='{{ $align }}'
        data-side='{{ $side }}'
        style='{{ $marginStyles }}'
        x-on:mousedown.prevent
        x-show='open'>
        <div {{ $attributes->class($base) }}
            data-slot='combobox-content'>
            {{ $slot }}
        </div>
    </div>
</div>

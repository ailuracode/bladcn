@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Sheet\Side)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'side' => Side::Right,
])

@aware(['expanded', 'transition'])

@php
    $side = Side::coerceFrom($side);
    $positionClasses = $side->toPositionClass();
    $enterStart = $side->toEnterStart();
    $leaveEnd = $enterStart;
    $base =
        'bg-background fixed z-50 flex flex-col gap-4 text-sm shadow-lg ' .
        $positionClasses;
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-side' => $side->toHtml(),
        'data-slot' => 'sheet-content',
    ];
@endphp

<div @if (!$expanded) x-cloak @endif
    @if ($transition) x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @endif
    class="fixed inset-0 z-50"
    x-show="open">
    <div @click="open=false"
        class="backdrop-blur-xs absolute inset-0 bg-black/20"
        data-slot="sheet-overlay"></div>
    <div {{ $attributes->class($classes)->merge($attrs) }}
        @if ($transition) x-transition:enter="transform transition ease-out duration-200" x-transition:enter-start="{{ $enterStart }}" x-transition:enter-end="translate-x-0 translate-y-0" x-transition:leave="transform transition ease-in duration-200" x-transition:leave-start="translate-x-0 translate-y-0" x-transition:leave-end="{{ $leaveEnd }}" @endif
        x-show="open">{{ $slot }}</div>
</div>

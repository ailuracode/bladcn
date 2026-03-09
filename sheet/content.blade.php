@props([
    'side' => 'right',
])

@aware(['expanded', 'transition'])

@php
    $positionClasses = match ($side) {
        'right' => 'inset-y-0 right-0 w-3/4 sm:max-w-sm border-l',
        'left' => 'inset-y-0 left-0 w-3/4 sm:max-w-sm border-r',
        'top' => 'inset-x-0 top-0 border-b',
        'bottom' => 'inset-x-0 bottom-0 border-t',
    };

    $enterStart = match ($side) {
        'right' => 'translate-x-full',
        'left' => '-translate-x-full',
        'top' => '-translate-y-full',
        'bottom' => 'translate-y-full',
    };

    $leaveEnd = $enterStart;
@endphp

<div @if (!$expanded) x-cloak @endif
    @if ($transition) x-transition:enter="transition-opacity ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0" @endif
    class="fixed inset-0 z-50"
    x-show="open">

    <div @click="open=false"
        class="backdrop-blur-xs absolute inset-0 bg-black/20"
        data-slot="sheet-overlay"></div>

    <div {{ $attributes->merge([
        'class' => "bg-background fixed z-50 flex flex-col gap-4 text-sm shadow-lg $positionClasses",
    ]) }}
        @if ($transition) x-transition:enter="transform transition ease-out duration-200"
         x-transition:enter-start="{{ $enterStart }}"
         x-transition:enter-end="translate-x-0 translate-y-0"
         x-transition:leave="transform transition ease-in duration-200"
         x-transition:leave-start="translate-x-0 translate-y-0"
         x-transition:leave-end="{{ $leaveEnd }}" @endif
        data-side="{{ $side }}"
        data-slot="sheet-content"
        x-show="open">
        {{ $slot }}
    </div>

</div>

@props([
    'minHeight' => 200,
])

@php
    $collapseAttr = ['x-collapse.min.' . $minHeight . 'px' => ''];

    $collapseAttr['data-slot'] = 'highlighted-code-content';

    $attrs = array_merge($collapseAttr, $attributes->getAttributes());
@endphp

<div class="relative"
    x-cloak
    x-data="{ expanded: false }">
    <div {{ $attributes->merge($attrs) }}
        x-show="expanded"
        x-transition>
        {{ $slot }}
    </div>

    <div class="bg-linear-to-t absolute bottom-0 left-1/2 flex h-20 w-full -translate-x-1/2 items-center justify-center from-[#17191e] to-transparent transition-opacity duration-300"
        x-bind:class="expanded ? 'opacity-0 pointer-events-none' : 'opacity-100'">
        <x-bladcn::button class="text-foreground"
            variant="ghost"
            x-on:click="expanded = !expanded">
            <span x-text="expanded ? 'Hide' : 'Show'"></span>
        </x-bladcn::button>
    </div>
</div>

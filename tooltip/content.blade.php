@props([
    'side' => 'top',
])

@php
    $config = [
        'top' => [
            'position' => 'bottom-full mb-2 left-1/2 -translate-x-1/2',
            'arrow' => 'bottom-[-0.25rem] left-1/2 -translate-x-1/2',
            'axis' => 'y',
            'enter' => '2',
            'leave' => '2',
        ],
        'bottom' => [
            'position' => 'top-full mt-2 left-1/2 -translate-x-1/2',
            'arrow' => 'top-[-0.25rem] left-1/2 -translate-x-1/2',
            'axis' => 'y',
            'enter' => '-2',
            'leave' => '-2',
        ],
        'left' => [
            'position' => 'right-full mr-2 top-1/2 -translate-y-1/2',
            'arrow' => 'right-[-0.25rem] top-1/2 -translate-y-1/2',
            'axis' => 'x',
            'enter' => '2',
            'leave' => '2',
        ],
        'right' => [
            'position' => 'left-full ml-2 top-1/2 -translate-y-1/2',
            'arrow' => 'left-[-0.25rem] top-1/2 -translate-y-1/2',
            'axis' => 'x',
            'enter' => '-2',
            'leave' => '-2',
        ],
    ];

    $current = $config[$side] ?? $config['top'];

    $position = $current['position'];
    $arrow = $current['arrow'];

    $transition = sprintf(
        'x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-%s-%s"
         x-transition:enter-end="opacity-100 translate-%s-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-%s-0"
         x-transition:leave-end="opacity-0 translate-%s-%s"',
        $current['axis'],
        $current['enter'],
        $current['axis'],
        $current['axis'],
        $current['axis'],
        $current['leave'],
    );
@endphp

<div {{ $attributes->twMerge([
    'absolute z-50 w-fit max-w-xs rounded-md px-3 py-1.5 text-xs',
    'bg-foreground text-background border-0',
    $position,
]) }}
    {!! $transition !!}
    data-slot="tooltip-content"
    x-cloak
    x-show="open">
    {{ $slot }}

    <span class="{{ twMerge('absolute size-2.5 rounded-xs rotate-45 bg-foreground', $arrow) }}"></span>
</div>

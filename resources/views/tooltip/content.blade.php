@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Tooltip\Side)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'side' => Side::Top,
])

@php
    $side = Side::coerceFrom($side);
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
            'leave' => '2',
        ],
    ];
    $current = $config[$side->value] ?? $config['top'];
    $position = $current['position'];
    $arrow = $current['arrow'];
    $transition =
        'x-transition:enter=\"transition ease-out duration-200\" x-transition:enter-start=\"opacity-0 translate-' .
        $current['axis'] .
        '-' .
        $current['enter'] .
        '\" x-transition:enter-end=\"opacity-100 translate-' .
        $current['axis'] .
        '-0\" x-transition:leave=\"transition ease-in duration-150\" x-transition:leave-start=\"opacity-100 translate-' .
        $current['axis'] .
        '-0\" x-transition:leave-end=\"opacity-0 translate-' .
        $current['axis'] .
        '-' .
        $current['leave'] .
        '\"';
    $base =
        'absolute z-50 w-fit max-w-xs rounded-md px-3 py-1.5 text-xs bg-foreground text-background border-0 ' .
        $position;
    $classes = [$base, $class];
    $contentAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'tooltip-content',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($contentAttrs) }}
    {!! $transition !!}
    x-cloak
    x-show="open">{{ $slot }}<span
        class="rounded-xs bg-foreground {{ $arrow }} absolute size-2.5 rotate-45"></span>
</div>

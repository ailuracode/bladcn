@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'type' => 'button',
    'variant' => 'ghost',
    'size' => 'default',
])

@php
    bladcnOptionsValidator('input-group.button', [
        'type' => [
            'value' => $type,
            'options' => ['button', 'submit', 'reset'],
        ],
        'variant' => [
            'value' => $variant,
            'options' => [
                'default',
                'outline',
                'secondary',
                'ghost',
                'destructive',
                'link',
            ],
        ],
        'size' => [
            'value' => $size,
            'options' => [
                'default',
                'xs',
                'sm',
                'lg',
                'icon',
                'icon-xs',
                'icon-sm',
                'icon-lg',
            ],
        ],
    ]);
    $base = 'gap-2 text-sm shadow-none flex items-center';
    $sizeClasses = match ($size) {
        'default'
            => 'h-6 gap-1 rounded-[calc(var(--radius)-3px)] px-1.5 [&>svg:not([class*=\'size-\'])]:size-3.5',
        'xs' => 'h-5 px-1 text-xs',
        'sm' => 'h-6 px-1.5 text-xs',
        'lg' => 'h-8 px-2 text-sm',
        'icon', 'icon-xs', 'icon-sm', 'icon-lg' => 'size-6',
        default => '',
    };
    $classes = [$base, $sizeClasses, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'input-group-button',
    ];
@endphp

<x-bladcn::button :class="$class"
    :id="$id"
    :style="$style"
    :type="$type"
    :variant="$variant"
    {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</x-bladcn::button>

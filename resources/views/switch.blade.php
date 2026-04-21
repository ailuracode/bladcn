@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'defaultChecked' => false,
    'size' => 'default',
    'disabled' => false,
    'transition' => true,
])

@php
    bladcnOptionsValidator('switch', [
        'default-checked' => [
            'value' => $defaultChecked,
            'options' => [true, false],
        ],
        'size' => ['value' => $size, 'options' => ['default', 'sm']],
        'disabled' => ['value' => $disabled, 'options' => [true, false]],
        'transition' => ['value' => $transition, 'options' => [true, false]],
    ]);

    $transitionClasses = $transition ? 'transition-colors duration-200' : '';
    $thumbTransitionClasses = $transition
        ? 'transition-transform duration-200'
        : '';

    $switchClasses =
        'group/switch relative inline-flex items-center data-[size=default]:h-[18.4px] data-[size=sm]:h-3.5 data-[size=default]:w-8 data-[size=sm]:w-6';

    $switchAttrs = [
        'data-slot' => 'switch',
        'data-size' => $size,
        'data-disabled' => $disabled ? 'true' : null,
        'class' => $switchClasses,
    ];

    $inputClass =
        'bg-input dark:bg-input/80 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 checked:bg-primary aria-[invalid]:ring-destructive/20 dark:aria-[invalid]:ring-destructive/40 aria-[invalid]:border-destructive dark:aria-[invalid]:border-destructive/50 aria-[invalid]:ring-3 peer size-full appearance-none rounded-full ' .
        $transitionClasses .
        ' disabled:cursor-not-allowed disabled:opacity-50';

    $inputAttrs = [
        'data-slot' => 'switch-control',
        'disabled' => $disabled ? '' : null,
        'data-disable' => $disabled ? 'true' : null,
        'checked' => $defaultChecked,
        'class' => $inputClass,
        'type' => 'checkbox',
    ];

    $thumbClass =
        'bg-foreground peer-checked:bg-primary-foreground pointer-events-none absolute left-px rounded-full ' .
        $thumbTransitionClasses .
        ' peer-disabled:opacity-50 group-data-[size=default]/switch:size-4 group-data-[size=sm]/switch:size-3 group-data-[size=default]/switch:peer-checked:translate-x-[calc(100%-2px)] group-data-[size=sm]/switch:peer-checked:translate-x-[calc(100%-2px)]';
@endphp

<div
    {{ $attributes->except(['aria-invalid'])->whereDoesntStartWith(['x-on:', 'wire:', '@'])->merge($switchAttrs) }}>
    <input
        {{ $attributes->except(['class', 'data-size'])->merge($inputAttrs) }} />
    <span @class($thumbClass)
        data-slot='switch-thumb'></span>
</div>

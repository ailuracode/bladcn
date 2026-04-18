@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Basic\Disabled)

@aware(['value', 'transition' => true])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'disabled' => false,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('accordion.item', [
        'type' => [
            'value' => $asChild,
            'options' => [true, false],
        ],
        'disabled' => [
            'value' => $disabled,
            'options' => [true, false],
        ],
    ]);

    $base =
        'group/accordion-trigger relative flex w-full items-start justify-between rounded-lg border border-transparent py-2.5 text-left text-sm font-medium outline-none transition-all hover:underline disabled:pointer-events-none disabled:opacity-50 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 focus-visible:after:border-ring **:data-[slot=accordion-trigger-icon]:ml-auto **:data-[slot=accordion-trigger-icon]:size-4 **:data-[slot=accordion-trigger-icon]:text-muted-foreground';
    $classes = [$base, $class];

    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-accordion-value' => $value,
        'data-slot' => 'accordion-trigger',
        'type' => 'button',
        'disabled' => $disabled ? '' : null,
        'data-disabled' => $disabled ? '' : null,
        ':aria-expanded' => 'isSelected("' . $value . '")',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild='$asChild'
    :attrs="$triggerAttrs"
    :class="$classes"
    x-on:click="toggle('{{ $value }}')">
    {{ $slot }}
    <svg @class([
        'pointer-events-none shrink-0',
        'transition-transform duration-200' => $transition,
    ])
        data-slot="accordion-trigger-icon"
        fill="none"
        height="16"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        stroke="currentColor"
        viewBox="0 0 24 24"
        width="16"
        x-bind:class="{ 'rotate-180': isSelected('{{ $value }}') }"
        xmlns="http://www.w3.org/2000/svg">
        <path d="m6 9 6 6 6-6" />
    </svg>
</x-bladcn::as-child>

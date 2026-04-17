@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\AsChild)
@use(AiluraCode\Bladcn\Enums\Basic\Disabled)
@use(AiluraCode\Bladcn\Enums\Basic\Transition)

@aware([
    'value' => null,
    'defaultValue' => null,
    'transition' => Transition::False,
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'disabled' => Disabled::False,
    'asChild' => AsChild::False,
])

@php
    $isAsChild = AsChild::coerceFrom($asChild);
    $disabled = Disabled::coerceFrom($disabled);
    $transition = Transition::coerceFrom($transition);
    $isDefault = in_array($value, (array) $defaultValue);

    $base =
        'group/accordion-trigger relative flex w-full items-start justify-between rounded-lg border border-transparent py-2.5 text-left text-sm font-medium outline-none transition-all hover:underline disabled:pointer-events-none disabled:opacity-50 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 focus-visible:after:border-ring **:data-[slot=accordion-trigger-icon]:ml-auto **:data-[slot=accordion-trigger-icon]:size-4 **:data-[slot=accordion-trigger-icon]:text-muted-foreground';
    $classes = [$base, $class];

    $triggerAttrs = [
        'id' => $id,
        'style' => $style,
        'data-accordion-value' => $value,
        'data-slot' => 'accordion-trigger',
        'type' => 'button',
        'disabled' => $disabled->toHtml(),
        'data-disabled' => $disabled->toHtml(),
        ':aria-expanded' => '$data.isSelected("' . $value . '")',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild"
    :attrs="$triggerAttrs"
    :class="$classes"
    x-on:click="toggle('{{ $value }}')">
    {{ $slot }}
    <x-lucide-chevron-down @class([
        'pointer-events-none shrink-0',
        'transition-transform duration-200' => $transition->isTrue(),
        'rotate-180' => $isDefault,
    ])
        data-slot="accordion-trigger-icon"
        x-bind:class='{ "rotate-180": $data.isSelected("{{ $value }}") }' />
</x-bladcn::as-child>

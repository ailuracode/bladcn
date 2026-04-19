@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'for' => null,
    'style' => null,
    'disabled' => false,
    'asChild' => false,
])

@php
    bladcnOptionsValidator('field.label', [
        'as-child' => ['value' => $asChild, 'options' => [true, false]],
    ]);
    $base =
        'has-data-checked:bg-primary/5 has-data-checked:border-primary/30 dark:has-data-checked:border-primary/20 dark:has-data-checked:bg-primary/10 gap-2 group-data-[disabled=true]/field:opacity-50 has-[>[data-slot=field]]:rounded-lg has-[>[data-slot=field]]:border *:data-[slot=field]:p-2.5 group/field-label peer/field-label flex w-fit leading-snug has-[>[data-slot=field]]:w-full has-[>[data-slot=field]]:flex-col';
    $classes = [$base, $class];
    $labelAttrs = [
        'id' => $id,
        'for' => $for,
        'style' => $style,
        'data-slot' => 'field-label',
        ...$attributes->toArray(),
    ];
@endphp

<x-bladcn::as-child :asChild="$asChild"
    :attrs="$labelAttrs"
    :class="$classes"
    tag="label">
    {{ $slot }}
</x-bladcn::as-child>

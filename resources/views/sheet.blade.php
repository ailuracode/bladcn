@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Disabled)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'expanded' => false,
    'transition' => false,
    'disabled' => Disabled::False,
])

@php
    $expanded = filter_var($expanded, FILTER_VALIDATE_BOOLEAN);
    $transition = filter_var($transition, FILTER_VALIDATE_BOOLEAN);
    $disabled = Disabled::coerceFrom($disabled);
    $isDisabled = $disabled->isTrue();
    $classes = [$isDisabled ? 'pointer-events-none opacity-50' : '', $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'sheet',
        'x-data' => '{ open: ' . ($expanded ? 'true' : 'false') . ' }',
        'x-init' =>
            "\$watch('open', value => \$dispatch('expanded', { open: value }))",
        'x-on:keydown.escape.window' => 'open = false',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>{{ $slot }}</div>

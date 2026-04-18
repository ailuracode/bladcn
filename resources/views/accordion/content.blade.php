@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@aware(['value', 'defaultValue', 'transition' => true])

@php
    $isDefault = !in_array($value, (array) $defaultValue, true);

    $base = 'overflow-hidden text-sm';
    $classes = [$base, $class];

    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'accordion-content',
        'x-cloak' => $isDefault ?: null,
        'x-collapse' => $transition,
        'x-show' => 'isSelected("' . $value . '")',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    <div
        class="[&_a]:underline-offset-3 [&_a]:hover:text-foreground pb-2.5 pt-0 [&_a]:underline [&_p:not(:last-child)]:mb-4">
        {{ $slot }}
    </div>
</div>

@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Transition)
@use(AiluraCode\Bladcn\Enums\Basic\Booleanish)

@aware([
    'value' => null,
    'defaultValue' => null,
    'transition' => Transition::False,
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $isDefault = Booleanish::coerceFrom(
        !in_array($value, (array) $defaultValue),
    );
    $transitionAttr = Transition::coerceFrom($transition)->toAlpineAttribute();

    $base = 'overflow-hidden text-sm';
    $classes = [$base, $class];

    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'accordion-content',
        'x-cloak' => $isDefault->toHtml(),
    ];

    if (is_array($transitionAttr)) {
        $attrs = array_merge($attrs, $transitionAttr);
    } else {
        $attrs[$transitionAttr] = '';
    }

    $attrs['x-show'] = '$data.isSelected("' . $value . '")';
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    <div
        class="[&_a]:underline-offset-3 [&_a]:hover:text-foreground pb-2.5 pt-0 [&_a]:underline [&_p:not(:last-child)]:mb-4">
        {{ $slot }}
    </div>
</div>

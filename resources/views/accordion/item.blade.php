@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'value' => null,
])

<div
    {{ $attributes->class(['not-last:border-b', $class])->merge([
        'id' => $id,
        'style' => $style,
        'data-slot' => 'accordion-item',
        'data-accordion-value' => $value,
    ]) }}>
    {{ $slot }}
</div>

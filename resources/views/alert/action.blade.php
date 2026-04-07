@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['absolute top-2 right-2 z-20', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'alert-action']) }}>
    {{ $slot }}
</div>

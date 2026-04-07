@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['px-4 group-data-[size=sm]/card:px-3', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'card-content']) }}>
    {{ $slot }}
</div>

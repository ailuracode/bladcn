@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['text-base leading-snug font-medium group-data-[size=sm]/card:text-sm', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'card-title']) }}>
    {{ $slot }}
</div>

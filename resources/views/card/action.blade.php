@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['col-start-2 row-span-2 row-start-1 self-start justify-self-end', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'card-action']) }}>
    {{ $slot }}
</div>

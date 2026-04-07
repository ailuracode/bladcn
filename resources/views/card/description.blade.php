@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['text-muted-foreground text-sm', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'card-description']) }}>
    {{ $slot }}
</div>

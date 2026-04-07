@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['bg-muted/50 rounded-b-xl border-t p-4 group-data-[size=sm]/card:p-3 flex items-center', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'card-footer']) }}>
    {{ $slot }}
</div>

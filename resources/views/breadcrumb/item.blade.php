@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<li
    {{ $attributes->class(['inline-flex items-center gap-1.5', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'breadcrumb-item']) }}>
    {{ $slot }}
</li>

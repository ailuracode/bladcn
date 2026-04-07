@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<span
    {{ $attributes->class(['text-foreground font-normal', $class])->merge(['id' => $id, 'style' => $style, 'aria-current' => 'page', 'aria-disabled' => 'true', 'data-slot' => 'breadcrumb-page', 'role' => 'link']) }}>
    {{ $slot }}
</span>

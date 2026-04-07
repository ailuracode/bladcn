@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<nav
    {{ $attributes->class([$class])->merge(['id' => $id, 'style' => $style, 'aria-label' => 'breadcrumb', 'data-slot' => 'breadcrumb']) }}>
    {{ $slot }}
</nav>

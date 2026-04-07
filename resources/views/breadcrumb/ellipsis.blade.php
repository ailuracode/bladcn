@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<span
    {{ $attributes->class(['flex size-9 items-center justify-center', $class])->merge(['id' => $id, 'style' => $style, 'aria-hidden' => 'true', 'data-slot' => 'breadcrumb-ellipsis', 'role' => 'presentation']) }}>
    <x-lucide-more-horizontal />
    <span class="sr-only">More</span>
</span>

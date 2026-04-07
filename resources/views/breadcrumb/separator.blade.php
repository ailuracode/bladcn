@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<li
    {{ $attributes->class(['[&>svg]:size-3.5', $class])->merge(['id' => $id, 'style' => $style, 'aria-hidden' => 'true', 'data-slot' => 'breadcrumb-separator', 'role' => 'presentation']) }}>
    @if ($slot->isEmpty())
        <x-lucide-chevron-right />
    @else
        {{ $slot }}
    @endif
</li>

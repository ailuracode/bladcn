@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['text-muted-foreground text-sm text-balance md:text-pretty [&_p:not(:last-child)]:mb-4 [&_a]:hover:text-foreground [&_a]:underline [&_a]:underline-offset-3', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'alert-description']) }}>
    {{ $slot }}
</div>

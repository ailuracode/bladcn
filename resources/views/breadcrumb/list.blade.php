@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<ol
    {{ $attributes->class(['text-muted-foreground flex flex-wrap items-center gap-1.5 text-sm break-words sm:gap-2.5', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'breadcrumb-list']) }}>
    {{ $slot }}
</ol>

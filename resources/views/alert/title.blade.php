@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<div
    {{ $attributes->class(['[&_a]:hover:text-foreground [&_a]:underline-offset-3 font-medium group-has-[>svg]/alert:col-start-2 [&_a]:underline', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'alert-title']) }}>
    {{ $slot }}
</div>

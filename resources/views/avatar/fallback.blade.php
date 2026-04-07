@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $base =
        'bg-muted text-muted-foreground flex size-full items-center justify-center rounded-full text-sm group-data-[size=sm]/avatar:text-xs';
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'avatar-fallback',
    ];
@endphp

<div {{ $attributes->class([$base, $class])->merge($attrs) }}>
    {{ $slot }}
</div>

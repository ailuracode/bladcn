@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

@php
    $classes = [
        'bg-muted relative rounded px-[0.3rem] py-[0.2rem] font-mono text-sm font-semibold',
        $class,
    ];

    $codeAttrs = [
        'id' => $id,
        'style' => $style,
        'data-slot' => 'code',
    ];
@endphp

<code {{ $attributes->class($classes)->merge($codeAttrs) }}>
    {{ $slot }}
</code>

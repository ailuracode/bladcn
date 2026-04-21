@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => 'horizontal',
])

<hr
    {{ $attributes->class([
            'shrink-0 bg-border data-horizontal:h-px data-horizontal:w-full data-vertical:w-px data-vertical:self-stretch',
            $class,
        ])->merge([
            'id' => $id,
            'style' => $style,
            'data-slot' => 'separator',
            'data-orientation' => $orientation,
            'role' => 'separator',
            'aria-orientation' => $orientation,
        ]) }}>
</hr>

@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => 'horizontal',
])

<div
    {{ $attributes->class([
            'bg-input relative self-stretch data-horizontal:mx-px data-horizontal:w-auto data-vertical:my-px data-vertical:h-auto',
            $class,
        ])->merge([
            'id' => $id,
            'style' => $style,
            'data-slot' => 'separator',
            'data-orientation' => $orientation,
            'role' => 'separator',
            'aria-orientation' => $orientation,
        ]) }}>
</div>

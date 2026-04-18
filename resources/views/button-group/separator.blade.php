@blaze(fold: true)

@use(AiluraCode\Bladcn\Enums\Basic\Orientation)

@aware([
    'orientation' => 'horizontal',
])

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<x-bladcn::separator
    {{ $attributes->class(['bg-input relative self-stretch data-horizontal:mx-px data-horizontal:w-auto data-vertical:my-px data-vertical:h-auto', $class])->merge(['id' => $id, 'style' => $style, 'data-slot' => 'button-group-separator', 'orientation' => $orientation]) }} />

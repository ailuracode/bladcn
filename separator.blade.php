@props([
    'decorative' => false,
    'orientation' => 'horizontal',
])

<div {{ $attributes->twMerge(
    'bg-border shrink-0',
    $orientation === 'horizontal' ? 'h-px w-full' : 'w-px self-stretch',
) }}
    data-slot="separator" decorative='{{ $decorative }}' orientation='{{ $orientation }}'>
</div>

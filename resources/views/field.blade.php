@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'orientation' => 'vertical',
])

@php
    bladcnOptionsValidator('field', [
        'orientation' => [
            'value' => $orientation,
            'options' => ['vertical', 'horizontal', 'responsive'],
        ],
    ]);
    $orientationClasses = match ($orientation) {
        'vertical' => 'flex-col *:w-full [&>.sr-only]:w-auto',
        'horizontal'
            => 'flex-row items-center *:data-[slot=field-label]:flex-auto has-[>[data-slot=field-content]]:items-start has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px',
        'responsive'
            => 'flex-col *:w-full [&>.sr-only]:w-auto @md/field-group:flex-row @md/field-group:items-center @md/field-group:*:w-auto @md/field-group:*:data-[slot=field-label]:flex-auto @md/field-group:has-[>[data-slot=field-content]]:items-start @md/field-group:has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px',
    };
    $base = 'aria-[invalid]:text-destructive gap-2 group/field flex w-full';
    $classes = [$base, $orientationClasses, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-orientation' => $orientation,
        'data-slot' => 'field',
        'role' => 'group',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}>
    {{ $slot }}
</div>

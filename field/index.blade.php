@props([
    'orientation' => 'vertical',
])

@php
    $variants = [
        'orientation' => [
            'vertical' => 'flex-col *:w-full [&>.sr-only]:w-auto',
            'horizontal' =>
                'flex-row items-center *:data-[slot=field-label]:flex-auto has-[>[data-slot=field-content]]:items-start has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px',
            'responsive' =>
                'flex-col *:w-full [&>.sr-only]:w-auto @md/field-group:flex-row @md/field-group:items-center @md/field-group:*:w-auto @md/field-group:*:data-[slot=field-label]:flex-auto @md/field-group:has-[>[data-slot=field-content]]:items-start @md/field-group:has-[>[data-slot=field-content]]:[&>[role=checkbox],[role=radio]]:mt-px',
        ],
    ];

    $base =
        'data-[invalid=true]:text-destructive gap-2 group/field flex w-full data-disabled:opacity-50';
@endphp

<div {{ $attributes->twMerge($base, $variants['orientation'][$orientation]) }}
    data-orientation='{{ $orientation }}'
    data-slot='field'
    role='group'>
    {{ $slot }}
</div>

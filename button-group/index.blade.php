@props([
    'orientation' => 'horizontal',
])

@php
    $variants = [
        'orientation' => [
            'horizontal' =>
                '[&>[data-slot]:not(:has(~[data-slot]))]:rounded-r-lg! [&>*:not(:first-child)]:rounded-l-none [&>*:not(:first-child)]:border-l-0 [&>*:not(:last-child)]:rounded-r-none',
            'vertical' =>
                '[&>[data-slot]:not(:has(~[data-slot]))]:rounded-b-lg! flex-col [&>*:not(:first-child)]:rounded-t-none [&>*:not(:first-child)]:border-t-0 [&>*:not(:last-child)]:rounded-b-none',
        ],
    ];
@endphp

<div {{ $attributes->twMerge('has-[>[data-slot=button-group]]:gap-2 has-[select[aria-hidden=true]:last-child]:[&>[data-slot=select-trigger]:last-of-type]:rounded-r-lg flex w-fit items-stretch *:focus-visible:z-10 *:focus-visible:relative [&>[data-slot=select-trigger]:not([class*=\'w-\'])]:w-fit [&>input]:flex-1 ' . $variants['orientation'][$orientation]) }}
    data-orientation="{{ $orientation }}"
    data-slot="button-group"
    role="group">
    {{ $slot }}
</div>

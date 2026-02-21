@php
    $base =
        'text-muted-foreground text-sm text-balance md:text-pretty [&_p:not(:last-child)]:mb-4 [&_a]:hover:text-foreground [&_a]:underline [&_a]:underline-offset-3';
@endphp

<div
    {{ $attributes->merge([
        'class' => $base,
        'data-slot' => 'alert-description',
    ]) }}>
    {{ $slot }}
</div>

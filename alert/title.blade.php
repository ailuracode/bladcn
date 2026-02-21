@php
    $base =
        '[&_a]:hover:text-foreground [&_a]:underline-offset-3 font-medium group-has-[>svg]/alert:col-start-2 [&_a]:underline';
@endphp

<div
    {{ $attributes->merge([
        'class' => $base,
        'data-slot' => 'alert-title',
    ]) }}>
    {{ $slot }}
</div>

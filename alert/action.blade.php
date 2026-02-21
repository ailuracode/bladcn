@php
    $base = 'absolute top-2 right-2';
@endphp

<div
    {{ $attributes->merge([
        'class' => $base,
        'data-slot' => 'alert-action',
    ]) }}>
    {{ $slot }}
</div>

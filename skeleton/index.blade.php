@php
    $base = 'bg-muted rounded-md animate-pulse';
@endphp

<div {{ $attributes->merge([
    'class' => $base,
]) }}
    data-slot='skeleton'>
</div>

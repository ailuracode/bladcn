@props([
    'value' => null,
])

@aware([
    'defaultValue' => null,
])

@php
    $base = 'text-sm flex-1 outline-none';
@endphp

<div {{ $attributes->merge([
    'class' => $base,
]) }}
    @if ($value !== $defaultValue) x-cloak @endif
    data-slot="tabs-content"
    x-show="active === '{{ $value }}'">
    {{ $slot }}
</div>

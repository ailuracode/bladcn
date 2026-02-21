@props([
    'value' => null,
    'disabled' => false,
])

<div class='not-last:border-b'
    data-slot='accordion-item'>
    {{ $slot }}
</div>

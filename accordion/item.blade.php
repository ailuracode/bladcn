@props([
    'value' => null,
])

<div class='not-last:border-b'
    data-slot='accordion-item'>
    {{ $slot }}
</div>

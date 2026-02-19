@props([
    'ratio' => 'square',
])

<div class="[&>*]:aspect-{{ $ratio }}"
    data-slot="aspect-ratio">
    {{ $slot }}
</div>

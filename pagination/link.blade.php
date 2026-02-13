@props([
    'isActive' => false,
    'size' => 'icon',
])

<x-button {{ $attributes }}
    aria-current="{{ $isActive ? 'page' : null }}"
    as='a'
    data-active='{{ $isActive }}'
    data-slot='pagination-link'
    size='{{ $size }}'
    variant="{{ $isActive ? 'outline' : 'ghost' }}">
    {{ $slot }}
</x-button>

@props([
    'text' => 'Previous',
])

<x-pagination.link {{ $attributes->twMerge('pl-1.5!') }}
    aria-label='Go to previous page'
    size='default'>
    <x-lucide-chevron-left class='cn-rtl-flip'
        data-icon='inline-start' />
    <span class='hidden sm:block'>
        {{ $text }}
    </span>
</x-pagination.link>

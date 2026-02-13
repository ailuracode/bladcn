@props([
    'text' => 'Next',
])

<x-pagination.link {{ $attributes->twMerge('pr-1.5!') }}
    aria-label='Go to next page'
    size='default'>
    <span class='hidden sm:block'>
        {{ $text }}
    </span>
    <x-lucide-chevron-right class='cn-rtl-flip'
        data-icon='inline-start' />
</x-pagination.link>

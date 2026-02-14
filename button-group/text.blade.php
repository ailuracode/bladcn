@props([
    'as' => 'div',
])

<x-as-child
    {{ $attributes->twMerge("bg-muted gap-2 rounded-lg border px-2.5 text-sm font-medium [&_svg:not([class*='size-'])]:size-4 flex items-center [&_svg]:pointer-events-none") }}
    data-slot="button-group-text"
    tag='{{ $as }}'>
    {{ $slot }}
</x-as-child>

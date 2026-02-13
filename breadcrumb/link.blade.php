@props([
    'as' => 'a',
])

<x-as-child :as="$as"
    {{ $attributes->twMerge('hover:text-foreground transition-colors') }}
    data-slot="breadcrumb-link">
    {{ $slot }}
</x-as-child>

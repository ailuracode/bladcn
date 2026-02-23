@props([
    'as' => 'a',
])

<x-as-child
    {{ $attributes->merge([
        'class' => 'hover:text-foreground transition-colors',
    ]) }}
    data-slot="breadcrumb-link"
    tag={{ $as }}>
    {{ $slot }}
</x-as-child>

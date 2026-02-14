@props([
    'as' => 'div',
])

@aware(['open'])

<x-as-child {{ $attributes->merge(!$open ? ['x-cloak' => true] : []) }}
    data-slot='collapsible-content'
    tag='{{ $as }}'
    x-show='open'>
    {{ $slot }}
</x-as-child>

@props([
    'as' => 'span',
])

<div {{ $attributes }}
    data-slot='collapsible-trigger'
    x-on:click='toggle'>
    {{ $slot }}
</div>

@props([
    'expanded' => false,
    'transition' => false,
])

<div {{ $attributes }}
    data-slot="sheet"
    x-data="{ open: @js($expanded) }"
    x-init="$watch('open', value => $dispatch('expanded', { open: value }))"
    x-on:keydown.escape.window="open = false">
    {{ $slot }}
</div>

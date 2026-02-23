@props([
    'variant' => 'default',
    'size' => 'default',
])

<x-button size="{{ $size }}"
    variant="{{ $variant }}"
    x-on:click="open = false">
    <div {{ $attributes->merge([
        'class' => '',
    ]) }}
        data-slot="alert-dialog-action">
        {{ $slot }}
    </div>
</x-button>

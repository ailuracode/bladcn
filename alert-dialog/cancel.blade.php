@props([
    'variant' => 'outline',
    'size' => 'default',
])

<x-button as-child="true" size="{{ $size }}" variant="{{ $variant }}" x-on:click="open = false">
    <div {{ $attributes->twMerge('') }} data-slot="alert-dialog-cancel">
        {{ $slot }}
    </div>
</x-button>

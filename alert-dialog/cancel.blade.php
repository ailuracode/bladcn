@props([
    'variant' => 'outline',
    'size' => 'default',
])

<x-button size="{{ $size }}" variant="{{ $variant }}" x-on:click="open = false">
    <div {{ $attributes->twMerge('') }} data-slot="alert-dialog-cancel">
        {{ $slot }}
    </div>
</x-button>

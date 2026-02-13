@props([
    'size' => 'default',
])

@php
    $sizes = [
        'default' => 'w-full sm:w-[450px]',
        'sm' => 'w-full sm:w-[400px]',
    ];
@endphp

<x-alert-dialog.portal>
    <x-alert-dialog.overlay>
        <div {{ $attributes->twMerge('data-open:animate-in data-closed:animate-out data-closed:fade-out-0 data-open:fade-in-0 data-closed:zoom-out-95 data-open:zoom-in-95 bg-background ring-foreground/10 gap-4 rounded-xl p-4 ring-1 duration-100 data-[size=default]:max-w-xs data-[size=sm]:max-w-xs data-[size=default]:sm-max-w-sm group/alert-dialog-content fixed top-1/2 left-1/2 z-50 grid w-full -translate-x-1/2 -translate-y-1/2 outline-none') }}
            data-size="{{ $size }}"
            data-slot="alert-dialog-content"
            x-on:click.away="open = false"
            x-on:keydown.escape.window="open = false"
            x-show="open"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter="transition ease-out duration-200"
            x-transition:leave-end="opacity-0 scale-95"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150">
            {{ $slot }}
        </div>
    </x-alert-dialog.overlay>
</x-alert-dialog.portal>

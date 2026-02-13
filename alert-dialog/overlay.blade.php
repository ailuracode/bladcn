@aware(['open'])

<div {{ $attributes->twMerge('data-open:animate-in data-closed:animate-out data-closed:fade-out-0 data-open:fade-in-0 bg-black/10 duration-100 supports-backdrop-filter:backdrop-blur-xs fixed inset-0 z-50') }}
    @if (!$open) x-cloak @endif
    data-slot="alert-dialog-overlay"
    x-show="open">
    {{ $slot }}
</div>

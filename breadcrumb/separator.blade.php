<li {{ $attributes->twMerge('[&>svg]:size-3.5') }}
    aria-hidden="true"
    data-slot="breadcrumb-separator"
    role="presentation">
    @if ($slot->isEmpty())
        <x-lucide-chevron-right />
    @else
        {{ $slot }}
    @endif
</li>

<span
    {{ $attributes->merge([
        'class' =>
            "size-8 [&_svg:not([class*='size-'])]:size-4 flex items-center justify-center",
    ]) }}
    aria-hidden
    data-slot="pagination-ellipsis">
    <x-lucide-more-horizontal />
    <span class="sr-only">
        More pages
    </span>
</span>

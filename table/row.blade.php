<tr {{ $attributes->twMerge('hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors') }}
    data-slot='table-row'>
    {{ $slot }}
</tr>

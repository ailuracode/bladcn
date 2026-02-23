<tfoot
    {{ $attributes->merge([
        'class' => 'bg-muted/50 border-t font-medium [&>tr]:last:border-b-0',
    ]) }}
    data-slot='table-footer'>
    {{ $slot }}
</tfoot>

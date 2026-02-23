<tbody
    {{ $attributes->merge([
        'class' => '[&_tr:last-child]:border-0',
    ]) }}
    data-slot='table-body'>
    {{ $slot }}
</tbody>

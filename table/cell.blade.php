<td {{ $attributes->merge([
    'class' =>
        'p-2 align-middle whitespace-nowrap [&:has([role=checkbox])]:pr-0',
]) }}
    data-slot='table-cell'>
    {{ $slot }}
</td>

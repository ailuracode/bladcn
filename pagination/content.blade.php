<ul {{ $attributes->merge([
    'class' => 'gap-0.5 flex items-center',
]) }}
    data-slot="pagination-content">
    {{ $slot }}
</ul>

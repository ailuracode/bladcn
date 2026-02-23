<li {{ $attributes->merge([
    'class' => 'inline-flex items-center gap-1.5',
]) }}
    data-slot="breadcrumb-item">
    {{ $slot }}
</li>

<span
    {{ $attributes->merge([
        'class' => 'text-foreground font-normal',
    ]) }}
    aria-current="page"
    aria-disabled="true"
    data-slot="breadcrumb-page"
    role="link">
    {{ $slot }}
</span>

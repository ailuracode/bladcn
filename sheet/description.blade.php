<p {{ $attributes->merge([
    'class' => 'text-sm text-muted-foreground',
]) }}
    data-slot="sheet-description">
    {{ $slot }}
</p>

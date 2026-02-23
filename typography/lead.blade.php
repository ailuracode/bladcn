<p
    {{ $attributes->merge([
        'class' => 'text-muted-foreground text-xl',
    ]) }}>
    {{ $slot }}
</p>

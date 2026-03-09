<h2 {{ $attributes->merge([
    'class' => 'text-base font-medium text-foreground',
]) }}
    data-slot="sheet-title">
    {{ $slot }}
</h2>

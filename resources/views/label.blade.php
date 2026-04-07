@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
])

<label
    {{ $attributes->class([
            'gap-2 text-sm leading-none font-medium group-data-[disabled=true]:opacity-50 peer-disabled:opacity-50 flex items-center select-none group-data-[disabled=true]:pointer-events-none peer-disabled:cursor-not-allowed',
            $class,
        ])->merge([
            'id' => $id,
            'style' => $style,
            'data-slot' => 'field-label',
        ]) }}>
    {{ $slot }}
</label>

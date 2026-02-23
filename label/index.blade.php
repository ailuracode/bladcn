<label
    {{ $attributes->merge([
        'class' =>
            'gap-2 text-sm leading-none font-medium group-data-[disabled=true]:opacity-50 peer-disabled:opacity-50 flex items-center select-none group-data-[disabled=true]:pointer-events-none peer-disabled:cursor-not-allowed',
    ]) }}
    data-slot='field-label'>
    {{ $slot }}
</label>

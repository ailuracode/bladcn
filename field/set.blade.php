<fieldset
    {{ $attributes->merge([
        'class' =>
            'gap-4 has-[>[data-slot=checkbox-group]]:gap-3 has-[>[data-slot=radio-group]]:gap-3 flex flex-col',
    ]) }}
    data-slot='fieldset'>
    {{ $slot }}
</fieldset>

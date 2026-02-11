<div {{ $attributes->twMerge('gap-5 data-[slot=checkbox-group]:gap-3 *:data-[slot=field-group]:gap-4 group/field-group @container/field-group flex w-full flex-col') }}
    data-slot='field-group'>
    {{ $slot }}
</div>

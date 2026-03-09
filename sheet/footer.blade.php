<div {{ $attributes->merge([
    'class' => 'flex flex-col gap-2 p-4 mt-auto',
]) }}
    data-slot="sheet-footer">
    {{ $slot }}
</div>

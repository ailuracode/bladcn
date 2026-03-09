<div {{ $attributes->merge([
    'class' => 'flex flex-col gap-0.5 p-4',
]) }}
    data-slot="sheet-header">
    {{ $slot }}
</div>

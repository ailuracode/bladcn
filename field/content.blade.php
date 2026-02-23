<div {{ $attributes->merge([
    'class' => 'gap-0.5 group/field-content flex flex-1 flex-col leading-snug',
]) }}
    data-slot="field-content">
    {{ $slot }}
</div>

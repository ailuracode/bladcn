<div {{ $attributes->merge([
    'class' =>
        'text-base leading-snug font-medium group-data-[size=sm]/card:text-sm',
]) }}
    data-slot="card-title">
    {{ $slot }}
</div>

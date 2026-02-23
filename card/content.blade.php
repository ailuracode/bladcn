<div {{ $attributes->merge([
    'class' => 'px-4 group-data-[size=sm]/card:px-3',
]) }}
    data-slot="card-content">
    {{ $slot }}
</div>

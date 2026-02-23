<nav {{ $attributes->merge([
    'class' => 'mx-auto flex w-full justify-center',
]) }}
    aria-label='pagination'
    data-slot='pagination'
    role='navigation'>
    {{ $slot }}
</nav>

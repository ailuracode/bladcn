<div class='relative w-full overflow-x-auto'
    data-slot='table-container'>
    <table
        {{ $attributes->merge([
            'class' => 'w-full caption-bottom text-sm',
        ]) }}
        data-slot='table'>
        {{ $slot }}
    </table>
</div>

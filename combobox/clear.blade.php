@props([
    'size' => null,
    'variant' => null,
])

<div {{ $attributes }}
    class='combobox-clear'>
    <x-input-group.button :size='$size'
        :variant='$variant'>
        <x-lucide-x class='pointer-events-none' />
    </x-input-group.button>
</div>

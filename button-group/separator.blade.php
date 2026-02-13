@aware([
    'orientation' => 'horizontal',
])

<x-separator
    {{ $attributes->twMerge('bg-input relative self-stretch data-horizontal:mx-px data-horizontal:w-auto data-vertical:my-px data-vertical:h-auto') }}
    data-slot="button-group-separator"
    orientation="{{ $orientation }}" />

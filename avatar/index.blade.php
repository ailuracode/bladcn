@props([
    'size' => 'default',
])

<div {{ $attributes->merge([
    'class' =>
        'group/avatar relative flex size-8 shrink-0 rounded-full select-none data-[size=lg]:size-10 data-[size=sm]:size-6',
]) }}
    data-size='{{ $size }}'
    data-slot='avatar'
    x-data='avatar'
    x-ref='avatar'>
    {{ $slot }}
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('avatar', () => ({
                showImage: false,
                hasFallback: false,
                init() {
                    this.hasFallback = !!this.$refs.avatar
                        .querySelector(
                            '[data-slot=\'avatar-fallback\']');
                },
                setShowImage(value) {
                    if (this.hasFallback) {
                        this.showImage = value;
                    }
                },
            }))
        })
    </script>
@endonce

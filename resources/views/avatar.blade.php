@blaze(fold: true)

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'size' => 'default',
])

@php
    $base =
        'group/avatar relative flex size-8 shrink-0 rounded-full select-none data-[size=lg]:size-10 data-[size=sm]:size-6';
    $classes = [$base, $class];
    $attrs = [
        'id' => $id,
        'style' => $style,
        'data-size' => $size,
        'data-slot' => 'avatar',
    ];
@endphp

<div {{ $attributes->class($classes)->merge($attrs) }}
    x-data="avatar">
    {{ $slot }}
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('avatar', () => ({
                init() {
                    const img = this.$el.querySelector(
                        '[data-slot="avatar-image"]');
                    const fallback = this.$el.querySelector(
                        '[data-slot="avatar-fallback"]');
                    this.$nextTick(() => {
                        if (img && img.complete) {
                            if (img.naturalWidth > 0 &&
                                img.naturalHeight > 0) {
                                fallback.remove();
                            } else {
                                img.remove();
                                fallback.classList
                                    .remove('hidden');
                                fallback
                                    .removeAttribute(
                                        'hidden');
                            }
                        }
                    });
                },
            }));
        });
    </script>
@endonce

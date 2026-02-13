@props([
    'delay' => 0,
])

<div {{ $attributes->twMerge('relative inline-block w-min') }}
    data-slot="tooltip"
    x-data="{
        open: false,
        timer: null,
        delay: {{ $delay }},
        show() {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => this.open = true, this.delay);
        },
        hide() {
            clearTimeout(this.timer);
            this.open = false;
        }
    }">
    {{ $slot }}
</div>

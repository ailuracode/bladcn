<div class="relative"
    x-data="checkbox">
    <input {{ $attributes->except('class') }}
        class="peer sr-only"
        type="checkbox"
        x-model="checked"
        x-ref="checkbox">
    <span :data-checked="checked"
        {{ $attributes->twMerge(
            'border-input dark:bg-input/30 data-checked:bg-primary data-checked:text-primary-foreground dark:data-checked:bg-primary data-checked:border-primary aria-invalid:aria-checked:border-primary aria-invalid:border-destructive dark:aria-invalid:border-destructive/50 focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 flex size-4 items-center justify-center rounded-[4px] border transition-colors group-has-disabled/field:opacity-50 focus-visible:ring-3 aria-invalid:ring-3 relative shrink-0 outline-none after:absolute after:-inset-x-3 after:-inset-y-2 disabled:cursor-not-allowed disabled:opacity-50',
        ) }}
        data-slot="checkbox"
        x-on:click="toggle">
        <span class="pointer-events-none absolute inset-0 flex items-center justify-center"
            x-cloak
            x-show="checked">
            <x-lucide-check />
        </span>
    </span>
</div>


@once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkbox', () => ({
                checked: false,
                disabled: false,
                init() {
                    this.checked = this.$refs.checkbox.checked
                    this.disabled = this.$refs.checkbox.disabled
                },
                toggle() {
                    if (this.disabled) return;
                    this.checked = !this.checked;
                }
            }))
        })
    </script>
@endonce

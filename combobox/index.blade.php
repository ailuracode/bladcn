@props([
    'transition' => false,
    'expanded' => false,
    'multiple' => false,
    'defaultValue' => null,
])

@php
    $transition = (bool) $transition;
    $expanded = (bool) $expanded;
    $multiple = (bool) $multiple;
    if ($multiple && !is_array($defaultValue)) {
        $defaultValue = $defaultValue ? [$defaultValue] : [];
    } elseif (!$multiple && is_array($defaultValue)) {
        $defaultValue = $defaultValue[0] ?? null;
    }
@endphp

<div {{ $attributes }}
    x-data='combobox(@js($expanded), @js($multiple), @json($defaultValue))'
    x-ref='combobox'>
    {{ $slot }}
</div>

@pushOnce('bladcn-header')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('combobox', (open, multiple, defaultValue) => ({
                open: open,
                text: multiple ? '' : defaultValue || '',
                isMultiple: multiple,
                selected: defaultValue,

                $content: null,
                $items: null,

                init() {
                    this.$watch('open', value => {
                        this.$dispatch('open-change', value)
                    })

                    this.$watch('selected', value => {
                        this.$dispatch('selected', value)
                    })

                    this.$content = this.$refs.combobox.querySelector('[data-slot="combobox-content"]');

                    this.$items = Array.from(
                        this.$refs.combobox.querySelectorAll('[data-slot="combobox-item"]')
                    ).map(el => ({
                        el,
                        text: el.textContent.trim().toLowerCase(),
                    }));

                    if (this.text) {
                        const defaultItem = this.$items.find(item => item.text === this.text
                            .toLowerCase());
                        if (!defaultItem) {
                            console.warn(`Default value "${this.text}" not found in combobox items.`);
                            this.text = '';
                            this.selected = multiple ? [] : null;
                        }
                    }
                },

                search(delay = 0) {
                    setTimeout(() => {
                        if (this.selected && !this.isMultiple && this.selected
                            .toLowerCase() === this.text.toLowerCase()) {
                            return;
                        }
                        const query = this.text.toLowerCase();

                        let visible = 0;

                        for (const item of this.$items) {
                            const match = item.text.includes(query);
                            if (item.el.classList.contains('hidden') === match) {
                                item.el.classList.toggle('hidden', !match);
                            }

                            if (match) visible++;
                        }

                        this.$content?.toggleAttribute('data-empty', visible === 0);
                    }, delay);
                },

                toggleCombobox() {
                    this.set(!this.open)
                },

                set(value) {
                    if (this.open !== value) {
                        this.open = value
                    }
                },

                openCombobox() {
                    this.set(true)
                },

                closeCombobox() {
                    this.set(false)
                },

                clearCombobox() {
                    this.selected = this.isMultiple ? [] : null;
                    this.text = ''
                    this.closeCombobox()
                },

                selectItem(item) {
                    if (this.isMultiple) {
                        if (this.text !== '') {
                            this.closeCombobox()
                            this.text = ''
                        }
                        if (this.selected.includes(item)) {
                            this.selected = this.selected.filter(i => i !== item);
                        } else {
                            this.selected = [...this.selected, item];
                        }
                    } else {
                        this.closeCombobox()
                        this.text = item
                        this.selected = item
                    }
                    this.clearSearch(500)
                },

                clearSearch(delay = 0) {
                    setTimeout(() => {
                        for (const item of this.$items) {
                            item.el.classList.remove('hidden')
                        }
                    }, delay);
                },

                isSelected(text) {
                    if (this.isMultiple) {
                        return this.selected.includes(text);
                    }
                    return this.selected === text;
                },

                removeItem(item) {
                    if (this.isMultiple) {
                        this.selected = this.selected.filter(i => i !== item);
                    } else if (this.selected === item) {
                        this.selected = null;
                    }
                },
            }))
        })
    </script>
@endPushOnce

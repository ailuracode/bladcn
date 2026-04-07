@blaze(fold: true)

{{-- TODO: Complete --}}

@props([
    'id' => null,
    'class' => null,
    'style' => null,
    'value' => null,
])

@php
    if ($value) {
        $model = null;
    } elseif ($attributes->has('wire:model')) {
        $model = $attributes->wire('model')->value();
    } else {
        $model = null;
    }

    $calendarModel = $model ? '@entangle(\$model)' : $value ?? '';
@endphp

<div {{ $attributes->class(['bg-background w-fit rounded-xl border p-2', $class])->merge([
        'id' => $id,
        'style' => $style,
        'data-slot' => 'calendar',
    ]) }}
    x-data="calendar({{ $calendarModel }})"
    x-init="init()">
    <div class="my-2 flex items-center justify-between">
        <button @click="prevMonth"
            class="p-1"
            type="button">
            <x-lucide-chevron-left class="size-4" />
        </button>

        <div class="text-sm font-medium">
            <span x-text="monthLabel"></span>
        </div>

        <button @click="nextMonth"
            class="p-1"
            type="button">
            <x-lucide-chevron-right class="size-4" />
        </button>
    </div>

    <div class="flex py-3">
        <template :key="d"
            x-for="d in weekDays">
            <div class="text-muted-foreground flex-1 text-center text-xs"
                x-text="d"></div>
        </template>
    </div>

    <div class="grid grid-cols-7 gap-y-3">
        <template :key="day.date.toISOString()"
            x-for="day in days">
            <x-bladcn::button size="icon-sm"
                type="button"
                variant="ghost"
                x-bind:class="{
                    'text-muted-foreground': day.outside,
                    'bg-primary text-primary-foreground': isSelected(day),
                    'hover:bg-muted': !isSelected(day) && !day.outside,
                    'bg-muted': new Date().toDateString() === day.date
                        .toDateString()
                }"
                x-on:click="select(day)"
                x-text="day.label"></x-bladcn::button>
        </template>
    </div>
</div>

@once
    <script>
        addEventListener('alpine:init', () => {
            Alpine.data('calendar', (model) => ({
                today: new Date(),
                current: new Date(),
                selected: null,
                model,

                weekDays: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr',
                    'Sa'
                ],

                init() {
                    if (this.model) {
                        this.selected = new Date(this.model)
                        this.current = new Date(this.model)
                    }

                    this.build()

                    this.$watch('selected', value => {
                        if (!value) return

                        const ymd = this.toYmd(value)

                        if (this.model === ymd) return

                        this.model = ymd
                    })
                },

                toYmd(date) {
                    const y = date.getFullYear()
                    const m = String(date.getMonth() + 1)
                        .padStart(2, '0')
                    const d = String(date.getDate()).padStart(2,
                        '0')
                    return `${y}-${m}-${d}`
                },

                get monthLabel() {
                    if (!this.current) return ''
                    return this.current.toLocaleDateString(
                        'en-US', {
                            month: 'short',
                            year: 'numeric',
                        })
                },

                build() {
                    const year = this.current.getFullYear()
                    const month = this.current.getMonth()

                    const first = new Date(year, month, 1)
                    const startDay = first.getDay()

                    const daysInMonth = new Date(year, month +
                        1, 0).getDate()
                    const daysInPrevMonth = new Date(year,
                        month, 0).getDate()

                    this.days = []

                    for (let i = startDay - 1; i >= 0; i--) {
                        const d = daysInPrevMonth - i
                        this.days.push({
                            label: d,
                            outside: true,
                            date: new Date(year, month -
                                1, d),
                        })
                    }

                    for (let d = 1; d <= daysInMonth; d++) {
                        this.days.push({
                            label: d,
                            outside: false,
                            date: new Date(year, month,
                                d),
                        })
                    }

                    while (this.days.length % 7 !== 0) {
                        const d = this.days.length - (startDay +
                            daysInMonth) + 1
                        this.days.push({
                            label: d,
                            outside: true,
                            date: new Date(year, month +
                                1, d),
                        })
                    }
                },

                prevMonth() {
                    this.current = new Date(
                        this.current.getFullYear(),
                        this.current.getMonth() - 1,
                        1,
                    )
                    this.build()
                },

                nextMonth() {
                    this.current = new Date(
                        this.current.getFullYear(),
                        this.current.getMonth() + 1,
                        1,
                    )
                    this.build()
                },

                select(day) {
                    this.selected = day.date
                    this.$dispatch('selected', {
                        date: day.date,
                        bubbles: false,
                    })
                },

                isSelected(day) {
                    return this.selected && this.selected
                        .toDateString() === day.date
                        .toDateString()
                },
            }))
        })
    </script>
@endonce

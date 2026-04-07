# Calendar Component

The calendar component provides an interactive date picker with month navigation, built with Alpine.js.

## Dependencies

This component requires [mallardduck/blade-lucide-icons](https://github.com/mallardduck/blade-lucide-icons):

```bash
composer require mallardduck/blade-lucide-icons
```

## Usage

```bladehtml

<x-bladcn::calendar value="2026-02-21"/>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `value` | `string\|null` | `null`  | Initial date value     |

## Livewire Support

The calendar supports two-way binding with Livewire:

```bladehtml

<x-bladcn::calendar wire:model="selectedDate"/>

<x-bladcn::calendar wire:model.live="selectedDate"/>
```

## Data Attributes

- `data-slot="calendar"` - Calendar container

## Events

The calendar dispatches a `selected` event when a date is clicked:

```bladehtml

<x-bladcn::calendar x-on:selected.window="console.log($event.detail.date)"/>
```

## Examples

### Basic Calendar

```bladehtml

<x-bladcn::calendar/>
```

### With Initial Value

```bladehtml

<x-bladcn::calendar value="2026-04-15"/>
```

### With Livewire Binding

```bladehtml

<x-bladcn::calendar wire:model="bookingDate"/>
```

### With Livewire Live Binding

```bladehtml

<x-bladcn::calendar wire:model.live="bookingDate"/>
```

### With Additional Classes

```bladehtml

<x-bladcn::calendar class="shadow-lg"/>
```

### Handling Selection Event

```bladehtml

<x-bladcn::calendar x-on:selected.window="console.log($event.detail.date)"/>
```

### Listening to Date Changes

```bladehtml

<div>
    <x-bladcn::calendar wire:model="selectedDate"/>
    <p>Selected: {{ $selectedDate }}</p>
</div>
```

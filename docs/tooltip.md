# Tooltip Component

The tooltip component provides contextual information on hover.

## Usage

```bladehtml

<x-bladcn::tooltip>
    <x-bladcn::tooltip.trigger>
        <x-bladcn::button>Hover me</x-bladcn::button>
    </x-bladcn::tooltip.trigger>
    <x-bladcn::tooltip.content>
        This is a tooltip
    </x-bladcn::tooltip.content>
</x-bladcn::tooltip>
```

## Components

| Component         | Description            |
|-------------------|------------------------|
| `tooltip`         | Main tooltip container |
| `tooltip.trigger` | Trigger element        |
| `tooltip.content` | Tooltip content panel  |

## Props

### Tooltip Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `delay` | `int`          | `0`     | Hover delay in ms      |

### Trigger Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Content Props

| Prop    | Type           | Default     | Description            |
|---------|----------------|-------------|------------------------|
| `id`    | `string\|null` | `null`      | The element ID         |
| `class` | `string\|null` | `null`      | Additional CSS classes |
| `style` | `string\|null` | `null`      | Inline styles          |
| `side`  | `Side\|string` | `Side::Top` | Tooltip position side  |

## Enums

### Side Enum (`AiluraCode\Bladcn\Enums\Tooltip\Side`)

| Case     | Value      | Description           |
|----------|------------|-----------------------|
| `Top`    | `'top'`    | Show above trigger    |
| `Bottom` | `'bottom'` | Show below trigger    |
| `Left`   | `'left'`   | Show left of trigger  |
| `Right`  | `'right'`  | Show right of trigger |

## Data Attributes

- `data-slot="tooltip"` - Main tooltip container
- `data-slot="tooltip-trigger"` - Trigger element
- `data-slot="tooltip-content"` - Tooltip content

## Examples

### Basic Tooltip

```bladehtml

<x-bladcn::tooltip>
    <x-bladcn::tooltip.trigger>
        <x-bladcn::button variant="outline">Hover me</x-bladcn::button>
    </x-bladcn::tooltip.trigger>
    <x-bladcn::tooltip.content>
        This is helpful information
    </x-bladcn::tooltip.content>
</x-bladcn::tooltip>
```

### Tooltip with Delay

```bladehtml

<x-bladcn::tooltip delay="200">
    <x-bladcn::tooltip.trigger>
        <x-bladcn::button>Slow tooltip</x-bladcn::button>
    </x-bladcn::tooltip.trigger>
    <x-bladcn::tooltip.content>
        Appears after 200ms delay
    </x-bladcn::tooltip.content>
</x-bladcn::tooltip>
```

### Tooltip on Bottom

```bladehtml

<x-bladcn::tooltip>
    <x-bladcn::tooltip.trigger>
        <x-bladcn::button>Hover</x-bladcn::button>
    </x-bladcn::tooltip.trigger>
    <x-bladcn::tooltip.content side="bottom">
        Tooltip below
    </x-bladcn::tooltip.content>
</x-bladcn::tooltip>
```

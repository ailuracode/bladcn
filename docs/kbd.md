# Kbd Component

The kbd component is used to display keyboard shortcuts or key combinations.

## Usage

```bladehtml

<x-bladcn::kbd>Ctrl</x-bladcn::kbd>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="kbd"` - Keyboard key element

## Examples

### Basic Key

```bladehtml

<x-bladcn::kbd>A</x-bladcn::kbd>
```

### Key Combination

```bladehtml

<x-bladcn::kbd>Ctrl</x-bladcn::kbd>
<x-bladcn::kbd>+</x-bladcn::kbd>
<x-bladcn::kbd>S</x-bladcn::kbd>
```

### With Additional Classes

```bladehtml

<x-bladcn::kbd class="bg-primary text-primary-foreground">Shift</x-bladcn::kbd>
```

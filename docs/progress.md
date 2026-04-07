# Progress Component

The progress component displays a visual progress indicator.

## Usage

```bladehtml

<x-bladcn::progress value="75" />
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="progress"` - Progress element

## Examples

### Basic Progress

```bladehtml

<x-bladcn::progress value="50" />
```

### Progress with Custom Value

```bladehtml

<x-bladcn::progress value="75" class="h-3" />
```

### Indeterminate Progress

```bladehtml

<x-bladcn::progress />
```

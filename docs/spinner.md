# Spinner Component

The spinner component displays a loading animation.

## Usage

```bladehtml

<x-bladcn::spinner/>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="spinner"` - Spinner element
- `aria-label="loading"` - Accessibility label
- `role="status"` - ARIA role

## Examples

### Basic Spinner

```bladehtml

<x-bladcn::spinner/>
```

### Spinner with Custom Size

```bladehtml

<x-bladcn::spinner class="size-8"/>
```

### Spinner in Button

```bladehtml

<x-bladcn::button>
    <x-bladcn::spinner class="mr-2"/>
    Loading
</x-bladcn::button>
```

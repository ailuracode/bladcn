# Toggle Component

The toggle component provides a button that toggles between on/off states.

## Usage

```bladehtml

<x-bladcn::toggle>Bold</x-bladcn::toggle>
```

## Props

| Prop       | Type              | Default            | Description                    |
|------------|-------------------|--------------------|--------------------------------|
| `id`       | `string\|null`    | `null`             | The element ID                 |
| `class`    | `string\|null`    | `null`             | Additional CSS classes         |
| `style`    | `string\|null`    | `null`             | Inline styles                  |
| `variant`  | `Variant\|string` | `Variant::Default` | Visual style variant           |
| `size`     | `Size\|string`    | `Size::Default`    | Toggle size                    |
| `disabled` | `Disabled\|bool`  | `Disabled::False`  | Whether the toggle is disabled |

## Enums

### Variant Enum (`AiluraCode\Bladcn\Enums\Toggle\Variant`)

| Case      | Value       | Description   |
|-----------|-------------|---------------|
| `Default` | `'default'` | Default style |
| `Outline` | `'outline'` | Outline style |

### Size Enum (`AiluraCode\Bladcn\Enums\Toggle\Size`)

| Case      | Value       | Description  |
|-----------|-------------|--------------|
| `Default` | `'default'` | Default size |
| `Sm`      | `'sm'`      | Small size   |
| `Lg`      | `'lg'`      | Large size   |

## Data Attributes

- `data-slot="toggle"` - Toggle element
- `data-state="on|off"` - Current state

## Examples

### Basic Toggle

```bladehtml

<x-bladcn::toggle>Bold</x-bladcn::toggle>
```

### Outline Toggle

```bladehtml

<x-bladcn::toggle variant="outline">Italic</x-bladcn::toggle>
```

### Small Toggle

```bladehtml

<x-bladcn::toggle size="sm">Small</x-bladcn::toggle>
```

### Disabled Toggle

```bladehtml

<x-bladcn::toggle disabled>Disabled</x-bladcn::toggle>
```

### Toggle with Icon

```bladehtml

<x-bladcn::toggle>
    <x-bladcn::icon name="bold" />
</x-bladcn::toggle>
```

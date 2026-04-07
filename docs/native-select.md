# Native Select Component

The native select component provides a styled dropdown select element.

## Usage

```bladehtml

<x-bladcn::native-select>
    <x-bladcn::native-select.option value="">Select an option</x-bladcn::native-select.option>
    <x-bladcn::native-select.optgroup label="Group 1">
        <x-bladcn::native-select.option value="1">Option 1</x-bladcn::native-select.option>
        <x-bladcn::native-select.option value="2">Option 2</x-bladcn::native-select.option>
    </x-bladcn::native-select.optgroup>
</x-bladcn::native-select>
```

## Components

| Component                | Description           |
|--------------------------|-----------------------|
| `native-select`          | Main select wrapper   |
| `native-select.option`   | Select option element |
| `native-select.optgroup` | Option group element  |

## Props

### Native Select Props

| Prop       | Type             | Default           | Description            |
|------------|------------------|-------------------|------------------------|
| `id`       | `string\|null`   | `null`            | The element ID         |
| `class`    | `string\|null`   | `null`            | Additional CSS classes |
| `style`    | `string\|null`   | `null`            | Inline styles          |
| `size`     | `Size\|string`   | `Size::Default`   | Select size            |
| `disabled` | `Disabled\|bool` | `Disabled::False` | Disable the select     |

### Option Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Optgroup Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Enums

### Size Enum (`AiluraCode\Bladcn\Enums\NativeSelect\Size`)

| Case      | Value       | Description  |
|-----------|-------------|--------------|
| `Default` | `'default'` | Default size |
| `Sm`      | `'sm'`      | Small size   |

## Data Attributes

- `data-slot="native-select-wrapper"` - Main wrapper
- `data-slot="native-select"` - Select element
- `data-slot="native-select-option"` - Option element
- `data-slot="native-select-optgroup"` - Optgroup element
- `data-size` - Current size value

## Examples

### Small Select

```bladehtml

<x-bladcn::native-select size="sm">
    <x-bladcn::native-select.option value="1">Small Option</x-bladcn::native-select.option>
    <x-bladcn::native-select.option value="2">Another Option</x-bladcn::native-select.option>
</x-bladcn::native-select>
```

### Disabled Select

```bladehtml

<x-bladcn::native-select disabled>
    <x-bladcn::native-select.option value="1">Disabled Option</x-bladcn::native-select.option>
</x-bladcn::native-select>
```

### Select with Optgroup

```bladehtml

<x-bladcn::native-select>
    <x-bladcn::native-select.optgroup label="Fruits">
        <x-bladcn::native-select.option value="apple">Apple</x-bladcn::native-select.option>
        <x-bladcn::native-select.option value="banana">Banana</x-bladcn::native-select.option>
    </x-bladcn::native-select.optgroup>
    <x-bladcn::native-select.optgroup label="Vegetables">
        <x-bladcn::native-select.option value="carrot">Carrot</x-bladcn::native-select.option>
        <x-bladcn::native-select.option value="lettuce">Lettuce</x-bladcn::native-select.option>
    </x-bladcn::native-select.optgroup>
</x-bladcn::native-select>
```

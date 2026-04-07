# Input Group Component

The input group component provides a wrapper for inputs with addons.

## Usage

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.addon>
        <x-bladcn::icon name="search" />
    </x-bladcn::input-group.addon>
    <x-bladcn::input-group.input placeholder="Search" />
</x-bladcn::input-group>
```

## Components

| Component              | Description               |
|------------------------|---------------------------|
| `input-group`          | Main group wrapper        |
| `input-group.input`    | Input field               |
| `input-group.addon`    | Addon element (icon/text) |
| `input-group.button`   | Button addon              |
| `input-group.text`     | Text addon                |
| `input-group.textarea` | Textarea within group     |

## Props

### Input Group Props

| Prop       | Type             | Default           | Description            |
|------------|------------------|-------------------|------------------------|
| `id`       | `string\|null`   | `null`            | The element ID         |
| `class`    | `string\|null`   | `null`            | Additional CSS classes |
| `style`    | `string\|null`   | `null`            | Inline styles          |
| `disabled` | `Disabled\|bool` | `Disabled::False` | Disable the group      |

### Addon Props

| Prop       | Type             | Default           | Description            |
|------------|------------------|-------------------|------------------------|
| `id`       | `string\|null`   | `null`            | The element ID         |
| `class`    | `string\|null`   | `null`            | Additional CSS classes |
| `style`    | `string\|null`   | `null`            | Inline styles          |
| `align`    | `string`         | `'inline-start'`  | Addon alignment        |
| `disabled` | `Disabled\|bool` | `Disabled::False` | Disable the addon      |

### Button Props

| Prop      | Type              | Default          | Description            |
|-----------|-------------------|------------------|------------------------|
| `id`      | `string\|null`    | `null`           | The element ID         |
| `class`   | `string\|null`    | `null`           | Additional CSS classes |
| `style`   | `string\|null`    | `null`           | Inline styles          |
| `size`    | `Size\|string`    | `Size::Default`  | Button size            |
| `variant` | `Variant\|string` | `Variant::Ghost` | Button variant         |

## Data Attributes

- `data-slot="input-group"` - Main group container
- `data-slot="input-group-control"` - Input/textarea element
- `data-slot="input-group-addon"` - Addon element
- `data-slot="input-group-button"` - Button addon
- `data-slot="input-group-text"` - Text addon
- `data-align` - Addon alignment

## Examples

### With Icon Addon

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.addon>
        <x-bladcn::icon name="search" />
    </x-bladcn::input-group.addon>
    <x-bladcn::input-group.input placeholder="Search..." />
</x-bladcn::input-group>
```

### With Button Addon

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.input placeholder="Search" />
    <x-bladcn::input-group.button>
        <x-bladcn::icon name="magnifying-glass" />
    </x-bladcn::input-group.button>
</x-bladcn::input-group>
```

### With Multiple Addons

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.addon align="inline-start">+1</x-bladcn::input-group.addon>
    <x-bladcn::input-group.input placeholder="Phone number" />
    <x-bladcn::input-group.addon align="inline-end">
        <x-bladcn::icon name="x" />
    </x-bladcn::input-group.addon>
</x-bladcn::input-group>
```

### Block End Addon

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.input placeholder="0.00" />
    <x-bladcn::input-group.addon align="block-end">USD</x-bladcn::input-group.addon>
</x-bladcn::input-group>
```

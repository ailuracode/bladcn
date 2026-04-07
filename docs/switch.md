# Switch Component

The switch component provides a toggle switch for boolean values.

## Usage

```bladehtml

<x-bladcn::switch />
```

## Props

| Prop       | Type             | Default           | Description                    |
|------------|------------------|-------------------|--------------------------------|
| `id`       | `string\|null`   | `null`            | The element ID                 |
| `class`    | `string\|null`   | `null`            | Additional CSS classes         |
| `style`    | `string\|null`   | `null`            | Inline styles                  |
| `value`    | `bool`           | `false`           | Initial switch state           |
| `size`     | `Size\|string`   | `Size::Default`   | Switch size                    |
| `disabled` | `Disabled\|bool` | `Disabled::False` | Whether the switch is disabled |

## Enums

### Size Enum (`AiluraCode\Bladcn\Enums\Switch\Size`)

| Case      | Value       | Description  |
|-----------|-------------|--------------|
| `Default` | `'default'` | Default size |
| `Sm`      | `'sm'`      | Small size   |

## Data Attributes

- `data-slot="switch"` - Switch element
- `data-size` - Current size value
- `data-checked` - Present when checked
- `data-unchecked` - Present when unchecked
- `data-disabled` - Present when disabled

## Examples

### Basic Switch

```bladehtml

<x-bladcn::switch />
```

### Switch with Value

```bladehtml

<x-bladcn::switch value="{{ $notificationsEnabled }}" />
```

### Small Switch

```bladehtml

<x-bladcn::switch size="sm" />
```

### Disabled Switch

```bladehtml

<x-bladcn::switch disabled />
```

### Switch with Label

```bladehtml

<x-bladcn::field>
    <div class="flex items-center gap-2">
        <x-bladcn::switch id="notifications" />
        <x-bladcn::field.label>Enable notifications</x-bladcn::field.label>
    </div>
</x-bladcn::field>
```

# Slider Component

The slider component provides a range input control.

## Usage

```bladehtml

<x-bladcn::slider min="0" max="100" value="50" />
```

## Props

| Prop           | Type                  | Default                   | Description                    |
|----------------|-----------------------|---------------------------|--------------------------------|
| `id`           | `string\|null`        | `null`                    | The element ID                 |
| `class`        | `string\|null`        | `null`                    | Additional CSS classes         |
| `style`        | `string\|null`        | `null`                    | Inline styles                  |
| `min`          | `int`                 | `0`                       | Minimum value                  |
| `max`          | `int`                 | `100`                     | Maximum value                  |
| `step`         | `int`                 | `1`                       | Step increment                 |
| `value`        | `int\|array\|null`    | `null`                    | Current value(s)               |
| `defaultValue` | `int\|array\|null`    | `null`                    | Default value(s)               |
| `orientation`  | `Orientation\|string` | `Orientation::Horizontal` | Slider orientation             |
| `disabled`     | `Disabled\|bool`      | `Disabled::False`         | Whether the slider is disabled |

## Enums

### Orientation Enum (`AiluraCode\Bladcn\Enums\Basic\Orientation`)

| Case         | Value          | Description                 |
|--------------|----------------|-----------------------------|
| `Horizontal` | `'horizontal'` | Horizontal layout (default) |
| `Vertical`   | `'vertical'`   | Vertical layout             |

## Data Attributes

- `data-slot="slider"` - Slider element

## Examples

### Basic Slider

```bladehtml

<x-bladcn::slider min="0" max="100" value="50" />
```

### Slider with Step

```bladehtml

<x-bladcn::slider min="0" max="100" step="10" value="50" />
```

### Range Slider (Multiple Values)

```bladehtml

<x-bladcn::slider min="0" max="100" :value="[25, 75]" />
```

### Vertical Slider

```bladehtml

<x-bladcn::slider min="0" max="100" value="50" orientation="vertical" />
```

### Disabled Slider

```bladehtml

<x-bladcn::slider min="0" max="100" value="50" disabled />
```

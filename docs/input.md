# Input Component

The input component provides a styled text input field.

## Usage

```bladehtml

<x-bladcn::input placeholder="Enter text" />
```

## Props

| Prop    | Type           | Default  | Description            |
|---------|----------------|----------|------------------------|
| `id`    | `string\|null` | `null`   | The element ID         |
| `class` | `string\|null` | `null`   | Additional CSS classes |
| `style` | `string\|null` | `null`   | Inline styles          |
| `type`  | `string`       | `'text'` | Input type             |

## Data Attributes

- `data-slot="input"` - Input element

## Examples

### Basic Input

```bladehtml

<x-bladcn::input placeholder="Enter your name" />
```

### Email Input

```bladehtml

<x-bladcn::input type="email" placeholder="john@example.com" />
```

### Disabled Input

```bladehtml

<x-bladcn::input disabled placeholder="Disabled input" />
```

### With Field

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Username</x-bladcn::field.label>
    <x-bladcn::input placeholder="Enter username" />
</x-bladcn::field>
```

### With Input Group

```bladehtml

<x-bladcn::input-group>
    <x-bladcn::input-group.addon>@</x-bladcn::input-group.addon>
    <x-bladcn::input-group.input placeholder="username" />
</x-bladcn::input-group>
```

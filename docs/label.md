# Label Component

The label component provides a label for form inputs.

## Usage

```bladehtml

<x-bladcn::label>Email</x-bladcn::label>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="field-label"` - Label element

## Examples

### Basic Label

```bladehtml

<x-bladcn::label>Full Name</x-bladcn::label>
```

### Label with Input

```bladehtml

<x-bladcn::field>
    <x-bladcn::field.label>Email</x-bladcn::field.label>
    <x-bladcn::input type="email" placeholder="john@example.com"/>
</x-bladcn::field>
```

### Label with Additional Styling

```bladehtml

<x-bladcn::label class="text-primary font-semibold">Remember me</x-bladcn::label>
```

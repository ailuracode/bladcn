# Separator Component

The separator component provides a visual divider between content.

## Usage

```bladehtml

<x-bladcn::separator />
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="separator"` - Separator element

## Examples

### Basic Separator

```bladehtml

<div>
    <p>Content above</p>
    <x-bladcn::separator />
    <p>Content below</p>
</div>
```

### Vertical Separator

```bladehtml

<div class="flex items-center gap-4">
    <span>Left</span>
    <x-bladcn::separator orientation="vertical" class="h-8" />
    <span>Right</span>
</div>
```

### Separator with Text

```bladehtml

<x-bladcn::separator>or</x-bladcn::separator>
```

### Styled Separator

```bladehtml

<x-bladcn::separator class="bg-primary w-32" />
```

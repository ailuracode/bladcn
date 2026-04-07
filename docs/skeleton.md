# Skeleton Component

The skeleton component displays a placeholder loading state.

## Usage

```bladehtml

<x-bladcn::skeleton/>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="skeleton"` - Skeleton element

## Examples

### Basic Skeleton

```bladehtml

<x-bladcn::skeleton/>
```

### Skeleton with Custom Size

```bladehtml

<x-bladcn::skeleton class="h-4 w-32"/>
```

### Skeleton for Card

```bladehtml

<div class="space-y-2">
    <x-bladcn::skeleton class="h-4 w-full"/>
    <x-bladcn::skeleton class="h-4 w-3/4"/>
    <x-bladcn::skeleton class="h-4 w-1/2"/>
</div>
```

### Skeleton for Avatar

```bladehtml

<x-bladcn::avatar>
    <x-bladcn::avatar.fallback>
        <x-bladcn::skeleton class="size-full rounded-full"/>
    </x-bladcn::avatar.fallback>
</x-bladcn::avatar>
```

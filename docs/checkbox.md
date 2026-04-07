# Checkbox Component

The checkbox component provides a styled checkbox input with Alpine.js state management and check icon display.

## Dependencies

This component requires [mallardduck/blade-lucide-icons](https://github.com/mallardduck/blade-lucide-icons):

```bash
composer require mallardduck/blade-lucide-icons
```

## Usage

```bladehtml

<x-bladcn::checkbox checked/>
```

## Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="checkbox"` - Checkbox indicator element
- `data-checked` - Reflects checked state (`true` or `false`)

## Events

The checkbox supports all standard HTML checkbox events via `wire:model` or `x-model`.

## Examples

### Basic Checkbox

```bladehtml

<x-bladcn::checkbox/>
```

### Checked Checkbox

```bladehtml

<x-bladcn::checkbox checked/>
```

### With Label (using for attribute)

```bladehtml

<label class="flex items-center gap-2">
    <x-bladcn::checkbox id="terms"/>
    <span>Accept terms and conditions</span>
</label>
```

### With Livewire Binding

```bladehtml

<x-bladcn::checkbox wire:model="acceptTerms"/>
```

### Disabled Checkbox

```bladehtml

<x-bladcn::checkbox disabled/>
```

### With Additional Classes

```bladehtml

<x-bladcn::checkbox class="scale-110"/>
```

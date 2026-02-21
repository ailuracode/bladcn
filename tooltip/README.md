# Tooltip Component

## Example

```blade
<x-tooltip delay="300">
    <x-tooltip.trigger>
        <span>Text</span>
    </x-tooltip.trigger>
    <x-tooltip.content side="top">
        Top tooltip
    </x-tooltip.content>
</x-tooltip>
```

## Props

- `delay`: Delay in ms before showing tooltip (default: 0)
- `...attributes` (mergeable)

## Slots

- Tooltip content
- Subcomponents: trigger, content

## Subcomponents

### `<x-tooltip.trigger>`

**Props:**

- `...attributes` (mergeable)
  **Slots:** Trigger element
  **Example:**

```blade
<x-tooltip.trigger>
    <span>Text</span>
</x-tooltip.trigger>
```

### `<x-tooltip.content>`

**Props:**

- `side`: Position ('top', 'bottom', 'left', 'right') (default: 'top')
- `...attributes` (mergeable)
  **Slots:** Tooltip content
  **Example:**

```blade
<x-tooltip.content side="top">Top tooltip</x-tooltip.content>
```

## Details

Tooltip controlled by Alpine.js, shows contextual information on hover. Subcomponents allow customizing trigger and
content, as well as position.

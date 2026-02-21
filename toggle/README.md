# Toggle Component

## Example

```blade
<x-toggle variant="outline" size="sm">Toggle me</x-toggle>
```

## Props

- `variant`: Visual style ('default', 'outline') (default: 'default')
- `size`: Size ('default', 'sm', 'lg') (default: 'default')
- `disabled`: Disabled state (default: false)
- `...attributes` (mergeable)

## Slots

- Content (button label or icon)

## Details

A toggle button component with Alpine.js state. Supports variants, sizes, and disabled state. Applies Tailwind classes
for visual feedback and accessibility. Use for toggling on/off states in UIs.

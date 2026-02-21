# Tabs Component

## Example

```blade
<x-tabs orientation="vertical" defaultValue="tab1">
    <x-tabs.list variant="line">
        <x-tabs.trigger value="tab1">Tab 1</x-tabs.trigger>
        <x-tabs.trigger value="tab2">Tab 2</x-tabs.trigger>
    </x-tabs.list>
    <x-tabs.content value="tab1">Content for Tab 1</x-tabs.content>
    <x-tabs.content value="tab2">Content for Tab 2</x-tabs.content>
</x-tabs>
```

## Props

- `orientation`: 'horizontal' or 'vertical' (default: 'horizontal')
- `defaultValue`: Initial active tab value
- `...attributes` (mergeable)

## Slots

- Tab list, tab triggers, tab content

## Subcomponents

### `<x-tabs.list>`

**Props:**

- `variant`: 'default' or 'line' (default: 'default')
- `...attributes` (mergeable)
  **Slots:** Tab triggers
  **Example:**

```blade
<x-tabs.list variant="line">
    <x-tabs.trigger value="tab1">Tab 1</x-tabs.trigger>
</x-tabs.list>
```

### `<x-tabs.trigger>`

**Props:**

- `value`: Unique tab value
- `...attributes` (mergeable)
  **Slots:** Tab label or icon
  **Example:**

```blade
<x-tabs.trigger value="tab1">Tab 1</x-tabs.trigger>
```

### `<x-tabs.content>`

**Props:**

- `value`: Tab value to match
- `...attributes` (mergeable)
  **Slots:** Tab content
  **Example:**

```blade
<x-tabs.content value="tab1">Content for Tab 1</x-tabs.content>
```

## Details

Tabs component for navigation and content switching. Supports horizontal and vertical orientation, variants for tab
list, and dynamic content display. Uses Alpine.js for state management and Tailwind for styling.

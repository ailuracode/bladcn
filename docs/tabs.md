# Tabs Component

The tabs component provides a tabbed interface for organizing content.

## Usage

```bladehtml

<x-bladcn::tabs default-value="tab1">
    <x-bladcn::tabs.list>
        <x-bladcn::tabs.trigger value="tab1">Tab 1</x-bladcn::tabs.trigger>
        <x-bladcn::tabs.trigger value="tab2">Tab 2</x-bladcn::tabs.trigger>
    </x-bladcn::tabs.list>
    <x-bladcn::tabs.content value="tab1">Content 1</x-bladcn::tabs.content>
    <x-bladcn::tabs.content value="tab2">Content 2</x-bladcn::tabs.content>
</x-bladcn::tabs>
```

## Components

| Component      | Description                   |
|----------------|-------------------------------|
| `tabs`         | Main tabs container           |
| `tabs.list`    | Tab list container            |
| `tabs.trigger` | Individual tab trigger button |
| `tabs.content` | Tab panel content             |

## Props

### Tabs Props

| Prop           | Type                  | Default                   | Description            |
|----------------|-----------------------|---------------------------|------------------------|
| `id`           | `string\|null`        | `null`                    | The element ID         |
| `class`        | `string\|null`        | `null`                    | Additional CSS classes |
| `style`        | `string\|null`        | `null`                    | Inline styles          |
| `orientation`  | `Orientation\|string` | `Orientation::Horizontal` | Tabs orientation       |
| `defaultValue` | `string\|null`        | `null`                    | Default active tab     |

### List Props

| Prop      | Type              | Default            | Description            |
|-----------|-------------------|--------------------|------------------------|
| `id`      | `string\|null`    | `null`             | The element ID         |
| `class`   | `string\|null`    | `null`             | Additional CSS classes |
| `style`   | `string\|null`    | `null`             | Inline styles          |
| `variant` | `Variant\|string` | `Variant::Default` | List variant style     |

### Trigger Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `value` | `string`       | -       | Tab value/identifier   |

### Content Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `value` | `string`       | -       | Tab value/identifier   |

## Enums

### Orientation Enum (`AiluraCode\Bladcn\Enums\Basic\Orientation`)

| Case         | Value          | Description                 |
|--------------|----------------|-----------------------------|
| `Horizontal` | `'horizontal'` | Horizontal layout (default) |
| `Vertical`   | `'vertical'`   | Vertical layout             |

### Variant Enum (`AiluraCode\Bladcn\Enums\Tabs\Variant`)

| Case      | Value       | Description             |
|-----------|-------------|-------------------------|
| `Default` | `'default'` | Default with background |
| `Line`    | `'line'`    | Line/pill style         |

## Data Attributes

- `data-slot="tabs"` - Main tabs container
- `data-slot="tabs-list"` - Tab list container
- `data-slot="tabs-trigger"` - Tab trigger button
- `data-slot="tabs-content"` - Tab panel content
- `data-orientation` - Current orientation
- `data-variant` - Current variant
- `data-active` - Present when tab is active

## Examples

### Basic Tabs

```bladehtml

<x-bladcn::tabs default-value="account">
    <x-bladcn::tabs.list>
        <x-bladcn::tabs.trigger value="account">Account</x-bladcn::tabs.trigger>
        <x-bladcn::tabs.trigger value="password">Password</x-bladcn::tabs.trigger>
    </x-bladcn::tabs.list>
    <x-bladcn::tabs.content value="account">
        <p>Account settings content</p>
    </x-bladcn::tabs.content>
    <x-bladcn::tabs.content value="password">
        <p>Password settings content</p>
    </x-bladcn::tabs.content>
</x-bladcn::tabs>
```

### Vertical Tabs

```bladehtml

<x-bladcn::tabs orientation="vertical" default-value="overview">
    <x-bladcn::tabs.list>
        <x-bladcn::tabs.trigger value="overview">Overview</x-bladcn::tabs.trigger>
        <x-bladcn::tabs.trigger value="settings">Settings</x-bladcn::tabs.trigger>
    </x-bladcn::tabs.list>
    <x-bladcn::tabs.content value="overview">Overview content</x-bladcn::tabs.content>
    <x-bladcn::tabs.content value="settings">Settings content</x-bladcn::tabs.content>
</x-bladcn::tabs>
```

### Tabs with Line Variant

```bladehtml

<x-bladcn::tabs default-value="tab1">
    <x-bladcn::tabs.list variant="line">
        <x-bladcn::tabs.trigger value="tab1">Tab 1</x-bladcn::tabs.trigger>
        <x-bladcn::tabs.trigger value="tab2">Tab 2</x-bladcn::tabs.trigger>
    </x-bladcn::tabs.list>
    <x-bladcn::tabs.content value="tab1">Content 1</x-bladcn::tabs.content>
    <x-bladcn::tabs.content value="tab2">Content 2</x-bladcn::tabs.content>
</x-bladcn::tabs>
```

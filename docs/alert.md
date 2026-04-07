# Alert Components

The alert components provide contextual feedback for user actions with support for different variants and subcomponents
for title, description, and actions.

## Usage

```bladehtml

<x-bladcn::alert>
    <x-bladcn::alert.title>
        Payment Successful
    </x-bladcn::alert.title>
    <x-bladcn::alert.description>
        Your order has been processed and will ship soon.
    </x-bladcn::alert.description>
</x-bladcn::alert>
```

## Components

| Component     | Description                    |
|---------------|--------------------------------|
| `alert`       | Main alert container           |
| `title`       | Alert title/heading            |
| `description` | Alert descriptive text         |
| `action`      | Alert action button (absolute) |

## Props

### Alert Props

| Prop      | Type              | Default            | Description            |
|-----------|-------------------|--------------------|------------------------|
| `id`      | `string\|null`    | `null`             | The element ID         |
| `class`   | `string\|null`    | `null`             | Additional CSS classes |
| `style`   | `string\|null`    | `null`             | Inline styles          |
| `variant` | `Variant\|string` | `Variant::Default` | Visual style variant   |

### Title Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Description Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Action Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Variants

| Variant       | Description                                 |
|---------------|---------------------------------------------|
| `default`     | Default card style                          |
| `destructive` | Error/warning style with destructive colors |

## Data Attributes

- `data-slot="alert"` - Main alert container
- `data-slot="alert-title"` - Alert title
- `data-slot="alert-description"` - Alert description
- `data-slot="alert-action"` - Alert action button
- `data-variant` - Current variant value

## Examples

### Default Alert

```bladehtml

<x-bladcn::alert>
    <x-bladcn::alert.title>Note</x-bladcn::alert.title>
    <x-bladcn::alert.description>
        This is an informational alert.
    </x-bladcn::alert.description>
</x-bladcn::alert>
```

### Destructive Alert

```bladehtml

<x-bladcn::alert variant="destructive">
    <x-bladcn::alert.title>Error</x-bladcn::alert.title>
    <x-bladcn::alert.description>
        Something went wrong. Please try again.
    </x-bladcn::alert.description>
</x-bladcn::alert>
```

### With Action Button

```bladehtml

<x-bladcn::alert>
    <x-bladcn::alert.title>Update Available</x-bladcn::alert.title>
    <x-bladcn::alert.description>
        A new version is available for download.
    </x-bladcn::alert.description>
    <x-bladcn::alert.action>
        <x-bladcn::button size="sm">Update Now</x-bladcn::button>
    </x-bladcn::alert.action>
</x-bladcn::alert>
```

### With Icon

```bladehtml

<x-bladcn::alert>
    <x-bladcn::icons.check-circle class="size-4"/>
    <x-bladcn::alert.title>Success</x-bladcn::alert.title>
    <x-bladcn::alert.description>
        Your changes have been saved successfully.
    </x-bladcn::alert.description>
</x-bladcn::alert>
```

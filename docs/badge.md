# Badge Component

The `Badge` component is a lightweight, inline status indicator with support for multiple variants and the `asChild`
pattern for composability.

## Usage

```bladehtml
<x-bladcn::badge>
    Badge
</x-bladcn::badge>
```

## Props

| Prop      | Type                    | Default            | Description                     |
|-----------|-------------------------|--------------------|---------------------------------|
| `id`      | `string\|null`          | `null`             | The badge ID attribute          |
| `class`   | `string\|null`          | `null`             | Additional CSS classes          |
| `style`   | `string\|null`          | `null`             | Inline styles                   |
| `variant` | `Variant\|string`       | `Variant::Default` | Visual style variant            |
| `asChild` | `AsChild\|string\|bool` | `AsChild::False`   | Render props onto child element |

## Variants

| Variant       | Description                                |
|---------------|--------------------------------------------|
| `default`     | Primary solid badge                        |
| `outline`     | Bordered badge with transparent background |
| `secondary`   | Secondary solid badge                      |
| `ghost`       | Transparent badge with hover effect        |
| `destructive` | Red-toned badge for error states           |
| `link`        | Text-only link style                       |

```bladehtml

<x-bladcn::badge variant="default">Default</x-bladcn::badge>
<x-bladcn::badge variant="outline">Outline</x-bladcn::badge>
<x-bladcn::badge variant="secondary">Secondary</x-bladcn::badge>
<x-bladcn::badge variant="ghost">Ghost</x-bladcn::badge>
<x-bladcn::badge variant="destructive">Destructive</x-bladcn::badge>
<x-bladcn::badge variant="link">Link</x-bladcn::badge>
```

## As Child

The `asChild` prop allows rendering the badge styles onto a different element, useful for creating styled links or
integrating with router components.

```bladehtml
{{-- Render as a link --}}
<x-bladcn::badge asChild="true">
    <a href="/status">Status</a>
</x-bladcn::badge>

{{-- Works with router components --}}
<x-bladcn::badge asChild="true">
    <a href="{{ route('status') }}">Status</a>
</x-bladcn::badge>
```

## Data Attributes

The component exposes data attributes for styling and testing:

- `data-slot="badge"` - Identifies the element as a badge
- `data-variant` - Current variant value
- `role="status"` - Identifies the non-semantic element as a status indicator (when `asChild` is true)

## Examples

### Badge with Icon

```bladehtml
<x-bladcn::badge>
    <x-icon name="check"/>
    Verified
</x-bladcn::badge>
```

### Icon Only Badge

```bladehtml

<x-bladcn::badge variant="outline">
    <x-icon name="star"/>
</x-bladcn::badge>
```

### Full Width Badge

```bladehtml
<x-bladcn::badge class="w-full">
    Full Width Badge
</x-bladcn::badge>
```

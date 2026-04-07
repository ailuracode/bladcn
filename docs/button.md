# Button Component

The `Button` component is a versatile, accessible button element with support for multiple variants, sizes, and the
`asChild` pattern for composability.

## Usage

```bladehtml
<x-bladcn::button>
    Click me
</x-bladcn::button>
```

## Props

| Prop       | Type                     | Default            | Description                     |
|------------|--------------------------|--------------------|---------------------------------|
| `id`       | `string\|null`           | `null`             | The button ID attribute         |
| `class`    | `string\|null`           | `null`             | Additional CSS classes          |
| `style`    | `string\|null`           | `null`             | Inline styles                   |
| `type`     | `Type\|string`           | `Type::Button`     | HTML button type                |
| `variant`  | `Variant\|string`        | `Variant::Default` | Visual style variant            |
| `size`     | `Size\|string`           | `Size::Default`    | Button size                     |
| `disabled` | `Disabled\|string\|bool` | `Disabled::False`  | Disabled state                  |
| `asChild`  | `AsChild\|string\|bool`  | `AsChild::False`   | Render props onto child element |

## Variants

| Variant       | Description                                 |
|---------------|---------------------------------------------|
| `default`     | Primary solid button                        |
| `outline`     | Bordered button with transparent background |
| `secondary`   | Secondary solid button                      |
| `ghost`       | Transparent button with hover effect        |
| `destructive` | Red-toned button for destructive actions    |
| `link`        | Text-only link style                        |

```bladehtml

<x-bladcn::button variant="default">Default</x-bladcn::button>
<x-bladcn::button variant="outline">Outline</x-bladcn::button>
<x-bladcn::button variant="secondary">Secondary</x-bladcn::button>
<x-bladcn::button variant="ghost">Ghost</x-bladcn::button>
<x-bladcn::button variant="destructive">Destructive</x-bladcn::button>
<x-bladcn::button variant="link">Link</x-bladcn::button>
```

## Sizes

| Size      | Description                   |
|-----------|-------------------------------|
| `default` | Standard height (h-8)         |
| `xs`      | Extra small (h-6)             |
| `sm`      | Small (h-7)                   |
| `lg`      | Large (h-9)                   |
| `icon`    | Icon button (8x8)             |
| `icon-xs` | Extra small icon button (6x6) |
| `icon-sm` | Small icon button (7x7)       |
| `icon-lg` | Large icon button (9x9)       |

```bladehtml

<x-bladcn::button size="xs">XS</x-bladcn::button>
<x-bladcn::button size="sm">SM</x-bladcn::button>
<x-bladcn::button size="default">Default</x-bladcn::button>
<x-bladcn::button size="lg">LG</x-bladcn::button>
```

## Type

Controls the HTML `type` attribute.

| Type     | Description               |
|----------|---------------------------|
| `button` | Standard button (default) |
| `submit` | Form submission button    |
| `reset`  | Form reset button         |

```bladehtml
<x-bladcn::button type="submit">Submit</x-bladcn::button>
<x-bladcn::button type="reset">Reset</x-bladcn::button>
```

## Disabled State

```bladehtml
<x-bladcn::button disabled>Disabled</x-bladcn::button>
```

## As Child

The `asChild` prop allows rendering the button styles onto a different element, useful for creating styled links or
integrating with router components.

```bladehtml
{{-- Render as a link --}}
<x-bladcn::button asChild="true">
    <a href="/dashboard">Go to Dashboard</a>
</x-bladcn::button>

{{-- Works with router components --}}
<x-bladcn::button asChild="true">
    <a href="{{ route('home') }}">Home</a>
</x-bladcn::button>
```

When `asChild` is used with an `<a>` or `<area>` element, the `type` attribute is automatically removed since it is not
valid on anchor elements.

## Data Attributes

The component exposes data attributes for styling and testing:

- `data-slot="button"` - Identifies the element as a button
- `data-variant` - Current variant value
- `data-size` - Current size value
- `data-disabled` - Disabled state
- `role="button"` - Identifies the non button element as a button

## Examples

### Button with Icon

```bladehtml
<x-bladcn::button>
    <x-icon name="plus"/>
    Add Item
</x-bladcn::button>
```

### Icon Only Button

```bladehtml

<x-bladcn::button variant="outline" size="icon">
    <x-icon name="settings"/>
</x-bladcn::button>
```

### Full Width Button

```bladehtml
<x-bladcn::button class="w-full">
    Full Width
</x-bladcn::button>
```

# Button Group Component

The button group component provides a way to group buttons together with support for horizontal or vertical orientation,
separators, and text elements.

## Usage

```bladehtml

<x-bladcn::button-group>
    <x-bladcn::button>One</x-bladcn::button>
    <x-bladcn::button>Two</x-bladcn::button>
    <x-bladcn::button>Three</x-bladcn::button>
</x-bladcn::button-group>
```

## Components

| Component                | Description                        |
|--------------------------|------------------------------------|
| `button-group`           | Main wrapper for grouping elements |
| `button-group.separator` | Visual separator between elements  |
| `button-group.text`      | Text element within the group      |

## Props

### Button Group Props

| Prop          | Type                  | Default                   | Description                                    |
|---------------|-----------------------|---------------------------|------------------------------------------------|
| `id`          | `string\|null`        | `null`                    | The element ID                                 |
| `class`       | `string\|null`        | `null`                    | Additional CSS classes                         |
| `style`       | `string\|null`        | `null`                    | Inline styles                                  |
| `orientation` | `Orientation\|string` | `Orientation::Horizontal` | Group orientation (`horizontal` or `vertical`) |

### Separator Props

| Prop          | Type                  | Default                   | Description            |
|---------------|-----------------------|---------------------------|------------------------|
| `id`          | `string\|null`        | `null`                    | The element ID         |
| `class`       | `string\|null`        | `null`                    | Additional CSS classes |
| `style`       | `string\|null`        | `null`                    | Inline styles          |
| `orientation` | `Orientation\|string` | `Orientation::Horizontal` | Separator orientation  |

### Text Props

| Prop      | Type            | Default          | Description                     |
|-----------|-----------------|------------------|---------------------------------|
| `id`      | `string\|null`  | `null`           | The element ID                  |
| `class`   | `string\|null`  | `null`           | Additional CSS classes          |
| `style`   | `string\|null`  | `null`           | Inline styles                   |
| `asChild` | `AsChild\|bool` | `AsChild::False` | Render props onto child element |

## Enums

### AsChild Enum (`AiluraCode\Bladcn\Enums\Basic\AsChild`)

| Case    | Description                               |
|---------|-------------------------------------------|
| `True`  | Props are rendered onto the child element |
| `False` | Component renders its own element         |

### Orientation Enum (`AiluraCode\Bladcn\Enums\Basic\Orientation`)

| Case         | Value          | Description                 |
|--------------|----------------|-----------------------------|
| `Horizontal` | `'horizontal'` | Horizontal layout (default) |
| `Vertical`   | `'vertical'`   | Vertical layout             |

## Data Attributes

- `data-slot="button-group"` - Main button group container
- `data-slot="button-group-separator"` - Separator element
- `data-slot="button-group-text"` - Text element within the group
- `data-orientation` - Current orientation (`horizontal` or `vertical`)

## Examples

### Horizontal Button Group

```bladehtml

<x-bladcn::button-group orientation="horizontal">
    <x-bladcn::button>Save</x-bladcn::button>
    <x-bladcn::button variant="outline">Cancel</x-bladcn::button>
</x-bladcn::button-group>
```

### Vertical Button Group

```bladehtml

<x-bladcn::button-group orientation="vertical">
    <x-bladcn::button>One</x-bladcn::button>
    <x-bladcn::button-group.separator/>
    <x-bladcn::button>Two</x-bladcn::button>
    <x-bladcn::button-group.separator/>
    <x-bladcn::button>Three</x-bladcn::button>
</x-bladcn::button-group>
```

### With Text Element

```bladehtml

<x-bladcn::button-group orientation="vertical">
    <x-bladcn::button>Increase</x-bladcn::button>
    <x-bladcn::button-group.text>100%</x-bladcn::button-group.text>
    <x-bladcn::button>Decrease</x-bladcn::button>
</x-bladcn::button-group>
```

### With Separator

```bladehtml

<x-bladcn::button-group>
    <x-bladcn::button>Left</x-bladcn::button>
    <x-bladcn::button-group.separator/>
    <x-bladcn::button>Right</x-bladcn::button>
</x-bladcn::button-group>
```

### With AsChild

```bladehtml

<x-bladcn::button-group orientation="vertical">
    <x-bladcn::button>Click me</x-bladcn::button>
    <x-bladcn::button-group.text as-child>
        <span class="font-bold">Important text</span>
    </x-bladcn::button-group.text>
    <x-bladcn::button>Another action</x-bladcn::button>
</x-bladcn::button-group>
```

### With Additional Classes

```bladehtml

<x-bladcn::button-group class="bg-muted p-4 rounded-lg">
    <x-bladcn::button class="w-full">Submit</x-bladcn::button>
    <x-bladcn::button-group.separator class="bg-red-500"/>
    <x-bladcn::button class="w-full" variant="outline">Reset</x-bladcn::button>
</x-bladcn::button-group>
```

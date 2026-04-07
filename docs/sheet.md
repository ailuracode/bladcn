# Sheet Component

The sheet component provides a slide-out panel overlay for navigation or forms.

## Usage

```bladehtml

<x-bladcn::sheet>
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open Sheet</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content>
        <x-bladcn::sheet.header>
            <x-bladcn::sheet.title>Sheet Title</x-bladcn::sheet.title>
            <x-bladcn::sheet.description>Description text</x-bladcn::sheet.description>
        </x-bladcn::sheet.header>
        <x-bladcn::sheet.footer>
            <x-bladcn::button variant="outline" x-on:click="open = false">Cancel</x-bladcn::button>
            <x-bladcn::button>Confirm</x-bladcn::button>
        </x-bladcn::sheet.footer>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

## Components

| Component           | Description                    |
|--------------------|--------------------------------|
| `sheet`           | Main sheet container          |
| `sheet.trigger`    | Sheet trigger button         |
| `sheet.content`    | Sheet content panel           |
| `sheet.header`     | Sheet header section          |
| `sheet.footer`     | Sheet footer section          |
| `sheet.title`      | Sheet title                   |
| `sheet.description`| Sheet description            |
| `sheet.close`      | Close button                  |

## Props

### Sheet Props

| Prop       | Type              | Default          | Description               |
|------------|-------------------|------------------|---------------------------|
| `id`       | `string\|null`    | `null`           | The element ID           |
| `class`    | `string\|null`    | `null`           | Additional CSS classes   |
| `style`    | `string\|null`    | `null`           | Inline styles            |
| `expanded` | `bool`            | `false`          | Initial open state       |
| `transition`| `bool`           | `false`          | Enable transitions       |
| `disabled` | `Disabled\|bool`  | `Disabled::False`| Disable the sheet        |

### Content Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |
| `side`    | `Side\|string`    | `Side::Right`   | Sheet position           |

### Header Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |

### Footer Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |

### Title Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |

### Description Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |

### Trigger Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |
| `size`    | `Size\|string`    | `Size::Default` | Button size              |
| `variant` | `Variant\|string` | `Variant::Default`| Button variant         |
| `asChild` | `AsChild\|bool`   | `AsChild::False`| Render as child          |

### Close Props

| Prop      | Type              | Default          | Description               |
|-----------|-------------------|------------------|---------------------------|
| `id`      | `string\|null`    | `null`           | The element ID           |
| `class`   | `string\|null`    | `null`           | Additional CSS classes   |
| `style`   | `string\|null`    | `null`           | Inline styles            |
| `size`    | `Size\|string`    | `Size::Default` | Button size              |
| `variant` | `Variant\|string` | `Variant::Outline`| Button variant         |
| `asChild` | `AsChild\|bool`   | `AsChild::False`| Render as child          |

## Enums

### Side Enum (`AiluraCode\Bladcn\Enums\Sheet\Side`)

| Case    | Value     | Description          |
|---------|-----------|----------------------|
| `Right` | `'right'` | Slide from right     |
| `Left`  | `'left'`  | Slide from left      |
| `Top`   | `'top'`   | Slide from top       |
| `Bottom`| `'bottom'`| Slide from bottom    |

## Data Attributes

- `data-slot="sheet"` - Main container
- `data-slot="sheet-trigger"` - Trigger element
- `data-slot="sheet-content"` - Content panel
- `data-slot="sheet-header"` - Header section
- `data-slot="sheet-footer"` - Footer section
- `data-slot="sheet-title"` - Title element
- `data-slot="sheet-description"` - Description
- `data-slot="sheet-close"` - Close button
- `data-side` - Current side value

## Examples

### Sheet from Right

```bladehtml

<x-bladcn::sheet>
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open Right</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content>
        <x-bladcn::sheet.header>
            <x-bladcn::sheet.title>Right Sheet</x-bladcn::sheet.title>
            <x-bladcn::sheet.description>
                This sheet slides in from the right.
            </x-bladcn::sheet.description>
        </x-bladcn::sheet.header>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

### Sheet from Left

```bladehtml

<x-bladcn::sheet>
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open Left</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content side="left">
        <x-bladcn::sheet.header>
            <x-bladcn::sheet.title>Left Sheet</x-bladcn::sheet.title>
        </x-bladcn::sheet.header>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

### Sheet from Bottom

```bladehtml

<x-bladcn::sheet>
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open Bottom</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content side="bottom">
        <x-bladcn::sheet.title>Bottom Sheet</x-bladcn::sheet.title>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

### Sheet with Transition

```bladehtml

<x-bladcn::sheet transition="true">
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open with Transition</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content>
        <x-bladcn::sheet.header>
            <x-bladcn::sheet.title>Animated Sheet</x-bladcn::sheet.title>
        </x-bladcn::sheet.header>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

### Sheet with Footer

```bladehtml

<x-bladcn::sheet>
    <x-bladcn::sheet.trigger>
        <x-bladcn::button>Open with Footer</x-bladcn::button>
    </x-bladcn::sheet.trigger>
    <x-bladcn::sheet.content>
        <x-bladcn::sheet.header>
            <x-bladcn::sheet.title>Confirm Action</x-bladcn::sheet.title>
            <x-bladcn::sheet.description>
                Please confirm your action below.
            </x-bladcn::sheet.description>
        </x-bladcn::sheet.header>
        <x-bladcn::sheet.footer>
            <x-bladcn::button variant="outline" x-on:click="open = false">Cancel</x-bladcn::button>
            <x-bladcn::button>Confirm</x-bladcn::button>
        </x-bladcn::sheet.footer>
    </x-bladcn::sheet.content>
</x-bladcn::sheet>
```

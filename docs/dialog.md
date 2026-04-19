# Dialog Component

The dialog component provides a modal overlay for focused interactions.

## Usage

```bladehtml

<x-bladcn::dialog>
    <x-bladcn::dialog.trigger>
        <x-bladcn::button>Open Dialog</x-bladcn::button>
    </x-bladcn::dialog.trigger>
    <x-bladcn::dialog.content>
        <x-bladcn::dialog.header>
            <x-bladcn::dialog.title>Dialog Title</x-bladcn::dialog.title>
            <x-bladcn::dialog.description>Description text</x-bladcn::dialog.description>
        </x-bladcn::dialog.header>
        <x-bladcn::dialog.footer>
            <x-bladcn::button variant="outline" x-on:click="open = false">Cancel</x-bladcn::button>
            <x-bladcn::button>Confirm</x-bladcn::button>
        </x-bladcn::dialog.footer>
    </x-bladcn::dialog.content>
</x-bladcn::dialog>
```

## Components

| Component            | Description                      |
| -------------------- | -------------------------------- |
| `dialog`             | Main dialog container            |
| `dialog.trigger`     | Dialog trigger button            |
| `dialog.content`     | Modal content + overlay (portal) |
| `dialog.header`      | Modal header section             |
| `dialog.footer`      | Modal footer section             |
| `dialog.title`       | Modal title                      |
| `dialog.description` | Modal description                |
| `dialog.close`       | Close button                     |

## Props

### Dialog Props

| Prop         | Type           | Default | Description                       |
| ------------ | -------------- | ------- | --------------------------------- |
| `id`         | `string\|null` | `null`  | The element ID                    |
| `class`      | `string\|null` | `null`  | Additional CSS classes            |
| `style`      | `string\|null` | `null`  | Inline styles                     |
| `open`       | `bool`         | `false` | Initial open state                |
| `persistent` | `bool`         | `false` | Prevent closing on escape/overlay |
| `transition` | `bool`         | `true`  | Enable transitions                |

### Content Props

| Prop              | Type           | Default     | Description                                       |
| ----------------- | -------------- | ----------- | ------------------------------------------------- |
| `id`              | `string\|null` | `null`      | The element ID                                    |
| `class`           | `string\|null` | `null`      | Additional CSS classes                            |
| `style`           | `string\|null` | `null`      | Inline styles                                     |
| `size`            | `string`       | `'default'` | Dialog size (`sm`, `default`, `lg`, `xl`, `full`) |
| `showCloseButton` | `bool`         | `true`      | Show close button                                 |

## Size Options

| Value       | Description  |
| ----------- | ------------ |
| `'default'` | Default size |
| `'sm'`      | Small size   |
| `'lg'`      | Large size   |
| `'xl'`      | Extra large  |
| `'full'`    | Full screen  |

## Data Attributes

- `data-slot="dialog"` - Main dialog container
- `data-slot="dialog-portal"` - Portal wrapper
- `data-slot="dialog-overlay"` - Modal overlay (backdrop)
- `data-slot="dialog-trigger"` - Trigger element
- `data-slot="dialog-content"` - Modal content
- `data-slot="dialog-header"` - Header section
- `data-slot="dialog-footer"` - Footer section
- `data-slot="dialog-title"` - Title element
- `data-slot="dialog-description"` - Description
- `data-slot="dialog-close"` - Close button

## Examples

### Basic Dialog

```bladehtml

<x-bladcn::dialog>
    <x-bladcn::dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::dialog.trigger>
    <x-bladcn::dialog.content>
        <x-bladcn::dialog.title>Confirm Action</x-bladcn::dialog.title>
        <x-bladcn::dialog.description>
            Are you sure you want to continue?
        </x-bladcn::dialog.description>
    </x-bladcn::dialog.content>
</x-bladcn::dialog>
```

### Large Dialog

```bladehtml

<x-bladcn::dialog>
    <x-bladcn::dialog.trigger>
        <x-bladcn::button>Open Large</x-bladcn::button>
    </x-bladcn::dialog.trigger>
    <x-bladcn::dialog.content size="lg">
        <x-bladcn::dialog.title>Large Dialog</x-bladcn::dialog.title>
        <x-bladcn::dialog.description>
            This is a larger dialog with more content space.
        </x-bladcn::dialog.description>
    </x-bladcn::dialog.content>
</x-bladcn::dialog>
```

### Dialog with Footer

```bladehtml

<x-bladcn::dialog>
    <x-bladcn::dialog.trigger>
        <x-bladcn::button>Save Changes</x-bladcn::button>
    </x-bladcn::dialog.trigger>
    <x-bladcn::dialog.content>
        <x-bladcn::dialog.header>
            <x-bladcn::dialog.title>Save Changes</x-bladcn::dialog.title>
        </x-bladcn::dialog.header>
        <x-bladcn::dialog.footer>
            <x-bladcn::button variant="outline" x-on:click="open = false">Cancel</x-bladcn::button>
            <x-bladcn::button>Save</x-bladcn::button>
        </x-bladcn::dialog.footer>
    </x-bladcn::dialog.content>
</x-bladcn::dialog>
```

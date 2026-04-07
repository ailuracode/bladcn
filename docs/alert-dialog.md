# Alert Dialog Component

The `AlertDialog` component is a modal dialog for important confirmations, alerts, or calls to action. It uses Alpine.js
for state management.

## Usage

```bladehtml
<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action>OK</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

## Props

### Root (`alert-dialog`)

| Prop | Type | Default | Description |
| ------- | ----------- | ------- | ----------- | ---------------------- | ------------------ |
| `id`    | `string     | null`   | `null`      | The dialog ID |
| `class` | `string     | null`   | `null`      | Additional CSS classes |
| `style` | `string     | null`   | `null`      | Inline styles |
| `open`  | `Booleanish | string  | bool`       | `false`                | Initial open state |

### Content (`alert-dialog.content`)

| Prop | Type | Default | Description |
| ------- | ------- | ------- | --------------- | ---------------------- |
| `id`    | `string | null`   | `null`          | The content ID |
| `class` | `string | null`   | `null`          | Additional CSS classes |
| `style` | `string | null`   | `null`          | Inline styles |
| `size`  | `Size   | string` | `Size::Default` | Dialog size |

### Action (`alert-dialog.action`)

| Prop | Type | Default | Description |
| --------- | -------- | ------- | ------------------ | ---------------------- |
| `id`      | `string  | null`   | `null`             | The action ID |
| `class`   | `string  | null`   | `null`             | Additional CSS classes |
| `style`   | `string  | null`   | `null`             | Inline styles |
| `variant` | `Variant | string` | `Variant::Default` | Button variant |
| `size`    | `Size    | string` | `Size::Default`    | Button size |

### Cancel (`alert-dialog.cancel`)

| Prop | Type | Default | Description |
| --------- | -------- | ------- | ------------------ | ---------------------- |
| `id`      | `string  | null`   | `null`             | The cancel ID |
| `class`   | `string  | null`   | `null`             | Additional CSS classes |
| `style`   | `string  | null`   | `null`             | Inline styles |
| `variant` | `Variant | string` | `Variant::Outline` | Button variant |
| `size`    | `Size    | string` | `Size::Default`    | Button size |

### Cancel (`alert-dialog.cancel`)

| Prop | Type | Default | Description |
| --------- | -------- | ------- | ------------------ | ---------------------- |
| `id`      | `string  | null`   | `null`             | The cancel ID |
| `class`   | `string  | null`   | `null`             | Additional CSS classes |
| `style`   | `string  | null`   | `null`             | Inline styles |
| `variant` | `Variant | string` | `Variant::Outline` | Button variant |
| `size`    | `Size    | string` | `Size::Default`    | Button size |

### Cancel (`alert-dialog.cancel`)

| Prop | Type | Default | Description |
| --------- | -------- | ------- | ------------------ | ---------------------- |
| `id`      | `string  | null`   | `null`             | The cancel ID |
| `class`   | `string  | null`   | `null`             | Additional CSS classes |
| `style`   | `string  | null`   | `null`             | Inline styles |
| `variant` | `Variant | string` | `Variant::Outline` | Button variant |
| `size`    | `Size    | string` | `Size::Default`    | Button size |

## Sizes

| Size      | Description                           |
|-----------|---------------------------------------|
| `default` | Standard width (max-w-xs sm:max-w-sm) |
| `sm`      | Small width (max-w-xs)                |

```bladehtml

<x-bladcn::alert-dialog.content size="default">...</x-bladcn::alert-dialog.content>
<x-bladcn::alert-dialog.content size="sm">...</x-bladcn::alert-dialog.content>
```

## Subcomponents

### Trigger

The trigger component toggles the dialog open state. Supports `asChild` to merge attributes into child elements.

| Prop | Type | Default | Description |
| --------- | -------- | ------- | ---------------- | ---------------------- |
| `id`      | `string  | null`   | `null`           | The trigger ID |
| `class`   | `string  | null`   | `null`           | Additional CSS classes |
| `style`   | `string  | null`   | `null`           | Inline styles |
| `asChild` | `AsChild | string` | `AsChild::False` | Render as child |

```bladehtml

<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open Dialog</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action>OK</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

With `asChild` to merge click handler:

```bladehtml

<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger asChild>
        <x-bladcn::button>Delete Account</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

### Title

```bladehtml

<x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
```

### Description

```bladehtml

<x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
```

### Header

Groups title and description with optional media.

```bladehtml

<x-bladcn::alert-dialog.header>
    <x-bladcn::alert-dialog.media>...</x-bladcn::alert-dialog.media>
    <x-bladcn::alert-dialog.title>...</x-bladcn::alert-dialog.title>
    <x-bladcn::alert-dialog.description>...</x-bladcn::alert-dialog.description>
</x-bladcn::alert-dialog.header>
```

### Footer

Contains action and cancel buttons with responsive layout.

```bladehtml

<x-bladcn::alert-dialog.footer>
    <x-bladcn::alert-dialog.action>OK</x-bladcn::alert-dialog.action>
    <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
</x-bladcn::alert-dialog.footer>
```

### Media

Displays icons or media content in the dialog header.

```bladehtml

<x-bladcn::alert-dialog.media>
    <x-icon name="warning"/>
</x-bladcn::alert-dialog.media>
```

### Overlay

The overlay component provides the backdrop behind the dialog. It is automatically included in the content component.

### Portal

The portal component wraps content for proper modal positioning. It is automatically included in the content component.

## Data Attributes

- `data-slot="alert-dialog"` - Root element
- `data-slot="alert-dialog-content"` - Content element
- `data-slot="alert-dialog-title"` - Title element
- `data-slot="alert-dialog-description"` - Description element
- `data-slot="alert-dialog-trigger"` - Trigger element
- `data-slot="alert-dialog-header"` - Header element
- `data-slot="alert-dialog-footer"` - Footer element
- `data-slot="alert-dialog-media"` - Media element
- `data-slot="alert-dialog-overlay"` - Overlay element
- `data-slot="alert-dialog-portal"` - Portal element
- `data-size` - Current size value

## JavaScript Helpers

The component exposes global helper functions to programmatically control the dialog from JavaScript. The root element
must have an `id` attribute for these to work.

```javascript
bladcn.alertDialog.open("dialog-id");
bladcn.alertDialog.close("dialog-id");
bladcn.alertDialog.toggle("dialog-id");
```

### Programmatic Control

```bladehtml
<x-bladcn::alert-dialog id="delete-account">
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Delete Account</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Delete Account</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action>Delete</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>

<button onclick="bladcn.alertDialog.open('delete-account')">Open from JS</button>
```

## Examples

### Basic Confirmation

```bladehtml
<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Delete Account</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Delete Account</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>
            Are you sure you want to delete your account? This action cannot be undone.
        </x-bladcn::alert-dialog.description>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action>Delete</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

### With Icon

```bladehtml
<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.header>
            <x-bladcn::alert-dialog.media>
                <x-icon name="warning" class="size-6"/>
            </x-bladcn::alert-dialog.media>
            <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
            <x-bladcn::alert-dialog.description>Proceed?</x-bladcn::alert-dialog.description>
        </x-bladcn::alert-dialog.header>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action>Confirm</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Cancel</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

### Small Dialog

```bladehtml

<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content size="sm">
        <x-bladcn::alert-dialog.title>Success</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.action>OK</x-bladcn::alert-dialog.action>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

### With Custom Variant

```bladehtml

<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Warning</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>This action is permanent.</x-bladcn::alert-dialog.description>
        <x-bladcn::alert-dialog.footer>
            <x-bladcn::alert-dialog.action variant="destructive">Continue</x-bladcn::alert-dialog.action>
            <x-bladcn::alert-dialog.cancel>Go Back</x-bladcn::alert-dialog.cancel>
        </x-bladcn::alert-dialog.footer>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

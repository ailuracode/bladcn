# Alert Dialog Component

The `AlertDialog` component is a modal dialog for important confirmations, alerts, or calls to action. It uses Alpine.js for state management.

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

| Prop         | Type           | Default | Description                              |
| ------------ | -------------- | ------- | ---------------------------------------- |
| `id`         | `string\|null` | `null`  | The dialog ID                            |
| `class`      | `string\|null` | `null`  | Additional CSS classes                   |
| `style`      | `string\|null` | `null`  | Inline styles                            |
| `open`       | `bool`         | `false` | Initial open state                       |
| `persistent` | `bool`         | `false` | Prevents closing on escape/overlay click |
| `transition` | `bool`         | `true`  | Enable/disable animations                |

### Content (`alert-dialog.content`)

| Prop    | Type           | Default     | Description                   |
| ------- | -------------- | ----------- | ----------------------------- |
| `id`    | `string\|null` | `null`      | The content ID                |
| `class` | `string\|null` | `null`      | Additional CSS classes        |
| `style` | `string\|null` | `null`      | Inline styles                 |
| `size`  | `string`       | `'default'` | Dialog size (`default`, `sm`) |

### Trigger (`alert-dialog.trigger`)

| Prop      | Type           | Default | Description             |
| --------- | -------------- | ------- | ----------------------- |
| `id`      | `string\|null` | `null`  | The trigger ID          |
| `class`   | `string\|null` | `null`  | Additional CSS classes  |
| `style`   | `string\|null` | `null`  | Inline styles           |
| `asChild` | `bool`         | `false` | Render as child element |

### Action (`alert-dialog.action`)

| Prop      | Type           | Default     | Description             |
| --------- | -------------- | ----------- | ----------------------- |
| `id`      | `string\|null` | `null`      | The action ID           |
| `class`   | `string\|null` | `null`      | Additional CSS classes  |
| `style`   | `string\|null` | `null`      | Inline styles           |
| `variant` | `string`       | `'default'` | Button variant          |
| `size`    | `string`       | `'default'` | Button size             |
| `asChild` | `bool`         | `false`     | Render as child element |

### Cancel (`alert-dialog.cancel`)

| Prop      | Type           | Default     | Description             |
| --------- | -------------- | ----------- | ----------------------- |
| `id`      | `string\|null` | `null`      | The cancel ID           |
| `class`   | `string\|null` | `null`      | Additional CSS classes  |
| `style`   | `string\|null` | `null`      | Inline styles           |
| `variant` | `string`       | `'outline'` | Button variant          |
| `size`    | `string`       | `'default'` | Button size             |
| `asChild` | `bool`         | `false`     | Render as child element |

## Sizes

| Size      | Description    |
| --------- | -------------- |
| `default` | Standard width |
| `sm`      | Small width    |

## Events

The component dispatches events that can be captured with Alpine.js directives (`@eventname`) or Livewire (`wire:eventname`).

| Event           | Payload          | Description             |
| --------------- | ---------------- | ----------------------- |
| `open`          | `null`           | When the dialog opens   |
| `close`         | `null`           | When the dialog closes  |
| `toggle`        | `{ open: bool }` | On every state change   |
| `escape`        | `null`           | When ESC key is pressed |
| `overlay-click` | `null`           | When overlay is clicked |

```bladehtml
<x-bladcn::alert-dialog @open="console.log('opened')" @close="console.log('closed')" @toggle="console.log($event.detail)">
    ...
</x-bladcn::alert-dialog>
```

## Subcomponents

### Trigger

The trigger component toggles the dialog open state. Supports `asChild` to merge attributes into child elements.

```bladehtml
<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open Dialog</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Confirm</x-bladcn::alert-dialog.title>
        <x-bladcn::alert-dialog.description>Are you sure?</x-bladcn::alert-dialog.description>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

With `asChild`:

```bladehtml
<x-bladcn::alert-dialog>
    <x-bladcn::alert-dialog.trigger as-child>
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
    <svg>...</svg>
</x-bladcn::alert-dialog.media>
```

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

### With Events

```bladehtml
<x-bladcn::alert-dialog @toggle="console.log($event.detail)">
    <x-bladcn::alert-dialog.trigger>
        <x-bladcn::button>Open</x-bladcn::button>
    </x-bladcn::alert-dialog.trigger>
    <x-bladcn::alert-dialog.content>
        <x-bladcn::alert-dialog.title>Title</x-bladcn::alert-dialog.title>
    </x-bladcn::alert-dialog.content>
</x-bladcn::alert-dialog>
```

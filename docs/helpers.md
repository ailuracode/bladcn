# JavaScript Helpers

Bladcn provides global JavaScript helpers through Alpine.js magic helpers for programmatically controlling components.
These helpers work with any component that registers its slot type in `window._bladcnSlots` and exposes an `open`
property.

## Usage

The helpers are exposed via the `$bladcn` magic helper, which is available in any Alpine.js context.

### Available Methods

| Method             | Parameters   | Description                                                |
|--------------------|--------------|------------------------------------------------------------|
| `getComponent(id)` | `id: string` | Returns the Alpine.js data stack for a component by its ID |
| `open(id)`         | `id: string` | Opens a component by setting `open = true`                 |
| `close(id)`        | `id: string` | Closes a component by setting `open = false`               |
| `toggle(id)`       | `id: string` | Toggles the open state of a component                      |

### Basic Examples

```javascript
// Open a component by ID
$bladcn.open("my-dialog");

// Close a component by ID
$bladcn.close("my-dialog");

// Toggle a component by ID
$bladcn.toggle("my-dialog");

// Get the component's Alpine.js data
const component = $bladcn.getComponent("my-dialog");
```

### Programmatic Control from JavaScript

You can control components from vanilla JavaScript using the global `bladcn` object:

```javascript
// Open a dialog
bladcn.open("delete-account");

// Close a dialog
bladcn.close("delete-account");

// Toggle a dialog
bladcn.toggle("delete-account");
```

### Using in Blade Templates

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

<button onclick="bladcn.open('delete-account')">Open from JS</button>
<button onclick="bladcn.close('delete-account')">Close from JS</button>
<button onclick="bladcn.toggle('delete-account')">Toggle from JS</button>
```

### Using in Alpine.js Contexts

Within Alpine.js expressions, use the `$bladcn` magic helper:

```bladehtml

<div x-data="{ showDialog() { $bladcn.open('my-dialog') } }">
    <button @click="showDialog()">Open Dialog</button>
</div>
```

## How It Works

The helpers work by:

1. Looking up the element by its `id` attribute
2. Verifying the element's `data-slot` value is registered in `window._bladcnSlots`
3. Accessing the element's `_x_dataStack` to get the Alpine.js component data
4. Modifying the `open` property on the component's data

## Requirements

For the helpers to work, components must:

1. Have an `id` attribute set on the root element
2. Register their `data-slot` value in `window._bladcnSlots`
3. Expose an `open` property in their Alpine.js data

# Collapsible Component

The collapsible component provides an expandable/collapsible content area.

## Usage

```bladehtml

<x-bladcn::collapsible>
    <x-bladcn::collapsible.trigger>
        <x-bladcn::button>Toggle</x-bladcn::button>
    </x-bladcn::collapsible.trigger>
    <x-bladcn::collapsible.content>
        Hidden content that can be expanded
    </x-bladcn::collapsible.content>
</x-bladcn::collapsible>
```

## Components

| Component             | Description                |
|-----------------------|----------------------------|
| `collapsible`         | Main collapsible container |
| `collapsible.trigger` | Toggle trigger element     |
| `collapsible.content` | Collapsible content panel  |

## Props

### Collapsible Props

| Prop      | Type            | Default          | Description                     |
|-----------|-----------------|------------------|---------------------------------|
| `asChild` | `AsChild\|bool` | `AsChild::False` | Render props onto child element |
| `open`    | `bool`          | `false`          | Initial open state              |

### Trigger Props

| Prop      | Type            | Default          | Description                     |
|-----------|-----------------|------------------|---------------------------------|
| `asChild` | `AsChild\|bool` | `AsChild::False` | Render props onto child element |

### Content Props

| Prop      | Type            | Default          | Description                     |
|-----------|-----------------|------------------|---------------------------------|
| `asChild` | `AsChild\|bool` | `AsChild::False` | Render props onto child element |

## Enums

### AsChild Enum (`AiluraCode\Bladcn\Enums\Basic\AsChild`)

| Case    | Description                               |
|---------|-------------------------------------------|
| `True`  | Props are rendered onto the child element |
| `False` | Component renders its own element         |

## Data Attributes

- `data-slot="collapsible"` - Main collapsible container
- `data-slot="collapsible-trigger"` - Trigger element
- `data-slot="collapsible-content"` - Content panel

## Examples

### Basic Collapsible

```bladehtml

<x-bladcn::collapsible>
    <x-bladcn::collapsible.trigger>
        <x-bladcn::button variant="outline">Toggle Content</x-bladcn::button>
    </x-bladcn::collapsible.trigger>
    <x-bladcn::collapsible.content>
        <p>This content can be shown or hidden.</p>
    </x-bladcn::collapsible.content>
</x-bladcn::collapsible>
```

### Initially Open Collapsible

```bladehtml

<x-bladcn::collapsible open>
    <x-bladcn::collapsible.trigger>
        <x-bladcn::button>Click to close</x-bladcn::button>
    </x-bladcn::collapsible.trigger>
    <x-bladcn::collapsible.content>
        <p>This content is visible by default.</p>
    </x-bladcn::collapsible.content>
</x-bladcn::collapsible>
```

### With Accordion

```bladehtml

<x-bladcn::accordion type="single">
    <x-bladcn::accordion.item value="item1">
        <x-bladcn::accordion.trigger>Item 1</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            Content for item 1
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

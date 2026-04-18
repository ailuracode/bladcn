# Accordion Components

The accordion components provide a collapsible content panel with support for single or multiple item expansion, built
with Alpine.js.

## Dependencies

This component requires [mallardduck/blade-lucide-icons](https://github.com/mallardduck/blade-lucide-icons):

```bash
composer require mallardduck/blade-lucide-icons
```

## Usage

```bladehtml

<x-bladcn::accordion>
    <x-bladcn::accordion.item value="item-1">
        <x-bladcn::accordion.trigger>
            Is it accessible?
        </x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            Yes. It adheres to the WAI-ARIA design pattern.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
    <x-bladcn::accordion.item value="item-2">
        <x-bladcn::accordion.trigger>
            Is it styled?
        </x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            Yes. It comes with default styles that match your design system.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

## Components

| Component   | Description                    |
| ----------- | ------------------------------ |
| `accordion` | Main wrapper with Alpine state |
| `item`      | Individual accordion item      |
| `trigger`   | Clickable header button        |
| `content`   | Collapsible content area       |

## Props

### Accordion Props

| Prop           | Type                  | Default      | Description                       |
| -------------- | --------------------- | ------------ | --------------------------------- |
| `id`           | `string\|null`        | `null`       | The element ID                    |
| `class`        | `string\|null`        | `null`       | Additional CSS classes            |
| `style`        | `string\|null`        | `null`       | Inline styles                     |
| `type`         | `Type\|string`        | `'multiple'` | Single or multiple expansion mode |
| `defaultValue` | `string\|array\|null` | `null`       | Initially expanded item value(s)  |
| `transition`   | `bool`                | `true`       | Enable/disable collapse animation |

### Item Props

| Prop    | Type           | Default | Description            |
| ------- | -------------- | ------- | ---------------------- |
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |
| `value` | `string\|null` | `null`  | Unique item identifier |

### Trigger Props

| Prop       | Type             | Default           | Description                     |
| ---------- | ---------------- | ----------------- | ------------------------------- |
| `id`       | `string\|null`   | `null`            | The element ID                  |
| `class`    | `string\|null`   | `null`            | Additional CSS classes          |
| `style`    | `string\|null`   | `null`            | Inline styles                   |
| `disabled` | `Disabled\|bool` | `Disabled::False` | Disable the trigger interaction |
| `asChild`  | `AsChild\|bool`  | `AsChild::False`  | Render props onto child element |

### Content Props

| Prop    | Type           | Default | Description            |
| ------- | -------------- | ------- | ---------------------- |
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

- `data-slot="accordion"` - Main accordion container
- `data-slot="accordion-item"` - Individual item
- `data-slot="accordion-trigger"` - Clickable trigger button
- `data-slot="accordion-trigger-icon"` - Chevron icon in trigger
- `data-slot="accordion-content"` - Collapsible content area
- `data-type` - Accordion type (`single` or `multiple`)
- `data-disabled` - Whether the trigger is disabled

## Examples

### Single Mode

```bladehtml

<x-bladcn::accordion type="single">
    <x-bladcn::accordion.item value="faq-1">
        <x-bladcn::accordion.trigger>
            What is Bladcn?
        </x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            A Laravel Blade component library built on top of BlaseUI.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

### With Default Open Items

```bladehtml

<x-bladcn::accordion :default-value="['item-1', 'item-3']">
    <x-bladcn::accordion.item value="item-1">
        <x-bladcn::accordion.trigger>First Item</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            This item is open by default.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
    <x-bladcn::accordion.item value="item-2">
        <x-bladcn::accordion.trigger>Second Item</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            This item starts collapsed.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

### With Animation

```bladehtml

<x-bladcn::accordion transition>
    <x-bladcn::accordion.item value="item-1">
        <x-bladcn::accordion.trigger>Animated Toggle</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            Content appears with a smooth collapse animation.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

### With Disabled Trigger

```bladehtml

<x-bladcn::accordion>
    <x-bladcn::accordion.item value="active">
        <x-bladcn::accordion.trigger>Active Item</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            This item can be toggled.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
    <x-bladcn::accordion.item value="locked">
        <x-bladcn::accordion.trigger :disabled="true">Locked Item</x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            This item cannot be interacted with.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

### With AsChild (Link)

```bladehtml

<x-bladcn::accordion>
    <x-bladcn::accordion.item value="link-item">
        <x-bladcn::accordion.trigger as-child>
            <a href="/docs">Go to Documentation</a>
        </x-bladcn::accordion.trigger>
        <x-bladcn::accordion.content>
            The trigger styles are applied to the link element.
        </x-bladcn::accordion.content>
    </x-bladcn::accordion.item>
</x-bladcn::accordion>
```

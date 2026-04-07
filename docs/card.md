# Card Component

The card component provides a flexible container for grouping related content with support for headers, titles,
descriptions, content areas, footers, and actions.

## Usage

```bladehtml

<x-bladcn::card>
    <x-bladcn::card.header>
        <x-bladcn::card.title>Card Title</x-bladcn::card.title>
        <x-bladcn::card.description>Card description text.</x-bladcn::card.description>
    </x-bladcn::card.header>
    <x-bladcn::card.content>
        Card content goes here.
    </x-bladcn::card.content>
    <x-bladcn::card.footer>
        Card footer actions.
    </x-bladcn::card.footer>
</x-bladcn::card>
```

## Components

| Component          | Description                         |
|--------------------|-------------------------------------|
| `card`             | Main container wrapper              |
| `card.header`      | Header section with grid layout     |
| `card.title`       | Card title text                     |
| `card.description` | Card description text               |
| `card.content`     | Main content area                   |
| `card.footer`      | Footer section with actions         |
| `card.action`      | Action element positioned in header |

## Props

### Card Props

| Prop    | Type           | Default         | Description            |
|---------|----------------|-----------------|------------------------|
| `id`    | `string\|null` | `null`          | The element ID         |
| `class` | `string\|null` | `null`          | Additional CSS classes |
| `style` | `string\|null` | `null`          | Inline styles          |
| `size`  | `Size\|string` | `Size::Default` | Card size variant      |

### Header Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Title Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Description Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Content Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Footer Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Action Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Enums

### Size Enum (`AiluraCode\Bladcn\Enums\Card\Size`)

| Case      | Value       | Description        |
|-----------|-------------|--------------------|
| `Default` | `'default'` | Default size       |
| `SM`      | `'sm'`      | Small size variant |

## Data Attributes

- `data-slot="card"` - Main card container
- `data-slot="card-header"` - Header section
- `data-slot="card-title"` - Title element
- `data-slot="card-description"` - Description element
- `data-slot="card-content"` - Content area
- `data-slot="card-footer"` - Footer section
- `data-slot="card-action"` - Action element in header
- `data-size` - Card size (`default` or `sm`)

## Examples

### Basic Card

```bladehtml

<x-bladcn::card>
    <x-bladcn::card.header>
        <x-bladcn::card.title>Welcome</x-bladcn::card.title>
        <x-bladcn::card.description>Get started with your new account.</x-bladcn::card.description>
    </x-bladcn::card.header>
    <x-bladcn::card.content>
        <p>Some placeholder content for the card.</p>
    </x-bladcn::card.content>
</x-bladcn::card>
```

### Card with Footer

```bladehtml

<x-bladcn::card>
    <x-bladcn::card.header>
        <x-bladcn::card.title>Settings</x-bladcn::card.title>
        <x-bladcn::card.description>Manage your preferences.</x-bladcn::card.description>
    </x-bladcn::card.header>
    <x-bladcn::card.content>
        <p>Settings content goes here.</p>
    </x-bladcn::card.content>
    <x-bladcn::card.footer>
        <x-bladcn::button variant="outline">Cancel</x-bladcn::button>
        <x-bladcn::button>Save</x-bladcn::button>
    </x-bladcn::card.footer>
</x-bladcn::card>
```

### Card with Action

```bladehtml

<x-bladcn::card>
    <x-bladcn::card.header>
        <x-bladcn::card.title>Profile</x-bladcn::card.title>
        <x-bladcn::card.description>Your public profile info.</x-bladcn::card.description>
        <x-bladcn::card.action>
            <x-bladcn::button variant="ghost" size="icon-sm">
                <x-lucide-settings class="size-4"/>
            </x-bladcn::button>
        </x-bladcn::card.action>
    </x-bladcn::card.header>
    <x-bladcn::card.content>
        <p>Profile details here.</p>
    </x-bladcn::card.content>
</x-bladcn::card>
```

### Small Card

```bladehtml

<x-bladcn::card size="sm">
    <x-bladcn::card.header>
        <x-bladcn::card.title>Small Card</x-bladcn::card.title>
    </x-bladcn::card.header>
    <x-bladcn::card.content>
        <p>Compact card content.</p>
    </x-bladcn::card.content>
</x-bladcn::card>
```

### With Additional Classes

```bladehtml

<x-bladcn::card class="shadow-lg hover:shadow-xl transition-shadow">
    <x-bladcn::card.content>
        <p>Card with custom shadow and hover effect.</p>
    </x-bladcn::card.content>
</x-bladcn::card>
```

# Breadcrumb Component

The breadcrumb component provides navigation trail with support for customizable separators, ellipsis for collapsed
items, and accessibility compliance.

## Dependencies

This component requires [mallardduck/blade-lucide-icons](https://github.com/mallardduck/blade-lucide-icons):

```bash
composer require mallardduck/blade-lucide-icons
```

## Usage

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/">
                Home
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/components">
                Components
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page>
                Breadcrumb
            </x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

## Components

| Component    | Description                            |
|--------------|----------------------------------------|
| `breadcrumb` | Main navigation wrapper (`<nav>`)      |
| `list`       | Ordered list container (`<ol>`)        |
| `item`       | Individual breadcrumb item (`<li>`)    |
| `link`       | Clickable navigation link              |
| `separator`  | Visual separator between items         |
| `ellipsis`   | Collapsed items indicator              |
| `page`       | Current page indicator (non-clickable) |

## Props

### Breadcrumb Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### List Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Item Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Link Props

| Prop      | Type            | Default          | Description                     |
|-----------|-----------------|------------------|---------------------------------|
| `id`      | `string\|null`  | `null`           | The element ID                  |
| `class`   | `string\|null`  | `null`           | Additional CSS classes          |
| `style`   | `string\|null`  | `null`           | Inline styles                   |
| `as`      | `string`        | `'a'`            | HTML tag to render              |
| `asChild` | `AsChild\|bool` | `AsChild::False` | Render props onto child element |

### Separator Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

Uses `x-lucide-chevron-right` by default when slot is empty.

### Ellipsis Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

Uses `x-lucide-more-horizontal` icon by default.

### Ellipsis Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

### Page Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Enums

### AsChild Enum (`AiluraCode\Bladcn\Enums\Basic\AsChild`)

| Case    | Description                               |
|---------|-------------------------------------------|
| `True`  | Props are rendered onto the child element |
| `False` | Component renders its own element         |

## Data Attributes

- `data-slot="breadcrumb"` - Main navigation container
- `data-slot="breadcrumb-list"` - Ordered list container
- `data-slot="breadcrumb-item"` - Individual breadcrumb item
- `data-slot="breadcrumb-link"` - Clickable navigation link
- `data-slot="breadcrumb-separator"` - Visual separator
- `data-slot="breadcrumb-ellipsis"` - Collapsed items indicator
- `data-slot="breadcrumb-page"` - Current page indicator

## Examples

### Basic Breadcrumb

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/">
                Home
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page>
                Current Page
            </x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

### With Custom Separator

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/">Home</x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator>/</x-bladcn::breadcrumb.separator>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page>Docs</x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

### With Ellipsis (Collapsed Items)

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/">Home</x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.ellipsis/>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link href="/docs/installation">
                Installation
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.page>Setup</x-bladcn::breadcrumb.page>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

### With AsChild (Custom Tag)

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link as="button" type="button" onclick="navigate('/')">
                Home
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page>Settings</x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

### With AsChild (Router Link)

```bladehtml

<x-bladcn::breadcrumb>
    <x-bladcn::breadcrumb.list>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.link as-child>
                <a href="/" class="underline">Home</a>
            </x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page>Profile</x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

### With Additional Classes

```bladehtml

<x-bladcn::breadcrumb class="my-custom-breadcrumb">
    <x-bladcn::breadcrumb.list class="text-lg">
        <x-bladcn::breadcrumb.item class="font-semibold">
            <x-bladcn::breadcrumb.link href="/">Home</x-bladcn::breadcrumb.link>
        </x-bladcn::breadcrumb.item>
        <x-bladcn::breadcrumb.separator class="text-red-500"/>
        <x-bladcn::breadcrumb.item>
            <x-bladcn::breadcrumb.page class="text-blue-500">Current</x-bladcn::breadcrumb.page>
        </x-bladcn::breadcrumb.item>
    </x-bladcn::breadcrumb.list>
</x-bladcn::breadcrumb>
```

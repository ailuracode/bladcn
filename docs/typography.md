# Typography Components

The typography components provide consistent, accessible text styling that follows the shadcn/ui design system.

## Heading Components

### H1

Main page heading. Centered, extra bold with tight tracking.

```bladehtml

<x-bladcn::typography.h1>
    Main Heading
</x-bladcn::typography.h1>
```

### H2

Section heading with bottom border.

```bladehtml

<x-bladcn::typography.h2>
    Section Heading
</x-bladcn::typography.h2>
```

### H3

Subsection heading.

```bladehtml

<x-bladcn::typography.h3>
    Subsection Heading
</x-bladcn::typography.h3>
```

### H4

Smaller heading.

```bladehtml

<x-bladcn::typography.h4>
    Small Heading
</x-bladcn::typography.h4>
```

## Body Components

### Paragraph

Standard paragraph text with proper spacing.

```bladehtml

<x-bladcn::typography.p>
    This is a paragraph of text with leading-7 line height and margin-top
    spacing when not the first child.
</x-bladcn::typography.p>
```

### Lead

Large, muted introductory text.

```bladehtml

<x-bladcn::typography.lead>
    A large, muted paragraph for introductory content.
</x-bladcn::typography.lead>
```

### Large

Bold, large text for emphasis.

```bladehtml

<x-bladcn::typography.large>
    Large emphasized text.
</x-bladcn::typography.large>
```

### Muted

Small, muted secondary text.

```bladehtml

<x-bladcn::typography.muted>
    Secondary muted text content.
</x-bladcn::typography.muted>
```

### Small

Compact text for labels and metadata.

```bladehtml

<x-bladcn::typography.small>
    Small text content
</x-bladcn::typography.small>
```

## Special Components

### Blockquote

Quoted text with left border.

```bladehtml

<x-bladcn::typography.blockquote>
    "After all, tomorrow is another day."
</x-bladcn::typography.blockquote>
```

### Code

Inline code snippet with monospace font.

```bladehtml

<x-bladcn::typography.code>
    npm install @radix-ui/react-alert-dialog
</x-bladcn::typography.code>
```

### List

Unordered list with proper spacing.

```bladehtml

<x-bladcn::typography.list>
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</x-bladcn::typography.list>
```

## Props

All typography components share the same props:

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Data Attributes

Each component exposes a `data-slot` attribute for testing and styling:

- `data-slot="h1"` through `data-slot="h4"` for headings
- `data-slot="p"` for paragraphs
- `data-slot="lead"` for lead text
- `data-slot="large"` for large text
- `data-slot="muted"` for muted text
- `data-slot="small"` for small text
- `data-slot="blockquote"` for blockquotes
- `data-slot="code"` for inline code
- `data-slot="list"` for unordered lists

## Example: Complete Page

```bladehtml

<x-bladcn::typography.h1>
    Installation
</x-bladcn::typography.h1>

<x-bladcn::typography.lead>
    Re-usable components built with Radix UI and Tailwind CSS.
</x-bladcn::typography.lead>

<x-bladcn::typography.p>
    Use the CLI to add components to your project.
</x-bladcn::typography.p>

<x-bladcn::typography.h2>
    Manual Installation
</x-bladcn::typography.h2>

<x-bladcn::typography.p>
    Install the required dependencies:
</x-bladcn::typography.p>

<x-bladcn::typography.code>
    npm install tailwindcss-animate class-variance-authority
</x-bladcn::typography.code>

<x-bladcn::typography.blockquote>
    Make sure to configure the plugins in your tailwind.config.js.
</x-bladcn::typography.blockquote>
```

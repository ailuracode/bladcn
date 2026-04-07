# BladCN

A styled Blade component library built on top of **BlaseUI**. BladCN provides beautiful, ready-to-use components with predefined styling using Tailwind CSS.

## Features

- **Built on BlaseUI**: Uses BlaseUI components internally as the foundation
- **Styled Components**: Pre-styled with Tailwind CSS variants
- **Private Namespace**: Components are only accessible via `<x-bladcn:*>` prefix
- **BlaseUI Internal**: BlaseUI components cannot be accessed directly - they are wrapped by BladCN
- **Customizable**: Variants, sizes, and theming support
- **Accessible**: WCAG compliant components
- **Laravel 10+**: Works with Laravel 10, 11, and 13+

## How It Works

### Architecture
```
Laravel Application
    ↓
BladCN Package (<x-bladcn:*>)  ← Public API
    ↓
BlaseUI Package (Internal)     ← Hidden from Laravel
    ↓
HTML Output
```

BladCN **wraps** BlaseUI components and applies styling. BlaseUI components are **never exposed** to your Laravel application directly.

## Installation

```bash
composer require ailuracode/bladcn
```

This automatically installs `ailuracode/blase-ui` as a dependency.

## Available Components

### Button
Extends BlaseUI Button with Tailwind styling and variants.

```blade
<x-bladcn:button variant="primary" size="md">Click me</x-bladcn:button>
```

**Variants**: `primary`, `secondary`, `danger`, `ghost`, `outline`
**Sizes**: `sm`, `md`, `lg`, `xl`

### Input
Styled form input with support for multiple input types.

```blade
<x-bladcn:input type="email" placeholder="Enter email" />
```

### Card
Styled container component for grouping content.

```blade
<x-bladcn:card title="Card Title" subtitle="Subtitle">
    Card content goes here
</x-bladcn:card>
```

## Architecture & Design

BladCN is built as a **styled layer** on top of BlaseUI:

1. **Component Definition**: BladCN components extend BlaseUI components
2. **Styling**: Tailwind CSS classes are applied by BladCN
3. **Encapsulation**: BlaseUI remains private - only BladCN components are publicly accessible
4. **Maintainability**: Changes to BlaseUI are automatically inherited by BladCN

### Why This Design?

- **Separation of Concerns**: Unstyled logic (BlaseUI) vs. styled presentation (BladCN)
- **Prevents Accidental Usage**: You can't accidentally use unstyled BlaseUI components
- **Clear Public API**: Everything goes through `<x-bladcn:*>` prefix
- **Reusability**: Other packages can use BlaseUI for different styling approaches

## License

MIT License - see LICENSE file for details

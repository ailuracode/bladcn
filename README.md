# BladCN

A styled Blade component library built on top of **BlaseUI**. BladCN provides beautiful, ready-to-use components with predefined styling using Tailwind CSS.

## Features

- **Built on BlaseUI**: Uses the base component system from BlaseUI
- **Styled Components**: Pre-styled with Tailwind CSS
- **Private Namespace**: Components are only accessible via `<x-bladcn:*>` prefix
- **Customizable**: Variants, sizes, and theming support
- **Accessible**: WCAG compliant components
- **Laravel 10+**: Works with Laravel 10, 11, and 13+

## Installation

```bash
composer require ailuracode/bladcn
```

## Available Components

### Button
```blade
<x-bladcn:button variant="primary" size="md">Click me</x-bladcn:button>
```

Variants: `primary`, `secondary`, `danger`, `ghost`, `outline`
Sizes: `sm`, `md`, `lg`, `xl`

### Input
```blade
<x-bladcn:input type="email" placeholder="Enter email" />
```

### Card
```blade
<x-bladcn:card title="Card Title" subtitle="Subtitle">
    Card content goes here
</x-bladcn:card>
```

## Architecture

BladCN is a **styled wrapper** around BlaseUI components. The BlaseUI components remain **internal** and are not directly accessible from your Laravel application. All public interfaces use the `bladcn:` namespace.

This design ensures:
- Separation of concerns between unstyled components (BlaseUI) and styled components (BladCN)
- A clean public API through the `bladcn:` prefix
- Internal components cannot be accidentally used or accessed

## License

MIT License - see LICENSE file for details

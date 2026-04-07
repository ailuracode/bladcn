# Bladcn

A styled Blade component library. Bladcn provides beautiful, ready-to-use components with predefined styling using
Tailwind CSS.

## Features

- **Styled Components**: Pre-styled with Tailwind CSS variants
- **Private Namespace**: Components are only accessible via `<x-bladcn:*>` prefix
- **Customizable**: Variants, sizes, and theming support
- **Accessible**: WCAG compliant components
- **Laravel 13+**: Works with Laravel 13+

## Installation

```bash
composer require ailuracode/bladcn
```

## Architecture & Design

Bladcn is built as a collection of anonymous Blade components:

1. **Component Definition**: Components are defined as anonymous Blade templates
2. **Styling**: Tailwind CSS classes are applied via `$attributes->class()`
3. **Encapsulation**: All components use the `x-bladcn:*` prefix
4. **State Management**: Alpine.js handles interactive state

## Testing

```bash
vendor/bin/pest
```

## License

MIT License - see LICENSE file for details

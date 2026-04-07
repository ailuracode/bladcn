# Bladcn — Agent Guidelines

## Project Overview

Bladcn is a **Laravel PHP package** providing styled Blade components. It is **not** a JavaScript/React project.

- **Namespace:** `AiluraCode\Bladcn\`
- **Component prefix:** `x-bladcn:*` (anonymous Blade components)
- **PHP:** ^8.1 | **Laravel:** ^13.0

## Commands

| Command                                      | Purpose                                  |
|----------------------------------------------|------------------------------------------|
| `vendor/bin/pest`                            | Run full test suite                      |
| `vendor/bin/pest --filter "test name"`       | Run tests matching a name                |
| `vendor/bin/pest tests/Path/To/FileTest.php` | Run tests in a specific file             |
| `npm run format:blade`                       | Format all Blade templates with Prettier |
| `npm run format:blade:check`                 | Check Blade formatting (CI-safe)         |

No PHP linter/formatter (Pint, PHPStan, PHPCS) is currently configured.

## Code Style

### Prettier (`.prettierrc`)

- **Tab width:** 4 spaces
- **Print width:** 80 characters
- **Single quotes:** `true`
- **Wrap attributes:** `force`
- **Sort HTML attributes:** `alphabetical`
- **Sort Tailwind classes:** `true`
- **Trailing comma:** `true`
- **PHP version target:** 8.4

### PHP Formatting

- PSR-4 autoloading; file names match class names in PascalCase
- Explicit type declarations on all parameters and return types
- Use PHP 8+ features: `#[Override]` attribute, `mixed` type, enums, named arguments
- No try/catch blocks — throw `InvalidArgumentException` explicitly or return `null` for graceful fallbacks

### Blade Templates

- Use `@blaze(fold: true)` directive at top
- `@use()` statements for PHP class imports (Laravel 11+)
- `@props([...])` block with explicit defaults for every prop
- `@php` block for computed logic before HTML output
- Use `$attrs` array pattern with `->merge()` for attributes (`id`, `style`, `data-slot`)
- Expose `data-slot` and `data-*` attributes for styling/testing hooks
- Include proper ARIA attributes where applicable

## Conventions

### Naming

| Element     | Convention                | Example                                          |
|-------------|---------------------------|--------------------------------------------------|
| Classes     | PascalCase                | `BladcnServiceProvider`, `AsChildParser`         |
| Traits      | `Has` prefix + PascalCase | `HasBooleanCoercion`                             |
| Interfaces  | `-able` suffix            | `Classable`, `HtmlRenderable`                    |
| Enums       | PascalCase, singular      | `Size`, `Type`, `Variant`, `Scope`               |
| Enum cases  | PascalCase                | `Default`, `Destructive`, `True`, `False`, `Col` |
| Methods     | camelCase                 | `coerceFrom()`, `toClass()`, `toArray()`         |
| Blade files | kebab-case                | `button.blade.php`, `table.blade.php`            |
| Variables   | camelCase                 | `$mergedClass`, `$buttonAttrs`, `$h1Attrs`       |

### File Organization

```
src/
  Concerns/      — Traits (reusable mixins)
  Contracts/     — Interfaces
  Enums/         — Enum types (grouped by domain subdirectory)
  Support/       — Utility/helper classes (static methods)
resources/       — Anonymous Blade component templates
  table/         — Table subcomponents (row, head, cell, etc.)
  typography/    — Typography subcomponents (h1-h4, p, code, etc.)
docs/            — Component documentation (*.md)
```

### Enum Organization

- `Enums\Basic\` — shared/fundamental enums (`AsChild`, `Booleanish`, `Disabled`)
- `Enums\Button\` — button-specific enums (`Size`, `Type`, `Variant`)
- `Enums\Badge\` — badge-specific enums (`Variant`)
- `Enums\Table\` — table-specific enums (`Scope`)

### Imports

- Internal package `use` statements first, grouped by sub-namespace, alphabetical
- External/PHP built-in imports after (e.g., `Override`, `InvalidArgumentException`)
- Blade templates use `@use(Fully\Qualified\Namespace\ClassName)` directives

### Type System

- **Enums** are the primary type-safe configuration mechanism
- Backed string enums (`enum Size: string`) for variants/sizes/types
- Unit enums (`enum AsChild`) for boolean-like states
- Enums implement interfaces: `Classable`, `HtmlRenderable`, `StringCoercible`
- Return types always explicit: `: void`, `: string`, `: ?string`, `: bool`, `: array`, `: self`
- Use `Scope::tryFrom($value)` for safe coercion that returns `null` on invalid values

### Error Handling

- Throw `InvalidArgumentException` for strict coercion failures
- Return `null` for parse failures (e.g., `AsChildParser`)
- Non-strict mode uses graceful fallbacks (default to `False`, etc.)
- No try/catch blocks in the codebase

### Props Pattern

Every Blade component defines props with explicit defaults and uses an attrs array. There are **three approved patterns
** depending on component complexity:

#### Pattern 1: Separate Variables (Standard — for most components)

Use for components with coercion logic, conditional attributes, or computed values. This is the **default pattern** for
table/\*, typography/\*, and similar subcomponents.

```blade
@props([
    "id" => null,
    "class" => null,
    "style" => null,
    "variant" => Variant::Default,
])

@php
  $variant = Variant::coerceFrom($variant);
  $base = "bg-background rounded-md p-4";
  $classes = [$base, $variant->toClass(), $class];

  $attrs = [
      "id" => $id,
      "style" => $style,
      "data-slot" => "component",
      "data-variant" => $variant->toHtml(),
  ];
@endphp

<element {{ $attributes->class($classes)->merge($attrs) }}>
  {{ $slot }}
</element>
```

Key rules:

- `$classes` is always an array: `[$base, ...variant/size classes..., $class]`
- `$class` is **always the last element** in the `$classes` array
- `$attrs` (or domain-named: `$buttonAttrs`, `$headAttrs`) is a separate array
- HTML element uses `$attributes->class($classes)->merge($attrs)` on a **single line** when possible
- Use single quotes for Blade/PHP strings

#### Pattern 2: Inline (Lightweight — for simple subcomponents)

Use for subcomponents with no PHP logic (no `@php` block) and straightforward class/attribute merging.

```blade
@props([
    "id" => null,
    "class" => null,
    "style" => null,
])

<element
  {{ $attributes->class(["base classes here", $class])->merge([
      "id" => $id,
      "style" => $style,
      "data-slot" => "component",
  ]) }}>
  {{ $slot }}
</element>
```

Key rules:

- No `@php` block
- Classes are inline in `->class([...])`
- `$class` is **always the last element** in the class array
- `->merge([...])` is inline with the array on multiple lines

#### Pattern 3: as-child Delegation (Polymorphic — for interactive components)

Use for components that delegate rendering to `x-bladcn::as-child` (button, badge, triggers).

```blade
@props([
    "id" => null,
    "class" => null,
    "style" => null,
    "asChild" => AsChild::False,
])

@php
  $isAsChild = AsChild::coerceFrom($asChild);
  $classes = [$base, $class];

  $attrs = [
      "id" => $id,
      "style" => $style,
      "data-slot" => "component",
      ...$attributes->toArray(),
  ];
@endphp

<x-bladcn::as-child :asChild="$isAsChild" :attrs="$attrs" :class="$classes"
  tag="span">
  {{ $slot }}
</x-bladcn::as-child>
```

Key rules:

- Uses `...$attributes->toArray()` spread inside `$attrs` (not `->merge()`)
- Passes `:class="$classes"` and `:attrs="$attrs"` to `x-bladcn::as-child`
- `$class` is **always the last element** in the `$classes` array

### $class Prop Rule

**Every component that defines `'class' => null` in `@props` MUST include `$class` in its class output.** This is a
non-negotiable rule:

- Pattern 1: `$classes = [$base, ..., $class];`
- Pattern 2: `->class(["...", $class])`
- Pattern 3: `$classes = [$base, $class];` (passed to `:class`)

### Subcomponent Naming

- Subcomponents in subdirectories use dot notation: `x-bladcn::table.row`, `x-bladcn::typography.h1`
- Subcomponent props: `id`, `class`, `style` as base; domain-specific props as needed
- Use `->merge($attrs)` pattern for attribute merging

### Component File Naming

- **Main component file**: Must use the folder name as filename: `combobox.blade.php` (not `combobox/index.blade.php`)
- **Subcomponents**: Each subcomponent lives in its own file within the component folder: `combobox/item.blade.php`,
  `combobox/trigger.blade.php`, etc.
- **No index.blade.php**: Component folders must not contain `index.blade.php` files

## Testing

- **Framework:** Pest PHP 3 (built on PHPUnit 11)
- **Config:** `phpunit.xml` (colored output, strict mode)
- **Test location:** `tests/` directory, `*Test.php` suffix
- **Bootstrap:** `vendor/autoload.php`
- **Coverage:** includes `src/` directory
- **Style:** Use Pest's functional syntax (`test()`, `expect()`) — not PHPUnit class-based tests
- Tests should be organized by domain subdirectory matching `src/` structure (e.g.,
  `tests/Support/AsChildParserTest.php`)

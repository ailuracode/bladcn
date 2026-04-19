# Highlighted Code Component

The highlighted-code component displays syntax-highlighted code snippets with optional copy functionality, collapsible content, and line numbers. Uses Shiki for server-side syntax highlighting.

## Requirements

This component requires [spatie/shiki-php](https://github.com/spatie/shiki-php) for server-side syntax highlighting.

```bash
composer require spatie/shiki-php
```

For more themes, languages, and configuration options, visit the [Shiki documentation](https://shiki.style).

## Usage

```bladehtml
<x-bladcn::highlighted-code language="html">
    <div class="example">
        <p>Hello World</p>
    </div>
</x-bladcn::highlighted-code>
```

## Showing Blade Code

If you want to display Blade component syntax (like `<x-bladcn::button>`), use the `@` symbol escape syntax:

```bladehtml
<x-bladcn::highlighted-code language="blade">
    @verbatim
    <x-bladcn::button>Click me</x-bladcn::button>
    @endverbatim
</x-bladcn::highlighted-code>
```

## Props

| Prop          | Type           | Default      | Description                      |
| ------------- | -------------- | ------------ | -------------------------------- |
| `id`          | `string\|null` | `null`       | The element ID                   |
| `class`       | `string\|null` | `null`       | Additional CSS classes           |
| `style`       | `string\|null` | `null`       | Inline styles                    |
| `language`    | `string`       | `'html'`     | Programming language             |
| `theme`       | `string`       | `'min-dark'` | Syntax highlighting theme        |
| `collapsible` | `bool`         | `true`       | Enable collapsible functionality |
| `copyable`    | `bool`         | `true`       | Show copy button                 |

### Subcomponents

#### Collapse

| Prop        | Type  | Default | Description                    |
| ----------- | ----- | ------- | ------------------------------ |
| `minHeight` | `int` | `200`   | Minimum height before collapse |

#### Code Block

| Prop          | Type   | Default | Description                          |
| ------------- | ------ | ------- | ------------------------------------ |
| `showNumbers` | `bool` | `true`  | Show line numbers                    |
| `copyable`    | `bool` | `false` | Enable copy (propagates from parent) |

## Supported Languages

The component uses Shiki and supports 100+ languages. Common languages:

- `html`, `blade`, `php`
- `javascript`, `typescript`, `jsx`, `tsx`
- `css`, `scss`, `sass`
- `json`, `yaml`, `toml`
- `bash`, `shell`
- `python`, `ruby`, `go`, `rust`
- `sql`
- And many more...

## Themes

Available syntax highlighting themes:

| Theme               | Description        |
| ------------------- | ------------------ |
| `min-dark`          | Min Dark (default) |
| `catppuccin-mocha`  | Catppuccin Mocha   |
| `catppuccin-frappe` | Catppuccin Frappe  |
| `dracula`           | Dracula            |
| `github-dark`       | GitHub Dark        |
| `github-light`      | GitHub Light       |
| `nord`              | Nord               |
| `rose-pine`         | Rose Pine          |
| `tokyo-night`       | Tokyo Night        |
| And 50+ more...     |                    |

### Dark Theme Example

```bladehtml
<x-bladcn::highlighted-code language="javascript" theme="dracula">
    const fetchData = async () => {
        const response = await fetch('/api/data');
        return response.json();
    };
</x-bladcn::highlighted-code>
```

## Line Numbers

Line numbers are controlled by CSS counters. Add this to your stylesheet:

```css
pre.line-numbers code {
  counter-reset: line;
}

pre.line-numbers code .line {
  display: flex;
}

pre.line-numbers code .line::before {
  counter-increment: line;
  content: counter(line);
  width: 2.5rem;
  text-align: right;
  margin-right: 1rem;
  padding-right: 0.5rem;
  color: #6b7280;
  user-select: none;
}
```

## Data Attributes

### Code Block

- `data-slot="highlighted-code-block"` - Code block container identifier
- `data-language` - Current language
- `data-theme` - Current theme
- `data-show-numbers` - Whether line numbers are shown ('true' or 'false')
- `data-code` - The raw code content (only present when copyable is true)

### Collapse

- `data-slot="highlighted-code-content"` - Content wrapper identifier

### Toolbar

- `data-slot="highlighted-code-toolbar"` - Toolbar identifier
- `data-copyable` - Whether copy button is enabled
- `data-collapsible` - Whether collapse is enabled

## Examples

### PHP Code with Copy Button

```bladehtml
<x-bladcn::highlighted-code language="php">
    $greeting = 'Hello, World!';
    echo $greeting;
</x-bladcn::highlighted-code>
```

### JavaScript Code (Non-Collapsible)

```bladehtml
<x-bladcn::highlighted-code language="javascript" :collapsible="false">
    const fetchData = async () => {
        const response = await fetch('/api/data');
        return response.json();
    };
</x-bladcn::highlighted-code>
```

### Without Copy Button

```bladehtml
<x-bladcn::highlighted-code language="javascript" :copyable="false">
    console.log('No copy button');
</x-bladcn::highlighted-code>
```

### With Additional Classes

```bladehtml
<x-bladcn::highlighted-code language="css" class="max-w-2xl">
    .container {
        display: flex;
        gap: 1rem;
    }
</x-bladcn::highlighted-code>
```

### Code with Quotes and Special Characters

The component safely handles code containing quotes, double quotes, and special characters:

```bladehtml
<x-bladcn::highlighted-code language="javascript">
    alert("Hello 'world'");
    const template = `Hello "universe"`;
</x-bladcn::highlighted-code>
```

## Security

The `data-code` attribute is properly escaped to prevent:

- Attribute injection via quotes (`"`, `'`)
- XSS attacks via malicious code content
- HTML entity encoding bypass attempts

The component detects if content is already HTML-escaped and avoids double-escaping. This ensures the copy functionality works correctly regardless of code content.

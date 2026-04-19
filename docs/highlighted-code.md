# Highlighted Code Component

The highlighted-code component displays syntax-highlighted code snippets with optional copy functionality, collapsible content, and line numbers. Uses Shiki for server-side syntax highlighting.

## Requirements

This component requires [spatie/shiki-php](https://github.com/spatie/shiki-php) for server-side syntax highlighting.

```bash
composer require spatie/shiki-php
```

For more themes, languages, and configuration options, visit the [Shiki documentation](https://shiki.style).

## Usage

The component is composable using sub-components:

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy show-collapse>
            language-name
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="php" copyable>
            $code = 'Hello World';
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

## Components

### highlighted-code

Wrapper component. Receives no specific props but provides context to child components via `@aware`.

### highlighted-code.toolbar

Toolbar with optional collapse toggle and copy button.

| Prop            | Type    | Default | Description                 |
| --------------- | ------- | ------- | --------------------------- |
| `show-copy`     | boolean | false   | Show copy button            |
| `show-collapse` | boolean | false   | Show collapse/expand toggle |

The slot content is displayed as the language/title in the toolbar.

### highlighted-code.collapse

Collapsible wrapper with show/hide functionality.

| Prop        | Type | Default | Description                    |
| ----------- | ---- | ------- | ------------------------------ |
| `minHeight` | int  | `200`   | Minimum height before collapse |

### highlighted-code.code-block

Code block with Shiki syntax highlighting.

| Prop          | Type    | Default      | Description                  |
| ------------- | ------- | ------------ | ---------------------------- |
| `language`    | string  | `'html'`     | Programming language         |
| `theme`       | string  | `'min-dark'` | Syntax highlighting theme    |
| `showNumbers` | boolean | `true`       | Show line numbers            |
| `copyable`    | boolean | `false`      | Enable copy (adds data-code) |

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

### Theme Example

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy>
            JavaScript
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="javascript" theme="dracula" copyable>
            const fetchData = async () => {
                const response = await fetch('/api/data');
                return response.json();
            };
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
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
- `data-show-numbers` - Whether line numbers are shown
- `data-code` - The raw code content (only present when copyable is true)

### Collapse

- `data-slot="highlighted-code-content"` - Content wrapper identifier

### Toolbar

- `data-slot="highlighted-code-toolbar"` - Toolbar identifier

## Examples

### Basic Usage

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy show-collapse>
            PHP
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="php" copyable>
            $greeting = 'Hello, World!';
            echo $greeting;
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

### Non-Collapsible with Copy

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy>
            JavaScript
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="javascript" copyable>
            const fetchData = async () => {
                const response = await fetch('/api/data');
                return response.json();
            };
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

### With Additional Classes

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy show-collapse>
            CSS
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="css" class="max-w-2xl" copyable>
            .container {
                display: flex;
                gap: 1rem;
            }
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

### Showing Blade Code

Use `@verbatim` to display Blade component syntax:

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy show-collapse>
            Blade
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="blade" copyable>
            @verbatim
            <x-bladcn::button>Click me</x-bladcn::button>
            @endverbatim
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

### Code with Quotes and Special Characters

The component safely handles code containing quotes, double quotes, and special characters:

```bladehtml
<x-bladcn::highlighted-code>
    <x-bladcn::highlighted-code.collapse>
        <x-bladcn::highlighted-code.toolbar show-copy show-collapse>
            JavaScript
        </x-bladcn::highlighted-code.toolbar>

        <x-bladcn::highlighted-code.code-block language="javascript" copyable>
            alert("Hello 'world'");
            const template = `Hello "universe"`;
        </x-bladcn::highlighted-code.code-block>
    </x-bladcn::highlighted-code.collapse>
</x-bladcn::highlighted-code>
```

## Security

The `data-code` attribute is properly escaped to prevent:

- Attribute injection via quotes (`"`, `'`)
- XSS attacks via malicious code content
- HTML entity encoding bypass attempts

The component detects if content is already HTML-escaped and avoids double-escaping. This ensures the copy functionality works correctly regardless of code content.

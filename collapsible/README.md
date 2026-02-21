# Collapsible Component

## Props

- `as`: Etiqueta HTML (default: 'div')
- `open`: Estado inicial (default: false)
- `...attributes` (mergeable)

## Slots

- Contenido colapsable, trigger

## Ejemplo de uso

```blade
<x-collapsible open>
    <x-collapsible.trigger as="span">Abrir</x-collapsible.trigger>
    <x-collapsible.content as="div">Contenido</x-collapsible.content>
</x-collapsible>
```

## Subcomponentes

### `<x-collapsible.trigger>`

**Props:**

- `as`: Etiqueta HTML (default: 'span')
- `...attributes` (mergeable)

**Slots:**

- Elemento disparador

**Ejemplo:**

```blade
<x-collapsible.trigger as="span">Abrir</x-collapsible.trigger>
```

### `<x-collapsible.content>`

**Props:**

- `as`: Etiqueta HTML (default: 'div')
- `...attributes` (mergeable)

**Slots:**

- Contenido colapsable

**Ejemplo:**

```blade
<x-collapsible.content as="div">Contenido</x-collapsible.content>
```

## Detalles

Componente colapsable controlado por Alpine.js, permite mostrar/ocultar contenido. Subcomponentes permiten personalizar
el disparador y el contenido.

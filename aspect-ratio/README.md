# Aspect Ratio Component

## Props

- `ratio`: Relación de aspecto ('square', '16/9', etc.) (default: 'square')
- `...attributes` (mergeable)

## Slots

- Contenido

## Ejemplo de uso

```blade
<x-aspect-ratio ratio="16/9">
    <img src="..." />
</x-aspect-ratio>
```

## Detalles

Contenedor que fuerza la relación de aspecto de su contenido, sin subcomponentes.

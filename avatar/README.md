# Avatar Component

## Props

- `size`: Tamaño ('default', 'lg', 'sm') (default: 'default')
- `...attributes` (mergeable)

## Slots

- Imagen, fallback, badge

## Ejemplo de uso

```blade
<x-avatar size="lg">
    <x-avatar.image src="..." alt="Usuario" />
    <x-avatar.fallback>AB</x-avatar.fallback>
    <x-avatar.badge>1</x-avatar.badge>
</x-avatar>
```

## Subcomponentes

### `<x-avatar.image>`

**Props:**

- `src`: URL de la imagen
- `alt`: Texto alternativo
- `...attributes` (mergeable)
  **Slots:**
- Ninguno
  **Ejemplo:**

```blade
<x-avatar.image src="..." alt="Usuario" />
```

### `<x-avatar.fallback>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto o iniciales
  **Ejemplo:**

```blade
<x-avatar.fallback>AB</x-avatar.fallback>
```

### `<x-avatar.badge>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Contenido del badge
  **Ejemplo:**

```blade
<x-avatar.badge>1</x-avatar.badge>
```

## Detalles

Avatar visual, soporta imagen, fallback y badge, gestionado por Alpine.js. Subcomponentes permiten personalizar imagen,
fallback y badge.

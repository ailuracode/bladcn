# Field Component

## Props

- `orientation`: 'vertical', 'horizontal', 'responsive' (default: 'vertical')
- `...attributes` (mergeable)

## Slots

- Etiqueta, contenido, descripción, error, grupo, leyenda, separador, set, título

## Ejemplo de uso

```blade
<x-field orientation="horizontal">
    <x-field.label>Nombre</x-field.label>
    <x-field.content>
        <input type="text" />
    </x-field.content>
    <x-field.description>Ingrese su nombre completo.</x-field.description>
    <x-field.error errors="['message'=>'Campo requerido']" />
</x-field>
```

## Subcomponentes

### `<x-field.label>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto de la etiqueta
  **Ejemplo:**

```blade
<x-field.label>Nombre</x-field.label>
```

### `<x-field.content>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Contenido del campo
  **Ejemplo:**

```blade
<x-field.content>
    <input type="text" />
</x-field.content>
```

### `<x-field.description>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto descriptivo
  **Ejemplo:**

```blade
<x-field.description>Ingrese su nombre completo.</x-field.description>
```

### `<x-field.error>`

**Props:**

- `errors`: Array de mensajes de error
- `...attributes` (mergeable)
  **Slots:**
- Mensaje(s) de error
  **Ejemplo:**

```blade
<x-field.error errors="['message'=>'Campo requerido']" />
```

### `<x-field.group>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Agrupación de campos
  **Ejemplo:**

```blade
<x-field.group>
    <x-field.label>Grupo</x-field.label>
</x-field.group>
```

### `<x-field.legend>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto de la leyenda
  **Ejemplo:**

```blade
<x-field.legend>Datos personales</x-field.legend>
```

### `<x-field.separator>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto del separador
  **Ejemplo:**

```blade
<x-field.separator>o</x-field.separator>
```

### `<x-field.set>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Agrupación de campos
  **Ejemplo:**

```blade
<x-field.set>
    <x-field.label>Nombre</x-field.label>
</x-field.set>
```

### `<x-field.title>`

**Props:**

- `...attributes` (mergeable)
  **Slots:**
- Texto del título
  **Ejemplo:**

```blade
<x-field.title>Formulario</x-field.title>
```

## Detalles

Componente para agrupar campos de formulario, configurable por orientación. Subcomponentes permiten personalizar
etiquetas, contenido, descripción, errores, leyenda, separador, set, título y agrupaciones.

# Input OTP Component

The input OTP component provides a one-time password input with separate characters.

## Usage

```bladehtml

<x-bladcn::input-otp />
```

## Components

| Component             | Description                  |
|-----------------------|------------------------------|
| `input-otp`           | Main OTP container           |
| `input-otp.group`     | Group wrapper for styling    |
| `input-otp.separator` | Separator between inputs     |
| `input-otp.slot`      | Individual character slot    |
| `input-otp.root`      | Root container (alternative) |

## Props

### Input OTP Props

| Prop        | Type             | Default           | Description            |
|-------------|------------------|-------------------|------------------------|
| `id`        | `string\|null`   | `null`            | The element ID         |
| `class`     | `string\|null`   | `null`            | Additional CSS classes |
| `style`     | `string\|null`   | `null`            | Inline styles          |
| `maxLength` | `int`            | `6`               | Number of characters   |
| `disabled`  | `Disabled\|bool` | `Disabled::False` | Disable the input      |
| `pattern`   | `Pattern\|null`  | `null`            | Input pattern          |
| `value`     | `string\|null`   | `null`            | Current value          |
| `name`      | `string`         | `'otp'`           | Hidden input name      |

### Group Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `class` | `string\|null` | `null`  | Additional CSS classes |

### Separator Props

| Prop    | Type           | Default | Description            |
|---------|----------------|---------|------------------------|
| `id`    | `string\|null` | `null`  | The element ID         |
| `class` | `string\|null` | `null`  | Additional CSS classes |
| `style` | `string\|null` | `null`  | Inline styles          |

## Enums

### Pattern Enum (`AiluraCode\Bladcn\Enums\InputOtp\Pattern`)

| Case             | Value                | Description          |
|------------------|----------------------|----------------------|
| `DigitsOnly`     | `'DIGITS_ONLY'`      | Only digits allowed  |
| `DigitsAndChars` | `'DIGITS_AND_CHARS'` | Alphanumeric allowed |

## Data Attributes

- `data-slot="input-otp"` - Main container
- `data-slot="input-otp-group"` - Group wrapper
- `data-slot="input-otp-separator"` - Separator element
- `data-active` - Present when slot is active

## Examples

### Basic OTP Input

```bladehtml

<x-bladcn::input-otp max-length="4" />
```

### OTP with Default Value

```bladehtml

<x-bladcn::input-otp max-length="6" value="123456" />
```

### Disabled OTP Input

```bladehtml

<x-bladcn::input-otp disabled />
```

### OTP with Separators

```bladehtml

<x-bladcn::input-otp max-length="6">
    <x-bladcn::input-otp.group>
        <x-bladcn::input-otp.separator />
    </x-bladcn::input-otp.group>
</x-bladcn::input-otp>
```

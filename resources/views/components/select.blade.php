<select {{ $attributes->class(['form-control'])->merge($isRequired()) }}>
    {{ $slot }}
</select>
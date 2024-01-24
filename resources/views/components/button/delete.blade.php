<button type="button" {{ $attributes->class(['submit-form', 'btn', 'btn-danger'])->merge(['data-target' => '#formDelete']) }}> 
    {{ $title ?? '' }}
    {{ $slot }}
</button>
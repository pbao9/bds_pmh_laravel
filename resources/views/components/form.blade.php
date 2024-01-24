<form {{ $attributes->merge(['action' => $action, 'method' => $marcoMethod()]) }} {{ $isValidate() }}>
    
    @if($type != 'GET')

        @csrf

        @if($type != 'POST')

            @method($type)
            
        @endif

    @endif

    {{ $slot }}

</form>
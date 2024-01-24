@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || (auth()->guard('admin')->user()->id == $admin_id ))

    {{$phone}}
@endif
@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin'])
)
    <x-link :href="route('admin.admin.edit', $admin[0]['id'] ?? 0)" target="_blank" :title="$admin[0]['fullname']" />
@else
    {{ $admin[0]['fullname'] ?? '' }}
@endif
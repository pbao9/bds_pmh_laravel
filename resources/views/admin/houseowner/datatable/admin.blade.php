@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin'])
)
    <x-link :href="route('admin.admin.edit', $admin['id'] ?? 0)" target="_blank" :title="$admin['fullname'] ?? ''" />
@else
    {{ $admin['fullname'] ?? '' }}
@endif
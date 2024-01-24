@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || 
    auth()->guard('admin')->user()->id == $admin_id
)
    <x-link :href="route('admin.houseowner.edit', $house_owner['id'] ?? 0)" target="_blank" :title="$house_owner['fullname'] ?? ''" />

@endif
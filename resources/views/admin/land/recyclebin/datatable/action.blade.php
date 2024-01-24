@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || 
    auth()->guard('admin')->user()->id == $admin_id
)
<x-button.focus-form :data-route="route('admin.land.recyclebin.restore', $id)" class="btn-sm btn-info" data-target="#formRestore">
    <i class="fas fa-undo-alt"></i>
</x-button.focus-form>

<x-button.focus-form :data-route="route('admin.land.recyclebin.delete', $id)" class="btn-sm btn-danger" data-target="#formDelete">
    <i class="fas fa-trash-alt"></i>
</x-button.focus-form>
@endif
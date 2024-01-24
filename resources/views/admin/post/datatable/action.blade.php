@if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || 
    auth()->guard('admin')->user()->id == $admin_id
)
    <x-button.focus-form :data-route="route('admin.post.delete', $id)" data-target="#formDelete" class="btn-sm btn-danger">
        <i class="fas fa-trash-alt"></i>
    </x-button.focus-form>
@endif
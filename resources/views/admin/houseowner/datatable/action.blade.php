@if (Auth::guard('admin')->check() && (Auth::guard('admin')->user()->role == 'dev' || Auth::guard('admin')->user()->role == 'admin'))
    <x-button.focus-form :data-route="route('admin.houseowner.delete', $id)" class="btn-sm btn-danger" data-target="#formDelete">
        <i class="fas fa-trash-alt"></i>
    </x-button.focus-form>
@endif

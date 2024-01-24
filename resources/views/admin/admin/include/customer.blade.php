<x-card class="card-default color-palette-box">
    <x-slot name="header">
        <x-card.header class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                {{ __('Chuyển quyền quản lý KH') }}
            </h3>
        </x-card.header>
    </x-slot>
    <x-form :action="route('admin.admin.movecustomer')" type="post" :validate="true">
        <x-input type="hidden" name="admin_from_id" :value="$admin->id" />
            <div class="form-group">
                <x-select name="admin_to_id" class="select2bs4"  :required="true" />
            </div>
            <div class="form-group">
                <x-button.submit :title="__('Chuyển')" />
            </div>
    </x-form>
</x-card>
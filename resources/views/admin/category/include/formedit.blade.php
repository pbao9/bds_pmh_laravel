<x-form :action="route('admin.category.update')" class="form-horizontal" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$category->id" />
    <div class="row">
        <div class="col-12">
            <!-- Fullname -->
            <div class="form-group">
                <label class="control-label">{{ __('Tên danh mục') }}:</label>
                <x-input name="name" :value="$category->name" :required="true" placeholder="{{ __('Tên danh mục') }}"/>
            </div>
        </div>
        <!-- status -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    @foreach($status as $key => $value)
                        <x-option :option="$category->status" :value="$key" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- position -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số thứ tự') }}:</label>
                <x-input type="number" name="position" :value="$category->position" placeholder="{{ __('Số thứ tự') }}"/>
            </div>
        </div>
    </div>
    @if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || 
        auth()->guard('admin')->user()->id == $category->admin_id
    )
        <div class="form-group d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.delete :title="__('Xóa')" />
        </div>
    @endif
</x-form>
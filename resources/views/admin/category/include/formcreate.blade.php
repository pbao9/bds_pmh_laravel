<x-form :action="route('admin.category.store')" class="form-horizontal" type="post" :validate="true">
    <div class="row">
        <div class="col-12">
            <!-- name -->
            <div class="form-group">
                <label class="control-label">{{ __('Tên danh mục') }}:</label>
                <x-input name="name" :value="old('name')" :required="true" placeholder="{{ __('Tên danh mục') }}"/>
            </div>
        </div>
        <!-- status -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    @foreach($status as $key => $value)
                        <x-option :value="$key" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- position -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số thứ tự') }}:</label>
                <x-input type="number" name="position" :value="old('position', 0)" placeholder="{{ __('Số thứ tự') }}"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>
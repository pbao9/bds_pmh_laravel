<x-form class="form-horizontal" :action="route('admin.post.store')" type="post" :validate="true">
    <div class="row">
        <!-- title -->
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Tiêu đề') }}:</label>
                <x-input name="title" :value="old('title')" :required="true" placeholder="{{ __('Tiêu đề') }}"/>
            </div>
        </div>
        <!-- category -->
        {{-- <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Danh mục') }}:</label>
                <x-select name="category[]" class="select2bs4" multiple="multiple" :required="true">
                </x-select>
            </div>
        </div> --}}
        <!-- status -->
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    @foreach($status as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- content -->
        <div class="col-12">
            <div class="form-group">
            <label for="">{{ __('Nội dung') }}</label>
                <x-textarea name="content" class="ckeditor">{{ old('content') }}</x-textarea>
            </div>
        </div>
        <!-- avatar -->
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label class="control-label">{{ __('Ảnh đại diện') }}:</label>
                <x-input-image showImage="avatar" name="avatar" :value="old('avatar')" />
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>
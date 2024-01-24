<x-form class="form-horizontal" :action="route('admin.post.update')" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$post->id" />
    <div class="row">
        <!-- title -->
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Tiêu đề') }}:</label>
                <x-input name="title" :value="$post->title" :required="true" placeholder="{{ __('Tiêu đề') }}"/>
            </div>
        </div>
        <!-- category -->
        {{-- <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Danh mục') }}:</label>
                <x-select name="category[]" class="select2bs4" multiple="multiple" :required="true">
                    @foreach($post->categories as $item)
                        <x-option selected :value="$item->id" :title="$item->name"/>
                    @endforeach
                </x-select>
            </div>
        </div> --}}
        <!-- status -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    @foreach($status as $value)
                        <x-option :option="$post->status" :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
    </div>  
    <!-- content -->
    <div class="form-group">
        <label for="">{{ __('Nội dung') }}</label>
        <x-textarea name="content" class="ckeditor">{{ $post->content }}</x-textarea>
    </div>
    <!-- avatar -->
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label class="control-label">{{ __('Ảnh đại diện') }}:</label>
                <x-input-image showImage="avatar" name="avatar" :value="$post->avatar" />
            </div>
        </div>
    </div>
    @if(in_array(auth()->guard('admin')->user()->role, ['dev', 'admin']) || 
            auth()->guard('admin')->user()->id == $post->admin_id
        )
        <div class="form-group d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.delete class="ml-auto" :title="__('Xóa')" />
        </div>
    @endif
</x-form>
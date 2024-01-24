<x-form :action="route('admin.contract.update')" class="form-horizontal" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$contract->id" />
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Tên hợp đồng') }}:</label>
                <x-input name="name" :value="$contract->name" :required="true" placeholder="{{ __('Tên hợp đồng') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mã hợp đồng') }}:</label>
                <x-input name="code" :value="$contract->code" :required="true" placeholder="{{ __('Mã hợp đồng') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Loại hợp đồng') }}:</label>
                <x-select id="typeContractEdit" name="type" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn loại hợp đồng')" />
                    @foreach($type as $key => $value)
                        <x-option :option="$contract->type" :value="$key" :title="$value['name']" />
                    @endforeach
                </x-select>
            </div>
        </div>
    </div>
    <hr>
    <div id="filled-form">
        {!! $form_view !!}
    </div>
    
    
        
        
    <div class="form-group d-flex justify-content-between">
        <x-button.submit :title="__('Cập nhật')" />
        <x-button.delete :title="__('Xóa')" />
    </div>
</x-form>

<x-form :action="route('admin.contract.store')" class="form-horizontal" type="post" :validate="true">

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Tên hợp đồng') }} <span class="text-danger">(*)</span>:</label>
                <x-input name="name" :value="old('name')" :required="true" placeholder="{{ __('Tên hợp đồng') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mã hợp đồng') }} <span class="text-danger">(*)</span> :</label>
                <x-input name="code" :value="old('code')" :required="true" placeholder="{{ __('Mã hợp đồng') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Loại hợp đồng') }} <span class="text-danger">(*)</span>:</label>
                <x-select id="typeContract" name="type" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn loại hợp đồng')" />
                    @foreach ($type as $key => $value)
                        <x-option :value="$key" :title="$value['name']" />
                    @endforeach
                </x-select>
            </div>
        </div>
    </div>
    <hr>
    <div id="filled-form">

    </div>


    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>

<x-form class="form-horizontal" :action="route('admin.houseowner.store')" type="post" :validate="true">
    <div class="row">
        <!-- Fullname -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Họ và tên') }}:</label>
                <x-input name="fullname" :value="old('fullname')" :required="true" placeholder="{{ __('Họ và tên') }}" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số điện thoại') }}:</label>
                <x-input-phone name="phone" :value="old('phone')" :required="true" />
            </div>
        </div>
        <!-- address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Địa chỉ') }}:</label>
                <x-input name="address" :value="old('address')" placeholder="{{ __('Địa chỉ') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số CCCD/Passport') }}:</label>
                <x-input name="id_number" :value="old('id_number')"
                    placeholder="{{ __('Số CCCD/Passport') }}" />
            </div>
        </div>
         <!-- location -->
         <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Khu vực') }}:</label>
                <x-input name="location" :value="old('location')" :required="true"
                placeholder="{{ __('Khu vực') }}" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ngày cấp CMND/Passport') }}:</label>
                <x-input type="date" name="id_date" :value="old('id_date')"
                    placeholder="{{ __('Ngày cấp CMND/Passport') }}" />
            </div>
        </div>
        <!-- address -->
        <!-- district -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn quận/huyện') }}:</label>
                <x-select name="district_id" class="select2bs4" :required="true">
                </x-select>
            </div>
        </div>
        <!-- purpose -->
        
       
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nơi cấp CMND/Passport') }}:</label>
                <x-input name="id_location" :value="old('id_location')" placeholder="{{ __('Nơi cấp CMND/Passport') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mục đích') }}:</label>
                <x-select name="purpose" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn mục đích')" />
                    @foreach($purpose as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- note -->
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ghi chú') }}:</label>
                <x-textarea name="note" :placeholder="__('Ghi chú')">{{ old('note') }}</x-textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>

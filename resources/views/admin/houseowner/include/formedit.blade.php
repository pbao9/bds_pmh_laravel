<x-form :action="route('admin.houseowner.update')" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$house_owner->id" />
    <div class="row">
        <!-- Fullname -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Họ và tên') }}:</label>
                <x-input name="fullname" :value="$house_owner->fullname" :required="true" placeholder="{{ __('Họ và tên') }}" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số điện thoại') }}:</label>
         
                    <x-input-phone name="phone" :value="$house_owner->phone" :required="true" />
            </div>
        </div>
        <!-- address -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Địa chỉ') }}:</label>
                <x-input name="address" :value="$house_owner->address" placeholder="{{ __('Địa chỉ') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số CCCD/Passport') }}:</label>
                <x-input name="id_number" :value="$house_owner->id_number" placeholder="{{ __('Số CCCD/Passport') }}" />
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Khu vực') }}:</label>
                <x-input name="location" :value="$house_owner->location" :required="true" placeholder="{{ __('Khu vực') }}" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ngày cấp CMND/Passport') }}:</label>
                <x-input type="date" name="id_date" :value="$house_owner->id_date != null ? date('Y-m-d', strtotime($house_owner->id_date)) : ''"
                    placeholder="{{ __('Ngày cấp CMND/Passport') }}" />
            </div>
        </div>
        <!-- district -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn quận/huyện') }}:</label>
                <x-select name="district_id" class="select2bs4" :required="true">
                    <x-option :value="optional($house_owner->district)->code" :title="optional($house_owner->district)->name" />
                </x-select>
            </div>
        </div>
        <!-- address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nơi cấp CMND/Passport') }}:</label>
                <x-input name="id_location" :value="$house_owner->id_location" placeholder="{{ __('Nơi cấp CMND/Passport') }}" />
            </div>
        </div>
        <!-- purpose -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mục đích') }}:</label>
                <x-select name="purpose" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn mục đích')" />
                    @foreach ($purpose as $value)
                        <x-option :option="$house_owner->purpose" :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>


        <!-- note -->
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ghi chú') }}:</label>
                <x-textarea name="note" :placeholder="__('Ghi chú')">{{ $house_owner->note }}</x-textarea>
            </div>
        </div>
    </div>

    <div class="form-group d-flex justify-content-between">
        <x-button.submit :title="__('Cập nhật')" />
        <x-button.delete :title="__('Xóa')" />
    </div>
</x-form>

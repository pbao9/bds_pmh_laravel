<x-form :action="route('admin.customer.store')" class="form-horizontal" type="post" :validate="true">
    <div class="row">
        <!-- Fullname -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Họ và tên') }}:</label>
                <x-input name="fullname" :value="old('fullname')" :required="true" placeholder="{{ __('Họ và tên') }}"/>
            </div>
        </div>
        <!-- Email Address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Email') }}:</label>
                <x-input-email name="email" :value="old('email')" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số điện thoại') }}:</label>
                <x-input-phone name="phone" :value="old('phone')" :required="true" />
            </div>
        </div>
        <!-- birthday -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ngày sinh') }}:</label>
                <x-input type="date" name="birthday" :value="old('birthday')"  placeholder="{{ __('Ngày sinh') }}"/>
            </div>
        </div>
        <!-- major -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Công việc') }}:</label>
                <x-input name="major" :value="old('major')" placeholder="{{ __('Công việc') }}"  :required="true" />
            </div>
        </div>
        <!-- address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Địa chỉ') }}:</label>
                <x-input name="address" :value="old('address')" placeholder="{{ __('Địa chỉ') }}"/>
            </div>
        </div>
        <!-- zalo -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Zalo') }}:</label>
                <x-input name="zalo" :value="old('zalo')" placeholder="{{ __('Zalo') }}"/>
            </div>
        </div>
        <!-- Facebook -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Facebook') }}:</label>
                <x-input name="facebook" :value="old('facebook')" placeholder="{{ __('Facebook') }}"/>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số CCCD/Passport') }}:</label>
                <x-input name="id_number" :value="old('id_number')" 
                    placeholder="{{ __('Số CCCD/Passport') }}" />
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
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nơi cấp CMND/Passport') }}:</label>
                <x-input name="id_location" :value="old('id_location')" placeholder="{{ __('Nơi cấp CMND/Passport') }}" />
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>
<x-form :action="route('admin.customer.update')" class="form-horizontal" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$customer->id" />
    <div class="row">
        <!-- Fullname -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Họ và tên') }}:</label>
                <x-input name="fullname" :value="$customer->fullname" :required="true" placeholder="{{ __('Họ và tên') }}" />
            </div>
        </div>
        <!-- Email -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Email') }}:</label>
                <x-input-email name="email" :value="$customer->email" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số điện thoại') }}:</label>
                <x-input-phone name="phone" :value="$customer->phone" :required="true" />
            </div>
        </div>
        <!-- birthday -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ngày sinh') }}:</label>
                <x-input type="date" name="birthday" :value="date('Y-m-d', strtotime($customer->birthday))" placeholder="{{ __('Ngày sinh') }}"/>
            </div>
        </div>
        <!-- major -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Công việc') }}:</label>
                <x-input name="major" :value="$customer->major" placeholder="{{ __('Công việc') }}"  :required="true" />
            </div>
        </div>
        <!-- Address -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Địa chỉ') }}:</label>
                <x-input name="address" :value="$customer->address" placeholder="{{ __('Địa chỉ') }}"/>
            </div>
        </div>
        <!-- Zalo -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Zalo') }}:</label>
                <x-input name="zalo" :value="$customer->zalo" placeholder="{{ __('Zalo') }}"/>
            </div>
        </div>
        <!-- Facebooke -->
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Facebook') }}:</label>
                <x-input name="facebook" :value="$customer->facebook" placeholder="{{ __('Facebook') }}"/>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số CCCD/Passport') }}:</label>
                <x-input name="id_number" :value="$customer->id_number" 
                    placeholder="{{ __('Số CCCD/Passport') }}" />
            </div>
        </div>
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ngày cấp CMND/Passport') }}:</label>
                <x-input type="date" name="id_date" :value="date('Y-m-d', strtotime($customer->id_date))"
                    placeholder="{{ __('Ngày cấp CMND/Passport') }}" />
            </div>
        </div>
        <!-- address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nơi cấp CMND/Passport') }}:</label>
                <x-input name="id_location" :value="$customer->id_location" placeholder="{{ __('Nơi cấp CMND/Passport') }}" />
            </div>
        </div>
    </div>
    <div class="form-group d-flex justify-content-between">
        <x-button.submit :title="__('Cập nhật')" />
        <x-button.delete :title="__('Xóa')" />
    </div>
</x-form>
<x-form :action="route('admin.admin.store')" class="form-horizontal" type="post" :validate="true">
    <div class="row">
        <!-- Email Address -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Email') }}:</label>
                <x-input-email name="email" :value="old('email')" :required="true"/>
            </div>
        </div>
        <!-- Fullname -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Họ và tên') }}:</label>
                <x-input name="fullname" :value="old('fullname')" :required="true" placeholder="{{ __('Họ và tên') }}"/>
            </div>
        </div>
        <!-- password -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mật khẩu') }}:</label>
                <x-input type="password" name="password" :required="true" />
            </div>
        </div>
        <!-- password confirmation -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Xác nhận mật khẩu') }}:</label>
                <x-input type="password" name="password_confirmation" placeholder="{{ __('Xác nhận mật khẩu') }}" :required="true" data-parsley-equalto="input[name='password']" data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
            </div>
        </div>
    </div><!-- row -->
    <div class="row">
        <!-- Phone -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Số điện thoại') }}:</label>
                <x-input-phone name="phone" :value="old('phone')" :required="true" />
            </div>
        </div>
        <!-- Role -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Role') }}:</label>
                <x-select name="role" :required="true">
                    <x-option value="" :title="__('Chọn role')" />
                    @foreach($role as $key => $value)
                        <x-option :value="$key" :title="__($value)" />
                    @endforeach
                </x-select>
            </div>
        </div>
    </div><!-- row -->
    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>
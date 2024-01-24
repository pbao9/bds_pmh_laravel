<x-card class="card-default color-palette-box">
    <x-slot name="header">
        <x-card.header class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                {{ __('Thêm quản trị viên') }}
            </h3>
            <div class="ml-auto">

                <x-link :href="route('admin.admin.listland', $admin->id)" class="btn btn-sm btn-info shadow-sm ml-auto" :title="__('Danh sách BĐS')" target="_blank"><x-link.icon class="fas fa-list" /></x-link>

                <x-link :href="route('admin.admin.listcustomer', $admin->id)" class="btn btn-sm btn-info shadow-sm ml-auto" :title="__('Danh sách KH')" target="_blank"><x-link.icon class="fas fa-list" /></x-link>

                <x-link :href="route('admin.admin.listhouseowner', $admin->id)" class="btn btn-sm btn-info shadow-sm ml-auto" :title="__('Danh sách chủ nhà')" target="_blank"><x-link.icon class="fas fa-list" /></x-link>

            </div>
        </x-card.header>
    </x-slot>
    <x-form :action="route('admin.admin.update')" class="form-horizontal" type="put" :validate="true">
        <x-input type="hidden" name="id" :value="$admin->id" />
        <div class="row">
            <!-- Email Address -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Email') }}:</label>
                    <x-input-email name="email" :value="$admin->email" :required="true"/>
                </div>
            </div>
            <!-- fullname -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Họ và tên') }}:</label>
                    <x-input name="fullname" :value="$admin->fullname" :required="true" placeholder="{{ __('Họ và tên') }}"/>
                </div>
            </div>
            <!-- password -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Mật khẩu') }}:</label>
                    <x-input type="password" name="password" />
                </div>
            </div>
            <!-- password confirmation -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Xác nhận mật khẩu') }}:</label>
                    <x-input type="password" name="password_confirmation" placeholder="{{ __('Xác nhận mật khẩu') }}" data-parsley-equalto="input[name='password']" data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                </div>
            </div>
        </div><!-- row -->
        <div class="row">
            <!-- Phone -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Số điện thoại') }}:</label>
                    <x-input-phone name="phone" :value="$admin->phone" :required="true" />
                </div>
            </div>
            <!-- Role -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Role') }}:</label>
                    <x-select name="role" :required="true">
                        <x-option value="" :title="__('Chọn role')" />
                        @foreach($role as $key => $value)
                            <x-option :option="$admin->role" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div><!-- row -->
        <div class="form-group d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.delete :title="__('Xóa')" />
        </div>
    </x-form>
</x-card>
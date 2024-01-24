<x-admin.guest-layout>
    <div class="login-box">
        <x-card class="card-outline card-primary">
            <x-slot name="header">
                <x-card.header class="text-center">
                    <h3>{{ __('Đăng nhập quản trị') }}</h3>
                </x-card.header>
            </x-slot>

            <x-form :action="route('admin.login.post')" type="post" :validate="true">
                <!-- Email -->
                <div class="form-group">
                    <div class="input-group">
                        <x-input-email name="email" :required="true" data-parsley-errors-container=".error-email"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error-email"></div>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <div class="input-group">
                        <x-input type="password" placeholder="Nhập mật khẩu" name="password" :required="true" data-parsley-errors-container=".error-password"/>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error-password"></div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <x-button.submit class="btn-block" :title="__('Đăng nhập')" />
                    </div>
                    <!-- /.col -->
                </div>
            </x-form>
        </x-card>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</x-admin.guest-layout>
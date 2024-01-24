@extends('admin.layout')

@section('title', __('Thay đổi mật khẩu'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Đổi mật khẩu') }}</h1>
        </div><!-- /.col -->
    </x-admin.partials.page-header>
    <!-- /.content-header -->
    <!-- Main content -->
    <x-admin.partials.page-content>
        <div class="col-lg-12">
            <x-card class="card-default color-palette-box">
                <x-slot name="header">
                    <x-card.header class="d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ __('Thay đổi mật khẩu') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                <x-form :action="route('admin.password.update')" type="put" :validate="true">
                    <!-- password old -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Mật khẩu cũ') }}:</label>
                        <x-input-password name="old_password" :required="true"/>
                    </div>
                    <!-- new password -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Mật khẩu mới') }}:</label>
                        <x-input-password name="password" :required="true"/>
                    </div>
                    <!-- new password confirmation-->
                    <div class="form-group">
                        <label class="control-label">{{ __('Xác nhận mật khẩ') }}:</label>
                        <x-input-password name="password_confirmation" :required="true" data-parsley-equalto="input[name='password']" data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}"/>
                    </div>
                    <div class="form-group">
                        <x-button.submit :title="__('Cập nhật')" />
                    </div>
                </x-form>
            </x-card>
        </div>
    </x-admin.partials.page-content>
</div>
@endsection

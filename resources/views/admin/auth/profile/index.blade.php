@extends('admin.layout')

@section('title', __('Trang cá nhân'))

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Trang cá nhân') }}</h1>
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
                            {{ __('Thay đổi thông tin cá nhân') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                <x-form :action="route('admin.profile.update')" class="form-horizontal" type="put" :validate="true">
                    <x-input type="hidden" name="id" :value="$auth->id" />
                    <!-- fullname -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Họ và tên') }}:</label>
                        <x-input name="fullname" :value="$auth->fullname" :required="true" placeholder="{{ __('Họ và tên') }}"/>
                    </div>
                    <!-- phone -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Số điện thoại') }}:</label>
                        <x-input-phone name="phone" :value="$auth->phone" :required="true" />
                    </div>
                    <!-- address -->
                    <div class="form-group">
                        <label class="control-label">{{ __('Địa chỉ') }}:</label>
                        <x-input name="address" :value="$auth->address" :required="true" placeholder="{{ __('Địa chỉ') }}"/>
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

@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Dashboard') }}</h1>
        </div><!-- /.col -->
    </x-admin.partials.page-header>
    <!-- /.content-header -->
    <!-- Main content -->
    <x-admin.partials.page-content>
        <div class="col-lg-12">
            <x-card>
                {{ __('Xin chào bạn đã đến với hệ thống !') }}
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
@endsection

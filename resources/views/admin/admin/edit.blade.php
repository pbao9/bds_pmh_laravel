@extends('admin.layout')

@section('title', __('Quản lý Admin'))
@push('css')
<!-- select2 bs4 css -->
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- select2 css -->
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý Admin') }}</h1>
        </div><!-- /.col -->
    </x-admin.partials.page-header>
    <!-- /.content-header -->
    <!-- Main content -->
    <x-admin.partials.page-content>
        <div class="col-lg-12">
            @include('admin.admin.include.formedit', ['admin' => $admin])
            @include('admin.admin.include.customer')
            @include('admin.admin.include.loginlog', ['loginLog' => $loginLog])
        </div>
    </x-admin.partials.page-content>
</div>
<x-form id="formDelete" :action="route('admin.admin.delete', $admin->id)" type="delete" />
@endsection

@push('plugin-js')
<!-- select2 js -->
<script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('.select2bs4').select2({
            language: {
                searching: function() {
                    return "Đang tìm kiếm...";
                },
                noResults: function(){
                    return "Không tìm thấy kết quả.";
                }
            },
            placeholder: "Vui lòng chọn admin",
            theme: 'bootstrap4',
            ajax: {
                url: '{{ route("admin.admin.selectsearch") }}',
                dataType: 'json',
                processResults: function (data, params) {
                    data.results = data.results.filter(item => item.id != "{{ $admin->id }}");
                    return data;
                }
            },
        })
    })
</script>
@endpush

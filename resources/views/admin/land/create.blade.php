@extends('admin.layout')

@section('title', __('Quản lý BĐS'))

@push('css')
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý BĐS') }}</h1>
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
                            {{ __('Thêm BĐS') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                @include('admin.land.include.formcreate')
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
@endsection
@push('plugin-js')
<!-- ckeditor js -->
<script src="{{ asset('public/lib/ckeditor/ckeditor.js') }}"></script>
<!-- select2 js -->
<script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- ckfinder js -->
<script src="{{ asset('public/lib/ckfinder/ckfinder.js') }}"></script>
@endpush

@push('js')
<script>
var routeHouseOwner = '{{ route("admin.houseowner.selectsearch") }}',
    routeDistrict = '{{ route("admin.address.district.selectsearch") }}',
    routeWard = '{{ route("admin.address.ward.selectsearch") }}',
    routeCategory = '{{ route("admin.category.selectsearch") }}';
$('.select2bs4[name="house_owner_id"]').select2({
    language: {
        searching: function() {
            return "Đang tìm kiếm...";
        },
        noResults: function(){
            return "Không tìm thấy kết quả.";
        }
    },
    placeholder: "Vui lòng chọn chủ nhà",
    theme: 'bootstrap4',
    ajax: {
        url: routeHouseOwner,
        dataType: 'json'
    },
});
$('.select2bs4[name="category[]"]').select2({
    language: {
        searching: function() {
            return "Đang tìm kiếm...";
        },
        noResults: function(){
            return "Không tìm thấy kết quả.";
        }
    },
    placeholder: "Vui lòng chọn",
    theme: 'bootstrap4',
    ajax: {
        url: routeCategory,
        dataType: 'json'
    },
})
</script>
<script src="{{ asset('public/admin/assets/js/land.js') }}"></script>
@endpush
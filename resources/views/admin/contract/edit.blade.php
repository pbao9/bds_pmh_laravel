@extends('admin.layout')

@section('title', __('Quản lý Hợp đồng'))

@push('css')
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin.partials.page-header>
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('Quản lý Hợp đồng') }}</h1>
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
                            {{ __('Sửa hợp đồng') }}
                        </h3>
                    </x-card.header>
                </x-slot>
                @include('admin.contract.include.formedit')
            </x-card>
        </div><!-- /.col -->
    </x-admin.partials.page-content>
</div>
<x-form id="formDelete" :action="route('admin.contract.delete', $contract->id)" type="delete" />
@endsection
@push('plugin-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- ckeditor js -->
<script src="{{ asset('public/lib/ckeditor/ckeditor.js') }}"></script>
<!-- select2 js -->
<script src="{{ asset('public/lib/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- ckfinder js -->
<script src="{{ asset('public/lib/ckfinder/ckfinder.js') }}"></script>
@endpush

@push('js')

<script>    
    $(document).ready(function() {
    $('#companyFieldsEd').hide();
    $('#rentalCustomerFieldsEd').hide();
    $('#moneyvietnamese').hide();
    $('#moneyusd').hide();
    $('#moneykr').hide();
    $('#typeContractCustomerEd').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == '1') {
            $('#rentalCustomerFieldsEd').show();
            $('#companyFieldsEd').hide();
            // alert(selectedValue)
        } else if (selectedValue == '2') {
            $('#companyFieldsEd').show();
            $('#rentalCustomerFieldsEd').hide();
            // alert(selectedValue)
        }   else if (selectedValue == '3') {
            $('#companyFieldsEd').show();
            $('#rentalCustomerFieldsEd').hide();
            // alert(selectedValue)
        } else {
            $('#companyFieldsEd').hide();
            $('#rentalCustomerFieldsEd').hide();
        }
    });
    $('#typemoney').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == '1') {
            $('#moneyvietnamese').show();
            $('#moneyusd').hide();
            $('#moneykr').hide();
            // alert(selectedValue)
        } else if (selectedValue == '2') {
            $('#moneyusd').show();
            $('#moneyvietnamese').hide();
            $('#moneykr').hide();
            // alert(selectedValue)
        } else if (selectedValue == '3') {
            $('#moneyusd').hide();
            $('#moneyvietnamese').hide();
            $('#moneykr').show();
            // alert(selectedValue)
        } else {
            $('#moneyusd').hide();
            $('#moneyvietnamese').hide();
            $('#moneykr').hide();
        }
    });
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // Định dạng ngày tháng
            autoclose: true, // Đóng datepicker sau khi chọn xong
            todayHighlight: true // Highlight ngày hiện tại
        });
});

</script>
<script>
        var routeGetFormEdit = '{{ route("admin.contract.getFormEdit", ["id"=>$contract->id,"type"=>"type"]) }}';
</script>
<script src="{{ asset('public/admin/assets/js/contract.js') }}"></script>
@endpush

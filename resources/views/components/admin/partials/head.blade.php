<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="url-home" content="{{ url('/') }}" />
<title>@yield('title')</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('custom.images.favicon')) }}" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/lib/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/assets/css/style.css') }}" rel="stylesheet">
@stack('css')

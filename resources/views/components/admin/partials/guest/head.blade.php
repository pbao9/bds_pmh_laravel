<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('Đăng nhập quản trị') }}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('custom.images.favicon')) }}" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/public/lib/AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
<link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('public/lib/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
@stack('css')

<!-- jQuery -->
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
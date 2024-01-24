<!-- jQuery -->
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- datatable --}}
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
{{-- datatable-boostrap 4 --}}
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
<script src="{{ asset('public/lib/Parsley.js-2.9.2/parsley.min.js') }}"></script>

@stack('plugin-js')

<!-- AdminLTE App -->
<script src="{{ asset('/public/lib/AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/all.js') }}"></script>

@stack('js')
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'vi'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
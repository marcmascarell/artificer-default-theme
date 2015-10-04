<!-- jQuery 2.0.2 -->
@if (!$standalone)
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- jQuery UI 1.10.3 -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<!-- slimScroll -->
{{--<script src="{{ asset('packages/mascame/artificer-default-theme/js/plugins/slimScroll/jquery.slimscroll.js') }}" type="text/javascript"></script>--}}
<!-- iCheck -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset('packages/mascame/artificer-default-theme/js/AdminLTE/app.js') }}" type="text/javascript"></script>

<script src="{{ asset('packages/mascame/admin/core/restfulizer.js') }}"></script>
<script src="{{ asset('packages/mascame/artificer-default-theme/js/artificer.js') }}"></script>

@endif

{{ \Mascame\Artificer\Artificer::assets() }}


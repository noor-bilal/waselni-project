<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021
          {{env('APP_NAME')}} </span>
    </p>
</footer>

<script src="{{theme('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

<script src="{{theme('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{theme('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{theme('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
@stack('js')
</body>
</html>

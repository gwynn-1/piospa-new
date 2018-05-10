<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel')</title>
        
        <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
		
		
        @yield('before_style')
        <!--Page Vendors -->
		<link href="{{asset('static/backend/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		
		<!--Base Styles -->
		<link href="{{asset('static/backend/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('static/backend/assets/demo/demo9/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{asset('static/backend/assets/demo/demo9/media/img/logo/favicon.ico')}}" />
        @yield('after_style')
    </head>
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    	
    	<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{asset('static/backend/assets/app/media/img//bg/bg-3.jpg')}});">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
    				@yield('content')
				</div>
			</div>
    	</div>
        	
    	
		<script src="{{asset('static/backend/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('static/backend/assets/demo/demo9/base/scripts.bundle.js')}}" type="text/javascript"></script>		
    	<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    	@yield('after_script')
    </body>
</html>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	@yield('header')

	<title>@yield('title')</title>

	<link href="{{ URL::asset('template/img/favicon.png') }}" rel="icon" type="image/png">
	<link href="{{ URL::asset('template/img/favicon.ico') }}" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
	<![endif]-->
	@yield('style')

	<link rel="stylesheet" href="{{ URL::asset('template/css/lib/lobipanel/lobipanel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('template/css/lib/jqueryui/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('template/css/lib/font-awesome/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('template/css/main.css') }}">


</head>
<body class="with-side-menu">

	<!--//Begin header section -->
<!--	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{ URL::asset('template/img/logo-2.png') }}" alt="">
	            <img class="hidden-lg-up" src="{{ URL::asset('template/img/logo-2-mob.png') }}" alt="">
	        </a>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                </div>


	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	</header>-->
	<!--//End header section -->


	<!--//Begin main content section -->
	<!--<div class="page-content">
	    <div class="container-fluid">-->
	      @yield('content')
<!-- 	    </div> -->
<!-- 	</div> -->
	<!--//Scripts section -->
	<script src="{{ URL::asset('template/js/lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/tether/tether.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/plugins.js') }}"></script>

	@yield('scripts')
	<script src="{{ URL::asset('template/js/app.js') }}"></script>
</body>
</html>

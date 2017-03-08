<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	@yield('header')

	<title>@yield('title')</title>

	<link href="{{ URL::asset('template/img/favicon.144x144.png') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ URL::asset('template/img/favicon.114x114.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ URL::asset('template/img/favicon.72x72.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ URL::asset('template/img/favicon.57x57.png') }}" rel="apple-touch-icon" type="image/png">
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
<body class="with-side-menu control-panel control-panel-compact">

	<!--//Begin header section -->
	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{ URL::asset('template/img/logo-2.png') }}" alt="">
	            <img class="hidden-lg-up" src="{{ URL::asset('template/img/logo-2-mob.png') }}" alt="">
	        </a>
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    											<!-- notificaciones2 -->
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something...</span>
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt=""></span>
	                                            <span class="mess-item-name">Christian Burtons</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/photo-64-2.jpg') }}" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">Ver más</a>
	                            </div>
	                        </div>
	                    </div>
											<!-- notificaciones2 -->

											<!-- usuario administrador -->
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
	                            <!-- <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Configuración</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a> -->
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="{{ url('/logout') }}"><span class="font-icon glyphicon glyphicon-log-out"></span>Salir</a>
	                        </div>
	                    </div>
											<!-- fin usuario administrador -->

	                </div><!--.site-header-shown-->

									<!-- Menu add -->
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                            </div>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->

	</header>
	<!--//End header section -->

	<!--//Begin lateral menu section -->

	<!--//Begin lateral menu section -->
	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">

	        <li class="red with-sub">
						<a href="/dashboard">
							<span>
								<i class="font-icon font-icon-calend"></i>
								<span class="lbl">Dashboard</span>
	            </span>
	            <ul>
	                <!-- <li><a href="widgets.html"><span class="lbl">Opción 1</span></a></li>
	                <li><a href="elements.html"><span class="lbl">Opción 2</span></a></li> -->
	            </ul>
						</a>
	        </li>

					<!-- mensajes -->
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon font-icon-comments active"></i>
	                <span class="lbl">Mensajes del administrador</span>
	            </span>
	            <ul>
	                <li><a href="messenger.html"><span class="lbl">Recientes</span></a></li>
	                <li><a href="chat.html"><span class="lbl">Importantes</span><span class="label label-custom label-pill label-danger">8</span></a></li>
	                <li><a href="/messageadmin"><span class="lbl">Escribir Mensaje</span></a></li>
	            </ul>
	        </li>
					<!-- fin mensajes -->

					<!-- notificaciones -->
	        <li class="magenta with-sub">
						<a href="/notificationmaker">
	            <span>
	                <span class="glyphicon glyphicon-list-alt"></span>
	                <span class="lbl">Crear notificación</span>
	            </span>
						</a>
	        </li>
					<!-- fin notificaciones -->

					<!-- historial -->
	        <li class="green with-sub">
	            <span>
	                <i class="glyphicon glyphicon-th"></i>
	                <span class="lbl">Historial</span>
	            </span>
	            <ul>
	                <li><a href="/calendar"><span class="lbl">Calendario (Resumen)</span></a></li>
	                <!-- <li><a href="/h"><span class="lbl">Tabla (Detalle)</span></a></li> -->
	            </ul>
	        </li>
					<!-- fin historial -->

					<!-- usuarios -->
	        <li class="blue-dirty">
	            <a href="/users">
	                <span class="font-icon font-icon-user"></span>
	                <span class="lbl">Usuarios</span>
	            </a>
	        </li>
					<!-- fin usuarios -->

					<!-- sectores -->
            <li class="gold with-sub">
	            <a href="/sectors">
	                <span class="font-icon font-icon-widget"></span>
	                <span class="lbl">Sectores</span>
	            </a>
	        </li>
					<!-- fin sectores -->

					<!-- tipos -->
	        <li class="brown with-sub">
	            <a href="/types">
	                <span class="font-icon font-icon-contacts"></span>
	                <span class="lbl">Tipos de usuario</span>
	            </a>
	        </li>
					<!-- fin tipos -->

	    </ul>
	</nav>
	<!--//End lateral menu section -->

	<!--//Begin main content section -->
	<div class="page-content">
	    <div class="container-fluid">

	      @yield('content')

	    </div><!--.container-fluid-->
	</div>
	<!--//Begin main content section -->

	<!--//Scripts section -->
	<script src="{{ URL::asset('template/js/lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/tether/tether.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/plugins.js') }}"></script>

	@yield('scripts')
	<script src="{{ URL::asset('template/js/app.js') }}"></script>
</body>
</html>

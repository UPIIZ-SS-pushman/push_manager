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
											@if(Auth::user()->user_type_id == 1)
	                    <!-- notificaciones2 -->
											<?php
												$newMessages = \App\AdminMessage::where('read', false)->get();
												$newMessagesCount = count($newMessages);
											?>
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm  @if($newMessagesCount>0) active @endif"
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
	                                            Mensajes nuevos
	                                            <span class="label label-pill label-danger">{{$newMessagesCount}}</span>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
																		@forelse($newMessages as $message)
																			<div class="dropdown-menu-messages-list">
																					<a href="{{url('/viewMessage/'.$message->id)}}" class="mess-item">
																							<span class="avatar-preview avatar-preview-32"><img src="{{ URL::asset('template/img/avatar-1-64.png') }}" alt=""></span>
																							<span class="mess-item-name">{{$message->user->name}} {{$message->user->lastname}}</span>
																							<span class="mess-item-txt">{{str_limit($message->body_message, $limit = 25, $end = "...")}}</span>
																					</a>

																			</div>
																		@empty
																			<span>No hay mensajes nuevos</span>
																		@endforelse
	                                </div>

	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="{{url('/viewMessages')}}">Ver todos</a>
	                            </div>
	                        </div>
	                    </div>
											<!-- notificaciones2 -->
											@endif

											<!-- usuario administrador -->
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{ URL::asset('template/img/avatar-2-64.png') }}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
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
	                    	<h3 class="panel-title">Sistema Administrador de Notificaciones Politécnico</h3>
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
						<a href="{{url('/dashboard')}}">
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
						@if(Auth::user()->user_type_id == 1)
							<a href="{{url('/viewMessages')}}">
								<span>
										<i class="font-icon font-icon-comments active"></i>
										<span class="lbl">Mensajes del administrador</span>
								</span>
							</a>
						@else
							<a href="{{url('/composeMessage')}}">
								<span>
										<i class="font-icon font-icon-comments active"></i>
										<span class="lbl">Mensajear al administrador</span>
								</span>
							</a>
						@endif
	        </li>
					<!-- fin mensajes -->

					<!-- notificaciones -->
	        <li class="magenta with-sub">
						<a href="{{url('/notificationmaker')}}">
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
	                <li><a href="{{url('/calendar')}}"><span class="lbl">Calendario (Resumen)</span></a></li>
	                <li><a href="{{url('/line')}}"><span class="lbl">Línea del tiempo</span></a></li>
	            </ul>
	        </li>
					<!-- fin historial -->

					<!-- usuarios -->
	        <li class="blue-dirty">
	            <a href="{{url('/users')}}">
	                <span class="font-icon font-icon-user"></span>
	                <span class="lbl">Usuarios</span>
	            </a>
	        </li>
					<!-- fin usuarios -->

					<!-- sectores -->
            @if(Auth::user()->user_type_id == 1)
            <li class="gold with-sub">
	            <a href="{{url('/sectors')}}">
	                <span class="font-icon font-icon-widget"></span>
	                <span class="lbl">Sectores</span>
	            </a>
	        </li>
	        @endif
					<!-- fin sectores -->

					<!-- tipos -->
            @if(Auth::user()->user_type_id == 1)
	        <li class="brown with-sub">
	            <a href="{{url('/types')}}">
	                <span class="font-icon font-icon-contacts"></span>
	                <span class="lbl">Tipos de usuario</span>
	            </a>
	        </li>
	        @endif
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

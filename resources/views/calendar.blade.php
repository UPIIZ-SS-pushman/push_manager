@extends('layout')

@section('style')
<link rel="stylesheet" href="template/css/lib/fullcalendar/fullcalendar.min.css">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Calendario de notificaciones</h5>

<div class="box-typical">
	<div class="calendar-page">
		<div class="calendar-page-content">
			<div class="calendar-page-content-in">
				<div id='calendar'></div>
			</div><!--.calendar-page-content-in-->
		</div><!--.calendar-page-content-->

		<div class="calendar-page-side">
			<section class="calendar-page-side-section">
				<div class="calendar-page-side-section-in">
					<div id="side-datetimepicker"></div>
				</div>
			</section>


		</div><!--.calendar-page-side-->
	</div><!--.calendar-page-->
</div><!--.box-typical-->

@stop


@section('scripts')
<script type="text/javascript" src="template/js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="template/js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="template/js/lib/match-height/jquery.matchHeight.min.js"></script>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

	<script src="template/js/lib/fullcalendar/fullcalendar.min.js"></script>
	<script src="template/js/lib/fullcalendar/fullcalendar-init.js"></script>



@stop

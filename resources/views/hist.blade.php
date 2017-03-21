@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="template/css/lib/fullcalendar/fullcalendar.min.css">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Dashboard</h5>

<div class="box-typical">
	<div class="calendar-page">
		<div class="calendar-page-content">
			<div class="calendar-page-title">Calendario</div>
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

			<section class="calendar-page-side-section">
				<header class="box-typical-header-sm">Surgery on march 18</header>
				<div class="calendar-page-side-section-in">
					<ul class="exp-timeline">
						<li class="exp-timeline-item">
							<div class="dot"></div>
							<div>10:00</div>
							<div class="color-blue-grey">Name Surname Patient Surgey ACL left knee</div>
						</li>
						<li class="exp-timeline-item">
							<div class="dot"></div>
							<div>10:00</div>
							<div class="color-blue-grey">Name Surname Patient Surgey ACL left knee</div>
						</li>
					</ul>
				</div>
			</section>

			<section class="calendar-page-side-section">
				<header class="box-typical-header-sm">Filtros</header>
				<div class="calendar-page-side-section-in">
					<ul class="colors-guide-list">
						<li>
							<div class="color-double green"><div></div></div>
							Appointments
						</li>
						<li>
							<div class="color-double"><div></div></div>
							Meetings
						</li>
						<li>
							<div class="color-double orange"><div></div></div>
							Supervision
						</li>
						<li>
							<div class="color-double red"><div></div></div>
							Surgey
						</li>
						<li>
							<div class="color-double coral"><div></div></div>
							Training
						</li>
					</ul>
				</div>
			</section>
		</div><!--.calendar-page-side-->
	</div><!--.calendar-page-->
</div><!--.box-typical-->

@stop


@section('scripts')

	<script src="template/js/lib/fullcalendar/fullcalendar.min.js"></script>
	<script src="template/js/lib/fullcalendar/fullcalendar-init.js"></script>

@stop

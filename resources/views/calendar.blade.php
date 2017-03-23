@extends('layouts.main')
@section('title')
PushManager - Calendario de notificaciones
@stop
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
<script>
$('#calendar').fullCalendar({
		header: {
				left: '',
				center: 'prev, title, next',
				right: 'today agendaDay,agendaTwoDay,agendaWeek,month'
		},
		buttonIcons: {
				prev: 'font-icon font-icon-arrow-left',
				next: 'font-icon font-icon-arrow-right',
				prevYear: 'font-icon font-icon-arrow-left',
				nextYear: 'font-icon font-icon-arrow-right'
		},
		editable: false,
		selectable: true,
		eventLimit: true, // allow "more" link when too many events
		events: '{{url("/notificationcalendarfeed")}}',
		viewRender: function(view, element) {
				// При переключении вида инициализируем нестандартный скролл
				if (!("ontouchstart" in document.documentElement)) {
						$('.fc-scroller').jScrollPane({
								autoReinitialise: true,
								autoReinitialiseDelay: 100
						});
				}

				$('.fc-popover.click').remove();
		},
		eventClick: function(calEvent, jsEvent, view) {

				var eventEl = $(this);

				// Add and remove event border class
				if (!$(this).hasClass('event-clicked')) {
						$('.fc-event').removeClass('event-clicked');

						$(this).addClass('event-clicked');
				}



				// Position popover
				function posPopover(){
						$('.fc-popover.click').css({
								left: eventEl.offset().left + eventEl.outerWidth()/2,
								top: eventEl.offset().top + eventEl.outerHeight()
						});
				}

				posPopover();

				$('.fc-scroller, .calendar-page-content, body').scroll(function(){
						posPopover();
				});

				$(window).resize(function(){
					 posPopover();
				});


				// Remove old popover
				if ($('.fc-popover.click').length > 1) {
						for (var i = 0; i < ($('.fc-popover.click').length - 1); i++) {
								$('.fc-popover.click').eq(i).remove();
						}
				}

				// Close buttons
				$('.fc-popover.click .cl, .fc-popover.click .remove-popover').click(function(){
						$('.fc-popover.click').remove();
						$('.fc-event').removeClass('event-clicked');
				});

				// Actions link
				$('.fc-event-action-edit').click(function(e){
						e.preventDefault();

						$('.fc-popover.click .main-screen').hide();
						$('.fc-popover.click .edit-event').show();
				});

				$('.fc-event-action-remove').click(function(e){
						e.preventDefault();

						$('.fc-popover.click .main-screen').hide();
						$('.fc-popover.click .remove-confirm').show();
				});
		}
});;
</script>


@stop

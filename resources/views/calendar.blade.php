@extends('layout')

@section('style')
<link rel="stylesheet" href="template/css/lib/fullcalendar/fullcalendar.min.css">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Calendario de notificaciones</h5>

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
							Citas
						</li>
						<li>
							<div class="color-double"><div></div></div>
							Reuniones
						</li>
						<li>
							<div class="color-double orange"><div></div></div>
							Supervisiones
						</li>
						<li>
							<div class="color-double red"><div></div></div>
							Consultas
						</li>
						<li>
							<div class="color-double coral"><div></div></div>
							Capacitaciones
						</li>
					</ul>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

	$(document).ready(function() {
		$('.panel').lobiPanel({
			sortable: true
		});

		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var dataTable = new google.visualization.DataTable();
			dataTable.addColumn('string', 'Day');
			dataTable.addColumn('number', 'Values');
			// A column for custom tooltip content
			dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
			dataTable.addRows([
				['MON',  130, ' '],
				['TUE',  130, '130'],
				['WED',  180, '180'],
				['THU',  175, '175'],
				['FRI',  200, '200'],
				['SAT',  170, '170'],
				['SUN',  250, '250'],
				['MON',  220, '220'],
				['TUE',  220, ' ']
			]);

			var options = {
				height: 314,
				legend: 'none',
				areaOpacity: 0.18,
				axisTitlesPosition: 'out',
				hAxis: {
					title: '',
					textStyle: {
						color: '#fff',
						fontName: 'Proxima Nova',
						fontSize: 11,
						bold: true,
						italic: false
					},
					textPosition: 'out'
				},
				vAxis: {
					minValue: 0,
					textPosition: 'out',
					textStyle: {
						color: '#fff',
						fontName: 'Proxima Nova',
						fontSize: 11,
						bold: true,
						italic: false
					},
					baselineColor: '#16b4fc',
					ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
					gridlines: {
						color: '#1ba0fc',
						count: 15
					},
				},
				lineWidth: 2,
				colors: ['#fff'],
				curveType: 'function',
				pointSize: 5,
				pointShapeType: 'circle',
				pointFillColor: '#f00',
				backgroundColor: {
					fill: '#008ffb',
					strokeWidth: 0,
				},
				chartArea:{
					left:0,
					top:0,
					width:'100%',
					height:'100%'
				},
				fontSize: 11,
				fontName: 'Proxima Nova',
				tooltip: {
					trigger: 'selection',
					isHtml: true
				}
			};

			var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
			chart.draw(dataTable, options);
		}
		$(window).resize(function(){
			drawChart();
			setTimeout(function(){
			}, 1000);
		});

		$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel){
			$('.dahsboard-column').matchHeight();
		});
	});
</script>
	<script src="template/js/lib/fullcalendar/fullcalendar.min.js"></script>
	<script src="template/js/lib/fullcalendar/fullcalendar-init.js"></script>

	<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            locale: 'es'
        });

    });

</script>


@stop

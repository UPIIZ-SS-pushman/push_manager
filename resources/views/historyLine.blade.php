@extends('layouts.main')
@section('title')
PushManager - Linea de notificaciones
@stop
@section('style')

@stop

@section('content')
<h5 class="m-t-lg with-border m-t-0">Linea del tiempo de las notificaciones</h5>

		<div class="container-fluid">
			<section class="activity-line">
			
			@foreach($notif->sortByDesc('sent') as $not)
			
			<?php
                $time = \Carbon\Carbon::parse($not->sent);
                $time->setTimezone('America/Mexico_City');
                $individuals = $not->getSelectedIndividuals();
                $sectors = $not->getSelectedSectors();
            ?>
			
                <article class="activity-line-item box-typical">
                    <div class="activity-line-date">
                        {{$time->format("d/m/Y")}}
						{{$time->format("H:i")}}
					</div>
					
                    <header class="activity-line-item-header">
						<h5 class="m-t-lg m-t-0">{{$not->title}}</h5>
					</header>
					
					<div class="activity-line-action-list">
						<section class="activity-line-action">
						
                            @if($not->notification_log->status == 0)
                                <div class="time">Programada:</div>
                            @elseif($not->notification_log->status == 1)
                                <div class="time">Enviada <i class="font-icon font-icon-ok"></i> :</div>
                            @elseif($not->notification_log->status == -1)
                                <div class="dot"></div>
                                <div class="time">No enviada :</div>
                            @endif
                            
							<div class="cont">
								<div class="cont-in">
                                    @if($not->notification_log->status == 0)
                                        <div class="alert alert-purple">
                                            {{$not->body}}
                                        </div>
                                    @elseif($not->notification_log->status == 1)
                                        <div class="alert alert-success">
                                            {{$not->body}}
                                        </div>
                                    @elseif($not->notification_log->status == -1)
                                        <div class="alert alert-warning">
                                            {{$not->body}}
                                        </div>
									@endif
									
									@if(!empty($individuals))
									<p>Individuos:
                                        <ul class="meta">
                                            @foreach($individuals as $ind)
                                                <li><a href="#">[{{App\User::find($ind)->name}} {{App\User::find($ind)->lastname}}]</a></li>
                                            @endforeach
                                        </ul> 
                                    </p>
                                    @endif
                                    
                                    @if(!empty($sectors))
									<p>Sectores:
                                        <ul class="meta">
                                            @foreach($sectors as $sec)
                                                <li><a href="#">[{{App\Sector::find($sec)->name}}]</a></li>
                                            @endforeach
                                        </ul>  
									</p>
									@endif
									
								</div>
							</div>
						</section><!--.activity-line-action-->
						<div class="activity-line-more">
							<a href="{{url('/notification/view',[$not->id])}}">Ver mas</a>
						</div>
					</div><!--.activity-line-action-list-->
                </article>
			@endforeach
			
			</section><!--.activity-line-->
		</div><!--.container-fluid-->

@stop

@section('scripts')
@stop

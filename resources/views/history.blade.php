@extends('layouts.main')

@section('style')
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Historial</h5>

<section class="activity-line">

  <article class="activity-line-item box-typical">
    <div class="activity-line-date">
      Sabado<br/>
      7 sep
    </div>
    <header class="activity-line-item-header">
      <div class="activity-line-item-user">
        <div class="activity-line-item-user-photo">
          <a href="#">
            <img src="img/photo-64-3.jpg" alt="">
          </a>
        </div>
        <div class="activity-line-item-user-name">Vasilisa</div>
        <div class="activity-line-item-user-status">Product Manager, San Francisco</div>
      </div>
    </header>
    <div class="activity-line-action-list">
      <section class="activity-line-action">
        <div class="time">10:40 AM</div>
        <div class="cont">
          <div class="cont-in">
            <p>Scheduled a meeting for new shopping cart experience with Development team</p>
            <ul class="meta">
              <li><a href="#">5 Comments</a></li>
              <li><a href="#">5 Likes</a></li>
            </ul>
          </div>
        </div>
      </section><!--.activity-line-action-->
      <section class="activity-line-action">
        <div class="time">10:40 AM</div>
        <div class="cont">
          <div class="cont-in">
            <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
            <div class="alert alert-info">
              New Notification E-Mail: Past Due Request Reminder<br/>
              Recap: For requests, 3 e-mails are generated
            </div>
            <div class="alert alert-danger">
              New Notification E-Mail: Past Due Request Reminder<br/>
              Recap: For requests, 3 e-mails are generated
            </div>

            <div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              Noticias: You have done 5 actions
            </div>

            <div class="alert alert-danger alert-no-border alert-close alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="font-icon font-icon-inline font-icon-warning"></i>
							<strong>Algo :U</strong><br/>
							Lorem Ipsum is simply dummy text of the printing and typesetting.
							<div class="alert-btns">
								<button type="button" class="btn btn-rounded">Hacer algo</button>
								<button type="button" class="btn btn-rounded">Hacer algo mas</button>
							</div>
						</div>

            <div class="alert alert-warning">
              New Notification E-Mail: Past Due Request Reminder<br/>
              Recap: For requests, 3 e-mails are generated
            </div>
            <div class="alert alert-success">
              New Notification E-Mail: Past Due Request Reminder<br/>
              Recap: For requests, 3 e-mails are generated
            </div>
            <div class="alert alert-purple">
              New Notification E-Mail: Past Due Request Reminder<br/>
              Recap: For requests, 3 e-mails are generated
            </div>
            <ul class="meta">
              <li><a href="#">5 Comentarios</a></li>
              <li><a href="#">5 Likes</a></li>
            </ul>
          </div>
        </div>
      </section><!--.activity-line-action-->
      <div class="activity-line-more">
        <a href="#">Ver mas</a>
      </div>
    </div><!--.activity-line-action-list-->
  </article><!--.activity-line-item-->

</section><!--.activity-line-->

@stop

@section('scripts')
@stop

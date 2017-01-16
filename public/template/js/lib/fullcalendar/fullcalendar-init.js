$(document).ready(function(){

/* ==========================================================================
    Fullcalendar
    ========================================================================== */

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
        events: '/notificationcalendarfeed',
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
    });




});


/* ==========================================================================
    Calendar page grid
    ========================================================================== */

(function($, viewport){
    $(document).ready(function() {

        if(viewport.is('>=lg')) {
            $('.calendar-page-content, .calendar-page-side').matchHeight();
        }

        // Execute code each time window size changes
        $(window).resize(
            viewport.changed(function() {
                if(viewport.is('<lg')) {
                    $('.calendar-page-content, .calendar-page-side').matchHeight({ remove: true });
                }
            })
        );
    });
})(jQuery, ResponsiveBootstrapToolkit);

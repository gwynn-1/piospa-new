var changeAppointment = function (event) {
    $.ajax({
        url : laroute.route("admin.appointment.edit"),
        method:"POST",
        data:{
            appointment_id:event.appointment_id,
            start_time:event.start.format("YYYY-MM-DD HH:mm:ss"),
            end_time:event.end.format("YYYY-MM-DD HH:mm:ss")
        },
        success:function (data) {
            // alert(data);
            if(data.status==1){
                swal("Success", "Đổi ngày hẹn thành công", "success");
            }
        }
    });
}

var CalendarBasic= {
        init:function() {
            $("#m_calendar").fullCalendar( {
                header: {
                    left: "prev,next today", center: "title", right: "month,agendaWeek"
                },
                editable:!0,
                eventLimit:!0,
                navLinks:!0,
                events: time_event,
                eventRender:function(e, t) {
                        t.hasClass("fc-day-grid-event")?(t.data("content", e.description), t.data("placement", "top"), mApp.initPopover(t)): t.hasClass("fc-time-grid-event")?t.find(".fc-title").append('<div class="fc-description">'+e.description+"</div>"): 0!==t.find(".fc-list-item-title").lenght&&t.find(".fc-list-item-title").append('<div class="fc-description">'+e.description+"</div>")
                },
                eventDrop:function( event, delta, revertFunc, jsEvent, ui, view) {
                    changeAppointment(event);
                },
                eventResize:function( event, delta, revertFunc, jsEvent, ui, view) {
                    changeAppointment(event);
                }
            })
        }
    };
jQuery(document).ready(function() {
        CalendarBasic.init()
    });
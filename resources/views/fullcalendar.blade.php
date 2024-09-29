@extends('header')
@section('calendar')
<style>
    .nav-tabs .nav-item{
        margin-right:15px;
    }
</style>
<br><br>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6" style='margin-left:100px;'>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Follow Up Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="reminder-tab" data-toggle="tab" href="#reminder" role="tab" aria-controls="reminder" aria-selected="false">Reminder Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="task-tab" data-toggle="tab" href="#task" role="tab" aria-controls="contact" aria-selected="false">Task Calendar</a>
                </li>
            </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br />
            <div id="calendar" ></div>
        </div>
        <div class="tab-pane fade" id="reminder" role="tabpanel" aria-labelledby="reminder-tab">
            <br />
            <div id="calendar1" ></div>
        </div>
        <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="task-tab">
            <br />
            <div id="calendar2" ></div>
        </div>
    </div>
    
    
    
<!--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <form action="" method="post">-->
<!--                <div class="modal-body">-->
<!--                    <div class="modal-title"></div>-->
                    
<!--                    Title:-->
<!--                    <br />-->
<!--                    <input type="text" class="form-control" name="title" id="title">-->

<!--                    Start time:-->
<!--                    <br />-->
<!--                    <input type="text" class="form-control" name="start_time" id="start_time">-->

<!--                    End time:-->
<!--                    <br />-->
<!--                    <input type="text" class="form-control" name="finish_time" id="finish_time">-->
<!--                </div>-->

<!--                <div class="modal-footer">-->
<!--                    <input type="hidden" name="event_id" id="event_id" value="" />-->
<!--                    <input type="hidden" name="id" id="id" value="" />-->
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                    <input type="submit" class="btn btn-primary" id="Add Event" value="Save">-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

 
        
</div>
<div clas="col-md-6">
    <br><br>
    <div class="calen"></div>
    <h4 style="text-align:center; paddind-right:100px">Today Appointment</h4>
</div>
 
  
</div>
</div>
   
<!--<script>-->
<!--$(document).ready(function () {-->

<!--    var SITEURL = "{{ url('/') }}";-->

    
    

<!--    $('#calendar').fullCalendar({-->
<!--        header: {-->
<!--            left: 'prev,next today',-->
<!--            center: 'title',-->
<!--            right: 'month,agendaWeek,agendaDay,year'-->
<!--        },-->
<!--        defaultDate: new Date(),-->
<!--        defaultView: 'month',-->
<!--        editable: true,-->
<!--        events: SITEURL + "/fullcalender",-->
<!--        selectable:true,-->
<!--        selectHelper:true,-->

<!--        dayClick:function(date,event,view){-->
<!--            $('.modal-title').html('<h4>Add Event</h4>');-->
<!--            $('#editModal').modal();-->
            
<!--            var title = $('#title').val();-->
<!--            var start_time = $('#start_time').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));-->
<!--            var end_time = $('#finish_time').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));-->
            
<!--            $.ajax({-->
<!--                url: SITEURL + "/fullcalenderAjax",-->
<!--                data: {-->
<!--                    title: title,-->
<!--                    start: start_time,-->
<!--                    end: end_time,-->
<!--                    type: 'add',-->
                    
<!--                },-->
<!--                type: "POST",-->
<!--                success: function (data) {-->
<!--                    displayMessage("Event Created Successfully");-->

<!--                    calendar.fullCalendar('renderEvent',-->
<!--                        {-->
<!--                            id: data.id,-->
<!--                            title: title,-->
<!--                            start: start,-->
<!--                            end: end,-->
<!--                            allDay: allDay-->
<!--                        },true);-->

<!--                    calendar.fullCalendar('unselect');-->
<!--                }-->
<!--            });-->


<!--        },-->
        
<!--    });-->
  
 
<!--});-->


<!--</script>-->


  
<script>
// follow up calendar 
$(document).ready(function () {

    var SITEURL = "{{ url('/') }}";

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    



    var calendar = $('#calendar').fullCalendar({
        
        editable: true,
        events: SITEURL + "/fullcalender",
        displayEventTime: true,
        editable: true,
        
        header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay',
            
        },
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                    element.css('background-color', 'black');
                    event.allDay = true;
            } else {
                element.css('background-color', 'red');
                element.css('color', 'white');

                    event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt(' Enter Event Title:');


            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                
                $.ajax({
                    url: SITEURL + "/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add',
                        table: 'Events'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Created Successfully");

                        calendar.fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },true);

                        calendar.fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
                
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

            $.ajax({
                url: SITEURL + '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id,
                    type: 'update',
                    table: 'Events'
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Event Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");

            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                            id: event.id,
                            type: 'delete',
                            table: 'Events'
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event.id);
                        displayMessage("Event Deleted Successfully");
                    }
                });
            }
        }

    });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>

<script>
// remider calendar 
$(document).ready(function () {
    
    var SITEURL = "{{ url('/') }}";
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    


    
    var calendar = $('#calendar1').fullCalendar({

        editable: true,
        events: SITEURL + "/fullcalenderReminder",
        displayEventTime: true,
        editable: true,

        
        header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay',
        
    },
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                element.css('background-color', 'black');
                    event.allDay = true;
            } else {
                element.css('background-color', 'yellow');
                element.css('color', 'black');

                    event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt(' Enter Event Title:');


            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + "/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add',
                        table: 'Reminders'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Created Successfully");

                        calendar.fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },true);

                        calendar.fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
            
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

            $.ajax({
                url: SITEURL + '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id,
                    type: 'update',
                    table: 'Reminders'
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Event Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");

            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                            id: event.id,
                            type: 'delete',
                            table: 'Reminders'
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event.id);
                        displayMessage("Event Deleted Successfully");
                    }
                });
            }
        }

    });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>

<script>
// task calender
$(document).ready(function () {
    
    var SITEURL = "{{ url('/') }}";
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    



    var calendar = $('#calendar2').fullCalendar({

            editable: true,
            events: SITEURL + "/fullcalenderTask",
            displayEventTime: true,
            editable: true,
            
                
                header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay',
                
        },
            eventRender: function (event, element, view) {
                // alert(event);
                if (event.allDay === 'true') {
                        element.css('background-color', 'black');
                        event.allDay = true;
                } else {
                    element.css('background-color', 'grey');
                    element.css('color', 'white');

                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt(' Enter Event Title:');


                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/fullcalenderAjax",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            type: 'add',
                            table: 'Tasks'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event Created Successfully");

                            calendar.fullCalendar('renderEvent',
                                {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            },
            eventDrop: function (event, delta) {
                    
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'update',
                        table: 'Tasks'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");

                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                                id: event.id,
                                type: 'delete',
                                table: 'Tasks'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event Deleted Successfully");
                        }
                    });
                }
            }

        });

});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>


  
</body>
</html>
@endsection
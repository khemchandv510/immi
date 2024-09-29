@extends('header')
@section('attendance')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <ul class="nav nav-tabs" role="tablist" id="attendance">
                        <li class="nav-item">
                                <a class="nav-link  active"  href="#attendance_today" role="tab" data-toggle="tab">Today Attendance </a>
                            </li>
                    <li class="nav-item">
                    <a class="nav-link " href="#attendance_by_date" role="tab" data-toggle="tab"> Attendance By Date </a>
                    </li>
                
                    <li class="nav-item">
                    <a class="nav-link" href="#attendance_by_month" role="tab" data-toggle="tab"> Attendance By Month</a>
                    </li>
                </ul>
                {{-- tab pan    --}}
                <div class="tab-content content-style active  my-4" id="attendance_page_tab">

                        <div role="tabpane" class="tab-pane  active" id="attendance_today">
                        <table class="table">
                                <tbody>
                                <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Attendance</th>
                                        {{-- <th>Logged In</th>
                                        <th>Late</th> --}}
                                        <td>Leave </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php 
                                   
                                      
                                    $agent = DB::table('users')->get();
                                    foreach($agent as $a){
            ?>
                                <tr>
                                    <td>  {{$a->name}} </td>
                                    <td>  {{$a->employee_id}} </td>
                                    <td> 
                                            <?php $check_attendance = DB::table('attendances')->where('date',date('Y-m-d'))->where('employee_id',$a->employee_id)->get();
                                            //    dd($check_attendance->count()`);
                                            ?>
                                        @if($check_attendance->count() > 0)
                                        @if($check_attendance[0]->attendance == "Present")
                                    <input type="button" style="background: #aabcac;
                                     border: 1px solid #aabcac; " value="{{$check_attendance[0]->attendance}}" disabled  class="present btn btn-danger" />    
                                        @elseif($check_attendance[0]->attendance == "Absent")
                                         <input type="button" style="background: #e3342f;" value="{{$check_attendance[0]->attendance}}" disabled  class="present btn btn-danger" /> 
                                         @elseif($check_attendance[0]->attendance == "Half Day")
                                         <input type="button" style="background: #a5905f;" value="{{$check_attendance[0]->attendance}}" disabled  class="present btn btn-danger" /> 
                                     @endif
                                    
                                    @else    
                                    <input type="button" class="present btn btn-danger" value="Present" data-name="{{$a->name}}" data-id="{{$a->employee_id}}" />
                                    <input type="button" value="Absent " class="absent btn btn-present" data-name="{{$a->name}}" data-id="{{$a->employee_id}}" />

                                    <input type="button" value="Half Day" class="half btn btn-half" data-name="{{$a->name}}"
                                    data-id="{{$a->employee_id}}" />
                                    @endif
                                    </td>
                                    {{-- <td>fdgfd</td>
                                    <td>fdgfd</td> --}}
                                    <td> 
                                        {{-- @if($a->employee_id) --}}
                                        <?php  
                                        $leave_approve = DB::table('leave_requests')->where('date',date('Y-m-d'))->where('employee_id',$a->employee_id)->get(); 
                                        
                                        
                                        ?>
                                        @if(($leave_approve->count() > 0))
                                         @if($leave_approve) 
                                         
                                        <input type="button" class="btn btn-danger leave-request" value="Leave Request">
                                        @endif
                                        @endif
                                    </td>
                                </tr>   
                            <?php } ?> 
                                </tbody>   
                                </table>
    
                                
                                
<!-- The Modal -->
<div id="leave_request" class="modal">
        <!-- Modal content -->
                <div class="modal-content">
                   <span class="leave-request-close">&times;</span>
                  <h5 class="callbacklater">Leave Request</h5>
                
                @foreach($leave_approve as $leave)
        {{-- <input type="text" name="" id="" value="{{$leave->employee_name}}"> --}}
        @endforeach
        
        
                  
                  {{Form::open(array('url'=>"" , 'id' => 'form', 'data-id' => '$id->unique_id', 'class' => 'form'))}}
                  
                  <div class="comment-section">
              <input type="date" class="callbacklater" name="callbacklater" id="callbackdate">
              <input type="time" class="callbacklater" name="callbacklater_time" id="callbacktime">
              <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        </div>
              {{Form::submit('Save', array('class' => ' w-10 my-3', 'id' =>'save_comment_button'))}}
              {{Form::close()}}
        
                </div>
              </div>
              {{-- end modal  --}}

<script>
$(document).ready(function(){
    $('.leave-request').click(function(){
        document.getElementById('leave_request').style.display= "block";
        });
 
        
$('.leave-request-close').click(function(){
    document.getElementById('leave_request').style.display= "none";
}
});
})
</script>                                
 

                            </div>


                    <div role="tabpane" class="tab-pane " id="attendance_by_date">
                        {{Form::open(array('url'=>'attendance-by-date'))}}
                        {{Form::date('date',null, array('class' => 'form-contro'))}}
                        {{Form::submit('submit',array('class' => 'btn btn-danger' ))}}
                        {{Form::close()}}
                        <p class="selected-date"> 
                                @if(!empty($attendance))    
                               @foreach($attendance as $a)
                                 @endforeach
                                 {{$a->date}}
                                 @endif
                             
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Id </td>
                                    <td>Name </td>
                                    <td>Attendance </td>
                                
                                </tr>
                            </thead>
                            @if(empty($attendance))
                            <tbody>
                                <?php
                                $atendance =  DB::table('attendances')->get();
                                foreach($atendance as $a){
                                ?>
                                <tr>
                                    <td>  {{$a->employee_id}} </td>
                                    <td>  {{$a->name}} </td>
                                <td>  {{$a->attendance}} {{$a->time }}</td>
                             
                                </tr>
                            <?php } ?>
                            </tbody>
                            @else
                            @foreach($attendance as $a)
                            <tr>
                                    <td>  {{$a->employee_id}} </td>
                                    <td>  {{$a->name}} </td>
                                <td>  {{$a->attendance}} {{$a->time }}</td>
                                </tr>
                                @endforeach
                                @endif
                        </table>
                    
                    </div>

                
                    

                    <div role="tabpane" class="tab-pane " id="attendance_by_month">
               {{Form::open(array('url' => 'attendance-by-month' ))}}      
                        <select name="select_month" id="">
                            <option selected disabled> -- Select -- </option>
                            <?php 
                            $agent = DB::table('attendances')->select('name','employee_id')->get();
foreach($agent as $agents){
                        ?>
                        <option value="{{$agents->employee_id}}"> {{$agents->name}} </option>
<?php   } ?>
                        </select>
                    {{-- <p > {{$emp}}</p> --}}
{{Form::submit('Submit')}}
{{Form::close()}}



{{-- calender section start --}}


<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


<div id='calendar'></div>
<script>
//  var parent_div = document.getElementById('calendar');
//             var child_div = document.createElement('div');
//             parent_div.appendChild(child_div);
//             child_div.setAttribute('class', 'attendance_tooltip');
            // <?php 
            // @if(!empty($attendance))
            //         @foreach($attendance as $task)
            //   ?>
            // $('.attendance_tooltip').text();
            // ?>
</script>


<script>
$(document).ready(function() {
//    var data = [{'one':'2019-07-17','two':'2019-07-18'},{'one':'2019-07-18','two':'2019-07-18'}];
                   $('#calendar').fullCalendar({
                    

                events : [
                    @if(!empty($attendance_by_month))
                    @foreach($attendance_by_month as $task)
                    @if($task->attendance == "Present")
                    <?php $color = "green"; ?>
                    @elseif( $task->attendance == "Absent")
                    <?php $color = "red"; ?>
                    @else
                    <?php $color = "#e7c04d"; ?>
                    @endif
                    {  
                    title : '{{$task->attendance}}',
                    start : '{{$task->date}}' ,
                     textColor: "<?php echo $color; ?>",
                     backgroundColor:"#fff",
                     description:"sfdsdfg"
                    },

                    @endforeach
                    @endif
                   ]
                });
    });
</script>




{{-- end of calender section --}}




                    </div>
                </div>

    {{-- end of tab pan --}}
            </div> 
            {{-- end of col-sm --}}
        </div>
        {{-- end of row --}}
    </div>



    <script>
    $(".present").click(function(e){
                        e.preventDefault();
            
                            var url = "make-present";
                            var form = $(this);
                            var id = $(this).attr("data-id");
                            var name = $(this).attr("data-name");
                            var dis = $(this);
                            
                            $.ajax({
                                type: "get",  
                                url: url,  
                                dataType: "text", 
                                data: {"id": id,
                                "name": name}, 
                                success: function(data){
                                    dis.attr('disabled','disabled');

                                    dis.parent().find('.absent').hide();        
                                    dis.parent().find('.half').hide();        
    },
                                error: function(data){
                                    alert('Something Went Wrong');
                                }
                            });
                            });

                            
                    $(".absent").click(function(e){
                        e.preventDefault();
            
                            var url = "make-absent";
                            var form = $(this);
                            var id = $(this).attr("data-id");
                            var name = $(this).attr("data-name");
                        var dis = $(this);
                            $.ajax({
                                type: "get",  
                                url: url,  
                                dataType: "text", 
                                data: {"id": id,
                                "name": name}, 
                                success: function(data){

                                    dis.attr('disabled','disabled');

dis.parent().find('.present').hide();        
dis.parent().find('.half').hide();   
                                    // form.parent().parent().hide();        
    },
                                error: function(data){
                                    alert(data);
                                }
                            });
                            });



                            $(document).on("submit", ".halfday", function(e){
                        e.preventDefault();
            
                            var url = "half-day";
                            var form = $(this);
                            var getTime = form.find("[type=time]").val();
                            var id = $(this).parent().find(".present").attr("data-id");
                            var name = $(this).parent().find(".present").attr("data-name");
                            var dis = $(this);
                            $.ajax({
                                type: "get",  
                                url: url,  
                                dataType: "text", 
                                data: {"id": id,
                                "name": name,
                                "halfdayTime": getTime}, 
                                success: function(data){


                                    dis.attr('disabled','disabled');
dis.parent().find('.halfday').hide();
dis.parent().find('.present').hide();        
dis.parent().find('.absent').hide();   


                                    // form.parent().parent().hide(); 
                                    // console.log(data);       

                                },
                                error: function(data){
                                    alert(data);
                                }
                            });
                              });

                    $(".half").click(function(e){
                        $(this).parent().append("<form class='halfday'><input type='time' name='timeget' /><input type='submit' name='submit' value='Submit' />");
                    });
            
                    

    </script>
    </div>
    

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script> --}}





<style>
    .fc-view-container{
        width: 62%;
    margin: auto;
    }
.fc-row{
    /* height: 60px !important; */
}
.fc-day-top{
    border-right: 1px solid #dddddd !important;
    /* border-bottom: 1px solid #dddddd !important; */
}

.fc-row .fc-content-skeleton td, .fc-row .fc-helper-skeleton td{
    border-color: #dddddd ;
}
.fc-row.fc-widget-header{
    height:2em !important;
}
.fc-row{
    height:5em !important;
}

.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end{
    width: 55px;
    text-align: center;
    padding: 4px;
    margin: auto;
}
.fc-row.fc-week.fc-widget-content .fc-bg .fc-day.fc-widget-content.fc-fri.fc-today.fc-state-highlight{
    background: #fcf8e3 !important; 
}
</style>






@endsection
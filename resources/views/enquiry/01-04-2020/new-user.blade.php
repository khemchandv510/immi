@extends('header')  
@section('new-user')



</div>
<div style="text-align: right;font-size: 18px;"> <a class="nav-link2" href="{{ url('existing-user') }}" > Existing User    </a> </div>
<div class="container-fluid my-3">
        <h3>New User</h3>
      
      
      
      
      
      
      
      
      
      
      
      
        {{ Form::open(array('url'=>'new-user' ,'files'=>'true')) }}
        
        


            <div class="row content-color">
             <div class="col-md-12 btn-danger"><h4 class="my-2">Registration Details</h4></div>   
                  <div class="col-md-2 py-3 ">Candidate Name:  <span  class = "star"> * </span> </div>
                   <div class="col-md-4 py-3 ">
                        {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                        <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                    </div>
       
                  
{{--                     
                    <div class="col-md-2 py-3">Gender:  </div>
                <div class="col-md-4 py-3">
                    <select class="form-control" name="gender">
                      <option disabled Selected> --Select-- </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        
                      </select>
                      
                </div> --}}

 
                <div class="col-md-2 py-3">Contact : <span class = "star"> * </span> </div>
                <div class="col-md-4 py-3">
                        {!! Form::number('contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
                    
                    </div>

                    <div class="col-md-2 py-3">Alternate Contact :</div>
                    <div class="col-md-4 py-3">
                            {!! Form::number('alternate_contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>
                        
                        </div>


                    <div class="col-md-2 py-3">Email :</div>
                    <div class="col-md-4 py-3">
                            {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Email')) !!}
                            <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                        
                        </div>



                        <div class="col-md-2 py-3">Status :</div>
                        <div class="col-md-4 py-3">
                               <?php   $status =  DB::table('enq_status')->select('status')->get() ?>
                            <select name="status" id="new_user_status" class="form-control">
                                <option disabled selected > --Select-- </option>
@foreach($status as $s)
                            <option value="{{$s->status}}">{{$s->status}}</option>
                                @endforeach
                            </select>
                            <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                            <input type="date" name="date" id="date" class="form-contro" style="display:none;margin-top:5px;">
                             <input type="time" name="time" id="time" class="form-contro" style="display:none;margin-top:5px;">
                             
                           <style>
                           input[type="date"], input[type="time"]{
                            width: 49%;
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #cbc7c7;
                           }
                           </style>











{{-- <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2">
        <div class="content">
          
          <div class="form-group">
            <label>Date</label>
            <div class="input-group date" id="datepicker">
              <input class="form-control"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
            </div>
          </div>
          <div class="form-group">
            <label>Time</label>
            <div class="input-group time" id="timepicker">
              <input class="form-control"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock"></i></span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <style>
  /* @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");
@import url("https://fonts.googleapis.com/css?family=Pacifico");
.input-group-addon {
  cursor: pointer;
}

.form-control {
  border: 1px solid #ccc;
  box-shadow: none;
}
.form-control:hover, .form-control:focus, .form-control:active {
  box-shadow: none;
}
.form-control:focus {
  border: 1px solid #34495e;
}



h1 {
  color: #333;
  font-family: 'Pacifico', cursive;
  font-size: 28px;
  line-height: 42px;
  margin: 0 0 15px;
  text-align: center;
}

.content {
  background: #fff;
  border-radius: 3px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075), 0 2px 4px rgba(0, 0, 0, 0.0375);
  padding: 30px 30px 20px;
}

.bootstrap-datetimepicker-widget.dropdown-menu {
  border: 1px solid #34495e;
  border-radius: 0;
  box-shadow: none;
  margin: 10px 0 0 0;
  padding: 0;
  min-width: 300px;
  max-width: 100%;
  width: auto;
}
.bootstrap-datetimepicker-widget.dropdown-menu.bottom:before, .bootstrap-datetimepicker-widget.dropdown-menu.bottom:after {
  display: none;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td,
.bootstrap-datetimepicker-widget.dropdown-menu table th {
  border-radius: 0;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td.old, .bootstrap-datetimepicker-widget.dropdown-menu table td.new {
  color: #bbb;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td.today:before {
  border-bottom-color: #0095ff;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td.active,
.bootstrap-datetimepicker-widget.dropdown-menu table td.active:hover,
.bootstrap-datetimepicker-widget.dropdown-menu table td span.active {
  background-color: #0095ff;
  text-shadow: none;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td.active.today:before,
.bootstrap-datetimepicker-widget.dropdown-menu table td.active:hover.today:before,
.bootstrap-datetimepicker-widget.dropdown-menu table td span.active.today:before {
  border-bottom-color: #fff;
}
.bootstrap-datetimepicker-widget.dropdown-menu table th {
  height: 40px;
  padding: 0;
  width: 40px;
}
.bootstrap-datetimepicker-widget.dropdown-menu table th.picker-switch {
  width: auto;
}
.bootstrap-datetimepicker-widget.dropdown-menu table tr:first-of-type th {
  border-bottom: 1px solid #34495e;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td.day {
  height: 32px;
  line-height: 32px;
  padding: 0;
  width: auto;
}
.bootstrap-datetimepicker-widget.dropdown-menu table td span {
  border-radius: 0;
  height: 77px;
  line-height: 77px;
  margin: 0;
  width: 25%;
}
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-months tbody tr td,
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-years tbody tr td,
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-decades tbody tr td {
  padding: 0;
}
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-decades tbody tr td {
  height: 27px;
  line-height: 27px;
}
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-decades tbody tr td span {
  display: block;
  float: left;
  width: 50%;
  height: 46px;
  line-height: 46px !important;
  padding: 0;
}
.bootstrap-datetimepicker-widget.dropdown-menu .datepicker-decades tbody tr td span:not(.decade) {
  display: none;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td {
  padding: 0;
  width: 30%;
  height: 20px;
  line-height: 20px;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td:nth-child(2) {
  width: 10%;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td a,
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td span,
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td button {
  border: none;
  border-radius: 0;
  height: 56px;
  line-height: 56px;
  padding: 0;
  width: 100%;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td span {
  color: #333;
  margin-top: -1px;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td button {
  background-color: #fff;
  color: #333;
  font-weight: bold;
  font-size: 1.2em;
}
.bootstrap-datetimepicker-widget.dropdown-menu .timepicker-picker table td button:hover {
  background-color: #eee;
} */

  </style>






                        </div>

                            <div class="col-md-2 py-3">Purpose:</div>
                            <div class="col-md-4 py-3"> 
                                    {{-- {!! Form::textarea('note', null, array('class'=>'form-control', 'rows'=>"3" ,'cols'=>"40", 'name' => 'note')) !!}  --}}
                                    <?php   $purpose =  DB::table('enq_purposes')->select('purpose')->get() ?>
                                    <select class="form-control" name="note">
                                        <option selected="" disabled="">-Select-</option>
                                        @foreach($purpose as $p)
                                        <option value={{$p->purpose}}>{{$p->purpose}}</option>
                                        @endforeach
                                        
                                      </select>
                                      <?php echo ($errors->first('note',"<li class='custom-error'>:message</li>")) ?>
                            </div>


                            


                            <div class="col-md-2 py-3">Comment:</div>

                            <div class="col-md-4 py-3">
    {!! Form::textarea('comment',null, array('class'=>'form-control my-4','rows'=>"3", 'cols'=>"10")) !!}  </div>

<?php 
    if( Auth::user()->usertype_status =='1'){
?>
<div class="col-md-2 py-3">Asign To Agent:</div>
<div class="col-md-4 py-3">
<?php 
$agent  = DB::table('users')->where('status',1)->get();
?>

<select name="asign_to_agent" id="" class="form-control">
  <option disabled selected>--Agent--</option>
  @foreach($agent as $a)
    <option value="{{$a->employee_id}}">  {{$a->name}}  </option>
    @endforeach
</select>
<?php } ?>
</div>


<div class="col-md-2 py-3">Source:</div>
<div class="col-md-4 py-3">
    <select name="source" id="" class="form-control">
      <option disabled selected> --Source-- </option>
    <option value='Just Dial'>{{"Just Dial"}}</option>
    <option value="Google">{{"Google"}}</option>
    <option value="Walk In">{{"Walk In"}}</option>
    <option value="Other">{{"Other"}}</option>
    </select>
</div>


                        <div class="col-md-12 text-center my-4" >
                                {!! Form::submit('Submit', array('class'=>'btn btn-danger w-10' , 'value'=>"Save" )) !!}

                                {!! Form::reset('Reset', array('class'=>'btn btn-danger w-10' )) !!}
                            </div>
                           



                      {{Form::close()}}


            </div>
</div>
<script>
$(document).ready(function(){
    $('#new_user_status').on("change", function(){
        var val = $(this).val();
        if((val == "Call Back Later") || (val ==  "Follow Up")){
        $('#date').show();
        $('#time').show();
        }
        else{
            $('#date').hide();
        $('#time').hide();
        }
    });
});
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> --}}


<script type="text/javascript">
// $(document).ready(function(){
//     $(function () {
//         $('#datetimepicker1').datetimepicker();
//     });
// });



if (/Mobi/.test(navigator.userAgent)) {
  // if mobile device, use native pickers
  $(".date input").attr("type", "date");
  $(".time input").attr("type", "time");
} else {
  // if desktop device, use DateTimePicker
  $("#datepicker").datetimepicker({
    useCurrent: false,
    format: "LL",
    icons: {
      next: "fa fa-chevron-right",
      previous: "fa fa-chevron-left"
    }
  });
  $("#timepicker").datetimepicker({
    format: "LT",
    icons: {
      up: "fa fa-chevron-up",
      down: "fa fa-chevron-down"
    }
  });
}

</script>


@endsection
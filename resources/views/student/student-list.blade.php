<?php 
use App\Helpers\Helper;
?>
@extends('header')
@section('student')

<script>
  $(document).ready(function(){
    $('#shortby,#range_filter').change(function(){
        $('.enquiry-agent-name').submit();
    })
  })

  </script>
<script>
 
// var asign_client = document.getElementById("asign_client");
//   var span2 = document.getElementsByClassName("asign-client-close")[0];
//   span2.onclick = function() {
//     asign_client.style.display = "none";
    
//   }
  // if (event.target == asign_client) {
  //   agent_create.style.display = "none";
	//   }


$(document).ready(function(){
  
  var sub =  document.querySelector('#save_comment_btn');
sub.onclick = function(){

  var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
  
  if(len>0){
    if(len>1){
    $('#asign_comment').val('');
    }
    var sub_array = [];
    for(var i=0; i<len; i++){
      sub_array.push(document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked')[i].value);
   }
   
    $('#popo2').val(sub_array);
document.getElementById('#asign_client_form').submit();
// return false;
  }else{
    alert("Please select CheckBox");
    return false;
  }
}

  $(".asign-clien").on("click", function(){
    if (confirm("Are you sure to Asign ?")){

    
    let unique_id = $(this).attr("data-id");
    
    asign_client.style.display = "block";
    // asign_client.reset();
   
$(document).ready(function(){
                          $("#asign_client_form").submit(function (e) {
                            var agent = $('#asign_client_value').val();
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url('asign-client')}}?a="+unique_id+"&agent="+agent;
             
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

    $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData( this ),
        processData: false, 
        contentType: false, 
        success: function (data) {
          // asign_client.style.display = "none";
                    
var form = document.getElementById('asign_client_form');
var elemet = document.createElement("P");
elemet.innerHTML = "Client Assign Successfully!";
elemet.style.cssText="text-align:center;color:green;width: 100%;font-size: 23px;";
form.appendChild(elemet);
                    location.reload();
                  
            }
    });
  }
    );
  });
}
  });
  });

</script>
  
  
  
<style>

label {
    margin-bottom: 0rem!important;
        padding-left:0px;
}
.last-comment-p-tag{
       margin-left: 10px;!important;
       margin-right:20px;
}
.last-comment-p-tag{
    overflow: hidden;
    width:300px;
  }


.callbacklater{
  text-align: center;
    background: #2b6699;
    width: 100%;
    margin: -1px;
    padding: 9px;
    color: #fff;
}

#myModal .callbacklater{
  position: relative !important;
    left: 0 !important;
    transform: translate(0) !important;
    padding: 10px;
    border-radius: 3px;
    width: 100%;
}


.k0listenqury table {
  position: relative;
}
.k0listenqury tr th {
    background-color: #458bbb;
  z-index:2;
    color:#fff;
        padding-top: 20px;
}
@media (min-width: 768px){
.sidebar.toggled .nav-item .collapse {
    z-index: 999 !important;
}
}


.k0listenqury th {
  position: sticky;
  top:-5px;
}

.modal-open .modal{
    z-index:1000;
}
.modal{
     z-index:1000;
}
.mob-no p a{
    color:#575757;
}
.form-group {
    margin-left: 0px!important;}

</style>

<script>
  $(document).ready(function(){
      $(".add-priority").on("click", function(){
          var unique_id = $(this).attr("data-id");
          var val = $(this).val();
          // alert(val);
    $.ajaxSetup({
                                  headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                               });
  
    // if (confirm('Are you sure you want to Set Priority?')) {
      $.ajax({
      type: "get",
      url: "{{url(Request::segment(1).'/'.'add-priority')}}?a="+unique_id+"&val="+val,
      
      success: function(data){
      location.reload();
                  }
      });
  // }
      }
      );
    });
  </script>
 <!-- start navigation -->
 <div class="container-fluid" style="padding:0">
        <div class="container-fluid "  style="padding:0">
       
       
        <script>
            $('.panel').hide();
                $(document).ready(function(){
                    
                    // $('.accordion22').click(function(){
                      
                    //     $('.panel').slideToggle("slideUp");
                    // })
                     $('.accordion22').click(function(){
                      
                        $('.panel').slideToggle("slideUp");
                      $('.accordion22').toggleClass('fa-chevron-up fa-chevron-down');
                    })
                })
            </script>
       <button class="accordion22 fa fa-chevron-down" type="button" style="position: absolute;
    right: 28px;
    background: none;
    border: navajowhite;
    font-size: 42px;
    font-weight: 500;
    z-index: 10000;top: 75px;"
    ></button> 
       
          <div class="row list-page-top-link panel" >
            @if(Session::has('message'))
            <p >{{Session::get('message')}}</p>
            @endif 
                
                
                 
            <div class="col-md-12"> 
              <!-- test -->
              <ul class="enquiry-test-list">
                  @if( Auth::user()->usertype_status =='1')
                <a href="{{url(Request::segment(1).'/'.'add-student')}}" class="collapse-item"><li><i class="fas fa-plus"></i> Add Student 
                </li></a>
                @endif
                <?php 
                if( Auth::user()->usertype_status =='1'){
               $trash = DB::table('enquiries')->where('delete_client','0')->get();
                ?>  
               <a href={{  url(Request::segment(1).'/'.'get-all-trash-student') }}> <li><i class="far fa-arrow-alt-circle-right"></i> {{$trash->count()}} Trashed   </li></a>
                <?php } ?>
                {{-- <a href={{ url('get-all-student/'.Crypt::encrypt(Auth::user()->employee_id)) }}><li><i class="fas fa-angle-double-right"></i>  Get All  </li></a> --}}
                {{-- <a href={{ url('get-all-students') }}><li><i class="fas fa-angle-double-right"></i>  Get All  </li></a>  --}}
                <?php 
            if( Auth::user()->usertype_status =='1'){
              ?> <a href={{ url('admin/asign-client-list') }}><li><i class="fas fa-user-tie"></i> Asigned Client  </li></a> <?php } ?>
                <!-- <li> {{-- <a href={{ url('new-user') }}>  Add Clients  </a> --}}</li> -->
                @if( Auth::user()->usertype_status =='1')
                <a  data-toggle="modal" data-target="#import_student" href =""  aria-hidden="true" style="color:#fff"><li> </i> <i class="fas fa-upload"></i> Import Student List
                </li></a>
                @endif
                <!-- <li> <a  data-toggle="modal" data-target="#import_unfollow_client" href =""  aria-hidden="true" style="color:#fff"></i> <i class="fas fa-file-import"></i> Import Unfollow Client
                </a></li> -->
                @if( Auth::user()->usertype_status =='1')
                 <li>
                  <i class="fas fa-list-ul"></i> <span  class="priority-list-ul" style="padding:8px;">Priority List
                        <div class="hide-priority-list-ul">
                               <a href={{ url(Request::segment(1).'/'.'priority-list/1/1') }} value="1">   High  </a> 
                               <a href={{ url(Request::segment(1).'/'.'priority-list/2/1') }} value="2">   Medium  </a> 
                               <a href={{ url(Request::segment(1).'/'.'priority-list/3/1') }} value="3">   Low  </a> 
                              </div>
                                     </span>
                </li> 
             @endif
              </ul>
              <!-- test end -->
               </div> 
          </div> 
 <!-- end navigation -->

 <!--<hr>-->
 {{ Form::open(array('url'=>url(Request::segment(1).'/'.'search'), 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

 <input type="hidden" name="type" value = "1">
          <div class="row enquiry-agent-name panel">
          {{-- <div class="col-md-2"> {{  Form::date('date',null, array('class' => 'form-control'))  }} </div>
          <div class="col-md-2"> {{  Form::text('date',null, array('class' => 'form-control'))  }} </div> --}}

            {{-- kaushik ul --}}

          <div class="col-md-4">
            <label for="">From</label>  
            <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_from',isset($filter_date_from)?$filter_date_from:null, array('class' => 'form-control date'))  }}
                                      </div>
                                      {{-- {{ Form::select('auction_id',  (['' => 'Select Auction ID']+$auction),'', ['class' => 'form-control','id'=>'auction_id'])}} --}}
          </div>
          <div class="col-md-4">
            <label for="csad">To</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_to',isset($filter_date_to)?$filter_date_to:null, array('class' => 'form-control date' ))  }} 
                                      </div>
          </div>
          <div class="col-md-4">
            <label for="csad">Select Employee</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                  {{  Form::hidden('id',Auth::user()->employee_id )  }} 

              @if( Auth::user()->usertype_status =='1')
                  <?php
                  
                   $agent_id2 = Helper::getTotalEmployee();
                   
                //   $agent_id  = $agent_id->pluck('name','unique_id');
                // $agent_id = $agent_id->toArray() ;
                    
                    ?>
              {{-- {{ Form::select('agent_id',  (['' => 'Select Agent']+$agent_id),'', ['class' => 'form-control','id'=>'agent_id'])}} --}}
              <select  class="form-control" name="agent_id">
                <option value="">select</option>
                @foreach($agent_id2 as $s )
            <option value="{{$s->unique_id}}" <?php echo (!empty($agent_id) && ($agent_id == $s->unique_id))  ? 'selected' : ''; ?>>{{$s->name}}</option>;
              @endforeach
            </select>
@endif 
                                      </div>
          </div>

          <div class="col-md-4">
            <label for="csad">Status</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-align-justify"></i></span>
                  <?php
                  $enq_status  = DB::table('enq_status')->get();

                 ?>

                 <select  class="form-control" name="status">
                     <option value="">select</option>
                     @foreach($enq_status as $status1 )
                 <option value="{{$status1->status}}" <?php echo (!empty($status) && ($status == $status1->status))  ? 'selected' : ''; ?>>{{$status1->status}}</option>
                   @endforeach
                 </select>
                 
                </div>
          </div>
          <div class="col-md-4">
            <label for="csad">Purpose</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                  <?php  $enq_purposes = DB::table('enq_purposes')->get(); ?>

                  <select class="form-control" name="purpose_of_query">
                      <option value="">Select Purpose</option>
                      @foreach($enq_purposes as $pur1)
                  {{-- <option value="{{ $pur->purpose}}">  {{ $pur->purpose}} </option> --}}
                  <option value="{{$pur1->purpose}}" <?php echo (!empty($purpose_of_query) && ($purpose_of_query == $pur1->purpose)) ? 'selected' : ''; ?>>{{$pur1->purpose}}</option>;
                      @endforeach
                    </select>
                                      </div>
        </div>
          <div class="col-md-4">
            <label for="csad">Name, Email, Mobile....</label>  
              <div class="input-group">
                
                  <span class="input-group-addon"><i class="fas fa-school"></i></span>
                  {{  Form::text('searchbox',isset($search2)?$search2:null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                      </div>
          </div>
          <div class="col-md-12" style=" text-align: center; ">
              {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
             <!--   {{ Form::submit('Reset', array('url'=>'enquiry-list', 'class' => 'enquiry-agent-name btn btn-danger w-10')) }} -->
              
              {{-- {{ Form::reset('Reset', array('class'=>'btn btn-danger w-10', )) }} --}}
              <a class="btn btn-danger w-10" href="{{url(Request::segment(1).'/'.'student-list') }}">Reset</a>
              

          </div>
          {{-- kaushik ul end --}}

          
</div>
{{-- {{Form::close()}} --}}
<!--<hr>-->

  <div class="container-fluid ">
      {{-- <p style="margin-left:30px; color:#458bbb;">Show entries</p> --}}
      
    <div class="row" style="margin-left:18px">
      
        <div class="form-group col-md-2 col-xs-2 col-sm-12 col-lg-2">
            <!--<span>Show</span>-->
            {{-- {{Form::open(array('url' => 'search', 'id' => 'filter_form' , 'method' => "get"))}} --}}
     <input type="hidden" name="type" value = "1">
      {{-- {{Form::hidden('id', Auth::user()->employee_id)}} --}}
     <!--<select name="range_filter" id="range_filter" class="form-control " style="width:100%!important" >-->
       <label for="">Show entries</label>
          <select name="range_filter" id="range_filter" class="form-control " >
        
        @for($i=10; $i<=100; $i+=10)
        <option value="{{$i}}" <?php echo (isset($showentry) && ($showentry == $i)) ? 'selected' : ''; ?>>{{$i}}</option>
      {{-- <option value="{{$i}}">{{$i}}</option> --}}
        @endfor
      </select>
       {{-- <button type="submit" name=""  class="btn btn-danger " id="filter_button" style="margin-left:20px;">
           <i class="fa fa-search" style="font-size:16px;"></i>
      </button> --}}
      <!--<button type="submit" name=""  class="btn btn-danger w-10 fa fa-filter" id="filter_button"></button>-->
      {{Form::close()}}
    </div>

    {{-- send email --}}
    <!--sort by filter second start-->
    
    <div class="col-md-2 col-xs-2 col-sm-12 col-lg-2 mb-3">
      <label for="">Sort By</label>
      <?php
      $arr = array('id'=>'ID','date'=>'Date','name'=>'Name','email/phone number'=>'Email/phone number');
      ?>
       <select id="shortby" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" >
        <option >--Sort By-- </option>                     
        
 {{-- {{ Form::select('shortby',  (['' => 'Select']+$arr),'', ['class' => 'form-control','id'=>'shortby'])}} --}}
        
       @foreach ($arr as $item)
       <option value="{{$item}}" <?php echo (!empty($arr2) && ($arr2 == $item)) ? 'selected' : ''; ?>>{{$item}}</option>; 
       @endforeach
          
                              
                             {{-- <option value="date">Date </option>
                             <option value="name">Name</option>
                             <option value="email/phone number">Email/phone number</option>
                             <option value="country">Country</option>
                             <option value="course">Course</option>
                             <option value="source">Source</option>
                             <option value="intake">Intake</option> --}}
                         </select> 
<!--                            <select name="ingredients[]" id="ingredients" multiple="multiple">-->
<!--    <option value="cheese">Cheese</option>-->
<!--    <option value="tomatoes">Tomatoes</option>-->
<!--    <option value="mozarella">Mozzarella</option>-->
<!--    <option value="mushrooms">Mushrooms</option>-->
<!--    <option value="pepperoni">Pepperoni</option>-->
<!--    <option value="onions">Onions</option>-->
<!--</select>-->
    </div>
    <!--sort by filter second end-->
    <div class="col-md-8 col-xs-8 col-sm-12 col-lg-8 " style=" text-align: end; ">
      <ul>
          
        <script>
       
        </script>
         <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-file-excel-o" aria-hidden="true"></i><span  onclick ="exportTasks(event.target);" id="exportexcell" style="padding-left: 5px; padding-right: 5px;" >Excel</span></li>
       
         <!--  <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span  data-href="{{route('export')}}" id="export" style="padding-left: 5px; padding-right:5px; color:#fff;" onclick="exportTasks(event.target);"></span></li> -->
  <!--  <span data-href="/tasks" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span> --> 

        <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-envelope" data-toggle="modal" data-target="#send-email"></i><span style="padding-left: 5px; padding-right: 5px;" data-toggle="modal" data-target="#send-email">Send Email</span></li>
        <!--<li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px;"><a href="https://api.whatsapp.com/send?phone=919311472787&amp;text=Hello" target="_blank" style="color:#fff;">Send SMS</a></span></li>-->
        <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-comment" aria-hidden="true" data-toggle="modal" data-target="#send-sms"></i><span style="padding-left: 5px; padding-right: 5px;" data-toggle="modal" data-target="#send-sms">Send sms</span></li>
@if(Auth::user()->usertype_status != 4)
        <li onclick ="" class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-user" aria-hidden="true" data-toggle="modal" data-target=""></i><span style="padding-left: 5px; padding-right: 5px;" data-toggle="modal" data-target="#asign_client" class="">Assign</span></li>
         
          <li onclick ="" class="btn-special btn-icon btn-googleplus" id="">
            
            <form action="{{ url(Request::segment(1).'/get-quote') }}" onsubmit="return check_checked();">
            <input type="hidden" id="popo3" name="id">
            <i class="fa fa-user" aria-hidden="true" data-toggle="modal" data-target="" style="background: #cd2129;
            padding: 10px;"></i>
            <span style="padding-left: 5px; padding-right: 5px; " data-toggle="modal" data-target="#send_quote" class=""></span>
          <button type="submit" style="background: no-repeat;
          color: #fff;
          border: 0;
          margin-top: 5px;
          margin-right: 5px;">Send Quote </button>  </form>
          
          </li>
       @endif
      
      
      </ul>

    </div>
    {{-- send email end --}}
   



    </div>
    
<center> <h2 class="text-primary" style="margin-top:-40px;">Student List</h2></center>
<div style="overflow-x:auto; height:700px;width:100%">
  {{Form::open(array('url'=>url(Request::segment(1).'/'.'export'), 'method'=>'get','id'=>'form_export_excell'))}}
<table class="display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
    <thead class="k0listenqury">
    <tr>
      <th><input type="checkbox"id="select-all">
      </th>
     <th>All</th>
      <th> No </th>
      <th>Source</th>
      <th style="cursor:pointer;">Date</th>
        <th>Name</th>
        <th>Contact no </th>
        <th>Country </th>
        <th style="width:300px">  Comment</th>
        @if(Auth::user()->usertype_status != 4)
        <th>Agent</th> 
        @endif
        <th> Status </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
        
        @foreach($get2 as $get)
        <tr>
          <td><input name="id[]"  value="{{$get->unique_id}}" class="id{{$get->unique_id}}" type="checkbox" id="select-all"></td>


          <td class="{{$get->device}} desk-top" style="border:none !important"></td>

            <td data-id={{$get->unique_id}}  class=" set-priority-hover"> 
                        @if($get->set_priority == 1)
                     <p   style="color:#a33535;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get->id}}   <span class="fas fa-fla"></span>   </p> 
  
                     @elseif($get->set_priority == 2)
                     <p   style="color:#2f2fc8;"> <span class="fa fa-check "></span>  {{'IC'.$get->id}}   <span class="fas fa-fla"></span>   </p>
                     @elseif($get->set_priority == 3)
                     <p   style="color:#196919;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get->id}}   <span class="fas fa-fla"></span>   </p>
                      @else
                      <p >
                           {{'IC'.$get->id}}  
                    </p>
                      @endif
            
                      
              <div class="priority-color"> 
  
                <label class="container-radio">
                <input type="radio" name="priority_value_name"  data-id={{$get->unique_id}}  value = "1" class="add-priority" >
                    <span class="checkmark checkmark-color1"></span>
                  </label>
                  
                <label class="container-radio">
                    <input type="radio" name="priority_value_name"  data-id={{$get->unique_id}}  value = "2" class="add-priority" >
                    <span class="checkmark checkmark-color2"></span>
                  </label>

                  
                <label class="container-radio">
                 
                <input type="radio" name="priority_value_name"  data-id={{$get->unique_id}}  value = "3" class="add-priority" >
                    <span class="checkmark checkmark-color3"></span>
                  </label>


                  <label class="container-radio">
                    <input type="radio" name="priority_value_name"  data-id={{$get->unique_id}}  value = "0" class="add-priority" >
                        <span class="checkmark checkmark-color4"></span>
                      </label>

                </div>
            </td>    
        <td>{{$get->source}}</td>            

        <td> {{date('d-m-Y', strtotime($get->date))}}</td>

        
        <td>{{$get->name}}</td>

        <td class="mob-no" >
          <p><a href="tel:{{$get->contact}}">{{$get->contact}}</a> 
          
           @if(!empty($get->contact))
          <a style="color:#575757;" href="https://api.whatsapp.com/send?phone=91{{$get->contact}}&amp;text=Hello" target="_blank">
             <img style="width:25px; height:25px;"  src="{{url('public/images/whatsapp.png')}}"></a>
             
            <span><a href="tel:{{$get->contact}}"><i style="font-size:15px; color:#25D366;"></i></a></span>
          @endif
          </p>
         {{--<p><a href="tel:{{$get->alternate_contact}}">{{$get->alternate_contact}}</a>  </p> --}}

         </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
        <td>
           
         
          
          {{-- {{ $get->country }}</td> --}}
        
        
         <td class="comment-popup fa fa-commen" class="myModal2 add_comment">
          <p class="last-comment-p-tag">
             
<?php                  
$get_last_comment = DB::table('enq_comments')
->select(DB::raw('comment,MAX(id) as a'))
->groupBy('comment','id')
->where('client_enquiry_id',$get->unique_id)
->orderBy('id','DESC')
->get();

?>

@if(!empty($get_last_comment[0]->comment))
{{$get_last_comment[0]->comment}}
@endif
</p>

          <button type="button" id="myBtn" class="add_comment add_comment22"  data-id={{$get->unique_id}} ><span class="fa fa-commenting"></span></button>  </td> 
          
@if(Auth::user()->usertype_status != 4)
        <td>{{$get->agent_name}}</td>
        @endif
        <td class="getdate" style="width:100%;position:relative">  
          {{-- <span class="fas fa-stream display-status" ></span>      --}}
              <select style="display:non" name="status_chang"  class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get->unique_id}} >
                {{-- <ol  style="display: block;
                list-style: none;
                text-align: left;
                position: absolute;
                left: -120px;
                background: rgb(202, 202, 202);
                top: 0px;"> --}}
              <option  selected  value="{{$get->disposition}}" > {{$get->disposition}} </option>
              {{-- <li selected  value="{{$get->disposition}}" > {{$get->disposition}}</li> --}}
              @foreach($enq_status as $status)
              <option value="{{$status->status}}"> {{$status->status}} </option>
{{-- <li value="{{$status->status}}" class="update_status"  data-id={{$get->unique_id}} style="border-top: 1px solid;
  padding: 6px 5px;
  border-bottom: 1px solid;"> {{$status->status}}</li> --}}
             @endforeach
                {{-- </ol> --}}
              </select>
            </td>
        
            <td> 
            <a title="Delete" href="javascript:void(0);" class="fa fa-trash delete" data-id={{$get->unique_id}} ></a>  
            <!--<a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>-->
            <!--</a>-->
            <a title="Edit-Detail" href="{{url(Request::segment(1).'/'.'enquiry/get-detail/'.$get->unique_id)}}"  class="fa fa-edit" ></a>
          </td>
        </tr>
        @endforeach

        <tr><td colspan="14" style="hover:background:red">
          
          {{ $get2->appends(['type'=>isset($type)?$type:1,'filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'agent_id'=>isset($agent_id)?$agent_id:"",'purpose_of_query'=>isset($purpose_of_query)?$purpose_of_query:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($range_filter)?$range_filter:"",'shortby'=>isset($shortby)?$shortby:""])->links() }} 
          
          
          <!--{{ $get2->appends(['type'=>isset($type)?$type:1,'filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'agent_id'=>isset($agent_id)?$agent_id:"",'status'=>isset($status)?$status:"",'purpose_of_query'=>isset($purpose_of_query)?$purpose_of_query:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($range_filter)?$range_filter:"",'shortby'=>isset($shortby)?$shortby:""])->links() }} -->
        </td></tr>
        
    </tbody>
</table>
{{form::close()}}
</div>

<script>
function closepopup()
{
    $("#myModal").hide();
}
</script>
<!-- The Modal -->
<div id="myModal" class="modal" style="padding-top:0;">

  <!-- Modal content -->
  <div class="modal-content">
    
    <p onclick="closepopup();" class="close" style="top: 0px;
    padding: 6px 10px;
    font-size: 29px;
    color: #fff;
    background: #000;
    opacity: 1;
    right: 0px;"id="comment_close">&times;</p>
    
    <h5 class="callbacklater">Status Comment </h5>
    
    
    <hr style="margin:0;">
    <div class="modal-body">
        <p id="old_coment2" class="old-comment"> </p>
        
    @if(!empty($get2))
    {{-- @dd($get) --}}
    <?php $data_id = $get2?>
    {{-- @dd('dsfsd'); --}}
    @foreach($data_id as $id)
    {{Form::open(array('url'=>Request::segment(1).'/'."callbacklater" , 'id' => 'form', 'data-id' => $id->unique_id, 'class' => 'form'))}}
    @endforeach
    <div class="comment-section">
      {{-- <div><p>  {{ $id->unique_id}}  </p> </div> --}}
<div>
<input type="text" class="callbacklate date" name="callbacklater" id="callbackdate">

<input type="time" class="callbacklate" name="callbacklater_time" id="callbacktime">
</div>
<div>
<input type="text" name="comment" id="comment3"  style="width:77%" placeholder="Comment">
{{Form::submit('Save', array('class' => ' w-10 my-3', 'id' =>'save_comment_button'))}}
</div>
    </div>
    </div>

{{Form::close()}} 
@else{
  <p>no record found</p>
}

@endif
<p id="resultdata"></p>
  </div>
</div>
 
 

@foreach($get2 as $id)

<!-- start comment modal-->
<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
      <span class="close2" style="position: absolute;
      top: 0;
      right: 0;background: #000;
    color: #fff;">&times;</span>
      <h5 class="callbacklater">Add Comment </h5>
  
    </div>
<div class="modal-body">

      @if(!empty($get2))
  <p id="old_coment" class="old-comment"> </p>
  {{Form::open(array('url'=>Request::segment(1).'/'."callbacklater" , 'id' => 'form2', 'data-id' => $id->unique_id, 'class' => 'form form-inline'))}}
  <div class="comment-sectio form-group">
  <input type="text" name="comment" id="comment2" class="form-control" placeholder="Your comments">
  <input type="hidden"  value="{{$id->unique_id}}" name="a">
  
      </div>
      <div class="form-group">
  {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3', 'id' =>'save_comment_button'))}}
      </div>
  {{Form::close()}}
  
  @else
    <p style="margin: 21px auto;
    font-size: 25px;">No Comment</p>
  @endif
    </div>
  </div>
  </div>
  @endforeach
<script>
  var modal2 = document.getElementById("myModal2");
  var span2 = document.getElementsByClassName("close2")[0];
  span2.onclick = function() {
    modal2.style.display = "none";
    $('#myModal2').removeData();
    
    // location.reload();
    // document.querySelector('#myModal2#comment2').value="fdsfsd";
    modal2.querySelector('#comment2').value="";
    // var p =modal2.querySelector('#form2').setAttribute('data-id',);
// console.log(p);
  }
  window.onclick = function(event) { 
    if (event.target == modal2) {
      modal2.style.display = "none";
    }
  }

</script>


{{-- old comment --}}
<script>
  $(document).ready(function(){
    
    $(".add_comment").on("click", function(){
      
    // if(confirm('Are you sure to add comment ?')){
      var unique_id = $(this).attr("data-id");
    
                  var url = "{{url(Request::segment(1).'/'.'callbacklater_old_comment')}}?a="+unique_id;
               $.ajaxSetup({
                                  headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                               });
  $.ajax({
        type: "GET",
          url: url,
          dataType: "text",
          success: function (data) {
  document.getElementById('old_coment').innerHTML ="";
            var json_response = JSON.parse(data);
            var len = json_response.length;
            document.getElementById('old_coment').innerHTML+='';  
            for(var i=0; i<len; i++){
              if(json_response[i].comment != null){
  
                if(json_response[i].image == null){
                  var user_image = "<?php echo url('public/uploads/image/default_user.jpg') ?>" ;
                }
              document.getElementById('old_coment').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="'+user_image+'" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
              // document.getElementById('old_coment').innerHTML+='<p class="old-cmment-date-class">'+json_response[i].date+'</p>';
                          }  } 
            
              document.querySelectorAll('.old-comment').forEach((a=>{
                 a.scrollTop = 10000;
               }))
            
  }
      });
    // }
    }
      );
    });
    // document.querySelectorAll('.add_comment').addEventListener("click",forEach((a)=>{document.getElementById('old_coment').scrollTop = 10000}))
    
    </script>

<script>
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
    // location.reload();
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
  
<script>
    

$(document).ready(function(){
  
  $(".update_status").on("click", function(){
    var unique_id = $(this).attr("data-id");
  
                var url = "{{url(Request::segment(1).'/'.'callbacklater_old_comment')}}?a="+unique_id;
             $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
$.ajax({
      type: "GET",
        url: url,
        dataType: "text",
        success: function (data) {
          
document.getElementById('old_coment2').innerHTML ="";
          var json_response = JSON.parse(data);
          var len = json_response.length;
          document.getElementById('old_coment2').innerHTML+='';  
          for(var i=0; i<len; i++){
            if(json_response[i].comment != null){
              
              if(json_response[i].image == null){
                var user_image = "<?php echo url('public/uploads/image/default_user.jpg') ?>" ;
              }
            document.getElementById('old_coment2').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="'+user_image+'" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
            // document.getElementById('old_coment').innerHTML+='<p class="old-cmment-date-class">'+json_response[i].date+'</p>';
            }
          }
          document.getElementById('old_coment2').innerHTML+='</ul>'  ;
          document.querySelectorAll('.old-comment').forEach((a=>{
               a.scrollTop = 10000;
             }))
             
                  }
    });
  }
    );
  });


  
       
  $(document).ready(function(){
    var index = $('.update_status').prop('selectedIndex'); 
    $(".update_status").on("change", function(){
         unique_id = $(this).attr("data-id");
         val = $(this).val();
if((val == "Call Back Later") || (val ==  "Follow Up")){
  // var x = document.createElement("INPUT");
  // x.setAttribute("type", "text");
  // x.setAttribute("value", "Hello World!");
  // var a = document.getElementsByClassName('aa').length;
  // for(var i=0; i<a; i++){
  // document.getElementsByClassName('aa')[i].appendChild(x);
  
  
  $.ajaxSetup({
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure you want to update this with date time')) {
    modal.style.display = "block";
  $('#callbackdate').show();
  $('#callbacktime').show();
    $.ajax({
    type: "POST",
    url: "{{url(Request::segment(1).'/'.'update_status')}}?id="+val+"&a="+unique_id,
    success: function(data){
    // $.each(data, function(key, value) {
                            $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
                        // });
        } });}
    else{

      modal.style.display = "none";
      $('#callbackdate').hide();
  $('#callbacktime').hide();
  $('.update_status').prop('selectedIndex',index);
    }
  }
else{
  $('#callbackdate').hide();
  $('#callbacktime').hide();
  $.ajaxSetup({
                         headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }                             });
if (confirm('Are you sure you want to update this?')) {
  modal.style.display = "block";
    $.ajax({
    type: "POST",
    url: "{{url(Request::segment(1).'/'.'update_status')}}?id="+val+"&a="+unique_id,
    success: function(data){
    if(data == "Please Add Client Email First"){
      alert('Please Add Client Email First');
    }
                        // $.each(data, function(key, value) {
                            $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
                        // });
                       }
    });
    }
    else{
      $('.update_status').prop('selectedIndex',index);
    }
}
}
    );
  });

</script>

<script>
  


$(document).ready(function(){
  $(".add_comment22").on("click", function(){
    // if(confirm('Are you sure to add comment ?')){
     ppppp = $(this).attr("data-id");
    modal2.style.display = "block";
  })
})
</script>

<script>
  $(document).ready(function(){
                          $("#form2").submit(function (e) {
                            var comment = $('#comment2').val();
                            var callbackdate = $('#callbackdate').val();
                            var callbacktime = $('#callbacktime').val();
                            // alert(callbacktime);
                 e.preventDefault();
              var form = $(this); 
              
                let url = "{{url(Request::segment(1).'/'.'callbacklater')}}?a="+ppppp+"&comment="+comment+"&callbacktime="+callbacktime+"&callbackdate="+callbackdate;
                $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                          var   currentRequest  =   jQuery.ajax({
      type: "post",
        url: url,
        success: function (data) {
          document.getElementById('old_coment').innerHTML+='</ul>'
var form = document.getElementById('form2');
var elemet = document.createElement("P");
elemet.innerHTML = "Comment Added!";
elemet.style.cssText="text-align:center;color:green;width: 100%;font-size: 23px;";
form.appendChild(elemet);


          location.reload();
                    // modal2.style.display = "none";
                   } 
          });
   
   }
    );
    // }
  });
  // $('.close2').on('click',function(){
  //    $(ghjg).abort();
  //  });
  // xhr.abort();
// }); 
</script> 
  
<script>
         
  $(document).ready(function(){
                           $("#form").submit(function (e) {
                             var comment = $('#comment3').val();
                            
            //       e.preventDefault();
            //   var form = $(this); 
            //      var url = "{{url('callbacklater')}}?a="+unique_id+"&comment="+comment+"&val="+val;
                 
                 
                 
                  var callbackdate = $('#callbackdate').val();
                            var callbacktime = $('#callbacktime').val();
                            
                 e.preventDefault();
              var form = $(this); 
              
                let url = "{{url(Request::segment(1).'/'.'callbacklater')}}?a="+unique_id+"&comment="+comment+"&callbacklater_time="+callbacktime+"&callbacklater="+callbackdate;
                 
                 
                 
                 
               //  form.find(":submit").val("Please wait...");
               //  form.find(":submit").attr('disabled', true);
              
   // $.ajaxSetup({
   //                               headers: {
   //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //                           }
   //                            });
     $.ajax({
       type: "POST",
         url: url,
         // dataType: "text",
         // data: new FormData( this ),
         // processData: false, 
         // contentType: false, 
         success: function (data) {
             
             // var d = data.trim();
             
                 // $("#resultdata").html('<b style="color: green">Updated Successfully</b>');
                 
                 
                 var form = document.getElementById('form');
 var elemet = document.createElement("P");
 elemet.innerHTML = "Comment Added!";
 elemet.style.cssText="text-align:center;color:green;width: 100%;font-size: 23px;";
 form.appendChild(elemet);
                 
                 
             //     modal.style.display = "none";
                 
             //     alert('Update Successfully');
             window.location.href= "";
            
                 }
     });
 
     }
     );
   });
 
 </script>
  <script>
  
   
 function exportTasks(_this) {
    let myarr = [];
    $("input[type='checkbox']:checked").each(function(){
         myarr.push($(this).val());
    });
    if(myarr.length == 0){
        alert("Please Select to Download");
        return false;
    }else{
      $(document).ready(function(){
  //  $(document).on("click","#exportexcell",function(){
    //  var form = $(this).closest("#form_export_excell");
     //console.log(form);
     $("#form_export_excell").submit();
  //  });
});
        var unique_ids = myarr.toString();
        let _url = $(_this).data('href');
        window.location.href = _url;
       
    }
     
   }
   
   
//     function exportTasks(_this) {
//     let myarr = [];
//     $("input[type='checkbox']:checked").each(function(){
//          myarr.push($(this).val());
//     });
    
//     if(myarr.length == 0){
//         alert("Please Select to Download");
//     }else{
//      let _url = $(_this).data('href');
//       window.location.href = _url;
       
//     }
     
//   }
   
  //  yourArray.push($(this).val());
   
   
   
</script>

  <script>
                    document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                      }
                    }
                    </script>

   <script>
//   function exportTasks(_this) {
//     //   alert("test");
//       let _url = $(_this).data('href');
//       window.location.href = _url;
//   }
</script>

  @if ($message = session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
<div class="modal" id="send-email">
    <div class="  ">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Email</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{route('send-mail')}}">
            {{csrf_field()}}
         <div class="row">
           <div class="col-md-12">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" name ="to" placeholder="To">
               
                                      </div>
                                    </div>
               <div class="col-md-12">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-envelope-square"  aria-hidden="true"></i></span>
                  <input class="form-control" type="text"  name="subject" placeholder="Subject">
                  
                                      </div>
           </div>
           <div class="col-md-12" style="margin-top:10px;">
              <div class="input-group">
                  <textarea class="form-control" rows="10" id="comment" name="message" placeholder="Message">
                   
                  </textarea>
              </div>
           </div>
           <div class="col-md-12 text-center" style="margin-top:10px;">
             <input type="submit" value="Send" class="btn btn-danger w-10">
           </div>
           </div>
         </div>
        </form>
        </div>
      </div>
 <script>
function scrollWin() {
  window.scrollTo(10, 10);
}
</script>
<script>
        $(document).ready(function(){
    $(".delete").on("click", function(){
        var unique_id = $(this).attr("data-id");
        // var val = $(this).val();


  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure you want to Delete this?')) {
    $.ajax({
    type: "get",
    url: "{{url(Request::segment(1).'/'.'delete')}}?a="+unique_id,
    
    success: function(data){
    alert('Record Delete Successfully '); 
    location.reload();
                }
    });
}
    }
    );
  });
   </script> 


@endsection
<!--sms-->
<div class="modal" id="student-sms">
  <div class="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send SMS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
           <div class="col-md-12">
                <p>Title</p>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                 <select id="Short by" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" .required="">--&gt;
                                <option type="checkbox" value="Short">-- Select Template --</option>
                               <option value="date">Date </option>
                               <option value="name">Name</option>
                               <option value="email/phone number">Email/phone number</option>
                               <option value="country">Country</option>
                               <option value="course">Course</option>
                               <option value="source">Source</option>
                               <option value="intake">Intake</option>
                           </select>
               
                                      </div>
                                    </div>
          
           <div class="col-md-12" style="margin-top:10px;">
              <div class="input-group">
                  <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Message">                   
                  </textarea>
              </div>
           </div>
           <div class="col-md-12 text-center" style="margin-top:10px;">
             <input type="submit" value="Send" class="btn btn-danger w-10">
           </div>
           </div>
      </div>

      <!-- Modal footer -->
   

    </div>
  </div>
</div>


<!--Assign student-->
<div class="modal" id="asign_studend">
  <div class="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      

    
    </div>
  </div>
</div>





<!-- start asign client modal-->
<div id="asign_client" class="modal" style="padding-top:5%">

<!-- Modal content -->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
<!--  <span class="asign-client-close" style="position: absolute;-->
<!--  right: 0;-->
<!--  top: 0;background: #000;-->
<!--color: #fff;">&times;</span>-->
  
  <h5 class="callbacklater">Asign Client </h5>
  <hr>
    </div>
    <div class="modal-body">
  <?php 
                  if( Auth::user()->usertype_status =='1'){
                    ?>
  {{Form::open(array('url'=>Request::segment(1).'/'."asign-client" , 'id' => 'asign_client_form', 'class' => 'form'))}}
     <div class="comment-section">
<?php
$agent  = DB::table('users')->where('status',1)->get();
?>
<label style="text-align: left"> <strong> Select Agent Name:  </strong> </label>
<select name="asign_client" id="asign_client_value" class="form-control">
<option disabled selected> --Agent-- </option>
@foreach($agent as $a)
<option value="{{$a->unique_id}}">{{$a->name}}</option>
@endforeach
</select>
<label style="text-align: left;margin-top:10px"> <strong> Comment: </strong> </label>
<input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
  </div>
  <div style="text-align: center">
    <input type="hidden" name="id" id="popo2">
    {{-- <input type="button" id="save_comment_btn"> --}}
{{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}}
</div>
{{Form::close()}}
<hr>

<?php } elseif(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
 ?>
  {{Form::open(array('url'=>Request::segment(1).'/'."asign-client" , 'id' => 'asign_client_form', 'class' => 'form'))}}
     <div class="comment-section">
<?php
$agent  = DB::table('users')->where('status',1)->where('company_id',Auth::user()->unique_id)->get();
?>
<label style="text-align: left"> <strong> Select Agent Name:  </strong> </label>
<select name="asign_client" id="asign_client_value" class="form-control">
<option disabled selected> --Agent-- </option>
@foreach($agent as $a)
<option value="{{$a->unique_id}}">{{$a->name}}</option>
@endforeach
</select>
<label style="text-align: left;margin-top:10px"> <strong> Comment: </strong> </label>
<input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
  </div>
  <div style="text-align: center">
    <input type="hidden" name="id" id="popo2">
    {{-- <input type="button" id="save_comment_btn"> --}}
{{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}}
</div>
{{Form::close()}}
<hr>

<?php 
} ?>

</div>
</div>
</div>
<!-- end of asign agent Modal -->




<!-- send sms model  -->

<div class="modal fade" id="send-sms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Mobile Number</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobil Number">
            </div>
            <button type="submit" class="btn btn-danger w-10">Submit</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Send</button>-->
      </div>
    </div>
  </div>
</div>










{{-- modal for import student --}}
<div class="modal" id="import_student">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Import Students List</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                               
                    
                    
                                 
                              @if(Session::has('message'))
                              <p >{{ Session::get('message') }}</p>
                              @endif
                              
                    
                              <form method='post' action={{url(Request::segment(1).'/'.'import-client')}} enctype='multipart/form-data' >
                                {{ csrf_field() }}
                                <div class="custom-file">
                                  <input type="file" class="custom-file-inpu" id="customFil" name="import_client">
                                  <input type="hidden" name="conversion"  value="1">
                                  
                    </div>
                              
                                    <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" data-ng-submit="modal" value="Submit" name="submit">
                    
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>      
                          </div>
                        </div>
                      </div>
{{-- end modal for import client --}}

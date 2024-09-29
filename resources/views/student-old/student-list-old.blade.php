<?php 
use App\Helpers\helper;
?>
@extends('header')
@section('student')
<style>
/* #myBtn{*/
/*    top:30px;*/
/*  }*/
/*  .last-comment-p-tag{*/
/*    overflow: hidden;*/
/*  }*/
/*#myModal .close{*/
/*  padding: 0;*/
/*    margin: 0;*/
/*    color: #000;*/
/*    background: none;*/
/*}*/

/*#save_comment_button{*/
/*  display: inline;*/
/*}*/

/*#comment{*/
/*  padding: 4px;*/
/*    border-radius: 3px;*/
/*    border: 1px solid #b1abab;*/
/*}*/

/*#myModal .modal{*/
/*padding-top:0; */
/*}*/



/*#myModal .modal-content{*/
/*   top: 5%;*/
    /* transform: translate(0,-50%);
    width:500px !important;  */
/*}*/
label {
    margin-bottom: 0.5rem!important;
        padding-left:0px;
}
.last-comment-p-tag{
       margin-left: 10px;!important;
       margin-right:65px;
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


/*.callbacklate{*/
/*  width: 40%;*/
/*  padding: 6px;*/
/*}*/
    /*prabhat css start*/
/*prabhat css start*/
/*.last-comment-p-tag{*/
/*       margin-right:50px;*/
/*}*/
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
    margin-left: 0px!important;
/*.enquiry-test-list li a{*/
/* padding: 11px 7px 0px 0px;   */
/*}*/
/*prabhat css end*/
</style>
 <!-- start navigation -->
 <div class="container-fluid" style="padding:0">
        <div class="container-fluid "  style="padding:0">
       
          <div class="row list-page-top-link" >
            @if(Session::has('message'))
            <p >{{Session::get('message')}}</p>
            @endif 
            
            <div class="col-md-12"> 
              <!-- test -->
              <ul class="enquiry-test-list">
                <a href="{{route('add-student')}}" class="collapse-item"><li><i class="fas fa-plus"></i> Add Student 
                </li></a>
                <?php 
                if( Auth::user()->usertype_status =='1'){
               $trash = DB::table('enquiries')->where('delete_client','0')->get();
                ?>  
               <a href={{ url('get-all-trash-student') }}> <li><i class="far fa-arrow-alt-circle-right"></i> {{$trash->count()}} Trashed   </li></a>
                <?php } ?>
                <a href={{ url('get-all-student/'.Crypt::encrypt(Auth::user()->employee_id)) }}><li><i class="fas fa-angle-double-right"></i>  Get All  </li></a>
                <?php 
            if( Auth::user()->usertype_status =='1'){
              ?> <a href={{ url('asign-client-list') }}><li><i class="fas fa-user-tie"></i> Asigned Client  </li></a> <?php } ?>
                <!-- <li> {{-- <a href={{ url('new-user') }}>  Add Clients  </a> --}}</li> -->
                <a  data-toggle="modal" data-target="#import_client" href =""  aria-hidden="true" style="color:#fff"><li> </i> <i class="fas fa-upload"></i> Import Client
                </li></a>
                <!-- <li> <a  data-toggle="modal" data-target="#import_unfollow_client" href =""  aria-hidden="true" style="color:#fff"></i> <i class="fas fa-file-import"></i> Import Unfollow Client
                </a></li> -->
                 <li>
                  <i class="fas fa-list-ul"></i> <span  class="priority-list-ul" style="padding:8px;">Priority List
                        <div class="hide-priority-list-ul">
                               <a href={{ url('priority-list/1') }} value="1">   High  </a> 
                               <a href={{ url('priority-list/2') }} value="2">   Medium  </a> 
                               <a href={{ url('priority-list/3') }} value="3">   Low  </a> 
                              </div>
                                     </span>
                </li> 
             
              </ul>
              <!-- test end -->
               </div> 
          </div> 
 <!-- end navigation -->

 <div class="container-fluid" style="padding:0">
    <!-- <div class="container-fluid "  style="padding:0"> -->
   
      <div class="row list-page-top-link" >
        @if(Session::has('message'))
        <p >{{Session::get('message')}}</p>
        @endif 
                <div class="col-md-12"> 
    <!--<a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_client">Add Student  </a>-->

        <?php 
         if( Auth::user()->usertype_status =='1'){
        $trash = DB::table('enquiries')->where('delete_client','0')->get();
         ?>
        
        <!--<a href={{ url('get-all-trash-clients') }}> {{$trash->count()}} Trashed   </a>-->
         <?php } ?>


        
        <?php 
        if( Auth::user()->usertype_status =='1'){
          ?>
        <!--<a href={{ url('asign-client-list') }}>  Asigned Student  </a>-->

 <?php } ?>
       
   <!--<hr>-->
 
          
<!-- <span  class="priority-list-ul "> Priority List-->
<!--<div class="hide-priority-list-ul">-->
<!--   <a href={{ url('priority-list/1') }} value="1">   High  </a> -->
<!--   <a href={{ url('priority-list/2') }} value="2">   Medium  </a> -->
<!--   <a href={{ url('priority-list/3') }} value="3">   Low  </a> -->
<!--  </div>-->
<!--         </span>-->

 
         
      </div> 
        
      </div> 

       <!--   <ul>
   <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px;"><a href="" target="_blank" style="color:#fff;">Excel</a></span></li>
  </ul>   -->    
<hr>
        <div class="row">

  <!-- student Filter start -->
   {{ Form::open(array('url'=>'search-student', 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

   <input type="hidden" name="type" value = "1">
            <div class="row enquiry-agent-name">
            {{-- <div class="col-md-2"> {{  Form::date('date',null, array('class' => 'form-control'))  }} </div>
            <div class="col-md-2"> {{  Form::text('date',null, array('class' => 'form-control'))  }} </div> --}}

              {{-- kaushik ul --}}

            <div class="col-md-4">
                <label for="">From</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    {{  Form::text('filter_date_from',null, array('class' => 'form-control date'))  }}
                                        </div>
            </div>
            <div class="col-md-4">
                 <label for="">To</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    {{  Form::text('filter_date_to',null, array('class' => 'form-control date' ))  }} 
                                        </div>
            </div>
            <div class="col-md-4">
                 <label for="">Select Employee</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                    {{  Form::hidden('id',Auth::user()->employee_id )  }} 

                @if( Auth::user()->usertype_status =='1')
<select name="agent_id" class="form-control">
  {{    $agent_id =  DB::table('users')->get() }}
<option selected disabled> Agent Name </option>
  @foreach($agent_id as $aa)
<option value="{{$aa->employee_id}}"> {{$aa->name}} </option>
@endforeach
</select>
@endif 
                                        </div>
            </div>

            <div class="col-md-4">
                 <label for="">Status</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-align-justify"></i></span>
                    <?php
                    $enq_status  = DB::table('enq_status')->get();
                   ?>
                   <select  class="form-control" name="status">
                       <option selected disabled> Status </option>
                       @foreach($enq_status as $status )
                   <option value="{{$status->status}}">{{$status->status}}</option>
                     @endforeach
                   </select>
                                        </div>
            </div>
            <div class="col-md-4">
                 <label for="">Purpose</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                    <?php  $enq_purposes = DB::table('enq_purposes')->get(); ?>
                    <select class="form-control" name="purpose_of_query">
                        <option selected disabled> Purpose </option>
                        @foreach($enq_purposes as $pur)
                    <option value="{{ $pur->purpose}}">  {{ $pur->purpose}} </option>
                        @endforeach
                      </select>
                                        </div>
            </div>
            <div class="col-md-4">
                 <label for="">Name, Email, Mobile....</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-school"></i></span>
                    {{  Form::text('search',null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                        </div>
            </div>
            <div class="col-md-12" style=" text-align: center; ">
                {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
                {{ Form::reset('Reset', array('class'=>'btn btn-danger w-10', )) }}
  
            </div>
              {{-- kaushik ul end --}}

            
</div>
{{Form::close()}}
  <!-- student filter end -->
       
       <!--  <div class="col-md-10  ">
            {{ Form::open(array('url'=>'search-student', 'class' => 'enquiry-list-filter', "method" =>"get" )) }}
       
            {{  Form::text('filter_date_from',null, array('class' => 'form-control date'))  }}
       
            {{  Form::text('filter_date_to',null, array('class' => 'form-control date' ))  }} 
            {{  Form::hidden('id',Auth::user()->employee_id )  }} 

            @if( Auth::user()->usertype_status =='1')
            <?php  
            $agent_id  = helper::getAllEmployee() ;
            
            ?>
<select name="agent_id" class="form-control">



<option selected disabled> Agent Name </option>
@foreach($agent_id as $aa)
<option value="{{$aa->unique_id}}"> {{$aa->name}} </option>
@endforeach
</select>

@endif
<?php
$enq_status  = DB::table('enq_status')->get();
?>
<select  class="form-control" name="status">
<option selected disabled> Status </option>
@foreach($enq_status as $status )
<option value="{{$status->status}}">{{$status->status}}</option>
@endforeach
</select>


  {{  Form::text('search',null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }} </div>
      <div class="col-md-2 submit-button">  {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
          
{{Form::close()}}
{{Form::open(array('url' => 'student/student-list' , 'class' => 'enquiry-list-filter', "method" =>"get"))}}
{{ Form::submit('Reset', array('class'=>'btn btn-danger w-10', )) }}
{{Form::close()}}
</div>  -->
</div>
<hr>

    <div class="container-fluid my-3">
        {{-- <p style="margin-left:30px; color:#458bbb;">Show entries</p> --}}
        
      <div class="row" style="margin-left:18px">
        
          <div class="form-group col-md-2 col-xs-2 col-sm-12 col-lg-2">
              <!--<span>Show</span>-->
              {{-- {{Form::open(array('url' => 'search', 'id' => 'filter_form' , 'method' => "get"))}} --}}
       <input type="hidden" name="type" value = "0">
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
      
   <div class="form-group col-md-2 col-xs-2 col-sm-12 col-lg-2 mb-3">
        <label for="">Sort By</label>
                 <select id="shortby" name="shortby" type="text" value="" class="form-control">
          <option>--Sort By-- </option>                     
                  <option value="ID">ID</option>; 
                  <option value="Date">Date</option>; 
                  <option value="Name">Name</option>; 
                  <option value="Email/phone number">Email/phone number</option>; 
                           </select> 
      </div>
 {{-- send email --}}
      <div class="col-md-8 col-xs-8 col-sm-12 col-lg-8 " style=" text-align: end; ">
        <ul>
           <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-file-excel-o" aria-hidden="true"></i><span data-href ="{{route('export-student')}}" onclick ="exportTasks(event.target);" id="export" style="padding-left: 5px; padding-right: 5px;" >Excel</span></li>
         
           <!--  <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span  data-href="{{route('export')}}" id="export" style="padding-left: 5px; padding-right:5px; color:#fff;" onclick="exportTasks(event.target);"></span></li> -->
    <!--  <span data-href="/tasks" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span> --> 

          <li class="btn-special btn-icon btn-googleplus" data-toggle="modal" data-target="#send-email" id="sendEmail"><i class="fa fa-envelope" data-toggle="modal" data-target="#send-email"></i><span style="padding-left: 5px; padding-right: 5px;" >Send Email</span></li>

          <li class="btn-special btn-icon btn-googleplus" data-toggle="modal" data-target="#student-sms" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px;"><a href="#" style="color:#fff;">Send SMS</a></span></li>
           <li onclick ="" class="btn-special btn-icon btn-googleplus" data-toggle="modal" data-target="#asign_studend" id="send-sms"><i class="fa fa-comment" aria-hidden="true" data-toggle="modal" data-target=""></i><span style="padding-left: 5px; padding-right: 5px;" class="">Assign</span></li>
        </ul>

      </div>
      {{-- send email end --}}
    </div>
     
<br>

<center> <h2 class="text-primary" style="margin-top:-40px;">Student List</h2></center>
<div style="overflow-x:auto; height:350px;width:100%">
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
        <th style="width:300px">  Comment</th>
        <th>Agent</th> 
        <th> Status </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
        
        @foreach($getStudent as $get)
        <tr>
          <td><input name="id[]"  value="{{$get->unique_id}}" class="id{{$get->unique_id}}" type="checkbox" id="select-all"></td>


          <td class="{{$get->device}} desk-top" style="border:none !important"></td>
            <td>{{'IC'.$get->id}}</td>    
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
         <p><a href="tel:{{$get->alternate_contact}}">{{$get->alternate_contact}}</a>  </p>

         </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
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

          <button id="myBtn" class="add_comment add_comment22"  data-id={{$get->unique_id}} >More...</button>  </td> 


        <td>{{$get->agent_name}}</td>
        <td class="getdate" style="width:100%;">       
              <select name="status_chang" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get->unique_id}} >
              <option  selected  value="{{$get->disposition}}" > {{$get->disposition}} </option>
              @foreach($enq_status as $status)
              <option value="{{$status->status}}"> {{$status->status}} </option>
             @endforeach
              </select>
            </td>
        
            <td> 
            <a href="javascript:void(0);" class="fa fa-trash delete" data-id={{$get->unique_id}} ></a>  
            <!--<a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>-->
            <!--</a>-->
            <a href="{{url('enquiry/get-detail/'.$get->unique_id)}}"  class="fa fa-edit" ></a>
          </td>
        </tr>
        @endforeach

    </tbody>
</table>
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
        
    @if(!empty($getStudent))
    {{-- @dd($get) --}}
    <?php $data_id = $getStudent?>
    {{-- @dd('dsfsd'); --}}
    @foreach($data_id as $id)
    {{Form::open(array('url'=>"callbacklater" , 'id' => 'form', 'data-id' => $id->unique_id, 'class' => 'form'))}}
    @endforeach
    <div class="comment-section">
      {{-- <div><p>  {{ $id->unique_id}}  </p> </div> --}}
<div>
<input type="text" class="callbacklate date" name="callbacklater" id="callbackdate">

<input type="time" class="callbacklate" name="callbacklater_time" id="callbacktime">
</div>
<div>
<input type="text" name="comment" id="comment"  style="width:77%" placeholder="Comment">
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
 
 

@foreach($getStudent as $id)

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

      @if(!empty($getStudent))
  <p id="old_coment" class="old-comment"> </p>
  {{Form::open(array('url'=>"callbacklater" , 'id' => 'form2', 'data-id' => $id->unique_id, 'class' => 'form form-inline'))}}
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
    
                  var url = "{{url('callbacklater_old_comment')}}?a="+unique_id;
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
  
  $(".update_status").on("change", function(){
    var unique_id = $(this).attr("data-id");
  
                var url = "{{url('callbacklater_old_comment')}}?a="+unique_id;
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
    url: "{{url('update_status')}}?id="+val+"&a="+unique_id,
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
    url: "{{url('update_status')}}?id="+val+"&a="+unique_id,
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
                 e.preventDefault();
              var form = $(this); 
              
                let url = "{{url('callbacklater')}}?a="+ppppp+"&comment="+comment;
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
                             var comment = $('#comment').val();
                  e.preventDefault();
               var form = $(this); 
                 var url = "{{url('callbacklater')}}?a="+unique_id+"&comment="+comment+"&val="+val;
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
   
   yourArray.push($(this).val());
   
   
   
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
    url: "{{url('delete')}}?a="+unique_id,
    
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
      <div class="modal-body">
      <form>
         <div class="comment-section">
    <label style="text-align: left"> <strong> Select Agent Name:  </strong> </label>
  <select name="asign_client" id="asign_client_value" class="form-control">
    <option disabled="" selected=""> --Agent-- </option>
      <option value="80455829">Anju Bahn</option>
      <option value="97781965">Dushyant Singh</option>
      <option value="28812852">Admin</option>
      <option value="95830027">Tanisha</option>
      <option value="39544737">Madhumita Pal</option>
      <option value="66974266">Pratima</option>
      <option value="76709303">Hawra Bashir</option>
      <option value="40872446">Agent</option>
      <option value="41307809">Agent 2</option>
      <option value="38650440">Tafeena</option>
      <option value="12566640">Mudit</option>
      <option value="82691178">Kushal</option>
      </select>
  <label style="text-align: left;margin-top:10px"> <strong> Comment: </strong> </label>
    <input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
      </div>
      <div style="text-align: center">
        <input type="text" name="id" id="popo2">
  <input class=" w-10 my-3" id="save_comment_btn" type="submit" value="Asign">
</div>
  </form>
      </div>

    
    </div>
  </div>
</div>

 
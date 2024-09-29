<?php 
use App\Helpers\helper;
?>

@extends('header')
@section('student')
<style>
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
                <li>
                    {{-- <button type="button" class="" >
                          --}}
                      
                        <a href="{{route('add-institute')}}" class="collapse-item"><i class="fas fa-plus"></i> Add Institute  </a>
                      {{-- </button> --}}
                </li>
                <?php 
                if( Auth::user()->usertype_status =='1'){
               $trash = DB::table('enquiries')->where('delete_client','0')->get();
                ?>  
                <li><a href={{ url('get-all-trash-institute') }}><i class="far fa-arrow-alt-circle-right"></i> {{$trash->count()}} Trashed   </a></li>
                <?php } ?>
                <li><a href={{ url('get-all-institute/'.Crypt::encrypt(Auth::user()->employee_id)) }}><i class="fas fa-angle-double-right"></i>  Get All  </a></li>
                <?php 
            if( Auth::user()->usertype_status =='1'){
              ?> <li><a href={{ url('asign-client-list') }}><i class="fas fa-user-tie"></i> Asigned Client  </a></li> <?php } ?>
                <!-- <li> {{-- <a href={{ url('new-user') }}>  Add Clients  </a> --}}</li> -->
                <li> <a  data-toggle="modal" data-target="#import_client" href =""  aria-hidden="true" style="color:#fff"></i> <i class="fas fa-upload"></i> Import Client
                </a></li>
                
                 <li>
                  <i class="fas fa-list-ul"></i> <span  class="priority-list-ul" style="padding:8px;">Priority List
                        <div class="hide-priority-list-ul">
                               <a href={{ url('priority-list/1') }} value="1">   High  </a> 
                               <a href={{ url('priority-list/2') }} value="2">   Medium  </a> 
                               <a href={{ url('priority-list/3') }} value="3">   Low  </a> 
                              </div>
                                     </span>
                </li> 
                
              <!-- test end -->
                
          </div>
          </div> 
 <!-- end navigation -->

 <div class="container-fluid" style="padding:0">
    <div class="container-fluid "  style="padding:0">
   
      <div class="row list-page-top-link" >
        @if(Session::has('message'))
        <p >{{Session::get('message')}}</p>
        @endif 
                <div class="col-md-12"> 
    <a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_client">Add Student  </a>

        <?php 
         if( Auth::user()->usertype_status =='1'){
        $trash = DB::table('enquiries')->where('delete_client','0')->get();
         ?>
        
        <a href={{ url('get-all-trash-clients') }}> {{$trash->count()}} Trashed   </a>
         <?php } ?>


        
        <?php 
        if( Auth::user()->usertype_status =='1'){
          ?>
        <a href={{ url('asign-client-list') }}>  Asigned Student  </a>

 <?php } ?>
       
   
   
 
       <!--    
         <span  class="priority-list-ul "> Priority List
<div class="hide-priority-list-ul">
   <a href={{ url('priority-list/1') }} value="1">   High  </a> 
   <a href={{ url('priority-list/2') }} value="2">   Medium  </a> 
   <a href={{ url('priority-list/3') }} value="3">   Low  </a> 
  </div>
         </span> -->
         
      </div>    
        
      </div> 
<hr>
  {{ Form::open(array('url'=>'search-institute', 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

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
 <!--start search filter -->
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
<!-- end search filter -->
   <!--      <div class="row">
       
        <div class="col-md-10  ">
            {{ Form::open(array('url'=>'search-immigration', 'class' => 'enquiry-list-filter', "method" =>"get" )) }}
       
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


          {{  Form::text('search',null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
      <div class="col-md-2 submit-button">  {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
          
{{Form::close()}}
</div>

{{Form::open(array('url' => 'institute/institute-list' , 'class' => 'enquiry-list-filter', "method" =>"get"))}}
{{ Form::submit('Reset', array('class'=>'btn btn-danger w-10', )) }}
{{Form::close()}}
</div> 
</div> -->
<hr>
<center><h2 class="text-primary">Institute List</h2></center>

<!--<div class="container">-->
<!--  <div class="row">-->
<!--    <div class ="col-md-12">-->
<!--<table class="table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">-->
<!--    <thead class="k0listenqury">-->
<!--    <tr>-->
<!--       <th><input type="checkbox" id="select-all">-->
<!--       <label for="car">Select All</label></th>-->
<!--      <th></th>-->
<!--      <th > No </a> </th>-->
<!--      <th>Source</th>-->
<!--      <th style="cursor:pointer;">  Date</th>-->
<!--        <th>Name</th>-->
<!--        <th>Contact no </th>-->
<!--        <th style="width:300px">  Comment</th>-->
<!--        <th>Agent Name </th> -->
<!--        <th> Status </th>-->
<!--        <th> Action </th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
        
<!--        @foreach($getStudent as $get)-->
<!--        <tr>-->
<!--           <td><input name="id[]"  value="{{$get->unique_id}}" class="id{{$get->unique_id}}" type="checkbox" id="select-all"></td>-->
<!--            <td></td>-->
<!--            <td>{{'IC'.$get->id}}</td>    -->
<!--        <td>{{$get->source}}</td>-->
<!--        <td>{{$get->date}}</td>-->
<!--        <td>{{$get->name}}</td>-->
<!--        <td>{{$get->contact}}-->
<!--         @if(!empty($get->contact))-->
<!--          <a style="color:#575757;" href="https://api.whatsapp.com/send?phone=91{{$get->contact}}&amp;text=Hello" target="_blank" style="color:#fff;">-->
<!--               <img style="width:15px; height:15px; background:blur;"  src="{{url('public/images/whatsapp.png')}}"></a>-->
<!--            <span><a href="tel:{{$get->contact}}"><i style="font-size:12px; color:#25D366;" class="fa fa-phone" aria-hidden="true"></i></a></span>-->
<!--          @endif-->
<!--        </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--        <td>{{$get->last_comment}}</td>-->
<!--        <td>{{$get->agent_name}}</td>-->
<!--        <td class="getdate">       -->
<!--              <select name="status_chang" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get->unique_id}} >-->
<!--              <option  selected  value="{{$get->disposition}}" > {{$get->disposition}} </option>-->
<!--              @foreach($enq_status as $status)-->
<!--              <option value="{{$status->status}}"> {{$status->status}} </option>-->
<!--             @endforeach-->
<!--              </select>-->
<!--            </td>-->
        
<!--            <td>  <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$get->unique_id}} ></a>  -->
            <!--<a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>-->
            <!--</a>-->
<!--            <a href="{{url('enquiry/get-detail/'.$get->unique_id)}}"  class="fa fa-edit" ></a>-->
<!--          </td>-->
<!--        </tr>-->
<!--        @endforeach-->

<!--    </tbody>-->
<!--</table>-->
<!--</div>-->
<!--</div>-->
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
            <!--<a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$get->unique_id}} ></a> -->
            
            <a title="Delete" href="javascript:void(0);" class="fa fa-trash   delete"   data-id={{$get->unique_id}} ></a> 
            <!--<a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>-->
            <!--</a>-->
            <!--<a href="{{url('enquiry/get-detail/'.$get->unique_id)}}"  class="fa fa-edit" ></a>-->
                <a title="Edit" href="{{url(Request::segment(1).'/'.'edit-lead/'.$get->unique_id)}}" class="fa fa-edit ">  </a>
          </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
<script>
$(document).ready(function(){
  $('#range_filte').on('change', function(){
    
    var val =  $(this).val();
    

    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
     });
     $.ajax({
      type: "get",
      url: "{{url('search_filter')}}?id="+val,
        success: function(data){
        
        <!--   // $('#aaa').append("<table> <thead class='k0listenqury'> <tr> <th></th> <th>Client Id</th> <th style='cursor:pointer;'> Date</th> <th>Name</th><th>Contact no </th> <th>Agent Name </th> <th> Status </th> <th> Purpose </th> <th> Comment</th> <th> Enrol </th> <th>Manage</th> </tr></thead> </table>"); -->
        }
      });
  });
});
</script>
 <script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>

<script>
              document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                      }
                    }
                    </script>
@if ($message = session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>

    <script>
              document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                      }
                    }
                    </script>
                  

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
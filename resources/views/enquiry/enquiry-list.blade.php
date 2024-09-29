<?php
use App\Helpers\Helper;
?>

{{-- @dd($_SERVER['REMOTE_ADDR']) --}}
@extends('header')
@section('enquiry-list')
<script>
  $(document).ready(function(){
    $('#shortby,#range_filter').change(function(){
        $('.enquiry-agent-name').submit();
    })
  })
</script>
  

</div>
{{-- @include('enquiry.enquiry-modal')  --}}

<style>
  #myBtn{
    top:30px;
  }
  .last-comment-p-tag{
    overflow: hidden;
    width:300px;
  }
#myModal .close{
  padding: 0;
    margin: 0;
    color: #000;
    background: none;
}

#save_comment_button{
  display: inline;
}

#comment{
  padding: 4px;
    border-radius: 3px;
    border: 1px solid #b1abab;
}

#myModal .modal{
padding-top:0; 
}



#myModal .modal-content{
   top: 5%;
    /* transform: translate(0,-50%);
    width:500px !important;  */
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


.callbacklate{
  width: 40%;
  padding: 6px;
}
/*prabhat css start*/
.last-comment-p-tag{
       margin-left: -20px;!important;
       margin-right:21px;
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
.form-group{
        margin-left: 0px!important;
}
/*prabhat css end*/
/*@media only screen and (max-width: 600px){*/
/*   #example thead tr:nth-child(1){*/
/*       position: sticky;*/
/*  top:-5px;*/
/*}*/
/*   }*/
</style>

<!--<style>-->
<!--.demo {-->
<!--width:400px;-->
<!--overflow-x:scroll;-->
<!--}-->
<!--</style>-->
      <!-- Begin Page Content -->
      <div class="container-fluid" style="padding:0">
        <div class="container-fluid "  style="padding:0">
            <script>
            $('.panel').hide();
                $(document).ready(function(){
                    
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
          <div class="row list-page-top-link panel"  >
              
         
            
            

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
   @endif
   

            
            <div class="col-md-12"> 
              <!-- test -->
              <ul class="enquiry-test-list">
                <a href="{{url(Request::segment(1).'/'.'add-leads')}}" class="collapse-item "><li>
                    {{-- <button type="button" class="" >
                          --}}
                      
                        <i class="fas fa-plus"></i> Add Lead  
                      {{-- </button> --}}
                </li></a>
                <?php 
                if( Auth::user()->usertype_status =='1'){
               $trash = DB::table('enquiries')->where('delete_client','0')->get();
                ?>  
                <a href={{ url('admin/get-all-trash-clients') }}><li><i class="far fa-arrow-alt-circle-right"></i> {{$trash->count()}} Trashed  </li> </a>
                <?php } ?>
                <li><a href={{ url(Request::segment(1).'/'.'get-all-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}><i class="fas fa-angle-double-right"></i>  Get All  </a></li>
                <?php 
            if( Auth::user()->usertype_status =='1'){
              ?>
              <a href={{ url('admin/asign-client-list') }}><li><i class="fas fa-user-tie"></i> Assigned Client  </li></a> 
              <?php
              } 
              ?>
                <!-- <li> {{-- <a href={{ url('new-user') }}>  Add Clients  </a> --}}</li> -->
                <a  data-toggle="modal" data-target="#import_client" href =""  aria-hidden="true" style="color:#fff"><li> </i> <i class="fas fa-upload"></i> Import Client
                </li></a>
                <a  data-toggle="modal" data-target="#import_unfollow_client" href =""  aria-hidden="true" style="color:#fff"><li></i> <i class="fas fa-file-import"></i> Import Cold Leads
                </li></a>
                
                <li>
                  <i class="fas fa-list-ul"></i> <span  class="priority-list-ul" style="padding:8px;">Priority 
                        <div class="hide-priority-list-ul">
                               <a href={{ url(Request::segment(1).'/'.'priority-list/1/0') }} value="1">   High  </a> 
                               <a href={{ url(Request::segment(1).'/'.'priority-list/2/0') }} value="2">   Medium  </a> 
                               <a href={{ url(Request::segment(1).'/'.'priority-list/3/0') }} value="3">   Low  </a> 
                              </div>
                                     </span>
                </li>
              <li>{{-- 03-11-2020 --}}
             
                  <a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_followup_client"><i class="fas fa-phone-alt"></i> Pick Leads<span style="color: #4aff68;"> <?php 
                    if(Auth::user()->usertype_status == 1){
                     echo DB::table('unfollowdata')->count('id');
                    }
                     ?> </span> </a>
                  @include('enquiry/add-new-client-popup')
                  {{-- 03-11-2020 --}}</li>
                   <li>
                     <a class="collapse-item" href="{{url(Request::segment(1).'/'.'hot-lead/'.Crypt::encrypt(Auth::user()->employee_id)) }}"><i class="fas fa-list"></i>  Hot Lead</a>
                  </li>
              </ul>
              <!-- test end -->
                
          </div>    
            
          </div> 

          

   {{ Form::open(array('url'=>Request::segment(1).'/'.'search', 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

   <input type="hidden" name="type" value = "0">
 
<div class="panel">
            <div class="row enquiry-agent-name">
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
                   <option value="{{$status1->status}}" <?php echo (!empty($status) && ($status == $status1->status))  ? 'selected' : ''; ?>>{{$status1->status}}</option>;
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
                <a class="btn btn-danger w-10" href="{{url(Request::segment(1).'/'.'enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">Reset</a>
                
  
            </div>
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
       <input type="hidden" name="type" value = "0">
        {{-- {{Form::hidden('id', Auth::user()->employee_id)}} --}}
       <!--<select name="range_filter" id="range_filter" class="form-control " style="width:100%!important" >-->
         <label for="">Show entries</label>
            <select name="range_filter" id="range_filter" class="form-control " >
          
          @for($i=20; $i<=100; $i+=10)
          


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
           @if(Auth::user()->usertype_status == 1)
           <li class="btn-special btn-icon btn-googleplus" onclick="BulkDelete(event.target)" id="bulkDelete"><i class="fa fa-trash" aria-hidden="true"></i><span id="" style="padding-left: 5px; padding-right: 5px;" > Delete</span></li>
            @endif
            <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-file-excel-o" aria-hidden="true"></i><span  onclick ="exportTasks(event.target);" id="exportexcell" style="padding-left: 5px; padding-right: 5px;" >Export Excel</span></li>
         
           <!--  <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span  data-href="{{route('export')}}" id="export" style="padding-left: 5px; padding-right:5px; color:#fff;" onclick="exportTasks(event.target);"></span></li> -->
    <!--  <span data-href="/tasks" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span> --> 

          <!--<li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-envelope" data-toggle="modal" data-target="#send-email"></i><span style="padding-left: 5px; padding-right: 5px;" data-toggle="modal" data-target="#send-email">Send Email</span></li>-->
          
          <li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-envelope" ></i><span style="padding-left: 5px; padding-right: 5px;">Send Email</span></li>
          
          <!--<li class="btn-special btn-icon btn-googleplus" id="sendEmail"><i class="fa fa-comment" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px;"><a href="https://api.whatsapp.com/send?phone=919311472787&amp;text=Hello" target="_blank" style="color:#fff;">Send SMS</a></span></li>-->
          
          <li class="btn-special btn-icon btn-googleplus" id="send-sms"><i class="fa fa-comment" aria-hidden="true" data-toggle="modal" data-target="#send-sms"></i><span style="padding-left: 5px; padding-right: 5px;" id="sendsmsjsss">Send sms</span></li>
          @if(Auth::user()->usertype_status == 1)
          <li onclick ="" class="btn-special btn-icon btn-googleplus" id="asign_clientmodel">
            <i class="fa fa-user" aria-hidden="true" data-toggle="modal" data-target=""></i>
            <span style="padding-left: 5px; padding-right: 5px;"  class="">Assign</span>
          </li>
          @endif
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
          margin-right: 5px;">Send Quote </button> </form>
          
          </li>
        
        
        </ul>

      </div>
      {{-- send email end --}}
     
  


      </div>
      <center> <h2 class="text-primary">Lead List</h2></center>
      <div class="demo"> <img src="image.jpg"> </div>

    <div class="row">
      <div id="aaa">
        <table></table>
      </div>
<div style="overflow-x:auto; height:700px; width:100%;">
{{Form::open(array('url'=>Request::segment(1).'/'.'export', 'method'=>'get','id'=>'form_export_excell'))}}
           <table class="  display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
              <thead class="k0listenqury">
              <tr>
                <th>
             <input type="checkbox"id="select-all">
                    </th>
                     <th>No</th>
                  <th>#</th>
                <th> Id</th>
                <th>Source</th>
                {{-- <th>Client Id</th> --}}
                <th>Date</th>
                  <th>Name</th>
                  {{-- <th>Email Id </th> --}}
                  <th>Contact no</th>
                  <th>Country</th>
                  <th>Comment</th>
                  @if(Auth::user()->usertype_status != 4)
                  <th>Agent</th> 
                  @endif
                  <th> Status </th>
                  <th> Purpose </th>
                  {{-- <th> Assign </th> --}}
                  
             
                  <th>Convert</th>
             
                  {{-- <th> Enroll </th> --}}
                   <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                
                @if((isset($search) && ($search->count() >0) && ($search != null)))
                
                @foreach($search as $s)
                
                
                <tr>
                   <td><input name="id[]"  value="{{$s->unique_id}}" class="id{{$s->unique_id}}" type="checkbox" id="select-all"></td>
               <!--<td><input name="checkbox[]"  value="{{$s->unique_id}}"  type="checkbox" class="select-all"></td> -->
                  
                    <td class="{{$s->device}} desk-top" style="border:none !important"></td>

                  
                    {{-- <td title="Click to Give Priority "  data-id={{$s->unique_id}}  class="add-priority"> 
                        @if($s->set_priority == 1)
                     <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:green;width: 49px;">   {{$s->id}}   <span class="fa fa-flag"></span>  </p> 
                      @else
                      <p onclick="return confirm('Are you sure you want to Set Priority?')">
                      {{$s->id}}  <span class="fa fa-flag"></span>
                    </p>
                      @endif
                      </td> --}}

                    
                      <td   data-id={{$s->unique_id}}  class=" set-priority-hover"> 
                        @if($s->set_priority == 1)
                     <p   style="color:#a33535;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$s->id}}   <span class="fas fa-fla"></span>   </p> 
  
                     @elseif($s->set_priority == 2)
                     <p   style="color:#2f2fc8;"> <span class="fa fa-check "></span>  {{'IC'.$s->id}}   <span class="fas fa-fla"></span>   </p>
                     @elseif($s->set_priority == 3)
                     <p   style="color:#196919;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$s->id}}   <span class="fas fa-fla"></span>   </p>
                      @else
                      <p >
                           {{'IC'.$s->id}}  
                    </p>
                      @endif
  
  
                      
                      <div class="priority-color"> 
  
                      <label class="container-radio">
                      <input type="radio" name="priority_value_name"  data-id={{$s->unique_id}}  value = "1" class="add-priority" >
                          <span class="checkmark checkmark-color1"></span>
                        </label>
                        
                      <label class="container-radio">
                          <input type="radio" name="priority_value_name"  data-id={{$s->unique_id}}  value = "2" class="add-priority" >
                          <span class="checkmark checkmark-color2"></span>
                        </label>
  
                        
                      <label class="container-radio">
                       
                      <input type="radio" name="priority_value_name"  data-id={{$s->unique_id}}  value = "3" class="add-priority" >
                          <span class="checkmark checkmark-color3"></span>
                        </label>
  

                        <label class="container-radio">
                          <input type="radio" name="priority_value_name"  data-id={{$s->unique_id}}  value = "0" class="add-priority" >
                              <span class="checkmark checkmark-color4"></span>
                            </label>

                      </div>
                     
  
                      </td>
  
  

                    
                    <td>{{$s->source}}</td>

                    <?php $date  = $s->date ?>

                    <?php  $time = strtotime($date)  ?>
                     
                    

                     <td> {{$a = date('d-m-Y', $time)}}</td>

                    {{-- <td>{{$s->date}}</td> --}}
                    <td class="client-name"> 
                    @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2 || Auth::user()->usertype_status == 3)  
                      <a href={{url(Request::segment(1).'/'.'enquiry/get-detail/'.$s->unique_id)}}>  {{$s->name}} </a>  
                    @else
                    <a href="#" style="color:#575757">  {{$s->name}} </a>  
                    @endif
                    </td>
                    
                      {{-- <td>{{$s->email}}</td> --}}
                      <td>{{$s->contact}}
                       @if(!empty($s->contact))
          <a style="color:#575757;" href="https://api.whatsapp.com/send?phone=91{{$s->contact}}&amp;text=Hello" target="_blank" style="color:#fff;">
               <img style="width:15px; height:15px;"  src="{{url('public/images/whatsapp.png')}}"></a>
            <span><a href="tel:{{$s->contact}}"><i style="width:15px; height:15px; font-size:12px; color:#25D366;"></i></a></span>

          @endif
          <p><a href="tel:{{$get->alternate_contact}}">{{$get->alternate_contact}}</a>  </p>
                      
                      </td>
<!--<a href="tel:123-456-7890">123-456-7890</a>-->


<td>{{Helper::getCountry($get->country)}}  </td>

                      <td class= "comment-popup fa fa-commen" class="myModal2 add_comment"> 
                         
                        <p class="last-comment-p-tag">
                              <?php                  
                      $get_last_comment = DB::table('enq_comments')
                      ->select(DB::raw('comment,MAX(id) as a'))
                      ->groupBy('comment','id')
                      ->where('client_enquiry_id',$s->unique_id)
                      ->orderBy('id','DESC')
                      ->get();
                      ?>
                      @if(!empty($get_last_comment[0]->comment))
                      {{$get_last_comment[0]->comment}}
                      @endif
                      </p>
                        
                        
                        <button id="myBtn" class="add_comment add_comment22" old-comment ={{$s->unique_id}}  data-id={{$s->unique_id}} >More..</button> 
                      </td>


                      <td> {{$s->agent_name}} </td>
                      <td class="getdate">

                        {{-- <select name="" id="unique_id" class="form-control  update_status" onChange="update_status(this.value);"> --}}
                       
                          <select name="status_chang" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$s->unique_id}} >

                          <option  selected  value="{{$s->disposition}}" > {{$s->disposition}} </option>
                          @foreach($enq_status as $status2)
                          <option value="{{$status2->status}}"> {{$status2->status}} </option>
                         @endforeach
                         
                          </select>
                        </td>

                      <td> {{$s->purpose_of_query}} </td>
                      

                     


                      <?php 
                      if( Auth::user()->usertype_status =='1'){
                        ?>
                     
                     {{-- <td class="asign-client">   
                         <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$s->unique_id}} > </a>  
                     </td>  --}}
                      <?php } ?>
                      {{-- <td> <a href="{{url('client-enrolmen/'.$s->unique_id)}}"> Enroll</a>  </td> --}}
                      

 <td>
                        <!--<select name="conversion" id="conversion">-->
                        <select name="conversion" id="conversion" class="form-control  update_sta" onchae="update_statu(this.value);" data-id="21418423">
                          <option value="">Select Conversion</option>
                          <option value="1">Student</option>
                          <option value="2">PR/Immigration</option>
                          <option value="3">Institute</option>
                        </select>
                      </td>

                     
                        


                      <td>
                          <a href="javascript:void(0);" class="fa fa-trash delete"   data-id="{{$s->unique_id}}">
                      </a>
                         <a href="{{url(Request::segment(1).'/'.'enquiry/get-detail/'.$s->unique_id)}}  ">
                      <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                      </td>
                </tr>
                
                @endforeach
                
                {{-- @else --}}
                {{-- <tr><td colspan="12"><img src="{{url('public/uploads/NoRecordFound.png')}}" alt="" style="width:400px;height:400px"></td></tr> --}}
                
                @elseif(isset($priority) && $priority->count() >0)
                
                @foreach($priority as $get2)
                <tr>
                  
                    {{-- {{"fsdfsdfkjhgjkdhghldghjekhgkjljgklek"}} --}}
                  <td class="{{$get2->device}} desk-top" style="border:none !important"></td>
                  
                  {{-- <td title="Click to Give Priority "  data-id={{$get2->unique_id}}  class="add-priority"> 
                      @if($get2->set_priority == 1)
                   <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:green;width: 49px;">   {{$get2->id}}   <span class="fas fa-flag"></span>     </p> 
                    @else
                    <p onclick="return confirm('Are you sure you want to Set Priority?')">
                    {{$get2->id}}  <span class="fas fa-flag"></span>
                  </p>
                    @endif
                   </td> --}}

                  



                   
                   <td   data-id={{$get2->unique_id}}  class=" set-priority-hover"> 
                    @if($get2->set_priority == 1)
                 <p   style="color:#ac9292;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p> 

                 @elseif($get2->set_priority == 2)
                 <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#2f2fc8;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                 @elseif($get2->set_priority == 3)
                 <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#196919;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                  @else
                  <p nclick="return confirm('Are you sure you want to Set Priority?')">
                       {{'IC'.$get2->id}}  
                </p>
                  @endif


                  
                  <div class="priority-color"> 

                  <label class="container-radio">
                  <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "1" class="add-priority" >
                      <span class="checkmark checkmark-color1"></span>
                    </label>
                    
                  <label class="container-radio">
                      <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "2" class="add-priority" >
                      <span class="checkmark checkmark-color2"></span>
                    </label>

                    
                  <label class="container-radio">
                   
                  <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "3" class="add-priority" >
                      <span class="checkmark checkmark-color3"></span>
                    </label>

                    
                    <label class="container-radio">
                      <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "0" class="add-priority" >
                          <span class="checkmark checkmark-color4"></span>
                        </label>

                  </div>
                 

                  </td>


                  


                  
                  
                   <td>{{$get2->source}}</td>
                      {{-- <td>
                          <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}> {{$get2->unique_id}} </a>
                      </td> --}}

                      <?php $date  = $get2->date ?>

                     <?php  $time = strtotime($date)  ?>
                      
                     

                      <td> {{$a = date('d-m-Y', $time)}}</td>

                    <td class="client-name">
                      
                      {{-- <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>   {{$get2->name}} </a>  --}}
                    
                      @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2 || Auth::user()->usertype_status == 3)  
                      <a href={{url(Request::segment(1).'/'.'enquiry/get-detail/'.$get2->unique_id)}}>  {{$get2->name}} </a>  
                    @else
                    <a href="#">  {{$get2->name}} </a>  
                    @endif
                    
                    
                    </td>
                  
                    {{-- <td>{{$get2->email}}</td> --}}
                    <td>{{$get2->contact}}</td>

                    <td class= " comment-popup fa fa-commen" class="myModal2 add_comment" > 
                      
                        <p class="last-comment-p-tag">
                            <?php                  
                    $get_last_comment = DB::table('enq_comments')
                    ->select(DB::raw('comment,MAX(id) as a'))
                    ->groupBy('comment','id')
                    ->where('client_enquiry_id',$get2->unique_id)
                    ->orderBy('id','DESC')
                    ->get();
                    
                    ?>
@if(($get_last_comment->count() > 0))
                    {{$get_last_comment[0]->comment}}
@endif
                    </p>
                      
                      
                      <button type="button" id="myBtn" class="add_comment add_comment22"  data-id={{$get2->unique_id}} >More..</button>  </td> 


                    <td>{{$get2->agent_name}}</td>
                    <td class="aa">
                        {{-- {{ Form::text('unique_id', $get2->unique_id, array( 'id'  => 'a'.$get2->unique_id ) ) }} --}}
                        
                      <select name="" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get2->unique_id}} >
                          <option  selected value="{{$get2->disposition}}" disabled> {{$get2->disposition}} </option>
                          @foreach($enq_status as $status3)
                          <option value="{{$status3->status}}"> {{$status3->status}} </option>
                         @endforeach
                    </select>
                    {{-- <input type="text" class="ppp" style="display:none" data-id="{{$get2->unique_id}}"> --}}
                    </td>
                    <td> {{$get2->purpose_of_query}} </td>

                   
                    
                    <?php 
                    if( Auth::user()->usertype_status =='1'){
                      ?>
                    {{-- <td class="asign-client">   
                        <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$get2->unique_id}} ></a>  
                    </td>  --}}
                  <?php } ?>
                    {{-- <td> <a href="{{url('client-enrolment/'.$get2->unique_id)}}"> Enroll</a>  </td> --}}
                    <td>  <a href="javascript:void(0);" class="fa fa-trash  delete"   data-id={{$get2->unique_id}} ></a>
                  @if( Auth::user()->usertype_status =='1')
                      <a href={{url(Request::segment(1).'/'.'enquiry/get-detail/'.$get2->unique_id)}}><i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                  @else
                  <a href="#"><i class="fa fa-edit" aria-hidden="true"></i>
                  </a>
                  @endif
                  </td>
                  </tr>
                @endforeach
                
                @elseif(isset($get) && $get->count() > 0)  {{-- this is come form enquirycontroller getalllist--}}
                 
                <?php 
                
                if((isset($_GET['page']) && isset($_GET['range_filter']))  && (!empty($_GET['page']) && !empty($_GET['range_filter'])))
                {
                  // dd($_GET['page'], $_GET['range_filter']);
                  $a = $_GET['page']*$_GET['range_filter'];
                  $i = $a-$_GET['range_filter']+1;
                  
                }
                else if(isset($_GET['page'])){
                  $a = $_GET['page']*20;
                  
                  $i = $a-19;
                }
                else{
                  
                  $a = 20;
                  $i = $a-19;
                }
            //  dd($i);
                ?>

                  @foreach($get as $get2)
                  
                  <tr>
                
                   <!--  <td><input name="id[]"  value="{{$get2->id}}"  type="checkbox" class="select-all"></td> -->
                    <td><input name="id[]"  value="{{$get2->unique_id}}" class="id{{$get2->unique_id}}" type="checkbox" id="select-all"></td>
                  
                     <td>
                   
                  {{ $i++ }}  
                    </td>
                    <td class="{{$get2->device}} desk-top" style="border: none !important"></td>

                






                    
                    <td   data-id={{$get2->unique_id}}  class=" set-priority-hover"> 



                      @if($get2->set_priority == 1)
                   <p   style="color:#a33535;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p> 

                   @elseif($get2->set_priority == 2)
                   <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#2f2fc8;"> <span class="fa fa-check "></span>{{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                   @elseif($get2->set_priority == 3)
                   <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#196919;"> <span class="fa fa-check "></span> {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                   {{-- @elseif($get2->set_priority == 4) --}}

                   @else
                    <p click="return confirm('Are you sure you want to Set Priority?')">
                         {{'IC'.$get2->id}}  
                  </p>
                    @endif


                    
                    <div class="priority-color"> 

                    <label class="container-radio">
                    <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "1" class="add-priority" >
                        <span class="checkmark checkmark-color1"></span>
                      </label>
                      
                    <label class="container-radio">
                        <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "2" class="add-priority" >
                        <span class="checkmark checkmark-color2"></span>
                      </label>

                      
                    <label class="container-radio">
                    <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "3" class="add-priority" >
                        <span class="checkmark checkmark-color3"></span>
                      </label>


 
                      <label class="container-radio">
                          <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "0" class="add-priority" >
                              <span class="checkmark checkmark-color4"></span>
                            </label>

 {{-- <label class="container-radio">
                     
                    <input type="radio" name="priority_value_name"  data-id={{$get2->unique_id}}  value = "3" class="add-priority" >
                        <span class="checkmark checkmark-color4"></span>
                      </label> --}}


                    </div>
                   

                    </td>




                    
                    <td>
                      
                      {{$get2->source}}</td>
                        {{-- <td>
                            <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}> {{$get2->unique_id}} </a>
                        </td> --}}

                        <?php $date  = $get2->date ?>

                       <?php  $time = strtotime($date)  ?>
                        
                       

                        <td> {{$a = date('d-m-Y', $time)}}
                        
                        <br> 
                          <span style="font-size: 12px;
                          color: #746c6c;">
                        <?php  
                          $get_time = DB::table('enq_comments')->select('created_at')->where('client_enquiry_id', $get2->unique_id)->orderBy('id','DESC')->first();
                          // echo $get_time->created_at;
                          echo$get_time?date('h:i:s', strtotime($get_time->created_at)):'';
                          // echo$get_time?$get_time->created_at:'';
                          ?>
                          </span>
                        </td>

                      <td class="client-name"> 
                          {{-- <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>   {{$get2->name}} </a>  --}}
                        
                        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2 || Auth::user()->usertype_status == 3)  
                          <a style="color:#575757;" href={{url(Request::segment(1).'/'.'enquiry/get-detail/'.$get2->unique_id)}}>  {{$get2->name}} </a>  
                        @else
                        <a href="#" style="color:#575757;">  {{$get2->name}} </a>  
                        @endif
                        
                        </td>
                    
                      {{-- <td>{{$get2->email}}</td> --}}
                      <td class="mob-no">
                        <?php 
                        $phone =$get2->contact;
$result = "*****";
$result .= substr($phone, 5, 10);
?>
                       <p>
                        @if(Auth::user()->usertype_status == 1)
                        <a href="tel:{{$get2->contact}}"style="color: black;">{{$get2->contact}}</a> 
                        @else 
                        <a href="tel:{{$get2->contact}}"style="color: black;">{{$result}}</a> 
                        @endif
                        @if(!empty($get2->contact))
          <a style="color:#575757;" href="https://api.whatsapp.com/send?phone=91{{$get2->contact}}&amp;text=Hello" target="_blank" style="color:#fff;">
               <img style="width:25px; height:25px;"  src="{{url('public/images/whatsapp.png')}}"></a>
            <span><a href="tel:{{$get2->contact}}"><i style="font-size:15px; color:#25D366;"></i></a></span>
          @endif
                       </p>
                       {{--<p><a href="tel:{{$get2->alternate_contact}}"style="color: black;">{{$get2->alternate_contact}}</a></p> --}}
                      <!--<p> {{$get2->alternate_contact}} </p>-->

                      </td>

@if($get2->country != "India")

<td>{{$get2->country?Helper::getCountry($get2->country):''}}  </td>
@else
<td>India</td>

@endif

                      <td class= " comment-popup fa fa-commen" class="myModal2 add_comment">
                        <p class="last-comment-p-tag">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php                  
$get_last_comment = DB::table('enq_comments')
->select(DB::raw('comment,MAX(id) as a'))
->groupBy('comment','id')
->where('client_enquiry_id',$get2->unique_id)
->where('comment','!=',null)
->orderBy('id','DESC')
->get();

?>
@if(!empty($get_last_comment[0]->comment))
{{$get_last_comment[0]->comment}}
@endif
</p>

                        <button type="button" id="myBtn" class="add_comment add_comment22"  data-id={{$get2->unique_id}} ><span class="fa fa-commenting" ></span></button>  </td> 

@if(Auth::user()->usertype_status != 4)
                      <td>{{$get2->agent_name}}</td>
                      @endif
                      <td class="aa">
                          {{-- {{ Form::text('unique_id', $get2->unique_id, array( 'id'  => 'a'.$get2->unique_id ) ) }} --}}
                          
                        <select name="" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get2->unique_id}} >
                            <option  selected value="{{$get2->disposition}}" disabled> {{$get2->disposition}} </option>
                            @foreach($enq_status as $status4)
                            <option value="{{$status4->status}}"> {{$status4->status}} </option>
                           @endforeach
                      </select>
                      {{-- <input type="text" class="ppp" style="display:none" data-id="{{$get2->unique_id}}"> --}}
                      </td>
                      <td> {{$get2->purpose_of_query}} </td>

                     
                      
                      <?php 
                      if( Auth::user()->usertype_status =='1'){
                        ?>
                      {{-- <td class="asign-client">   
                          <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$get2->unique_id}} >
                            
                          </a>  
                      </td>  --}}
                    <?php } ?>
                      {{-- <td> <a href="{{url('client-enrolment/'.$get2->unique_id)}}"> Enroll</a>  </td> --}}


                      <td class="aa">
                        <select class="form-control  update_statu" name="conversion" id="conversion">
                          <option value="">Select Conversion</option>
                          <option value="1">Student</option>
                          <option value="2">PR/Immigration</option>
                          <option value="3">Institute</option>
                        </select>
                      </td>

                      <td>  
                        <a title="Delete" href="javascript:void(0);" class="fa fa-trash  delete"   data-id={{$get2->unique_id}} ></a> 
                    @if( Auth::user()->usertype_status =='1')
                        {{-- <a href="{{url('enquiry/get-detail/'.$get2->unique_id)}}"  class="fa fa-edit" > --}}
                          <a title="Edit" href="{{url(Request::segment(1).'/'.'edit-lead/'.$get2->unique_id)}}" class="fa fa-edit ">  </a>
                          
                          
                        {{-- <i class="fa fa-external-link-alt" aria-hidden="true"></i> --}}
                      </a>
                      @else
                      {{--<a href="#"  class="fa fa-edit" ></a> --}}
                       <a title="Edit" href="{{url(Request::segment(1).'/'.'edit-lead/'.$get2->unique_id)}}" class="fa fa-edit ">  </a>
                    @endif
                    </td>
                    </tr>
                   
                    @endforeach
                    @else
                    
                    <tr><td colspan="14"><img src="{{url('public/uploads/NoRecordFound.png')}}" alt="" style="width:400px;height:400px"></td></tr>
                    @endif
                    {{-- @if(!empty($new_user)) --}}
                    {{-- @foreach($new_user as $get)
                      <tr>
                      <td>{{ $get->unique_id }}</td>
                      <td>{{ $get->date }}  </td>
                      <td> {{ $get->name }} </td>
                                        <td>{{ $get->phone }}</td>
                      <td><a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>
                          </a></td>
                      </tr>
                    @endforeach --}}
  {{-- <tr><td colspan="15" style="hover:background:red"> 
    </td></tr> --}}
                    {{-- @endif --}}
                    
                    @if(isset($value))
                    <tr><td colspan="15" style="hover:background:red">
                      
     {{ $get->appends(['range_filter'=>$value ])->links() }} 
    </td></tr>
    @elseif(isset($get))
    
    <tr><td colspan="15" style="hover:background:red">
    {{ $get->appends(['type'=>isset($type)?$type:0,'filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'agent_id'=>isset($agent_id)?$agent_id:"",'status'=>isset($status)?$status:"",'purpose_of_query'=>isset($purpose_of_query)?$purpose_of_query:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($showentry)?$showentry:"",'shortby'=>isset($shortby2)?$shortby2:""])->links() }} 
  </td></tr>
  
     @endif
     
     {{-- @if(empty($get)) --}}



                    {{-- <tr><td>Record Not Found</td></tr> --}}

                    {{-- @endif --}}
                    
                  </tbody>
              </table>
              {{Form::close()}}
            </div>

               


              </div>












            </div>
    
   
        </div>
        <!-- /.container-fluid -->
       
      </div>
      <!-- End of Main Content -->   


     <script>
// function asignClientclose()
// {
//     alert('hi');
//   $("#asign_client").hide(); 
// }
$(".asign-client-close").click(function(){
    alert('d');
   $("#asign_client").hide();  
})

$(document).ready(function(){
  
  $(".update_status").on("change", function(){ 
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

  if (confirm('Are you sure you want to update this?')) {
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



<script>
         
 $(document).ready(function(){
                          $("#form").submit(function (e) {
                            var comment = $('#comment3').val();
                             var callbackdate = $('#callbackdate').val();
                             var callbacktime = $('#callbacktime').val();
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url(Request::segment(1).'/'.'callbacklater')}}?a="+unique_id+"&comment="+comment+"&val="+val+"&callbacklater="+callbackdate+"&callbacklater_time="+callbacktime;
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


<style>
  

.tooltip-text{
  display:none;
}
</style>

<script>
$(document).ready(function(){
  $(document).on("mouseover", function(e){
    var screenheight = $(window).height(); 
        var mouseYposition = e.pageY; 
        var tooltipheight = $(".tooltip-text").height();
        if((mouseYposition + tooltipheight) > screenheight){

		$(".comment-popup").mouseover(function(){

	$(this).parent().parent().find(".tooltip-text").css(
			"top","-70px"
		);	
	
});
}
  else{
  			$(".pol-details").mouseover(function(){

	$(this).find(".tooltip-text").css(

			"top","45px"
		);
	
});

  }
});


$(".pol-details").mouseover(function(){

$(this).parent().parent().find(".tooltip-text").show();

});

$(".pol-details").mouseout(function(){

$(this).parent().parent().find(".tooltip-text").hide();

});


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
                let url = "{{url(Request::segment(1).'/'.'callbacklater')}}?a="+ppppp+"&comment="+comment;
                          var   currentRequest  =   jQuery.ajax({
      type: "post",
        url: url,
        // dataType: "text",
        // data: new FormData( this ),
        // processData: false, 
        // contentType: false, 
       
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
<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal" style="padding-top:0;">

  <!-- Modal content -->
  <div class="modal-content">
    
    <p class="close" style="top: 0px;
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
    @if(!empty($get))
    {{-- @dd($get) --}}
    <?php $data_id = $get?>
    @elseif(!empty($search))
    <?php $data_id  = $search ?>
    @else 
    <?php
    
    $data_id  = $get ?>
    @endif
    @if(($data_id->count()  > 0)) 
    {{-- @dd('dsfsd'); --}}
    @foreach($data_id as $id)
    {{Form::open(array('url'=>"(Request::segment(1).'/'.callbacklater" , 'id' => 'form', 'data-id' => $id->unique_id, 'class' => 'form'))}}
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









@foreach($data_id as $id)

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

      @if(($data_id->count()  > 0))
      {{-- @if(!empty($data_id['comment'])) --}}
  <p id="old_coment" class="old-comment"> </p>
  {{Form::open(array('url'=>"Request::segment(1).'/'.callbacklater" , 'id' => 'form2', 'data-id' => $id->unique_id, 'class' => 'form form-inline'))}}
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
  
  {{-- @endif --}}
  @endif
    </div>
  </div>
  </div>
  @endforeach
  <!-- end of comment Modal -->
   
  <script>
    
  </script>
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

  var myModal = document.getElementById("myModal");
  var comment_close = document.getElementById("comment_close");
  comment_close.onclick = function() {
    myModal.style.display = "none";
    // location.reload();
  }
  window.onclick = function(event) { 
    if (event.target == myModal) {
      myModal.style.display = "none";
    }
  }


 
  </script>
  




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
			url: "{{url('range_filter')}}?id="+val,
				success: function(data){
        
					// $('#aaa').append("<table> <thead class='k0listenqury'> <tr> <th></th> <th>Client Id</th> <th style='cursor:pointer;'> Date</th> <th>Name</th><th>Contact no </th> <th>Agent Name </th> <th> Status </th> <th> Purpose </th> <th> Comment</th> <th> Enrol </th> <th>Manage</th> </tr></thead> </table>");
				}
			});
	});
});
</script>




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
      {{Form::open(array('url'=>Request::segment(1)."/asign-client" , 'id' => 'asign_client_form', 'class' => 'form'))}}
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
  {{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}} 
  <!--<button type="button" id="save_comment_btn" class="w-10 my-3">Submit</button>-->
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
}
       ?>

  
    </div>
  </div>
  </div>
  <!-- end of asign agent Modal -->
   

<script>

// var asign_client = document.getElementById("asign_client");
//   var span2 = document.getElementsByClassName("asign-client-close")[0];
//   span2.onclick = function() {
//     asign_client.style.display = "none";
    // location.reload();
//   }
  // if (event.target == asign_client) {
  //   agent_create.style.display = "none";
	//   }


$(document).ready(function(){
  
  var sub =  document.querySelector('#save_comment_btn');
sub.onclick = function(){
  
  var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
  if(len>0){
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








  
// var sub =  document.querySelector('#send_quote');
// sub.onclick = function(){
//   var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
//   if(len>0){
//     var sub_array = [];
//     for(var i=0; i<len; i++){
//       sub_array.push(document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked')[i].value);
//    }
//     $('#popo3').val(sub_array);
//   }else{
//     alert("Please select CheckBox");
//     return false;
//   }
// }

</script>



{{-- modal for import client --}}
                       <!-- The Modal -->
                       <div class="modal" id="import_client">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Import Clients</h4>
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
                                                    <input type="hidden" name="conversion"  value="0">
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





{{-- modal for import client --}}
                       <!-- The Modal -->
                       <div class="modal" id="import_unfollow_client">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Import Unfollow Clients</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                               
                    
                    
                                 
                              @if(Session::has('message'))
                              <p >{{ Session::get('message') }}</p>
                              @endif
                              
                    
                              <form method='post' action={{url(Request::segment(1).'/'.'import-unfollow-client')}} enctype='multipart/form-data' >
                                {{ csrf_field() }}
                                <div class="custom-file">
                                  <input type="file" class="custom-file-inpu" id="customFil" name="import_client">
                                  
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
     document.getElementById('sendsmsjsss').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //   alert(sendsmsjsss);
    count = 0;
    for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].type === "checkbox" && checkboxes[i].checked === true){
        count++;
        
    }
}
   
     if(count> 0){
         $('#send-sms').modal('show');
     }else{
         alert('please select the student');
     }
    }

 
 
//  asign_clientmodel
document.getElementById('asign_clientmodel').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //   alert(sendsmsjsss);
    count = 0;
    for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].type === "checkbox" && checkboxes[i].checked === true){
        count++;
        
    }
}
   
     if(count> 0){
         $('#asign_client').modal('show');
     }else{
         alert('please select the student');
     }
    }
  </script>
{{-- end of old commemnt --}}

<style>



.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;

}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>

<script type="text/javascript">
   document.querySelectorAll('#conversion').forEach(element => {
    var index = $('#conversion').prop('selectedIndex'); 
    var data = this.value; 

    element.addEventListener('change',function(){
      var data = this.value; 
      if (confirm('Are you sure you want to Convert this?')) {     
            
      var id = element.parentElement.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.dataset;
      

fetch("{{url('ajax/conversion?data=')}}"+data+"&unique_id="+id['id'])
.then((resp) => resp.text())
.then(function(resp){
  window.location.href="";
  
}) }else{
  $('#conversion').prop('selectedIndex',data);
}   
  }); 
  

  })
</script>
 <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.select-all').on('click', function() {
            var checkAll = this.checked;
            $('input[type=checkbox]').each(function() {
                this.checked = checkAll;
            });
        });
    });
</script> -->
 <script>
    document.getElementById('select-all').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
</script>

<!-- export csv file start-->

    <script>
  
   
var sub =  document.querySelector('#sendEmail');
sub.onclick = function(){
    
  var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
  if(len>0){
      $('#send-email').modal('show');
    var sub_array = [];
    for(var i=0; i<len; i++){
      sub_array.push(document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked')[i].value);
   }
   
    $('#popo').val(sub_array);
document.getElementById('#send_mail_form').submit();
// return false;

  }else{
    alert("Please select student");
    return false;
  }
}
// bulk delete

  function BulkDelete(_this) {
    let myarr = [];
    $("input[type='checkbox']:checked").each(function(){
         myarr.push($(this).val());
    });
    if(myarr.length == 0){
        alert("Please Select to Delete");
        return false;
    }else{
    //   $(document).ready(function(){
    
    $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  var unique_ids = myarr.toString();
        let _url = $(_this).data('href');
        // alert(myarr);
        
  if (confirm('Are you sure you want to Delete this?')) {
      
    $.ajax({
    type: "POST",
    url: "{{url(Request::segment(1).'/'.'BulkDeleteViewList')}}",
    data: {'deleteid':myarr},
    success: function(data){
    // alert('Record Delete Successfully ');
    location.reload();
                }
    });
}
      
    // });
      
        // window.location.href = _url;
       
    }
     
   }
   
//   bul delete
// function check_checked(){
  
//   let arr = document.querySelectorAll('input[type="checkbox"]:checked');
//   for(arr of r){
// alert(r);
//   }
// }
   
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
   
//   yourArray.push($(this).val());
   
   
   
</script>
<!-- export csv file end-->



<!-- scrolling over end-->

@endsection


<!-- send email -->

   </div>

   @if ($message = session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <!--send email pop start-->
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
          <form method="post" action="{{route('send-mail')}}" enctype="multipart/form-data" id="send_mail_form">
            <input type="text" id="popo" name="id[]">
            @csrf
         <div class="row">
           <div class="col-md-12">
                <p>Title</p>
              {{-- <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <select id="Short by" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" .required="">-->
                                <option type="checkbox" value="Short">-- Select Template --</option>
                               <option value="date">Date </option>
                               <option value="name">Name</option>
                               <option value="email/phone number">Email/phone number</option>
                               <option value="country">Country</option>
                               <option value="course">Course</option>
                               <option value="source">Source</option>
                               <option value="intake">Intake</option>
                           </select>
               
                                      </div> --}}
                                    </div>
               <div class="col-md-12">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-envelope-square"  aria-hidden="true"></i></span>
                  <input class="form-control" type="text"  name="subject" placeholder="Subject">
                  
                                      </div>
           </div>
           <div class="col-md-12" style="margin-top:10px;">
              <div class="input-group">
                  <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Message">
                   
                  </textarea>
              </div>
           </div>
           <div class="col-md-12 text-center" style="margin-top:10px;">
               <button id="cancel" name="cancel" class="btn btn-danger" value="1">Cancel</button>
               <!--<input type="su" class="btn btn-info" value="Cancel">-->
             <input type="submit" value="Send Mail" class="btn btn-danger w-10" id="send_mail">
           </div>
           </div>
         </div>
        </form>
        </div>
      </div>
    </div>
    <!--send email pop end-->
    <!--send sms start-->
    <div class="modal" id="send-sms">
    <div class=" ">
      <div class="modal-content">
  
         <!--Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Sms</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
         <!--Modal body -->
        <div class="modal-body">
          <form method="post" action="{{route('send-mail')}}" enctype="multipart/form-data">
            @csrf
         <div class="row">
           <div class="col-md-12">
                <p>Title</p>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                 <select id="Short by" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" .required="">-->
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
           <!--    <div class="col-md-12">-->
           <!--   <div class="input-group">-->
           <!--       <span class="input-group-addon"><i class="fas fa-envelope-square"  aria-hidden="true"></i></span>-->
           <!--       <input class="form-control" type="text"  name="subject" placeholder="Subject">-->
                  
           <!--                           </div>-->
           <!--</div>-->
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
        </form>
        </div>
      </div>
    </div>
    <!--send sms end-->
  </div>


    <script>
function scrollWin() {
  window.scrollTo(10, 10);
}

</script>
<script>
//     function isCheckedById(id) {
//     alert(id);
//     var checked = $("input[@id=" + id + "]:checked").length;
//     alert(checked);

//     if (checked == 0) {
//         return false;
//     } else {
//         return true;
//     }
// }
</script>


<script>
  document.addEventListener('DOMContentLoaded', function(event){
  document.querySelectorAll('input[type="submit"]').forEach(e =>{ 
    
      e.addEventListener('click', function() {
          setTimeout(()=>{ 
          e.setAttribute('disabled', true  )
          },100)
              
          })
    
     })
  })
    
</script>


<!--send mail change according to mail khem-->
 <script>

// var sub =  document.querySelector('#sendEmail');
// sub.onclick = function(){
//   var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
//   if(len>0){
//     var sub_array = [];
//     for(var i=0; i<len; i++){
//       sub_array.push(document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked')[i].value);
//   }
   
//     $('#popo').val(sub_array);
// document.getElementById('#send_mail_form').submit();
// // return false;
//   }else{
//     alert("Please select CheckBox");
//     return false;
//   }
// }


// </script>
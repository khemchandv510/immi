@extends('header')
@section('enquiry-list')
 

<script>
  
  </script>
  

</div>
@include('enquiry.enquiry-modal') 

<style>
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
   top: 30%;
    /* transform: translate(0,-50%);
    width:500px !important;  */
}


.callbacklater{
  text-align: center;
    background: #e3e0e0;
    width: 100%;
    margin: -1px;
    padding: 9px;
    color: #2b6699;
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
</style>

      <!-- Begin Page Content -->
      <div class="container-fluid" style="padding:0">
        <div class="container-fluid "  style="padding:0">
       
          <div class="row list-page-top-link" >
             
            <div class="col-md-12"> 
                {{-- {{ Form::open(array('url'=>'get-all-list' )) }}
              {{ Form::submit('submit', array('class'=>'form-control bta btn-danger', )) }} 
            {{Form::close()}} --}}
            {{-- @if( Auth::user()->usertype_status =='1') --}}
              
              {{-- <button type="button" class="" >
                <i class="fa fa-cloud-uploa" aria-hidden="true"></i>  --}}
              
                <a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_client">Add Client  </a>
              {{-- </button> --}}
            <?php 
             if( Auth::user()->usertype_status =='1'){
            $trash = DB::table('enquiries')->where('delete_client','0')->get();
             ?>
            
            <a href={{ url('get-all-trash-clients') }}> {{$trash->count()}} Trashed   </a>
             <?php } ?>


            <a href={{ url('get-all-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}>  Get All  </a>
            <?php 
            if( Auth::user()->usertype_status =='1'){
              ?>
            <a href={{ url('asign-client-list') }}>  Asigned Client  </a>

         

            <?php } ?>
           {{-- @endif --}}
          {{-- <a href={{ url('new-user') }}>  Add Clients  </a> --}}
           
           
             <a  data-toggle="modal" data-target="#import_client" href =""  aria-hidden="true" style="color:#fff"></i> Import Client
             </a>
             
             <span  class="priority-list-ul "> Priority List
<div class="hide-priority-list-ul">
       <a href={{ url('priority-list/1') }} value="1">   High  </a> 
       <a href={{ url('priority-list/2') }} value="2">   Medium  </a> 
       <a href={{ url('priority-list/3') }} value="3">   Low  </a> 
      </div>
             </span>
             {{-- <a href={{ url('priority-list') }}>  Priority List  </a> --}}
             
          </div>    
            
          </div> 
<hr>
            <div class="row">
            {{-- <div class="col-md-2"> {{  Form::date('date',null, array('class' => 'form-control'))  }} </div>
            <div class="col-md-2"> {{  Form::text('date',null, array('class' => 'form-control'))  }} </div> --}}
            <div class="col-md-10  ">
                {{ Form::open(array('url'=>'search', 'class' => 'enquiry-list-filter' )) }}
            {{-- <label for="From">  From  </label>             --}}
                {{  Form::text('filter_date_from',null, array('class' => 'form-control date'))  }}
                {{-- <label for="to"> To </label> --}}
                {{  Form::text('filter_date_to',null, array('class' => 'form-control date' ))  }} 
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
<?php
 $enq_status  = DB::table('enq_status')->get();
// dd($enq_status);
?>
<select  class="form-control" name="status">
    <option selected disabled> Status </option>
    @foreach($enq_status as $status )

<option value="{{$status->status}}">{{$status->status}}</option>
{{-- <option value="Payment Done">Payment Done</option> --}}
  @endforeach

  {{-- <option value="Call Back Letter"> Call Back Letter </option>
  <option value="DND"> DND </option>
  <option value="Pending"> Pending </option>
  <option value="Call Not Picked">Call Not Picked</option>
  <option value="Positive"> Positive </option>
  <option value="Follow Up"> Follow Up </option>
  <option value="Not Intrested"> Not Intrested </option>
<option value="undefined">undefined</option> --}}
</select>

<?php  $enq_purposes = DB::table('enq_purposes')->get(); ?>
<select class="form-control" name="purpose_of_query">

    <option selected disabled> Purpose </option>
    @foreach($enq_purposes as $pur)
<option value="{{ $pur->purpose}}">  {{ $pur->purpose}} </option>
    @endforeach
    
    {{-- <option>IELTS</option>
    <option>PTE</option>
    <option>OET</option>
    <option>PTE</option>
    <option>PR</option>
    <option>Immigration</option>
    <option>Work Visa</option> --}}
    {{-- <option>Student Visa</option> --}}
  </select>


              {{  Form::text('search',null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }} </div>
          <div class="col-md-2 submit-button">  {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
              {{ Form::reset('Reset', array('class'=>'btn btn-danger w-10', )) }}
{{Form::close()}}
</div> 
</div>
<hr>
    <div class="container-fluid my-3">
      <div class="row">
      
          <div class="form-group col-sm-3">
              {{Form::open(array('url' => 'range-filter', 'id' => 'filter_form'))}}
        <label for="range_filter">Per Page</label>
        {{Form::hidden('id', Auth::user()->employee_id)}}
        <select name="range_filter" id="range_filter" class="form-control " >
          <option disabled selected>--Select--</option>
          @for($i=10; $i<=100; $i+=10)
        <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select>
        <input type="submit" name="filter_button" value="Submit" class="btn btn-danger w-10" id="filter_button">
        {{Form::close()}}
      </div>
     


      </div>
    <div class="row">
      <div id="aaa">
        <table></table>
      </div>
           <table class="  display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
              <thead class="k0listenqury">
              <tr>
                
                
                <th></th>
                <th > No </a> </th>
                <th>Source</th>
                {{-- <th>Client Id</th> --}}
               
                <th style="cursor:pointer;">  Date</th>
                  <th>Name</th>
                  
                  {{-- <th>Email Id </th> --}}
                  <th>Contact no </th>
                  <th style="width:300px">  Comment</th>
                  <th>Agent Name </th> 
                
                  <th> Status </th>
                  <th> Purpose </th>
                
                  <?php 
             if( Auth::user()->usertype_status =='1'){
            
             ?> 
                  <th> Assign </th>
             <?php } ?>
                  {{-- <th> Enrol </th> --}}
                   <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($search))
                @foreach($search as $s)
                <tr>
                  
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
                     <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#2f2fc8;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$s->id}}   <span class="fas fa-fla"></span>   </p>
                     @elseif($s->set_priority == 3)
                     <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#196919;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$s->id}}   <span class="fas fa-fla"></span>   </p>
                      @else
                      <p onclick="return confirm('Are you sure you want to Set Priority?')">
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
                    <td class="client-name"> <a href={{url('enquiry/get-detail/'.$s->unique_id)}}>  {{$s->name}} </a>  </td>
                    
                      {{-- <td>{{$s->email}}</td> --}}
                      <td>{{$s->contact}}</td>


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
                        
                        
                        <button id="myBtn" class="add_comment add_comment22" old-comment ={{$s->unique_id}}  data-id={{$s->unique_id}} >More...</button> 
                      </td>


                      <td> {{$s->agent_name}} </td>
                      <td class="getdate">

                        {{-- <select name="" id="unique_id" class="form-control  update_status" onChange="update_status(this.value);"> --}}
                       
                          <select name="status_chang" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$s->unique_id}} >

                          <option  selected  value="{{$s->disposition}}" > {{$s->disposition}} </option>
                          @foreach($enq_status as $status)
                          <option value="{{$status->status}}"> {{$status->status}} </option>
                         @endforeach
                         
                          </select>
                        </td>

                      <td> {{$s->purpose_of_query}} </td>
                      

                     


                      <?php 
                      if( Auth::user()->usertype_status =='1'){
                        ?>
                     
                     <td class="asign-client">   
                         <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$s->unique_id}} > </a>  
                     </td> 
                      <?php } ?>
                      {{-- <td> <a href="{{url('client-enrolmen/'.$s->unique_id)}}"> Enroll</a>  </td> --}}
                      


                     
                        


                      <td>  <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$s->unique_id}} ></a>   <a href={{'enquiry/get-detail/'.$s->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>
                      </a></td>
                </tr>
                @endforeach
                @endif
                @if(!empty($priority))
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
                 <p   style="color:#a33535;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p> 

                 @elseif($get2->set_priority == 2)
                 <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#2f2fc8;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                 @elseif($get2->set_priority == 3)
                 <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#196919;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
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

                    <td class="client-name">   <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>   {{$get2->name}} </a> </td>
                  
                    {{-- <td>{{$get2->email}}</td> --}}
                    <td>{{$get2->contact}}</td>

                    <td class= " comment-popup fa fa-commen" class="myModal2 add_comment"> 
                      
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
                      
                      
                      <button id="myBtn" class="add_comment add_comment22"  data-id={{$get2->unique_id}} >More...</button>  </td> 


                    <td>{{$get2->agent_name}}</td>
                    <td class="aa">
                        {{-- {{ Form::text('unique_id', $get2->unique_id, array( 'id'  => 'a'.$get2->unique_id ) ) }} --}}
                        
                      <select name="" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get2->unique_id}} >
                          <option  selected value="{{$get2->disposition}}" disabled> {{$get2->disposition}} </option>
                          @foreach($enq_status as $status)
                          <option value="{{$status->status}}"> {{$status->status}} </option>
                         @endforeach
                    </select>
                    {{-- <input type="text" class="ppp" style="display:none" data-id="{{$get2->unique_id}}"> --}}
                    </td>
                    <td> {{$get2->purpose_of_query}} </td>

                   
                    
                    <?php 
                    if( Auth::user()->usertype_status =='1'){
                      ?>
                    <td class="asign-client">   
                        <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$get2->unique_id}} ></a>  
                    </td> 
                  <?php } ?>
                    {{-- <td> <a href="{{url('client-enrolment/'.$get2->unique_id)}}"> Enroll</a>  </td> --}}
                    <td>  <a href="javascript:void(0);" class="fa fa-trash  delete"   data-id={{$get2->unique_id}} ></a>  <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}><i class="fa fa-edit" aria-hidden="true"></i>
                    </a></td>
                  </tr>
                @endforeach
                @else 
                  @if(!empty($get))  {{-- this is come form enquirycontroller getalllist--}}


                  @foreach($get as $get2)
                    <tr>
                  
                    
                    <td class="{{$get2->device}} desk-top" style="border: none !important"></td>






                    
                    <td   data-id={{$get2->unique_id}}  class=" set-priority-hover"> 



                      @if($get2->set_priority == 1)
                   <p   style="color:#a33535;width: 49px;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p> 

                   @elseif($get2->set_priority == 2)
                   <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#2f2fc8;width: 49px;"> <span class="fa fa-check "></span>{{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
                   @elseif($get2->set_priority == 3)
                   <p onclick="return confirm('Are you sure you want to Unset Priority?')"  style="color:#196919;width: 49px;"> <span class="fa fa-check "></span> {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p>
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




                    
                    <td>{{$get2->source}}</td>
                        {{-- <td>
                            <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}> {{$get2->unique_id}} </a>
                        </td> --}}

                        <?php $date  = $get2->date ?>

                       <?php  $time = strtotime($date)  ?>
                        
                       

                        <td> {{$a = date('d-m-Y', $time)}}</td>

                      <td class="client-name">   <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>   {{$get2->name}} </a> </td>
                    
                      {{-- <td>{{$get2->email}}</td> --}}
                      <td class="mob-no">
                       <p> {{$get2->contact}}</p>
                      <p> {{$get2->alternate_contact}} </p>

                      </td>

                      <td class= " comment-popup fa fa-commen" class="myModal2 add_comment">
                        <p class="last-comment-p-tag">
        <?php                  
$get_last_comment = DB::table('enq_comments')
->select(DB::raw('comment,MAX(id) as a'))
->groupBy('comment','id')
->where('client_enquiry_id',$get2->unique_id)
->orderBy('id','DESC')
->get();
?>
@if(!empty($get_last_comment[0]->comment))
{{$get_last_comment[0]->comment}}
@endif
</p>

                        <button id="myBtn" class="add_comment add_comment22"  data-id={{$get2->unique_id}} >More...</button>  </td> 


                      <td>{{$get2->agent_name}}</td>
                      <td class="aa">
                          {{-- {{ Form::text('unique_id', $get2->unique_id, array( 'id'  => 'a'.$get2->unique_id ) ) }} --}}
                          
                        <select name="" id="update_statu" class="form-control  update_status" onChane="update_status(this.value);"  data-id={{$get2->unique_id}} >
                            <option  selected value="{{$get2->disposition}}" disabled> {{$get2->disposition}} </option>
                            @foreach($enq_status as $status)
                            <option value="{{$status->status}}"> {{$status->status}} </option>
                           @endforeach
                      </select>
                      {{-- <input type="text" class="ppp" style="display:none" data-id="{{$get2->unique_id}}"> --}}
                      </td>
                      <td> {{$get2->purpose_of_query}} </td>

                     
                      
                      <?php 
                      if( Auth::user()->usertype_status =='1'){
                        ?>
                      <td class="asign-client">   
                          <a href="javascript:void(0);" class="fa fa-tasks  "   data-id={{$get2->unique_id}} >
                            
                          </a>  
                      </td> 
                    <?php } ?>
                      {{-- <td> <a href="{{url('client-enrolment/'.$get2->unique_id)}}"> Enroll</a>  </td> --}}
                      <td>  
                        <a href="javascript:void(0);" class="fa fa-trash  delete"   data-id={{$get2->unique_id}} ></a> 
                         <a href="{{url('enquiry/get-detail/'.$get2->unique_id)}}"  class="fa fa-edit" >
                        
                        {{-- <i class="fa fa-external-link-alt" aria-hidden="true"></i> --}}
                      </a></td>
                    </tr>
                   
                    @endforeach
                    
                    @endif
                    @if(!empty($new_user))
                    @foreach($new_user as $get)
                      <tr>
                      <td>{{ $get->unique_id }}</td>
                      <td>{{ $get->date }}  </td>
                      <td> {{ $get->name }} </td>
                      {{-- <td>{{ $get->email }}</td> --}}
                      <td>{{ $get->phone }}</td>
                      <td><a href={{'enquiry/get-detail/'.$get->unique_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>
    

                      </a></td>
                      </tr>
                    @endforeach
                  <tr><td colspan="14" style="hover:background:red">  {{ $get->links() }} </td></tr>
                    @endif
                    @if(empty($get))



                    {{-- <tr><td>Record Not Found</td></tr> --}}

                    @endif
                    @endif
                  </tbody>
              </table>


               


              </div>
            </div>
    </div>
        <!-- /.container-fluid -->
       
      </div>
      <!-- End of Main Content -->   


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

            document.getElementById('old_coment2').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
            // document.getElementById('old_coment').innerHTML+='<p class="old-cmment-date-class">'+json_response[i].date+'</p>';
            }
          }
          document.getElementById('old_coment2').innerHTML+='</ul>'     
                  }
    });
  }
    );
  });






       
  $(document).ready(function(){
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
  
  modal.style.display = "block";
  $('#callbackdate').show();
  $('#callbacktime').show();
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure you want to update this?')) {
    $.ajax({
    type: "POST",
    url: "{{url('update_status')}}?id="+val+"&a="+unique_id,
    
    success: function(data){
    // alert('Update Successfully ');  
                        // $.each(data, function(key, value) {
                            $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
                        // });
        }
    });

    }
    else{
     window.location.href='';
    }
  }


else{

  modal.style.display = "block";
  $('#callbackdate').hide();
  $('#callbacktime').hide();
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
if (confirm('Are you sure you want to update this?')) {
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
     window.location.href='';
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
    url: "{{url('add-priority')}}?a="+unique_id+"&val="+val,
    
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
                            var comment = $('#comment').val();
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url('callbacklater')}}?a="+unique_id+"&comment="+comment+"&val="+val;
              //  form.find(":submit").val("Please wait...");
              //  form.find(":submit").attr('disabled', true);
             
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
            
            // var d = data.trim();
            
                // $("#resultdata").html('<b style="color: green">Updated Successfully</b>');
                modal.style.display = "none";
                
                alert('Update Successfully');
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











$(document).ready(function(){
  $(".add_comment22").on("click", function(){

    
    var ppppp = $(this).attr("data-id");
    
    modal2.style.display = "block";
   

                          $("#fom2").submit(function (e) {
                            var comment = $('#comment2').val();
                 e.preventDefault();
              var form = $(this); 
                let url = "{{url('callbacklater')}}?a="+ppppp+"&comment="+comment;
                console.log(url);
             
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             
                        var   currentRequest  =   jQuery.ajax({
      type: "get",
        url: url,
        // dataType: "text",
        // data: new FormData( this ),
        // processData: false, 
        // contentType: false, 
       
        success: function (data) {
          // alert(data);
                 modal2.style.display = "none";
                 
                    // alert('Update Successfully');
                    location.reload();
                   } 
          });
   
   }
    );
  
  });
  // $('.close2').on('click',function(){
  //    $(ghjg).abort();
  //  });
  // xhr.abort();
}); 
</script> 
<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal" style="padding-top:0;">

  <!-- Modal content -->
  <div class="modal-content">
    
    
    <h5 class="callbacklater">Add Comment  </h5>
    <span class="close" style="top: 0px;
    right: 10px;"id="comment_close">&times;</span>
    <hr style="margin:0;">
    <div class="modal-body">
        <p id="old_coment2"> </p>
    @if(!empty($get))
    {{-- @dd($get) --}}
    <?php $data_id = $get?>
    @elseif(!empty($search))
    <?php $data_id  = $search ?>
    @else 
    <?php $data_id  = $priority ?>
    @endif
    @if(($data_id->count()  > 0)) 
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
      right: 0;">&times;</span>
      <h5 class="callbacklater">Add Comment </h5>
        </div>

        <div class="modal-body">

      @if(($data_id->count()  > 0))
      {{-- @if(!empty($data_id['comment'])) --}}
  <p id="old_coment"> </p>
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
    location.reload();
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
<div id="asign_client" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
      <span class="asign-client-close" style="position: absolute;
      right: 0;
      top: 0;">&times;</span>
      
      <h5 class="callbacklater">Asign Client </h5>
      <hr>
        </div>
        <div class="modal-body">
      <?php 
                      if( Auth::user()->usertype_status =='1'){
                        ?>
      {{Form::open(array('url'=>"asign-client" , 'id' => 'asign_client_form', 'class' => 'form'))}}
         <div class="comment-section">
  <?php
  $agent  = DB::table('users')->where('status',1)->get();
  ?>
  <select name="asign_client" id="asign_client_value" class="form-control">
    <option disabled selected> --Agent-- </option>
    @foreach($agent as $a)
  <option value="{{$a->unique_id}}">{{$a->name}}</option>
    @endforeach
  </select>
    <input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
      </div>
      <div style="text-align: center">
  {{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}}
</div>
  {{Form::close()}}
  <hr>
  
    <?php } ?>
  
    </div>
  </div>
  </div>
  <!-- end of asign agent Modal -->
   

<script>

var asign_client = document.getElementById("asign_client");
  var span2 = document.getElementsByClassName("asign-client-close")[0];
  span2.onclick = function() {
    asign_client.style.display = "none";
    location.reload();
  }
  // if (event.target == asign_client) {
  //   agent_create.style.display = "none";
	//   }


$(document).ready(function(){
  $(".asign-client a").on("click", function(){
    var unique_id = $(this).attr("data-id");
    
    asign_client.style.display = "block";
   
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
          asign_client.style.display = "none";
                    // alert('Update Successfully');
                    location.reload();
                  
            }
    });
  }
    );
  });
  });
});



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
                               ducimus!
                    
                    
                                 
                              @if(Session::has('message'))
                              <p >{{ Session::get('message') }}</p>
                              @endif
                              
                    
                              <form method='post' action={{url('import-client')}} enctype='multipart/form-data' >
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

            document.getElementById('old_coment').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
            // document.getElementById('old_coment').innerHTML+='<p class="old-cmment-date-class">'+json_response[i].date+'</p>';
            }
          }
          document.getElementById('old_coment').innerHTML+='</ul>'

          

                        
                  }
    });
  }
    );
  });

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



@endsection

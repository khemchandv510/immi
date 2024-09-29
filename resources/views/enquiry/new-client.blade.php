@extends('header')
@section('new-client')

</div>
{{-- @include('enquiry.enquiry-modal')  --}}

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
</style>


<div class="row">
      
           <table class="  display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
              <thead class="k0listenqury">
              <tr>
                
                
                <th></th>
                <th > No </a> </th>
                <th>Source</th>
              
               
                <th style="cursor:pointer;">  Date</th>
                  <th>Name</th>
                  
              
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
                
                @if((isset($search) && $search->count() >0))
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
                      <a href={{url('enquiry/get-detail/'.$s->unique_id)}}>  {{$s->name}} </a>  
                    @else
                    <a href="#">  {{$s->name}} </a>  
                    @endif
                    </td>
                    
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
                 <p   style="color:#a33535;"> <span class="fa fa-check "></span>  {{'IC'.$get2->id}}   <span class="fas fa-fla"></span>   </p> 

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
                      <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>  {{$get2->name}} </a>  
                    @else
                    <a href="#">  {{$get2->name}} </a>  
                    @endif
                    
                    
                    </td>
                  
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
                    <td>  <a href="javascript:void(0);" class="fa fa-trash  delete"   data-id={{$get2->unique_id}} ></a>
                  @if( Auth::user()->usertype_status =='1')
                      <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}><i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                  @else
                  <a href="#"><i class="fa fa-edit" aria-hidden="true"></i>
                  </a>
                  @endif
                  </td>
                  </tr>
                @endforeach
                
                @elseif(isset($get) && $get->count() > 0)  {{-- this is come form enquirycontroller getalllist--}}
                

                  @foreach($get as $get2)
                  
                  <tr>
                  
                    
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
                        
                       

                        <td> {{$a = date('d-m-Y', $time)}}</td>

                      <td class="client-name"> 
                          {{-- <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>   {{$get2->name}} </a>  --}}
                        
                        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2 || Auth::user()->usertype_status == 3)  
                          <a href={{url('enquiry/get-detail/'.$get2->unique_id)}}>  {{$get2->name}} </a>  
                        @else
                        <a href="#">  {{$get2->name}} </a>  
                        @endif
                        
                        </td>
                    
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
                    @if( Auth::user()->usertype_status =='1')
                        <a href="{{url('enquiry/get-detail/'.$get2->unique_id)}}"  class="fa fa-edit" >
                        
                        {{-- <i class="fa fa-external-link-alt" aria-hidden="true"></i> --}}
                      </a>
                      @else
                      <a href="#"  class="fa fa-edit" ></a>
                    @endif
                    </td>
                    </tr>
                   
                    @endforeach
                    @else
                    <tr><td colspan="12"><img src="{{url('public/uploads/NoRecordFound.png')}}" alt="" style="width:400px;height:400px"></td></tr>
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
  {{-- <tr><td colspan="14" style="hover:background:red"> 
    </td></tr> --}}
                    {{-- @endif --}}
                    @if(isset($value))
                    <tr><td colspan="14" style="hover:background:red">
                      
     {{ $get->appends(['range_filter'=>$value ])->links() }} 
    </td></tr>
    @elseif(isset($get))
    <tr><td colspan="14" style="hover:background:red">
    {{ $get->appends(['range_filter'=>$get ])->links() }} 
  </td></tr>
     @endif
                    {{-- @if(empty($get)) --}}



                    {{-- <tr><td>Record Not Found</td></tr> --}}

                    {{-- @endif --}}
                    
                  </tbody>
              </table>


               


              </div>
@endsection

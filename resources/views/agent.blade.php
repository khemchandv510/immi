@extends('header')
@section('agent')
</div>
<?php

//  $users = new users;
//             $users->where('unique_id',Auth::user()->unique_id)->update([
//                 'login_trace' => 1
//             ]);

// if(Auth::user()->usertype_status == 1){
//  $users =  DB::table('users')->where('status','1')->get(); 
// }
// elseif(Auth::user()->usertype_status == 5){
//     $user_id = Auth::user()->uniuqe_id;
//     dd($user_id);
//     $users =  DB::table('users')
//     ->where('status','1')
//     ->where('company_id','=', "5151")
//     ->get(); 
// }
// dd($users,Auth::user()->usertype_status );

 ?>
<div class="container-fluid agent-profile">
    <div class="row ">
        @if(isset($users))
            @foreach($users as $agent)
    <a href={{url(Request::segment(1).'/'.'employee-detail/'.$agent->employee_id)}}>
        <div class="mt-3   col-sm-6 col-md-4 col-lg-3">
            <div class="border">
                <div class="title-section">
                    <p class="name"> Id: {{$agent->employee_id}}</p>
                    {{-- @if(Auth::user->emp) --}}
                    @if($agent->login_trace == 1)
                    <p class="login" style="background:green"></p>
@else
<p class="login" style="background:red"> </p>
@endif
                    {{-- <p  data-id= {{$agent->employee_id}}> --}}
                        <a  class="fas fa-external-link-alt update-agent-profil" href="{{url(Request::segment(1).'/'.'update-agent-profile/'.$agent->employee_id)}}"> </a> 
                    {{-- </p> --}}
                    <p class="delete_agent fas fa-trash"  data-id={{$agent->employee_id}} > </p>
                    
                </div>
                <div class="profile-image">
                <img src="{{url('public/uploads/image/agent/'.$agent->image)}}" alt="">
                </div>
                <div class="name-below"> <strong>  {{$agent->name}} </strong> </div>
                <div class="bottom-section">
                    <p>contact: {{$agent->number}}</p>
                    <p>Email:   {{$agent->email}}</p>
                </div>
            </div>
        </div>
    </a>
        @endforeach
        @endif
    </div>
</div>






  

<script>
$(document).ready(function(){
    $('.update-agent-prfile').on('click', function(){
        unique_id = $(this).attr("data-id");
        $.ajaxSetup({
                headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });

                         $.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'update-agent-profile')}}?a="+unique_id,

success: function(data){
    $('#agent_updat').show();
    $('#update_agent_data').empty();
    $.each(data, function(key, value) {
        
    });
// location.reload();
            }
});    

    });
});
</script>


<!-- start Agent update  modal-->

<?php
if(!empty($id)){
$up =  DB::table('users')->where('status',1)->where('employee_id', $id)->get();



 ?>
<div id="agent_update" class="modal" style="display:block;">

    <!-- Modal content -->
    <div class="modal-content create-agent-profile">
        
      <span class="agent_update_close" ><a href="{{url('existing-agent')}}">   &times; </a> </span>
      <h5 class="callbacklater"> Edit Employee</h5>
     
      {{Form::open(array('url'=>"update-agent" ,'files'=>'true', 'id' => 'update_agent_form', 'class' => 'form'))}}
      {{Form::hidden('id',$up[0]->employee_id)}} 
     {{Form::text('name',$up[0]->name,array('class'=>'form-control','placeholder'=>'Name'))}}
     {{Form::number('contact',$up[0]->number,array('class'=>'form-control','placeholder'=>'Mobile'))}}
    {{Form::date('dob',null,array('class'=>'form-control','placeholder'=>'Date Of Birth'))}}
 {{Form::text('email',$up[0]->email,array('class'=>'form-control','placeholder'=>'Email'))}}
 <?php echo ($errors->first('email',"<li class='custom-error'>:message</li> 
 <script> agent_create.style.display = 'block';</script>"))
 ?>
 {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
 {{-- {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>'Confirm Password'))}} --}}
 {{Form::text('country',$up[0]->country,array('class'=>'form-control','placeholder'=>'Country'))}} 
 {{Form::text('state',$up[0]->state,array('class'=>'form-control','placeholder'=>'State'))}} 
 {{Form::text('city',$up[0]->city,array('class'=>'form-control','placeholder'=>'City'))}} 
 {{Form::text('street',$up[0]->street,array('class'=>'form-control','placeholder'=>'Street'))}}
 {{Form::text('pin',$up[0]->pin,array('class'=>'form-control','placeholder'=>'Pin Code'))}}
 {{Form::file('image', array('class'=>'form-control'))}}
 
  {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3'))}}
  {{Form::close()}}
    </div>
  </div>
  <script>
  
 var agent_update = document.getElementById("agent_update");
// var update_agent_button = document.getElementById("update_agent_button");
var agent_update_close = document.getElementsByClassName("agent_update_close")[0];
// create_agent_button.onclick = function() {
// 	agent_update.style.display = "block";
// }
agent_update_close.onclick = function() {
    window.history.back();
}

  </script>
<?php } ?>
  
  <!-- end of Agent Update  Modal -->


<script>
    $(document).ready(function(){
$(".delete_agent").on("click", function(){
     unique_id = $(this).attr("data-id");
    // var val = $(this).val();
$.ajaxSetup({
                            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });

if (confirm('Are you sure you want to Delete this?')) {
$.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'delete_agent')}}?a="+unique_id,

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
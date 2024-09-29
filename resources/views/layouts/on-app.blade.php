
<?php 
use App\users;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts --> 
     
    <script src="{{ asset('public/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>

  <script src="{{ asset('public/js/app.js') }}"></script>
    <div id="app" style="max-width:10">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                    {{-- <img src="public/images/logo.png" alt="" style="width:50px"> &nbsp;
                    {{ config('app.nam', 'Immigration') }}  --}}
                {{-- </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                </li>
                            @endif
                        @else
                        <div  class="top-menu-class">
                          <ul>
                            <li><a href="{{url('home')}}">Home</a></li>
                           


                            @if( Auth::user()->usertype_status =='1')
                            <li class="dropdown-button-li"  >
                                <a href="javascript:void(0)" class="dropbtn">Admin</a>
                                  <i class="fas fa-fw fa-tachometer-alt"></i>
                                  <div class="dropdown-content reg-form "  id="reg_form">
                                    <a class="nav-link2" href="{{ url('ip-address')}}"  id="" >IP Address    </a> 
                                    {{-- <a class="nav-link2" href="{{ url('existing-agent')}}" > Existing Agent    </a>  --}}
                                  </div>
                              
                              
                            </li>
                            <li class="dropdown-button-li">
                                <a href="{{ url('knowledgebase')}}" class="dropbtn" > Knowledge Base </a>
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <div class="dropdown-content reg-form " >
                                
                          {{-- <a class="nav-link2" href="{{ url('knowledgebase')}}" >  Knowledge base    </a>
                                  
                                <a class="nav-link2" href="{{ url('add-knowledgebase')}}" >  Add Knowledge base    </a> 
                                  <a class="nav-link2" href="#"  id="" >Add New Category    </a>  --}}
                                  {{-- <a class="nav-link2" href="{{url('attendance')}}"  id="" >  Attendaance    </a>  --}}
                                </div>
                              </li>

@endif
 
{{-- hr menu --}}
@if( Auth::user()->usertype_status =='1' ||  Auth::user()->usertype_status =='2' )
<li class="dropdown-button-li">
  <a href="javascript:void(0)" class="dropbtn">Hr </a>
  <i class="fas fa-fw fa-tachometer-alt"></i>
  <div class="dropdown-content reg-form " >
    
    <a class="nav-link2" href="{{ url('existing-agent')}}" >  Employee    </a> 
    <a class="nav-link2" href="#"  id="create_agent_button" >Add Employee    </a> 
    <a class="nav-link2" href="{{url('attendance')}}"  id="" >  Attendaance    </a> 
    <a class="nav-link2" href="{{url('payroll')}}"  id="" >  Payroll    </a> 
    <a class="nav-link2" href="{{url('recruitment')}}"> Recruitment </a>
  </div>
</li>
@endif
{{-- end hr menu --}}

                            <li class="dropdown-button-li">
                                <a href="{{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}" class="dropbtn">Clients</a>
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <div class="dropdown-content reg-form "  id="">
                                    {{-- <a class="nav-link2" href="{{ url('new-user') }}" > Add New    </a>  --}}
                                    {{-- <a class="nav-link2" href="{{ url('enquiry-table') }}"> Add New By Tablet    </a>  --}}
                                  {{-- <a class="" href={{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}>Clients List</a> --}}
                                </div>

                         
                            </li>
                           

                            <li class="dropdown-button-li">
                              <a href="javascript:void(0)" class="dropbtn">Education</a>
                              <div class="dropdown-content reg-form ">
                                
                                <a class="nav-link2" href="{{url('education/dashboard')}}">Institution</a>

    <a class="nav-link2" href="{{url('education/enrolments')}}">Enrolments</a>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <style>
                        
.top-menu-class  .dropdown-button-li:hover   .dropdown-content{
                            display: inline-grid;

                          }
                      
.top-menu-class    .dropdown-content a{
                            color:#000;
                            padding: 4px;
                          }

              

                        </style>




                  
<div id=time-notification-parent>
    <?php 
     date_default_timezone_set("Asia/Kolkata");
  if( Auth::user()->employee_id =='Emp_2266'){
                   $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->where('time_notification_status',1)->get(); 
                   
  }
                    else{
             $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->where('agent_id', Auth::user()->employee_id)->where('time_notification_status',1)->get() ; 
                    
            }
            
                          if($enq_comments->count() > 0){
                          
    foreach($enq_comments as $get2){
      
      // dd(  date('H:i'),  $get2->callbacklater_time );
    if( date('H:i') >= $get2->callbacklater_time ){
  
    ?>
    {{-- @dd($enq_comments); --}}
  
  <div class="time-notification">
      <span class="close-time-notification" data-id = "<?php echo $get2->client_enquiry_id ?>" >X</span>
    
    <p >Name: <?php echo $get2->name ?></p>
    <p >Calling Time: {{$get2->callbacklater_time}}</p>
    <p >Comments: {{$get2->comment}}</p></div>
  <?php
    }
    else{
  ?>
                                {{-- <span>data greater then time</span> --}}
                                      <?php
    }
  }}
  ?>
  </div>

  









                        <li> <input type="button" value="Pause" class="aaa" id="pause" onclick="play();" style="background:red">
                        {{-- <p>Login Hours: 07:50</p> --}}
                        </li>
                        <li> <input type="button" value="Work" class="stop" id="play"  onclick="pause();" style="display:none;background:green">  </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-bell fa-fw"></i>

                      
                                  







                                  




                                  <!-- Counter - Alerts -->
                                  @if( Auth::user()->employee_id =='Emp_2266')
                  <?php $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->get(); ?>                @else
         <?php    $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->where('agent_id', Auth::user()->employee_id)->get() ;  ?>  
         @endif                       
                                  @if(!empty($enq_comments))
                                   <?php $a = 0 ?>
                                  @foreach($enq_comments as $get2)
                                  
                               



                                  {{-- @if($get2->calling_date == date("Y-m-d")) --}}
                                <?php $a++ ?>
                                {{-- @endif --}}
                                @endforeach
                                @endif
                                <span class="badge badge-danger badge-counter"> {{$a}}+</span>
                               
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                  <h6 class="dropdown-header">
                                    Notification Center
                                  </h6>
                                  @if(!empty($enq_comments))
                                  @foreach($enq_comments as $get2)
                              


    <a class="dropdown-item d-flex align-items-center" href={{url('enquiry/get-detail\\').$get2->client_enquiry_id}}>
                                    <div class="mr-3">
                                      <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                      </div>
                                    </div>
                                    <div > 
                                         
                                      <span class="font-weight-bold">  {{$get2->name}} </span>
                                      <br>
                                      <span class="font-weight-bold">   {{$get2->contact}} Time:- {{$get2->callbacklater_time}}  </span>
                                      <div class="small text-gray-500">{{$get2->comment}}</div>
                                      
                                    </div>
                                  </a>
                                  @endforeach  
                                  
                                  @endif
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                      {{-- <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                      </div> --}}
                                    </div>
                                    <div>
                                      {{-- <div class="small text-gray-500">December 7, 2019</div>
                                      $290.29 has been deposited into your account! --}}
                                    </div>
                                  </a>
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                      {{-- <div class="icon-circle bg-warning"> --}}
                                        {{-- <i class="fas fa-exclamation-triangle text-white"></i> --}}
                                      {{-- </div> --}}
                                    </div>
                                    <div>
                                      {{-- <div class="small text-gray-500">December 2, 2019</div>
                                      Spending Alert: We've noticed unusually high spending for your account. --}}
                                    </div>
                                  </a>
                                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                              </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a id = "" class="dropdown-item" href="{{url('profile')}}">
                                    Profile
                                    
                                 </a> 
                                  
                                  <a  id = "aaa" class="dropdown-item aaa" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

 


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    <input type="hidden" id="trace" value="{{Auth::user()->employee_id}}">

       
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  
  
                </div>
            </div>
            
        </nav>

        {{-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>    --}}
 
        <script>
          
          $(document).ready(function (){
             $('.aaa').click(function(e){
                var trace  = $('#trace').val();
              $.ajaxSetup({
                                    headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                 });        
            $.ajax({
            type: "post",
            url: "{{url('trace_login')}}?a="+trace,
        
            success: function(data){
              
                        }
            });
            })
          })
          </script>
<script>
   $(document).ready(function (){
                      $('.stop').click(function(e){
                var trace  = $('#trace').val();
              $.ajaxSetup({
                                    headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                 });        
            $.ajax({
            type: "get",
            url: "{{url('pause_login')}}?a="+trace,
        
            success: function(data){
              
                        }
            });
            })
          })
</script>
<script>
  var timeout;
  document.onmousemove = function(){
  clearTimeout(timeout);
    timeout = setTimeout(function(){
      // alert('fg');
        var trace  = $('#trace').val();
              $.ajaxSetup({
                                    headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                                 });        
                                 $.ajax({
            type: "post",
            url: "{{url('trace_login')}}?a="+trace,
        
            success: function(data){

              document.getElementById('play').style.setProperty('display','block','important');
	document.getElementById('pause').style.setProperty('display','none','important');
                        }
            });
    }, 1000*60*10);
  }
  </script> 

<p id="get_data"></p>
        <main class=""   style="   background-image:url('http://localhost/imm/imm/public\uploads\image\world-travel.jpg')">
            @yield('content')
        </main>
    </div>
    {{-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>   
    <script>
        jQuery(document).ready(function(){
            $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
     $.ajax({
    type: "get",
    url: "{{url('get-notifcation')}}",
    success: function(data){
    if(data){
alert(data);
    }
}
 });
            
        });
    </script> --}}



<!-- start Agent Create  modal-->
<div id="agent_create" class="modal modal-top-0">

    <!-- Modal content -->
    <div class="modal-content create-agent-profile">
         <span class="close3">     &times;</span> 
      
      <h5 class="callbacklater"> Add Employee </h5>
     
      {{Form::open(array('url'=>"create-agent" , 'files'=>'true' , 'id' => 'create_agent_form', 'class' => 'form'))}}

      <div class=" orm-control" style="text-align: right;
      margin-right: 30px;
      margin: 13px 14px;position:relative">
            <select name="employee_category" id="" style="padding: 4px;
            border-radius: 3px;" required>
              <option selected Disabled> Employee Category </option>
              <option value="0"> Agent </option>  
              <option value="3"> Sub Agent </option>  
            </select> 
            <?php
            echo ($errors->first('employee_category',"<li class='custom-error'>:message</li> 
           <script>
           agent_create.style.display = 'block';</script>"))
           ?>
           
      </div>
      <div class="form-group">
          <label for="name"> Name </label>
     {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name'))}}
      </div>

      <div class="form-group">
          <label for="contact"> Contact </label>
     {{Form::number('contact',null,array('class'=>'form-control','placeholder'=>'Mobile','onKeyPress'=> 'if(this.value.length == 10) return false;'))}}
      </div>

      <div class="form-group">
          <label for="dob"> DOB </label>
    {{Form::date('dob',null,array('class'=>'form-control','placeholder'=>'Date Of Birth'))}}
      </div>

      <div class="form-group" style="position:relative">
          <label for="agent_email"> Email </label>
 {{Form::email('agent_email',null,array('class'=>'form-control','placeholder'=>'Email'))}}
      
 <?php
  echo ($errors->first('agent_email',"<li class='custom-error'>:message</li> 
 <script>
 agent_create.style.display = 'block';</script>"))
 ?>

 </div>


 <div class="form-group">
    <label for=""> Password </label>
 {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
 </div>
 {{-- {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>'Confirm Password'))}} --}}
 <div class="form-group">
    <label for=""> Country </label>
 {{Form::text('country',null,array('class'=>'form-control','placeholder'=>'Country'))}} 
 </div>


 <div class="form-group">
    <label for=""> State </label>
 {{Form::text('state',null,array('class'=>'form-control','placeholder'=>'State'))}} 
 </div>

 <div class="form-group">
    <label for=""> City </label>
 {{Form::text('city',null,array('class'=>'form-control','placeholder'=>'City'))}} 
 </div>



 <div class="form-group">
    <label for=""> Street </label>
 {{Form::text('street',null,array('class'=>'form-control','placeholder'=>'Street'))}}
 </div>

 <div class="form-group">
    <label for="">Pincode </label>
 {{Form::number('pin',null,array('class'=>'form-control','placeholder'=>'Pin Code', 'onKeyPress'=>"if(this.value.length==6) return false;"))}}
 </div>
 {{-- <label for = 'agent_image'  class = "form-control" style="cursor:pointer;display:bloc">Choose Image </label> --}}
 
    
    <div class="more-feild-add">
        
<button type="button" class="agent-more-feild"  onClick = "show_agent_more_feild();"> Add Official Deatil </button>
    </div>
<div class="show-agent-more-feild" id="show_agent_more_feild"> 
  
    <div class="form-group">
        <label for="">Office Id </label>
    {{Form::text('office_id',null,array('class'=>'form-control','placeholder'=>'Office Id'))}}
    </div>

    <div class="form-group">
        <label for="">Employee Id </label>
    {{Form::text('employee_id',null,array('class'=>'form-control','placeholder'=>'Employee Id'))}}
    </div>

    <div class="form-group">
    <label for=""> Joining Date </label>
    {{Form::date('joining_date',null,array('class'=>'form-control','placeholder'=>'Joining Date', 'id' =>'joining_date'))}}
    </div>
    
    <div class="form-group">
    <label for=""> Designation </label>
  {{Form::text('designation',null,array('class'=>'form-control','placeholder'=>'Designation'))}}
</div>

<div class="form-group">
  <label for=""> Salary </label>
{{Form::number('salary',null,array('class'=>'form-control','placeholder'=>'Salary'))}}
</div>

<div class="form-group">
    <label for=""> Domain </label>
  {{Form::text('employee_domain',null,array('class'=>'form-control','placeholder'=>'Domain'))}}
</div>

<div class="form-group">
    <label for=""> Total Experience </label>
    {{Form::text('total_experience',null,array('class'=>'form-control','placeholder'=>'Total Experience'))}}
</div>

</div>




<div class="more-feild-add">
    <button type="button" class="agent-more-feild"  onClick = "toggle_experience_feild();"> Add Experience </button>
</div>

<div  class="last-company-experience" id="last_company_experience">  
<div class="row"> 
  <div class="col-sm-12">

  <div class="form-group">
    <label for="">  Company </label>
    {{Form::text('last_company[]',null,array('class'=>'form-control','placeholder'=>'Last Company'))}}
</div>


<div class="form-group">
  <label for="">  Salary </label>
  {{Form::text('last_salary[]',null,array('class'=>'form-control','placeholder'=>'Last Salary'))}}
</div>

<div class="form-group">
  <label for=""> From</label>
  {{Form::date('from_date[]',null,array('class'=>'form-control'))}}
</div>


<div class="form-group">
  <label for=""> To</label>
  {{Form::date('to_date[]',null,array('class'=>'form-control'))}}
</div>




<div class="form-group">
    <label for=""> Expereince </label>
    {{Form::text('experience[]',null,array('class'=>'form-control','placeholder'=>'Experience'))}}
</div>



<div class="form-group">
<p class="experience-plus-sign"  onclick = "add_emp_experience();">+</p>
</div>

</div>
</div>

</div> 



{{-- end last company experience --}}

{{-- start Account Information --}}


<div class="more-feild-add">
    <button type="button" class="agent-more-feild"  onClick = "toggle_bank_feild();"> Add Bank Deatil </button>
</div>
<div class="employee-account-information" id="employee_account_information">
  
<div class="form-group">
    <label for=""> Bank Name </label>
    {{Form::text('employee_bank_name',null,array('class'=>'form-control','placeholder'=>'Bank Name'))}}
</div>

<div class="form-group">
    <label for=""> Account No </label>
    {{Form::text('employee_account_number',null,array('class'=>'form-control','placeholder'=>'Account Number'))}}
</div>

<div class="form-group">
    <label for=""> IFSC Code</label>
    {{Form::text('employee_ifsc',null,array('class'=>'form-control','placeholder'=>'IFSC Code'))}}
</div>


<div class="form-group">
    <label for=""> Branch</label>
    {{Form::text('employee_branch',null,array('class'=>'form-control','placeholder'=>'Branch'))}}
</div>

</div>
{{-- end of Account Information --}}

{{-- start Documents section --}}

<div class="more-feild-add">
    <button type="button" class="agent-more-feild"  onClick = "toggle_document_feild();"> Add Docuument </button>
</div>
<div class="employee_document" id="employee_document">
    <div class="form-group">
        <label for=""> Image</label>
    {{Form::file('image',array('class'=>'form-control', 'id' => 'agent_image', 'style'=> 'display:non'))}}
    </div>

    <div class="form-group">
        <label for=""> Documents </label>
        <input type="file" name="employee_documents[]" class="form-control" multiple accept=".jpeg,.jpg,.png.doc,.docx,.ppt,.pdf">
        Press Control Key and Select multiple Document for upload 
    </div>
</div>
{{-- end Documents section --}}



 

  {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3'))}}
  {{Form::close()}}
    </div>
  </div>
  <!-- end of Agent Create  Modal -->
  





<script>
function add_emp_experience(){
 $('#last_company_experience').append(' <div class="row"> <div class="col-sm-12"> <p style="background:red; height:3px; width:100%">  <div class="form-group">   <label for=""> Last Company </label>{{Form::text('last_company[]',null,array('class'=>'form-control','placeholder'=>'Last Company'))}}</div><div class="form-group"> <label for=""> Last Salary </label>{{Form::text('last_salary[]',null,array('class'=>'form-control','placeholder'=>'Last Salary'))}}</div><div class="form-group"> <label for=""> From</label>{{Form::date('from_date[]',null,array('class'=>'form-control'))}}</div><div class="form-group"> <label for=""> To</label>{{Form::date('to_date[]',null,array('class'=>'form-control'))}}</div><div class="form-group"> <label for=""> Expereince </label>{{Form::text('experience[]',null,array('class'=>'form-control','placeholder'=>'Experience'))}}</div> </div> </div>');
}
</script>


<script>
          
  $(document).ready(function (){
    
    $('.close-time-notification').click(function(e){
        var id  = $(this).attr("data-id");
        $(this).parent().hide();        
        
      $.ajaxSetup({
                            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });        
    $.ajax({
    type: "get",
    url: "{{url('time-notification')}}?a="+id,

    success: function(data){
      
                }
    });
    })
  })
  </script>



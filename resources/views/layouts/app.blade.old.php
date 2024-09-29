 <?php 
use App\users;
?>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts --> 
     
    
    {{-- <script src="{{ asset('public/js/app.js') }}"></script> --}}
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

{{--    
</head>
<body> --}}
  @if(!empty(Auth::user()->usertype_status))
    @include('enquiry.enquiry-modal') 
  @endif
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('public/js/app.js') }}"></script>

    <div id="app" >
<!-- kaushik menu start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0px;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav new-menu" style=" margin-left: auto; padding:8px;" >
      <!-- Authentication Links -->
      @guest
      
         
          @if (Route::has('register'))
              <li class="nav-item">
                  {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
              </li>
          @endif
      @else
      @if(Auth::user()->usertype_status != "3")
    
       @elseif(Auth::user()->usertype_status == "3")



@elseif(Auth::user()->usertype_status == 4)



      @endif
      <style>
      
.top-menu-class .dropdown-button-li:hover   .dropdown-content{
          display: inline-grid;

        }
    
.top-menu-class .dropdown-content a{
          color:#000;
          padding: 4px;
        }



      </style>





<div id=time-notification-parent>
<?php 
date_default_timezone_set("Asia/Kolkata");
if( Auth::user()->usertype_status == 1){
 $enq_comments =  DB::table('enq_comments')->where('calling_date','<=',date("d-m-Y"))->where('time_notification_status',1)->get(); 
 
}
  else{
$enq_comments =  DB::table('enq_comments')->where('calling_date','<=',date("d-m-Y"))->where('agent_id', Auth::user()->employee_id)->where('time_notification_status',1)->get() ; 
  
}
// dd($enq_comments);
        if($enq_comments->count() > 0){
        
foreach($enq_comments as $get2){

// dd(  date('H:i'),  $get2->callbacklater_time );
if( date('H:i') >= $get2->callbacklater_time ){

?>
{{-- @dd($enq_comments); --}}

<div class="time-notification">
<span class="close-time-notification" data-id = "<?php echo $get2->client_enquiry_id ?>" >X</span>

<p >Name: <?php echo $get2->name ?></p>
<p >Date : {{$get2->calling_date}}</p>
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









@if(Auth::user()->usertype_status!= "3")

      <li> <button type="button" value="" class="aaa fa-pause-circle-o " id="pause" onclick="play();" style="background:red">  </button>
      {{-- <p>Login Hours: 07:50</p> --}}
      </li>
      <li> <input type="button" value="Work" class="stop" id="play"  onclick="pause();" style="display:none;background:green">  </li>
      <li class="nav-item dropdown no-arrow menu-tab" id="not_toggle" style="margin-right: 20px; !important">
              <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdo" aria-haspopup="true" aria-expanded="false" onclick="">
              

    
                <!-- Counter - Alerts -->
                @if( Auth::user()->employee_id =='Emp_2266')
<?php $enq_comments =  DB::table('enq_comments')->where('calling_date',date("d-m-Y"))->where('time_notification_status',1)->get(); ?>                @else
<?php    $enq_comments =  DB::table('enq_comments')->where('calling_date',date("d-m-Y"))->where('agent_id', Auth::user()->employee_id)->where('time_notification_status',1)->get() ;  ?>  




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
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in notificitaion-show" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification Center
                </h6>
                @if(!empty($enq_comments))
                @foreach($enq_comments as $get2)
            


<a class="dropdown-item d-flex align-items-center" href={{url('enquiry/get-detail\\').$get2->client_enquiry_id}}>
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fa fa-file-alt text-white fa fa-bell"></i>
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
            @endif

            @if(Auth::user()->usertype_status== "3")
            
<?php
$get_notification = DB::table('client_notification')->select('enquiry_id','message','date','agent_unique_id')
->where('enquiry_id', Session()->get('unique_id_sess'))->where('check_or_not',1)->get();
?>
             <li class="nav-item dropdown no-arrow mx-1 menu-tab" id="not_toggle">
              <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdo" aria-haspopup="true" aria-expanded="false" onclick="">
              <span class="badge badge-danger 
              badge-counter hide_all_notification" data-id="" > {{$get_notification->count()}}+</span>
                
              </a>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in notificitaion-show" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification Center
                </h6>

@if($get_notification->count() > 0)
@foreach($get_notification as $get)
                <a class="dropdown-item d-flex align-items-center" href={{url('enquiry/get-detail\\')}} style="">
                   
                  <div > 
                    <span class="font-weight-bold"> Time:- {{$get->date}}  </span>
                    <div class="small text-gray-500">{{$get->message}}</div>
                    </div>
                </a>

@endforeach
@endif
</div>
</li>
            @endif

            <li class="nav-item dropdown menu-tab" style="margin-right: 20px;">
              <a href="" class="fa fa-tachometer"></a>
            </li>
            
            <!-- <li class="nav-item dropdown ">
              <a href="" class="fa fa-sticky-note-o"></a>
            </li> -->

            <li class="nav-item dropdown menu-tab" style="margin-right: 20px;">
              <a href="" class="fa fa-bell"></a>
            </li>

            <li class="nav-item dropdown menu-tab" style="margin-right: 20px;">
              <a href="" class="fa fa-question-circle"></a>
            </li>

            <li class="nav-item dropdown menu-tab" style="margin-right: 20px;">
              <a href="" class="fa fa-user"></a>
            </li>

          <li class="nav-item dropdown menu-tab" style="margin-right: 20px;">
              <a id="navbarDropdo" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre onclick="show_hide_logout();" style="color:#fff;">
                  {{-- {{ Auth::user()->name }} --}}
                   <span class="fa fa-power-off " style=" position: absolute; top: 30%; left: 30%; "></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right logout-profile" aria-labelledby="">
              {{-- <a id = "op" class="dropdown-item" href="{{url('profile')}}">
                  Profile
                  
               </a>  --}}
                
               {{-- comment this for logout live server --}}
                {{-- <a  id = "aaa" class="dropdown-item aaa" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a> --}}




                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: non;">
                  <input type="hidden" id="trace" value="{{Auth::user()->employee_id}}">
                  {{-- add for logout live server --}}
                  <input type="submit" value="Logout" style="background: #458bbb;width: 100%;">

                      @csrf
                  </form>
              </div>
          </li>
      @endguest
  </ul>
    
  </div>
</nav>
      <!-- kaushik menu end -->


        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="padding: 0">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                    {{-- <img src="{{url('public/images/logo.png')}}" alt="" style="width:50px"> &nbsp;
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
                        @if(Auth::user()->usertype_status != "3")
                        <div  class="top-menu-class">
                          <ul>
                            <li style="with:300px"> <img src="" alt="logo"></li>
                            <!-- <li><a href="{{url('home')}}">Home</a></li> -->
                           


                            @if( Auth::user()->usertype_status =='1')
                            <li class="dropdown-button-li"  >
                                <a href="javascript:void(0)" class="dropbtn">Admin</a>
                                  <i class="fas fa-fw fa-tachometer-al"></i>
                                  <div class="dropdown-content reg-form "  id="reg_form">
                                    <a class="nav-link2" href="{{ url('ip-address')}}"  id="" >IP Address    </a> 
                                    {{-- <a class="nav-link2" href="{{ url('existing-agent')}}" > Existing Agent    </a>  --}}
                                  </div>
                              
                              
                            </li>
                           <li class="dropdown-button-li">
                                <a href="{{ url('knowledgebase')}}" class="dropbtn" > Knowledge Base </a>
                                <i class="fas fa-fw fa-tachometer-al"></i>
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
  <i class="fas fa-fw fa-tachometer-al"></i>
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
                                <a href="#" class="dropbtn">Clients</a>
                                {{-- <i class="fas fa-fw fa-tachometer-al"></i> --}}
                                <div class="dropdown-content reg-form "  id="">
                                    {{-- <a class="nav-link2" href="{{ url('new-user') }}" > Add New    </a>  --}}
                                    <a href="{{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}" class="dropbtn">Clients</a>


                                    <a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_client">Add Client  </a>
                                    
                                    <a href="{{url('unfollow-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}" class="dropbtn">Unfollowup Clients</a>
                                    
                                  
                                 
                                  
                                    {{-- <a class="nav-link2" href="{{ url('enquiry-table') }}"> Add New By Tablet    </a>  --}}
                                  {{-- <a class="" href={{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}>Clients List</a> --}}
                                </div>

                         
                            </li>
                          

                            @if( Auth::user()->usertype_status =='1' ||  Auth::user()->usertype_status =='2' )
<li class="dropdown-button-li">
                              <a href="javascript:void(0)" class="dropbtn">Education</a>
                              <div class="dropdown-content reg-form ">
                                
                                <a class="nav-link2" href="{{url('education/dashboard')}}">Institution</a>

    
    <a class="nav-link2" href="{{url('application')}}">Application</a>
                              </div>
                            </li>
@endif

                          </ul>
                        </div>
                         @elseif(Auth::user()->usertype_status == "3")
                         
                         <div  class="top-menu-class">
                         <ul>
                     <li class="dropdown-button-li">
                              <a href="javascript:void(0)" class="dropbtn">Education</a>
                              <div class="dropdown-content reg-form ">
                                
                                <a class="nav-link2" href="{{url('education/dashboard')}}">Institution</a>

    {{-- <a class="nav-link2" href="{{url('education/enrolments')}}">Enrolments</a> --}}
    <a class="nav-link2" href="{{url('application')}}">Application</a>
                              </div>
                            </li>
                         </ul></div>


@elseif(Auth::user()->usertype_status == 4)

<div  class="top-menu-class">
  <ul>
<li class="dropdown-button-li">
       <a href="javascript:void(0)" class="dropbtn">Education</a>
       <div class="dropdown-content reg-form ">
         
         <a class="nav-link2" href="">Institution</a>


<a class="nav-link2" href="">Application</a>
       </div>
     </li>
  </ul></div>

                        @endif
                        <style>
                        
.top-menu-class  .dropdown-button-li:hover   .dropdown-content{
                            display: inline-grid;

                          }
                      
.top-menu-class    .dropdown-content a{
                            color:#000;
                            padding: 4px;
                          }

              
                          /* .nav-item.dropdown {
    margin: initial !important;
} */
.new-menu li{
  margin-right: 20px;
}
                        </style>




                  
<div id=time-notification-parent>
    <?php 
     date_default_timezone_set("Asia/Kolkata");
  if( Auth::user()->usertype_status == 1){
                   $enq_comments =  DB::table('enq_comments')->where('calling_date','<=',date("d-m-Y"))->where('time_notification_status',1)->get(); 
                   
  }
                    else{
             $enq_comments =  DB::table('enq_comments')->where('calling_date','<=',date("d-m-Y"))->where('agent_id', Auth::user()->employee_id)->where('time_notification_status',1)->get() ; 
                    
            }
            // dd($enq_comments);
                          if($enq_comments->count() > 0){
                          
    foreach($enq_comments as $get2){
      
      // dd(  date('H:i'),  $get2->callbacklater_time );
    if( date('H:i') >= $get2->callbacklater_time ){
  
    ?>
    {{-- @dd($enq_comments); --}}
  
  <div class="time-notification">
      <span class="close-time-notification" data-id = "<?php echo $get2->client_enquiry_id ?>" >X</span>
    
    <p >Name: <?php echo $get2->name ?></p>
    <p >Date : {{$get2->calling_date}}</p>
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

  







@if(Auth::user()->usertype_status!= "3")

                        <li style="margin:auto"> <button type="button" value="" class="aaa fa-pause-circle-o " id="pause" onclick="play();" style="background:red">  </button>
                        {{-- <p>Login Hours: 07:50</p> --}}
                        </li>
                        <li style="margin:auto"> <input type="button" value="Work" class="stop" id="play"  onclick="pause();" style="display:none;background:green">  </li>
                        <li class="nav-item dropdown no-arrow mx-1 menu-tab" id="not_toggle">
                                <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdo" aria-haspopup="true" aria-expanded="false" onclick="">
                                

                      
                                  <!-- Counter - Alerts -->
                                  @if( Auth::user()->employee_id =='Emp_2266')
                  <?php $enq_comments =  DB::table('enq_comments')->where('calling_date',date("d-m-Y"))->where('time_notification_status',1)->get(); ?>                @else
         <?php    $enq_comments =  DB::table('enq_comments')->where('calling_date',date("d-m-Y"))->where('agent_id', Auth::user()->employee_id)->where('time_notification_status',1)->get() ;  ?>  




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
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in notificitaion-show" aria-labelledby="alertsDropdown">
                                  <h6 class="dropdown-header">
                                    Notification Center
                                  </h6>
                                  @if(!empty($enq_comments))
                                  @foreach($enq_comments as $get2)
                              


    <a class="dropdown-item d-flex align-items-center" href={{url('enquiry/get-detail\\').$get2->client_enquiry_id}}>
                                    <div class="mr-3">
                                      <div class="icon-circle bg-primary">
                                        <i class="fa fa-file-alt text-white fa fa-bell"></i>
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
                              @endif

                              @if(Auth::user()->usertype_status== "3")
                              
<?php
$get_notification = DB::table('client_notification')->select('enquiry_id','message','date','agent_unique_id')
->where('enquiry_id', Session()->get('unique_id_sess'))->where('check_or_not',1)->get();
?>
                               <li class="nav-item dropdown no-arrow mx-1 menu-tab" id="not_toggle">
                                <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdo" aria-haspopup="true" aria-expanded="false" onclick="">
                                <span class="badge badge-danger 
                                badge-counter hide_all_notification" data-id="" > {{$get_notification->count()}}+</span>
                                  
                                </a>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in notificitaion-show" aria-labelledby="alertsDropdown">
                                  <h6 class="dropdown-header">
                                    Notification Center
                                  </h6>

@if($get_notification->count() > 0)
@foreach($get_notification as $get)
                                  <a class="dropdown-item d-flex align-items-center" href={{url('enquiry/get-detail\\')}} style="">
                                     
                                    <div > 
                                      <span class="font-weight-bold"> Time:- {{$get->date}}  </span>
                                      <div class="small text-gray-500">{{$get->message}}</div>
                                      </div>
                                  </a>

@endforeach
    @endif
  </div>
</li>
                              @endif

                              <li class="nav-item dropdown menu-tab">
                                <a href="" class="fa fa-tachometer"></a>
                              </li>
                              
                              <!-- <li class="nav-item dropdown ">
                                <a href="" class="fa fa-sticky-note-o"></a>
                              </li> -->

                              <li class="nav-item dropdown menu-tab">
                                <a href="" class="fa fa-bell"></a>
                              </li>

                              <li class="nav-item dropdown menu-tab">
                                <a href="" class="fa fa-question-circle"></a>
                              </li>

                              <li class="nav-item dropdown">
                                <a href="" class="fa fa-fw fa-user"></a>
                              </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdo" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre onclick="show_hide_logout();" style="color:#fff;">
                                    {{-- {{ Auth::user()->name }} --}}
                                     <span class="fa fa-power-off "></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right logout-profile" aria-labelledby="">
                                {{-- <a id = "op" class="dropdown-item" href="{{url('profile')}}">
                                    Profile
                                    
                                 </a>  --}}
                                  
                                 {{-- comment this for logout live server --}}
                                  {{-- <a  id = "aaa" class="dropdown-item aaa" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> --}}

 


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: non;">
                                    <input type="hidden" id="trace" value="{{Auth::user()->employee_id}}">
                                    {{-- add for logout live server --}}
                                    <input type="submit" value="Logout" style="background: #458bbb;width: 100%;">
       
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  
  
                </div>
            </div>
            
      

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
        
        <main class=""   style="">
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
              <option value="4"> Sub Agent </option>  
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

{{-- <script src="{{URL::asset('public/js/main.js')}}"></script> --}}

<script>
function show_hide_logout(){
    var x = document.getElementsByClassName('logout-profile')[0];
    var y = document.getElementById('navbarDropdow');    
    window.addEventListener('click',function(event) {
      if (event.target != y) {
x.style.display = "none";
} 
    else {
     x.style.display = "block";
         }
        })
      }


var x = document.getElementsByClassName('notificitaion-show')[0];
var y = document.getElementById('alertsDropdown');
var z = document.getElementsByClassName('badge-counter')[0];
window.addEventListener('click',function(event) {
if ((event.target != y) && (event.target != z)) {
  if(x.style.display == "block"){
x.style.display = "none";
  }} 
else {
x.style.display = "block";
}    
})



</script>

<script>
  
  $(document).ready(function(){
                $('.hide_all_notification').click(function(){
                    var id = $(this).attr('data-id');
                $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             
                                $.ajax({
    type: "get",
    url: "{{url('hide-client-notification')}}?id="+id,
    success: function(data){
    
                }
    });
                             
                })
            })
</script>


<?php 
use App\users;
use App\Helpers\Helper;

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
<style>
    #workstatusall option {
    font-size: 18px;
}
</style>
{{--    
</head>
<body> --}}
  @if(!empty(Auth::user()->usertype_status))
    @include('enquiry.enquiry-modal') 
  @endif
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('public/js/app.js') }}"></script>

    <div id="app" >
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
                    <ul class="navbar-nav ml-auto" style="background-color: #34495e !important;">
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
                          <ul style="background-color: #34495e !important;">
                            {{-- <li><a href="{{url('home')}}">Home</a></li> --}}
                           


                            @if( Auth::user()->usertype_status =='1')
                            <li class="dropdown-button-li"  >
                                {{-- <a href="javascript:void(0)" class="dropbtn">Admin</a> --}}
                                  <i class="fas fa-fw fa-tachometer-al"></i>
                                  <div class="dropdown-content reg-form "  id="reg_form">
                                    {{-- <a class="nav-link2" href="{{ url('ip-address')}}"  id="" >IP Address    </a>  --}}
                                    {{-- <a class="nav-link2" href="{{ url('existing-agent')}}" > Existing Agent    </a>  --}}
                                  </div>
                              
                              
                            </li>
                            <li class="dropdown-button-li">
                                {{-- <a href="{{ url('knowledgebase')}}" class="dropbtn" > Knowledge Base </a> --}}
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
  {{-- <a href="javascript:void(0)" class="dropbtn">Hr </a> --}}
  <i class="fas fa-fw fa-tachometer-al"></i>
  <div class="dropdown-content reg-form " >
    
    <a class="nav-link2" href="{{ url('existing-agent')}}" >  Employee    </a> 
    <!--<a class="nav-link2" href="#"  id="create_agent_button" >Add Employee    </a> -->
    <a class="nav-link2" href="{{url('attendance')}}"  id="" >  Attendaance    </a> 
    <a class="nav-link2" href="{{url('payroll')}}"  id="" >  Payroll    </a> 
    <a class="nav-link2" href="{{url('recruitment')}}"> Recruitment </a>
  </div>
</li>
@endif
{{-- end hr menu --}}

                            <li class="dropdown-button-li">
                                {{-- <a href="#" class="dropbtn">Clients</a> --}}
                                {{-- <i class="fas fa-fw fa-tachometer-al"></i> --}}
                                <div class="dropdown-content reg-form "  id="">
                                    {{-- <a class="nav-link2" href="{{ url('new-user') }}" > Add New    </a>  --}}
                                    {{-- <a href="{{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}" class="dropbtn">Clients</a> --}}


                                    {{-- <a href="" class="collapse-item " data-toggle="modal" data-target="#add_new_client">Add Client  </a> --}}
                                    
                                    
                                  
                                 
                                  
                                    {{-- <a class="nav-link2" href="{{ url('enquiry-table') }}"> Add New By Tablet    </a>  --}}
                                  {{-- <a class="" href={{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}>Clients List</a> --}}
                                </div>

                         
                            </li>
                           

                            @if( Auth::user()->usertype_status =='1' ||  Auth::user()->usertype_status =='2' )

                            <li class="dropdown-button-li">
                              {{-- <a href="javascript:void(0)" class="dropbtn">Education</a> --}}
                              <div class="dropdown-content reg-form ">
                                
                                {{-- <a class="nav-link2" href="{{url('education/dashboard')}}">Institution</a> --}}

    
    {{-- <a class="nav-link2" href="{{url('application')}}">Application</a> --}}
                              </div>
                            </li>
@endif

                          </ul>
                        </div>
                         @elseif(Auth::user()->usertype_status == "3")
                         
                         <div  class="top-menu-class">
                         <ul>
                     <li class="dropdown-button-li">
                              {{-- <a href="javascript:void(0)" class="dropbtn">Education</a> --}}
                              <div class="dropdown-content reg-form ">
                                
                                {{-- <a class="nav-link2" href="{{url('education/dashboard')}}">Institution</a> --}}

    {{-- <a class="nav-link2" href="{{url('education/enrolments')}}">Enrolments</a> --}}
    {{-- <a class="nav-link2" href="{{url('application')}}">Application</a> --}}
                              </div>
                            </li>
                         </ul></div>


@elseif(Auth::user()->usertype_status == 4)

<div  class="top-menu-class">
  <ul>
<li class="dropdown-button-li">
       {{-- <a href="javascript:void(0)" class="dropbtn">Education</a> --}}
       <div class="dropdown-content reg-form ">
         
         {{-- <a class="nav-link2" href="">Institution</a> --}}


{{-- <a class="nav-link2" href="">Application</a> --}}
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
</style>

<button id="btnFullscreen" type="button" style="color: #fff;background:#34495e;border:none;"> <i class="fa fa-desktop" aria-hidden="true"></i></button>

   
<div id=time-notification-parent>
    
<script>
function toggleFullscreen(elem) {
  elem = elem || document.documentElement;

  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
// }, 3000);
document.getElementById('btnFullscreen').addEventListener('click', function() {
  toggleFullscreen();
});

</script>

    <?php 
     date_default_timezone_set("Asia/Kolkata");
  if( Auth::user()->usertype_status == 1){
                   $enq_comments =  DB::table('enq_comments')
                   ->where('calling_date','<=',date("Y-m-d"))
                   ->where('time_notification_status',1)
                   ->where('calling_date', '!=' , '')
                   ->get(); 
                
  }
  if( Auth::user()->usertype_status == 5){
                   $enq_comments =  DB::table('enq_comments')
                   ->join('users', 'enq_comments.employee_unique_id', 'users.unique_id')
                   ->where('calling_date','<=',date("Y-m-d"))
                   ->where('time_notification_status',1)
                   ->where('users.company_id', Auth::user()->unique_id)
                   ->where('calling_date', '!=' , '')
                   ->get(); 
                
  }
                    else{
             $enq_comments =  DB::table('enq_comments')->where('calling_date','<=',date("Y-m-d"))
             ->select('callbacklater_time', 'id', 'client_enquiry_id', 'calling_date', 'comment', 'name' )
             ->where('employee_unique_id', Auth::user()->unique_id)
             ->where('time_notification_status',1)
             ->where('calling_date', '!=' , '')
             ->get() ; }
            // dd($enq_comments, Auth::user()->unique_id);
                          if($enq_comments->count() > 0){
            // dd($enq_comments);              
    foreach($enq_comments as $get2){
      
      // dd(  date('H:i'),  $get2->callbacklater_time );
    if( date('H:i') >= $get2->callbacklater_time ){
  
    ?>
     
  
<div class="time-notification">
  <span class="close-time-notification" data-id = "<?php echo $get2->client_enquiry_id ?>" >X</span>

<p >Name: <?php echo $get2->name ?></p>
<p >On : {{$get2->calling_date}}  {{date('h:i a', strtotime($get2->callbacklater_time))}} </p>

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

                        <li style="margin:auto"> <input type="button" value="Pause" class="aaa" id="pause" onclick="play();" style="background:red">
                        {{-- <p>Login Hours: 07:50</p> --}}
                        </li>
                        <li style="margin:auto"> <input type="button" value="Work" class="stop" id="play"  onclick="pause();" style="display:none;background:green">  </li>
                        <li class="nav-item dropdown no-arrow mx-1" id="not_toggle">
                                <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdo" aria-haspopup="true" aria-expanded="false" onclick="">
                                  {{-- <i class="fa fa-bell fa-fw"></i> --}}

                      
                                  <!-- Counter - Alerts -->
                                  @if( Auth::user()->employee_id =='Emp_2266')
                  <?php $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->get(); ?>                @else
         <?php    $enq_comments =  DB::table('enq_comments')->where('calling_date',date("Y-m-d"))->where('agent_id', Auth::user()->employee_id)->get() ;  ?>  

<?php 
// dd($enq_comments);
?>


         @endif                       
                                  @if(!empty($enq_comments))
                                   <?php $a = 0 ?>
                                  @foreach($enq_comments as $get2)
                                  
                               



                                  {{-- @if($get2->calling_date == date("Y-m-d")) --}}
                                <?php $a++ ?>
                                {{-- @endif --}}
                                @endforeach
                                @endif
                                <span class="badge badge-danger badge-counter fa fa-bell "> 
                                <!--<i class="fa fa-bell fa-2x" aria-hidden="true"></i>-->
                                </span>
                                  
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in notificitaion-show" aria-labelledby="alertsDropdown">
                                  <h6 class="dropdown-header">
                                    Notification Center
                                  </h6>
                                  @if(!empty($enq_comments))
                                  @foreach($enq_comments as $get2)
                              
@php 

$enq = Helper::get_enquiries($get2->client_enquiry_id);

@endphp
@if($enq[0]->conversion == 1)
    <a class="dropdown-item d-flex align-items-center notification-dropdow-item" href={{url('enquiry/get-detail\\').$get2->client_enquiry_id}}>
                                    <div class="mr-3">
                                      <div class="icon-circle bg-primary">
                                        <i class="fa fa-file-alt text-white fa fa-bell"></i>
                                      </div>
                                    </div>
                                    <div > 
                                        <div class="notification-head"> 
                                      <div class="font-weight-bold">  {{$get2->name}} </div>
                                      <!--<br>-->
                                      <div class="font-weight-bold notification-time-div">   {{$get2->contact}} Time:- {{$get2->callbacklater_time}}  </div>
                                      </div>
                                      <div class="small text-gray-500">{{$get2->comment}}</div>
                                      
                                    </div>
                                  </a>
                                  @else
                                  <a class="dropdown-item d-flex align-items-center notification-dropdow-item" href=#>
                                  <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                      <i class="fa fa-file-alt text-white fa fa-bell"></i>
                                    </div>
                                  </div>
                                  <div > 
                                      <div class="notification-head"> 
                                    <div class="font-weight-bold">  {{$get2->name}} </div>
                                    <!--<br>-->
                                    <div class="font-weight-bold notification-time-div">   {{$get2->contact}} Time:- {{$get2->callbacklater_time}}  </div>
                                    </div>
                                    <div class="small text-gray-500">{{$get2->comment}}</div>
                                    
                                  </div>
                                  </a>
                                  @endif
                                  @endforeach  
                                  
                                  @endif
                                    <?php
                                    
                                     $a =  App\enq_asign_clients::get_enq_asign_clients(Auth::user()->unique_id);
                                    
                                    foreach($a as $b){
                                        ?>
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                       <div class="icon-circle bg-success">
                                        <i class="fas fa-tasks text-white"></i>
                                      </div> 
                                    </div>
                                    
                                      
                                    <div>
                                  
                                       <div class="small text-gray-500">On: {{date('d/m/Y', strtotime($b->date))}}</div>
                                   
                                     You have assign 
                                        @php
                                       // print_r(Helper::get_enquiries($b['client_enquiry_id']));
                                        // 'IC'.Helper::get_enquiries($b['client_enquiry_id'])[0]->id
                                       $okp =  DB::table('enquiries')->select('id', 'name')->where('unique_id',$b['client_enquiry_id'])->get();

                                       if($okp->count() > 0){
                          
                          foreach($okp as $g){ echo "<strong>".$g->name. '</strong> (IC'.$g->id.')'; }}

                                        @endphp
                                     by 
                                        @php
                                     $okp =  DB::table('users')->select('name')->where('unique_id',$b['who_assigned'])->get();
                                     if($okp->count() > 0){
                                     foreach($okp as $g){ echo $g->name; }}
                                     @endphp
                                    </div>
                                   
                                  </a>
                                   <?php
                                     }
                                     ?>
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
                                {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> --}}
                                </div>
                              </li>
                              @endif

                              @if(Auth::user()->usertype_status== "3")
                              
<?php
$get_notification = DB::table('client_notification')->select('enquiry_id','message','date','agent_unique_id')
->where('enquiry_id', Session()->get('unique_id_sess'))->where('check_or_not',1)->get();
?>
                               <li class="nav-item dropdown no-arrow mx-1" id="not_toggle">
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

                              
                            <li class="nav-item dropdown">
                                <a id="navbarDropdow" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre onclick="show_hide_logout();" style="color:#fff;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right logout-profile" aria-labelledby="navbarDropdow">
                                {{-- <a id = "op" class="dropdown-item" href="{{url('profile')}}">
                                    Profile
                                    
                                 </a>  --}}
                                  
                                  <!--<a  id = "aaa" class="dropdown-item aaa" href="{{ route('logout') }}"-->
                                  <!--     onclick="event.preventDefault();-->
                                  <!--                   document.getElementById('logout-form').submit();">-->
                                  <!--      {{ __('Logout') }}-->
                                  <!--  </a>-->

 


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: non;">
                                    <input type="hidden" id="trace" value="{{Auth::user()->employee_id}}">
                                    
                                    <input type="text" value="Lock screen" style="background: #458bbb;    color: #fff;    padding: 5px 0px;    border: none;    text-align: center;    margin: 4px 0px;    cursor: pointer;" readonly onclick="lock_screenftn()">
                                    
                                <input type="submit" value="Logout" style="background: #458bbb;width: 100%;" onclick="logout_button()">
       
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
          
          $('#workstatusall').change (function(){
              var employeeid  = $('#trace').val();
              var status = $(this).val();
            
               $.ajaxSetup({
                    headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                 });        
                $.ajax({
                type: "post",
                url: "{{url('admin/workingstatus')}}?w="+employeeid+"&status="+status,
                success: function(data){
                  
                            }
                });
          })
          
          </script>
<script>
   $(document).ready(function (){
                      $('.stop').click(function(e){
                          alert('pause');
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




  
  
  <!--<div class="assign-notification-parent">-->
  <?php
//   dd(Helper::get_enquiries(54));
  $get = DB::table('enquiries')
  ->select('id','unique_id','name')
  ->where('assign_status',0)
  ->where('delete_client',1)
  ->get();
  
//   from_agent_unique_id
//   agent_unique_id
  ?>
  <!--    <div class="assign-notification-child ">-->
  <!--        <p class="fa fa-info info-class"></p>-->
  <!--        <p style="margin-left: 35px;color: #676666;-->
  <!--  font-weight: 600;"> You have assign a lead of IC1254 by Admin</p>-->
  <!--        <p style="margin-left: 35px;color: #86818a;"> on 10/02/2021</p>-->
  <!--        <p class="fa fa-remove remove-assign-notification"></p>-->
  <!--    </div>-->
  <!--     <div class="assign-notification-child ">-->
  <!--        <p class="fa fa-info info-class"></p>-->
  <!--        <p style="margin-left: 35px;color: #676666;-->
  <!--  font-weight: 600;"> You have assign a lead of IC1254 by Admin</p>-->
  <!--        <p style="margin-left: 35px;color: #86818a;"> on 10/02/2021</p>-->
  <!--        <p class="fa fa-remove remove-assign-notification"></p>-->
  <!--    </div>-->
      
  <!--</div>-->
  <style>
  .assign-notification-parent{
    position: fixed;
    z-index: 1000;
    height: auto;
    right: 0;
    bottom: 0
  }
  #time-notification-parent{
      background-color: #0f72ca;
  }
  .close-time-notification{
      background: black !important;
    color: white;
    padding: 2px 5px 0 5px !important; 
    font-size: 10px !important;
  }
  
      .assign-notification-child{
          position: relative;
    right: 0;
    z-index: 10000;
    background: white;
    padding: 10;
    color: #000;
    border: 1px solid #d2c8c8;
    border-left: 5px solid #6ad06a;
    bottom: 25px;
    margin-top:20px;
      }
      .info-class{
          padding: 5px;
    background: #458bbb;
    width: 27px;
    font-size: 14px;
    /*position: absolute;*/
    color: #fff;
    top: 31%;
    text-align: center;
    border-radius: 50%;
    /*left: 5px;*/
    float: left;
    margin-top: 14px;
      }
      .remove-assign-notification{
          position: absolute;
    top: -17px;
    background: #3e3a3a;
    padding: 6px;
    border-radius: 50%;
    color: #fff;
    right: 0px;
    z-index: 10000;
      }
    /*.  {*/
    /*      position: absolute;*/
    /*top: -16px;*/
    /*padding: 6px;*/
    /*background: #464242;*/
    /*border-radius: 100%;*/
    /*color: #fff;*/
    /*right: 0;*/
    /*  }*/
  </style>
  
  





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
    url: "{{url(Request::segment(1).'/'.'time-notification')}}?a="+id,

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

<style>
  .dropdown-item.d-flex.align-items-center{
    border-bottom: 1px solid #f1e8e8;
  }.small, small {
    margin-top: -2px;
    font-size: 12px;
  }
  .notification-time-div{right: 12px!important;}
</style>

{{--

@if(isset(Auth::user()->hrm_id))

@php 
$host = 'localhost';
        $database = 'fvofqhwj_immigration_hrm';
        $user_name = 'fvofqhwj_immigration';
        $pass =  'xg]BkNZ1j-!u';
        
        $conn =   mysqli_connect($host, $user_name, $pass, $database);
        
 $sql = "  select * from fvofqhwj_immigration_hrm.attendance_employees where employee_id = ".Auth::user()->hrm_id." order by id desc limit 1";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    Auth::user()->type = "employee";
@endphp
<script>
  function logout_button(){
      
     $.ajax({
     type: "GET",
     url: "{{url('hrm/attendanceemployee2/'.$res['id'])}}",
     data:{out:"CLOCK OUT",ids:"ghj5hhg6fjh5k42434hj5"},
     success: function(data){
         
        }
     });
 }
 
 function lock_screenftn(){

     var userid = '{{Auth()->id()}}';
     var converthash = btoa(userid);
     
        $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
             
      $.ajax({
         type: "post",
         url: "{{url('admin/lockscreen/')}}",
         data:{out: btoa(userid)},
         success: function(data){
            window.location.href= 'lockscreenlogin?token='+converthash;
               }
        });
     
 }
 
 
 
 </script>
 @endif
 
 --}}
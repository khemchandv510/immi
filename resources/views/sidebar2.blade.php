<?php 

        $email = auth::user()->email;
     $email  = sha1($email);
    //  dd(Session()->put('hrm_value_set_here',$email));
     
// $get_all_data_from_url = parse_url($_SERVER["REQUEST_URI"]);

// if(strpos($get_all_data_from_url['path'], 'new-user') != false){
//   $page = 'student';
// }
// elseif(strpos($get_all_data_from_url['path'], 'unfollow-list') != false){
//   $page = 'student';
// }
// elseif (strpos($get_all_data_from_url['path'], 'enquiry-list') != false) {
// $page = 'student';
// }
// elseif (strpos($get_all_data_from_url['path'], 'enquiry') != false) {
//   $page = 'student';
//   }

if(Request::segment(2) == "fullcalender"){
  $page = 'fullcalender';
}
elseif (Request::segment(2) == "new-user") {
  $page = 'admin';
}
elseif (Request::segment(2) == "ip-address") {
  $page = 'admin';
}

elseif (Request::segment(2) == "existing-agent" && Request::segment(1) == "admin") {
  $page = 'admin';
}

elseif (Request::segment(2) == "add-leads") {
  $page = 'lead';
}
elseif (Request::segment(2) == "enquiry-list") {
  $page = 'lead';
}
elseif (Request::segment(2) == "lead-dashboard") {
  $page = 'lead';
}
elseif (Request::segment(2) == "add-student") {
  $page = 'student';
}
elseif (Request::segment(2) == "student-list") {
  $page = 'student';
}

elseif (Request::segment(2) == "student-dashboard") {
  $page = 'student';
}
elseif (Request::segment(2) == "add-institute" || Request::segment(2) == "institute-list"  || Request::segment(2) == "institute-dashboard") {
  $page = 'institute';
}
elseif (Request::segment(2) == "add-immigration" || Request::segment(2) == "immigration-list"  || Request::segment(2) == "immigration-dashboard") {
  $page = 'immigration';
}

elseif (Request::segment(2) == "education" || Request::segment(2) == "application"  || Request::segment(2) == "filter-course-section") {
  $page = 'university';
}


elseif (Request::segment(2) == "add-employee" || Request::segment(2) == "existing-agent"  || Request::segment(2) == "attendance" || Request::segment(2) == "payroll"  || Request::segment(2) == "recruitment"   ) {
  $page = 'hr';
}
elseif (Request::segment(2) == "add-subagent") {
  $page = 'subagent';
}

elseif (Request::segment(2) == "quotation"  || Request::segment(2) == "update-quotation" ) {
  $page = 'quotation';
}


else{
  $page = "no urls";
}
?>  
<?php 
if(Auth::user()->usertype_status == 1){
    ?>
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  toggled" id="accordionSidebar" style="background-color: #34495e !important;">

<!-- Sidebar - Brand -->
<a class="index-kaushik sidebar-brand d-flex align-items-center justify-content-center" href="{{url('index')}}">
  <div class="sidebar-brand-icon rotate-n-15">
    {{-- <i class="fas fa-laugh-wink"></i> --}}
  </div>
  <div class="sidebar-brand-text mx-3">Immigartion<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- use on click function start -->



<!-- Nav Item - Dashboard -->
<li class="nav-item @if($page == 'no urls'){{'activess' }}@endif">

<!-- <li class="nav-item active"> -->
  <a  href ="{{url(Request::segment(1).'/'.'index')}}"class="nav-link">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<li class="nav-item @if($page == 'fullcalender'){{'activess' }}@endif ">
  <a class="nav-link collapsed" href="{{url(Request::segment(1).'/'.'fullcalender')}}">
  <i class="fas fa-calendar-alt"></i>
    <span>Calendar</span>
  </a>
<!-- 
@if( Auth::user()->usertype_status =='1')
<li class="nav-item "  >
  <a class="nav-link" href="#">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    <span> Admin</span>
  </a>
  <div class="reg-form" id="reg_form">
      <p> <a class="nav-link2" href="#"  id="create_agent_button" >Create  Agent    </a> </p>
      <p> <a class="nav-link2" href="{{ url('existing-agent')}}" > Existing Agent    </a> </p>
     
  </div>
</li>
@endif -->

@if( Auth::user()->usertype_status =='1')
<li class="nav-item @if($page == 'admin'){{'activess' }}@endif "> 
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-user-cog"></i>
    <span>Admin</span>
  </a>
  <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="reg_form">
      <h6 class="collapse-header">Admin</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'new-user')}}" id="create_agent_button">Create  Agent</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'ip-address')}}" id="{{ url('ip-address')}}">IP Address</a>
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'existing-agent')}}">Existing Agent</a>
    
      
    </div>
  </div>
</li>
@endif

<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enquiry" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-headset"></i>
    <span>Enquiry</span>
  </a>
  <div id="enquiry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Enquiry</h6>
      <a class="collapse-item" href="{{ url('new-user') }}" id="create_agent_button">New User</a>
      <a class="collapse-item" href="{{ url('existing-user') }}">Existing User</a>
      
    </div>
  </div>
</li> -->

<li class="nav-item @if($page == 'lead'){{'activess' }}@endif ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leads" aria-expanded="true" aria-controls="collapseTo">
  <i class="far fa-address-book"></i>
    <span>Leads Manager</span>
  </a>
  <div id="leads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Leads Manager</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-leads')}}" id="create_agent_button"> Add Lead</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">View Lead</a>
       
       <a class="collapse-item" href="{{url(Request::segment(1).'/'.'dead-leads/'.Crypt::encrypt(Auth::user()->employee_id)) }}">Dead Leads</a>
       <a class="collapse-item" href="{{url(Request::segment(1).'/'.'lead-dashboard')}}" id="create_agent_button"> Lead Dashboard </a>
      {{-- <a class="collapse-item" href="#">Today Follwer</a> --}}
      
    </div>
  </div>
</li>

<!-- <li class="nav-item @if($page == 'clients'){{'activess' }}@endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#clients" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-user-check"></i>
    <span>Clients</span>
  </a>
  <div id="clients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Clients</h6>
      <a class="collapse-item" href="{{ url('new-user') }}" id="create_agent_button">Add Client</a>
      <a class="collapse-item" href="{{url('unfollow-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">Unfollowup Clients</a>
      <a class="collapse-item" href="{{url('enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">Clients List</a>
      
    </div>
  </div>
</li> -->


<li class="nav-item @if($page == 'student'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-user-graduate"></i>
    <span>Student Manager</span>
  </a>
  <div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Student Manager</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-student')}}" id="create_agent_button"> Add Student</a>
        
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-list')}}">View Student</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-dashboard')}}" id="create_agent_button">Student Dshboard</a>
      {{-- <a class="collapse-item" href="#" id="create_agent_button">Text</a>
      <a class="collapse-item" href="#">Today Call</a> --}}
      
    </div>
  </div>
</li>

<li class="nav-item @if($page == 'institute'){{'activess' }}@endif ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#institute" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-school"></i>
    <span>Institute Manager</span>
  </a>
  <div id="institute" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Institute Manager</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-institute')}}" id="create_agent_button"> Add Student</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'institute-list')}}">View Institute</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'institute-dashboard')}}" id="create_agent_button"> Institute Dashboard</a>
      
    </div>
  </div>
</li>


<li class="nav-item @if($page == 'immigration'){{'activess' }}@endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Immigration" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-university"></i>
    <span>Immigration Manager</span>
  </a>
  <div id="Immigration" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Immigration Manager</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-immigration')}}" id="create_agent_button"> Add </a>
      
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'immigration-list')}}">View </a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'immigration-dashboard')}}" id="create_agent_button">Dashboard</a>
      
    </div>
  </div>
</li>
<li class="nav-item @if($page == 'university'){{'activess' }}@endif ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#university2" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-university"></i>
    <span>University / Institute Manager</span>
  </a>
  <div id="university2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
     
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/dashboard')}}" id="create_agent_button"> Institution </a>
      
      {{-- <a class="collapse-item" href="{{url(Request::segment(1).'/'.'application')}}">Application </a> --}}
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/add-institution')}}">Add Institution </a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'filter-course-section')}}">Filter </a>
      <!-- <a class="collapse-item" href="#" id="create_agent_button">Dashboard</a -->
      
    </div>
  </div>
</li>

{{-- hr menu --}}
@if( Auth::user()->usertype_status =='1' ||  Auth::user()->usertype_status =='2' )
<li class="nav-item @if($page == 'hr'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-briefcase"></i>
    <span>HR</span>
  </a>
  <div id="hr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">HR</h6>
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'add-employee')}}"  id="create_agent_button2" >Add Employee</a> 
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'existing-agent')}}" id="create_agent_button">Employee</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'attendance')}}"  id="" >  Attendaance </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'payroll')}}"  id="" >  Payroll </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'recruitment')}}"> Recruitment </a>
      
    </div>
  </div>
</li>
@endif
{{-- end hr menu --}}






<li class="nav-item @if($page == 'subagent'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="{{url(Request::segment(1).'/'.'add-subagent') }}">
  <i class="far fa-list-alt"></i>
    <span>Create Sub Agents</span>
  </a>
</li>





<li class="nav-item @if($page == 'quotation'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="{{url(Request::segment(1).'/'.'quotation') }}">
  <i class="far fa-list-alt"></i>
    <span>Quotation</span>
  </a>
</li> 
<!-- end on click event -->


<!-- 
<li class = "nav-item activ" id="desk_en">
     <span class="  fas fa-fw fa-tachometer-alt  nav-link" onclick  ="">   Enquiry  </span>    
    
    <div class="reg-form" id="reg_form">
      <p> <a class="nav-link2" href="{{ url('new-user') }}" > New User    </a> </p>
      <p> <a class="nav-link2" href="{{ url('existing-user') }}" > Existing User    </a> </p>
      {{-- <p> <a class="nav-link2" href  iry') }}" > Existing User </a> </p> --}}
  </div>
</li> -->

<script>
      function open(){
        document.getElementById('reg_form').display = "block";
      }
</script>
<!-- <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("accordionSidebar");
var btns = header.getElementsByClassName("nav-item");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script> -->

<style>
.reg-form{
display:non;
color:#fff;
margin-left: 38px;
}

.reg-form p{
  margin-bottom:5px ;
} 

.reg-form  a{
color:#fff;
}
</style>

<!-- 
<li class="nav-item active" id="tablet-hide" onclick="tablet_hide()">
  <a class="nav-link" href="{{ url('enquiry-table') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Tablet Form</span></a>
  </li> -->
  

  <script>
    function tablet_hide(){
      // document.getElementById('tablet-hide').style.display="none";
    }
    

  </script>

<!-- for sidebar active -->

  <!-- <script>
  $(document).ready(function () {
    $('.navbar-nav li a').click(function(e) {

        $('.navbar-nav li.active').removeClass('active');

        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });
});
</script> -->

<!-- Divider -->


<!-- Heading -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTo">
    <i class="fas fa-fw fa-cog"></i>
    <span>create a case</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">create a case</h6>
      <a class="collapse-item" href="sign-up.php">Sign Up</a>
      <a class="collapse-item" href="company-info.php">Company Info</a>
      <a class="collapse-item" href="payment.php">Payment</a>
      <a class="collapse-item" href="manage-client.php">Manage client</a>
      <a class="collapse-item" href="add-client.php">Add Client</a>
      <a class="collapse-item" href="payment-detail.php">Payment Detail</a>
      <a class="collapse-item" href="Users.php">Users</a>
      
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#start" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Start</span>
  </a>
  <div id="start" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="{{url('/start/contacts')}}">Contacts</a>
      <a class="collapse-item" href="company.php">Company</a>
      <a class="collapse-item" href="contacts.php">Contacts</a>
      <a class="collapse-item" href="opportunity.php">Opportunity</a>
      <a class="collapse-item" href="quotation.php">Quotation</a>
      <a class="collapse-item" href="Unallocated-Client.php">Unallocated Client</a>
      <a class="collapse-item" href="Users.php">Users</a>
      
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Manage Case</span>
  </a>
  <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Manage</h6>
      <a class="collapse-item" href="Case-Details.php">Case Details</a>
      <a class="collapse-item" href="company.php">Company</a>
      <a class="collapse-item" href="contacts.php">Contacts</a>
      <a class="collapse-item" href="opportunity.php">Opportunity</a>
      <a class="collapse-item" href="quotation.php">Quotation</a>
      <a class="collapse-item" href="Unallocated-Client.php">Unallocated Client</a>
      <a class="collapse-item" href="Users.php">Users</a>
      
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Education Module</span>
  </a>
  <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Education Module</h6>
    <a class="collapse-item" href="{{url('education/dashboard')}}">Institution</a>

    <a class="collapse-item" href="{{url('education/enrolments')}}">Enrolments</a>
     <a class="collapse-item" href="{{url('education/collage-info')}}">Collage info</a>
      <a class="collapse-item" href="Collages-courses.php">Collages courses</a>
      <a class="collapse-item" href="{{url('ccc-courses')}}">ccc courses</a>
      
      
    </div>
  </div>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span> Invoice and Receipt</span>
  </a>
  <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Invoice and Receipt</h6>
      <a class="collapse-item" href="Manage-Dashboard.php">Dashbord</a>
      <a class="collapse-item" href="Manage-Client-list.php">Manage Client list</a>
      <a class="collapse-item" href="manage-client-dahboard.php">Manage Client Dahboard</a>
      <a class="collapse-item" href="Manage-Case.php">Manage Case</a>
      
    </div>
  </div>
</li> -->





<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span> HR </span>
  </a>
  <div id="hr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a  class="collapse-item"  href={{url('employee-list')}}>Employee</a>
      <a   class="collapse-item"  href={{url('/hr-section/ktslogin/add-new-employee.php')}}>Add New Employee</a>
      <a class="collapse-item"  href={{url('/hr-section/ktslogin/attendance.php')}}>Attendance</a>
      
      
    </div>
  </div>
</li>



<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#work" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span> Work </span>
  </a>
  <div id="work" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a  class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/daily-add-work.php')}}>Add New work</a>
      <a   class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/view-individual-work.php')}}>View Work</a>
      <a class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/view-work-duration.php')}}>View Work Duration</a>
      
      
    </div>
  </div>
</li>



{{-- 

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#work" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span> Knowledge Base </span>
  </a>
  <div id="work" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a  class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/daily-add-work.php')}}>Add New work</a>
      <a   class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/view-individual-work.php')}}>View Work</a>
      <a class="collapse-item"  href={{url('/hr-section/ktslogin//workflow/view-work-duration.php')}}>View Work Duration</a>
      
      
    </div>
  </div>
</li> --}} -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

<?php 
}
elseif(Auth::user()->usertype_status == 5){
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  toggled" id="accordionSidebar" style="background-color: #34495e !important;">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leads" aria-expanded="true" aria-controls="collapseTo">
        <i class="far fa-address-book"></i>
          <span>Leads Manager</span>
        </a>
        <div id="leads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
            <h6 class="collapse-header">Leads Manager</h6>
            <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-leads')}}" id="create_agent_button"> Add Lead</a>
            <a class="collapse-item" href="{{url(Request::segment(1).'/'.'enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">View Lead</a>
             <a class="collapse-item" href="{{url(Request::segment(1).'/'.'lead-dashboard')}}" id="create_agent_button"> Lead Dashboard </a>
            {{-- <a class="collapse-item" href="#">Today Follwer</a> --}}
            
          </div>
        </div>
      </li>

      
<li class="nav-item @if($page == 'student'){{'activess' }} @endif">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapseTo">
    <i class="fas fa-user-graduate"></i>
      <span>Student Manager</span>
    </a>
    <div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
        <h6 class="collapse-header">Student Manager</h6>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-student')}}" id="create_agent_button"> Add Student</a>
          
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-list')}}">View Student</a>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-dashboard')}}" id="create_agent_button">Student Dshboard</a>
        {{-- <a class="collapse-item" href="#" id="create_agent_button">Text</a>
        <a class="collapse-item" href="#">Today Call</a> --}}
        
      </div>
    </div>
  </li>
  <li class="nav-item @if($page == 'institute'){{'activess' }} @endif ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#university2" aria-expanded="true" aria-controls="collapseTo">
    <i class="fas fa-university"></i>
      <span>University / Institute Manager</span>
    </a>
    <div id="university2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
       
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/dashboard')}}" id="create_agent_button"> Institution </a>
        
        {{-- <a class="collapse-item" href="{{url(Request::segment(1).'/'.'application')}}">Application </a> --}}
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/add-institution')}}">Add Institution </a>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'filter-course-section')}}">Filter </a>
        <!-- <a class="collapse-item" href="#" id="create_agent_button">Dashboard</a -->
        
      </div>
    </div>
  </li>  
  @if( Auth::user()->usertype_status =='5'  )
<li class="nav-item @if($page == 'hr'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-briefcase"></i>
    <span>HR</span>
  </a>
  <div id="hr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">HR</h6>
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'add-employee')}}"  id="create_agent_button2" >Add Employee</a> 
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'existing-agent')}}" id="create_agent_button">Employee</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'attendance')}}"  id="" >  Attendaance </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'payroll')}}"  id="" >  Payroll </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'recruitment')}}"> Recruitment </a>
      
    </div>
  </div>
</li>
{{--
<li>
      <a class="collapse-item" href="https://immigration.craftzvilla.com/imm/hrm/autologin?id={{ auth::user()->hrm_id }}&api_token={{$email}}">HRM</a>
</li> --}}
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>

<?php

} 

elseif(Auth::user()->usertype_status == 6){
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  toggled" id="accordionSidebar" style="background-color: #34495e !important;">

    <li class="nav-item @if($page == 'lead'){{'activess' }} @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leads" aria-expanded="true" aria-controls="collapseTo">
        <i class="far fa-address-book"></i>
          <span>Leads Manager</span>
        </a>
        <div id="leads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
            <h6 class="collapse-header">Leads Manager</h6>
            <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-leads')}}" id="create_agent_button"> Add Lead</a>
            <a class="collapse-item" href="{{url(Request::segment(1).'/'.'enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">View Lead</a>
             <a class="collapse-item" href="{{url(Request::segment(1).'/'.'lead-dashboard')}}" id="create_agent_button"> Lead Dashboard </a>
            {{-- <a class="collapse-item" href="#">Today Follwer</a> --}}
            
          </div>
        </div>
      </li>

      
<li class="nav-item @if($page == 'student'){{'activess' }} @endif">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapseTo">
    <i class="fas fa-user-graduate"></i>
      <span>Student Manager</span>
    </a>
    <div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
        <h6 class="collapse-header">Student Manager</h6>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-student')}}" id="create_agent_button"> Add Student</a>
          
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-list')}}">View Student</a>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-dashboard')}}" id="create_agent_button">Student Dshboard</a>
        {{-- <a class="collapse-item" href="#" id="create_agent_button">Text</a>
        <a class="collapse-item" href="#">Today Call</a> --}}
        
      </div>
    </div>
  </li>
  <li class="nav-item @if($page == 'university'){{'activess' }} @endif">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#university2" aria-expanded="true" aria-controls="collapseTo">
    <i class="fas fa-university"></i>
      <span>University / Institute Manager</span>
    </a>
    <div id="university2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
       
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/dashboard')}}" id="create_agent_button"> Institution </a>
        
        {{-- <a class="collapse-item" href="{{url(Request::segment(1).'/'.'application')}}">Application </a> --}}
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/add-institution')}}">Add Institution </a>
        <a class="collapse-item" href="{{url(Request::segment(1).'/'.'filter-course-section')}}">Filter </a>
        <!-- <a class="collapse-item" href="#" id="create_agent_button">Dashboard</a -->
        
      </div>
    </div>
  </li>  
  @if( Auth::user()->usertype_status == 6  )
<li class="nav-item @if($page == 'hr'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-briefcase"></i>
    <span>HR</span>
  </a>
  <div id="hr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">HR</h6>
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'add-employee')}}"  id="create_agent_button2" >Add Employee</a> 
      <a class="collapse-item" href="{{ url(Request::segment(1).'/'.'existing-agent')}}" id="create_agent_button">Employee</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'attendance')}}"  id="" >  Attendaance </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'payroll')}}"  id="" >  Payroll </a> 
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'recruitment')}}"> Recruitment </a>
      
    </div>
  </div>
</li>

@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>

<?php

}

elseif(Auth::user()->usertype_status == 4){
  

?>


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  toggled" id="accordionSidebar" style="background-color: #34495e !important;">



{{--
      <a class="collapse-item" href="https://immigration.craftzvilla.com/imm/hrm/autologin?id={{ auth::id() }}&api_token={{$email}}">HRM</a>
--}}




  <li class="nav-item @if($page == 'lead'){{'activess' }} @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leads" aria-expanded="true" aria-controls="collapseTo">
      <i class="far fa-address-book"></i>
        <span>Leads Manager</span>
      </a>
      <div id="leads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
          <h6 class="collapse-header">Leads Manager</h6>
          <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-leads')}}" id="create_agent_button"> Add Lead</a>
          <a class="collapse-item" href="{{url(Request::segment(1).'/'.'enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id)) }}">View Lead</a>
           <a class="collapse-item" href="{{url(Request::segment(1).'/'.'lead-dashboard')}}" id="create_agent_button"> Lead Dashboard </a>
          {{-- <a class="collapse-item" href="#">Today Follwer</a> --}}
          
        </div>
      </div>
    </li>

    
<li class="nav-item @if($page == 'student'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-user-graduate"></i>
    <span>Student Manager</span>
  </a>
  <div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
      <h6 class="collapse-header">Student Manager</h6>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'add-student')}}" id="create_agent_button"> Add Student</a>
        
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-list')}}">View Student</a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'student-dashboard')}}" id="create_agent_button">Student Dshboard</a>
      {{-- <a class="collapse-item" href="#" id="create_agent_button">Text</a>
      <a class="collapse-item" href="#">Today Call</a> --}}
      
    </div>
  </div>
</li>
<li class="nav-item @if($page == 'university'){{'activess' }} @endif">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#university2" aria-expanded="true" aria-controls="collapseTo">
  <i class="fas fa-university"></i>
    <span>University / Institute Manager</span>
  </a>
  <div id="university2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded reg-form" id="desk_en">
     
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/dashboard')}}" id="create_agent_button"> Institution </a>
      
      {{-- <a class="collapse-item" href="{{url(Request::segment(1).'/'.'application')}}">Application </a> --}}
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'education/add-institution')}}">Add Institution </a>
      <a class="collapse-item" href="{{url(Request::segment(1).'/'.'filter-course-section')}}">Filter </a>
      <!-- <a class="collapse-item" href="#" id="create_agent_button">Dashboard</a -->
      
    </div>
  </div>
</li>  

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>


<?php  

}

?>


  <script>
$(document).ready(function(){
  
  $(document).click(function(){
$('#accordionSidebar div').removeClass('show')
  });

  ('.navbar-nav .nav-item').click(function(){
     $(this).addClass('active'); // add the class to the element that's clicked.
      $(this).removeClass('active'); // remove the class from siblings. 
});

  });
  document.onclick = function(event){
    //  console.log(event.target)
      let modl = document.querySelectorAll('.modal'); 
      document.querySelectorAll('.modal'); 
      
      for(var mod of modl)
      {
         if(event.target == mod){
           mod.style.display="none" 
        }else{
          // mod.style.display="block" 
        }
      }
     }

  </script>
  
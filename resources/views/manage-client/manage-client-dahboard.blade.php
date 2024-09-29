
@extends('header')
@section('manageclient')
<body id="page-top">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="container-fluid">
    <p>Dashboard/Clients</p>
  </div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-4 col-12">
				<img src="https://i.stack.imgur.com/l60Hf.png" width="150px;">
				
			</div>
			<div class="col-lg-4 col-md-12 col-12 k2clientprofile">
				<div><p class="k2profilename">Default Name # Client id</p></div>
				<div><i class="fa fa-envelope" aria-h
          idden="true"></i>&nbsp;Linda@bbb.com</div>
				<div><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;0458759564</div>
			</div>
<div class="col-lg-6 col-md-12 col-12 col-sm-12 k2clientopt">
	<button type="submi" class="btn btn-danger" value="Enrollment"><i class="fa fa-plus dbviewclient" aria-hidden="true">Enrollment</i></button>
      <button type="submit" class="btn btn-danger" value="Opportunity"><i class="fa fa-download dbviewclient" aria-hidden="true">Opportunity</i></button>
      <button type="submit" class="btn btn-danger" value="case"><i class="fa fa-download dbviewclient" aria-hidden="true">Case</i></button>
      <button type="submit" class="btn btn-danger" value="Active Client">Active Client Portal</button>
      <button type="submit" class="btn btn-danger" value="forward"><i class="fa fa-mail-forward"></i></button>
      <button type="submit" class="btn btn-danger" value="drpdwn"><i class="fa fa-sort-down"></i></button>
  </div>
</div>
<div class="container-fluid my-5">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12 k2clientdbopt">
      <button type="submit" value="View Client"><i class="fa fa-home" aria-hidden="true">&nbsp;Home</i></button>
      <button type="submit" value="View Client" onclick="open_profile_tab();">
        <i class="fa fa-user" aria-hidden="true" >&nbsp;Profile</i>
      </button>
      <button type="submit" value="View Client"><i class="fa fa-usd" aria-hidden="true">&nbsp;Invoice</i>
      </button>
      <button type="submit" value="View Client"><i class="fa fa-pencil" aria-hidden="true">&nbsp;Notes</i></button>
      <button type="submit" value="View Client"><i class="fa fa-envelope" aria-hidden="true">&nbsp;Emails</i></button>
      <button type="submit" value="View Client"><i class="fa fa-copy" aria-hidden="true">&nbsp;Documents</i></button>
      <hr>
    </div>
  </div>
</div>

{{-- open profile tab  --}}

<div class="container-fluid" id="profile_tab_show" style="display:none">
  <div class="row">
    <div class="col-sm-21">
        <ul class="nav nav-tabs" role="tablist" id="attendance">
            <li class="nav-item">
                    <a class="nav-link  active"  href="#home_tab" role="tab" data-toggle="tab">About </a>
                </li>
        <li class="nav-item">
        <a class="nav-link " href="#profile_tab" role="tab" data-toggle="tab">Address </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#invoice_tab" role="tab" data-toggle="tab">Relationship </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#passport_tab" role="tab" data-toggle="tab">Passport </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#notes_tab" role="tab" data-toggle="tab">Visa </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#email_tab" role="tab" data-toggle="tab">Enrolment </a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link " href="#education_tab" role="tab" data-toggle="tab">Education </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link " href="#english_tab" role="tab" data-toggle="tab">English </a>
                            </li>
    </ul>


    <div class="tab-content content-style active  my-4" id="attendance_page_tab">
      <div role="tabpane" class="tab-pane  active" id="home_tab">
      
             this is home
</div>
<div role="tabpane" class="tab-pane  " id="profile_tab">
  this is profile tab
</div>

<div role="tabpane" class="tab-pane  " id="passport_tab">
  <div>   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_passport">Add Passport</button>
  </div> 
{{-- open add  passposrt  modal --}}

<div id="add_passport" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <span class="close">&times;</span>
    <h5 class="callbacklater">Add Passport</h5>
    
    {{Form::open(array('url'=>"add-passport" , 'class' => 'form'))}}
    
    <div class="comment-section">
      <label for="passpost_image"></label>
      {{Form::file('passpost_image', array('id' => 'passpost_image'))}}
      
<input type="date" class="callbacklater" name="callbacklater" id="callbackdate">
<input type="time" class="callbacklater" name="callbacklater_time" id="callbacktime">
<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
{{-- <input type="textarea" name="comment" id = "comment"> --}}
    </div>
{{Form::submit('Save', array('class' => ' w-10 my-3', 'id' =>'save_comment_button'))}}
{{Form::close()}}

  </div>
</div>
{{-- end add passport modal --}}
</div>

  </div>


    </div></div></div>

    {{-- close profile tab  --}}

<div class="container-fluid">
  <div class="k2tbhead"><h3>Cases</h3></div>
 <table class="table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs k2clienttb">
    <thead>
    <tr>
        <th>Case Reference</th>
        <th>Case Type</th>
        <th>Subclass</th>
        <th>Date Added</th>
         <th>Last Progress</th>
         <th>Progress Date</th>
         <th>Staff</th>
         <th><i class="fa fa-caret-down" aria-hidden="true"></i></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CL62</td>
        <td>Visa service</td>
        <td>143</td>
        <td>12/09/2017</td>
        <td>Contract signed</td>
        <td>12/09/2017</td>
        <td>Demo</td>
        <td>12/09/2017</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container-fluid">
  <div class="k2tbhead"><h3>Enrollments</h3></div>
 <table class="table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs k2dashboardtable">
    <thead>
    <tr>
        <th>Case Reference</th>
        <th>Institution</th>
        <th>Course</th>
        <th>Start Date</th>
         <th>End Date</th>
         <th>Status</th>
         <th>Staff</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CL62</td>
        <td>Visa Service</td>
        <td>153</td>
        <td>12/09/2017</td>
        <td>12/09/2017</td>
        <td>Application Send</td>
        <td>Demo</td>
      </tr>
    </tbody>
  </table>
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <script>
     function open_profile_tab(){
document.getElementById('profile_tab_show').style.display="block " ;
     }
     </script>     

@endsection

@extends('header')
@section('tab')      
<?php 
// include("public/css/link-up.php");
 ?>
    <style>
    #accordionSidebar{
      display: none;
    }
    </style>
   <div class="container-fluid imm-home-con imm-content show2">
 <div class="imm-btn-parent">
<div class="logo-box">
	<img src="public/images/logo.png" alt="logo"/>
</div>
<div class="imm-buttons">
	<div><button type="button" class="btn imm-button"><i class="fa fa-user"></i> Student</button></div>
	<div><button type="button" class="btn imm-button"><i class="fa fa-plane"></i> Immigration/Visa</button></div>
	<div><button type="button" class="btn imm-button"><i class="fa fa-users"></i> Meeting</button></div>
</div>
</div>
 </div> 

<!-- Verify Phone section starts -->

 <div class="container imm-con-1 imm-content imm-content1">
    {{Form::open(array('url' => 'enquiry-tablet', 'files'=>'true'))}}    
 	<div>
 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Please Enter Your Details</h6>
 	<div class="phone-parent">
 	<div class="country-code">
 	  <label for="inp1" class="inp">
       <input type="text" id="inp1" value="+91" placeholder="&nbsp;" disabled>
     
       </label>
 	</div>
	  <div class="phone-input">
	   <label for="mobileinp" class="inp">
       <input type="text" name="contact" id="mobileinp" autocomplete="off" placeholder="&nbsp;" onkeyup = "mobilevalidate()" onblur="mobilevalidate()" maxlength="10">
       <span class="label">Mobile Number</span>
       <span class="border"></span>
      </label>
      <div class="text-left text-danger font-weight-bold"><small id="mobmsg"></small></div>
	  </div>
	  <div><button class="btn imm-button1 mx-2" data-toggle="modal" data-target="#verifyOtp" disabled id="verifymob">Verify</button></div>

<!-- Verify OTP modal starts -->

	   <!-- The Modal -->
  <div class="modal fade" id="verifyOtp">
    <div class="modal-dialog">
      <div class="modal-content">
      
     
        <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <!-- Modal body -->
        <div class="modal-body">
     <div class="container otp-box">
  <div class="row justify-content-md-center">
      <div class="col-md-8 text-center">
        <div class="row">
          <div class="col-sm-12 bgWhite">
            <div class="title">
              Verify OTP
            </div>
            
            <for action="" class="my-5" id="otpsubmit">
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
              <input class="otp clickdisabled" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
              <input class="otp clickdisabled" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
              <input class="otp clickdisabled" type="text" oninput='digitValidate(this)' onkeyup='submitotp();tabChange(4)' maxlength=1 >
              <div class="trasparent-layer"></div>
             <small id="otpmsg"></small>
			<div class="mt-2"><button type="button" id="go" class="btn btn-sm imm-button1">Resend OTP</button></div>
            </for>
          </div>
        </div>
      </div>
  </div>
</div>
        </div>
        
    
        
      </div>
    </div>
  </div>
  <!-- Verify OTP modal ends -->
	  </div>
	  <div class="my-2"><strong>Or</strong></div>
	  <div><button class="btn btn-danger">Having Invites ?</button></div>
 
	  <div class="imm-btngroup mt-2">
	  <div><button class="btn btn-success" type="button" id="prevbtn1">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn1">Next</button></div>

	</div>
	</div>

 	</div>
<!-- Verify Phone section ends -->


<!-- General Details Section Starts -->
 <div class="container imm-con-1 imm-general-dtl imm-content imm-content2">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>General Details</h6>
 <div class="imm-card">
 	<div>
 	<div class="row">
 		<div class="col-md-4">
 	   <label for="nameinp" class="inp">
       <input type="text" name="name" id="nameinp" placeholder="&nbsp;" onkeyup = "namevalidate()" onblur="namevalidate()">
       <span class="label">Name<sup>*</sup></span>
       <span class="border"></span>
      </label>
      <div class="text-left text-danger font-weight-bold"><small id="namemsg"></small></div>
 		</div>
 		<div class="col-md-4">
 			  <label for="dobinp" class="inp">
       <input type="text" name="dob" id="dobinp" placeholder="&nbsp;" disabled  onblur="dobreqd()" onchange="dobvalid()" onkeydown="return false;"/>
       <span class="label">DOB<sup>*</sup></span>
       <span class="border"></span>
      </label>
       <div class="text-left text-danger font-weight-bold"><small id="dobmsg"></small></div>
 		</div>
 			<div class="col-md-4">
 			<label for="emailinp" class="inp">
       <input type="text" name="email" id="emailinp" placeholder="&nbsp;" disabled onblur='emailvalid()' onkeyup="emailvalid()">
       <span class="label">Email<sup>*</sup></span>
       <span class="border"></span>
      </label>
       <div class="text-left text-danger font-weight-bold"><small id="emailmsg"></small></div>
 		</div>
 	</div>
 	 	<div class="row row-margin-big">
 		<div class="col-md-12">
 	   <label for="addrinp" class="inp">
       <input type="text" name="address" id="addrinp" placeholder="&nbsp;" disabled onblur="addrvalid()" onkeyup="addrvalid()">
       <span class="label">Address<sup>*</sup></span>
       <span class="border"></span>
      </label>
             <div class="text-left text-danger font-weight-bold"><small id="addrmsg"></small></div>
 		</div>
 	
 		<div class="col-md-6 gender-input my-4">
 		    <div id="selectgender"  class="wrapper-dropdown" tabindex="1" onclick="enablepurposevisit()"><span>Select Gender</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">Male</a></li>
        <li><a href="javascript:void(0);">Female</a></li>
        <li><a href="javascript:void(0);">Unspecified</a></li>      
      </ul>
    </div>
 		
 		</div>
 		<div class="col-md-6 my-4">
 			
    <div id="dd1"  class="wrapper-dropdown" tabindex="1"><span>Purpose of Visit</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">TOEFL</a></li>
        <li><a href="javascript:void(0);">IELTS</a></li>
        <li><a href="javascript:void(0);">PTE</a></li>
        <li><a href="javascript:void(0);">OET</a></li>
        <li><a href="javascript:void(0);">PR</a></li>
        <li><a href="javascript:void(0);">Immigration</a></li>
        <li><a href="javascript:void(0);">Work Visa</a></li>
        <li><a href="javascript:void(0);">Student Visa</a></li>
      </ul>
    </div>

 		</div>
 	</div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn2">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn2">Next</button></div>

	</div>
	</div>

 	</div>
<!-- General Details Section ends -->

<!-- Select your Post section starts -->
 <div class="container imm-con-1 imm-select-post imm-content imm-content3">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Select Your Host</h6>
 <div class="imm-card">
 	<div>
 
 	 	<div class="row row-margin-big">
 	
 		<div class="col-md-6">

    <div id="dd2" class="wrapper-dropdown" tabindex="1"><span>Select</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">General</a></li>
        <li><a href="javascript:void(0);">option1</a></li>
        <li><a href="javascript:void(0);">option2</a></li>
        <li><a href="javascript:void(0);">option3</a></li>
      
      </ul>
    </div>

 		</div>
 	</div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn3">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn3">Next</button></div>

	</div>
	</div>

 	</div>
<!-- Select your Post section ends -->






<!-- Education section starts here -->
 <div class="container imm-con-1 imm-education-dtl imm-content imm-content4">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Education Details</h6>
 <div class="imm-card">
 	<div class="edu-con">
 	<div class="row edu-row">
 		<div class="col-md-2">
 	   <div class="wrapper-dropdown" id="edu-dd" tabindex="1"><span>Qualification</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">10</a></li>
        <li><a href="javascript:void(0);">12</a></li>
        <li><a href="javascript:void(0);">Diploma</a></li>
        <li><a href="javascript:void(0);">Bachelors</a></li>
        <li><a href="javascript:void(0);">Masters</a></li>
        <li><a href="javascript:void(0);">PHD/Dr.</a></li>
      
      </ul>
    </div>
 		</div>
 		<div class="col-md-3">
 			  <label  class="inp">
       <input type="text" name="edu_stream[]" placeholder="&nbsp;">
       <span class="label">Stream<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 			<div class="col-md-3">
 			<label  class="inp">
       <input type="text" name="institute_name[]" placeholder="&nbsp;">
       <span class="label">Name of Inst./University<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text" name="'passing_year[]" placeholder="&nbsp;">
       <span class="label">Year of Passing<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text" name="percentage[]"  placeholder="&nbsp;">
       <span class="label">Percentage<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 	</div>
<div id="edu-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button class="imm-append-btn" id="edu-append-btn">+</button>
 	</div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn4">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn4">Next</button></div>

	</div>
	</div>

 	</div>
<!-- Education section ends here -->

<!-- work section starts here -->
<div class="container imm-con-1 imm-education-dtl imm-content imm-content5">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Work Experience</h6>
 <div class="imm-card">
 	<div class="edu-con">
 	<div class="row edu-row">

 		<div class="col-md-2">
 			  <label  class="inp">
       <input type="text" name="company[]" placeholder="&nbsp;">
       <span class="label">Company Name<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 			<div class="col-md-2">
 			<label  class="inp">
       <input type="text" name="designation[]"  placeholder="&nbsp;">
       <span class="label">Designation<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text" name="exp_start[]" placeholder="&nbsp;">
       <span class="label">Start Date<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text"  name="exp_end[]" placeholder="&nbsp;">
       <span class="label">End Date<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
    <div class="col-md-1 my-auto">
       <small>OR</small>
    </div>
        <div class="col-md-3">
        <label  class="inp">
       <input type="text" placeholder="&nbsp;">
       <span class="label">Duration<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
 	</div>
<div id="work-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button class="imm-append-btn" id="work-append-btn">+</button>
 	</div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn5">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn5">Next</button></div>

	</div>
	</div>

 	</div>
<!-- work section ends here -->

<!-- english language test section starts here -->
<div class="container imm-con-1 imm-education-dtl imm-eng-dtl imm-content imm-content6">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>English Language Test</h6>
 <div class="imm-card">
 	<div class="edu-con">
 	<div class="row text-left my-4 eng-radio">
 		<div class="col-md-2">
 			<strong>TOEFL :</strong>
 		</div>
 				<div class="col-md-4">
 			<input type="radio" checked name="toeflselect" id="toefl-nottaken" onclick="toeflhide()" /><label for="toefl-nottaken">&nbsp;Not Taken</label>
 		</div>
 		<div class="col-md-4">
 			<input type="radio" name="toeflselect" id="toefl-taken" onclick="toeflshow()" /><label for="toefl-taken">&nbsp;Taken</label>
 		</div>
 	
 	</div>
 	<div class="toefl-section">
 	<h6 class="m-0 mb-2">TOEFL SCORE</h6>
 	<div class="row edu-row">
		
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd1" tabindex="1"><span>Listening Score</span>
      <ul class="dropdown toefl-options"></ul>
    </div>
 		</div>
 	
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd2" tabindex="1"><span>Reading Score</span>
      <ul class="dropdown toefl-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd3" tabindex="1"><span>Writing Score</span>
   <ul class="dropdown toefl-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd4" tabindex="1"><span>Speaking Score</span>
    <ul class="dropdown toefl-options"></ul>
    </div>
 		</div>
 	</div>
 	</div>
  	<div class="row my-4 text-left eng-radio">
 		<div class="col-md-2">
 			<strong>IELTS :</strong>
 		</div>
 				<div class="col-md-4">
 			<input type="radio" checked name="ieltsselect" id="ielts-nottaken" onclick="ieltshide()" /><label for="ielts-nottaken">&nbsp;Not Taken</label>
 		</div>
 		<div class="col-md-4">
 			<input type="radio" name="ieltsselect" id="ielts-taken" onclick="ieltsshow()" /><label for="ielts-taken">&nbsp;Taken</label>
 		</div>
 	
 	</div>
 <div class="ielts-section">
 	<h6 class="m-0 my-4">IELTS SCORE</h6>
<div class="row edu-row">
		
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd5" tabindex="1"><span>Listening Score</span>
      <ul class="dropdown ielts-options"></ul>
    </div>
 		</div>
 	
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd6" tabindex="1"><span>Reading Score</span>
     <ul class="dropdown ielts-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd7" tabindex="1"><span>Writing Score</span>
      <ul class="dropdown ielts-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd8" tabindex="1"><span>Speaking Score</span>
    <ul class="dropdown ielts-options"></ul>
    </div>
 		</div>
 	</div>
</div>
  	<div class="row my-4 text-left eng-radio">
 		<div class="col-md-2">
 			<strong>PTE :</strong>
 		</div>
 			<div class="col-md-4">
 			<input type="radio" checked name="pteselect" id="pte-nottaken" onclick="ptehide()" /><label for="pte-nottaken">&nbsp;Not Taken</label>
 		</div>
 		<div class="col-md-4">
 			<input type="radio" name="pteselect" id="pte-taken" onclick="pteshow()" /><label for="pte-taken">&nbsp;Taken</label>
 		</div>
 		
 	</div>
 <div class="pte-section">
 	<h6 class="m-0 my-4">PTE SCORE</h6>
<div class="row edu-row">
		
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd9" tabindex="1"><span>Listening Score</span>
      <ul class="dropdown pte-options"></ul>
    </div>
 		</div>
 	
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd10" tabindex="1"><span>Reading Score</span>
  <ul class="dropdown pte-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd11" tabindex="1"><span>Writing Score</span>
 <ul class="dropdown pte-options"></ul>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd12" tabindex="1"><span>Speaking Score</span>
     <ul class="dropdown pte-options"></ul>
    </div>
 		</div>
 	</div>
</div>
  	<div class="row my-4 text-left eng-radio">
 		<div class="col-md-2">
 			<strong>OET :</strong>
 		</div>
 			<div class="col-md-4">
 			<input type="radio" checked name="oetselect" id="oet-nottaken" onclick="oethide()" /><label for="oet-nottaken">&nbsp;Not Taken</label>
 		</div>
 		<div class="col-md-4">
 			<input type="radio" name="oetselect" id="oet-taken" onclick="oetshow()" /><label for="oet-taken">&nbsp;Taken</label>
 		</div>
 		
 	</div>
 <div class="oet-section">
 	<h6 class="m-0 my-4">OET SCORE</h6>
<div class="row edu-row">
		
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd13" tabindex="1"><span>Listening Grade</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
  
      
      </ul>
    </div>
    <div class="mt-4">
    			  <label  class="inp">
       <input type="text" placeholder="&nbsp;">
       <span class="label">Enter Score<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
 		</div>
 	
 		<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd14" tabindex="1"><span>Reading Grade</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      </ul>
    </div>
    <div class="mt-4">
    			  <label  class="inp">
       <input type="text" placeholder="&nbsp;">
       <span class="label">Enter Score<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd15" tabindex="1"><span>Writing Grade</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      
      </ul>
    </div>
    <div class="mt-4">
    			  <label  class="inp">
       <input type="text" placeholder="&nbsp;">
       <span class="label">Enter Score<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
 		</div>
 			<div class="col-md-3">
 		   <div class="wrapper-dropdown" id="eng-dd16" tabindex="1"><span>Speaking Grade</span>
      <ul class="dropdown">
         <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      
      </ul>
    </div>
    <div class="mt-4">
    			  <label  class="inp">
       <input type="text" placeholder="&nbsp;">
       <span class="label">Enter Score<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
 		</div>
 	</div>
 	
</div>
 	</div>


 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn6">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn6">Next</button></div>

	</div>
	</div>

 	</div>


<!-- english language test section ends here -->

<!-- immigration section starts here -->
 <div class="container imm-con-1 imm-education-dtl imm-imm-detail imm-content imm-content7">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Immigration History</h6>
 <div class="imm-card">
 	<div class="edu-con">
 	<div class="row edu-row">
 		<div class="col-md-3">
 	   <div class="wrapper-dropdown" id="immi-dd"  tabindex="1"><span>Country Travelled ?</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">10</a></li>
        <li><a href="javascript:void(0);">12</a></li>
        <li><a href="javascript:void(0);">Diploma</a></li>
        <li><a href="javascript:void(0);">Bachelors</a></li>
        <li><a href="javascript:void(0);">Masters</a></li>
        <li><a href="javascript:void(0);">PHD/Dr.</a></li>
      
      </ul>
    </div>
 		</div>
 				<div class="col-md-3">
 	   <label  class="inp">
       <input type="text" name="" placeholder="&nbsp;" id="imm-fromdate">
       <span class="label">From<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 					<div class="col-md-3">
 	   <label  class="inp">
       <input type="text" name=""  placeholder="&nbsp;" id="imm-todate">
       <span class="label">To<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-3">
 	   <label  class="inp">
       <input type="text"  placeholder="&nbsp;">
       <span class="label">Duration<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>

 	</div>
<div id="immi-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button class="imm-append-btn" id="immi-append-btn">+</button>
 	</div>
 </div>

 <div class="row my-4">
 	<div class="col-md-8 text-left">
 		<p>Any Visa Rejected Before ?</p>
 	</div>
 	<div class="col-md-4">
 		<div class="visa-adj">
 			<div><input type="radio" checked name="visaselect" id="visa-notreject" onclick="visahide()" /><label for="visa-notreject">&nbsp;Not Rejected</label></div>
 			<div>
 				<input type="radio"  name="visaselect" id="visa-reject" onclick="visashow()" /><label for="visa-reject">&nbsp;Rejected</label>
 			</div>
 				
 		</div>
 		<div class="visa-reject-country">
 			   <div class="wrapper-dropdown" id="reject-visa-country" tabindex="1"><span>Select Country</span>
      <ul class="dropdown">
         <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      
      </ul>
    </div>
    <div id="reject-visa-append-options"></div>
    <div class="text-right mt-2"><button class="imm-append-btn" id="visa-append-btn">+</button></div>
 		</div>
 	</div>
 	
 		
 
 </div>
 <div class="row">
 	<div class="col-md-8 text-left">
 		<p>Interested for Intake :</p>
 	</div>
 	<div class="col-md-4">
 				   <div class="wrapper-dropdown" id="reject-visa-month" tabindex="1"><span>Select Month</span>
      <ul class="dropdown">
         <li><a href="javascript:void(0);">January</a></li>
        <li><a href="javascript:void(0);">February</a></li>
        <li><a href="javascript:void(0);">March</a></li>
        <li><a href="javascript:void(0);">April</a></li>
        <li><a href="javascript:void(0);">May</a></li>
        <li><a href="javascript:void(0);">June</a></li>
        <li><a href="javascript:void(0);">July</a></li>
        <li><a href="javascript:void(0);">August</a></li>
        <li><a href="javascript:void(0);">September</a></li>
        <li><a href="javascript:void(0);">October</a></li>
        <li><a href="javascript:void(0);">November</a></li>
        <li><a href="javascript:void(0);">December</a></li>
      
      </ul>
    </div>
 	</div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn7">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn7">Next</button></div>

	</div>
	</div>

 	</div>
<!-- immigration section ends here -->

<!-- course enrollment section starts here -->

 <div class="container imm-con-1 imm-education-dtl imm-course-dtl imm-content imm-content8">
  <div>
        <div class="form-logo">
  <img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
  <h6>Course Enrollment Details</h6>
 <div class="imm-card">
  <div class="edu-con">
  <div class="row edu-row">
  
    <div class="col-md-3">
         <label  class="inp">
       <input type="text"  placeholder="&nbsp;" id="imm-session-start">
       <span class="label">Start Session<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
      <div class="col-md-3 course-country">
           <div class="wrapper-dropdown" id="select-course-country" tabindex="1"><span>Select Country</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      
      </ul>
    </div>
    </div>
        <div class="col-md-6">
     <label  class="inp">
       <input type="text"  placeholder="&nbsp;">
       <span class="label">Course<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
    
  </div>
  </div>
 </div>
  

    <div class="imm-btngroup my-4">
    <div><button class="btn btn-success" type="button" id="prevbtn8">Prev</button></div>
    <div><button class="btn btn-success" type="button" id="nextbtn8">Next</button></div>

  </div>
  </div>

  </div>

<!-- course enrollment section ends here -->

<!-- financial section starts here -->
<div class="container imm-con-1 imm-education-dtl imm-financial-dtl imm-content imm-content9">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Financial</h6>
 <div class="imm-card">
 	<div class="edu-con">
 		<h6 class="text-left">How student will show financials?</h6>
 	<div class="row edu-row">

 		<div class="col-md-6">
 		   <div class="wrapper-dropdown" id="financial-options" tabindex="1"><span>Select</span>
      <ul class="dropdown">
         <li><a href="javascript:void(0);">Bank loan</a></li>
        <li><a href="javascript:void(0);">Personal Fund</a></li>
        <li><a href="javascript:void(0);">Family Sponsorship</a></li>
        <li><a href="javascript:void(0);">Third Party Sponsorship</a></li>
        <li><a href="javascript:void(0);">Other</a></li>
 
      
      </ul>
    </div>
 		</div>
      <div class="col-md-3" id="other-financial-source">
        <label  class="inp">
       <input type="text"  placeholder="&nbsp;">
       <span class="label">Enter Financial Source<sup>*</sup></span>
       <span class="border"></span>
      </label>

      </div>
 			<div class="col-md-3">
 			<label  class="inp">
       <input type="text"  placeholder="&nbsp;">
       <span class="label">Enter Amount<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 
 	</div>
  <div id="finance-options-append"></div>
 <div class="row mt-2">
  <div class="col-12 text-right">
    <button class="imm-append-btn" id="finance-append-btn">+</button>
  </div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn9">Prev</button></div>
	  <div><button class="btn btn-success" type="button" id="nextbtn9">Next</button></div>

	</div>
	</div>

 	</div>


<!-- financial section ends here -->

<!-- marital status section starts -->

 <div class="container imm-con-1 imm-marital-status imm-content imm-content10">
  <div>
        <div class="form-logo">
  <img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Marital Status</h6>
 <div class="imm-card">
  <div class="width-adjust-80">
  
    <div class="row marital-options">
 
    <div class="col-md-6">
      <div><input type="radio" name="maritalradio" id="marriedinp" onclick="maritalshow()" checked/><label for="marriedinp">&nbsp;Married</label></div>
    </div>
    <div class="col-md-6">
      <div><input type="radio" name="maritalradio" id="unmarriedinp" onclick="maritalhide()" /><label for="unmarriedinp">&nbsp;Unmarried</label></div>
      
    </div>
  
  </div>

  <div class="row row-margin-big married-options">
    <div class="col-md-6">
     <label for="marriagedateinp" class="inp">
       <input type="text" id="marriagedateinp" placeholder="&nbsp;" onblur="datemarriagereqd()" onchange="marriagedatevalid()" />
       <span class="label">Date of marriage<sup>*</sup></span>
       <span class="border"></span>
      </label>
       <div class="text-left text-danger font-weight-bold"><small id="marriagedatemsg"></small></div>
    </div>
    <div class="col-md-6">
        <label for="spousequalinp" class="inp">
       <input type="text" id="spousequalinp" placeholder="&nbsp;" disabled onkeyup="spousevalid()" onblur="spousevalid()" />
       <span class="label">Spouse Qualification<sup>*</sup></span>
       <span class="border"></span>
      </label>
        <div class="text-left text-danger font-weight-bold"><small id="spouseinpmsg"></small></div>
    </div>
      <div class="col-md-4 spouse-income">
 <p>Spouse Income Proof<sup>*</sup></p>
 <label class="file">
  <input type="file" id="file" aria-label="File browser example" disabled>
  <span class="file-custom"></span>
</label>
<div class="text-left text-danger font-weight-bold"><small id="spouseincomemsg"></small></div>
    </div>
  </div>
  </div>
 </div> 
  

    <div class="imm-btngroup my-4">
    <div><button class="btn btn-success" type="button" id="prevbtn10">Prev</button></div>
    <div><button class="btn btn-success" type="button" id="nextbtn10">Next</button></div>

  </div>
  </div>

  </div>



<!-- marital status section ends -->

<!-- upload image and document starts here -->

<div class="container imm-con-1 imm-education-dtl imm-financial-dtl imm-content imm-content11">
 	<div>
 		 		<div class="form-logo">
	<img src="public/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Upload Image/Documents</h6>
 <div class="imm-card">
 	<div class="edu-con">
 		
 	<div class="row edu-row">

 		<div class="col-md-6">
 		<h6>Upload Profile Picture</h6>

 		<div><input type="file" id="imgInp1"/></div>
 		<div class="mt-4" style="width: 150px; margin: auto;"><img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="" id="blah1" class="w-100" /></div>
 		</div>
 	


 		<div class="col-md-6">
 		<h6>Upload Signature</h6>

 		<div><input type="file" id="imgInp2"/></div>
 		<div class="mt-4" style="width: 150px; margin: auto;"><img src="https://via.placeholder.com/160x194" alt="" id="blah2" class="w-100" /></div>
 		</div>
 	</div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" type="button" id="prevbtn11">Prev</button></div>
	  <div>
      {{-- <button class="btn btn-success" id="nextbtn11">Su</button> --}}
      {{Form::submit('Submit', array('class'=> 'btn btn-success', 'id'=>'nextbtn11'))}}
    </div>

	</div>
	</div>

 	</div>
<!-- upload image and document ends here -->

<!-- thanks subitted info starts -->

<div class="container imm-con-1 imm-education-dtl imm-content imm-content12">

 <div class="imm-card">
 	<div class="edu-con">

 	<h5 class="text-success my-4">Thanks for Submitting your Information</h5>	
	
 	</div>
 </div>
	

	<!--   <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" id="prevbtn6">Prev</button></div>
	  <div><button class="btn btn-success" id="nextbtn6">Next</button></div>

	</div> -->
	</div>

 	</div>
<!-- thanks subitted info ends -->


{{Form::close()}}

 </div>  
     <?php
    	// include("public/js/link-down.php");
    ?>
    @endsection
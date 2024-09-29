<!doctype html>
<html lang="en">
  <head>
    
    	@include('enquiry/link-up')
      <meta  name="csrf-token" content="{{ csrf_token() }}">        
    
  </head>
  <body>
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
{{Form::open(array('url'  =>  'enquiry-tablet', 'files'=>'true'))}}   
 <div class="container imm-con-1 imm-content imm-content1">
 	<div>
 		<div class="form-logo">
	<img src="./public/images/logo.png" alt="logo" class="w-100" />
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
       <input type="text" name="contact"  id="mobileinp" autocomplete="off" placeholder="&nbsp;" onkeyup = "mobilevalidate()" onblur="mobilevalidate()" maxlength="10">
       <span class="label">Mobile Number</span>
       <span class="border"></span>
      </label>
      <div class="text-left text-danger font-weight-bold"><small id="mobmsg"></small></div>
	  </div>
	  <div><button type="button" class="btn imm-button1 mx-2" data-toggle="modal" data-target="#verifyOtp" disabled id="verifymob">Verify</button></div>

<!-- Verify OTP modal starts -->

	   <!-- The Modal -->
  <div class="modal fade" id="verifyOtp">
    <div class="modal-dialog">
      <div class="modal-content">
      
     
        <!-- Modal Header -->
      <div class="modal-header">
        <button type="button"  class="close" data-dismiss="modal">&times;</button>
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
	  <div><button  type="button" class="btn btn-danger">Having Invites ?</button></div>
 
	  <div class="imm-btngroup mt-2">
	  <div><button type="button" class="btn btn-success" id="prevbtn1">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn1">Next</button></div>

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
       <input type="text" name="name"  id="nameinp" placeholder="&nbsp;" onkeyup = "namevalidate()" onblur="namevalidate()">
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
       <input type="text"  name="address" id="addrinp" placeholder="&nbsp;" disabled onblur="addrvalid()" onkeyup="addrvalid()">
       <span class="label">Address<sup>*</sup></span>
       <span class="border"></span>
      </label>
             <div class="text-left text-danger font-weight-bold"><small id="addrmsg"></small></div>
 		</div>
 	
 		<div class="col-md-6 gender-input my-4">
 		    {{-- <div id="selectgender" name="" class="wrapper-dropdown" tabindex="1"  onclick="enablepurposevisit()"><span>Select Gender</span>
      <ul class="dropdown">
        <li><a   href="javascript:void(0);">Male</a></li>
        <li><a   href="javascript:void(0);">Female</a></li>
        <li><a href="javascript:void(0);">Unspecified</a></li>      
      </ul>
     
    </div>
    <input type="text" name="gender" id="selectgender_text" value=""> --}}
<select name="gender" id="" class="select"  tabindex="1"  onclick="enablepurposevisit()">
<option selected disabled>  --Gender-- </option>
  <option value="">  Male</option>
<option value="">  Female</option>
<option value="">  Unspecified</option>
</select>
    
    
	</div>

{{-- 

  
 			
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

     --}}
     
     <div class="col-md-6 my-4">
        <?php    $purposes =  DB::table('enq_purposes')->select('purpose')->get()   ?>
     <select name="purpose_of_query" id="d" class="select">
       <option   selected disabled> --Purpose-- </option>
       @foreach($purposes as $p)
     <option value="{{ $p->purpose }}">  {{ $p->purpose }}</option>
        @endforeach
        </select>

      </div>
 	</div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type="button" class="btn btn-success" id="prevbtn2">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn2">Next</button></div>

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
 	<div style="width: 100%">
 
 	 	<div class="row row-margin-big">
 	
 		<div class="col-md-12">

    {{-- <div id="dd2" class="wrapper-dropdown" tabindex="1"><span>Select</span> --}}
      {{-- <ul class="dropdown">
        <li><a href="javascript:void(0);">General</a></li>
        <li><a href="javascript:void(0);">option1</a></li>
        <li><a href="javascript:void(0);">option2</a></li>
        <li><a href="javascript:void(0);">option3</a></li>
      
      </ul> --}}
    {{-- </div> --}}

    <select name="host" id="dd2" class="select"  tabindex="1"  style="width:250px" >
      <option selected disabled> --Host--</option>
      <option value="General">  General</option>
        <option value="Option">  Option</option>
        <option value="Option">  Option</option>
        <option value="">  Option</option>
        <option value="">  Option</option>
        </select>

      </div>
 	</div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type="button" class="btn btn-success" id="prevbtn3">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn3">Next</button></div>

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
 	   
     



      <select name="qualification_name[]"  class="select"  tabindex="1"  >
          <option Selected disabled> Qualification </option>  
        <option value="10">  10</option>
          <option value="12">  12</option>
          <option value="Diploma">  Diploma</option>
          <option value="Bachelors">  Bachelors</option>
          <option value="Masters">  Masters</option>
          <option value="PHD/Dr.">  PHD/Dr.</option>
          </select>

          

    
 		</div>
 		<div class="col-md-3">
 			  <label  class="inp">
       <input type="text"  name="edu_stream[]" placeholder="&nbsp;">
       <span class="label">Stream<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 			<div class="col-md-3">
 			<label  class="inp">
       <input type="text" name="institute_name[]"  placeholder="&nbsp;">
       <span class="label">Name of Inst./University<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <select name="passing_year[]" id="" class="select">
         <option selected disabled> --Year of Passing-- </option>
         @for($i=1990; $i<2019; $i++)
       <option value="{{$i}}"> {{$i}} </option>
@endfor

       </select>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="number" name="percentage[]"  placeholder="&nbsp;">
       <span class="label">Percentage<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
   </div>
   









<div id="edu-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button type="button" class="imm-append-btn" id="edu-append-btn">+</button>
 	</div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type="button" class="btn btn-success" id="prevbtn4">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn4">Next</button></div>

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
       <input type="text" name="designation[]" placeholder="&nbsp;">
       <span class="label">Designation<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text" name="exp_start[]"  placeholder="&nbsp;" class="experience">
       <span class="label">Start Date<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-2">
 	   <label  class="inp">
       <input type="text"  name="exp_end[]" placeholder="&nbsp;" class="experience">
       <span class="label">End Date<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
    <div class="col-md-1 my-auto">
       <small>OR</small>
    </div>
        <div class="col-md-3">
        <label  class="inp">
       <input type="number" name = "exp_duration[]" placeholder="&nbsp;">
       <span class="label">Duration<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
   </div>




   
<div id="work-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button type="button" class="imm-append-btn" id="work-append-btn">+</button>
 	</div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type="button"class="btn btn-success" id="prevbtn5">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn5">Next</button></div>

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
    <div class="row">
        <div class="col-md-12 py-3" style="    text-align: center;">
        
           <div id="toefl"> <p><strong>  TOEFL </strong>    
               {!! Form::radio('toefl', 'y', false, array('onclick' => 'toefl_show()','id' => 'ToeflTaken' )) !!}  <label for="ToeflTaken">  Taken </label> 

               {!! Form::radio('toefl', 'n',true, array('onclick' => 'toefl_hide()', 'id' => 'ToeflNotTaken' )) !!} <label for="ToeflNotTaken"> Not Taken </label>  
             </p> </div>





             <div class="row" id = "toefl_select">

                 {{-- <p class="lang-head">TOEFL Score</p> --}}
             
                            <div class="col-md-3  k0label">
                             <p>Listening</p>
                            <select name="ToeflListning" id="" class="select">
                             @for($i=0; $i<=30; $i++)    
                            <option value={{$i}}>{{$i}}</option>
                             @endfor
                            </select>
                           </div>
                           <div class="col-md-3  k0label">
                               <p>Reading</p>
                               <select name="ToeflReading" id="" class="select">
                                   @for($i=0; $i<=30; $i++)    
                                  <option value="{{$i}}">{{$i}}</option>
                                   @endfor
                                  </select>
                             </div>
                             <div class="col-md-3  k0label">
                                 <p>Writing</p>
                                 <select name="ToeflWriting" id="" class="select">
                                     @for($i=0; $i<=30; $i++)    
                                    <option value={{$i}}>{{$i}}</option>
                                     @endfor
                                    </select>
                               </div>
                               <div class="col-md-3  k0label">
                                   <p>Speaking</p>
                                   <select name="ToeflSpeaking" id="" class="select">
                                       @for($i=0; $i<=30; $i++)    
                                      <option value={{$i}}>{{$i}}</option>
                                       @endfor
                                      </select>
                                      
                                 </div>

                               </div>    

                                     <hr>

               <div id="ielts"> <p> <strong>  IELTS </strong>   
                    {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()', 'id' => 'IeltsTaken' )) !!}  <label for="IeltsTaken">  Taken </label>
                 {!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()',  'id' => 'IeltsNotTaken' )) !!} <label for="IeltsNotTaken"> Not Taken </label> </p> </div>









                 <div class="row" id="ielts_select">
                     {{-- <p class="lang-head">IELTS Score</p> --}}
                                <div class="col-md-3  k0label">
                                 <p>Listening</p>
                                <select name="IeltsListning" id="" class="select">
                                 @for($i=4.5; $i<=9; $i+=.5)    
                                <option value={{$i}}>{{$i}}</option>
                                
                                 @endfor
                                </select>
                               </div>
                               <div class="col-md-3  k0label">
                                   <p>Reading</p>
                                   <select name="IeltsReading" id="" class="select">
                                       @for($i=4.5; $i<=9; $i+=.5)    
                                <option value={{$i}}>{{$i}}</option>
                                       @endfor
                                      </select>
                                 </div>
                                 <div class="col-md-3  k0label">
                                     <p>Writing</p>
                                     <select name="IeltsWriting" id="" class="select">
                                         @for($i=4.5; $i<=9; $i+=.5)    
                                         <option value={{$i}}>{{$i}}</option>
                                         @endfor
                                        </select>
                                   </div>
                                   <div class="col-md-3  k0label">
                                       <p>Speaking</p>
                                       <select name="IeltsSpeaking" id="" class="select">
                                           @for($i=4.5; $i<=9; $i+=.5)    
                                           <option value={{$i}}>{{$i}}</option>
                                           @endfor
                                          </select>
                                     </div>
                 
                 </div>    
                 

<hr>








                 <div id="pte"> <p> <strong> PTE    </strong> 
                   
                   {!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()','id' =>'PteTaken' )) !!}  <label for="PteTaken">Taken </label>
                   
                   {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()', 'id' => 'PteNotTaken')) !!} <label for="PteNotTaken"> Not Taken </label></p> </div>





                   <div class="row" id="pte_select">
 
                       {{-- <p class="lang-head">PTE Score</p> --}}
                                  <div class="col-md-3  k0label">
                                   <p>Listening</p>
                                  <select name="PteListning" id="" class="select">
                                   @for($i=10; $i<=90; $i++)    
                                  <option value={{$i}}>{{$i}}</option>
                                  
                                   @endfor
                                  </select>
                                 </div>
                                 <div class="col-md-3  k0label">
                                     <p>Reading</p>
                                     <select name="PteReading" id="" class="select">
                                         @for($i=10; $i<=90; $i++)    
                                         <option value={{$i}}>{{$i}}</option>
                                         @endfor
                                        </select>
                                   </div>
                                   <div class="col-md-3  k0label">
                                       <p>Writing</p>
                                       <select name="PteWriting" id="" class="select">
                                           @for($i=10; $i<=90; $i++)    
                                           <option value={{$i}}>{{$i}}</option>
                                           @endfor
                                          </select>
                                     </div>
                                     <div class="col-md-3  k0label">
                                         <p>Speaking</p>
                                         <select name="PteSpeaking" id="" class="select">
                                             @for($i=10; $i<=90; $i++)    
                                             <option value={{$i}}>{{$i}}</option>
                                             @endfor
                                            </select>
                                       </div>
                   
                   </div>    
                   
                 <hr>










                   <div id="oet" > <strong> <p>  OET   </strong> 
                      {!! Form::radio('oet', 'y', false,  array('class'=>'form-contro','onclick' => 'oet_show()', 'id'=> 'OetTaken' )) !!}  <label for="OetTaken"> Taken </label>
                     {!! Form::radio('oet', 'n', true, array('class'=>'form-contro' , 'onclick' => 'oet_hide()', 'id' => 'OetNotTaken' )) !!}   <label for="OetNotTaken">  Not Taken </label>  </p> </div>







                     <div class="row" id="oet_select">
   
                         {{-- <p class="lang-head">OET Score </p> --}}
                                    <div class="col-md-3  k0label">
                                     <p>Listening</p>
               
                                     <select name="OetListening" id="" class="select">
                                       <option disabled selected> Choose Grade</option>
                                       <option value="A"> A</option>
                                       <option value="B"> B</option>
                                       <option value="C+"> C+</option>
                                       <option value="C"> C</option>
                                       <option value="D"> D</option>
                                       <option value="E"> E</option>
                                     </select>
                                     {!! Form::number('oet_listening_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!}
               
               
                                    {{-- <select name="ToeflListning" id="" class="form-control">
                                     @for($i=10; $i<=90; $i++)    
                                    <option value={{$i}}>{{$i}}</option>
                                    
                                     @endfor
                                    </select> --}}
               
                                   </div>
                                   <div class="col-md-3  k0label">
                                       <p>Reading</p>
                                      
                                     <select name="OetReading" id="" class="select">
                                       <option disabled selected> Choose Grade</option>
                                       <option value="A"> A</option>
                                       <option value="B"> B</option>
                                       <option value="C+"> C+</option>
                                       <option value="C"> C</option>
                                       <option value="D"> D</option>
                                       <option value="E"> E</option>
                                     </select>
                                     {!! Form::number('oet_reading_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                       
               
               
               
                                     </div>
                                     <div class="col-md-3  k0label">
                                         <p>Writing</p>
                                         <select name="OetWriting" id="" class="select">
                                           <option disabled selected> Choose Grade</option>
                                           <option value="A"> A</option>
                                           <option value="B"> B</option>
                                           <option value="C+"> C+</option>
                                           <option value="C"> C</option>
                                           <option value="D"> D</option>
                                           <option value="E"> E</option>
                                         </select>
                                         {!! Form::number('oet_writing_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                       </div>
                                       <div class="col-md-3  k0label">
                                           <p>Speaking</p>
                                           <select name="OetSpeaking" id="" class="select">
                                             <option disabled selected> Choose Grade</option>
                                             <option value="A"> A</option>
                                             <option value="B"> B</option>
                                             <option value="C+"> C+</option>
                                             <option value="C"> C</option>
                                             <option value="D"> D</option>
                                             <option value="E"> E</option>
                                           </select>
                                           {!! Form::number('oet_speaking_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score','min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                         </div>
                     
                     </div>    
               
<hr>




         
         </div>

<style>
#toefl_select, #ielts_select, #pte_select, #oet_select{
display:none;
}
</style>

<script>
function toefl_show(){
document.getElementById('toefl_select').style.display ="flex";
}
function toefl_hide(){
document.getElementById('toefl_select').style.display ="none";
}
function ielts_show(){
document.getElementById('ielts_select').style.display ="flex";
}
function ielts_hide(){
document.getElementById('ielts_select').style.display ="none";
}
function pte_show(){
document.getElementById('pte_select').style.display ="flex";
}
function pte_hide(){
document.getElementById('pte_select').style.display ="none";
}

function oet_show(){
document.getElementById('oet_select').style.display ="flex";
}
function oet_hide(){
document.getElementById('oet_select').style.display ="none";
}

</script>
<div class="col-md-8 k0label">
<div class="row">

</div>

</div>         

</div>
</div>


 </div>
		  <div class="imm-btngroup my-4">
	  <div><button type="button" class="btn btn-success" id="prevbtn6">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn6">Next</button></div>

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
 	   
      <select name="imm_history[]" class="visa_rejected_country select  ">
          <option value="" disabled selected> Country</option>
          @foreach($countries as $c)
          <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
       @endforeach
        </select>  
    
 		</div>
 				<div class="col-md-3">
 	   <label  class="inp">
       <input type="text" name="imm_history_from[]" placeholder="&nbsp;" id="imm-fromdate" class="imm-history">
       <span class="label">From<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 					<div class="col-md-3">
 	   <label  class="inp">
       <input type="text" name="imm_history_to[]" placeholder="&nbsp;" id="imm-todate" class="imm-history">
       <span class="label">To<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 				<div class="col-md-3">
 	   <label  class="inp">
       <input type="number" name="imm_history_duration[]" placeholder="&nbsp;">
       <span class="label">Duration<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>

   </div>
   






<div id="immi-options-append"></div>
 <div class="row mt-2">
 	<div class="col-12 text-right">
 		<button type="button" class="imm-append-btn" id="immi-append-btn" onclick="add_imm_his();">+</button>
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
 			  


    <select name="visa_rejected_country[]" class="visa_rejected_country select py-2 ">
        <option value="" disabled selected>--Selected--</option>
        @foreach($countries as $c)
        <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
     @endforeach
      </select>





    <div id="reject-visa-append-options"></div>
    <div class="text-right mt-2"><button type="button" class="imm-append-btn" id="visa-append-btn" onclick="visa_rejected();">+</button></div>
 		</div>
 	</div>
 	
 		
 
 </div>

{{--  
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
 </div> --}}



 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type="button" class="btn btn-success" id="prevbtn7">Prev</button></div>
	  <div><button type="button" class="btn btn-success" id="nextbtn7">Next</button></div>

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
       <input type="text" name="session"  placeholder="&nbsp;" id="imm-session-start">
       <span class="label">Start Session<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
      <div class="col-md-3 course-country">
           {{-- <div class="wrapper-dropdown" id="select-course-country" tabindex="1"><span>Select Country</span>
      <ul class="dropdown">
        <li><a href="javascript:void(0);">A</a></li>
        <li><a href="javascript:void(0);">B</a></li>
        <li><a href="javascript:void(0);">C+</a></li>
        <li><a href="javascript:void(0);">C</a></li>
        <li><a href="javascript:void(0);">D</a></li>
        <li><a href="javascript:void(0);">E</a></li>
      
      </ul>
    </div> --}}

    <select name="course_country" class="visa_rejected_country select  ">
        <option value="" disabled selected> Country</option>
        @foreach($countries as $c)
        <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
     @endforeach
      </select>  


    </div>
        <div class="col-md-6">
     <label  class="inp">
       <input type="text" name="course"  placeholder="&nbsp;">
       <span class="label">Course<sup>*</sup></span>
       <span class="border"></span>
      </label>
    </div>
    
  </div>
  </div>
 </div>
  

    <div class="imm-btngroup my-4">
    <div><button  type='button' class="btn btn-success" id="prevbtn8">Prev</button></div>
    <div><button type='button' class="btn btn-success" id="nextbtn8">Next</button></div>

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
        <select class="select" name="financial[]">
            <option disabled selected>--Select--</option>    
              <option VALUE="Bank loan">Bank loan</option>
              <option VALUE="Personal Fund">Personal Fund</option>
              <option VALUE="Family Sponsorship">Family Sponsorship</option>
              <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
              <option VALUE="Other">Other</option>
            </select>

 		</div>
      {{-- <div class="col-md-3" id="other-financial-source">
        <label  class="inp">
       <input type="text" name="financial_amount[]"  placeholder="&nbsp;">
       <span class="label">Enter Financial Source<sup>*</sup></span>
       <span class="border"></span>
      </label>

      </div> --}}
 			<div class="col-md-3">
 			<label  class="inp">
       <input type="number" name="financial_amount[]"  placeholder="&nbsp;">
       <span class="label">Enter Amount<sup>*</sup></span>
       <span class="border"></span>
      </label>
 		</div>
 
   </div>
   





  <div id="finance-options-append"></div>
 <div class="row mt-2">
  <div class="col-12 text-right">
    <button type='button' class="imm-append-btn" id="finance-append-btn">+</button>
  </div>
 </div>
 	</div>
 </div>
	

	  <div class="imm-btngroup my-4">
	  <div><button type='button' class="btn btn-success" id="prevbtn9">Prev</button></div>
	  <div><button type='button' class="btn btn-success" id="nextbtn9">Next</button></div>

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
 
    
    <div class="col-md-3">
      <div><input type="radio" value="Single" name="maritalradio" id="unmarriedinp" onclick="maritalhide()" checked /><label for="unmarriedinp">&nbsp;Single</label></div>
      
    </div>
  <div class="col-md-3">
      <div><input type="radio" value="y" name="marriage" id="marriedinp" onclick="maritalshow()" /><label for="marriedinp">&nbsp;Married</label></div>
    </div>
   <div class="col-md-3">
      <div><input type="radio" value="Divorced" name="maritalradio" id="divorcedinp" onclick="maritalhide()" /><label for="divorcedinp">&nbsp;Divorced</label></div>
      
    </div>

     <div class="col-md-3">
      <div><input type="radio" value="Widow" name="maritalradio" id="widowinp" onclick="maritalhide()"/><label for="widowinp">&nbsp;Widow</label></div>
      
    </div>
  </div>

  <div class="row row-margin-big married-options">
    <div class="col-md-6">
     <label for="marriagedateinp" class="inp">
       <input type="text" name="dom" id="marriagedateinp" placeholder="&nbsp;" onblur="datemarriagereqd()" onchange="marriagedatevalid()" />
       <span class="label">Date of marriage<sup>*</sup></span>
       <span class="border"></span>
      </label>
       <div class="text-left text-danger font-weight-bold"><small id="marriagedatemsg"></small></div>
    </div>
    <div class="col-md-6">
        <label for="spousequalinp" class="inp">
       <input type="text" id="spousequalinp" placeholder="&nbsp;" disabled onkeyup="spousevalid()" onblur="spousevalid()" name="spouse_qualification" />
       <span class="label">Spouse Qualification<sup>*</sup></span>
       <span class="border"></span>
      </label>
        <div class="text-left text-danger font-weight-bold"><small id="spouseinpmsg"></small></div>
    </div>
      <div class="col-md-4 spouse-income">
 <p>Spouse Income Proof<sup>*</sup></p>
 <label class="file">
  <input type="file" name="sip" id="file" aria-label="File browser example" disabled>
  <span class="file-custom"></span>
</label>
<div class="text-left text-danger font-weight-bold"><small id="spouseincomemsg"></small></div>
    </div>
  </div>
  </div>
 </div> 
  

    <div class="imm-btngroup my-4">
    <div><button type='button' class="btn btn-success" id="prevbtn10">Prev</button></div>
    <div>
      <button type='button' class="btn btn-success" id="nextbtn10">Next</button> 
  
    </div>

  </div>
  </div>

  </div>



<!-- marital status section ends -->

<!-- upload image and document starts here -->

<div class="container imm-con-1 imm-education-dtl imm-financial-dtl imm-content imm-content11">
  <div>
        <div class="form-logo">
  <img src="./assets/images/logo.png" alt="logo" class="w-100" />
</div>
    <h6>Upload Image/Documents</h6>
 <div class="imm-card">
  <div class="edu-con">
    
  <div class="row edu-row">

    <div class="col-md-6">
    <h6>Capture Profile Picture</h6>

    <!-- <div><input type="file" id="imgInp1"/></div>
    <div class="mt-4" style="width: 150px; margin: auto;"><img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="" id="blah1" class="w-100" /></div> -->


     <div class="demo-area">
               
                <div class="view--video">
                    <video id="videoTag" src="" autoplay muted class="view--video__video"></video>
                </div>
            <button class="imm-append-btn" type="button"  id="frame-capture">Capture Photo</button>
            <button class="imm-append-btn" type="button" disabled id="switch">Switch Camera</button>
            <div class="btn-group">
  
</div>
            
                <div class="view--snapshot mt-2">
                    <canvas id="canvasTag" class="view--snapshot__canvas"></canvas>
                    <a id="saveImg" class="hide" href="#"></a>
                </div>
            </div>
    </div>
  


    <div class="col-md-6">
    <h6>Draw Signature</h6>

    <!-- <div><input type="file" id="imgInp2"/></div>
    <div class="mt-4" style="width: 150px; margin: auto;"><img src="https://via.placeholder.com/160x194" alt="" id="blah2" class="w-100" /></div> -->
   
<div class="wrapper">
  <canvas id="signature-pad" class="signature-pad" width=250 height=150></canvas>
</div>
<div>
  <button id="save" type="button">Save</button>
  <div id="get_image"></div>
  {{-- <button id="clear">Clear</button> --}}
</div> 

    </div>
  </div>
  </div>
 </div>
  

    <div class="imm-btngroup my-4">
    <div><button class="btn btn-success" id="prevbtn11" type="button" >Prev</button></div>
    {{-- <button type="button" id="save_image"> Save Image </button> --}}
    <div><input class="btn btn-success" id="nextbtn11" type="submit"   onclick="homerediret()"></div>
{{Form::close()}}
  </div>
  </div>

  </div>
<!-- upload image and document ends here -->

<!-- thanks subitted info starts -->

<div class="container imm-con-1 imm-education-dtl imm-content imm-content12">

 <div class="imm-card">
 	<div class="edu-con">

 	<h5 class="text-success my-4">Thanks for Submitting your Information</h5>	
   <div><button class="btn btn-success" id="prevbtn11" type="button" >Prev</button></div>
 	</div>
 </div>
	

	<!--   <div class="imm-btngroup my-4">
	  <div><button class="btn btn-success" id="prevbtn6">Prev</button></div>
	  <div><button class="btn btn-success" id="nextbtn6">Next</button></div>

	</div> -->
	</div>

 	</div>
<!-- thanks subitted info ends -->




 </div>  
     
    
    

      <script> 

          $(document).ready(function(){
            $('#selectgender a').click(function(){
            var a = $(this).text();
            $('#selectgender_text').val(a);
          
            });
          });
          
              </script>


<script>


    
      


  
    function add_imm_his(){
    

  $('#immi-options-append').append('  <div class="row edu-row my-4"> <div class="col-md-3"> <select name="imm_history[]" class="visa_rejected_country select "> <option value="" disabled selected> Country</option> @foreach($countries as $c) <option value={{$c->country_name}}>{{$c->country_name}}</option> @endforeach </select> </div><div class="col-md-3"> <label class="inp"> <input type="text" name="imm_history_from[]" placeholder="&nbsp;" id="imm-fromdate" class="imm-history"> <span class="label">From<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" name="imm_history_to[]" placeholder="&nbsp;" id="imm-todate" class="imm-history"> <span class="label">To<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" name="imm_history_duration[]" placeholder="&nbsp;"> <span class="label">Duration<sup>*</sup></span> <span class="border"></span> </label> </div></div>');

    
   var a = document.getElementsByClassName('imm-history').length;
    console.log(a);
    for(var i=0; i<a; i++){
      var b =  document.getElementsByClassName('imm-history')[i];
  
    $(b).datepicker({
          format: 'dd/mm/yyyy', 
          autoclose: true, 
          todayHighlight: true
    }).datepicker();
  }
  
  
  }

function visa_rejected(){
  $('#reject-visa-append-options').append(' <select name="visa_rejected_country[]" class="visa_rejected_country select py-2 "> <option value="" disabled selected>--Selected--</option> @foreach($countries as $c) <option value={{$c->country_name}}>{{$c->country_name}}</option> @endforeach </select>');
}


   
    
    
    </script>


 <style>
    .select{
      position: relative;
  text-align: left;
  font-size: 14px;
  width: 200px;
  margin: 5px auto;
  padding: 10px 15px;
  padding-left: 0;
  background: #fff;
  border-bottom: 2px solid #c8ccd4;
  cursor: pointer;
  outline: none;
  border: none;
      border-bottom: 2px solid #c8ccd4;
  width: 100%;
  display: block;
  user-select: none;
  font-size: 16px;
    color: #9098a9;
    font-weight: 500;
    }

    
    </style>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

     <script src="{{URL::asset('public/js/camera.js')}}"></script>
  
     
  <script src="{{URL::asset('public/js/signature_pad.umd.min.js')}}"></script>

   <script src="{{URL::asset('public/js/script.js')}}"></script>


<script>

// education section js starts

$(document).ready(function() {
	var counter = 0;
	$("#edu-append-btn").click(function(event) {
			counter++;
 
	
		document.getElementById('edu-options-append').innerHTML += '<div class="row edu-row"> <div class="col-md-2"> <select name="qualification_name[]" class="select" tabindex="1" > <option Selected disabled> Qualification </option> <option value="10"> 10</option> <option value="12"> 12</option> <option value="Diploma"> Diploma</option> <option value="Bachelors"> Bachelors</option> <option value="Masters"> Masters</option> <option value="PHD/Dr."> PHD/Dr.</option> </select> </div><div class="col-md-3"> <label class="inp"> <input type="text" name="edu_stream[]" placeholder="&nbsp;"> <span class="label">Stream<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" name="institute_name[]" placeholder="&nbsp;"> <span class="label">Name of Inst./University<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <select name="passing_year[]" id="" class="select"> <option selected disabled> --Year of Passing-- </option> @for($i=1990; $i<2019; $i++) <option value="{{$i}}">{{$i}}</option>@endfor </select> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="number" name="percentage[]" placeholder="&nbsp;"> <span class="label">Percentage<sup>*</sup></span> <span class="border"></span> </label> </div></div>';



	});
});

// education section js ends
</script>
  </body>
</html>
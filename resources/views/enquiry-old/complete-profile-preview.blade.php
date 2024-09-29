
<?php
use App\Helpers\Helper;

?>

<div role="tabpane" class="tab-pane " id="complete_profile_preview">
    <div class="" data-toggle="modal" data-target="" >

        {{-- <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> --}}
        <!-- <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
       
        <link href="{{url('public/css/profile.css')}} " rel="stylesheet" type="text/css">
                <!-- <link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css">  -->
    
          
     
                
        
        
        <div class="vd_content-wrapper">
          <div class="vd_container">
            <div class="vd_content clearfix">
              <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                
                  {{-- <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
          <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
          <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
          
    </div> --}}
     
                </div>
              </div>
            
              <div class="vd_content-section clearfix">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel widget light-widget panel-bd-top">
                      <div class="panel-heading no-title">  </div>
                      <div class="panel-body">
                        <div class="text-center vd_info-parent"> <img  src="{{url('public/uploads/image/')}}/{{$enquiries[0]->image?$enquiries[0]->image:''}}" style="width: 200px"> </div>
                        <div class="row">
                          <!-- <div class="col-xs-12"> <a class="btn vd_btn vd_bg-green btn-xs btn-block no-br"><i class="fa fa-check-circle append-icon" ></i>Friends</a> </div> -->
                          <div class="col-xs-12"> <a class="btn vd_btn vd_bg-grey btn-xs btn-block no-br"><i class="fa fa-envelope append-icon"></i>Send Message</a> </div>
                        </div>
                        <h2 class="font-semibold mgbt-xs-5">{{$enquiries[0]->name?$enquiries[0]->name:''}} | IC{{$enquiries[0]->id?$enquiries[0]->id:''}}</h2>
                        <h4>{{$enquiries[0]->address_line1 ?$enquiries[0]->address_line1:'House'}} {{$enquiries[0]->address_line2 ?$enquiries[0]->address_line2:'Street'}} {{$enquiries[0]->city ?$enquiries[0]->city:'City'}}, {{$enquiries[0]->state ? Helper::getState($enquiries[0]->state):'State'}}, {{$enquiries[0]->country ?$country = Helper::getCountry($enquiries[0]->country):'Country'}}.</h4>
                        
                        <div class="mgtp-20">
                          <table class="table table-striped table-hover">
                            <tbody>
                              <tr>
                                <td style="width:60%;">Status</td>
                                <td><span class="label label-success">Active</span></td>
                              </tr>
                              <tr>
                                <td>User Rating</td>
                                <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                              </tr>
                              <tr>
                                <td>Member Since</td>
                                <td> {{$enquiries[0]->created_at?$enquiries[0]->created_at:''}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                  <div class="col-sm-12">
                    <div class="tabs widget">
      <ul class="nav nav-tabs widget">
        {{-- <li class="active"> 
          <a data-toggle="tab" href="#profile-tab"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
        </li> --}}
        
      </ul>
      {{-- <hr class="pd-10"  /> --}}
      <div class="tab-content">
        <div id="profile-tab" class="tab-pane active">
          <div class="pd-20">
    {{-- <div class="vd_info tr"> <a class="btn vd_btn btn-xs vd_bg-yellow"> <i class="fa fa-pencil append-icon"></i> Edit </a> </div>       --}}
    <hr class="pd-10"  />
            <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label"> Name:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->name?$enquiries[0]->name:'Name'}}</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">DOB:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->dob?$enquiries[0]->dob:'DOB'}}</div>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Mobile:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->contact?$enquiries[0]->contact:'Mobile No'}}</div>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Alternate Mobile:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->alternate_contact?$enquiries[0]->alternate_contact:'Alternate Mobile No'}}</div>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Email:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->email?$enquiries[0]->email:'Email'}}</div>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Alternate Email:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->alterate_email?$enquiries[0]->alterate_email:'Alternate Email'}}</div>
                  
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">City:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->city?$enquiries[0]->city:'City'}}</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Country:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->state?$enquiries[0]->state:'State'}}</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">State:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->country?$enquiries[0]->country:'State'}}</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Interests:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->pincode?$enquiries[0]->pincode:'Intrest'}}</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Country Of Birth:</label>
                  <div class="col-xs-7 controls">Vendroid.venmond.com</div>
                  <!-- col-sm-10 --> 
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">State Of Birth:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->satate_of_birth?$enquiries[0]->satate_of_birth:'State Of Birth'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Place Of Birth:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->place_of_birth?$enquiries[0]->place_of_birth:'Place Of Birth'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Religioun:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->religoius?$enquiries[0]->religoius:'Religoius'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Current Country of residence:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->current_country_of_residence?$enquiries[0]->current_country_of_residence:'Country Name'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Nationality	:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->nationility?$enquiries[0]->nationility:'Nationility'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Medical history/illness:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->medical_histoty?$enquiries[0]->medical_histoty:'Y/N'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Criminal History/Cases:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->criminal_histry?$enquiries[0]->criminal_histry:'Y/N'}}</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row mgbt-xs-0">
                  <label class="col-xs-5 control-label">Do you hold any other Nationalities ?:</label>
                  <div class="col-xs-7 controls">{{$enquiries[0]->hold_other_nationality?$enquiries[0]->hold_other_nationality:'Y/N'}}</div>
                </div>
              </div>
            </div>
            <hr class="pd-10"  />



























            <div class="row">
              <div class="col-sm-6 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
                <div class="content-list content-menu">
                  <ul class="list-wrapper">
                    
    @if($enq_experiences->count() > 0)
    
    @foreach($enq_experiences as $get)
      
    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"> <a href="#">{{$get->designation}}</a> at <a href="">{{$get->company_name}}.</a> <span class="menu-info"><span class="menu-date"> {{$get->start_date}} ~ {{$get->end_date}}</span> ({{$get->job_responsibilities}})  </span></span> <span class="menu-info fa fa-map-marker" style="text-align: center"> {{$get->place_of_work}} {{ $get->country_of_work}}</span> 
     
        <p>Contact Company </p>
       <span>{{$get->contact_person_name}}
      <div class="menu-info">
          <span>{{$get->contact_person_phone}}</div>
          <div class="menu-info">
              <span>{{$get->contact_person_email}}</div>
              
                  <div class="menu-info">
                    <p><span>number of e</span><span>dfgd</span><span>gfd</span></p>
                    <p><span>100</span><span>dfgd</span><span>gfd</span></p>
                  </table>
    </span>
    </p>  </li>
@endforeach
@endif
                  </ul>
                </div>
              </div>
              <div class="col-sm-6">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> EDUCATION</h3>
                <div class="content-list content-menu">
                  <ul class="list-wrapper">
                    
                    @if($enq_educations->count() > 0)
    
                    @foreach($enq_educations as $get)

                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"> {{$get->class}} at <a href="#">{{$get->institute_name}}</a> 
                      <span class="menu-info">
                        <span class="menu-date">{{$get->education_name}}  </span>
                        <span class="menu-date"> {{$get->course_duration}} </span>
                      <span class="menu-date" >   {{$get->passing_year}}</span>
                          </span>
                      <span class="menu-info"> <span>Duration</span> <span>{{$get->course_duration}}</span> </span>
                      <span class="menu-info"> <span>Award year</span> <span>{{$get->award_year}}</span> </span>  
                      <span class="menu-info"><span class="menu-date"> {{$get->edu_start_date}} ~ {{$get->edu_end_date}}</span></span>
                    <span class="menu-info"> <span>Medium</span> <span>{{$get->study_medium}}</span> </span>
                    <span class="menu-info"> <span>Mode</span> <span>{{$get->mode_of_study}}</span> </span>
                      <span class="menu-info"><span class="menu-date fa fa-map-marker"> {{$get->place_of_study}} {{$get->state_of_study}} {{$get->country_of_study}} </span></span>
                    </span> </li>
@endforeach
@endif


                  
                  </ul>
                </div>            
              </div>
            </div>








            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> Exam</h3>
                <div class="content-list content-menu">
                  <ul class="list-wrapper">
       
    {{-- @if($get_toefl->count() > 0)
    
    @foreach($get_toefl as $get)
      
    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"> <a href="#">{{$get->designation}}</a> at <a href="">{{$get->company_name}}.</a> <span class="menu-info"><span class="menu-date"> {{$get->start_date}} ~ {{$get->end_date}}</span> ({{$get->job_responsibilities}})  </span></span> <span class="menu-info fa fa-map-marker" style="text-align: center"> {{$get->place_of_work}} {{ $get->country_of_work}}</span> 
     
        <p>Contact Company </p>
       <span>{{$get->contact_person_name}}
      <div class="menu-info">
          <span>{{$get->contact_person_phone}}</div>
          <div class="menu-info">
              <span>{{$get->contact_person_email}}</div>
              
                  <div class="menu-info">
                    <p><span>number of e</span><span>dfgd</span><span>gfd</span></p>
                    <p><span>100</span><span>dfgd</span><span>gfd</span></p>
                  </table>
    </span>
    </p>  </li>
@endforeach
@endif --}}
<table><tr>
<th>language</th>  
<th>Exam Date</th>  
<th>Reading</th>
<th>Writing</th>
<th>Speaking</th>
<th>Listening</th>
<th>Country</th>
<th>City</th>
<th>Score Card</th>
</tr>
@if($get_toefl->count() > 0)
    
@foreach($get_toefl as $get)
<tr>
<td>{{$get->language}}</td>
<td>{{$get->language}}</td>
<td>{{$get->reading}}</td>
<td>{{$get->writing}}</td>

<td>{{$get->speaking}}</td>
<td>{{$get->listening}}</td>
<td>{{$get->examination_country}}</td>
<td>{{$get->examination_city}}</td>
<td>{{$get->examination_city}}</td>
</tr>
@endforeach
@endif
</table>
                  </ul>
                </div>
              </div>



{{-- 
              <div class="col-sm-6">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> EDUCATION</h3>
                <div class="content-list content-menu">
                  <ul class="list-wrapper">
                    
                    @if($enq_educations->count() > 0)
    
                    @foreach($enq_educations as $get)

                    <li class="mgbt-xs-10"> <span class="menu-icon vd_green"><i class="fa  fa-circle-o"></i></span> <span class="menu-text"> {{$get->class}} at <a href="#">{{$get->institute_name}}</a> 
                      <span class="menu-info">
                        <span class="menu-date">{{$get->education_name}}  </span>
                        <span class="menu-date"> {{$get->course_duration}} </span>
                      <span class="menu-date" >   {{$get->passing_year}}</span>
                          </span>
                      <span class="menu-info"> <span>Duration</span> <span>{{$get->course_duration}}</span> </span>
                      <span class="menu-info"> <span>Award year</span> <span>{{$get->award_year}}</span> </span>  
                      <span class="menu-info"><span class="menu-date"> {{$get->edu_start_date}} ~ {{$get->edu_end_date}}</span></span>
                    <span class="menu-info"> <span>Medium</span> <span>{{$get->study_medium}}</span> </span>
                    <span class="menu-info"> <span>Mode</span> <span>{{$get->mode_of_study}}</span> </span>
                      <span class="menu-info"><span class="menu-date fa fa-map-marker"> {{$get->place_of_study}} {{$get->state_of_study}} {{$get->country_of_study}} </span></span>
                    </span> </li>
@endforeach
@endif


                  
                  </ul>
                </div>            
              </div> --}}





            </div>




            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> Course Enrollment Details</h3>
                <div class="content-list content-menu">
                 
                 <table>
                   <tr>
                     <th>Start Session</th>
                     <th>Country</th>
                     <th>Course</th>
                     <th>	Interested for Intake</th>
                    </tr>
                    
                    <tr>
                      <td> {{$enquiries[0]->course_session ?$enquiries[0]->course_session:'Session Start'}} </td>
                      <td> {{$enquiries[0]->course_country ?$enquiries[0]->course_country:'Course Country'}} </td>
                      <td> {{$enquiries[0]->course ?$enquiries[0]->course:'Course'}} </td>
                      <td> {{$enquiries[0]->course_intake ?$enquiries[0]->course_intake:'Course Intake'}} </td>
                    </tr>
                 </table>
                </div>
              </div>
            </div>

            
            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>How student will show financials</h3>
                <div class="content-list content-menu">
                 
                 <table>
                  
                  @foreach($enq_financials as $f)  
                    <tr>
                      <td> {{$f->financials_by ?$f->financials_by:'Financial By'}} </td>
                      <td> {{$f->amount ?$f->amount:'Amount'}} </td>
                      
                    </tr>
                    @endforeach
                 </table>
                </div>
              </div>
            </div>


              
            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>Country Travelled Before</h3>
                <div class="content-list content-menu">
                 
                 <table>
                  <tr>
                    <th>Country</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Duration</th>

                  </tr>
                  @if($enq_travelled_historys->count() > 0)
@foreach($enq_travelled_historys as $history)
                    <tr>
                      <td> {{$history->travelled_before_country ?$history->travelled_before_country:'Country Name'}} </td>
                      <td> {{$history->travelled_before_from ?$history->travelled_before_from:'From'}} </td>
                      <td> {{$history->travelled_before_to ?$history->travelled_before_to:'To'}} </td>
                      <td> {{$history->travelled_before_duration ?$history->travelled_before_duration:'Duration'}} </td>
                    </tr>
                    @endforeach
                    @endif
                 </table>
                </div>
              </div>
            </div>






                
            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>Payment Details</h3>
                <div class="content-list content-menu">
                 
                 <table>
                  <tr>
                    <th>
                      Payment For</th>
                    <th>
                      Payment By</th>
                    <th>Paid Amount</th>
                    <th>Paid Date</th>
                    <th>Receipt No</th>
                    <th>Gen By</th>
                    <th>Gen Date</th>
                    <th>Receipt</th>

                  </tr>
                  @if($get_finace_detail->count() > 0)
@foreach($get_finace_detail as $get)
                    <tr>
                      <td> {{$get->payment_for ?$get->payment_for:'Payment For'}} </td>
                      <td> {{$get->payment_by ?$get->payment_by:'From'}} </td>
                      <td> {{$get->paid_amount ?$get->paid_amount:'To'}} </td>
                      <td> {{$get->paid_date ?$get->paid_date:'Duration'}} </td>
                      <td> {{$get->receipt_no ?$get->receipt_no:'From'}} </td>
                      <td> {{$get->gen_by ?$get->gen_by:'To'}} </td>
                      <td> {{$get->gen_date ?$get->gen_date:'Duration'}} </td>
                      <td> {{$get->receipt ?$get->receipt:'Duration'}} </td>
                    </tr>
                    @endforeach
                    @endif
                 </table>
                </div>
              </div>
            </div>









            
            <hr class="pd-10"  />
            <div class="row">
              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>Passport</h3>
                <div class="content-list content-menu">
                 
                 <table>
                  <tr>
                    <th>
                      Name in Passport</th>
                    <th>
                      Passport Number</th>
                    <th>Date of Birth</th>
                    <th>Passport Issue City</th>
                    <th>Date of Issue</th>
                    <th>Date of pasport</th>
                    {{-- <th>Gen Date</th>
                    <th>Receipt</th> --}}

                  </tr>
                  {{-- @dd($get_passport) --}}
                  @if($get_passport->count() > 0)
@foreach($get_passport as $get)
                    <tr>
                      <td> {{$get->name_on_id_proof ?$get->name_on_id_proof:'Payment For'}} </td>
                      <td> {{$get->id_proof_number ?$get->id_proof_number:'From'}} </td>
                      <td> {{$get->date_of_birth ?$get->date_of_birth:'To'}} </td>
                      <td> {{$get->place_of_issue ?$get->place_of_issue:'Duration'}} </td>
                      <td> {{$get->date_of_issue_passport ?$get->date_of_issue_passport:'From'}} </td>
                      <td> {{$get->date_of_expiry_passport ?$get->date_of_expiry_passport:'To'}} </td>
                      {{-- <td> {{$get->gen_date ?$get->gen_date:'Duration'}} </td>
                      <td> {{$get->receipt ?$get->receipt:'Duration'}} </td> --}}
                    </tr>
                    @endforeach
                    @endif
                 </table>
                </div>
              </div>


              <div class="col-sm-12 mgbt-xs-20">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i>Other Id</h3>
                <div class="content-list content-menu">
                 
                 <table>
                  <tr>
                    <th>
                      Id Proof</th>
                    <th>
                      Name (Name In ID Proof)</th>
                    <th>ID Proof No</th>
                    <th>Upload</th>
                    

                  </tr>
                  @if(($get_id_proof_details)->count() > 0)
                  @foreach($get_id_proof_details as $doc)
                  <tr>
                  <td>{{$doc->name_on_id_proof}}</td>
                  <td>{{$doc->name_on_id_proof}}</td>
                  <td>{{$doc->id_proof_number}}</td>
                  <td>{{$doc->id_image}}</td>
                  </tr>
                  @endforeach
                  @endif
                 </table>
                </div>
              </div>


            </div>












            <!-- row -->
            {{-- <hr class="pd-10"  /> --}}
            {{-- <div class="row">
              <div class="col-sm-6">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-globe mgr-10 profile-icon"></i> ACTIVITY</h3>
                <div class="">
                  <div class="content-list">
                    <div data-rel="scroll">
                      <ul  class="list-wrapper">
                        <li> <span class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></span> <span class="menu-text"> Someone has give you a surprise <span class="menu-info"><span class="menu-date"> ~ 12 Minutes Ago</span></span> </span>  </li>
                        <li> <span class="menu-icon vd_blue"><i class=" fa fa-user"></i></span> <span class="menu-text"> Change your user profile details <span class="menu-info"><span class="menu-date"> ~ 1 Hour 20 Minutes Ago</span></span> </span> </li>
                        <li> <span class="menu-icon vd_red"><i class=" fa fa-cogs"></i></span> <span class="menu-text"> Your setting is updated <span class="menu-info"><span class="menu-date"> ~ 12 Days Ago</span></span> </span></li>
                        <li>  <span class="menu-icon vd_green"><i class=" fa fa-book"></i></span> <span class="menu-text"> Added new article <span class="menu-info"><span class="menu-date"> ~ 19 Days Ago</span></span> </span>  </li>
                        <li>  <span class="menu-icon vd_green"><img alt="example image" src="img/avatar/avatar.jpg"></span> <span class="menu-text"> Change Profile Pic <span class="menu-info"><span class="menu-date"> ~ 20 Days Ago</span></span> </span> </li>
                        <li>  <span class="menu-icon vd_red"><i class=" fa fa-cogs"></i></span> <span class="menu-text"> Your setting is updated <span class="menu-info"><span class="menu-date"> ~ 12 Days Ago</span></span> </span>  </li>
                        <li>  <span class="menu-icon vd_green"><i class=" fa fa-book"></i></span> <span class="menu-text"> Added new article <span class="menu-info"><span class="menu-date"> ~ 19 Days Ago</span></span> </span> </li>
                        <li>  <span class="menu-icon vd_green"><img alt="example image" src="img/avatar/avatar.jpg"></span> <span class="menu-text"> Change Profile Pic <span class="menu-info"><span class="menu-date"> ~ 20 Days Ago</span></span> </span>  </li>
                      </ul>
                    </div>
                    <div class="closing text-center" style=""> <a href="#">See All Activities <i class="fa fa-angle-double-right"></i></a> </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-5">
                <h3 class="mgbt-xs-15 font-semibold"><i class="fa fa-flask mgr-10 profile-icon"></i> SKILL</h3>
                <div class="skill-list">
                  <div class="skill-name"> Photoshop </div>
                  <div class="progress  progress-sm">
                    <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success "> <span class="sr-only">90%</span> </div>
                  </div>
                </div>
                <div class="skill-list">
                  <div class="skill-name"> Illustrator </div>
                  <div class="progress  progress-sm">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-danger "> <span class="sr-only">20%</span> </div>
                  </div>
                </div>
                <div class="skill-list">
                  <div class="skill-name"> PHP </div>
                  <div class="progress  progress-sm">
                    <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning "> <span class="sr-only">50% Complete</span> </div>
                  </div>
                </div>
                <div class="skill-list">
                  <div class="skill-name"> Javascript </div>
                  <div class="progress  progress-sm">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-info "> <span class="sr-only">60% Complete</span> </div>
                  </div>
                </div>
                <div class="skill-list">
                  <div class="skill-name"> Communication </div>
                  <div class="progress  progress-sm">
                    <div style="width: 95%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="95" role="progressbar" class="progress-bar progress-bar-success "> <span class="sr-only">95% Complete</span> </div>
                  </div>
                </div> 
                <div class="skill-list">
                  <div class="skill-name"> Writing </div>
                  <div class="progress  progress-sm">
                    <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-warning "> <span class="sr-only">45% Complete</span> </div>
                  </div>
                </div>                                 
              </div>
             
            </div> --}}
            <!-- row --> 
          </div>
          <!-- pd-20 --> 
        </div>
        <!-- home-tab -->
        
    
    
      </div>
      <!-- tab-content --> 
    </div>
    <!-- tabs-widget -->              </div>
                </div>
                <!-- row --> 
                
              </div>
              <!-- .vd_content-section --> 
              
            </div>
            <!-- .vd_content --> 
          </div>
          <!-- .vd_container --> 
        </div>
       
    
    
    
    
    <!-- .vd_body END  -->
    <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
    
    <script type="text/javascript" src="js/jquery.js"></script> 
    
    <!-- Specific Page Scripts END -->
    
    

    </div></div>


 
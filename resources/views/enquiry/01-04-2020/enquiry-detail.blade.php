<?php
use App\Helpers\Helper;
?>
@extends('header')
@section('tabletform')


</div>
</div>





<style>
.nav-tabs .nav-link{
    border: 1px solid #010f1b3d ;
}
#emp_detail_overview table tr td:nth-child(3), #passport table tr td:nth-child(3){
display:none;
}
#emp_detail_overview input[type="submit"], #passport input[type="submit"] {
display:none;
}
#st_detail .form-control{
    width: 100%;
    border: 1px solid #f1f0f0;
}
.detail-page-tab-view tr:nth-child(1){
    background:#fff;
}

.get_education_by_class{
    border: 1px solid;

}
.plus-sign{
    position: absolute;
    top: 50%;
    left: 50%;
    color: #fff;
    transform: translate(-50%,-50%);
    border: navajowhite;
    border-radius: 50%;
    padding: 0;
    margin: 0;
    color: #fff !important;
}
/* input[type="text"], input[type="date"], select, input[type="number"]{
    display:none ;
} */

#st_detail form{
    /* height: 383px;
    overflow: auto; */
}

.selected-disabled option:nth-child(1){
    background: #e7e7e7;
    cursor: none;
}

.my-table th{
    width:50%;
}
</style>


<?php 
// print_r(['a'=>1,'b'=>2]);
//     print_r(array('fdg','fdg'));

?>



<div class="container-fluid detail-page " >


@foreach($enquiries as $get)
<?php session()->put('unique_id_sess',$get->unique_id); ?>
{{-- {{session()->get('unique_id_sess')}} --}}
<div class="row content-color">
<div style="width:100%; text-align:right; padding:20px;">
@if($get->device == "fa fa-tablet")
<a href="{{url('enquiry-table/'.$get->unique_id )}}" class="fa
fa-edit"> Edit</a> &nbsp;
{{-- <a href="{{url('enquiry-tabl')}}">Delete</a> --}}
<a href="javascript:void(0);" class="fa fa-trash delete"
data-id={{$get->unique_id}} > Delete</a>
@else
{{-- <a href="{{url('enquiry/'.$get->unique_id)}}" class="fa fa-edit" >
Edit</a> --}}
 &nbsp;
{{-- <a href="{{url('delete'.$get->unique_id)}}">Delete</a> --}}
<a href="javascript:void(0);" class="fa fa-trash delete"
data-id={{$get->unique_id}} > Delete</a>
@endif
</div>

@endforeach

</div>

<?php 
$al = DB::table('enrolment_documents')
          ->where('client_unique_id',session()->get('unique_id_sess'))
          ->get();
        $con1 =   $al->count();
        
  $done = DB::table('enrolment_documents')
          ->where('client_unique_id',session()->get('unique_id_sess'))
          ->where('check_status', 1)  
          ->where('approve_or_not',1)  
         ->get();
         $con2 = $done->count();
         if($con1 > 0){
        if($con1 == $con2){
?>


<div class="status-step">
    <div class="container">


        <ul class="progressbar">
          <li class="active open-documents "  data-toggle="modal"
          data-target="#open_documents" ><span class="fa fa-plane"></span> <a> Case Started </a> </li>

          <?php
          $application_sent  = DB::table('enrolment_status_documents')
               ->where('status',1)
               ->where('client_unique_id',session()->get('unique_id_sess'))
               ->where('application_sent','application_sent')
               ->get();    
       ?>
@if($application_sent->count() > 0)
    <li class="active view-status" data-id="application_sent" data-toggle="modal" data-target="#application_sent_view"> 
            <span class="fa fa-plane"></span> 
           <a> Application Sent </a>  
    </li>
@else
<li class="add-status" data-toggle="modal" data-target="#add_enrolment_status_documents" data-id="application_sent">
    <span class="fa fa-plane"></span> 
     <a> Application Sent </a> 
     </li>
@endif

<?php 
$conditional_offer_letter_received  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','conditional_offer_letter_received')
->get(); ?>     
@if($conditional_offer_letter_received->count() > 0)

<li class="active view-status" data-id="application_sent" data-toggle="modal" data-target="#conditional_offer_letter_view"> 
              <span class="fa fa-plane"></span>  
              <a> Conditional Offer Letter Received</a> 
            </li>
         @else          
    <li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="conditional_offer_letter_received">

         <span class="fa fa-plane"></span>  <a> Conditional Offer Letter Received</a> 
        </li>
               @endif  
      
<?php 
               $full_offer_received  = DB::table('enrolment_status_documents')
               ->where('status',1)
               ->where('client_unique_id',session()->get('unique_id_sess'))
               ->where('application_sent','full_offer_received')
               ->get(); ?>     
               @if($full_offer_received->count() > 0)     
               <li class="active"  data-toggle="modal" data-target="#full_offer_received"> 
               <span class="fa fa-plane"></span> <a> Full Offer Received</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="full_offer_received">
     <span class="fa fa-plane"></span>
      <a> Full Offer Received</a> 
     </li>
          @endif




          <?php 
          $coe_received  = DB::table('enrolment_status_documents')
          ->where('status',1)
          ->where('client_unique_id',session()->get('unique_id_sess'))
          ->where('application_sent','coe_received')
          ->get(); ?>     
          @if($coe_received->count() > 0)     
          <li class="active"  data-toggle="modal" data-target="#coe_received"> 
          <span class="fa fa-plane"></span> <a> COE Received</a>  </li>
     
     @else
     <li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="coe_received">
     <span class="fa fa-plane"></span>
     <a> COE Received</a> 
     </li>
     @endif






     <?php 
     $enrolment_bank_loans  = DB::table('enrolment_bank_loans')
     ->where('status',1)
     ->where('client_unique_id',session()->get('unique_id_sess'))
    //  ->where('application_sent','coe_received')
     ->get(); ?>     
     @if($enrolment_bank_loans->count() > 0)     
     <li class="active"  data-toggle="modal" data-target="#coe_received"> 
     <span class="fa fa-plane"></span> <a> Bank Loan</a>  </li>
@else
<li data-toggle="modal" data-target="#add_enrolment_bank_loans" class="add-status" data-id="coe_received">
<span class="fa fa-plane"></span>
<a> Bank Loan</a> 
</li>
@endif



 

 
          <?php 
          $tution_fees_paid  = DB::table('enrolment_status_documents')
          ->where('status',1)
          ->where('client_unique_id',session()->get('unique_id_sess'))
          ->where('application_sent','tution_fees_paid')
          ->get(); ?>     
          @if($tution_fees_paid->count() > 0)     
          <li class="active"  data-toggle="modal" data-target="#tution_fees_paid"> 
          <span class="fa fa-plane"></span> <a> Tution Fees Paid</a>  </li>

@else
<li  data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="tution_fees_paid">
<span class="fa fa-plane"></span>
 <a> Tution Fees Paid</a> 
</li>
     @endif

<style>
.add-status{
    /* background: red; */
}
.detail-page-tab-view .table td, .my-table th{
    background: #ededed;
}
</style>



     <?php 
$study_commenced  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_commenced')
->get(); ?>     
@if($study_commenced->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#forex_exchange"> 
<span class="fa fa-plane"></span> <a> Forex Exchange</a>  </li>

@else
<li data-toggle="modal" data-target="#add_forex_exchange" class="add-status" data-id="forex_exchange">
<span class="fa fa-plane"></span>
<a>   Forex Exchange</a> 
</li>
@endif




<?php 
$study_commenced  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_commenced')
->get(); ?>     
@if($study_commenced->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#forex_exchange"> 
<span class="fa fa-plane"></span> <a> Sim Allocate</a>  </li>

@else
<li data-toggle="modal" data-target="#add_forex_exchange" class="add-status" data-id="forex_exchange">
<span class="fa fa-plane"></span>
<a> Sim Allocate</a> 
</li>
@endif




<?php 
$study_commenced  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_commenced')
->get(); ?>     
@if($study_commenced->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#study_commenced"> 
<span class="fa fa-plane"></span> <a> Study Commenced</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="study_commenced">
<span class="fa fa-plane"></span>
<a>  Study Commenced</a> 
</li>
@endif




<?php 
$student_follow_up  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','student_follow_up')
->get(); ?>     
@if($student_follow_up->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#student_follow_up"> 
<span class="fa fa-plane"></span> <a> Student Follow up</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="student_follow_up">
<span class="fa fa-plane"></span>
<a> Student Follow up</a> 
</li>
@endif



<?php 
$study_completed  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_completed')
->get(); ?>     
@if($study_completed->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#study_completed"> 
<span class="fa fa-plane"></span> <a> Study Completed</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="study_completed">
<span class="fa fa-plane"></span>
<a> Study Completed</a> 
</li>
@endif


         
        </ul>
      </div>
</div>
        <?php } } ?>



@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
   


</script>

{{-- 
$(document).ready(function(){
    $("#successMessage").delay(5000).slideUp(300);
}); --}}


@endif

<br>



<div class="row">
<div class="col-sm-12 download-and-resume" >

        <div class="class" STYLE="float: left;">
                {{-- @include('enquiry.client_detail_pdf'); --}}
                <a href="{{url('client-detail-pdf')}}">  <button class="fa fa-download">Generate PDF </button> </a>
                </div>
                <div class="class">
                    @if(!empty($get->resume))
                <a href="{{url('public/uploads/resume/'.$get->resume)}}" target="_blank"> <button class="fa fa-eye"> Resume </button> </a> 
                @endif
                </div>
                
</div>
</div>


<div class="container-fluid">
<div class="row detail-page-tab-view">
<div class="col-md-2 client-detail-left-side-tab panel" style="padding: 0; ">
<div style="
border: 1px solid #d5e1d6;
/* border-radius: 3px; */
padding: 15px;
/* background: radial-gradient(#2b6699, #202830); */
/* background:#e5e5e596; */
text-align:center;border-bottom: none;
min-height: 150px;
">
<div class="client-name">
        <div class="edit-name-class fa fa-edit show-edit-client-name-form" data-id=""  style="display:none" ></div>

        {{Form::open(array('url'=>"edit-client-image", 'class' => 'edit-client-name-form','files'=>'true' ))}}
        <span class="close-edit-client-name-form">X</span>
        
        <label for="edit_client_image" class="custom-file-upload">
                <i class="" ></i> Choose Image
              </label>
              <input id="edit_client_image" name='edit_client_image' type="file" style="display:none;" required>

        <input type="hidden" name="unique_id" value="{{$get->unique_id}}">
        <input type="submit" value="Upload" class="custom-file-upload">
        {{Form::close()}}

<?php if($get->image != ''){
?>
<img src="{!!url('public/uploads/image/'.$get->image) !!}" alt=""
style="width: 125px;
border-radius: 97px;
height: 118px;
object-fit: cover;
">
<?php
}
else { ?>
<img src="{!!url('public/uploads/image/alternet-user-image.png') !!}" alt="" style="width: 125px;
border-radius: 97px;
height: 118px;">
<?php
}
?>
</div>
<div class="client-name">
        @foreach($enquiries as $get)
<p > {{$get->name}} </p>
<div class="edit-name-class fa fa-edit show-edit-client-name-form" data-id=""  style="display:none" ></div>

{{Form::open(array('url'=>"edit-client-name", 'class' => 'edit-client-name-form' ))}}
<span class="close-edit-client-name-form">X</span>
<input type="text" name="edit_client_name" id="" class="" placeholder="{{$get->name}}" required>
<input type="hidden" name="unique_id" value="{{$get->unique_id}}">
<input type="submit" value="Save">
{{Form::close()}}
@endforeach
</div>

</div>
<ul class="nav nav-tabs" role="tablist" id="emp_detail_tab" >
<li class="nav-item" style="">
<a class="nav-link active" href="#emp_detail_overview" role="tab"
data-toggle="tab">Overview </a>
</li>
<li class="nav-item">
<a class="nav-link " href="#education" role="tab"
data-toggle="tab">Education </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#work_experience" role="tab"
data-toggle="tab">Work Experience </a>
</li>
<li class="nav-item">
<a class="nav-link " href="#english_language_test" role="tab"
data-toggle="tab">TOEFL / IELTS / PTE SCORE </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#course_enrolment_detail" role="tab"
data-toggle="tab">Course Enrollment Details </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#how_financial" role="tab"
data-toggle="tab">How student will show financials? </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#country_before_travell" role="tab"
data-toggle="tab">
Country Travelled Before</a>
</li>

<li class="nav-item">
        <a class="nav-link " href="#parent_sibling" role="tab"
        data-toggle="tab">
    Parent Name / Sibling
    </a>
        </li>


        <li class="nav-item">
                <a class="nav-link " href="#other_detail_overview" role="tab"
                data-toggle="tab">
           Other
            </a>
                </li>

                <li class="nav-item">
                        <a class="nav-link " href="#dependants" role="tab"
                        data-toggle="tab">
                    Dependants
                    </a>
                        </li>


                        <li class="nav-item">
                                <a class="nav-link " href="#term_and_condition" role="tab"
                                data-toggle="tab">
                            Term & Condition
                            </a>
                                </li>


                                <li class="nav-item">
                                        <a class="nav-link " href="#finance" role="tab"
                                        data-toggle="tab">
                                   Finance 
                                    </a>
                                        </li>                        


<li class="nav-item">
<a class="nav-link " href="#id_proof_detail" role="tab"
data-toggle="tab">Id Proof Details </a>
</li>

<li class="nav-item">
    <a class="nav-link " href="#upload_document" role="tab"
    data-toggle="tab"> Document Uploads </a>
    </li>


</ul>
</div>

<div class="col-md-8" id="st_detail"  style="">

{{-- nav tab start --}}
<div> 
        <ul class="nav nav-tabs" role="tablist" id="client_detail_tab_nav" >
                <li class="nav-item">
                <a class="nav-link active" href="#home_tab" role="tab"
                data-toggle="tab">Home </a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="#mail_tab" role="tab"
                data-toggle="tab">Mail </a>
                </li>

                <li class="nav-item">
                        <a class="nav-link " href="#communication_tab" role="tab"
                        data-toggle="tab">Communication </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link " href="#FAQ_tab" role="tab"
                                data-toggle="tab">FAQ </a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link " href="#FAQ_tab" role="tab"
                                        data-toggle="tab">Webinar </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#bank_loan" role="tab"
                                            data-toggle="tab">Bank Loan </a>
                                            </li>
        </ul>
  

        </div>
{{-- end fo tab start --}}

<div class="tab-content content-style active my-4" id="">
        <div role="tabpane" class="tab-pane active" id="home_tab">
        



<div class="tab-content content-style active my-4" id="">
<div role="tabpane" class="tab-pane active" id="emp_detail_overview">
<h5>Overview            <p id="emp_detail_overview_edit" class="fa  ">Edit </p> </h5>

{{-- <hr> --}}
<div class="client-detail-edit-button">
        {{-- <p class="edit-client-button  edit"> Edit</p> --}}
       
      </div>








      <div >

<table class="table my-table">
        {{Form::open(array('url'=>'edit-client-detail' , 'files' => "true"))}}
    @foreach($enquiries as $get)
    
    <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr >
<th>Gender </th>
<td> {{$get->gender}} 
</td>
<td>
    <select name="gender" id=""class="form-control">
        {{-- <option value="{{$get->gender}}"  selected>  Male</option>
        @if($get->gender == "Male")
        <option value="female">Female</option>
        @elseif($get->gender == "Female")
        <option value="Other">Other</option>
        @else
        <option value="Male">Male</option>
        @endif --}}

<?php
switch ($get->gender){
    case"Male":
?>
 <option value="{{$get->gender}}">{{$get->gender}}</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
<?php
break;
case"Female":
?>
<option value="{{$get->gender}}">{{$get->gender}}</option>
  <option value="Male">Male</option>
  <option value="Other">Other</option>
  <?php
  break;
  case"Other":
  ?>
<option value="{{$get->gender}}">{{$get->gender}}</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<?php
default:
?>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other"> Other</option>
<?php
}
  ?>
    </select>
</td>
 
</tr>
<tr>
<th>DOB </th>

<td> {{$get->dob}} </td>
<td> 
       <input type="text" name="dob" value="{{$get->dob}}"class="form-control date">     
</td>
</tr>
<tr>
<th>Contact No </th>
<td> {{$get->contact}} </td>
<td> <input type="number" name="number" value = "{{$get->contact}}" class="form-control" onkeypress="if(this.value.length==10)return false"> </td>
</tr>



<th>Alternate No </th>
<td> {{$get->alternate_contact}} </td>
<td> <input type="number" name="alternate_contact" value = "{{$get->alternate_contact}}" class="form-control" onkeypress="if(this.value.length==10)return false"> </td>
</tr>





<tr>
    <th>Residence Phone No </th>
    <td> {{$get->residence_phone_no}} </td>
    <td> <input type="number" name="residence_phone_no" value="{{$get->residence_phone_no}}" class="form-control"> </td>
    </tr>




<tr>
<th>Email </th>
<td> {{$get->email}} </td>
<td> <input type="email" name="email" value=" {{$get->email}}" class="form-control"> </td>
</tr>



<tr>
    <th>Alternate Email Id </th>
    <td> {{$get->alterate_email}} </td>
    <td> <input type="email" name="alterate_email" value=" {{$get->alterate_email}}" class="form-control"> </td>
    </tr>




<tr>
    <th>Whatsapp No </th>
    <td> {{$get->whatsapp_no}} </td>
    <td> <input type="number" name="whatsapp_no" value="{{$get->whatsapp_no}}" class="form-control"> </td>
    </tr>




    <tr>
        <th>Skype Id </th>
        <td> {{$get->skype_id}} </td>
        <td> <input type="text" name="skype_id" value="{{$get->skype_id}}" class="form-control"> </td>
        </tr>

        


    

    


 
<tr>
<th>Country </th>
<td>
    <?php  $countries =  DB::table('countries')->get();
    ?>
    

@if($get->country != null)

    {{$countries[$get->country-1]->country_name}}
    @endif
      </td>
    <td>
       
        <select name="country" id="" class="form-control" onChange="getState(this.value);" class="form-control">
                @if($get->country != null)
                
              <option value="{{$get->country}}" Selected >--{{$countries[$get->country-1]->country_name}}--</option>
                @endif
          @foreach($countries as $c)
        <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
      @endforeach
  </select>
  </td>
</tr>
  
        <tr>
                <th>State </th>
<td> 
        <?php 
             $states =  DB::table('states')->where('state_id',$get->state)->get();    
               ?>
        @if(($states->count() > 0 ))
    {{$states[0]->state_name}} 
    @endif
</td>
<td> 
        <select name="state" class="state-list form-control" onChange="getCity(this.value);" >
            <option value="{{$get->state}}">{{$get->state}}</option> 
                @if(($states->count() > 0 ))
                <option selected value="{{$get->state}}" >--{{$states[0]->state_name}}--</option>
                @endif
               </select> 
            </td>
</tr>


 
        <tr>
                <th>City </th>
<td> 
        <?php   
                // dd($get->city);
        $cities =  DB::table('cities')->where('city_name',$get->city)->get();  
            //   dd($cities);
        ?>  
   @if(($cities->count() > 0))
   {{$cities[0]->city_name}} 
@endif
</td>

<td>    <select name="city" id="" class="form-control city-list" >
        <option value="{{$get->city}}">{{$get->city}}</option>
        @if(($cities->count() > 0))
        <option value={{$cities[0]->city_name}}>--{{$cities[0]->city_name}}--</option>
        @endif
</select>  </td>
        </tr>



<tr>
<th>Ho No / Street </th>
<td> {{$get->address_line1}} </td>
<td> <input name="street"  type="text" value="{{$get->address_line1}}" class="form-control" > </td>
</tr>



{{-- 22-11-2019  add--}}

<tr>
    <th>Postal Code </th>
    <td> {{$get->pincode}} </td>
    <td> <input name="pincode"  type="text" value="{{$get->pincode}}" class="form-control"  onkeypress="if(this.value.length==6)return false"> </td>
    </tr>

<tr>
        <th>Country Of Birth </th>
        <td> {{$get->country_of_birth}} </td>
        <td> <input name="country_of_birth"  type="text" value="{{$get->country_of_birth}}" class="form-control" > </td>
        </tr>

        
<tr>
        <th>State Of Birth </th>
        <td> {{$get->satate_of_birth}} </td>
        <td> <input name="satate_of_birth"  type="text" value="{{$get->satate_of_birth}}" class="form-control" > </td>
        </tr>


        <tr>
                <th>Place Of Birth </th>
                <td> {{$get->place_of_birth}} </td>
                <td> <input name="place_of_birth"  type="text" value="{{$get->place_of_birth}}" class="form-control" > </td>
                </tr>

                <tr>
                        <th>Religioun  </th>
                        <td> {{$get->religoius}} </td>
                        <td> <input name="religoius"  type="text" value="{{$get->religoius}}" class="form-control" > </td>
                        </tr>


                        <tr>
                                <th>Current Country of residence  </th>
                                <td> {{$get->current_country_of_residence}} </td>
                                <td> <input name="current_country_of_residence"  type="text" value="{{$get->current_country_of_residence}}" class="form-control" > </td>
                                </tr>
        

                                <tr>
                                        <th> Nationality </th>
                                        <td> {{$get->nationility}} </td>
                                        <td> <input name="nationility"  type="text" value="{{$get->nationility}}" class="form-control" > </td>
                                        </tr>

                                        <tr>
                                                <th> Medical history/illness </th>
                                                <td> {{$get->medical_histoty}} </td>
                                                <td> <input name="medical_histoty"  type="text" value="{{$get->medical_histoty}}" class="form-control" > </td>
                                                </tr>                                  
                                                <tr>
                                                    <th> Criminal History/Cases </th>
                                                    <td> {{$get->criminal_histry}} </td>
                                                    <td> <input name="criminal_histry"  type="text" value="{{$get->criminal_histry}}" class="form-control" > </td>
                                                    </tr>  
                                                    <tr>
                                                        <th> Do you hold any other Nationalities ? </th>
                                                        <td> {{$get->hold_other_nationality}} </td>
                                                        <td> <input name="hold_other_nationality"  type="text" value="{{$get->hold_other_nationality}}" class="form-control" > </td>
                                                        </tr>                                                      
{{--end  22-11-2019  add--}}


@endforeach
</table>
 {{Form::submit('Update')}} 
{{Form::close()}}

</div>
</div>

{{-- second tab --}}
<div role="tabpane" class="tab-pane " id="education">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>Education</h4>

<hr>
<div class="client-detail-edit-button">
        <p id="education_edit"> Edit </p>    
        </div>
        


{{-- add more column --}}
<ul class="nav nav-tabs" role="tablist" id="student_education_nav"  style="display:flex">
    
    @if($enq_educations->count() > 0)
    
    @foreach($enq_educations as $get)
        <li class="nav-item">
        <a class="nav-link   get_education_by_class" href="#" role="tab"
        data-toggle="tab" data-id = "{{$get->class}}"  >{{$get->class}} </a>
        </li>
        @endforeach
        <li class="nav-item">
                <a class="nav-link   get_education_by_class" href="#" role="tab"
                data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
                </li>
@else
<li class="nav-item">
    <a class="nav-link   get_education_by_class" href="#" role="tab"
    data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
    </li>
    @endif
</ul>

{{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}

<table id="get_education_dynamic">  </table>
 
{{Form::close()}}
 
@if($enq_educations->count() > 0)
@foreach($enq_educations as $q) @endforeach
<div class="get-education-dynamic">
    {{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}
<table id="" class=""><tr>
<input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
     <th>Name of Examination Board </th>
      <td>{{$q->education_name}}</td>
      <td style="display: none;">
         <input type="hidden" name="name_of_class" value="{{$q->class}}"> 
          <input type="text" name="education_name" value="{{$q->education_name}}" class="form-control "> </td>
        
        </tr>

    <tr> <th>Name of Institution </th>
         <td >{{$q->institute_name}}</td> 
          <td style="display: none;"> 
            <input type="text" name="institute_name" value="{{$q->institute_name}}" class="form-control"> </td></tr>
    
    <tr> <th>Course Start Date </th> <td >{{$q->edu_start_date}}</td>
        <td style="display: none;"> <input type="text" name="edu_start_date" value="{{$q->edu_start_date}}" class="form-control date"> </td></tr>
    
    <tr> <th>Course End Date</th> <td >{{$q->edu_start_date}}</td><td style="display: none;"> <input type="text" name="edu_end_date" value="{{$q->edu_start_date}}" class="form-control date"> </td></tr>
    
    <tr> <th>Course Duration </th> <td >{{$q->course_duration}}</td><td style="display: none;"> <input type="text" name="course_duration" value="{{$q->course_duration}}" class="form-control "> </td></tr>
    
    <tr> <th>Year of Award </th> <td >{{$q->award_year}}</td><td style="display: none;"> <input type="text" name="award_year" value="{{$q->award_year}}" class="form-control "> </td></tr>
    
    
    <tr> <th>Medium of Study </th> <td >{{$q->study_medium}}</td><td style="display: none;"> <input type="text" name="study_medium" value="{{$q->study_medium}}" class="form-control "> </td></tr>
    
    <tr> <th> Mode of Study </th> <td >{{$q->mode_of_study}}</td><td style="display: none;"> <input type="text" name="mode_of_study" value="{{$q->mode_of_study}}" class="form-control "> </td></tr>
    
    <tr> <th>Country of Study </th> <td>{{$q->country_of_study}}</td><td style="display: none;"> <input type="text" name="country_of_study" value="{{$q->country_of_study}}" class="form-control "> </td></tr>
    
    <tr> <th>State of Study</th> <td >{{$q->state_of_study}}</td><td style="display: none;"> <input type="text" name="state_of_study" value="{{$q->state_of_study}}" class="form-control "> </td></tr>
    
    
    
    <tr> <th>City/Place of Study</th> <td >{{$q->place_of_study}}</td><td style="display: none;"> <input type="text" name="place_of_study" value="{{$q->place_of_study}}" class="form-control "> </td></tr>  <tr><td><div class="update-button-cli"> <td> {{Form::submit('Update')}} </td></div></td></tr> </table>

    {{Form::close()}}
</div>




{{-- <table class="table my-table get_education_dynamic_prev" id="">

<tr>
    <th>Name of Examination Board </th>
    
    <td> {{$get->education_name}} </td>
    <td> 
        <input type="text" name="name_of_class" value="dsfsdfsdfgsdgfdgfdg">
           <input type="text" name="education_name" value="{{$get->education_name}}"class="form-control datepicker">     
    </td>
    </tr>
    <tr>
    <th>Name of Institution </th>
    <td> {{$get->institute_name}} </td>
    <td> <input type="text" name="institute_name" value = "{{$get->institute_name}}" class="form-control" > </td>
    </tr>

    <tr>
        <th>Course Start Date </th>
        
        <td> {{$get->edu_start_date}} </td>
        <td> 
               <input type="text" name="edu_start_date" value="{{$get->edu_start_date}}"class="form-control datepicker">     
        </td>
        </tr>
        <tr>
        <th>Course End Date</th>
        <td> {{$get->edu_end_date}} </td>
        <td> <input type="text" name="edu_end_date" value = "{{$get->edu_end_date}}" class="form-control datepicker" > </td>
        </tr>


        <tr>
            <th>Course Duration </th>
            
            <td> {{$get->course_duration}} </td>
            <td> 
                   <input type="text" name="course_duration" value="{{$get->course_duration}}"class="form-control ">     
            </td>
            </tr>
           


            <tr>
                <th>Year of Award </th>
                
                <td> {{$get->award_year}} </td>
                <td> 
                       <input type="text" name="award_year" value="{{$get->award_year}}"class="form-control ">     
                </td>
                </tr>



                

        <tr>
            <th>Medium of Study </th>
            
            <td> {{$get->study_medium}} </td>
            <td> 
                   <input type="text" name="study_medium" value="{{$get->study_medium}}"class="form-control ">     
            </td>
            </tr>


            

        <tr>
            <th> Mode of Study </th>
            
            <td> {{$get->mode_of_study}} </td>
            <td> 
                   <input type="text" name="mode_of_study" value="{{$get->mode_of_study}}"class="form-control ">     
            </td>
            </tr>


            

        <tr>
            <th>Country of Study </th>
            
            <td> {{$get->country_of_study}} </td>
            <td> 
                   <input type="text" name="country_of_study" value="{{$get->country_of_study}}"class="form-control ">     
            </td>
            </tr>


            

        <tr>
            <th>State of Study</th>
            
            <td> {{$get->state_of_study}} </td>
            <td> 
                   <input type="text" name="state_of_study" value="{{$get->state_of_study}}"class="form-control ">     
            </td>
            </tr>


            

        <tr>
            <th>City/Place of Study</th>
            
            <td> {{$get->place_of_study}} </td>
            <td> 
                   <input type="text" name="place_of_study" value="{{$get->place_of_study}}"class="form-control ">     
            </td>
            </tr>


         




</table> --}}
{{-- <div class="update-button-cli"> <td> {{Form::submit('Update')}} </td></div> --}}

@endif
{{-- end fof add more colummn --}}








{{-- 
<table class="table add-class">
<tr>
<th>Qualification</th>
<th>Stream</th>
<th>Board/University</th>
<th>Year of Passing</th>
<th colspan="2">  Percentage</th>

</tr> --}}



@if($enq_educations->count() > 0)

@foreach($enq_educations as $e)

{{-- <tr>
<td> <p> {{$e->class}} </p> <p> <input type="text" value="{{$e->class}}" name="qualification_name[]" value="{{$e->class}}"> </p> </td>
<td> <p> {{$e->stream}} </p> <p> <input type="text" value="{{$e->stream}}" name="edu_stream[]" value="{{$e->stream}}"> </p> </td>
<td> <p>  {{$e->education_name}} </p>
    <p> <input type="text" value="{{$e->education_name}}" name="institute_name[]" value="{{$e->education_name}}"></p>  </td>


<td> <p>  {{$e->passing_year}} </p>
<p> 
  
    <select name="passing_year[]" id="">
        <option value="{{$e->passing_year}}">{{$e->passing_year}}</option>
    @for($a=1990; $a<=date('Y'); $a++)
    @if($a ==  $e->passing_year)
    @continue;
        @endif
        <option value="{{$a}}"> {{$a}} </option>
    @endfor
</select>
 </p> </td>

<td   style="position:relative"> <p> {{$e->percentage}} </p> 
<p> <input type="number" value="{{$e->percentage}}" name="percentage[]" value="{{$e->percentage}}">  </p>
 </td>
<td id="plus-button-toggle" style="position:relative;width: 50px;display:none"><button type="button" onclick="add_education();" class="fa fa-plu plus-sign" >   +</button></td>

</tr> --}}

@endforeach
@elseif($enq_educations->count()  == 0)

{{-- <tr><td><select name="qualification_name[]" id="" class="form-control">
    <option selected disabled> selected </option>

    <option value="Certificate I"> Certificate I </option>
    <option value="Certificate II"> Certificate II </option>
    <option value="Certificate III"> Certificate III </option>
    <option value="Certificate IV"> Certificate IV </option>
    <option value="Diploma"> Diploma </option>
    <option value="Advance Diploma"> Advance Diploma </option>
   <option value="10"> 10 </option>
   <option value="12"> 12 </option>
   <option value="Graduate"> Graduate </option>
   <option value="post Graduate"> Post Graduate </option>
 </select></td>
<td> {!! Form::text('edu_stream[]', null, array('class'=>'form-control' )) !!}</td>
<td>{!! Form::text('institute_name[]', null, array('class'=>'form-control' )) !!}</td>
<td><select name="passing_year[]" id="" class="form-control">
    <option selected disabled>--Selected--</option>
    @for($i=1990; $i<=2020; $i++)
    <option value="{{$i}}"> {{$i}}  </option>
    @endfor 
  </select></td>
  <td>{!! Form::text('percentage[]', null, array('class'=>'form-control' )) !!}</td>
  <td style="position:relative;width: 50px;"><button type="button" onclick="add_education();" class="fa fa-plu plus-sign" >   +</button></td>
</tr> --}}
@endif
<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">




</table>
{{-- <div class="update-button-client"> <td> {{Form::submit('Update')}} </td></div> --}}

{{Form::close()}}
</div>
</div>












{{-- thirg tab --}}
<div role="tabpane" class="tab-pane " id="work_experience">
  @include('enquiry.work_experience')
</div>
{{-- end third tab --}}




{{-- fourth tab --}}


<div role="tabpane" class="tab-pane " id="english_language_test">
    @include('enquiry.english_language_test_score')
</div>











{{-- fifth tab --}}
<div role="tabpane" class="tab-pane " id="course_enrolment_detail">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
Course Enrollment Details</h4>
<hr>
{{Form::open(array('url' => 'update-enrolment-course'))}}
<div class="client-detail-edit-button">
    <p id="course_enrolment_detail_edit"> Edit </p>
</div>



<form action="">
<table class="table">
<tr>
<th>

Start Session </th>
<th>
  Country</th>
<th>
Course</th>
<th>
Interested for Intake </th>
</tr>

@foreach($enquiries as $e)
<tr>
<td>    <p> {!! $e->course_session !!}  </p>  <p>
    
<select name="course_session" id="" class="form-control">
    <option value="{!! $e->course_session !!}" selected>  {!! $e->course_session !!} </option>
@for($a=2019; $a<=2023; $a++)
@if($a ==  $e->course_session)
@continue;
    @endif
    <option value="{{$a}}"> {{$a}} </option>
@endfor
{{-- <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id"> --}}

</select>
</p>       </td>

<td>    <p> {!! $e->course_country !!}  </p>  <p> 
    {{-- <input type="text" name="course_country" value="{!! $e->course_country !!}">  --}}
    <select name="course_country" id="" class="form-control">

        <option value="{!! $e->course_country !!}"> {!! $e->course_country !!} </option>
        <?php
        $country = DB::table('countries')->get();
        foreach($country as $c){
        ?>
        @if($c->country_name ==  $e->course_country)
        @continue;
            @endif
        <option value="{{$c->country_name}}">  {{$c->country_name}} </option>
        <?php } ?>
    </select>
 </p>  </td>

<td>    <p> {!! $e->course !!} </p>           <p> <input type="text" name="course" value="{!! $e->course !!}" class="form-control" >  </p>        </td>

<td>    <p>  {!! $e->course_intake !!}  </p> 
     {{-- <p> <input type="text" name="course_intake" value="{!! $e->course_intake !!}">  </p>     --}}
    <p>
            <script>
            //     function get_month(val){
            //         var a = "{{$e->course_intake}}";
            //    console.log(a.length,val.length);
            //         if(a == val){
                       
            //         }
            //         }
                    </script>  

        <select name="course_intake" id="intake_month" onchange="get_month(this.value)" class="form-control">
     
            @if($c->country_name ==  $e->course_country)
            @continue;
                @endif 
            <option value="{{ $e->course_intake }}" selected  >{{ $e->course_intake }}</option>
            <option value="January">January </option>
            <option value="February">February </option>
            <option value="March">March  </option>
            <option value="April">April </option>
            <option value="May">May </option>
            <option value="June">June </option>
            <option value="July">July  </option>
            <option value="August">August  </option>
            <option value="September">September  </option>
            <option value="October">October  </option>
            <option value="November">November </option>
            <option value="December">December </option>


    </select> </p>
    </td>
</tr>

@endforeach

{{-- <tr class="update-button-client"> <td> {{Form::submit('Update')}} </td> </tr>
{{Form::close()}} --}}

<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr class="update-button-client" > <td > {{Form::submit('Update')}} </td> </tr>

</table>
{{Form::close()}}
</div>
</div>


{{-- six tab --}}
<div role="tabpane" class="tab-pane " id="how_financial">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
How student will show financials</h4>
<hr>
<div class="client-detail-edit-button">
    <p id="how_financial_edit"> Edit </p>
</div>
{{Form::open(array('url' => 'update-student-financial'))}}
<table class="table add-financial ">
    @if($enq_financials->count()> 0)
@foreach($enq_financials as $f)
<tr > <td> <p>  {!! $f->financials_by !!} </p>    <p> 

    {{-- <input type="text" name="financial_by[]" value="{!! $f->financials_by !!}" class="form-control" >   --}}

    <select     class="form-control selected-disabled" name="financial_by[]" value="{!! $f->financials_by !!}">  
<option aria-readonly="" value="{!! $f->financials_by !!}" selected>{!! $f->financials_by !!}</option>    

              <option  VALUE="Bank loan">Bank loan</option>
              <option VALUE="Personal Fund">Personal Fund</option>
              <option VALUE="Family Sponsorship">Family Sponsorship</option>
              <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
              <option VALUE="Other">Other</option>
            </select>  

</p>  </td>

<td>       <p> {!! $f->amount !!}         </p>  <p> <input type="number" name="amount[]"  value="{!! $f->amount !!}"  class="form-control" >  </p>  

</td>




<td style="position:relative;display:none;" id="add_finance_button">   <button type="button" onclick="financial();" class="fa fa-plu plus-sign">   + </button> 
</td>
</tr>
@endforeach

@elseif($enq_financials->count()  == 0)
<tr><td>
        <select class="form-control" name="financial_by[]">
                <option disabled selected>--Select--</option>    
                  <option VALUE="Bank loan">Bank loan</option>
                  <option VALUE="Personal Fund">Personal Fund</option>
                  <option VALUE="Family Sponsorship">Family Sponsorship</option>
                  <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                  <option VALUE="Other">Other</option>
                </select>  
</td>
<td>   {!! Form::number('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}  </td>


 <td style="position:relative"id="add_finance_button">   <button type="button" onclick="financial();" class="fa fa-plu plus-sign">   + </button> </td>
 {{-- <td style="position:relative;">   <button type="button" onclick="financial();" class="fa fa-plu plus-sign">   + </button>  --}}
 </td>
</tr>


@endif
</table>
<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr class="update-button-client"> <td> {{Form::submit('Update')}} </td> </tr>
{{Form::close()}}

</div>
</div>


{{-- seven tab --}}
<div role="tabpane" class="tab-pane " id="marital_status">
<div class=" " data-toggle="modal" data-target="#" >
<h4> Marital Status</h4>
<table class="table">
<tr>
<td>
Date of Marriage</td>
<td>
  Spouse Qualification</td>
<td>
  Spouse Income Proof</td>
</tr>
</table>

</div>
</div>

{{-- eight tab --}}
<div role="tabpane" class="tab-pane " id="country_before_travell">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4> Country Travelled Before</h4>
<hr>
<div class="client-detail-edit-button">
    <p id="country_before_travell_edit"> Edit </p>
</div>
{{Form::open(array('url' => 'update-visa-rejected'))}}
<table class="table append-imm-history">
<tr>
<th>
Country</th>
<th>
From</th>
<th>
To</th>
<th colspan="2">
Duration</th>
</tr>
@if($enq_travelled_historys->count() > 0)
@foreach($enq_travelled_historys as $history)
<tr>
<td> <p> {!! $history->travelled_before_country!!} </p>  <p>  
    
    {{-- <input type="text" name="travelled_before_country[]" value="{!! $history->travelled_before_country!!}" class="form-control">   --}}

    <select name="travelled_before_country[]" id="" class="form-control">
        <option selected value="{!!$history->travelled_before_country!!}"> {!! $history->travelled_before_country !!} </option>
            @foreach($country as $c)
                <option value="{{$c->country_name}}"> {{$c->country_name}} </option>
            @endforeach
                </select>            
</p>

</td>

<td> <p> {!! $history->travelled_before_from !!} </p>  <p>  
    


<input  name="travelled_before_from[]" value="{!! $history->travelled_before_from !!}" class="form-control travelled_before_from" > 

</p>  </td>

<td> <p> {!! $history->travelled_before_to !!}  </p>  <p>  
    <input  name="travelled_before_to[]" value="{!! $history->travelled_before_to !!}" class="travelled_before_to form-control">   </p> 
</td>




<td> <p> {!! $history->travelled_before_duration !!} </p>  <p>  <input type="text" name="travelled_before_duration[]" value="{!! $history->travelled_before_duration !!}" class="form-control">   </p>  </td>

<td id="plus-button-history" style="position:relative;width: 50px;display:none"><button type="button" onclick="add_imm_history();" class="fa fa-plu plus-sign" >   +</button></td>

</tr>
@endforeach

@elseif($enq_travelled_historys->count() == 0)
   <tr>  
<td>
    <select name="travelled_before_country[]" id="" >
      
@foreach($country as $c)
    <option value="{{$c->country_name}}"> {{$c->country_name}} </option>
@endforeach
        
    </select>
    
    </td>       
<td>
        {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
    <input  type="date" class="datepicker form-control"name="travelled_before_from[]"  />
       
    
    {{-- <input type="text" "> --}}
</td>
<td> <input   type="date" class=" datepicke form-control   "name="travelled_before_to[]" > </td>   
<td><input type="text" class="form-control"name="travelled_before_duration[]"></td>

<td id="plus-button-history" style="position:relative;width: 50px;"><button type="button" onclick="add_country_before();" class="fa fa-plu plus-sign" >   +</button></td>
</tr> 

@endif
</table>
<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr class="update-button-client" > <td> {{Form::submit('Update')}} </td> </tr>
{{Form::close()}}

<br><br>

{{-- <h4> Any Visa Rejected Before </h4>
<hr>
<ul>
@foreach($enq_visa_rejected_countrys as $visa)
<li>
 <p>  {!! $visa->country !!}</p>
</li>
@endforeach
</ul> --}}

</div></div>




{{-- parent sibling section --}}


<div role="tabpane" class="tab-pane " id="parent_sibling">
    @include('enquiry.parent_sibling_nav')
</div>
{{-- end of parent sibling section --}}

@include('enquiry.other-details')

@include('enquiry.term-condition')


{{-- start finance  --}}
@include('enquiry.finance')
{{-- end finance  --}}



{{-- ten tab --}}
<?php $enq_id_proof_type = Helper::get_id_proof_name();
$get_passport = Helper::get_passport(session()->get('unique_id_sess'));
// dd($get_passport[0]->name_on_id_proof);
?>
<div role="tabpane" class="tab-pane " id="id_proof_detail">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Id Proof Details</h4>
<hr>

{{-- passport --}}

<div class="passport" id="passport">
    {{Form::open(array('url'=> 'add-update-passport', 'files'=> true))}}
    <h5>Passport            <p id="passport_edit" class="fa"> Edit</p> </h5>
    <table>
        <tr>
            <th>Name in Passport</td>
            <td> {{isset($get_passport[0]->name_on_id_proof)?$get_passport[0]->name_on_id_proof:'-'}} </td>
            <td>  <input type="text" name="name_on_passport" value="{{isset($get_passport[0]->name_on_id_proof)?$get_passport[0]->name_on_id_proof:''}}"> </td>
            </tr>

            <tr>
                <th>Passport Number</td>
                    <td> {{isset($get_passport[0]->id_proof_number)?$get_passport[0]->id_proof_number:'-'}} </td>
            <td> <input type="text" name="passport_number" value="{{isset($get_passport[0]->id_proof_number)?$get_passport[0]->id_proof_number:''}}"> </td>
            </tr>
            <tr>
                <th> Date of Birth </td>
                    <td> {{isset($get_passport[0]->date_of_birth)?$get_passport[0]->date_of_birth:'-'}} </td>
            <td> <input type="text" class="date" name="date_of_birth" value="{{isset($get_passport[0]->date_of_birth)?$get_passport[0]->date_of_birth:''}}"> </td>
            </tr>
            <tr>
                <th>Passport Issue City </td>
                    <td> {{isset($get_passport[0]->place_of_issue)?$get_passport[0]->place_of_issue:'-'}} </td>
            <td> <input type="text" name="place_of_issue" value="{{isset($get_passport[0]->place_of_issue)?$get_passport[0]->place_of_issue:''}}"> </td>
                </tr>
<tr>
                <th> Date of Issue</td>
                    <td> {{isset($get_passport[0]->date_of_issue_passport)?$get_passport[0]->date_of_issue_passport:'-'}} </td>
            <td> <input type="text" class="date" name="date_of_issue_passport" value="{{isset($get_passport[0]->date_of_issue_passport)?$get_passport[0]->date_of_issue_passport:''}}"> </td>
</tr>
<tr>
<th>
    Date of pasport
</td>
<td> {{isset($get_passport[0]->date_of_expiry_passport)?$get_passport[0]->date_of_expiry_passport:'-'}} </td>
<td> <input type="text" class="date" name="date_of_expiry_passport" value="{{isset($get_passport[0]->date_of_expiry_passport)?$get_passport[0]->date_of_expiry_passport:''}}"> </td>
        </tr>

<tr>
    <th>Image</th>
    @if(isset($get_passport[0]->id_image))
    <td><a href="{{url("public/uploads/image/passport/".$get_passport[0]->id_image)}}" target="_blank"> <img style="width:80px;"  src={{url("public/uploads/image/passport/".$get_passport[0]->id_image)}} alt="Upload"> </a> </td> @endif
    {{-- <td> <img src="{{url('uploads\image\passport/').isset($get_passport[0]->id_image)?$get_passport[0]->id_image:'image'}}" alt="Upload"> </td> --}}
    <td> <label for="passport_file" class="upload-file"> Upload Passport Image</label>
         <input type="file" name="upload_passport" class="upload-file" id="passport_file" style="display:none">
         </td>
</tr>

    </table> 
    <input type="hidden" name="unique_id"  value="{{session()->get('unique_id_sess')}}">
    <div>
    <input type="submit">   
</div>
    {{Form::close()}}
</div>
<script>
    $('#passport_edit').click(function(){

        

            var a  = $('#passport_edit').text();
            if(a == "Back"){    
                $('#passport').find('table').find('tr').find('td:first').show();
            $('#passport').find('table').find('tr').find('td:last').hide();
            $('#passport').find('input[type="submit"]').hide();        
            $('#passport_edit').text('Edit');
            }
            else{

            $('#passport_edit').text('Back');
            $('#passport').find('table').find('tr').find('td:first').hide();
            $('#passport').find('table').find('tr').find('td:last').show();
            // $('#passport').find('table').find('tr').find('td').css('display','block !important');
            $('#passport').find('input[type="submit"]').show();
            }
        });
</script>

{{-- end passpost --}}

<hr>

<div class="client-detail-edit-button">
    <h6>Other     <p id="id_proof_detail_edit">Edit</p> </h6>
</div>
<?php 
$get_id_proof_details  = Helper::get_client_id_proof(session()->get('unique_id_sess'));
$get_id_proof_name_only = DB::table('enq_id_proof')->select('id_proof')->where('enquiry_id',session()->get('unique_id_sess'))->get();

?>
{{Form::open(array('url' =>'update-idproof', 'files' => 'true'))}}
<table class="table add-more-document-parent">
<tr>
<th>Id Proof</th>
<th>
  Name (Name In ID Proof)</th>
<th >
ID Proof No</th>
<th colspan="2">Upload</th>
</tr>



@if($get_id_proof_details != "")
@foreach($get_id_proof_details as $e)
<tr class="id-class-view">
<td> 
        <p> {!! $e->id_proof !!} </p>       <p> 
        <select class="form-control" name="id_proof[]">
                <option value="{!!$e->id_proof!!}" selected> {!! $e->id_proof !!}</option>
                    </select>
    </p>     
</td>

<td>
       
    <p>  {!! $e->name_on_id_proof !!} </p>   <p> <input type="text" name="name_on_id_proof[]" value="{!! $e->name_on_id_proof !!}" class="form-control" required>  </p>    

</td>   
<td>
    <p>  {!! $e->id_proof_number !!} </p>   <p> <input type="text" name="id_proof_number[]" value="{!! $e->id_proof_number !!}" class="form-control" required>  </p>    

</td>   

<td>
    
<p>  {!! $e->id_image !!}  <a href=""> <img src=""> </p>   <p> <input type="file" id="{{'a'.$e->id}}" name="id_image[]" value="{!! $e->id_image!!}" class="form-control" img-id="{{$e->id}}"  onchange="set_hidden_image_data(this);">  

</p>    
<input type="hidden" name="id_image_hidden[]" value="0"  >
<input type="hidden" name="doc_id[]" id="" value="{{$e->id}}">


</td>   

<td id="plus-button-toggle-doc" style="position:relative;width: 50px;display:none;background: #fbfbfb;
border: 1px solid #eae8e8 !important;"><button type="button" onclick="add_document();" class="fa fa-plu plus-sign" >   +</button></td>


</tr>
@endforeach
@endif
@if(count($get_id_proof_details) == 0)

<tr>
    <td>
        <select class="form-control" name="id_proof[]">
            <option disabled selected> --Selected--</option>
        @foreach($enq_id_proof_type as $idName)
        <option value="{{$idName->name}}">{{$idName->name}}</option>
        @endforeach
                {{-- <option value="AADHAAR CARD">AADHAAR CARD</option>
                <option value="VOTER ID">VOTER ID</option>
                <option value="PAN CARD">PAN CARD</option>
                <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                <option value="PASSPORT">PASSPORT</option> --}}
              </select>
    </td>
    <td>
        {!! Form::text('name_on_id_proof[]', null, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof ')) !!}
    </td>
    <td>
        {!! Form::text('id_proof_number[]', null, array('class'=>'form-control', 'placeholder'=>'ID Proof No')) !!}

    </td>
    
<td>
   <input type="file" name="id_image[]"  class="form-control" > 
   
    </td>   
    <td id="plus-button-toggle-doc" style="position:relative;width: 50px;display:none;"><button type="button" onclick="add_document();" class="fa fa-plu plus-sign" >   +</button></td>
</tr>
@endif
</table>

<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

 <div class="update-button-client"> {{Form::submit('Update')}} </div> 
{{Form::close()}}

</div>
</div>


{{-- end of ten (id proof section) --}}


@include('enquiry.upload_docuemnt_section')


 


</div>
        </div>

{{-- comment section --}}
{{-- <br>
<hr>
<div>
<h4> Comments </h4>
</div>
@if(!empty($enq_comments))

<table class="table">
<tr>
<th>Agent Name</th>
<th>Last Update</th>
<th>Calling Date</th>
<th>Calling Time</th>
<th> Status</th>
<th> Comment</th>
</tr>
@foreach($enq_comments as $e)
<tr>
<td> {{$e->agent_name}} </td>
<td>
// if($e->calling_date != null){
// echo $e->calling_date;
// }
// else{
// echo$e->date;
// }
</td>
<td> {{$e->calling_date}} </td>
<td> {{$e->callbacklater_time}} </td>
<td> {{$e->status}} </td>
<td style="max-width: 300px"> {{$e->comment}} </td>

</tr>
@endforeach
</table>

@endif --}}
{{-- end of comment --}}


<div role="tabpane" class="tab-pane " id="mail_tab">
  {{-- @include('enquiry.client-mail'); --}}
  mail
</div>

<div role="tabpane" class="tab-pane " id="communication_tab">
@include('enquiry.client-communication');
</div>

<div role="tabpane" class="tab-pane " id="FAQ_tab">
      <div>
            Origins
            While the name may be recent, the FAQ format itself is quite old. For example, Matthew Hopkins wrote The Discovery of Witches in 1647 as a list of questions and answers, introduced as "Certain Queries answered". Many old catechisms are in a question-and-answer (Q&A) format. Summa Theologica, written by Thomas Aquinas in the second half of the 13th century, is a series of common questions about Christianity to which he wrote a series of replies. Plato's dialogues are even older.
            
            On the Internet
            The "FAQ" is an Internet textual tradition originating from the technical limitations of early mailing lists from NASA in the early 1980s. The first FAQ developed over several pre-Web years, starting from 1982 when storage was expensive. On ARPANET's SPACE mailing list, the presumption was that new users would download archived past messages through FTP. In practice this rarely happened, and the users tended to post questions to the mailing list instead of searching its archives. Repeating the "right" answers became tedious, and went against developing netiquette. A series of different measures were set up by loosely affiliated groups of computer system administrators, from regularly posted messages to netlib-like query email daemons. The acronym FAQ was developed between 1982 and 1985 by Eugene Miya of NASA for the SPACE mailing list.[1] The format was then picked up on other mailing lists and Usenet newsgroups. Posting frequency changed to monthly, and finally weekly and daily across a variety of mailing lists and newsgroups. The first person to post a weekly FAQ was Jef Poskanzer to the Usenet net.graphics/comp.graphics newsgroups. Eugene Miya experimented with the first daily FAQ.
            
            Meanwhile, on Usenet, Mark Horton had started a series of "Periodic Posts" (PP) which attempted to answer trivial questions with appropriate answers.[citation needed] Periodic summary messages posted to Usenet newsgroups attempted to reduce the continual reposting of the same basic questions and associated wrong answers. On Usenet, posting questions that were covered in a group's FAQ came to be considered poor netiquette, as it showed that the poster had not done the expected background reading before asking others to provide answers. Some groups may have multiple FAQs on related topics, or even two or more competing FAQs explaining a topic from different points of view.
            
            Another factor on early ARPANET mailing lists was people asking questions promising to 'summarize' received answers, then either neglecting to do this or else posting simple concatenations of received replies with zero or limited quality checking.
      </div>
        </div>





   



        <div role="tabpane" class="tab-pane " id="bank_loan">
            {{Form::open(array('url' => 'request-bank-loan'))}}
           
@include('enquiry.bank_loan')
<tr>
    <td>
    <table  class="attech-doc-mail" border="1" style="border: none !important;
    border-top: 1px solid #ded5d5!important;"> 
    <tbody style="border:none !important;border-top: 1px solid #ded5d5 !important;">
     <tr>

      
<td> <strong> Id Proof: </strong> </td>   
      <td>  
             
              {{-- <a href="{{url('public/uploads/image/'.$e->image)}}" target="_blank">
                 <img src="{{url('public/uploads/image/'.$e->image)}}" alt="" width="50px;"> 
         </a> --}}


         <label class="custom-control material-checkbox">
          <input type="checkbox" class="material-control-input" name="addIdProof" value="addIdProof">
          <span class="material-control-indicator"></span>
      </label>

       {{-- {{Form::hidden('id_proof', url('public/uploads/image/'.$e->image) )}} --}}
          </td>    
    </tr>  
     <tr>
    <td> <strong> Educational Documents </strong> </td>   
    <td> 
       
      <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input"  name="educationalDocuments" value="educationalDocuments">
        <span class="material-control-indicator"></span>
    </label>
    
    </td>

    </tr>  
    
    
<tr>
  <th> Attech Offer Letter  </th>
  <td><label class="custom-control material-checkbox">
    <input type="checkbox" class="material-control-input"  name = "offerLetter" value="offerLetter">
    <span class="material-control-indicator"></span>
</label></td>
</tr>
  </tbody>
    </table>    
    </td>    
    </tr>      

<tr><td>
    <div class="bank-name">
        <label class="control control--checkbox">ICICI BANK
            <input type="checkbox" checked="checked" value="bank1" name="bank1"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">HDFC
            <input type="checkbox" value="bank2"  name="bank2"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">SBI
            <input type="checkbox" value="SBI"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">KOTAK MAHINDRA BANK
            <input type="checkbox" value="kotak"/>
            <div class="control__indicator"></div>
            <input type="text" value="{{Session()->get('unique_id_sess')}}" name="unique_id">
          </label>
        </div> 
</td></tr>

   


    <tr>  <td> {{Form::submit('Send Mail')}}  </td> </tr>
    </table>
    {{Form::close()}}
        </div>
    
  

<style>
 
h1 {
  font-family: 'Alegreya Sans', sans-serif;
  font-weight: 300;
  margin-top: 0;
}
.control-group {
  display: inline-block;
  vertical-align: top;
  background: #fff;
  text-align: left;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  padding: 30px;
  width: 200px;
  height: 210px;
  margin: 10px;
}
.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 18px;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
}
.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc;
}
.control input:checked ~ .control__indicator {
  background: #2aa1c0;
}
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #0e647d;
}

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 8px;
  top: 4px;
  width: 3px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}
.control--radio .control__indicator:after {
  left: 7px;
  top: 7px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: #fff;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #7b7b7b;
}
.select {
  position: relative;
  display: inline-block;
  margin-bottom: 15px;
  width: 100%;
}
.select select {
  display: inline-block;
  width: 100%;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: 0;
  background: #e6e6e6;
  color: #7b7b7b;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:hover,
.select select:focus {
  color: #000;
  background: #ccc;
}
.select select:disabled {
  opacity: 0.5;
  pointer-events: none;
}
.select__arrow {
  position: absolute;
  top: 16px;
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-style: solid;
  border-width: 8px 5px 0 5px;
  border-color: #7b7b7b transparent transparent transparent;
}
.select select:hover ~ .select__arrow,
.select select:focus ~ .select__arrow {
  border-top-color: #000;
}
.select select:disabled ~ .select__arrow {
  border-top-color: #ccc;
}

</style>




</div>
</div>

@include('enquiry.activity')

</div>
</div>

<hr style="background: #d6d7d8;">

<div style="text-align: right;
margin-right: 44px;">
<?php
$check_document_status = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))->get();


$ch = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('approve_or_not',2)
->get();

$upload_documents_again = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('upload_documents_again', 1)
->get();


if($upload_documents_again->count() > 0){
    if(($check_document_status->count() > 0) && ($upload_documents_again[0]->upload_documents_again == 1)){
        ?>
        <button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#add_doc_again" style=><i class="" aria-hidden="true"></i>
Documents Uploaded Again</button>
<?php
    }
}

elseif($ch->count() > 0){
if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2)){
    ?>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Upload Again</button>
<?php
} 
}


elseif($check_document_status->count() > 0){

$approve = DB::table('enrolment_documents')
        ->where('client_unique_id', session()->get('unique_id_sess'))
        ->where('approve_or_not',1)
        ->get();
        // $approve-count()

if($approve->count()  == $check_document_status->count())
{}
else{
?> 
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Uploaded</button>
<?php
}
}
else{
?>
<br>
<br>
<br>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Proceed</button>
<?php }
?>

</div>
{{-- comment section --}}
<div style="" id="detail_page_comments">
<br>
<br>
<h4>Comments</h4>
<p> </p>
@if(!empty($enq_comments))

<table class="table">
<tr>
<th>Agent Name</th>
<th>Last Update</th>
<th>Calling Date</th>
<th>Calling Time</th>
<th> Status</th>
<th> Comment</th>
</tr>
@foreach($enq_comments as $e)
<tr>
<td> {{$e->agent_name}} </td>
<td>
<?php
if($e->calling_date != null){
echo $e->calling_date;
}
else{
echo$e->date;
}
?>
</td>
<td> {{$e->calling_date}} </td>
<td> {{$e->callbacklater_time}} </td>
<td> {{$e->status}} </td>
<td style="max-width: 300px"> {{$e->comment}} </td>

</tr>
@endforeach
</table>

@endif
</div>
{{-- end of comment --}}

{{-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> --}}
<script>

$(document).ready(function(){
$(".delete").on("click", function(){
var unique_id = $(this).attr("data-id");
// var val = $(this).val();


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

// var unique_id =$('.update_status').attr("data-id");
if (confirm('Are you sure you want to Delete this?')) {
$.ajax({
type: "get",
url: "{{url('delete')}}?a="+unique_id,

success: function(data){
alert('Record Delete Successfully ');
window.history.back();
}
});
}
}
);
});
</script>




<!-- The Modal -->

<!-- The Modal -->
<div class="modal" id="enrolment_proceed">

<div class="modal-dialog" style="width:1000px;max-width:1000px;">
<div class="modal-content" style="width:1000px !important; min-height:
300px;max-width:1000px; ">
<!-- Modal Header -->
<div class="modal-header" style="
border: none;">
<button type="button" class="close" data-dismiss="modal" style="
font-size: 38px;
color: #383838;" >&times;</button>
<?php



if($ch->count() > 0){
if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2)){
    ?>
    <h3 style="width:100%;text-align:center"> Document Upload Again </h3>    
<?php
}
}

elseif($check_document_status->count() > 0){
?>
<h3 style="width:100%;text-align:center"> Documents Uploaded </h3>
<?php
} else{
?>
<h3 style="width:100%;text-align:center"> Upload Documents  </h3>
<?php }  ?>
</div>
<hr style="margin: 0; padding:0">
<!-- Modal body -->

@if(Auth::user()->usertype_status == "1")


@if($ch->count() > 0)
    @if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2))
        {{Form::open(array('url' => 'documents-upload-again', 'files' =>'true' ))}}
        {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
        {{-- @dd('sfsf'); --}}
@endif
@elseif($check_document_status->count() > 0)
{{Form::open(array('url' => 'enrol-documents-verify', 'files' =>'true' ) )}}
    {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
@else
{{Form::open(array('url' => 'enrol-documents', 'files' =>'true' ) )}}
@endif
@endif
<div class="modal-body" style=";width: 80%;margin: auto;">
<table class="table" id="join">
<tbody >


        @if($ch->count() > 0)
        @if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2))

        <?php $ab = 20; ?>
          @foreach($check_document_status as $tm)
        <tr style="background: #fff;">
            <td><p> {{$tm->qualification}}  </p></td>   
            <td> <img src="{{url('public\uploads\enrolment_documents/'.$tm->document_name)}}" alt="{{$tm->document_name}}" style="width:20px;"> </td> 


            <td> 
            @if($tm->approve_or_not == 2)


            <label class="switch toggle-button " >
                            <input type="checkbox" disabled>
                            <span class="slider round "
                            data-id="{{$tm->document_name}}" ></span>
                            </label>     
                            @elseif($tm->approve_or_not == 1)
                            
                            <label class="switch toggle-button " >
                                    <input type="checkbox" checked disabled>
                                    <span class="slider round "
                                    data-id="{{$tm->document_name}}" ></span>
                                    </label>  
                                    @endif   

            </td>
            <td style="border-top:none !important">
 @if($tm->approve_or_not == 2)

            <label id="lab1" for="{{'files'.$ab}}" class="add-document-button"
                >Add Document</label>
                <input class="tes" id="{{'files'.$ab}}" name="document_name[]" type="file"
                style="display:none"  />
                {{Form::hidden('u_id[]', $tm->unique_id)}}
          
                @elseif($tm->approve_or_not == 1)
                <label style="color:seagreen" class="add-document-butto"
                >Approved</label>
                
           @endif
                </td>
                
                <?php $ab++;          ?>
                <td style="background: white;
                border: none;">
                
              
                </td>
                </tr>
@endforeach

    @endif




@elseif($check_document_status->count() > 0)
@foreach($check_document_status as $a)
<tr style="background: #fff;">
<td style="border-top:none !important">
<p> {{$a->qualification}} </p>
</td>
<td>
<div id="{{'a'.$a->id.'modal'}}" class="{{'a'.$a->id.'modal'}}">
<span class="{{'a'.$a->id.'close'}}">&times;</span>

<img class="{{'a'.$a->id}}" id="{{'a'.$a->id}}">
<div id="{{'a'.$a->id."cap"}}"></div>
</div>
<?php
$hol = $a->document_name;
$m= strstr($hol, '.pdf') ?>
{{-- @dd($hol); --}}
@if($m == ".pdf")
<a href="{{url('public\uploads\enrolment_documents/'.$hol)}}"
target="_blank" id="{{'a'.$a->id.'0oo'}}">
PDF </a>
@else
<img src="{{url('public\uploads\enrolment_documents/'.$hol)}}"
id="{{'a'.$a->id.'oo'}}" alt="" style="width:80px;">
@endif
</td>
{{-- <img id="myImg" src="img_snow.jpg" alt="Snow"
style="width:100%;max-width:300px"> --}}

<td class="" >
@if($a->approve_or_not == 1)
<label class="switch toggle-button " >
<input type="checkbox" checked >
<span class="slider round approve-documents"
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"
style="color:#47a14f">Approved </p> </td>
@elseif($a->approve_or_not == 2)
<label class="switch toggle-button " >
<input type="checkbox" >
<span class="slider round approve-documents"
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"
style="color:#d65f5f">Disapproved </p> </td>
@else
<label class="switch toggle-button " >
<input type="checkbox" >
<span class="slider round approve-documents "
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"> </p> </td>
@endif

</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"> </p> </td>
</tr>
<style>

#{{'a'.$a->id.'oo'}} {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}
#{{'a'.$a->id.'oo'}}:hover {opacity: 0.7;}
/* The Modal (background) */
.{{'a'.$a->id.'modal'}} {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
.{{'a'.$a->id}} {
margin: auto;
display: block;
width: 100%;
max-width: 700px;
}
/* Caption of Modal Image */
#{{'a'.$a->id."cap"}} {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}
/* Add Animation */
.{{'a'.$a->id}}, #{{'a'.$a->id."cap"}} {
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)}
to {-webkit-transform:scale(1)}
}
@keyframes zoom {
from {transform:scale(0)}
to {transform:scale(1)}
}
/* The Close Button */
.{{'a'.$a->id.'close'}} {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}
.{{'a'.$a->id.'close'}}:hover,
.{{'a'.$a->id.'close'}}:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}</style>
<script>
// Get the modal
var modal = document.getElementById("{{'a'.$a->id.'modal'}}");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("{{'a'.$a->id.'oo'}}");
var modalImg = document.getElementById("{{'a'.$a->id}}");
var captionText = document.getElementById("{{'a'.$a->id.'cap'}}");
img.onclick = function(){
modal.style.display = "block";
modalImg.src = this.src;
captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("{{'a'.$a->id.'close'}}")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
</script>
@endforeach
@else
<tr style="background: #fff;">
<td style="border-top:none !important">


<select name="qualification_name[]" id="qualification1"
class="choose-qualification"
onchange="hide_selected_value(this.value,$(this).attr('id'));" >
<option selected disabled> selected </option>
<option value="Certificate I"> Certificate I </option>
<option value="Certificate II"> Certificate II </option>
<option value="Certificate III"> Certificate III </option>
<option value="Certificate IV"> Certificate IV </option>
<option value="Diploma"> Diploma </option>
<option value="Advance Diploma"> Advance Diploma </option>
<option value="10"> 10 </option>
<option value="12"> 12 </option>
<option value="Graduate"> Graduate </option>
<option value="post Graduate"> Post Graduate </option>
</select>
<label id="lab1" for="files1" class="add-document-button"
onclick="get_select_length();" onchange="handleFileSelect();">Add Document</label>
<input class="tes" id="files1" name="document_name[]" type="file"
style="display:none"   disabled />
</td>


<td style="background: white;
border: none;">

<div class=" add-more-document" > <i class="fa fa-plus
add-more-document-plus" ></i> <i class="fa fa-minus
add-more-document-minus " style="display:none"></i> </div>
</td>
</tr>
@endif

</tbody>
</table>


<output id="result" style="display: flex;
overflow: auto; border: 1px solid #efefef;
border-radius: 7px;"></output>
{{-- <output id="result2" style="display: flex;
overflow: auto; border: 1px solid #efefef;
border-radius: 7px;"> --}}


{{-- <img id="myImg" src="img_snow.jpg" alt="Snow"
style="width:100%;max-width:300px"> --}}
{{-- <div id="myModal" class="modal">
<span class="close">&times;</span>
<img class="modal-content" id="img01">
<div id="caption"></div>
</div> --}}


</div>
<div style="text-align: center">

    <?php
    $disabled = DB::table('enrolment_documents')
  ->where('client_unique_id',session()->get('unique_id_sess'))
  ->where('approve_or_not', 0)
  ->get();
if($disabled->count()  >0 ){
  ?>

{{Form::submit('Save', array('class' => "btn btn-danger", 'style' =>
"background: #616e62 !important; margin-bottom:20px", 'id' => 'approve_button_disabled'))}}
<?php }
else{
    ?>
{{Form::submit('Save', array('class' => "btn btn-danger", 'style' =>
"background: #616e62 !important; margin-bottom:20px", 'id' => 'approve_button_disabled'))}}
<?php
}
?>

</div>
{{Form::close()}}
</div>
</div>
</div>
{{-- end modal --}}


<script>
var add = (function () {
var counter = 1;
return function () {return counter += 1;}
})();
$(document).ready(function(){
$('.add-more-document-plus').click(function(){
var num = add();
$('#join').append(' <tr> <td> <select name="qualification_name[]"id="qualification'+num+'" class="choose-qualification"onchange="hide_selected_value'+num+'(this.value)"> <option selecteddisabled> selected </option> <option value="Certificate I">Certificate I </option> <option value="Certificate II"> Certificate II</option> <option value="Certificate III"> Certificate III </option><option value="Certificate IV"> Certificate IV </option> <optionvalue="Diploma"> Diploma </option> <option value="Advance Diploma">Advance Diploma </option> <option value="10"> 10 </option> <optionvalue="12"> 12 </option> <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option> </select><label onclick="get_select_length();" for="files'+num+'"class="add-document-button">Add Document</label> <input onchange="handleFileSelect'+num+'();" class="tes" id="files'+num+'"name="document_name[]" type="file" style="display:none"/></td></tr>');
document.getElementById('files'+num).setAttribute("disabled", "");

$('#join select').change(function(){
   var arr_push = $(this).val();
   var a = 0;
    ($('#join select').each(function() {
    
if((arr_push  == $(this).val()) ){
var hol = a++;
if(hol > 0){
    alert('You have already Selected this class !!! ')
    $(this).val('--Select--');
}
}

    }));
// }
    var add_val = [$('#join select:first').val()];
    
    
    var arr_push = $(this).val();
    
add_val.push(arr_push);
// alert(add_val);
console.log(arr,arr.indexOf(arr_push));

    // alert($(this).val());
    
})


});


$('.add-more-document-minus').click(function(){
    var a = $('#join tr').length;
    if(a <= 2){
        $('.add-more-document-minus').hide();
    }
$('#join tr').last().remove();
$('#result div').last().remove();
});
});

</script>

<script>
function hide_selected_valu(){
// var select1val = document.getElementById('qualification1').value;
// $("#qualification2").children("[value ='"+select1val+"']").remove();


// var join_id = document.getElementById('join').getElementsByTagName('select');
arr = [];
for(var i=1; i<=counter; i++){
arr.push($('#qualification'+i).val());
}
console.log(arr);
for(let i=1; i<=counter; i++){
let add = parseInt(i)+parseInt(1);
// console.log(arr);
$("#qualification"+add+1).children("[value ='"+arr[i]+"']").remove();
}
}



</script>




<script>
// function hide_selected_vale(val){
// var join_id = document.getElementById('join').getElementsByTagName('select');
// console.log(join_id);
// for(var i in join_id)
// var selectedCountry = $(this).children("option:selected").val();
// $("#join select").children("[value ='"+val+"']").remove();
// var select1 = document.getElementById('qualification1').value;
// $("#qualification11").children("[value ='"+val+"']").remove();
// }
</script>

<script>
// $(document).ready(function(){
// $('.thumbnail').on('click',function(){
// $('#result').addClass("zoom-image");
// });
// });

</script>



<script>




</script>


{{-- 
<select id="select1" onchange="removeEl(this.value)">
<option selected >Select</option>
</select>

<button id="appendbtn">+</button>

<div id="selectappend"></div> --}}
<script>
// option = ["Select","A","B","C","D","E"];
// for(let i in option){
// document.getElementById("select1").innerHTML+= '<option
// value="'+option[i]+'">'+option[i]+'</option>';
// }
// function removeEl(val){
// var index = option.indexOf(val);
// if (index > -1) {
// option.splice(index, 1);
// }
// }
// var a = 1;
// document.getElementById("appendbtn").addEventListener('click',function(){
// a++;
// document.getElementById("selectappend").innerHTML+='<select
// id="select'+a+'" onchange="removeEl(this.value)"></select>';
// for(let j in option){
// $("#select"+a).append('<option value="'+option[j]+'">'+option[j]+'</option>');
// }
// });

</script>





<script>

// var add = (function () {
// counter = 20;
// return function () {return counter += 1;}
// })();

// var n = add();




function updatedocuments21() {
        if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
        var picFile = event.target;
        var div = document.createElement("div");
        // div.innerHTML = "";
                        if(file.type.match('image')){
        div.innerHTML += "<img class='thumbnail' src='" + picFile.result +"'/>";
                        output.insertBefore(div, null);
                        }
                        else if(file.type.match('pdf')){
                            div.innerHTML += "<iframe class='thumbnail' src='"+ picFile.result+"'/>";
                        output.insertBefore(div, null);
                        }
                        else{
                            alert('Only Image Or PDF Accepted');             }
        });
        picReader.readAsDataURL(file);
        }
        } else {
        console.log("Your browser does not support File API");
        }
        }
        document.getElementById('files21').addEventListener('change',updatedocuments21, false);



        
function updatedocuments22() {
        if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
        var picFile = event.target;
        var div = document.createElement("div");
        
                        if(file.type.match('image')){
        div.innerHTML += "<img class='thumbnail' src='" + picFile.result +"'/>";
                        output.insertBefore(div, null);
                        }
                        else if(file.type.match('pdf')){
                            div.innerHTML += "<iframe class='thumbnail' src='"+ picFile.result+"'/>";
                        output.insertBefore(div, null);
                        }
                        else{
                            alert('Only Image Or PDF Accepted');             }
        });
        picReader.readAsDataURL(file);
        }
        } else {
        console.log("Your browser does not support File API");
        }
        }
        document.getElementById('files22').addEventListener('change',updatedocuments22, false);


             
function updatedocuments23() {
        if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
        var picFile = event.target;
        var div = document.createElement("div");
        
                        if(file.type.match('image')){
        div.innerHTML += "<img class='thumbnail' src='" + picFile.result +"'/>";
                        output.insertBefore(div, null);
                        }
                        else if(file.type.match('pdf')){
                            div.innerHTML += "<iframe class='thumbnail' src='"+ picFile.result+"'/>";
                        output.insertBefore(div, null);
                        }
                        else{
                            alert('Only Image Or PDF Accepted');             }
        });
        picReader.readAsDataURL(file);
        }
        } else {
        console.log("Your browser does not support File API");
        }
        }
        document.getElementById('files23').addEventListener('change',updatedocuments23, false);

             
function updatedocuments24() {
        if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
        var picFile = event.target;
        var div = document.createElement("div");
        
                        if(file.type.match('image')){
        div.innerHTML += "<img class='thumbnail' src='" + picFile.result +"'/>";
                        output.insertBefore(div, null);
                        }
                        else if(file.type.match('pdf')){
                            div.innerHTML += "<iframe class='thumbnail' src='"+ picFile.result+"'/>";
                        output.insertBefore(div, null);
                        }
                        else{
                            alert('Only Image Or PDF Accepted');             }
        });
        picReader.readAsDataURL(file);
        }
        } else {
        console.log("Your browser does not support File API");
        }
        }
        document.getElementById('files24').addEventListener('change',updatedocuments24, false);
</script>



<script>
    // $(document).ready(function(){
    //     $('.open-documents').clcick(function(){

    //     });
    // });
</script>


<!-- The Modal -->
<div class="modal" id="open_documents">

        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style=" min-height:
        300px;max-width:1000px; ">
        <!-- Modal Header -->
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" style="
        font-size: 38px;
        color: #383838; padding:0px" >&times;</button>
        <h3 style="width:100%;text-align:center"> Case Started</h3>   

        </div>
        {{-- modal body --}}
        <div>
        <?php 
            $get_doc = DB::table('enrolment_documents')
            ->where('status',1)
            ->where('client_unique_id',session()->get('unique_id_sess'))
            ->get();
            
            ?>
            <div class="modal-body">
              @foreach($enquiries as $get)
            <p> 
                 
                <img src="" alt=""style="width: 33px;
                border-radius: 26px;">
                
                {{$get->name}} </p>
              @endforeach
                {{-- <p>Document Approved:- 2010</p> --}}
                <div class="uploaded-doc">  
                @foreach($get_doc as $g)
                <div class="uploaded-doc-content">
                    
                <img src="{{url('public\uploads\enrolment_documents/'.$g->document_name)}}" alt="" style="width:100%">
                <p style="margin: auto;"> {{$g->qualification}}  </p>
                </div>
                @endforeach
                </div>
                <div>
                    {{-- {{Form::open(array('url' => 'add-comment'))}}
                    <input name="comment" id="" type="text">
                    {{Form::submit('Save')}}
                    {{Form::close()}} --}}
                </div>
            </div>
        </div>
        </div>
        </div>
</div>
    {{-- end modal     --}}

    {{-- modal --}}
    <!-- The Modal -->
<div class="modal" id="add_enrolment_status_documents">

        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        font-size: 38px;
        color: #383838; padding:0px" >&times;</button>
        <h3 style="width:100%;text-align:center"> Upload Documents  </h3>   
        </div>
        <div> 
            <style>
                #form label, #form input[type="submit"] {
                    padding: 4px;
    background: #949a95;
    border-radius: 5px;
    text-align: right;
    color: #fff;
                }
                #form .button{
                    text-align: center;
                    margin-top: 30px;
                }
#form .button div label, #form .button div input[type="submit"] {
    width: 150px;
    text-align: center;
}

#form .button div {
    /* margin-top: 16px; */
}
#result2 .thumbnail{
    height: 115px;
    width: 135px;
}

#form #comment{
    WIDTH: 60%;
    margin: auto;
    height: 100px;
}









                </style>
            {{Form::open(array('files' => true, 'id'=>"form"))}}
            <textarea name="comment" id="comment" cols="3" rows="1" class="form-control"></textarea>
            <output id="result2" style="display: flex;overflow: auto;border-radius: 7px;margin-top:20px;">
            </output>
            <div class="button">
                <div>
                    <label for="file"> Upload Documents </label>
            {{Form::file('document_name[]', array('class' => 'form-control', 'multiple' =>true, 'id'=>"file",'style'=>"display:none;"))}} </div>
            <div style="margin-bottom: 20px;">{{Form::submit('Save')}} </div>
            {{Form::close()}}
        </div>

<script>
 $(document).ready(function(){
     $('.add-status').click(function(){
         var status = $(this).attr('data-id');
             $("#form").submit(function (e) {
                            var comment = $('#comment').val();
                            var file = $('#file').val();
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url('application-sent')}}?a="+status;
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
    $.ajax({
      type: "POST",
        url: url,
        dataType: "JSON",
        data: new FormData( this ),
        processData: false, 
        contentType: false, 
        success: function (data) {
            document.getElementById('add_enrolment_status_documents').style.display="none";
            location.reload();
                }
    });

    }
    );
  });
});

</script>
            
        </div>
        </div>
        </div>
</div>


<!-- The Modal -->
<div class="modal" id="application_sent_vie">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:800px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        font-size: 38px;
        color: #383838; padding:0px" >&times;</button>
        <h3 style="width:100%;text-align:center"> Application Sent  </h3>   
        </div>
        <div id="old_coment"> 
              <?php  
            $get_data = DB::table('enrolment_status_documents')
            ->where('status',1)
            ->where('client_unique_id', session()->get('unique_id_sess'))
            ->where('application_sent', 'application_sent')
            ->get();   
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
            @foreach($get_data as $app)
              
              <div class="col-sm-3">
                 <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" style="width:100%"> 
              </div>
              
              @endforeach
            </div>
        </div>
              <p> {{$app->comment}} </p>
              <p>{{$app->date}}</p>
              @endif
              @endif
        </div>
        </div>
        </div>
</div>
@if($con1 > 0)
@if($con1 == $con2)
@include('enquiry.modal');
@endif
@endif
<script>
//     $(document).ready(function(){
//     $(".view-status").on("click", function(){
//         var a = $(this).attr("data-id");
//   $.ajaxSetup({
//                                 headers: {
//                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                             }
//                              });
//     $.ajax({
//     type: "get",
//     url: "{{url('get-status')}}?a="+a,
    
//     success: function(data){
//         // alert(JSON.stringify(data));
//         document.getElementById('enrolment_status_document_view').style.display="block";
// document.getElementById('enrolment_status_document_view').innerHTML ="ohhh";
//           var json_response = JSON.parse(data);
//           var len = json_response.length;
//           for(var i=0; i<len; i++){
//             document.getElementById('enrolment_status_document_view').innerHTML+='<p class="old-cmment-clas">'+json_response[i].comment+'<span class="old-cmment-date-clas"> '+json_response[i].date +'</span> </p>';
//             }
//         $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
// $('#enrolment_status_document_view').show();
//                 }
//                 });
//     }
//     );
//   });

</script>

<script>
       
       function upload_starus_documents() {
        if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("result2");
        output.innerHTML = "";
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
        var picFile = event.target;
        var div = document.createElement("div");
        
                        if(file.type.match('image')){
        div.innerHTML += "<img class='thumbnail' src='" + picFile.result +"'/>";
                        output.insertBefore(div, null);
                        }
                        else if(file.type.match('pdf')){
                            div.innerHTML += "<iframe class='thumbnail' src='"+ picFile.result+"'/>";
                        output.insertBefore(div, null);
                        }
                        else{
                            alert('Only Image Or PDF Accepted');             }
        });
        picReader.readAsDataURL(file);
        }
        } else {
        console.log("Your browser does not support File API");
        }
        }
        document.getElementById('file').addEventListener('change',upload_starus_documents, false);

</script>

<script>
    var len = document.getElementsByClassName('add-status').length;
            
            var cl = document.getElementsByClassName('add-status');
            for(var i=0; i<len; i++){
            cl[i+1].style.pointerEvents ="none";
            }
    </script>
    
<style>



.edit-clint p{
    cursor:pointer;
}

#education table tr td:nth-child(even){
    /* display:none; */
    width: 50%
}
#education table tr input[type="submit"]{
    /* display:none; */
}

.center td{
    text-align: center;
    width:100px;
}
</style>

<script>
  

</script>


 

<!-- The Modal -->
<div class="modal" id="add_doc_again">

    <div class="modal-dialog" style="width:1000px;max-width:1000px;">
    <div class="modal-content" style="width:1000px !important; min-height:
    300px;max-width:1000px; ">
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 style="width: 100%;
        text-align: center;"> Document Uploaded </h4>
    <button type="button" class="close" data-dismiss="modal" style="
    color: #383838;" >&times;</button>
    </div>
    <div>
        <form action="">
            <table class="table" id="join">
                <tbody>
@if($upload_documents_again->count() > 0)
{{-- @dd($upload_documents_again); --}}
@foreach($ch as $c)
@if(($upload_documents_again[0]->upload_documents_again == 1) &&($c->approve_or_not == 2))
@foreach($check_document_status as $tm)

    
<tr style="background: #fff;" class="center">
    <td><p> {{$tm->qualification}}  </p></td>   
    <td> <a href = "{{url('public/uploads/enrolment_documents/'.$tm->document_name)}}" target=_blank> <img src="{{url('public/uploads/enrolment_documents/'.$tm->document_name)}}" alt="{{$tm->document_name}}" style="width:50px;" >
    </a> </td> 
    <td> 
    @if($tm->approve_or_not == 2)
    <label class="switch toggle-button " >
                    <input type="checkbox" >
                    <span class="slider round  approve-documents"
                    data-id="{{$tm->unique_id}}" ></span>
                    </label>     
                    @elseif($tm->approve_or_not == 1)
                    <label class="switch toggle-button " style="pointer-events: none" >
                            <input type="checkbox" checked   disabled >
                            <span class="slider round "
                            data-id="{{$tm->document_name}}"  style="background:#b2bdb3" ></span>
                            </label>  
                            @endif   
    </td>
    @if($tm->approve_or_not == 2)
    <td> <p class="approve_or_not" id="{{'aa'.$tm->unique_id}}"> Disapproved</p> </td>
    @else <td><p class="approve_or_not" id="{{'aa'.$tm->unique_id}}"> Approved</p> </td>
    @endif
        </tr>

        

@endforeach
@endif

@endforeach
@endif
    </tbody>
</table>
<hr style="background: #fff;">

<div style="text-align: center">

    
        <input class="btn btn-danger" style="background: #616e62 !important; margin-bottom:20px" id="approve_button_disabled"  type="submit" value="Save">
        
        </div>
    </form>
    </div>
    </div>
    </div>
</div>




    <script>

        $('.approve-documents').on('click',function(){
        var unique_id = $(this).attr("data-id");
        // alert('sd');     
        $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
        type:"get",
        url:"{{url('client-document-approved')}}?a="+unique_id,
        success:function(data){
        // alert(data);
        var uid = data.substring(0, 10);
        var num = data.substring(10, 14);
        if(num == "num1"){
        document.getElementById(uid).style.color="#47a14f";
        document.getElementById(uid).innerHTML = " Approved";
        }
        else{
        document.getElementById(uid).style.color="#d65f5f";
        document.getElementById(uid).innerHTML = "Disapproved";
        }
        // $(this).html("Approved");
        // var parent_div = document.getElementById('join');
        // var p = document.createElement('p');
        // parent_div.getElementsByTagName('tr')[0].appendChild(p);
        // p.innerHTML = "Approved";
        }
        });
        });
        
        </script>

<script>
    $(document).ready(function(){
        $('.approve-documents').click(function(){  
            var unique_id  = "{{session()->get('unique_id_sess')}}";
            $.ajaxSetup({
headers:{
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:"get",
url:"{{url('disabled_button')}}?a="+unique_id,
success:function(data){
    if(data == 1){
    document.getElementById('approve_button_disabled').removeAttribute("disabled","");
    }
    // else{
    //     document.getElementById('approve_button_disabled').setAttribute("disabled","");
    // }
}
        });
    });
});

</script>




<script>  
$(document).ready(function(){
    // $('.update-button-client td').style.display= "table-cell ";

        $('#emp_detail_overview_edit').click(function(){
            var a  = $('#emp_detail_overview_edit').text();
            if(a == "Back"){
                $('#emp_detail_overview').find('table').find('tr').find('td:first').show();
            $('#emp_detail_overview').find('table').find('tr').find('td:last').hide();
            $('#emp_detail_overview').find('input[type="submit"]').hide();        
            $('#emp_detail_overview_edit').text('Edit');
            }
            else{

            $('#emp_detail_overview_edit').text('Back');
            $('#emp_detail_overview').find('table').find('tr').find('td:first').hide();
            $('#emp_detail_overview').find('table').find('tr').find('td:last').show();
            $('#emp_detail_overview').find('input[type="submit"]').show();
            }
        });
    });
        




  
    $(document).ready(function(){
    // $('.update-button-client td').style.display= "table-cell ";
    $('#education').find('table').find('tr').find('td:last').hide();
        $('#education_edit').click(function(){
            var a  = $('#education_edit').text();
            if(a == "Back"){
                $('#education').find('table').find('tr').find('td:first').show();
            $('#education').find('table').find('tr').find('td:last').hide();
            $('#education').find('table').find('tr').find('input[type="submit"]').hide();        
            $('#education_edit').text('Edit');
            }
            else{
            $('#education_edit').text('Back');
            $('#education').find('table').find('tr').find('td:first').hide();
            $('#education').find('table').find('tr').find('td:last').show();
            $('#education').find('table').find('tr').find('input[type="submit"]').show();
            // $('#education_edit').text('Back');
            }
        });
    });
        
// $(document).ready(function(){
//     // $('#education table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#education_edit').click(function(){
//             var a  = $('#education_edit').text();
//             $('#plus-button-toggle').show();
// if(a == "Back"){
//     // $('#education_edit').text("Edit");
//     $('#education table').find('tr').find('td').find('p:first').show();
//             $('#education table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
//             $('#plus-button-toggle').hide();
//             $('.appended-class').hide();
// }
// else{
//     $('.update-button-client').show(); 
//             $('#education table').find('tr').find('td').find('p:first').hide();
//             $('#education table').find('tr').find('td').find('p:last').show();
//             // $('#education_edit').text("Back");
//             $('#plus-button-toggle').show();
// }   
//     });
// });






$(document).ready(function(){
    $('#work_experience table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#work_experience_edit').click(function(){
            var a  = $('#work_experience_edit').text();
            $('#add_clas').show();
if(a == "Back"){
    $('#work_experience_edit').text("Edit");
    $('#work_experience table').find('tr').find('td').find('p:first').show();
            $('#work_experience table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
            $('#add_clas').hide();
}
else{
    $('.update-button-client').show(); 
            $('#work_experience table').find('tr').find('td').find('p:first').hide();
            $('#work_experience table').find('tr').find('td').find('p:last').show();
            $('#work_experience_edit').text("Back");
}   
    });
});


$(document).ready(function(){
    $('#english_language_test table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#english_language_test_edit').click(function(){
            var a  = $('#english_language_test_edit').text();
if(a == "Back"){
    $('#english_language_test_edit').text("Edit");
    $('#english_language_test table').find('tr').find('td').find('p:first').show();
            $('#english_language_test table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
}
else{
    $('.update-button-client').show(); 
            $('#english_language_test table').find('tr').find('td').find('p:first').hide();
            $('#english_language_test table').find('tr').find('td').find('p:last').show();
            $('#english_language_test_edit').text("Back");
}   
    });
});


$(document).ready(function(){
    $('#course_enrolment_detail table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#course_enrolment_detail_edit').click(function(){
            var a  = $('#course_enrolment_detail_edit').text();
if(a == "Back"){
    $('#course_enrolment_detail_edit').text("Edit");
    $('#course_enrolment_detail table').find('tr').find('td').find('p:first').show();
            $('#course_enrolment_detail table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
}
else{
    $('.update-button-client').show(); 
            $('#course_enrolment_detail table').find('tr').find('td').find('p:first').hide();
            $('#course_enrolment_detail table').find('tr').find('td').find('p:last').show();
            $('#course_enrolment_detail_edit').text("Back");
}   
    });
});



$(document).ready(function(){
    $('#how_financial table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#how_financial_edit').click(function(){
            var a  = $('#how_financial_edit').text();
            $('#add_finance_button').show(); 

if(a == "Back"){
    $('#how_financial_edit').text("Edit");
    $('#how_financial table').find('tr').find('td').find('p:first').show();
            $('#how_financial table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
            $('#add_finance_button').show();
}
else{
    $('.update-button-client').show();  
            $('#how_financial table').find('tr').find('td').find('p:first').hide();
            $('#how_financial table').find('tr').find('td').find('p:last').show();
            $('#how_financial_edit').text("Back");
            $('#add_finance_button').show();
}   
    });
});





$(document).ready(function(){
    $('#country_before_travell table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#country_before_travell_edit').click(function(){
            
            var a  = $('#country_before_travell_edit').text();
$('#plus-button-history').show();


if(a == "Back"){
    $('#country_before_travell_edit').text("Edit");
    $('#country_before_travell table').find('tr').find('td').find('p:first').show();
            $('#country_before_travell table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
            $('#plus-button-history').hide();
}
else{
    $('.update-button-client').show();
            $('#country_before_travell table').find('tr').find('td').find('p:first').hide();
            $('#country_before_travell table').find('tr').find('td').find('p:last').show();
            $('#country_before_travell_edit').text("Back");
            
}   
    });
});



$(document).ready(function(){
    $('#id_proof_detail table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#id_proof_detail_edit').click(function(){
            
            $('#plus-button-toggle-doc').show();
            var a  = $('#id_proof_detail_edit').text();

            
if(a == "Back"){
    $('#id_proof_detail_edit').text("Edit");
    $('#id_proof_detail table').find('tr').find('td').find('p:first').show();
            $('#id_proof_detail table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
            $('#plus-button-toggle-doc').hide();
}
else{
    $('.update-button-client').show();
            $('#id_proof_detail table').find('tr').find('td').find('p:first').hide();
            $('#id_proof_detail table').find('tr').find('td').find('p:last').show();
            $('#id_proof_detail_edit').text("Back");
            $('#plus-button-toggle-doc').show();
}   
    });
});




        // $(document).ready(function(){
            
        //     $('#emp_detail_overview_edit').click(function(){
                
        //     var back = $('#emp_detail_overview_edit').text();
        //         if(back == "Back"){
        //             $('#emp_detail_overview_edit').text('Edit');
        //             $('#emp_detail_overview').find('table').find('tr:nth-of-type(2)').show();     
        //             $('#emp_detail_overview').find('table').find('tr:nth-of-type(3)').remove();
        //      }
        //      else{
        //         $('#emp_detail_overview').find('table').find('tr td').hide();
        //      $('#emp_detail_overview table tr').append('<td> <input type="text"> </td> ')
        //      var a = $('#emp_detail_overview_edit').text('Back');
        //      }
        //     });
        // });
        
      
    //     $(document).ready(function(){
    //     $('.edit-education-button').click(function(){
    //     $('#education').find('table').find('tr').find('td:even').hide();
    //     $('#education').find('table').find('tr').find('td:odd').show();
    //     $('#education').find('table').find('tr').find('td:last').show();
    //     $('#education').find('table').find('tr').find('input[type="submit"]').show();  
    // });
    // });
        </script>
        


<script>
function add_education(){
    
      $('.add-class tbody').append('<tr appended-class><td><select name="qualification_name[]" id="" class="form-control">      <option selected > selected </option>   <option value="Certificate I"> Certificate I </option><option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option>       <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option><option value="Advance Diploma"> Advance Diploma </option>      <option value="10"> 10 </option><option value="12"> 12 </option>        <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option></select> </td> <td> {!! Form::text("edu_stream[]", null, array("class"=>"form-control")) !!} </td><td> {!! Form::text("institute_name[]", null, array("class"=>"form-control" )) !!}</td><td> <select name="passing_year[]" id="" class="form-control"> <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}}  </option>  @endfor </select> </td> <td> {!! Form::text("percentage[]", null, array("class"=>"form-control" )) !!} </td> </tr>');
      }   


      function add_company(){
        $('.add-company').append('<tr> <tr><td> {!! Form::text('company_name[]', null, array('class'=>'form-control' )) !!}</td> <td> {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}</td><td>  {!! Form::date('start_date[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> <td> {!! Form::date('end_date[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> </tr>')
      }

      function financial(){
        $('.add-financial').append('<tr><td>  <select class="form-control" name="financial_by[]"> <option disabled selected>--Select--</option>                                                                 <option VALUE="Bank loan">Bank loan</option>    <option VALUE="Personal Fund">Personal Fund</option>    <option VALUE="Family Sponsorship">Family Sponsorship</option>   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>   <option VALUE="Other">Other</option>  </select> </td>     <td> {!! Form::number('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}       </td></tr> ')
      }

      function add_imm_history(){
          $('.append-imm-history').append('<tr> <td> <select name="travelled_before_country[]" id="" > @foreach($country as $c) <option value="{{$c->country_name}}">{{$c->country_name}}</option>@endforeach </select> </td><td>  <input type="date" class="datepicker form-control"name="travelled_before_from[]"/>{{-- <input type="text" "> --}}</td><td> <input type="date" class=" datepicke form-control "name="travelled_before_to[]" > </td><td><input type="text" class="form-control"name="travelled_before_duration[]"></td><td id="plus-button-toggle" style="position:relative;width: 50px;display:non"><button type="button" onclick="add_country_before();" class="fa fa-plu plus-sign" > +</button></td></tr>')
      }

      function add_document(){
         
//           let enq_id_proof_type  = <?php echo $enq_id_proof_type ?>;
//           let get_id_proof_name_only  = <?php echo $get_id_proof_name_only ?>;

// for(var i = 0; i<enq_id_proof_type.length; i++){
// for(var j = 0; j<get_id_proof_name_only.length; j++){
//         if( (get_id_proof_name_only[j].id_proof) != (enq_id_proof_type[i].name) ){
//             var k = (get_id_proof_name_only[j].id_proof);
//             console.log(k);
//             continue;
//             }           }
// }


// for(var key in enq_id_proof_type){
//     var value = enq_id_proof_type[key]; 
//     console.log(value);
//     }
         
        //   enq_id_proof_type.name
        // var t = document.querySelectorAll('.add-more-document-parent select').value;
          
          $('.add-more-document-parent').append('<tr class="id-class-view"><td> <select class="form-control" name="id_proof[]" required ><option disabled selected> --Selected--</option><option value="AADHAAR CARD">AADHAAR CARD</option><option value="VOTER ID">VOTER ID</option><option value="PAN CARD">PAN CARD</option><option value="DRIVING LICENSE">DRIVING LICENSE</option><option value="PASSPORT">PASSPORT</option> </select></td><td> {!! Form::text('name_on_id_proof[]', null, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof','required'=>true)) !!}</td><td> {!! Form::text('id_proof_number[]', null, array('class'=>'form-control', 'placeholder'=>'ID Proof No','required'=>true)) !!}</td>     <td> <input type="file" name="id_image[]"  class="form-control" required>     </td>   </tr>');

         

      }

</script>



<script>


function handleFileSelect() {
    
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
    
    var files = event.target.files; //FileList object
    var output = document.getElementById("result");
    // output.innerHTML = "";
    for (var i = 0; i < files.length; i++) {
    var file = files[i];
    //Only pics
    // if (!file.type.match('image')) continue;
    var picReader = new FileReader();
    picReader.addEventListener("load", function (event) {
    var picFile = event.target;
    var div = document.createElement("div");
                    // var hol = document.createElement("div");
                    div.setAttribute("style","position:relative");
                    if(file.type.match('image')){
    div.innerHTML += " <span class='fa fa-close'></span>    <img class='thumbnail' src='" + picFile.result + "'"
    + "title'" + a + "'/> <p style='text-align:center;'>"+a+"</p>";
                    output.insertBefore(div, null);
                    }
                    else if(file.type.match('pdf')){
                        div.innerHTML += "  <span class='fa fa-close'></span>  <iframe class='thumbnail' src='"
    + picFile.result +  "'/> </iframe> <p style='text-align:center;'>"+a+"</p>";
                    output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
    });
    //Read the image
    picReader.readAsDataURL(file);
    }
    } else {
    console.log("Your browser does not support File API");
    }
    remov();

   
    
}
    
    document.getElementById('files1').addEventListener('change',handleFileSelect, false);
    
    </script>


<script>
$(document).ready(function(){
    $('.add-more-document-plus').click(function(){
        $('.add-more-document-minus').show();
    })
})
</script>

<script>
$('.show-edit-client-name-form').click(function(){
    $(this).parent().find('.edit-client-name-form').show(100);
})
$('.close-edit-client-name-form').click(function(){
    
    $(this).parent().parent().find('.edit-client-name-form').hide(100);
})


$('#edit_client_image').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#edit_client_image')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>


<script>
// var toefl = $('#exam_score_edit td span').text();
// var  len = $('#exam_score_edit tr').length;
// if(toefl[0] == "T"){
//     $('#exam_score_edit tr td p').append(' <select name="ToeflListning" id="" class="form-control"> <option value="" selected>selected</option> @for($i=0; $i<=30; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select>');
// }

</script>


<script>
$(document).ready(function(){
    $('.checked-activity').click(function(){
    var unique_id = $(this).attr("data-id");
    var id = $(this).attr("id");
  var url = "{{url('update_activity')}}?a="+unique_id+"&b="+id;
  
$.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
               });
               if (confirm('Are you sure you want to update this?')) {
               $.ajax({
      type: "POST",
        url: url,
        success: function(data) {
  
        }
    });

               }                 
                  });
    });
 






</script>




<script>

    function getState(val) {
        $.ajax({
        type: "get",
        url: "{{url('tabletstate')}}?id="+val,
        success: function(data){
        // console.log(data);
            $('.state-list').empty();
                            $.each(data, function(key, value) {
                                console.log(this.state_name);
                                $('.state-list').append('<option value="'+ this.state_id +'">'+ this.state_name +'</option>');
                            });
            }
        });
    }
    function getCity(val) {
    $.ajax({
    type: "get",
    url: "{{url('tabletcity')}}?id="+val,
    success: function(data){
            $('.city-list').empty();
            $.each(data, function(key, value) {
                                $('.city-list').append('<option value="'+ this.city_name +'">'+ this.city_name +'</option>');
                            });
    }
    });
    }



    function set_hidden_image_data(el){
        let filename = el.files[0].name;
        let hiddentype = el.parentElement.parentElement.querySelector('[name="id_image_hidden[]"]');
        hiddentype.value = filename;
        console.log(hiddentype.value);
    }
    </script>   







@include('enquiry.script_education');


<script>
    // document.querySelector('#student_education_nav').children[].style="background:#2b6699; color:#fff";

    document.querySelector('#student_education_nav').children[{{$enq_educations->count()-1}}].firstElementChild.classList.add('active');
</script>

@endsection



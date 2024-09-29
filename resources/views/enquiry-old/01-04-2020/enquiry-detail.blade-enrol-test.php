@extends('header')
@section('tabletform')


</div>
</div>




<?php 
// print_r(['a'=>1,'b'=>2]);
//     print_r(array('fdg','fdg'));

?>



<div class="container-fluid detail-page " style="background: #fbfbfb;">


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
<a href="{{url('enquiry/'.$get->unique_id)}}" class="fa fa-edit" >
Edit</a> &nbsp;
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
<p>{{Session::get('message')}}</p>
@endif

<br>

<div class="container-fluid">
<div class="row detail-page-tab-view">
<div class="col-md-3 client-detail-left-side-tab">
<div style="
border: 1px solid #d5e1d6;
/* border-radius: 3px; */
padding: 15px;
background: radial-gradient(#aabcac, transparent);
text-align:center;border-bottom: none;
">
<?php if($get->image != ''){
?>
<img src="{!!url('public/uploads/image/'.$get->image) !!}" alt=""
style="width: 125px;
border-radius: 97px;
height: 118px;">
<?php
}
else { ?>
<img src="{!!url('public/uploads/image/') !!}" alt="" style="width: 125px;
border-radius: 97px;
height: 118px;">
<?php
}
?>
</div>
<ul class="nav nav-tabs" role="tablist" id="emp_detail_tab">
<li class="nav-item">
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
<a class="nav-link " href="#id_proof_detail" role="tab"
data-toggle="tab">Id Proof Details </a>
</li>
</ul>
</div>
<div class="col-md-9">
<div class="tab-content content-style active my-4" id="">
<div role="tabpane" class="tab-pane active" id="emp_detail_overview">
<h4>Overview</h4>
<hr>
<table class="table my-table">
@foreach($enquiries as $get)
<tr >
<th>Gender </th>
<td> {{$get->gender}} </td>
</tr>
<tr>
<th>DOB </th>
<td> {{$get->dob}} </td>
</tr>
<tr>
<th>Contact No </th>
<td> {{$get->contact}} </td>
</tr>
<tr>
<th>Email </th>
<td> {{$get->email}} </td>
</tr>
<tr>
<th>Address </th>
<td> <?php echo $get->address_line1, $get->address_line2, $get->city,
$get->state, $get->country ?> </td>
</tr>
@endforeach
</table>
</div>

{{-- second tab --}}
<div role="tabpane" class="tab-pane " id="education">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>Education</h4>
<hr>
<table class="table">
<tr>
<th>
Qualification</th>
<th>
Year of Passing</th>
<th>  Percentage</th>
<th>    Name of Education</th>
</tr>
@if((!empty($enq_educations)))
@foreach($enq_educations as $e)
<tr>
<td>{{$e->class}}</td>
<td> {{$e->passing_year}}</td>
<td> {{$e->percentage}} </td>
<td> {{$e->education_name}} </td>
</tr>
@endforeach
@endif

</table>
</div>
</div>


{{-- thirg tab --}}
<div role="tabpane" class="tab-pane " id="work_experience">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>Work Experience</h4>
<hr>
<table class="table">
<tr>
<th>
Company Name</th>
<th>  Designation</th>
<th>
Start Date</th>
<th> End Date</th>
</tr>
@if(!empty($enq_experiences))
@foreach($enq_experiences as $exp)
<tr>
<td> {{$exp->company_name}} </td>
<td> {{$exp->designation}} </td>
<td> {{$exp->start_date}} </td>
<td> {{$exp->end_date}} </td>
</tr>
@endforeach
@endif
</table>
</div>
</div>

{{-- fourth tab --}}
<div role="tabpane" class="tab-pane " id="english_language_test">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
TOEFL / IELTS / PTE SCORE</h4>
<hr>
<table class="table">
<tr>
<th>
Language</th>
<th>
Writing</th>
<th>
Speaking</th>
<th> Listening</th>
<th>  Reading</th>
</tr>
@if(!empty($enq_exam_scores))
@foreach($enq_exam_scores as $scores)
<tr>
<td> {{ $scores->language }} </td>
<td> {{ $scores->writing }} </td>
<td> {{ $scores->speaking }} </td>
<td> {{ $scores->listening }} </td>
<td> {{ $scores->reading }} </td>
</tr>
@endforeach
@foreach($enq_oet_scores as $scores)
<tr>
<td> {{ $scores->language }} </td>
<td> {{ $scores->writing }} </td>
<td> {{ $scores->speaking }} </td>
<td> {{ $scores->listening }} </td>
<td> {{ $scores->reading }} </td>
</tr>
@endforeach
@endif
</table>
</div>
</div>
{{-- fifth tab --}}
<div role="tabpane" class="tab-pane " id="course_enrolment_detail">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
Course Enrollment Details</h4>
<hr>
<table class="table">
<tr>
<th>

Start Session </th>
<th>
  Country</th>
<th>
Course</th>
<th>
Interested for Intake</th>
</tr>
@foreach($enquiries as $e)
<tr>
<td> {!! $e->course_session !!} </td>
<td> {!! $e->course_country !!} </td>
<td> {!! $e->course !!} </td>
<td> {!! $e->course !!} </td>
</tr>
@endforeach
</table>
</div>
</div>


{{-- six tab --}}
<div role="tabpane" class="tab-pane " id="how_financial">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
How student will show financials</h4>
<hr>
<table class="table">
@foreach($enq_financials as $f)
<tr > <th> {!! $f->financials_by !!} </th>
<td>{!! $f->amount !!} </td>
</tr>
@endforeach
</table>
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
<table class="table">
<tr>
<th>
Country</th>
<th>
From</th>
<th>
To</th>
<th>
Duration</th>
</tr>
@foreach($enq_travelled_historys as $history)
<tr>
<td> {!! $history->travelled_before_country !!} </td>
<td> {!! $history->travelled_before_from !!} </td>
<td> {!! $history->travelled_before_to !!} </td>
<td> {!! $history->travelled_before_duration !!} </td>
</tr>
@endforeach
</table>
<br><br>
<h4> Any Visa Rejected Before </h4>
<hr>
<ul>
@foreach($enq_visa_rejected_countrys as $visa)
<li>
{!! $visa->country !!}
</li>
@endforeach
</ul>
</div></div>




{{-- ten tab --}}
<div role="tabpane" class="tab-pane " id="id_proof_detail">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Id Proof Details</h4>
<hr>
<table class="table">
<tr>
<th>
Id Proof</th>
<th>
  Name (Name In ID Proof)</th>
<th>
ID Proof No</th>
</tr>
@foreach($enquiries as $e)
<tr>
<td> {!! $e->id_proof !!} </td>
<td> {!! $e->id_proof_name !!} </td>
<td> {!! $e->id_proof_no !!} </td>
</tr>
@endforeach
</table>
</div>
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

</div>
</div>
</div>

<div style="text-align: right;
margin-right: 44px;">
<?php
$check_document_status = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))->get();
// dd($check_document_status);
$ch = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('approve_or_not',2)
->get();

$upload_documents_again = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('upload_documents_again', 1)
->get();


$chech_status = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('check_status', 1)
->get();




if($upload_documents_again->count() > 0){
    if(($check_document_status->count() > 0) && ($upload_documents_again[0]->upload_documents_again == 1)){
        ?>
        <button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed" style=><i class="" aria-hidden="true"></i>
Documents Uploaded Again</button>
<?php
    }
}




elseif($check_document_status->count() > 0){
// $a = DB::table('enrolment_documents')
//     ->where('check_status',1)
//     ->where('client_unique_id',session()->get('unique_id_sess'))
//     ->get();
    // dd($a);
    if($check_document_status->count() !=  $chech_status->count()){
// echo"dfsdfsdfsfsfs";
?>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Uploaded</button>
@include('enquiry.document-modal');
<?php
}
else{
    ?>
    <button type="button" class="btn btn-danger" data-toggle="modal"
    data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
    Uploaded</button>
    <?php
}
}







elseif($ch->count() > 0){
    // $a = DB::table('enrolment_document')
    //         -> 
    // dd($ch->count());
    // dd($check_document_status->count(),   $ch[0]->approve_or_not);
if(($check_document_status->count() > 0) && ($ch->count() ==  $check_document_status->count())){
    ?>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#erolment_proceed"><i class="" aria-hidden="true"></i>
Upload Again</button>
<?php
} 
}



else{
?>

<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Proceed</button>
<?php }
?>

</div>
{{-- comment section --}}
<div style="padding: 15px;">
<br>
<br>
<h4>Comments</h4>
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
color: #383838; padding:0px" >&times;</button>
<?php



if($ch->count() > 0){
if(($check_document_status->count()  == $chech_status->count()) && ($ch[0]->approve_or_not == 2)){
    ?>
    <h3 style="width:100%;text-align:center"> Document Upload Again </h3>    
<?php
}
}

elseif($check_document_status->count() > 0){
?>
<h3 style="width:100%;text-align:center"> Documents Uploaded </h3>
<?php
}
 else{
?>
<h3 style="width:100%;text-align:center"> Upload Documents  </h3>
<?php }  ?>
</div>
<hr style="margin: 0; padding:0">
<!-- Modal body -->

@if(Auth::user()->usertype_status == "1")


@if($ch->count() > 0)

@if(($check_document_status->count() == $chech_status->count()) && ($ch[0]->approve_or_not == 2) )
        {{Form::open(array('url' => 'documents-upload-again', 'files' =>'true' ) )}}
        {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
@endif



@elseif($check_document_status->count() > 0)
{{-- @dd($check_document_status->count()); --}}
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
        @if(($check_document_status->count() == $chech_status->count()) && ($ch[0]->approve_or_not == 2))
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
                style="display:none" />
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
id="{{'a'.$a->id.'oo'}}" alt="" style="width:150px;">
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
onclick="get_select_length();">Add Document</label>
<input class="tes" id="files1" name="document_name[]" type="file"
style="display:none"   />
</td>


<td style="background: white;
border: none;">

<div class=" add-more-document" > <i class="fa fa-plus
add-more-document-plus" ></i> <i class="fa fa-minus
add-more-document-minus "></i> </div>
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
"background: #616e62 !important; margin-bottom:20px", 'id' => 'approve_button_disabled', 'disabled' => true))}}
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
    else{
        document.getElementById('approve_button_disabled').setAttribute("disabled","");
    }
}
        });
    });
});
</script>



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
});


$('.add-more-document-minus').click(function(){
$('#join tr').children().last().remove();
$('#result div').children().last().remove();
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
function hide_selected_vale(val){
var join_id = document.getElementById('join').getElementsByTagName('select');
console.log(join_id);
for(var i in join_id)
// var selectedCountry = $(this).children("option:selected").val();
// $("#join select").children("[value ='"+val+"']").remove();
// var select1 = document.getElementById('qualification1').value;
// $("#qualification11").children("[value ='"+val+"']").remove();
}
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
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:1000px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        font-size: 38px;
        color: #383838; padding:0px" >&times;</button>
        <h3 style="width:100%;text-align:center"> Case </h3>   

        </div>
        {{-- modal body --}}
        <div>
        <?php 
            $get_doc = DB::table('enrolment_documents')
            ->where('status',1)
            ->where('client_unique_id',session()->get('unique_id_sess'))
            ->get();
            ?>
            <div>
                <p>Start Case:- 2010</p>
                <p>Document Approved:- 2010</p>
                @foreach($get_doc as $g)
                <div style="width:150px">
                    <p> {{$g->qualification}}  </p>
                <img src="{{url('public\uploads\enrolment_documents/'.$g->document_name)}}" alt="" style="width:100%">
                </div>
                
                @endforeach
                <div>
                    {{Form::open(array('url' => 'add-comment'))}}
                    <textarea name="comment" id="" cols="30" rows="10"></textarea>
                    {{Form::submit('Save')}}
                    {{Form::close()}}
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
    


@endsection



<?php
use App\Helpers\Helper;
?>

@extends('header')
@section('tabletform')
<style>
#forex_reminder, #sim_allocation, #study_follow_up{
    display: none;
}
.add-status{   
    }
    .detail-page-tab-view .table td, .my-table th{
        /* background: #ededed; */
    }
.status-step .modal-dialog div{
background: #fff;
}

    table th{border: 1px solid #ecebeb;}
 .modal-content{
  width: 100% ;
}
.modal{
    padding-top: 59px;
}
.modal-content select{
 width:100%;
}
    .modal-dialog{max-width: 1000px;}
    
    .edit-text{text-align: right}
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
    border: 1px solid #d6d0d0;
    border-radius: 1px;
    padding: 4px;
    height: 32px;
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
.selected-disabled option:nth-child(1){
    background: #e7e7e7;
    cursor: none;
}

.my-table th{
    width:50%;
}
  #st_detail{
      font-size: 13px;
  }
</style>
<?php $country = DB::table('countries')->get();?>
<div class="container detail-page " >
@foreach($enquiries as $get)
<?php session()->put('unique_id_sess',$get->unique_id); ?>
{{-- {{session()->get('unique_id_sess')}} --}}
<div class="row content-color">


@endforeach

</div>

<?php 
$conditional_offer_letter_received  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','conditional_offer_letter_received')
->get(); 
$full_offer_received  = DB::table('enrolment_status_documents')
               ->where('status',1)
               ->where('client_unique_id',session()->get('unique_id_sess'))
               ->where('application_sent','full_offer_received')
               ->get(); 

               $tution_fees_paid  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','tution_fees_paid')
->get();


$coe_received  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','coe_received')
->get(); 

$forex_exchange  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','forex_exchange')
->get();


$sim_allocate  = DB::table('enrolment_status_documents')
->select('application_sent','date','documents','comment')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','sim_allocate')
->get();
$study_commenced  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_commenced')
->get(); 


$student_follow_up  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','student_follow_up')
->get();

$study_completed  = DB::table('enrolment_status_documents')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_completed')
->get();

?>   
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
      $all_doc_count = (count(DB::table('enq_educations')
         ->select('enquiry_id')
         ->where('enquiry_id',session()->get('unique_id_sess'))
         ->get()));
        //  dd(count($al),count($done));

         $con2 = $done->count();
         if($con1 > 0){
            // dd($all_doc_count,$con1, $con2 );
             
        if($con1 == $con2 && ($con1 == $all_doc_count)){
            
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
              
               
               
               ?>     
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
     $enrolment_bank_loans  = DB::table('enrolment_bank_loans')
     ->where('status',1)
     ->where('client_unique_id',session()->get('unique_id_sess'))
    //  ->where('application_sent','coe_received')
     ->get(); 
     

     $send_mail_to_bank  = DB::table('enrolment_status_documents')
     ->select('application_sent') 
               ->where('status',1)
               ->where('client_unique_id',session()->get('unique_id_sess'))
               ->where('application_sent','send_mail_to_bank')
               ->get(); 
               

     ?>     
     @if($send_mail_to_bank->count() > 0)     
     <li class="active"  data-toggle="modal" data-target="#send_mail_to_bank"> 
     <span class="fa fa-plane"></span> <a> Bank Loan</a>  </li>
@else
<li data-toggle="modal" data-target="#add_enrolment_bank_loans" class="add-status" data-id="send_mail_to_bank">
<span class="fa fa-plane"></span>
<a> Bank Loan</a> 
</li>
@endif




<?php 

?>     
@if($coe_received->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#coe_received"> 
<span class="fa fa-plane"></span> <a> COE Received </a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="coe_received">
<span class="fa fa-plane"></span>
<a> COE Received </a> 
</li>

@endif

 

 
         


     <?php 
 ?>     
@if($forex_exchange->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#forex_exchange"> 
<span class="fa fa-plane"></span> <a> Forex Exchange</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="forex_exchange">
<span class="fa fa-plane"></span>
<a>   Forex Exchange</a> 
</li>
@endif



<?php 

?>     
@if($tution_fees_paid->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#tution_fees_paid"> 
<span class="fa fa-plane"></span> <a> Tution Fees Paid</a>  </li>

@else
<li  data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="tution_fees_paid">
<span class="fa fa-plane"></span>
<a> Tution Fees Paid</a> 
</li>
@endif



<?php 

?>     
@if($sim_allocate->count() > 0)     
<li class="active"  data-toggle="modal" data-target="#sim_allocate"> 
<span class="fa fa-plane"></span> <a> Sim Allocate</a>  </li>

@else
<li data-toggle="modal" data-target="#add_enrolment_status_documents" class="add-status" data-id="sim_allocate">
<span class="fa fa-plane"></span>
<a> Sim Allocate</a> 
</li>
@endif
@if(isset($row))
<!-- @foreach($row as $data)
<td><a href="#">data</a></td>
@endforeach -->
@endif

<?php 

?>     
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
 ?>     
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
 ?>     
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

        <div class="class enquiry-test">
                {{-- @include('enquiry.client_detail_pdf'); --}}
                <a href="{{url('client-detail-pdf')}}">  <button class="fa fa-download">Generate PDF </button> </a>
                </div>
                <div class="class enquiry-test">
                    @if(!empty($get->resume))
                <a href="{{url('public/uploads/resume/'.$get->resume)}}" target="_blank"> <button class="fa fa-eye"> Resume </button> </a> 
                @endif
            </div>

                <div class="class enquiry-test" style=" padding: 1px; border-radius: 3px; border: 1px solid; color: #458bbb; background-color: #efefef; padding-right: 7px; font-size: 14px; ">
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
                

               
                
</div>
</div>


<div class="container-fluid">
<div class="row detail-page-tab-view">
<div class="col-md-2 client-detail-left-side-tab panel" style="padding: 0; ">
    <div class="immigration">
<div style="

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
              <input accept="image/*" id="edit_client_image" name='edit_client_image' type="file" style="display:none;" required>

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
<ul class="nav nav-tabs enquiry-text" role="tablist" id="emp_detail_tab" >
<li class="nav-item" style="">
<a class="nav-link active" href="#emp_detail_overview" role="tab"
data-toggle="tab"><i class="fa fa-user-o" aria-hidden="true"></i> Overview </a>
</li>
<li class="nav-item">
<a class="nav-link " href="#education" role="tab"
data-toggle="tab"><i class="fa fa-universal-access" aria-hidden="true"></i> Education </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#work_experience" role="tab"
data-toggle="tab"><i class="fa fa-briefcase" aria-hidden="true"></i> Work Experience </a>
</li>
<li class="nav-item">
<a class="nav-link " href="#english_language_test" role="tab"
data-toggle="tab"><i class="fa fa-database" aria-hidden="true"></i> TOEFL / IELTS / PTE SCORE </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#course_enrolment_detail" role="tab"
data-toggle="tab"><i class="fa fa-university" aria-hidden="true"></i> Course Enrollment Details </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#how_financial" role="tab"
data-toggle="tab"><i class="fa fa-money" aria-hidden="true"></i>Show financials? </a>
</li>

<li class="nav-item">
<a class="nav-link " href="#country_before_travell" role="tab"
data-toggle="tab">
<i class="fa fa-plane" aria-hidden="true"></i> Country Travelled Before</a>
</li>

{{-- <li class="nav-item">
        <a class="nav-link " href="#parent_sibling" role="tab"
        data-toggle="tab">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> Parent Name / Sibling
    </a>
        </li> --}}


        {{-- <li class="nav-item">
                <a class="nav-link " href="#other_detail_overview" role="tab"
                data-toggle="tab">
                <i class="fa fa-rss" aria-hidden="true"></i> Other
            </a>
                </li> --}}

                {{-- <li class="nav-item">
                        <a class="nav-link " href="#dependants" role="tab"
                        data-toggle="tab">
                    Dependants
                    </a>
                        </li> --}}


                        <li class="nav-item">
                                <a class="nav-link " href="#term_and_condition" role="tab"
                                data-toggle="tab">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i> Term & Condition
                            </a>
                                </li>


                                <li class="nav-item">
                                        <a class="nav-link " href="#finance" role="tab"
                                        data-toggle="tab">
                                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Finance 
                                    </a>
                                        </li>                        


<li class="nav-item">
<a class="nav-link " href="#id_proof_detail" role="tab"
data-toggle="tab"><i class="fa fa-address-card-o" aria-hidden="true"></i> Id Proof Details </a>
</li>

<li class="nav-item">
    <a class="nav-link " href="#upload_document" role="tab"
    data-toggle="tab"><i class="fa fa-upload" aria-hidden="true"></i> Document Uploads </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#complete_profile_preview"  role="tab" data-toggle="tab"> <i class="fa fa-eye" aria-hidden="true"></i> Profile Preview </a>
    </li>


</ul>
</div>
</div>
<div class="col-md-7" id="st_detail">

{{-- nav tab start --}}
<div> 
        <ul class="nav nav-tabs home-fa" role="tablist" id="client_detail_tab_nav" >
                <li class="nav-item">
                <a class="nav-link active" href="#home_tab" role="tab"
                data-toggle="tab"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="#mail_tab" role="tab"
                data-toggle="tab"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mail </a>
                </li>

                <li class="nav-item">
                        <!-- <a class="nav-link " href="#communication_tab" role="tab"
                        data-toggle="tab">Communication </a> -->
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#test"><i class="fa fa-commenting-o" aria-hidden="true"></i> Communication</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link " href="#FAQ_tab" role="tab"
                                data-toggle="tab"><i class="fa fa-quora" aria-hidden="true"></i> FAQ </a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link " href="#FAQ_tab" role="tab"
                                        data-toggle="tab"><i class="fa fa-ravelry" aria-hidden="true"></i> Webinar </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#bank_loan" role="tab"
                                            data-toggle="tab"><i class="fa fa-university" aria-hidden="true"></i> Bank Loan </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#application" role="tab"
                                                data-toggle="tab"><i class="fa fa-check-square-o" aria-hidden="true"></i> Application </a>
                                                </li>
         </ul>
  

</div>

{{-- end fo tab start --}}

<div class="tab-content content-style active my-4" id="">
        <div role="tabpane" class="tab-pane active" id="home_tab">
        



<div class="tab-content content-style active my-4" id="">
<div role="tabpane" class="tab-pane active" id="emp_detail_overview">
<h5>Overview</h5>
<div>{{-- <p id="emp_detail_overview_edit" class="fa">Edit </p> --}}</div>
<hr>
<div class="client-detail-edit-button">
        {{-- <p class="edit-client-button  edit"> Edit</p> --}}
        <a href="" data-toggle="modal" data-target="#emp_detail_overview_edit" class="edit-text overview-edit">Edit</a>       
      </div>








      <div >

<table class="table my-table">
        {{-- {{Form::open(array('url'=>'edit-client-detail' , 'files' => "true"))}} --}}
    @foreach($enquiries as $get)
    
    <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr >
<th>Gender </th>
<td> {{$get->gender}} 
</td>
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
<th>Alternate No </th>
<td> {{$get->alternate_contact}} </td>

</tr>





<tr>
    <th>Residence Phone No </th>
    <td> {{$get->residence_phone_no}} </td>

    </tr>




<tr>
<th>Email </th>
<td> {{$get->email}} </td>

</tr>



<tr>
    <th>Alternate Email Id </th>
    <td> {{$get->alterate_email}} </td>

    </tr>




<tr>
    <th>Whatsapp No </th>
    <td> {{$get->whatsapp_no}} </td>

    </tr>




    <tr>
        <th>Skype Id </th>
        <td> {{$get->skype_id}} </td>
        
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

        </tr>



<tr>
<th>Ho No / Street </th>
<td> {{$get->address_line1}} </td>

</tr>



{{-- 22-11-2019  add--}}

<tr>
    <th>Postal Code </th>
    <td> {{$get->pincode}} </td>
    
    </tr>

<tr>
        <th>Country Of Birth </th>
        <td> {{$get->country_of_birth}} </td>
    
        </tr>

        
<tr>
        <th>State Of Birth </th>
        <td> {{$get->satate_of_birth}} </td>
    
        </tr>


        <tr>
                <th>Place Of Birth </th>
                <td> {{$get->place_of_birth}} </td>
    
                </tr>

                <tr>
                        <th>Religioun  </th>
                        <td> {{$get->religoius}} </td>
    
                        </tr>


                        <tr>
                                <th>Current Country of residence  </th>
                                <td> {{$get->current_country_of_residence}} </td>
    
                                </tr>
        

                                <tr>
                                        <th> Nationality </th>
                                        <td> {{$get->nationility}} </td>
    
                                        </tr>

                                        <tr>
                                                <th> Medical history/illness </th>
                                                <td> {{$get->medical_histoty}} </td>
    
                                                </tr>                                  
                                                <tr>
                                                    <th> Criminal History/Cases </th>
                                                    <td> {{$get->criminal_histry}} </td>
                                                   
                                                    </tr>  
                                                    <tr>
                                                        <th> Do you hold any other Nationalities ? </th>
                                                        <td> {{$get->hold_other_nationality}} </td>
                                                       
                                                        </tr>                                                      
{{--end  22-11-2019  add--}}


@endforeach
</table>
 {{-- {{Form::submit('Update')}} 
{{Form::close()}} --}}

</div>
</div>

{{-- second tab --}}
<div role="tabpane" class="tab-pane " id="education">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>Education</h4>

<hr>
<div class="client-detail-edit-button">
        {{-- <p id="education_edit"> Edit </p>   --}}
        {{-- <p data-toggle="modal" data-target="#education_edit" class="edit-text">Edit</p>          --}}
        </div>
        


{{-- add more column --}}
<ul class="nav nav-tabs" role="tablist" id="student_education_nav"  style="">
    
    @if($enq_educations->count() > 0)
    
    @foreach($enq_educations as $get)
        <li class="nav-item">
        <a class="nav-link   get_education_by_class " href=".class{{$get->id}}" role="tab"
        data-toggle="tab" data-id = "{{$get->class}}"  >{{$get->class}} </a>
        </li>
        @endforeach
        <li class="nav-item">
                <a class="nav-link " href="#education_add" role="tab"
                data-toggle="modal" data-id = ""  > Add More.. </a>
                </li>
@else
<li class="nav-item">
    <a class="nav-link   get_education_by_class" href="#education_add" role="tab"
    data-toggle="modal" data-id = "add_more_class"  > Add Education </a>
    </li>
    @endif
</ul>

{{-- {{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}

<table id="get_education_dynamic">  </table>
 
{{Form::close()}} --}}

@if($enq_educations->count() > 0) 
<div class="tab-content content-style    get-education-dynamic my-4" id="">
    @foreach($enq_educations as $q)



    <div role="tabpane" class="  tab-pane class{{$q->id}}" id="">
        <div style="text-align: right"> <button data-toggle="modal" data-target=".education_edit{{$q->id}}" class="edit-text">Edit</button>
            


                {{Form::open(array('url'=>'delete-qualification', "onsubmit" => "return confirm('Are you sure to delete $q->class ?')",  "method"=>"get"))}}

                <input type="hidden" name="name_of_class" value="{{$q->class}}">
                <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">            
        <button type="submit" class="delete-text">Delete</button>
    {{Form::close()}}
        </div>
        
@include('enquiry.edit-delete-education')


 
<div class="">
    {{-- {{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}
    <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}"> --}}
    <table id="" class="">
        
        <tr>
            <th>Qualification</th>
            <td>{{$q->class}}</td>
        </tr>
        <tr>

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
    
    
    
    <tr> <th>City/Place of Study</th> <td >{{$q->place_of_study}}</td><td style="display: none;"> <input type="text" name="place_of_study" value="{{$q->place_of_study}}" class="form-control "> </td></tr>  
    {{-- <tr><td><div class="update-button-cli"> <td> {{Form::submit('Update')}} </td></div></td></tr>  --}}
</table>

    {{-- {{Form::close()}} --}}
</div> </div>
@endforeach
</div>
@else
<p class="no-record">No Record Found!</p>

@endif



@if($enq_educations->count() > 0)

@foreach($enq_educations as $e)

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












{{-- third tab --}}
<div role="tabpane" class="tab-pane " id="work_experience">
  @include('enquiry.work_experience')
</div>
{{-- end third tab --}}




{{-- fourth tab --}}


<div role="tabpane" class="tab-pane " id="english_language_test">
    <?php 
    $get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                // ->where('listening','!=', null)
                ->get();
    ?>
@include('enquiry.english_language_test_score')
</div>
{{-- end of fourth tab --}}



{{-- fifth tab --}}
<div role="tabpane" class="tab-pane " id="course_enrolment_detail">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
Course Enrollment Details</h4>
<hr>

<div class="client-detail-edit-button">
        <button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#course_enrolment_detail_edit" style="color: #ffffff;">Edit</button>
    {{Form::open(array('url'=>'delete-course-enrolment'))}}
        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
        <button type="submit" class="fa fa-detete text-delete">Delete</button>
    {{Form::close()}}
</div>

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
    @if(!empty($enquiries[0]))
    @if(!empty($enquiries[0]->course_session))
    @foreach($enquiries as $e)
    <tr>
        <td> {!! $e->course_session !!}</td>
        <td>{!! $e->course_country !!}  </td>
        <td> {!! $e->course !!}</td>
        <td>{!! $e->course_intake !!} </td>
    </tr>
    @endforeach
    @else
<tr><td colspan="4">
    No Record found</td></tr>
@endif
@endif
</table>

</div>
@include('enquiry.course-enrolment')
</div>
{{-- end fifth tab --}}





{{-- six tab --}}
<div role="tabpane" class="tab-pane " id="how_financial">
<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
How student will show financials</h4>
<hr>

<table>
    @if($enq_financials->count()> 0)
    @foreach($enq_financials as $f)
    <tr><td>
        {!! $f->financials_by !!}    
    </td>
<td> {!! $f->amount !!}</td>
<td>
  
    <div class="client-detail-edit-button" style="display: flex;justify-content: center;">
<button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#how_financial_edit{{$f->id}}" class="">Edit</button>
        {{Form::open(array('url'=>'delete-student-financial'))}}
        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
        <input type="hidden" value="{{$f->id}}" name="id">
        <input type="hidden" value="{{$f->financials_by}}" name="financials_by">
            <button type="submit">Delete</button>
            {{Form::close()}}
        </form>
    </div>
    
</td>
</tr>
    @endforeach

    <tr>      <td colspan="3" >  
    <div style="text-align: right">
     <button type="button"  data-toggle="modal" data-target="#how_financial_edit" class="add-button-design">   + </button>
     </div>
      </td></tr>
@else
<tr><td>
<p class="no-record">No Record Found!</p>
</td></tr>
<tr>      <td colspan="3"> 
<div style="text-align: right">
  <button type="button"  data-toggle="modal" data-target="#how_financial_edit" class="add-button-design">   + </button> 
  </div>
  </td></tr>


    @endif
</table>

</div>
@include('enquiry.how-financial')
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
    {{-- <p id="country_before_travell_edit"> Edit </p> --}}
    
</div>

<div style="text-align: right; margin-bottom: 10px;">
    <button data-toggle="modal" data-target="#country_trable_before_edit" class="edit-button-design">Edit</button>    
    <a class="delete-button-design" onclick="return confirm('Are you sure to delete this?')" href="{{url('delete-score?id=&exam_name=')}}"> Delete </a>     
    
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
    <td>{!! $history->travelled_before_country!!}</td>
    {{-- <td>{{$history->country_name}}</td> --}}
    <td>{!! $history->travelled_before_from !!}</td>
    <td>{!! $history->travelled_before_to !!}</td>
</tr>
@endforeach
@endif
</table>

<div id="country_trable_before_edit" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Father Details</h4>
          </div>
          <div class="modal-body">


            
@if($enq_travelled_historys->count() > 0)
<table>
@foreach($enq_travelled_historys as $history)

<tr>
<th> Country</th>
<td>
      
    
    <select name="travelled_before_country[]" id="" class="form-control">
        <option selected value="{!!$history->travelled_before_country!!}"> {!! $history->travelled_before_country !!} </option>
            @foreach($country as $c)
                <option value="{{$c->country_name}}"> {{$c->country_name}} </option>
            @endforeach
                </select>             


</td>

<tr>
<th>From</th>
<td>  
<input  name="travelled_before_from[]" value="{!! $history->travelled_before_from !!}" class="form-control travelled_before_from" > 
  </td>
</tr>

<tr> <th>To</th>
<td> 
    <input  name="travelled_before_to[]" value="{!! $history->travelled_before_to !!}" class="travelled_before_to form-control">   </p> 
</td>

</tr>


<tr><th>Duration</th>
<td>   <input type="text" name="travelled_before_duration[]" value="{!! $history->travelled_before_duration !!}" class="form-control">   </p>  </td>

</tr>
<td id="plus-button-history" style="position:relative;width: 50px;display:none"><button type="button" onclick="add_imm_history();" class="fa fa-plu plus-sign" >   +</button></td>

</tr>
@endforeach
</table>
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
    <input  type="date" class="datepicker form-control"name="travelled_before_from[]"  />
       
    
    
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


          </div>
      </div>
    </div>
</div>





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

<?php 
$get_finace_detail = DB::table('enq_payments')->where('enquiry_id',session()->get('unique_id_sess'))->get();
?>
@include('enquiry.finance')
{{-- end finance  --}}
 


{{-- ten tab --}}
<?php 
$enq_id_proof_type = Helper::get_id_proof_name();


$get_passport = Helper::get_passport(session()->get('unique_id_sess'));
// dd($get_passport);
?>
<div role="tabpane" class="tab-pane " id="id_proof_detail">
<div class="" data-toggle="modal" data-target="" >


{{-- passport --}}
{{-- @dd($get_passport->count()) --}}
@if($get_passport->count()  > 0 )



<div class="passport" id="passport">
    
    <h5>Passport
                    <p data-toggle="modal" data-target ="#passport_edit"  > Edit</p> 
         
    </h5>

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
    <td>
        <a href="{{url("public/uploads/image/passport/".$get_passport[0]->id_image)}}" target="_blank"> <img style="width:80px;"  src={{url("public/uploads/image/passport/".$get_passport[0]->id_image)}} alt="Upload"> </a> 
    <input type="hidden" value="{{$get_passport[0]->id_image}}" name="h_upload_passport">
    </td> @endif
    {{-- <td> <img src="{{url('uploads\image\passport/').isset($get_passport[0]->id_image)?$get_passport[0]->id_image:'image'}}" alt="Upload"> </td> --}}
    <td> <label for="passport_file" class="upload-file"> Upload Passport Image</label>
         <input type="file" name="upload_passport" class="upload-file" id="passport_file" style="display:none">
         </td>
</tr>

    </table> 
    
    <div>
    
</div>
    
</div>

@endif


<script>
    // $('#passport_edit').click(function(){

        

    //         var a  = $('#passport_edit').text();
    //         if(a == "Back"){    
    //             $('#passport').find('table').find('tr').find('td:first').show();
    //         $('#passport').find('table').find('tr').find('td:last').hide();
    //         $('#passport').find('input[type="submit"]').hide();        
    //         $('#passport_edit').text('Edit');
    //         }
    //         else{

    //         $('#passport_edit').text('Back');
    //         $('#passport').find('table').find('tr').find('td:first').hide();
    //         $('#passport').find('table').find('tr').find('td:last').show();
    //         // $('#passport').find('table').find('tr').find('td').css('display','block !important');
    //         $('#passport').find('input[type="submit"]').show();
    //         }
    //     });
</script>

{{-- end passpost --}}


<br>
<div class="client-detail-edit-button">
    <h4>Other Id   </h4>
         <hr>
</div>

<?php 

$get_id_proof_details  = Helper::get_client_id_proof(session()->get('unique_id_sess'));
$get_id_proof_name_only = DB::table('enq_id_proof')->select('id_proof')->where('enquiry_id',session()->get('unique_id_sess'))->get();

?>

<ul class="nav nav-tabs" role="tablist">
    {{-- @dd($get_id_proof_details->count()) --}}
    @if($get_id_proof_details->count() > 0)
    
@foreach($get_id_proof_details as $e)
    <li class="nav-item">
        <a class="nav-link" href="#id_prf{{$e->id}}" role="tab"
        data-toggle="tab">{{$e->id_proof}} </a>
        </li>
       @endforeach
       <li class="nav-item">
        <a class="nav-link" data-target="#other_id_add" role="tab"
        data-toggle="modal" data-id = "add_more_class"  > Add More.. </a>
        </li>
        @else
        
<li class="nav-item">
    <a class="nav-link   get_scor" data-target="#other_id_add" role="tab"
    data-toggle="modal" data-id = "" data > Add More Id Proof </a>
    
    </li>
       @endif
</ul>


@if(($get_id_proof_details->count() > 0))

<div class="tab-content content-style  my-4" >
    @foreach($get_id_proof_details as $e)
    <div role="tabpane" class="tab-pane " id="id_prf{{$e->id}}">

        <div style="text-align: right;">
            <button data-toggle="modal" data-target="#id_proof_detail_edit{{$e->id}}" class="edit-button-design">Edit</button>
            {{Form::open(array('url'=>"delete-other-id-proof", "method"=>"post"))}}
                <input type="hidden" name="unique_id" id="" value="{{session()->get('unique_id_sess')}}"> 
                <input type="hidden" name="id" value="{{$e->id}}">
        <input type="hidden" name="id_proof" value="{{$e->id_proof}}">
                <button type="submit">Delete</button>
            {{Form::close()}}
        </div>
        

<table class="table add-more-document-parent">
<tr>
<th>Id Proof</th>
<td> 
    <p> {!! $e->id_proof !!} </p>       
</td>
</tr>
<tr>
<th>
  Name (Name In ID Proof)</th>
<td>    <p>  {!! $e->name_on_id_proof !!} </p>
</td>
</tr>


<tr>
<th>ID Proof No</th>

<td>
    <p>  {!! $e->id_proof_number !!} </p>  

</td>   
</tr>

<tr>
<th >Upload</th>
<td>
<p>  {!! $e->id_image !!}  

    <a href="{{url('public/uploads/image/passport/other/'.$e->id_image)}}" target="_blank"> <img style="width:80px;"  src="{{url('public/uploads/image/passport/other/'.$e->id_image)}}" > </a> 

</p>
</td>   
</tr>

{{-- <td id="plus-button-toggle-doc" style="position:relative;width: 50px;display:none;background: #fbfbfb;
border: 1px solid #eae8e8 !important;"><button type="button" onclick="add_document();" class="fa fa-plu plus-sign" >   +</button></td> --}}
{{-- @endforeach
@endif --}}
{{-- 
@if(count($get_id_proof_details) == 0)
<tr>
    <td>
        <select class="form-control" name="id_proof[]">
            <option disabled selected> --Selected--</option>
        @foreach($enq_id_proof_type as $idName)
        <option value="{{$idName->name}}">{{$idName->name}}</option>
        @endforeach
  
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
@endif --}}

</table>

{{-- <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id"> --}}

 {{-- <div class="update-button-client"> {{Form::submit('Update')}} </div>  --}}
{{-- {{Form::close()}} --}}

</div> 
@endforeach
</div>
@else
<div style="position: relative;min-height:300px;">
<img src="{{url('public\uploads\image/NoRecord.png')}}" alt=""class="no-record-image">
</div>
@endif
</div>
@include('enquiry.passport_edit')
</div>


{{-- end of ten (id proof section) --}}


@include('enquiry.upload_docuemnt_section')

@include('enquiry.complete-profile-preview')

 
 

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
    
  
        {{-- applicatio section --}}
        <div role="tabpane" class="tab-pane " id="application">
            <table>
                <thead>

                <tr>
                    <th>S No</th>
                    <th>Date</th>
                    <th>Institute</th>
                    <th>Course</th>
                    <th>Priority</th>
                    <th>View Details</th>
                </tr>
            </thead>
                <tbody>
                    @php
                    $getEnrolment = DB::table('sort_list_courses')
                    ->select('enquiries.name as name','courses.course_name','courses.unique_id as course_code','courses.level','courses.intake','my_institutes.country','my_institutes.city','my_institutes.name as institute','sort_list_courses.priority','sort_list_courses.date')
                    ->join('enquiries', 'sort_list_courses.student_unique_id','enquiries.unique_id')
                    ->leftjoin('courses', 'sort_list_courses.course_unique_id','courses.unique_id')
                    ->leftjoin('my_institutes','courses.college_code','my_institutes.code')
                        ->where('sort_list_courses.status',1)
                        ->where('sort_list_courses.student_unique_id',$id )
                        ->orderBy('priority','ASC')
                        ->get();
                        $count = 1;    
                        
                    @endphp
                            @foreach ($getEnrolment as $item)
                    <tr>
                    <td>{{$count++}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->institute}}</td>
                    <td>{{$item->course_name}}</td>
                    <td>{{$item->priority}}</td>
                    <td><a href="{{url('application/application-process/'.$item->course_code)}}">more...</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        <a style="padding: 8px;
        background: red;
        display: block;
        margin-top: 37px;
        width: 22%;
        text-align: center;
        color: #fff;" href="{{url('filter-course-section/?id='.session()->get('unique_id_sess'))}}">Create Application</a>
        </div>
        {{-- end of application section --}}

<style>
 
/* h1 {
  font-family: 'Alegreya Sans', sans-serif;
  font-weight: 300;
  margin-top: 0;
} */
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







@if(Auth::user()->usertype_status != 3)
@include('enquiry.comment')
@endif
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
              {{-- @dd($enquiries) --}}
            <p> 
                 
                {{-- <img src="jshfdjksh" alt=""style="width: 33px;
                border-radius: 26px;">
                
                {{$get->name}} </p> --}}
              @endforeach
                {{-- <p>Document Approved:- 2010</p> --}}
                <div class="uploaded-d  oc">  
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
           border: none;
    padding: 0;
    background: #246591;
    color: #fff;">
        <button type="button" class="clos" data-dismiss="modal" style="
        font-size: 38px;
    position: absolute;
    right: 0;
    background: #000;
    color: #fff;
    padding: 6px;
    border: none;" >&times;</button>
        <h4 style="width:100%;text-align:center"> Upload Application Documents  first </h4>   
        </div>

{{-- 


        <div class="modal-header">
            <span class="close" style="position: absolute;
            top: 0;
            right: 0;background: #000;
          color: #fff;">×</span>
            <h5 class="callbacklater">Add Comment </h5>
              </div> --}}



        <div> 
            <style>
                #form label, #form input[type="submit"] {
                    /* padding: 4px;
    background: #2f5e7f;
    border-radius: 5px;
    text-align: right;
    color: #fff; */
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
            
            {{-- <output id="result2" style="display: flex;overflow: auto;border-radius: 7px;margin-top:20px;">
            </output> --}}
            <ul class="upload-enrol-doc">
               
                <li>
                    <label for="" style="margin-bottom: 0;">Add Document</label>
                    <div>

                    <input type="text" style="width: 90%;
                    float: left;" placeholder="Enter Document Name" name="document_name_text">  
                    <label for="file100" class="fa fa-upload" style="margin-left: 14px;font-size: 30px;">  </label>
            {{Form::file('document_name[]', array('class' => 'form-control', 'multiple' =>true, 'id'=>"file100",'style'=>"display:none;"))}}   
        </div>



        </li>
        <div> <p onclick="add_upload_file();" style="text-align: right;
            right: 40px;
            font-size: 33px;
            padding: 2px;
            color: #0f0101;
            border-radius: 50%;
            cursor: pointer;
            padding-right: 40px;
            padding-top: 0px;">+</p>  </div>
            </ul>
            <div class="upload-enrol-doc" id="forex_reminder">
                <label for="" style="padding-left:30px">Set Reminder</label>

<input type="date" class="date" name="forex_reminder" id=""  style="width: 90%;
margin: auto;
display: block;
margin-bottom: 14px;"  >
</div>


<div class="upload-enrol-doc" id="sim_allocation">
    <label for="" style="padding-left:30px">SIM Allocation</label>

<input type="text" name="sim_allocation" id=""  style="width: 90%;
margin: auto;
display: block;
margin-bottom: 14px;" placeholder="Enter Sim Number" >
</div>


<div class="upload-enrol-doc" id="study_follow_up">
    <label for="" style="padding-left:30px">Study Follow Up</label>

<input type="text" name="study_follow_up" id=""  style="width: 90%;
margin: auto;
display: block;
margin-bottom: 14px;" placeholder="Study Follow Up" >
</div>

            {{-- <textarea name="comment" id="comment" cols="3" rows="1" class="form-control">Comment Here...</textarea> --}}
        <input type="text" name="comment" placeholder="Comment here..." class="form-control">

            <div id="add_sim_id"></div>
            <div class="button">
                {{-- <div>
                    <label for="filel"> Upload Documents </label>
            {{Form::file('document_name[]', array('class' => 'form-control', 'multiple' =>true, 'id'=>"filel",'style'=>"display:none;"))}} </div> --}}
            <div style="margin-bottom: 20px;">{{Form::submit('Save')}} </div>
            {{Form::close()}}
        </div>

<script>
 $(document).ready(function(){
     $('.add-status').click(function(){
         
         var status = $(this).attr('data-id');
         
         if(status == 'forex_exchange'){
document.getElementById('forex_reminder').style.display="block";
         }
         if(status == 'sim_allocate'){
document.getElementById('sim_allocation').style.display="block";
         }
         if(status == 'student_follow_up'){
document.getElementById('study_follow_up').style.display="block";
         }
//             var doc = document.getElementById('add_sim_id');
//             var add_ele  = document.createElement('INPUT');
// var att = document.createAttribute("name");        
// att.value = "sim_number";           
// add_ele.setAttributeNode(att);    
//             doc.appendChild(add_ele);

         


             $("#form").submit(function (e) {
                            var comment = $('#comment').val();
                            var file = $('#file').val();
                            var u_id  = "<?php echo session()->get('unique_id_sess'); ?>";
                            
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url('application-sent')}}?a="+status+"&u_id="+u_id;
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


















@include('enquiry.emp_detail_overview_edit') 
{{-- @include('enquiry.education_edit')  all tab editable --}} 
@include('enquiry.education_add') 


<script>  

// $(document).ready(function(){
    // $('.update-button-client td').style.display= "table-cell ";

        // $('#emp_detail_overview_edit').click(function(){
        //     var a  = $('#emp_detail_overview_edit').text();
        //     if(a == "Back"){
        //         $('#emp_detail_overview').find('table').find('tr').find('td:first').show();
        //     $('#emp_detail_overview').find('table').find('tr').find('td:last').hide();
        //     $('#emp_detail_overview').find('input[type="submit"]').hide();        
        //     $('#emp_detail_overview_edit').text('Edit');
        //     }
        //     else{

        //     $('#emp_detail_overview_edit').text('Back');
        //     $('#emp_detail_overview').find('table').find('tr').find('td:first').hide();
        //     $('#emp_detail_overview').find('table').find('tr').find('td:last').show();
        //     $('#emp_detail_overview').find('input[type="submit"]').show();
        //     }
        // });
    // });
        




  
    // $(document).ready(function(){
    // // $('.update-button-client td').style.display= "table-cell ";
    // $('#education').find('table').find('tr').find('td:last').hide();
    //     $('#education_edit').click(function(){
    //         var a  = $('#education_edit').text();
    //         if(a == "Back"){
    //             $('#education').find('table').find('tr').find('td:first').show();
    //         $('#education').find('table').find('tr').find('td:last').hide();
    //         $('#education').find('table').find('tr').find('input[type="submit"]').hide();        
    //         $('#education_edit').text('Edit');
    //         }
    //         else{
    //         $('#education_edit').text('Back');
    //         $('#education').find('table').find('tr').find('td:first').hide();
    //         $('#education').find('table').find('tr').find('td:last').show();
    //         $('#education').find('table').find('tr').find('input[type="submit"]').show();
    //         // $('#education_edit').text('Back');
    //         }
    //     });
    // });
        
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






// $(document).ready(function(){
//     $('#work_experience table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#work_experience_edit').click(function(){
//             var a  = $('#work_experience_edit').text();
//             $('#add_clas').show();
// if(a == "Back"){
//     $('#work_experience_edit').text("Edit");
//     $('#work_experience table').find('tr').find('td').find('p:first').show();
//             $('#work_experience table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
//             $('#add_clas').hide();
// }
// else{
//     $('.update-button-client').show(); 
//             $('#work_experience table').find('tr').find('td').find('p:first').hide();
//             $('#work_experience table').find('tr').find('td').find('p:last').show();
//             $('#work_experience_edit').text("Back");
// }   
//     });
// });


// $(document).ready(function(){
//     $('#english_language_test table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#english_language_test_edit').click(function(){
//             var a  = $('#english_language_test_edit').text();
// if(a == "Back"){
//     $('#english_language_test_edit').text("Edit");
//     $('#english_language_test table').find('tr').find('td').find('p:first').show();
//             $('#english_language_test table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
// }
// else{
//     $('.update-button-client').show(); 
//             $('#english_language_test table').find('tr').find('td').find('p:first').hide();
//             $('#english_language_test table').find('tr').find('td').find('p:last').show();
//             $('#english_language_test_edit').text("Back");
// }   
//     });
// });


// $(document).ready(function(){
//     $('#course_enrolment_detail table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#course_enrolment_detail_edit').click(function(){
//             var a  = $('#course_enrolment_detail_edit').text();
// if(a == "Back"){
//     $('#course_enrolment_detail_edit').text("Edit");
//     $('#course_enrolment_detail table').find('tr').find('td').find('p:first').show();
//             $('#course_enrolment_detail table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
// }
// else{
//     $('.update-button-client').show(); 
//             $('#course_enrolment_detail table').find('tr').find('td').find('p:first').hide();
//             $('#course_enrolment_detail table').find('tr').find('td').find('p:last').show();
//             $('#course_enrolment_detail_edit').text("Back");
// }   
//     });
// });



// $(document).ready(function(){
//     $('#how_financial table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#how_financial_edit').click(function(){
//             var a  = $('#how_financial_edit').text();
//             $('#add_finance_button').show(); 

// if(a == "Back"){
//     $('#how_financial_edit').text("Edit");
//     $('#how_financial table').find('tr').find('td').find('p:first').show();
//             $('#how_financial table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
//             $('#add_finance_button').show();
// }
// else{
//     $('.update-button-client').show();  
//             $('#how_financial table').find('tr').find('td').find('p:first').hide();
//             $('#how_financial table').find('tr').find('td').find('p:last').show();
//             $('#how_financial_edit').text("Back");
//             $('#add_finance_button').show();
// }   
//     });
// });





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



// $(document).ready(function(){
//     $('#id_proof_detail table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#id_proof_detail_edit').click(function(){
            
//             $('#plus-button-toggle-doc').show();
//             var a  = $('#id_proof_detail_edit').text();

            
// if(a == "Back"){
//     $('#id_proof_detail_edit').text("Edit");
//     $('#id_proof_detail table').find('tr').find('td').find('p:first').show();
//             $('#id_proof_detail table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
//             $('#plus-button-toggle-doc').hide();
// }
// else{
//     $('.update-button-client').show();
//             $('#id_proof_detail table').find('tr').find('td').find('p:first').hide();
//             $('#id_proof_detail table').find('tr').find('td').find('p:last').show();
//             $('#id_proof_detail_edit').text("Back");
//             $('#plus-button-toggle-doc').show();
// }   
//     });
// });




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

    //   function financial(){
    //     $('.add-financial').append('<tr><td>  <select class="form-control" name="financial_by[]"> <option disabled selected>--Select--</option>                                                                 <option VALUE="Bank loan">Bank loan</option>    <option VALUE="Personal Fund">Personal Fund</option>    <option VALUE="Family Sponsorship">Family Sponsorship</option>   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>   <option VALUE="Other">Other</option>  </select> </td>     <td> {!! Form::number('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}       </td></tr> ')

      

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
            
            $(this).prop('disabled', true); 
            
        }
    });

               } else{
                   $(this).prop('checked', false);
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







{{-- @include('enquiry.script_education'); --}}


<script>
    

    document.querySelector('#student_education_nav').children[{{$enq_educations->count()-1}}].firstElementChild.
    classList.add('active');
        document.querySelector('.get-education-dynamic').children[{{$enq_educations->count()-1}}].className += " " + "active";
        

 
    var i= 100;
    function add_upload_file(){
        i++;
document.querySelector('.upload-enrol-doc li').innerHTML+= `

                    <div style="margin-top:15px;">

                    <input type="text" style="width: 90%;
                    float: left;" placeholder="Enter Document Name">  
                    <label for="file`+i+`" class="fa fa-upload" style="margin-left: 14px;font-size: 30px;">  </label>
            {{Form::file('document_name[]', array('class' => 'form-control', 'id'=>"file`+i+`",'style'=>"display:none;"))}}   
        </div>`;
    }


</script>
{{session()->get('unique_id_sess')}}
<style>table th{border: 1px solid #ecebeb !important; padding: 8px 11px !important;vertical-align:baseline !important}</style>
@endsection


<div class="modal" id="test" >
    <div class="">
      <div class="modal-content" style=" height: 100%;">
  
        <!-- Modal Header -->
        <div class="modal-header" style="background: #fcfcfe !important;">
          <button type="button" class="close" data-dismiss="modal" style=" color: #458bbb; position: absolute; z-index: 99999; font-size: 20px;"><i class="fa fa-times"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body" style=" position: relative; top: -7%; padding: 0px;">
            <section class="son-msger">
                <header class="son-msger-header">
                  <div class="son-msger-header-title">
                    <i class="fa fa-comment-o"></i> 
                  </div>
                  <div class="son-msger-header-options">
                   
                  </div>
                </header>
              
                <main class="son-msger-chat">
                    <?php
$chat = DB::table('student_communications')
->where('enquiry_id',session()->get('unique_id_sess'))
->get();

if($chat->count() > 0){

foreach($chat as $cht){
    if($cht->employee_id != Auth::user()->unique_id ){
                    ?>
                  <div class="msg left-msg">
                    <div
                     class="son-msg-img"
                     style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
                    ></div>
              
                    <div class="son-msg-bubble">
                      <div class="son-msg-info">
                        <div class="son-msg-info-name">{{Helper::getUserById(Auth::user()->name)}}</div>
                        <div class="son-msg-info-time">{{$cht->created_at}}</div>
                      </div>
                      <div class="son-msg-text">
                        {{$cht->msg}}
                      </div>
                    </div>
                  </div>
<?php
 }else{

 ?>
                  
                  <div class="msg right-msg">
                    <div
                     class="son-msg-img"
                     style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
                    ></div>
              
                    <div class="son-msg-bubble">
                      <div class="son-msg-info">
                        <div class="son-msg-info-name">{{Helper::getUserById(Auth::user()->name)}}</div>
                        <div class="son-msg-info-time">12:46{{$cht->created_at}}</div>
                      </div>
              
                      <div class="son-msg-text">
                         {{$cht->msg}}
                      </div>
                    </div>
                  </div>
                  <?php   }} } ?>
                </main>
             
                <form class="son-msger-inputarea">
                  <input type="text" id="txt_msg"class="son-msger-input" placeholder="Enter your message...">
                  <button id="send_st_text_msg" type="submit" class="son-msger-send-btn">Send</button>
                </form>
                <script>
                    var id = "{{session()->get('unique_id_sess')}}";

                    setInterval(() => {
                                       fetch("{{url('get-communication-student?id=')}}"+id)
                                 .then(response => response.json())
.then(data => {
    var len = data.length;
    document.getElementsByClassName('son-msger-chat')[0].innerHTML = '';
for(var i=0; i<=len; i++){
    console.log(data[i])
if(data[i].msg_sent_by   != "{{Auth::user()->unique_id}}" ){
  document.getElementsByClassName('son-msger-chat')[0].innerHTML +=  `
<div class="msg left-msg"><div class="son-msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
                    ></div>
                    <div class="son-msg-bubble">
                      <div class="son-msg-info">
                        <div class="son-msg-info-name">${data[i]['name']}</div>
                        <div class="son-msg-info-time">${data[i]['created_at']}</div>
                      </div>
                      <div class="son-msg-text">
                        ${data[i]['msg']}
          </div>
                    </div>
                  </div>`

 }else{                  
document.getElementsByClassName('son-msger-chat')[0].innerHTML +=  `<div class="msg right-msg">
                    <div
                     class="son-msg-img"
                     style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
                    ></div>
                    <div class="son-msg-bubble">
                      <div class="son-msg-info">
                        <div class="son-msg-info-name">${data[i]['name']}</div>
                        <div class="son-msg-info-time">${data[i]['created_at']}</div>
                      </div>
                      <div class="son-msg-text">
                         ${data[i]['msg']}
                      </div>
                    </div>
                  </div>                    `
}}} )}, 3000);

                    document.getElementById('send_st_text_msg').onclick = function(q){
                        q.preventDefault();
var data =  document.getElementById('txt_msg').value;



                        fetch("{{url('communication-student?data=')}}"+data+"&id={{session()->get('unique_id_sess')}}", {
                            method:"POST",
                            
                            headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},


                        })
                        .then(response => response.text())
.then(data => {
    document.getElementById('txt_msg').value = '';
  document.getElementsByClassName('son-msger-chat')[0].innerHTML +=  `<div class="msg right-msg">
                    <div
                     class="son-msg-img"
                     style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
                    ></div>
              
                    <div class="son-msg-bubble">
                      <div class="son-msg-info">
                        <div class="son-msg-info-name">name</div>
                        txx<div class="son-msg-info-time">12:46</div>
                      </div>
              
                      <div class="son-msg-text">
                         msg
                      </div>
                    </div>
                  </div>`
})
// .catch((error) => {
//   console.error('Error:', error);
// });
                    }
                </script>
              </section>
        </div>
  
        <!-- Modal footer -->
  
      </div>
    </div>
  </div>

  
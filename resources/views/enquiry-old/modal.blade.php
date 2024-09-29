
<style>
  .app-doc-update{
    text-align: center;
    position: absolute;
    background: #000000b0;
    bottom: -25px;
    transform: translate(-41px,-51%);
    left: 50%;
    width: 112px;
    color: #fff;
    /* display:none; */
  }
  .app-doc-update:hover{
    display:block;
  }
</style>

<!-- The Modal -->
<div class="modal hr-height" id="application_sent_view">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        
        color: #383838;" >&times;</button>
        <h3 style="width:100%;text-align:center"> Application Sent first </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $application_sent;

            
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
 
            <p class="app-doc-update">
              {{Form::open(array('url'=>'update-enrolment-status-documents', 'method' => 'post', 'files' => true))}}
<label for="{{'doc'.$app->id}}">Choose Update file</label>
<input type="file" style="display:none" id="{{'doc'.$app->id}}" name="doc_image">
<input type="submit" id="{{'upload_button'.$app->id}}" style="display:none" value="Update">
{{Form::close()}}
<script>
  $(document).ready(function(){
      $('#{{'doc'.$app->id}}').change(function(e){
          // var fileName = e.target.files[0].name;
          // alert('The file "' + fileName +  '" has been selected.');
          document.getElementById('{{'doc'.$app->id}}').style.display="none"; 
          document.getElementById('{{'upload_button'.$app->id}}').style.display="block"; 
      });
  });
</script>
            </p>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>







<!-- The Modal -->
<div class="modal hr-height" id="conditional_offer_letter_view">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $conditional_offer_letter_received;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>





<!-- The Modal -->
<div class="modal hr-height" id="full_offer_received">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center"> Full Offer Letter Received Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $full_offer_received;
            
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            @if(($get_data[0]->application_sent  == "full_offer_received"))
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
              @endif
              @endif
              @endif
        </div>
        </div>
        </div>
</div>












<!-- The Modal -->
<div class="modal hr-height" id="tution_fees_paid">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="color: #383838;" >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
              
            $get_data = $tution_fees_paid;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>









<!-- The Modal -->
<div class="modal hr-height" id="coe_received">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $coe_received;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>












<!-- The Modal -->
<div class="modal hr-height" id="forex_exchange">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
              
            $get_data = $forex_exchange;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>


















<!-- The Modal -->
<div class="modal hr-height" id="sim_allocate">
  <div class="modal-dialog" style="width:1000px;max-width:1000px;">
  <div class="modal-content" style="width:1000px !important; min-height:
  300px;max-width:600px; ">
  <!-- Modal Header -->
  <div class="modal-header" style="
  border: none;">
  <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
  <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
  </div>
  <hr>
  <div id="old_coment" class="get-document-class"> 
        <?php  
        
      $get_data = $sim_allocate;
    
      ?>

      @if(!empty($get_data))
      @if($get_data->count() >0 )
      <div class="container">
              <div class="row">  
   <p class="date">   {{$get_data[0]->date}} </p>
                  @foreach($get_data as $app)
        <div class="col-sm-3">
      <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
      </a>
        </div>
        
        @endforeach
      </div>
  </div>
  
  <label for=""> Comments </label>
        <p class="comment"> {{$app->comment}} </p>
       
        @endif
        @endif
  </div>
  </div>
  </div>
</div>








<!-- The Modal -->
<div class="modal hr-height" id="study_commenced">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $study_commenced;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>

















<!-- The Modal -->
<div class="modal hr-height" id="student_follow_up">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
       
        color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $student_follow_up;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>















<!-- The Modal -->
<div class="modal hr-height" id="study_completed">
        <div class="modal-dialog" style="width:1000px;max-width:1000px;">
        <div class="modal-content" style="width:1000px !important; min-height:
        300px;max-width:600px; ">
        <!-- Modal Header -->
        <div class="modal-header" style="
        border: none;">
        <button type="button" class="close" data-dismiss="modal" style="
        
        color: #383838; " >&times;</button>
        <h3 style="width:100%;text-align:center">  Fees Documents  </h3>   
        </div>
        <hr>
        <div id="old_coment" class="get-document-class"> 
              <?php  
            $get_data = $study_completed;
            ?>

            @if(!empty($get_data))
            @if($get_data->count() >0 )
            <div class="container">
                    <div class="row">  
         <p class="date">   {{$get_data[0]->date}} </p>
                        @foreach($get_data as $app)
              <div class="col-sm-3">
            <a href="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" target="_blank">  <img src="{{url('public\uploads\enrolment_documents/'.$app->documents)}}" alt="" > 
            </a>
              </div>
              
              @endforeach
            </div>
        </div>
        
        <label for=""> Comments </label>
              <p class="comment"> {{$app->comment}} </p>
             
              @endif
              @endif
        </div>
        </div>
        </div>
</div>








<!-- The Modal -->
<div class="modal hr-height" id="add_enrolment_bank_loans">
                <div class="modal-dialog" style="width:1000px;max-width:1000px;">
                <div class="modal-content" style="width:1000px !important; min-height:
                300px;max-width:1000px; ">
                <!-- Modal Header -->
                <div class="modal-header" style="
                border: none;">
                <button type="button" class="close" data-dismiss="modal" style="color: #383838; " >&times;</button>
                
                </div>
 
@include('enquiry.mail')
<tr>
                        <td style="text-align: right;padding-bottom:10px">
                        {{Form::submit("Send Mail to Bank", array('class' => "btn btn-danger"))}}                                                     </td>
            </tr>
            </table>




{{-- start pdf --}}

 
       
<?php

$get_info = DB::table('enquiries')
            ->where('unique_id',session()->get('unique_id_sess'))
            ->get();




$upload = 'uploads/Student-Detail.pdf';



require (__DIR__.'/../../../public/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
// $pdf->Image(url('images/logo.png',9,12,50));
$pdf->SetTitle('Esource Inc. Invoice',false); //pdf title
$pdf->SetFont('Arial','B',18);
$pdf->Text(70,12,'Student Information Sheet'); //create text

$date = date("M-d-Y");
$pdf->SetFont('Arial','B',12);

$pdf->SetY(15);
$pdf->SetX(5);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(95,20,'Overview');

foreach($get_info as $g)
{
$pdf->SetY(22);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'Name Of Student',1,0,'C');  
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,$g->name,1,0,'C');  
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'DOB',1,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,$g->dob,1,1,'C');

$pdf->SetY(29);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'Gender',1,0,'C');  
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,$g->gender,1,0,'C');  
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'Contact',1,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,$g->contact,1,1,'C');

$pdf->SetY(36);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'Email',1,0,'C');  
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,$g->email,1,0,'C');  
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,7,'Matital Status',1,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,'-',1,1,'C');
}


// start edu
$pdf->SetY(43);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(95,48,'Education');



$edu  = DB::table('enq_educations')
        ->where('enquiry_id', session()->get('unique_id_sess'))
        ->get();

$pdf->SetY(50);
$pdf->SetX(5);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,7,'Qualification',1,0,'C');  
$pdf->Cell(55,7,'Year of Passing',1,0,'C');  
$pdf->Cell(45,7,'Percentage',1,0,'C');
$pdf->Cell(55,7,'Institute Name',1,1,'C');

$a = 57;
if($edu->count() == 0){
    $pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,7,"-",1,0,'C');  
$pdf->Cell(55,7,"-",1,0,'C');  
$pdf->Cell(45,7, "-",1,0,'C');
$pdf->Cell(55,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $edu as $d){

    $pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,7,$d->class,1,0,'C');  
$pdf->Cell(55,7,$d->passing_year,1,0,'C');  
$pdf->Cell(45,7, $d->percentage,1,0,'C');
$pdf->Cell(55,7, $d->education_name ,1,1,'C');
$a = $a+7;
}}
// end edu


// start experience
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(90,$a+5,'Work Experience');

$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,7,'Company Name ',1,0,'C');  
$pdf->Cell(55,7,' Designation ',1,0,'C');  
$pdf->Cell(45,7,' Start Date ',1,0,'C');
$pdf->Cell(55,7,' End Date  ',1,1,'C');
$a = $a+7;


$exp  = DB::table('enq_experiences')
        ->where('enquiry_id', session()->get('unique_id_sess'))
        ->get();
   if($exp->count() == 0){
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(45,7,"-",1,0,'C');  
$pdf->Cell(55,7,"-",1,0,'C');  
$pdf->Cell(45,7, "-",1,0,'C');
$pdf->Cell(55,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $exp as $d){
    // dd(session()->get('unique_id_sess'));
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(45,7,$d->company_name,1,0,'C');  
$pdf->Cell(55,7,$d->designation,1,0,'C');  
$pdf->Cell(45,7, $d->start_date,1,0,'C');
$pdf->Cell(55,7, $d->end_date ,1,1,'C');
$a = $a+7;
}}
// end experience










// English language test
$a = $a+7;
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(80,$a+5,'TOEFL / IELTS / PTE SCORE');

$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,7,' Language ',1,0,'C');  
$pdf->Cell(40,7,' 	Writing ',1,0,'C');  
$pdf->Cell(40,7,' Speaking ',1,0,'C');
$pdf->Cell(40,7,' Listening ',1,0,'C');
$pdf->Cell(40,7,' Reading  ',1,1,'C');
$a = $a+7;

$score  = DB::table('enq_exam_scores')
        ->where('enquiry_id', session()->get('unique_id_sess'))
        ->get();

        if($score->count() == 0){
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,7,"-",1,0,'C');  
$pdf->Cell(40,7,"-",1,0,'C');  
$pdf->Cell(40,7, "-",1,0,'C');
$pdf->Cell(40,7, "-",1,0,'C');
$pdf->Cell(40,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $score as $d){
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,7,$d->language,1,0,'C');  
$pdf->Cell(40,7,$d->writing,1,0,'C');  
$pdf->Cell(40,7, $d->speaking,1,0,'C');
$pdf->Cell(40,7, $d->listening,1,0,'C');
$pdf->Cell(40,7, $d->reading ,1,1,'C');
$a = $a+7;
}}
// end score







// start Course Enrollment Details
$a = $a+7;
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(82,$a+5,'Course Enrollment Details');

$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,' Start Session ',1,0,'C');  
$pdf->Cell(50,7,' 	Country ',1,0,'C');  
$pdf->Cell(50,7,' Course ',1,0,'C');
$pdf->Cell(50,7,' Interested for Intake ',1,1,'C');

$a = $a+7;

        if($get_info->count() == 0){
    $pdf->SetY($a+7);
$pdf->SetX(5);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,"-",1,0,'C');  
$pdf->Cell(50,7,"-",1,0,'C');  
$pdf->Cell(50,7, "-",1,0,'C');
$pdf->Cell(50,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $get_info as $d){
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,$d->course_session,1,0,'C');  
$pdf->Cell(50,7,$d->course_country,1,0,'C');  
$pdf->Cell(50,7, $d->course,1,0,'C');
$pdf->Cell(50,7, $d->course_intake ,1,1,'C');
$a = $a+7;
}}
// end Course Enrollment Details





// start financial
$a = $a+7;
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(78,$a+5,'How student will show financials');


// $a = $a+7;
$financal = DB::table('enq_financials')
            ->where('enquiry_id', session()->get('unique_id_sess'))
            ->get();
        if($financal->count() == 0){
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,7,"-",1,0,'C');  
$pdf->Cell(100,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $financal as $d){
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,7,$d->financials_by,1,0,'C');  
$pdf->Cell(100,7, $d->amount ,1,1,'C');
$a = $a+7;
}}
// end financial






// start Country Travelled Before
$a = $a+7;
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(85,$a+5,'Country Travelled Before');

$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,' Country ',1,0,'C');  
$pdf->Cell(50,7,' 	From ',1,0,'C');  
$pdf->Cell(50,7,' To ',1,0,'C');
$pdf->Cell(50,7,' Duration ',1,1,'C');

$a = $a+7;

$travel_before = DB::table('enq_travelled_historys')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->get();

        if($travel_before->count() == 0){
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,"-",1,0,'C');  
$pdf->Cell(50,7,"-",1,0,'C');  
$pdf->Cell(50,7, "-",1,0,'C');
$pdf->Cell(50,7, "-" ,1,1,'C');
$a = $a+7; 
}
else{
foreach( $travel_before as $d){
$pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,$d->travelled_before_country,1,0,'C');  
$pdf->Cell(50,7,$d->travelled_before_from,1,0,'C');  
$pdf->Cell(50,7, $d->travelled_before_to,1,0,'C');
$pdf->Cell(50,7, $d->travelled_before_duration ,1,1,'C');
$a = $a+7;
}}

 
// dd(session()->get('unique_id_sess'));   
// strat Any Visa Rejected Before
$a = $a+7;
$pdf->SetY($a);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(85,$a+5,'Any Visa Rejected Before');


$rej = DB::table('enq_visa_rejected_countrys')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->get();
                $con = array();
                foreach($rej as $r){
                   
    array_push($con, $r->country);
  }
$contry =  implode(", ",$con);
if($contry != ""){
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,' Country Name ',1,0,'C');  
$pdf->Cell(150,7, $contry ,1,1,'C');}
else{
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,7,' Country Name ',1,0,'C');  
$pdf->Cell(150,7, '-' ,1,1,'C');
}

// end Any Visa Rejected Before




// strat Any Visa Rejected Before
$pdf->SetY($a+7+7);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(36,36,36);
$pdf->Cell(200,7,'',1,1,'L',1); 
$pdf->SetTextColor(255,255,255);
$pdf->Text(95,169+7+5,' Id Proof ');


foreach($get_info as $get){          
$a = $a+7+7;
    $pdf->SetY($a+7);
$pdf->SetX(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7, $get->id_proof ,1,0,'C');  
$pdf->Cell(100,7, $get->id_proof_no,1,1,'C');
}
// end Any Visa Rejected Before

// dd($upload);

$pdf->Output($upload, 'F');
Session::flash('upload_pdf', $upload);
?>



{{-- end pdf --}}


                                        {{
                                   Form::close()
                           }}
            
                       </div>
                   </div>
                        </div>
                    </div>
            </div>
            
            





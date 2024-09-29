@extends('header') 
@section('tabletform')










<div class="container-fluid  detail-page " style="background: #fbfbfb;">


@foreach($enquiries as $get)
  <?php session()->put('unique_id_sess',$get->unique_id); ?>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i> Proceed</button>
        <div class="row content-color">
          <div  style="width:100%; text-align:right; padding:20px;">
@if($get->device == "fa fa-tablet")
        <a href="{{url('enquiry-table/'.$get->unique_id)}}">Edit</a>  
        {{-- <a href="{{url('enquiry-tabl')}}">Delete</a>    --}}
        <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$get->unique_id}} > Delete</a>     
 @else         
 <a href="{{url('enquiry/'.$get->unique_id)}}">Edit</a>  
 
 {{-- <a href="{{url('delete'.$get->unique_id)}}">Delete</a>  --}}
 <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$get->unique_id}} > Delete</a>     
 @endif
</div>




        <div class="container-fluid  detail-page" style="background: #fbfbfb;">
            <div class="row">
            <div class="col-md-3 my-3" style="margin: 8px">
             
            <div class="row">
            
            <div class="col-md-12 py-3 profile-image">
                  
                        <img src="{!!url('public/uploads/image/'.$get->image) !!}" alt="image">
                               <p>       {!! $get->name !!}   </p>
                    
</div></div></div>

            <div class="col-md-9 row basic-detail">
              {{-- <div class="col-md-4 py-3 ">Name :</div> --}}
               {{-- <div class="col-md-8 py-3 ">
               
{!! $get->name !!}

               </div> --}}
   
               <div class="col-md-4 py-3 ">D.O.B :</div>
               <div class="col-md-8 py-3 ">
                {!! $get->dob !!}
                </div>
                <div class="col-md-4 py-3 ">Gender :</div>
                <div class="col-md-8 py-3 ">
                 {!! $get->gender !!}
                 </div>

               <div class="col-md-4 py-3 ">Contact No :</div>
               <div class="col-md-8 py-3 ">
                {!! $get->contact !!}
                </div>


                <div class="col-md-4 py-3 ">Email :</div>
                <div class="col-md-8 py-3 ">
                    {!! $get->email !!}
                 </div>


                 
               <div class="col-md-4 py-3 ">Current Address :</div>
               <div class="col-md-8 py-3 ">
                {!! $get->address_line1.' '.$get->address_line2 !!}
            </div>

            <div class="col-md-4 py-3 ">Country :</div>
            <div class="col-md-8 py-3 ">
                {!! $get->country !!}
         </div>

        



         <div class="col-md-4 py-3 ">State :</div>
            <div class="col-md-8 py-3 ">
                {!! $get->state !!}
         </div>

         <div class="col-md-4 py-3 ">City :</div>
         <div class="col-md-8 py-3 ">
            {!! $get->city !!}
      </div>

               </div>
               </div> 
               </div>
               {{-- <div class="col-md-4 py-3 ">Nationality :</div> --}}
               <div class="col-md-8 py-3 ">
                {{-- {!! $get->nationality !!} --}}
            </div>
               
               
               <!-- Marriage -->
               
               {{-- <div class="col-md-4 py-3 ">Marriage :</div>
               <div class="col-md-4 py-3 ">
                {!! $get->married !!}
                </div> --}}
                @endforeach
                @foreach($enq_marriages as $m)
               {{-- <div class="col-md-4 py-3 "> --}}
                {{-- {!! $m->name !!} --}}
                {{-- </div> --}}
                {{-- {!! $get->name !!} --}}
               <div class="k0check" style="width:100% ;">
                  
                    <div class="container-fluid">
                    <div class="row">
                             {{-- <div class="col-md-4 py-3">Date of Marriage</div>
                             <div class="col-md-3 py-3" >
                            <p>   {!! $m->dom !!}  </p>   
                                </div>
                             <div class="col-md-2 py-3"> Spouse Qualification</div>
                             <div class="col-md-3 py-3">
                                {!! $m->spouse_qualification !!}

                                </div> --}}
        <h4>  Marital Startus </h4>
                                <table class="table">
                                  <thead>
                                    <th>  Date of Marriage </th>
                                    <th> Spouse Qualification  </th>
                                    <th>  Spouse Income Proof  </th>
                                  </thead>
                                  <tbody>
                                    <td> {!! $m->dom !!}   </td>
                                    <td>  {!! $m->spouse_qualification !!}  </td>
                                    <td class="marriag"> <img src="http://localhost/imm/imm/public/uploads/sip/{!! $m->spouse_income_proof !!}" alt="">    </td>
                                  </tbody>
                                </table>
           
                             {{-- <div class="col-md-4  py-3">spouse Income Proof</div>
                             <div class="col-md-8  py-3">
                                {!! $m->spouse_income_proof !!}
                                </div> --}}
    
                     </div>
                   </div>
                </div>
                @endforeach
                   <!-- Marriage end -->

<div class="container-fluid">
  <hr >
  <div class="row">
    <div class="col-md-12">
      <h5> Id Proof Details </h5>
    </div>
    <div class="col-md-12">  

      <table class="table">
        <thead>
          <tr>
          <th> Id Proof: </th>
          <th> Name (Name In ID Proof):  </th>
          <th> ID Proof No :  </th>
        </tr>
        </thead>
        <tbody>
          @foreach($enquiries as $e)
<tr> 
          <td> {!! $e->id_proof !!}   </td>
          <td>  {!! $e->id_proof_name !!}  </td>
          <td> {!! $e->id_proof_no !!}  </td>
        </tr> 
@endforeach
        </tbody>
      </table>


    </div>
  </div>


<hr>
  <div class="row">
      <div class="col-md-12">
        <h5>Course Enrollment Details </h5>
      </div>
      <div class="col-md-12">  
  
        <table class="table">
          <thead>
            <tr>
            <th> Start Session : </th>
            <th> Country </th>
            <th> Course :  </th>
            <th> 
                Interested for Intake : </th>
          </tr>
          </thead>
          <tbody>
            @foreach($enquiries as $e)
  <tr> 
            <td> {!! $e->course_session !!}   </td>
            <td>  {!! $e->course_country !!}  </td>
            <td> {!! $e->course !!}  </td>
            <td> {!! $e->course !!}  </td>
          </tr> 
  @endforeach
          </tbody>
        </table>
  
  
      </div>
    </div>
  

<hr>
</div>




                   
               {{-- <div class="col-md-4 py-3 ">Interested for Intake :</div> --}}
               <div class="col-md-8 py-3 ">
                
                </div>

               {{-- <div class="col-md-12 py-3 ">Education :</div> --}}
               <div class="col-md-12 py-3 ">Education :
                 <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Qualification</th>
                    <th scope="col">Year of Passing</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Name of Education</th>
                  </tr>
                </thead>
                <tbody>
                  @if((!empty($enq_educations)))
                  @foreach($enq_educations as $edu)
                  <tr>
                    <td> {!! $edu->class !!}</td>
                    
                    <td>
                        {!! $edu->passing_year !!}
                    </td>
                    <td>
                        {!! $edu->percentage !!}
                    </td>
                    <td>
                        {!! $edu->education_name !!}
                    </td>
                  </tr>
                  @endforeach
                  @endif
               
               
                </tbody>
            </table></div>
<hr>
            <div class="col-md-12">Work Experience :</div>
            <div class="col-md-12"><table class="table">
                <thead>
                  <tr>
                    
                    
                    <th>Company Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($enq_experiences))
                  @foreach($enq_experiences as $exp)
                      
                  
                  <tr>
                        <td>   {!! $exp->company_name !!}</td>
                    <td>  {!! $exp->start_date !!}</td>
                    <td>  {!! $exp->end_date !!}</td>
                  </tr>
                  @endforeach
                  @endif
               
                </tbody></table></div>

                <div class="col-md-12 py-3">TOEFL / IELTS / PTE SCORE 

                    <table class="table">
                      <tr>
                        <th>Language  </th>
                        <th>Writing  </th>
                        <th>Speaking  </th>
                        <th>Listening  </th>
                        <th>Reading </th>
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
                     {{-- <tr>
                          <th>Listening : </th> <td>
                              {!! $scores->listening !!}      
                          </td> </tr>
                        <tr>
                            <th>Reading :</th> <td>
                                {!! $scores->reading !!}      
                            </td> 
                        </tr>
                        <tr>
                            <th>Listening :</th> <td>
                                {!! $scores->listening !!}      
                            </td> 
                        </tr>
                        <tr>
                            <th>Writing : </th> <td>
                                {!! $scores->writing !!}      
                            </td> 
                        </tr> --}}
                     
                        @endif
                        </table> 

                </div>


                <div class="col-md-12 py-3">
                 <p> How student will show financials?</p>
                 @foreach($enq_financials as $f)
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <p>              
                {!! $f->financials_by !!}
             </p>
        </div>  
        <div class="col-md-3">  <p>              
            {!! $f->amount !!}
         </p>  </div>
        </div>  
        </div>         


@endforeach
                </div>
               
   <hr>

                  {{-- <div class="col-md-4 py-3">Give complete details (Bank loan, Personal Funds, Family Sponsorship, Third Party Sponsorship)
                    <p>  {!! $get->name !!} </p>
                  </div> --}}
                
               
               {{-- <div class="col-md-8 py-3 k0label"><label> --}}
                
                {{-- <input type="checkbox"> Overall</label>
               <label> <input type="checkbox"> Listening</label>
               <label><input type="checkbox"> Reading</label>
               <label><input type="checkbox"> Writing</label>
               <label><input type="checkbox"> Speaking</label> --}}
              {{-- </div> --}}

               {{-- <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Listening :</div>
               <div class="col-md-6 py-2 ">
                {!! $get->name !!}
                </div> --}}

               {{-- <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 "></div>
               <div class="col-md-6 py-2 ">
                {!! $get->name !!}
                </div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Writing :</div>
               <div class="col-md-6 py-2 ">
                {!! $get->name !!}
                </div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Speaking :</div>
               <div class="col-md-6 py-2 ">
                {!! $get->name !!}
                </div>
 --}}


               {{-- <div class="col-md-4"></div>
               <div class="col-md-8">(R-, W-, S- and L- scores to be mentioned separately) also Mention whether the student intends to take TOEFL/IELTS /PTE or not</div> --}}

               
               
               <!-- toggle -->
               <div class="col-md-12 py-3 change-color"> <h4>Country Travelled Before </h4> </div>
               
                  
                

               {{-- <div class="k0c">
                    <div class="container">
               <div class="row"> --}}
                 
                 {{-- @if(!empty($enq_imm_historys)) --}}
                 
                        {{-- <div class="col-md-3 py-3">Country</div>
                        <div class="col-md-3 py-3">
                            
                        </div>
                        <div class="col-md-3 py-3">From </div>
                        <div class="col-md-3 py-3">
                          
                        </div>
      
      
                        <div class="col-md-3  py-3"> To </div>
                        <div class="col-md-3  py-3">
                          
                        </div>
                        <div class="col-md-3  py-3">Duration</div>
                        <div class="col-md-3  py-3">
                          
                        </div> --}}
                     


<table class="table">
  <thead>
    <tr>
      <th>Country</th>
      <th>From</th>
      <th>To</th>
      <th>Duration</th>
    </tr>
  </thead>
  <tbody>
      @foreach($enq_travelled_historys as $history)
    <tr>
      <td> {!! $history->travelled_before_country !!} </td>
      <td>   {!! $history->travelled_before_from !!} </td>
      <td>  {!! $history->travelled_before_to !!} </td>
      <td>   {!! $history->travelled_before_duration !!} </td>
    </tr>
    @endforeach
  </tbody>
</table>


                  

                        <div class="col-md-12  my-2" >
                          <hr>
                           <h4> Any Visa Rejected Before </h4>
                      </div>
                      <div class="col-md-12 " >
<ul>
  @foreach($enq_visa_rejected_countrys as $visa)
  <li>
      {!! $visa->country !!}
  </li>
@endforeach
</ul>
                </div>

<hr>
                <div class="col-md-12  my-2" >
                    <h4>Signature</h4>
                </div>
                <div class="col-md-3 " >
              
                  @foreach($enquiries as $enq)
                    <img src="{!!url('public/uploads/signature/'.$enq->signature) !!}" alt="Signature" style="width:100%">
                  @endforeach
                </div>


              </div>
            </div>
               </div>
               

               
           
        </div>
     
     </div>




<br><br><br>

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
 <img src="{!!url('public/uploads/image/'.$get->image) !!}" alt="" style="width: 125px;
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
                          <a class="nav-link  active"  href="#emp_detail_overview" role="tab" data-toggle="tab">Overview </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="#education" role="tab" data-toggle="tab">Education </a>
                          </li>

                          <li class="nav-item">
                              <a class="nav-link " href="#work_experience" role="tab" data-toggle="tab">Work Experience </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="#english_language_test" role="tab" data-toggle="tab">TOEFL / IELTS / PTE SCORE </a>
                                  </li>

                                  <li class="nav-item">
                                      <a class="nav-link " href="#course_enrolment_detail" role="tab" data-toggle="tab">Course Enrollment Details </a>
                                      </li>

                                      <li class="nav-item">
                                          <a class="nav-link " href="#how_financial" role="tab" data-toggle="tab">How student will show financials? </a>
                                          </li>
                                      

                     
                      <li class="nav-item">
                              <a class="nav-link " href="#country_before_travell" role="tab" data-toggle="tab"> 
                                  Country Travelled Before</a>
                              </li>

             

              <li class="nav-item">
                  <a class="nav-link " href="#id_proof_detail" role="tab" data-toggle="tab">Id Proof Details </a>
                  </li>
          
             
          </ul>
          </div>
          <div class="col-md-9">
              <div class="tab-content content-style active  my-4" id="">
                  <div role="tabpane" class="tab-pane  active" id="emp_detail_overview">
                    <h4>Overview</h4>           
                    <hr>
     <table class="table my-table">
        @foreach($enquiries as $get)
       <tr style="background:#f8f9fc !important">
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
                <td> <?php echo $get->address_line1, $get->address_line2, $get->city, $get->state, $get->country ?> </td>
              </tr>
        @endforeach
     </table>
      
    </div>

{{-- second tab --}}
<div role="tabpane" class="tab-pane  " id="education">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
<h4>Education</h4>
<hr>
<table class="table">
  <tr>
    <th>
        
Qualification</th>
        <th>
            Year of Passing</th>
            <th>               	Percentage</th>
            <th>               		Name of Education</th>
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
<div role="tabpane" class="tab-pane  " id="work_experience">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
<h4>Work Experience</h4>
<hr>
<table class="table">
  <tr>
    <th>
        Company Name</th>
        <th>               	Designation</th>
        <th>
            Start Date</th>
            <th>            End Date</th>
            
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
<div role="tabpane" class="tab-pane  " id="english_language_test">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
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
            <th>         Listening</th>
            <th>               	Reading</th>
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
<div role="tabpane" class="tab-pane  " id="course_enrolment_detail">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
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
            <td> {!! $e->course_session !!}   </td>
            <td>  {!! $e->course_country !!}  </td>
            <td> {!! $e->course !!}  </td>
            <td> {!! $e->course !!}  </td>
          </tr> 
  @endforeach
 </table>
</div>
</div>


{{-- six tab --}}
<div role="tabpane" class="tab-pane  " id="how_financial">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
<h4>
    How student will show financials</h4>
    <hr>
<table class="table">
    @foreach($enq_financials as $f)
    
    <tr style="background: #f8f9fc !important">  <th> {!! $f->financials_by !!} </th>
         <td>{!! $f->amount !!} </td>
        </tr>
       @endforeach   
 
 </table>
</div>
</div>


{{-- seven tab --}}
    <div role="tabpane" class="tab-pane  " id="marital_status">
    
        <div class=" "  data-toggle="modal" data-target="#" >
    <h4>  Marital Status</h4>
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
<div role="tabpane" class="tab-pane  " id="country_before_travell">
    
    <div class=" "  data-toggle="modal" data-target="#previous_company" >
<h4> Country Travelled Before</h4>
<table class="table">
  <tr>
    <td>
       
Country</td>
        <td>
            From</td>
            <td>
               To</td>
               <td>
                  Duration</td>
  </tr>
  @foreach($enq_travelled_historys as $history)
  <tr>
    <td> {!! $history->travelled_before_country !!} </td>
    <td>   {!! $history->travelled_before_from !!} </td>
    <td>  {!! $history->travelled_before_to !!} </td>
    <td>   {!! $history->travelled_before_duration !!} </td>
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




         {{-- ten tab                        --}}
                    
         <div role="tabpane" class="tab-pane  " id="id_proof_detail">
    
                                    <div class=""  data-toggle="modal" data-target="#previous_company" >
                                <h4>  Id Proof Details</h4>
                                <table class="table">
                                  <tr>
                                    <td>
                                      
Id Proof</td>
                                        <td>
                                          	Name (Name In ID Proof)</td>
                                            <td>
                                                ID Proof No</td>
                                  </tr>
                                  @foreach($enquiries as $e)
<tr> 
          <td> {!! $e->id_proof !!}   </td>
          <td>  {!! $e->id_proof_name !!}  </td>
          <td> {!! $e->id_proof_no !!}  </td>
        </tr> 
@endforeach
                                </table>
                            
                                    </div>
                                                            </div>



  </div>

  
    
{{-- comment section  --}}
{{-- <br>
<hr>
<div>
  <h4> Comments  </h4>
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
        //   echo $e->calling_date;
        // }
        // else{
        // echo$e->date;
        // }
          </td>     
        <td> {{$e->calling_date}} </td>     
        <td> {{$e->callbacklater_time}} </td>     
        <td> {{$e->status}} </td>     
        <td  style="max-width: 300px"> {{$e->comment}} </td>     

      </tr>
      @endforeach
    </table>

@endif --}}
{{-- end of comment --}}

        </div>
      </div>
    </div>

{{-- comment section  --}}
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
        <td  style="max-width: 300px"> {{$e->comment}} </td>     

      </tr>
      @endforeach
    </table>

@endif
</div>
{{-- end of comment --}}

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>   
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

// var unique_id                =$('.update_status').attr("data-id"); 
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
      <div class="modal-content" style="width:100% !important;min-height: 225px;">
      
        <!-- Modal Header -->
        <div class="modal-header" style=" 
        border: none;">
          
          <button type="button" class="close" data-dismiss="modal" style="
          font-size: 38px;
          color: #383838; padding:0px" >&times;</button>
          <h3 style="width:100%;text-align:center"> Upload Documents </h3>
          {{-- <button class="clear-all-eligibility-button" > Clear All </button> --}}
        </div>
        <hr style="margin: 0; padding:0">
        <!-- Modal body -->

        {{Form::open(array('url' => 'enrol-documents', 'files' =>'true' ) )}}
        <div class="modal-body" style=";width: 80%;margin: auto;">
<table class="table" id="join">
  <tbody >
  <tr  style="background: #fff;">
    <td style="border-top:none !important">
        <select name="qualification_name[]" id="qualification1" class="choose-qualification" onchange="hide_selected_value(this.value);">
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
       
         <label for="files" class="add-document-button" onclick="get_select_length();">Add Document</label>
         <input  class="tes" id="files" name="document_name[]" type="file" style="display:none" />
    </td>
     


<td style="background: white;
border: none;">

  <div class=" add-more-document" > <i class="fa fa-plus  add-more-document-plus" onclick="add_select_option();"></i>   <i class="fa fa-minus  add-more-document-minus "></i>  </div> 
</td>
</tr>


</tbody>
</table>


<output id="result" style="display: flex;
overflow: auto; border: 1px solid #efefef;
    border-radius: 7px;">  


{{-- <img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px"> --}}
  {{-- <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div> --}}


</div>
<div style="text-align: center">
{{Form::submit('Submit', array('class' => "btn btn-danger", 'style' => "background: #616e62 !important; margin-bottom:20px"))}} 
</div>
{{Form::close()}}
        
      </div>
    </div>
 </div>
{{-- end modal --}}

{{-- <tr> <td> <select name="qualification_name[]" id="" class="choose-qualification" onchange="hide_selected_value(this.value);"> <option selected disabled> selected </option> <option value="Certificate I"> Certificate I </option> <option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option> <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option> <option value="Advance Diploma"> Advance Diploma </option> <option value="10"> 10 </option> <option value="12"> 12 </option> <option value="Graduate"> Graduate </option> <option value="post Graduate"> Post Graduate </option> </select> <label for="files'+num+'"class="add-document-button">Add Document</label> <input class="tes" id="files'+num+'"name="document_name[]" type="file" style="display:none"/> </td></tr> --}}

<script>
    var add = (function () {
     counter = 1;
    return function () {return counter += 1;}
  })();
  
      $(document).ready(function(){
  
        $('.add-more-document-plus').click(function(){
         var num = add();
            $('#join').append(' <tr> <td> <select name="qualification_name[]" id="qualification'+num+'" class="choose-qualification" onchange="hide_selected_value(this.value);"> <option selected disabled> selected </option> <option value="Certificate I"> Certificate I </option> <option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option> <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option> <option value="Advance Diploma"> Advance Diploma </option> <option value="10"> 10 </option> <option value="12"> 12 </option> <option value="Graduate"> Graduate </option> <option value="post Graduate"> Post Graduate </option> </select> <label  onclick="get_select_length();"  for="files" class="add-document-button">Add Document</label> <input class="tes" id="files" name="document_name[]" type="file" style="display:none"/> </td></tr>');
        });
        
        $('.add-more-document-minus').click(function(){
            $('#join tr').children().last().remove();
            $('#result div').children().last().remove();
    });
      });

     

    </script>

<script>
 function hide_selected_value(){
   
  // var select1val = document.getElementById('qualification1').value;
  //      $("#qualification2").children("[value ='"+select1val+"']").remove();


  //  var join_id = document.getElementById('join').getElementsByTagName('select');
          arr = [];
    for(var i=1;  i<=counter; i++){
        arr.push($('#qualification'+i).val());
        
}
console.log(arr);
    for(let i=1;  i<=counter; i++){
       let add = parseInt(i)+parseInt(1);
      //  console.log(arr);
      $("#qualification"+add+1).children("[value ='"+arr[i]+"']").remove();
}
}



</script>




  <script>
  function hide_selected_vale(val){
    var join_id = document.getElementById('join').getElementsByTagName('select');
    console.log(join_id);
    for(var i in join_id)
    // alert(val.length);

          // var selectedCountry = $(this).children("option:selected").val();
  
          // $("#join select").children("[value ='"+val+"']").remove();  

          // var select1 = document.getElementById('qualification1').value;
          // var select2 = document.getElementById('qualification11').value;
          // var select3 = document.getElementById('qualification12').value;
          // var select4 = document.getElementById('qualification13').value;
          // var select5 = document.getElementById('qualification14').value;
          // var select6 = document.getElementById('qualification15').value;
        


      // $("#qualification11").children("[value ='"+val+"']").remove();

      // $("#qualification12").children("[value ='"+select2+"']").remove();
      // $("#qualification13").children("[value ='"+select3+"']").remove();
      // $("#qualification14").children("[value ='"+select4+"']").remove();
      // $("#qualification15").children("[value ='"+select5+"']").remove();




  }
  </script>

  <script>
//     $(document).ready(function(){
//       $('.thumbnail').on('click',function(){
// $('#result').addClass("zoom-image");
//       });
//     });

    
  </script>
  
  



<script>

function handleFileSelect() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        var preview = document.getElementById("preview");

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            // if (!file.type.match('image')) continue;

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                
                var div = document.createElement("div");
                var hol = document.createElement("div");
                div.innerHTML = "<img  class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
               
                
                output.insertBefore(div, null);
                
            });
            //Read the image
            picReader.readAsDataURL(file);
            
        }
        
    } else {
        console.log("Your browser does not support File API");
    }
}

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
  


</script>





@endsection


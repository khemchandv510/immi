
@extends('header')
@section('application-process')
<?php
use App\Helpers\Helper;
$enq_educations    = Helper::enqEducation(Session()->get('unique_id_sess'));

?>


 <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

  <style>
      .educ-images{
        border-radius: 60px;
        height: 40px;
    width: 40px;
      }
      .imagesNotes {
    background: #34495e;
    padding: 6px 22px;
    border-radius: 15px;
    color: #fff;
}
      .notesdata {
           background-color: #f3f8fc;
    padding: 20px;
    border: 2px solid #34495e;
    border-radius: 5px;
        }
        p.mt-2.candidatename {
            font-weight: bold;
            padding-top: 20px;
                color: #000;
        }
      .name{
          padding-left: 5px; 
          font-size: 21px; 
          color: #43739c; 
          font-weight: 500; 
          text-transform: capitalize;
      }
      p{
        color: #6f6d6d;
    font-weight: 500;
    margin-bottom: 4px;
      }
      .text-edu{
          color: #a0a0a0;
          font-weight: 500;
      }
      .classs{
        background-color: #90d6c4;
    font-size: 18px;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 10px;
    color: black;
      }
      .kau-bor{
        margin-top: 14px;
    border-bottom: 1px solid #cecccc;
      }
      .test-eng{
        background-color: #e4e1e1;
    color: #989696;
      }
      .box-boder{
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
    padding: 17px;
      }
      .edu-img img{
        width: 140px;
    height: 140px;
    object-fit: cover;
      }
  </style>
  
  
<?php 
$conditional_offer_letter_received  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','conditional_offer_letter_received')
->get(); 
$full_offer_received  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
               ->where('status',1)
               ->where('client_unique_id',session()->get('unique_id_sess'))
               ->where('application_sent','full_offer_received')
               ->get(); 

               $tution_fees_paid  = DB::table('enrolment_status_documents')
               ->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','tution_fees_paid')
->get();


$coe_received  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','coe_received')
->get(); 

$forex_exchange  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
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
->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_commenced')
->get(); 


$student_follow_up  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','student_follow_up')
->get();

$study_completed  = DB::table('enrolment_status_documents')
->select('client_unique_id','application_sent')
->where('status',1)
->where('client_unique_id',session()->get('unique_id_sess'))
->where('application_sent','study_completed')
->get();

?>   

  @include('enquiry.start-case');
  
  <!--model-->
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
       
        <div>
        <?php 
        $studentid =session()->get('unique_id_sess');
        $enquiries  = DB::table('enquiries')->where('unique_id' ,$studentid)->get();
        
            $get_doc = DB::table('enrolment_documents')
            ->where('status',1)
            ->where('client_unique_id',session()->get('unique_id_sess'))
            ->get();
            
            ?>
            <div class="modal-body">
              @foreach($enquiries as $get)
              
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
  <!--second model add_enrolment_status_documents-->
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
                var url = "{{url(Request::segment(1).'/'.'application-sent')}}?a="+status+"&u_id="+u_id;
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
<!--second model close -->
<?php
$getDetail = DB::table('sort_list_courses')
             ->select('*','enquiries.image as profile_image','enquiries.id as student_id','enquiries.name as candidate_name','my_institutes.image as university_logo', 'my_institutes.name as college_name','sort_list_courses.unique_id as application_id' )
             ->join('enquiries','sort_list_courses.student_unique_id','enquiries.unique_id')
             ->join('courses','sort_list_courses.course_unique_id','courses.unique_id')
             ->join('enq_educations','enquiries.unique_id','enq_educations.enquiry_id')   
             ->join('my_institutes','courses.college_code','my_institutes.code')
             ->join('enq_exam_scores','enquiries.unique_id','enq_exam_scores.enquiry_id')
             ->where('sort_list_courses.course_unique_id',$course_id)
             ->get();
          ?>
@if(!empty($getDetail[0]->application_id))
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="box-boder">
                <div class="row">
                    <div class="col-md-3 edu-img">
                        <div>
                        <img src="{{url('public/uploads/image/'.$getDetail[0]->profile_image)}}" alt="">
                            {{-- <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"  alt=""> --}}
                    </div>
                </div>
                    <div class="col-md-3 edu-img">
                            <div>
                                <img src="{{url('public/uploads/image/'.$getDetail[0]->university_logo)}}" alt="logo">
                            </div>
                    </div>
                    <div class="col-md-6">
                            <p><img src="https://cdn.webshopapp.com/shops/94414/files/53448720/australia-flag-image-free-download.jpg" class="educ-images"  alt=""><span class="name"> {{$getDetail[0]->college_name}} </span></p>
                            <p> {{$getDetail[0]->course_name}} - <span class="text-edu"> Office Addministration - {{$getDetail[0]->city}} </span></p>
                            <p>Delivery Method : <span class="classs"> In-class</span></p>
                            <p> Level : <span class="text-edu"> {{$getDetail[0]->level}} </span></p>
                            <p> Required Level : <span class="text-edu"> {{$getDetail[0]->min_education_eligibility}}</span></p>
                            <p> Application ID: <span class="text-edu"> {{$getDetail[0]->application_id}}</span></p>
                    </div>
                </div>

                <div class="row kau-bor">
                            <div class="col-md-3">
                                <p>Intake(s):</p>
                            </div>
                            <div class="col-md-3">
                                <p>ESL</p>
                                <p style="color: #a0a0b4;">N/A</p>
                            </div>
                            <div class="col-md-6">
                                <p>Academic</p>
                                <p>{{$getDetail[0]->course_session}}-{{$getDetail[0]->course_intake}} </p>
                            </div>
                            </div>

                            <div class="row kau-bor">
                                    <div class="col-md-3">
                                            <p>Status:</p>
                                            
                                        </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                            <select class="form-control" id="StudentProfileNotes">
                                              <option>Select</option>
                                              <option>In Review</option>
                                              <option>In Process</option>
                                              <option>Submitted</option>
                                              <option>Accepted</option>
                                              <option>Rejected</option>
                                            </select>
                                        </div> 
                                     
                                    </div>
                                    <div class="col-md-4">
                                        <p>Submitted to School</p>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        
                                        
                                    </div>
                                    <div class="col-md-3 pt-3">
                                            <p>Ready to Visa</p>
                                            
                                        </div>
                                    </div>

                                    <div class="row kau-bor">
                                            <div class="col-md-3">
                                                <p>Student:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p> IC{{$getDetail[0]->student_id}}  <span>|</span> <span style=" color: #428bcc; text-transform: capitalize;">{{$getDetail[0]->candidate_name}}</span></p>
                                                
                                            </div>
                                            
                                            </div>
                                            <div class="row kau-bor">
                                                    <div class="col-md-3">
                                                        <p>Background:</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>Nationality</p>
                                                        <p style="color: #a0a0b4;">{{$getDetail[0]->nationility}}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Residence</p>
                                                        <p style="color: #a0a0b4;">{{$getDetail[0]->current_country_of_residence}}</p>
                                                    </div>
                                                    </div>

                                                    <div class="row kau-bor">
                                                            <div class="col-md-3">
                                                                <p>Education:</p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <p>{{$getDetail[0]->class}} <span style="color:green; Padding-left:3px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span></p>
                                                                
                                                            </div>
                                                            
                                                            </div>

                                                            <div class="row kau-bor">
                                                                    <div class="col-md-3">
                                                                        <p>English Test:</p>
                                                                    </div>
                                                                    @foreach($getDetail as $test)
                                                                    
                                                                    <div class="col-md-9">
                                                                        <p>{{$test->language}} L <span class="test-eng">8.0</span> R <sppan class="test-eng">6.5</sppan> W <span class="test-eng">3.5</span> S <span class="test-eng">2.4</span></p>
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                            
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <p style="color: #a0a0b4;">Exam Date: 2019-Sep-2</p>
                                                                            
                                                                        </div>
                                                                        @endforeach
                                                                    
                                                                    </div>

                                                                    <div class="row kau-bor">
                                                                            <div class="col-md-3">
                                                                                <p>Advisor:</p>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p>chhintughosh.net@gmail.com</p>
                                                                                
                                                                            </div>
                                                                            
                                                                            </div>
                                                                            <div class="row kau-bor">
                                                                                    <div class="col-md-3">
                                                                                        <p>Payment:</p>
                                                                                    </div>
                                                                                    <div class="col-md-9 text-center">
                                                                                        <p><span style=" color: #428bcc;">Receipt</span> | <span>December 06, 2019</span></p>
                                                                                        <p>Application Fee <span style="color: #a0a0b4;"><strike>$ 1000.00 CAD</strike></span> $ 80.00 CAD</p>
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    </div>

                                                                                    <div class="row kau-bor">
                                                                                            <div class="col-md-3">
                                                                                                <p>Acceptance Letter:</p>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <p><a href="#">i_form.pdf</a></p>
                                                                                                <p>last Updated:<span style="color: #a0a0b4;"> March 09, 2010</span></p>
                                                                                                
                                                                                            </div>
                                                                                            
                                                                                            </div>
                                                                                        </div>
            

                                </div>

                                <div class="col-md-7">
                                    
                                    
                                    <div role="tabpane" class="tab-pane " id="upload_document">
                                        <div class="" data-toggle="modal" data-target="#previous_company" >
                                        <!--<h4> Document</h4>-->
                                        <hr>
                                    
                                    <div>
                                        <?php 
                                         $enq_experiences  = DB::table('enq_experiences')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();
                                        ?>
                                        
                                        
                                    </div>
                                    
                                    
                                        </div>
                                    </div>
                                    
                        <?php
                        // echo $appid = $course_id;
                        
                        ?>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#Notessection"> Add Notes</button>
                  <div id="Notessection" class="collapse">
                   <form action="{{url('/admin/notificationnotes')}}" method="post" enctype="multipart/form-data">
                          @csrf
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <input class="form-control form-control" type="text" name="heading" placeholder="Enter the heading">
                
                    </div>
                  </div>
                  <div class="form-group row mt-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <textarea id="chatnotes" name="chatnotes" rows="8" cols="50">
                      </textarea>
                    </div>
                  </div>
                  <input type="hidden" name="courseid" value="{{$course_id}}">
                  <input type="hidden" name="studentid" value="{{session()->get('unique_id_sess')}}">
                  <input type="hidden" name="userid" value="{{Auth::user()->unique_id}}"> 
                  <input type="hidden" name="applicationid" value="{{$appid}}">
                  <div class="form-group row mt-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <input type="file" name="filename[]" multiple="multiple">
                    </div>
                  </div>
                  
                  <div class="form-group row mt-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <input type="submit" name="submitchat" value="submit">
                
                    </div>
                  </div>
                </form> 
                  </div>

                    
                    
                  @foreach($notes as $notes2)
                  <div class="row">
                      <div class="col-sm-2"></div>
                 
                    <div class="mt-5 col-sm-10">
                        <div class="notesdata">
                            <span style="float:right">{{$notes2->created_at}}</span>
                           <h5 style="color: #34495e;    font-family: fangsong;    font-weight: bold;">{{$notes2->heading}}</h5>
                           
                           <div class="mt-3"> 
                               {!! $notes2->Description !!}
                            
                           </div>
                           
                            @if($notes2->files !=null)
                            <div class="mt-3">
                            @php
                            $images = json_decode($notes2->files);
                            @endphp
                         @foreach($images as $images2)
                            <a class="imagesNotes" href="#" data-toggle="modal" data-target="#Notesmodelstudent">{{$images2}}</a>
                         @endforeach
                            </div>
                          @endif 
                            <p class="mt-2 candidatename">{{$getDetail[0]->candidate_name}}</p>
                        </div>
                    </div>  
             </div>
            @endforeach                  
        
<!-- Modal -->
<div class="modal fade" id="Notesmodelstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow: scroll;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img id="Notesmodelstudentimages" src="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                
            
                          <script>
                        CKEDITOR.replace( 'chatnotes' );
                </script>                  
                 
                  <!-- jQuery -->
                                            {{-- <script src="jquery-3.1.1.min.js" type='text/javascript'></script>
                                    
                                            <!-- Bootstrap -->
                                            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
                                            <script src='bootstrap/js/bootstrap.min.js' type='text/javascript'></script>
                                             --}}
                                          
                                    
                                          
                                    
                                            <!-- Script -->
                                            <script type='text/javascript'>
                                            $(document).ready(function(){
                                                $('.remove-documents').click(function(){
                                    
                                                    // var fd = new FormData();
                                                    // var files = $('#file')[0].files[0];
                                                    // fd.append('file',files);
                                    
                                                    var id = $(this).attr('data-id');
                                                    $.ajaxSetup({
                                                                    headers: {
                                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                }
                                                                 });
                                                                 if (confirm('Are you sure you want to Delete this?')) {
                                        $.ajax({
                                        type: "get",
                                        url: "{{url('remove-uploaded-document')}}?id="+id,
                                        success: function(data){
                                        location.reload();
                                                    }
                                        });
                                    }
                                                });
                                    
                                                $(document).ready(function(){
                                                    $('.update-documents').click(function(){
                                                        var id = $(this).attr('data-id');
                                                    $.ajaxSetup({
                                                                    headers: {
                                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                }
                                                                 });
                                                                 if (confirm('Are you sure you want to Update this?')){
                                                                    $.ajax({
                                        type: "get",
                                        url: "{{url('update-uploaded-document')}}?id="+id,
                                        success: function(data){
                                        location.reload();
                                                    }
                                        });
                                                                 }
                                                    })
                                                })
                                    
                                    
                                    
                                    
                                    
                                                $('.approve-documents').click(function(){
                                    var id = $(this).attr('data-id');
                                    $.ajaxSetup({
                                                    headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                                 });
                                                 if (confirm('Are you sure you want to Approve this?')) {
                                    $.ajax({
                                    type: "get",
                                    url: "{{url('approve-uploaded-document')}}?id="+id,
                                    success: function(data){
                                    location.reload();
                                    }
                                    });
                                    }
                                    });
                                    
                                            });
                                            
                                            
                            // model override by js
                            $('.imagesNotes').click (function(){
                                var filename = $(this).text();
                                var path = 'https://immigration.craftzvilla.com/imm/public/uploads/document/'+ filename;
                                // alert(path);
                                
                                // $(this).attr('src', 'http://example.com/johnson.gif');

                                $('#Notesmodelstudentimages').attr('src', path);
                                
                            });
                                            </script>
                                       








                                                                </div>                   

                                </div>

    </div>
@endif

@endsection
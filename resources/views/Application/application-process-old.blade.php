
@extends('header')
@section('application-process')
<?php
use App\Helpers\Helper;
$enq_educations    = Helper::enqEducation(Session()->get('unique_id_sess'));

?>




  <style>
      .educ-images{
        border-radius: 60px;
        height: 40px;
    width: 40px;
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
                                        <p>Ready to Submit </p>
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
                                        <h4> Document</h4>
                                        <hr>
                                    
                                    <div>
                                        <?php 
                                         $enq_experiences  = DB::table('enq_experiences')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();
                                        ?>
                                        @include('enquiry/upload_docuemnt_section')
                                        <ul>
                                    
                                            
                                            @foreach($enq_educations as $edu)
                                            <?php 
                                            $class = $edu->class;
                                            
                                            $getUploadDocument = Helper::upload_documents(Session()->get('unique_id_sess'), $class ); ?>
                                            {{-- @dd($getUploadDocument ) --}}
                                            <li class="document-upload-parent">
                                                <div class="rotate-text-parent"> <p class="rotate-text"> </p> </div>
                                                <div class="document-upload-content">
                                                    {{-- <button class="upload-document-button fa fa-upload" > </button> --}}
                                                    {{-- <label for="upload_documents" class="upload-document-button fa fa-upload"></label>
                                                    <input type="file" name="upload_documents" id="upload_documents" style="display:none"> --}}
                                    
                                    
                                                <button type="button" class="upload-document-button fa fa-upload" data-toggle="modal" data-target=".uploadModal{{$edu->id}}"></button>
                                    
                                                    <!-- Modal -->
                                                    <div id="uploadModal" class="modal fade uploadModal{{$edu->id}}" role="dialog">
                                                      <div class="modal-dialog">
                                            
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">File upload form</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form -->
                                                                {{-- <form method='post' action='' enctype="multipart/form-data"> --}}
                                    {{Form::open(array('url' => 'upload-documents' , 'files' => true, 'method' => 'post'))}}
                                    
                                                                    Select file : <input type='file' name='file[]' id='file' class='form-control' multiple><br>
                                                                <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
                                                                <input type="hidden" name="qualification[]" value="{{$edu->class}}">
                                                                    <input type='submit' class='btn btn-info' value='Upload' id='btn_upload'>
                                                                {{Form::close()}}
                                            
                                                                <!-- Preview-->
                                                                <div id='preview'></div>
                                                            </div>
                                                            
                                                        </div>
                                            
                                                      </div>
                                                    </div>
                                    
                                    
                                                <div>
                                                <div>
                                                    
                                                    <p class="upload-doc-name"> <span> {{$edu->class}} </span> <span > On </span>  <span>    {{$edu->stream}}  {{isset($edu->stream)?$edu->stream:'Add Stream Name' }} </span> </p>
                                    
                                                    @if(!empty($edu->institute_name))
                                                    <p class="upload-course-institute"> {{$edu->institute_name}} </p>
                                                    @else
                                                    <p class="upload-course-institute"> Institute Name </p>
                                                    @endif
                                                </div>
                                                <div>
                                    
                                                </div>
                                            </div>
                                            
                                            <div class="upload-doc-pdf"> 
                                                
                                                
                                                @if(isset($getUploadDocument[0]->document_name)) 
                                               @foreach($getUploadDocument as $a)
                                    
                                               <div  class="modal fade {{'class'.$a->id}}" role="dialog">
                                                <div class="modal-dialog">
                                      
                                                  <!-- Modal content-->
                                                  <div class="modal-content" style="width:600px !important">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">{{$edu->class}}</h4>
                                                      </div>
                                                    <div class="modal-body"> <img src="{{url('public\uploads\documents/'.$a->document_name)}}" alt="" style="width:100%"> </div>
                                                    <div style="margin: 11px;
                                                    padding: 3px;"> <button class="btn btn-danger remove-documents" data-id="{{$a->id}}"> Disapprove </button> 
                                                   <button class="btn btn-danger approve-documents" data-id="{{$a->id}}"> Approve</button> 
                                                  {{-- <input type="file" class=" update-documents" data-id="{{$a->id}}" value="Update" >    --}}
                                                </div>
                                                  </div>
                                                </div>
                                               </div>
                                               
                                                <a style="cursor:pointer"  class="{{'class'.$a->id}}" data-toggle="modal" data-target="{{'.class'.$a->id}}">  
                                                @if(($a->check_status ==1) && ($a->approve_or_not ==0))  
                                                  <span style="background:red" class="f a-close">{{$a->document_name}}  </span>
                                                  @elseif(($a->check_status ==1) && ($a->approve_or_not == 1))
                                    <span style="background:green" class="f a-check">{{$a->document_name}}  </span>
                                    @else
                                    <span style="background:grey">{{$a->document_name}}</span>
                                                  @endif
                                                </a>
                                                @endforeach
                                                
                                                @else
                                               No Document Avialable
                                                @endif         
                                                
                                            </div>
                                                </div>
                                            </li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                    
                                    
                                        </div>
                                    </div>
                                    
                                    
                                    
                                            
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
                                            </script>
                                       








                                                                </div>                   

                                </div>

    </div>
@endif

@endsection
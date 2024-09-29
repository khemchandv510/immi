
<?php
use App\Helpers\Helper;
$enq_educations    = Helper::enqEducation(Session()->get('unique_id_sess'));

?>


<div role="tabpane" class="tab-pane " id="upload_document">
    <div class="" data-toggle="modal" data-target="#previous_company" >
    <h4> Document</h4>
    <hr>

<div>
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
                <div class="modal-body">
                    
                    {{-- <img src="" alt="" style="width:100%">  --}}
                <iframe src="{{url('public\uploads\documents/'.$a->document_name)}}" frameborder="0" target="_self"></iframe>
                </div>
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
   
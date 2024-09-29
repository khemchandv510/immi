@extends('header')
@section('employee-detail')


<?php 

$get_emp_detail = DB::table('users')->where('status', 1)->where('employee_id', $id)->get();


// $users = DB::table('users')
//             ->join('employee_experiences', 'users.unique_id', 'employee_experiences.employee_unique_id')
//             ->join('employee_documents' , 'users.unique_id', 'employee_documents.employee_id')
//             ->get()
//             dd($users);

?>
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="container" id="employee_detail_parent">
    <div class="row" style="">
        <div class="col-sm-3">
            <div class="emp-detail-img-section">
                <div class="employee_image change_profile_image">
                    @if(!empty($get_emp_detail[0]->image))
            <img src="{{url('public/uploads/image/agent/'.$get_emp_detail[0]->image)}}" alt="Profile Image" title="Prile Image">
            @else
            <div  class="change_profile_image" style="background: white;
            width: 35%;
            border-radius: 50%;
            text-align: center;
            margin: auto;
            padding: 16px;
            position:relative;
            ">
            <img src="{{url('public/uploads/image/agent/'.$get_emp_detail[0]->image)}}" alt="Profile Image" title="image not found">

            <label for="" id="profile_image_label_form_open" style="display:none">Add Image</label>
            
            
            {{Form::open(array('url'=>'employee_profile_pic_update', 'files' => true ,'style'=>"display:none", 'id' =>'show_profile_form'))}}
            <label for="profile_image" id="" >Add Image</label>
            <input type="file" name="profile_image" style="display:none;" id="profile_image">
            {{Form::submit('Add')}}
            {{Form::close()}}
            <script>
            
$(document).ready(function(){
    $('.change_profile_image').mouseover(function(){
        $('#profile_image_label_form_open').show();
        // $('#profile_image_label_form_open').css("trasection","1");
    });
    $('.change_profile_image').mouseout(function(){
        $('#profile_image_label_form_open').hide();
    });
    $('#profile_image_label_form_open').click(function(){
        $('#show_profile_form').show();
    })

});
            </script>
            </div>
            @endif
        </div>
        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
        <div class="edit-by-admin-hr-class">
            <div>
        <p> <a href="JavaScript:Void(0);" class="open-edit-class" > {{$get_emp_detail[0]->name}} </a> </p>
        {{Form::open(array('url'=>'edit_emp_name', 'class' => 'edit_emp_name', 'id' => 'edit_name'))}}
        <span class="fa fa-times  close-edit-class">  </span>
                {{Form::text('name',$get_emp_detail[0]->name, array('class'=>'form-control', 'id'=> 'name'))}}
                {{Form::hidden('unique_id',$get_emp_detail[0]->unique_id, array('class'=>'form-control', 'id'=> 'unique_id'))}}
                {{Form::submit('save', array('class' => 'btn btn-danger btn-danger-edit'))}}
            {{Form::close()}}
        </div>
        <div>
            <p> <a href="JavaScript:Void(0);" onclick="edit_emp_designation();">
                @if(!empty($get_emp_detail[0]->designation))
                {{$get_emp_detail[0]->designation}}
            @else
            Add Designation
            @endif
            </a> </p>
            {{Form::open(array('url'=>'edit_designation', 'id' => 'edit_designation'))}}
            <span class="fa fa-times" onclick="edit_emp_designation_button();" ></span>
                    {{Form::text('designation',$get_emp_detail[0]->designation, array('class'=>'form-control', 'id' =>'designation'))}}
                    {{Form::hidden('unique_id',$get_emp_detail[0]->unique_id, array('class'=>'form-control'))}}
                    {{Form::submit('save', array('class' => 'btn btn-danger btn-danger-edit'))}}
                {{Form::close()}}
            </div>
        </div>
            <script>
            $(document).ready(function(){
                $("#edit_name").submit(function (e) {
                    e.preventDefault();
                            var name = $('#name').val();
                            var unique_id = $('#unique_id').val();
                            var url = "{{url('edit_emp_name')}}?unique_id="+unique_id+"&name="+name;
                 $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             if(name == ''){
                                 alert('Feild cannot be left blank');
                             }
                             else{
                             $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData(this),
        processData: false, 
        contentType: false, 
        success: function (data) {
location.reload();
        }
                             });
                            }
});
            });
            </script>
<script>
        $(document).ready(function(){
            $("#edit_designation").submit(function (e) {
                e.preventDefault();
                        var designation = $('#designation').val();
                        var unique_id = $('#unique_id').val();
                                   var url = "{{url('edit_emp_designation')}}?unique_id="+unique_id+"&designation="+designation;
             $.ajaxSetup({
                            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });
                         if(designation == ''){
                                 alert('Feild cannot be left blank');
                             }
                             else{
                         $.ajax({
                             
  type: "POST",
    url: url,
    dataType: "text",
    data: new FormData(this),
    processData: false, 
    contentType: false, 
    success: function (data) {
location.reload();
    }
                         });
                        }
});
        });
        </script>






            @else
            <p>{{$get_emp_detail[0]->name}}</p>
            <p>{{$get_emp_detail[0]->designation}}</p>
            @endif
            
            <hr>
            <ul class="nav nav-tabs" role="tablist" id="emp_detail_tab">
                    <li class="nav-item">
                            <a class="nav-link  active"  href="#emp_detail_overview" role="tab" data-toggle="tab">Overview </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link " href="#emp_detail_previous_company" role="tab" data-toggle="tab"> Previous Company </a>
                                </li>
                        <li class="nav-item">
                                <a class="nav-link " href="#emp_detail_bank" role="tab" data-toggle="tab"> Bank Detail</a>
                                </li>

                <li class="nav-item">
                <a class="nav-link " href="#emp_detail_document" role="tab" data-toggle="tab"> Document </a>
                </li>
            
               
            </ul>
        </div>

        </div>



        
        <div class="col-sm-8">
                <div class="tab-content content-style active  my-4" id="">
                        <div role="tabpane" class="tab-pane  active" id="emp_detail_overview">
                                @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
        <p class="edit-emp-other-detail"  data-toggle="modal" data-target="#emp_other_detail_edit" >Edit</p>
                                @endif
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> Email: </label>
                <div class="form-control col-sm-9">
                      <p>  {{$get_emp_detail[0]->email}} </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> Contact: </label>
                <div class="form-control col-sm-9">
                      <p>{{$get_emp_detail[0]->number}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> DOB: </label>
                <div class="form-control col-sm-9">
                     <p>{{$get_emp_detail[0]->DOB}}</p> 
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> Address: </label>
                <div class="form-control col-sm-9">
                      <p>{{$get_emp_detail[0]->street}}  </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> Salary: </label>
                <div class="form-control col-sm-9">
                    <p>{{$get_emp_detail[0]->salary}}  </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> joinint_date: </label>
                <div class="form-control col-sm-9">
                    <p>{{$get_emp_detail[0]->joinint_date}}  </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3"> Domain: </label>
                <div class="form-control col-sm-9">
                    <p>{{$get_emp_detail[0]->domain}}  </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-sm-3">   total_experience: </label>
                <div class="form-control col-sm-9">
                    <p>{{$get_emp_detail[0]->total_experience}}  </p>  
                </div>
            </div>
          
            {{-- @if(Session::has('message'))
            <p >{{ Session::get('message') }}</p>
            @endif --}}
{{-- <p id="succcess_message" style="display:none"> Successfully Update</p> --}}
<!-- start comment modal-->
<div id="emp_other_detail_edit" class="modal">
        <div class="modal-content">
                            <span class="close">&times;</span>
                  {{-- <h5>Edit Detail</h5> --}}
                  {{Form::open(array('url'=>"", 'id' => 'emp_other_detail_edit_form'))}}
                 <div class="comment-section">
                     <div class="row">
                        <label for="" class="control-label col-sm-3">   Email: </label>
                        <div class=" col-sm-8">
              {!! Form::text('email', $get_emp_detail[0]->email , array('class' => 'form-control') ) !!}
                        </div>
                    </div>


                    <div class="row">
                            <label for="" class="control-label col-sm-3">   Contact: </label>
                            <div class=" col-sm-8">
                  {!! Form::text('contact', $get_emp_detail[0]->number , array('class' => 'form-control', 'onKeyPress' => 'if(this.value.length == 10) return false;') ) !!}
                            </div>
                        </div>


                        <div class="row">
                                <label for="" class="control-label col-sm-3">   DOB: </label>
                                <div class=" col-sm-8">
                      {!! Form::date('dob', $get_emp_detail[0]->DOB , array('class' => 'form-control') ) !!}
                                </div>
                            </div>

                            <div class="row">
                                    <label for="" class="control-label col-sm-3">  Address: </label>
                                    <div class=" col-sm-8">
                          <textarea name="address" id=""  rows="3" class="form-control"></textarea>
                                    </div>
                                </div>


                                <div class="row">
                                        <label for="" class="control-label col-sm-3">  Salary: </label>
                                        <div class=" col-sm-8">
                                                {!! Form::number('salary', $get_emp_detail[0]->salary , array('class' => 'form-control') ) !!}
                                        </div>
                                    </div>
    

                                    
                                <div class="row">
                                        <label for="" class="control-label col-sm-3"> Joining Date: </label>
                                        <div class=" col-sm-8">
                                                {!! Form::date('joinint_date', $get_emp_detail[0]->joinint_date , array('class' => 'form-control') ) !!}
                                        </div>
                                    </div>
    
                                    <div class="row">
                                            <label for="" class="control-label col-sm-3"> Domain: </label>
                                            <div class=" col-sm-8">
                                                    {!! Form::text('domain', $get_emp_detail[0]->domain , array('class' => 'form-control') ) !!}
                                            </div>
                                        </div>


                                        <div class="row">
                                                <label for="" class="control-label col-sm-3"> Total Experience: </label>
                                                <div class=" col-sm-8">
                                                        {!! Form::text('experience', $get_emp_detail[0]->total_experience , array('class' => 'form-control') ) !!}
                                                </div>
                                            </div>


                  </div>
        
              {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3', 'id' =>'save_comment_button'))}}
              <p id="old_coment"> </p>
              {{Form::close()}}
             
                </div>
              </div>
              <!-- end of comment Modal -->









            
                    </div>


                    
                     <div role="tabpane" class="tab-pane  " id="emp_detail_previous_company">
                        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
                        <p class="edit-emp-other-detail"  data-toggle="modal" data-target="#previous_company" >Edit </p>
                                                @endif
                            <?php
                            
                            $his = DB::table('employee_experiences')->where('employee_unique_id', $get_emp_detail[0]->unique_id)->get(); 
                            if(!empty($his)){
                            foreach($his as $h){
                            ?>

                            <div class="form-group row">
                                    <label for="" class="control-label col-sm-3">   Previous Company: </label>
                                    <div class="form-control col-sm-9">
                                        <p>
                                            
                                            {{$h->last_company}}  </p>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="" class="control-label col-sm-3">   Salary: </label>
                                        <div class="form-control col-sm-9">
                                            <p>
                                                
                                                {{$h->last_salary}}  </p>  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="" class="control-label col-sm-3">  From: </label>
                                            <div class="form-control col-sm-9">
                                                <p>
                                                    
                                                    {{$h->from_date}}  </p>  
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                                <label for="" class="control-label col-sm-3">  To: </label>
                                                <div class="form-control col-sm-9">
                                                    <p>
                                                        
                                                        {{$h->to_date}}  </p>  
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="" class="control-label col-sm-3">  Experience: </label>
                                                    <div class="form-control col-sm-9">
                                                        <p>
                                                            
                                                            {{$h->experience}}  </p>  
                                                    </div>
                                                </div>
<hr>
                                            <?php  } } ?>
                            </div>





{{-- open edit previous company detail --}}
<div id="previous_company" class="modal">

      <div class="modal-content">
                          <span class="close">&times;</span>
                <h5 class="modal-heading">Edit Previous Company Detail</h5>
                {{Form::open(array('url'=>"", 'id' => 'previous_company_edit_form'))}}
                @if(!empty($his))
                @foreach($his as $h)
                {{Form::hidden('id',$h->employee_unique_id)}}
               <div class="comment-section">
                   <div class="row">
                      <label for="" class="control-label col-sm-3">   Previous Company: </label>
                      <div class=" col-sm-8">
            {!! Form::text('last_company[]', $h->last_company , array('class' => 'form-control') ) !!}
                      </div>
                  </div>
                

                  <div class="row">
                          <label for="" class="control-label col-sm-3">   Salary </label>
                          <div class=" col-sm-8">
                {!! Form::number('salary[]', $h->last_salary , array('class' => 'form-control', 'onKeyPress' => 'if(this.value.length == 10) return false;') ) !!}
                          </div>
                      </div>


                      <div class="row">
                              <label for="" class="control-label col-sm-3">  Work From: </label>
                              <div class=" col-sm-8">
                    {!! Form::date('from_date[]', $h->from_date , array('class' => 'form-control') ) !!}
                              </div>
                          </div>

                          <div class="row">
                                  <label for="" class="control-label col-sm-3">  To: </label>
                                  <div class=" col-sm-8">
                                        {!! Form::date('to_date[]', $h->to_date , array('class' => 'form-control') ) !!}
                                  </div>
                              </div>


                              <div class="row">
                                      <label for="" class="control-label col-sm-3">  Experience: </label>
                                      <div class=" col-sm-8">
                                              {!! Form::text('experience[]', $h->experience , array('class' => 'form-control') ) !!}
                                      </div>
                                  </div>
  <hr>

                </div>
      @endforeach
      @endif
            {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3', 'id' =>'save_comment_button'))}}
            <p id="old_coment"> </p>
            {{Form::close()}}
           
              </div>
            </div>
            <!-- end of Modal -->










                            <div role="tabpane" class="tab-pane  " id="emp_detail_bank">
                                
            @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
            <p class="edit-emp-other-detail"  data-toggle="modal" data-target="#bank_detail" >Edit </p>
                                    @endif
                                    <div class="form-group row">
                                            <label for="" class="control-label col-sm-3">   Bank Name: </label>
                                            <div class="form-control col-sm-9">
                                                <p>{{$get_emp_detail[0]->bank_name}}  </p>  
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="" class="control-label col-sm-3">   IFSC Code: </label>
                                                <div class="form-control col-sm-9">
                                                    <p>{{$get_emp_detail[0]->ifsc_code}}  </p>  
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="" class="control-label col-sm-3">  Bank Branch: </label>
                                                    <div class="form-control col-sm-9">
                                                        <p>{{$get_emp_detail[0]->bank_branch}}  </p>  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label for="" class="control-label col-sm-3">  Account Number </label>
                                                        <div class="form-control col-sm-9">
                                                            <p>{{$get_emp_detail[0]->account_number}}  </p>  
                                                        </div>
                                                    </div>
                                </div>



{{-- open edit bank_detail --}}
<div id="bank_detail" class="modal">

    <div class="modal-content">
                        <span class="close">&times;</span>
              <h5 class="modal-heading">Bank Detail</h5>
              {{Form::open(array('url'=>"", 'id' => 'bank_detail_edit_form'))}}
              @if(!empty($h->employee_unique_id))
              {{Form::hidden('id',$h->employee_unique_id)}}
              @endif
             <div class="comment-section">
                 <div class="row">
                    <label for="" class="control-label col-sm-3">   Bank Name: </label>
                    <div class=" col-sm-8">
          {!! Form::text('bank_name', $get_emp_detail[0]->bank_name , array('class' => 'form-control') ) !!}
                    </div>
                </div>
              

                <div class="row">
                        <label for="" class="control-label col-sm-3">   IFSC Code </label>
                        <div class=" col-sm-8">
              {!! Form::text('ifsc_code', $get_emp_detail[0]->ifsc_code , array('class' => 'form-control') ) !!}
                        </div>
                    </div>


                    <div class="row">
                            <label for="" class="control-label col-sm-3">  Branck: </label>
                            <div class=" col-sm-8">
                  {!! Form::text('bank_branch', $get_emp_detail[0]->bank_branch , array('class' => 'form-control') ) !!}
                            </div>
                        </div>

                        <div class="row">
                                <label for="" class="control-label col-sm-3">  Account Number: </label>
                                <div class=" col-sm-8">
                                      {!! Form::number('account_number', $get_emp_detail[0]->account_number , array('class' => 'form-control') ) !!}
                                </div>
                            </div>


                          
<hr>

              </div>
    
          {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3', 'id' =>'save_comment_button'))}}
          <p id="old_coment"> </p>
          {{Form::close()}}
         
            </div>
          </div>
          <!-- end of Modal -->













                                <div role="tabpane" class="tab-pane  " id="emp_detail_document">
                                    <div class="row">
<?php                                     $doc = DB::table('employee_documents')->where('status', 1)->where('employee_unique_id',$get_emp_detail[0]->unique_id)->get();

foreach($doc as $d){
?>
                    @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
                                    <div class="col-sm-3 emp-doc-image edit-image">
                  
                    <a href="{{url('public/uploads/image/agent_document/'.$d->documents)}}" target="_blank">
                        <img src="{{url('public/uploads/image/agent_document/'.$d->documents)}}" alt="Documents">
                    </a>  
                           <span class="fa fa-times delete-emp-document" data-id={{$d->id}}></span>                   
                                    <br>         
                                </div>
                                @else
                                <div class="col-sm-3 emp-doc-image">
                  <img src="{{url('public/uploads/image/agent_document/'.$d->documents)}}" alt="Documents">
                                                                            <br>         
                                                    </div>

                                                    @endif
                                         
                                        <?php } ?>
                                    </div>
                                        <br>
                                        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 2)
                                         {{-- <form action="add-ducument"  enctype="multipart/form-data" method="post"> --}}
                                            
                                            {{Form::open(array('url'=>'add-ducument','files' =>'true', 'id'=>"add_emp_document_form" ))}}
                                            <input type="hidden" value="{{$get_emp_detail[0]->unique_id}}" name="unique_id">
                                            <label for="upload_image_emp_doc" class="btn btn-danger">  Upload Documents</label>
                                        <input type="file" name="employee_documents[]"  accept=".jpeg,.jpg,.png,.doc,.docx,.ppt,.pdf" multiple id="upload_image_emp_doc" style="display:none" >
                                        {{-- {{Form::file('employee_documents[]',array('multiple'=>true))}} --}}
<input type="submit" class="btn btn-danger">
                                    {{Form::close()}}
                                        @endif
                                        </div>
                                    </div>
                </div>
              <script>
              $('#upload_image_emp_doc').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#upload_image_emp_doc')[0].files[0].name;
  file = file+'...';
  $(this).prev('label').text(file);
});
              </script>          

        </div>
        
    </div>
</div>



<script>
      $(document).ready(function(){
                $("#emp_other_detail_edit_form").submit(function (e) {
                    e.preventDefault();
                            // var unique_id = $('#unique_id').val();
                            var url = "{{url('emp_other_detail_edit_form')}}";
                 $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData(this),
        processData: false, 
        contentType: false, 
        success: function (data) {
            window.location.reload();
        }
                             });
                            
});
            });


            $(document).ready(function(){
                $("#previous_company_edit_form").submit(function (e) {
                    e.preventDefault();
                            // var unique_id = $('#unique_id').val();
                            var url = "{{url('previous_company_edit_form')}}";
                 $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData(this),
        processData: false, 
        contentType: false, 
        success: function (data) {
            window.location.reload();
        }
                             });
                            
});
            });



            $(document).ready(function(){
                $("#bank_detail_edit_form").submit(function (e) {
                    e.preventDefault();
                            // var unique_id = $('#unique_id').val();
                            var url = "{{url('bank_detail_edit_form')}}";
                 $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                             $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData(this),
        processData: false, 
        contentType: false, 
        success: function (data) {
            window.location.reload();
        }
                             });
                            
});
            });

$(document).ready(function(){
    $('.delete-emp-document').click(function(){
        var unique_id = $(this).attr("data-id");
        $(this).parent().hide();
        
$.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

if(confirm('Are you sure it delete this?')){
    $.ajax({
        type:"get",
        url:"{{url('delete-emp-document')}}?a="+unique_id,
        success: function(data){
            // alert(data)
    // alert('Record Delete Successfully '); 
    // location.reload();
    
    window.location.href="#emp_detail_document";
                }
    })
}
});
});
            
</script>




@endsection


 <!-- The Modal -->
 <div class="modal" id="programm_filter">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Get a list of eligible programs ...</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="position:relative">
        

        
            
              {{-- <input type="file" class="custom-file-input" id="customFile"> --}}
              <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
              <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
              <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
              <!------ Include the above in your HEAD tag ---------->
              
              <div class="" style="position:absolut">
                
              <div class="stepwizard col-md-offset-3">
                  <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                      <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                      <p>Step 1</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                      <p>Step 2</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                      <p>Step 3</p>
                    </div>
                    {{-- <div class="stepwizard-step">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p>Finish</p>
                      </div> --}}
                  </div>
                </div>
                

                {{Form::open(['route' => 'coursesearch'])}}
                <div class="row">
                  <div class="col-sm-12">
              
                  </div>
                </div>
                


                  <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                      
                        
                        <div class="form-group">
                          <label class="control-label">Country of Education</label>
                        
                          <select   id="select_country"  name="education_country"  class="form-control" onChange="get_university(this.value);check_empty_country();">
                              <option selected disabled>--Country--</option>
                              <option value="100">India</option>
                              <option value="15">Australisa</option>
                              <option value="38">Canada</option>
                              <option value="224">USA</option>
                              <option value="77">United Kingdom</option>
                            </select>  
                        </div>
                          
                     <button id="next_button_country" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                    </div>

                  </div>
                  <div class="row setup-content" id="step-2">
                    <div class="col-xs-12 ">
                      
                        {{-- <h3> Step 3</h3> --}}
                        <div class="form-group">
                          <label class="control-label">University / Institute
                          </label>
                    <select name="college" id="college" class="form-control" onChange="get_course(this.value);check_empty_country()">
                      <option value="">--Select--</option>
                                    </select>
                                  </div>
                        
                            <button  id="next_button4"  class=" btn btn-primary nextBtn btn-lg pull-right" type="button" >Next </button>
                       
                      
                    </div>
                  </div>


                  <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                    
        
                      




            <input type="text" list="get_course_data" name="get_course_data"  class="form-control">

                          <datalist id="get_course_data">
                              <option value="">--Select--</option>
                            </datalist>


                        



<script>

function get_university(val) {
    $.ajax({
    type: "get",
    url: "{{url('get_university')}}?id="+val,
    success: function(data){
      
        $('#college').empty();
                        $.each(data, function(key, value) {
                            $('#college').append('<option value="'+ this.code +'">'+ this.name +'</option>');
                        });
        }
    });
}

function get_course(val) {
$.ajax({
type: "get",
url: "{{url('get_course')}}?id="+val,
success: function(data){
        $('#get_course_data').empty();
        $.each(data, function(key, value) {
          
          
                            $('#get_course_data').append('<option value="'+ this.course_name +'">' +this.course_name +'</option>');
                            
                        });
}
});
}

</script>

    <button class="btn btn-danger pull-right  btn-primary " type="submit">Submit</button>
                        <input type="reset" class="btn btn-danger pull-right  btn-primary">
                    </div>
                  </div>






                {{Form::close()}}
                
              </div>
            


            @if(!empty($institute))
            
            @foreach($institute as $ins)
            {{ Form::hidden('colllege_code',$ins->code)}}
              {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
            @endforeach
          @endif
        <!-- Modal footer -->
        <div class="modal-footer">
            {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
            {{-- {!! Form::submit('Submit', array('class' => 'btn btn-danger', 'name'=>'submit')) !!} --}}

          {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
        </div>
    {{Form::close() }}
</div>
      </div>
    </div>



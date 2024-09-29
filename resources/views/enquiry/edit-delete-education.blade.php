
        <div id="" class="modal fade education_edit{{$q->id}} " role="dialog">
            <div class="modal-dialog">
  
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Overview</h4>
                  </div>
                  <div class="modal-body">

                    {{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}
                    <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
                    <input type="hidden" name="name_of_class" value="{{$q->class}}">
                <table id="get_education_dynamic" class="table">
                
                    <tr><th>Qualification</th><td> <span>{{$q->class}}</span></td></tr>
                    <tr>
                        <th>Name of Examination Board</th>
                        
                        
                        <td >
                            
                            <input type="text" name="education_name" value="{{$q->education_name}}" class="form-control "> 
                        </td>
                    </tr>
                
                
                    <tr>
                        <th>Name of Institution</th>
                
                        <td >
                            <input type="text" name="institute_name" value="{{$q->institute_name}}" class="form-control"> 
                        </td>
                        
                    </tr>
                    
                
                    <tr>
                        <th>Course Start Date</th>
                    
                        <td >
                            <input type="text" name="edu_start_date" value="{{$q->edu_start_date}}" class="form-control date"> 
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <th>Course End Date</th>
                        
                        <td >
                            <input type="text" name="edu_end_date" value="{{$q->edu_start_date}}" class="form-control date">
                        </td>
                    </tr>
                    <tr>
                        <th>Course Duration</th>
                        
                        <td >
                            <input type="text" name="course_duration" value="{{$q->course_duration}}" class="form-control ">  
                            
                        </td>
                    </tr>
                    <tr>
                        <th>Year of Award</th>
                        
                        <td >
                            <input type="text" name="award_year" value="{{$q->award_year}}" class="form-control "> 
                        </td>
                    </tr>
                    <tr>
                        <th>Medium of Study</th>
                        
                        <td >
                            <input type="text" name="study_medium" value="{{$q->study_medium}}" class="form-control ">
                        </td>
                    </tr>
                    <tr>
                        <th>Mode of Study</th>
                        
                        <td >
                            <input type="text" name="mode_of_study" value="{{$q->mode_of_study}}" class="form-control "> 
                        </td>
                    </tr>
                    <tr>
                        <th>Country of Study</th>
                        
                        <td >
                            
                            <input type="text" name="country_of_study" value="{{$q->country_of_study}}" class="form-control ">
                    {{-- dd($get) --}}
                  
                        </td>
                    </tr>
                    <tr>
                        <th>State of Study</th>
                        
                        <td >
                            <input type="text" name="state_of_study" value="{{$q->state_of_study}}" class="form-control "> 
                        </td>
                    </tr>
                    <tr>
                        <th>City/Place of Study</th>
                        
                        <td >
                            <input type="text" name="place_of_study" value="{{$q->place_of_study}}" class="form-control ">
                        </td>
                    </tr>
                    
                </table>
                
                {{Form::submit('Update')}}
                {{Form::close()}}
                </div>
              </div>
            </div>
        </div>

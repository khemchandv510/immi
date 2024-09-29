
<style>table td,table th{border: 1px solid #ecebeb !important ;padding: 8px 11px!important;vertical-align:baseline !important}

 </style>

                <!-- Modal -->
                <div id="education_add" class="modal fade " role="dialog">
                    <div class="modal-dialog">
          
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Add Education</h4>
                          </div>
                          <div class="modal-body">


							





    {{Form::open(array('url'=>'edit-client-qualification' , 'files' => "true"))}}
    <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
<table class="table aducation-test" style="" >
<tr> <th> Class </th>
<td> <select name="name_of_class" class="form-control"> <?php $get_quelification=DB::table("highest_educations")->get(); foreach($get_quelification as $q){?> <option value="{{$q->education}}" >{{$q->education}}</option> <?php }?> </select></td>
</tr>
	<tr>
        <th>Name of Examination Board</th>
        
		
		<td >
            
            <input type="text" name="education_name" value="" class="form-control "> 
		</td>
	</tr>


    <tr>
		<th>Name of Institution</th>

		<td >
            <input type="text" name="institute_name" value="" class="form-control"> 
        </td>
		
    </tr>
    

	<tr>
		<th>Course Start Date</th>
	
		<td >
            <input type="text" name="edu_start_date" value="" class="form-control date"> 
		</td>
    </tr>
    
    
	<tr>
		<th>Course End Date</th>
		
		<td >
            <input type="text" name="edu_end_date" value="" class="form-control date">
		</td>
	</tr>
	<tr>
		<th>Course Duration</th>
		
		<td >
            <input type="text" name="course_duration" value="" class="form-control ">  
            
		</td>
	</tr>
	<tr>
		<th>Year of Award</th>
		
		<td >
            <input type="text" name="award_year" value="" class="form-control "> 
		</td>
	</tr>
	<tr>
		<th>Medium of Study</th>
		
		<td >
            <input type="text" name="study_medium" value="" class="form-control ">
		</td>
	</tr>
	<tr>
		<th>Mode of Study</th>
		
		<td >
		    <input type="text" name="mode_of_study" value="" class="form-control "> 
		</td>
	</tr>
	<tr>
		<th>Country of Study</th>
		
		<td >
			<input type="text" name="country_of_study" value="" class="form-control ">
		</td>
	</tr>
	<tr>
		<th>State of Study</th>
		
		<td >
            <input type="text" name="state_of_study" value="" class="form-control "> 
		</td>
	</tr>
	<tr>
		<th>City/Place of Study</th>
		
		<td >
            <input type="text" name="place_of_study" value="" class="form-control ">
		</td>
	</tr>
	
</table>
<div style=" text-align: center;">
{{Form::submit('Save')}}
{{Form::close()}}
</div>
                            </div>

</div>
						  </div></div>
						  
                    {{-- </div></div> --}}
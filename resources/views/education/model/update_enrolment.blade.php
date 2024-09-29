
{{-- model --}}

<div class="container">

        <!-- Trigger the modal with a button -->
    
     
       <!-- Modal -->
       <div class="modal fade" id="update_enrolment" role="dialog">
         <div class="modal-dialog">
         
           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Update Enrolment</h4>
             </div>
             <div class="modal-body">
               {{Form::open(array('url' => 'update-enrolment-detail'))}}
               <table class="table">
                   <tr>
                       <td> Client Id </td>
                       <td> {{$e->unique_id}}  </td>
                       <input type="hidden" value = "{{$e->unique_id}} " name="client_enquiry_id">
                   </tr>
                   <?php   $get_update =  DB::table('table_enrolments')->where('client_enquiry_id',$e->unique_id )->get() ?>
                   @foreach($get_update as $get)
                   <tr>
                           <td>Case Type </td>
                           <td> <select name="case_type" id="" class="form-control">
                           <option value="{{$get->case_type}}" Selected > {{$get->case_type}} 

                               </option>    
                               <option value="Student Enrolment">Student Enrolment  </option>
                               <option value="Student Case ">Student Case  </option>
                               <option value="Student Case 2">Student Case 2 </option>
                           </select>  </td>
                       </tr>




                       <tr>
                               <td>Workflow Templete </td>
                               <td> <select name="work_flow_templete" id="" class="form-control">
                                   <option value="{{$get->work_flow_templete}}" Selected  > {{$get->work_flow_templete}}
   
                                   </option>    
                                   <option value=" Enrolment Case "> Enrolment Case  </option>
                                   
                               </select>  </td>
                           </tr>


                           <tr>
                                   <td>Institution </td>
                                   <td>  {{Form::text('institution',$get->institution,array('class' => 'form-control', 'placeholder' => 'Institution', 'onblur' => 'getlist()'))}}  </td>
                               </tr>
   
                               <script>
                               function getlis(){
                                   alert('black list');
                               }
                               </script>

<tr>
       <td>Enrolment For </td>
       <td>  {{Form::text('enrolment_for',$get->enrolment_for,array('class' => 'form-control', 'placeholder' => 'Enrolment For'))}}  </td>
   </tr>

   
<tr>
       <td>Campus </td>
       <td>  {{Form::text('campus',$get->campus,array('class' => 'form-control'))}}  </td>
   </tr>



   <tr>
           <td>Course Name </td>
           <td>  {{Form::text('course_name',$get->course_name,array('class' => 'form-control'))}}  </td>
       </tr>

       
   <tr>
           <td>Student Number </td>
           <td>  {{Form::text('student_number',$get->student_number,array('class' => 'form-control'))}}  </td>
       </tr>




       
   <tr>
           <td>Start Date </td>
           <td>  {{Form::date('start_date',$get->start_date,array('class' => 'form-control'))}}  </td>
       </tr>


       
   <tr>
           <td>End Date </td>
           <td>  {{Form::date('end_date',$get->end_date ,array('class' => 'form-control'))}}  </td>
       </tr>



        
   <tr>
           <td>Course Value  </td>
           <td>  {{Form::number('course_value',$get->course_value,array('class' => 'form-control'))}}  </td>
       </tr>
@endforeach
               </table>
               {{ Form::submit('Update', array('name'=>'update_enrolment')) }}  {{ Form::reset('Reset') }}
               {{Form::close()}}


             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
           </div>
           
         </div>
       </div>
       
     </div>
     
{{-- end model --}}

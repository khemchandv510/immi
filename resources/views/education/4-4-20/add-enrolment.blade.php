@extends('header')
@section('add-enrolment')
</div>
<div class="container">
    <div class="row">
        <div class="col-md 5">

            <img src="" alt="kkll">
            <h4>Name</h4>
            <p>email</p>
            <p>mobile</p>
        </div>
        <div class="col-md 7">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Enrolment</button>
            <button>Oppourtinity</button>
            <button>Case</button>
            <button>Active Client Portal</button>
            <button>icon</button>
        </div>
    </div>
</div>




{{-- model --}} 

<div class="container">

         <!-- Trigger the modal with a button -->
     
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enrolment</h4>
              </div>
              <div class="modal-body">
                {{Form::open(array('url' => 'add-enrolment-detail'))}}
                <table class="table">
                    <tr>
                        <td> Client Id </td>
                        <td> {{ $client_enquiry_id }} </td>
                        <input type="hidden" value = "{{ $client_enquiry_id }}" name="client_enquiry_id">
                    </tr>

                    <tr>
                            <td>Case Type </td>
                            <td> <select name="case_type" id="" class="form-control">
                                <option value="" Selected Disabled >-- Select case Type-- 

                                </option>    
                                <option value="Student Enrolment">Student Enrolment  </option>
                                <option value="Student Case ">Student Case  </option>
                                <option value="Student Case 2">Student Case 2 </option>
                            </select>  </td>
                        </tr>




                        <tr>
                                <td>Workflow Templete </td>
                                <td> <select name="work_flow_templete" id="" class="form-control">
                                    <option value="" Selected Disabled >--Workflow Templete-- 
    
                                    </option>    
                                    <option value=" Enrolment Case "> Enrolment Case  </option>
                                    
                                </select>  </td>
                            </tr>


                            <tr>
                                    <td>Institution </td>
                                    <td>  {{Form::text('institution',null,array('class' => 'form-control', 'placeholder' => 'Institution', 'onblur' => 'getlist()'))}}  </td>
                                </tr>
    
                                <script>
                                function getlist(){
                                    alert('black list');
                                }
                                </script>

<tr>
        <td>Enrolment For </td>
        <td>  {{Form::text('enrolment_for',null,array('class' => 'form-control', 'placeholder' => 'Enrolment For'))}}  </td>
    </tr>

    
<tr>
        <td>Campus </td>
        <td>  {{Form::text('campus',null,array('class' => 'form-control'))}}  </td>
    </tr>



    <tr>
            <td>Course Name </td>
            <td>  {{Form::text('course_name',null,array('class' => 'form-control'))}}  </td>
        </tr>

        
    <tr>
            <td>Student Number </td>
            <td>  {{Form::text('student_number',null,array('class' => 'form-control'))}}  </td>
        </tr>




        
    <tr>
            <td>Start Date </td>
            <td>  {{Form::date('start_date',null,array('class' => 'form-control'))}}  </td>
        </tr>


        
    <tr>
            <td>End Date </td>
            <td>  {{Form::date('end_date',null,array('class' => 'form-control'))}}  </td>
        </tr>



         
    <tr>
            <td>Course Value  </td>
            <td>  {{Form::number('course_value',null,array('class' => 'form-control'))}}  </td>
        </tr>

                </table>
                {{ Form::submit('Save') }}  {{ Form::reset('Reset') }}
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


<style>
#myModal .modal-content, #update_enrolment .modal-content{
    max-height: 100%;
}
</style>

@endsection
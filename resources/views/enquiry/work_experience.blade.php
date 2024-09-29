
<style>

.detail-page-tab-view tr:nth-child(1){
    background: #fff !important;
}
</style>

    


<div class=" " data-toggle="modal" data-target="#previous_company" >
  <h4>Work Experience</h4>
  <hr>
        <div class="client-detail-edit-button">
        {{-- <p id="work_experience_edit"> Edit </p>     --}}
        {{-- <p data-toggle="modal" data-target="#work_experience_edit" class="">Edit</p>          --}}
        </div>
        
<ul class="nav nav-tabs" role="tablist" id="experience_nav"  style="display:flex">
    {{-- @dd($enq_experiences) --}}
    @if($enq_experiences->count() > 0)
    
    @foreach($enq_experiences as $get)

        <li class="nav-item">
        <a class="nav-link get_experience" href="#show_com_id{{$get->id}}" role="tab"
        data-toggle="tab" data-id = "{{$get->company_name}}"  >{{$get->company_name}} </a>
        </li>
        @endforeach
        <li class="nav-item">
                <a class="nav-link get_experience" href="#experience_add" role="tab"
                data-toggle="modal" data-id = ""  > Add More.. </a>
                </li>
@else
<li class="nav-item">
    <a class="nav-link   get_experience" href="#experience_add" role="tab"
    data-toggle="modal" data-id = "add_more_class"  > Add Work Experience  </a>
    </li>
    @endif
</ul>



@if($enq_experiences->count() > 0)
<div class="tab-content active-work-exp  my-4" id="">
@foreach($enq_experiences as $q)
<div role="tabpane" class="tab-pane " id="show_com_id{{$q->id}}">
<div class="get-experience-dynamic"> 
  {{-- {{Form::open(array('url' => 'update-experience'))}} --}}
  <DIV style="text-align: right">
  <button class="edit-button-design" data-toggle="modal" data-target="#work_experience_edit{{$q->id}}" class="">Edit</button>           
  {{Form::open(array("url"=>"delete-experience-company", "method"=>"post", "onsubmit" => "return confirm('Are you sure to delete  $q->company_name ?')", "style"=>"display:initial"))}}
  
<input type="hidden" name="company_name" value="{{$q->company_name}}">
<input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}" >
<button class="delete-button-design" type="submit">
Delete
</button>
{{Form::close()}}
</DIV>





{{-- start edit modal --}}

<div id="work_experience_edit{{$q->id}}" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Work Experience </h4>
        </div>
        <div class="modal-body">
          <div class="get-experience-dynamic">
            {{Form::open(array('url' => 'update-experience'))}}
            <table id="" class="table">
              <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
              <tr>
                <th>Company Name</th>
              <td>{{$q->company_name}}</td>
              </tr>

              <tr>
                <th>Start Date</th>
            
                <td>
                  <input type="text" name="start_date" value="{{$q->start_date}}" class="form-control date ">
                </td>
              </tr>
              <tr>
                <th>End Date</th>
              
                <td>
                  <input type="text" name="end_date" value="{{$q->end_date}}" class="form-control date">
                </td>
              </tr>
              <tr>
                <th>Occupation</th>
              
                <td>
                  <input type="text" name="occupation" value="{{$q->occupation}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Palce of Work</th>
              
                <td>
                  <input type="text" name="place_of_work" value="{{$q->place_of_work}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Country of Work</th>
                
                <td>
                  <input type="text" name="country_of_work" value="{{$q->country_of_work}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Designation</th>
                
                <td>
                  <input type="text" name="designation" value="{{$q->designation}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Job Responsibilities</th>
                
                <td>
                  <input type="text" name="job_responsibilities" value="{{$q->job_responsibilities}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Contact Person Name</th>
                
                <td>
                  <input type="text" name="contact_person_name" value="{{$q->contact_person_name}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Contact Person Designation</th>
                
                <td>
                  <input type="text" name="contact_person_designation" value="{{$q->contact_person_designation}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Contact Person Phone</th>
                
                <td>
                  <input type="number" name="contact_person_phone" value="{{$q->contact_person_phone}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Contact Person Email</th>
                
                <td>
                  <input type="email" name="contact_person_email" value="{{$q->contact_person_email}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Total No of Employess in Company</th>
                
                <td>
                  <input type="number" name="total_no_of_employess" value="{{$q->total_no_of_employess}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>total No of Managers</th>
                
                <td>
                  <input type="number" name="total_no_of_managers" value="{{$q->total_no_of_managers}}" class="form-control ">
                </td>
              </tr>
              <tr>
                <th>Total No of other Staff</th>
                
                <td>
                  <input type="number" name="total_no_of_other_staff" value="{{$q->total_no_of_other_staff}}" class="form-control ">
                </td>
                <input type="hidden" name="company_name" value="{{$q->company_name}}">
              </tr>
              <tr>
                <th></th>
                <td>
                  <input type="submit" class="form-control ">
                </td>
              </tr>
            </table>
            {{Form::close()}}
          </div>

        

      
  </div>
</div>
  </div></div>
{{-- END OF EDIT EXPERINCE --}}




  <table id="" class="table">
 <tr>
   <th>Company Name</th>
   <td>{{$q->company_name}}</td>
 </tr>
    <tr>
      <th>Start Date</th>
      <td>{{$q->start_date}}</td>
      
    </tr>
    <tr>
      <th>End Date</th>
      <td>{{$q->end_date}}</td>
      
    </tr>
    <tr>
      <th>Occupation</th>
      <td>{{$q->occupation}}</td>
      
    </tr>
    <tr>
      <th>Palce of Work</th>
      <td>{{$q->place_of_work}}</td>
      
    </tr>
    <tr>
      <th>Country of Work</th>
      <td>{{$q->country_of_work}}</td>
      
    </tr>
    <tr>
      <th>Designation</th>
      <td>{{$q->designation}}</td>
      
    </tr>
    <tr>
      <th>Job Responsibilities</th>
      <td>{{$q->job_responsibilities}}</td>
      
    </tr>
    <tr>
      <th>Contact Person Name</th>
      <td>{{$q->contact_person_name}}</td>
      
    </tr>
    <tr>
      <th>Contact Person Designation</th>
      <td>{{$q->contact_person_designation}}</td>
      
    </tr>
    <tr>
      <th>Contact Person Phone</th>
      <td>{{$q->contact_person_phone}}</td>
      
    </tr>
    <tr>
      <th>Contact Person Email</th>
      <td>{{$q->contact_person_email}}</td>
      
    </tr>
    <tr>
      <th>Total No of Employess in Company</th>
      <td>{{$q->total_no_of_employess}}</td>
      
    </tr>
    <tr>
      <th>Total No of Managers</th>
      <td>{{$q->total_no_of_managers}}</td>
    
    </tr>
    <tr>
      <th>Total No of other Staff</th>
      <td>{{$q->total_no_of_other_staff}}</td>
    
    </tr>
    
  </table>

</div></div>
@endforeach
</div>
@else
<p class="no-record">No Record Found!</p>
{{-- <img src="{{url('public\uploads\image/NoRecord.png')}}" alt=""class="no-record-image"> --}}

@endif



</div>










<div class="tab-content content-style  my-4" id="">


<div id="experience_add" class="modal fade " role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add Work Experience </h4>
  </div>
  <div class="modal-body">
    

    <div class="get-experience-dynamic">
      {{Form::open(array('url' => 'update-experience'))}}
      <table id="" class="table">
        <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
        {{-- @foreach($enq_experiences as $q)  --}}
        <tr><th>Company Name</th> <td><input type="text" name="company_name" class="form-control" placeholder="Company Name"></td></tr>
        <tr>
          <th>Start Date</th>
      
          <td>
            <input type="text" name="start_date"  class="form-control date " placeholder="Start Date">
          </td>
        </tr>


        
        <tr>
          <th>End Date</th>
        
          <td>
            <input type="text" name="end_date"  class="form-control date" placeholder="End Date">
          </td>
        </tr>
        <tr>
          <th>Occupation</th>
        
          <td>
            <input type="text" name="occupation"  class="form-control " placeholder="Occupation">
          </td>
        </tr>
        <tr>
          <th>Palce of Work</th>
        
          <td>
            <input type="text" name="place_of_work"  class="form-control " placeholder="Place of Work">
          </td>
        </tr>
        <tr>
          <th>Country of Work</th>
          
          <td>
            <input type="text" name="country_of_work"  class="form-control " placeholder="Country of Work">
          </td>
        </tr>
        <tr>
          <th>Designation</th>
          
          <td>
            <input type="text" name="designation"  class="form-control " placeholder="Designation">
          </td>
        </tr>
        <tr>
          <th>Job Responsibilities</th>
          
          <td>
            <input type="text" name="job_responsibilities"  class="form-control " placeholder="Job Responsibility">
          </td>
        </tr>
        <tr>
          <th>Contact Person Name</th>
          
          <td>
            <input type="text" name="contact_person_name"  class="form-control " placeholder="Contact Person Name">
          </td>
        </tr>
        <tr>
          <th>Contact Person Designation</th>
          
          <td>
            <input type="text" name="contact_person_designation"  class="form-control " placeholder="Conatct Person Designation">
          </td>
        </tr>
        <tr>
          <th>Contact Person Phone</th>
          
          <td>
            <input type="number" name="contact_person_phone"  class="form-control " placeholder="Conatct Person Phone">
          </td>
        </tr>
        <tr>
          <th>Contact Person Email</th>
          
          <td>
            <input type="email" name="contact_person_email"  class="form-control " placeholder="Contact Person Email">
          </td>
        </tr>
        <tr>
          <th>Total No of Employee in Company</th>
          
          <td>
            <input type="number" name="total_no_of_employess" class="form-control " placeholder="Total Number Of Employee">
          </td>
        </tr>
        <tr>
          <th>total No of Managers</th>
          
          <td>
            <input type="number" name="total_no_of_managers"  class="form-control " placeholder="Total Number of Manager">
          </td>
        </tr>
        <tr>
          <th>Total No of other Staff</th>
          
          <td>
            <input type="number" name="total_no_of_other_staff"  class="form-control " placeholder="Total No of Other Staff">
          </td>
          
        </tr>
        <tr>
          <th></th>
          <td>
            <input type="submit" class="form-control ">
          </td>
        </tr>
      </table>
      {{Form::close()}}
    </div>
  </div>
</div></div></div>
</div>

  <script>
    // document.querySelector('#student_education_nav').children[].style="background:#2b6699; color:#fff";
  
    document.querySelector('#experience_nav').children[{{$enq_experiences->count()-1}}].firstElementChild.classList.add('active');
    document.querySelector('.active-work-exp').children[{{$enq_experiences->count()-1}}].className += " "+"active";
  </script>
  
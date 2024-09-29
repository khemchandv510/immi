
<style>
    #get_parent_sibling_dynamic td{
        width:50%;
    }
    .detail-page-tab-view tr:nth-child(1){
        background: #fff !important;
    }
    </style>
    
        <h4>
            Parent Name / Sibling
            </h4>
    <hr>
    
    
          
                  

                  <?php  
                  $parent_sibling_details = DB::table('parent_sibling_details')
                                              ->where('enquiry_id',session()->get('unique_id_sess'))
                                              ->get();
                                            ?>

                  <div id="update_father_detail_edit" class="modal fade " role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Father Details</h4>
                          </div>
                          <div class="modal-body">
  {{Form::open(array('url' => 'update-parentsibling-father'))}}
  {{-- @if($parent_sibling_details->count() > 0) --}}
{{-- @foreach($parent_sibling_details as $get) --}}


<table class="table">
  <tr><th>Father Name</th> <td> <input type="text" name="father_name" value="{{isset($parent_sibling_details[0]->father_name)?$parent_sibling_details[0]->father_name:''}}"class="form-control" placeholder="Father Name"> </td>  </tr>
  <tr><th>Nationality</th>  <td> <input type="text" name="father_nationality" value="{{isset($parent_sibling_details[0]->father_nationality)?$parent_sibling_details[0]->father_nationality:''}}" class="form-control " placeholder="Nationality"> </td>  </tr>
  <tr><th>DOB</th> <td> <input type="text" name="father_dob" value="{{isset($parent_sibling_details[0]->father_dob)?$parent_sibling_details[0]->father_dob:""}}"class="form-control date" placeholder="DOB"> </td> </tr>
  <tr><th>Birth Place</th><td>   <input type="text" name="father_birth_place" value="{{isset($parent_sibling_details[0]->father_birth_place)?$parent_sibling_details[0]->father_birth_place:''}}"class="form-control" placeholder="Birth Place">  </td>  </tr>
  <tr><th>Birth State</th> <td>   <input type="text" name="father_birth_state" value="{{isset($parent_sibling_details[0]->father_birth_state)?$parent_sibling_details[0]->father_birth_state:''}}"class="form-control" placeholder="Birth State">  </td> </tr>
  <tr><th>Birth Country</th><td> <input type="text" name="father_birth_country" value="{{isset($parent_sibling_details[0]->father_birth_country)?$parent_sibling_details[0]->father_birth_country:''}}"class="form-control " placeholder="Birth Country">  </td>  </tr>
  <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
  
</table>
  {{-- @endforeach --}}
  {{-- @endif --}}
  {{Form::submit()}}
  {{Form::close()}}
</div></div></div></div>



<div id="update_mother_detail_edit" class="modal fade " role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Mother Details</h4>
        </div>
        <div class="modal-body">
{{Form::open(array('url' => 'update-parentsibling-mother'))}}
{{-- @if($parent_sibling_details->count() > 0)
@foreach($parent_sibling_details as $get) --}}
<table class="table">
<tr><th>Mother Name</th> <td> <input type="text" name="mother_name" value="{{isset($parent_sibling_details[0]->mother_name)?$parent_sibling_details[0]->mother_name:''}}"class="form-control  " placeholder="Mother Name"> </td>  </tr>
<tr><th>Nationality</th>  <td> <input type="text" name="mother_nationality" value="{{isset($parent_sibling_details[0]->mother_nationality)?$parent_sibling_details[0]->mother_nationality:''}}" class="form-control " placeholder="Nationality" > </td>  </tr>
<tr><th>DOB</th> <td> <input type="text" name="mother_dob" value="{{isset($parent_sibling_details[0]->mother_dob)?$parent_sibling_details[0]->mother_dob:''}}"class="form-control date" placeholder="Mother DOB"> </td> </tr>
<tr><th>Birth Place</th><td>   <input type="text" name="mother_birth_place" value="{{isset($parent_sibling_details[0]->mother_birth_place)?$parent_sibling_details[0]->mother_birth_place:''}}"class="form-control " placeholder="Birth Place">  </td>  </tr>
<tr><th>Birth State</th> <td>   <input type="text" name="mother_birth_state" value="{{isset($parent_sibling_details[0]->mother_birth_state)?$parent_sibling_details[0]->mother_birth_state:''}}"class="form-control " placeholder="Birth State">  </td> </tr>
<tr><th>Birth Country</th><td> <input type="text" name="mother_birth_country" value="{{isset($parent_sibling_details[0]->mother_birth_country)?$parent_sibling_details[0]->mother_birth_country:''}}"class="form-control " placeholder="Birth Country">  </td>  </tr>
<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

</table>
{{-- @endforeach
@endif --}}
{{Form::submit()}}
{{Form::close()}}
</div></div></div></div>


        
<h4>Father Details</h4>
<div class="client-detail-edit-button">
  <button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#update_father_detail_edit">Edit</button>
          {{Form::open(array('url'=>'delete-parentsibling'))}}
          <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
          
         
              {{-- <button type="submit">Delete</button> --}}
              {{Form::close()}}
          </form>
      </div>
{{-- @if($parent_sibling_details->count() > 0)
@foreach($parent_sibling_details as $get) --}}
<table> <tr> <th>Father Name </th> <td> {{isset($parent_sibling_details[0]->father_name)?$parent_sibling_details[0]->father_name:'Add Father Name'}} </td>
  
</tr>
    
    <tr> <th>Nationality </th>  <td> {{isset($parent_sibling_details[0]->father_nationality)?$parent_sibling_details[0]->father_nationality:'Add Nationality'}}</td> 
  
    </tr>
    
    <tr> <th>DOB </th> <td> {{isset($parent_sibling_details[0]->father_dob)?$parent_sibling_details[0]->father_dob:'Add DOB'}} </td>
      </tr>
    
    <tr> <th>Birth Place</th> <td> {{isset($parent_sibling_details[0]->father_birth_place)?$parent_sibling_details[0]->father_birth_place:'Add Birth Place'}} </td>
    </tr>
    <tr> <th>Birth State </th> <td> {{isset($parent_sibling_details[0]->father_birth_state)?$parent_sibling_details[0]->father_birth_state:'Add Birth State'}} </td>
    </tr>
    
    <tr> <th>Birth Country </th> <td> {{isset($parent_sibling_details[0]->father_birth_country)?$parent_sibling_details[0]->father_birth_country:'Add Birth Country'}}</td>
    </tr>
    
</table>

<br>
<br>

<h4>Mother Details</h4>

<div class="client-detail-edit-button">
  <button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#update_mother_detail_edit">Edit</button>
</div>

<table>
    
    <tr> <th>Mother Name </th> <td> {{isset($parent_sibling_details[0]->mother_name)?$parent_sibling_details[0]->mother_name:'Add Mother Name' }} </td></tr>
    
    <tr> <th>Nationality </th>  <td> {{isset($parent_sibling_details[0]->mother_nationality)?$parent_sibling_details[0]->mother_nationality:'Add Nationality' }}</td></tr>
    <tr> <th>DOB </th> <td> {{isset($parent_sibling_details[0]->mother_dob)?$parent_sibling_details[0]->mother_dob:'Add DOB' }} </td></tr>
    
    <tr> <th>Birth Place</th> <td> {{isset($parent_sibling_details[0]->mother_birth_place)?$parent_sibling_details[0]->mother_birth_place:'Add Birth Place' }} </td></tr>
    
    <tr> <th>Birth State </th> <td> {{isset($parent_sibling_details[0]->mother_birth_state)?$parent_sibling_details[0]->mother_birth_state:'Add Birth State' }} </td></tr>
    
    <tr> <th>Birth Country </th> <td> {{isset($parent_sibling_details[0]->mother_birth_country)?$parent_sibling_details[0]->mother_birth_country:'Add Birth Country' }}</td></tr>
</table>

{{-- @endforeach
@else --}}





{{-- @endif --}}



<br><br>
{{-- <h4> Siblings Details </h4> --}}
    <ul class="nav nav-tabs" role="tablist" id=""  style="display:flex">
        
        <?php  
        $sibling_details = DB::table('sibling_details')
                                    ->where('enquiry_id',session()->get('unique_id_sess'))
                                    ->get();
                      
        ?>
        @if($sibling_details->count() > 0)
        @foreach($sibling_details as $get2)
    
            {{-- <li class="nav-item">
            <a class="nav-link   get_sibling" href="#tab_sibling{{$get2->id}}" role="tab"
            data-toggle="tab"   >{{$get2->sibling_name}} </a>
            </li> --}}
            @endforeach
            {{-- <li class="nav-item">
                    <a class="nav-link   get_sibling" href="#add_sibling" role="modal"
                    data-toggle="modal" data-id = "add_more_class"  > Add More.. </a>
                    </li> --}}
    @else
    {{-- <li class="nav-item">
        <a class="nav-link   get_sibling" href="#add_sibling" role="modal"
        data-toggle="modal" data-id = "add_more_class"  > Add Sibling </a>
        </li> --}}
        @endif
    </ul>
   


    
<div class="tab-content content-style active my-4" id="">
    @if($sibling_details->count() > 0)
    @foreach($sibling_details as $get2)
  <div role="tabpane" class="tab-pane " id="tab_sibling{{$get2->id}}">
  <div style="text-align: right"> <button data-toggle="modal" data-target="#sibling_edit{{$get2->id}}" class="edit-text">Edit</button>
      </div>
    <table>
    <tr> <th> Name</th> <td> {{$get2->sibling_name }}</td></tr>
    <tr> <th>Gender </th> <td> {{$get2->sibling_gender}} </td></tr>
    <tr> <th>DOB </th> <td>{{$get2->sibling_dob}} </td></tr>
    <tr> <th>Birth Place </th> <td> {{$get->sibling_birth_place}} </td></tr>
    <tr> <th>Birth State</th> <td> {{$get2->sibling_birth_state}} </td></tr>
    <tr> <th>Birth Country </th> <td> {{$get2->sibling_birth_country}}</td></tr>
    <tr>  <th>Nationality </th> <td> {{$get2->sibling_nationality}} </td></tr>
    <tr> <th> Present Whereabout</th> <td> {{$get2->sibling_present_whereabout}} </td></tr>
    <tr> <th>Occuopation </th> <td>{{$get2->sibling_occupation}}</td></tr>
  </table>
  </div>
   





  <div id="sibling_edit{{$get2->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Sibling</h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'add-sibling'))}}
           <table class="table">
           <tr> <th> Name</th> <td> <input type="text" name="sibling_name" class="form-control" value="{{$get2->sibling_name}}"> </td><td></td></tr><tr> <th>Gender </th> <td> <select name="sibling_gender" id=""><option value="{{$get2->sibling_gender}}" disabled>{{$get2->sibling_gender}}</option> <option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option> </select> </td><td> </td></tr><tr> <th>DOB </th> <td> <input type="text" name="sibling_dob" value="{{$get2->sibling_dob}}" class="form-control date" > </td><td></td></tr><tr> <th>Birth Place </th> <td> <input type="text" name="sibling_birth_place" value="{{$get2->sibling_birth_place}}"class="form-control "> </td> </tr><tr> <th>Birth State</th> <td> <input type="text" name="sibling_birth_state" value="{{$get2->sibling_birth_state}}" class="form-control " > </td> </tr><tr> <th>Birth Country </th> <td> <input type="text" name="sibling_birth_country" value="{{$get2->sibling_birth_country}}"class="form-control "> </td> </tr><tr> <tr> <th>Nationality </th> <td> <input type="text" name="sibling_nationality" value="{{$get2->sibling_nationality}}"class="form-control "> </td> </tr><tr> <th> Present Whereabout</th> <td> <input type="text" name="sibling_present_whereabout" value="{{$get2->sibling_present_whereabout}}" class="form-control " > </td></tr><tr> <th>Occuopation </th> <td> <input type="text" name="sibling_occupation" value="{{$get2->sibling_occupation}}"class="form-control "> </td> </tr>
           </table>
           <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
          <input type="text" name="id" value="{{$get2->id}}">
           {{Form::submit('Submit')}}
           {{Form::close()}}
          </div></div></div></div>
          @endforeach
          @endif
        </div>


    <div id="add_sibling" class="modal fade " role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Sibling</h4>
            </div>
            <div class="modal-body">
              {{Form::open(array('url' => 'add-sibling'))}}
<table class="table">
  <tr> <th> Name</th> <td> <input type="text" name="sibling_name" class="form-control"> </td> </tr><tr> <th>Gender </th> <td> <select name="sibling_gender" id="" class="class-form"> <option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option> </select> </td><td> </td></tr><tr> <th>DOB </th> <td> <input type="text" name="sibling_dob" value="" class="form-control datepicker" > </td> </tr><tr> <th>Birth Place </th> <td> <input type="text" name="sibling_birth_place" value=""class="form-control "> </td> </tr><tr> <th>Birth State</th> <td> <input type="text" name="sibling_birth_state" value="" class="form-control " > </td> </tr><tr> <th>Birth Country </th> <td> <input type="text" name="sibling_birth_country" value=""class="form-control "> </td> </tr><tr> <tr> <th>Nationality </th> <td> <input type="text" name="sibling_nationality" value=""class="form-control "> </td> </tr><tr> <th> Present Whereabout</th> <td> <input type="text" name="sibling_present_whereabout" value="" class="form-control " > </td> </tr><tr> <th>Occuopation </th> <td> <input type="text" name="sibling_occupation" value=""class="form-control "> </td> </tr>
</table>

<input type="hidden" name="have_sibling" value="Yes">
{{-- <input type="hidden" name="have_sibling" value="Yes"> --}}
              <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
              <div class="">  {{Form::submit('Add')}} 
              {{Form::close()}}
              </div>
            </div></div></div></div>



    
    
    
    
    
    
    
    <script>
    
    //         $(document).ready(function(){
    //         $(".get_sibling").on("click", function(){
                
    //         var data_class = $(this).attr("data-id");
    //         var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
                
            
            
    //         $.ajaxSetup({
    //         headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //         });
            
    //         $.ajax({
    //         type: "get",
    //         url: "{{url('get_sibling')}}?a="+unique_id+"&data_class="+data_class,
            
    //         success: function(data){
    
    // if(data  == 0){
    //     $('#get_sibling_dynamic').empty();
       
    //     $('#get_sibling_dynamic').append(' <tr> <th> Name</th> <td> <input type="text" name="sibling_name" class="form-control"> </td><td></td></tr><tr> <th>Gender </th> <td> <select name="sibling_gender" id=""> <option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option> </select> </td><td> </td></tr><tr> <th>DOB </th> <td> <input type="text" name="sibling_dob" value="" class="form-control datepicker" > </td><td></td></tr><tr> <th>Birth Place </th> <td> <input type="text" name="sibling_birth_place" value=""class="form-control "> </td><td></td></tr><tr> <th>Birth State</th> <td> <input type="text" name="sibling_birth_state" value="" class="form-control " > </td><td></td></tr><tr> <th>Birth Country </th> <td> <input type="text" name="sibling_birth_country" value=""class="form-control "> </td><td></td></tr><tr> <tr> <th>Nationality </th> <td> <input type="text" name="sibling_nationality" value=""class="form-control "> </td><td></td></tr><tr> <th> Present Whereabout</th> <td> <input type="text" name="sibling_present_whereabout" value="" class="form-control " > </td><td></td></tr><tr> <th>Occuopation </th> <td> <input type="text" name="sibling_occupation" value=""class="form-control "> </td><td></td></tr>') ;
    //     $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
    //     $('.get_education_dynamic_prev').hide();
    // }
    // else{
    //             $('#get_sibling_dynamic').empty();
              
    //                     $.each(data, function(key, value){
    //                       if(this.start_date == null){
    //                         this.start_date = '-';
    //                       }
    //                       if(this.end_date == null){
    //                         this.end_date = '-';
    //                       }
    //                       if(this.occupation == null){
    //                         this.occupation = '-';
    //                       }
    //                       if(this.place_of_work == null){
    //                         this.place_of_work = '-';
    //                       }
    //                       if(this.country_of_work == null){
    //                         this.country_of_work = '-';
    //                       }
    //                       if(this.job_responsibilities == null){
    //                         this.job_responsibilities = '-';
    //                       }
    //                       if(this.contact_person_name == null){
    //                         this.contact_person_name = '-';
    //                       }
    //                       if(this.contact_person_designation == null){
    //                         this.contact_person_designation = '-';
    //                       }
    //                       if(this.contact_person_phone == null){
    //                         this.contact_person_phone = '-';
    //                       }
    //                       if(this.contact_person_email == null){
    //                         this.contact_person_email = '-';
    //                       }
    //                       if(this.total_no_of_managers == null){
    //                         this.total_no_of_managers = '-';
    //                       }
    //                       if(this.total_no_of_other_staff == null){
    //                         this.total_no_of_other_staff = '-';
    //                       }
    //                       if(this.total_no_of_employess == null){
    //                         this.total_no_of_employess = '-';
    //                       }
    //                       if(this.designation == null){
    //                         this.designation = '-';
    //                       }
                         
                        
    //                     $('#get_sibling_dynamic').append(' <tr> <th>Start Date </th> <td> '+this.start_date+' </td><td> <input type="text" name="start_date" value="'+this.start_date+'"class="form-control datepicker " > </td></tr> <tr> <th>End Date </th>  <td> '+this.end_date+'</td> <td> <input type="text" name="end_date" value="'+this.end_date+'" class="form-control datepicker" > </td> </tr> <tr> <th>Occupation </th> <td> '+this.occupation+' </td><td> <input type="text" name="occupation" value="'+this.occupation+'"class="form-control "> </td></tr><tr> <th>Palce of Work</th> <td> '+this.place_of_work+' </td><td> <input type="text" name="place_of_work" value="'+this.place_of_work+'" class="form-control " > </td></tr><tr> <th>Country of Work </th> <td> '+this.country_of_work+' </td><td> <input type="text" name="country_of_work" value="'+this.country_of_work+'"class="form-control "> </td></tr><tr> <th>Designation </th> <td> '+this.designation+'</td><td> <input type="text" name="designation" value="'+this.designation+'"class="form-control "> </td></tr><tr> <th> Job Responsibilities </th> <td> '+this.job_responsibilities+' </td><td> <input type="text" name="job_responsibilities" value="'+this.job_responsibilities+'"class="form-control "> </td></tr><tr> <th> Contact Person Name </th> <td> '+this.contact_person_name+' </td><td> <input type="text" name="contact_person_name" value="'+this.contact_person_name+'"class="form-control "> </td></tr><tr> <th>Contact Person Designation </th> <td> '+this.contact_person_designation+' </td><td> <input type="text" name="contact_person_designation" value="'+this.contact_person_designation+'"class="form-control "> </td></tr><tr> <th>Contact Person Phone</th> <td> '+this.contact_person_phone+' </td><td> <input type="number" name="contact_person_phone" value="'+this.contact_person_phone+'"class="form-control "> </td></tr><tr> <th>Contact Person Email</th> <td> '+this.contact_person_email+' </td><td> <input type="email" name="contact_person_email" value="'+this.contact_person_email+'"class="form-control "> </td></tr><tr> <th>Total No of Employess in Company</th> <td> '+this.total_no_of_employess+' </td><td> <input type="number" name="total_no_of_employess" value="'+this.total_no_of_employess+'"class="form-control "> </td></tr><tr> <th>total No of Managers</th> <td> '+this.total_no_of_managers+' </td><td> <input type="number" name="total_no_of_managers" value="'+this.total_no_of_managers+'"class="form-control "> </td></tr><tr> <th>Total No of other Staff</th> <td> '+this.total_no_of_other_staff+' </td><td> <input type="number" name="total_no_of_other_staff" value="'+this.total_no_of_other_staff+'"class="form-control "> </td>  <input type="hidden" name="company_name" value="'+this.company_name+'"> </tr>');
    //                     $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
    
    //                     $('.get_education_dynamic_prev').hide();
    //                 })
    // }
          
    //     $(document).ready(function(){
    //     // $('.update-button-client td').style.display= "table-cell ";
    //     $('#work_experience').find('table').find('tr').find('td:last').hide();
    //         $('#work_experience_edit').click(function(){
    //             var a  = $('#work_experience_edit').text();
                
    //             if(a == "Edit"){
    //                 $('#work_experience').find('table').find('tr').find('td:first').show();
    //             $('#work_experience').find('table').find('tr').find('td:last').hide();
    //             $('#work_experience').find('table').find('tr').find('input[type="submit"]').hide();        
    //             $('#work_experience_edit').text('Edit');
    //             }
    //             else{
    
    //             $('#work_experience_edit').text('Back');
    //             $('#work_experience').find('table').find('tr').find('td:first').hide();
    //             $('#work_experience').find('table').find('tr').find('td:last').show();
    //             $('#work_experience').find('table').find('tr').find('input[type="submit"]').show();
    //             }
    //         });
    //     });
    //         }
    //         });
            
    //         });
    //         });
           
            </script>
    
    
    
    

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
    
    
    <div class="" data-toggle="modal" data-target="" >
    
            <div class="client-detail-edit-button">
        <p id="parent_sibling_edit"> Edit </p>    
            </div>
            {{Form::open(array('url' => 'update-parentsibling'))}}

            <?php  
            
        $parent_sibling_details = DB::table('parent_sibling_details')
                                    ->where('enquiry_id',session()->get('unique_id_sess'))
                                    ->get();
                                  
        ?>
      
    

<h4>Father Details</h4>
@if($parent_sibling_details->count() > 0)
@foreach($parent_sibling_details as $get)
<table> <tr> <th>Father Name </th> <td> {{$get->father_name}} </td><td> <input type="text" name="father_name" value="{{$get->father_name}}"class="form-control  " > </td></tr>
    
    <tr> <th>Nationality </th>  <td> {{$get->father_nationality}}</td> <td> <input type="text" name="father_nationality" value="{{$get->father_nationality}}" class="form-control " > </td> </tr>
    
    <tr> <th>DOB </th> <td> {{$get->father_dob}} </td><td> <input type="text" name="father_dob" value="{{$get->father_dob}}"class="form-control datepicker"> </td></tr>
    
    <tr> <th>Birth Place</th> <td> {{$get->father_birth_place}} </td><td> <input type="text" name="father_birth_place" value="{{$get->father_birth_place}}" class="form-control " > </td></tr>
    
    <tr> <th>Birth State </th> <td> {{$get->father_birth_state}} </td><td> <input type="text" name="father_birth_state" value="{{$get->father_birth_state}}"class="form-control "> </td></tr>
    
    <tr> <th>Birth Country </th> <td> {{$get->father_birth_country}}</td><td> <input type="text" name="father_birth_country" value="{{$get->father_birth_country}}"class="form-control "> </td></tr>
    
</table>
<h4>Mother Details</h4>

<table>
    
    <tr> <th>Mother Name </th> <td> {{$get->mother_name}} </td><td> <input type="text" name="mother_name" value="{{$get->mother_name}}"class="form-control  " > </td></tr>
    
    <tr> <th>Nationality </th>  <td> {{$get->mother_nationality}}</td> <td> <input type="text" name="mother_nationality" value="{{$get->mother_nationality}}" class="form-control " > </td> </tr>
    
    <tr> <th>DOB </th> <td> {{$get->mother_dob}} </td><td> <input type="text" name="mother_dob" value="{{$get->mother_dob}}"class="form-control datepicker"> </td></tr>
    
    <tr> <th>Birth Place</th> <td> {{$get->mother_birth_place}} </td><td> <input type="text" name="mother_birth_place" value="{{$get->mother_birth_place}}" class="form-control " > </td></tr>
    
    <tr> <th>Birth State </th> <td> {{$get->mother_birth_state}} </td><td> <input type="text" name="mother_birth_state" value="{{$get->mother_birth_state}}"class="form-control "> </td></tr>
    
    <tr> <th>Birth Country </th> <td> {{$get->mother_birth_country}}</td><td> <input type="text" name="mother_birth_country" value="{{$get->mother_birth_country}}"class="form-control "> </td></tr>
    
</table>

@endforeach
@else
<table>
    <tr> <th> Father Name</th>   <td> <input type="text" name="father_name" class="form-control"> </td><td></td></tr>
    
    <tr> <th>Nationality </th> <td> <input type="text" name="father_nationality" value=""class="form-control  "> </td><td> </td></tr>
    <tr> <th>DOB </th> <td> <input type="text" name="father_dob" value="" class="form-control datepicker" > </td><td></td></tr>
    
    <tr> <th>Birth Place </th> <td> <input type="text" name="father_birth_place" value=""class="form-control "> </td><td></td></tr>
    
    <tr> <th>Birth State</th> <td> <input type="text" name="father_birth_state" value="" class="form-control " > </td><td></td></tr>
    
    
    <tr> <th>Birth Country </th> <td> <input type="text" name="father_birth_country" value=""class="form-control "> </td><td></td></tr><tr>
        
        
</table>
<h4>Mother Details</h4>
<table>
    <tr> <th> Mother Name</th>   <td> <input type="text" name="mother_name" class="form-control"> </td><td></td></tr>
    
    <tr> <th>Nationality </th> <td> <input type="text" name="mother_nationality" value=""class="form-control  "> </td><td> </td></tr>
    <tr> <th>DOB </th> <td> <input type="text" name="mother_dob" value="" class="form-control datepicker" > </td><td></td></tr>
    
    <tr> <th>Birth Place </th> <td> <input type="text" name="mother_birth_place" value=""class="form-control "> </td><td></td></tr>
    
    <tr> <th>Birth State</th> <td> <input type="text" name="mother_birth_state" value="" class="form-control " > </td><td></td></tr>
    
    
    <tr> <th>Birth Country </th> <td> <input type="text" name="	mother_birth_country" value=""class="form-control "> </td><td></td></tr><tr>
        
        
</table>

@endif
<div class="update-button-clien">  {{Form::submit('Update')}}  </div>
<h4> Siblings Details </h4>
    <ul class="nav nav-tabs" role="tablist" id=""  style="display:flex">
        {{-- @dd($enq_experiences->count()) --}}
        <?php  
        $parent_sibling_details = DB::table('parent_sibling_details')
                                    ->where('enquiry_id',session()->get('unique_id_sess'))
                                    ->where('have_sibling','Yes')
                                    ->get();
                                  
        ?>
        @if($parent_sibling_details->count() > 0)
        @foreach($parent_sibling_details as $get)
    
            <li class="nav-item">
            <a class="nav-link   get_sibling" href="#" role="tab"
            data-toggle="tab" data-id = "{{$get->sibling_name}}"  >{{$get->sibling_name}} </a>
            </li>
            @endforeach
            <li class="nav-item">
                    <a class="nav-link   get_sibling" href="#" role="tab"
                    data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
                    </li>
    @else
    <li class="nav-item">
        <a class="nav-link   get_sibling" href="#" role="tab"
        data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
        </li>
        @endif
    </ul>
    <table id="get_sibling_dynamic"></table>
    {{-- <div class="update-button-cli"><td> {{Form::submit("Update")}} </td></div> --}}
    
    
    
    <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
    
    <div class="update-button-client">  {{Form::submit('Update')}}  </div>
    {{Form::close()}}
    </div>
    
    
    
    
    
    <script>
    
            $(document).ready(function(){
            $(".get_sibling").on("click", function(){
                
            var data_class = $(this).attr("data-id");
            var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
                
            
            
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            
            $.ajax({
            type: "get",
            url: "{{url('get_sibling')}}?a="+unique_id+"&data_class="+data_class,
            
            success: function(data){
    
    if(data  == 0){
        $('#get_sibling_dynamic').empty();
       
        $('#get_sibling_dynamic').append(' <tr> <th> Name</th> <td> <input type="text" name="sibling_name" class="form-control"> </td><td></td></tr><tr> <th>Gender </th> <td> <select name="sibling_gender" id=""> <option value="Male">Male </option> <option value="Female">Female </option> <option value="Other">Other </option> </select> </td><td> </td></tr><tr> <th>DOB </th> <td> <input type="text" name="sibling_dob" value="" class="form-control datepicker" > </td><td></td></tr><tr> <th>Birth Place </th> <td> <input type="text" name="sibling_birth_place" value=""class="form-control "> </td><td></td></tr><tr> <th>Birth State</th> <td> <input type="text" name="sibling_birth_state" value="" class="form-control " > </td><td></td></tr><tr> <th>Birth Country </th> <td> <input type="text" name="sibling_birth_country" value=""class="form-control "> </td><td></td></tr><tr> <tr> <th>Nationality </th> <td> <input type="text" name="sibling_nationality" value=""class="form-control "> </td><td></td></tr><tr> <th> Present Whereabout</th> <td> <input type="text" name="sibling_present_whereabout" value="" class="form-control " > </td><td></td></tr><tr> <th>Occuopation </th> <td> <input type="text" name="sibling_occupation" value=""class="form-control "> </td><td></td></tr>') ;
        $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
        $('.get_education_dynamic_prev').hide();
    }
    else{
                $('#get_sibling_dynamic').empty();
              
                        $.each(data, function(key, value){
                          if(this.start_date == null){
                            this.start_date = '-';
                          }
                          if(this.end_date == null){
                            this.end_date = '-';
                          }
                          if(this.occupation == null){
                            this.occupation = '-';
                          }
                          if(this.place_of_work == null){
                            this.place_of_work = '-';
                          }
                          if(this.country_of_work == null){
                            this.country_of_work = '-';
                          }
                          if(this.job_responsibilities == null){
                            this.job_responsibilities = '-';
                          }
                          if(this.contact_person_name == null){
                            this.contact_person_name = '-';
                          }
                          if(this.contact_person_designation == null){
                            this.contact_person_designation = '-';
                          }
                          if(this.contact_person_phone == null){
                            this.contact_person_phone = '-';
                          }
                          if(this.contact_person_email == null){
                            this.contact_person_email = '-';
                          }
                          if(this.total_no_of_managers == null){
                            this.total_no_of_managers = '-';
                          }
                          if(this.total_no_of_other_staff == null){
                            this.total_no_of_other_staff = '-';
                          }
                          if(this.total_no_of_employess == null){
                            this.total_no_of_employess = '-';
                          }
                          if(this.designation == null){
                            this.designation = '-';
                          }
                         
                        
                        $('#get_sibling_dynamic').append(' <tr> <th>Start Date </th> <td> '+this.start_date+' </td><td> <input type="text" name="start_date" value="'+this.start_date+'"class="form-control datepicker " > </td></tr> <tr> <th>End Date </th>  <td> '+this.end_date+'</td> <td> <input type="text" name="end_date" value="'+this.end_date+'" class="form-control datepicker" > </td> </tr> <tr> <th>Occupation </th> <td> '+this.occupation+' </td><td> <input type="text" name="occupation" value="'+this.occupation+'"class="form-control "> </td></tr><tr> <th>Palce of Work</th> <td> '+this.place_of_work+' </td><td> <input type="text" name="place_of_work" value="'+this.place_of_work+'" class="form-control " > </td></tr><tr> <th>Country of Work </th> <td> '+this.country_of_work+' </td><td> <input type="text" name="country_of_work" value="'+this.country_of_work+'"class="form-control "> </td></tr><tr> <th>Designation </th> <td> '+this.designation+'</td><td> <input type="text" name="designation" value="'+this.designation+'"class="form-control "> </td></tr><tr> <th> Job Responsibilities </th> <td> '+this.job_responsibilities+' </td><td> <input type="text" name="job_responsibilities" value="'+this.job_responsibilities+'"class="form-control "> </td></tr><tr> <th> Contact Person Name </th> <td> '+this.contact_person_name+' </td><td> <input type="text" name="contact_person_name" value="'+this.contact_person_name+'"class="form-control "> </td></tr><tr> <th>Contact Person Designation </th> <td> '+this.contact_person_designation+' </td><td> <input type="text" name="contact_person_designation" value="'+this.contact_person_designation+'"class="form-control "> </td></tr><tr> <th>Contact Person Phone</th> <td> '+this.contact_person_phone+' </td><td> <input type="number" name="contact_person_phone" value="'+this.contact_person_phone+'"class="form-control "> </td></tr><tr> <th>Contact Person Email</th> <td> '+this.contact_person_email+' </td><td> <input type="email" name="contact_person_email" value="'+this.contact_person_email+'"class="form-control "> </td></tr><tr> <th>Total No of Employess in Company</th> <td> '+this.total_no_of_employess+' </td><td> <input type="number" name="total_no_of_employess" value="'+this.total_no_of_employess+'"class="form-control "> </td></tr><tr> <th>total No of Managers</th> <td> '+this.total_no_of_managers+' </td><td> <input type="number" name="total_no_of_managers" value="'+this.total_no_of_managers+'"class="form-control "> </td></tr><tr> <th>Total No of other Staff</th> <td> '+this.total_no_of_other_staff+' </td><td> <input type="number" name="total_no_of_other_staff" value="'+this.total_no_of_other_staff+'"class="form-control "> </td>  <input type="hidden" name="company_name" value="'+this.company_name+'"> </tr>');
                        $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
    
                        $('.get_education_dynamic_prev').hide();
                    })
    }
          
        $(document).ready(function(){
        // $('.update-button-client td').style.display= "table-cell ";
        $('#work_experience').find('table').find('tr').find('td:last').hide();
            $('#work_experience_edit').click(function(){
                var a  = $('#work_experience_edit').text();
                
                if(a == "Edit"){
                    $('#work_experience').find('table').find('tr').find('td:first').show();
                $('#work_experience').find('table').find('tr').find('td:last').hide();
                $('#work_experience').find('table').find('tr').find('input[type="submit"]').hide();        
                $('#work_experience_edit').text('Edit');
                }
                else{
    
                $('#work_experience_edit').text('Back');
                $('#work_experience').find('table').find('tr').find('td:first').hide();
                $('#work_experience').find('table').find('tr').find('td:last').show();
                $('#work_experience').find('table').find('tr').find('input[type="submit"]').show();
                }
            });
        });
            }
            });
            
            });
            });
           
            </script>
    
    
    
    
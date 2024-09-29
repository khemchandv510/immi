
<style>
#get_experience_dynamic td{
    width:50%;
}
.detail-page-tab-view tr:nth-child(1){
    background: #fff !important;
}
</style>

    <h4>Work Experience</h4>
<hr>


<div class=" " data-toggle="modal" data-target="#previous_company" >

        <div class="client-detail-edit-button">
        <p id="work_experience_edit"> Edit </p>    
        </div>
        
<ul class="nav nav-tabs" role="tablist" id="experience_nav"  style="display:flex">
    {{-- @dd($enq_experiences->count()) --}}
    @if($enq_experiences->count() > 0)
    @foreach($enq_experiences as $get)

        <li class="nav-item">
        <a class="nav-link   get_experience" href="#" role="tab"
        data-toggle="tab" data-id = "{{$get->company_name}}"  >{{$get->company_name}} </a>
        </li>
        @endforeach
        <li class="nav-item">
                <a class="nav-link   get_experience" href="#" role="tab"
                data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
                </li>
@else
<li class="nav-item">
    <a class="nav-link   get_experience" href="#" role="tab"
    data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
    </li>
    @endif
</ul>
{{Form::open(array('url' => 'update-experience'))}}
<table id="get_experience_dynamic"></table>
{{-- <div class="update-button-cli"><td> {{Form::submit("Update")}} </td></div> --}}



<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">


{{Form::close()}}


@if($enq_experiences->count() > 0)
@foreach($enq_experiences as $q) @endforeach



<div class="get-experience-dynamic"> 
  {{Form::open(array('url' => 'update-experience'))}}
  <table id="" class="">
    <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
<tr> <th>Start Date </th> <td> {{$q->start_date}} </td><td> <input type="text" name="start_date" value="{{$q->start_date}}"class="form-control datepicker " > </td></tr> <tr> <th>End Date </th>  <td> {{$q->end_date}}</td> <td> <input type="text" name="end_date" value="{{$q->end_date}}" class="form-control datepicker" > </td> </tr> <tr> <th>Occupation </th> <td> {{$q->occupation}} </td><td> <input type="text" name="occupation" value="{{$q->occupation}}"class="form-control "> </td></tr><tr> <th>Palce of Work</th> <td> {{$q->place_of_work}} </td><td> <input type="text" name="place_of_work" value="{{$q->place_of_work}}" class="form-control " > </td></tr><tr> <th>Country of Work </th> <td> {{$q->country_of_work}} </td><td> <input type="text" name="country_of_work" value="{{$q->country_of_work}}"class="form-control "> </td></tr><tr> <th>Designation </th> <td> {{$q->designation}}</td><td> <input type="text" name="designation" value="{{$q->designation}}"class="form-control "> </td></tr><tr> <th> Job Responsibilities </th> <td> {{$q->job_responsibilities}} </td><td> <input type="text" name="job_responsibilities" value="{{$q->job_responsibilities}}"class="form-control "> </td></tr><tr> <th> Contact Person Name </th> <td> {{$q->contact_person_name}} </td><td> <input type="text" name="contact_person_name" value="{{$q->contact_person_name}}"class="form-control "> </td></tr><tr> <th>Contact Person Designation </th> <td> {{$q->contact_person_designation}} </td><td> <input type="text" name="contact_person_designation" value="{{$q->contact_person_designation}}"class="form-control "> </td></tr><tr> <th>Contact Person Phone</th> <td> {{$q->contact_person_phone}} </td><td> <input type="number" name="contact_person_phone" value="{{$q->contact_person_phone}}"class="form-control "> </td></tr><tr> <th>Contact Person Email</th> <td> {{$q->contact_person_email}} </td><td> <input type="email" name="contact_person_email" value="{{$q->contact_person_email}}"class="form-control "> </td></tr><tr> <th>Total No of Employess in Company</th> <td> {{$q->total_no_of_employess}} </td><td> <input type="number" name="total_no_of_employess" value="{{$q->total_no_of_employess}}"class="form-control "> </td></tr><tr> <th>total No of Managers</th> <td> {{$q->total_no_of_managers}} </td><td> <input type="number" name="total_no_of_managers" value="{{$q->total_no_of_managers}}"class="form-control "> </td></tr><tr> <th>Total No of other Staff</th> <td> {{$q->total_no_of_other_staff}} </td><td> <input type="number" name="total_no_of_other_staff" value="{{$q->total_no_of_other_staff}}"class="form-control "> </td>  <input type="hidden" name="company_name" value="{{$q->company_name}}"> </tr> <tr> <th>  </th> <td>  </td><td> <input type="submit" class="form-control "> </td>   </tr>
</table>
</div>
@endif



</div>





<script>

        $(document).ready(function(){
        $(".get_experience").on("click", function(){
          $(".get-experience-dynamic").hide();
        var data_class = $(this).attr("data-id");
        var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
            
        
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        $.ajax({
        type: "get",
        url: "{{url('get_experience_company')}}?a="+unique_id+"&data_class="+data_class,
        
        success: function(data){

if(data  == 0){
    $('#get_experience_dynamic').empty();
   
    $('#get_experience_dynamic').append('<tr> <th> Company Name </th>   <td> <input type="text" name="company_name" class="form-control"> </td><td></td></tr><tr> <th>Start Date </th> <td> <input type="text" name="start_date" value=""class="form-control datepicker "> </td><td> </td></tr><tr> <th>End Date </th> <td> <input type="text" name="end_date" value="" class="form-control datepicker" > </td><td></td></tr><tr> <th>Occupation </th> <td> <input type="text" name="occupation" value=""class="form-control "> </td><td></td></tr><tr> <th>Palce of Work</th> <td> <input type="text" name="place_of_work" value="" class="form-control " > </td><td></td></tr><tr> <th>Country of Work </th> <td> <input type="text" name="country_of_work" value=""class="form-control "> </td><td></td></tr><tr> <th>Designation </th> <td> <input type="text" name="designation" value=""class="form-control "> </td><td></td></tr><tr> <th> Job Responsibilities </th> <td> <input type="text" name="job_responsibilities" value=""class="form-control "> </td><td></td></tr><tr> <th> Contact Person Name </th> <td> <input type="text" name="contact_person_name" value=""class="form-control "> </td><td></td></tr><tr> <th>Contact Person Designation </th> <td> <input type="text" name="contact_person_designation" value=""class="form-control "> </td><td></td></tr><tr> <th>Contact Person Phone</th> <td> <input type="number" name="contact_person_phone" value=""class="form-control "> </td><td></td></tr><tr> <th>Contact Person Email</th> <td> <input type="email" name="contact_person_email" value=""class="form-control "> </td><td></td></tr><tr> <th>Total No of Employess in Company</th> <td> <input type="number" name="total_no_of_employess" value=""class="form-control "> </td><td></td></tr><tr> <th>total No of Managers</th> <td> <input type="number" name="total_no_of_managers" value=""class="form-control "> </td><td></td></tr><tr> <th>Total No of other Staff</th> <td> <input type="number" name="total_no_of_other_staff" value=""class="form-control "> </td><td></td></tr>   <tr> <th></th> <td> <input type="submit" name="" value="Add" class=""> </td><td></td></tr> <tr> <td> </td> </tr> ') ;
    $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
    $('.get_education_dynamic_prev').hide();
}
else{
            $('#get_experience_dynamic').empty();
          
                    $.each(data, function(key, value){
                      if(this.start_date == null){
                        this.start_date = '';
                      }
                      if(this.end_date == null){
                        this.end_date = '';
                      }
                      if(this.occupation == null){
                        this.occupation = '';
                      }
                      if(this.place_of_work == null){
                        this.place_of_work = '';
                      }
                      if(this.country_of_work == null){
                        this.country_of_work = '';
                      }
                      if(this.job_responsibilities == null){
                        this.job_responsibilities = '';
                      }
                      if(this.contact_person_name == null){
                        this.contact_person_name = '';
                      }
                      if(this.contact_person_designation == null){
                        this.contact_person_designation = '';
                      }
                      if(this.contact_person_phone == null){
                        this.contact_person_phone = '';
                      }
                      if(this.contact_person_email == null){
                        this.contact_person_email = '';
                      }
                      if(this.total_no_of_managers == null){
                        this.total_no_of_managers = '';
                      }
                      if(this.total_no_of_other_staff == null){
                        this.total_no_of_other_staff = '';
                      }
                      if(this.total_no_of_employess == null){
                        this.total_no_of_employess = '';
                      }
                      if(this.designation == null){
                        this.designation = '';
                      }
                     
                    
                    $('#get_experience_dynamic').append(' <tr> <th>Start Date </th> <td> '+this.start_date+' </td><td> <input type="text" name="start_date" value="'+this.start_date+'"class="form-control datepicker " > </td></tr> <tr> <th>End Date </th>  <td> '+this.end_date+'</td> <td> <input type="text" name="end_date" value="'+this.end_date+'" class="form-control datepicker" > </td> </tr> <tr> <th>Occupation </th> <td> '+this.occupation+' </td><td> <input type="text" name="occupation" value="'+this.occupation+'"class="form-control "> </td></tr><tr> <th>Palce of Work</th> <td> '+this.place_of_work+' </td><td> <input type="text" name="place_of_work" value="'+this.place_of_work+'" class="form-control " > </td></tr><tr> <th>Country of Work </th> <td> '+this.country_of_work+' </td><td> <input type="text" name="country_of_work" value="'+this.country_of_work+'"class="form-control "> </td></tr><tr> <th>Designation </th> <td> '+this.designation+'</td><td> <input type="text" name="designation" value="'+this.designation+'"class="form-control "> </td></tr><tr> <th> Job Responsibilities </th> <td> '+this.job_responsibilities+' </td><td> <input type="text" name="job_responsibilities" value="'+this.job_responsibilities+'"class="form-control "> </td></tr><tr> <th> Contact Person Name </th> <td> '+this.contact_person_name+' </td><td> <input type="text" name="contact_person_name" value="'+this.contact_person_name+'"class="form-control "> </td></tr><tr> <th>Contact Person Designation </th> <td> '+this.contact_person_designation+' </td><td> <input type="text" name="contact_person_designation" value="'+this.contact_person_designation+'"class="form-control "> </td></tr><tr> <th>Contact Person Phone</th> <td> '+this.contact_person_phone+' </td><td> <input type="number" name="contact_person_phone" value="'+this.contact_person_phone+'"class="form-control "> </td></tr><tr> <th>Contact Person Email</th> <td> '+this.contact_person_email+' </td><td> <input type="email" name="contact_person_email" value="'+this.contact_person_email+'"class="form-control "> </td></tr><tr> <th>Total No of Employess in Company</th> <td> '+this.total_no_of_employess+' </td><td> <input type="number" name="total_no_of_employess" value="'+this.total_no_of_employess+'"class="form-control "> </td></tr><tr> <th>total No of Managers</th> <td> '+this.total_no_of_managers+' </td><td> <input type="number" name="total_no_of_managers" value="'+this.total_no_of_managers+'"class="form-control "> </td></tr><tr> <th>Total No of other Staff</th> <td> '+this.total_no_of_other_staff+' </td><td> <input type="number" name="total_no_of_other_staff" value="'+this.total_no_of_other_staff+'"class="form-control "> </td>  <input type="hidden" name="company_name" value="'+this.company_name+'"> </tr>  <tr> <td></td> <td> <div class="update-button-client">  {{Form::submit('Update')}}  </div>  <td> </tr>');
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



<script>

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
</script>

<script>
  // document.querySelector('#student_education_nav').children[].style="background:#2b6699; color:#fff";

  document.querySelector('#experience_nav').children[{{$enq_experiences->count()-1}}].firstElementChild.classList.add('active');
</script>



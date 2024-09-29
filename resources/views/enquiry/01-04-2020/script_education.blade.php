

<script>

        $(document).ready(function(){
        $(".get_education_by_class").on("click", function(){
            $('.get-education-dynamic').hide();
        var data_class = $(this).attr("data-id");
        var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        // var unique_id =$('.update_status').attr("data-id");
        $.ajax({
        type: "get",
        url: "{{url('get_education_by_class')}}?a="+unique_id+"&data_class="+data_class,
        
        success: function(data){

if(data  == 0){



      $('#education_edit').click(function(){
          
            var a  = $('#education_edit').text();
            if(a == "Back"){
                $('#education').find('table').find('tr').find('td:first').show();
            $('#education').find('table').find('tr').find('td:last').hide();
            $('#education').find('table').find('tr').find('input[type="submit"]').hide();        
            $('#education_edit').text('Edit');
            }
            else{
            $('#education_edit').text('Back');
            $('#education').find('table').find('tr').find('td:first').hide();
            $('#education').find('table').find('tr').find('td:last').show();
            $('#education').find('table').find('tr').find('input[type="submit"]').show();
            $('#education_edit').text('Back');
            }
        });



    // $('.add-qualification-button').show();
    $('#get_education_dynamic').empty();
    $('#get-education-dynamic').empty();
    $('#get_education_dynamic').append('<tr> <th> Name of Qualification </th> <td> <select name="name_of_class" class="form-control"> <?php $get_quelification=DB::table("highest_educations")->get(); foreach($get_quelification as $q){?> <option value="{{$q->education}}" >{{$q->education}}</option> <?php }?> </select> </td><td style="display:none"></td></tr><tr> <th>Name of Examination Board </th> <td> <input type="text" name="education_name" value=""class="form-control "> </td><td style="display:none"> </td></tr><tr> <th>Name of Institution </th> <td> <input type="text" name="institute_name" value="" class="form-control" > </td><td style="display:none"></td></tr><tr> <th>Course Start Date </th> <td> <input type="text" name="edu_start_date" value=""class="form-control date"> </td><td style="display:none"></td></tr><tr> <th>Course End Date</th> <td> <input type="text" name="edu_end_date" value="" class="form-control datepicker" > </td><td style="display:none"></td></tr><tr> <th>Course Duration </th> <td> <input type="text" name="course_duration" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th>Year of Award </th> <td> <input type="text" name="award_year" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th>Medium of Study </th> <td> <input type="text" name="study_medium" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th> Mode of Study </th> <td> <input type="text" name="mode_of_study" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th>Country of Study </th> <td> <input type="text" name="country_of_study" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th>State of Study</th> <td> <input type="text" name="state_of_study" value=""class="form-control "> </td><td style="display:none"></td></tr><tr> <th>City/Place of Study</th> <td> <input type="text" name="place_of_study" value="" class="form-control"> </td><td style="display:none"></td></tr>    <tr>  <th>  <input type="hidden" name="unique_id" value="{{session()->get('unique_id_sess')}}"> </th><th style="display:block">   {{Form::submit("Saves", array("display" => "block"))}}</th></tr>     ') ;
    $('.get_education_by_class_submit').show();
    $('#education_edit').hide();
    $('.datepicker').datepicker({});
    $('.get_education_dynamic_prev').hide();
    $('#get_education_dynamic tr td').css('padding',0);
    $('#education').find('table').find('tr').find('td:last').hide();
       
  
}
else{



    $('#education_edit').click(function(){
          
            var a  = $('#education_edit').text();
            if(a == "Back"){
                $('#education').find('table').find('tr').find('td:first').show();
            $('#education').find('table').find('tr').find('td:last').hide();
            $('#education').find('table').find('tr').find('input[type="submit"]').hide();        
            $('#education_edit').text('Edit');
            }
            else{
            $('#education_edit').text('Back');
            $('#education').find('table').find('tr').find('td:first').hide();
            $('#education').find('table').find('tr').find('td:last').show();
            $('#education').find('table').find('tr').find('input[type="submit"]').show();
            $('#education_edit').text('Back');
            }
        });


    // $('.get_education_by_class_submit').hide();
            $('#get_education_dynamic').empty();
            $('#education_edit').show();
            
                   
                      
                     
                    
                        //  Object.keys(data).forEach((key) => (data[key] == null) && delete data[key]); 
                         
            
            $.each(data, function(key, value){
                    
                    $('#get_education_dynamic').append('<tr> <th>Name of Examination Board </th> <td>'+this.education_name+'</td><td> <input type="hidden" name="name_of_class" value="'+this.class+'">  <input type="text" name="education_name" value="'+this.education_name+'"class="form-control "> </td></tr><tr> <th>Name of Institution </th> <td>'+this.institute_name+'</td><td> <input type="text" name="institute_name" value="'+this.institute_name+'" class="form-control" > </td></tr><tr> <th>Course Start Date </th> <td>'+this.edu_start_date+'</td><td> <input type="text" name="edu_start_date" value="'+this.edu_start_date+'"class="form-control date"> </td></tr><tr> <th>Course End Date</th> <td>'+this.edu_end_date+'</td><td> <input type="text" name="edu_end_date" value="'+this.edu_end_date+'" class="form-control datepicker" > </td></tr><tr> <th>Course Duration </th> <td>'+this.course_duration+'</td><td> <input type="text" name="course_duration" value="'+this.course_duration+'"class="form-control "> </td></tr><tr> <th>Year of Award </th> <td>'+this.award_year+'</td><td> <input type="text" name="award_year" value="'+this.award_year+'"class="form-control "> </td></tr><tr> <th>Medium of Study </th> <td>'+this.study_medium+'</td><td> <input type="text" name="study_medium" value="'+this.study_medium+'"class="form-control "> </td></tr><tr> <th> Mode of Study </th> <td>'+this.mode_of_study+'</td><td> <input type="text" name="mode_of_study" value="'+this.mode_of_study+'"class="form-control "> </td></tr><tr> <th>Country of Study </th> <td>'+this.country_of_study+'</td><td> <input type="text" name="country_of_study" value="'+this.country_of_study+'"class="form-control "> </td></tr><tr> <th>State of Study</th> <td>'+this.state_of_study+'</td><td> <input type="text" name="state_of_study" value="'+this.state_of_study+'"class="form-control "> </td></tr><tr> <th>City/Place of Study</th> <td>'+this.place_of_study+'</td><td> <input type="text" name="place_of_study" value="'+this.place_of_study+'"class="form-control "> </td></tr> <tr> <th></th> <td>  <input type="hidden" name="unique_id" value="{{session()->get('unique_id_sess')}}">  </td><td style="">{{Form::submit("Save", array("display" => "block"))}}     </td></tr> ');
                      
                    $('.datepicker').datepicker({});

                    $('.get_education_dynamic_prev').hide();
                })
}
      
    $(document).ready(function(){
    // $('.update-button-client td').style.display= "table-cell ";
    $('#education').find('table').find('tr').find('td:last').hide();
        $('#education_edit').click(function(){
            var a  = $('#education_edit').text();
            if(a == "Back"){
                $('#education').find('table').find('tr').find('td:first').show();
            $('#education').find('table').find('tr').find('td:last').hide();
            $('#education').find('table').find('tr').find('input[type="submit"]').hide();        
            $('#education_edit').text('Edit');
            }
            else{

            $('#education_edit').text('Back');
            $('#education').find('table').find('tr').find('td:first').hide();
            $('#education').find('table').find('tr').find('td:last').show();
            $('#education').find('table').find('tr').find('input[type="submit"]').show();
            }
        });
    });


        }
        });
        
        });
        });
       
        </script>



<script>
    var a   = {'a':"aa",'b':"bb",'c':null,'d':"dd"}
 Object.keys(a).forEach((key) => (a[key] == null) && delete a[key]);
console.log(a);

</script>
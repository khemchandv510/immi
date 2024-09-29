
<style> 
#get_score_dynamic td{
    width:50%;
}
.detail-page-tab-view tr:nth-child(1){
    background: #fff !important;
}
</style>

    <h4>English Language Test</h4>
<hr>


<div class="" data-toggle="modal" data-target="#" >

        <div class="client-detail-edit-button">
        <p id="english_language_test_edit"> Edit </p>    
        </div>




        

<ul class="nav nav-tabs" role="tablist" id="student_education_nav"  style="display:flex">
    {{-- @dd($enq_experiences->count()) --}}
    <?php 
    $get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                // ->where('listening','!=', null)
                ->get();
    ?>
    {{-- @dd($get_toefl) --}}
    @if($get_toefl->count() > 0)
    @foreach($get_toefl as $get)

        <li class="nav-item">
        <a class="nav-link   get_score" href="#" role="tab"
        data-toggle="tab" data-id = "{{$get->language}}"  >{{$get->language}} </a>
        </li>
        @endforeach
        {{-- <li class="nav-item">
                <a class="nav-link   get_score" href="#" role="tab"
                data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
                </li> --}}

{{-- <li class="nav-item">
    <a class="nav-link   get_score" href="#" role="tab"
    data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
    </li> --}}
    @endif
</ul>
{{Form::open(array('url' => 'update-score2'))}}
<table id="get_score_dynamic"></table>
{{-- <div class="update-button-cli"><td> {{Form::submit("Update")}} </td></div> --}}

<input type="text">

{{-- <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id"> --}}

{{-- <div class="update-button-client">  {{Form::submit('Update')}}  </div> --}}
{{Form::close()}}






@if($get_toefl->count() > 0)
@foreach($get_toefl as $q) @endforeach

<div class="get-score-dynamic"> 
  {{Form::open(array('url' => 'update-score'))}}
  <table id="" class="">
    <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">

<tr> <th> Select Given Exam </th> <td> '+this.language+' </td><td> <input type="text" name="language" value="'+this.language+'"class="form-control " > </td></tr><tr> <th>Enter Exam Reference No </th> <td> '+this.exm_reference_no+'</td><td> <input type="text" name="exm_reference_no" value="'+this.exm_reference_no+'" class="form-control " > </td></tr><tr> <th>Exam Type </th> <td> '+this.exam_type+' </td><td> <input type="text" name="exam_type" value="'+this.exam_type+'"class="form-control "> </td></tr><tr> <th>Listening</th> <td> '+this.listening+' </td><td> <input type="text" name="listening" value="'+this.listening+'" class="form-control " > </td></tr><tr> <th> Speaking </th> <td> '+this.speaking+' </td><td> <input type="text" name="speaking" value="'+this.speaking+'"class="form-control "> </td></tr><tr> <th>Reading </th> <td> '+this.reading+'</td><td> <input type="text" name="reading" value="'+this.reading+'"class="form-control "> </td></tr><tr> <th> Writing </th> <td> '+this.writing+' </td><td> <input type="text" name="writing" value="'+this.writing+'"class="form-control "> </td></tr><tr> <th>Overall (Score)</th> <td> '+this.overall+' </td><td> <input type="text" name="overall" value="'+this.overall+'"class="form-control "> </td></tr><tr> <th>Upload Score Card </th> <td> '+this.upload_score_card+' </td><td> <input type="text" name="upload_score_card" value="'+this.upload_score_card+'"class="form-control "> </td></tr><tr> <th>Country of Examiniation Center</th> <td> '+this.examination_country+' </td><td> <input type="number" name="examination_country" value="'+this.examination_country+'"class="form-control "> </td></tr><tr> <th>City of Examination Center</th> <td> '+this.examination_city+' </td><td> <input type="email" name="examination_city" value="'+this.examination_city+'"class="form-control "> </td></tr>
  </table>


</div>
@endif
</div>



<script>

        $(document).ready(function(){
        $(".get_score").on("click", function(){
            $('.get-score-dynamic').hide(); 
        var data_class = $(this).attr("data-id");
        var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
            
        
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        $.ajax({
        type: "get",
        url: "{{url('get_english_score')}}?a="+unique_id+"&data_class="+data_class,
        
        success: function(data){

if(data  == 0){
    // $('#get_score_dynamic').empty();
   
    $('#get_score_dynamic').append('<tr> <th> Select Given Exam </th> <td> <select name="language" id="" class="form-control"> <option value="TOEFL">TOEFL</option><option value="IELTS"></option>IELTS<option value="PTE">PTE</option><option value="OET">OET</option><option value="GRE">GRE</option><option value="GMAT">GMAT</option> </select> </td><td></td></tr><tr> <th>Enter Exam Reference No </th> <td> <input type="text" name="exm_reference_no" value=""class="form-control"> </td><td> </td></tr><tr> <th> Exam Type</th> <td> <input type="text" name="exam_type" value="" class="form-control " > </td><td></td></tr><tr> <th> Listening </th> <td> <select name="listening" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Speaking</th> <td> <select name="speaking" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Reading </th> <td> <select name="reading" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Writing </th> <td> <select name="writing" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th> Overall (Score) </th> <td> <input type="text" name="overall" value=""class="form-control "> </td><td></td></tr><tr> <th> Upload Score Card </th> <td> <input type="file" name="upload_score_card" value=""class="form-control "> </td><td></td></tr><tr> <th> Country of Examiniation Center </th> <td> <input type="text" name="examination_country" value=""class="form-control "> </td><td></td></tr><tr> <th>City of Examination Center</th> <td> <input type="text" name="examination_city" value=""class="form-control "> </td><td></td></tr>') ;
    $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
    $('.get_education_dynamic_prev').hide();
}
else{
            // $('#get_score_dynamic').empty();
          
                    $.each(data, function(key, value){
                      if(this.exm_reference_no == null){
                        this.exm_reference_no = '-';
                      }
                      if(this.language == null){
                        this.language = '-';
                      }
                      if(this.exam_type == null){
                        this.exam_type = '-';
                      }
                      if(this.listening == null){
                        this.listening = '-';
                      }
                      if(this.speaking == null){
                        this.speaking = '-';
                      }
                      if(this.reading == null){
                        this.reading = '-';
                      }
                      if(this.writing == null){
                        this.writing = '-';
                      }
                      if(this.overall == null){
                        this.overall = '-';
                      }
                      if(this.upload_score_card == null){
                        this.upload_score_card = '-';
                      }
                      if(this.examination_country == null){
                        this.examination_country = '-';
                      }
                      if(this.examination_city == null){
                        this.examination_city = '-';
                      }
                     
                     
                    
                    $('#get_score_dynamic').append(' <tr> <th> Select Given Exam </th> <td> '+this.language+' </td><td> <input type="text" name="language" value="'+this.language+'"class="form-control " > </td></tr><tr> <th>Enter Exam Reference No </th> <td> '+this.exm_reference_no+'</td><td> <input type="text" name="exm_reference_no" value="'+this.exm_reference_no+'" class="form-control " > </td></tr><tr> <th>Exam Type </th> <td> '+this.exam_type+' </td><td> <input type="text" name="exam_type" value="'+this.exam_type+'"class="form-control "> </td></tr><tr> <th>Listening</th> <td> '+this.listening+' </td><td> <input type="text" name="listening" value="'+this.listening+'" class="form-control " > </td></tr><tr> <th> Speaking </th> <td> '+this.speaking+' </td><td> <input type="text" name="speaking" value="'+this.speaking+'"class="form-control "> </td></tr><tr> <th>Reading </th> <td> '+this.reading+'</td><td> <input type="text" name="reading" value="'+this.reading+'"class="form-control "> </td></tr><tr> <th> Writing </th> <td> '+this.writing+' </td><td> <input type="text" name="writing" value="'+this.writing+'"class="form-control "> </td></tr><tr> <th>Overall (Score)</th> <td> '+this.overall+' </td><td> <input type="text" name="overall" value="'+this.overall+'"class="form-control "> </td></tr><tr> <th>Upload Score Card </th> <td> '+this.upload_score_card+' </td><td> <input type="text" name="upload_score_card" value="'+this.upload_score_card+'"class="form-control "> </td></tr><tr> <th>Country of Examiniation Center</th> <td> '+this.examination_country+' </td><td> <input type="number" name="examination_country" value="'+this.examination_country+'"class="form-control "> </td></tr><tr> <th>City of Examination Center</th> <td> '+this.examination_city+' </td><td> <input type="email" name="examination_city" value="'+this.examination_city+'"class="form-control "> </td></tr>');
                    $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});

                    $('.get_education_dynamic_prev').hide();
                })
}
      
    $(document).ready(function(){
    // $('.update-button-client td').style.display= "table-cell ";
    $('#english_language_test').find('table').find('tr').find('td:last').hide();
        $('#english_language_test_edit').click(function(){
            var a  = $('#english_language_test_edit').text();
          
            if(a == "Back"){
                $('#work_experience').find('table').find('tr').find('td:first').show();
            $('#english_language_test').find('table').find('tr').find('td:last').hide();
            $('#english_language_test').find('table').find('tr').find('input[type="submit"]').show();        
            $('#english_language_test_edit').text('Edit');
            }
            else{

            $('#english_language_test_edit').text('Back');
            $('#english_language_test').find('table').find('tr').find('td:first').hide();
            $('#english_language_test').find('table').find('tr').find('td:last').show();
            $('#english_language_test').find('table').find('tr').find('input[type="submit"]').hide();
            }
        });
    });
        }
        });
        
        });
        });
       
        </script>






{{-- 
 <tr> <th>
    Select Given Exam </th> <td> '+this.language+' </td><td> <input type="text" name="language" value="'+this.language+'"class="form-control  " > </td></tr>
     <tr> <th>Enter Exam Reference No </th>  <td> '+this.exm_reference_no+'</td> <td> <input type="text" name="exm_reference_no" value="'+this.exm_reference_no+'" class="form-control " > </td> </tr> 
    
    
        <tr> <th>Exam Type </th> <td> '+this.exam_type+' </td><td> <input type="text" name="exam_type" value="'+this.exam_type+'"class="form-control "> </td></tr>
        
        <tr> <th>Listening</th> <td> '+this.listening+' </td><td> <input type="text" name="listening" value="'+this.listening+'" class="form-control " > </td></tr>
        
        <tr> <th> Speaking </th> <td> '+this.speaking+' </td><td> <input type="text" name="speaking" value="'+this.speaking+'"class="form-control "> </td></tr>
        
        
        <tr> <th>Reading </th> <td> '+this.reading+'</td><td> <input type="text" name="reading" value="'+this.reading+'"class="form-control "> </td></tr>
        
        <tr> <th> Writing </th> <td> '+this.writing+' </td><td> <input type="text" name="writing" value="'+this.writing+'"class="form-control "> </td></tr>
        
        <tr> <th>Overall (Score)</th> <td> '+this.overall+' </td><td> <input type="text" name="overall" value="'+this.overall+'"class="form-control "> </td></tr>
        
        <tr> <th>Upload Score Card </th> <td> '+this.upload_score_card+' </td><td> <input type="text" name="upload_score_card" value="'+this.upload_score_card+'"class="form-control "> </td></tr>
        
        <tr> <th>Country of Examiniation Center</th> <td> '+this.examination_country+' </td><td> <input type="number" name="examination_country" value="'+this.examination_country+'"class="form-control "> </td></tr><tr> <th>City of Examination Center</th> <td> '+this.examination_city+' </td><td> <input type="email" name="examination_city" value="'+this.examination_city+'"class="form-control "> </td></tr>
    
    
    
     --}}
    
    
    
    



{{-- <tr> <th> Select Given Exam  </th>   <td> <select name="language" id="" class="form-control"> <option value="TOEFL">TOEFL</option><option value="IELTS"></option>IELTS<option value="PTE">PTE</option><option value="OET">OET</option><option value="GRE">GRE</option><option value="GMAT">GMAT</option>  </select>  </td><td></td></tr><tr> <th>Enter Exam Reference No </th> <td> <input type="text" name="exm_reference_no" value=""class="form-control"> </td> <td> </td></tr><tr> <th>  Exam Type</th> <td> <input type="text" name="exam_type" value="" class="form-control " > </td><td></td></tr><tr> <th> Listening </th> <td>     <select name="listening" id="" class="form-control"> <option value="{{$scores->listening}}" selected>{{$scores->listening}}</option>  @for($i=10; $i<=90; $i++)    
    <option value={{$i}}>{{$i}}</option>
     @endfor </select>    </td><td></td></tr>
     
     <tr> <th>Speaking</th> <td>   <select name="speaking" id="" class="form-control"> <option value="{{$scores->speaking}}" selected>{{$scores->speaking}}</option>  @for($i=10; $i<=90; $i++)    
        <option value={{$i}}>{{$i}}</option>
         @endfor </select>  </td><td></td></tr>
         
         <tr> <th>Reading </th> <td>   <select name="reading" id="" class="form-control"> <option value="{{$scores->reading}}" selected>{{$scores->reading}}</option>   @for($i=10; $i<=90; $i++)    
            <option value={{$i}}>{{$i}}</option>
             @endfor </select>   </td><td></td></tr>
             
             <tr> <th>Writing </th> <td>  <select name="writing" id="" class="form-control"> <option value="{{$scores->writing}}" selected>{{$scores->writing}}</option>  @for($i=10; $i<=90; $i++)    
                <option value={{$i}}>{{$i}}</option>
                 @endfor </select>  </td><td></td></tr>
                 
                 
                 <tr> <th> Overall (Score) </th> <td> <input type="text" name="overall" value=""class="form-control "> </td><td></td></tr>
                 <tr> <th> Upload Score Card </th> <td> <input type="file" name="upload_score_card" value=""class="form-control "> </td><td></td></tr>
                 <tr> <th> Country of Examiniation Center </th> <td> <input type="text" name="examination_country" value=""class="form-control "> </td><td></td></tr>
                 <tr> <th>City of Examination Center</th> <td> <input type="text" name="examination_city" value=""class="form-control "> </td><td></td></tr>
                 
                 --}}
<?php
use App\Helpers\Helper;
?>

<style> 
#get_score_dynamic td{
    width:50%;
}
.detail-page-tab-view tr:nth-child(1){
    background: #fff !important;
}
.grade-score{
  display: none;
}
</style>

    <h4>English Language Test</h4>
<hr>


<div class="" data-toggle="modal" data-target="#" >

        {{-- <div class="client-detail-edit-button">


        <p data-toggle="modal" data-target="#english_language_test_edit" class="">Edit</p>         
        
        </div> --}}




        

<ul class="nav nav-tabs english-text" role="tablist" id=""  style="display:flex">
    {{-- @dd($enq_experiences->count()) --}}
    {{-- @dd($get_toefl) --}}
     @if($get_toefl->count() > 0)
    @foreach($get_toefl as $get)

        <li class="nav-item">
        <a class="nav-link   get_score" href="#get_lang{{$get->language}}" role="tab"
        data-toggle="tab" data-id = "{{$get->language}}"  >{{$get->language}} </a>
        </li>
        @endforeach
        @if($get_toefl->count()  < 4)
        <li class="nav-item">
                <a class="nav-link   get_score" data-target="#english_score_add" role="tab"
                data-toggle="modal" data-id = "add_more_class"  > Add More.. </a>
                </li>
                @endif
    @else
<li class="nav-item">
    <a class="nav-link   get_scor" data-target="#english_score_add" role="tab"
    data-toggle="modal" data-id = "" data > Add English Score </a>
        </li>
    @endif   
</ul>
{{-- {{Form::open(array('url' => 'update-score2'))}}
<table id="get_score_dynamic"></table> --}}
{{-- <div class="update-button-cli"><td> {{Form::submit("Update")}} </td></div> --}}



{{-- <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id"> --}}

{{-- <div class="update-button-client">  {{Form::submit('Update')}}  </div> --}}
{{-- {{Form::close()}} --}}




  
  


@if($get_toefl->count() > 0)
<div class="tab-content content-style  my-4" id="">
@foreach($get_toefl as $q) 

<div role="tabpane" class="tab-pane " id="get_lang{{$q->language}}">
  <div style="text-align: right; margin-bottom: 10px;">
    <button data-toggle="modal" data-target="#english_language_test_edit{{$q->id}}" class="edit-button-design">Edit</button>    
    <a class="delete-button-design" onclick="return confirm('Are you sure to delete this?')" href="{{url('delete-score?id='.$q->id.'&exam_name='.$q->language)}}"> Delete </a>     
    
  </div>




{{-- start edit section  --}}
<div id="english_language_test_edit{{$q->id}}" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Edit English Score</h4>
        </div>
        <div class="modal-body">




  
    {{Form::open(array('url' => 'update-score', 'files'=>true))}}
          <table id="" class="">
           <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
           <tr>
             <th>Select Given Exam Edit section</th>
             
             <td>{{$q->language}}
             <input type="hidden" name="language" value="{{$q->language}}" class="form-control" placeholder="language" >
             </td>
           </tr>
           <tr>
             <th>Enter Exam Reference No</th>
             
             <td>
               <input type="text" name="exm_reference_no" value="{{$q->exm_reference_no}}" class="form-control " placeholder="Exam Ref. No">
             </td>
           </tr>
           <tr>
             <th>Exam Type</th>
             
             <td>
               <input type="text" name="exam_type" value="{{$q->exam_type}}" class="form-control " placeholder="Exam Type">
             </td>

             
           </tr>
           
           
           <tr>
             <th>Listening </th>      
      <?php
if($q->language == "OET"){
        ?>
<td> <select name="listening" id="" class="form-control">
  <option selected="" value=""> Choose Grade</option>
  <option value="A"> A</option>
  <option value="B"> B</option>
  <option value="C+"> C+</option>
  <option value="C"> C</option>
  <option value="D"> D</option>
  <option value="E"> E</option>
</select>
<input class="form-control" placeholder="Enter Score"  onkeypress="if(this.value.length==3) return false;" name="listening_score" type="number">
</td><?php
      }
      else{ ?>
      <td>
    <input type="text" name="listening" value="{{$q->listening}}" class="form-control ">
      </td>
      <?php }  ?>
    </tr>

           <tr>
             <th>Speaking</th>
             
             <?php
             if($q->language == "OET"){
                     ?>
             <td> <select name="speaking" id="" class="form-control">
               <option selected="" value=""> Choose Grade</option>
               <option value="A"> A</option>
               <option value="B"> B</option>
               <option value="C+"> C+</option>
               <option value="C"> C</option>
               <option value="D"> D</option>
               <option value="E"> E</option>
             </select>
             <input class="form-control" placeholder="Enter Score"  onkeypress="if(this.value.length==3) return false;" name="speaking_score" type="number">
             </td><?php
                   }
                   else{ ?>
                   <td>
                 <input type="text" name="speaking" value="{{$q->speaking}}" class="form-control ">
                   </td>
                   <?php }  ?>
           <tr>
             <th>Reading</th>
             <?php
             if($q->language == "OET"){
                     ?>
             <td> <select name="reading" id="" class="form-control">
               <option selected="" value=""> Choose Grade</option>
               <option value="A"> A</option>
               <option value="B"> B</option>
               <option value="C+"> C+</option>
               <option value="C"> C</option>
               <option value="D"> D</option>
               <option value="E"> E</option>
             </select>
             <input class="form-control" placeholder="Enter Score"  onkeypress="if(this.value.length==3) return false;" name="reading_score" type="number">
             </td><?php
                   }
                   else{ ?>
                   <td>
                 <input type="text" name="reading" value="{{$q->reading}}" class="form-control ">
                   </td>
                   <?php }  ?>
           </tr>
           <tr>
             <th>Writing</th>
             
             <?php
             if($q->language == "OET"){
                     ?>
             <td> <select name="writing" id="" class="form-control">
               <option selected="" value=""> Choose Grade</option>
               <option value="A"> A</option>
               <option value="B"> B</option>
               <option value="C+"> C+</option>
               <option value="C"> C</option>
               <option value="D"> D</option>
               <option value="E"> E</option>
             </select>
             <input class="form-control" placeholder="Enter Score"  onkeypress="if(this.value.length==3) return false;" name="writing_score" type="number">
             </td><?php
                   }
                   else{ ?>
                   <td>
                 <input type="text" name="writing" value="{{$q->writing}}" class="form-control ">
                   </td>
                   <?php }  ?>
           </tr>
           <tr>
             <th>Overall (Score)</th>
             
             <td>
               <input type="text" name="overall" value="{{$q->writing}}" class="form-control " placeholder="Overall">
             </td>
           </tr>
           <tr>
             <th>Upload Score Card</th>
             
             <td>
               <input type="file" name="upload_score_card" value="" class="form-control " placeholder="Upload Score Card" accept="image/*,.pdf">
               <input type="hidden" name="upload_score_card_hidden" value="{{$q->upload_score_card}}">
             </td>
           </tr>
           <tr>
             <th>Country of Examiniation Center</th>
             
             <td>
               <input type="text" name="examination_country" value="{{$q->examination_country}}" class="form-control " placeholder="Examination Country">
             </td>
           </tr>
           <tr>
             <th>City of Examination Center</th>
             
             <td>
               <input type="text" name="examination_city" value="{{$q->examination_city}}" class="form-control " placeholder="Examination City">
             </td>
           </tr>
         </table>
         {{Form::submit('Save')}}
         {{Form::close()}}
  
        </div></div></div></div>

{{-- end edit section --}}



<div class="get-score-dynamic"> 
  <table id="" class="">

    <tr>
      <th>Select Given Exam display</th>
      
      <td>
      {{$q->language}}
      </td>
    </tr>
    <tr>
      <th>Enter Exam Reference No </th>
      
      <td>
      {{$q->exm_reference_no}}
      </td>
    </tr>
    <tr>
      <th>Exam Type</th>
      
      <td>
      {{$q->exam_type}}
      </td>
    </tr>
    <?php
        $arr =  json_decode($q->listening ,true);
        if(isset($arr['grade'])){
         ?>
<tr><th>Listening Grade</th>
<td>  
  {{$arr['grade']}}
</td>
</tr>
<tr><th>Listning score</th>
<td>  
  {{$arr['score']}}
</td>
</tr>
<?php } else{ ?>
    <tr>
      <th>Listening</th>
      
      <td>
        <?php
        if($q->language == "OET"){
          $a = json_decode($q->listening,false);
          echo$a[0]  .', '. $a[1];
        }
        else{
         
      echo $q->listening;
        }
        ?>
      </td>
    </tr>

 <?php  }?>




    <tr>
      <th>Speaking</th>
      
      <td>
        <?php
        if($q->language == "OET"){
          $a = json_decode($q->speaking,false);
          echo$a[0]  .', '. $a[1];
        }
        else{
         
      echo $q->speaking;
        }
        ?>
      </td>
    </tr>
    <tr>
      <th>Reading</th>
      
      <td>
        <?php
        if($q->language == "OET"){
          $a = json_decode($q->reading,false);
          echo$a[0]  .', '. $a[1];
        }
        else{
         
      echo $q->reading;
        }
        ?>
      </td>
    </tr>
    <tr>
      <th>Writing</th>
      
      <td>
        <?php
        if($q->language == "OET"){
          $a = json_decode($q->writing,false);
          echo$a[0]  .', '. $a[1];
        }
        else{
         
      echo $q->writing;
        }
        ?>
      </td>
    </tr>
    <tr>
      <th>Overall (Score)</th>
      
      <td>
      {{$q->overall}}
      </td>
    </tr>
    <tr>
      <th>Upload Score Card</th>
      
      <td>
          
        <a target ="_blank" href="{{url('public\uploads\documents\english-score/'.$q->enquiry_id.'/'.$q->upload_score_card)}}">{{$q->upload_score_card}}</a>
      
      </td>
    </tr>
    <tr>
      <th>Country of Examiniation Center</th>
      
      <td>
      {{$q->examination_country}}
      </td>
    </tr>
    <tr>
      <th>City of Examination Center</th>
      
      <td>
        {{$q->examination_city}}
      </td>
    </tr>
  </table>
</div>

</div>
@endforeach
</div>
@endif
</div>












<script>

//         $(document).ready(function(){
//         $(".get_score").on("click", function(){
//             $('.get-score-dynamic').hide(); 
//         var data_class = $(this).attr("data-id");
//         var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
            
        
        
//         $.ajaxSetup({
//         headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//         });
        
//         $.ajax({
//         type: "get",
//         url: "{{url('get_english_score')}}?a="+unique_id+"&data_class="+data_class,
        
//         success: function(data){

// if(data  == 0){
//     // $('#get_score_dynamic').empty();
   
//     $('#get_score_dynamic').append('<tr> <th> Select Given Exam </th> <td> <select name="language" id="" class="form-control"> <option value="TOEFL">TOEFL</option><option value="IELTS"></option>IELTS<option value="PTE">PTE</option><option value="OET">OET</option><option value="GRE">GRE</option><option value="GMAT">GMAT</option> </select> </td><td></td></tr><tr> <th>Enter Exam Reference No </th> <td> <input type="text" name="exm_reference_no" value=""class="form-control"> </td><td> </td></tr><tr> <th> Exam Type</th> <td> <input type="text" name="exam_type" value="" class="form-control " > </td><td></td></tr><tr> <th> Listening </th> <td> <select name="listening" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Speaking</th> <td> <select name="speaking" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Reading </th> <td> <select name="reading" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th>Writing </th> <td> <select name="writing" id="" class="form-control"> <option value="" selected></option> @for($i=10; $i<=90; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> </td><td></td></tr><tr> <th> Overall (Score) </th> <td> <input type="text" name="overall" value=""class="form-control "> </td><td></td></tr><tr> <th> Upload Score Card </th> <td> <input type="file" name="upload_score_card" value=""class="form-control "> </td><td></td></tr><tr> <th> Country of Examiniation Center </th> <td> <input type="text" name="examination_country" value=""class="form-control "> </td><td></td></tr><tr> <th>City of Examination Center</th> <td> <input type="text" name="examination_city" value=""class="form-control "> </td><td></td></tr>') ;
//     $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
//     $('.get_education_dynamic_prev').hide();
// }
// else{
//             // $('#get_score_dynamic').empty();
          
//                     $.each(data, function(key, value){
//                       if(this.exm_reference_no == null){
//                         this.exm_reference_no = '-';
//                       }
//                       if(this.language == null){
//                         this.language = '-';
//                       }
//                       if(this.exam_type == null){
//                         this.exam_type = '-';
//                       }
//                       if(this.listening == null){
//                         this.listening = '-';
//                       }
//                       if(this.speaking == null){
//                         this.speaking = '-';
//                       }
//                       if(this.reading == null){
//                         this.reading = '-';
//                       }
//                       if(this.writing == null){
//                         this.writing = '-';
//                       }
//                       if(this.overall == null){
//                         this.overall = '-';
//                       }
//                       if(this.upload_score_card == null){
//                         this.upload_score_card = '-';
//                       }
//                       if(this.examination_country == null){
//                         this.examination_country = '-';
//                       }
//                       if(this.examination_city == null){
//                         this.examination_city = '-';
//                       }
                     
                     
                    
//                     $('#get_score_dynamic').append(' <tr> <th> Select Given Exam </th> <td> '+this.language+' </td><td> <input type="text" name="language" value="'+this.language+'"class="form-control " > </td></tr><tr> <th>Enter Exam Reference No </th> <td> '+this.exm_reference_no+'</td><td> <input type="text" name="exm_reference_no" value="'+this.exm_reference_no+'" class="form-control " > </td></tr><tr> <th>Exam Type </th> <td> '+this.exam_type+' </td><td> <input type="text" name="exam_type" value="'+this.exam_type+'"class="form-control "> </td></tr><tr> <th>Listening</th> <td> '+this.listening+' </td><td> <input type="text" name="listening" value="'+this.listening+'" class="form-control " > </td></tr><tr> <th> Speaking </th> <td> '+this.speaking+' </td><td> <input type="text" name="speaking" value="'+this.speaking+'"class="form-control "> </td></tr><tr> <th>Reading </th> <td> '+this.reading+'</td><td> <input type="text" name="reading" value="'+this.reading+'"class="form-control "> </td></tr><tr> <th> Writing </th> <td> '+this.writing+' </td><td> <input type="text" name="writing" value="'+this.writing+'"class="form-control "> </td></tr><tr> <th>Overall (Score)</th> <td> '+this.overall+' </td><td> <input type="text" name="overall" value="'+this.overall+'"class="form-control "> </td></tr><tr> <th>Upload Score Card </th> <td> '+this.upload_score_card+' </td><td> <input type="text" name="upload_score_card" value="'+this.upload_score_card+'"class="form-control "> </td></tr><tr> <th>Country of Examiniation Center</th> <td> '+this.examination_country+' </td><td> <input type="number" name="examination_country" value="'+this.examination_country+'"class="form-control "> </td></tr><tr> <th>City of Examination Center</th> <td> '+this.examination_city+' </td><td> <input type="email" name="examination_city" value="'+this.examination_city+'"class="form-control "> </td></tr>');
//                     $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});

//                     $('.get_education_dynamic_prev').hide();
//                 })
// }
      
//     $(document).ready(function(){
//     // $('.update-button-client td').style.display= "table-cell ";
//     $('#english_language_test').find('table').find('tr').find('td:last').hide();
//         $('#english_language_test_edit').click(function(){
//             var a  = $('#english_language_test_edit').text();
          
//             if(a == "Back"){
//                 $('#work_experience').find('table').find('tr').find('td:first').show();
//             $('#english_language_test').find('table').find('tr').find('td:last').hide();
//             $('#english_language_test').find('table').find('tr').find('input[type="submit"]').show();        
//             $('#english_language_test_edit').text('Edit');
//             }
//             else{

//             $('#english_language_test_edit').text('Back');
//             $('#english_language_test').find('table').find('tr').find('td:first').hide();
//             $('#english_language_test').find('table').find('tr').find('td:last').show();
//             $('#english_language_test').find('table').find('tr').find('input[type="submit"]').hide();
//             }
//         });
//     });
//         }
//         });
        
//         });
//         });
       
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




                 {{-- modal --}}
                 <div id="english_score_add" class="modal fade " role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add English Language Score</h4>
                        </div>
                        <div class="modal-body">
                          {{Form::open(array('url' => 'update-score', 'files'=>true))}}
                 <table id="" class="">
                  <input type="hidden" name="unique_id" value="{{Session()->get('unique_id_sess')}}">
                  <tr>
                    <th>Select Given Exam</th>
                    
                    <td>
                      {{-- <input type="text" name="" value="" class="form-control" placeholder="language"> --}}
                      <select name="language" id="language">
                        <option value=""disabled seleted>Select Exam</option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="IELTS">IELTS</option>
                        <option value="PTE">PTE</option>
                        <option value="OET">OET</option>
                        
                      </select>

                    </td>
                  </tr>
                  <tr>
                    <th>Enter Exam Reference No</th>
                    
                    <td>
                      <input type="text" name="exm_reference_no" value="" class="form-control " placeholder="Exam Ref. No">
                    </td>
                  </tr>
                  <tr>
                    <th>Exam Type</th>
                    
                    <td>
                      <input type="text" name="exam_type" value="" class="form-control " placeholder="Exam Type">
                    </td>
                  </tr>
                  
                  
                  <tr class="grade-score" >
                    <th>Listening Grade</th>
                    
                    <td>

                      <input type="text" name="listening_grade"  class="form-control " placeholder="Listening Grade">
                    </td>
                  </tr>
<tr class="grade-score" ><th>Listning score</th>
<td>
  <input type="text" name="listening_score"  class="form-control " placeholder="Listening Score">
</td>
</tr>


<tr class="score-only">
  <th>Listening</th>
  
  <td>
    
  <input type="text" name="listening" value="{{--$q->listening--}}" class="form-control " placeholder="Listening">
  </td>
</tr>













<tr class="grade-score" >
  <th>Speaking Grade</th>
  <td>
    <select name="speaking_grade" id="" class="form-control ">
<option value="A">A</option>
<option value="B">B</option>
<option value="C+">C+</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
    </select>
  </td>
</tr>

<tr class="grade-score" ><th>Speaking score</th>
<td>
<input type="text" name="speaking_score"  class="form-control " placeholder="Speaking Score">
</td>
</tr>

                  <tr class="score-only">
                    <th>Speaking</th>
                    
                    <td>
                      <input type="text" name="speaking" value="" class="form-control " placeholder="Speaking">
                    </td>
                  </tr>











                  
<tr class="grade-score" >
  <th>Reading Grade</th>
  <td>
    <select name="reading_grade" id="" class="form-control ">
<option value="A">A</option>
<option value="B">B</option>
<option value="C+">C+</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
    </select>
  </td>
</tr>

<tr class="grade-score" ><th>Reading score</th>
<td>
<input type="text" name="reading_score"  class="form-control " placeholder="Reading Score">
</td>
</tr>


                  <tr class="score-only">
                    <th>Reading</th>
                    
                    <td>
                      <input type="text" name="reading" value="" class="form-control " placeholder="Reading">
                    </td>
                  </tr>
















             
                  <tr class="grade-score" >
                    <th>Writing Grade</th>
                    <td>
                      <select name="writing_grade" id="" class="form-control ">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C+">C+</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                      </select>
                    </td>
                  </tr>
                  
                  <tr class="grade-score" ><th>Writing score</th>
                  <td>
                  <input type="text" name="writing_score"  class="form-control " placeholder="Writing Score">
                  </td>
                  </tr>

                  <tr class="score-only">
                    <th>Writing</th>
                    
                                        <td>
                      <input type="text" name="writing" value="" class="form-control " placeholder="Writing">
                    </td>
                  </tr>
                  <tr>
                    <th>Overall (Score)</th>
                    
                    <td>
                      <input type="text" name="overall" value="" class="form-control " placeholder="Overall">
                    </td>
                  </tr>
                  <tr>
                    <th>Upload Score Card</th>
                    
                    <td>
                      <input type="file" name="upload_score_card" value="" class="form-control " placeholder="Upload Score Card">
                    </td>
                  </tr>
                  <tr>
                    <th>Country of Examiniation Center</th>
                    
                    <td>
                      <input type="text" name="examination_country" value="" class="form-control " placeholder="Examination Country">
                    </td>
                  </tr>
                  <tr>
                    <th>City of Examination Center</th>
                    
                    <td>
                      <input type="text" name="examination_city" value="" class="form-control " placeholder="Examination City">
                    </td>
                  </tr>
                </table>
                {{Form::submit('Save')}}
                {{Form::close()}}
                        </div></div></div></div>
















                        <h4>Other Language </h4>
                        <hr>
{{-- start gre gmat --}}
<div>
  
  <ul class="nav nav-tabs" role="tablist" id=""  style="display:flex">
    <?php 
  $gre_gmat =  Helper::gre_gmat_language_scores(session()->get('unique_id_sess'));

    
    ?>
     @if($gre_gmat->count() > 0)
    @foreach($gre_gmat as $get)
        <li class="nav-item">
        <a class="nav-link   get_score" href="#get_lang{{$get->language}}" role="tab"
        data-toggle="tab" data-id = "{{$get->language}}"  >{{$get->language}} </a>
        </li>
        @endforeach
        @if($gre_gmat->count()  < 2)
        <li class="nav-item">
                <a class="nav-link   get_score" data-target="#english_score_add_gre_gmat" role="tab"
                data-toggle="modal" data-id = "add_more_class"  > Add More.. </a>
                </li>
                @endif
    @else
  <li class="nav-item">
    <a class="nav-link   get_scor" data-target="#english_score_add_gre_gmat" role="tab"
    data-toggle="modal" data-id = "" data > Add English Score </a>
        </li>
    @endif   
  </ul>


    {{-- <p>Aditional </p> --}}
    
  


  @if($gre_gmat->count() > 0)
  <div class="tab-content content-style  my-4" id="">
  @foreach($gre_gmat as $q) 
  <div role="tabpane" class="tab-pane " id="get_lang{{$q->language}}">
    <div style="text-align: right">
      <button data-toggle="modal" data-target="#english_language_test_edit{{$q->id}}" class="">Edit</button>         
      <a class="delete-button-design" onclick="return confirm('Are you sure to delete this?')" href="{{url('delete-gre-gmat-score?id='.$q->id.'&exam_name='.$q->language)}}"> Delete </a> 
    </div>
    <table class="table"><tr>
  <tr><th>Exam</th><td>{{$q->language}}</td></tr>
    <th>
       Exam Date</th>
  <td>{{$q->gre_exam_date}}</td>
</tr>
<tr><th>Verbal</th><td>{{$q->gre_verbal_score}}, {{$q->gre_verbal_rank}}</td></tr>
<tr><th>Quantitative</th><td>{{$q->gre_quantitative_score}}, {{$q->gre_quantitative_rank}}</td></tr>
<tr><th>Written</th><td>{{$q->gre_written_score}}, {{$q->gre_written_rank}}</td></tr>
<tr><th>Written</th><td>{{$q->gmat_total_score}}, {{$q->gmat_total_rank}}</td> </tr>
</table>
  


  {{-- start edit section  --}}
  <div id="english_language_test_edit{{$q->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Score</h4>
          </div>
          <div class="modal-body">
{{Form::open(array('url'=>'add-gre-gmat'))}}
            <table class="table"><tr>
  <tr><th>Exam</th><td>{{$q->language}} <input type="hidden" value="{{$q->language}}" name="language">  <input type="hidden" name="unique_id" value="{{$q->enquiry_id}}">  </td></tr>
  <tr>
    <th>
       Exam Date</th>
  <td> <input type="text" name="exam_date" class="date form-control" value="{{$q->gre_exam_date}}" placeholder="Exam Date"> </td>
</tr>
<tr><th>Verbal</th><td>
   <input type="text" name="verbal_score" class=" form-control" placeholder=" Score" placeholder="Score" value="{{$q->gre_verbal_score}}">
    <input type="text" name="verbal_rank" id="" class=" form-control" placeholder="Rank" value="{{$q->gre_verbal_rank}}">
   </td>
  </tr>
<tr><th>Quantitative</th><td>
   <input type="text" name="quantitative_score"class=" form-control" placeholder="Score" value="{{$q->gre_quantitative_score}}">
    <input type="text" name="quantitative_rank" id="" class=" form-control" placeholder="Rank" value="{{$q->gre_quantitative_rank}}">
    </td></tr>

<tr><th>Written</th><td> 
  <input type="text" name="written_score" class=" form-control" placeholder="Score" value="{{$q->gre_written_score}}">
   <input type="text" name="written_rank" id="" class=" form-control" placeholder="Rank" value="{{$q->gre_written_rank}}">
   </td></tr>
<tr><th>Total</th>
  <td> 
    <input type="text" name="total_score" class=" form-control" placeholder="Score" value="{{$q->gmat_total_score}}"> 
  <input type="text" name="total_rank" id="" class=" form-control" placeholder="Rank" value="{{$q->gmat_total_rank}}"> </td></tr>
</table>
{{form::submit('Submit')}}
{{Form::close()}}
          </div>
      </div>
    </div>
  </div>
  </div>
  @endforeach
  </div>
  @endif
  
  
  
  
  
  {{-- start modal add eng --}}
  <div id="english_score_add_gre_gmat" class="modal fade " role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add English Language Score</h4>
          </div>
          {{form::open(array('url'=>'add-gre-gmat'))}}
          <div class="modal-body">
            <table>
              <tr>
                <th>Given Exam Display</th>
                 <td>
                    <select name="language" id="gre_gmat"> 
                <option value="GRE">GRE</option>  
                <option value="GMAT">GMAT</option>
                </select> 
              </td>
              </tr>
              <tr>
                <th> Exam Date</th> <td> <input type="text" class="date" name="exam_date" id=""  > </td>
              </tr>
              <tr>
                <th>Verbal</th> <td> <input type="text" class="form-control" placeholder="Score" name="verbal_score"> <input type="text" class="form-control" placeholder="Rank %" name="verbal_rank"> </td>
              </tr>
              <tr>
                <th>Quantitative</th>  <td> <input type="text" class="form-control" placeholder="Score" name="quantitative_score"> <input type="text" class="form-control" placeholder="Rank %" name="quantitative_rank"> </td>
              </tr>
              <tr>
                <th>Written</th>  <td> <input type="text" class="form-control" placeholder="Score" name="written_score"> <input type="text" class="form-control" placeholder="Rank %" name="written_rank"> </td>
              </tr>
           
              <tr style="">
                <th>Total</th>  <td> <input type="text" class="form-control" placeholder="Total Score" name="total_score"> <input type="text" class="form-control" placeholder="Rank %" name="total_rank"> </td>
              </tr>
           <input type="text" name="unique_id" value="{{session()->get('unique_id_sess')}}">

            </table>
            <br>
            <input type="submit" name="" id="">
          </div>
          {{form::close()}}
      </div>
    </div>
  </div>
  {{-- end of add new model --}}
  </div>
  {{-- end gre gmat --}}
  
  




<script>
  document.querySelectorAll('select').forEach(element => {
    element.addEventListener("change",function(){
      if(element.value == "OET"){
$('.grade-score').show();
$('.score-only').hide();
      }
      else{
        $('.grade-score').hide();
$('.score-only').show();
      }
      
      })
  });
</script>
                        
<script>document.querySelectorAll('.get_score')[5].className += " active "; 
  document.getElementById("get_lang{{isset($gre_gmat[0]->language)?$gre_gmat[0]->language:'-'}}").className = " active ";
  document.querySelectorAll('.get_score')[0].className += " active "; 
document.getElementById("get_lang{{isset($get_toefl[0]->language)?$get_toefl[0]->language:'-'}}").className += " active ";

  </script>








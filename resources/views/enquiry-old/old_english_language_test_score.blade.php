





<div class=" " data-toggle="modal" data-target="#previous_company" >
<h4>
TOEFL / IELTS / PTE SCORE</h4>
<hr>
<div class="client-detail-edit-button">
        <p id="english_language_test_edit"> Edit </p>
    </div>
    
    {{Form::open(array('url' => 'update-score'))}}
<table class="table" id="exam_score_edit">
<tr>
<th>
Language</th>
<th>
Writing</th>
<th>
Speaking</th>
<th> Listening</th>
<th>  Reading</th>
{{-- <th>  Overall</th> --}}
</tr>
<?php 
$get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->where('language','TOEFL')
                ->get();
                
?>

@if($get_toefl->count() >0 )
@foreach($get_toefl as $scores)
<tr>
<td> <span>{{$scores->language}}<span>  <p>   <input type="hidden" name="language[]"   value="{{$scores->language}}">   </p>   </td>
<td> <p>  {{$scores->writing}}  </p>  <p>  
     {{-- <input class="form-control" type="text" name="writing[]"   value=" {{ $scores->writing }}   ">  --}}
     <select name="writing[]" id="" class="form-control"> <option value="{{$scores->writing}}" selected>{{$scores->writing}}</option> @for($i=0; $i<=30; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> 
     </p>  </td>
<td> <p>  {{ $scores->speaking }} </p>  <p>
      {{-- <input class="form-control" type="text" name="speaking[]"   value=" {{ $scores->speaking }}  ">    --}}
      <select name="speaking[]" id="" class="form-control"> <option value="{{$scores->speaking}}" selected>{{$scores->speaking}}</option> @for($i=0; $i<=30; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> 
    </p>   </td>
<td> <p>  {{ $scores->listening }} </p> <p>
       {{-- <input class="form-control" type="text" name="listening[]"   value="{{ $scores->listening }}   ">  --}}
       <select name="listening[]" id="" class="form-control"> <option value="{{$scores->listening}}" selected>{{$scores->listening}}</option> @for($i=0; $i<=30; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> 
     </p>   </td>
<td> <p>  {{ $scores->reading }}  </p>  <p> 
     {{-- <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">  --}}
     <select name="reading[]" id="" class="form-control"> <option value="{{$scores->reading}}" selected>{{$scores->reading}}</option> @for($i=0; $i<=30; $i++) <option value={{$i}}>{{$i}}</option> @endfor </select> 
      </p>  </td>
{{-- <td> <p>  {{ $scores->reading }}  </p>  <p>  <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">   </p>  </td> --}}
</tr>
@endforeach
@endif



<?php 
$get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->where('language','IELTS')
                ->get();
                
?>

@if($get_toefl->count() >0 )
@foreach($get_toefl as $scores)
<tr>
        <td> <span>{{$scores->language}}<span>  <p>   <input type="hidden" name="language[]"   value="{{$scores->language}}">   </p>   </td>
            <td> <p>  {{$scores->writing}}  </p>  <p>  
                 {{-- <input class="form-control" type="text" name="writing[]"   value=" {{ $scores->writing }}   ">  --}}
                 <select name="writing[]" id="" class="form-control"> <option value="{{$scores->writing}}" selected>{{$scores->writing}}</option> @for($i=4.5; $i<=9; $i+=.5)    
                    <option value={{$i}}>{{$i}}</option>
                    
                     @endfor </select> 
                 </p>  </td>
            <td> <p>  {{ $scores->speaking }} </p>  <p>
                  {{-- <input class="form-control" type="text" name="speaking[]"   value=" {{ $scores->speaking }}  ">    --}}
                  <select name="speaking[]" id="" class="form-control"> <option value="{{$scores->speaking}}" selected>{{$scores->speaking}}</option>  @for($i=4.5; $i<=9; $i+=.5)    
                    <option value={{$i}}>{{$i}}</option>
                    
                     @endfor </select> 
                </p>   </td>
            <td> <p>  {{ $scores->listening }} </p> <p>
                   {{-- <input class="form-control" type="text" name="listening[]"   value="{{ $scores->listening }}   ">  --}}
                   <select name="listening[]" id="" class="form-control"> <option value="{{$scores->listening}}" selected>{{$scores->listening}}</option>  @for($i=4.5; $i<=9; $i+=.5)    
                    <option value={{$i}}>{{$i}}</option>
                    
                     @endfor </select> 
                 </p>   </td>
            <td> <p>  {{ $scores->reading }}  </p>  <p> 
                 {{-- <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">  --}}
                 <select name="reading[]" id="" class="form-control"> <option value="{{$scores->reading}}" selected>{{$scores->reading}}</option>  @for($i=4.5; $i<=9; $i+=.5)    
                    <option value={{$i}}>{{$i}}</option>
                    
                     @endfor </select> 
                  </p>  </td>
            {{-- <td> <p>  {{ $scores->reading }}  </p>  <p>  <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">   </p>  </td> --}}
            </tr>
            @endforeach
            @endif





            
<?php 
$get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->where('language','PTE')
                ->get();
                
?>

@if($get_toefl->count() >0 )
@foreach($get_toefl as $scores)
<tr>
        <td> <span>{{$scores->language}}<span>  <p>   <input type="hidden" name="language[]"   value="{{$scores->language}}">   </p>   </td>
            <td> <p>  {{$scores->writing}}  </p>  <p>  
                 {{-- <input class="form-control" type="text" name="writing[]"   value=" {{ $scores->writing }}   ">  --}}
                 <select name="writing[]" id="" class="form-control"> <option value="{{$scores->writing}}" selected>{{$scores->writing}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                 </p>  </td>
            <td> <p>  {{ $scores->speaking }} </p>  <p>
                  {{-- <input class="form-control" type="text" name="speaking[]"   value=" {{ $scores->speaking }}  ">    --}}
                  <select name="speaking[]" id="" class="form-control"> <option value="{{$scores->speaking}}" selected>{{$scores->speaking}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                </p>   </td>
            <td> <p>  {{ $scores->listening }} </p> <p>
                   {{-- <input class="form-control" type="text" name="listening[]"   value="{{ $scores->listening }}   ">  --}}
                   <select name="listening[]" id="" class="form-control"> <option value="{{$scores->listening}}" selected>{{$scores->listening}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                 </p>   </td>
            <td> <p>  {{ $scores->reading }}  </p>  <p> 
                 {{-- <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">  --}}
                 <select name="reading[]" id="" class="form-control"> <option value="{{$scores->reading}}" selected>{{$scores->reading}}</option>   @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                  </p>  </td>
            {{-- <td> <p>  {{ $scores->reading }}  </p>  <p>  <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">   </p>  </td> --}}
            </tr>
            @endforeach
            @endif



                     
<?php 
$get_toefl = DB::table('enq_exam_scores')
                ->where('enquiry_id', session()->get('unique_id_sess'))
                ->where('language','OET')
                ->get();
                
?>

@if($get_toefl->count() >0 )
@foreach($get_toefl as $scores)
<tr>
        <td> <span>{{$scores->language}}<span>  <p>   <input type="hidden" name="language[]"   value="{{$scores->language}}">   </p>   </td>
            <td> <p>  {{$scores->writing}}  </p>  <p>  
                 {{-- <input class="form-control" type="text" name="writing[]"   value=" {{ $scores->writing }}   ">  --}}
                 <select name="writing[]" id="" class="form-control"> <option value="{{$scores->writing}}" selected>{{$scores->writing}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                 </p>  </td>
            <td> <p>  {{ $scores->speaking }} </p>  <p>
                  {{-- <input class="form-control" type="text" name="speaking[]"   value=" {{ $scores->speaking }}  ">    --}}
                  <select name="speaking[]" id="" class="form-control"> <option value="{{$scores->speaking}}" selected>{{$scores->speaking}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                </p>   </td>
            <td> <p>  {{ $scores->listening }} </p> <p>
                   {{-- <input class="form-control" type="text" name="listening[]"   value="{{ $scores->listening }}   ">  --}}
                   <select name="listening[]" id="" class="form-control"> <option value="{{$scores->listening}}" selected>{{$scores->listening}}</option>  @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                 </p>   </td>
            <td> <p>  {{ $scores->reading }}  </p>  <p> 
                 {{-- <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">  --}}
                 <select name="reading[]" id="" class="form-control"> <option value="{{$scores->reading}}" selected>{{$scores->reading}}</option>   @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                     @endfor </select> 
                  </p>  </td>
            {{-- <td> <p>  {{ $scores->reading }}  </p>  <p>  <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">   </p>  </td> --}}
            </tr>
            @endforeach
            @endif






@if($enq_oet_scores->count() > 0)
<?php $a = 1;

?>
@foreach($enq_oet_scores as $scores)
{{-- @dd($scores) --}}

<?php 
// if($a > 1){
//    echo $g = "Grade";
// }
?>

{{-- <tr>
<td> <span>  {{ $scores->language  }}   </span>  <p>   <input type="hidden" name="language[]"   value="{{ $scores->language }}   ">   </p>   </td>
        <td> <p>  {{ $scores->writing }}  </p>  <p>   <input class="form-control" type="text" name="writing[]"   value=" {{ $scores->writing }}   ">   </p>  </td>
        <td> <p>  {{ $scores->speaking }} </p>  <p>  <input class="form-control" type="text" name="speaking[]"   value=" {{ $scores->speaking }}  ">   </p>   </td>
        <td> <p>  {{ $scores->listening }} </p> <p>   <input class="form-control" type="text" name="listening[]"   value="{{ $scores->listening }}   ">  </p>   </td>
        <td> <p>  {{ $scores->reading }}  </p>  <p>  <input class="form-control" type="text" name="reading[]"   value="  {{ $scores->reading }}  ">   </p>  </td>
       
        </tr> --}}
        
        @endforeach
@endif
</table>
<?php 
$gre_gmat_language_scores  = DB::table('gre_gmat_language_scores')->where('enquiry_id',session()->get('unique_id_sess'))->get();
?>
<table>
{{-- @if($gre_gmat_language_scores->count() > 0)
@foreach($gre_gmat_language_scores as $scores)
<tr>
        <td> <p>  {{ $scores->language }} </p>  <p>   <input type="text" name="{{$scores->language}}"   value="{{ $scores->language }}   ">   </p>   </td>
                <td> <p>  {{ $scores->gre_exam_date }}  </p>  <p>   <input type="text" name="gre_exam_date[]"   value=" {{ $scores->gre_exam_date }}   ">   </p>  </td>
                <td> <p>  {{ $scores->gre_verbal_score }} </p>  <p>  <input type="text" name="gre_verbal_score[]"   value=" {{ $scores->gre_verbal_score }}  ">   </p>   </td>
                <td> <p>  {{ $scores->gre_verbal_rank }} </p> <p>   <input type="text" name="gre_verbal_rank[]"   value="{{ $scores->gre_verbal_rank }}   ">  </p>   </td>
                <td> <p>  {{ $scores->gre_quantitative_score }}  </p>  <p>  <input type="text" name="gre_quantitative_score[]"   value="  {{ $scores->gre_quantitative_score }}  ">   </p>  </td>
                <td> <p>  {{ $scores->gre_quantitative_rank }}  </p>  <p>  <input type="text" name="gre_quantitative_rank[]"   value="  {{ $scores->gre_quantitative_rank }}  ">   </p> </td>
                </tr>
                @endforeach
@endif --}}

<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<tr class="update-button-client"> <td> {{Form::submit('Update')}} </td> </tr>

@foreach($enq_oet_scores as $scores)
{{-- <tr>
<td> {{ $scores->language }} </td>
<td> {{ $scores->writing }} </td>
<td> {{ $scores->speaking }} </td>
<td> {{ $scores->listening }} </td>
<td> {{ $scores->reading }} </td>
</tr> --}}
@endforeach

</table>
{{Form::close()}}
</div>


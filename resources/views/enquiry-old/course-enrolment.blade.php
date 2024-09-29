

<div id="course_enrolment_detail_edit" class="modal fade " role="dialog">
    {{Form::open(array('url' => 'update-enrolment-course'))}}
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Work Experience </h4>
          </div>
          <div class="modal-body">


            <table class="table">
                <tr>
                <th>
                Start Session </th>
                <th>
                  Country</th>
                <th>
                Course</th>
                <th>
                Interested for Intake </th>
                </tr>
                
                @foreach($enquiries as $e)
                <tr>
                <td>   
                    
                <select name="course_session" id="" class="form-control">
                    <option value="{!! $e->course_session !!}" selected>  {!! $e->course_session !!} </option>
                @for($a=2019; $a<=2023; $a++)
                @if($a ==  $e->course_session)
                @continue;
                    @endif
                    <option value="{{$a}}"> {{$a}} </option>
                @endfor
                </select>
               
                
                <td>    
                   
                    <select name="course_country" id="" class="form-control">
                
                        <option value="{!! $e->course_country !!}"> {!! $e->course_country !!} </option>
                        <?php
                        
                        if(!empty($country)){
                        foreach($country as $c){
                        ?>
                        @if($c->country_name ==  $e->course_country)
                        @continue;
                            @endif
                        <option value="{{$c->country_name}}">  {{$c->country_name}} </option>
                        <?php } }?>
                    </select>
                  </td>
                
                <td>     <input type="text" name="course" value="{!! $e->course !!}" class="form-control" >    </td>
                
                <td>   
                        <select name="course_intake" id="intake_month" onchange="get_month(this.value)" class="form-control">
                     
                            @if($c->country_name ==  $e->course_country)
                            @continue;
                                @endif 
                            <option value="{{ $e->course_intake }}" selected  >{{ $e->course_intake }}</option>
                            <option value="January">January </option>
                            <option value="February">February </option>
                            <option value="March">March  </option>
                            <option value="April">April </option>
                            <option value="May">May </option>
                            <option value="June">June </option>
                            <option value="July">July  </option>
                            <option value="August">August  </option>
                            <option value="September">September  </option>
                            <option value="October">October  </option>
                            <option value="November">November </option>
                            <option value="December">December </option>
                
                
                    </select>
                    </td>
                </tr>
                @endforeach
            </table>
               
                <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
                 {{Form::submit('Update')}} 
                
                
                
          </div>
      </div>
    </div>
</div>
{{Form::close()}}
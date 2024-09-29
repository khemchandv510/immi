<div class="col-md-12 py-3" style="    text-align: center;">
        @if($enq_exam_scores->count() == 0)
        <div id="toefl"> <p><strong>  TOEFL </strong>    
            {!! Form::radio('toefl', 'y', false, array('onclick' => 'toefl_show()','id' => 'ToeflTaken' )) !!}  <label for="ToeflTaken">  Taken </label> 

            {!! Form::radio('toefl', 'n',true, array('onclick' => 'toefl_hide()', 'id' => 'ToeflNotTaken' )) !!} <label for="ToeflNotTaken"> Not Taken </label>  
          </p> </div>





          <div class="row" id = "toefl_select">

              {{-- <p class="lang-head">TOEFL Score</p> --}}
          
                         <div class="col-md-3  k0label">
                          <p>Listening</p>
                         <select name="ToeflListning" id="" class="form-control">
                          @for($i=0; $i<=30; $i++)    
                         <option value={{$i}}>{{$i}}</option>
                          @endfor
                         </select>
                        </div>
                        <div class="col-md-3  k0label">
                            <p>Reading</p>
                            <select name="ToeflReading" id="" class="form-control">
                                @for($i=0; $i<=30; $i++)    
                               <option value="{{$i}}">{{$i}}</option>
                                @endfor
                               </select>
                          </div>
                          <div class="col-md-3  k0label">
                              <p>Writing</p>
                              <select name="ToeflWriting" id="" class="form-control">
                                  @for($i=0; $i<=30; $i++)    
                                 <option value={{$i}}>{{$i}}</option>
                                  @endfor
                                 </select>
                            </div>
                            <div class="col-md-3  k0label">
                                <p>Speaking</p>
                                <select name="ToeflSpeaking" id="" class="form-control">
                                    @for($i=0; $i<=30; $i++)    
                                   <option value={{$i}}>{{$i}}</option>
                                    @endfor
                                   </select>
                                   
                              </div>

                            </div>    

                                  <hr>

            <div id="ielts"> <p> <strong>  IELTS </strong>   
                 {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()', 'id' => 'IeltsTaken' )) !!}  <label for="IeltsTaken">  Taken </label>
              {!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()',  'id' => 'IeltsNotTaken' )) !!} <label for="IeltsNotTaken"> Not Taken </label> </p> </div>









              <div class="row" id="ielts_select">
                  {{-- <p class="lang-head">IELTS Score</p> --}}
                             <div class="col-md-3  k0label">
                              <p>Listening</p>
                             <select name="IeltsListning" id="" class="form-control">
                              @for($i=4.5; $i<=9; $i+=.5)    
                             <option value={{$i}}>{{$i}}</option>
                             
                              @endfor
                             </select>
                            </div>
                            <div class="col-md-3  k0label">
                                <p>Reading</p>
                                <select name="IeltsReading" id="" class="form-control">
                                    @for($i=4.5; $i<=9; $i+=.5)    
                             <option value={{$i}}>{{$i}}</option>
                                    @endfor
                                   </select>
                              </div>
                              <div class="col-md-3  k0label">
                                  <p>Writing</p>
                                  <select name="IeltsWriting" id="" class="form-control">
                                      @for($i=4.5; $i<=9; $i+=.5)    
                                      <option value={{$i}}>{{$i}}</option>
                                      @endfor
                                     </select>
                                </div>
                                <div class="col-md-3  k0label">
                                    <p>Speaking</p>
                                    <select name="IeltsSpeaking" id="" class="form-control">
                                        @for($i=4.5; $i<=9; $i+=.5)    
                                        <option value={{$i}}>{{$i}}</option>
                                        @endfor
                                       </select>
                                  </div>
              
              </div>    
              

<hr>

              <div id="pte"> <p> <strong> PTE    </strong> 
                
                {!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()','id' =>'PteTaken' )) !!}  <label for="PteTaken">Taken </label>
                
                {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()', 'id' => 'PteNotTaken')) !!} <label for="PteNotTaken"> Not Taken </label></p>
               </div>





                <div class="row" id="pte_select">

                    {{-- <p class="lang-head">PTE Score</p> --}}
                               <div class="col-md-3  k0label">
                                <p>Listening</p>
                               <select name="PteListning" id="" class="form-control">
                                @for($i=10; $i<=90; $i++)    
                               <option value={{$i}}>{{$i}}</option>
                               
                                @endfor
                               </select>
                              </div>
                              <div class="col-md-3  k0label">
                                  <p>Reading</p>
                                  <select name="PteReading" id="" class="form-control">
                                      @for($i=10; $i<=90; $i++)    
                                      <option value={{$i}}>{{$i}}</option>
                                      @endfor
                                     </select>
                                </div>
                                <div class="col-md-3  k0label">
                                    <p>Writing</p>
                                    <select name="PteWriting" id="" class="form-control">
                                        @for($i=10; $i<=90; $i++)    
                                        <option value={{$i}}>{{$i}}</option>
                                        @endfor
                                       </select>
                                  </div>
                                  <div class="col-md-3  k0label">
                                      <p>Speaking</p>
                                      <select name="PteSpeaking" id="" class="form-control">
                                          @for($i=10; $i<=90; $i++)    
                                          <option value={{$i}}>{{$i}}</option>
                                          @endfor
                                         </select>
                                    </div>
                
                </div>    
                
              <hr>
@elseif($enq_exam_scores_toefl->count() > 0)
@foreach($enq_exam_scores_toefl as $e)
<div id="toefl"> <p><strong>  TOEFL </strong>    
{{-- {!! Form::radio('toefl', 'y', true, array('onclick' => 'toefl_show()','id' => 'ToeflTaken' )) !!}  <label for="ToeflTaken">  Taken </label> 

{!! Form::radio('toefl', 'n',false, array('onclick' => 'toefl_hide()', 'id' => 'ToeflNotTaken' )) !!} <label for="ToeflNotTaken"> Not Taken </label>   --}}
</p> </div>


<style>
#toefl_select, #ielts_select, #pte_select, #oet_select{
display:flex !important;
}
</style>

<div class="row" id = "toefl_select">

{{-- <p class="lang-head">TOEFL Score</p> --}}

     <div class="col-md-3  k0label">
      <p>Listening</p>
     <select name="ToeflListning" id="" class="form-control">
       
     <option value="{{$e->listening}}"  selected> {{$e->listening}} </option>

      @for($i=0; $i<=30; $i++)    
     <option value={{$i}}>{{$i}}</option>
      @endfor
     </select>
    </div>
    <div class="col-md-3  k0label">
        <p>Reading</p>
        <select name="ToeflReading" id="" class="form-control">

          <option value="{{$e->reading}}"> {{$e->reading}} </option>
            @for($i=0; $i<=30; $i++)    
           <option value="{{$i}}">{{$i}}</option>
            @endfor
           </select>
      </div>
      <div class="col-md-3  k0label">
          <p>Writing</p>
          <select name="ToeflWriting" id="" class="form-control">
              <option value="{{$e->writing}}"> {{$e->writing}} </option>
              @for($i=0; $i<=30; $i++)    
             <option value={{$i}}>{{$i}}</option>
              @endfor
             </select>
        </div>
        <div class="col-md-3  k0label">
            <p>Speaking</p>
            <select name="ToeflSpeaking" id="" class="form-control">
                <option value="{{$e->speaking}}"> {{$e->speaking}} </option>
                @for($i=0; $i<=30; $i++)    
               <option value={{$i}}>{{$i}}</option>
                @endfor
               </select>
               
          </div>

        </div>    
@endforeach

              <hr>

              @elseif($enq_exam_scores_ielts->count() > 0)
              @foreach($enq_exam_scores_ielts as $e)

<div id="ielts"> <p> <strong>  IELTS </strong>   
{{-- {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()', 'id' => 'IeltsTaken' )) !!}  <label for="IeltsTaken">  Taken </label>
{!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()',  'id' => 'IeltsNotTaken' )) !!} <label for="IeltsNotTaken"> Not Taken </label>  --}}
</p> </div>





<div class="row" id="ielts_select">
{{-- <p class="lang-head">IELTS Score</p> --}}
         <div class="col-md-3  k0label">
          <p>Listening</p>
         <select name="IeltsListning" id="" class="form-control">
       
         <option value="{{$e->listening}}"></option>
       
          @for($i=4.5; $i<=9; $i+=.5)    
         <option value={{$i}}>{{$i}}</option>
         
          @endfor
         </select>
        </div>
        <div class="col-md-3  k0label">
            <p>Reading</p>
            <select name="IeltsReading" id="" class="form-control">
                <option value="{{$e->reading}}"></option>
                @for($i=4.5; $i<=9; $i+=.5)    
         <option value={{$i}}>{{$i}}</option>
                @endfor
               </select>
          </div>
          <div class="col-md-3  k0label">
              <p>Writing</p>
              <select name="IeltsWriting" id="" class="form-control">
                  <option value="{{$e->writing}}"></option>
                  @for($i=4.5; $i<=9; $i+=.5)    
                  <option value={{$i}}>{{$i}}</option>
                  @endfor
                 </select>
            </div>
            <div class="col-md-3  k0label">
                <p>Speaking</p>
                <select name="IeltsSpeaking" id="" class="form-control">
                    <option value="{{$e->speaking}}"></option>
                    @for($i=4.5; $i<=9; $i+=.5)    
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                   </select>
              </div>

</div>    
@endforeach
@endif 

<hr>


<div id="pte"> <p> <strong> PTE    </strong> 

{{-- {!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()','id' =>'PteTaken' )) !!}  <label for="PteTaken">Taken </label>

{!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()', 'id' => 'PteNotTaken')) !!} <label for="PteNotTaken"> Not Taken </label> --}}

</p> </div>

<div class="row" id="pte_select">

{{-- <p class="lang-head">PTE Score</p> --}}
           <div class="col-md-3  k0label">
            <p>Listening</p>
           <select name="PteListning" id="" class="form-control">
            @for($i=10; $i<=90; $i++)    
           <option value={{$i}}>{{$i}}</option>
           
            @endfor
           </select>
          </div>
          <div class="col-md-3  k0label">
              <p>Reading</p>
              <select name="PteReading" id="" class="form-control">
                  @for($i=10; $i<=90; $i++)    
                  <option value={{$i}}>{{$i}}</option>
                  @endfor
                 </select>
            </div>
            <div class="col-md-3  k0label">
                <p>Writing</p>
                <select name="PteWriting" id="" class="form-control">
                    @for($i=10; $i<=90; $i++)    
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                   </select>
              </div>
              <div class="col-md-3  k0label">
                  <p>Speaking</p>
                  <select name="PteSpeaking" id="" class="form-control">
                      @for($i=10; $i<=90; $i++)    
                      <option value={{$i}}>{{$i}}</option>
                      @endfor
                     </select>
                </div>

</div>    

<hr>

<style>
#toefl_select, #ielts_select, #pte_select, #oet_select{
/* display:flex !important; */
}
</style>












                <div id="oet" > <strong> <p>  OET   </strong> 
                   {!! Form::radio('oet', 'y', false,  array('class'=>'form-contro','onclick' => 'oet_show()', 'id'=> 'OetTaken' )) !!}  <label for="OetTaken"> Taken </label>
                  {!! Form::radio('oet', 'n', true, array('class'=>'form-contro' , 'onclick' => 'oet_hide()', 'id' => 'OetNotTaken' )) !!}   <label for="OetNotTaken">  Not Taken </label>  </p> </div>







                  <div class="row" id="oet_select">

                      {{-- <p class="lang-head">OET Score </p> --}}
                                 <div class="col-md-3  k0label">
                                  <p>Listening</p>
            
                                  <select name="OetListening" id="" class="form-control">
                                    <option disabled selected> Choose Grade</option>
                                    <option value="A"> A</option>
                                    <option value="B"> B</option>
                                    <option value="C+"> C+</option>
                                    <option value="C"> C</option>
                                    <option value="D"> D</option>
                                    <option value="E"> E</option>
                                  </select>
                                  {!! Form::number('oet_listening_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!}
            
            
                                 {{-- <select name="ToeflListning" id="" class="form-control">
                                  @for($i=10; $i<=90; $i++)    
                                 <option value={{$i}}>{{$i}}</option>
                                 
                                  @endfor
                                 </select> --}}
            
                                </div>
                                <div class="col-md-3  k0label">
                                    <p>Reading</p>
                                   
                                  <select name="OetReading" id="" class="form-control">
                                    <option disabled selected> Choose Grade</option>
                                    <option value="A"> A</option>
                                    <option value="B"> B</option>
                                    <option value="C+"> C+</option>
                                    <option value="C"> C</option>
                                    <option value="D"> D</option>
                                    <option value="E"> E</option>
                                  </select>
                                  {!! Form::number('oet_reading_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                    
            
            
            
                                  </div>
                                  <div class="col-md-3  k0label">
                                      <p>Writing</p>
                                      <select name="OetWriting" id="" class="form-control">
                                        <option disabled selected> Choose Grade</option>
                                        <option value="A"> A</option>
                                        <option value="B"> B</option>
                                        <option value="C+"> C+</option>
                                        <option value="C"> C</option>
                                        <option value="D"> D</option>
                                        <option value="E"> E</option>
                                      </select>
                                      {!! Form::number('oet_writing_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                    </div>
                                    <div class="col-md-3  k0label">
                                        <p>Speaking</p>
                                        <select name="OetSpeaking" id="" class="form-control">
                                          <option disabled selected> Choose Grade</option>
                                          <option value="A"> A</option>
                                          <option value="B"> B</option>
                                          <option value="C+"> C+</option>
                                          <option value="C"> C</option>
                                          <option value="D"> D</option>
                                          <option value="E"> E</option>
                                        </select>
                                        {!! Form::number('oet_speaking_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score','min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                      </div>
                  
                  </div>    
            
<hr>

</div>




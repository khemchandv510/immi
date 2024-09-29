@extends('header')
@section('tabletform')
<div class="container my-5">
    <h3>Tablet Form Fields</h3>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>       
<script>
  
function getState(val) {
    $.ajax({
    type: "get",
    url: "{{url('tabletstate')}}?id="+val,
    success: function(data){
        $('#state-list').empty();
                        $.each(data, function(key, value) {
                            $('#state-list').append('<option value="'+ this.state_id +'">'+ this.state_name +'</option>');
                        });
        }
    });
}

function getCity(val) {
$.ajax({
type: "get",
url: "{{url('tabletcity')}}?id="+val,
success: function(data){
        $('#city-list').empty();
        $.each(data, function(key, value) {
                            $('#city-list').append('<option value="'+ this.city_name +'">'+ this.city_name +'</option>');
                        });
}
});
}

</script>



    {{Form::open(array('url'  =>  'enquiry-tablet', 'files'=>'true'))}}    
        <div class="row content-color">
            
            <div class="container">
            <div class="row">
            <div class="col-md-4 my-3">
              {{-- <img src="img/administrator-icon.jpg" width="50%" alt="Photo"> --}}
            <div class="row">
            {{-- <div class="col-md-4 py-3">Image</div> --}}
            <div class="col-md-8 py-3">
                  




                    <img id="img1" />
                   

                    <label for="file1" class="btn take-image">Take Image</label>
                    


                    {!! Form::file('image', array('class'=>'form-control', 'id'=>'file1','onchange'=>'GetFileSize1(this);', 'value' =>  'Take Image')) !!}
                    
                    <p>Note image size not more then 2mb</p>
<p><?php echo ($errors->first('image',"<li class='custom-error'>:message</li>")) ?></p>

            </div></div></div>

            <div class="col-md-8 row">
              <div class="col-md-4 py-3 ">Name :</div>
               <div class="col-md-8 py-3 ">
                {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}
                <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>

               </div>
   
               <div class="col-md-4 py-3 ">D.O.B :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::date('dob', null, array('class'=>'form-control', 'placeholder'=>'DOB')) !!}
                    <?php echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) ?>
                </div>

               <div class="col-md-4 py-3 ">Contact No :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::text('contact', null, array('class'=>'form-control', 'placeholder'=>'Contact Number')) !!}
                    <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
                </div>


                <div class="col-md-4 py-3 ">Email :</div>
                <div class="col-md-8 py-3 ">
                     {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
                     <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                 </div>

               <div class="col-md-4 py-3 ">Current Address :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) !!}
                    <?php echo ($errors->first('address',"<li class='custom-error'>:message</li>")) ?>
            </div>

            <div class="col-md-4 py-3 ">Country :</div>
            <div class="col-md-8 py-3 ">
                    <select name="country" id="" class="form-control" onChange="getState(this.value);">
                            <option value="" Selected disabled>--Select--</option>
                            
                        @foreach($countries as $c)
                      <option value={{$c->country_id}}>  {{ $c->country_name }}</option>
    
                    @endforeach
                </select>
                <?php echo ($errors->first('country',"<li class='custom-error'>:message</li>")) ?>
                {{-- {!! Form::text('country', null, array('class'=>'form-control', 'placeholder'=>'Country')) !!} --}}
         </div>

         



         <div class="col-md-4 py-3 ">State :</div>
            <div class="col-md-8 py-3 ">
                    <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                            <option value="" >--Select--</option>
                            {{-- @if(!empty($states))
                        @foreach($states as $c)
                      <option value={{$c->state_id}}>  {{ $c->state_name }}</option>
    
                    @endforeach
                    @endif --}}
                </select>
                <?php echo ($errors->first('state',"<li class='custom-error'>:message</li>")) ?>
                {{-- {!! Form::text('state', null, array('class'=>'form-control', 'placeholder'=>'State')) !!} --}}
         </div>

         <div class="col-md-4 py-3 ">City :</div>
         <div class="col-md-8 py-3 ">
                        <select name="city" id="city-list" class="form-control" >
                                        <option value="" >--Select--</option>
                                </select>
                                <?php echo ($errors->first('city',"<li class='custom-error'>:message</li>")) ?>
                {{-- {!! Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) !!} --}}
      </div>

               </div>
               </div> 
               </div>
              
               
               
               <!-- Marriage -->

               <div class="col-md-4 py-3 ">Marriage :</div>
               <div class="col-md-4 py-3 ">
                    {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()')) }}
                    Marriage
                </div>
               <div class="col-md-4 py-3 ">
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()')) }} Unmarriage
                </div>
                <?php echo ($errors->first('marriage',"<li class='custom-error'>:message</li>")) ?>
               <div id="k0check2">
                    <div class="container">
                    <div class="row">
                             <div class="col-md-4 py-3">Date of Marriage</div>
                             <div class="col-md-3 py-3" >
                                    {!! Form::date('dom', null, array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?>
                                </div>
                             <div class="col-md-2 py-3"> Spouse Qualification</div>
                             <div class="col-md-3 py-3">
                                    {!! Form::text('spouse_qualification', null, array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ')) !!}

                                </div>
           
           
                             <div class="col-md-4  py-3">spouse Income Proof</div>
                             <div class="col-md-8  py-3">
                                    {!! Form::file('sip', array('class'=>'form-control' )) !!}
                                </div>
    
                     </div>
                   </div>
                </div>

                   <!-- Marriage end -->

               <div class="col-md-4 py-3 ">Interested for Intake :</div>
               <div class="col-md-8 py-3 ">
                

                    <select name="interested_intake" id="" class="form-control">
                      <option value="January ">January </option>
                      <option value="February ">February </option>
                      <option value="March  ">March  </option>
                      <option value="April ">April </option>
                      <option value="May ">May </option>
                      <option value="June ">June </option>
                      <option value="July  ">July  </option>
                      <option value="August  ">August  </option>
                      <option value="September  ">September  </option>
                      <option value="October  ">October  </option>
                      <option value="November ">November </option>
                      <option value="December ">December </option>
                     

                    </select>


                </div>







                <div class="col-md-12 btn-danger"><h4 class="my-2">Education Details</h4></div>
                <div class="container">
                 <div class="col-md-12 py-3 scrollmenu row ">
                    <div class="add-class"> </div>
                   <div class="col-md-2">
                     <p>Qualification</p>
                     <select name="qualification_name[]" id="" class="form-control">
                        <option selected disabled> selected </option>
                       <option value="10"> 10 </option>
                       <option value="12"> 12 </option>
                       <option value="Graduate"> Graduate </option>
                       <option value="post Graduate"> Post Graduate </option>
                     </select>
                    
                   </div>
  
  
                   <div class="col-md-3">
                      <p>Stream</p>
                      {!! Form::text('edu_stream[]', null, array('class'=>'form-control' )) !!}
                      
                    </div>
  
                   <div class="col-md-3">
                      <p>Name of Institute</p>
                      {!! Form::text('institute_name[]', null, array('class'=>'form-control' )) !!}
                    </div>
                   <div class="col-md-2">
                      <p>Year of Passing</p>
                      {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!}
                    </div>
                    <div class="col-md-2">
                        <p>Percentage</p>
                        {!! Form::text('percentage[]', null, array('class'=>'form-control' )) !!}
                      </div>
                      <i onclick="add_education();" class="fa fa-plus-sign" >   +</i>
                        
                               
                 </div>  
                
                
                
                </div> <!-- end of container educaion-->    
                      
  
         <style>
  .plus-sign{
    display:none;
  }
  .plus-sign:last-child{
           display:block;
         };
         </style>               
                            
  <script>
      function add_education(){
        $('.add-class').append('<div class="col-md-12 py-3 scrollmenu row"><div class="col-md-2"><p>Qualification</p><select name="qualification_name[]" id="" class="form-control">      <option selected disabled> selected </option>        <option value="10"> 10 </option><option value="12"> 12 </option>        <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option></select></div>  <div class="col-md-3"><p>Stream</p>   {!! Form::text("edu_stream[]", null, array("class"=>"form-control")) !!}  </div>   <div class="col-md-3"><p>Name of Institute</p>{!! Form::text("institute_name[]", null, array("class"=>"form-control" )) !!}</div><div class="col-md-2"><p>Year of Passing</p>{!! Form::text("passing_year[]", null, array("class"=>"form-control")) !!}</div><div class="col-md-2"><p>Percentage</p> {!! Form::text("percentage[]", null, array("class"=>"form-control" )) !!} </div> </div>');
        }   
  
        function add_company(){
          $('.add-company').append('<tr> <tr><td> {!! Form::text('company[]', null, array('class'=>'form-control' )) !!}</td> <td> {!! Form::text('Deginetion[]', null, array('class'=>'form-control' )) !!}</td><td>  {!! Form::date('exp_start[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> <td> {!! Form::date('exp_end[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> </tr>')
        }
      </script>
            






            <div class="col-md-12 btn-danger"><h4 class="my-2">Work Experience</h4></div>
            <div class="col-md-12 scrollmenu "><table class="table">
                <thead>
                  <tr>
                    
                    
                    <th>Company Name</th>
                    <th>Designation</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    
                  </tr>
                </thead>
                <tbody class="add-company"> </tbody>
                <tbody>
                  <tr>
                        <td> {!! Form::text('company[]', null, array('class'=>'form-control' )) !!}</td>
                        <td> {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}</td>
                    <td>  {!! Form::date('exp_start[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
                    <td> {!! Form::date('exp_end[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
                    <td id="add_clas" onclick="add_company();"> <i class="fa fa-plus" aria-hidden="true" class="pointer"></i></td>
                    
                  </tr>
                  
                </tbody></table></div>








           <div class="col-md-12 btn-danger"><h4 class="my-2">English Language Test</h4></div>
                {{-- english language test --}}
                <div class="container-fluid language-test">
                  <div class="row">
                               <div class="col-md-4 py-3">
                               
                                  <div id="toefl"> <p><strong>  TOEFL </strong>    
                                      {!! Form::radio('toefl', 'y', false, array('onclick' => 'toefl_show()' )) !!}  Taken
                
                                      
                
                
                                      {!! Form::radio('toefl', 'n',true, array('onclick' => 'toefl_hide()' )) !!} Not Taken  
                                    </p> </div>
                
                                      <div id="ielts"> <p> <strong>  IELTS </strong>   
                                           {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()')) !!}  Taken
                                        {!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()' )) !!} Not Taken </p> </div>
                
                                        <div id="pte"> <p> <strong> PTE    </strong> 
                                          
                                          {!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()' )) !!}Taken
                                          
                                          {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()')) !!} Not Taken </p> </div>
                
                
                                          <div id="oet" > <strong> <p>  OET   </strong> 
                                             {!! Form::radio('oet', 'y', false,  array('class'=>'form-contro','onclick' => 'oet_show()' )) !!} Taken
                                            {!! Form::radio('oet', 'n', true, array('class'=>'form-contro' , 'onclick' => 'oet_hide()' )) !!} Not Taken  </p> </div>
                                
                                </div>
                
                <style>
                #toefl_select, #ielts_select, #pte_select, #oet_select{
                  display:none;
                }
                </style>
                
                <script>
                  function toefl_show(){
                    document.getElementById('toefl_select').style.display ="flex";
                  }
                  function toefl_hide(){
                    document.getElementById('toefl_select').style.display ="none";
                  }
                  function ielts_show(){
                    document.getElementById('ielts_select').style.display ="flex";
                  }
                  function ielts_hide(){
                    document.getElementById('ielts_select').style.display ="none";
                  }
                  function pte_show(){
                    document.getElementById('pte_select').style.display ="flex";
                  }
                  function pte_hide(){
                    document.getElementById('pte_select').style.display ="none";
                  }
                
                  function oet_show(){
                    document.getElementById('oet_select').style.display ="flex";
                  }
                  function oet_hide(){
                    document.getElementById('oet_select').style.display ="none";
                  }
                
                </script>
                
                
                <div class="col-md-8 k0label">
                
                
                
                <div class="row" id = "toefl_select">
                  
                    <p class="lang-head">TOEFL Score</p>
                
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
                
                
                
                
                <div class="row">
                     
                  </div>
                  <div class="row" id="ielts_select">
                      <p class="lang-head">IELTS Score</p>
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
                  
                
                
                
                  
                  
                    <div class="row" id="pte_select">
                        
                        <p class="lang-head">PTE Score</p>
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
                    
                  
                
                  
                
                    
                    
                      <div class="row" id="oet_select">
                          
                          <p class="lang-head">OET Score </p>
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
                
                
                
                </div>         
                
                  </div>
                
                
                </div>
                



                <div class="col-md-12 btn-danger"><h4 class="my-2">Financial</h4></div>


               <div class="col-md-12 py-3">How student will show financials?</div>
               <div class="col-md-5 py-3">
                <select class="form-control" name="financial">
                 <option disabled selected>--Select--</option>    
                   <option VALUE="Bank loan">Bank loan</option>
                   <option VALUE="Personal Fund">Personal Fund</option>
                   <option VALUE="Family Sponsorship">Family Sponsorship</option>
                   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                   <option VALUE="Other">Other</option>
                 </select>
              </div>
              
              <div class="col-md-4 py-3">
                 {!! Form::number('financial_amount', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!} 
               </div>



              
               
               <!-- toggle -->
               <div class="col-md-12 btn-danger"><h4 class="my-2">Other Details</h4></div>
               <div class="col-md-8 py-3 ">Visa Status</div>
               <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('history', 'y', false, array('onchange'=>'show_history()')) !!} Approved
                   {!! Form::radio('history', 'n', true,array('onchange'=>'hide_history()','checked')) !!} Not Approved
                </div>

               <div class="k0ck" id="k0ck">
                    <div class="container">
               <div class="row">
                        <div class="col-md-3 py-3">Applicant's Name</div>
                        <div class="col-md-3 py-3">
                                {!! Form::text('appliciant_name', null, array('class'=>'form-control' )) !!}
                        </div>
                        <div class="col-md-3 py-3"> Name of country</div>
                        <div class="col-md-3 py-3">
                            <select class="form-control" name="old_imm_country">
                         <option>Australia</option>
                         <option>Canada</option>
                         <option>NZ</option>
                         <option>UL</option>
                         <option>USA</option>
                       </select></div>
      
      
                        <div class="col-md-3  py-3">Visa decision</div>
                        <div class="col-md-3  py-3">
                                {!! Form::text('visa_decision', null, array('class'=>'form-control' )) !!}
                        </div>
                        <div class="col-md-3  py-3">Date of Visa Decision</div>
                        <div class="col-md-3  py-3">
                                {!! Form::date('visa_decision_date', null, array('class'=>'form-control' )) !!}
                        </div>
                </div>
              </div>
            </div>
              
               <!-- toggle end -->

              




               <div class="col-md-12 text-center my-4" >
               
               {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!}
              </div>
           
        </div>
       {{Form::close()}}
 </div>






 @endsection











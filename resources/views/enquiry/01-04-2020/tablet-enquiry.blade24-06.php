@extends('header')
@section('tabletform')

<style>
#accordionSidebar{
  display:none;
  }

  .navbar-expand{
    display: none;
  }
</style>

<div class="container-fluid my-2" style="padding: 0">

    <h3 class="text-center"> <img src="public/images/logo.png" alt="" style="    max-width: 100%;
      width: 150px;"> </h3>


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
          <div class="steps">
<div class="breadcrumb flat">
  <a href="#" class="tab-navoption tabnav1 active">Primary</a>
  <a href="#" class="tab-navoption tabnav2">Secondary</a>
  <a href="#" class="tab-navoption tabnav3">Education</a>
  <a href="#" class="tab-navoption tabnav4">Work</a>
  <a href="#" class="tab-navoption tabnav5">Language</a>
  <a href="#" class="tab-navoption tabnav6">Immigration</a>
  <a href="#" class="tab-navoption tabnav7">Financial</a>
  <a href="#" class="tab-navoption tabnav8">Marital</a>
  {{-- <a href="#" class="tab-navoption tabnav9">Other</a> --}}
  {{-- <a href="" id="submit"> --}}

  {!! Form::submit('Submit', array('class'=>'btn btn-danger w-10  ' , 'value'=>"Save", 'id' =>'sub' )) !!}
{{-- </a> --}}
</div>
</div>

<style>

.steps{
  margin:auto ;
}

#sub{
     margin: 9px 0 0 26px;
}

@media(max-width:1024px){
#sub{
     margin: 9px 0 0 26px;
}
}

@media(max-width:786px){
  #sub{
    margin: 9px 0 0 50%;
  }

}
</style>
           
            <div class="container imm-content showcontent" id="imm-content1">
            <div class="col-md-12 btn-danger"><h4 class="my-2">Primary Details</h4></div>

            <div class="row">
    <!--         <div class="col-md-4 my-3">
              {{-- <img src="img/administrator-icon.jpg" width="50%" alt="Photo"> --}}
            <div class="row">
            {{-- <div class="col-md-4 py-3">Image</div> --}}
            <div class="col-md-8 py-3">
                  




                    <img id="img1" />
                   

                    <label for="file1" class="btn take-image">Take Image</label>
                    


                    {!! Form::file('image', array('class'=>'form-control', 'id'=>'file1','onchange'=>'GetFileSize1(this);', 'value' =>  'Take Image')) !!}
                    
                    <p>Note image size not more then 2mb</p>
<p><?php echo ($errors->first('image',"<li class='custom-error'>:message</li>")) ?></p>

            </div></div></div> -->

            <div class="col-md-12">

              <div class="row my-4">
                <div class="col-md-3">
                  <label>Name:</label>
                <div>
                {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}
                <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
             </div>
                </div>
                <div class="col-md-3">
                    <label>DOB:</label>
                    <div>
                    {!! Form::date('dob', null, array('class'=>'form-control', 'placeholder'=>'DOB')) !!}
                    <?php echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) ?>
                    </div>
                </div>
                <div class="col-md-3">
                   <label>Contact:</label>
                    <div>
                    {!! Form::text('contact', null, array('class'=>'form-control', 'placeholder'=>'Contact Number')) !!}
                    <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
                </div>
                </div>
                <div class="col-md-3">
                  <label>OTP:</label>
                  <div class="otpinput">
                <div>
                {!! Form::text('otp', null, array('class'=>'form-control', 'placeholder'=>'Enter OTP')) !!}
                <?php echo ($errors->first('otp',"<li class='custom-error'>:message</li>")) ?>

             </div>
             <div> <button type="button" class="btn btn-success">Verify</button></div>
                </div>
                </div>
              </div>
              <div class="nextbtn">

                <button class="btn btn-danger" id="nextbtn1" type="button">Next</button></div>
             
               </div>
               </div> 
               </div>
              
               
               
              <div class="container imm-content" id="imm-content2">
                 <div class="col-md-12 btn-danger"><h4 class="my-2">Secondary Details</h4></div>
                    <div class="row mt-4">
                <div class="col-md-4">
                  <label>Email:</label>
                      <div>
                     {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
                     <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                 </div>
                </div>
                <div class="col-md-4">
                  <label>Address:</label>
                         <div>
                    {!! Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) !!}
                    <?php echo ($errors->first('address',"<li class='custom-error'>:message</li>")) ?>
             </div>
                </div>
                   <div class="col-md-4">
                  <label>Gender:</label>
                         <div>
                    <select name="gender" id="" class="form-control">
                      <option value="" Selected disabled>-Select-</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
             </div>
                </div>
    
              </div>
                 <div class="row my-4">
                <div class="col-md-4">
                  <label>Country:</label>
                           <div>
                    <select name="country" id="" class="form-control" onChange="getState(this.value);">
                            <option value="" Selected disabled>--Select--</option>
                            
                        @foreach($countries as $c)
                      <option value={{$c->country_id}}>  {{ $c->country_name }}</option>
    
                    @endforeach
                </select>
                <?php echo ($errors->first('country',"<li class='custom-error'>:message</li>")) ?>
                {{-- {!! Form::text('country', null, array('class'=>'form-control', 'placeholder'=>'Country')) !!} --}}
         </div>
                </div>
                <div class="col-md-4">
                  <label>State:</label>

            <div>
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
                </div>
                <div class="col-md-4">
                  <label>City:</label>

      
         <div>
                        <select name="city" id="city-list" class="form-control" >
                                        <option value="" >--Select--</option>
                                </select>
                                <?php echo ($errors->first('city',"<li class='custom-error'>:message</li>")) ?>
                {{-- {!! Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) !!} --}}
      </div>
                </div>
                     <div class="col-md-4 my-2">
              <label>Purpose of Visit:</label>
              <select class="form-control">
                    <option selected disabled>-Select-</option>
                    <option>TOEFL</option>
                    <option>IELTS</option>
                    <option>PTE</option>
                    <option>OET</option>
                    <option>PTE</option>
                    <option>PR</option>
                    <option>Immigration</option>
                    <option>Work Visa</option>
                    <option>Student Visa</option>
                  </select>

                </div>
              </div>
    
              <div class="nextbtn"><button class="btn btn-danger" id="nextbtn2" type="button">Next</button></div>
              </div> 
                 
                   <!-- Marriage end -->
            

 

                
                <div class="container imm-content" id="imm-content3">
                  <div class="col-md-12 btn-danger"><h4 class="my-2">Education Details</h4></div>
                <div class="row">
                  <div class="col-md-2">
                    <label>Qualification:</label>
                    <div>
                        <select name="qualification_name[]" id="" class="form-control">
                        <option selected disabled> selected </option>
                       <option value="10"> 10 </option>
                       <option value="12"> 12 </option>
                       <option value="Graduate"> Graduate </option>
                       <option value="post Graduate"> Post Graduate </option>
                     </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Stream:</label>
                    <div>
                      {!! Form::text('edu_stream[]', null, array('class'=>'form-control' )) !!}
                    </div>
                    <div>
                      
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Name of Institute:</label>
                    <div>
                      {!! Form::text('institute_name[]', null, array('class'=>'form-control' )) !!}
                      
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Year of Passing:</label>
                    <div>
                      {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!}
                      
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Percentage:</label>
                    <div>
                        {!! Form::text('percentage[]', null, array('class'=>'form-control' )) !!}
                      
                    </div>

                  </div>
                </div>
                 <div class="add-class"> </div>


                <div class="addhistory my-2"><i onclick="add_education();" class="fa plussign" >+</i></div>

              <div class="nextbtn"><button class="btn btn-danger" id="nextbtn3" type="button">Next</button></div>
              
                
                
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
        $('.add-class').append('<div class="row my-2"> <div class="col-md-2"> <label>Qualification:</label> <div> <select name="qualification_name[]" id="" class="form-control"> <option selected="" disabled=""> selected </option> <option value="10"> 10 </option> <option value="12"> 12 </option> <option value="Graduate"> Graduate </option> <option value="post Graduate"> Post Graduate </option> </select> </div></div><div class="col-md-3"> <label>Stream:</label> <div> <input class="form-control" name="edu_stream[]" type="text"> </div><div> </div></div><div class="col-md-3"> <label>Name of Institute:</label> <div> <input class="form-control" name="institute_name[]" type="text"> </div></div><div class="col-md-2"> <label>Year of Passing:</label> <div> <input class="form-control" name="passing_year[]" type="text"> </div></div><div class="col-md-2"> <label>Percentage:</label> <div> <input class="form-control" name="percentage[]" type="text"> </div></div></div>');
        }   
  
        function add_company(){
          $('.add-company').append('<div class="row my-2"> <div class="col-md-3"> <label>Company Name:</label> <div> <input class="form-control" name="company[]" type="text"> </div></div><div class="col-md-3"> <label>Designation:</label> <div> <input class="form-control" name="designation[]" type="text"> </div></div><div class="col-md-3"> <label>Start Date:</label> <div> <input class="form-control" min="1979-12-31" max="2020-01-02" name="exp_start[]" type="date"> </div></div><div class="col-md-3"> <label>End Date:</label> <div> <input class="form-control" min="1979-12-31" max="2020-01-02" name="exp_end[]" type="date"> </div></div></div>')
        }
      </script>
            






            
            <div class="container imm-content" id="imm-content4">
              <div class="col-md-12 btn-danger"><h4 class="my-2">Work Experience</h4></div>
              <div class="row">
                <div class="col-md-3">
                  <label>Company Name:</label>
                  <div>
                     {!! Form::text('company[]', null, array('class'=>'form-control' )) !!}
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Designation:</label>
                  <div>
                        {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}
                    
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Start Date:</label>
                  <div>
                    {!! Form::date('exp_start[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}
                    
                  </div>
                </div>
                <div class="col-md-3">
                  <label>End Date:</label>
                  <div>
                  {!! Form::date('exp_end[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}
                    
                  </div>
                </div>
              </div>
              <div class="add-company"></div>
                <div class="addhistory my-2"><i class="fa plussign pointer" id="add_clas" onclick="add_company();" aria-hidden="true">+</i></div>
              <div class="nextbtn"><button class="btn btn-danger" id="nextbtn4" type="button">Next</button></div>
                
            </div>
         








          

          <div class="container language-test imm-content" id="imm-content5">
             <div class="col-md-12 btn-danger"><h4 class="my-2">English Language Test</h4></div>

            <div class="row">
              <div class="col-md-2" id="toe"><strong>TOEFL :</strong></div>
              <div class="col-md-5">{!! Form::radio('toefl', 'y', false, array('onclick' => 'toefl_show()' )) !!}  Taken</div>
              <div class="col-md-5">
                {!! Form::radio('toefl', 'n',true, array('onclick' => 'toefl_hide()' )) !!} Not Taken 
              </div>
            </div>
      

                 <div class="row" id = "toefl_select">
                              <div class="col-12">
                            <p class="lang-head">TOEFL Score</p>
                                
                              </div>
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
              <div class="col-md-2" id="iel"><strong>IELTS : </strong></div>
              <div class="col-md-5"> {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()')) !!}  Taken</div>
              <div class="col-md-5">
                  {!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()' )) !!} Not Taken
              </div>
            </div>
     

              
                  <div class="row" id="ielts_select">
                      <div class="col-12">
                        <p class="lang-head">IELTS Score</p>
                      </div>
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

         <div class="row">
              <div class="col-md-2" id="pte"><strong>PTE : </strong></div>
              <div class="col-md-5">{!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()' )) !!}Taken</div>
              <div class="col-md-5">
                {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()')) !!} Not Taken
              </div>
            </div>
         
             <div class="row" id="pte_select">
                        <div class="col-12">
                        <p class="lang-head">PTE Score</p>
                          
                        </div>
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
            
              <div class="row">
              <div class="col-md-2" id="oet"><strong>OET : </strong></div>
              <div class="col-md-5">{!! Form::radio('oet', 'y', false,  array('class'=>'form-contro','onclick' => 'oet_show()' )) !!} Taken</div>
              <div class="col-md-5">
                 {!! Form::radio('oet', 'n', true, array('class'=>'form-contro' , 'onclick' => 'oet_hide()' )) !!} Not Taken 
              </div>
            </div>
         

                      <div class="row" id="oet_select">
                          <div class="col-12">
                          <p class="lang-head">OET Score</p>
                            
                          </div>
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
                <div class="nextbtn"><button class="btn btn-danger" id="nextbtn5" type="button">Next</button></div>
          </div>
     
    
    <div class="container imm-content" id="imm-content6">

       <div class="col-md-12 btn-danger"><h4 class="my-2">Immigration History</h4></div>
<div class="add-history row"></div>



<div class="row">

<div class=" col-md-3 my-3">
<p> Country Travelled  Before ? </p>

<select class="form-control" name="imm_history[]" id="imm_history" class="imm_history">
      <option value="" disabled selected> --Selected--</option>
        @if(!empty($countries))
        @foreach($countries as $con)
    <option>{{ $con->country_name }}</option>
 @endforeach
 @endif
</select>
</div>


<div class="col-md-3 my-3 disabled-class">
    <p> From: </p>
    {!! Form::date('imm_history_from[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> To: </p>
    {!! Form::date('imm_history_to[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> Duration: </p>
    {!! Form::text('imm_history_duration[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}

</div>

  <div class="col-md-12 addhistory">
    <i onclick="add_history();" class="fa plussign">   + </i>
</div>

</div>



<div class="row">
   <div class="col-md-8 py-3 ">   <p> Any Visa Rejected Before ? </p> </div>
         <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('visa_rejected', 'y', false, array('onchange'=>'show_visa_rejected()','id'=>'visa_rejected' )) !!}
                  
                <label for= "visa_rejected">Yes Rejected</label>

                   {!! Form::radio('visa_rejected', 'n', true,array('onchange'=>'hide_visa_rejected()','checked', 'id'=> 'visa_not_rejected')) !!}
               <label for="visa_not_rejected">     Not Rejected </label>
              <div id="visa_rejected_country">
             <div class="add-visa-rejected-country"></div>
               <select name="visa_rejected_country[]" class="visa_rejected_country form-control py-2 ">
                 <option value="" disabled selected>--Selected--</option>
                 @foreach($countries as $c)
                 <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
              @endforeach
               </select>  
                <div class="rejectcountry"><i onclick="add_visa_rejected_country();" class="fa fa-plu plussign" id="visa_rejected_button">   + </i></div>
                </div>
                </div>
</div>




<div class="row my-3">
<div class="col-md-8">
                  
    <label>Interested for Intake :</label>
</div>
      <div class="col-md-4">
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

     </div>
    

  





 <div class="nextbtn"><button class="btn btn-danger" id="nextbtn6" type="button">Next</button></div>
         
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

                     function add_history(){
      $('.add-history').append('<div class=" col-md-3 my-3"><p> Country Travelled  Before ? </p><select class="form-control" name="imm_history[]" id="imm_history"><option value="" disabled selected> --Selected--</option>@if(!empty($countries))@foreach($countries as $con)<option>{{ $con->country_name }}</option>@endforeach   @endif</select></div><div class="col-md-3 my-3 disabled-class"><p> From </p>{!! Form::date("imm_history_from[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-3 my-3 disabled-class"><p> To </p>{!! Form::date("imm_history_to[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-3 my-3 disabled-class"><p> Duration </p>{!! Form::text("imm_history_duration[]", null, array("class"=>"form-control","min"=>"1979-12-31","max"=>"2020-01-02"))!!} </div>');
      }
       
         function add_visa_rejected_country(){
    $('.add-visa-rejected-country').append(' <select name="visa_rejected_country[]" class="visa_rejected_country form-control "> <option value="" disabled selected>--Selected--</option> @foreach($countries as $c)<option value={{$c->country_name}}>  {{ $c->country_name }}</option>          @endforeach</select>  ');
  }         
                </script>
                
                
        
                
                
             
                



                

              <div class="container imm-content" id="imm-content7">
                <div class="col-md-12 btn-danger"><h4 class="my-2">Financial</h4></div>
                <div class="row">
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
</div>
 <div class="nextbtn"><button class="btn btn-danger" id="nextbtn7" type="button">Next</button></div>
</div>

 

              <div class="container imm-content" id="imm-content8">
   <div class="col-md-12 btn-danger"><h4 class="my-2">Marital Status</h4></div>
                        <div class="row my-4">
                <div class="col-md-4">
                <label for=""></label>

                  <div>
                    {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()')) }}
                    Marriage
                </div>
                </div>
                <div class="col-md-4">
                    <label for=""></label>

                    <div>
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()')) }} Unmarriage
                </div>
                </div>
               


              </div>

                <?php echo ($errors->first('marriage',"<li class='custom-error'>:message</li>")) ?>
               <div id="k0check2" class="w-100">
                   
                    <div class="row mb-4">
                             <div class="col-md-4">
                              <label>Date of Marriage:</label>
                                 <div>
                                    {!! Form::date('dom', null, array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?>
                                </div>
                             </div>
                          <div class="col-md-4">
                            <label>Spouse Qualification:</label>
                              <div>
                                    {!! Form::text('spouse_qualification', null, array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ')) !!}

                                </div>
                          </div>

                          <div class="col-md-4">
                            <label>Spouse Income Proof</label>
                               <div>
                                    {!! Form::file('sip', array('class'=>'spouseproof' )) !!}
                                </div>
    
                          </div>
                           
                     </div>

               
                </div>
              {{-- <div class="nextbtn"><button class="btn btn-danger" id="nextbtn8" type="button">Next</button></div> --}}
        
              </div>
              
               
               <!-- toggle -->
               
               <div class="container imm-content" id="imm-content9">
                <div class="col-md-12 btn-danger"><h4 class="my-2">Other Details</h4></div>
                 <div class="row">
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
                 </div>

               <div class="col-md-12 text-center my-4" >
               
               {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!}
              </div>
               </div>
   
              
               <!-- toggle end -->

              




           
        </div>
       {{Form::close()}}
 </div>






 @endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
  $("#nextbtn1").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav2").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content2").addClass('showcontent');
  });

    $("#nextbtn2").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav3").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content3").addClass('showcontent');
  });

    $("#nextbtn3").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav4").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content4").addClass('showcontent');
  });

     $("#nextbtn4").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav5").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content5").addClass('showcontent');
  });

     $("#nextbtn5").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav6").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content6").addClass('showcontent');
  });


  $("#nextbtn6").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav7").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content7").addClass('showcontent');
  });

  $("#nextbtn7").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav8").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content8").addClass('showcontent');
  });

  $("#nextbtn8").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(".tabnav9").addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content9").addClass('showcontent');
  });


 
  // breadcrumb js
    $(".tabnav1").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content1").addClass('showcontent');
  });

   $(".tabnav2").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content2").addClass('showcontent');
  });

   $(".tabnav3").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content3").addClass('showcontent');
  });

   $(".tabnav4").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content4").addClass('showcontent');
  });

      $(".tabnav5").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content5").addClass('showcontent');
  });

     $(".tabnav6").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content6").addClass('showcontent');
  });

     $(".tabnav7").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content7").addClass('showcontent');
  });

     $(".tabnav8").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content8").addClass('showcontent');
  });

       $(".tabnav9").click(function(event) {
    $(".tab-navoption").removeClass('active');
    $(this).addClass('active');
    $(".imm-content").removeClass('showcontent');
    $("#imm-content9").addClass('showcontent');
  });
});
</script>




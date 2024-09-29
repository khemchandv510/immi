



@extends('header')
@section('enquiry-desktop')



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






<div class="container-fluid my-5">
    <h3>Complete Registration</h3>
    {{-- @if(session()->get('unique_id_sess') ==  '') --}}
    {{-- <script> window.location.href = "enquiry";  </script> --}}
    {{-- @endif  --}}
    
    {{-- @if((session()->get('unique_id_sess')) !=  ''  ) 
    {{
     $sess_name = session()->get('name'),
     $sess_phone = session()->get('phone'),
     $sess_alternate_contact = session()->get('alternate_contact'),
     $sess_email = session()->get('email')
     
     }} --}}
     @if(1>2)  
     
         {{-- {{ 
    $name = $sess_name =  $e->name,
    $phone = $sess_phone =  $e->contact,
    $name = $sess_alternate_contact =  $e->alternate_contact,
    $email = $sess_email =  $e->email
     }}
       --}}
    
  
    {{Form::open(array('url'  =>  'enquiry_post' ,'files'=>'true', 'class'=>'enquiry-form', 'id' =>'enquiry'))}}                   
        <div class="row content-color">
        
         <div class="col-md-12 btn-danger"><h4 class="my-2">Registration Details</h4></div>   
              <div class="col-md-2 py-3 ">Candidate Name:</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::text('name',  session()->get('name'), array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name', 'disable' =>'disable', 'readonly'=>"true")) !!}
                    <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                </div>
   
    

               <div class="col-md-2 py-3 ">Date Of Birth :</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::date('dob',  null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                    <?php echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) ?>
                </div>
                   


            
         
                




               <div class="col-md-2 py-3 ">Email Id :</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::email('email', session()->get('email'), array('class'=>'form-control', 'placeholder'=>'Email Id','id'=>'email')) !!}
                    <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                
                </div>
              
                 
                    
        


                {{-- <div class="col-md-2 py-3"> Confirm Email ID :</div>
          
                <div class="col-md-4 py-3">
                    {!! Form::email('confirm_email', session()->get('confirm_email'), array('class'=>'form-control', 'placeholder'=>'Confirm Email Id','id'=>'emai')) !!}
                                </div> --}}






            

            <div class="col-md-2 py-3">Mobile No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('contact', session()->get('phone'), array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;" ,'disable'=>'disable',  'readonly'=>"true")) !!}
              <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
          </div>

          

          <div class="col-md-2 py-3"> Alternate No:  </div>
            <div class="col-md-4 py-3">
             {!! Form::number('alternate_contact',session()->get('alternate_contact'), array('class'=>'form-control', 'placeholder'=>'Alternete Contact','onKeyPress'=>"if(this.value.length==10) return false;")) !!}
              <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>
            </div>

            <div class="col-md-2 py-3">Gender:  </div>
            <div class="col-md-4 py-3">
                <select class="form-control" name="gender">
                  <option disabled Selected> --Select-- </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    
                  </select>
                  <?php echo ($errors->first('gender',"<li class='custom-error'>:message</li>")) ?>
            </div>


            {{-- <div class="col-md-2 py-3"> --}}
                {{-- Confirm Email ID : --}}
              {{-- </div>
          <div class="col-md-4 py-3"> --}}
              {{-- {!! Form::email('email_confirm', null, array('class'=>'form-control', 'placeholder'=>'Confirm Email Id', 'onblur'=>"return email_confirm()",'id'=>'email_confirm_id')) !!} --}}
              <?php
              //  echo ($errors->first('email_confirm',"<li class='custom-error'>:message</li>"))
                ?>
          {{-- </div> --}}




            
            <div class="col-md-4 py-3 "></div>
            <div class="col-md-12 btn-danger"><h4 class="my-2">Marital Status  </h4></div>   
            <div class="col-md-2 py-3 "></div>   
            <div class="col-md-2 py-3 ">
                    {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()', 'id' => 'Married')) }}
                   <label for="Married"> Married  </label>
                    
                </div>
               <div class="col-md-2 py-3 ">
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()', 'id'  => 'Unmarried')) }}
                    <label for="Unmarried"> Unmarried </label>
                    
                </div>

                <div class="col-md-2 py-3 ">
                    {{ Form::radio('marriage', 'n' , false, array('onclick'=>'hide_marriage()', 'id' => 'Divorced')) }}
                   <label for="Divorced">Divorced </label>
                    
                </div>
               <div class="col-md-2 py-3 ">
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()', 'id'  => 'Widow')) }}
                    <label for="Widow"> Widow </label>
                    
                </div>
                <div class="col-md-2 py-3 "></div>
               <div id="k0check2">
                    <div class="container">
                    <div class="row">
                             <div class="col-md-2 py-3">Date of Marriage</div>
                             <div class="col-md-4 py-3" >
                                    {!! Form::date('dom', null, array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?>
                                </div>
                             <div class="col-md-2 py-3"> Spouse Qualification</div>
                             <div class="col-md-4 py-3">
                                    {!! Form::text('spouse_qualification', null, array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ')) !!}
                                    <?php echo ($errors->first('spouse_qualification',"<li class='custom-error'>:message</li>")) ?>

                                </div>
           
            <div class="col-md-2  py-3">Spouse Income Proof</div>
                             <div class="col-md-4  py-3">

                                <img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="Spouse Image"  id="img1">

                                    {!! Form::file('sip', array('class'=>'form-control', 'id'=>'file1', 'onchange'=>'GetFileSize1(this);'  )) !!}
                                    
                                </div>
    
                     </div>
                   </div>
                </div>

                   <!-- Marriage end -->
            <div class="col-md-12 btn-danger"><h4 class="my-2">Id Proof Details</h4></div>
            
            <div class="col-md-2 py-3"><p>Id Proof</p></div>
            <div class="col-md-4 py-3">
              <select class="form-control" name="id_proof">
                <option disabled selected> --Selected--</option>
                    <option value="AADHAAR CARD">AADHAAR CARD</option>
                    <option value="VOTER ID">VOTER ID</option>
                    <option value="PAN CARD">PAN CARD</option>
                    <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                    <option value="PASSPORT">PASSPORT</option>
                    
                  </select>
                </div>
                  
        <div class="col-md-2 py-3">Name (As Mentioned in the ID Proof):  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('id_proof_name', null, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof ')) !!}
          </div>
          
          <div class="col-md-2 py-3">ID Proof No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('id_proof_no', null, array('class'=>'form-control', 'placeholder'=>'ID Proof No')) !!}
          </div>
          
          
    {{-- <div class="col-md-12 btn-danger">
    
    
      <h4 class="my-2">Father's / Guardian's Details</h4></div>

          <div class="col-md-2 py-3">Father/Guardian Name :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('father_name', null, array('class'=>'form-control', 'placeholder'=>'Father Name')) !!}
          </div>
          <div class="col-md-2 py-3">Occupation :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('occupation', null, array('class'=>'form-control', 'placeholder'=>'Occupation')) !!}
          </div>

          <div class="col-md-2 py-3">Mobile No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('fathert_contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No','onKeyPress'=>"if(this.value.length==10) return false;")) !!}
             
          </div>
          <div class="col-md-2 py-3">Alternate No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('alternet_contact', null, array('class'=>'form-control', 'placeholder'=>'Alternate No', 'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
          </div>       --}}




          
     <div class="col-md-12 btn-danger"><h4 class="my-2">Permanent Address</h4></div>

          <div class="col-md-2 py-3">House No:  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('address_line1', null, array('class'=>'form-control', 'placeholder'=>'House No')) !!}
          </div>
          <div class="col-md-2 py-3">Street :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('address_line2', null, array('class'=>'form-control', 'placeholder'=>'Street')) !!}
          </div>

          <div class="col-md-2 py-3">Country:  </div>
          <div class="col-md-4 py-3">
              <select name="country" id="" class="form-control" onChange="getState(this.value);">
                  <option value="" Selected disabled>--Select--</option>
                  
              @foreach($countries as $c)
            <option value={{$c->country_id}}>  {{ $c->country_name }} </option>

          @endforeach
      </select>

            
          </div>

          <div class="col-md-2 py-3">State:  </div>
          <div class="col-md-4 py-3">


              <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                  <option value="" >--Select--</option>
                  {{-- @if(!empty($states))
              @foreach($states as $c)
            <option value={{$c->state_id}}>  {{ $c->state_name }}</option>

          @endforeach
          @endif --}}
      </select>

            
          </div>
          <div class="col-md-2 py-3">City/Town:  </div>
          <div class="col-md-4 py-3">
              <select name="city" id="city-list" class="form-control" >
                  <option value="" >--Select--</option>
          </select>
          </div>
          {{-- <div class="col-md-2 py-3">District :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('district', null, array('class'=>'form-control', 'placeholder'=>'District')) !!}
          </div> --}}

         
          <div class="col-md-2 py-3">Pincode :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('pincode', null, array('class'=>'form-control', 'placeholder'=>'Pincode', 'onKeyPress'=>"if(this.value.length==6) return false;")) !!}
          </div>

            {{-- <div class="col-md-3 py-3">Nationality :  </div>
            <div class="col-md-3 py-3">
                {!! Form::text('nationality', null, array('class'=>'form-control', 'placeholder'=>'Nationality')) !!}
            </div> --}}
         
<div class="col-md-12 btn-danger"><h4 class="my-2">Course Enrollment Detail</h4></div>

          <div class="col-md-2 py-3">Start Session :  </div>
          <div class="col-md-4 py-3">
            <select class="form-control" name="session">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
               </select>
              </div>
          <div class="col-md-2 py-3">Country  </div>
          <div class="col-md-4 py-3">
            <select class="form-control" name="course_country">
              @if(!empty($countries))
              @foreach($countries as $c)
                    <option value={{ $c->country_name }}> {{ $c->country_name }} </option>
                    @endforeach
                    @endif
                  </select>
                </div>

          <div class="col-md-2 py-3">Course :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('course', null, array('class'=>'form-control', 'placeholder'=>'Course')) !!}
          </div>

          <div class="col-md-2 py-3 ">Interested for Intake :</div>
          <div class="col-md-4 py-3 ">
           

               <select name="interested_intake" id="" class="form-control">
                 <option value="" selected disabled>--Select--</option>
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


          {{-- <div class="col-md-2 py-3">Batch Type :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('batch', null, array('class'=>'form-control', 'placeholder'=>'Batch Type')) !!}
          </div> --}}

          {{-- <div class="col-md-2 py-3">Exam :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('exam', null, array('class'=>'form-control', 'placeholder'=>'Exam')) !!}
          </div> --}}
          {{-- <div class="col-md-2 py-3">Stream :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('course_stream', null, array('class'=>'form-control', 'placeholder'=>'Stream')) !!}
          </div> --}}
          
              <div class="col-md-12 btn-danger education-details"><h4 class="my-2">Education Details</h4></div>
              <div class="container">
               <div class="col-md-12 py-3 scrollmenu row  ">
                  <div class="add-class"> </div>
                 <div class="col-md-2">
                   <p>Qualification</p>
                   <select name="qualification_name[]" id="" class="form-control">
                      <option selected disabled> selected </option>

                      <option value="Certificate I"> Certificate I </option>
                      <option value="Certificate II"> Certificate II </option>
                      <option value="Certificate III"> Certificate III </option>
                      <option value="Certificate IV"> Certificate IV </option>
                      <option value="Diploma"> Diploma </option>
                      <option value="Advance Diploma"> Advance Diploma </option>
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
                    {{-- {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!} --}}
                    <select name="passing_year[]" id="" class="form-control">
                      <option selected disabled>--Selected--</option>
                      @for($i=1990; $i<=2020; $i++)
                      <option value="{{$i}}"> {{$i}}  </option>
                      @endfor 
                    </select>
                  </div>
                  <div class="col-md-2">
                      <p>Percentage</p>
                      {!! Form::text('percentage[]', null, array('class'=>'form-control' )) !!}
                    </div>
                    <i onclick="add_education();" class="fa fa-plu plus-sign" >   +</i>
                      
                             
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
      $('.add-class').append('<div class="col-md-12 py-3 scrollmenu row"><div class="col-md-2"><p>Qualification</p><select name="qualification_name[]" id="" class="form-control">      <option selected disabled> selected </option>   <option value="Certificate I"> Certificate I </option><option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option>       <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option><option value="Advance Diploma"> Advance Diploma </option>      <option value="10"> 10 </option><option value="12"> 12 </option>        <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option></select></div>  <div class="col-md-3"><p>Stream</p>   {!! Form::text("edu_stream[]", null, array("class"=>"form-control")) !!}  </div>   <div class="col-md-3"><p>Name of Institute</p>{!! Form::text("institute_name[]", null, array("class"=>"form-control" )) !!}</div><div class="col-md-2"><p>Year of Passing</p> <select name="passing_year[]" id="" class="form-control"> <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}}  </option>  @endfor </select></div><div class="col-md-2"><p>Percentage</p> {!! Form::text("percentage[]", null, array("class"=>"form-control" )) !!} </div> </div>');
      }   

      function add_company(){
        $('.add-company').append('<tr> <tr><td> {!! Form::text('company[]', null, array('class'=>'form-control' )) !!}</td> <td> {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}</td><td>  {!! Form::date('exp_start[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> <td> {!! Form::date('exp_end[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> </tr>')
      }

      function financial(){
        $('.add-financial').append(' <div class="col-md-5 py-3">  <select class="form-control" name="financial[]"> <option disabled selected>--Select--</option>                                                                 <option VALUE="Bank loan">Bank loan</option>    <option VALUE="Personal Fund">Personal Fund</option>    <option VALUE="Family Sponsorship">Family Sponsorship</option>   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>   <option VALUE="Other">Other</option>  </select> </div>              <div class="col-md-4 py-3">                  {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}         </div>  <div class="col-md-1"> <i onclick="financial();" class="fa fa-plu plus-sign plus">    </i> </div>')
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


<style>
.language-test p{
  margin: 0;
}
.language-test select{
  /* max-width: 100px;
    margin: auto; */
}
</style>

                
<div class="col-md-12 btn-danger"><h4 class="my-2">English Language Test</h4></div>
{{-- english language test --}}
<div class="container-fluid language-test">
  <div class="row">
               <div class="col-md-12 py-3" style="    text-align: center;">
               
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
                          
                          {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()', 'id' => 'PteNotTaken')) !!} <label for="PteNotTaken"> Not Taken </label></p> </div>





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






<div class="row">
     
  </div>






</div>         




</div>


{{-- end of english language test --}}










              {{-- <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Listening :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Listening"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Reading :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Reading"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Writing :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Writing"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Speaking :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Speaking"></div>

               <div class="col-md-4"></div>
               --}}

<div class="container-fluid">
  <div class="row"><div class="col-md-12 py-2  ">How student will show financials?</div></div>
    <div class="row add-financial"></div>
  <div class="row">
               
               <div class="col-md-5 py-3">
                 <select class="form-control" name="financial[]">
                  <option disabled selected>--Select--</option>    
                    <option VALUE="Bank loan">Bank loan</option>
                    <option VALUE="Personal Fund">Personal Fund</option>
                    <option VALUE="Family Sponsorship">Family Sponsorship</option>
                    <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                    <option VALUE="Other">Other</option>
                  </select>
               </div>
               
               <div class="col-md-4 py-3">
                  {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!} 
                </div>
                <div class="col-md-1">
                    <i onclick="financial();" class="fa fa-plu plus-sign">   + </i>

                </div>
               
  </div>
 
               
</div>
</div>
        

              <!-- toggle -->
              <div class="container-fluid">
                <div class="row">
{{-- 
              <div class="col-md-12 btn-danger"><h4 class="my-2">Other Details</h4></div>

               <div class="col-md-8 py-3 ">Visa Status</div>
               <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('history', 'y', false, array('onchange'=>'show_history()')) !!}Approved
                   {!! Form::radio('history', 'n', true,array('onchange'=>'hide_history()','checked')) !!}Not Approved
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
                                @if(!empty($countries))
                                @foreach($countries as $con)
                            <option>{{ $con->country_name }}</option>
                         @endforeach
                         @endif

                       </select>
                      
                      </div>
      
      
                        <div class="col-md-3  py-3">Visa Status</div>
                        <div class="col-md-3  py-3">
                                {!! Form::text('visa_decision', null, array('class'=>'form-control' )) !!}
                        </div>
                        <div class="col-md-3  py-3">Date of Visa Decision</div>
                        <div class="col-md-3  py-3">
                                {!! Form::date('visa_decision_date', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                        </div>
                </div>
              </div>
            </div> --}}
         
            


{{-- history --}}
<div class="col-md-12 btn-danger"><h4 class="my-2">Immigration History</h4></div>
<div class="add-history row"></div>

<div class="row" style="width:100%">
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
    <p> From </p>
    {!! Form::date('imm_history_from[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> To </p>
    {!! Form::date('imm_history_to[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-2 my-3 disabled-class">
    <p> Duration </p>
    {!! Form::text('imm_history_duration[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-1 my-3 disabled-class">
    <i onclick="add_history();" class="fa fa-plu plus-sign">   + </i>
</div>

</div>





 <div class="col-md-8 py-3 ">   <p> Any Visa Rejected Before ? </p> </div>
               <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('visa_rejected', 'y', false, array('onchange'=>'show_visa_rejected()','id'=>'visa_rejected' )) !!}
                  
                <label for= "visa_rejected">Yes Rejected</label>

                   {!! Form::radio('visa_rejected', 'n', true,array('onchange'=>'hide_visa_rejected()','checked', 'id'=> 'visa_not_rejected')) !!}
               <label for="visa_not_rejected">     Not Rejected </label>
<div class="add-visa-rejected-country"></div>
               <select name="visa_rejected_country[]" class="visa_rejected_country form-control py-2 " id="visa_rejected_country">
                 <option value="" disabled selected>--Selected--</option>
                 @foreach($countries as $c)
                 <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
              @endforeach
               </select>  
                <i onclick="add_visa_rejected_country();" class="fa fa-plu plus-sign" id="visa_rejected_button">   + </i>
                </div>

<style>
#visa_rejected_country, #visa_rejected_button{
  display: none;
}
</style>

<script>
  
  // $(document).ready(function(){
  //   $('.disabled-class input').attr('disabled', 'disabled');
  //     $('.imm_history').on('change', function(){
  //       $('.disabled-class input').attr('disabled', false);
  //     });
  // }); 


</script>


<script>
  function add_visa_rejected_country(){
    $('.add-visa-rejected-country').append(' <select name="visa_rejected_country[]" class="visa_rejected_country form-control "> <option value="" disabled selected>--Selected--</option> @foreach($countries as $c)<option value={{$c->country_name}}>  {{ $c->country_name }}</option>          @endforeach</select>  ');
  }
</script>


<script>
    
    function add_history(){
      $('.add-history').append('<div class=" col-md-3 my-3"><p> Country Travelled  Before ? </p><select class="form-control" name="imm_history[]" id="imm_history"><option value="" disabled selected> --Selected--</option>@if(!empty($countries))@foreach($countries as $con)<option>{{ $con->country_name }}</option>@endforeach   @endif</select></div><div class="col-md-3 my-3 disabled-class"><p> From </p>{!! Form::date("imm_history_from[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-3 my-3 disabled-class"><p> To </p>{!! Form::date("imm_history_to[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-2 my-3 disabled-class"><p> Duration </p>{!! Form::text("imm_history_duration[]", null, array("class"=>"form-control","min"=>"1979-12-31","max"=>"2020-01-02"))!!} </div>');
      }
</script>

<style>
.add-history{
  width:100%;
}
</style>

{{-- end hostory --}}




               <!-- toggle end -->

          <div class="col-md-12 btn-danger"><h4 class="my-2">Upload Image/ Documents</h4></div>
          <div class="container my-5">
<div class="row">
          <div class="col-md-6 text-center"><div>Upload Image</div>
                <img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="Italian Trulli"  id="img2">
                {!! Form::file('image', array('class'=>'form-control', 'id'=>'file2','onchange'=>'GetFileSize2(this);')) !!}
          </div>
          <div class="col-md-6 text-center"><div>Upload Signature</div>
                <img src="https://via.placeholder.com/160x194" alt="Italian Trulli" id="img3">
                {!! Form::file('signature', array('class'=>'form-control', 'id'=>'file3','onchange'=>'GetFileSize3(this);')) !!}

          </div></div>

          <div class="col-md-12 my-4"> <input type="checkbox" name="term_condition">
             I AGREE
            TERMS & CONDITIONS</div>
            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>




               <div class="col-md-12 text-center my-4" >
                  {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!}
              </div>
              </div>
           
        </div>
        {{Form::close()}}


        














        @elseif(!empty($enquiries) )


        @foreach($enquiries as $e)


  
        {{Form::open(array('url'  =>  'enquiry_post' ,'files'=>'true', 'class'=>'enquiry-form', 'id' =>'enquiry'))}}                  
        
        {!! Form::hidden('unique_id' , $id)!!}

        <div class="row content-color">
        
         <div class="col-md-12 btn-danger"><h4 class="my-2">Registration Details</h4></div>   
              <div class="col-md-2 py-3 ">Candidate Name:</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::text('name',  $e->name, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                    <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                </div>
   
    

               <div class="col-md-2 py-3 ">Date Of Birth :</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::date('dob',  $e->dob, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                    <?php echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) ?>
                </div>
                   


            
         
                




               <div class="col-md-2 py-3 ">Email Id :</div>
               <div class="col-md-4 py-3 ">
                    {!! Form::email('email', $e->email, array('class'=>'form-control', 'placeholder'=>'Email Id','id'=>'email')) !!}
                    <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                
                </div>
              
                 
                    
        


                {{-- <div class="col-md-2 py-3"> Confirm Email ID :</div>
          
                <div class="col-md-4 py-3">
                    {!! Form::email('confirm_email', session()->get('confirm_email'), array('class'=>'form-control', 'placeholder'=>'Confirm Email Id','id'=>'emai')) !!}
                                </div> --}}






            

            <div class="col-md-2 py-3">Mobile No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('contact', $e->contact, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
              <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
          </div>

          

          <div class="col-md-2 py-3"> Alternate No:  </div>
            <div class="col-md-4 py-3">
             {!! Form::number('alternate_contact',$e->alternate_contact, array('class'=>'form-control', 'placeholder'=>'Alternete Contact','onKeyPress'=>"if(this.value.length==10) return false;")) !!}
              <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>
            </div>

            <div class="col-md-2 py-3">Gender:  </div>
            <div class="col-md-4 py-3">
                <select class="form-control" name="gender">
                  <option  style="" Selected value={{ $e->gender }}>{{ $e->gender }} </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    
                  </select>
                  <?php echo ($errors->first('gender',"<li class='custom-error'>:message</li>")) ?>
            </div>


            {{-- <div class="col-md-2 py-3"> --}}
                {{-- Confirm Email ID : --}}
              {{-- </div> --}}
          {{-- <div class="col-md-4 py-3"> --}}
              {{-- {!! Form::email('email_confirm', null, array('class'=>'form-control', 'placeholder'=>'Confirm Email Id', 'onblur'=>"return email_confirm()",'id'=>'email_confirm_id')) !!} --}}
              <?php
              //  echo ($errors->first('email_confirm',"<li class='custom-error'>:message</li>"))
                ?>
          {{-- </div> --}}



          @endforeach
            

          @if($enq_marriages->count() > 0)
          
          @foreach($enq_marriages as $m)
          
            <div class="col-md-12 btn-danger"><h4 class="my-2"> Marital Status :  </h4></div>
               <div class="col-md-4 py-3 ">
                    {{-- {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()', 'id'=>'married')) }} --}}
                   
                   {{-- <label for="married">  Married </label> --}}
                </div>
               <div class="col-md-4 py-3 ">
                    {{-- {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()', 'id' =>'unmarried')) }}  --}}
                     {{-- <label for="unmarried"> Unmarried </label>  --}}
                </div>
         <style>
           #k0check2{
             display: block;
           }
         </style>
                
               <div id="k0check2">
                    <div class="container">
                    <div class="row">
                      
                      
   <div class="col-md-2 py-3">Date of Marriage</div>
                             <div class="col-md-4 py-3" >
                                    {!! Form::date('dom', $m->dom , array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?>
                                </div>
                             <div class="col-md-2 py-3"> Spouse Qualification </div>
                             <div class="col-md-4 py-3">
                                    {!! Form::text('spouse_qualification', "$m->spouse_qualification", array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ', 'value' =>'sdfgsd')) !!}
                                    <?php echo ($errors->first('spouse_qualification',"<li class='custom-error'>:message</li>")) ?>

                                </div>
           
           
                             <div class="col-md-2  py-3">Spouse Income Proof</div>
                             <div class="col-md-4  py-3">
                                    {{-- {!! Form::file('sip', array('class'=>'form-control' )) !!} --}}
                                    <?php 
                                    // echo ($errors->first('sip',"<li class='custom-error'>:message</li>"))
                                     ?>



                                    <img src="{{url('public/uploads/sip/'.$m->spouse_income_proof) }}" alt="Spouse Image"  id="img1">
          
                                    {!! Form::file('image', array('class'=>'form-control', 'id'=>'file1','onchange'=>'GetFileSize1(this);')) !!}






                                </div>
    
                     </div>
                   </div>
                </div>


@endforeach


@elseif($enq_marriages->count() == 0)



<div class="col-md-4 py-3 ">Marital Status :</div>
               <div class="col-md-4 py-3 ">
                    {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()')) }}
                   
                    Married
                </div>
               <div class="col-md-4 py-3 ">
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()')) }} Unmarried
                </div>
                
               <div id="k0check2">
                    <div class="container">
                    <div class="row">
                      
                      

                             <div class="col-md-2 py-3">Date of Marriage</div>
                             <div class="col-md-4 py-3" >
                                    {!! Form::date('dom', null, array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?>
                                </div>
                             <div class="col-md-2 py-3"> Spouse Qualification</div>
                             <div class="col-md-4 py-3">
                                    {!! Form::text('spouse_qualification', null, array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ')) !!}
                                    <?php echo ($errors->first('spouse_qualification',"<li class='custom-error'>:message</li>")) ?>

                                </div>
           
           
                             <div class="col-md-2  py-3">Spouse Income Proof</div>
                             <div class="col-md-4  py-3">
                                    {!! Form::file('sip', array('class'=>'form-control' )) !!}
                                    <?php echo ($errors->first('sip',"<li class='custom-error'>:message</li>")) ?>
                                </div>
    
                     </div>
                   </div>
                </div>



@endif






                   <!-- Marriage end -->

                   @foreach($enquiries as $e)

            <div class="col-md-12 btn-danger"><h4 class="my-2">Id Proof Details</h4></div>
            
            <div class="col-md-2 py-3"><p>Id Proof</p></div>
            <div class="col-md-4 py-3">
              <select class="form-control" name="id_proof">
                
                <option  selected value={{$e->id_proof}} > {{$e->id_proof}}  </option>
                    <option value="AADHAAR CARD">AADHAAR CARD</option>
                    <option value="VOTER ID">VOTER ID</option>
                    <option value="PAN CARD">PAN CARD</option>
                    <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                    <option value="PASSPORT">PASSPORT</option>
                    
                  </select>
                </div>
                  
        <div class="col-md-2 py-3">Name (As Mentioned in the ID Proof):  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('id_proof_name', $e->id_proof_name, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof ')) !!}
          </div>
          
          <div class="col-md-2 py-3">ID Proof No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('id_proof_no', $e->id_proof_no, array('class'=>'form-control', 'placeholder'=>'ID Proof No')) !!}
          </div>
         
          
    {{-- <div class="col-md-12 btn-danger">
      <h4 class="my-2">Father's / Guardian's Details</h4></div>

          <div class="col-md-2 py-3">Father/Guardian Name :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('father_name', $e->father_name, array('class'=>'form-control', 'placeholder'=>'Father Name')) !!}
          </div>
          <div class="col-md-2 py-3">Occupation :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('occupation', $e->occupation, array('class'=>'form-control', 'placeholder'=>'Occupation')) !!}
          </div>

          <div class="col-md-2 py-3">Mobile No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('fathert_contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No','onKeyPress'=>"if(this.value.length==10) return false;")) !!}
             
          </div>
          <div class="col-md-2 py-3">Alternate No :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('alternet_contact', null, array('class'=>'form-control', 'placeholder'=>'Alternate No', 'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
          </div>      

 --}}







          
     <div class="col-md-12 btn-danger"><h4 class="my-2">Permanent Address</h4></div>

          <div class="col-md-2 py-3">House :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('address_line1', $e->address_line1, array('class'=>'form-control', 'placeholder'=>'House No')) !!}
          </div>
          <div class="col-md-2 py-3">Address :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('address_line2', $e->address_line2, array('class'=>'form-control', 'placeholder'=>'Address')) !!}
          </div>

          <div class="col-md-2 py-3">Country:  </div>
          <div class="col-md-4 py-3">
              <select name="country" id="" class="form-control" onChange="getState(this.value);">
                  <option  Selected  value="{{$e->country}}">{{$e->country}}</option>
                  
              @foreach($countries as $c)
            <option value={{$c->country_id}}>  {{ $c->country_name }}</option>

          @endforeach
      </select>

            
          </div>

          <div class="col-md-2 py-3">State:  </div>
          <div class="col-md-4 py-3">


              <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                  <option selected value="{{$e->state}}" >{{$e->state}}</option>
                  {{-- @if(!empty($states))
              @foreach($states as $c)
            <option value={{$c->state_id}}>  {{ $c->state_name }}</option>

          @endforeach
          @endif --}}
      </select>

            
          </div>
          <div class="col-md-2 py-3">City/Town:  </div>
          <div class="col-md-4 py-3">
              <select name="city" id="city-list" class="form-control" >
                  <option selected value="{{$e->city}}" >{{$e->city}}</option>
          </select>
          </div>
          {{-- <div class="col-md-2 py-3">District :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('district', null, array('class'=>'form-control', 'placeholder'=>'District')) !!}
          </div> --}}

         
          <div class="col-md-2 py-3">Pincode :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('pincode', $e->pincode, array('class'=>'form-control', 'placeholder'=>'Pincode', 'onKeyPress'=>"if(this.value.length==6) return false;")) !!}
          </div>

            {{-- <div class="col-md-3 py-3">Nationality :  </div>
            <div class="col-md-3 py-3">
                {!! Form::text('nationality', null, array('class'=>'form-control', 'placeholder'=>'Nationality')) !!}
            </div> --}}
         
      
         

         

<div class="col-md-12 btn-danger"><h4 class="my-2"></h4></div>
Course Enrollment Detail
          <div class="col-md-2 py-3">Start Session :  </div>
          <div class="col-md-4 py-3">
            <select class="form-control" name="session">
            <option value="{{ $e->course_session }}"> {{ $e->course_session }} </option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
               </select>
              </div>
          <div class="col-md-2 py-3">Country  </div>
          <div class="col-md-4 py-3">
            <select class="form-control" name="course_country">
              <option value=" {{ $e->course_country }} "> {{ $e->course_country }} </option>
              @if(!empty($countries))
              @foreach($countries as $c)
                    <option value={{ $c->country_name }}> {{ $c->country_name }} </option>
                    @endforeach
                    @endif
                  </select>
                </div>

          <div class="col-md-2 py-3">Course :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('course', $e->course, array('class'=>'form-control', 'placeholder'=>'Course')) !!}
          </div>

          <div class="col-md-2 py-3 ">Interested for Intake :</div>
          <div class="col-md-4 py-3 ">
           

               <select name="interested_intake" id="" class="form-control">
                 <option value="{{ $e->course_intake }}" selected  >{{ $e->course_intake }}</option>
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

@endforeach
          {{-- <div class="col-md-2 py-3">Batch Type :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('batch', null, array('class'=>'form-control', 'placeholder'=>'Batch Type')) !!}
          </div> --}}

          {{-- <div class="col-md-2 py-3">Exam :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('exam', null, array('class'=>'form-control', 'placeholder'=>'Exam')) !!}
          </div> --}}
          {{-- <div class="col-md-2 py-3">Stream :  </div>
          <div class="col-md-4 py-3">
              {!! Form::text('course_stream', null, array('class'=>'form-control', 'placeholder'=>'Stream')) !!}
          </div> --}}
          
          @if($enq_educations->count() == 0)
              <div class="col-md-12 btn-danger education-details"><h4 class="my-2">Education Details</h4></div>
              <div class="container">
               <div class="col-md-12 py-3 scrollmenu row  ">
                  <div class="add-class"> </div>
                 <div class="col-md-2">
                   <p>Qualification</p>
                   <select name="qualification_name[]" id="" class="form-control">
                      <option selected disabled> selected </option>

                      <option value="Certificate I"> Certificate I </option>
                      <option value="Certificate II"> Certificate II </option>
                      <option value="Certificate III"> Certificate III </option>
                      <option value="Certificate IV"> Certificate IV </option>
                      <option value="Diploma"> Diploma </option>
                      <option value="Advance Diploma"> Advance Diploma </option>
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
                    {{-- {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!} --}}
                    <select name="passing_year[]" id="" class="form-control">
                      <option selected disabled>--Selected--</option>
                      @for($i=1990; $i<=2020; $i++)
                      <option value="{{$i}}"> {{$i}}  </option>
                      @endfor 
                    </select>
                  </div>
                  <div class="col-md-2">
                      <p>Percentage</p>
                      {!! Form::text('percentage[]', null, array('class'=>'form-control' )) !!}
                    </div>
                    <i onclick="add_education();" class="fa fa-plu plus-sign" >   +</i>
                      
                             
               </div>  
              
              
              
              </div> <!-- end of container educaion-->    



@elseif($enq_educations->count() > 0)

              <div class="col-md-12 btn-danger education-details"><h4 class="my-2">Education Details</h4></div>
              @foreach($enq_educations as $edu)
              <div class="container">
               <div class="col-md-12 py-3 scrollmenu row  ">
                  <div class="add-class"> </div>
                 <div class="col-md-2">
                   <p>Qualification</p>
                   <select name="qualification_name[]" id="" class="form-control">
                   <option selected  value= "{{  $edu->class  }}" > {{  $edu->class  }} </option>

                      <option value="Certificate I"> Certificate I </option>
                      <option value="Certificate II"> Certificate II </option>
                      <option value="Certificate III"> Certificate III </option>
                      <option value="Certificate IV"> Certificate IV </option>
                      <option value="Diploma"> Diploma </option>
                      <option value="Advance Diploma"> Advance Diploma </option>
                     <option value="10"> 10 </option>
                     <option value="12"> 12 </option>
                     <option value="Graduate"> Graduate </option>
                     <option value="post Graduate"> Post Graduate </option>
                   </select>
                  
                 </div>


                 <div class="col-md-3">
                    <p>Stream</p>
                    {!! Form::text('edu_stream[]',  $edu->stream  , array('class'=>'form-control' )) !!}
                    
                  </div>

                 <div class="col-md-3">
                    <p>Name of Institute</p>
                    {!! Form::text('institute_name[]', $edu->education_name, array('class'=>'form-control' )) !!}
                  </div>
                 <div class="col-md-2">
                    <p>Year of Passing</p>
                    {{-- {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!} --}}
                    <select name="passing_year[]" id="" class="form-control">
                      <option selected  value = "{{  $edu->passing_year  }}" >{{  $edu->passing_year  }}</option>
                      @for($i=1990; $i<=2020; $i++)
                      <option value="{{$i}}"> {{$i}}  </option>
                      @endfor 
                    </select>
                  </div>
                  <div class="col-md-2">
                      <p>Percentage</p>
                      {!! Form::text('percentage[]', $edu->percentage, array('class'=>'form-control' )) !!}
                    </div>
                    {{-- <i onclick="add_education();" class="fa fa-plu plus-sign" >   +</i> --}}
                                     </div>  
                                                   
              </div> <!-- end of container educaion-->    
              @endforeach

@endif        

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
      $('.add-class').append('<div class="col-md-12 py-3 scrollmenu row"><div class="col-md-2"><p>Qualification</p><select name="qualification_name[]" id="" class="form-control">      <option selected > selected </option>   <option value="Certificate I"> Certificate I </option><option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option>       <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option><option value="Advance Diploma"> Advance Diploma </option>      <option value="10"> 10 </option><option value="12"> 12 </option>        <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option></select></div>  <div class="col-md-3"><p>Stream</p>   {!! Form::text("edu_stream[]", null, array("class"=>"form-control")) !!}  </div>   <div class="col-md-3"><p>Name of Institute</p>{!! Form::text("institute_name[]", null, array("class"=>"form-control" )) !!}</div><div class="col-md-2"><p>Year of Passing</p> <select name="passing_year[]" id="" class="form-control"> <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}}  </option>  @endfor </select></div><div class="col-md-2"><p>Percentage</p> {!! Form::text("percentage[]", null, array("class"=>"form-control" )) !!} </div> </div>');
      }   

      function add_company(){
        $('.add-company').append('<tr> <tr><td> {!! Form::text('company[]', null, array('class'=>'form-control' )) !!}</td> <td> {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}</td><td>  {!! Form::date('exp_start[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> <td> {!! Form::date('exp_end[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td> </tr>')
      }

      function financial(){
        $('.add-financial').append(' <div class="col-md-5 py-3">  <select class="form-control" name="financial[]"> <option disabled selected>--Select--</option>                                                                 <option VALUE="Bank loan">Bank loan</option>    <option VALUE="Personal Fund">Personal Fund</option>    <option VALUE="Family Sponsorship">Family Sponsorship</option>   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>   <option VALUE="Other">Other</option>  </select> </div>              <div class="col-md-4 py-3">                  {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}         </div>  <div class="col-md-1"> <i onclick="financial();" class="fa fa-plu plus-sign plus">    </i> </div>')
      }
    </script>
       
       
     
          
       @if($enq_experiences->count() == 0)

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

@elseif($enq_experiences->count() > 0)

<div class="col-md-12 btn-danger"><h4 class="my-2">Work Experience</h4></div>
@foreach($enq_experiences as $exp)
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
            <td> {!! Form::text('company[]', $exp->company_name, array('class'=>'form-control' )) !!}</td>
            <td> {!! Form::text('designation[]', $exp->designation, array('class'=>'form-control' )) !!}</td>
        <td>  {!! Form::date('exp_start[]', $exp->start_date, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
        <td> {!! Form::date('exp_end[]', $exp->end_date, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
        {{-- <td id="add_clas" onclick="add_company();"> <i class="fa fa-plus" aria-hidden="true" class="pointer"></i></td> --}}
        
      </tr>
      
    </tbody></table></div>

@endforeach
    @endif





<style>
.language-test p{
  margin: 0;
}
.language-test select{
  /* max-width: 100px;
    margin: auto; */
}
</style>





{{-- <div class="col-md-12 btn-danger"><h4 class="my-2">English Language Test</h4></div> --}}  
{{-- english language test --}}
<div class="container-fluid language-test">
  <div class="row">
             

















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






<div class="row">
     
  </div>






</div>         




</div>


{{-- end of english language test --}}

              {{-- <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Listening :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Listening"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Reading :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Reading"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Writing :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Writing"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Speaking :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Speaking"></div>

               <div class="col-md-4"></div>
               --}}
@if($enq_financials->count() == 0)
<div class="container-fluid  ">
  <div class="row  btn-danger"><div class="col-md-12 py-2  "> <h4> How student will show financials? </h4> </div></div>
    <div class="row add-financial"></div>
  <div class="row">
               
               <div class="col-md-5 py-3">
                 <select class="form-control" name="financial[]">
                  <option disabled selected>--Select--</option>    
                    <option VALUE="Bank loan">Bank loan</option>
                    <option VALUE="Personal Fund">Personal Fund</option>
                    <option VALUE="Family Sponsorship">Family Sponsorship</option>
                    <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                    <option VALUE="Other">Other</option>
                  </select>
               </div>
               
               <div class="col-md-4 py-3">
                  {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!} 
                </div>
                <div class="col-md-1">
                    <i onclick="financial();" class="fa fa-plu plus-sign">   + </i>

                </div>
               
  </div>
 
               
</div>

@elseif($enq_financials->count() > 0)
<div class="container-fluid">
    <div class="row"><div class="col-md-12 py-2  ">How student will show financials?</div></div>
      <div class="row add-financial"></div>
    <div class="row">
                 @foreach($enq_financials as $fin)
                 <div class="col-md-5 py-3">
                   <select class="form-control" name="financial[]">
                   <option  selected vlaue="{{ $fin->financials_by }}" >{{ $fin->financials_by }}</option>    
                      <option VALUE="Bank loan">Bank loan</option>
                      <option VALUE="Personal Fund">Personal Fund</option>
                      <option VALUE="Family Sponsorship">Family Sponsorship</option>
                      <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                      <option VALUE="Other">Other</option>
                    </select>
                 </div>
                 
                 <div class="col-md-4 py-3">
                    {!! Form::number('financial_amount[]', $fin->amount, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!} 
                  </div>
                  @endforeach
                  <div class="col-md-1">
                      {{-- <i onclick="financial();" class="fa fa-plu plus-sign">   + </i> --}}
  
                  </div>
                 
    </div>
   
                 
  </div>
@endif




</div>
        

              <!-- toggle -->

           @if($enq_imm_historys->count() == 0)   
              <div class="container-fluid">
                <div class="row">

            
{{--             
                  <div class="col-md-12 btn-danger"><h4 class="my-2">Other Details</h4></div>

               <div class="col-md-8 py-3 ">Visa Status</div>
               <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('history', 'y', false, array('onchange'=>'show_history()')) !!}Approved
                   {!! Form::radio('history', 'n', true,array('onchange'=>'hide_history()','checked')) !!}Not Approved
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
                                @if(!empty($countries))
                                @foreach($countries as $con)
                            <option>{{ $con->country_name }}</option>
                         @endforeach
                         @endif

                       </select>
                      
                      </div>
      
      
                        <div class="col-md-3  py-3">Visa Status</div>
                        <div class="col-md-3  py-3">
                                {!! Form::text('visa_decision', null, array('class'=>'form-control' )) !!}
                        </div>
                        <div class="col-md-3  py-3">Date of Visa Decision</div>
                        <div class="col-md-3  py-3">
                                {!! Form::date('visa_decision_date', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                        </div>
                </div>
              </div>
            </div> --}}






         @elseif($enq_imm_historys->count() > 0)
         
         
         <div class="container-fluid">
            <div class="row">



          {{-- <div class="col-md-12 btn-danger"><h4 class="my-2">Other Details</h4></div>

           <div class="col-md-8 py-3 ">Visa Status</div>
           <div class="col-md-4 py-3 ">
              
               {!! Form::radio('history', 'y', false, array('onchange'=>'show_history()')) !!}Approved
               {!! Form::radio('history', 'n', true,array('onchange'=>'hide_history()','checked')) !!}Not Approved
            </div>
@foreach($enq_imm_historys as $h)
           <div class="k0ck" id="k0ck">
                <div class="container">
           <div class="row">
                    <div class="col-md-3 py-3">Applicant's Name</div>
                    <div class="col-md-3 py-3">
                            {!! Form::text('appliciant_name', $h->name, array('class'=>'form-control' )) !!}
                    </div>
                    <div class="col-md-3 py-3"> Name of country</div>
                    <div class="col-md-3 py-3">

                        <select class="form-control" name="old_imm_country">
                        <option value="{{ $h->country  }}">  {{ $h->country  }} </option>

                            @if(!empty($countries))
                            @foreach($countries as $con)
                        <option>{{ $con->country_name }}</option>
                     @endforeach
                     @endif

                   </select>
                  
                  </div>
  
  
                    <div class="col-md-3  py-3">Visa Status</div>
                    <div class="col-md-3  py-3">
                            {!! Form::text('visa_decision', $h->visa_decision, array('class'=>'form-control' )) !!}
                    </div>
                    <div class="col-md-3  py-3">Date of Visa Decision</div>
                    <div class="col-md-3  py-3">
                            {!! Form::date('visa_decision_date', $h->visa_decision_date, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                    </div>
            </div>
          </div>
        </div>
@endforeach --}}
@endif



{{-- history --}}
@if($enq_travelled_historys->count() == 0)
<div class="col-md-12 btn-danger"><h4 class="my-2">Immigration History</h4></div>
<div class="add-history row"></div>

<div class="row" style="width:100%">
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
    <p> From </p>
    {!! Form::date('imm_history_from[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> To </p>
    {!! Form::date('imm_history_to[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-2 my-3 disabled-class">
    <p> Duration </p>
    {!! Form::text('imm_history_duration[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-1 my-3 disabled-class">
    <i onclick="add_history();" class="fa fa-plu plus-sign">   + </i>
</div>

</div>





@elseif($enq_travelled_historys->count() > 0)
<div class="col-md-12 btn-danger"><h4 class="my-2">Immigration History</h4></div>
<div class="add-history row"></div>
  @foreach($enq_travelled_historys as $travel)
<div class="row" style="width:100%">
<div class=" col-md-3 my-3">
<p> Country Travelled  Before ? </p>

<select class="form-control" name="imm_history[]" id="imm_history" class="imm_history">
      <option value={{$travel->travelled_before_country}}  selected> {{$travel->travelled_before_country}}</option>
        @if(!empty($countries))
        @foreach($countries as $con)
    <option>{{ $con->country_name }}</option>
 @endforeach
 @endif
</select>
</div>


<div class="col-md-3 my-3 disabled-class">
    <p> From </p>
    {!! Form::date('imm_history_from[]', $travel->travelled_before_from, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> To </p>
    {!! Form::date('imm_history_to[]', $travel->travelled_before_to, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-2 my-3 disabled-class">
    <p> Duration </p>
    {!! Form::text('imm_history_duration[]', $travel->travelled_before_duration, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
</div>

<div class="col-md-1 my-3 disabled-class">
    {{-- <i onclick="add_history();" class="fa fa-plu plus-sign">   + </i> --}}
</div>

</div>
 @endforeach
 @endif






@if($enq_visa_rejected_countrys->count() == 0)
 <div class="col-md-8 py-3 ">   <p> Any Visa Rejected Before ? </p> </div>
               <div class="col-md-4 py-3 ">
                  
                   {!! Form::radio('visa_rejected', 'y', false, array('onchange'=>'show_visa_rejected()','id'=>'visa_rejected' )) !!}
                  
                <label for= "visa_rejected">Yes Rejected</label>

                   {!! Form::radio('visa_rejected', 'n', true,array('onchange'=>'hide_visa_rejected()','checked', 'id'=> 'visa_not_rejected')) !!}
               <label for="visa_not_rejected">     Not Rejected </label>
<div class="add-visa-rejected-country"></div>
               <select name="visa_rejected_country[]" class="visa_rejected_country form-control py-2 " id="visa_rejected_country">
                 <option value="" disabled selected>--Selected--</option>
                 @foreach($countries as $c)
                 <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
              @endforeach
               </select>  
                <i onclick="add_visa_rejected_country();" class="fa fa-plu plus-sign" id="visa_rejected_button">   + </i>
                </div>

@elseif($enq_visa_rejected_countrys->count()  > 0 )
<div class="col-md-8 py-3 ">   <p> Any Visa Rejected Before ? </p> </div>
               <div class="col-md-4 py-3 ">
{{--                   
                   {!! Form::radio('visa_rejected', 'y', false, array('onchange'=>'show_visa_rejected()','id'=>'visa_rejected' )) !!}
                  
                <label for= "visa_rejected">Yes Rejected</label>

                   {!! Form::radio('visa_rejected', 'n', true,array('onchange'=>'hide_visa_rejected()','checked', 'id'=> 'visa_not_rejected')) !!}
               <label for="visa_not_rejected">     Not Rejected </label> --}}
<div class="add-visa-rejected-country"></div>
@foreach($enq_visa_rejected_countrys as $visa)               
<select name="visa_rejected_country[]" class="visa_rejected_country form-control py-2 " id="visa_rejected_country">
                 
               <option value="{{ $visa->country }}"    selected>{{ $visa->country }}</option>
                 
                 @foreach($countries as $c)
                 <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
              @endforeach
               </select>  
               @endforeach
                {{-- <i onclick="add_visa_rejected_country();" class="fa fa-plu plus-sign" id="visa_rejected_button">   + </i> --}}
                </div>
<style>
                #visa_rejected_country{
                  display: block !important;
                }
              </style>
@endif




<style>
#visa_rejected_country, #visa_rejected_button{
  display: none;
}
</style>

<script>
  
  // $(document).ready(function(){
  //   $('.disabled-class input').attr('disabled', 'disabled');
  //     $('.imm_history').on('change', function(){
  //       $('.disabled-class input').attr('disabled', false);
  //     });
  // });


</script>


<script>
  function add_visa_rejected_country(){
    $('.add-visa-rejected-country').append(' <select name="visa_rejected_country[]" class="visa_rejected_country form-control "> <option value="" disabled selected>--Selected--</option> @foreach($countries as $c)<option value={{$c->country_name}}>  {{ $c->country_name }}</option>          @endforeach</select>  ');
  }
</script>


<script>
    
    function add_history(){
      $('.add-history').append('<div class=" col-md-3 my-3"><p> Country Travelled  Before ? </p><select class="form-control" name="imm_history[]" id="imm_history"><option value=""  selected> --Selected--</option>@if(!empty($countries))@foreach($countries as $con)<option>{{ $con->country_name }}</option>@endforeach   @endif</select></div><div class="col-md-3 my-3 disabled-class"><p> From </p>{!! Form::date("imm_history_from[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-3 my-3 disabled-class"><p> To </p>{!! Form::date("imm_history_to[]", null, array("class"=>"form-control" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}</div><div class="col-md-2 my-3 disabled-class"><p> Duration </p>{!! Form::text("imm_history_duration[]", null, array("class"=>"form-control","min"=>"1979-12-31","max"=>"2020-01-02"))!!} </div>');
      }
</script>

<style>
.add-history{
  width:100%;
}
</style>

{{-- end hostory --}}






               <!-- toggle end -->
              
          <div class="col-md-12 btn-danger"><h4 class="my-2">Upload Image/ Documents</h4></div>
          <div class="container my-5">
              @if($enquiries->count() == 0 )
<div class="row">
          <div class="col-md-6 text-center"><div>Upload Image</div>
                <img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="Italian Trulli"  id="img2">
                {!! Form::file('image', array('class'=>'form-control', 'id'=>'file2','onchange'=>'GetFileSize2(this);')) !!}
          </div>
          <div class="col-md-6 text-center"><div>Upload Signature</div>
                <img src="https://via.placeholder.com/160x194" alt="Italian Trulli" id="img3">
                {!! Form::file('signature', array('class'=>'form-control', 'id'=>'file3','onchange'=>'GetFileSize3(this);')) !!}

          </div></div>

@elseif($enquiries->count() > 0)
<div class="row">
    <div class="col-md-6 text-center"><div>Upload Image</div>
    @foreach($enquiries as $enq)
<img src="{{url('public/uploads/image/'.$enq->image) }}" alt="Italian Trulli"  id="img2">
          
          {!! Form::file('image', array('class'=>'form-control', 'id'=>'file2','onchange'=>'GetFileSize2(this);', 'value'=>'filename')) !!}
    </div>
    <div class="col-md-6 text-center"><div>Upload Signature</div>
  <img src="{{url('public/uploads/signature/'. $enq->signature) }}" alt="Italian Trulli" id="img3">
          {!! Form::file('signature', array('class'=>'form-control', 'id'=>'file3','onchange'=>'GetFileSize3(this);')) !!}

          @endforeach

    </div></div>

    @endif






          <div class="col-md-12 my-4"> <input type="checkbox" name="term_condition">
             I AGREE
            TERMS & CONDITIONS</div>
            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>






               <div class="col-md-12 text-center my-4" >
                  {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!}
              </div>
              </div>





           
        </div>
        {{Form::close()}}


        
 </div>
 

 
 
 @endif

 @endsection()
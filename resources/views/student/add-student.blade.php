    <?php
use App\Helpers\Helper;
?>
@extends('header')
@section('add-student')
<script>

   
   
   
   
    </script>
<style>
#k0chec{
    display:none;
}
.remove-div{
position: absolute;
    padding: 12px;
    bottom: 0px;
    background: red;
    border-radius: 100%;
    right: 41px;
    color: #fff;
}
.hover-color:hover{
  background: #1d4568 !important;
  border: 1px solid #1d4568 !important;
}
.leadhead h2{
    color: #fff!important;
    background: #34495e;
    margin: 10px 0px 0px 0px;
    border-radius: 20px;
    padding: 5px 0px 5px 0px;
    width: 200px;
    margin: 0px auto;
    margin-top:10px;
    margin-bottom:10;
}

.gj-textbox-md{
  padding-left: 11px !important;
}
 .slider:before {
    top: 1px;
    left: 0px !important;
}

#collapse3 .row {
  display: flex;
} 

/* #toefl_select, #ielts_select, #pte_select, #oet_select{
  display:none ;
} */

.add-visa-rejected-country, #visa_rejected_butto{
  display:none;
}
</style>
{{Form::open(array('url'  =>  Request::segment(1).'/'.'enquiry_post' ,'files'=>'true', 'class'=>'enquiry-form', 'id' =>'enquiry'))}}  
  <div class="moal" id="add_new_client"  >

    <div class="modal-dialo" >
      <div class="modal-conte" > 
      
        <!-- Modal Header -->
         <div class="modal-heade" style="
        height: auto;
        border: none;">
          
          <!--<button type="button" class="close" data-dismiss="modal" style="-->
          <!--font-size: 38px;-->
          <!--color: #383838;  outline-none;" >&times;</button>-->
          <div class="leadhead text-center">
          <h2> Add Student</h2>
          </div>
          {{-- <button class="clear-all-eligibility-button" > Clear All </button> --}}
        </div> 
        <!--<hr style="margin: 0; padding:0"> -->
        <!-- Modal body -->
         <div class="modal-bod" > 

        
<?php 
  $countries = DB::table('countries')->get();
  ?>         



          
            
            {{-- {{ Form::open(array('url'=>'new-user' ,'files'=>'true')) }} --}}
        
        
             
<br>
<div class="container">
          
            
<div class="row add-leads-form">
     
          <div class="form-row col-md-4">
                    <label for="">Candidate Name <span style="color:red;">*</span></label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                        {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                        <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                    </div> 
              
              </div>
              <div class="form-row col-md-4">
                    <label for="">Mobile Number</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        {!! Form::number('contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>
              
              
              
              <div class="form-row col-md-4">
                    <label for="">Gender</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-mars-stroke-h"></i></span>
                        <select class="form-control" name="gender">
                              <option disabled Selected> --Select-- </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                
                              </select>
                              <?php echo ($errors->first('gender',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>
              
              
              
              <div class="form-row col-md-4">
                    <label for="">Alternate Mobile</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        {!! Form::number('alternate_contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>
              <div class="form-row col-md-4">
                    <label for="">Email Id</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Email')) !!}
                            <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Date Of Birth</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        {!! Form::text('dob',  null, array('class'=>'form-control date', 'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}

                             <?php 
                             echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) 
                             ?> 

                    </div>
                    
              
              </div>
              
               <div class="form-row col-md-4">
                    <label for="">Status</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                        <?php   $status =  DB::table('enq_status')->select('status')
                        ->orderBy('status','ASC')
                        ->get() ?>
                     <select name="status" id="new_user_status" class="form-control new_user_status">
                         <option disabled selected > --Select-- </option>
@foreach($status as $s)
                     <option value="{{$s->status}}">{{$s->status}}</option>
                         @endforeach
                     </select>
                     <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                     </div>
                     <br>
                    <!--<div class="input-group">-->
                     <input type="text" name="date" id="date" class="form-contro date date2" style="display:none;margin-top:5px;">
                    <!--</div>-->
                     <!--<br>-->
                     <!--<div class="input-group">-->
                      <input type="time" name="time" id="time" class="form-contro time2" style="display:none;margin-top:5px;width:53%">
                      
                    <style>
                    input[type="date"], input[type="time"]{
                     width: 49%;
padding: 6px;
border-radius: 4px;
border: 1px solid #cbc7c7;
                    }
                    </style>

                    
                    
              
              </div>

  <div class="form-row col-md-4">
                    <label for="">Purpose </label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                        {{-- {!! Form::textarea('note', null, array('class'=>'form-control', 'rows'=>"3" ,'cols'=>"40", 'name' => 'note')) !!}  --}}
                        <?php   $purpose =  DB::table('enq_purposes')->select('purpose')
                        ->orderBy('purpose','ASC')
                        ->get() ?>
                        <select class="form-control" name="note">
                            <option selected="" disabled="">-Select-</option>
                            @foreach($purpose as $p)
                            <option value={{$p->purpose}}>{{$p->purpose}}</option>
                            @endforeach
                            
                          </select>
                          <?php echo ($errors->first('note',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>
               <div class="form-row col-md-4">
                    <label for="">Source</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                        <select name="source" id="add_source" class="form-control">
                              <option disabled selected> --Source-- </option>
                              <option value="Google">{{"Google"}}</option>
                              <option value='Just Dial'>{{"Just Dial"}}</option>
                            
                            
                            
                            <option value="Reference">{{"Reference"}}</option>
                            <option value="Sulekha">{{"Sulekha"}}</option>
                            
                            <option value="UrbanPro">{{"UrbanPro"}}</option>
                            <option value="Walk In">{{"Walk In"}}</option>
                            <option value="Other">{{"Other"}}</option>
                            </select>

                    </div>
                    
                    <div class="row input-group" style="display: none;" id="add_other_source">
                                      
                      <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                    <input type="text" name="source2" class="form-control" placeholder="Other" >
                    
                    </div>
                  </div>

                  <script>
                      $(document).ready(function(){
                  $('#add_source').change(function(val){
                      
                      if(this.value == 'Other'){ 
                  document.getElementById("add_other_source").style.display = "block";
                      }else{
                          document.getElementById("add_other_source").style.display = "none";
                      }
                  });
                      });
                  </script>


              
              </div>
                <?php 
    if( Auth::user()->usertype_status =='1'){
?>
     <div class="form-row col-md-4">
                    <label for="">Asign To Agent</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment"></i></span>
                         <?php 
$agent  = DB::table('users')->where('status',1)
->orderBy('name','ASC')
->get();
$agent  = (Helper::getTotalEmployee());
?>
 <select name="asign_to_agent" id="" class="form-control">
                              <option disabled selected> --Agent-- </option>
                              @foreach($agent as $a)
    <option value="{{$a->employee_id}}">  {{$a->name}}  </option>
    @endforeach
  </select>
<?php } ?>


              </div>

                    
              
              </div>
               <div class="form-row col-md-4">
                    <label for="">Comment</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment"></i></span>
                          {!! Form::textarea('comment',null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"2")) !!}  </div>

                    
              
              </div>
              
              
              
              
              
            
              
              
              
              
              
              
               <div class="form-row col-md-4">
                   <div class="col-md-12">Upload Resume</div>
                 
                     <label for="upload_resume2" class="form-control custom-file-upload" style=" margin-left: 0px; margin-top: 15px; max-width: initial !important;">
    <i class="fa fa-cloud-upload"></i> Upload Resume
  </label>
  <input id="upload_resume2" name='upload_resume' type="file" style="display:none;">
  </div>

                    
              
              </div>

</div>




           <!--  <div class="row content-color">
             <div class="gen-detail row"> 
                  <div class="col-md-2">Candidate Name:  <span  class = "star"> * </span> </div>
                   <div class="col-md-4">
                        {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                        <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                    </div>
       
              
 
                <div class="col-md-2 ">Mobile :  </div>
                <div class="col-md-4 ">
                        {!! Form::number('contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>
                    
                    </div>
                 


                    <div class="col-md-2 ">Alternate Mobile :</div>
                    <div class="col-md-4 ">
                            {!! Form::number('alternate_contact', null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>
                        
                        </div>

                    <div class="col-md-2 ">Email :</div>
                    <div class="col-md-4 ">
                            {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Email')) !!}
                            <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>
                        
                        </div>






                        <div class="col-md-2 py-3 ">Date Of Birth:</div>
                        <div class="col-md-4 py-3 ">
                             {!! Form::text('dob',  null, array('class'=>'form-control date', 'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}

                             <?php 
                             echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) 
                             ?> 

<script>


</script>

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



                        <div class="col-md-2 ">Status :</div>
                        <div class="col-md-4 ">
                               <?php   $status =  DB::table('enq_status')->select('status')
                               ->orderBy('status','ASC')
                               ->get() ?>
                            <select name="status" id="new_user_status" class="form-control">
                                <option disabled selected > --Select-- </option>
@foreach($status as $s)
                            <option value="{{$s->status}}">{{$s->status}}</option>
                                @endforeach
                            </select>
                            <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                            <input type="text" name="date" id="date" class="form-control date" style="display:none;margin-top:5px;">
                             <input type="time" name="time" id="time" class="form-control" style="display:none;margin-top:5px;">
                             
                           <style>
                           input[type="date"], input[type="time"]{
                            width: 49%;
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #cbc7c7;
                           }
                           </style>













                        </div>

                            <div class="col-md-2 ">Purpose:</div>
                            <div class="col-md-4 "> 
                                    {{-- {!! Form::textarea('note', null, array('class'=>'form-control', 'rows'=>"3" ,'cols'=>"40", 'name' => 'note')) !!}  --}}
                                    <?php   $purpose =  DB::table('enq_purposes')->select('purpose')
                                    ->orderBy('purpose','ASC')
                                    ->get() ?>
                                    <select class="form-control" name="note">
                                        <option selected="" disabled="">-Select-</option>
                                        @foreach($purpose as $p)
                                        <option value={{$p->purpose}}>{{$p->purpose}}</option>
                                        @endforeach
                                        
                                      </select>
                                      <?php echo ($errors->first('note',"<li class='custom-error'>:message</li>")) ?>
                            </div>

 -->
                            

<!-- 
                            <div class="col-md-2">Comment:</div>

                            <div class="col-md-4 ">
    {!! Form::textarea('comment',null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"10")) !!}  </div> -->
  
              



<!-- <?php 
    if( Auth::user()->usertype_status =='1'){
?>
<div class="col-md-2 ">Asign To Agent: </div>
<div class="col-md-4 ">
<?php 
$agent  = DB::table('users')->where('status',1)
->orderBy('name','ASC')
->get();
?>

<select name="asign_to_agent" id="" class="form-control">
  <option disabled selected>--Agent--</option>
  @foreach($agent as $a)
    <option value="{{$a->employee_id}}">  {{$a->name}}  </option>
    @endforeach
</select>
<?php } ?>
</div>
 -->




<style>

.gj-icon{
  display: none;
}
.panel-heading a:hover {
    color: #34495e !important;
    text-decoration: underline;
}
</style>
<script>

</script>
</div>


</div>

                            

<script>
  
function getState(val) {
    $.ajax({
    type: "get",
    url: "{{url('tabletstate')}}?id="+val,
    success: function(data){
        $('#state-lis').empty();
                        $.each(data, function(key, value) {
                            $('#state-lis').append('<option value="'+ this.state_id +'">'+ this.state_name +'</option>');
                        });
        }
    });
}

function getCity(val) {
$.ajax({
type: "get",
url: "{{url('tabletcity')}}?id="+val,
success: function(data){
        $('#city-lis').empty();
        $.each(data, function(key, value) {
                            $('#city-lis').append('<option value="'+ this.city_name +'">'+ this.city_name +'</option>');
                        });
}
});
}

</script>






<div class="container-fluid my-5">
     @if('A')  
     
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                     <h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Education Detail
                </h4></a>
              </div>
              <div id="collapse1" class="panel-collapse collapse " style="">
                <div class="panel-body">
                  <div class="col-md-12  scrollmenu row  ">
                    <div class="row">
                 <div class="col-md-2">
                   <p>Qualification</p>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-certificate" aria-hidden="true"></i></span>
                   <select name="qualification_name[]" id="" class="form-control">
                      <option selected disabled>--select-- </option>

                      <option value="10th"> 10th </option>
                      <option value="Diploma"> Diploma </option>
                      <option value="12th"> 12th </option>
                      <option value="Undergraduate">Undergraduate </option>
                      <option value="Post Graduate Diploma"> Post Graduate Diploma </option>
                      <option value="Post Graduate/Master"> Post Graduate/Master </option>
                     <option value="PHD"> PHD </option>
                     
                   </select>
                 </div>
</div>

                 <div class="col-md-2">
                    <p>Stream</p>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-stream"></i></span>
                    {!! Form::text('edu_stream[]', null, array('class'=>'form-control','placeholder'=>'Stream' )) !!}
                    
                  </div>
                  </div>

                 <div class="col-md-3">
                    <p>Name of Institute/University</p>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                    {!! Form::text('institute_name[]', null, array('class'=>'form-control', 'placeholder'=>'Name of Institute/University' )) !!}
                  </div>
                  </div>
                 <div class="col-md-2">
                    <p>Year of Passing</p>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                    {{-- {!! Form::text('passing_year[]', null, array('class'=>'form-control' )) !!} --}}
                    <select name="passing_year[]" id="" class="form-control">
                      <option selected disabled>--Selected--</option>
                      @for($i=1990; $i<=2020; $i++)
                      <option value="{{$i}}"> {{$i}}  </option>
                      @endfor 
                    </select>
                  </div>
                  </div>
                  <div class="col-md-2">
                      <p>Percentage</p>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                      {!! Form::text('percentage[]', null, array('class'=>'form-control gre-rank','placeholder'=>'Percentage' )) !!}
                    </div>
                    </div>
                  </div>
                    <div class="add-class row"> </div>
                      <i onclick="delete_education();" class="fa fa-minus remove-div" >   </i>
                    <i onclick="add_education();" class="fa fa-plu plus-sign test" >   +</i>
                      
                             
               </div>  
               <script>
                             function delete_education(){
                              document.querySelectorAll('.add-class')[1].removeChild(document.querySelectorAll('.add-class')[1].lastElementChild) 
                             }
                          </script>   
              </div>
              </div>
            </div>
          
            <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                <h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Work Experience
                </h4></a>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"><div class=" row ">
                        
<div class="col-sm-3"> <p> Company Name  </p>
<div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                  {!! Form::text('company[]', null, array('class'=>'form-control','placeholder'=>'Company Name' )) !!}
                  </div>
 
</div>
<div class="col-sm-2"> <p> Designation </p>
<div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                 {!! Form::text('designation[]', null, array('class'=>'form-control', 'placeholder'=>'Designation' )) !!}
                  </div>
  
</div>
                        <div class="col-sm-2">
                          <p> Start Date </p>
                          <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
               {!! Form::text('exp_start[]', null, array('class'=>'form-control  date','min'=>'1979-12-31', 'max'=>'2020-01-02','id'=>'work_start_date_modal' )) !!}
                  </div>
                         
                        </div>
<div class="col-sm-2">  <p> End Date </p>
 <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
               {!! Form::text('exp_end[]', null, array('class'=>'form-control date', 'min'=>'1979-12-31', 'max'=>'2020-01-02', 'id'=>'' )) !!}  
                  </div>
  
</div>

<div class="col-sm-2">  <p> CTC / Annual Salary </p>  
 <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
              {!! Form::text('annual_salary[]', null, array('class'=>'form-control', 'placeholder' =>"CTC / Annual Salary" )) !!}    
                  </div>
 
  </div>

</div>
<div  class="add-company row"></div>
<div class="plus-parent"> 
<i onclick="delete_company();" class="fa fa-minus remove-div" >    </i>
<p  id="add_class" onclick="add_company();"  class="work-exp-plus" aria-hidden="true" class="pointer"> + </p> </div>
      
                <script>
                             function delete_company(){
                              document.querySelectorAll('.add-company')[1].removeChild(document.querySelectorAll('.add-company')[1].lastElementChild)   
                             }
                          </script>   
                          
                      </div>
    
              </div>
              </div>
            

            <div class="panel panel-default">
                <div class="panel-heading">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                    English Language Test
                  </h4></a>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body">
                   

  <div class="row">
      <div class="col-sm-3">
         <div id="toefl">
          
          
            <p> I have TOEFL Exam Score </p>
           <label class="switch">
              <input type="checkbox" id="toefl_radio" class="toefl_radio" name="toefl">
              <span class="slider round"></span>
            </label>  
          </div>

      </div>


<div class="col-sm-9 toefl_select" id="toefl_select" >
           <div class="row" >

               {{-- <p class="lang-head">TOEFL Score</p> --}}
           
                          <div class="col-sm-2">
                           <p>Listening</p>
                          <select name="ToeflListning" id="ToeflListning" class="form-control toefl-score">
                            <option value="" selected>selected</option>
                           @for($i=0; $i<=30; $i++)    
                          <option value={{$i}}>{{$i}}</option>
                           @endfor
                          </select>
                         </div>
                         <div class="col-sm-2">
                             <p>Reading</p>
                             <select name="ToeflReading" id="ToeflReading" class="form-control toefl-score">
                                <option value="" selected>selected</option>
                                 @for($i=0; $i<=30; $i++)    
                                <option value="{{$i}}">{{$i}}</option>
                                 @endfor
                                </select>
                           </div>
                           <div class="col-sm-2">
                               <p>Writing</p>
                               <select name="ToeflWriting" id="ToeflWriting" class="form-control toefl-score">
                                  <option value="" selected>selected</option>
                                   @for($i=0; $i<=30; $i++)    
                                  <option value={{$i}}>{{$i}}</option>
                                   @endfor
                                  </select>
                             </div>
                             <div class="col-sm-2 ">
                                 <p>Speaking</p>
                                 <select name="ToeflSpeaking" id="ToeflSpeaking" class="form-control toefl-score">
                                    <option value="" selected>selected</option>
                                     @for($i=0; $i<=30; $i++)    
                                    <option value={{$i}}>{{$i}}</option>
                                     @endfor
                                    </select>
                                    
                               </div>
                               <div class="col-sm-2 ">
                                  <p>Overall</p>
                                 

                                     <input type="text" name="toefl_over_all" id="toefl_over_all" class="form-control" placeholder="Overall">
                                     
                                </div>

                             </div>    
                            </div>

  </div>
                                   <hr>

             {{-- <div id="ielts"> <p> <strong>  IELTS </strong>   
                  {!! Form::radio('ielts', 'y', false,  array('class'=>'form-contro' , 'onclick' => 'ielts_show()', 'id' => 'IeltsTaken' )) !!}  <label for="IeltsTaken">  Taken </label>
               {!! Form::radio('ielts', 'n', true , array('class'=>'form-contro' , 'onclick' => 'ielts_hide()',  'id' => 'IeltsNotTaken' )) !!} <label for="IeltsNotTaken"> Not Taken </label> </p> </div> --}}
<div class="row">
<div class="col-sm-3">
  <div id= "ielts">
               <p> I have IELTS Exam Score </p>
           <label class="switch">
              <input type="checkbox" id="ielts_radio" name="ielts" class="ielts_radio">
              <span class="slider round"></span>
            </label> 
          </div>   </div>

<div class="col sm-9 ielts_select" id="ielts_select">
               <div class="row" >
                   {{-- <p class="lang-head">IELTS Score</p> --}}
                              <div class="col-md-2  k0label">
                               <p>Listening</p>
                              <select name="IeltsListning" id="" class="form-control">
                                <option value="" selected>--Select-</option>
                               @for($i=4.5; $i<=9; $i+=.5)    
                              <option value={{$i}}>{{$i}}</option>
                              
                               @endfor
                              </select>
                             </div>
                             <div class="col-md-2  k0label">
                                 <p>Reading</p>
                                 <select name="IeltsReading" id="" class="form-control">
                                    <option value="" selected>selected</option>
                                     @for($i=4.5; $i<=9; $i+=.5)    
                              <option value={{$i}}>{{$i}}</option>
                                     @endfor
                                    </select>
                               </div>
                               <div class="col-md-2  k0label">
                                   <p>Writing</p>
                                   <select name="IeltsWriting" id="" class="form-control">
                                      <option value="" selected>selected</option>
                                       @for($i=4.5; $i<=9; $i+=.5)    
                                       <option value={{$i}}>{{$i}}</option>
                                       @endfor
                                      </select>
                                 </div>
                                 <div class="col-md-2  k0label">
                                     <p>Speaking</p>
                                     <select name="IeltsSpeaking" id="" class="form-control">
                                        <option value="" selected>selected</option>
                                         @for($i=4.5; $i<=9; $i+=.5)    
                                         <option value={{$i}}>{{$i}}</option>
                                         @endfor
                                        </select>
                                   </div>
                                   
                                   <div class="col-md-2  k0label">
                                     <p>Overall</p>
                                     <input type="text" name="ieltsoverall" class="form-control" placeholder="Overall">
                                     
                                   </div>
               
               </div>    
              </div>       
</div>
<hr>




<div class="row">
  <div class="col-sm-3">
<p> I have PTE Exam Score </p>
<label class="switch">
   <input type="checkbox" id="pte_radio" name="pte" class="pte_radio">
   <span class="slider round"></span>
 </label> 
  </div>

               {{-- <div id="pte">
                  <p> <strong> PTE    </strong> 
                 
                 {!! Form::radio('pte', 'y', false, array('class'=>'form-contro', 'onclick' => 'pte_show()','id' =>'PteTaken' )) !!}  <label for="PteTaken">Taken </label>
                 
                 {!! Form::radio('pte', 'n', true, array('class'=>'form-contro', 'onclick' => 'pte_hide()', 'id' => 'PteNotTaken')) !!} <label for="PteNotTaken"> Not Taken </label></p> </div> --}}




<div class="col-sm-9 pte_select" id="pte_select">
                 <div class="row" >

                     {{-- <p class="lang-head">PTE Score</p> --}}
                                <div class="col-md-2  k0label">
                                 <p>Listening</p>
                                <select name="PteListning" id="" class="form-control">
                                    <option value="" selected>Select</option>
                                 @for($i=10; $i<=90; $i++)    
                                <option value={{$i}}>{{$i}}</option>
                                 @endfor
                                </select>
                               </div>
                               <div class="col-md-2  k0label">
                                   <p>Reading</p>
                                   <select name="PteReading" id="" class="form-control">
                                      <option value="" selected>Select</option>
                                       @for($i=10; $i<=90; $i++)    
                                       <option value={{$i}}>{{$i}}</option>
                                       @endfor
                                      </select>
                                 </div>
                                 <div class="col-md-2  k0label">
                                     <p>Writing</p>
                                     <select name="PteWriting" id="" class="form-control">
                                        <option value="" selected>Select</option>
                                         @for($i=10; $i<=90; $i++)    
                                         <option value={{$i}}>{{$i}}</option>
                                         @endfor
                                        </select>
                                   </div>
                                   <div class="col-md-2  k0label">
                                       <p>Speaking</p>
                                       <select name="PteSpeaking" id="" class="form-control">
                                          <option value="" selected>Select</option>
                                           @for($i=10; $i<=90; $i++)    
                                           <option value={{$i}}>{{$i}}</option>
                                           @endfor
                                          </select>
                                     </div>
                                     
                                     <div class="col-md-2  k0label">
                                       <p>Overall</p>
                                       <input type="text" name="pteoverall" class="form-control" placeholder="Overall">
                                       
                                     </div>
                 
                 </div>    
                </div></div>         
               <hr>






<div class="row">
  <div class="col-sm-3">
      <p> I have OET Exam Score </p>
      <label class="switch">
         <input type="checkbox" id="oet_radio" name="oet" class="oet_radio">
         <span class="slider round"></span>
       </label> 

  </div>

    

                 {{-- <div id="oet" > <strong> <p>  OET   </strong> 
                    {!! Form::radio('oet', 'y', false,  array('class'=>'form-contro','onclick' => 'oet_show()', 'id'=> 'OetTaken' )) !!}  <label for="OetTaken"> Taken </label>
                   {!! Form::radio('oet', 'n', true, array('class'=>'form-contro' , 'onclick' => 'oet_hide()', 'id' => 'OetNotTaken' )) !!}   <label for="OetNotTaken">  Not Taken </label>  </p> </div> --}}

<div class="col-sm-9 oet_select" id="oet_select">
                   <div class="row" >
 
                       {{-- <p class="lang-head">OET Score </p> --}}
                                  <div class="col-sm-3  k0label">
                                   <p>Listening</p>
             
                                   <select name="OetListening" id="" class="form-control">
                                     <option  selected value=""> Choose Grade</option>
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
                                 <div class="col-sm-3  ">
                                     <p>Reading</p>
                                    
                                   <select name="OetReading" id="" class="form-control">
                                      <option  selected value=""> Choose Grade</option>
                                     <option value="A"> A</option>
                                     <option value="B"> B</option>
                                     <option value="C+"> C+</option>
                                     <option value="C"> C</option>
                                     <option value="D"> D</option>
                                     <option value="E"> E</option>
                                   </select>
                                   {!! Form::number('oet_reading_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                     
             
             
             
                                   </div>
                                   <div class="col-sm-3 ">
                                       <p>Writing</p>
                                       <select name="OetWriting" id="" class="form-control">
                                          <option  selected value=""> Choose Grade</option>
                                         <option value="A"> A</option>
                                         <option value="B"> B</option>
                                         <option value="C+"> C+</option>
                                         <option value="C"> C</option>
                                         <option value="D"> D</option>
                                         <option value="E"> E</option>
                                       </select>
                                       {!! Form::number('oet_writing_score', null, array('class'=>'form-control', 'placeholder'=>'Enter Score', 'min' =>'0', 'max'=>'500',  'onKeyPress'=>"if(this.value.length==3) return false;" )) !!} 
                                     </div>
                                     <div class="col-sm-3  ">
                                         <p>Speaking</p>
                                         <select name="OetSpeaking" id="" class="form-control">
                                            <option  selected value=""> Choose Grade</option>
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

<div class="container-fluid">
  <hr>
  <div class="row"> <div class="col-md-12" style=" background: #34495e; color: #fff; padding: 5px 5px; "><h3 style=" margin-bottom: 0px; font-size: 20px; padding: 0px 0px 0px 8px; "> Additional Qualification  </h3></div> </div>
  <div class="row"> <div class="col-md-12 my-2"><p>  I have GRE Exam Score </p></div>

  <div class="col-md-12"><p> 
      <label class="switch">
          <input type="checkbox" id="gre_radio" name="gre_radio" class="gre_radio">
          <span class="slider round"></span>
        </label>  
  </p></div>
</div>

  
  <div class="row gre_parent" id="gre_parent" style="display:none;">

    <div class="col-sm-3">
      <p>GRE Exam Date</p>
      <input type="text" class="date form-control" name="gre_exam_date">
    </div>
    <div class="col-sm-3">
    <p>Verbal</p>
    <input type="number" placeholder="Score" class="form-control" name="gre_verbal_score">
    <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gre_verbal_rank">
  </div>
  <div class="col-sm-3">
      <p>Quantitative</p>
      <input type="number" placeholder="Score" class="form-control" name="gre_quantitative_score">
    <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gre_quantitative_rank">
    </div>
    <div class="col-sm-3">
    <p> Written </p>
    <input type="number" placeholder="Score" class="form-control" name="gre_written_score">
    <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gre_written_rank">
  </div>
  </div>
  <hr>
  {{-- GMAT start --}}
  <div class="row">
    <div class="col-md-12"><p>I have GMAT exams Scores  </p></div>
  </div>
  <div class="row">
      <div class="col-md-12">
      <p> 
          <label class="switch">
              <input type="checkbox" id="gmat_radio" name="gmat_radio" class="gmat_radio">
              <span class="slider round"></span>
            </label>  
      </p>
      </div>
    </div>
    <div class="row gmat_parent" style="display:none;">
<div class="col-sm-3">
  <p> GMAT Exam Score </p>
  <input type="text" class="date form-control" name="gmat_exam_date" >
</div>
<div class="col-sm-2">
  <p> Verbal </p>
  <input type="number" placeholder="Score" class="form-control" name="gmat_verbal_score">
  <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gmat_verbal_rank">
</div>

<div class="col-sm-2">
    <p> Quantitative </p>
    <input type="number" placeholder="Score" class="form-control" name="gmat_quantitative_score">
    <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gmat_quantitative_rank">
  </div>


  <div class="col-sm-2">
      <p> Writing </p>
      <input type="number" placeholder="Score" class="form-control" name="gmat_written_score">
      <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gmat_written_rank">
    </div>


    <div class="col-sm-2">
        <p> Total </p>
        <input type="number" placeholder="Score" class="form-control" name="gmat_total_score">
        <input type="text" placeholder="Rank %" class="form-control gre-rank" name="gmat_total_rank">
      </div>

    </div>
  {{-- GMAT End --}}
</div>




                </div>
                </div>
              </div>
           

              <div class="panel panel-default">
                  <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                      Course Enrollment Detail
                    </h4></a>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body row">


                        <div class="col-md-3 ">
                          <p> Start Session </p>
                          
                          <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           <select class="form-control" name="session">
                            <option disabled selected>Select</option>  
                            <option value="2021">2021</option>
                              <option value="2012">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                             </select>
                                            </div>
                        
                       
                            </div>
                            
                        <div class="col-md-3 ">
                         <p> Country </p>

                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                            <select class="form-control" name="course_country">
                            <option disabled selected>Select</option>
                            @if(!empty($countries))
                            @foreach($countries as $c)
                                  <option value={{ $c->country_name }}> {{ $c->country_name }} </option>
                                  @endforeach
                                  @endif
                                </select>
                                            </div>
                         
                              </div>
                            


                        <div class="col-md-3 ">
                        <p>  Course </p>
                         <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           {!! Form::text('course', null, array('class'=>'form-control', 'placeholder'=>'Course')) !!}
                                            </div>
                            
                        
                      </div>
              
                        <div class="col-md-3">
                          
                        <p>     Intake </p>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
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
                        

                    </div>
                  </div>
              </div>
          </div> 
    

          <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  How student will show financials?
                </h4></a>
              </div>
              <div id="collapse5" class="panel-collapse collapse">
                <div class="panel-body">
                   
                    <div class="row">
                                 
                                 <div class="col-md-5 ">
                                     <label> Select Type </label>
                                      <div class="input-group how-financial-parent">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                            <select class="form-control how-financial" name="financial[]" onchange="other.call(this,event);">
                                    <option disabled selected>--Select--</option>    
                                      <option VALUE="Bank loan">Bank loan</option>
                                      <option VALUE="Personal Fund">Personal Fund</option>
                                      <option VALUE="Family Sponsorship">Family Sponsorship</option>
                                      <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                                      <option VALUE="Other">Other</option>
                                    </select>
                                    
                                            </div>
                                            
                     <div class="row" style="display:none" >
                                      
                                      <div class="input-group" >
                                              <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input type ="text" name="other[]" class="form-control" placeholder="Other" >
                                    
                                    </div>
                                  </div>                        
                                            
                                        
                                            
                                            
                                  
                                 </div>
                                 
                                 <div class="col-md-4 ">
                                     <label> Amount </label>
                                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}
                                            </div>
                                     
                                  </div>
                                  
                                  </div>
                                  
                                  
                                  
                    
                                  <div class="row add-financial"></div>
                                  <div class="financial-plus">
    <i onclick="delete_financial();" class="fa fa-minus remove-div" >   </i>   
                                      <i onclick="financial();" class="fa fa-plu plus-sign" style="right: 0;
    margin: 0;
    width: 38px;">   + </i>
                  
                                  </div>
                            
<script>
                             function delete_financial(){
                              document.querySelectorAll('.add-financial')[1].removeChild(document.querySelectorAll('.add-financial')[1].lastElementChild)   
                             }
                          </script>   
                    
                      <script>
 
//   document.querySelectorAll('.how-financial')[1].onchange =
  function other(event){ 
      console.log(this.parentElement)
    //   console.log(this.options[this.selectedIndex].text);
 if(this.options[this.selectedIndex].text == "Other"){
    //  var a = `   `;
                                  console.log(this.parentElement.parentElement);
                                //   var a = createElement('INPUT');
                                  this.parentElement.parentElement.lastElementChild.style.display = "block";
 }else{
                                //   this.parentElement.parentElement.remove += "";
                                // this.parentElement.nextElementSibling.removeChild(this.parentElement.nextElementSibling.lastElementChild)   
                                 this.parentElement.parentElement.lastElementChild.style.display = "none";
 }
  }
 
 </script>
                </div>
              </div>
          </div>



          <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Marital Status
                </h4></a>
              </div>
              <div id="collapse6" class="panel-collapse collapse">
                <div class="panel-body row">
                    
                    <div class="col-md-2 py-3 ">
                        <label for="Unmarried2"> {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()', 'id'  => 'Unmarried2' )) }}
                        Single </label>    
                    </div>

                  <div class="col-md-2 py-3 ">
                       <label for="Married2">  {{ Form::radio('marriage', 'y' , false, array('onclick'=>'show_marriage()', 'id' => 'Married2')) }}
                       Married  </label>
                        
                    </div>
                  
    
                    <div class="col-md-2 py-3 ">
                       <label for="Divorced2"> {{ Form::radio('marriage', 'n' , false, array('onclick'=>'hide_marriage()', 'id' => 'Divorced2')) }}
                       Divorced </label>
                        
                    </div>
                   <div class="col-md-2 py-3 ">
                        <label for="Widow2"> {{ Form::radio('marriage', 'n' , false,  array('onclick'=>'hide_marriage()', 'id'  => 'Widow2')) }}
                         Widow </label>
                        
                    </div>
                    {{-- <div class="col-md-2 py-3 "> test</div>
                    <div class="col-md-2 py-3 ">test</div> --}}
                  </div>
                        <br>
                        <div id="k0chec" class="row">   
                                 <div class="col-md-8 ">
                                   <table class="table">
                                     <tr>
                                       <th>  <p>
                                          Date of Marriage </p> </th>
                                          <td>  {!! Form::text('dom', null, array('class'=>'form-control date-of-marriage date' )) !!}
                                              <?php echo ($errors->first('dom',"<li class='custom-error'>:message</li>")) ?> </td>
                                     </tr>
                                     <tr> 
                                       <th>
                                          <p> Spouse Qualification </p>
                                      </th> 
                                    <td>
                                        {!! Form::text('spouse_qualification', null, array('class'=>'form-control', 'placeholder'=>'Spouse Qualification ')) !!}
                                        <?php echo ($errors->first('spouse_qualification',"<li class='custom-error'>:message</li>")) ?>
                                    </td>
                                    </tr>
                                    <tr>
                                      <th>  <p> Spouse Income Proof </p>  </th>
                                      <td>  {!! Form::file('sip', array('class'=>'form-control', 'id'=>'file1', 'onchange'=>'GetFileSize1(this);'  )) !!}  </td>
                                    </tr>
                                   </table>
                                  
                                        

                                    </div>

                                    <div class="col-md-4">
                                 
    
                                        {{-- <img src="https://identix.state.gov/qotw/images/no-pho.gif" alt=""  id="img1"> --}}
        
                                           
                                            
                                        </div>
                               
               
              
        
                         
                       
                    </div>
    
                </div>
              </div>
          

        
          <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Immigration History
                </h4></a>
              </div>
              <div id="collapse8" class="panel-collapse collapse">
                <div class="panel-body ">
                    <div class=" add-histor">

                    <div class="row" style="width:100%">
                    <div class=" col-md-3 ">
                    <p> Country Travelled  Before ? </p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                           <select class="form-control" name="imm_history[]" id="imm_history" class="imm_history">
                          <option value="" disabled selected> --Selected--</option>
                            @if(!empty($countries))
                            @foreach($countries as $con)
                        <option>{{ $con->country_name }}</option>
                     @endforeach
                     @endif
                    </select>
                                            </div>
                    </div>
                    



 <div class="col-md-2  disabled-class">
                        <p>Purpose </p>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                           {!! Form::text('imm_history_purpose[]', null, array('class'=>'form-control', 'placeholder' =>'Purpose')) !!}
                         </div>
                        
                    </div>

                    <div class="col-md-2  disabled-class">
                        <p> From </p>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                           {!! Form::text('imm_history_from[]', null, array('class'=>'form-control date' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                                            </div>
                        
                    </div>
                    
                    <div class="col-md-2  disabled-class">
                        <p> To </p>
                         <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                           {!! Form::text('imm_history_to[]', null, array('class'=>'form-control date' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
                         </div>
                        
                    </div>
                    
                    <div class="col-md-2  disabled-class">
                        <p> Duration (in months) </p>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                           {!! Form::text('imm_history_duration[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02', 'placeholder' =>'Duration')) !!}
                         </div>
                        
                    </div>
                    </div>
                    <div class="add-history row"></div>
                  </div>

                  <div class="  disabled-class" style="position: relative;">
    <i onclick="delete_hostory();" class="fa fa-minus remove-div" >   </i>              
        <i onclick="add_history();" class="fa fa-plu plus-sign" style="display:block">   + </i>


<script>
                             function delete_hostory(){
                              document.querySelectorAll('.add-history')[1].removeChild(document.querySelectorAll('.add-history')[1].lastElementChild)   
                             }
                          </script>   
                  </div>

                  <hr>
                  
<div class="row">
                    <div class="col-sm-6 ">
                    
                          <p style=""> Any Visa Rejected Before ? </p> 
   <label class="switch toggle-button" style="position: relative;right:0;">
                              <input type="checkbox" name="visa_rejected" id="visa_rejected" class="visa_rejected">
                              <span class="slider round"></span>
                            </label>
                    </div>

                        <div  class="col-sm-5 add-visa-rejected-country-above ">
                       
                          {{-- {!! Form::radio('visa_rejected', 'y', false, array('onchange'=>'show_visa_rejected()','id'=>'visa_rejected', 'style' => 'margin-left: 35px;' )) !!}
                     <label for= "visa_rejected">Yes Rejected</label>
                        {!! Form::radio('visa_rejected', 'n', true,array('onchange'=>'hide_visa_rejected()','checked', 'id'=> 'visa_not_rejected')) !!}
                    <label for="visa_not_rejected">     Not Rejected </label> --}}
                    <select name="visa_rejected_country[]" class="visa_rejected_countr form-control  " id="visa_rejected_countr" style="margin-top:22px">
                      <option value="" disabled selected>--Selected--</option>
                      @foreach($countries as $c)
                      <option value={{$c->country_name}}>  {{ $c->country_name }}</option>
                   @endforeach
                    </select>  
                    
                    <div class="add-visa-rejected-country"></div>
                     </div>
                     
                     <div class="col-sm-1"> 
    <i onclick="delete_educatio();" class="fa fa-minus remove-div " id="visa_rejected_minus" >   </i>
    <i onclick="add_visa_rejected_country();" class="fa fa-plu plus-sign" id="visa_rejected_butto">   + </i>   
                    </div>
                    </div>

                    </div>
                </div>
              <script>
                             function delete_educatio(){
                              document.querySelectorAll('.add-visa-rejected-country')[1].removeChild(document.querySelectorAll('.add-visa-rejected-country')[1].lastElementChild)   
                             }
                          </script>   
          </div>
          
          



          
          <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse9"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Permanent Address
                </h4></a>
              </div>
              <div id="collapse9" class="panel-collapse collapse">
                <div class="panel-body row">

                   

                    {{-- <div class="col-md-4 "> <p> Street </p>
                        {!! Form::text('address_line2', null, array('class'=>'form-control', 'placeholder'=>'Street')) !!}
                    </div> --}}
          
                    <div class="col-md-4 ">
                     <p> Country </p> 
                     <?php $countries =  DB::table('countries')->get(); ?>  
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                           <select name="country" id="" class="form-control" onChange="getState(this.value);">
                            <option value="" Selected disabled>--Select--</option>
                          
                        @foreach($countries as $c)
                      <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
          
                    @endforeach
                </select>
                         </div>
                         
                      
           
                    </div>
                
                    <div class="col-md-4"> <p> State </p> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                           <select name="state" id="state-lis" class="form-control" onChange="getCity(this.value);">
                            <option value="" >--Select--</option>
                           </select>  
                         </div>
                        
                    </div>

                    <div class="col-md-4 "> <p> City/Town </p> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                           <select name="city" id="city-lis" class="form-control" >
                            <option value="" >--Select--</option>
                    </select>  
                         </div>
                        
                    </div>


                    <div class="col-md-4 ">
                        <p>  House No / Street</p>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                           {!! Form::text('address_line1', null, array('class'=>'form-control', 'placeholder'=>'House No / Street')) !!}
                         </div>
                           
                       </div>

                    <div class="col-md-4"> <p> Pincode  </p> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                         {!! Form::number('pincode', null, array('class'=>'form-control', 'placeholder'=>'Pincode', 'onKeyPress'=>"if(this.value.length==6) return false;")) !!}
                         </div>
                        
                    </div>
                  </div>
                </div>
              </div>
          


  <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse10"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Id Proof Details
                </h4></a>
              </div>
              <div id="collapse10" class="panel-collapse collapse">
                <div class="panel-body row">
                  
                    <div class="col-md-4 ">
                      <p>Id Proof</p>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-id-card-alt"></i></span>
                         <select class="form-control" name="id_proof">
                        <option disabled selected> --Selected--</option>
                            <option value="AADHAAR CARD">AADHAAR CARD</option>
                            <option value="VOTER ID">VOTER ID</option>
                            <option value="PAN CARD">PAN CARD</option>
                            <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                            <option value="PASSPORT">PASSPORT</option>
                          </select>
                         </div>
                      
                        </div>
                          
        
                        
                <div class="col-md-4"> <p> Name (As Mentioned in the ID Proof) </p>
                <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-id-card"></i></span>
                         {!! Form::text('id_proof_name', null, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof ')) !!}
                         </div>
                     
                  </div>
                  
                  <div class="col-md-4 "> <p> ID Proof No </p>
                  <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                       {!! Form::text('id_proof_no', null, array('class'=>'form-control', 'placeholder'=>'ID Proof No')) !!}
                         </div>
                      
                  </div>
                      </div>
              </div>
          </div>






          <div class="panel panel-default">
              <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse11"><h4 class="panel-title" style="background:#458bbb !important; margin-right:10px; margin-left:10px;">
                  Upload Image/ Documents
                </h4></a>
              </div>
              <div id="collapse11" class="panel-collapse collapse">
                <div class="panel-body">


                    <div class="container my-5">
                        <div class="row">
                                  <div class="col-md-6 text-center"><div></div>
                                  <img src=""   id="img212">
                                       <br>
                                        <label for="file212" class="custom-file-upload">
                                          <i class="fa fa-cloud-upload"></i> Upload Image
                                        </label>

 {!! Form::file('image', array('class'=>'form-control ', 'id'=>'file212','onchange'=>'GetFileSize2(this);','style="display:none"')) !!}
                                       
                                       
                                  </div>
                                  <div class="col-md-6 text-center">
                                    {{-- <div>Upload </div> --}}
                                        <img  alt="" id="img567">

                                        <label for="file567" class="custom-file-upload" style="display:block">
                                          <i class="fa fa-cloud-upload"></i> Upload Signature
                                        </label>
                                        {!! Form::file('signature', array('class'=>'form-control', 'id'=>'file567','onchange'=>'GetFileSize3(this);', 'style="display:none"')) !!}
                          </div></div>
                        
                                            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>
                        
                               <div class="col-md-12 text-center my-4" >
                                          {{-- {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!} --}}
                                      </div>
                                      </div>


                </div>
              </div>
          </div>
        </div>
        </div>
          <div class="col-md-12 text-center my-4" >
              {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25 hover-color' , 'value'=>"Save" , 'style' => 'border-radius: 40px;
              padding: 11px;')) !!}
          </div>


       <style>
.plus-sign{
  display:none;
}
.plus-sign:last-child{
         display:block;
       };
       </style>               
                          
<script>
    function as(){
      $('.add-clas').append('  <div class=" row" style="margin-top:10px"><div class="col-md-2"><p></p>  <div class="input-group"><span class="input-group-addon"><i class="fa fa-certificate" aria-hidden="true"></i></span> <select name="qualification_name[]" id="" class="form-control">      <option selected disabled> selected </option>   <option value="Certificate I"> Certificate I </option><option value="Certificate II"> Certificate II </option> <option value="Certificate III"> Certificate III </option>       <option value="Certificate IV"> Certificate IV </option> <option value="Diploma"> Diploma </option><option value="Advance Diploma"> Advance Diploma </option>      <option value="10"> 10 </option><option value="12"> 12 </option>        <option value="Graduate"> Graduate </option><option value="post Graduate"> Post Graduate </option></select></div> </div>  <div class="col-md-2"><p></p> <div class="input-group"> <span class="input-group-addon"><i class="fa fa-stream" aria-hidden="true"></i></span>  {!! Form::text("edu_stream[]", null, array("class"=>"form-control", "placeholder" =>"Stream")) !!}  </div> </div>  <div class="col-md-3"><p></p> <div class="input-group"> <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span> {!! Form::text("institute_name[]", null, array("class"=>"form-control", "placeholder"=>"Name of Institute/University" )) !!}</div> </div><div class="col-md-2"><p></p><div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span> <select name="passing_year[]" id="" class="form-control"> <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}}  </option>  @endfor </select></div></div><div class="col-md-2"><p></p> <div class="input-group">              <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span> {!! Form::text("percentage[]", null, array("class"=>"form-control date" ,"placeholder"=>"Percentage")) !!}</div> </div> </div>');
      }   

      function add_company(){
        // alert('a');
        
        $('.add-company').append(` <div style="width:100%;display:flex"> <div class="col-sm-3" style="margin-top:10px;">
    <p> </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                  {!! Form::text('company[]', null, array('class'=>'form-control', 'placeholder'=>'Company Name' )) !!}
                  </div>
                  
</div>
<div class="col-sm-2" style="margin-top:10px;">
    <p> </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                 {!! Form::text('designation[]', null, array('class'=>'form-control', 'placeholder'=>'Designation' )) !!}
                  </div>
                  
</div>
<div class="col-sm-2" style="margin-top:10px;">
    <p> </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
               {!! Form::text('exp_start[]', null, array('class'=>'form-control start_exp_modal date','min'=>'1979-12-31', 'max'=>'2020-01-02','placeholder'=>'' )) !!}
                  </div>
                  
</div>
<div class="col-sm-2" style="margin-top:10px;">
    <p> </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
              {!! Form::text('exp_end[]', null, array('class'=>'form-control date', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}  
                  </div>
                  
</div>
<div class="col-sm-2" style="margin-top:10px;"> 
<div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
              {!! Form::text('annual_salary[]', null, array('class'=>'form-control', 'placeholder' =>"CTC / Annual Salary" )) !!}
                  </div>
                   </div>
                   <div class="col-md-1"><i class="fa fa-minus remove-div deletesameclassData">   </i></div>
</div>

</div>`)
            
        $('.date').datepicker({});
        $('.date').attr('placeholder','DD-MM-YYYY');
        // $('.work_end_date_modal').datepicker({})
      }

      function financial(){
        //   alert('financial')
        $('.add-financial').append(`<div class="row" style="width:100%"> <div class="col-md-5 "> 
        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           <select class="form-control" name="financial[]" onchange="other.call(this,event);"> <option disabled selected>--Select--</option>                                                                 <option VALUE="Bank loan">Bank loan</option>    <option VALUE="Personal Fund">Personal Fund</option>    <option VALUE="Family Sponsorship">Family Sponsorship</option>   <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>   <option VALUE="Other">Other</option>  </select>
                                            </div> 
                                            
                                            <div class="row" style="display:none" >
                                      
                                      <div class="input-group" >
                                              <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input type ="text" name="other[]" class="form-control" placeholder="Other" >
                                    
                                    </div>
                                  </div>
                                            
                                            </div>              <div class="col-md-4 ">  
                                            <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}
                                            </div>         </div> <div class="col-md-1"><i class="fa fa-minus remove-div deletesameclassData">   </i></div> </div>`)
      }
    </script>
       
       
     


<style>
.language-test p{
  margin: 0;
}
.language-test select{
  /* max-width: 100px;
    margin: auto; */
}
</style>

                



<style>
#visa_rejected_country, #visa_rejected_button, #visa_rejected_minus, .add-visa-rejected-country-above{
   display: none; 
}
</style>



<script>
  function add_visa_rejected_country(){
    $('.add-visa-rejected-country').append(' <select name="visa_rejected_country[]" class="visa_rejected_countr form-control " style="margin-top:10px;"> <option value="" disabled selected>--Selected--</option> @foreach($countries as $c)<option value={{$c->country_name}}>  {{ $c->country_name }}</option>          @endforeach</select>  ');
  }
</script>


<script>
    
    function add_history(){
        
      $('.add-history').append(` <div class="row">
    <div class=" col-md-3 my-2">
        <p> </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                           <select class="form-control" name="imm_history[]" id="imm_history">
            <option value="" disabled selected> --Selected--</option>@if(!empty($countries))@foreach($countries as $con)<option>{{ $con->country_name }}</option>@endforeach @endif
        </select>
         </div>
       
    </div>
    <div class="col-md-2 my-2 disabled-class">
        <p> </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                          {!! Form::text("imm_history_duration[]", null, array("class"=>"form-control ","min"=>"1979-12-31","max"=>"2020-01-02", "placeholder" =>"Purpose"))!!}
         </div>
         
    </div>
    <div class="col-md-2 my-2 disabled-class">
        <p> </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                           {!! Form::text("imm_history_from[]", null, array("class"=>"form-control date" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}
         </div>
        
    </div>
    <div class="col-md-2 my-2 disabled-class">
        <p> </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                           {!! Form::text("imm_history_to[]", null, array("class"=>"form-control date" ,"min"=>"1979-12-31", "max"=>"2020-01-02")) !!}
         </div>
         
    </div>
    <div class="col-md-2 my-2 disabled-class">
        <p> </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                          {!! Form::text("imm_history_duration[]", null, array("class"=>"form-control ","min"=>"1979-12-31","max"=>"2020-01-02", "placeholder" =>"Duration"))!!}
         </div>
         
    </div><div class="col-md-1"><i class="fa fa-minus remove-div deletesameclassData">   </i></div></div>`);
    
      $('.date').datepicker({});
      $('.date').attr("placeholder","DD-MM-YYYY");
      }
</script>

<style>
.add-history{
  width:100%;
}
</style>

           
        </div>
      


        














        @elseif(!empty($enquiries))


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




          @endforeach
            

          @if($enq_marriages->count() > 0)
          
          @foreach($enq_marriages as $m)
          
            <div class="col-md-12 btn-danger"><h4 class="my-2"> Marital Status :  </h4></div>
               <div class="col-md-4 py-3 ">

                </div>
               <div class="col-md-4 py-3 ">

                </div>
         <style>
       
         </style>
                
               <div id="k0check">
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
                   
                    Marrie
                </div>
               <div class="col-md-4 py-3 ">
                    {{ Form::radio('marriage', 'n' , true,  array('onclick'=>'hide_marriage()')) }} Unmarried
                </div>
                
               <div id="k0check">
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


              <select name="state" id="state-li" class="form-control" onChange="getCity(this.value);">
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

         
          <div class="col-md-2 py-3">Pincode :  </div>
          <div class="col-md-4 py-3">
              {!! Form::number('pincode', $e->pincode, array('class'=>'form-control', 'placeholder'=>'Pincode', 'onKeyPress'=>"if(this.value.length==6) return false;")) !!}
          </div>

         
      
         

         

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
          
          @if($enq_educations->count() == 0)
              <div class="col-md-12 btn-danger education-details"><h4 class="my-2">Education Details</h4></div>
              <div class="container">
               <div class="col-md-12 py-3 scrollmenu row  ">
                  <div class="add-clas"> </div>
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


                 <div class="col-md-2">
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
    {!! Form::text('percentage[]', null, array('class'=>'form-control',"placeholder"=>"percantage" )) !!}
                    </div>
                    <i onclick="add_educatio();" class="fa fa-plu plus-sign" >   +</i>
                      
                             
               </div>  
              
              
              
              </div> <!-- end of container educaion-->    



@elseif($enq_educations->count() > 0)

              <div class="col-md-12 btn-danger education-details"><h4 class="my-2">Education Details</h4></div>
              @foreach($enq_educations as $edu)
              <div class="container">
               <div class="col-md-12 py-3 scrollmenu row  ">
                  <div class="add-clas"> </div>
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


                 <div class="col-md-2">
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
                      {!! Form::text('percentage[]', $edu->percentage, array('class'=>'form-control', "placeholder"=>"Percentage" )) !!}
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
   
//     function add_education(){

//       $('.add-clas').append(` <div class="col-md-12 py-3 scrollmenu row">
//     <div class="col-md-2">
//         <p>Qualification</p>
//         <div class="input-group">
//         <span class="input-group-addon"><i class="fa fa-certificate" aria-hidden="true"></i></span>
//         <select name="qualification_name[]" id="" class="form-control">
//             <option selected> selected </option>
//             <option value="Certificate I"> Certificate I </option>
//             <option value="Certificate II"> Certificate II </option>
//             <option value="Certificate III"> Certificate III </option>
//             <option value="Certificate IV"> Certificate IV </option>
//             <option value="Diploma"> Diploma </option>
//             <option value="Advance Diploma"> Advance Diploma </option>
//             <option value="10"> 10 </option>
//             <option value="12"> 12 </option>
//             <option value="Graduate"> Graduate </option>
//             <option value="post Graduate"> Post Graduate </option>
//         </select>
//         </div>
//     </div>
//     <div class="col-md-3">
//         <p>Stream</p> {!! Form::text("edu_stream[]", null, array("class"=>"form-control")) !!}
//     </div>
//     <div class="col-md-3">
//         <p>Name of Institute</p>{!! Form::text("institute_name[]", null, array("class"=>"form-control" )) !!}
//     </div>
//     <div class="col-md-2">
//         <p>Year of Passing</p> <select name="passing_year[]" id="" class="form-control">
//             <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}} </option> @endfor
//         </select>
//     </div>
//     <div class="col-md-2">
//         <p>Percentage</p> {!! Form::text("percentage[]", null, array("class"=>"form-control" )) !!}
//     </div>
// </div> `);
//       }   

      function add_company(){
        // $('.work_start_date_modal').datepicker({});
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
             



















<div class="col-md-8 k0label">






<div class="row">
     
  </div>






</div>         




</div>


@if($enq_financials->count() == 0)
<div class="container-fluid  ">
  <div class="row  btn-danger"><div class="col-md-12 py-2  "> <h4> How student will show financials? </h4> </div></div>
    
  <div class="row">
               
               <div class="col-md-5 py-3">
                   <div class="input-group how-financial-parent">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           <select class="form-control how-financial" name="financial[]">
                  <option disabled selected>--Select--</option>    
                    <option VALUE="Bank loan">Bank loan</option>
                    <option VALUE="Personal Fund">Personal Fund</option>
                    <option VALUE="Family Sponsorship">Family Sponsorship</option>
                    <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                    <option VALUE="Other">Other</option>
                  </select>
                                            </div>
                 
               </div>
               
               <div class="col-md-4 py-3">
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                          {!! Form::number('financial_amount[]', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}
                                            </div>
                 
                 
                </div>
                <div class="row add-financial"></div>


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
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           <select class="form-control" name="financial[]">
                   <option  selected vlaue="{{ $fin->financials_by }}" >{{ $fin->financials_by }}</option>    
                      <option VALUE="Bank loan">Bank loan</option>
                      <option VALUE="Personal Fund">Personal Fund</option>
                      <option VALUE="Family Sponsorship">Family Sponsorship</option>
                      <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                      <option VALUE="Other">Other</option>
                    </select>
                                            </div>
                 
                 </div>
                 
                 <div class="col-md-4 py-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           {!! Form::number('financial_amount[]', $fin->amount, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}
                                            </div>
                     
                  </div>
                  @endforeach
                  <div class="col-md-1">
                    
  
                  </div>
                 
    </div>
   
                 
  </div>
@endif



</div>
        

              <!-- toggle -->

           @if($enq_imm_historys->count() == 0)   
              <div class="container-fluid">
                <div class="row">



         @elseif($enq_imm_historys->count() > 0)
         
         
         <div class="container-fluid">
            <div class="row">

@endif



{{-- history --}}
@if($enq_travelled_historys->count() == 0)
<div class="col-md-12 btn-danger"><h4 class="my-2">Immigration History</h4></div>
<div class="add-history row"></div>

<div class="row" style="width:100%">

<div class=" col-md-3 my-3">
<p> Country Travelled  Befores ? </p>
<div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                           <select class="form-control" name="imm_history[]" id="imm_history" class="imm_history">
      <option value="" disabled selected> --Selected--</option>
        @if(!empty($countries))
        @foreach($countries as $con)
    <option>{{ $con->country_name }}</option>
 @endforeach
 @endif
</select>
 </div>

</div>


<div class="col-md-3 my-3 disabled-class">
    <p> From </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                          {!! Form::date('imm_history_from[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
 </div>
   
</div>

<div class="col-md-3 my-3 disabled-class">
    <p> To </p>
    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                          {!! Form::date('imm_history_to[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
 </div>
    
</div>

<div class="col-md-2 my-3 disabled-class">
    <p> Duration </p>
        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                          {!! Form::text('imm_history_duration[]', null, array('class'=>'form-control' ,'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}
 </div>
    
</div>

<div class="col-md-1 my-3 disabled-class financial-plus">
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
                  /* display: block !important; */
                }
               
              </style>
@endif




<style>
#visa_rejected_country, #visa_rejected_button{
  /* display: none; */
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
          <div class="col-md-6 text-center"><div>Upload Imag</div>
                <img src="https://identix.state.gov/qotw/images/no-photo.gif" alt="Italian Trulli"  id="img2">
                {!! Form::file('image', array('class'=>'form-control', 'id'=>'file212','onchange'=>'GetFileSize2(this);')) !!}
          </div>
          <div class="col-md-6 text-center"><div>Upload Signature</div>
                <img src="https://via.placeholder.com/160x194" alt="Italian Trulli" id="img3">
                

          </div></div>

@elseif($enquiries->count() > 0)
<div class="row">
    <div class="col-md-6 text-center"><div>Upload Imag</div>
    @foreach($enquiries as $enq)
<img src="{{url('public/uploads/image/'.$enq->image) }}" alt="Italian Trulli"  id="img2">
          
          {!! Form::file('image', array('class'=>'form-control', 'id'=>'file212','onchange'=>'GetFileSize2(this);', 'value'=>'filename')) !!}
    </div>
    <div class="col-md-6 text-center"><div>Upload Signature</div>
  <img src="{{url('public/uploads/signature/'. $enq->signature) }}" alt="Italian Trulli" id="img3">
     

          @endforeach

    </div></div>

    @endif






          <div class="col-md-12 my-4"> <input type="checkbox" name="term_condition">
             I AGREE
            TERMS & CONDITIONS</div>
            <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>






               <div class="col-md-12 text-center my-4" >
                  {!! Form::submi('Submit', array('class'=>'btn btn-danger w-25' , 'value'=>"Save" )) !!}
              </div>
              </div>





           
        </div>
        


        
 </div>
 

 
 
 @endif


                            {{-- end other detail --}}




                      


            </div>
</div>


<script type="text/javascript">




</script>






                                              {{-- <div style="width: 100%;
                                              margin-top: 44px;
                                              text-align: center;">
                                              <button id=""  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" >Back</button>
                                              <button type="submit" id=""  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" >Submit</button>
                                              
                                              </div> --}}
                                            </div>                                
                               
                               
    </div>
                          
    

{{Form::close()}}
                  </div>
            
        <!-- Modal footer -->
        <!-- {{-- <div class="modal-footer">
          
        </div> --}} -->
        @endsection
    
        


<script>function add_education(){
   
  $('.add-class').append(` <div class="pt-3 scrollmenu row test">
<div class="col-md-2">
    <p>Qualification</p>
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-certificate" aria-hidden="true"></i></span>
    <select name="qualification_name[]" id="" class="form-control">
        <option selected> selected </option>
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
</div>
<div class="col-md-2">
    <p>Stream</p> 
    <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-stream"></i></span>
                 {!! Form::text("edu_stream[]", null, array("class"=>"form-control", "placeholder"=>"Stream"  )) !!}
                
              </div>
</div>
<div class="col-md-3">
    <p>Name of Institute/University</p>
    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true"></i></span>
                 {!! Form::text("institute_name[]", null, array("class"=>"form-control", "placeholder"=>"Name of Institute/University" )) !!}
                
              </div>
</div>
<div class="col-md-2">
    <p>Year of Passing</p>
    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                  <select name="passing_year[]" id="" class="form-control">
        <option selected disabled>--Selected--</option> @for($i=1990; $i<=2020; $i++) <option value="{{$i}}"> {{$i}} </option> @endfor
    </select>
                
              </div>
    
  
</div>
<div class="col-md-2">
    <p>Percentage</p> 
      <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                      {!! Form::text("percentage[]", null, array("class"=>"form-control", "placeholder"=>"Percentage" )) !!}
                
              </div>
          
</div>
</div> `);
  }  </script>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  
 
//   $(document).ready(function(){
// $('.how-financial').change(function(){
//   if($('.how-financial').val() == 'Other'){
//   var a = document.createElement('input')
//   document.getElementsByClassName('how-financial-parent')[0].appendChild(a);
//   }
// })
//   })


  </script>
 


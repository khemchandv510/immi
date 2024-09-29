@extends('header')
@section('add-leads')
<style>
.add-leads-form{
     margin-top: 20px ;
}
.add-leads-form .form-row{
     margin-top: 15px ;
}
.add-leads-form{
     background-color: #fff;
    padding: 10px;
    border-radius: 10px;
}
.leadhead h2{
     color: #fff!important;
    background:#34495e;
    margin: 10px 0px 0px 0px;
    border-radius: 20px;
    padding:5px 0px 5px 0px;
    width:200px;
}
.message{
    margin-top:45px!important;
}
</style>

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
   @endif
   
<center>
<div class="leadhead">
    <h2 class="text-primary mx-4">Add Lead</h2></center>
</div>
<div class="container">
          <form method ="post" action ="{{url(Request::segment(1).'/'.'add-leads-save')}}">
            @csrf
<div class="row add-leads-form">
     
          <div class="form-row col-md-4">
                    <label for="">Candidate Name <span style="color:red;">*</span></label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                        {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                        <?php echo ($errors->first('name',"<p class='custom-error'>:message</p>")) ?>
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
                    <label for="">Education Details</label>
                 
                    <div class="input-group"style="height:40px;">
                        <span class="input-group-addon"><i class="fas fa-school"></i></span>
                        <select name="qualification_name" id="" class="form-control">
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
              
                           
<?php 
  $countries = DB::table('countries')->get();
  ?>         

              
              
                <div class="form-row col-md-4">
                    <label for="">Country <span style=""></span></label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                         <select name="country" id="" class="form-control" onChange="getState(this.value);">
                            <option value="" Selected disabled>--Select--</option>
                          
                        @foreach($countries as $c)
                      <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
          
                    @endforeach
                </select>
                        <?php echo ($errors->first('country',"<li class='custom-error'>:message</li>")) ?>
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
                    <label for="">Email Id</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Email')) !!}
                            <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>

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
                            </select><br>
                           

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
             

              <div class="form-row col-md-4">
                    <label for="">Status</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                        <?php   $status =  DB::table('enq_status')->select('status')
                        ->orderBy('status','ASC')
                        ->get() ?>
                     <select name="status" id="new_user_status2" class="form-control" onchange="date_time.call(this,event);">
                         <option disabled selected > --Select-- </option>
@foreach($status as $s)
                     <option value="{{$s->status}}">{{$s->status}}</option>
                         @endforeach
                     </select>
                     </div>
                     
                     <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                     
                     <input type="text" name="date" id="date3" class="form-control date date2" style="display:none;margin-top:5px;">
                      <input type="time" name="time" id="time3" class="form-control time2" style="display:none;margin-top:5px;width:100%">
                    
              </div>          
                      <script>
                          
                          
            function date_time(event){
                if((this.options[this.selectedIndex].text == "Call Back Later") || (this.options[this.selectedIndex].text == "Follow Up") ) {
                    // console.log(this.options[this.selectedIndex].text);
                    // this.nextElementSibling.style.display="block"
                    // this.nextElementSibling.nextElementSibling.style.display="block"
                    document.getElementById('date3').style.display="block";
                    document.getElementById('time3').style.display="block";
                }else{
                    // this.nextElementSibling.style.display="none"
                    // this.nextElementSibling.nextElementSibling.style.display="none"
                    document.getElementById('date3').style.display="none";
                    document.getElementById('time3').style.display="none";
                }
                    
                }
            
                      </script>
                      
                    <style>
                    input[type="date"], input[type="time"]{
                /*width: 49%;*/
padding: 6px;
border-radius: 4px;
border: 1px solid #cbc7c7;
                    }
                    </style>

                    
              
              <div class="form-row col-md-4">
                    <label for="">Comments</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon" style="resize:none;"><i class="fas fa-comment"></i></span>
                          <!--{!! Form::textarea('comment',null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"10")) !!} -->
                          <textarea class="form-control" name="comment" rows="2" cols="2" style="resize:none;"></textarea>
                          </div>

              </div>
              
              
              <div class="form-row col-md-4">
                    <label for="">Passport no.</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon" style="resize:none;"><i class="fas fa-comment"></i></span>
                         <input type="text" name="gstno" class="form-control" >
                          </div>

              </div>
              
              
       
              
              
              
              <div class="col-md-12 text-center my-4">
                    <input class="btn btn-danger hover-color" value="Submit" style="border-radius: 30px;
                    padding: 11px; width:120px;"  type="submit" id="add_leads">
                </div>
          
            </div>
            
          </form>
            </div>
@endsection('add-leads')
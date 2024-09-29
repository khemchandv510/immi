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
    padding: 20px;
    border-radius: 10px;
}
.leadhead h2 {
    color: #fff!important;
    background: #34495e;
    /* margin: 10px 0px 0px 0px; */
    border-radius: 20px;
    padding: 5px 0px 5px 0px;
    width: 200px;
    margin: 0px auto;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
</style>
<div class="leadhead">
<center><h2 class="text-primary mx-4">Add</h2></center>
</div>
<div class="container">
          <form method ="post" action ="{{route('add-institute-save')}}">
            @csrf
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
                    <label for="">Status</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
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
                        <select name="source" id="" class="form-control">
                              <option disabled selected> --Source-- </option>
                              <option value="Google">{{"Google"}}</option>
                              <option value='Just Dial'>{{"Just Dial"}}</option>
                            
                            
                            <option value="Other">{{"Other"}}</option>
                            <option value="Reference">{{"Reference"}}</option>
                            <option value="Sulekha">{{"Sulekha"}}</option>
                            
                            <option value="UrbanPro">{{"UrbanPro"}}</option>
                            <option value="Walk In">{{"Walk In"}}</option>
                            </select>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4"style="height: 40px;">
                    <label for="">Education Details</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-school"></i></span>
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
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Comment</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment"></i></span>
                          <!--{!! Form::textarea('comment',null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"10")) !!}  -->
                          <textarea class="form-control" name="comment" rows="2" cols="10" style="resize:none;"></textarea>
                          
                          </div>

                    
              
              </div>
              <div class="col-md-12 text-center my-4">
                    <input class="btn btn-danger hover-color" value="Submit" style="border-radius: 40px;
                    padding: 11px; width:120px;" type="submit">
                </div>
          
            </div>
            
          </form>
            </div>
@endsection
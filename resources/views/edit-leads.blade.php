@extends('header')
@section('add-leads')
<?php 
// $url2 = "https://electoralsearch.in/VoterSearch/SASSearch?search_type=epic&epic_no=YDI5080205";
// dd($url2);
// $data2 = json_decode(file_get_contents($url2));
// dd($data2);
?>
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
</style>
       
            

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
   @endif
<center><h2 class="text-primary mx-4">Edit Lead</h2></center>

<div class="container">
          <form method ="post" action ="{{url(Request::segment(1).'/edit-leads-save')}}">
            @csrf
<div class="row add-leads-form">
     <input type="hidden" name="unique_id" value="{{$data->unique_id}}">
          <div class="form-row col-md-4">
                    <label for="">Candidate Name <span style="color:red;">*</span></label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                        {!! Form::text('name', isset($data->name)?$data->name:null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                        <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Mobile Number</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        {!! Form::number('contact', isset($data->contact)?$data->contact:null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Alternate Mobile</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        {!! Form::number('alternate_contact', isset($data->alternate_contact)?$data->alternate_contact:null, array('class'=>'form-control', 'placeholder'=>'Mobile No',  'onKeyPress'=>"if(this.value.length==10) return false;")) !!}
                        <?php echo ($errors->first('alternate_contact',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Email Id</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                        {!! Form::email('email', isset($data->email)?$data->email:null, array('class'=>'form-control', 'placeholder'=>'Enter Email')) !!}
                            <?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Date Of Birth</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        
                        {!! Form::text('dob',  isset($data->dob)? date('d/m/Y', strtotime($data->dob)):'', array('class'=>'form-control date', 'min'=>'1979-12-31', 'max'=>'2020-01-02')) !!}

                             <?php 
                             echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) 
                             ?> 

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Gender</label>
                    <?php
                    
                    $arr = array('Male'=>'Male','Female'=>'Female','Other'=>'Other');
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-mars-stroke-h"></i></span>
                        <select class="form-control" name="gender">
                              <option disabled Selected> --Select-- </option>
                              @foreach ($arr as $item)
                              <option value="{{$item}}" <?php echo (!empty($data->gender) && ($data->gender == $item)) ? 'selected' : ''; ?>>{{$item}}</option>; 
                              @endforeach
                                
                              </select>
                              <?php echo ($errors->first('gender',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Status</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                        <?php 
                        $status =  DB::table('enq_status')->select('status')
                        ->orderBy('status','ASC')
                        ->get();
                        ?>
                     <select name="status" id="new_user_status2" class="form-control" onchange="date_time.call(this,event)" >
                     
                         <option disabled selected > --Select-- </option>
@foreach($status as $s)
                     
                     <option value="{{$s->status}}" <?php echo (!empty($data->disposition) && ($data->disposition == $s->status)) ? 'selected' : ''; ?>>{{$s->status}}</option>; 
                         @endforeach
                     </select>
                     <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                     <input type="text" name="date" id="date3" class="form-control date date2" style="display:none;margin-top:5px;">
                      <input type="time" name="time" id="time3" class="form-control time2" style="display:none;margin-top:5px;">
                      
                      <script>
                          
                          
            function date_time(event){
                if((this.options[this.selectedIndex].text == "Call Back Later") || (this.options[this.selectedIndex].text == "Follow Up") ) {
                   
                    document.getElementById('date3').style.display="block";
                    document.getElementById('time3').style.display="block";
                }else{
                   
                    document.getElementById('date3').style.display="none";
                    document.getElementById('time3').style.display="none";
                }
                    
                }
            
                      </script>
                      
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
                            {{-- <option value={{$p->purpose}}>{{$p->purpose}}</option> --}}
                            <option value="{{$p->purpose}}" <?php echo (!empty($data->purpose_of_query) && ($data->purpose_of_query == $p->purpose)) ? 'selected' : ''; ?>>{{$p->purpose}}</option>;
                            @endforeach
                            
                          </select>
                          <?php echo ($errors->first('note',"<li class='custom-error'>:message</li>")) ?>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Source</label>
                 
                    <div class="input-group">
                        <?php
                    
                        $arr = array('Google'=>'Google','Just Dial'=>'Just Dial','Other'=>'Other','Reference'=>'Reference','Sulekha'=>'Sulekha','UrbanPro'=>'UrbanPro','Walk In'=>'Walk In' );
                        ?>
                        <span class="input-group-addon"><i class="fas fa-certificate"></i></span>
                        
                        <select name="source" id="add_source" class="form-control">
                              <option disabled selected> --Source-- </option>
                              @foreach($arr as $p)
                              
                              <option value="{{$p}}" <?php echo (!empty($data->source) && ($data->source == $p)) ? 'selected' : ''; ?>>{{$p}}</option>;
                              @endforeach
                             
                            </select>

                    </div>
                    <?php
                    // dd(!in_array($data->source,$arr) && !empty($data->source));
                    if(!in_array($data->source,$arr) && !empty($data->source)){
                       ?>
                       <div class="row input-group" style="display: block;" id="add_other_source" >
                                      
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                      <input type="text" name="source2" class="form-control" placeholder="Other"  value="{{ $data->source }}">
                      
                      </div>
                    </div>

              
                       <?php
                        
                    } 
                    else{
                       ?>
 <div class="row input-group" style="display: none;" id="add_other_source">
                                      
    <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
  <input type="text" name="source2" class="form-control" placeholder="Other"  >
  
  </div>
</div>
                       <?php
                    } ?>
                    
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
                    <label for="">Education Details</label>
                    <?php
                    
                    $arr = array('Certificate I'=>'Certificate I','Certificate II'=>'Certificate II','Certificate III'=>'Certificate III','Certificate IV'=>'Certificate IV','Diploma'=>'Diploma','Advance Diploma'=>'Advance Diploma','10'=>'10','12'=>'12','Graduate'=>'Graduate','Post Graduate'=>'Post Graduate' );
                    
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-school"></i></span>
                        <select name="qualification_name" id="" class="form-control">
                              <option selected disabled> selected </option>
                              @foreach($arr as $p)
                              
                              <option value="{{$p}}" <?php echo (!empty($education->class) && ($education->class == $p)) ? 'selected' : ''; ?>>{{$p}}</option>;
                              @endforeach
                              {{-- <option value="Certificate I"> Certificate I </option>
                              <option value="Certificate II"> Certificate II </option>
                              <option value="Certificate III"> Certificate III </option>
                              <option value="Certificate IV"> Certificate IV </option>
                              <option value="Diploma"> Diploma </option>
                              <option value="Advance Diploma"> Advance Diploma </option>
                             <option value="10"> 10 </option>
                             <option value="12"> 12 </option>
                             <option value="Graduate"> Graduate </option>
                             <option value="post Graduate"> Post Graduate </option> --}}
                           </select>

                    </div>
                    
              
              </div>

              <div class="form-row col-md-4">
                    <label for="">Comments</label>
                 
                    <div class="input-group">
                        <span class="input-group-addon" style="resize:none;"><i class="fas fa-comment"></i></span>
                          {!! Form::textarea('comment',isset($data->last_comment)?$data->last_comment:null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"10")) !!}
                          {{-- <textarea class="form-control" name="comment" rows="2" cols="2" style="resize:none;"></textarea> --}}
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
                        
          
          
            <option selected disabled> selected </option>
                              @foreach($countries as $p)
                              
                              <option value="{{$p->country_id}}" <?php echo (!empty($data->country) && ($data->country == $p->country_id)) ? 'selected' : ''; ?>>{{$p->country_name}}</option>;
                              @endforeach
                          
                        
                </select>
                        <?php echo ($errors->first('country',"<li class='custom-error'>:message</li>")) ?>
                    </div> 
              
              </div>
              
              
              
              <div class="col-md-12 text-center my-4">
                    <input class="btn btn-danger hover-color" value="Submit" style="border-radius: 30px;
                    padding: 11px; width:120px;"  type="submit">
                </div>
          
            </div>
            
          </form>
            </div> 
@endsection()
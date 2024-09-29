<?php 
use App\Helpers\Helper;
?>
<style>
    .hover-color:hover{
      background: #1d4568 !important;
      border: 1px solid #1d4568 !important;
    }
        .gj-textbox-md{
      padding-left: 11px !important;
    }
    #collapse3 .row {
      display: flex;
    } 
    #toefl_select, #ielts_select, #pte_select, #oet_select{
      display:none ;
    }
    .add-visa-rejected-country, #visa_rejected_butto{
      display:none;
    }
    </style>
    
     <div class="modal" id="add_new_lead">
    
        <div class="modal-dialog" style="width:1200px;max-width:1200px;top: 50%;
        transform: translate(0,-50%);">
          <div class="modal-content" style="width:100% !important;height: 600px;">
            <div class="modal-header" style="
            height: auto;
            border: none;">
              <button type="button" class="close" data-dismiss="modal" style="
              font-size: 38px;
              color: #383838; outline-none;" >&times;</button>
              <h3 style="width:100%;text-align:center; color:#2b6699;"> Add Leads</h3>
            </div>
            <hr style="margin: 0; padding:0">
            <!-- Modal body -->
            <div class="modal-body" style="position:relative;width: 95%;overflow: auto;
            height: 400px;">
    <?php 
      $countries = DB::table('countries')->get();
    
      Helper::getAllCountry();
      ?>                     
                {{Form::open(array('url'  =>  'add-lead' ,'files'=>'true', 'class'=>'enquiry-form', 'id' =>'enquiry', 'method'=>'post'))}}     
    
                <div class="row content-color">
                 <div class="gen-detail row"> 
                      <div class="col-md-3  ">Candidate Name:  <span  class = "star"> * </span> </div>
                       <div class="col-md-3  ">
                            {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name')) !!}
                            <?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>
                        </div>
                        
                       
                <div class="col-md-3 ">Mobile :  </div>
                <div class="col-md-3 ">
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
                            <?php   $status = 
                            Helper::getAllStatus();
                            ?>
                         <select name="status" id="new_user_status" class="form-control new_user_status">
                             <option disabled selected > --Select-- </option>
@foreach($status as $s)
                         <option value="{{$s->status}}">{{$s->status}}</option>
                             @endforeach
                         </select>
                         <?php echo ($errors->first('status',"<li class='custom-error'>:message</li>")) ?>
                         <input type="text" name="date" id="date" class="form-control date" style="display:none;margin-top:5px;">
                          <input type="time" name="time" id="time" class="form-control time" style="display:none;margin-top:5px;">
                          
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
                             
                                 <?php
                                    $purpose = Helper::getPurpose();
                                 
                                 ?>
                                 <select class="form-control" name="note">
                                     <option selected="" disabled="">-Select-</option>
                                     @foreach($purpose as $p)
                                     <option value={{$p->purpose}}>{{$p->purpose}}</option>
                                     @endforeach
                                     
                                   </select>
                                   <?php echo ($errors->first('note',"<li class='custom-error'>:message</li>")) ?>
                         </div>


                         


                         <div class="col-md-2">Comment:</div>

                         <div class="col-md-4 ">
 {!! Form::textarea('comment',null, array('class'=>'form-control ','rows'=>"2", 'cols'=>"10")) !!}  </div>

<?php 
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


<div class="col-md-2 ">Source:</div>
<div class="col-md-4 ">
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





                     <div class="col-md-12 text-center my-4" >
                        {!! Form::submit('Submit', array('class'=>'btn btn-danger w-25 hover-color' , 'value'=>"Save" , 'style' => 'border-radius: 40px;
                        padding: 11px;')) !!}
                    </div>

                 </div>
                </div>
                {{Form::close()}}
            </div>
          </div>
        </div>
     </div>
           
                  
    
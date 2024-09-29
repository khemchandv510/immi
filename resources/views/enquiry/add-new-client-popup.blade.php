<style>
    #add_new_followup_client .form-group label {
        margin-bottom: 0rem;
    }

    #add_new_followup_client .form-group{
        margin-bottom: 8px;
    }
    label{
        color: #000;
    }
</style>

 <div class="modal" id="add_new_followup_client" style="padding: 0px" >

    <div class="modal-dialog" style="top: 50%;
    transform: translate(0,-50%);">
      <div class="modal-content" style="width:100% !important;border-radius: 0px;">
      
        <!-- Modal Header -->
        <div class="modal-header" style="
        height: auto;
        border: none;padding:1px;border-radius:0">
          
          <button type="button" class="" data-dismiss="modal" style="
          color: white;
    border: none;
    background: #233240;
    font-size: 31px;
    padding: 0;
    margin: 0;
    position: absolute;
    right: 5px;
    top: 0;" >&times;</button>
          <h3 style="width:100%;text-align:center; color:#ffffff;"> All Leads</h3>
          {{-- <button class="clear-all-eligibility-button" > Clear All </button> --}}
        </div>
        <hr style="margin: 0; padding:0">
        <!-- Modal body -->
        <div class="modal-body" style="position:relative;overflow: auto;
        ">
<?php 
use App\Helpers\Helper;
$data = Helper::getUpfollowData();

?>
@if(count($data) > 0)
{{Form::open(array('url' => Request::segment(1).'/take-followup',  'method' => "post"))}}
@foreach($data as $d)

<div class="form-group">
    <label for="">Name</label>


    <input type="text" class="form-control" disabled value="{{$d['name']}}" placeholder="Name">
</div>
<div class="form-group">
    <label for="">Mobile</label>
    <?php  
$phone =$d['mobile'];
$result = "*****";
$result .= substr($phone, 5, 10);

$mystring = $d['email'];
$get_sub_str = strtok($mystring, '@');
$len = strlen($get_sub_str);
$star = '';
for($i=0; $i<$len; $i++) {
    $star .= '*';
}
?>
    <input type="text" class="form-control" disabled value="{{$result}}" placeholder="Mobile">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" disabled value="{{ str_replace($get_sub_str,$star,$mystring) }}" placeholder="Email">
</div>



<div class="form-group">
    {{-- <label for="">FollowUp date</label> --}}
    <?php  
    //  $status =  DB::table('enq_status')->select('status')
    // ->orderBy('status','ASC')
    // ->get() 
    ?>
 {{-- <select name="status" id="followup_user_status" class="form-control">
     <option disabled selected > --Select-- </option>
@foreach($status as $s)
 <option value="{{$s->status}}">{{$s->status}}</option>
     @endforeach
 </select> --}}
 <?php 
//  echo ($errors->first('status',"<li class='custom-error'>:message</li>")) 
 ?>
 {{-- <input type="text" name="date" id="date2" class="form-control date" style="display:none;margin-top:5px;">
  <input type="time" name="time" id="time2" class="form-control" style="display:none;margin-top:5px;"> --}}
  
<style>
input[type="date"], input[type="time"]{
 width: 49%;
padding: 6px;
border-radius: 4px;
border: 1px solid #cbc7c7;
}
</style>
</div>

{{-- <div class="form-group">
    <label for="">Comment</label>
    <input type="textarea" class="form-control" name="comment">
</div> --}}
@endforeach

<input type="hidden" name="unique_id" value="{{$d['unique_id']}}">
<div class="form-group">
    
    <input type="submit" class="form-control"  value="Pick Up">
</div>
{{Form::close()}}
@else
<img src="{{url('public/uploads/NoRecordFound.png')}}" alt="" style="padding:50px;width:300px;height:300px">
@endif
        </div>
      </div>
    </div>
 </div>
 <script>
              
$(document).ready(function(){
  $('#followup_user_status').on("change", function(){
      
      var val = $(this).val();
      
      if((val == "Call Back Later") || (val ==  "Follow Up")){
      $('#date2').show();
      $('#time2').show();
      }
      else{
          $('#date2').hide();
      $('#time2').hide();
      }
  });
});
 </script>
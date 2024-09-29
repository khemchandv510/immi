<?php 
use App\Helpers\Helper;
use App\countries;
?>
@extends('header')
@section('student')
<script>
  $(document).ready(function(){
    $('#shortby,#range_filter').change(function(){
        $('.enquiry-agent-name').submit();
    })
  })
  </script>
<style>
   #example .fa-edit,  #example .fa-trash,  #example .fa-tasks   {
      color: #ffffff !important;
      font-size: 13px;
    }
    .btn-danger{
    background: #c51f1a !important;
    border:1px solid #c51f1a !important;
    }
    
    .btn-primary{
      background: #3490dc !important;
      border:1px solid #3490dc !important;
    }
</style>
<script>
 
$(document).ready(function(){
  var sub =  document.querySelector('#save_comment_btn');
sub.onclick = function(){

  var len = document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked').length
  
  if(len>0){
    if(len>1){
    $('#asign_comment').val('');
    }
    var sub_array = [];
    for(var i=0; i<len; i++){
      sub_array.push(document.querySelectorAll('#form_export_excell table input[type="checkbox"]:checked')[i].value);
   }
   
    $('#popo2').val(sub_array);
document.getElementById('#asign_client_form').submit();
// return false;
  }else{
    alert("Please select CheckBox");
    return false;
  }
}

  $(".asign-clien").on("click", function(){
    if (confirm("Are you sure to Asign ?")){

    
    let unique_id = $(this).attr("data-id");
    
    asign_client.style.display = "block";
    // asign_client.reset();
   
$(document).ready(function(){
                          $("#asign_client_form").submit(function (e) {
                            var agent = $('#asign_client_value').val();
                 e.preventDefault();
              var form = $(this); 
                var url = "{{url('asign-client')}}?a="+unique_id+"&agent="+agent;
             
  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

    $.ajax({
      type: "POST",
        url: url,
        dataType: "text",
        data: new FormData( this ),
        processData: false, 
        contentType: false, 
        success: function (data) {
          // asign_client.style.display = "none";
                    
var form = document.getElementById('asign_client_form');
var elemet = document.createElement("P");
elemet.innerHTML = "Client Assign Successfully!";
elemet.style.cssText="text-align:center;color:green;width: 100%;font-size: 23px;";
form.appendChild(elemet);
                    location.reload();
                  
            }
    });
  }
    );
  });
}
  });
  });

</script>
  
<style>

label {
    margin-bottom: 0rem!important;
        padding-left:0px;
}
.last-comment-p-tag{
       margin-left: 10px;!important;
       margin-right:20px;
}
.last-comment-p-tag{
    overflow: hidden;
    width:300px;
  }


.callbacklater{
  text-align: center;
    background: #2b6699;
    width: 100%;
    margin: -1px;
    padding: 9px;
    color: #fff;
}

#myModal .callbacklater{
  position: relative !important;
    left: 0 !important;
    transform: translate(0) !important;
    padding: 10px;
    border-radius: 3px;
    width: 100%;
}


.k0listenqury table {
  position: relative;
}
.k0listenqury tr th {
    background-color: #458bbb;
  z-index:2;
    color:#fff;
        padding-top: 20px;
}
@media (min-width: 768px){
.sidebar.toggled .nav-item .collapse {
    z-index: 999 !important;
}
}


.k0listenqury th {
  position: sticky;
  top:-5px;
}

.modal-open .modal{
    z-index:1000;
}
.modal{
     z-index:1000;
}
.mob-no p a{
    color:#575757;
}
.form-group {
    margin-left: 0px!important;}

</style>

<script>
  $(document).ready(function(){
      $(".add-priority").on("click", function(){
          var unique_id = $(this).attr("data-id");
          var val = $(this).val();
          // alert(val);
    $.ajaxSetup({
                                  headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                               });
  
    // if (confirm('Are you sure you want to Set Priority?')) {
      $.ajax({
      type: "get",
      url: "{{url(Request::segment(1).'/'.'add-priority')}}?a="+unique_id+"&val="+val,
      
      success: function(data){
      location.reload();
                  }
      });
  // }
      }
      );
    });
  </script>
 <!-- start navigation -->

     
 @if(Session::has('message'))
 <p class="message">{{Session::get('message')}}</p>
 <script>
 $(document).ready(function(){
     $(".message").delay(3000).slideUp(500);
 });
 </script>
    @endif
 

 <div class="container-fluid" style="padding:0">
        <div class="container-fluid "  style="padding:0">
       
       
        <script>
            $('.panel').hide();
                $(document).ready(function(){
                    
                    
                     $('.accordion22').click(function(){
                      
                        $('.panel').slideToggle("slideUp");
                      $('.accordion22').toggleClass('fa-chevron-up fa-chevron-down');
                    })
                })
            </script>
       <button class="accordion22 fa fa-chevron-down" type="button" style="position: absolute;
    right: 28px;
    background: none;
    border: navajowhite;
    font-size: 42px;
    font-weight: 500;
    z-index: 10000;top: 75px;"
    ></button> 
       
          <div class="row list-page-top-link panel" >
            {{-- @if(Session::has('message'))
            <p >{{Session::get('message')}}</p>
            @endif  --}}
                 
            <div class="col-md-12"> 
              <!-- test -->
              <ul class="enquiry-test-list">
                
                <?php 
                if( Auth::user()->usertype_status =='1'){
               $trash = DB::table('mbbsgo')->select('id')->where('status','0')->get();
                ?>  
               <a href={{  url(Request::segment(1).'/'.'trashed-hot-lead') }}> <li><i class="far fa-arrow-alt-circle-right"></i> {{$trash->count()}} Trashed   </li></a>
                <?php } 
               
               
            if( Auth::user()->usertype_status =='1'){
              ?> 
              {{-- <a href={{ url('asign-client-list') }}><li><i class="fas fa-user-tie"></i> Assigned Client  </li></a> --}}
              <?php } ?>
                
                
                
                 
             
              </ul>
              
               </div> 
          </div> 

     

 {{ Form::open(array('url'=>url(Request::segment(1).'/'.'hot-lead'), 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

 <input type="hidden" name="type" value = "1">
          <div class="row enquiry-agent-name panel">
          

          <div class="col-md-3">
            <label for="">From</label>  
            <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_from',isset($filter_date_from)?$filter_date_from:null, array('class' => 'form-control date'))  }}
                                      </div>
          
          </div>
          <div class="col-md-3">
            <label for="csad">To</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_to',isset($filter_date_to)?$filter_date_to:null, array('class' => 'form-control date' ))  }} 
                                      </div>
          </div>
         

          
          
          <div class="col-md-3">
            <label for="csad">Name, Email, Mobile....</label>  
              <div class="input-group">
                
                  <span class="input-group-addon"><i class="fas fa-school"></i></span>
                  {{  Form::text('searchbox',isset($search2)?$search2:null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                      </div>
          </div>
          <div class="col-md-12" style=" text-align: center; ">
              {{ Form::submit('Search', array('class'=>'btn btn-primary w-10', )) }}
             
              
          
              <a class="btn btn-danger w-10" href="{{url(Request::segment(1).'/'.'hot-lead') }}">Reset</a>
              

          </div>


          
</div>

  <div class="container-fluid ">
      
      
    <div class="row" style="margin-left:18px">
      
        <div class="form-group col-md-2 col-xs-2 col-sm-12 col-lg-2">
            
     <input type="hidden" name="type" value = "1">

       <label for="">Show entries</label>
          <select name="range_filter" id="range_filter" class="form-control " >
        
        @for($i=10; $i<=100; $i+=10)
        <option value="{{$i}}" <?php echo (isset($showentry) && ($showentry == $i)) ? 'selected' : ''; ?>>{{$i}}</option>

        @endfor
      </select>

      {{Form::close()}}
    </div>

    
    <div class="col-md-2 col-xs-2 col-sm-12 col-lg-2 mb-3">
      <label for="">Sort By</label>
      <?php
      $arr = array('id'=>'ID','date'=>'Date','name'=>'Name','email/phone number'=>'Email/phone number');
      ?>
       <select id="shortby" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" >
        <option >--Sort By-- </option>                     
        
 {{-- {{ Form::select('shortby',  (['' => 'Select']+$arr),'', ['class' => 'form-control','id'=>'shortby'])}} --}}
        
       @foreach ($arr as $item)
       <option value="{{$item}}" <?php echo (!empty($arr2) && ($arr2 == $item)) ? 'selected' : ''; ?>>{{$item}}</option>; 
       @endforeach
          
                            
                         </select> 

    </div>
    <!--sort by filter second end-->
    <div class="col-md-8 col-xs-8 col-sm-12 col-lg-8 " style=" text-align: end; ">
      <ul>
        @if(Auth::user()->usertype_status == 1)
        <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-file-excel-o" aria-hidden="true"></i><span  onclick ="exportTasks(event.target);" id="exportexcell" style="padding-left: 5px; padding-right: 5px;" >Excel</span></li>
        <li onclick ="" class="btn-special btn-icon btn-googleplus" id="send-sms">
          <i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target=""></i>
          <span style="padding-left: 5px; padding-right: 5px;" data-toggle="modal" data-target="#asign_client" class="">Assign</span>
        </li>
        @endif
      
      
      </ul>

    </div>
    {{-- send email end --}}
   



    </div>
<center> <h2 class="text-primary" style="margin-top:-40px;">Hot Leads List</h2></center>
<div style="overflow-x:auto; height:700px;width:100%">
  {{Form::open(array('url'=>url(Request::segment(1).'/'.'export-hot-lead'), 'method'=>'get','id'=>'form_export_excell'))}}
<table class="display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
    <thead class="k0listenqury">
    <tr>
      @if(Auth::user()->usertype_status == 1)
      <th>
        <input type="checkbox"id="select-all">
      </th>
     @endif
      <th>Source</th>      
      
      <th style="cursor:pointer;">Date</th>

        <th>Name</th>
        <th>Contact no </th>
        {{-- <th>Email</th> --}}

        <th>Country </th>

        <th>Action </th>

       
    </tr>
    </thead>
    <tbody>
        
        @foreach($get2 as $get)
        
        <tr>
          @if(Auth::user()->usertype_status == 1)
          <td><input name="id[]"  value="{{$get->unique_id}}" class="id{{$get->unique_id}}" type="checkbox" id="select-all"></td>
          @endif

<th>{{ $get->source }}</th>
        <td> {{date('d-m-Y', strtotime($get->date))}}</td>
        <td>{{$get->name}}</td>
        <td>
          <?php 
          $phone =$get->number;
          $result = "*****";
          $result .= substr($phone, 5, 10);
          if(Auth::user()->usertype_status != 1){
          echo $result;
          }else{
           echo $get->number ;
          }
          ?>
         </td>
         
         {{-- <td>
          {{ $get->email }}
         </td> --}}
        <td>
          <?php
           $con =  DB::table('countries')->select('country_name')->where('country_id', $get->country)->first();
            if(isset($con->country_name)){
             echo $con->country_name;
           }
           ?>
          
        </td>
        <td>



          <ul class="list-inline m-0">
         @if(Auth::user()->usertype_status == 1)
         
         
          <li class="list-inline-item">
            <a href="{{ url(Request::segment(1).'/'.'delete-hot-client/'.$get->unique_id) }}" title="Delete" onclick="return confirm('Are you sure to Delete this?')">
              <button type="button" class="btn btn-danger btn-sm rounded-0" > <i class="fa fa-trash"></i></button>
             </a>       
          </li>
     
         
         
         {{-- <a href="{{ url(Request::segment(1).'/'.'delete-hot-client/'.$get->unique_id) }}"> <button type="button" class="btn btn-danger">Delete Lead</button> </a>    --}}
         @else
         <li class="list-inline-item">
         <a href="{{ url(Request::segment(1).'/'.'asign-hot-client/'.$get->unique_id.'/'.Auth::user()->unique_id) }}" title="Assign" onclick="return confirm('Are you sure to Pick this?')">
           <button type="button" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-file "></i></button> </a>   
        </li>
    

         @endif
        </ul>
        </td>
        </tr>
        @endforeach
        <tr><td colspan="8">
          {{ $get2->appends(['filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($range_filter)?$range_filter:"",'shortby'=>isset($shortby)?$shortby:""])->links() }} 
        </td></tr>
    </tbody>
</table>
{{form::close()}}
</div>
<script>
function closepopup()
{
    $("#myModal").hide();
}
</script>
<!-- The Modal -->
<div id="myModal" class="modal" style="padding-top:0;">

  <!-- Modal content -->
  <div class="modal-content">
    
    <p onclick="closepopup();" class="close" style="top: 0px;
    padding: 6px 10px;
    font-size: 29px;
    color: #fff;
    background: #000;
    opacity: 1;
    right: 0px;"id="comment_close">&times;</p>
    
    <h5 class="callbacklater">Status Comment </h5>
    
    
    <hr style="margin:0;">
    <div class="modal-body">
        <p id="old_coment2" class="old-comment"> </p>
        
    @if(!empty($get2))
    
    <?php $data_id = $get2?>
    
    @foreach($data_id as $id)
    {{Form::open(array('url'=>Request::segment(1).'/'."callbacklater" , 'id' => 'form', 'data-id' => $id->unique_id, 'class' => 'form'))}}
    @endforeach
    <div class="comment-section">
      
<div>
<input type="text" class="callbacklate date" name="callbacklater" id="callbackdate">

<input type="time" class="callbacklate" name="callbacklater_time" id="callbacktime">
</div>
<div>
<input type="text" name="comment" id="comment3"  style="width:77%" placeholder="Comment">
{{Form::submit('Save', array('class' => ' w-10 my-3', 'id' =>'save_comment_button'))}}
</div>
    </div>
    </div>

{{Form::close()}} 
@else{
  <p>no record found</p>
}

@endif
<p id="resultdata"></p>
  </div>
</div>
 
 

@foreach($get2 as $id)


<div id="myModal2" class="modal">


    <div class="modal-content">
        <div class="modal-header">
      <span class="close2" style="position: absolute;
      top: 0;
      right: 0;background: #000;
    color: #fff;">&times;</span>
      <h5 class="callbacklater">Add Comment </h5>
  
    </div>
<div class="modal-body">

      @if(!empty($get2))
  <p id="old_coment" class="old-comment"> </p>
  {{Form::open(array('url'=>Request::segment(1).'/'."callbacklater" , 'id' => 'form2', 'data-id' => $id->unique_id, 'class' => 'form form-inline'))}}
  <div class="comment-sectio form-group">
  <input type="text" name="comment" id="comment2" class="form-control" placeholder="Your comments">
  <input type="hidden"  value="{{$id->unique_id}}" name="a">
  
      </div>
      <div class="form-group">
  {{Form::submit('Save', array('class' => 'btn btn-primary w-10 my-3', 'id' =>'save_comment_button'))}}
      </div>
  {{Form::close()}}
  
  @else
    <p style="margin: 21px auto;
    font-size: 25px;">No Comment</p>
  @endif
    </div>
  </div>
  </div>
  @endforeach
<script>
  var modal2 = document.getElementById("myModal2");
  var span2 = document.getElementsByClassName("close2")[0];
  span2.onclick = function() {
    modal2.style.display = "none";
    $('#myModal2').removeData();
    
    modal2.querySelector('#comment2').value="";
   
  }
  window.onclick = function(event) { 
    if (event.target == modal2) {
      modal2.style.display = "none";
    }
  }

</script>



<script>
  $(document).ready(function(){
    
    $(".add_comment").on("click", function(){
      

      var unique_id = $(this).attr("data-id");
    
                  var url = "{{url(Request::segment(1).'/'.'callbacklater_old_comment')}}?a="+unique_id;
               $.ajaxSetup({
                                  headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                               });
  $.ajax({
        type: "GET",
          url: url,
          dataType: "text",
          success: function (data) {
  document.getElementById('old_coment').innerHTML ="";
            var json_response = JSON.parse(data);
            var len = json_response.length;
            document.getElementById('old_coment').innerHTML+='';  
            for(var i=0; i<len; i++){
              if(json_response[i].comment != null){
  
                if(json_response[i].image == null){
                  var user_image = "<?php echo url('public/uploads/image/default_user.jpg') ?>" ;
                }
              document.getElementById('old_coment').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="'+user_image+'" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
           
                          }  } 
            
              document.querySelectorAll('.old-comment').forEach((a=>{
                 a.scrollTop = 10000;
               }))
            
  }
      });
    
    }
      );
    });
    
    
    </script>

<script>
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
    
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
  
<script>
    

$(document).ready(function(){
  
  $(".update_status").on("click", function(){
    var unique_id = $(this).attr("data-id");
  
                var url = "{{url(Request::segment(1).'/'.'callbacklater_old_comment')}}?a="+unique_id;
             $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
$.ajax({
      type: "GET",
        url: url,
        dataType: "text",
        success: function (data) {
          
document.getElementById('old_coment2').innerHTML ="";
          var json_response = JSON.parse(data);
          var len = json_response.length;
          document.getElementById('old_coment2').innerHTML+='';  
          for(var i=0; i<len; i++){
            if(json_response[i].comment != null){
              
              if(json_response[i].image == null){
                var user_image = "<?php echo url('public/uploads/image/default_user.jpg') ?>" ;
              }
            document.getElementById('old_coment2').innerHTML+='<ul class="commentList"><li><div class="commenterImage"> <img src="'+user_image+'" /></div><div class="commentText"><p class="">'+json_response[i].comment+'</p> <span class="date sub-text">on '+json_response[i].date+'</span> <span class="date sub-text" style="position: absolute;right: 23px;">'+json_response[i].agent_name+' </span></div></li>';
          
            }
          }
          document.getElementById('old_coment2').innerHTML+='</ul>'  ;
          document.querySelectorAll('.old-comment').forEach((a=>{
               a.scrollTop = 10000;
             }))
             
                  }
    });
  }
    );
  });


  
       
  $(document).ready(function(){
    var index = $('.update_status').prop('selectedIndex'); 
    $(".update_status").on("change", function(){
         unique_id = $(this).attr("data-id");
         val = $(this).val();
if((val == "Call Back Later") || (val ==  "Follow Up")){
 
  
  $.ajaxSetup({
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure you want to update this with date time')) {
    modal.style.display = "block";
  $('#callbackdate').show();
  $('#callbacktime').show();
    $.ajax({
    type: "POST",
    url: "{{url(Request::segment(1).'/'.'update_status')}}?id="+val+"&a="+unique_id,
    success: function(data){
    // $.each(data, function(key, value) {
                            $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
                        // });
        } });}
    else{

      modal.style.display = "none";
      $('#callbackdate').hide();
  $('#callbacktime').hide();
  $('.update_status').prop('selectedIndex',index);
    }
  }
else{
  $('#callbackdate').hide();
  $('#callbacktime').hide();
  $.ajaxSetup({
                         headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }                             });
if (confirm('Are you sure you want to update this?')) {
  modal.style.display = "block";
    $.ajax({
    type: "POST",
    url: "{{url(Request::segment(1).'/'.'update_status')}}?id="+val+"&a="+unique_id,
    success: function(data){
    if(data == "Please Add Client Email First"){
      alert('Please Add Client Email First');
    }
                        // $.each(data, function(key, value) {
                            $('.update_status').append('<option value="'+ this.disposition +'">'+ this.disposition +'</option>');
                        // });
                       }
    });
    }
    else{
      $('.update_status').prop('selectedIndex',index);
    }
}
}
    );
  });

</script>

<script>
  


$(document).ready(function(){
  $(".add_comment22").on("click", function(){
    // if(confirm('Are you sure to add comment ?')){
     ppppp = $(this).attr("data-id");
    modal2.style.display = "block";
  })
})
</script>

<script>
  $(document).ready(function(){
                          $("#form2").submit(function (e) {
                            var comment = $('#comment2').val();
                            var callbackdate = $('#callbackdate').val();
                            var callbacktime = $('#callbacktime').val();
                            // alert(callbacktime);
                 e.preventDefault();
              var form = $(this); 
              
                let url = "{{url(Request::segment(1).'/'.'callbacklater')}}?a="+ppppp+"&comment="+comment+"&callbacktime="+callbacktime+"&callbackdate="+callbackdate;
                $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                          var   currentRequest  =   jQuery.ajax({
      type: "post",
        url: url,
        success: function (data) {
          document.getElementById('old_coment').innerHTML+='</ul>'
var form = document.getElementById('form2');
var elemet = document.createElement("P");
elemet.innerHTML = "Comment Added!";
elemet.style.cssText="text-align:center;color:green;width: 100%;font-size: 23px;";
form.appendChild(elemet);


          location.reload();
                    // modal2.style.display = "none";
                   } 
          });
   
   }
    );
    // }
  });

</script> 
  
  <script>
  
   
 function exportTasks(_this) {
    let myarr = [];
    $("input[type='checkbox']:checked").each(function(){
         myarr.push($(this).val());
    });
    if(myarr.length == 0){
        alert("Please Select to Download");
        return false;
    }else{
      $(document).ready(function(){
  
     $("#form_export_excell").submit();
  
});
        var unique_ids = myarr.toString();
        let _url = $(_this).data('href');
        window.location.href = _url;
       
    }
     
   }
   
   
   
</script>

  <script>
                    document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                      }
                    }
                    </script>

   <script>

</script>

  @if ($message = session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
<div class="modal" id="send-email">
    <div class="  ">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Email</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{route('send-mail')}}">
            {{csrf_field()}}
         <div class="row">
           <div class="col-md-12">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input class="form-control" type="text" name ="to" placeholder="To">
               
                                      </div>
                                    </div>
               <div class="col-md-12">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-envelope-square"  aria-hidden="true"></i></span>
                  <input class="form-control" type="text"  name="subject" placeholder="Subject">
                  
                                      </div>
           </div>
           <div class="col-md-12" style="margin-top:10px;">
              <div class="input-group">
                  <textarea class="form-control" rows="10" id="comment" name="message" placeholder="Message">
                   
                  </textarea>
              </div>
           </div>
           <div class="col-md-12 text-center" style="margin-top:10px;">
             <input type="submit" value="Send" class="btn btn-danger w-10">
           </div>
           </div>
         </div>
        </form>
        </div>
      </div>
 <script>
function scrollWin() {
  window.scrollTo(10, 10);
}
</script>
<script>
        $(document).ready(function(){
    $(".delete").on("click", function(){
        var unique_id = $(this).attr("data-id");
        // var val = $(this).val();


  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure you want to Delete this?')) {
    $.ajax({
    type: "get",
    url: "{{url(Request::segment(1).'/'.'delete')}}?a="+unique_id,
    
    success: function(data){
    alert('Record Delete Successfully '); 
    location.reload();
                }
    });
}
    }
    );
  });
   </script> 


@endsection
<!--sms-->
<div class="modal" id="student-sms">
  <div class="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send SMS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
           <div class="col-md-12">
                <p>Title</p>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                 <select id="Short by" name="shortby" type="text" value="" class="form-control" placeholder="Shortby" .required="">--&gt;
                                <option type="checkbox" value="Short">-- Select Template --</option>
                               <option value="date">Date </option>
                               <option value="name">Name</option>
                               <option value="email/phone number">Email/phone number</option>
                               <option value="country">Country</option>
                               <option value="course">Course</option>
                               <option value="source">Source</option>
                               <option value="intake">Intake</option>
                           </select>
               
                                      </div>
                                    </div>
          
           <div class="col-md-12" style="margin-top:10px;">
              <div class="input-group">
                  <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Message">                   
                  </textarea>
              </div>
           </div>
           <div class="col-md-12 text-center" style="margin-top:10px;">
             <input type="submit" value="Send" class="btn btn-danger w-10">
           </div>
           </div>
      </div>

      <!-- Modal footer -->
   

    </div>
  </div>
</div>


<!--Assign student-->
<div class="modal" id="asign_studend">
  <div class="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      

    
    </div>
  </div>
</div>





<!-- start asign client modal-->
<div id="asign_client" class="modal" style="padding-top:5%">

<!-- Modal content -->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
<!--  <span class="asign-client-close" style="position: absolute;-->
<!--  right: 0;-->
<!--  top: 0;background: #000;-->
<!--color: #fff;">&times;</span>-->
  
  <h5 class="callbacklater">Asign Client </h5>
  <hr>
    </div>
    <div class="modal-body">
  <?php 
                  if( Auth::user()->usertype_status =='1'){
                    ?>
  {{Form::open(array('url'=>Request::segment(1).'/'."asign-hot-client" , 'id' => 'asign_client_form', 'class' => 'form', 'method' => 'GET'))}}
     <div class="comment-section">
<?php
$agent  = DB::table('users')->where('status',1)->get();
?>
<label style="text-align: left"> <strong> Select Agent Name:  </strong> </label>
<select name="asign_client" id="asign_client_value" class="form-control">
<option disabled selected> --Agent-- </option>
@foreach($agent as $a)
<option value="{{$a->unique_id}}">{{$a->name}}</option>
@endforeach
</select>
<label style="text-align: left;margin-top:10px"> <strong> Comment: </strong> </label>
<input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
  </div>
  <div style="text-align: center">
    <input type="hidden" name="id" id="popo2">
    {{-- <input type="button" id="save_comment_btn"> --}}
{{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}}
</div>
{{Form::close()}}
<hr>

<?php } elseif(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
 ?>
  {{Form::open(array('url'=>Request::segment(1).'/'."asign-client" , 'id' => 'asign_client_form', 'class' => 'form'))}}
     <div class="comment-section">
<?php
$agent  = DB::table('users')->where('status',1)->where('company_id',Auth::user()->unique_id)->get();
?>
<label style="text-align: left"> <strong> Select Agent Name:  </strong> </label>
<select name="asign_client" id="asign_client_value" class="form-control">
<option disabled selected> --Agent-- </option>
@foreach($agent as $a)
<option value="{{$a->unique_id}}">{{$a->name}}</option>
@endforeach
</select>
<label style="text-align: left;margin-top:10px"> <strong> Comment: </strong> </label>
<input type="text" name="asign_comment" id="asign_comment" placeholder="Add Comment" class="form-control">
  </div>
  <div style="text-align: center">
    <input type="hidden" name="id" id="popo2">
    {{-- <input type="button" id="save_comment_btn"> --}}
{{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_btn'))}}
</div>
{{Form::close()}}
<hr>

<?php 
} ?>

</div>
</div>
</div>
<!-- end of asign agent Modal -->


{{-- modal for import student --}}
<div class="modal" id="import_student">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Import Students List</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                               
{{--                     
                    
                                 
                              @if(Session::has('message'))
                              <p >{{ Session::get('message') }}</p>
                              @endif
                               --}}
                    
                              <form method='post' action={{url(Request::segment(1).'/'.'import-client')}} enctype='multipart/form-data' >
                                {{ csrf_field() }}
                                <div class="custom-file">
                                  <input type="file" class="custom-file-inpu" id="customFil" name="import_client">
                                  <input type="hidden" name="conversion"  value="1">
                                  
                    </div>
                              
                                    <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" data-ng-submit="modal" value="Submit" name="submit">
                    
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>      
                          </div>
                        </div>
                      </div>


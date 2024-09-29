@extends('header')
@section('calendar')
<?php 
use App\Helpers\Helper;
use App\enquiries;
use App\users;


// define("GREETING","Hello you! How re you today?");
// $GREETING ="gdfg";
// echo constant("GREETING");

?>

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
   @endif
<style>
  .task-status{
    padding: 4px 7px;
    color: #fff;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
  }
  .pending{
    background: #cd4343;
  }
  .complete{
background: #38871e

  }
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
    tr,th,td{
      text-align: center;
      max-width: 300px;
    }
</style>
<script>
  $(document).ready(function(){
    $('#shortby,#range_filter').change(function(){
        $('.enquiry-agent-name').submit();
    })
  })

  </script>
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
    @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6 )
       <form action="{{ url(Request::segment(1).'/add-task') }}" method="POST">
        @csrf
          <div class="row list-page-top-link panel"  style="margin: 24px;
          padding: 12px;
          box-shadow: 1px 0px 5px 1px #d1d1d1;
          margin-top: 80px;">
          
    
  
     
       


            @if(Request()->segment(2) == 'edit-task')
            <div class="col-md-11 col-xs-11 col-sm-11 col-lg-11 " style=" text-align: end; ">
              <a href={{ url(Request::segment(1).'/task-management') }}>
              <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-arrow-left" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px;">Add New Task</span></li>
            </a>
          </div>
          @endif
        <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"></div>
        



            <div class="col-sm-12">
          <?php 

if(Request()->segment(2) == 'edit-task'){
  ?><h2>Edit Task</h2>
  
    <?php }else{ ?>
            <h2>Add Task</h2>
            <?php } ?>
            </div>







{{-- 
            <div class="col-md-4">
              <label for="">From</label>  
              <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    {{  Form::text('filter_date_from',isset($filter_date_from)?$filter_date_from:null, array('class' => 'form-control date'))  }}
                                        </div>    

            </div> --}}

            <div class="col-sm-12">
                <label for="">Task Details(Comments)</label>
                
                <textarea name="task_details" class="form-control" style=" resize: none;" placeholder="Task Details">{{ $task?$task:'' }}</textarea>
                <br>
            </div>
            
            <div class="col-sm-4">
                <label for="">Due Date</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<input type="text" name="due_date" class="form-control date" value={{ $due_date?date('d/m/Y', strtotime($due_date)):date('d/m/Y') }} >
            </div>
            </div>
            <div class="col-sm-4">
                <label for="">Is you task related to client?</label>
               
                  
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  <datalist id="suggestions"   >
                    <?php 

// $a = new enquiries;
// $a->select('unique_id', 'name','id');
// $a->where('delete_client',1);
//   $a->orderBy('id','DESC');


$a = DB::table('enquiries');
$a->select('enquiries.unique_id', 'enquiries.name','enquiries.id');

if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){

  $a->leftjoin('users', 'enquiries.agent_unique_id', '=', 'users.unique_id');
$a->where('users.company_id', Auth::user()->unique_id) ;

}
elseif(Auth::user()->usertype_status == 4){
  $a->where('agent_unique_id', Auth::user()->unique_id) ;
}else{
  
}
$a->where('delete_client',1);
$a->orderBy('id','DESC');
$c = $a->get();


                // $a->chunk(100, function($users){
                    foreach($c as $client){
                      ?>
 <option value="{{ 'IC'.$client->id }}" >{{$client->name}}</option>
<?php
    //  }
};
?> 
</datalist>
  <input  autoComplete="on" list="suggestions" name="client_unique_id" class="form-control" placeholder="Search Client" value="{{ $client2?'IC'.enquiries::select('id')->where('unique_id',$client2)->first()->id:''  }}" /> 
                </div>
      
            </div>
  
            <div class="col-sm-4">
                <label for="">Assign To</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<select name="assigned_to" id="" class="form-control">
    <option value=""selected >Select</option>
    @foreach ($agent_id2 as $a)
        <option value="{{ $a->unique_id }}" <?php echo(!empty($assigned_to) && ($assigned_to == $a->unique_id))?'selected':''; ?> >{{ $a->name }}</option>
    @endforeach
</select>
  </div>
            </div>



  <div class="offset-sm-11">  
    <br>
    <input type="hidden" name="id" value = "{{ $id }}">
    
    @if(Request()->segment(2) == 'edit-task')
    <input type="submit"  value="Edit Task">
    @else
    <input type="submit"  value="Add Task">
    @endif
            </div>


</div> 
  

  
  
       
     
</form>
@endif
</div>
</div>
 {{ Form::open(array('url'=>url(Request::segment(1).'/'.'task-management'), 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

 <input type="hidden" name="type" value = "1">
          <div class="row enquiry-agent-name panel" style="margin: 24px;
          padding: 12px;
          box-shadow: 1px 0px 5px 1px #d1d1d1;
          margin-top: 80px;">

<div class="col-sm-12">
<h3>Filter Task</h3>
</div>
          <div class="col-md-4">
            <label for="">From</label>  
            <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_from',isset($filter_date_from)?$filter_date_from:'', array('class' => 'form-control date'))  }}
                                      </div>
                                   
          </div>
          <div class="col-md-4">
            <label for="csad">To</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_to',isset($filter_date_to)?$filter_date_to:null, array('class' => 'form-control date' ))  }} 
                                      </div>
          </div>
          <div class="col-md-4">
            <label for="csad">Select Employee</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                  {{-- {{  Form::hidden('id',Auth::user()->employee_id )  }} 
              @if( Auth::user()->usertype_status =='1') --}}
              {{-- @dd($agent_id2, $agent_id) --}}
              <select  class="form-control" name="agent_id">
                <option value="">select</option>
                @foreach($agent_id2 as $s )
            <option value="{{$s->unique_id}}" <?php echo (!empty($agent_id) && ($agent_id == $s->unique_id))  ? 'selected' : ''; ?>>{{$s->name}}</option>
              @endforeach
            </select>
{{-- @endif  --}}
                                      </div>
          </div>

          <div class="col-md-4">
            <label for="csad">Task Status</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-align-justify"></i></span>
                  <?php
                  $enq_status  =  [''=>'slected',0=>"Pending",1=>"Completed"];
                 ?>
              

                 {{ Form::select('task_status',$enq_status,$status, array('class'=>"form-control")) }}
                </div>
          </div>
          <div class="col-md-4">
            <label for="csad">Counter Check</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
                  <?php 
                   $enq_purposes = [''=>'slected',2=>"Pending",1=>"Completed"];
                    ?>
                   
                    {{ Form::select('review',$enq_purposes,$review, array('class'=>"form-control")) }}
                                      </div>
        </div>
          <div class="col-md-4">
            <label for="csad">Name, Email, Mobile....</label>  
              <div class="input-group">
                
                  <span class="input-group-addon"><i class="fas fa-school"></i></span>
                  {{  Form::text('searchbox',isset($search2)?$search2:null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                      </div>
          </div>
          <div class="col-md-12" style=" text-align: center; ">
              {{ Form::submit('Search', array('class'=>'btn btn-primary w-10', )) }}
          
              
              
              <a class="btn btn-danger w-10" href="{{url(Request::segment(1).'/'.'task-management') }}">Reset</a>
              

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
        
 
        
       @foreach ($arr as $item)
       <option value="{{$item}}" <?php echo (!empty($arr2) && ($arr2 == $item)) ? 'selected' : ''; ?>>{{$item}}</option>; 
       @endforeach
          
                              
                         </select> 



    </div>
  



    </div>
<center> <h2 class="text-primary" style="margin-top:-40px;">Task List</h2></center>
<div style="overflow-x:auto; height:700px;width:100%">
  {{Form::open(array('url'=>url(Request::segment(1).'/'.'task-export'), 'method'=>'get','id'=>'form_export_excell'))}}
<table class="display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="" cellspacing="0" width="100%">
    <thead class="k0listenqury">
    <tr>
   
     <th>S No.</th>
      <th> Client Name </th>
      <th>Task Details</th>
        <th>Due Date</th>
        <th>Assigned By </th>
        <th>Assigned To </th>
        <th>Task Status</th>
        <th>Task Completed Comment</th> 
        <th> Counter Check </th>
        @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6 )
        <th> Action </th>
        @endif
    </tr>
    </thead>
    <tbody>
        <?php 
      if(isset($_GET['page'])){
  $a =  $_GET['page'] * 10;
        }else{
          $a = 10;
        }
        $i = $a-9;

        ?>
        @foreach($get2 as $get)
        <tr>
          <td>{{ $i++ }}</td>
          <td> {{ $get->belonged_client?enquiries::getClientName($get->belonged_client)->name. ' (IC'.enquiries::getClientName($get->belonged_client)->id. ')':'' }} </td>

           <td>{{ $get->task }}</td>
        <td>{{ $get->due_date }}</td>         
        
        <td>{{$get->assigned_by?users::getuser($get->assigned_by)[0]->name:''}}</td>
        <td>  
          @if(!empty($get->assigned_to) && isset($get->assigned_to))
          {{ users::getuser($get->assigned_to)[0]->name }}
        @endif
        </td>
<td>
  
<a class="collapse-item update-status" data-toggle="modal" data-target="#add_new_followup_client"  data-id={{ $get->id }}>
  @if($get->task_status == 0)
 {!! "<span  class='task-status pending'>Pending</span>" !!}
 @else
 {!! "<span  class='task-status complete'>Completed</span>" !!}
</a>
@endif

</td>
<td>{{ $get->task_completed_comment }}</td>
<td>
  @if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6 )
  @if($get->review == 1)
  <input type="checkbox" checked class="update-review" value="{{ $get->id }}" onchange="return confirm('Are yuo confirm to update this?')">
  @else
  <input type="checkbox" class="update-review" value="{{ $get->id }}"  onchange="return confirm('Are yuo confirm to update this?')">
  @endif
@else 
@if($get->review == 0)
{!! "<span  class='task-status pending'>Pending Review</span>" !!}
@else 
{!! "<span  class='task-status complete'>Done</span>" !!}
@endif
@endif
</td>
@if(Auth::user()->usertype_status == 1 || Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6 )
<td>
  {{-- <a href="{{url(Request::segment(1).'/edit-task/'.$get->id)}}">  <span class="fa fa-edit"> </a> </span> --}}
  
  {{-- <a class="fa fa-trash" href="{{url(Request::segment(1).'/delete-task/'.$get->id)}}" onclick="return confirm('Are you sure to delete this?')"></a> --}}
  
  <li class="list-inline-item">
    <a href="{{ url(Request::segment(1).'/'.'edit-task/'.$get->id) }}" title="Edit">
      <button type="button" class="btn btn-primary btn-sm rounded-0" > <i class="fa fa-edit"></i></button>
     </a>       
  </li>  
  
  <li class="list-inline-item">
    <a href="{{ url(Request::segment(1).'/'.'delete-task/'.$get->id) }}" title="Delete" onclick="return confirm('Are you sure to Delete this?')">
      <button type="button" class="btn btn-danger btn-sm rounded-0" > <i class="fa fa-trash"></i></button>
     </a>       
  </li>


</td>
    @endif  
        </tr>
        @endforeach

        <tr><td colspan="14" style="hover:background:red">
          
          {{ $get2->appends(['type'=>isset($type)?$type:1,'filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'agent_id'=>isset($agent_id)?$agent_id:"",'purpose_of_query'=>isset($purpose_of_query)?$purpose_of_query:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($range_filter)?$range_filter:"",'shortby'=>isset($shortby)?$shortby:""])->links() }} 
          
          
        </td>
      </tr>
        
    </tbody>
</table>
{{form::close()}}
</div>


 
{{-- $2y$10$iSJbBAC9X5xR2VfaTD7KP.GkdLSvpgBz93ozCssbiHQ5zEyt97UxS --}}






<div class="modal" id="add_new_followup_client" style="padding: 0px" >
  <div class="modal-dialog" style="top: 50%;
  transform: translate(0,-50%);">
    <div class="modal-content" style="width:100% !important;border-radius: 0px;">
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
  top: -6px;height: 0;" >&times;</button>
        <h3 style="width:100%;text-align:center; color:#ffffff;"> Complete Task</h3>
      </div>
      <hr style="margin: 0; padding:0">
     
      <div class="modal-body" style="position:relative;overflow: auto;">
        <form action="{{ url(Request::segment(1).'/update-task-status') }}" method="post">
          @csrf
        <div class="col-sm-12">
          <label for="">Comments </label>
          <textarea name="task_details" class="form-control" style=" resize: none;" required></textarea>
          <select name="processing" id="processing" style="display: block;
    width: 100%;padding: 8px;margin: 6px 0px;    font-size: 16px;">
              <option value="0">Pending</option>
              <option value="1">complete</option>
          </select>
          <input type="hidden" id="get_id" name="id">
          
          <input type="submit" class="btn btn-primary w-10">
      </div>
    </form>
      </div>
    </div>
  </div>
</div>


<script>
   document.querySelectorAll('.update-status').forEach(element => {
 element.addEventListener('click', function(){
  document.getElementById('get_id').value= element.getAttribute('data-id'); 
 })  
   })
 
</script>


<script>
  $(document).ready(function(){
    $('.update-review').change(function(){
     



      (async () => {
  const rawResponse = await fetch("{{ url(Request::segment(1).'/update-task-review') }}", {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    body: JSON.stringify({id: $(this).val()})
  });
  const content = await rawResponse.json();
window.location.href="";
  
})();




    });
  })
</script>


@endsection



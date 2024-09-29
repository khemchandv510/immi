@extends('header')
@section('add-leads')
<?php
use App\enquiries;
use App\Helpers\Helper;

?>


 <style>
    #example .fa-edit,  #example .fa-trash,  #example .fa-tasks   {
      color: #ffffff !important;
      font-size: 13px;
    }
    
    .btn-danger{
    border:1px solid #c51f1a !important;
    }
    
    .btn-primary{
      background: #3490dc !important;
      border:1px solid #3490dc !important;
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
<br>
 {{ Form::open(array('url'=>url(Request::segment(1).'/'.'quotation-search'), 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

 <input type="hidden" name="type" value = "1">
          <div class="row enquiry-agent-name panel">
          <div class="col-md-2">
            <label for="">Quotation From </label>  
            <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_from',isset($filter_date_from)?$filter_date_from:null, array('class' => 'form-control date'))  }}
                                      </div>
                                   
          </div>
          <div class="col-md-2">
            <label for="csad">Quotation To</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('filter_date_to',isset($filter_date_to)?$filter_date_to:null, array('class' => 'form-control date' ))  }} 
                                      </div>
          </div>

          <div class="col-md-2">
            <label for="">Expiry Quotation From </label>  
            <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('expiry_date_from',isset($expiry_date_from)?$expiry_date_from:null, array('class' => 'form-control date'))  }}
                                      </div>
                                   
          </div>
          <div class="col-md-2">
            <label for="csad">Expiry Quotation To</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                  {{  Form::text('expiry_date_to',isset($expiry_date_to)?$expiry_date_to:null, array('class' => 'form-control date' ))  }} 
                                      </div>
          </div>


          <div class="col-md-2">
            <label for="csad">Select Employee</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                  {{  Form::hidden('id',Auth::user()->employee_id )  }} 

              @if( Auth::user()->usertype_status =='1')
                  <?php
                   $agent_id2 = Helper::getTotalEmployee();
                         ?>
              
              <select  class="form-control" name="agent_id">
                <option value="">select</option>
                @foreach($agent_id2 as $s )
            <option value="{{$s->unique_id}}" <?php echo (!empty($agent_id) && ($agent_id == $s->unique_id))  ? 'selected' : ''; ?>>{{$s->name}}</option>;
              @endforeach
            </select>
@endif 
                                      </div>
          </div>

          <div class="col-md-2">
            <label for="csad">Total Price</label>  
              <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-align-justify"></i></span>
              

<?php  
$totalarr = ['1 and 10000', '10001 and 20000', '20001 and 30000', '30001 and 40000', '40001 and 50000' ];
?>
              <select id="total" name="total"  class="form-control">
                <option value="" selected disabled>Select</option>
                @foreach($totalarr as $ttl)
                <option value="{{ $ttl }}" {{ (!empty($total) && ($total == $ttl)) ? 'selected' : '' }}>{{ $ttl }}</option>
                @endforeach
                    </select>
              
                 
                </div>
          </div>
        


          <div class="col-md-4">
            <label for="csad">Id, Name, Project Name, Description....</label>  
              <div class="input-group">
                
                  <span class="input-group-addon"><i class="fas fa-school"></i></span>
                  {{  Form::text('searchbox',isset($search2)?$search2:null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                      </div>
          </div>
          <div class="col-md-4" style=" text-align: center; ">
            <label for="csad"></label>  
              <div class="input-grou">
                
                  <span class="input-group-addon"><i class=""></i></span>
              {{ Form::submit('Search', array('class'=>'btn btn-primary w-10', )) }}
             <!--   {{ Form::submit('Reset', array('url'=>'quotation-search', 'class' => 'enquiry-agent-name btn btn-danger w-10')) }} -->
              

              <a class="btn btn-danger w-10" href="{{url(Request::segment(1).'/'.'quotation-search') }}">Reset</a>
              </div>

          </div>


          
</div>
<br>
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
  </div>
























    
<h2 class="text-primary"style="text-align:center;">Quotation List</h2>
<div style="overflow-x:auto; height:700px;width:100%">
  
<table class="display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
    <thead class="k0listenqury">
    <tr>
      {{-- <th> All <br><input type="checkbox"id="select-all"> 
      </th> --}}
     <th>#</th>
      <th> Client Name </th>
      <th >Project Name</th>
        <th> Item </th>
        <th> Description </th>
        <th>Quotation Date </th>
        <th>  Quotation Expiry Date</th>
        <th>Price </th>
        <th>  Tax</th>
        <th> Total</th>
        {{-- <th>Payment Method </th> --}}
        <th>Currency</th>
        {{-- <th>Status</th> --}}
        <th>Agent</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($quotationList as $get)
        <tr>
          
          <?php  $enq = enquiries::select('name', 'id')->where('unique_id',$get->customer_unique_id)->first();  ?>
          <td>{{ "IC".$enq->id }}</td>
             <td>{{ $enq->name }}</td>

        <td>{{$get->project_name}}</td>            
        <td> {{$get->item_name}}</td>
        <td>{{$get->description}}</td>
        <td>{{ $get->quote_date }}</td>
        <td>{{$get->quote_expire_date}}</td>            
        
        <td>{{ $get->price }}</td>
        <td>{{$get->tax}}</td>
        <td>{{ $get->total }}</td>
        {{-- <td>{{$get->payment_method}}</td> --}}
        <td> {{$get->currency}}</td>
        <td>{{ $get->employee_name }}</td>
        {{-- <td> --}}
          @php 
//           if($get->paid_status==1){
// echo 'Paid';
//           }
//           else{ echo 'Pending'; }
          
          @endphp 
          {{-- </td> --}}
        
        <td>
          <ul class="list-inline m-0">
           
          
          
          
          <li class="list-inline-item">
             <form action="{{ route('update-payment-status') }}" method="post" onsubmit="return confirm('Are you sure to update payment satus?')">
@CSRF

<input type="hidden" name="unique_id" value="{{ $get->customer_unique_id }}">
<input type="hidden" name="id" value="{{ $get->id }}">
<button data-toggle="modal" data-target="" class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Update Payment Status"><i class="far fa-eye-slash"></i></button>
</form>
           </li>



            <li class="list-inline-item">
                <form action="{{ route('update-quotation') }}"  method="GET">
                    @CSRF
                    <input type="hidden" name="unique_id" value="{{ $get->customer_unique_id }}">
                    <input type="hidden" name="id" value="{{ $get->id }}">
                <button data-toggle="modal" data-target="" class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Update Quotation"><i class="fa fa-edit"></i></button>
            </form>
            </li>



            <li class="list-inline-item">
              <form action="{{ route('delete-payment-status') }}" method="post" onsubmit="return confirm('Are you sure to delete this?')">
                @CSRF
                <input type="hidden" name="unique_id" value="{{ $get->customer_unique_id }}">
<input type="hidden" name="id" value="{{ $get->id }}">
                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
              </form>
            
            </li>
        </ul>  </td>
    </tr>
        @endforeach
    </tbody>
</table>



 
{{ $quotationList->appends(['type'=>isset($type)?$type:1,'filter_date_from'=>isset($filter_date_from)?$filter_date_from:"",'filter_date_to'=>isset($filter_date_to)?$filter_date_to:"",'agent_id'=>isset($agent_id)?$agent_id:"",'purpose_of_query'=>isset($purpose_of_query)?$purpose_of_query:"",'searchbox'=>isset($searchbox)?$searchbox:"",'range_filter'=>isset($range_filter)?$range_filter:"",'shortby'=>isset($shortby)?$shortby:""])->links() }} 




@endsection
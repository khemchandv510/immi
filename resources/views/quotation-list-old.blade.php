@extends('header')
@section('add-leads')
<?php
use App\enquiries;

?>
 <style>
    #example .fa-edit,  #example .fa-trash,  #example .fa-tasks   {
      color: #ffffff !important;
      font-size: 13px;
    }
    
    .btn-danger{
    background: #c51f1a !important;
    border:1px solid #c51f1a !important;
    
  }
    </style>
    <br><br>
<h2 class="text-primary"style="text-align:center;">Quotation List</h2>
<div style="overflow-x:auto; height:700px;width:100%">
  
<table class="display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
    <thead class="k0listenqury">
    <tr>
      <th><input type="checkbox"id="select-all">
      </th>
     
      <th> Client Name </th>
      <th >Project Name</th>
        <th> Item </th>
        <th> Description </th>
        <th>Quotation Date </th>
        <th>  Quotation Expiry Date</th>
        <th>Price </th>
        <th>  Tax</th>
        <th> Total</th>
        <th>Payment Method </th>
        <th>Currency</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($quotationList as $get)
        <tr>
          <td><input name="id[]"  value="{{$get->customer_unique_id}}" class="id{{$get->customer_unique_id}}" type="checkbox" id="select-all"></td>
             <td>{{ enquiries::where('unique_id',$get->customer_unique_id)->first()->name }}</td>

        <td>{{$get->project_name}}</td>            
        <td> {{$get->item_name}}</td>
        <td>{{$get->description}}</td>
        <td>{{ $get->quote_date }}</td>
        <td>{{$get->quote_expire_date}}</td>            
        
        <td>{{ $get->price }}</td>
        <td>{{$get->tax}}</td>
        <td>{{ $get->total }}</td>
        <td>{{$get->payment_method}}</td>
        <td> {{$get->currency}}</td>
        
       
        <td>
          @php 
          if($get->paid_status==1){
echo 'Paid';
          }
          else{ echo 'Pending'; }
          
          @endphp </td>
        
        <td><ul class="list-inline m-0">
           
            <li class="list-inline-item">
                <form action="{{ route('update-quotation') }}"  method="GET">
                    @CSRF
                    <input type="hidden" name="unique_id" value="{{ $get->customer_unique_id }}">
                <button data-toggle="modal" data-target="" class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
            </form>
            </li>
            <li class="list-inline-item">
                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
            
            </li>
        </ul>  </td>
    </tr>
        @endforeach
    </tbody>
</table>



 
 




@endsection
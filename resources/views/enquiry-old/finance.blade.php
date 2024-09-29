

<div role="tabpane" class="tab-pane " id="finance">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Payment Details    </h4>
<hr>


<ul class="nav nav-tabs active-tab-payment" role="tablist" >
@if($get_finace_detail->count() > 0) 

@foreach($get_finace_detail as $get)

        <li class="nav-item">
        <a class="nav-link" href="#get_fin{{$get->id}}" role="tab"
        data-toggle="tab">{{$get->payment_for}} </a>
        </li>
        
        @endforeach

        <li class="nav-item">
                <a class="nav-link" data-target="#fincial_add" role="tab"
                data-toggle="modal" > Add More.. </a>
                </li>
               
    
                @else   
<li class="nav-item">
    <a class="nav-link" data-target="#fincial_add" role="tab"
    data-toggle="modal" > Add Payment Receipt </a>
    </li>
    
@endif

</ul>


@if($get_finace_detail->count() > 0)

<div class="tab-content content-style my-4 tab-content-payment">
@foreach($get_finace_detail as $e) 

<div role="tabpane" class="tab-pane " id="get_fin{{$e->id}}">

    <div style="text-align: right"> 
        <button data-toggle="modal" data-target=".payment_edit{{$e->id}}" class="edit-text">Edit</button>
        {{Form::open(array('url'=>'delete-payment', "onsubmit" => "return confirm('Are you sure to delete $e->payment_for ?')",  "method"=>"post"))}}
        <input type="hidden" name="payment_for" value="{{$e->payment_for}}">
    <input type="hidden" name="id" value="{{$e->id}}">

        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">            
<button type="submit" class="delete-text">Delete</button>
{{Form::close()}}
</div>


<table class="table add-financial-detail-parent">
<tr>
 <th>
        Payment By</th>
<td>{!! $e->payment_by !!} </td>      
</tr>

<tr>
  <th>Paid Amount</th>
  <td>  {!! $e->paid_amount !!}</td>
</tr>

<tr>
<th >
Paid Date   </th>
<td>   {!! $e->paid_date !!}</td>
</tr>

<tr>
<th>Receipt No</th>
<td>{!! $e->receipt_no !!} </td>
</tr>


<tr>
<th>
    Gen By   </th>
<td> {!! $e->gen_by !!}</td>
</tr>



<tr>

    <th>
      Gen Date</th>
      <td>{!! $e->gen_date !!}</td>
</tr>


<tr>
    <th >
Receipt  </th>
<td> {!! $e->receipt !!}</td>
    
</tr>
</table>



<div id="" class="modal fade payment_edit{{$e->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Payment</h4>
          </div>
          <div class="modal-body">
             
            {{Form::open(array('url' =>'update-payment', 'files'=>true))}}
            <table class="table">
            <tr><th>Paymet For</th><td>
                <input type="text" name="payment_for" class="form-control" value="{{$e->payment_for}}">    
            </td></tr>
            <tr >
                <th>
                    Payment By</th>
            <td>
                                <input type="text" name="payment_by" class="form-control" value="{{$e->payment_by}}">
                            </td>
            </tr>
            
            
            <tr>
                            <th>Paid Amount</th>               
            <td>    
                 <input type="number" name="paid_amount"  class="form-control" required value="{{$e->paid_amount}}">  
            </td>   
            </tr>
            <tr>
                <th >
                    Paid Date   </th>
            <td>
                <input type="text" name="paid_date"  class="form-control date" required value="{{$e->paid_date}}">  
            
            </td>   
            </tr>
            
            <tr>
                <th>Receipt No</th>
            <td> 
                <input type="text" name="receipt_no"  class="form-control" required value="{{$e->receipt_no}}">
            </td>
            </tr>
            
            <tr>
                <th>
                    Gen By   </th>
            <td> 
                 <input type="text" name="gen_by"  class="form-control" required  value="{{$e->receipt_no}}"> 
            </td>
            </tr>
            <tr>
                <th>
                    Gen Date</th>
            <td>    
             <input type="text" name="gen_date"  class="form-control date" required  value="{{$e->receipt_no}}">    
            </td>   
            </tr>
            
            <tr>
                <th >
                    Receipt  </th>
            <td>
            <a href="{{url('public/uploads/image/payment-receipt/'.$e->receipt)}}" target="_blank">{{$e->receipt}}</a>
              <input type="file" name="receipt"  class="form-control" value="{{$e->receipt}}"> 
              
            <input type="hidden" name="h_upload_receipt" value="{{$e->receipt}}">
</td>   
            
 </tr>
            </table>
            
            
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
            <input type="hidden" value="{{$e->id}}" name="id">
            {{Form::submit('Save')}}
            {{Form::close()}}



          </div></div></div></div>






</div>

@endforeach
</div>
@endif










<div id="fincial_add" class="modal fade " role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Financial  </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' =>'update-payment', 'files'=>true))}}
<table class="table">
<tr><th>Paymet For</th><td>
    <input type="text" name="payment_for" class="form-control" placeholder="Payment For">    
</td></tr>
<tr >
    <th>
        Payment By</th>
<td>
                    <input type="text" name="payment_by" class="form-control" placeholder="Payment By">
                </td>
</tr>


<tr>
                <th>Paid Amount</th>               
<td>    
     <input type="number" name="paid_amount" value="" class="form-control" required placeholder="Paid Amount">  
</td>   
</tr>
<tr>
    <th >
        Paid Date   </th>
<td>
    <input type="text" name="paid_date" value="" class="form-control date" required placeholder="Paid Date">  

</td>   
</tr>

<tr>
    <th>Receipt No</th>
<td> 
    <input type="text" name="receipt_no" value="" class="form-control" required placeholder="Receipt no">
</td>
</tr>

<tr>
    <th>
        Gen By   </th>
<td> 
     <input type="text" name="gen_by" value="" class="form-control" required placeholder="Gen By"> 
</td>
</tr>
<tr>
    <th>
        Gen Date</th>
<td>    
 <input type="text" name="gen_date" value="" class="form-control date" required placeholder="Gen Date">    
</td>   
</tr>

<tr>
    <th >
        Receipt  </th>
<td>
  <input type="file" name="receipt" value="" class="form-control" placeholder="Receipt"> 

{{-- <input type="hidden" name="receipt_update[]" value="{{isset($e->receipt)?$e->receipt:'' }}">
<input type="hidden" name="id" value="{{ $e->id}}"> --}}
</td>   

{{-- <td id="plus-button-toggle-finance" style="position:relative;width: 50px;display:none;background: #fbfbfb;
border: 1px solid #eae8e8 !important;"><button type="button" onclick="add_financial_detail();" class="fa fa-plu plus-sign" >   +</button></td> --}}


</tr>
</table>


<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
{{Form::submit('Save')}}
{{Form::close()}}
          </div></div>
        </div></div>



        



          {{-- <div id="finance_edit" class="modal fade " role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit English Score</h4>
                  </div>
                  <div class="modal-body">





                    <ul class="nav nav-tabs" role="tablist" >
                        @if($get_finace_detail->count() > 0)
                        @foreach($get_finace_detail as $get)
                        
                                <li class="nav-item">
                                <a class="nav-link" href="#edt_fin{{$get->id}}" role="tab"
                                data-toggle="tab">{{$get->payment_by}} </a>
                                </li>
@endforeach
@endif
                    </ul>
                    
                    @if($get_finace_detail->count() > 0)
                    <div class="tab-content content-style  my-4">
                    @foreach($get_finace_detail as $get) 
                    <div role="tabpane" class="tab-pane " id="edt_fin{{$get->id}}">
<table>
{{Form::open(array('url' =>'update-financial-detail'))}}
<tr>
    <th>
       Finance By</th>
<td>
    <select class="form-control" name="financial_by">

    <option disabled selected>{{$get->payment_by}}</option>    
          <option VALUE="Bank loan">Bank loan</option>
          <option VALUE="Personal Fund">Personal Fund</option>
          <option VALUE="Family Sponsorship">Family Sponsorship</option>
          <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
          <option VALUE="Other">Other</option>
        </select>     
</td>
</tr>
<tr>
    <th>Paid Amount</th>               
    <td>
        {!! Form::text('amount', $get->paid_amount, array('class'=>'form-control'  ,'required' => true)) !!}
    </td>
</tr>
<tr>
    <th >
        Paid Date   </th>
    <td>
        {!! Form::text('paid_date', $get->paid_date, array('class'=>'form-control date'  ,'required' => true)) !!}
    </td>
</tr>
 <tr>
        <th> Receipt No</th>
    <td>
        {!! Form::text('receipt_no', $get->receipt_no, array('class'=>'form-control'  ,'required' => true)) !!}
    </td>
    </tr>
<tr>
    <th>Gen By</th>
    <td>
        {!! Form::text('gen_by', $get->gen_by, array('class'=>'form-control'  ,'required' => true)) !!}

    </td>
</tr>
<tr>
    <th>Gen Date</th>
    <td>
        {!! Form::text('gen_date',$get->gen_date, array('class'=>'form-control date'  ,'required' => true)) !!}

    </td>
</tr>
<tr>
    <th>Receipt</th>
    <td>
        {!! Form::file('receiptjhg', $get->receipt, array('class'=>'form-control ' ,'required' => true)) !!}

    </td>
    

    {{-- <td id="plus-button-toggle-finance" style="position:relative;width: 50px;display:none;"><button type="button" onclick="add_financial_detail();" class="fa fa-plu plus-sign" style="bottom:-11px">   +</button></td> --}}
{{-- </tr>
<input type="text" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<input type="text" value="{{$get->receipt}}" name="receipt_hidden">

</table>
                    </div>
                                      
@endforeach 
 

 {{Form::submit('Update')}} 

{{Form::close()}}

                   
                  
                    </div>
@endif





                  </div></div></div></div>  --}}
















</div></div>

<script>


// $(document).ready(function(){
//     $('#finance table').find('tr').find('td').find('p:last').hide();
//     $('.update-button-client').hide();
//         $('#finance_edit').click(function(){
//             $('#plus-button-toggle-finance').show();
//             var a  = $('#finance_edit').text();


// if(a == "Back"){
//     $('#finance_edit').text("Edit");
//     $('#finance table').find('tr').find('td').find('p:first').show();
//             $('#finance table').find('tr').find('td').find('p:last').hide();
//             $('.update-button-client').hide();
//             $('#plus-button-toggle-finance').hide();
// }
// else{
//     $('.update-button-client').show();
//             $('#finance table').find('tr').find('td').find('p:first').hide();
//             $('#finance table').find('tr').find('td').find('p:last').show();
//             $('#finance_edit').text("Back");
// }   
//     });
// });

// function add_financial_detail(){
//           $('.add-financial-detail-parent').append('<tr class="id-class-view">   <td> <select class="form-control" name="financial_by[]"> <option disabled selected>--Select--</option> <option VALUE="Bank loan">Bank loan</option> <option VALUE="Personal Fund">Personal Fund</option> <option VALUE="Family Sponsorship">Family Sponsorship</option> <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option> <option VALUE="Other">Other</option> </select> </td>  <td>{!! Form::number('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Amount ')) !!}</td><td>{!! Form::text('paid_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Paid date  ')) !!}</td><td>{!! Form::text('receipt_no[]', null, array('class'=>'form-control', 'placeholder'=>'Receipt')) !!}</td><td>{!! Form::text('gen_by[]', null, array('class'=>'form-control', 'placeholder'=>'Gen. By')) !!}</td><td>{!! Form::text('gen_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Gen. Date')) !!}</td><td>{!! Form::file('receipt[]', array('class'=>'form-control', 'placeholder'=>'Gen. Date')) !!}</td> </tr>');
      

//           $('.date').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
//     $('.travelled_before_from').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
//     $('.travelled_before_to').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
//     $('.work_start_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
//     $('.work_end_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
//     $('.date-of-marriage').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});

//       }


document.querySelector('.active-tab-payment').children[{{$get_finace_detail->count()-1}}].firstElementChild.
    classList.add('active');
        document.querySelector('.tab-content-payment').children[{{$get_finace_detail->count()-1}}].className += " " + "active";
    
</script>

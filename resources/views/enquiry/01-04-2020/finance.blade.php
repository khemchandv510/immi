<div role="tabpane" class="tab-pane " id="finance">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Payment Details    </h4>
<hr>

<div class="about-payment">
    <table>
        <tr>
            <td>Registration Id:</td> <td>MKJ3242342</td>
        </tr>
        <tr>
            <td>Registration Date:</td> <td>10-12-2019</td>
        </tr><tr>
            <td>Visa Type:</td> <td>Student Visa</td>
        </tr><tr>   
            <td>Visa Country:</td> <td>Austraila</td>
        </tr><tr>
            <td>Service Type:</td> <td>Australia Skilled No</td>
        </tr>
        <tr><td>Visa Consultant:</td> <td>Admin</td> </tr>
    </table>
</div>

<div class="client-detail-edit-button">
    <p id="finance_edit">Edit</p>
</div>
<?php 
// $get_id_proof_details  = Helper::get_client_financial_detail(session()->get('unique_id_sess'));
$get_finace_detail = DB::table('enq_financials')->where('enquiry_id',session()->get('unique_id_sess'))->get();

?>
{{Form::open(array('url' =>'update-financial-detail'))}}
<table class="table add-financial-detail-parent">
<tr>

    <th>
        Finance By</th>
      
  <th>Paid Amount</th>
<th >
Paid Date   </th>
<th>Receipt No</th>
<th>
    Gen By   </th>
    <th>
      Gen Date</th>
    <th colspan="2">
Receipt  </th>
    
</tr>
{{-- 
<tr>
    <td>  </td>
</tr> --}}


@if($get_finace_detail != "")

@foreach($get_finace_detail as $e)
<tr class="id-class-view">
{{-- @dd($get_finace_detail) --}}
<td>
    <p>  {!! $e->financials_by !!} </p>
    <p>
    <select     class="form-control selected-disabled" name="financial_by[]" >  
        <option value="{!! $e->financials_by !!}" selected>{!! $e->financials_by !!}</option>    
        
                      <option  VALUE="Bank loan">Bank loan</option>
                      <option VALUE="Personal Fund">Personal Fund</option>
                      <option VALUE="Family Sponsorship">Family Sponsorship</option>
                      <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                      <option VALUE="Other">Other</option>
                    </select>  

                </p>

</td>

<td>    
    <p>  {!! $e->amount !!} </p>   <p> <input type="number" name="amount[]" value="{!! $e->amount !!}" class="form-control" required>  </p>    
</td>   
<td>
    <p>  {!! $e->paid_date !!} </p>   <p> <input type="text" name="paid_date[]" value="{!! $e->paid_date !!}" class="form-control" required>  </p>    

</td>   


<td> 
    <p> {!! $e->receipt_no !!} </p>       <p> <input type="text" name="receipt_no[]" value="{!! $e->receipt_no !!}" class="form-control" required> </p>  
</td>

<td> 
    <p> {!! $e->gen_by !!} </p>       <p> <input type="text" name="gen_by[]" value="{!! $e->gen_by !!}" class="form-control" required> </p>  
</td>

<td>    
<p>  {!! $e->gen_date !!} </p>   <p> <input type="text" name="gen_date[]" value="{!! $e->gen_date !!}" class="form-control" required>  </p>    
</td>   






<td>
<p>  {!! $e->receipt !!} </p>   <p>  <input type="file" name="receipt[]" value="{!! $e->receipt !!}" class="form-control" >   </p>    
<input type="hidden" name="receipt_update[]" value="{{isset($e->receipt)?$e->receipt:'' }}">
<input type="hidden" name="id" value="{{ $e->id}}">
</td>   

<td id="plus-button-toggle-finance" style="position:relative;width: 50px;display:none;background: #fbfbfb;
border: 1px solid #eae8e8 !important;"><button type="button" onclick="add_financial_detail();" class="fa fa-plu plus-sign" >   +</button></td>


</tr>
@endforeach
@endif
@if(count($get_finace_detail) == 0 )

<tr>
<td>
    <select class="form-control" name="financial_by[]">
        <option disabled selected>--Select--</option>    
          <option VALUE="Bank loan">Bank loan</option>
          <option VALUE="Personal Fund">Personal Fund</option>
          <option VALUE="Family Sponsorship">Family Sponsorship</option>
          <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
          <option VALUE="Other">Other</option>
        </select>     
</td>

    <td>
        {!! Form::text('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Amount '  ,'required' => true)) !!}
    </td>

    <td>
        {!! Form::text('paid_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Amount '  ,'required' => true)) !!}
    </td>


    
    <td>
        {!! Form::text('receipt_no[]', null, array('class'=>'form-control', 'placeholder'=>'Receipt No'  ,'required' => true)) !!}
    </td>
    <td>
        {!! Form::text('gen_by[]', null, array('class'=>'form-control', 'placeholder'=>'Gen. By'  ,'required' => true)) !!}

    </td>

    <td>
        {!! Form::text('gen_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Gen. Date'  ,'required' => true)) !!}

    </td>

    <td>
        {!! Form::file('receipt[]', null, array('class'=>'form-control ', 'placeholder'=>'Gen. Date'  ,'required' => true)) !!}

    </td>
    

    <td id="plus-button-toggle-finance" style="position:relative;width: 50px;display:none;"><button type="button" onclick="add_financial_detail();" class="fa fa-plu plus-sign" style="bottom:-11px">   +</button></td>
</tr>
@endif
</table>

<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

 <div class="update-button-client"> {{Form::submit('Update')}} </div> 
{{Form::close()}}

</div>
</div>



<script>


$(document).ready(function(){
    $('#finance table').find('tr').find('td').find('p:last').hide();
    $('.update-button-client').hide();
        $('#finance_edit').click(function(){
            $('#plus-button-toggle-finance').show();
            var a  = $('#finance_edit').text();


if(a == "Back"){
    $('#finance_edit').text("Edit");
    $('#finance table').find('tr').find('td').find('p:first').show();
            $('#finance table').find('tr').find('td').find('p:last').hide();
            $('.update-button-client').hide();
            $('#plus-button-toggle-finance').hide();
}
else{
    $('.update-button-client').show();
            $('#finance table').find('tr').find('td').find('p:first').hide();
            $('#finance table').find('tr').find('td').find('p:last').show();
            $('#finance_edit').text("Back");
}   
    });
});

function add_financial_detail(){
          $('.add-financial-detail-parent').append('<tr class="id-class-view">   <td> <select class="form-control" name="financial_by[]"> <option disabled selected>--Select--</option> <option VALUE="Bank loan">Bank loan</option> <option VALUE="Personal Fund">Personal Fund</option> <option VALUE="Family Sponsorship">Family Sponsorship</option> <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option> <option VALUE="Other">Other</option> </select> </td>  <td>{!! Form::number('amount[]', null, array('class'=>'form-control', 'placeholder'=>'Amount ')) !!}</td><td>{!! Form::text('paid_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Paid date  ')) !!}</td><td>{!! Form::text('receipt_no[]', null, array('class'=>'form-control', 'placeholder'=>'Receipt')) !!}</td><td>{!! Form::text('gen_by[]', null, array('class'=>'form-control', 'placeholder'=>'Gen. By')) !!}</td><td>{!! Form::text('gen_date[]', null, array('class'=>'form-control date', 'placeholder'=>'Gen. Date')) !!}</td><td>{!! Form::file('receipt[]', array('class'=>'form-control', 'placeholder'=>'Gen. Date')) !!}</td> </tr>');
      

          $('.date').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.travelled_before_from').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.travelled_before_to').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.work_start_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.work_end_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.date-of-marriage').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});

      }


</script>

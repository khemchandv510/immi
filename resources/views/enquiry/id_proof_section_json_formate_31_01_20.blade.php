
{{-- ten tab --}}
<div role="tabpane" class="tab-pane " id="id_proof_detail">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Id Proof Details</h4>
<hr>
<div class="client-detail-edit-button">
    <p id="id_proof_detail_edit">Edit</p>
</div>
<?php 
$get_id_proof_details  = Helper::get_client_id_proof(session()->get('unique_id_sess'));
?>
{{Form::open(array('url' =>'update-idproof'))}}
<table class="table add-more-document-parent">
<tr>
<th>
Id Proof</th>
<th>
  Name (Name In ID Proof)</th>
<th colspan="2">
ID Proof No</th>
</tr>
<?php 
// dd($get_id_proof_details) 
?>
@if($enquiries[0]->id_proof != "")

@foreach($enquiries as $e2)
<tr class="id-class-view">
        


<td> 
        @foreach(json_decode($e2->id_proof) as $e)
        
    <table>
        <tr>
            <td>
                
    <p> {!! $e !!} </p>       <p> 
        {{-- <input type="text" name="id_proof[]" value="{!! $e !!}">  --}}
    
        
        <select class="form-control" name="id_proof[]">
                <option value="{!!$e!!}" selected> {!! $e !!}</option>
                    {{-- <option value="AADHAAR CARD">AADHAAR CARD</option>
                    <option value="VOTER ID">VOTER ID</option>
                    <option value="PAN CARD">PAN CARD</option>
                    <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                    <option value="PASSPORT">PASSPORT</option> --}}
                  </select>
    
    </p>     
 </td>   
</tr>
</table>
@endforeach
</td>

<td>
        @foreach(json_decode($e2->id_proof_name) as $e)
    <table>
        <tr>
            <td>
    
    <p>  {!! $e !!} </p> <p> <input type="text" name="id_proof_name[]" value="{!! $e !!}" class="form-control" required>  </p>     
</td>   
</tr>
</table>
@endforeach
</td>
<td>
        @foreach(json_decode($e2->id_proof_no) as $e)
        <table>
            <tr>
                <td>
    <p>  {!! $e !!} </p>   <p> <input type="text" name="id_proof_no[]" value="{!! $e !!}" class="form-control" required>  </p>    

</td>   
<td>
    <p>  {!! $e !!} </p>   <p> <input type="text" name="id_proof_no[]" value="{!! $e !!}" class="form-control" required>  </p>    

</td>   
</tr>
</table>
@endforeach
</td>

<td id="plus-button-toggle-doc" style="position:relative;width: 50px;display:none;background: #fbfbfb;
border: 1px solid #eae8e8 !important;"><button type="button" onclick="add_document();" class="fa fa-plu plus-sign" >   +</button></td>





</tr>
@endforeach

@elseif($enquiries[0]->id_proof == "")

<tr>
    <td>
        <select class="form-control" name="id_proof[]">
            <option disabled selected> --Selected--</option>
                <option value="AADHAAR CARD">AADHAAR CARD</option>
                <option value="VOTER ID">VOTER ID</option>
                <option value="PAN CARD">PAN CARD</option>
                <option value="DRIVING LICENSE">DRIVING LICENSE</option>
                <option value="PASSPORT">PASSPORT</option>
              </select>
    </td>
    <td>
        {!! Form::text('id_proof_name[]', null, array('class'=>'form-control', 'placeholder'=>'Name As ID Proof ')) !!}
    </td>
    <td>
        {!! Form::text('id_proof_no[]', null, array('class'=>'form-control', 'placeholder'=>'ID Proof No')) !!}

    </td>
    <td id="plus-button-toggle-doc" style="position:relative;width: 50px;display:none;"><button type="button" onclick="add_document();" class="fa fa-plu plus-sign" >   +</button></td>
</tr>
@endif
</table>

<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

 <div class="update-button-client"> {{Form::submit('Update')}} </div> 
{{Form::close()}}

</div>
</div>

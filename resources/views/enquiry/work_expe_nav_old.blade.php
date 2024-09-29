
<table class="table add-company">
<tr>
<th>Company Name</th>
<th>  Designation</th>
<th>Start Date</th>
<th colspan="2"> End Date</th>
</tr>
@if($enq_experiences->count()> 0)

@foreach($enq_experiences as $exp)
{{-- @dd($exp->enquiry_id); --}}
<tr>

    <td> <p>  {{$exp->company_name}}   </p>  <p>    <input  class="form-control"  type="text" name="company_name[]" id=""     value="  {{$exp->company_name}} ">         </p>   </td>

<td> <p> {{$exp->designation}}   </p>  <p>  <input  class="form-control" type="text" name="designation[]" id=""     value=" {{$exp->designation}} ">          </p>   </td>

<td> <p> {{$exp->start_date}}   </p>  <p>  <input  class="form-control" type="text" name="start_date[]" id=""     value="{{$exp->start_date}}">          </p>   </td>
<td > <p> {{$exp->end_date}}   </p>  <p> <input class="form-control" type="date" name="end_date[]" id=""     value="{{$exp->end_date}}">           </p>   
</td>
<td style="position:relative;width: 50px;display:none" id="add_clas">
<button type="button" onclick="add_company();"  class="pointer fa fa-plu plus-sign"> + </button>
</td>
</tr>
@endforeach
@elseif($enq_experiences->count() == 0)
<tr>
    <td> {!! Form::text('company_name[]', null, array('class'=>'form-control' )) !!}</td>
    <td> {!! Form::text('designation[]', null, array('class'=>'form-control' )) !!}</td>
<td>  {!! Form::date('start_date[]', null, array('class'=>'form-control','min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
<td> {!! Form::date('end_date[]', null, array('class'=>'form-control', 'min'=>'1979-12-31', 'max'=>'2020-01-02' )) !!}</td>
<td style="position:relative;width: 50px;" id="add_clas">
     <button type="button" onclick="add_company();"  class="pointer fa fa-plu plus-sign"> + </button>
    </td>

</tr>
@endif
<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

</table>
@extends('header')
@section('invoice')
<div class="container">
    <div class="row">
        <div class="col md-12">raise Invoice</div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h4>test College</h4>
            <p>address

            </p>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">+ + Add Billing Item</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Billing Item</th>
                        <th>Description</th>
                        <th>Tution Fees</th>
                        <th>Comm Rate</th>
                        <th>Comm Amount</th>
                        <th>Tax Amount</th>
                        <th>Total Amount</th>
                        
                        
                    </tr>
                    
                   
                </thead>
                <tbody>
<?php                         $client_enquiry_id  = session()->get('unique_id_enroll_sess');
  $commition_invoices  = DB::table('commition_invoices')->where('client_enquiry_id' , $client_enquiry_id)->get(); 
  $enquiries  = DB::table('enquiries')->where('unique_id' , $client_enquiry_id)->get(); 
  $table_enrolments  = DB::table('table_enrolments')->where('client_enquiry_id' , $client_enquiry_id)->get(); 
  
  
?>
<input type="text" name="" id="" value={{$client_enquiry_id}}>
@if(!empty($commition_invoices))
    @foreach($commition_invoices as $inv)
                    <tr>
                        <td>{{$inv->reference}}</td>
                        <td>
                            <table class="invoice-description-table">
                                <tr>
                                    <td colspan="2">commission Invoices</td>
</tr>
<tr>
    <td>Name</td> <td>{{$enquiries[0]->name}}</td>
    <tr>
    <td>DOB</td> <td>{{$enquiries[0]->dob}}</td>
</tr>
<tr>
<td>Teaching Period</td> <td>{{$inv->teaching_period}}</td>
</tr>    
<tr>
    <td>Course</td> <td>{{$table_enrolments[0]->course_name}}</td>
</tr>
<tr>
<td>Course Duration</td> <td>{{$table_enrolments[0]->start_date}} - {{$table_enrolments[0]->end_date}}</td>
</tr>    
<tr>
    <td>Tution Amount</td> <td>{{$inv->tuition_fees}}</td>
</tr>
<tr>
    <td>Comm Rate</td> <td>{{$inv->commission_rate}}</td>
</tr>
<tr>
    <td>Student Number</td> <td>{{$table_enrolments[0]->student_number}}</td>
</tr>
<tr>
    <td>Institute Name</td> <td>{{$table_enrolments[0]->institution}}</td>

</tr>
                            </table>
                        </td>
                        <td>{{$inv->tuition_fees}}</td>
                        <td>{{$inv->commission_rate}}</td>
                        <td>{{$inv->commission_rate}}</td>
                        <td>{{'tax amount'}}</td>
                        <td>{{$inv->total_amount}}</td>
                    </tr>
@endforeach
@endif
                </tbody>
            </table>
        </div> 
        {{-- end column --}}
        <div class="col-md-4">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">Test College</button>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">C415</button>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">ME245351368</button>
            <table class="table">
                <tr>
                    <td>Invoice</td>
                    <td>{{Form::text('subject',$inv->invoice_no,array('class' => 'form-control', 'disabled'=>'disabled')) }}</td>
                </tr>
                <tr>
                        <td>Case Reference</td>
                        <td>{{Form::text('subject',$table_enrolments[0]->enrolment_number,array('class' => 'form-control')) }}</td>
                    </tr>
                    <tr>
                            <td>Client Ref</td>
                            <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                        </tr>

                        <tr>
                                <td>Date Due</td>
                                <td>{{Form::text('subject',$inv->due_date,array('class' => 'form-control')) }}</td>
                            </tr>
                            <tr>
                                    <td> Invoice Date</td>
                                    <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                                </tr>
                                <tr>
                                        <td>Total Amount</td>
                                        <td>{{Form::text('subject',$inv->total_amount,array('class' => 'form-control')) }}</td>
                                    </tr>


                                    <tr>
                                            <td>Tax</td>
                                            <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                                        </tr>
                
                                        <tr>
                                                <td>Total Invoice Amount</td>
                                                <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                                            </tr>
                                            <tr>
                                                    <td> Paid To Date</td>
                                                    <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                                                </tr>
                                                <tr>
                                                        <td>Total Amount Due</td>
                                                        <td>{{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                                                    </tr>    
            </table>
        </div>
        <div> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">+ Recieve  Payment</button>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">Mail Payment</button>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">+ Generate PDF</button>
        </div>
    </div>
</div>
@endsection
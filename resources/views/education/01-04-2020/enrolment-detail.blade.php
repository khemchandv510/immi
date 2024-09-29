@extends('header')
@section('enrolment-detail')




</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
        </div>

        <div class="row">
                <div class="col-md-6">


<style>
.dropbtn2 {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn2:hover, .dropbtn2:focus {
  background-color: #2980B9;
}

.dropdown2 {
  position: relative;
  display: inline-block;
}

.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content2 a {
  color: black;
  padding: 2px 17px;
  text-decoration: none;
  display: block;
}

.dropdown2 a:hover {background-color: #ddd;}

.show2 {display: block;}
</style>





<div class="dropdown2">
  <button onclick="myFunction()" class="dropbtn2">Add</button>
  <div id="myDropdown2" class="dropdown-content2">
    <a href="#home">Note</a>
    <a href="#about">Task</a>
    <a href="#contact">Document</a>
    <a href="#home">Email</a>
    <a href="#about"> Invoice</a>
    <a href="#contact">Commition Invooice</a>
    <a href="#home">Multiple Commition </a>
    <a href="#about">  Pre-Payment</a>
    <a href="#contact">Transfer </a>
  </div>
  
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#update_enrolment">Update Enrolment</button>
  <button onclick="" class="dropbtn2"> icon</button>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown2").classList.toggle("show2");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn2')) {
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show2')) {
        openDropdown.classList.remove('show2');
      }
    }
  }
}
</script>
                    
                    

                </div>
            </div>










{{-- om --}}
</div>

<div id="k3-manage-case">

<div class="">
<div class="container menu k1col my-5">




{{-- 
  <div class="row number-menu">

    <div class="number-child">
      <div class="number" style="
          background-color: #47ad47;
      ">1</div>
      <p>Case started</p>
    </div>
    
    <div class="number-child">
      <div class="number" style="
          background-color: #ec0e0e;
      ">2</div>
      <p>Contract Signed</p>
    </div>

    <div class="number-child">
      <div class="number">3</div>
      <p>Document list explained</p>
    </div>

    <div class="number-child">
      <div class="number">4</div>
      <p>Documents received</p>
    </div>
    
    <div class="number-child">
      <div class="number">5</div>
      <p>Application Prepared</p>
    </div>
    <div class="number-child">
      <div class="number">6</div>
      <p>Supervisor checked</p>
    </div>
    <div class="number-child">
      <div class="number">7</div>
      <p>Application lodged </p>
    </div>
    <div class="number-child">
      <div class="number">8</div>
      <p>Application acknowledged</p>
    </div>
    <div class="number-child">
      <div class="number">9</div>
      <p>All documents lodged</p>
    </div>
    <div class="number-child">
        <div class="number">10</div>
        <p>Processing commenced</p>
      </div>


  </div> --}}


</div>
</div>



<div class="container k1menu ">
<div class="row">
  <div class="col-6">
    <div class="table">
      <table>
          

<?php
 $client_enquiry_id  = session()->get('unique_id_enroll_sess');
$get  = DB::table('table_enrolments')->get()->where('client_enquiry_id' , $client_enquiry_id); 
$enquiry  = DB::table('enquiries')->get()->where('unique_id' , $client_enquiry_id); 

?>
        @foreach($get as $g)
        <tr>
          <th>Case #</th>
          <td>{{$g->enrolment_number}}</td>
        </tr>

@endforeach
        <tr>
          <th>Client</th>
          @foreach($enquiry as $e)
          <td class="text-danger">  {{$e->name}} </td>
          @endforeach
        </tr>

 
        <tr>
          
        </tr>
        <tr>
          <th>Added On</th>
          <td>  {{$e->date}}  </td>
        </tr>
        {{$e->unique_id}} 

        <tr>
          <th>Case Value</th>
          <td> {{$g->course_value}} </td>
        </tr>

        <tr>
            <th> Institute/University  </th>
          <td class="text-danger"> {{ $g->institution}} </td>
          </tr>


      </table>
    </div>
  </div>

  <div class="col-6">
    <div class="table">
      <table>
       

        <tr>
          <th>Campus
          </th>
          <td>  {{$g->campus}} </td>
        </tr>


        <tr>
          <th>Course</th>
          <td>  {{$g->course_name}}  </td>
        </tr>
        <tr>
          <th> Student ID </th>
          <td>  {{$g->student_number}}  </td>
        </tr>

        
        <tr>
            <th>Start Date</th>
            <td>  {{$g->start_date}}  </td>
          </tr>
          <tr>
            <th>End Date </th>
            <td>  {{$g->end_date}}  </td>
          </tr>


      </table>
    </div>
  </div>
</div>
</div>
<div class="container">
<div class="k1dt">
<div class="row">
  <div class="col-10">
    <ul>
      {{-- <li class="tab1 font-weight-bold">Notes</li>
      <li class="tab1">Agents</li>
      <li class="tab1 font-weight-bold">Tasks</li>
      <li class="tab1">Emails</li>
      <li class="tab1" style="background-color:#e6e3e3">Invoices</li>
      <li class="tab1">Disbursement</li>
      <li class="tab1">Service fee</li> --}}

    </ul>

  </div>


  <div class="col-2">

    <button type="button" class="btn btn-danger">
      <i class="fa fa-plus" aria-hidden="true"></i> Invoice</button>

  </div>
</div>
</div>
</div>

</div>

<div class="row second-row">
    <div class="col-sm-12">


            <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link in active" href="#notes" role="tab" data-toggle="tab">Notes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#agents" role="tab" data-toggle="tab">Agents</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#references" role="tab" data-toggle="tab">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#profile" role="tab" data-toggle="tab">Email</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Invoices</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Disbursement </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#references" role="tab" data-toggle="tab">Services Fee </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Disbursement </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#service_fee" role="tab" data-toggle="tab">Services Fee </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#comm_invoice" role="tab" data-toggle="tab"> Comm. Invoice </a>
                              </li>
                  </ul>
                  
                  <!-- Tab panes -->
                  <div class="tab-content content-style active">
                    <div role="tabpanel" class="tab-pane fade in active show" id="notes">
                       
                       
                        <div class="row add-notes-button">
                            <div>   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Note</button>
                            </div>       
                        </div>   
                        
<table class="table">
  
  <thead>
    <tr>
      <th>Date</th>
      <th>Category </th>
      <th>Discription</th>
      <th>Created by</th>
      <th>Created For </th>
      <th>Reminder Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php   $notes  = DB::table('enrolment_notes')->get()->where('client_enquiry_id' , $client_enquiry_id);  ?>

    @if(!empty($notes))
    @foreach($notes as $note)
    <tr>
      <td>  {{ $note->date }}  </td>
      <td>  {{ $note->category }}  </td>
      <td>  {{ $note->description }}  </td>
      <td>  {{ $note->agent_name }}  </td>
      <td>  {{ $note->created_for }}  </td>
      <td>  {{ $note->reminder_date_calender }}  </td>
      <td>  <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$note->client_enquiry_id}} ></a>   <a href={{'enquiry/get-detail/'.$note->client_enquiry_id}}><i class="fas fa-external-link-alt" aria-hidden="true"></i>
      </a>  </td>
    </tr>
    @endforeach
    @endif
  </tbody>
  </table>
  
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="agents">
                       
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#agent_setting">Agent Setting</button>

                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#subagent">Sub Agent</button>
                        <div style="border:1px solid grey">
                          sub agent section
                        </div>
<script>
  function subagent(){

  }
</script>


                        <table class="table">
                          <tr>
                            <td>sun agent</td> <td>lkh</td>
                          </tr>
                          <tr>
                              <td>sun agent</td> <td>lkh</td>
                            </tr>
                            <tr>
                                <td>sun agent</td> <td>lkh</td>
                              </tr>
                              <tr>
                                  <td>sun agent</td> <td>lkh</td>
                                </tr>
                                <tr>
                                    <td>sun agent</td> <td>lkh</td>
                                  </tr>
                        </table>
                       
                    </div>

                    {{-- start agent setting --}}
                    

<div class="container">

    <!-- Trigger the modal with a button -->
  
  
    <!-- Modal -->
    <div class="modal fade" id="agent_setting" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times; </button>
            <h4 class="modal-title">Agent Setting </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'agent-setting'))}}
            <table class="table">
                <tr>
                    <td> Sub Agent</td>
                    <td>
                       <select name="" id="">
                          <option value=""> sub agent </option>
                    </select> 
                  </td>
                </tr>
  
                <tr>
                        <td>Head Agent </td>
                        <td>  <select name="teaching_period" id="">
                        <option value="teaching period">Head Agent</option>  
                        </select> </td>
                    </tr>
                    <tr>
                            <td> Raise Invoice to </td>
                            <td> 
                            

                            {{Form::radio('tuition_fees',null,array('class' => 'form-control')) }} <label for=""> University </label>
                            {{Form::radio('tution_fees',null,array('class' => 'form-control')) }} <label for="Sub Agent">Sub Agent </label>
                            {{Form::radio('tution_fees',null,array('class' => 'form-control')) }} <label for="Head Agent"> Head Agent </label>
                            </td>
                        </tr>
  
  
                        <tr>
                                <td>Primary Client Contact </td>
                                <td>  {{Form::radio('tution_fees',null,array('class' => 'form-control')) }} <label for="Sub Agent">Client </label>
                                  {{Form::radio('tution_fees',null,array('class' => 'form-control')) }} <label for="Head Agent"> Sub Agent </label>  </td>
                            </tr>
  
  
  <tr>
    <td> Pay Commition to  </td>
    <td>  {{Form::radio('tution_fees',null,array('class' => 'form-control')) }}  <label for="Head Agent"> No One </label> 
      {{Form::radio('tution_fees',null,array('class' => 'form-control')) }}  <label for="Head Agent"> Sub Agent </label> 

      {{Form::radio('tution_fees',null,array('class' => 'form-control')) }}  <label for="Head Agent"> Head Agent </label> 
    
    
    </td>
  </tr>
  
  
  <tr>
      <td>Commition Type  </td>
      <td>  
          {{Form::radio('tution_fees',null,array('class' => 'form-control')) }}  <label for="Head Agent"> Percerntage on Every Invoice</label> 

      {{Form::radio('tution_fees',null,array('class' => 'form-control')) }}  <label for="Head Agent"> Fixed Amount </label> 
      </td>
    </tr>
  
  
    <tr>
        <td>  Amount  </td>
        <td> {{Form::text('total_amount',null,array('class' => 'form-control')) }} </td>
      </tr>
  
      
    <tr>
        <td> Due Date  </td>
        <td> {{Form::date('due_date',null,array('class' => 'form-control')) }} </td>
      </tr>


      <tr>
          <td>Comment  </td>
          <td> {{Form::text('comment',null,array('class' => 'form-control')) }} </td>
        </tr>
  
            </table>
  
          
  
            
            {{ Form::submit('Save',array('name'=>'sd'))}}  {{ Form::reset('Reset') }}
            {{Form::close()}}
  
  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
                    {{-- end of agent setting --}}
                    {{-- end agent --}}


                    <div role="tabpanel" class="tab-pane fade" id="comm_invoice">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#commition_invoice">+ comm</button>

{{Form::open(array('url'=>'fsd'))}}

                       <label for=""> Total Tution Amount</label>
                       <input type="text" name="total_tution_amount" id="" value="0">

  <label for=""> Total Commissionable Amount</label>
                       <input type="text" name="total_tution_amount" id="" value="0">
                       {{Form::submit('Update', array('name'=>'dfsd'))}}
                       {{Form::close()}}





{{-- view comm invoice --}}
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>show <select name="" id="">
        <option value="">1</option>  
        <option value="">2</option>  
        </select> 
        entries
      </p>
      <table class="table">
        <tr>
          <td>Invoice No  </td>
          <td>TP / Sementer  </td>
          <td>Tution Fees  </td>
          <td>Comm Rate  </td>
          <td>Commition   </td>
          <td>Tax  </td>
           <td>Total Amount  </td>
          <td>Paid </td>
          <td> Outstanding  </td>
          <td> Due Date </td>
          <td> Status  </td>
          <td> Action  </td>
        </tr>
        <?php   $commition_invoices  = DB::table('commition_invoices')->get()->where('client_enquiry_id' , $client_enquiry_id);  
        
        ?>
        

        @if(!empty($commition_invoices))
        @foreach($commition_invoices as $inv)
        <tr>
         <td> <a href= {{url('generate-invoice')}}>{{$inv->invoice_no}} </a></td>
            <td>  {{$inv->teaching_period}}  </td>
            <td>{{$inv->tuition_fees}} </td>
            <td> {{$inv->commission_rate}}</td>
            <td> {{$inv->amount}}   </td>
            <td>  {{$inv->tax_code}} </td>
            <td>  {{$inv->total_amount}} </td>
            <td>{{$inv->paid}} </td>
            <td> {{$inv->outstanding}}  </td>
            <td> {{$inv->due_date}}  </td>
            <td> {{$inv->status}}  </td>
            <td> action  </td>
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
  {{-- end view comm invoice --}}

</div>
                  </div>


    </div>
</div>

<br><br><br><br>
{{-- end om --}}






{{-- second row --}}
     



{{-- model --}}

<div class="container">

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Enrolment Notes</h4>
        </div>
        <div class="modal-body">
          {{Form::open(array('url' => 'enrolment-note'))}}
          <table class="table">
              <tr>
                  <td> Category </td>
                  <td> <select name="category" id="" class="form-control">
                  <option value="General">General</option>  
                  <option value="Communication">Communication</option>  
                  <option value="Deadline">Deadline</option>  
                  </select>  </td>
              </tr>
{{Form::hidden('client_enquiry_id',$e->unique_id,array() )}}
              <tr>
                      <td>Subject </td>
                      <td> {{Form::text('subject',null,array('class' => 'form-control')) }}</td>
                  </tr>
                  <tr>
                          <td>Description </td>
                          <td> 
                            <textarea name="description" id="" cols="30" rows="5"></textarea>
                          <input type="radio" name="sent_copy">Send Copy to Client
                          </td>
                      </tr>


                      <tr>
                              <td>Send Notification to </td>
                              <td>  {{Form::radio('s',false,array('class' => 'form-control')) }}  </td>
                          </tr>


<tr>
  <td>Remind for </td>
  <td>  <select name="staff" id="" class="form-control">
  <option disabled selected>select staff</option>  
  <option value="ajay">ajay</option>  
  <option value="amar">amar</option>  
  </select> </td>
</tr>

<tr>
  <td>Reminder date</td>
  <td>  {{Form::date('reminder_date_calender',null,array('class' => 'form-control')) }}</td>
</tr>




          </table>

          {{-- <div>  {{Form::radio('reminder_date',null,array('class' => 'form-control')) }} <label for="">Specify Date</label> </div>
          <div>  {{Form::radio('reminder_date',null,array('class' => 'form-control')) }}  <label for="">Working Days  </label> </div>
          <div>  {{Form::radio('reminder_date',null,array('class' => 'form-control')) }}  <label for=""> Calender days </label> </div> --}}
 
          

          
          {{ Form::submit('Save', array('name'=>'sdfds', 'class' => 'btn btn-danger')) }}  {{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
          {{Form::close()}}


        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
      
    </div>
  </div>
  
</div>

{{-- end model --}}

{{-- end of second row --}}






    </div>


    {{-- commition invoice model --}}
    


<div class="container">

    <!-- Trigger the modal with a button -->
  
  
    <!-- Modal -->
    <div class="modal fade" id="commition_invoice" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Commition Invoice</h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'commition-invoice'))}}
            {{Form::text('client_enquiry_id',$e->unique_id,array() )}}
            <table class="table">
                <tr>
                    <td> Reference</td>
                    <td> {{Form::text('reference',null,array('class' => 'form-control')) }}  </td>
                </tr>
  
                <tr>
                        <td>Teaching Period </td>
                        <td>
                          
                           <select name="teaching_period" id="">
                              {{-- @if(!empty($commition)) --}}
                              {{-- @foreach($commition as $comm) 
                        <option value={{$comm->commition_structure}}>{{$comm->commition_structure}}</option>  
                        @endforeach --}}
                        {{-- @endif --}}
                        
                        </select> </td>
                    </tr>
                    <tr>
                            <td>Tution Fees </td>
                            <td> 
                            

                            {{Form::number('tution_fees',null,array('class' => 'form-control')) }}
                            </td>
                        </tr>
  
  
                        <tr>
                                <td>Commition Rate </td>
                                <td>  {{Form::number('commission_rate',null,array('class' => 'form-control')) }}  </td>
                            </tr>
  
  
  <tr>
    <td>Amount  </td>
    <td> {{Form::number('amount',null,array('class' => 'form-control')) }} </td>
  </tr>
  
  
  <tr>
      <td>Tax Code  </td>
      <td>  <select name="tax_code" id="">
      <option value="GST">GST</option>  
      <option value="FRE">FRE</option>  
      <option value="FRE">CGST</option>  
      </select> </td>
    </tr>
  
  
    <tr>
        <td> Total Amount  </td>
        <td> {{Form::number('total_amount',null,array('class' => 'form-control')) }} </td>
      </tr>
  
      
    <tr>
        <td> Due Date  </td>
        <td> {{Form::date('due_date',null,array('class' => 'form-control')) }} </td>
      </tr>


      <tr>
          <td>Comment  </td>
          <td> {{Form::text('comments',null,array('class' => 'form-control')) }} </td>
        </tr>
  
            </table>
  
          
  
            
            {{ Form::submit('Save', array('name'=>'sdfds')) }}  {{ Form::reset('Reset') }}
            {{Form::close()}}
  
  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
  
    {{-- end commition invoice model --}}
<style>
.nav-tabs{
  background: #e3e3e3;
}
.nav-tabs .nav-item{
  border-right: 1px solid #bebcbc;
}

.table td, .table th{
  padding: .25rem;
}

.modal-header{
  position: relative;
}

.modal-header button{
  position: absolute;
  right: 7px;
  top: 0;
  font-size: 35px;
}
</style>




 @include('education/model/update_enrolment')

@endsection
@extends('header')
@section('calendar')


<div class="create-agent-profile" id="create-agent-profile">
<div id="add-employee-form">
<center>
<div class="leadhead">
    <h2 class="text-primary mx-4">Add Employee</h2></center>
    
{{Form::open(array('url'=>Request::segment(1).'/'."create-employee" , 'files'=>'true' , 'id' => 'create_employee_form','method'=>'POST', 'class' => 'form add-employee-form'))}}

{{-- <div class="emp-category-div">
    <select class="form-control" name="agent_category_select" required>
       <option value="4">Agent</option>
       @if(Auth::user()->usertype_status == 1)
       <option value="5">Sub-Agent</option>
       @endif
    </select>
</div> --}}
<div class="row add-leads-form">
     
<div class="form-row col-md-4">
<label for="">Employee Name <span style="color:red;">*</span></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
{{Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name'))}}
<?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>

</div>
</div>

<div class="form-row col-md-4">
<label for="">Mobile Number</label>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
{{Form::number('contact',null,array('class'=>'form-control','placeholder'=>'Mobile'))}}
<?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>

</div>
</div>

<div class="form-row col-md-4">
<label for="">Date Of Birth</label>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>

{{Form::date('dob',null,array('class'=>'form-control','placeholder'=>'Date Of Birth'))}}
<?php 
echo ($errors->first('dob',"<li class='custom-error'>:message</li>")) 
?> 
</div></div>

<div class="form-row col-md-4">
<label for="">Email Id</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
{{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email'))}}
<?php echo ($errors->first('email',"<li class='custom-error'>:message</li>")) ?>

</div>
</div>
     

<div class="form-row col-md-4">
<label for="">Country</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></i></span>
{{Form::text('country',null,array('class'=>'form-control','id'=>'country','placeholder'=>'Country'))}} 
</div>
</div>

<div class="form-row col-md-4">
<label for="">State</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></i></span>
{{Form::text('state',null,array('class'=>'form-control','placeholder'=>'State'))}}
</div>
</div>

<div class="form-row col-md-4">
<label for="">City</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></i></span>
{{Form::text('city',null,array('class'=>'form-control','placeholder'=>'City'))}} 
</div>
</div>

<div class="form-row col-md-4">
<label for="">Street</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></i></span>
{{Form::text('street',null,array('class'=>'form-control','placeholder'=>'Street'))}}
</div>
</div>

<div class="form-row col-md-4">
<label for="">Pincode</label>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></i></span>
{{Form::text('pin',null,array('class'=>'form-control','placeholder'=>'Pin Code'))}}
</div>
</div>

<!--<div class="form-row col-md-4">-->
<!--<label for="">Employee Image</label>-->

<!--<div class="input-group"style="height:40px;">-->
<!--<span class="input-group-addon"><i class="fas fa-file"></i></span>-->
<!--{{Form::file('image',array('class'=>'form-control', 'id' => 'agent_image', 'style'=> 'display:non'))}} </div>-->
<!--</div>-->


<div class="form-row col-md-4">
<label for="">Password</label>
<div class="input-group" style="height:40px;">
<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
{{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','autocomplete'=>'off'))}}
</div>
</div>


<div class="more-feild-add col-md-12 mt-4">
<button type="button" class="agent-more-feild"  onClick = "show_agent_more_feild();"> Add Official Details </button>
    </div>
<div class="show-agent-more-feild" id="show_agent_more_feild"> 
<div class="row">     
<div class="form-row col-md-4">
<label for="">Office Id </label>

<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
 {{Form::text('office_id',null,array('class'=>'form-control','placeholder'=>'Office Id'))}}
</div>
</div> 


<!--<div class="form-row col-md-4">-->
<!--<label for="">Employee Id </label>-->
<!--<div class="input-group">-->
<!--<span class="input-group-addon"><i class="fas fa-user"></i></span>-->
<!--  {{Form::text('employee_id',null,array('class'=>'form-control','placeholder'=>'Employee Id'))}}-->
<!--</div>-->
<!--</div> -->


<div class="form-row col-md-4">
<label for=""> Joining Date </label>
  
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
{{Form::date('joining_date',null,array('class'=>'form-control','placeholder'=>'Joining Date', 'id' =>'joining_date'))}}
</div>
</div> 

<div class="form-row col-md-4">
<label for=""> Designation </label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
{{Form::text('designation',null,array('class'=>'form-control','placeholder'=>'Designation'))}}
</div>
</div> 


<div class="form-row col-md-4">
<label for=""> Salary </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-wallet"></i></span>
{{Form::number('salary',null,array('class'=>'form-control','placeholder'=>'Salary'))}}
</div>
</div> 


<div class="form-row col-md-4">
<label for=""> Domain </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-globe-asia"></i></span>
{{Form::text('employee_domain',null,array('class'=>'form-control','placeholder'=>'Domain'))}}
</div>
</div> 

<div class="form-row col-md-4">
<label for=""> Total Experience </label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
{{Form::text('total_experience',null,array('class'=>'form-control','placeholder'=>'Total Experience'))}}
</div>
</div> 
</div>
</div>



<!--Expreince TAB Starts here -->


<div class="more-feild-add col-md-12">
    <button type="button" class="agent-more-feild"  onClick = "toggle_experience_feild();"> Add Experience </button>
</div>

<div class="last-company-experience" id="last_company_experience">  
<div class="append-experience-company">
<div class="row"> 


<div class="form-row col-md-4">
<label for="">  Company </label>

<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
{{Form::text('last_company[]',null,array('class'=>'form-control','placeholder'=>'Last Company'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for="">  Salary </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-wallet"></i></span>
{{Form::text('last_salary[]',null,array('class'=>'form-control','placeholder'=>'Last Salary'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> From</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-caret-left"></i></span>
{{Form::date('from_date[]',null,array('class'=>'form-control'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> To</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-caret-right"></i></span>
{{Form::date('to_date[]',null,array('class'=>'form-control'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> Expereince </label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
    {{Form::text('experience[]',null,array('class'=>'form-control','placeholder'=>'Experience'))}}
</div>
</div> 

</div>

</div>
<div class="form-row col-md-4">
<label for="">Add More </label>
<div class="input-group" style="border:0">
<p class="experience-plus-sign"  onclick = "add_emp_experience();">+</p>
</div>
</div>
</div>
 
{{-- end last company experience --}}


{{-- start Account Information --}}


<div class="more-feild-add col-md-12">
    <button type="button" class="agent-more-feild"  onClick = "toggle_bank_feild();"> Add Bank Details </button>
</div>

<div class="employee-account-information" id="employee_account_information">
  <div class="row"> 
  
<div class="form-row col-md-4">
<label for=""> Bank Name </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-university"></i></span>
{{Form::text('employee_bank_name',null,array('class'=>'form-control','placeholder'=>'Bank Name'))}}
</div>
</div> 

<div class="form-row col-md-4">
<label for=""> Account No </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-sort-numeric-up-alt"></i></span>
{{Form::text('employee_account_number',null,array('class'=>'form-control','placeholder'=>'Account Number'))}}
</div>
</div> 

<div class="form-row col-md-4">
<label for=""> IFSC Code</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-sort-numeric-up-alt"></i></span>
{{Form::text('employee_ifsc',null,array('class'=>'form-control','placeholdercountry'=>'IFSC Code'))}}
</div>
</div> 

<div class="form-row col-md-4">
<label for=""> Branch</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-code-branch"></i></span>
 {{Form::text('employee_branch',null,array('class'=>'form-control','placeholder'=>'Branch'))}}
</div>
</div> 
  
</div>
</div>
{{-- end of Account Information --}}

{{-- start Documents section --}}

<div class="more-feild-add col-md-12">
    <button type="button" class="agent-more-feild"  onClick = "toggle_document_feild();"> Add Document </button>
</div>
<div class="employee_document" country id="employee_document">
    <div class="row">
        
<div class="form-row col-md-4">
<label for=""> Image</label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-image"></i></span>
{{Form::file('image',array('class'=>'form-control', 'id' => 'agent_image', 'style'=> 'display:non'))}}
</div>
</div>    

<div class="form-row col-md-4">
<label for=""> Documents </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-file"></i></span>
<input type="file" name="employee_documents[]" class="form-control" multiple accept=".jpeg,.jpg,.png.doc,.docx,.ppt,.pdf">
        Press Control Key and Select multiple Document for upload 
</div>
</div>     
    
    
</div>
</div>
{{-- end Documents section --}}




<div class="form-row col-md-12">

{{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3'))}}

</div>
</div></div>
<script>
function add_emp_experience(){
 $('.append-experience-company').append(`<div class="row"><div class="form-row col-md-4">
<label for="">  Company </label>

<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
{{Form::text('last_company[]',null,array('class'=>'form-control','placeholder'=>'Last Company'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for="">  Salary </label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-wallet"></i></span>
{{Form::text('last_salary[]',null,array('class'=>'form-control','placeholder'=>'Last Salary'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> From</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-caret-left"></i></span>
{{Form::date('from_date[]',null,array('class'=>'form-control'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> To</label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-caret-right"></i></span>
{{Form::date('to_date[]',null,array('class'=>'form-control'))}}
</div>
</div> 
<div class="form-row col-md-4">
<label for=""> Expereince </label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-building"></i></span>
    {{Form::text('experience[]',null,array('class'=>'form-control','placeholder'=>'Experience'))}}
</div>
</div>
</div>
`);
}
</script>
  @endsection
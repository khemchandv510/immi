@extends('header')
@section('calendar')


<div class="create-agent-profile" id="create-agent-profile">
    
@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
   </script>
@endif
<div id="add-employee-form">
<center>
    



<div class="leadhead">
    <h2 class="text-primary mx-4">Add Sub Agent</h2></center>
    
{{Form::open(array('url'=>Request::segment(1).'/'."create-sub-agent" , 'files'=>'true' , 'id' => 'create_employee_form','method'=>'POST', 'class' => 'form add-employee-form'))}}


<div class="row add-leads-form">
     
<div class="form-row col-md-4">
<label for=""> Name <span style="color:red;">*</span></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
{{Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name'))}}
<?php echo ($errors->first('name',"<li class='custom-error'>:message</li>")) ?>

</div>
</div>

<div class="form-row col-md-4">
<label for="">Contact</label>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
{{Form::number('contact',null,array('class'=>'form-control','placeholder'=>'Mobile'))}}
<?php echo ($errors->first('contact',"<li class='custom-error'>:message</li>")) ?>

</div>
</div>


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



<div class="form-row col-md-4">
<label for="">Password</label>
<div class="input-group" style="height:40px;">
<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
{{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','autocomplete'=>'off'))}}
</div>
</div>




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
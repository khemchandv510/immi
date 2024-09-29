<?php
use App\Helpers\Helper;

// $enq_educations    = Helper::enqEducation(Session()->get('unique_id_sess'));

?>
@extends('header')
@section('filter-course-section')

<div class="panel">
   <div class="row enquiry-agent-name">
      <div class="col-md-4">
         <label for="">From</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
            <input class="form-control date" name="filter_date_from" type="text" placeholder="dd-mm-yyyy">
         </div>
      </div>
      <div class="col-md-4">
         <label for="csad">To</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
            <input class="form-control date" name="filter_date_to" type="text" placeholder="dd-mm-yyyy"> 
         </div>
      </div>
      <div class="col-md-4">
         <label for="csad">Select Employee</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
            <input name="id" type="hidden" value="Emp_2266"> 
            <select class="form-control" name="agent_id">
               <option value="">select</option>
               <option value="0">select</option>
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <label for="csad">Status</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-align-justify"></i></span>
            <select class="form-control" name="status">
               <option value="">select</option>
               <option value="Dead Lead">Dead Lead</option>
               ;
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <label for="csad">Purpose</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-comment-medical"></i></span>
            <select class="form-control" name="purpose_of_query">
               <option value="">Select Purpose</option>
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <label for="csad">Name, Email, Mobile....</label>  
         <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-school"></i></span>
            <input class="form-control" placeholder="Search here Name, Email, Mobile..." name="searchbox" type="text">
         </div>
      </div>
      <div class="col-md-12" style=" text-align: center; ">
         <input class="btn btn-danger w-10" type="submit" value="Search">
            <input url="enquiry-list" class="enquiry-agent-name btn btn-danger w-10" type="submit" value="Reset"> 
         <a class="btn btn-danger w-10" href="#">Reset</a>
      </div>
   </div>
</div>



<table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date & Time</th>
      <th scope="col">student</th>
      <th scope="col">name </th>
      <th scope="col">App id</th>
      <th scope="col">Progrtam & school</th>
      <th scope="col">Document title</th>
      <th scope="col">  </th>
    </tr>
  </thead>
  <tbody>
      
  
     
      <tr>
          <th scope="row">1</th>
          <td>Date & Time</td>
          <td>Student id</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="#" style="color: #007cf8;
        font-size: 17px; font-weight: bolder;">View</a> </td>
    </tr>
    
    <tr>
          <th scope="row">1</th>
          <td>Date & Time</td>
          <td>Student id</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="#" style="color: #007cf8;
        font-size: 17px; font-weight: bolder;">View</a> </td>
    </tr>  
     
  </tbody>
   
</table>


@endsection


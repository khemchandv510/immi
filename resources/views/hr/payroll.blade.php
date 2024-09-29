@extends('header')
@section('payroll')
</div>
{{-- <p>Company Name</p> --}}
{{-- <p>employee name</p> --}}
{{-- <p>{!! Form::selectMonth($name, $selected, [$options]) !!}</p> --}}
<?php
 $employee_id  = DB::table('users')->get(); 
 
?>

{{Form::open(array('url' => 'select-employee-payroll'))}}
<select name="employee_name" id=""style="margin-top:15px; margin-left:15px;" >
    <option disabled selected> --Employee Name--</option>
    @if(!empty($employee_id))
    @foreach($employee_id as $emp)
<option value={{$emp->unique_id}}>{{$emp->name}}</option>
@endforeach
@endif
</select>
<input type="month" name="month">


<input type="submit">
{{Form::close()}}

<p class="emp-payroll-time" >Login Time:- 10:00 </p>  <p class="emp-payroll-time">LogoutTime:- 06:00 </p>



<div class="row">
    <div class="col-sm-12">
        <p>
                @if(!empty($get_emp))
                {{-- @foreach($get_emp as $e) --}}
                {{$get_emp[0]->name}}
                




                {{-- @endforeach --}}
               
        </p>
        
        <?php 
        $get_agent =  DB::table('users')->where('employee_id',$get_emp[0]->employee_id)->where('status', 1)->get();
            $salary =  DB::table('login_hours')->where('employee_id',$get_emp[0]->employee_id)
            ->where('date','like',$month.'%')
            ->SUM('time_calculate');
            
        ?>
        <p class="emp-payroll-time"> Salary:  {{(($get_agent[0]->salary/30)/8)*$salary/60}} </p>
        @endif 
    </div>
</div>
@if(!empty($get_emp))
<?php  
// $year = explode('-', $month));
//  echo $d=cal_days_in_month(CAL_GREGORIAN,$year[0],$year[1]); 
 ?>

<table class="table">
    <tr>
        <th>Date</th>
        <th>Login Time</th>
        <th>Late</th>
        <th>Logout Time</th>
        <th>Login Hours</th>
    </tr>
    @endif
    @if(!empty($get_emp))
    @foreach($get_emp as $e)
    <tr>
        {{-- @dd(49/100*60); --}}
    <td> {{$e->date}}</td>
    <td> {{$e->min_time}} </td>
     <?php 
      $str =     (strtotime($e->min_time) - strtotime(date('Y-m-d-10-00')))/3600; 
     $late_time = explode('.', $str);
     $l =  $late_time[1]/100*60;
     $newstr = substr($l,0, 2);
     ?>

     {{-- @dd(-5 == 5); --}}
     @if(((int)$late_time[0] > 0) || (((int)$newstr > 0) && ((int)$late_time[0] >= 0)) )
     <td style="color:red; "> {{$late_time[0].'hr '  .$newstr . 'Minuts'}} </td>    
     @else
     
     <td style="color:green; "> {{$late_time[0].'hr '  .$newstr . 'Minuts'}} </td>    
    @endif
    
        <td> {{$e->max_time}} </td>
        <td>{{ $e->total/60 }}</td>
    </tr>
    @endforeach
@else
<table class="table">
        <tr>
                <th>Name</th>
            <th>Date</th>
            <th>Login Time</th>
            <th>Late</th>
            <th>Logout Time</th>
            <th>Login Hours</th>
        </tr>
<?php 


$get_emp = DB::table('login_hours')
    ->select(DB::raw('date, SUM(time_calculate) as total, MIN(start_time) as min_time, MAX(end_time) as max_time, name, employee_id' ))
    ->groupBy('date', 'name', 'employee_id')
    ->where('date','like',date('Y-m-d'))
    ->get();
?>

@foreach($get_emp as $e)
<tr>

        {{-- @dd(49/100*60); --}}
        <td> {{$e->name}}</td>
        <td> {{$e->date}}</td>
    <td> {{$e->min_time}} </td>
     <?php 
      $str =     (strtotime($e->min_time) - strtotime(date('Y-m-d-10-00')))/3600; 
     $late_time = explode('.', $str);
     $l =  $late_time[1]/100*60;
     $newstr = substr($l,0, 2);
     ?>

     {{-- @dd(-5 == 5); --}}
     @if(((int)$late_time[0] > 0) || (((int)$newstr > 0) && ((int)$late_time[0] >= 0)) )
     <td style="color:red; "> {{$late_time[0].'hr '  .$newstr . 'Minuts'}} </td>    
     @else
     
     <td style="color:green; "> {{$late_time[0].'hr '  .$newstr . 'Minuts'}} </td>    
    @endif
    
        <td> {{$e->max_time}} </td>
        <td>{{ $e->total/60 }}</td>
    </tr>
@endforeach
    
    @endif
  


    </tr>
</table>
@endsection
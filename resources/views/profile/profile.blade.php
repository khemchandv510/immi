@extends('header')
@section('profile')
    Request Leave 

    @if(Session::has('message'))
    <p >{{ Session::get('message') }}</p>
    @endif
    {{Form::open(array('url' =>'leave-request','id'=>'request_leave_form'))}}
    {{Form::text('employee_id',Auth::user()->employee_id)}}
    {{Form::text('subject',null , array('class'=>'form-control','placeholder' =>'Subject'))}}
    <textarea name="description" id="" cols="30" rows="10" placeholder="Leave Description"></textarea>
    {{Form::number('day',null, array('class' => 'form-control','onChange'=>'add_calender();','id'=>'day','placeholder'=>'Number of Day'))}}
<label for=""> From</label>
    {{Form::date('from',null, array('class' => 'form-control','id' =>'first_calender'))}}

    <label for=""> To</label>
    {{Form::date('to',null, array('class' => 'form-control' , 'id' =>'second_calender'))}}

    {{-- <div id="leave_date_div"></div>  --}}
    {{Form::submit('Send Request')}}
{{Form::close()}}



<div>
    <?php
     $get_agent =  DB::table('users')->where('employee_id','Emp_3129')->where('status', 1)->get();
    $salary =  DB::table('login_hours')->where('employee_id','Emp_3129')->where('date',date('Y-m-d'))->SUM('time_calculate');
    // $hold = DB::table('login_hours')->where('employee_id', $a)->where('date',date('Y-m-d'))->SUM('time_calculate');
    $time  = $salary;
    // $aa=  $get_agent[0]->salary/$time ;


//  $time/60 , $aa, $salary/60 ;
 echo (($get_agent[0]->salary/30)/8)*$time/60 ;

     ?>
</div>


<script>
function add_calender(){
    var day = document.getElementById('day').value;
    
    var request_leave_form = document.getElementById('leave_date_div');
    if(day > 1){
        document.getElementById('second_calender').style.display ="block";

    //    if(add_date !=''){
    //     request_leave_form.removeChild();  
    //    }
    // var add_date = document.createElement('input');
    // var add_date2 = document.createElement('input');
    // request_leave_form.appendChild(add_date);  
    // request_leave_form.appendChild(add_date2);  
    // add_date.setAttribute('type',"date");
    // add_date2.setAttribute('type',"date");
    
    }
    else{
        // var add_date = document.createElement('input');
        // request_leave_form.appendChild(add_date);  
        // add_date.setAttribute('type',"date");

        document.getElementById('first_calender').style.display ="block";
        document.getElementById('second_calender').style.display ="none";

    }

}
</script>



@endsection
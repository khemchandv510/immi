@extends('header')

@section('application')
<div>
    <table class="" border="1">
        <?php
                $getEnrolment = DB::table('table_enrolments')
                // ->select('')
                // ->join('users','table_enrolment.agent_unique_id','users.unique_id')
                ->where('status',1)
                
                ->get();
                $count = 1;
            ?>
        <tr>
            <th>S No </th>
            <th> Application No</th>
            <th> App Date</th>
            <th> Ajent Name</th>
            <th> Commenr</th>
            <th> Action</th>
            
        </tr>
        
        @foreach($getEnrolment as $get)
        <tr>
            <td>{{$count++}}</td>
        <td>{{$get->enrolment_number}}</td>
            <td>{{$get->date}}</td>
            <td>kjh</td>
            <td> <a href="{{url('application/view-application')}}">view more</a> </td>
        </tr>
        
        @endforeach
    </table>
</div>
@endsection

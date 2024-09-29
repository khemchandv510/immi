@extends('header')
@section('enrolment')
    

<table class="table">
    <tr>
        <th>Case</th>
        <th>Clients</th>
        <th>Institution</th>
        <th>Course</th>
        <th> Stat Date</th>
        <th>End Date</th>
        <th>Staff</th>
        <th>Current Status</th>
        <th>Status Date</th>
        <th>Created On</th>
        <th>Active</th>
    </tr>
    <?php
     $get_enroll = DB::table('table_enrolments')->where('status', 1)->get();
     if($get_enroll->count() > 0){
        //  dd($get_enroll);
     foreach($get_enroll as $enroll){
    ?>
    <tr>
            <td>{{$enroll->enrolment_number}}</td>
            <td>
                <?php
                     $get_client = DB::table('enquiries')->where('unique_id',$enroll->client_enquiry_id)->get();
                    if(!empty($get_client[0]->name)){
                    ?>
                    
                {{$get_client[0]->name}}
                <?php
                }
                else{
               echo "Record Deleted !!!";
                }
                ?>
                </td>
            <td>{{$enroll->institution}}</td>
            <td>{{$enroll->course_name}}</td>
            <td> {{$enroll->start_date}}</td>
            <td>{{$enroll->end_date}}</td>
            <td>Staff</td>
            <td>Current Status</td>
            <td>Status Date</td>
            <td>{{$enroll->date}}</td>
            <td>Active</td>
        </tr>
   <?php } }
    else{
       ?> 
    <p>no record found</p>
<?php
}
    ?>
</table>



@endsection
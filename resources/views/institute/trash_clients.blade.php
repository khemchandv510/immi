@extends('header')
@section('trash-institute')
</div>

<style>
  .table tr td, .table tr th{
    text-align: center;
    border: 1px solid #f7ecec;
    padding: 10px;;
  }

</style>

    <?php 
        
        $get = DB::table('enquiries')->where('delete_client', '3')->get();
    $enq_purposes = DB::table('enq_purposes')->get();
    $enq_status = DB::table('enq_status')->get();   


        ?>
        <table class="table">
          
        <tr>
           
            <th>Client Id </th>
            <th>Name</th>
            <th>Contact</th>
            <th>Agent Name</th>
            <th>Status</th>
            <th>Purpose</th>
            <th>Comment</th>
            <th>Manage</th>
        </tr>
        @foreach($get as $get2 )
        <tr>
            <td> {{$get2->unique_id}} </td>
            <td> {{$get2->name}} </td>
            <td> {{$get2->contact}} </td>
            <td> {{$get2->agent_name}} </td>
            <td> {{$get2->disposition}} </td>
            <td> {{$get2->purpose_of_query}} </td>
            <td> {{$get2->comment}} </td>
            <td>   <a href="javascript:void(0);" class="fa fa-undo undo-client"   data-id={{$get2->unique_id}} ></a>        <a href="javascript:void(0);" class="fas fa-trash permanent-delete-client" data-id={{$get2->unique_id}} aria-hidden="true"></i>
            </a>  </td>
        </tr>
        @endforeach
</table>



<script>
        $(document).ready(function(){
    $(".undo-client").on("click", function(){
        var unique_id = $(this).attr("data-id");

  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure to want to Undo this?')) {
    $.ajax({
    type: "get",
    url: "{{url('undo-client')}}?a="+unique_id,
    
    success: function(data){
    alert('Undo Successfully '); 
    location.reload();
                }
    });
}
    }
    );
  });





  $(document).ready(function(){
    $(".permanent-delete-client").on("click", function(){
        var unique_id = $(this).attr("data-id");

  $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });

  if (confirm('Are you sure to want to Delete Permanent this?')) {
    $.ajax({
    type: "get",
    url: "{{url('permanent-delete-client')}}?a="+unique_id,
    
    success: function(data){
    alert('Deleted Successfully '); 
    location.reload();
                }
    });
}
    }
    );
  });

   </script> 


@endsection
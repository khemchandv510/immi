@extends('header')
@section('ip-address')

{{Form::open(array('url' => 'add-ip-address'))}}

{{Form::text('ip_address', null, array('class'=> 'ip-address'))}}

{{Form::submit('Add', array('class' =>'btn btn-danger'))}}
{{Form::close()}}
</div>
<hr>
<table class="table">
    <thead>
    <tr>
        <td>IP Address</td>
        <td>Status</td>
    </tr>
</thead>
<tbody>
    <?php
     $ip  =  DB::table('ip_addresses')->where('status',1)->get();
     foreach($ip as $i){
     ?>
    <tr>
        <td>{{$i->ip}}</td>
        <td> 
            @if($i->action == 1)
            <input type="button" value="Active" disabled class="ip-actives-disable" data-id="{{$i->unique_id}}">
            <input type="button" value="Deactive" enable class="ip-deactive" data-id="{{$i->unique_id}}">    
            @else
            <input type="button" value="Active" enable class="ip-actives-disable" data-id="{{$i->unique_id}}">
            <input type="button" value="Deactive" disabled  class="ip-deactive"  data-id="{{$i->unique_id}}">
            @endif
               
            <input type="button" value="Delete" class="ip-delete"  data-id="{{$i->unique_id}}">    
        </td>
    </tr>
<?php }?>
</tbody>
</table>


<script>
        $(document).ready(function (){
                           $('.ip-actives-disable').click(function(e){
                     var id  = $(this).attr('data-id');
                   $.ajaxSetup({
                                         headers: {
                                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                     }
                                      });        
                 $.ajax({
                 type: "get",
                 url: "{{url('active-ip')}}?a="+id,
                success: function(data){
                alert('IP Active'); 
                location.reload();  
                }
                 });
                 })
               })
     </script>
     

     <script>
            $(document).ready(function (){
                               $('.ip-deactive').click(function(e){
                         var id  = $(this).attr('data-id');
                       $.ajaxSetup({
                                             headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                         }
                                          });        
                     $.ajax({
                     type: "get",
                     url: "{{url('ip-deactive')}}?a="+id,
                    success: function(data){
                    alert(' IP Deactive');  
                    location.reload(); 
                    }
                     });
                     })
                   })
         </script>


<script>
        $(document).ready(function (){
                           $('.ip-delete').click(function(e){
                     var id  = $(this).attr('data-id');
                   $.ajaxSetup({
                                         headers: {
                                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                     }
                                      });
                                      if(confirm('Are you sure want to delete this IP ?')){        
                 $.ajax({
                 type: "get",
                 url: "{{url('ip-delete')}}?a="+id,
                success: function(data){
                alert(' IP Delete');  
                location.reload(); 
                }
                 });
                                      }
                 })
               })
     </script>

@endsection
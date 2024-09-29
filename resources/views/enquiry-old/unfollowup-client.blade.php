@extends('header')
@section('unfollow-client')

  


<style>
    #myModal .close{
      padding: 0;
        margin: 0;
        color: #000;
        background: none;
    }
        #save_comment_button{
      display: inline;
    }
    #comment{
      padding: 4px;
        border-radius: 3px;
        border: 1px solid #b1abab;
    }
    #myModal .modal{
    padding-top:0; 
    }
        #myModal .modal-content{
       top: 5%;

    }
    .callbacklater{
      text-align: center;
        background: #2b6699;
        width: 100%;
        margin: -1px;
        padding: 9px;
        color: #fff;
    }
    #myModal .callbacklater{
      position: relative !important;
        left: 0 !important;
        transform: translate(0) !important;
        padding: 10px;
        border-radius: 3px;
        width: 100%;
    }
    .callbacklate{
      width: 40%;
      padding: 6px;
    }
    </style>
    <br>
    {{ Form::open(array('url'=>'search-unfollow-client', 'class' => '', "method" =>"get" )) }}
     <div class="row">
        {{  Form::hidden('id',Auth::user()->employee_id )  }} 
          <div class="col-sm-3 col-md-3">
            <label for="">Assigned Agent Name</label>
<select name="agent_id" class="form-control">
<option selected disabled> Assigned Agent Name </option>
  @foreach($getAllEmployee as $aa)
<option value="{{$aa->unique_id}}"> {{$aa->name}} </option>
@endforeach
</select>
</div>

<div class="col-sm-3 col-md-3">
  <label for="">Purpose</label>
<select class="form-control" name="purpose_of_query">
<option selected disabled> Purpose </option>
@foreach($getPurpose as $pur)
<option value="{{ $pur->purpose}}">  {{ $pur->purpose}} </option>
@endforeach
</select>
</div>
<div class="col-sm-3 col-md-3">
  <label for="">Search</label>
   {{  Form::text('search',null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }} 
</div>

    <div class=" submit-button">  {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
        {{-- {{ Form::reset('Reset', array('class'=>'btn btn-danger w-10', )) }} --}}
    </div>


</div>
{{Form::close()}}
<br>
    <div class="row">
      <div class="form-group col-sm-3">
          {{Form::open(array('url' => 'range-filter', 'id' => 'filter_form' , 'method' => "get"))}}
    <label for="range_filter">Per Page</label>
    <select name="range_filter" id="range_filter" class="form-control " style="width:100%!important" >
      <option disabled selected>--Select--</option>
      @for($i=10; $i<=100; $i+=10)
    <option value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
    <button type="submit" name=""  class="btn btn-danger w-10 fa fa-filter" id="filter_button"></button>
    {{Form::close()}}
  </div>
   <ul>
         
         <li class="btn-special btn-icon btn-googleplus" id="sendEmail" style="margin-left:850px; margin-top:50px;"><i class="fa fa-comment" aria-hidden="true"></i><span style="padding-left: 5px; padding-right: 5px; "><a href="" target="_blank" style="color:#fff;">Excel</a></span></li>


  </div>
  {{Form::open(array('url' => 'assign-unfollow-client'))}}
    <div class="row">
          
               <table class="  display table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" id="example" cellspacing="0" width="100%">
                  <thead class="k0listenqury">
                  <tr>
                    <th><input type="checkbox" id="select-all">
                      <label for="car">Select All</label></th>
                     <th > No </a> </th>
                    <th>Source</th>
                     <th>Name</th>
   <th>Contact no </th>
                        <th> Purpose </th>
                    <th> Assign </th>
                    <th> Alternet Mobile </th>
                    <th> Alternet Email </th>
                    <th> Course Country </th>
                    <th> Course </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ; ?>
                    @foreach ($getList as $get2)
                    <tr>
                    <td><input name="client_id[]"  value="{{$get2->unique_id}}" class="id{{$get2->unique_id}}" type="checkbox" id="select-all"></td>
                    <td>{{$i++}}</td>
                  <td>{{$get2->source}}</td>
                       
                    <td>{{$get2->name}}</td>
                    
                        <td>{{$get2->mobile}}</td>
                        <td>{{$get2->alternate_mobile}}</td>
   <td> {{$get2->email}} </td>
   <td> {{$get2->alternet_email}} </td>
   <td> {{$get2->course_country}} </td>
   <td> {{$get2->course}} </td>
                    </tr>
                    @endforeach
                  </tbody>
               </table>
                    {{ $getList->links() }} 

    </div>
<div>
 <!--  <div class="row">
    <label for="">Assigned Agent Name</label>
<select name="agent_id" class="form-control">
<option selected disabled> Assigned Agent Name </option>
@foreach($getAllEmployee as $aa)
<option value="{{$aa->unique_id}}"> {{$aa->name}} </option>
@endforeach
</select>
<input type="submit" value="Assign">
</div> -->
</div>
{{Form::close()}}
                    <script>
                    document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                      }
                    }
                    </script>

                    



<script>
  $(document).ready(function(){
$(".assing-client").on("click", function(){
  var unique_id = $('#agent_id').val();
$.ajaxSetup({
                          headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                       });

if (confirm('Are you sure you want to Assign to this Agent ?')) {
$.ajax({
type: "POST",
url: "{{url('assign-unfollow-client')}}?a="+unique_id,

success: function(data){
alert('Record Delete Successfully '); 
location.reload();
          }
});
}
}
);
});
</script> 

@endsection
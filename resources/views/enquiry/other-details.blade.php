<style>
#other_detail_overview .nav-link:last{
display:none;
}
</style>
<div role="tabpane" class="tab-pane " id="other_detail_overview">
    <div class="" data-toggle="modal" data-target="#previous_company" >
    <h4> Other Details   <p id="other_detail_overview_edit" class="fa fa-edi  "> Edit</p> </h4>
    <hr>
    <div >

        <?php $get_last_five = DB::table('enq_residense_last_five_year')->where('enquiry_id', session()->get('unique_id_sess'))->get(); ?>

        <ul class="nav nav-tabs" role="tablist" id=""  style="display:flex">
            @if($get_last_five->count() > 0)
            @foreach($get_last_five as $get)
                <li class="nav-item">
                <a class="nav-link   get_other_details" href="#address{{$get->number_of_address}}" role="tab"
                data-toggle="tab" data-id = "{{$get->number_of_address}}"  >Address {{$get->number_of_address}} </a>
                </li>
                @endforeach
                <li class="nav-item">
                        <a class="nav-link   get_other_details" href="#address{{$get->number_of_address}}" role="tab"
                        data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
                        </li>
        @else
        <li class="nav-item">
            <a class="nav-link   get_other_details" href="#" role="tab"
            data-toggle="tab" data-id = "add_more_class"  > Add More.. </a>
            </li>
            @endif
        </ul>
        <table id="get_get_other_details_dynamic"></table>




        <table class="table my-table">
                {{Form::open(array('url'=>'edit-other-detail'))}}
          
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
            @if(count($get_last_five) >0)
            @foreach($get_last_five as $get)   @endforeach
        <input type="hidden" name="number_of_address[]" value="{{$get->number_of_address}}">
        <tr >
        <th>From </th>
        <td> {{$get->from}} 
        </td>
        <td>
            <input type="text" name="from[]" value="{{$get->from}}"class="form-control date">
        </td>
         
        </tr>
        <tr>
        <th>To </th>
        
        <td> {{$get->to}} </td>
        <td> 
               <input type="text" name="to[]" value="{{$get->to}}"class="form-control date">     
        </td>
        </tr>
        <tr>
        <th> Purpose </th>
        <td> {{$get->purpose}} </td>
        <td> <input type="text" name="purpose[]" value = "{{$get->purpose}}" class="form-control" > </td>
        </tr>
        
        
        
        <th>Address </th>
        <td> {{$get->address}} </td>
        <td> <input type="text" name="address[]" value = "{{$get->address}}" class="form-control"> </td>
        </tr>
        
        
        
        
        
        <tr>
            <th> City </th>
            <td> {{$get->city}} </td>
            <td> <input type="text" name="city[]" value=" {{$get->city}}" class="form-control"> </td>
            </tr>
        
        
        
        
        <tr>
        <th>State </th>
        <td> {{$get->state}} </td>
        <td> <input type="text" name="state[]" value=" {{$get->state}}" class="form-control"> </td>
        </tr>
        
        
        
        <tr>
            <th>Country </th>
            <td> {{$get->country}} </td>
            <td> <input type="text" name="country[]" value=" {{$get->country}}" class="form-control"> </td>
            </tr>
        
        
        
        
        <tr>
            <th>Zip </th>
            <td> {{$get->zip}} </td>
            <td> <input type="text" name="zip" value=" {{$get->zip}}" class="form-control"> </td>
            </tr>
      
@endif
@if(count($get_last_five) == 0)
<input type="hidden" name="number_of_address[]" >
<tr >
    <th>From </th>
    
    <td>
        <input type="text" name="from[]" class="form-control date">
    </td>
     
    </tr>
    <tr>
    <th>To </th>
    
   
    <td> 
           <input type="text" name="to[]"class="form-control date">     
    </td>
    </tr>
    <tr>
    <th> Purpose </th>
   
    <td> <input type="text" name="purpose[]"  class="form-control" > </td>
    </tr>
    
    
    
    <th>Address </th>
    
    <td> <input type="text" name="address[]"  class="form-control"> </td>
    </tr>
    
    
    
    
    
    <tr>
        <th> City </th>
      
        <td> <input type="text" name="city[]"  class="form-control"> </td>
        </tr>
    
    
    
    
    <tr>
    <th>State </th>
  
    <td> <input type="text" name="state[]"  class="form-control"> </td>
    </tr>
    
    
    
    <tr>
        <th>Country </th>
     
        <td> <input type="text" name="country[]"  class="form-control"> </td>
        </tr>
    
        
    
    
    <tr>
        <th>Zip </th>
        
        <td> <input type="text" name="zip" class="form-control"> </td>
        </tr>
        
@endif
       
        </table>
        <tr>
            <td> {{Form::submit('Save')}} </td>
        </tr>
        
        {{Form::close()}}
        </div>











    </div>
</div>



<script>
 $(document).ready(function(){
            $(".get_other_details").on("click", function(){
                
            var data_class = $(this).attr("data-id");
            var unique_id = "<?php echo session()->get('unique_id_sess') ?>";
                
            
            
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            
            $.ajax({
            type: "get",
            url: "{{url('get_other_details')}}?a="+unique_id+"&data_class="+data_class,
            
            success: function(data){
    
    if(data  == 0){
        $('.my-table').hide();
        $('#get_get_other_details_dynamic').empty();
       
        $('#get_get_other_details_dynamic').append('<tr ><th>From</th><td> <input type="text" name="from[]" class="form-control date"></td></tr><tr><th>To</th><td> <input type="text" name="to[]"class="form-control date"></td></tr><tr><th> Purpose</th><td> <input type="text" name="purpose[]" class="form-control" ></td></tr><th>Address</th><td> <input type="text" name="address[]" class="form-control"></td></tr><tr><th> City</th><td> <input type="text" name="city[]" class="form-control"></td></tr><tr><th>State</th><td> <input type="text" name="state[]" class="form-control"></td></tr><tr><th>Country</th><td> <input type="text" name="country[]" class="form-control"></td></tr><tr><th>Zip</th><td> <input type="text" name="zip" class="form-control"></td></tr>') ;
        $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});

        $('.date').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});

        $('.get_education_dynamic_prev').hide();
    }
    else{
        $('.my-table').hide();
                $('#get_get_other_details_dynamic').empty();
                // document.querySelector('#get_get_other_details_dynamic tr td:last').style="display:none";

                        $.each(data, function(key, value){
                         
                        
                        $('#get_get_other_details_dynamic').append('<tr ><th>From</th><td> '+this.form+'</td><td> <input type="text" name="from[]" value="'+this.from+'"class="form-control date"></td></tr><tr><th>To</th><td> '+this.to+'</td><td> <input type="text" name="to[]" value="'+this.to+'"class="form-control date"></td></tr><tr><th> Purpose</th><td> '+this.purpose+'</td><td> <input type="text" name="purpose[]" value = "'+this.purpose+'" class="form-control" ></td></tr><th>Address</th><td> '+this.address+'</td><td> <input type="text" name="address[]" value = "'+this.address+'" class="form-control"></td></tr><tr><th> City</th><td>'+this.city+'</td><td> <input type="text" name="city[]" value="'+this.city+'" class="form-control"></td></tr><tr><th>State</th><td> '+this.state+'</td><td> <input type="text" name="state[]" value="'+this.state+'" class="form-control"></td></tr><tr><th>Country</th><td>'+this.country+'</td><td> <input type="text" name="country[]" value="'+this.country+'" class="form-control"></td></tr><tr><th>Zip</th><td> '+this.zip+'</td><td> <input type="text" name="zip" value="'+this.zip+'" class="form-control"></td></tr>');
                        $('.datepicker').datepicker({autoclose:true,format:"dd/mm/yyyy",defaultViewDate:"today"});
                        
                        $('.date').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
                        $('.get_education_dynamic_prev').hide();
                    })
    }
          
       
            }
            });
            
            });
            });
</script>







    


<script>

  
    $(document).ready(function(){
        // $('.update-button-client td').style.display= "table-cell ";
        $('#other_detail_overview').find('table').find('tr').find('td:last').hide();
            $('#other_detail_overview_edit').click(function(){
                var a  = $('#other_detail_overview_edit').text();
                if(a == "Back"){
                    $('#other_detail_overview').find('table').find('tr').find('td:first').show();
                $('#other_detail_overview').find('table').find('tr').find('td:last').hide();
                $('#other_detail_overview').find('table').find('tr').find('input[type="submit"]').hide();        
                $('#other_detail_overview_edit').text('Edit');
                }
                else{
    
                $('#other_detail_overview_edit').text('Back');
                $('#other_detail_overview').find('table').find('tr').find('td:first').hide();
                $('#other_detail_overview').find('table').find('tr').find('td:last').show();
                $('#other_detail_overview').find('table').find('tr').find('input[type="submit"]').show();
                }
            });
        });
            
    </script>


<script>
// document.querySelectorAll('#other_detail_overview .nav-item .nav-link:last').setAttribute('class', "active");

document.querySelector('#other_detail_overview .nav-tabs')setAttribute('s','sdad');

</script>

<?php
 use App\Helpers\Helper;
 
  ?>
@extends('header')
@section('index')


<div class="container">

<div class="row">
@include('lead-dashboad-include')   
 
  
  </div>
    <!---First Row---->
    
    <!---Second Row---->
    {{-- @include('student-dashboad-include')
    @include('dead-lead-dashboard-include')
    
    @include('institute-manager-dashboard-include') --}}
      <!----First Card-->
      
      
      <!----Second Card-->
        
      <!----Second Card-->
      
      <!----Third Card-->
        
      <!----Third Card-->	
    </div>
    <!---Second Row---->
    
    <!---Third Row---->
   
    
    
    
    
    </div>
    <!---Third Row---->
  
  </div>
  <!----Second Column------>		
  
  
  <!----Third  Column------>
  <div class="col-md-1">
  
  </div>
  <!----Third Column------>
  
</div>		
<!---- First Row----->
          <!--  Grid row-->
      
      
      <!-------Third row--------->
          <!--Grid row-->
          
    
        
        
        
        
        <!----- Third Row------->
    
    
    
    <!-----------Main layout----------->
    
    <!----Footer------------->
    <?php
    // include('footer.php');
    
    ?>
    <!----Footer------------->
    
    
    
    

</div>

</div>
</div>

<!-- Full Height Modal Right Success Demo-->


<!------------------Scripts----------------->
<!-- <script>
  document.getElementById('graph').style.display = "none";
  $(document).ready(function(){
    $('#toggle_graph_paichart').click(function(){
      $('#chartdiv').toggle();
      $('#graph').toggle();
      
    })
  })
</script> -->



<script>
  $(document).ready(function(){
    $('#branch,#users,#from_date,#to_date,#country').change(function(){
      var users  = $('#users').val();  
      var from_date  = $('#from_date').val();  
      var to_date  = $('#to_date').val();  
      
      var country  = $('#country').val();  
      
      $.ajax({
type: "get",
url: "{{url('ajax/admin-filter-dashboard')}}",

data:{users:users,from_date:from_date,to_date:to_date,country:country},
success: function(data){
 $('#walkin').html(data[0]);
 $('#total_leads').html(data[2]);
 $('#active_leads').html(data[1]);
 $('#inactive_leads').html(data[3]);
 var  len = data[4].length;
 console.log(len);
 
 if(data[4].length > 0){
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').empty();
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
`<tbody class="tbody">
                  <tr><th style=""><h5>Recent Activities</h5></th></tr>  `));
 for(var i=0; i<len; i++ ){  
  
 $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
   `              
                  <tr><td style="padding-top:7px;"><p style="color:blue;">
                    `+data[4][i]['name']+`
                   </p><p style="margin-bottom:0px;"> `+data[4][i]['status']+` <small style="margin-left:170px;"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                    
                    `+data[4][i]['created_at']+`                 
                 <small>    Posted</small></small></p></td></tr>
                </tbody>`
 ))
 
 }
 $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
`</tbody> `));
 }else{
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').html((
   `<tbody class="tbody">
                  <tr><th style=""><h5>Recent Activities</h5></th></tr>
                  <tr><td>No Record Found</td></tr>
                  <small>    Posted</small></small></p></td></tr>
                </tbody>`
  ))
 }

 
}
      })
    })
    
    $('#users').multiselect({
       onChange:function(option,checked){}})

       $('#country').multiselect({
       onChange:function(option,checked){}})

       $('#department').multiselect({
       onChange:function(option,checked){}})

       

   $('#branch').multiselect({
       onChange:function(option,checked){
        $('#department').html('');
         $('#department').multiselect('rebuild');
         var selected  = this.$select.val();
         if(selected.length > 0){
           $.ajax({
             url:"ajax/get-department",
             method:"GET",
             data:{branch:selected},
             success:function(data){
               $('#department').html(data);
               $('#department').multiselect('rebuild');
             }
           })
         }
       }
   })
   
  })
</script>
<!----Footer------------->
<script>
  window.addEventListener('load', fn, false )
function fn(){document.querySelector('#id-66-title').parentElement.style.display = "none";}
 (function(){ document.querySelector('#id-66-title').parentElement.style.display = "none"}
  )();
  </script>
  @endsection
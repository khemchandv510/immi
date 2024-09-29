 
 
 
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
 
  
    <!-- End of Content Wrapper -->

  
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  {{-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> --}}

  <!-- Logout Modal-->
  {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div> --}}



  {{-- <script src="{{ asset('public/js/app.js') }}"></script>    --}}
  {{-- <script src="{{URL::asset('public/js/ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js')}}"></script> --}}
  {{-- <script src="{{URL::asset('public/js/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script> --}}
  
  
 {{-- <script src="vendor/jquery/jquery.min.js"></script>   --}}
  {{-- <script src="{{URL::asset('public/js/bootstrap.bundle.min.js')}}"></script> --}}
  <!-- Core plugin JavaScript-->
  <script src="{{URL::asset('public/js/jquery.easing.min.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{URL::asset('public/js/sb-admin-2.min.js')}}"></script>

  {{-- <script src="{{URL::asset('public/js/materialize.min.js')}}"></script> --}}
  
  {{-- <script src="{{URL::asset('public/js/code.jquery.com/jquery-1.12.4.js')}}"></script> --}}

     {{-- <script src="public/js/script.js"></script> --}}
  <!-- Page level plugins -->
  {{-- <script src="{{URL::asset('public/js/Chart.min.js')}}"></script> --}}

  <!-- Page level custom scripts -->
  {{-- <script src="{{URL::asset('public/js/chart-area-demo.js')}}"></script>
  <script src="{{URL::asset('public/js/chart-pie-demo.js')}}"></script>  --}}
   {{-- <script src="{{URL::asset('public/js/ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>  --}}

   {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
   {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
   {{-- <script src="{{URL::asset('public/js/ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js')}}"></script> --}}

   <script src="{{URL::asset('public/js/code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
   
   <script src="{{URL::asset('public/js/cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js')}}"></script> 

   <script src="{{URL::asset('public/js/cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js')}}"></script>
   
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script> --}}

<script src="{{url('public/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js')}}"></script>
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<script src="{{url('public/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js')}}"></script>

    

   {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
   <script>
         $('.datepicker').datepicker({
    // format: 'mm/dd/yyyy',
    // startDate: '-3d'
});
$('.date').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.travelled_before_from').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.travelled_before_to').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.work_start_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.work_end_date_modal').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    $('.date-of-marriage').datepicker({autoclose:true,format:"dd/mm/yyyy", todayHighlight: true});
    // $('#date').datepicker({});
  //   $('.date').datepicker({
  //     format: "dd-mm-yyyy",
  //     content: "dd-mm-yyyy" ,
  //     singleDatePicker: true,
  // showDropdowns: true,
  //   });
    $('.date').attr("placeholder","dd-mm-yyyy");
    $('.travelled_before_from').attr("placeholder","dd-mm-yyyy");
    $('.travelled_before_to').attr("placeholder","dd-mm-yyyy");
    $('.work_start_date_modal').attr("placeholder","dd-mm-yyyy");
// $('.form-control').datepicker({
  
// })
// $("#reset").selectpicker("refresh");
// $("#reset").val('default').selectpicker("refresh");
    </script>
{{-- <script src="{{url('public/js/mdb.min.js')}}"></script> --}}

<script src="{{URL::asset('public/js/main.js')}}"></script>
<script src="{{URL::asset('public/js/main2.js')}}"></script>
<script>
    
 
 
  window.onload = function(){
       var val = document.querySelectorAll('[name="priority"]');
       i = 0;
       val.forEach(e => {
           var sel =  e.selectedIndex;
           e.onchange = function(){
            // console.log(e.getAttribute("course-id"))
              // var course_id = document.querySelectorAll('[course-id]')[i].getAttribute("course-id");
              var course_id = e.getAttribute("course-id");
              var value = e.value;
              var unique_id = "{{session()->get('unique_id_sess')}}";
              if(confirm('Are you sure you want to update this?')){
                
                console.log(course_id)
                    $.ajax({
                        type: "GET",
                        url: "{{url(Request::segment(1).'/'.'update-priority')}}?course_id="+course_id+"&unique_id="+unique_id+"&val="+value,
                        success: function(data){
                            // console.log(data);
                                  window.location.href="";
                            }
                    })
                 }else{
                  e.selectedIndex= sel;
                 }
                 i++;
       }});
  
  }
  </script>
  

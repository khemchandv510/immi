@extends('header')
@section('add-institution')
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h3>Add Institution</h3>
        <div class="container my-5">
     <!-- <form action="company_info.html "> -->
     {{ Form::open(array('url' => 'add-institution')) }}
            <div class="row content-color">
                
                
                  <div class="col-md-4 py-3 ">University/Institute Name :</div>
                   <div class="col-md-8 py-3 ">
                   <!-- <input type="text" class="form-control" placeholder="Trading Name"> -->
                   {!! Form::text('trading_name',null, array('placeholder' => 'Name', 'class' => 'form-control' )) !!}
                   <?php echo ($errors->first('trading_name',"<li class='custom-error'>:message</li>")) ?>
                   </div>

                   {{-- <div class="col-md-4 py-3 ">Legal Name :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('legal_name',null, array('placeholder' => 'Legal Name', 'class' => 'form-control' )) !!}
                   </div> --}}

                   <div class="col-md-4 py-3 ">Code :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('code',null, array('placeholder' => 'Code', 'class' => 'form-control' )) !!}
                   <?php echo ($errors->first('code',"<li class='custom-error'>:message</li>")) ?>
                   </div>

                   <div class="col-md-4 py-3 ">Phone :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::number('phone',null, array('placeholder' => 'Phone', 'class' => 'form-control', 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Email :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::email('email',null, array('placeholder' => 'Email', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Landline :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('landline',null, array('placeholder' => 'Landline', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Website :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('website',null, array('placeholder' => 'Website', 'class' => 'form-control' )) !!}
                   </div>

                 
                   



                   <div class="col-md-4 py-3">Country:  </div>
                   <div class="col-md-8 py-3">
                         <?php $countries =  DB::table('countries')->get();  ?>
                       <select name="country" id="" class="form-control" onChange="getState(this.value);">
                           <option value="" Selected disabled>--Select--</option>
                           
                       @foreach($countries as $c)
                     <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
         
                   @endforeach
               </select>
         </div>


          <div class="col-md-4 py-3">State:  </div>
                   <div class="col-md-8 py-3">
                                <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                           <option value="" >--Select--</option>
                                </select>
         </div>
                   <div class="col-md-4 py-3">City/Town:  </div>
                   <div class="col-md-8 py-3">
                       <select name="city" id="city-list" class="form-control" >
                           <option value="" >--Select--</option>
                   </select>
                   </div>





                   

                   <div class="col-md-4 py-3 ">Street :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('streat',null, array('placeholder' => 'Street', 'class' => 'form-control' )) !!}</div>

                   <div class="col-md-4 py-3 ">Postal Code :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::number('postal',null, array('placeholder' => 'Postal Code', 'class' => 'form-control', 'onKeyPress' => 'if(this.value.length == 6) return false;' )) !!}</div>



                  


                   <div class="col-md-4 py-3 ">Remarks :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('remark',null, array('placeholder' => 'Remark', 'class' => 'form-control' )) !!}</div>

                   <div class="col-md-12 text-center my-4" >
                   
                   {!! Form::submit('Submit',array('class' => 'btn btn-danger w-10' )) !!}
                   {!! Form::reset('Reset',array('class' => 'btn btn-danger w-10' )) !!}
                  </div>
               
            </div>
            {{ Form::close() }} 
     </div>
    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



      <script>
        
      function getState(val) {
          $.ajax({
          type: "get",
          url: "{{url('add-institute-state')}}?id="+val,
          success: function(data){
              $('#state-list').empty();
                              $.each(data, function(key, value) {
                                  $('#state-list').append('<option value="'+ this.state_id +'">'+ this.state_name +'</option>');
                              });
              }
          });
      }
      
      function getCity(val) {
      $.ajax({
      type: "get",
      url: "{{url('add-institute-city')}}?id="+val,
      success: function(data){
              $('#city-list').empty();
              $.each(data, function(key, value) {
                                  $('#city-list').append('<option value="'+ this.city_name +'">'+ this.city_name +'</option>');
                              });
      }
      });
      }
      
      </script>
      

@endsection
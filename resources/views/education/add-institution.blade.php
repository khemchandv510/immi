@extends('header')
@section('add-institution')
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="container my-2">
     <!-- <form action="company_info.html "> -->
     {{ Form::open(array('url' => 'admin/add-institution','method'=>'POST', 'enctype'=>'multipart/form-data')) }}
            <div class="row content-color">
                <div class="col-md-12 mt-3"> <h3>Add Institution</h3></div>
                
            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-school"></i></span>
                    {!! Form::text('trading_name',null, array('placeholder' => 'University/Institute Name', 'class' => 'form-control' )) !!}
                   <?php echo ($errors->first('trading_name',"<li class='custom-error'>:message</li>")) ?>
                 </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-school"></i></span>
                    {!! Form::text('code',null, array('placeholder' => 'Code', 'class' => 'form-control' )) !!}
                   <?php echo ($errors->first('code',"<li class='custom-error'>:message</li>")) ?>
                 </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
                    {!! Form::number('phone',null, array('placeholder' => 'Phone', 'class' => 'form-control', 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-envelope-open-text"></i></span>
                    {!! Form::email('email',null, array('placeholder' => 'Email', 'class' => 'form-control' )) !!}
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-tty"></i></span>
                    {!! Form::text('landline',null, array('placeholder' => 'Landline', 'class' => 'form-control' )) !!}
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                    {!! Form::text('website',null, array('placeholder' => 'Website', 'class' => 'form-control' )) !!}
                 </div>
            </div>


            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-globe"></i></span>
                    <?php $countries =  DB::table('countries')->get();  ?>
                    <select name="country" id="" class="form-control" onChange="getState(this.value);">
                        <option value="" Selected disabled>--Country--</option>
                        
                    @foreach($countries as $c)
                  <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
      
                @endforeach
            </select>
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-atlas"></i></span>
                    <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                        <option value="" >--State--</option>
                             </select>
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fab fa-buffer"></i></span>
                    <select name="city" id="city-list" class="form-control" >
                        <option value="" >--City/Town--</option>
                </select>
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-building"></i></span>
                    {!! Form::text('streat',null, array('placeholder' => 'Street', 'class' => 'form-control' )) !!}
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-road"></i></span>
                    {!! Form::number('postal',null, array('placeholder' => 'Postal Code', 'class' => 'form-control', 'onKeyPress' => 'if(this.value.length == 6) return false;' )) !!}
                 </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                    {!! Form::text('remark',null, array('placeholder' => 'Remark', 'class' => 'form-control' )) !!}
                 </div>
            </div>
             <div class="col-md-4 mt-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-file"></i></span>
                    {!! Form::file('logo',null, array('placeholder' => 'Logo', 'class' => 'form-control')) !!}
                 </div>
            </div>

            <div class="col-md-12 text-center my-4" >
                   
                {!! Form::submit('Submit',array('class' => 'btn btn-danger w-10' )) !!}
                {!! Form::reset('Reset',array('class' => 'btn btn-danger w-10' )) !!}
               </div>

                {{-- kaushik end --}}
               
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
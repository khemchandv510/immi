@extends('header')
@section('update-institution')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="container my-5">
            <h3>Update Institution</h3>
         @if(!empty($get_institutes))
         
            @foreach($get_institutes as $get_institutes_value)
                
                {{Form::open(array('url'  =>  'education/update-institution/'.Crypt ::encrypt($get_institutes_value->unique_id)))}}
                <div class="row content-color">
                    
                    
                        <div class="col-md-4 py-3 ">University/Institute Name :</div>
                        <div class="col-md-8 py-3 ">
                        
                        {!! Form::text('name',$get_institutes_value->name, array( 'class' => 'form-control'  )) !!}
                        </div>
     
                        {{-- <div class="col-md-4 py-3 ">Legal Name :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('legal_name',$get_institutes_value->legal_name, array('placeholder' => 'Legal Name', 'class' => 'form-control' )) !!}
                        </div> --}}
     
                        {{-- <div class="col-md-4 py-3 ">Code :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('code',$get_institutes_value->code, array('placeholder' => 'Code', 'class' => 'form-control' )) !!}
                        </div> --}}
     
                        <div class="col-md-4 py-3 ">Phone  :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::number('phone',$get_institutes_value->phone, array('placeholder' => 'Phone', 'class' => 'form-control' , 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                        </div>
     
                        <div class="col-md-4 py-3 ">Email :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::email('email',$get_institutes_value->email, array('placeholder' => 'Email', 'class' => 'form-control' )) !!}
                        </div>
     
                        <div class="col-md-4 py-3 ">Fax :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('fax',$get_institutes_value->fax, array('placeholder' => 'Fax', 'class' => 'form-control' )) !!}
                        </div>
     
                        <div class="col-md-4 py-3 ">Website :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('website',$get_institutes_value->website, array('placeholder' => 'Website', 'class' => 'form-control' )) !!}
                        </div>
     
     
    
                        



                        <div class="col-md-4 py-3">Country:  </div>
                        <div class="col-md-8 py-3">
                              <?php $countries =  DB::table('countries')->get();  ?>
                              <?php 
                              $country = DB::table('countries')->where('country_id',$get_institutes_value->country)->get();
                                       
                                          ?>
                            <select name="country" id="" class="form-control" onChange="getState(this.value);">
                                @if($country->count() > 0)
                                
                                <option value="{{$get_institutes_value->country}}" Selected >--{{$country[0]->country_name}}--</option>
                                @else
                                
                                <option disabled Selected >--Select--</option>
                                @endif
                            @foreach($countries as $c)
                          <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
              
                        @endforeach
                    </select>
                    
              </div>
     
              {{-- @dd($get_institutes_value->state); --}}
               <div class="col-md-4 py-3">State:  </div>
                        <div class="col-md-8 py-3">
            <?php     $state = DB::table('states')->where('state_id',$get_institutes_value->state)->get();                         ?>
                                     <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                                            
                                            @if($state->count() > 0)
                                <option value="{{$state[0]->state_id}}" >--{{$state[0]->state_name}}--</option>
                                @else
                                <option value="">--Selected--</option>
@endif
                                     </select>
              </div>
                        <div class="col-md-4 py-3">City/Town:  </div>
                        <div class="col-md-8 py-3">
                            <select name="city" id="city-list" class="form-control" >
                                <option value="{{$get_institutes_value->city}}" >--{{$get_institutes_value->city}}--</option>
                        </select>
                        </div>
     



{{-- 
                        <div class="col-md-4 py-3 ">Country :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('country',$get_institutes_value->country, array('placeholder' => 'Country', 'class' => 'form-control' )) !!}
                        </div>
     
                        <div class="col-md-4 py-3 ">State :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('state',$get_institutes_value->state, array('placeholder' => 'State', 'class' => 'form-control' )) !!}
                        
                        </div>
     
                        <div class="col-md-4 py-3 ">City :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('city',$get_institutes_value->city, array('placeholder' => 'City', 'class' => 'form-control' )) !!}
                        </div> --}}





                        <div class="col-md-4 py-3 ">Street :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('address',$get_institutes_value->address, array('placeholder' => 'Street', 'class' => 'form-control' )) !!}</div>
     
                        <div class="col-md-4 py-3 ">Postal Code :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('postal_code',$get_institutes_value->postal_code, array('placeholder' => 'Postal Code', 'class' => 'form-control', 'onKeyPress' => 'if(this.value.length == 6) return false;' )) !!}</div>

     
                        <div class="col-md-4 py-3 ">Remarks :</div>
                        <div class="col-md-8 py-3 ">
                        {!! Form::text('remark',$get_institutes_value->remark, array('placeholder' => 'Remark', 'class' => 'form-control' )) !!}</div>
     
                        <div class="col-md-12 text-center my-4" >
                        
                        {!! Form::submit('Submit',array('class' => 'btn btn-danger w-10' )) !!}
                        {!! Form::reset('Reset',array('class' => 'btn btn-danger w-10' )) !!}
                       </div>
                   @endforeach
                   @endif
                       {{ Form::close() }} 
         </div>
         </div>
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

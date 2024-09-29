@extends('header')
@section('commissionstructure')
</div>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Commission Structure</button>

<table class="table">
    <thead>
        <tr> <th> Name </th>
             <th colspan="2"> Action </th>
         </tr>
    </thead>
    <tbody>
        <tr>
            <td> First 4Tps  </td>
            <td  class="fa fa-edit" data-toggle="modal" data-target="#myModal2" >Edit Icon  </td>
            <td  class="fa fa-remove">Delete Icon  </td>
        </tr>

        <tr>
            <td> First 4Tps  </td>
            <td  class="fa fa-edit" data-toggle="modal" data-target="#myMol" >Edit Icon  </td>
            <td  class="fa fa-remove">Delete Icon  </td>
        </tr>
    </tbody>
</table>




{{-- model --}}

<div class="container">

        <!-- Trigger the modal with a button -->
     
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Commission Structure</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"> <p> Commission Structure Name </p>

                        </div>
                        <div class="col-sm-6">  {{ Form::text('commission_name',null, array('class', 'form-control')) }} </div>
                    </div>
                    {{-- second row --}}
                    <div class="row">
                            <div class="col-sm-4">
                    {{ Form::radio('flat_rate_full_period',null, array('class', 'form-control')) }} <label for=""> Flat Rateb Full Period </label>

                            </div>
                        </div>

                        {{-- third row --}}
                        <div class="row">
                                <div class="col-sm-4">
                        {{ Form::radio('variable_rate_fixed_period',null, array('class', 'form-control')) }} <label for="">Valriable Rate For Fixed Period </label>
    
                                </div>
                            </div>

                            {{-- forth row --}}
                            <div class="row">
                                    <div class="col-sm-4">
                            {{ Form::radio('bonus_commission',null, array('class', 'form-control')) }} <label for="">Bonus Commission </label>
        
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-sm-12">
                                                {{ Form::submit('Save',null, array('class', 'form-control')) }}
                                        </div>
                                    </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
{{-- end model --}}







{{-- model 2 --}}

<div class="container">

        <!-- Trigger the modal with a button -->
     
      
        <!-- Modal -->
        <div class="modal fade" id="myModal2" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Commission Structure</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"> <p> Commission Structure Name </p>

                        </div>
                        <div class="col-sm-6">  {{ Form::text('commission_name',null, array('class', 'form-control')) }} </div>
                    </div>
                    {{-- second row --}}
                    <div class="row">
                            <div class="col-sm-4">
                    {{ Form::radio('flat_rate_full_period',null, array('class', 'form-control', 'onclick' => 'show_full_period()')) }} <label for=""> Flat Rate Full Period </label>

                            </div>

{{-- open radio --}}
<div class="col-sm-4">      {{ Form::text('flat_rate_percent',null, array('class', 'form-control')) }}   </div>
<div class="col-sm-3">   
<select name="" id="">
    <option value=""> Percentage </option>    
    <option value=""> Account </option>    
</select>    
</div>

<script>
function show_full_period(){

}

</script>
{{-- end radio --}}



                        </div>

                        {{-- third row --}}
                        <div class="row">
                                <div class="col-sm-12">
                        {{ Form::radio('variable_rate_fixed_period',null, array('class', 'form-control')) }} <label for="">Valriable Rate For Fixed Period </label>
    
                                </div>

{{-- radio button open --}}
<div class="row">
        <div class="col-sm-4">
            <p>No Of Teaching Periods</p>
            {{ Form::text('fixed_teaching_period',null, array('class', 'form-control')) }} 
        </div>
    
        <div class="col-sm-4">
                <p>Commission Period</p>
              <select name="" id="">
                  <option value=""> 1 </option>
                  <option value=""> 1 </option>
              </select>
            </div>

            <div class="col-sm-4">
                    {{ Form::submit('Add',null, array('class', 'form-control')) }} 
                    {{ Form::reset('Reset',null, array('class', 'form-control')) }} 
            </div>

    </div>

    <div class="row">
        <table>
            <tr>
                <td>TP 1</td>
                <td>  {{ Form::text('fixed_teaching_period2',null, array('class', 'form-control')) }}  </td>
                <td> <select name="" id="">
                    <option value="">Percentage </option>
                    <option value="">Account </option>
                </select>
                     </td>
               
            </tr>

            <tr>
                    <td>TP 2</td>
                    <td>  {{ Form::text('fixed_teaching_period2',null, array('class', 'form-control')) }}  </td>
                    <td> <select name="" id="">
                        <option value="">Percentage </option>
                        <option value="">Account </option>
                    </select>
                         </td>
                   
                </tr>


                <tr>
                        <td>TP 3</td>
                        <td>  {{ Form::text('fixed_teaching_period2',null, array('class', 'form-control')) }}  </td>
                        <td> <select name="" id="">
                            <option value="">Percentage </option>
                            <option value="">Account </option>
                        </select>
                             </td>
                       
                    </tr>


                    <tr>
                            <td>TP 4</td>
                            <td>  {{ Form::text('fixed_teaching_period2',null, array('class', 'form-control')) }}  </td>
                            <td> <select name="" id="">
                                <option value="">Percentage </option>
                                <option value="">Account </option>
                            </select>
                                 </td>
                           
                        </tr>


        </table>
    </div>

{{-- end radio button open --}}


                            </div>

                            {{-- forth row --}}
                            <div class="row">
                                    <div class="col-sm-4">
                            {{ Form::radio('bonus_commission',null, array('class', 'form-control')) }} <label for="">Bonus Commission </label>
        
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-sm-12">
                                                {{ Form::submit('Save',null, array('class', 'form-control')) }}
                                        </div>
                                    </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
{{-- end model --}}


@endsection
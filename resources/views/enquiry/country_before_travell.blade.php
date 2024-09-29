<div role="tabpane" class="tab-pane " id="country_before_travell">
    <div class=" " data-toggle="modal" data-target="" >
    <h4>
    Country Travelled Before</h4>
    <hr>
    
    <table>
        @if($enq_travelled_historys->count()> 0)
        @foreach($enq_travelled_historys as $f)
        <tr><td>
            {!! $f->travelled_before_country !!}    
        </td>
    <td> {!! $f->travelled_before_from !!}</td>
    <td> {!! $f->travelled_before_to !!}</td>
    <td> {!! $f->travelled_before_duration !!}</td>
    <td>
      
        <div class="client-detail-edit-button" style="display: flex;justify-content: center;">
    <button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#country_tarvelled_before_edit{{$f->id}}" class="">Edit</button>
            {{Form::open(array('url'=>'delete-country-history'))}}
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
            <input type="hidden" value="{{$f->id}}" name="id">
            <input type="hidden" value="{{$f->travelled_before_country}}" name="travelled_before_country">
                <button type="submit">Delete</button>
                {{Form::close()}}
            </form>
        </div>
        
    </td>
    </tr>
        @endforeach
    
        <tr>      <td colspan="5" >  
        <div style="text-align: right">
         <button type="button"  data-toggle="modal" data-target="#country_tarvelled_before_edit" class="add-button-design">   + </button>
         </div>
          </td></tr>
          
    @else 
    <tr><td> 
        <p class="no-record">No Record Found!</p>
    <p class="no-record">No Record Found!</p>
    </td></tr>
    <tr>      <td colspan="5"> 
    <div style="text-align: right">
      <button type="button"  data-toggle="modal" data-target="#country_tarvelled_before_edit" class="add-button-design">   + </button> 
      </div>
      </td></tr>
    
    
        @endif
    </table>
    
    </div>    








<style>.financial-by{display: none}</style>
@if($enq_travelled_historys->count()> 0)
            @foreach($enq_travelled_historys as $f)
<div id="country_tarvelled_before_edit{{$f->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Country Travelled Before  </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'update-visa-rejected'))}}
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<table class="table add-financial ">
            <tr > <td>  
                <label for="">Country</label>
            <input type="text" name="travelled_before_country" class="form-control " value="{!! $f->travelled_before_country !!}" readonly>


             </td>
            <td>     <label for="">From</label>    <input type="text" name="travelled_before_from"  value="{!! $f->travelled_before_from !!}"  class="form-control date" >  
            </td>

            <td>     <label for="">To</label>    <input type="text" name="travelled_before_to"  value="{!! $f->travelled_before_to !!}"  class="form-control date" >  
            </td>
            <td>     <label for="">Duration</label>    <input type="text" name="travelled_before_duration"  value="{!! $f->travelled_before_duration !!}"  class="form-control" placeholder="Duration" >  
            </td>
            
            </tr>
            </table>
            {{Form::submit('Update')}}
{{Form::close()}}
          </div>
      </div>
    </div>
</div>
@endforeach
@endif


            
     
            <div id="country_tarvelled_before_edit" class="modal fade " role="dialog">
      <div class="modal-dialog">    
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Country Travelled Before </h4>
                      </div>
                      <div class="modal-body">
                        {{Form::open(array('url' => 'update-visa-rejected'))}}
            <table class="table add-financial ">
<tr><td>
    <label for="">Country</label>
                    <select class="form-control" name="travelled_before_country">
                            <option disabled selected>--Select--</option>    
                            @foreach($country as $c)
                            <option value="{{$c->country_name}}"> {{$c->country_name}} </option>
                        @endforeach
                            
                            </select>  
                            
                        
                        </td>
                        
            <td> 
                <label for="">From</label>
                {!! Form::text('travelled_before_from', null, array('class'=>'form-control date')) !!}  </td>
            <td>
                <label for="">To</label>
                {!! Form::text('travelled_before_to', null, array('class'=>'form-control date' )) !!}  </td>
            <td> <label for="">Duration</label>   {!! Form::text('travelled_before_duration', null, array('class'=>'form-control', 'placeholder'=>'Enter Duration' )) !!}  </td>
      
      
             </tr>
      
            </table>
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
             {{Form::submit('Add')}} 
            {{Form::close()}}
                </div>
      </div>
    </div>
</div>


<script>
    document.querySelectorAll("[name=travelled_before_country]").forEach(element => {
        element.addEventListener("change",function(){
            var opt = document.createElement("input");
        if(element.value == "Other"){
            document.getElementsByClassName('financial-by').style="display:block";
//             var tr = document.createElement("tr");
//             var td = document.createElement("td");
//             opt.setAttribute("name","financial_by");
// element.parentNode.appendChild(tr.appendChild(td.appendChild(opt)));
            }
            else{
                document.getElementsByClassName('financial-by').style="display:none";
            }

    });
    });
</script>

<hr>
<div>
    <h4>Visa Rejected Country</h4>
</div>
<?php


$enq_visa_rejected_countrys = DB::table('enq_visa_rejected_countrys')->where('enquiry_id',session()->get('unique_id_sess'))
 ->get();
?>
<table>
    @if($enq_visa_rejected_countrys->count()> 0)
    @foreach($enq_visa_rejected_countrys as $f)
    <tr><td>
        {!! $f->country !!}    
    </td>

<td>
  
    <div class="client-detail-edit-button" style="display: flex;justify-content: center;">
{{-- <button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#enq_visa_rejected_countrys_edit{{$f->id}}">Edit</button> --}}
        {{Form::open(array('url'=>'delete-visa-regected-country'))}}
        {{-- <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id"> --}}
        <input type="hidden" value="{{$f->id}}" name="id">
        <input type="hidden" value="{{$f->country}}" name="country">
            <button type="submit">Delete</button>
            {{Form::close()}}
        </form>
    </div>
    
</td>
</tr>
    @endforeach

    <tr>      <td colspan="3" >  <div style="text-align: right"> <button type="button"  data-toggle="modal" data-target="#enq_visa_rejected_countrys_edit" class="add-button-design">   + </button> </div></td></tr>
@else
<tr><td>
<p class="no-record">No Record Found!</p>
</td></tr>
<tr>      <td colspan="3"> <div style="text-align: right">  <button type="button"  data-toggle="modal" data-target="#enq_visa_rejected_countrys_edit" class="add-button-design ">   + </button> </div> </td></tr>


    @endif
</table>



@if($enq_visa_rejected_countrys->count()> 0)
            @foreach($enq_visa_rejected_countrys as $f)
<div id="how_financial_doc_edit{{$f->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Visa Rejected Country </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'update-visa-rejected-country', 'method' => "post",'files'=>'true'))}}
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<table class="table add-financial ">
            <tr > <td>  
                            
            <input type="text" name="doc_name" class="form-control " value="{!! $f->country !!}" readonly>


             </td>
            <td>         <input type="file" name="doc_image"  value="{!! $f->country !!}"  class="form-control" >  
            <input type="text" name="h_doc_image" value="{{$f->country}}">
            </td>
            
            </tr>
            </table>
            {{Form::submit('Update')}}
{{Form::close()}}
          </div>
      </div>
    </div>
</div>
@endforeach
@endif




<div id="enq_visa_rejected_countrys_edit" class="modal fade " role="dialog">
    <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Visa Rejected Country </h4>
                    </div>
                    <div class="modal-body">
                      {{Form::open(array('url' => 'update-visa-rejected-country','files'=>'true', 'method' => "post"))}}
          <table class="table add-financial ">
<tr><td>
    <label for="">Country</label>
                  <select class="form-control" name="country" required>
                          <option disabled selected>--Select--</option>    
                          @foreach($country as $c)
                          <option value="{{$c->country_name}}"> {{$c->country_name}} </option>
                      @endforeach
                          
                          </select>  
                          <input type="text" name="doc_name_hide" class="form-control financial-by" >
                      
                      </td>
          
    
    
           </tr>
    
          </table>
          <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
           {{Form::submit('Add')}} 
          {{Form::close()}}
              </div>
    </div>
  </div>
</div>
</div>


<style>.financial-by{display: none}</style>
@if($enq_financials->count()> 0)
            @foreach($enq_financials as $f)
<div id="how_financial_edit{{$f->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">How student will show financial </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'update-student-financial'))}}
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<table class="table add-financial ">
            <tr > <td>  
                            
            <input type="text" name="financial_by" class="form-control " value="{!! $f->financials_by !!}" readonly>
            

{!! $f->other?'<br> <input type="text" name="other[]" value="'.$f->other.'">':'' !!}

             </td>
            <td>         <input type="number" name="amount"  value="{!! $f->amount !!}"  class="form-control" >  
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


            
     
            <div id="how_financial_edit" class="modal fade " role="dialog">
      <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">How student will show financials </h4>
                      </div>
                      <div class="modal-body">
                        {{Form::open(array('url' => 'update-student-financial'))}}
            <table class="table add-financial ">
<tr><td>
                    <select class="form-control" name="financial_by" onchange="other.call(this,event);">
                            <option disabled selected>--Select--</option>    
                              <option VALUE="Bank loan">Bank loan</option>
                              <option VALUE="Personal Fund">Personal Fund</option>
                              <option VALUE="Family Sponsorship">Family Sponsorship</option>
                              <option VALUE="Third Party Sponsorship">Third Party Sponsorship</option>
                              <option VALUE="Other">Other</option>
                            </select>  
                            
                            
                            <br>
                           <div class="row" style="display:none" >
                                    <input type ="text" name="other[]" class="form-control" placeholder="Other" >
                                  </div>       
                            
                            
                            
                            <input type="text" name="financial_by_hide" class="form-control financial-by" >
                        
                        </td>
            <td>   {!! Form::number('amount', null, array('class'=>'form-control', 'placeholder'=>'Enter Amount' )) !!}  </td>
      
      
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
    document.querySelectorAll("[name=financial_by]").forEach(element => {
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

<br>
<div>
    <h4>How Financial Document</h4>
</div>

<hr>
<?php
use App\Helpers\Helper;
$enq_id_proof_type = Helper::getHowFinancialDoc(session()->get('unique_id_sess'));
 
?>
<table>
    @if($enq_id_proof_type->count()> 0)
    @foreach($enq_id_proof_type as $f)
    
    <tr><td>
        
        {!! $f->doc_name!!}{{($f->other?', '.$f->other:'')}}  
    </td>
<td>  <a href="{{url('public/uploads/image/financial-doc/'.$f->enquiry_id.'/'.$f->doc_image)}}" target="_blank" > {!! $f->doc_image !!}</a> </td>
<td>
  
    <div class="client-detail-edit-button" style="display: flex;justify-content: center;">
<button class="edit-button-design fa fa-detete" data-toggle="modal" data-target="#how_financial_doc_edit{{$f->id}}">Edit</button>
        {{Form::open(array('url'=>'delete-student-financial-doc'))}}
        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
        <input type="hidden" value="{{$f->id}}" name="id">
        <input type="hidden" value="{{$f->doc_name}}" name="doc_name">
            <button type="submit">Delete</button>
            {{Form::close()}}
        </form>
    </div>
    
</td>
</tr>
    @endforeach

    <tr>      <td colspan="3" >  <div style="text-align: right"> <button type="button"  data-toggle="modal" data-target="#how_financial_doc_edit" class="add-button-design">   + </button> </div></td></tr>
@else
<tr><td>
<p class="no-record">No Record Found!</p>
</td></tr>
<tr>      <td colspan="3"> <div style="text-align: right">  <button type="button"  data-toggle="modal" data-target="#how_financial_doc_edit" class="add-button-design ">   + </button> </div> </td></tr>


    @endif
</table>



@if($enq_id_proof_type->count()> 0)
            @foreach($enq_id_proof_type as $f)
<div id="how_financial_doc_edit{{$f->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">How Financial Document </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' => 'update-student-financial-doc', 'method' => "post",'files'=>'true'))}}
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
<table class="table add-financial ">
            <tr > <td>  
                            
            <input type="text" name="doc_name" class="form-control " value="{!! $f->doc_name !!}" readonly>
  {!! $f->other?'<br> <input type="text" name="other[]" value="'.$f->other.'">':'' !!}

             </td>
            <td>         <input type="file" name="doc_image"  value="{!! $f->doc_image !!}"  class="form-control" >  
            <input type="text" name="h_doc_image" value="{{$f->doc_image}}">
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




<div id="how_financial_doc_edit" class="modal fade " role="dialog">
    <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">How Financial Document </h4>
                    </div>
                    <div class="modal-body">
                      {{Form::open(array('url' => 'update-student-financial-doc','files'=>'true', 'method' => "post"))}}
          <table class="table add-financial ">
<tr><td>
                  <select class="form-control" name="doc_name" required onchange="other.call(this,event);">
                          <option disabled selected>--Select--</option>    
                            <option VALUE="Affidavit">Affidavit</option>
                            <option VALUE="ITR">ITR</option>
                            <option VALUE="Bank Statement">Bank Statement</option>
                            
                            <option VALUE="Other">Other</option>
                          </select>  
                          
                          <br>
                           <div class="row" style="display:none" >
                                    <input type ="text" name="other[]" class="form-control" placeholder="Other" >
                                  </div>       
                          
                          
                          
                          
                           <script>
  function other(event){ 
      
 if(this.options[this.selectedIndex].text == "Other"){
                                 
                                  this.nextElementSibling.nextElementSibling.style.display = "block";
 }else{
                                 this.nextElementSibling.nextElementSibling.style.display = "none";
 }
  }
 
 </script>
                          
                          
                          
                          <input type="text" name="doc_name_hide" class="form-control financial-by" >
                      
                      </td>
          <td>   {!! Form::file('doc_image', array('class'=>'form-control','required'=>true, 'accept' =>"image/*,.pdf")) !!}  </td>
    
    
           </tr>
    
          </table>
          <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
           {{Form::submit('Add')}} 
          {{Form::close()}}
              </div>
    </div>
  </div>
</div>

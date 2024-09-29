<?php
use App\Helpers\Helper;
use App\users;
?>

<style>
    .payment-status{
        padding: 6px;
    
    max-width: 95px;
    text-align: center;
    color: #fff;
    border-radius: 10px;
    }
    .payment-status-background-partial{
        background: #E4C908;
    }
    .payment-status-background-unpaid{
        background: #e4082d;
    }
    .payment-status-background-paid{
        background: #4de948;
    }
    table
    {
        box-shadow: 1px 1px 5px 0px;
    }
</style>





<div role="tabpane" class="tab-pane " id="finance">
<div class="" data-toggle="modal" data-target="#previous_company" >
<h4> Payment Details    </h4>
<hr>


<ul class="nav nav-tabs active-tab-payment" role="tablist" >
@if($get_finace_detail->count() > 0) 

@foreach($get_finace_detail as $get)

        <li class="nav-item">
        <a class="nav-link" href="#get_fin{{$get->id}}" role="tab"
        data-toggle="tab">{{$get->payment_for}} </a>
        </li>
        
        @endforeach

        <li class="nav-item">
                <a class="nav-link" href="#fincial_add" role="tab"
                data-toggle="modal" > Add More.. </a>
                </li>
               
    
                @else   
<li class="nav-item">
    <a class="nav-link" data-target="#fincial_add" role="tab"
    data-toggle="modal" > Add Payment Receipt </a>
    </li>
    
@endif

</ul>


@if($get_finace_detail->count() > 0)

<div class="tab-content content-style my-4 tab-content-payment">
@foreach($get_finace_detail as $e) 

<div role="tabpane" class="tab-pane " id="get_fin{{$e->id}}">

    <div style="text-align: right"> 
        <button data-toggle="modal" data-target=".payment_edit{{$e->id}}" class="edit-text edit-button-design fa fa-edit" ></button>
        {{Form::open(array('url'=>'delete-payment', "onsubmit" => "return confirm('Are you sure to delete $e->payment_for ?')",  "method"=>"post", 'style' => "display: initial;"))}}
        <input type="hidden" name="payment_for" value="{{$e->payment_for}}">
    <input type="hidden" name="id" value="{{$e->id}}">

        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">            
<button type="submit" class="delete-text delete-button-design fa fa-trash"></button>
{{Form::close()}}
</div>

<br>
<table class="table add-financial-detail-parent">
<tr><th>Application No.</th>

    <td>{{$e->application_no}}</td>
    </tr>
    
<tr>
    
 <th>
        Payment By</th>
<td>{!! $e->payment_by !!} </td>      
</tr>

<tr>
  <th>Paid Amount</th>
  <td>{{ $e->paid_amount}} </td> </td>
  
</tr>

<tr>
<th >
Paid Date   </th>

<td>  {!! date('d/m/Y',strtotime($e->paid_date )) !!}</td>
</tr>

<tr>
<th>Receipt No</th>
<td> {{$e->receipt_no}} </td>
</tr>


<tr>
<th>
    Gen By   </th>
<td> <?php

            if(is_numeric($e->gen_by) && isset($e->gen_by) &&(!empty($e->gen_by)) ){
                
            $usr = Users::getuser($e->gen_by); 
        //   dd($usr->name);
            ?>
          {{$usr[0]->name?$usr[0]->name:''}}
            <?php
        }    else{
            ?>
            
                 {{$e->gen_by}}
                 <?php
                 
        }
        
        ?></td>
</tr>
<tr>

    <th>
      Gen Date</th>
      
      <td>  {!! date('d/m/Y',strtotime($e->gen_date )) !!}</td>
</tr>


<tr>
    <th >
Receipt  </th>
<td>  <a href="{{url('public/uploads/image/payment-receipt/'.$e->enquiry_id.'/'.$e->receipt)}}" target="_blank">{{$e->receipt}}</a></td>
    
</tr>
</table>



<div id="" class="modal fade payment_edit{{$e->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Payment</h4>
          </div>
          <div class="modal-body">
             
            {{Form::open(array('url' =>'update-payment', 'files'=>true))}}
            <table class="table">
                <tr> 
     <th>Select Application No.</th>
     <td>  
     <?php   
     $application = Helper::get_client_list_course(session()->get('unique_id_sess'));
   $q =   $application->pluck('id','id');
  $q = $q->toArray() ;
  
    ?>
    
   <select  class="form-control" name="application_no">
                  <option value="">select</option>
                  @foreach($application as $s )
              <option value="{{$s->id}}" <?php echo (!empty($q) && array_search($s->id, $q ))  ? 'selected' : ''; ?>>{{$s->id}}</option>;
                @endforeach
              </select> 
     
     </td>
     </tr>
            <tr><th>Paymet For</th><td>
                <input type="text" name="payment_for" class="form-control" value="{{$e->payment_for}}">    
            </td></tr>
            <tr >
                <th>
                    Payment By</th>
            <td>
                <select name="payment_by" id="">

                    @if($e->payment_by == "Online")
                    <option value="Online" selected>Online</option>
                    <option value="Cash">Cash</option>
                    <option value="EFPOS">EFPOS</option>
                    @else
                    <option value="Online">Online</option>
                    <option value="Cash" selected>Cash</option>
                    <option value="EFPOS">EFPOS</option>
                    @endif
                </select>
                                {{-- <input type="text" name="payment_by" class="form-control" value="{{$e->payment_by}}"> --}}
                            </td>
            </tr>
            
            
            <tr>
                            <th>Paid Amount</th>               
            <td>    
                 <input type="number" name="paid_amount"  class="form-control" required value="{{$e->paid_amount}}">  
            </td>   
            </tr>
            <tr>
                <th >
                    Paid Date   </th>
            <td>
                <input type="text" name="paid_date"  class="form-control date" required value="{{date('d/m/Y',strtotime($e->paid_date ))}}">  
            
            </td>   
            </tr>
            
            <tr>
                <th>Receipt No</th>
            <td> 
                <input type="text" name="receipt_no"  class="form-control" required value="{{$e->receipt_no}}">
            </td>
            </tr>
            
            <tr>
                <th>
                    Updated By   </th>
            <td> 
            <?php
          
            // if(is_numeric($e->gen_by) &&  isset($e->gen_by) &&(!empty($e->gen_by)) ){
                 
            $usr = Users::getuser($e->gen_by); 
            
            ?>
             <input type="hidden" name="gen_by"  class="form-control" required  value="{{Auth::user()->unique_id}}"> 
            <input type="text" value={{$usr[0]->name?$usr[0]->name:''}} readonly>
            <?php
    //    }    else{ 
            ?>
             {{-- <input type="hidden" name="gen_by"  class="form-control" required  value="{{Auth::user()->unique_id}}"> 
            <input type="text" value= readonly> --}}
                
                 <?php
                 
                    //  }
        
        ?>
                 
            </td>
            </tr>
            <tr>
                <th>
                    Gen Date</th>
            <td>    
             <input type="text" name="gen_date"  class="form-control date" required  value="{{date('d/m/Y',strtotime($e->gen_date ))}}">    
            </td>   
            </tr>
            
            <tr>
                <th >
                    Receipt  </th>
            <td>
            <a href="{{url('public/uploads/image/payment-receipt/'.$e->enquiry_id.'/'.$e->receipt)}}" target="_blank">{{$e->receipt}}</a>
              <input type="file" name="receipt"  class="form-control" value="{{$e->receipt}}"> 
              
            <input type="hidden" name="h_upload_receipt" value="{{$e->receipt}}">
</td>   
            
 </tr>
            </table>
            
            
            <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
            <input type="hidden" value="{{$e->id}}" name="id">
            {{Form::submit('Save')}}
            {{Form::close()}}



          </div></div></div></div>


        </div>

        @endforeach
        </div>
        @endif
        
{{-- 06-09-2021 --}}
<br> <br>
<h4> Quotation Payment Details     </h4>
<hr>
<?php  
$get_finace_detail2 = db::table('quotations')
->where('customer_unique_id',session()->get('unique_id_sess'))
->get();
?>

<ul class="nav nav-tabs active-tab-payment2" role="tablist" >
    @if($get_finace_detail2->count() > 0) 
    
    @foreach($get_finace_detail2 as $get)
    
            <li class="nav-item">
            <a class="nav-link" href="#get_fin2{{$get->id}}" role="tab"
            data-toggle="tab">{{$get->project_name}} </a>
            </li>
            @endforeach
    @endif
    </ul>


    <div class="tab-content content-style my-4 tab-content-payment2">
        @foreach($get_finace_detail2 as $e) 
        
        <div role="tabpane" class="tab-pane " id="get_fin2{{$e->id}}">
        
            <?php
            $quot =  db::table('enq_payments')->where('enquiry_id',session()->get('unique_id_sess'))
            ->where('razorpay_payment_link_reference_id', $e->refrence_id)
            ->where('status',1)
            ->where('paid_amount','!=','')
            ->get(); 
            $add_amount = 0;
            foreach($quot as $q){
  $add_amount = $q->paid_amount + $add_amount;
            }
          ?>  
          

        <table class="table add-financial-detail-parent">
        <tr><th>Project Name</th>
        <td>{{$e->project_name}}</td>
            </tr>  

            <tr> <th>Item</th> <td> {{ $e->item_name }} </td>
                 </tr>
                 <tr> <th> Description </th> <td>{{ $e->description }}</td>  </tr>
        <tr> <th>Quote Date</th> 
        <td> {{ $e->quote_date }}</td>
        </tr>
        <tr> <th>Item Name</th> <td>{{ $e->item_name }}</td> </tr>
        <tr> <th>Status</th>
             <td> 
                @if($add_amount == 0)
                {!! '<p class="payment-status-background-unpaid payment-status">Unpaid</p>' !!} 
                @elseif($e->total != $add_amount &&  $e->total > $add_amount)
                {!! '<p class="payment-status-background-partial payment-status">Partial Paid</p>' !!}
                @elseif($e->total == $add_amount)
                {!! '<p class="payment-status-background-paid payment-status">Paid</p>' !!}
                @endif
         </td> 
        </tr>

        <tr> <th>Price</th><td> {{ $e->price }}  </td> </tr>
        <tr> <th>Tax</th>  <td> {{ $e->tax }}</td> </tr>
        <tr> <th> Total </th> <td> {{ $e->total }}</td> </tr>

        </table>
<br>
<div> <table class="table">
   
    <tr>
        <th>Receipt No</th> 
        <th> Gen By  </th>
        <th>Date </th>
           <th>Method</th>
    <th>Receipt </th>
    <th>Amount</th> 
    <th>Action</th>
    
    </tr>
  
    @foreach($quot as $q)
    
    <tr>
        <td>  {{ $q->receipt_no }}</td>


        <td> 
             {{-- {{ $q->gen_by }} --}}
        
        <?php 
             
            $usr = Users::getuser($q->gen_by); 
        
            ?>
          {{$usr[0]->name?$usr[0]->name:''}}
        
        </td>


        
        <td> {{ date('d/m/Y', strtotime($q->paid_date)) }} </td> 
        <td> {{ $q->payment_by }} </td>
      
         
         
         <td>  
            <a href="{{url('public/uploads/image/payment-receipt/'.$q->enquiry_id.'/'.$q->receipt)}}" target="_blank">{{$q->receipt}}</a>
        </td>
       
         <td> {{ $q->paid_amount }} </td> 
         
         <td>  {{Form::open(array('url'=>'delete-payment', "onsubmit" => "return confirm('Are you sure to delete $q->receipt_no ?')",  "method"=>"post", 'style' => "display: initial;"))}}
            <input type="hidden" name="receipt_no" value="{{$q->receipt_no}}">
        <input type="hidden" name="id" value="{{$q->id}}">
        <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">            
            
    <button type="submit" class="delete-text delete-button-design fa fa-trash" style="padding: 3px 9px;
    font-size: 12px"></button>
    {{Form::close()}} </td>
    </tr>
  
    @endforeach

    <tr>
        <th colspan="5">Total Paid</th>
        <td>  <strong> {{ $add_amount }}  </strong> </td>
    </tr>
    <tr> 
        <th colspan="5"> Remaining Balance </th>
        <td> <strong> {{ $e->total - $add_amount  }} </strong> </td>
    </tr>
    
    </table>
</div>
<?php  
// if( ($e->total - $add_amount) == 0 ){
// DB::table('enquiries')->where('unique_id', session()->get('unique_id_sess'))->update(['disposition' => 'Payment Done']);
// }elseif(($e->total - $add_amount) > 0 &&  ($e->total != $add_amount)){
//     DB::table('enquiries')->where('unique_id', session()->get('unique_id_sess'))->update(['disposition' => 'Partial Paid']);
// }elseif(!empty($e->total)){
//     DB::table('enquiries')->where('unique_id', session()->get('unique_id_sess'))->update(['disposition' => 'Pending']);
// }
?>

@if( ($e->total - $add_amount) > 0 )

<li class="nav-item"style="text-align: right;
list-style: none;
color: #56753a;
font-size: 18px;
font-weight: 600;">
    <a class="nav-link" data-target="#add_amount{{ $e->id }}" role="tab"
    data-toggle="modal" > Add Payment </a>
    </li>
@endif
    <div id="add_amount{{ $e->id }}" class="modal fade " role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Payment  </h4>
              </div>
              <div class="modal-body">
                {{Form::open(array('url' =>'update-payment', 'files'=>true))}}
    <table class="table">
        <tr> 
         <th>Project Name</th>
         <td>  
             <input type="text" value="{{ $e->project_name }}" disabled class="form-control">
             
         {{-- <select name="application_no"> --}}
             
         <?php  
            // $application = Helper::get_client_list_course(session()->get('unique_id_sess'));
         
         ?>
             {{-- <option>Select</option>
             @foreach($application as $app)
             <option value="{{$app->id}}">{{$app->id}}</option>
             @endforeach
         </select> --}}
         </td>
         </tr>
    
         <tr><th>Paymet For</th><td>
        <input type="text" name="payment_for" class="form-control"  value="{{ $e->item_name }}" disabled>    
    </td></tr>

    <tr >
        <th>
            Payment By</th>
    <td>
    <select name="payment_by" id="" required>
        <option value="" selected disabled name="" id="">Selected</option>
        <option value="Cash">Cash</option>
        <option value="Online">Online</option>
    </select>
                        
                    </td>
    </tr>
    
    
    <tr>
                    <th>Paid Amount</th>               
    <td>    
        <input type="hidden" name="ttl_amt_paid" value="{{ $add_amount }}">
        <input type="hidden" name="ttl_amt" id="" value="{{ $e->total }}">
         <input type="number" name="paid_amount" value="{{ $e->total - $add_amount  }}" class="form-control" required >  
    </td>   
    </tr>
    <tr>
        <th >
            Paid Date   </th>
    <td>
        <input type="text" name="paid_date" value="{{ date('d/m/Y') }}" class="form-control date" required >  
    
    </td>   
    </tr>
    
    <tr>
        <th>Receipt No</th>
    <td> 
        <input type="text" name="receipt_no" value="" class="form-control" required placeholder="Receipt no" required>
    </td>
    </tr>
    
    <tr>
        <th>
            Gen By   </th>
    <td> 
        <input type="text" value="{{ Auth::user()->name }}" disabled  class="form-control">
         <input type="hidden" name="gen_by"  class="form-control" required placeholder="Gen By" value="{{ Auth::user()->unique_id }}"> 
    </td>
    </tr>
    <tr>
        <th>
            Gen Date</th>
    <td>    
     <input type="text" name="gen_date" value={{ date('d/m/Y', strtotime($e->quote_date)) }} class="form-control date" required placeholder="Gen Date"  disabled>    
    </td>   
    </tr>
    
    <tr>
        <th >
            Receipt  </th>
    <td>
      <input type="file" name="receipt" value="" class="form-control" placeholder="Receipt"> 
    
    </td>   
    
    
    </tr>
    </table>
    
    
    <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
    <input type="hidden" value="{{ $e->refrence_id }}" name="razorpay_payment_link_reference_id">
    {{Form::submit('Save')}}
    {{Form::close()}}
              </div></div>
            </div></div>
{{-- 06-09-2021 --}}
    </div>
    @endforeach


        </div>
     





























<div id="fincial_add" class="modal fade " role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Payment  </h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' =>'update-payment', 'files'=>true))}}
<table class="table">
    <tr> 
     <th>Select Application No.</th>
     <td>  
     <select name="application_no">
         
     <?php     $application = Helper::get_client_list_course(session()->get('unique_id_sess'));
     
     ?>
         <option value="" selected disabled>Select</option>
         @foreach($application as $app)
         <option value="{{$app->id}}">{{$app->id}}</option>
         @endforeach
     </select>
     </td>
     </tr>
<tr><th>Paymet For</th><td>
    <input type="text" name="payment_for" class="form-control" placeholder="Payment For">    
</td></tr>
<tr >
    <th>
        Payment By</th>
<td>
    <select name="payment_by" id="">

     <option value="" selected disabled>Select</option>
        
        <option value="Cash">Cash</option>
        <option value="Online" >Online</option>
        <option value="EFPOS">EFPOS</option>
    </select>
                    {{-- <input type="text" name="payment_by" class="form-control" placeholder="Payment By" > --}}
                </td>
</tr>


<tr>
                <th>Paid Amount</th>               
<td>    
     <input type="number" name="paid_amount" value="" class="form-control" required placeholder="Paid Amount">  
</td>   
</tr>
<tr>
    <th >
        Paid Date   </th>
<td>
    <input type="text" name="paid_date" value="{{ date('d/m/Y') }}" class="form-control date" required >  

</td>   
</tr>

<tr>
    <th>Receipt No</th>
<td> 
    <input type="text" name="receipt_no" value="" class="form-control" required placeholder="Receipt no">
</td>
</tr>

<tr>
    <th>
        Gen By   </th>
<td> 
    <input type="hidden" name="gen_by"  class="form-control" required  value="{{Auth::user()->unique_id}}"> 
    <input type="text" value="{{Auth::user()->name}}" readonly>
     {{-- <input type="text" name="gen_by"  class="form-control" required placeholder="Gen By" value="{{ Auth::user()->unique_id }}">  --}}
</td>
</tr>
<tr>
    <th>
        Gen Date</th>
<td>    
 <input type="text" name="gen_date" value="{{ date('d/m/Y') }}" class="form-control date" required >    
</td>   
</tr>

<tr>
    <th>
        Receipt  </th>
<td>
  <input type="file" name="receipt" value="" class="form-control" placeholder="Receipt"> 

</td>   


</tr>
</table>


<input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">

{{Form::submit('Save')}}
{{Form::close()}}
          </div></div>
        </div></div>

</div></div>

<script>


document.querySelector('.active-tab-payment').children[{{$get_finace_detail->count()-1}}].firstElementChild.
    classList.add('active');
        document.querySelector('.tab-content-payment').children[{{$get_finace_detail->count()-1}}].className += " " + "active";
        document.querySelector('.active-tab-payment2').children[{{$get_finace_detail->count()-1}}].firstElementChild.
    classList.add('active');
        document.querySelector('.tab-content-payment2').children[{{$get_finace_detail->count()-1}}].className += " " + "active";
    
</script>



@extends('header')
@section('student')

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
@endif


   
<style>
    .panel {
    position: relative;
    color: #555;
    background: #FFF;
    margin-bottom: 30px;
    border-radius: 4px;
    box-shadow: 0px 0px 50px -15px rgb(0 0 0 / 33%);
}
.panel-head {
    display: table;
    width: 100%;
    margin: 0;
    color: #555;
    padding: 20px 25px 15px 25px;
    border-bottom: 1px solid #EEE;
}
.panel-head span{
    
    font-weight:600;

}
.spantag{
font-size:23pt;    
}
.rowtag{
    padding: 0;
  }
  
.customer-search .btn.dropdown-toggle {
    padding-right: 27px;
    font-size: 15px;
    font-weight: 400;
    height: 51px;
    line-height: 51px;
    padding: 0 20px;
    color: #555;
    width: 100%;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    box-shadow: 0 1px 3px 0px rgb(0 0 0 / 6%);
    border-radius: 4px;
}
.input-group {
    border: 1px solid #ccc;
    margin-top: 0px;
    margin-left: 2px;
}
.input-group-addon {
    border-radius: 0;
    border-color: #2f5e7f;
    background-color: #2f5e7f;
    padding: 12px 0px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #fff;
    text-align: center;
    border-right: 1px solid #ccc;
    width: 31px;
    height: auto;
    margin: -1px;
}
.table-input th {
    padding: 8px 5px !important;
    color: #666;
    background-color: #f9f9f9;
    border: 1px solid #EEE;
    width:215px;
}
th {
    text-align: center;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
.table-input td {
    padding: 0 !important;
    border: 1px solid #EEE !important;
    background-color: #fff;
}
textarea {
    resize: none;
}
input, textarea {
    font-family: "Poppins", sans-serif;
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: transparent;
    border: 0;
}
textarea {
    overflow: auto;
    color:internal-light-dark(white, white)!important;
}
.btn-sm, .btn-group-sm > .btn {
    padding: 8px 12px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 2px;
}
.btn-success {
    background-color: #0bc36e;
    border-color: #0bc36e;
}
.total-line {
    vertical-align: middle;
    font-size: 14px;
    border-right: 0 !important;
    padding: 0 0 0 10px!important;
    text-align: right;
    margin-right:10px!important;
}
.invoice-items .blank {
    border: 0 !important;
}
/* .invoice-items .total-line{
    text-align: center;
} */
.invoice-items .discountitem{
    text-align:right;
}
label{
    margin-right: 10px!important;
}
.panel-footer {
    border-top: 1px solid #DDD;
    padding: 20px 25px;
}
.fromsessetion{
    border-top: 1px solid #DDD;
    padding: 20px 25px;  
}
.input-group{
    border: none !important;
}
input, textarea, .form-control, .input-group .form-control{
    border: 1px solid #ced4da !important;
    padding-left:10px;
   
}
input{
    width: 88%;
}
.inputtag input{
    width:94%;
}

select{
    height: 35px;
}
.spaninput{
width:93%;    
}

</style>
<body>
    <div class="container">
        <div class="row">
            <div clas="rowtag">
            <div class="col-md-12">    
    <div class="formstart panel">
    <form  action="{{ 'update-quotation' }}" method="post">
        @csrf
    <div class="panel-head">
            <div class="panel-title">
                <i class="icon-calculator panel-head-icon"></i>
                <span class="panel-title-text spantag">Update Quote</span>
            </div>     
     <div class="fromsessetion">
            <div class="row">
	<div class="col-md-6">
    <div class="form-group">
        <input type="hidden" name="customer_unique_id" value="{{ $getData->customer_unique_id }}">
        <input type="hidden" value="{{ $getData->plink }}" name="plink">
			<label class="col-form-label">Customer</label>
			<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
				<input type="text"  class="spaninput" id=""  value="{{$get->name }}" readonly>
                {{-- <textarea name="" id="" cols="30" rows="10"  > {{ $name  }}      </textarea> --}}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group inputtag">
			<label class="col-form-label">Project Name</label>
			<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
				<input type="text" class="form-contro" name="project_name" value="{{ $getData->project_name }}" > </div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="col-form-label">Currency</label>
			<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
            @php 
            $arr = ['INR','USD'];
            @endphp
				<select name="currency" class="custom-select" required="">
                    <option value="">select</option>
                    @foreach($arr as $a)
<option value="{{ $a }}" <?=(!empty($getData->currency) && ($getData->currency == $a))?'selected':'';?>>{{ $a }}</option>
                    @endforeach
					
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="col-form-label">Payment Method</label>
			<div class="input-group">
            <span class="input-group-addon"><i class="fa fa-google-wallet"></i></span>
            @php 
            $arr = ['Cash','Online'];
            @endphp
				<select name="payment_method" class="custom-select" required="">
					<option value="" disabled>Payment Method</option>
                    @foreach ($arr as $a)
                        <option value="{{ $a }}" <?=(!empty($getData->payment_method) && ($getData->payment_method ==$a))?'selected':'';?>>{{ $a }}</option>
                    @endforeach
					
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="col-form-label">Quote Date</label>
            <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    <input class="form-contro date" name="quote_date" type="text" value={{$getData->quote_date?date('d/m/Y',strtotime($getData->quote_date)):''}}> 
                                        </div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="col-form-label">Expiry Date</label>
			<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    <input class="form-contro date" name="quote_expiry_date" type="text" value={{$getData->quote_expire_date?date('d/m/Y',strtotime($getData->quote_expire_date)):''}}> 
                                        </div>
		</div>
	</div>
   
    <table class="table-input table-responsiv" style="width:99% ">
       
                        <thead style="width:100% ">
                            <tr>
                                <th>Item Name</th>
                                <th>Item Description</th>
                                <th>Tax</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="item-row">
                                <td>
                                <textarea class="form-control" id="" name="item_name" rows="2"> {{$getData->item_name?$getData->item_name:''}} </textarea>
                                </td>
                                <td>
                                <textarea class="form-control" id="" name="description" rows="2">  {{$getData->description?$getData->description:''}} </textarea>
                                </td>
                                <td>
                                <textarea class="form-control" id="tax" name="tax" rows="2"  readonly> {{$getData->tax?$getData->tax:''}}</textarea>
                                </td>
                                <td>
                                <textarea class="form-control" id="price" name="price" rows="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">{{$getData->price?$getData->price:''}}</textarea>
                                </td>
                                <td>
                              
                                </td>
                                </tr>
                                <tr class="item-row">  
                                <td colspan="2" class="total-line">
                                    <div class="add-items d-inline-block">
                                      
                                    </div>
                                </td>
                                <td colspan="2" class="total-line">
                                    <label>Sub Total</label>
                                </td>
                                <td colspan="1" class="total-value">
                                    <input type="text" name="total" class="form-transparent sub-total" value={{$getData->price?$getData->price:''}} readonly="" id="sub_total">
                                </td>
                                </tr>
                                <tr class="invoice-items">
                                <td colspan="2" class="total-line">
                                </td>
                                <td colspan="2" class="total-line">
                                    <label>Tax</label>
                                </td>
                                <td colspan="1" class="total-value">
                                    <input type="text" name="" class="form-transparent tax-total" readonly="" id="tax2" value={{$getData->tax?$getData->tax:''}}>
                                </td>
                            </tr>
                            </tr>
                        
                            </tr>
                                <tr class="invoice-items">
                                <td colspan="2" class="total-line">
                                </td>
                                <td colspan="2" class="total-line">
                                    <label>Total</label>
                                </td>
                                <td colspan="1" class="total-value">
                                    <input type="text" name="total" class="form-transparent tax-total"  readonly="" id="total" value={{$getData->total?$getData->total:''}}>
                                </td>
                            </tr>
                                
                        </tbody>
                    </table>
                    
                
</div>



                <div class="panel-footer text-center">
                    <select name="getway" id="getway" required>
                        <option value=""selected>Select</option>
                        <option value="PayU">PayU</option>
                        <option value="Razor Pay">Razor Pay</option>
                    </select>
                    
            <button type="submit" name="submit" class="btn btn-primary btn-gradient btn-pill">Save</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <script>
    
    function add(a, b){
        document.getElementById('total').value ='';
        document.getElementById('total').value = parseInt(a.value)+parseInt(b.value);
    }



        document.getElementById('getway').onchange = function(e){
            tax(e);
            add(document.getElementById('sub_total'), document.getElementById('tax'));
        }




         function tax(e){   
            var price = document.getElementById('price');
            var tax = document.getElementById('tax');
               if(document.getElementById('getway').value == "Razor Pay"){
                document.getElementById('tax2').value = '';   
                document.getElementById('tax2').value = tax.value = Math.round(parseInt(price.value)*.18);    
        }
        else{
            document.getElementById('tax2').value = '';
            document.getElementById('tax2').value =  tax.value = 00;
        }
         }

    

        document.getElementById('price').onchange = function(){

            document.getElementById('sub_total').value = document.getElementById('price').value;
            
tax(document.getElementById('getway').value);
            add(document.getElementById('sub_total'), document.getElementById('tax'));
        }


    </script>

@endsection
<?php

namespace App\Http\Controllers;
use App\quotation;
use App\enq_payments;
use Illuminate\Http\Request;

class UpdatePaymentController extends Controller
{
   function index(){
       
$refrence_id  = app('request')->input('razorpay_payment_link_reference_id');
 $razorpay_payment_link_id  = app('request')->input('razorpay_payment_link_id');

        // enq_payments::create()
        
        $check_valid_user = quotation::where('refrence_id', $refrence_id)
        ->where('plink', $razorpay_payment_link_id)
        ->where('paid_status',0)
        ->first();
        if($check_valid_user){
    $success = enq_payments::create([
            'enquiry_id'                         =>    $check_valid_user->customer_unique_id    ,                    
            'payment_for'                        =>  $check_valid_user->project_name,
            'payment_by'                        =>  'Online',
            'paid_amount'                        =>  $check_valid_user->total,
            'paid_date'                        =>  date('Y-m-d'),
            'receipt_no'                        =>  $check_valid_user->refrence_id,
            'gen_by'                        =>  $check_valid_user->employee_unique_id,
            'gen_date'                        =>  $check_valid_user->quote_date,
            'razorpay_payment_id'                       =>$_GET['razorpay_payment_id'],
            'razorpay_payment_link_id'                        =>$razorpay_payment_link_id,
            'razorpay_payment_link_reference_id'                        => $refrence_id,
            'razorpay_payment_link_status'                        =>$_GET['razorpay_payment_link_status'],
            'razorpay_signature'                        =>$_GET['razorpay_signature']
            ]);
        
            if($success){
                quotation::where('refrence_id', $refrence_id)
        ->where('plink', $razorpay_payment_link_id)
        ->where('paid_status',0)
        ->update(['paid_status' =>1]);
                
                ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
  background:#e5e5e5 none repeat scroll 0 0;
}

#card {
  position: relative;
  width: 320px;
  display: block;
  margin: 40px auto;
  text-align: center;
  font-family: 'Source Sans Pro', sans-serif;
}

#upper-side {
  padding: 2em;
  background-color: #8BC34A;
  display: block;
  color: #fff;
  border-top-right-radius: 8px;
  border-top-left-radius: 8px;
}


#lower-side {
  padding: 2em 2em 5em 2em;
  background: #fff;
  display: block;
  border-bottom-right-radius: 8px;
  border-bottom-left-radius: 8px;
}

#message {
  margin-top: -.5em;
  color: #757575;
  letter-spacing: 1px;
}

#contBtn {
  position: relative;
  top: 1.5em;
  text-decoration: none;
  background: #8bc34a;
  color: #fff;
  margin: auto;
  padding: .8em 3em;
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  border-radius: 25px;
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}

#contBtn:hover {
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}
    </style>
	
</head>
<body>


<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
    <i class="fa fa-check-circle-o" style="font-size: 100px;"></i>
      <h3 id='status'>
      Success
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      Congratulations, your payment has been successfully .
    </p>
    <a href="#" id="contBtn">Back</a>
  </div>
</div>
    		
           
    		</div>
		</div>
    </div>
</section>
     



	</body>
</html>

<?php
            }else{
               ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Failed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
  background:#e5e5e5 none repeat scroll 0 0;
}

#card {
  position: relative;
  width: 320px;
  display: block;
  margin: 40px auto;
  text-align: center;
  font-family: 'Source Sans Pro', sans-serif;
}

#upper-side {
  padding: 2em;
  background-color: #ff0000;
  display: block;
  color: #fff;
  border-top-right-radius: 8px;
  border-top-left-radius: 8px;
}


#lower-side {
  padding: 2em 2em 5em 2em;
  background: #fff;
  display: block;
  border-bottom-right-radius: 8px;
  border-bottom-left-radius: 8px;
}

#message {
  margin-top: -.5em;
  color: #757575;
  letter-spacing: 1px;
}

#contBtn {
  position: relative;
  top: 1.5em;
  text-decoration: none;
  background: #ff0000;
  color: #fff;
  margin: auto;
  padding: .8em 3em;
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  border-radius: 25px;
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}

#contBtn:hover {
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}
    </style>
	
</head>
<body>


<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
    <i class="fa fa-check-circle-o" style="font-size: 100px;"></i>
      <h3 id='status'>
      Failed
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      Sorry we have not recived your payment .
    </p>
    <a href="#" id="contBtn">Back</a>
  </div>
</div>
    		
           
    		</div>
		</div>
    </div>
</section>
     



	</body>
</html>
<?php
            }
        }else{
           ?>
           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
  background:#e5e5e5 none repeat scroll 0 0;
}

#card {
  position: relative;
  width: 320px;
  display: block;
  margin: 40px auto;
  text-align: center;
  font-family: 'Source Sans Pro', sans-serif;
}

#upper-side {
  padding: 2em;
  background-color: #8BC34A;
  display: block;
  color: #fff;
  border-top-right-radius: 8px;
  border-top-left-radius: 8px;
}


#lower-side {
  padding: 2em 2em 5em 2em;
  background: #fff;
  display: block;
  border-bottom-right-radius: 8px;
  border-bottom-left-radius: 8px;
}

#message {
  margin-top: -.5em;
  color: #757575;
  letter-spacing: 1px;
}

#contBtn {
  position: relative;
  top: 1.5em;
  text-decoration: none;
  background: #8bc34a;
  color: #fff;
  margin: auto;
  padding: .8em 3em;
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
  border-radius: 25px;
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}

#contBtn:hover {
  -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
  -webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
}
    </style>
	
</head>
<body>


<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
    <i class="fa fa-check-circle-o" style="font-size: 100px;"></i>
      <h3 id='status'>
      Success
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      Congratulations, your payment has been successfully .
    </p>
    <a href="#" id="contBtn">Back</a>
  </div>
</div>
    		
           
    		</div>
		</div>
    </div>
</section>
     



	</body>
</html>
           <?php
        }
        
}    
    
}

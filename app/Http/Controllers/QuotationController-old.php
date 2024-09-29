<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewUserRegistered;
use App\quotation;
use App\enquiries;
use Auth;
use Mail;
use Session;
class QuotationController extends Controller
{

    public function index(Request $request){
        
      $request->id = explode (',',$request->id);

    $get = enquiries::whereIn('unique_id',$request->id)->pluck('name','unique_id');
        
     return view('quotation', compact('get'));
    }


    public function send_quote(Request $request){

// $id = explode(',',$request->customer_unique_id);
// for ($i = 0; $i < count($id); $i++) {
//     $quot[] = [
//     'customer_unique_id' => $id[$i],
//     'project_name'       => $request->project_name,
//     'currency'           => $request->currency,
//     'payment_method'     => $request->payment_method,
//     'quote_date'         => $request->quote_date,
//     'quote_expire_date'  => $request->quote_expire_date,
//     'item_name'          => $request->item_name,
//     'description'        => $request->description,
//     'tax'                => $request->tax,
//     'price'              => $request->price,
//     ];
// }
// quotation::insert($quot);
//         event(new NewUserRegistered($id));

$id = explode(',',$request->customer_unique_id);
$quot = $request;

  event(new NewUserRegistered($id, $quot));
return back();

    }

    public function quotation_list(){
      if(Auth::user()->usertype_status == 1){
        $quotationList = quotation::getList();  
        return view('quotation-list',compact('quotationList'));
      }

    }


    public function get_update_quotation(Request $request){
      
      $getData = quotation::getQuotationById($request->unique_id);
       
      $get = enquiries::select('name')
      ->where('unique_id',$request->unique_id)
      ->first();
      
      return view('update-quotation', compact('getData','get')) ;
    }




    public function update_quotation(Request $request){
      
      $a = enquiries::where('unique_id',$request->customer_unique_id)->get();
       
      $arrs = [];
 foreach ($a as  $value) {
     
if(!$value->email){
  continue;
}

array_push($arrs, $value->email);



if(isset($request->quote_expiry_date)){
  $quote_expiry_date = explode('/', $request->input('quote_expiry_date'));
  $quote_expiry_date =    date("$quote_expiry_date[2]-$quote_expiry_date[1]-$quote_expiry_date[0]");
  }else{
      $quote_expiry_date ='';
  }
  
  if(isset($request->quote_date)){
  $d = explode('/', $request->input('quote_date'));
  $quote_date =    date("$d[2]-$d[1]-$d[0]");
  }else{
      $quote_date = '';
  }

  



  $url = "https://api.razorpay.com/v1/payment_links/".$request->plink."/cancel";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
  $headers = array(
     "Content-type: application/json",
     "Authorization: Basic cnpwX3Rlc3RfWEM3Q3BHR2V3VTZWQnI6V2FLZzNyVDg1WkplV1ZyMmM0TTB1Ykdk",
     "Content-Length: 0",
  );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  //for debug only!
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
  $resp = curl_exec($curl);
  
  curl_close($curl);
  








  
  $reference_id = uniqid();

 $url = "https://api.razorpay.com/v1/payment_links/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
//curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH'); //if update link
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
 "Content-type: application/json",
 "Authorization: Basic cnpwX3Rlc3RfWEM3Q3BHR2V3VTZWQnI6V2FLZzNyVDg1WkplV1ZyMmM0TTB1Ykdk",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = array("amount" =>(int)$request->total*100, 'currency' => $request->currency,  "accept_partial"=> false, "reference_id" => $reference_id, 'customer' => array('name' => $value->name, 'contact' => $value->contact, 'email' => $value->email), "callback_url" => "https://immigration.craftzvilla.com/imm/payment-success", 'callback_method'=>"get"    ) ;

// $data = array( "reference_id" => $reference_id   ) ; if update link

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data,JSON_UNESCAPED_SLASHES));
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);

$link = $arr['short_url'];

$a = array('link' => $link);

$quot = [
//   'customer_unique_id' =>  $value->unique_id,
  'project_name'       => $request->project_name,
  'currency'           => $request->currency,
  'payment_method'     => $request->payment_method,
  'quote_date'         => $quote_date,
  'quote_expire_date'  => $quote_expiry_date,
  'item_name'          => $request->item_name,
  'description'        => $request->description,
  'tax'                => $request->tax,
  'price'              => $request->price, 
  'total'              => $request->total,
  'refrence_id'        => $reference_id,
  'payment_link'        => $link,
  'plink'              => $arr['id'],
  'employee_unique_id' => Auth::user()->unique_id,
];  
quotation::where('customer_unique_id', $request->customer_unique_id)
->update($quot);


  $emails = $value->email;

  Mail::send('mail.welcome', $a, function($message) use ($emails)
  {    
      $message->to($emails)->subject('This is test e-mail');    
      
        Session::flash('message', "Updated Quotation Sent Successfully!"); 
     
  });
  return back(); 


 }
    }
}

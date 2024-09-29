<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\enquiries;
use Mail;
use App\quotation;
use Auth;
use Session;
class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
   

    /**
     * Handle the event.
     *
     * @param  NewUserRegistered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        $user = $event->user;
        // dd( $user);
       $request = $quot = $event->quot;
        
                $a = enquiries::whereIn('unique_id',$user)->get();
       
        $arrs = [];
   foreach ($a as  $value) {
       
if(!$value->email){
    continue;
}

array_push($arrs, $value->email);
// dd($value->unique_id);


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

    $reference_id = uniqid();
    


$url = "https://api.razorpay.com/v1/payment_links/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "Content-type: application/json",
   "Authorization: Basic cnpwX3Rlc3RfWEM3Q3BHR2V3VTZWQnI6V2FLZzNyVDg1WkplV1ZyMmM0TTB1Ykdk",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array("amount" =>(int)$quot['total']*100, 'currency' => $request->currency,  "accept_partial"=> false, "reference_id" => $reference_id, 'customer' => array('name' => $value->name, 'contact' => $value->contact, 'email' => $value->email), "callback_url" => "https://immigration.craftzvilla.com/imm/payment-success", 'callback_method'=>"get"    ) ;


// dd($data);

// dd(json_encode($data,JSON_UNESCAPED_SLASHES));
// dd($data);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data,JSON_UNESCAPED_SLASHES));
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$arr = json_decode($resp, true);
// dd($arr);
$link = $arr['short_url'];
$a = array('link' => $link);

$quot = [
    'customer_unique_id' =>  $value->unique_id,
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
quotation::insert($quot);


    $emails = $value->email;

    Mail::send('mail.welcome', $a, function($message) use ($emails)
    {    
        $message->to($emails)->subject('This is Quotation E-mail');    
        
          Session::flash('message', "Quotation Sent Successfully!"); 
        
    });
  

   }}}







        // Mail::send('emails.welcome', ['user' => $user], function ($message) use ($user) {
        //         $message->from('chandrapalsingh1004@gmail.com', 'Sender Name');
        //         $message->subject('Hi  '.$user->name. 'Payment link sent ');
        //         $message->to($user->email);
        // dd('workig this '.$user);
        
    


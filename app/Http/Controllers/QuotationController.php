<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewUserRegistered;
use App\quotation;
use App\enquiries;
use Auth;
use Mail;
use Session;
use App\enq_payments;
use DB;
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

    public function quotation_list(Request $request){
      if(Auth::user()->usertype_status == 1){
        $quotationList = quotation::getList(); 
         
        
      
        $search =(collect($quotationList));
        if(isset($request->page)){
            $page = $request->page;
        }else{
        $page = 1;  
        }
        if(isset($request->range_filter)){
         $range_filter = $request->range_filter;
     }else{
     $range_filter = 10;  
     }

$get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url(request()->segment(1).'/quotation-search'), "pageName" => "page"]
    );


        return view('quotation-list',compact('quotationList'));
      }

    }


    public function get_update_quotation(Request $request){
      
      $getData = quotation::getQuotationById($request->unique_id, $request->id);
      //  dd($request->unique_id, $request->id, $getData);
      $get = enquiries::select('name')
      ->where('unique_id',$request->unique_id)
      ->first();
      
      return view('update-quotation', compact('getData','get')) ;
    }


public function followupquot(Request $request){
    date_default_timezone_set('Asia/Calcutta'); 
    // H:i:s
// echo date("Y-m-d");
echo $getCurrentdate = date('Y-m-d',strtotime("+1 days"));
echo "<br>";
 $users = DB::table('quotations')->get();
    foreach ($users as $user) {
   echo  $FurtureExpDate = $user->quote_expire_date;
    if($getCurrentdate == $FurtureExpDate){
        echo 'match';
        $quotation_unique_id = $user->customer_unique_id;
       
      $usersdata = DB::table('enquiries')
       ->select('quotations.id as id',  'enquiries.email', 'enquiries.name' , 'enquiries.unique_id', 'quotations.payment_link', 'quotations.price')
            ->leftJoin('quotations', 'enquiries.unique_id', '=', 'quotations.customer_unique_id')
            ->where('quotations.quote_expire_date', $getCurrentdate)
            ->where('quotations.id',$user->id)
            ->get();
            
            //  dd($usersdata);
        foreach($usersdata as $usersdata2){
        $CustomerName =  $usersdata2->name;
      
        $PaymentLink = $usersdata2->payment_link;
        $UniqueId = $usersdata2->unique_id;
     echo   $customerEmailId = $usersdata2->email;
        $amount = $usersdata2->price;
        
  $emails = $customerEmailId;

//   Mail::send('mail.welcome', $a, function($message) use ($emails)
//   {    
//       $message->to($emails)->subject('This is test e-mail'); 
        
        
       $data = array('name'=>$CustomerName, 'emailid'=>$emails, 'paymentLink'=>$PaymentLink, 'amount'=> $amount );
    //   $data = array('name'=>"Immigration follow up");
      Mail::send('followupmail', $data, function($message) use ($emails) {
         $message->to($emails, 'khem')
         ->subject('your quote will be expire');
         $message->from('admin@immigration.craftzvilla.com','mbbs go');
      });
      echo "HTML Email Sent. Check your inbox.";
      
      
        }
        
    }else{
        echo "not match";
    }
    echo "<br>";
}
    // dd($users);
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




    public function update_payment_status(Request $request){
//       enquiries::where('unique_id', $request->unique_id)
//       ->update([
// 'disposition' =>"Payment Done"
//       ]);

// quotation::where('customer_unique_id', $request->unique_id)
// ->where('id', $request->id)
//     ->update([
//       'paid_status' => 1
//     ]);
    // $get = quotation::where('customer_unique_id', $request->unique_id)->get();

    // enq_payments::create([
    //   'enquiry_id' => $request->unique_id,
    //   'payment_for'  => $get[0]->item_name,
    //   'payment_by'   => "Cash",
    //   'gen_by'       => Auth::user()->unique_id,
    //   'razorpay_payment_link_reference_id'  => $get[0]->razorpay_payment_link_reference_id
    // ]);
    session::flash('message', 'Paid Status Successfully Updated!');
    return redirect(request()->segment(1).'/enquiry/get-detail/'.$request->unique_id.'#finance');
    return back();
    }


    public function delete_payment_status(Request $request){
      quotation::where('customer_unique_id', $request->unique_id)
->where('id', $request->id)
    ->update([
      'status' => 0
    ]);
    session::flash('message', 'Delete Successfully!');
    return back();
    }

public function update_amount(Request $request){
  
  enq_payments::create([
    'amount' => $request->paid_amount,
    'razorpay_payment_link_reference_id' => $request->razorpay_payment_link_reference_id,
    'enquiry_id'  => $request->unique_id
  ]);
  session::flash('message', 'Paid Status Successfully Updated!');
  return back();
}


public function quotation_search(Request $request){
  
    
$where= " where ";
if(isset($request->filter_date_from) && !empty($request->filter_date_from)  && isset($request->filter_date_to) && !empty($request->filter_date_to)){
    $from = $request->filter_date_from;
    $from = str_replace('/', '-', $from);
    $todays_dates = date("d-m-Y");
    $todays = strtotime($todays_dates); 
    $expiration_date2 = strtotime($from);
    $request->filter_date_from2 = (date('Y-m-d',$expiration_date2));
    
    $exp_date = $request->filter_date_to;
    $exp_date = str_replace('/', '-', $exp_date);
    $todays_date = date("d-m-Y");
    $today = strtotime($todays_date); 
    $expiration_date = strtotime($exp_date);
    $request->filter_date_to2 = (date('Y-m-d',$expiration_date));
    $where .=" (quotations.quote_date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
}else{
    $request->filter_date_from ='';
    $request->filter_date_to   ='';
}



if(isset($request->agent_id)   && !empty($request->agent_id) ){
    $where .= " quotations.employee_unique_id  = '$request->agent_id' and ";
}else{
    $request->agent_id = '';
}


if(isset($request->total) && (!empty($request->total))){
  // $tutionFees = join("','", $request->tutionFees);    
  $total = $request->total;
  
  $where .= " ( ";
  
  $where .= "  quotations.total between $total or ";
  
  $where =  substr($where, 0, -4);
  $where .= " ) and ";
}
else{
  $total = "";
}


if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( enquiries.name like '%$request->searchbox%' or quotations.project_name like '%$request->searchbox%' or quotations.currency like '%$request->searchbox%'  or quotations.item_name like '%$request->searchbox%'  or quotations.description like '%$request->searchbox%'  ) and ";
}else{
    $request->searchbox = '';
}

if(Auth::user()->usertype_status == 4){
    $where .= "  quotations.employee_unique_id =  " .Auth::user()->unique_id. " and ";
}

if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
    $where .= "  users.company_id =  " .Auth::user()->unique_id. " and ";
}
// dd($where);
 $where .= " quotations.status = 1 order by quotations.id DESC ";
 
if(isset($request->shortby)   && !empty($request->shortby) ){

    
  
   if($request->shortby == "Name"){
    
    $orderby = " ORDER BY enquiries.name ASC ";
}elseif($request->shortby == "Date"){
    
    $orderby = " ORDER BY enquiries.date DESC ";
}
elseif($request->shortby == "Email/phone number"){
    
    $orderby = " ORDER BY enquiries.email ASC ";
}elseif($request->shortby == "Id"){
    $orderby = " ORDER BY enquiries.id DESC ";
}else{
    $orderby = " ORDER BY enquiries.id DESC ";
    }}else{
$orderby = " ORDER BY enquiries.id DESC ";
    }

    

 $search  = DB::select(DB::raw("SELECT quotations.id as id, quotations.customer_unique_id as customer_unique_id, quotations.project_name as project_name, quotations.currency as currency, quotations.payment_method as payment_method, quotations.quote_date as quote_date, quotations.quote_expire_date as quote_expire_date, quotations.status as status, quotations.item_name as item_name, quotations.description as `description`, quotations.tax as tax, quotations.price as price, quotations.total as total, quotations.refrence_id as refrence_id, users.name as employee_name from  quotations  join enquiries on quotations.customer_unique_id = enquiries.unique_id    join users on enquiries.agent_unique_id = users.unique_id  $where "));

   $search =(collect($search));
   if(isset($request->page)){
       $page = $request->page;
   }else{
   $page = 1;  
   }
   if(isset($request->range_filter)){
    $range_filter = $request->range_filter;
}else{
$range_filter = 10;  
}

 
$get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url(request()->segment(1).'/quotation-search'), "pageName" => "page"]
    );

    
    
$enq_status = DB::table('enq_status')->get();
 $enq_purposes = DB::table('enq_purposes')->get();

 $exp_date = $request->filter_date_from;
        $exp_date = str_replace('-', '/', $exp_date);
        $request->filter_date_from  = ($exp_date);
         
       
    //    dd($_GET,$get,$request->filter_date_from);
            
               $quotationList = $get;
   
        return view('quotation-list', compact([ 'quotationList', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query)
        ->with('search2',$request->searchbox)
        ->with('shortby2',$request->shortby)
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ->with('expiry_date_from',$request->expiry_date_from)
        ->with('expiry_date_to',$request->expiry_date_to)
        ->with('total', $request->total)
        ; 
            
}


}

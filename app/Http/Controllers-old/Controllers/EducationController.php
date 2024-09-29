<?php

namespace App\Http\Controllers;
use App\Http\Requests\CourseRequest;

use App\Http\Requests\CollegeRequest;
use Illuminate\Http\Request;
use Session;
use App\imm_institutes;
use Auth;
use App\my_institutes;
use App\institute_contacts;
use App\Http\Request\ContactRequest;
use DB;
use Crypt;
use tags;
use App\edu_notes;
use App\edu_campuses;
use App\edu_documents;

class EducationController extends Controller
{

   public function index(){
      
      
      // return view('education/dashboard',['tag'=> $tag]);
   }


   public function state(Request $request){
      $id = $request->id;
     return $states  =  DB::table('states')->where('country_id',$request->id)->get();
      
      // return view('enquiry/enquiry-desktop',['states' => $states]);
  }


  public function city(request $id){
      $id = $id->id;
      
      return $cities  =  DB::table('cities')->where('state_id',$id)->get();
      
      // return view('enquiry/tablet-enquiry',['cities'=>$cities]);
  }



public function collage_info(Request $request){
   // $id = $request->input('id');
   $id  = $request->id;
   // dd($id);
   
   // $id = Crypt::decrypt($id);
   // dd($id);
   $info = DB::table('my_institutes')->where('code','=',$id)->get();
   
   Session()->put('college_code_sess',$id); 
   
foreach($info as $info2)
   // dd($info2->code, $id);
    
   // endforeach
   $contact  = DB::table('institute_contacts')->where('institute_code', '=' ,$info2->code)->get();
   
   //  dd($info2->code, $contact2);
   return view('education/collageinfo', compact(['info' , 'contact']));
 
}

 public  function dashboard(){
    $imm_institutes  = DB::table('imm_institutes')->get();
    $my_institutes  = DB::table('my_institutes')->where('status',1)->orderBy('name','ASC')->paginate(30);
    $tag = DB::table('tags')->get();   
   //   $my_institutes  =  my_institutes::paginate(30);
// dd($my_institutes);
    return view('education/dashboard', compact(['my_institutes' ,'imm_institutes','tag']));
 }


 public function imm_search(Request $request){
    $var  = $request->input('search');
    $imm_institutes  = DB::table('imm_institutes')->where('id','=',$var)->get();

  return  view('education/dashboard', ['imm_institutes' => $imm_institutes]);
   }  


 public function my_ins_search(Request $request){
   $search  = $request->input('search');
   $tag  = $request->input('tag');
   $from_date  = $request->input('form_date');

   // $my_institutes  = DB::table('my_institutes')->where('id','=',1)->orwhere('tags','=',435435)->get();
if($search != null){

   $search = DB::table('my_institutes')->where('status','1')->where('name','like','%'.$search.'%')->orWhere('code','like','%'.$search.'%')->orWhere('tags','like','%'.$search.'%')->orWhere('landline','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('city','like','%'.$search.'%')->orWhere('country','like','%'.$search.'%')->orWhere('agreement_expiry_date','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->orWhere('state','like','%'.$search.'%')->orWhere('website','like','%'.$search.'%')->orWhere('postal_code','like','%'.$search.'%')->orderBy('id', 'DESC')->get();
   }

if($from_date != null){
   $search = DB::table('my_institutes')->where('status','1')
   ->whereBetween('date',[$from_date,$request->end_date])
   ->orderBy('id', 'DESC')->get();
}

if($tag != null){
   $search = DB::table('my_institutes')->where('status','1')
 ->where('tags',$tag)
   ->orderBy('id', 'DESC')->get();
}

$tag = DB::table('tags')->get(); 

return view('education/dashboard', compact(['search', 'tag']));
}



public function search_course(Request $request){
   $search  = $request->input('search');
   $commission  = $request->input('commission');
   $award_level  = $request->input('award_level');

   if($search != null){

      $search = DB::table('courses')->where('status','1')->where('course_name','like','%'.$search.'%')->orWhere('course_code','like','%'.$search.'%')->orWhere('duration_year','like','%'.$search.'%')->orWhere('duration_week','like','%'.$search.'%')->orWhere('teaching_period','like','%'.$search.'%')->orWhere('fees','like','%'.$search.'%')->orderBy('id', 'DESC')->get();
      }
 
      if($commission != null){
         $search = DB::table('courses')->where('status','1')
       ->where('commission',$commission)
         ->orderBy('id', 'DESC')->get();
      }

      if($award_level != null){
         $search = DB::table('courses')->where('status','1')
       ->where('award_level',$award_level)
         ->orderBy('id', 'DESC')->get();
      }

return view('education/ccc-courses',compact('search'));

}




 public function add_institution(){
   $country = DB::table('countries')->get();
   $tag = DB::table('tags')->get();
   return view('education/add-institution', compact(['country', 'tag']));
 }



//  public function state(Request $request){
//    $id = $id->id;
//    $states  =  DB::table('states')->where('country_id',$request->id)->get();
//    }

// public function city(request $id){
//    $id = $id->id;
//    return $cities  =  DB::table('cities')->where('state_id',$id)->get();
//    }






 public function insert_institution(CollegeRequest $request){
    $unique_id= mt_rand(11111111,99999999);
   $id  = $request->id;
   
    $name = $request->input('trading_name');
   //  $legal_name = $request->input('legal_name');
    $code = $request->input('code');
    $phone = $request->input('phone');
    $email = $request->input('email');
    $fax = $request->input('fax');
    $website = $request->input('website');
    $address  = $request->input('address');
    $country  = $request->input('country');
    $state  = $request->input('state');
    $remark  = $request->input('remark');
    $city  = $request->input('city');
    $address  = $request->input('address');
    $postal  = $request->input('postal');
    $tag  =  $request->input('tag');
    $landline  = $request->input('landline');
      $imm_institutes = new my_institutes([
         'name'        => $name,
         
         'code'      => $code,
         'landline' =>$landline,
         'email'  =>  $email,
         'city'  =>  $city,
         'country' => $country,
         'phone'  => $phone,
         'state'  => $state,
         'remark'  => $remark,
         'fax'   =>  $fax,
         'unique_id'  =>$unique_id,
         'tags'  =>$tag,
         
         'website' => $website,
         'address'  =>$address,
         'postal_code' =>$postal
      ]);
      // $my_institutes->where('trading_name', )
      $imm_institutes->save();
      $imm_institutes  = DB::table('imm_institutes')->get();
      $my_institutes  = DB::table('my_institutes')->where('status', 1)->get();
      // return view('education/dashboard', compact(['my_institutes' ,'imm_institutes']));
      return redirect('education/dashboard');
 }

public function update_institution_form(Request $request){
   $id = $request->id;
   $id = Crypt::decrypt($id);
   $get_institutes  = DB::table('my_institutes')->where('name',$id)->get();
   return view('education/update-institution' , ['get_institutes' => $get_institutes]);
}



 public function update_institution(Request $request){
   $name = $request->input('name');
   
   $code = $request->input('code');      
   $phone = $request->input('phone');
   $email = $request->input('email');
   $fax = $request->input('fax');
   $website = $request->input('website');
   $address  = $request->input('address');
   $country  = $request->input('country');
   $state  = $request->input('state');
   $remark  = $request->input('remark');
   $city  = $request->input('city');
   $address  = $request->input('address');
   $postal  = $request->input('postal_code');
     $my_institutes = new my_institutes([
      
     ]);
     $id = $request->id;
     
     $id = Crypt::decrypt($id);
     
     $my_institutes->where('unique_id',$id)->update( [ 
     'name'   =>$name,
   //   'code'      => $code,
   //   'landline'  =>'35423523',
     'email'  =>  $email,
     'city'  =>  $city,
     'country' => $country,
     'phone'  => $phone,
     'state'  => $state,
     'remark'  => $remark,
     'fax'   =>  $fax,
   //   'unique_id'  =>'5435',
   //   'tags'  =>435435,
   //   'action' => 1,
     'website' => $website,
     'address'  =>$address,
     'postal_code' =>$postal]);

   //   $my_institutes  = DB::table('my_institutes')->get();
   //   return view('education/dashboard', ['my_institutes' ,$my_institutes]);
   return redirect('education/dashboard');
   // return back();
   // return view('education/dashboard');
}

public function add_contact(Request $request){
   
   $given_name = $request->input('given_name');
   $family_name = $request->input('family_name');
   $department = $request->input('department');
   $position = $request->input('position');
   $email = $request->input('email');
   $phone = $request->input('phone');
   $landline = $request->input('landline');

   $code  = $request->code;
   $code = Crypt::decrypt($code);

   $institute_contacts = new institute_contacts([
      'institute_code'  =>$code,
      'given_name'        => $given_name,
      'family_name'   =>$family_name,
      'department'      => $department,
      'position'  =>$position,
      'email'  =>  $email,
      'phone'  =>  $phone,
      'landline' => $landline]);
      // dd($institute_contacts);
      $institute_contacts->save();
      return back();
}
 

public function tag(Request $request){
   $tag = $request->input('tag');
   $code  = $request->code;
$my_institutes = new my_institutes;
$my_institutes->where('code',$code)->update( [ 'tags'   => $tag]);
$code = Crypt::encrypt($code);
return back();
}


public function update_agreement(Request $request){
   $date  = $request->input('update_expity_date');
   $college_code = session()->get('college_code_sess');
   $update = new my_institutes;
   $update->where('code',$college_code)->update(['agreement_expiry_date'=>$date]);
   return back();
}

public function edu_notes(Request $request){

   $college_code  = $request->input('college_code');
   $subject  = $request->input('subject');
   $description  = $request->input('description');
   $contact  = $request->input('contact');
   $created_by  = $request->input('created_by');

   $edu_notes = new edu_notes([
      'college_code'  =>$college_code,
      'subject'        => $subject,
      'description'   =>$description,
      'contact'      => $contact,
      'created_by'  =>$created_by,
     ]);
     $edu_notes->save();
     return back();
}


public function edu_campus(Request $request){
   $college_code  = $request->input('college_code');
   $name  = $request->input('name');
   $street  = $request->input('street');
   $country  = $request->input('country');
   $state  = $request->input('state');
   $city  = $request->input('city');
   $contact  = $request->input('contact');
   $pincode  = $request->input('pincode');
   

   $edu_campuses = new edu_campuses([
      'college_code'  =>$college_code,
      'name'        => $name,
      'street'   =>$street,
      'country'      => $country,
      'state'  =>$state,
      'city'        => $city,
      'contact'   =>$contact,
      'pin_code'      => $pincode,
      
     ]);
     $edu_campuses->save();
     return back();
}

public function upload_document(Request $request){
   $unique_id =  mt_rand(11111111 , 99999999);
   $document = $request->file('document');
   $college_code   = $request->input('college_code');
   
if($document != ''){
       
$id = mt_rand(11111,99999);
       $destinationPath = "public/uploads/documents";
   $img =  $id.$document->getClientOriginalName();
   $document->move($destinationPath ,'i'.$img,$document->getClientOriginalName());
   $document  = 'i'.$img;

$edu_documents = new edu_documents([
'unique_id'  =>$unique_id,
// 'agent_id'  =>  Auth::user()->employee_id,
'created_by'   =>  Auth::user()->name,
'name'  => $document,
'college_code' => $college_code
]);
        $edu_documents->save();
Session::flash('message','Upload Successful.');
   return back();
}  
// else{
// $get =  DB::table('enquiries')->where('unique_id',$unique_id)->get();
// foreach($get as $image)
// $image  =$image->image;
// }
}




public function delete_college(Request $request){
$my_institutes = new my_institutes;
$my_institutes->where('code', $request->id)->update([
   'status' => 0
]);
return back();
}


public function edit_college(Request $request){
   
   $edit_college = $request->id;
   
    $edit_college =  DB::table('my_institutes')->where('status',1)->where('code', $edit_college)->get();
     return view('education/dashboard', compact(['edit_college'])); 
}


public function edit_college_form(Request $request){
   $unique_id = $request->input('id');
   $name = $request->input('name');
   
   $code = $request->input('code');
   $tag = $request->input('tag');

   $phone = $request->input('phone');
   $landline = $request->input('landline');

   $email = $request->input('email');
   $fax = $request->input('fax');
   $website = $request->input('website');
   $street  = $request->input('street');

   $country  = $request->input('country');
   $state  = $request->input('state');
   // $remark  = $request->input('remark');
   $city  = $request->input('city');
   // $address  = $request->input('address');
   $postal  = $request->input('postal_code');

   $my_institutes = new my_institutes;
      
      $my_institutes->where('unique_id',$unique_id)->update( [ 
      'name'   =>$name,
      'code'      => $code,
      'landline'  =>$landline,
      'email'  =>  $email,
      'city'  =>  $city,
      'country' => $country,
      'phone'  => $phone,
      'state'  => $state,
      // 'remark'  => $remark,
      'fax'   =>  $fax,
      
      'tags'  =>$tag,
      
      'website' => $website,
      'address'  =>$street,
      'postal_code' =>$postal]);
      return redirect('education/dashboard');
}

public function delete_contact(Request $request){
   $institute_contacts = new institute_contacts;
   $institute_contacts->where('id', $request->a)->update([
      'status' => 0
   ]);
   return back();
   }   

public function search_university(Request  $request){
   $my_institutes = db::table('my_institutes')->where('name','like','%'.$request->searchUniversity.'%')->orWhere('state','like','%'.$request->searchUniversity.'%')->orWhere('country','like','%'.$request->searchUniversity.'%')->orWhere('city','like','%'.$request->searchUniversity.'%')->paginate(10);
   // dd($my_institutes);
   return view('education/dashboard' ,compact(['my_institutes']));
}
}


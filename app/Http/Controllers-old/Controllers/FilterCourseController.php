<?php

namespace App\Http\Controllers;
use DB;
use App\courses;
use App\my_institutes;
use Illuminate\Http\Request;
use App\sort_list_courses;
use Auth;
use PDO;
use Session;
use App\enquiries;
class FilterCourseController extends Controller
{

    
    
    public function filter_by_eligibility(Request $request){
        // dd($request->TOEFL_reading, $request->TOEFL_writing, $request->TOEFL_speaking, $request->TOEFL_listening, $request->enrolment_college);
        $students_select = $request->students_select;
// dd($students_select);
        $where = " where(" ;
        $enrolment_college  = $request->enrolment_college;
foreach($request->enrolment_college as $a){
    $where .=  " code = $a or";
   }
$where .= " code = $a  ) and courses.status=1 ";
if( ($request->TOEFL_reading !="") && ($request->TOEFL_writing !="")  && ($request->TOEFL_listening !="") &&($request->TOEFL_speaking !="")  ){
            $toefl_reading  =  $request->toefl_reading;
            $where .= "
            
                                        and toefl_reading             <=  $request->TOEFL_reading
                                        and toefl_writing             <=  $request->TOEFL_writing
                                        and toefl_listening           <=  $request->TOEFL_listening
                                        and toefl_speaking            <=  $request->TOEFL_speaking
                                        ";
                                    }
        else{
            $where .= "";
        }

// if($request->students_select!=""){
//     $students_select  = $request->students_select;
//     $where .= " enquiries.unique_id = $students_select and";
// }
// else{
//     $students_select ="";
// }


// ->groupBy('college_code', 'name', 'city')
// ->select(DB::raw('college_code, name, city')

$highest_educations = $request->highest_educations;
$grade_average      = $request->grade_average;
// dd($grade_average,$highest_educations);
$search_filter = DB::select(DB::raw("SELECT `name`, `college_code`, `city`  from my_institutes   INNER JOIN courses on my_institutes.code = courses.college_code  ".$where." group by `name`, `college_code`, `city` "));
// dd($search_filter);
return view('education/ccc-courses', compact(['search_filter','highest_educations','grade_average','students_select']));



//         $where = " where";
// if($request->enrolment_college !=""){
//     $enrolment_college = $request->enrolment_college;
//     $where .=  " my_institutes.unique_id = $enrolment_college and";
// }

// else{
//     $enrolment_college = "";
// }
// if($request->highest_educations !=""){
//     $highest_educations = $request->highest_educations;
//     $where .= " courses.min_education_eligibility like '%$highest_educations%' and";
// }

// else{
//     $highest_educations ="";
// }

// if($request->toefl_reading !=""){
//     $toefl_reading = $request->toefl_reading ;
//     $where .= " courses.toefl_reading = $toefl_reading and";
// }
// else{
//     $toefl_reading = "";
// }


// dd($students_select, $enrolment_college, $highest_educations);

// $where .= " courses.status=1 LIMIT 12";
// // dd($where);
// $getgoldentourr = DB::select(DB::raw("SELECT *  from my_institutes INNER JOIN courses on my_institutes.code = courses.college_code   ".$where));
// $queryadd = $getgoldentourr.$where;
// dd("SELECT *  from my_institutes INNER JOIN courses on my_institutes.code = courses.college_code   ".$where);

// $getgoldentour = mysqli_query($conn, $queryadd);


// $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );

}

        
    

    public function filter_by_eligibility_old_23_11_2019(Request $request){
        // dd($request->education_country);
    // dd($request->highest_educations, $request->grade_average);
// dd($request->toefl_reading, $request->toefl_writing, $request->toefl_listening, $request->toefl_speaking);
// $data = courses::all();
// foreach ($data as $d) {
//  dd($d->toefl_reading);
// }
    if( ($request->toefl_reading !="") && ($request->toefl_writing !="")  && ($request->toefl_listening !="") &&($request->toefl_speaking !="")  ){   
        
    $search_filter  =  DB::table('courses')
        ->where('status','1')
        ->where('min_education_eligibility',$request->highest_educations)
        ->where('min_gpa',         '<=', $request->grade_average)
        ->where('toefl_reading',   '<=', $request->toefl_reading)
        ->where('toefl_writing',   '<=', $request->toefl_writing)
        ->where('toefl_listening',  '<=', $request->toefl_listening)
        ->where('toefl_speaking',   '<=', $request->toefl_speaking)
                 
        ->orderBy('id', 'DESC')->paginate(30);
        // dd($search_filter);
            return view('education/ccc-courses', compact(['search_filter']));
    }
    

    else if( ($request->ielts_reading !="") && ($request->ielts_writing !="")  && ($request->ielts_listening !="") &&($request->ielts_speaking !="")  ){  
       
        $search_filter  =  DB::table('courses')
        ->where('status','1')
        ->where('min_education_eligibility',$request->highest_educations)
        ->where('min_gpa',         '<=', $request->grade_average)
        ->where('ielts_reading',   '<=', $request->ielts_reading)
        ->where('ielts_writing',   '<=', $request->ielts_writing)
        ->where('ielts_listening',   '<=', $request->ielts_listening)
        ->where('ielts_speaking',   '<=', $request->ielts_speaking)
        ->orderBy('id', 'DESC')->paginate(30);
        // dd($search_filter);
        return view('education/ccc-courses', compact(['search_filter']));
    }

    else{
        $search = $request->ielts_reading = $request->toefl_speaking;   
        $grade_average = $request->grade_average;
        $highest_educations  = $request->highest_educations;
        
        $search_filter  =  DB::table('courses')
        
        // ->where('status','1')
        ->where('min_education_eligibility',$request->highest_educations)
        ->where('min_gpa',         '<=', $request->grade_average)
        ->where(function ($q)use ($search){
            $q->where('ielts_reading','!=', "")
                ->orWhere('toefl_speaking','!=',"");
        })
        ->crossJoin('my_institutes', 'courses.college_code', '=', 'my_institutes.code')
        ->groupBy('college_code', 'name', 'city')
        ->select(DB::raw('college_code, name, city'))
        
        
        // ->select('*')
        // ->orderBy('id', 'DESC')
        ->paginate(10);
        // dd($search_filter,$highest_educations,$grade_average);  
        return view('education/ccc-courses', compact(['search_filter','highest_educations','grade_average']));
    }

    // else{
    //     $search_filter = "";
    //     return view('education/ccc-courses', compact(['search_filter']));
    // }

}

public function range_filters(Request  $request){
    

// end test

    session()->forget('year');
    session()->forget('intake');
    session()->forget('tution_min_price');
    session()->forget('tution_max_price');
    session()->forget('min_app_fees');
    session()->forget('max_app_fees');


    $tution_min_price   = str_replace('$ ','',$request->tution_min_price);
    $tution_max_price   = str_replace('$ ','',$request->tution_max_price);
    $min_app_fees =  str_replace('$ ','',$request->application_min);
    $max_app_fees =  str_replace('$ ','',$request->application_max);
    $year = $request->duration_year;
    $intake     = $request->intake;

    Session()->put('tution_min_price',$tution_min_price)  ; 
    // dd(Session()->get('tution_min_price'));
    Session()->put('tution_max_price',$tution_max_price)  ; 
    Session()->put('min_app_fees',$min_app_fees)  ; 
    Session()->put('max_app_fees',$max_app_fees)  ; 
    Session()->put('year',$year) ;  
    Session()->put('intake',$intake);
    $short_fees = $request->short_by_fees;

    if( ($short_fees != "") &&  ($request->filter_country !="")  && ($request->get_privience_state_city != "") 
        &&($request->filter_by_colleges !="") && ($request->duration_year != "")  && ($request->intake !="")
    )    
    {
       
         $output = array();
         foreach ($request->get_privience_state_city as $city) {
            foreach ($request->filter_by_colleges as $college) {
        $range_filter = DB::table('my_institutes')
        ->where('country', $request->filter_country )
        ->where('city', $request->get_privience_state_city )
        ->where('name', $request->filter_by_colleges)
        ->get();
        array_push($output, $range_filter);
            }}   
            foreach($output as $out){
                if($out->count() > 0){
                    $range_filter = $out;
                    }
            } 
            
                
return view('education/dashboard', compact('range_filter','short_fees','year','intake')); 
    }

elseif(($short_fees != "") &&  ($request->filter_country !="")  && ($request->get_privience_state_city != "") 
&&($request->filter_by_colleges !="") && ($request->duration_year != "")) {

    $year = $request->duration_year;

$range_filter = array();
    foreach ($request->get_privience_state_city as $city) {
        foreach ($request->filter_by_colleges as $college) {
        $range_filter2 = DB::table('my_institutes')
                    ->where('country',$request->filter_country)
                    ->where('city', 'like', "%$city%" )
                    ->where('name' ,'like', "%$college%")
                       ->get();
                       if(!in_array($range_filter2, $range_filter, false)){
                       array_push($range_filter, $range_filter2);
                    }
}}

 


// dd($range_filter, session()->get('year'), $short_fees , $request->filter_country, $request->get_privience_state_city,
// $request->filter_by_colleges); 
return view('education/dashboard', compact('range_filter','short_fees','year')); 
}

elseif(($short_fees != "") &&  ($request->filter_country !="")  && ($request->get_privience_state_city != "") 
&&($request->filter_by_colleges !="")){
//    dd($request->filter_by_colleges);
$range_filter= array();
    foreach ($request->filter_by_colleges as $college) {
        foreach ($request->get_privience_state_city as $city) {        
    $range_filter2 = DB::table('my_institutes')
                ->where('country',$request->filter_country)
                ->where('city', 'like', "%$city%" )
                ->where('name' ,'like', "%$college%")
                                ->get();
                                if(!in_array($range_filter2, $range_filter, false)){
                                array_push($range_filter,$range_filter2); 
                            }  
}}


                                    // dd($range_filter, $request->filter_country, $request->get_privience_state_city,$request->filter_by_colleges, $short_fees);
      return view('education/dashboard', compact('range_filter','short_fees')); 
}

elseif(($short_fees != "") &&  ($request->filter_country !="")  && ($request->get_privience_state_city != "") ){
    $city = $request->get_privience_state_city;
    $range_filter= array();
  foreach ($request->get_privience_state_city as $city) {
    $range_filter2 = DB::table('my_institutes')
                ->where('country',$request->filter_country)
                ->where('city', 'like', "%$city%" )
                                ->get();
                                array_push($range_filter,$range_filter2); 
  }
//   $range_filter = "";
//   foreach($output as $out){
//     if($out->count() > 0){
//         $range_filter .= $out;
//     }
// }
//   dd($range_filter, $request->filter_country, $request->get_privience_state_city );                       
                                return view('education/dashboard', compact('range_filter','short_fees'));      
                                  
}

elseif(($short_fees != "") &&  ($request->filter_country !="")   ){
   $range_filter[] = DB::table('my_institutes')
                ->where('country',$request->filter_country)
                                ->paginate(30);

return view('education/dashboard', compact('range_filter','short_fees'));         
}
elseif(($request->duration_year != "")  &&  ($request->short_by_fees !="")){
    $short_fees = $request->short_by_fees;
   Session()->put('year',$request->duration_year);
   $get = DB::table('courses')
   ->where('duration_year',$request->duration_year)
   ->groupBy('college_code')
   ->select('college_code')
                   ->get();

         $range_filter  = array();          
foreach ($get as $get2) {
    $range_filter2 = DB::table('my_institutes')
    ->where('code',$get2->college_code)
           ->get();
              array_push($range_filter , $range_filter2);
}           
    // dd($range_filter);
                
   return view('education/dashboard', compact('range_filter','short_fees'));   
                    
}


// elseif((Session()->get('tution_min_price') !="") &&
// (Session()->get('tution_max_price') !="")){

//     $min_max  = DB::table('courses')
//     ->where('status',1)
//     ->whereBetween('fees',array((Session()->get('tution_min_price')),(Session()->get('tution_max_price'))))
//     ->get();
//     $get  = array();
// foreach($min_max as $m){
//     $min_max2  = DB::table('courses')
//     ->where('status',1)
//     ->where('fees', $m->fees)
// ->groupBy('college_code')
//     ->select('college_code')    
//     ->get();
//     array_push($get, $min_max2);
// }

//         $range_filter  = array();  
//         foreach ($get as $get2) {
            
//             foreach($get2 as $get3){
                
//             $range_filter2 = DB::table('my_institutes')
//             ->where('code',$get3->college_code)
//             ->paginate(30);
//                array_push($range_filter , $range_filter2);
//         }}
        
// // dd($range_filter);


// return view('education/dashboard', compact('range_filter','short_fees')); 

// }


    elseif(!empty($request->filter_country)){

        // dd($request->fullUrl());
        

        $country = $request->filter_country;
        $country = $request->filter_country;
        // dd($pageName);
        $connnn = $country;
       $range_filter[] = DB::table('my_institutes')
                            ->where('country',"$country")
                            ->where('status',1)
                            ->paginate(30);
                            
        
        // dd( $range_filter, $country);
        return view('education/dashboard', compact('range_filter','short_fees', 'connnn')); 
}

elseif(!empty($request->get_privience_state_city)){
    $city = $request->get_privience_state_city;
    $range_filter  = array();  
    foreach ($city as $c) {
        $range_filter2 = DB::table('my_institutes')
        ->where('city','like',"%$c%")
        ->where('status',1)
        ->get();
        array_push($range_filter, $range_filter2);
        }
        // dd($range_filter, $city);
        return view('education/dashboard', compact('range_filter','short_fees')); 
}

elseif(!empty($request->filter_by_colleges)){
    $college = $request->filter_by_colleges;
    // dd($college);
    foreach($college as $college1){
    $range_filter[] = DB::table('my_institutes')
            ->where('name','like',"%$college1%")
            ->where('status',1)
            ->get();
            // dd($range_filter, $college);
            return view('education/dashboard', compact('range_filter','short_fees'));
    }
}

elseif(!empty($request->duration_year)){
    $duration_year = $request->duration_year;
    Session()->put('year',$duration_year);
    // dd($duration_year);
    foreach ($duration_year as $duration_year1) {
    $get = DB::table('courses')
            ->where('duration_year',$duration_year1)
            ->where('status',1)
            ->select('college_code')
            ->groupBy('college_code')
            ->paginate(30);
    }
    
$range_filter = array();
    foreach($get as $g){
        $range_filter2  = DB::table('my_institutes')
        ->where('status',1)
        ->where('code',$g->college_code)
        ->get();
        array_push($range_filter, $range_filter2);
    }
    $duuuuuu  =  $duration_year;
    // dd($range_filter, $duration_year, $g->college_code, $short_fees, "only duration year", $get); 
    return view('education/dashboard', compact('range_filter','short_fees','duuuuuu','get'));
    }
            


elseif(!empty($request->intake)){
    
    $intake = $request->intake;
    $output = array();
    foreach($intake as $f){
    $get = DB::table('courses')
            ->where('intake','like',"%$f%")
            ->where('status',1)
            ->select('college_code')
            ->groupBy('college_code')
            ->paginate(30);
           array_push($output,$get); 
        }
        // dd($output, $intake);
        $range_filter= array();
        foreach($output as $get2){
            foreach($get2 as $g){

            $range_filter2  = DB::table('my_institutes')
            ->where('status',1)
            ->where('code',$g->college_code)
            ->get();
            array_push($range_filter,$range_filter2);
        }}
        // dd($get,$output,  $range_filter2, $range_filter,$intake);
        return view('education/dashboard', compact('range_filter','fees_low_filter','short_fees','intake','get'));       
}

elseif (!empty($request->short_by_fees)){
    $short_fees = $request->short_by_fees;
    $range_filter[] = DB::table('my_institutes')
                    ->where('status',1)
                    ->paginate(30);
                    // dd('only filter by fees');
                    return view('education/dashboard', compact('range_filter','fees_low_filter','short_fees'));                // dd($range_filter);
}

elseif ((empty($request->short_by_fees)) && (empty($request->short_by_fees)) && ( empty($requets->filter_country) )
&& ( empty($requets->get_privience_state_city) )  && (empty($requets->filter_by_colleges))  &&(empty($request->duration_year))  && (empty($request->intake))  &&  ((!empty($request->tution_min_price)) || (!empty($request->tution_max_price)) )    ) 
{


$get = DB::table('courses')
    ->whereBetween('fees',[$tution_min_price, $tution_max_price ]) 
    ->select('college_code')
    ->groupBy('college_code')
    ->paginate(30);
    $range_filter = array();
    foreach($get as $g){
        $range_filter2  = DB::table('my_institutes')
        ->where('status',1)
        ->where('code',$g->college_code)
        ->get();
        array_push($range_filter, $range_filter2);
    }
    // dd($range_filter, "filter by fees",$tution_min_price, $get); 
    return view('education/dashboard', compact('range_filter','short_fees','get','tution_max_price','tution_min_price'));
}

elseif ((empty($request->short_by_fees)) && (empty($request->short_by_fees)) && ( empty($requets->filter_country) )
&& ( empty($requets->get_privience_state_city) )  && (empty($requets->filter_by_colleges))  &&(empty($request->duration_year))  && (empty($request->intake))  &&  ( (!empty($request->application_min)) || (!empty($request->application_max)))  ){

    $get = DB::table('courses')
    ->whereBetween('application_fee',[$min_app_fees,$max_app_fees ])
    ->select('college_code')
    ->groupBy('college_code')
    ->paginate(30);

    $range_filter = array();
    foreach($get as $g){
        $range_filter2  = DB::table('my_institutes')
        ->where('status',1)
        ->where('code',$g->college_code)
        ->get();
        array_push($range_filter, $range_filter2);
    }
    // dd($range_filter, "filter by fees", $get, $min_app_fees, $max_app_fees); 
    return view('education/dashboard', compact('range_filter','short_fees','get','min_app_fees','max_app_fees'));
}

else{
    
    $no_record = "tesdt";
    return view('education/dashboard', compact('no_record'));
}

// app('App\Http\Controllers\FilterCourseController')->range_filters_sort_fees();
// dd($request->duration_year);

    // return view('education/dashboard', compact('range_filter','fees_low_filter','short_fees'));

}

public function range_filters_sort_fees(Request $request){
    
    $short_fees = $request->short_fees;
    $year = Session()->get('year');
    $intake = Session()->get('intake');

    Session()->get('tution_min_price')  ; 
    Session()->get('tution_max_price')  ; 
    Session()->get('min_app_fees')  ; 
    Session()->get('max_app_fees')  ; 


   
    if(($year == "") && ($intake == "") && ($short_fees == "")){
        $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        ->orderBy('application_fee','DESC')
        ->get();
        // dd($courses);
        
        return $courses;
        
    }

    elseif(($year != "") &&($intake != "") && ($short_fees != "") && (Session()->get('tution_min_price') !="") &&
    (Session()->get('tution_max_price') !="") && (Session()->get('min_app_fees') !="") && (Session()->get('max_app_fees') !=""))
    {
        // dd('duration, intake, short fees, min tution fees, max tution fees, min app fees,  max app fees,');
        if($short_fees == 1){
        foreach($year as $y){
            foreach($intake as $int){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        ->where('duration_year','like',"%$y%")
        ->where('intake','like',"%$int%")
        ->where('fees','ASC')
        ->get();
        // dd($courses);
        }}    return $courses;
    }
    elseif($short_fees == 2){
            foreach($year as $y){
                foreach($intake as $int){
        $courses  = DB::table('courses')
            ->where('status',1)
            ->where('college_code',$request->id)
            ->where('duration_year','like',"%$y%")
            ->where('intake','like',"%$int%")
            ->where('fees','DESC')
            ->get();
            // dd($courses);
            }}    return $courses;
        }
        elseif($short_fees == 3){
            foreach($year as $y){
                foreach($intake as $int){
        $courses  = DB::table('courses')
            ->where('status',1)
            ->where('college_code',$request->id)
            ->where('duration_year','like',"%$y%")
            ->where('intake','like',"%$int%")
            ->where('application_fee','ASC')
            ->get();
            // dd($courses);
            }}    return $courses;
        }
        
            foreach($year as $y){
                foreach($intake as $int){
        $courses  = DB::table('courses')
            ->where('status',1)
            ->where('college_code',$request->id)
            ->where('duration_year','like',"%$y%")
            ->where('intake','like',"%$int%")
            ->where('application_fee','DESC')
            ->get();
            // dd($courses);
            }}    return $courses;
        
    
}


    elseif(($year != "") &&($intake != "")   && (Session()->get('tution_min_price') !="") &&
    (Session()->get('tution_max_price') !="") && (Session()->get('min_app_fees') !="") && (Session()->get('max_app_fees') !="")){
        // dd('duration, intake');
        // dd($year, $intake );
        foreach($year as $y){
            foreach($intake as $int){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        ->where('duration_year','like',"%$y%")
        ->where('intake','like',"%$int%")
        ->get();
        // dd($courses);
        }}    return $courses;
    }


    elseif(($short_fees == 1) && ($year != "")   && (Session()->get('tution_min_price') !="") &&
    (Session()->get('tution_max_price') !="") && (Session()->get('min_app_fees') !="") && (Session()->get('max_app_fees') !="")){
     dd($year, $intake, $short_fees);

        foreach($year as $y){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        ->where('duration_year','like',"%$y%")
        ->orderBy('fees','ASC')
        ->get();
        dd('short fees 1 and duration year');
        }    return $courses;
    } 
    
    // elseif((Session()->get('tution_min_price') !="") &&
    // (Session()->get('tution_max_price') !="")){
    //     // dd('gfd');
    //     $courses  = DB::table('courses')
    //     ->where('status',1)
    //     ->whereBetween('fees',[Session()->get('tution_min_price'),Session()->get('tution_max_price')])
    //     ->get();
    //     dd(Session()->get('tution_min_price'),'short fees 1 and duration year', $courses);
    //         return $courses;
    // }

        elseif($short_fees == 1){
            $courses  = DB::table('courses')
            ->where('status',1)
            ->where('college_code',$request->id)
            ->orderBy('fees','ASC')
            ->get();
            // dd('short fees 1 only');
            return $courses;
            }

elseif($short_fees == 2){
    // foreach($year as $y){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        // ->where('duration_year','like',"%$y%")
        ->orderBy('fees','DESC')
        ->get();
            // dd('sort fees only 2');
        return $courses;
}

elseif($short_fees == 3){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        // ->where('duration_year','like',"%$y%")
        ->orderBy('application_fee','ASC')
        ->get();
        return $courses;
}
elseif($short_fees == 4){
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        // ->where('duration_year','like',"%$y%")
        ->orderBy('application_fee','DESC')
        ->get();
        return $courses;
}
else{
    $courses  = DB::table('courses')
        ->where('status',1)
        ->where('college_code',$request->id)
        ->get();
        return $courses;
}


// elseif($intake != ""){
//     dd($intake);
//     foreach($intake as $in){
//     $courses  = DB::table('courses')
//     ->where('status',1)
//     ->where('college_code',$request->id)
//     -where('intake','like' ,"%$in%")
//     ->get();
//     return $courses;
// }
// }



   }



public function range_filters_remove(Request  $request){
    
    // dd($request->short_by_fees);
//     $str = 'In My Cart : 10,820.00 items';
// $int = (float) filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT);
// dd($int); 
$short_fees = $request->short_by_fees;
// dd($short_fees);
if($request->short_by_fees !=""){
if($request->short_by_fees == 1){
    $get = DB::table('courses')
    ->select(DB::raw('MIN(fees) as fees'))
    ->where('status',1)
    ->get();
    // dd(str_replace("Tuition: CA$","",$get));
    // dd($get);
    $search_filter = DB::table('courses')
                ->where('fees','like','%'.$get[0]->fees.'%')
                ->crossJoin('my_institutes', 'courses.college_code', '=', 'my_institutes.code')
                ->orderBy('fees','DESC')
                ->get();
                // dd($search_filter);
    return view('education/ccc-courses', compact(['search_filter', 'short_fees']));
}
elseif($request->short_by_fees == 2){

    $string = 'Nrs 89,994,874.0098';
    echo preg_replace("/[^0-9\.]/", '', $string);

    $get = DB::table('courses')
    ->select(DB::raw('MAX(fees) as fees'))
    ->where('status',1)
    ->get();
    
    // $get = str_replace("Tuition: CA$","",$get);
    dd($get);
    $search_filter = DB::table('courses')
    ->where('fees',$get[0]->fees)
    ->crossJoin('my_institutes', 'courses.college_code', '=', 'my_institutes.code')
    // ->orderBy('fees','DESC')
    ->get();
    // dd($search_filter);
    return view('education/ccc-courses', compact(['search_filter','short_fees']));
}
elseif($request->short_by_fees == 3){
    $get = DB::table('courses')
    ->select(DB::raw('MIN(application_fee) as fees'))
    ->where('status',1)
    ->get();
    
    $search_filter = DB::table('courses')
    ->where('application_fee',$get[0]->fees)
    ->select(DB::raw('college_code'))
    ->groupBy('college_code')
    // ->limit('5')
    ->get();
// DB::table('enq')
    // dd($search_filter);
    return view('education/ccc-courses', compact(['search_filter','short_fees','get']));
}
elseif($request->short_by_fees == 4){
    $get = DB::table('courses')
    ->select(DB::raw('MAX(application_fee) as fees'))
    ->where('status',1)
    ->get();
    $search_filter = DB::table('courses')
    ->where('application_fee',$get[0]->fees)
    ->get();
    return view('education/ccc-courses', compact(['search_filter']));
}}


if(($request->get_privience_state_city !="") ){
        if($request->short_by_fees ==1){
            $var = 'MIN(fees)';
        }
        elseif($request->short_by_fees ==2){
            $var = 'MAX(fees)';
        }
        $search_filter = my_institutes::where('city','like','%'.$request->get_privience_state_city.'%')
        // ->Join('courses', 'my_institutes.code', '=', 'courses.college_code')
        // ->select('*')
        ->get();
        // dd($search_filter ,$request->get_privience_state_city);
        return view('education/ccc-courses', compact(['search_filter']));
    // $sort = DB::table('courses')
        // ->select(DB::raw('MAX(application_fee)'))
        // ->where('status',1)
        // ->get();
        // dd($sort);
    }

if($request->filter_by_colleges != ""){
    // dd($request->filter_by_colleges);
    // if($request->postgraduation_filter != ""){
    //  dd('fdgfd');                       
    // }
    $search_filter = DB::table('courses')
                        ->where('status',1)
                        ->where('college_code', $request->filter_by_colleges)
                        ->get();
                        // dd($request->filter_by_colleges,$search_filter);
                        return view('education/ccc-courses', compact(['search_filter']));                       
}

}


function getcourses(Request $request){
    
    $where = " where(";
   
        $unique_id  = $request->a;
        
        $unique_id = explode(",",$unique_id);
        // dd($unique_id);
foreach($unique_id as $a){
    $where .=  " college_code = $a or";
   }

$where .= " college_code = $a  ) and courses.status=1 ";
// dd($where);
// dd(DB::select(DB::raw("SELECT *  from my_institutes  INNER JOIN courses on my_institutes.code = courses.college_code ".$where)));
return $get = DB::select(DB::raw("SELECT *  from my_institutes  INNER JOIN courses on my_institutes.code = courses.college_code ".$where));
// dd($get->toefl_listening);
}

function get_student_detail(Request $request){
    
        $unique_id  = $request->a; 
        return $get  = DB::select(DB::raw("SELECT * From enquiries LEFT JOIN enq_exam_scores on enquiries.unique_id  = enq_exam_scores.enquiry_id  LEFT JOIN enq_educations on enq_exam_scores.enquiry_id =  enq_educations.enquiry_id  where unique_id = $unique_id" ));   
        // dd($get);
}

function get_institutes(Request $request){
    $code = $request->a;
// dd($code);
    $get_my_institute = DB::table('my_institutes')->where('country',$code)->get();
    // dd($get_my_institute);
}

public function sort_list_courses(Request $request){
    //    dd($request->c);     
    if($request->c == 0){    
    
       DB::table('sort_list_courses')->where('course_unique_id','=', $request->a)
                            ->where('student_unique_id','=',$request->b)
                            ->delete();
    }
    else{
        
    $unique_id = mt_rand(11111111,99999999);
    // dd($request->a,$request->b);
   $aaa =  DB::table('sort_list_courses')->where('course_unique_id','=', $request->a)
    ->where('student_unique_id','=',$request->b)->get();
    
if($aaa->count() ==  0){
    
    $sort_list_courses = new sort_list_courses([
        'unique_id' => $unique_id,        
        'student_unique_id' => $request->b,
        'course_unique_id'  => $request->a,
        'agent_unique_id'   => Auth::user()->unique_id,
        'status'         =>1
    ]);
    $sort_list_courses->save();
    }
}

   $college_name =  DB::table('my_institutes')->select('name')->where('code', $request->college_code)->get();
   echo $college_name;
}

function get_high_edu_toefl(){
    return $get = DB::table('highest_educations')->get();
}
 
function save_priority_course(Request $request){
 
    $sort_list_courses = new sort_list_courses;
    $len = (count($request->course_id));
    $j = 1;
    $inc = 1;
    for($i=0; $i<$len; $i++){
          
    $sort_list_courses->where('student_unique_id',$request->student_unique_id[$i])
    ->where('course_unique_id',$request->course_id[$i])
    ->where('agent_unique_id',$request->emp_unique_id[$i])
    ->update(['priority'=> $inc++]);
    $j++;
    }
   Session::flash('message','Courses Sort Listed');
    // return redirect("enquiry/get-detail/".$request->student_unique_id[0]);
    // dd($request->student_unique_id[0]);
    return redirect("enquiry/get-detail/".$request->student_unique_id[0]);
    // return redirect("application/view-application/".$request->student_unique_id[0]);
}








function filter_course_section(Request $request)
{
   $id = $request->id;
   
   enquiries::where('unique_id',$id)->update(['search_course'=>1]);
    return view('filter-course',compact(['id']));
}

function city_course(Request $request){
    
    
    
    $where = " where";
    if(isset($request->country)  && (!empty($request->country))){ 
        
        $id = join("','", $request->country);
        $where .= " country IN ('".$id."') and ";
    }else{
        $id = "";
    }
    $where .= " status = 1 ";
// $city = DB::table('my_institutes')->where('country','IN',$id)->get();
$city = DB::select(DB::raw("SELECT * FROM my_institutes 
$where group by city "));
$output = '';
foreach($city as $row)
 { if($row->city == ""){
     continue;
 }
  $output .= '<option value="'.$row->city.'">'.$row->city.'</option>';
 }
  return ($output);

}

function university_course(Request $request){
    $id = join("','", $request->city);
    
    $university = DB::select(DB::raw("SELECT code,`name`,`level` FROM my_institutes  
INNER JOIN courses on my_institutes.code  = courses.college_code     WHERE city IN ('$id')  group by city "));
    $output = '';
    $output2 = '';
    foreach($university as $row)
     {
      $output .= '<option value="'.$row->code.'">'.$row->name.'</option>';
     }
      

      foreach($university as $row){
        if($row->level == ""){continue;}
        $output2 .= '<option value="'.$row->level.'">'.$row->level.'</option>';
      }
      return array($output, $output2);

// DB::table('my_institutes')->where('city','like',"%".`$request->city`."%")->get();
} 

function get_stream(Request $request){
    $where = " where";
    if(isset($request->duration_year)  && (!empty($request->duration_year))){    
    $duration_year= join("','", $request->duration_year);
    $duration_year  = str_replace("'s", "\'s", $duration_year);
    
    $where .= " level IN('$duration_year') and " ;
// dd($level);
    // $level  = str_replace("'", "\'", $level);
    // $level = str_replace(",","','", $level);
    }
else{
    $duration_year = "";
}
$where .= "    courses.status=1 ";
    $stream = DB::select(DB::raw("SELECT duration_year FROM courses $where group by duration_year"));

    $output = '';
    foreach($stream as $row){

        if($row->duration_year == null || ($row->duration_year == ""))
        
        continue;

        $output .= '<option value="'.$row->duration_year.'">'.$row->duration_year.'</option>';
    }
    return ($output);
}

function get_substream(Request $request){


    $where = " where";
    if(isset($request->stream)  && (!empty($request->stream))){    
        $stream = join("','",$request->stream);
     $where .= " stream IN('$stream') and " ;
     
}else{
    $stream = "";
}


$where .= " status = 1 ";
    
    $substream = DB::select(DB::raw("SELECT substream from courses $where group by substream "));
    $output = '';
    foreach($substream as $row)
    {
        if($row->substream == ""){continue;}
        $output .= '<option value="'.$row->substream.'">'.$row->substream.'</option>';
    }
    return ($output);
}

function get_university(Request $request){
    $substream = join("','", $request->substream);
    

    $university = DB::select(DB::raw("SELECT my_institutes.name as `college_name`, my_institutes.code as college_code from my_institutes INNER JOIN courses on my_institutes.code  = courses.college_code where courses.substream IN('$substream') group by my_institutes.code "));
    $output = '';

    foreach($university as $row){
        $output .= '<option value="'.$row->college_code.'">'.$row->college_name.'</option>';
    }
    return($output);
} 


function filter_course(Request $request){
    $where = " where";
    if(isset($request->country) &&  (!empty($request->country))){

     $country = join("','",$request->country);
       $where .= " my_institutes.country IN ('".$country."') and";
    }
    else{
        $country = "";
    }

if(isset($request->state)  && (!empty($request->state))){
    $state =  join("','", $request->state);
    $where .= " my_institutes.state IN ('".$state."') and"; 
}
else{
    $state = "";
}


if(isset($request->city)  && (!empty($request->city))){
    $city =  join("','", $request->city);
    $where .= " my_institutes.city IN  ('".$city."') and"; 
}
else{
    $city = "";
}

if(isset($request->university) && (!empty($request->university))){
    $university = join("','", $request->university);
    $where .= " courses.college_code IN ('".$university."') and";
}
else{
    $university = "";
}

if(isset($request->batcheloreMaster) && (!empty($request->batcheloreMaster))){
    $batcheloreMaster = join("','", $request->batcheloreMaster);  
    
    $batcheloreMaster  = str_replace("'s", "\'s", $batcheloreMaster);
    // $batcheloreMaster = str_replace(",","','", $batcheloreMaster);

    $where .= " courses.level IN ('".$batcheloreMaster."') and";
}
else{
    $batcheloreMaster = "";
}

if(isset($request->duration) && (!empty($request->duration))){

    $duration = join(",", ($request->duration));
        // dd($duration);
        // if(strpos($duration,'\''))
        // $duration  = $duration.replace("'","`'`" );
        // dd($duration  );
        // $arr = explode(',', str_replace("'","\'",$duration));
        
// $len = count($arr);
// $aaa = array();
// for($i = 0; $i<$len; $i++){
    $duration  = str_replace("'", "\'", $duration);
    $duration = str_replace(",","','", $duration);
// array_push($aaa,$duration);
// }
// dd($arr);
// $pppp =implode($aaa);
// dd($pppp);
    $where .= " courses.duration_year IN ('".$duration."') and";
}
else{
    $duration = "";
}

if(isset($request->stream) && (!empty($request->stream))){
    $stream = join("','", $request->stream);    
    
    $where .= " courses.stream IN ('".$stream."') and";
}
else{
    $stream = "";
}

if(isset($request->substream) && (!empty($request->substream))){
    $substream = join("','", $request->substream);    
    
    $where .= " courses.substream IN ('".$substream."') and";
}
else{
    $substream = "";
}

if(isset($request->intake) && (!empty($request->intake))){
    $intake = $request->intake;
    $where .=" ( ";
    foreach($intake as $a){
        $where .= " courses.intake like '%".$a."%' or ";
      }
    $where = substr($where, 0, -4);
    $where .= " ) and ";
    }
else{
    $intake = "";
}

if(isset($request->tutionFees) && (!empty($request->tutionFees))){
    // $tutionFees = join("','", $request->tutionFees);    
    $tutionFees = $request->tutionFees;
    
    $where .= " ( ";
    foreach($tutionFees as $a){
    $where .= "  courses.fees between $a or ";
    }
    $where =  substr($where, 0, -4);
    $where .= " ) and ";
}
else{
    $tutionFees = "";
}

if(isset($request->college_code) && (!empty($request->college_code))){
    // $college_code = join("','", $request->college_code);    
    $college_code =$request->college_code;
    $where .= " courses.college_code IN ('".$college_code."') and";
}
else{
    $college_code = "";
}




if(isset($request->priority_university) && (!empty($request->priority_university))){
    $priority_university = $request->priority_university;
    $where .=" ( ";
    foreach($priority_university as $a){
        $where .= " my_institutes.name like '%".$a."%' or ";
      }
    $where = substr($where, 0, -4);
    $where .= " ) and ";
    }
else{
    $priority_university = "";
}



if(isset($request->filter_university_list) && (!empty($request->filter_university_list))){
    // $college_code = join("','", $request->college_code);    
    $filter_university_list =$request->filter_university_list;
    $where .= " my_institutes.code IN ('".$filter_university_list."') and ";
}
else{
    $filter_university_list = "";
}


// dd($where);

// $limit = (intval($request->limit) != 0 ) ? $request->limit : 5;
// $offset = (intval($request->offset) != 0 ) ? $request->offset : 0;
$limit =$request->limit;
$offset = $request->offset;


$where .= "    courses.status=1 ";
    if(!isset($offset)){
        $filterCoursesCount  = DB::select(DB::raw("SELECT courses.id from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code $where "));
        $filterCourses  = DB::select(DB::raw("SELECT *,courses.unique_id as unique_id,courses.course_name as course_name,courses.duration_year as duration_year,courses.intake as intake,courses.application_fee as application_fee,courses.fees as fees,my_institutes.name as `name`, my_institutes.logo as `image`,my_institutes.code as code, my_institutes.country as country, my_institutes.city as city, courses.min_education_eligibility as  min_education_eligibility from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code $where limit 10"));
return array($filterCourses,$filterCoursesCount);
    }
        else{
            $filterCourses  = DB::select(DB::raw("SELECT *,courses.unique_id as unique_id,courses.course_name as course_name,courses.duration_year as duration_year,courses.intake as intake,courses.application_fee as application_fee,courses.fees as fees,my_institutes.name as `name`,my_institutes.code as code, my_institutes.country as country, my_institutes.city as city, my_institutes.logo as `image`,  courses.min_education_eligibility as  min_education_eligibility  from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code $where limit $limit offset $offset "));
    return $filterCourses;
        }
    
}


function add_university_in_filter(Request $request){
    $where = " where";
    if(isset($request->country) &&  (!empty($request->country))){

     $country = join("','",$request->country);
       $where .= " my_institutes.country IN ('".$country."') and";
    }
    else{
        $country = "";
    }

if(isset($request->state)  && (!empty($request->state))){
    $state =  join("','", $request->state);
    $where .= " my_institutes.state IN ('".$state."') and"; 
}
else{
    $state = "";
}


if(isset($request->city)  && (!empty($request->city))){
    $city =  join("','", $request->city);
    $where .= " my_institutes.city IN  ('".$city."') and"; 
}
else{
    $city = "";
}

if(isset($request->university) && (!empty($request->university))){
    $university = join("','", $request->university);
    $where .= " courses.college_code IN ('".$university."') and";
}
else{
    $university = "";
}

if(isset($request->batcheloreMaster) && (!empty($request->batcheloreMaster))){
    $batcheloreMaster = join("','", $request->batcheloreMaster); 
    
    
    
    $batcheloreMaster  = str_replace("'s", "\'s", $batcheloreMaster);
    
    $where .= " courses.level IN ('".$batcheloreMaster."') and";
}
else{
    $batcheloreMaster = "";
}

if(isset($request->duration) && (!empty($request->duration))){
    $duration = join("','", $request->duration);    
    
    $duration  = str_replace("'s", "\'s", $duration);
    
    $where .= " courses.duration_year IN ('".$duration."') and";
}
else{
    $duration = "";
}

if(isset($request->stream) && (!empty($request->stream))){
    $stream = join("','", $request->stream);    
    $where .= " courses.stream IN ('".$stream."') and";
}
else{
    $stream = "";
}

if(isset($request->substream) && (!empty($request->substream))){
    $substream = join("','", $request->substream);    
    $where .= " courses.substream IN ('".$substream."') and";
}
else{
    $substream = "";
}

if(isset($request->intake) && (!empty($request->intake))){
    $intake = join("','", $request->intake);    
    $where .= " courses.intake IN ('".$intake."') and";
}
else{
    $intake = "";
}

if(isset($request->tutionFees) && (!empty($request->tutionFees))){
    $tutionFees = join("','", $request->tutionFees);    
    $where .= " courses.fees IN ('".$tutionFees."') and";
}
else{
    $tutionFees = "";
}

if(isset($request->priority_university) && (!empty($request->priority_university))){
    $priority_university = join("','", $request->priority_university);    
    $where .= " my_institutes.name IN ('".$priority_university."') and";
}
else{
    $priority_university = "";
}


  

$where .= "    courses.status=1 ";
    $filterCourses2  =  DB::select(DB::raw("SELECT * from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code  $where group by my_institutes.code"));
//    $f = "";
//     foreach($filterCourses2 as $a){
//         $f .= "<option value=".$a->college_code.">".$data->name."</option>" ;
//     }
    return $filterCourses2;
}







function get_course_by_college(Request $request){
$where = " where";
if(isset($request->country) &&  (!empty($request->country))){

 $country = join("','",$request->country);
   $where .= " my_institutes.country IN ('".$country."') and";
}
else{
    $country = "";
}

if(isset($request->state)  && (!empty($request->state))){
$state =  join("','", $request->state);
$where .= " my_institutes.state IN ('".$state."') and"; 
}
else{
$state = "";
}


if(isset($request->city)  && (!empty($request->city))){
$city =  join("','", $request->city);
$where .= " my_institutes.city IN  ('".$city."') and"; 
}
else{
$city = "";
}

if(isset($request->university) && (!empty($request->university))){
    
$university = join("','", $request->university);
$where .= " courses.college_code IN ('".$university."') and";
}
else{
$university = "";
}

if(isset($request->batcheloreMaster) && (!empty($request->batcheloreMaster))){
$batcheloreMaster = join("','", $request->batcheloreMaster);    
$where .= " courses.level IN ('".$batcheloreMaster."') and";
}
else{
$batcheloreMaster = "";
}

if(isset($request->duration) && (!empty($request->duration))){

$duration = join("','", $request->duration);
    // dd($duration);
    // if(strpos($duration,'\''))
    // $duration  = $duration.replace("'","`'`" );
    // dd($duration  );
//         $arr = explode(',',$duration);
// $len = count($arr);
// for($i = 0; $i<$len; $i++){
$duration  = str_replace("'", "`'`", $duration);

$where .= " courses.duration_year IN ('".$duration."') and";
}
else{
$duration = "";
}

if(isset($request->stream) && (!empty($request->stream))){
$stream = join("','", $request->stream);    

$where .= " courses.stream IN ('".$stream."') and";
}
else{
$stream = "";
}

if(isset($request->substream) && (!empty($request->substream))){
$substream = join("','", $request->substream);    
$where .= " courses.substream IN ('".$substream."') and";
}
else{
$substream = "";
}


$where .= "    courses.status=1 ";

  $filterCourses  = DB::select(DB::raw("SELECT * from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code $where "));
return $filterCourses;

}

public function update_priority(Request $request){
    // dd($request->unique_id,$request->course_id, $request->val);
    sort_list_courses::where('student_unique_id',$request->unique_id)
    ->where('course_unique_id',$request->course_id)
    ->update(['priority'=>$request->val]);
    
//   Session::flash('message', "Priority Updated Successfully! "); 
// return back();  
} 

public function application_delete(Request $request){
    sort_list_courses::where('id',$request->id)
    ->delete();
      Session::flash('message', "Deleted Successfully! "); 
return back();  
}
} 
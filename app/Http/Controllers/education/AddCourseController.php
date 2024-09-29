<?php

namespace App\Http\Controllers\education;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

use App\courses;
// use App\award_levels;
use DB;

class AddCourseController extends Controller
{
   

    public function dashboard(Request $request){
      $college_code = $request->id;
      
      $request->session()->put('college_code_sass',$request->id);
      
      // dd($college_code);
        $courses  = DB::table('courses')->where('college_code',$college_code)->get();
        $institute  = DB::table('my_institutes')->where('code',$college_code)->get();
        $award_level  = DB::table('award_levels')->get();
        $commitions   = DB::table('commitions')->get();
        // dd($commitions);
         return view('education/ccc-courses', compact(['courses', 'institute', 'award_level','commitions']));
     }

 
 public function add_course(Request $request){
    $course_code = $request->input('course_code');
    // $cricos_code = $request->input('cricos_code');
    $course_name = $request->input('course_name');
    $award_level = $request->input('award_level');
    
    $duration_year = $request->input('duration_year');
    $duration_week = $request->input('duration_week');
    $teaching_period = $request->input('teaching_period');
    $college_code   = $request->input('college_code');
    $fees  = $request->input('fees');
  
      $imm_institutes = new courses([
         'course_code'        => $course_code,
        //  'cricos_code'   =>$cricos_code,
         'course_name'      => $course_name,
         'award_level'  =>$award_level,
         'duration_year'  =>  $duration_year,
         'duration_week'  =>  $duration_week,
         'teaching_period'  =>  $teaching_period,
         'fees' => $fees,
         'unique_id'  =>  mt_rand(11111111,99999999),
         'college_code' =>$college_code
        //  'phone'  => $phone,
        //  'state'  => $state, 
        //  'remark'  => $remark,
        //  'fax'   =>  $fax,
        //  'unique_id'  =>'5435',
        //  'tags'  =>435435,
        //  'action' => 1,
        //  'website' => $website,
        //  'address'  =>$address
      ]);
// dd($imm_institutes);
      $imm_institutes->save();
      // return back();
      // return $this->dashboard( $request);
    //   $imm_institutes  = DB::table('imm_institutes')->get();
    //   $my_institutes  = DB::table('my_institutes')->get();
    // $courses  = DB::table('courses')->get();
    return view('education/ccc-courses', [session()->get('college_code_sass')]);
 }

 public function update_course(Request $request){
   $id = $request->id;
   
  $update_courses  = DB::table('courses')->where('id', '=', $id)->get();
  return view('education/update-courses', ['update_courses'=> $update_courses]);
 }

public function course_detail_info(Request $request){
  $course_code = $request->id;
      
  $college_code = session()->get('college_code_sass');


    $courses  = DB::table('courses')->where('id',$course_code)->get();
    $institute  = DB::table('my_institutes')->where('code',$college_code)->get();
    
     return view('education/course-additional-info', compact(['courses', 'institute']));
}

public function filter(Request $request){
return $collage =   DB::table('my_institutes')->where('country',$request->id)->where('status',1)->get();
}

public function get_course(Request $request){ 
  
   $get_course =  DB::table('courses')->where('college_code',$request->id)->where('status',1)->get();
   if($get_course->count() > 0){
   return $get_course;
}
   else{
     $get_course =  DB::table('courses')->where('status',1)->get();
     return $get_course;
   }
}


public function updatesinglecourse(Request $request){
    
    // dd($request->id);
    
    DB::table('courses')
            ->where('id', $request->course_id)
            ->update(['course_name' => $request->course_name,
                    
            'fees'=> $request->fees,
            'intake' => $request->intake,
            'min_education_eligibility' => $request->min_education_eligibility,
            'min_gpa' => $request->min_gpa,
            'GRE' => $request->GRE,
            'GMAT' => $request->GMAT,
            'min_toefl_ibt' => $request->min_toefl_ibt,
            'toefl_reading' => $request->toefl_reading,
            'toefl_writing' => $request->toefl_writing,
            'toefl_listening' => $request->toefl_listening,
            'toefl_speaking' => $request->toefl_speaking,
            'min_ilets_overall' => $request->min_ilets_overall,
            'ielts_reading' => $request->ielts_reading,
            
            
            'ielts_writing' => $request->ielts_writing,
            'ielts_listening' => $request->ielts_listening,
            'ielts_speaking' => $request->ielts_speaking,
            'min_pte_overall' => $request->min_pte_overall,
            
            'min_pte_reading' => $request->min_pte_reading,
            'min_pte_writing' => $request->min_pte_writing,
            'min_pte_listening' => $request->min_pte_listening,
            'min_pte_speaking' => $request->min_pte_speaking,
            'level' => $request->level,
            'stream' => $request->stream,
            
            
            'substream' => $request->substream,
            'duration_year' => $request->duration_year,
            'city' => $request->city,
            'course_url' => $request->course_url,
            'campus' => $request->campus
            
            ]);
    
    return back();
    
}

}

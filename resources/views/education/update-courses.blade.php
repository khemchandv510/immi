

@extends('header')
@section('ccc-courses')
<?php use App\countries;
use App\my_institutes;
use App\courses;
?>


<div class="container">
    
    
    <form method="POST" action="{{url('admin/education/updatesinglecourse')}}" accept-charset="UTF-8" class="">
        {{csrf_field()}}
    
            <div class="row content-color">
                  <div class="col-md-4 py-3 ">Course Code  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Course Code" class="form-control" name="course_id" type="text" value="{{$update_courses[0]->id}}" readonly>
                   </div>
      
                   

                   <div class="col-md-4 py-3 ">Course Name :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Course Name" class="form-control" name="course_name" type="text" value="{{$update_courses[0]->course_name}}">
                   
                   </div>

                   <div class="col-md-4 py-3 ">Tuition Fee :</div>
                   <div class="col-md-8 py-3 ">
                        <input type="number" class="form-control" name="fees" value="{{$update_courses[0]->fees}}">
                      </div>

                   <div class="col-md-4 py-3 ">Intake :</div>
                   <div class="col-md-8 py-3 ">
                   
                   <input placeholder="Duration" class="form-control" name="intake" type="text" value="{{$update_courses[0]->intake}}">
                   </div>

                   <div class="col-md-4 py-3 ">Minimum Level of Education Required :</div>
                   <div class="col-md-8 py-3 ">
                   
                   <input placeholder="Education " class="form-control" name="min_education_eligibility" type="text" value="{{$update_courses[0]->min_education_eligibility}}">
                   </div>

                   <div class="col-md-4 py-3 ">Min GPA :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="min gpa" class="form-control" name="min_gpa" type="text" value="{{$update_courses[0]->min_gpa}}">
                   </div>

                   <div class="col-md-4 py-3 ">GRE  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="GRE" class="form-control" name="GRE" type="text" value="{{$update_courses[0]->GRE}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">GMAT  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="GMAT" class="form-control" name="GMAT" type="text" value="{{$update_courses[0]->GMAT}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min TOEFL iBT  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min TOEFL iBT" class="form-control" name="min_toefl_ibt" type="text" value="{{$update_courses[0]->min_toefl_ibt}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">MinMin TOEFL (Reading)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min TOEFL (Reading)" class="form-control" name="toefl_reading" type="text" value="{{$update_courses[0]->toefl_reading}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min TOEFL (Writing)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min TOEFL (Writing)" class="form-control" name="toefl_writing" type="text" value="{{$update_courses[0]->toefl_writing}}">
                   </div>
                   
                   <!--=====================================-->
                  
                   
                   <div class="col-md-4 py-3 ">Min TOEFL (Listening)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min TOEFL (Listening)" class="form-control" name="toefl_listening" type="text" value="{{$update_courses[0]->toefl_listening}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min TOEFL (Speaking)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min TOEFL (Speaking)" class="form-control" name="toefl_speaking" type="text" value="{{$update_courses[0]->toefl_speaking}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min IELTS  (Overall)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min IELTS (Overall)" class="form-control" name="min_ilets_overall" type="text" value="{{$update_courses[0]->min_ilets_overall	}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min IELTS (Reading)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min IELTS (Reading)" class="form-control" name="ielts_reading" type="text" value="{{$update_courses[0]->ielts_reading}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min IELTS (Writing)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min IELTS (Writing)" class="form-control" name="ielts_writing" type="text" value="{{$update_courses[0]->ielts_writing}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min IELTS (Listening)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min IELTS (Listening)" class="form-control" name="ielts_listening" type="text" value="{{$update_courses[0]->ielts_listening}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min IELTS (Speaking)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min IELTS (Speaking)" class="form-control" name="ielts_speaking" type="text" value="{{$update_courses[0]->ielts_speaking}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min PTE Overall  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min PTE (Overall)" class="form-control" name="min_pte_overall" type="text" value="{{$update_courses[0]->min_pte_overall}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min  PTE (Reading) :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min PTE (Reading)" class="form-control" name="min_pte_reading" type="text" value="{{$update_courses[0]->min_pte_reading}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min PTE (Writing)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min PTE (Writing)" class="form-control" name="min_pte_writing" type="text" value="{{$update_courses[0]->min_pte_writing}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min PTE (Listening)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min PTE (Listening)" class="form-control" name="min_pte_listening" type="text" value="{{$update_courses[0]->min_pte_listening}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Min PTE (Speaking)  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Min PTE (Speaking)" class="form-control" name="min_pte_speaking" type="text" value="{{$update_courses[0]->min_pte_speaking}}">
                   </div>
                   
                   
                   
                   
                   
                   <div class="col-md-4 py-3 ">Level :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Level " class="form-control" name="level" type="text" value="{{$update_courses[0]->level}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Stream  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Stream" class="form-control" name="stream" type="text" value="{{$update_courses[0]->stream}}">
                   </div>
                   
                   <div class="col-md-4 py-3 ">Sub Stream  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Duration" class="form-control" name="substream" type="text" value="{{$update_courses[0]->substream}}">
                   </div>
                    <div class="col-md-4 py-3 ">Duration  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Duration" class="form-control" name="duration_year" type="text" value="{{$update_courses[0]->duration_year}}">
                   </div>
                   <div class="col-md-4 py-3 ">city  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="city" class="form-control" name="city" type="text" value="{{$update_courses[0]->city}}">
                   </div>
                   
                  
                  
                   <div class="col-md-4 py-3 "> Course URL  :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder=" Course URL" class="form-control" name="course_url" type="text" value="{{$update_courses[0]->course_url}}">
                   </div>
                   
                   <div class="col-md-4 py-3 "> Campus   :</div>
                   <div class="col-md-8 py-3 ">
                   <input placeholder="Campus" class="form-control" name="campus" type="text" value="{{$update_courses[0]->campus}}">
                   </div>
                   
                   
                   
                   
                   <div class="col-md-12 text-center my-4">
                    <input class="btn btn-danger w-10" type="submit" value="Submit">
                    </div>
               
            </div>
            </form>
    
</div>








@endsection()

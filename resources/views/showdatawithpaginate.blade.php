@if(!empty($filterCourses2))

<?php
foreach($filterCourses2 as $f){


  if (($f->country == "Canada") || ($f->country == "CANADA")){
     $dollar = "CA$";
}
else if($f->country == "USA" ){
$dollar = "US$";
}
else if($f->country == "Australia" ){
  $dollar = "AU$";
  }
  else if($f->country == "New Zealand"){
  $dollar = "NZ$";
  }
  else if(($f->country == "Germany") || ($f->country == "France")  || ( $f->country == "Lithuania")) {
  $dollar = "€";
  }
  

if($f->application_fee ==  " "){
  $f->application_fee = 0;
}

( $f->application_fee );

?>
      <li class="course-list"><div class="download-button"><button class="button">Download</button> </div><div class="course-list-info test"> <img src={{url("public/uploads/university-logo/".$f->image)}} alt="" width="200" class="university-logo" > <div class="course-list-name"> <p class="name"> {{$f->course_name}}   </p><p class="university info"> <span class="fa fa-university"> University: </span> <span>  {{$f->name}}  </span> </p><p class="country-name info"> <span class="fa fa-flag"> Country: </span> <span> {{$f->country}}  </span> </p> <p class="country-name info"> <span class="fa fa-flag"> City: </span> <span>  {{$f->city}} </span> </p> <p class="country-name info"><span class="fa fa-clock-o"> Duration:</span> <span>  {{$f->duration_year}}   </span> <p class="country-name info"><span class="fa fa-calendar"> Intake:</span> <span> {{$f->intake}}  </span> <p class="country-name info"><span class="fa fa-dollar "> Application Fees:</span> <span> {{$dollar}}  {{$f->application_fee}}  </span> <p class="country-name info"><span class="fa fa-dollar "> Tution Fees:</span> <span> {{$dollar}}  {{$f->fees}}   </span> </p><p class="country-name info"><span class="fa fa-book"> Eligibility:</span> <span>    </span>     </p></div>  <div data-id= {{$f->unique_id}}  st_id="{{$id}}" course_name="{{$f->course_name}}" class="sort-list-course" course_code = "{{$f->unique_id}}" college_code="{{$f->code}}"> <button class="go-detail-courese"> Add Course <span class="fa fa-arrow-right"></span> </button></div>  </div> <div class="college-detail-page filter-eligibility"> </div></li>

<?php } ?>
{{$filterCourses2->links()}}
@endif

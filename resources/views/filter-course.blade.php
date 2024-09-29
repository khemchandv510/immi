@extends('header')
@section('filter-course-section')
<?php 
use App\enquiries;
use App\users;
?>
<script>
//  document.addEventListener('touchstart', handler, true);
//  document.addEventListener('touchstart', handler, {capture: true});
$(document).ready(function(){
  $('#my_course_List ').click(function(){
    var a = document.querySelectorAll('.deselect-sort-list');
   var len = a.length
   if(len ==1){
    document.querySelector('#toggleButtonFilterCourse').classList.remove('toggle-button-filter-course');
      document.querySelector('#toggleButtonFilterCourse').classList.add('bbb');
      document.querySelector('.my-course-list-parent').style="width:0%; transition-duration: .4s;";
   }
  })
})
</script>
<script>
  $(document).ready(function(){
    $('#save_sort_list_button2').click(function(){
      document.querySelectorAll('#my_course_List li').forEach(element => {
    arr =[element.children[5].value];
var input  = document.createElement('INPUT');
function setAttributes(el, attrs) {
  for(var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }}
setAttributes(input, {"name": "course_id[]", "value": arr,"class":"pop course_id","type":"hidden"});
document.querySelector('#export_list form').appendChild(input)
  })
    })
    $('.removecourese').click(function(){   
      $('.pop').remove();
    })
     
      
    document.getElementById('select-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('#export_list input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = true;
                      }
                    }
                    document.getElementById('clear-all').onclick = function() {
                      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                      for (var checkbox of checkboxes) {
                        checkbox.checked = false;
                      }
                    }
      
  document.getElementById('export_excell').onclick = function(e){
      var checkboxes = document.querySelectorAll('#export_list input[type="checkbox"]');
      var i = 0;
                      for (var checkbox of checkboxes) {
                        if(checkbox.checked == true){ 
                         i++;   
                        }}
                        // console.log(i);
                            if(i == 0){
                                e.preventDefault();
                                document.getElementsByClassName('msg')[0].style.display ="block";
                            }
                      }
  
      
      
  })
   
</script>
<STYLE>#my_course_List{
  HEIGHT: 80vh;
    OVERFLOW-X: AUTO;
}
.msg{
    display:none;
    padding: 0;
    margin: 0px auto;
    color: #f33434;
    font-size: 16px;
}
#content{
 flex:0 !important;   
}
</STYLE>

<style>
  .toggle-button-filter-course{
transform: rotate(90deg);
position: fixed;

white-space: nowrap;
left: 287px;
top: 50%;
z-index:20;
transition-duration:.4s 
  }

  .bbb{
    transform: rotate(90deg);
position: fixed;
white-space: nowrap;
z-index: 20;
top: 50%;
left: -35px;
transition-duration:.4s 
  }

.my-course-list-parent{
left:-46px;
}
.filter-university-child .fa-filter{
    margin-bottom: 8px;
}
</style>
<?php
use App\Helpers\Helper;
// $country = Helper::getAllCountry();

?>
<style>
    
    .multiselect-container>li>a>label{
        padding: 3px 6px 3px 10px;
    margin-bottom: 0;
    color: #000;
    }
    .multiselect-container>li{
        white-space: nowrap;
    }
    .input-group-addon{
  width: 15%;
}
.input-group .btn-group {
    width: 85% !important;
}

ol{
padding-left: 15px; 
}
ol li{
list-style: decimal !important;
}

</style>
  <div class="container-fluid">
   <div class="row" style="position: relative;
    min-height: 23px;">
     <button class="reset-all btn btn-danger" style="position: absolute;
    top: 17px;
    right: 39px;">Reset</button>
     <script>
       $(document).ready(function(){
   $('.reset-all').click(function(){
     window.location.href = ''; 
  }) })
     </script>
   </div>
 </div>
<div class="container">
  <div class="row my-3">
    <div class="offset-1 col-md-6">
    <label for="">
      Search
    </label>
    <div>
    <input type="text" id="search" name="search" class="form-control" placeholder="Search here..."> <button type="button" class="fa fa-search" style="
    position: absolute;
    border: none;
    font-size: 21px;
    background: #2b6699;
    color: #fff;
    padding: 8px;
    top: 23px;
    right: 16px;
    border-radius: 0px;
    "></button>
    </div>
  </div>
  </div>


    <div class="row my-3">
        <div class="col-md-1">
            
        </div>
        <div class="col-md-2">
    <!--        <div style="display:flex;margin:20px;flex-wrap:wrap;" class="filter-select">-->
    <!--<div class="form-group">-->
        <label>Country</label><br />
        <div class="input-group filter-select">
            <span class="input-group-addon"><i class="fas fa-globe-africa"></i></span>
        <select name="country[]" id="country" multiple class="form-control">
        <option value="Canada">Canada</option>
        <option value="USA">USA</option>
        <option value="Australia">Australia</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="Lithuania">Lithuania</option>
        <option value="New Zealand">New Zealand</option>
        </select>
       </div>
       </div>
       
       <div class="col-md-2">
           <label>City</label><br />
         <div class="input-group filter-select">
            <span class="input-group-addon"><i class="fas fa-globe"></i></span>
        
        <?php 
        $city = DB::table('my_institutes')->select('id','city')->groupBy('city')->get();
        // dd($city);
        ?>
        <select id="city" name="city[]" multiple class="form-control">
        @foreach($city as $items)
       @if($items->city == '') 
       @continue 
       @else
        <option value="{{$items->city}}">{{$items->city}}</option>    
        @endif
            @endforeach
        </select>
       </div>
       </div>
       <?php 
        $stream = DB::select(DB::raw("SELECT id,`level` from courses where status = 1 group by `level`  "));
        
        ?>
<div class="col-md-2">
    <label>Level</label>
    <div class="input-group filter-select">
            <span class="input-group-addon"><i class="fas fa-layer-group"></i></span>
    <select id="batcheloreMaster" name="batcheloreMaster[]"  class="form-control" multiple>
        @foreach ($stream as $item)
@if($item->level == null || ($item->level == ""))
<?php 
continue;
?>
  @endif
  <option value="{{$item->level}}">{{$item->level}}</option>
        @endforeach
    </select>
   
       </div>
       </div>





       <div class="col-md-2">
        <label for="">Duration</label>
         <div class="input-group filter-select">
                <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
        
        <?php 
            $duration = DB::select(DB::raw("SELECT `duration_year` from courses where status = 1 group by duration_year  "));
            ?>
            
       
        <select name="duration[]" id="duration" class="form-control" multiple> 
            
            @foreach ($duration as $item)
            @if($item->duration_year == null || ($item->duration_year == ""))
                @continue
                @endif
        <option value="{{$item->duration_year}}">{{$item->duration_year}}</option>
            @endforeach
        </select>
    </div>
           </div>

     
       <?php 
        $stream = DB::select(DB::raw("SELECT `stream` from courses where status = 1 group by stream  "));
        // dd($stream);
        ?>
        

<div class="col-md-2">
    <label for="">Stream</label>
    <div class="input-group filter-select">
            <span class="input-group-addon"><i class="fas fa-stream"></i></span>
    <select name="stream[]" id="stream"   class="form-control" multiple> 
        
        @foreach($stream as $items)
        @if($items->stream == null || ($items->stream == ""))
        @continue
            @endif
        <option value="{{$items->stream}}">{{$items->stream}} </option>
        
        @endforeach
    </select>
</div>
</div>

     
<div class="col-md-1">
    
</div>
</div>

<?php 
        $stream = DB::select(DB::raw("SELECT `substream` from courses where status = 1 group by substream  "));
        ?>
    <div class="row my-3">
        <div class="col-md-1"></div>
        


     
<div class="col-md-2">
  <?php 
$stream = DB::select(DB::raw("SELECT `substream` from courses where status = 1 group by substream  "));
?>

<label for="">Sub Stream</label>
<div class="input-group filter-select">
<span class="input-group-addon"><i class="fab fa-steam-symbol"></i></span>
<select name="substream[]" id="substream"  class="form-control" multiple> 
@foreach($stream as $items)
@if($items->substream == null || ($items->substream == ""))
@continue
  @endif

<option value="{{$items->substream}}">{{$items->substream}}</option>
@endforeach
</select>


</div>
</div>


<?php 
       

        $university = Helper::getAllUniversityName();
        
        
        ?>
<div class="col-md-2">

  <label for="intake">Intake</label>
   <div class="input-group filter-select">
    <span class="input-group-addon"><i class="fas fa-percentage"></i></span>
  <?php  $date = date('Y');
  $date2 = $date+1;
        $m1 = date('M');
  $y1 = date('Y');
  $t = date('m');
  $m2 = $t+1;
  $y2 = $y1+1;
  $y3 = $y2+1;
?>

<select class="form-control" name="intake[]" id="intake" multiple>



        <option value="Jan">January </option>
        <option value="Feb">February</option>
        <option value="Mar">March</option>
        <option value="Apl">April</option>
        <option value="May">May </option>
        <option value="Jun">June </option>
        <option value="Jul">July </option>
        <option value="Aug">August </option>
        <option value="Sep">September</option>
        <option value="Oct">October </option>
        <option value="Nov">November</option>
        <option value="Dec">December</option>

</select>
</div>
</div>
<div class="col-md-2">
   <label>University</label><br />
   <div class="input-group filter-select">
   <span class="input-group-addon"><i class="fab fa-artstation"></i></span>
   <select id="university" name="university[]" multiple class="form-control">-->
@foreach($university as $items)
   <option value="{{$items->code}}"> {{$items->name}} ({{$items->city}}) </option>
@endforeach
   </select>
  </div>     
  
   </div> 
       <div class="col-md-2">
    <label>Tution Fees</label><br />
     <div class="input-group filter-select">
    <span class="input-group-addon"><i class="fas fa-university"></i></span>
    <select id="tutionFees" name="tutionFees[]" multiple class="form-control">
<option value="1 and 10000">Fees: 1 to 10000</option>
<option value="10001 and 20000">Fees: 10001 to 20000</option>
<option value="20001 and 30000">Fees: 20001 to 30000</option>
<option value="30001 and 40000">Fees: 30001 to 40000</option>
<option value="40001 and 50000">Fees: 40001 to 50000</option>
    </select>
   </div>
</div>
 <div class="col-md-2">
    <label>Priority University</label><br />
     <div class="input-group filter-select">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    <select id="priority_university" name="priority_university[]" multiple class="form-control" >
      <option value="Monash University">Monash University</option>
      <option value="Deakin college">Deakin University</option>
      <option value="Australian National University">The Australian National University</option>
    </select>
   </div>
       </div>
       <div class="col-md-1">
           
       </div>
    </div>
    <div class="row my-3">
       <div class=" col-md-1">
           
      </div>
      <div class="col-md-2">
        <label>Campus</label><br />
        <div class="input-group filter-select">
       <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
       <select id="campus" name="campus[]" multiple class="form-control" >
         <option>Select</option>
         
@foreach ($campus as $capm)
    <option value="{{$capm->campus}}">{{ $capm->campus }}</option>
@endforeach
       </select>
      </div>
      </div>
    </div>
       </div>
       </div>
       </div>
  

<hr>
 

 
<div class="contailer-fluid">
    <div class="row">
        <div class="col-sm-3 filter-university-parent " style="padding-left: 25px;">
          
       <p>   @if(isset($check[0]->id))
          {{$check[0]->id}}
          @endif
        </p>
            <div class="filter-university-child">
            <p class="fa fa-filter"> Filter</p>
            <p class="title">University</p>
            <br>
            <ul class="filter-university-list">
              {{-- @dd($university) --}}
                    @foreach($university as $items)
                   
                <li style="position:relative;cursor:pointer" class="get-college-course" data-id="{{$items->code}}" > <input name="college_code[]" class="college_code" type="checkbox"  value="{{$items->code}}"><span> {{$items->name}}  ({{$items->city}}) </span> </li>
                    
                    @endforeach
            </ul>
        {{-- @include('fees_filter') --}}
             
            </div>
        </div>
    <div class="col-sm-9">
      <div id="selectedOptionDiv" > </div> 
<div class="parent-filter-courses">
    <div class="demo"></div>  
    <div class="count-course" id="total_data"> </div>
    <ul> <?php

$filterCoursesLoad  = DB::select(DB::raw("SELECT courses.unique_id as unique_id,courses.course_name as course_name,courses.duration_year as duration_year,courses.intake as intake,courses.application_fee as application_fee,courses.fees as fees,my_institutes.name as `name`, my_institutes.logo as `image`,my_institutes.code as code, my_institutes.country as country, my_institutes.city as city, courses.min_education_eligibility as  min_education_eligibility, my_institutes.website, courses.course_url from courses INNER JOIN my_institutes ON courses.college_code = my_institutes.code  where my_institutes.logo != ''  limit 10"));

foreach($filterCoursesLoad as $f){


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

// echo $f->application_fee;
    ?>
      <li class="course-list"><div class="download-button"><button class="button">Download</button> </div><div class="course-list-info"> <img src="{{url('public/uploads/university-logo/'.$f->image)}}" alt="" width="200" class="university-logo" > <div class="course-list-name"> <a target="_blank" href="{{$f->course_url}}"> <p class="name"> {{$f->course_name}}   </p><p class="university info"> <span class="fa fa-university"> University: </span> <a href="{{$f->website}}" target="_blank">  <span>  {{$f->name}}  </span>  </a>  </p><p class="country-name info"> <span class="fa fa-flag"> Country: </span> <span> {{$f->country}}  </span> </p> <p class="country-name info"> <span class="fa fa-flag"> City: </span> <span>  {{$f->city}} </span> </p> <p class="country-name info"><span class="fa fa-clock-o"> Duration:</span> <span>  {{$f->duration_year}}   </span> <p class="country-name info"><span class="fa fa-calendar"> Intake:</span> <span> {{$f->intake}}  </span> <p class="country-name info"><span class="fa fa-dollar "> Application Fees:</span> <span> {{$dollar}}  {{$f->application_fee}}  </span> <p class="country-name info"><span class="fa fa-dollar "> Tution Fees:</span> <span> {{$dollar}}  {{$f->fees}}   </span> </p> <p class="country-name info"><span class="fa fa-graduation-cap"> Min Qualification: </span> <span>{{$f->min_education_eligibility}} </span> </p>   <p class="country-name info"><span class="fa fa-book"> Eligibility:</span> <span>    </span>     </p></div>  <div data-id= {{$f->unique_id}}  st_id="{{$id}}" course_name="{{$f->course_name}}" class="sort-list-course" course_code = "{{$f->unique_id}}" college_code="{{$f->code}}"> <button class="go-detail-courese"> Add Course <span class="fa fa-arrow-right"></span> </button></div>  </div> <div class="college-detail-page filter-eligibility"> </div></li> 
      
<?php } ?>
      
      
      
</li>
</ul>
    









</div>

<div id="pagination_link"></div>









</div>
</div></div>

<script>    
$(document).ready(function(){
    
    $('#countr').change(function(){
        var country = $('#countr').val();
        $.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'city-cours')}}",
data:{countr:countr},
success: function(data){
    // $('#filter_city').empty();
//     for (const [key, value] of Object.entries(data)) {
//   console.log(key, value);
// $('#filter_city').append('<option value="'+ this.name +'">'+ this.name +'</option>')
// }
// $('#filter_city').append('<option value="Select City">Select City</option>');
// $('#filter_city_parent').empty();
// $('#filter_city_parent').append('<select class="selectpicker filter-city" id="filter_city" name="university[]" multiple data-live-search="true" onchange="get_university(this.value)" >'); $.each(data, function(key, value){ $('#filter_city_parent select').append('<option value="'+this.name+'">'+this.name+'</option>'); }); $('#filter_city_parent').append('</select>'); $('.selectpicker').selectpicker({});
}
    });
});
});



//         $.ajax({
// type: "get",
// url: "{{url('university-course')}}",
// data:{city:city},
// success: function(data){
//     $('#filter_university').empty();
//     $('#filter_university').append('<option value="Select University">Select University</option>');
// $.each(data, function(key, value) {
//                             $('#filter_university').append('<option value="'+ this.name +'">'+ this.name +'</option>');
//                         });
// }

// })



// function get_university(city){
//     alert(city);
//     $.ajax({
// type: "get",
// url: "university-course/"+city,
//     data:{city:city},
// success: function(data){
//  alert(data);   
// }
//     });
// }

</script>






<script>


 $(document).ready(function(){
    


   $(document).on('click',"#selectedOptionDiv .fa-close",(event)=>{
       let closeText = event.target.parentElement.innerText;
       closeText = closeText.trim();
       let checkedFilteroptions =  document.querySelectorAll(".filter-select input[type='checkbox']:checked");
       checkedFilteroptions.forEach((inputt)=>{
         
           if(closeText.match(inputt.value.trim())){
               $(inputt).click();
              //  console.log(event.target.parentElement)
               event.target.parentElement.remove();
           }
       })
       
   });  



    $('#country,#state, #city, #university, #batcheloreMaster, #duration, #stream, #substream, #intake, #tutionFees, .get-college-course, #priority_university, #search, #campus').change(function(event){ 
      $('#my_course_List').empty();
       offset = 0;    
    var college_code = "";     
    $.hghghg = function(college_code){
    let checkedFilteroptions =  document.querySelectorAll(".filter-select input[type='checkbox']:checked");
    document.querySelector("#selectedOptionDiv").innerHTML = "";
    checkedFilteroptions.forEach((checkbox)=>{
      
        document.querySelector("#selectedOptionDiv").innerHTML +=`
    <span style="padding: 3px 8px;
    display: inline-block;
    background: #2b6699;
    color: #fff;
    border-radius: 3px;margin:5px"> ${checkbox.value} <i class="fa fa-close"></i><span>
      `;
    })
  $('.demo').show();
        var country = $('#country').val();
        var state  = $('#state').val();
        var city  = $('#city').val();  
        var university  = $('#university').val(); 
        
        var batcheloreMaster  = $('#batcheloreMaster').val();  
        var duration  = $('#duration').val(); 
        var stream  = $('#stream').val(); 
        var substream  = $('#substream').val(); 
        var intake   =$('#intake').val(); 
        var tutionFees   =$('#tutionFees').val(); 
        var priority_university = $('#priority_university').val();
        var search = $('#search').val();
        var campus = $('#campus').val();
        // alert($('.get-college-course').val());
        
        var apo = document.querySelectorAll('.filter-university-list li');
        var filter_university_list = "";
        apo.forEach(e => { if(e.firstElementChild.checked == true){  
            filter_university_list = (e.firstElementChild.value);
        } })  ;
        
        $('.parent-filter-courses ul ').empty();
        
    
$.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'filter-course')}}",

data:{country:country,state:state,city:city,university:university,batcheloreMaster:batcheloreMaster,duration:duration,stream:stream,substream:substream,intake:intake,tutionFees:tutionFees,college_code:college_code, priority_university:priority_university,  search:search,campus:campus},
success: function(data){
    // console.log(data[0]);
    
    $('.parent-filter-courses ul ').empty();
    $('.demo').hide();

    // $('.parent-filter-courses ul').html(data);

    var len = data[1].length;

                    
                       $('.count-course').text(len+' Result Found'); 
                       if(len > 10){
                           len = 10;
                       }
                       for(var i=0; i<len; i++){
                        // console.log(data[0][i].unique_id);
if ((data[0][i].country == "Canada") || (data[0][i].country == "CANADA")){
     dollar = "CA$";
}
else if(data[0][i].country == "USA" ){
dollar = "US$";
}
else if(data[0][i].country == "Australia" ){
  dollar = "AU$";
  }
  else if(data[0][i].country == "New Zealand"){
  dollar = "NZ$";
  }
  else if((data[0][i].country == "Germany") || (data[0][i].country == "France")  || ( data[0][i].country == "Lithuania")) {
  dollar = "€";
  }
  

if(data[0][i].application_fee ==  " "){
  data[0][i].application_fee = 0;
}
if(data[0][i].application_fee ==  ""){
  data[0][i].application_fee = 0;
}
// console.log(data[0][i].application_fee);

data[0][i].intake = data[0][i].intake.replace(/ ,/g, ",");
data[0][i].intake = data[0][i].intake.replace('Start:','');
data[0][i].intake = data[0][i].intake.replace('Deadline:','');







// var a = 'dfsd' 4>1 ? 1 :0;


var ielts_special_reading  = 0;
var nll =''
var tes;
if(data[0][i].ielts_speaking != null){ 


var ielts_set_spcl = 'IELTS '+data[0][i].ielts_speaking+' Overall ('+data[0][i].ielts_reading+' in reading, '+data[0][i].ielts_speaking ? data[0][i].ielts_speaking+' in speaking':'test'+', '+data[0][i].ielts_writing+' in writing, '+data[0][i].ielts_listening+' in listening,  ) spl. Case.'  ;
var ielts_set      = 'IELTS '+data[0][i].min_ilets_overall+' Overall (none than '+data[0][i].ielts_reading+' bands),'
}
else{ 
  var ielts_set_spcl ="";
  var ielts_set ="";
}
if(data[0][i].toefl_reading != null){
  var toefl_set =  'TOEFL '+data[0][i].min_toefl_ibt+' Overall (none less than '+data[0][i].toefl_reading+'),'  ;
}else{
  var toefl_set ='';
}
if(data[0][i].min_pte_reading != null){
  var pte_set          = 'PTE '+data[0][i].min_pte_overall+' Overall (none less than '+data[0][i].min_pte_reading+')';  
}else{
  var pte_set = '';
}


if(data[0][i].ielts_reading != data[0][i].ielts_speaking){
ielts_special_reading = data[0][i].ielts_reading;
ielts_special_speaking = data[0][i].ielts_speaking;
}

if(ielts_special_reading  === 0){ 
 tes = '<span> 	'+ielts_set+' '+toefl_set+' '+pte_set+'  </span>'
}
else{
  tes = '<span>  '+toefl_set+'   '+pte_set+'  , '+ielts_set_spcl+' </span>'
}



var url = "{{url('public/uploads/university-logo')}}/"+data[0][i].logo;


$('.parent-filter-courses ul').append(' <li class="course-list"> <div class="download-button"><button class="button">Download</button> </div><div class="course-list-info 11"> <img src="'+url+'" alt="" width="200" class="university-logo" > <div class="course-list-name"> <a target="_blank" href="'+data[0][i].course_url+'"> <p class="name"> '+data[0][i].course_name+'  </p> </a> <p class="university info"> <span class="fa fa-university"> University: </span> <a target="_blank" href="'+data[0][i].website+'"> <span> '+data[0][i].name+' </span> </a> </p><p class="country-name info"> <span class="fa fa-flag"> Country: </span> <span>'+data[0][i].country+' </span> </p> <p class="country-name info"> <span class="fa fa-flag"> City: </span> <span>'+data[0][i].city+' </span> </p> <p class="country-name info"><span class="fa fa-clock-o"> Duration:</span> <span>'+data[0][i].duration_year+'</span> <p class="country-name info"><span class="fa fa-calendar"> Intake:</span> <span>'+data[0][i].intake+'</span> <p class="country-name info"><span class="fa fa-dollar "> Application Fees:</span> <span> '+dollar+' '+data[0][i].application_fee+'  </span> <p class="country-name info"><span class="fa fa-dollar "> Tution Fees:</span> <span> '+dollar+' '+data[0][i].fees+'</span> </p> <p class="country-name info"><span class="fa fa-graduation-cap"> Min Qualification: </span> <span>'+data[0][i].min_education_eligibility+' </span> </p>  <p class="country-name info"><span class="fa fa-book"> Eligibility:</span> <span>    </span>  '+tes+'   </p>      </div>    <div data-id='+data[0][i].unique_id+'  st_id="{{$id}}" course_name="'+data[0][i].course_name+'" id="'+data[0][i].unique_id+'" class="sort-list-course" course_code = '+data[0][i].unique_id+' college_code='+data[0][i].code+'> <button class="go-detail-courese" > Add Course <span class="fa fa-arrow-right"></span> </button></div> </div> <div class="college-detail-page filter-eligibility"> </div></div></li>');

// <div class="eligibility" > <h5>Eligibility</h5> <table class="min-qualification"> <tbody><tr> <td> <strong> Min Qualification </strong> </td><td> Grade 12 / High School </td></tr><tr> <td> <strong> Min GPA </strong> </td><td> </td></tr></tbody></table> <div class="english-language-test"> <p> TOFEL </p><table> <tbody><tr> <th>Reading</th> <th>Wriing</th> <th>Speaking</th> <th>Listening</th> </tr><tr> <td>12</td><td> 12 </td><td> 12 </td><td> 12 </td></tr></tbody></table> <p> IELTS </p><table> <tbody><tr> <th>Reading</th> <th>Wriing</th> <th>Speaking</th> <th>Listening</th> </tr><tr> <td>4</td><td> 4 </td><td> 4 </td><td> 4 </td></tr></tbody></table> <p> PTE </p><table> <tbody><tr> <th>Reading</th> <th>Wriing</th> <th>Speaking</th> <th>Listening</th> </tr><tr> <td>4</td><td> 4 </td><td> 4 </td><td> 4 </td></tr></tbody></table> </div>

}

$(document).ready(function(){
  $('.sort-list-course').click(function(){
      arr = [];
  if(document.querySelectorAll('#my_course_List li').length  <= 24) {
  $(this).find('.go-detail-courese').attr('disabled', "disabled");
  $(this).find('.go-detail-courese').attr({'style':"background:#b0b3b6 "});
    
    var u_id = $(this).attr('data-id');
    var st_id = $(this).attr('st_id');
    var emp_id = "<?php echo Auth::user()->unique_id ?>";
    var course_code = $(this).attr('course_code');
    var unique_id = $(this).attr('id');
    var course_name = $(this).attr('course_name');
    var college_code =$(this).attr('college_code');
    
    arr.push(course_code);



    var url = "{{url(Request::segment(1).'/'.'sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=1&college_code="+college_code;
    $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
               });
               
$.ajax({
type: "POST",
url: url,
success: function(data) {
var jsonResponse = JSON.parse(data);
var len = jsonResponse.length;

var node = document.createElement("LI");
var student_unique_id = document.createElement("input");
var emp_unique_id     = document.createElement("input");
var course_id        = document.createElement("input");
$(student_unique_id).attr({"name":"student_unique_id[]","value":st_id, "style":"display:none"});
$(emp_unique_id).attr({"name":"emp_unique_id[]","value":emp_id, "style":"display:none"});
$(course_id).attr({"name":"course_id[]","value":course_code,"class":"course_id", "style":"display:none"});
          node.setAttribute("style","position:relative");
var textnode = document.createTextNode(course_name); 
var span = document.createElement("span");
var span2 = document.createElement("input");
var college_name = document.createElement('p');
let courseName = document.createElement('p');
courseName.setAttribute('style',`color: #736f6f;
    padding: 0;
    margin: 0;
    font-weight: 400;
    font-family: sans-serif;width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;`);
college_name.setAttribute('style',`color: #787575;
    padding: 0;
    margin: 0;
    font-weight: 400;
    font-family: sans-serif;`)
for(var i=0; i<len; i++){
var college_text = document.createTextNode(jsonResponse[i].name);
}
span.setAttribute("class","fa fa-close deselect-sort-list");

span2.setAttribute("class","set-course-priority");
span2.setAttribute("name","set_course_priority[]");

span2.setAttribute("type","number");
node.appendChild(span);   
// node.appendChild(span2);   
courseName.appendChild(textnode);
node.appendChild(courseName); 

college_name.appendChild(college_text);
node.appendChild(college_name);   
node.appendChild(student_unique_id) ;
node.appendChild(emp_unique_id);       
node.appendChild(course_id)    
document.getElementById("my_course_List").appendChild(node);

//  var save = document.createElement("button");
//       save.document.createTextNode("Save");
//  document.getElementById("save_sort_list_button").appendChild(save); 
             
if(document.querySelectorAll('#my_course_List li').length < 1){
  document.querySelector('#save_sort_list_button_parent').style="display:none";
  

}
else{
  document.querySelector('#save_sort_list_button_parent').style="display:block";
}  


    $('.deselect-sort-list').click(function(event){
     
      var url2 = "{{url(Request::segment(1).'/'.'sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=0";
  $.ajax({
      type: "POST",
        url: url2,
        success: function(data) {
          
 
          // alert($('.program-filter').find('.sort-list-course').attr('course_code'));
          // alert(document.querySelectorAll('.sort-list-course').getAttribute('course_code'));
          
          
//           document.querySelectorAll('#my_course_List li .deselect-sort-list').forEach((closebtn)=>{

// closebtn.addEventListener('click',removeDisable);
    

 removeDisable(event);

        
        }
      });
})
  }
               }); 
      
  }else{
alert("You Have Reached The Maximum Add Course Limit");
return false;
  }

  });
});


   








// document.getElementById('post_data').innerHTML = html;

// document.getElementById('total_data').innerHTML = data[2];

document.getElementById('pagination_link').innerHTML =  data[3];






}
});
}
$.hghghg(college_code);

});




  $('#country,#state, #city, #university, #batcheloreMaster, #duration, #stream, #substream, #intake, #tutionFees, .get-college-course, #priority_university,#search, #campus').change(function(event){  
      $('#my_course_List').empty();

      var country = $('#country').val();
        var state  = $('#state').val();
        var city  = $('#city').val();  
        var university  = $('#university').val();  
        var batcheloreMaster  = $('#batcheloreMaster').val();  
        var duration  = $('#duration').val(); 
        var stream  = $('#stream').val(); 
        var substream  = $('#substream').val(); 
        var intake = $('#intake').val(); 
        var tutionFees = $('#tutionFees').val(); 
        var priority_university = $('#priority_university').val();
        var search = $('#search').val();
        var campus = $('#campus').val();
        


    $('.demo').show();
        var university = $('#university').val();

$.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'add-university-in-filter')}}",

data:{university:university,city:city,batcheloreMaster:batcheloreMaster,duration:duration,stream:stream,substream:substream,intake:intake,tutionFees:tutionFees,priority_university:priority_university,country:country,search:search,campus:campus},
success: function(data){
//   $('#university').empty();
var len = data.length;
$('.filter-university-list').empty();
var data2 ="";
// console.log(data);
for(var i=0; i<len; i++){
  
  
  
    // if(university.length == 0){
      
  //  data2 += "<option value="+data[i].college_code+">"+data[i].name+"</option>";
  // $('#university').html(data2);
  //         $('#university').multiselect('rebuild');
  // }
 
  
$('.filter-university-list').append(`   <li style="position:relative;list-style: none;
    border: 1px solid #e2d4d4;
    width: 100%;
    margin: 0;
    padding: 5px 3px;" > <input type="checkbox"  value="`+data[i].college_code+`" class="get-college-course" style="width: 21px;" name="dasdas" id="a${data[i].college_code}"><label style="cursor:pointer; display: contents;" for="a${data[i].college_code}"> `+data[i].name+` </span>
     </li>`);}
     var ar_p = [];
     document.querySelectorAll('.get-college-course').forEach(e=>{
       e.addEventListener('click',function(){
         var college_code = e.value;
         if(e.checked == true){
         ar_p.push(college_code)
         }else{
             
            //  ar_p.indexOf(college_code);
              var index = ar_p.indexOf(college_code);
              if (index > -1) {
    ar_p.splice(index, 1);
  }
         }
        //  console.log(ar_p);
        $.hghghg(ar_p)  ;
       })
     })
     

}
});
});


});




</script>


    
<script>
    $(document).ready(function(){
    
     $('#country').multiselect({
      nonSelectedText:'Select Country',
    //   buttonWidth:'400px',
      onChange:function(option, checked){
       $('#city').html('');
       $('#city').multiselect('rebuild');
      //  $('#university').html('');
      //  $('#university').multiselect('rebuild');
       var selected = this.$select.val();
      //  if(selected.length > 0)
      //  {
        $.ajax({
         url:"{{url(Request::segment(1).'/'.'city-course')}}",
         method:"GET",
         data:{country:selected},
         success:function(data)
         {
             
          $('#city').html(data);
          $('#city').multiselect('rebuild');
         }
        })
      //  }
      }
     });
    
     $('#city').multiselect({
      nonSelectedText: 'Select City',
    //   buttonWidth:'400px',
      onChange:function(option, checked)
      {
      //  $('#university').html('');
      //  $('#university').multiselect('rebuild');
       var selected = this.$select.val();
       if(selected.length > 0)
       {
        $.ajax({
         url:"{{url(Request::segment(1).'/'.'university-course')}}",
         method:"GET",
         data:{city:selected},
         success:function(data){
         
          // $('#university').html(data[0]);
          // $('#batcheloreMaster').html(data[1]);
          // $('#university').multiselect('rebuild');
          // $('#batcheloreMaster').multiselect('rebuild');
         }
        });
       }
      }
     });

     $('#batcheloreMaster').multiselect({
       onChange:function(option,checked){
         $('#duration').html('');
         $('#duration').multiselect('rebuild');
         var selected  = this.$select.val();
        //  if(selected.length > 0){
           $.ajax({
             url:"{{url(Request::segment(1).'/'.'get-stream')}}",
             method:"GET",
             data:{duration_year:selected},
             success:function(data){
               $('#duration').html(data);
               $('#duration').multiselect('rebuild');
             }
           })
        //  }
       }
     });

     $('#stream').multiselect({
       onChange:function(option,checked){
         $('#substream').html('');
         $('#substream').multiselect('rebuild');
         var selected = this.$select.val();
        //  if(selected.length > 0){
           $.ajax({
             url:"{{url(Request::segment(1).'/'.'get-substream')}}",
             method:"GET",
             data:{stream:selected},
             success:function(data){
               $('#substream').html(data);
               $('#substream').multiselect('rebuild');
             }
           })
        //  }
       }
     });

     $('#substream').multiselect({
       onChange:function(option,checked){
// $('#university').html('');
// $('#university').multiselect('rebuild');
var selected = this.$select.val();
if(selected.length > 0){
  $.ajax({
    url:"{{url(Request::segment(1).'/'.'get-university')}}",
    method:"GET",
    data:{substream:selected},
    success:function(data){
      // $('#university').html(data);
      // $('#university').multiselect('rebuild');
    }
  })
}
       }
     });

    
     $('#university').multiselect({});
    //   nonSelectedText: 'Select Universities'
    //   selectAll:true,
    
    
    //   texts: {
    //     unselectAll    :'Unselect all',
    //     noneSelected   :'None Selected' 
    //   },
    //   buttonWidth:'400px'
    //  });
     $('#batcheloreMaster').multiselect({   nonSelectedText: 'Level' });
     $('#duration').multiselect({   nonSelectedText: 'Duration' });
     $('#stream').multiselect({});
     $('#substream').multiselect({});
     $('#score').multiselect({});
     $('#intake').multiselect({});
     $('#pri_university').multiselect({});  
     $('#tutionFees').multiselect({});
     $('#priority_university').multiselect({});
     $('#campus').multiselect({});
     
    });
    
    </script>
    
  <script>
offset = 1;
function load_data(query = '', page_number = 1)
{
  var limit = 10;
  arr = [];
    // document.onscrol = function(){
    // let parentFilterHeight = document.querySelector('.parent-filter-courses').offsetHeight;
    
    // var a = window.scrollY+1000;
    
    //   if(parentFilterHeight < a ){
    // if($(window).scrollTop() == $(document).height() - $(window).height()) {
    var country = $('#country').val(); 
    var state  = $('#state').val(); 
    var city  = $('#city').val();  
    var university  = $('#university').val();  
    var batcheloreMaster  = $('#batcheloreMaster').val();  
    var duration  = $('#duration').val(); 
    var stream  = $('#stream').val(); 
    var substream  = $('#substream').val(); 
    var intake   =$('#intake').val(); 
    var tutionFees   =$('#tutionFees').val(); 
    var search = $('#search').val();
    var campus = $('#campus').val();
    
    var page  = page_number
    offset = offset*(page-1); 
    
    
    
   var a = document.querySelectorAll('.get-college-course:checked');
   var len = a.length;
   var college_code = [];
   for(var i=0; i< parseInt(len); i++){
       college_code.push(a[i].value);
       }
    
    
    
         
$.ajax({
type: "get",
url: "{{url(Request::segment(1).'/'.'filter-course')}}",

data:{country:country,state:state,city:city,university:university,batcheloreMaster:batcheloreMaster,duration:duration,stream:stream,substream:substream,intake:intake,tutionFees:tutionFees,limit:limit,offset:offset,page:page,search:search,campus:campus, college_code:college_code},
success:function(data){
  
document.getElementById('pagination_link').innerHTML =  data[3];

var len = data[0].length;
var data = data[0];

var dollar; 
$('.parent-filter-courses ul').empty(); 
for(var i=0; i<len; i++){
  
if ((data[i].country == "Canada") || (data[i].country == "CANADA")){
    dollar = "CA$";
}
else if(data[i].country == "USA" ){
dollar = "US$";
}
else if(data[i].country == "Australia" ){
  dollar = "AU$";
  }
  else if(data[i].country == "New Zealand"){
  dollar = "NZ$";
  }
  else if((data[i].country == "Germany") || (data[i].country == "France")  || ( data[i].country == "Lithuania")) {
  dollar = "€";
  }

if(data[i].application_fee ==  " "){
  data[i].application_fee = 0;
}

if(data[i].ielts_listening != ""){
  var ielts = data[i].ielts_listening;
}
else{
  var ielts = "";
}
if(data[i].ielts_listening != ""){
  var toefl = data[i].ielts_listening;
}
data[i].intake = data[i].intake.replace(' ,',',');


data[i].intake = data[i].intake.replace(/ ,/g, ",");
data[i].intake = data[i].intake.replace('Start:','');
data[i].intake = data[i].intake.replace('Deadline:','');


// var a = 'dfsd' 4>1 ? 1 :0;


var ielts_special_reading  = 0;
var nll =''
var tes;
if(data[i].ielts_speaking != null){ 


var ielts_set_spcl = 'IELTS '+data[i].ielts_speaking+' Overall ('+data[i].ielts_reading+' in reading, '+data[i].ielts_speaking ? data[i].ielts_speaking+' in speaking':'test'+', '+data[i].ielts_writing+' in writing, '+data[i].ielts_listening+' in listening,  ) spl. Case.'  ;
var ielts_set      = 'IELTS '+data[i].min_ilets_overall+' Overall (none less than '+data[i].ielts_reading+' bands),'
}
else{ 
  var ielts_set_spcl ="";
  var ielts_set ="";
}
if(data[i].toefl_reading != null){
  var toefl_set =  'TOEFL '+data[i].min_toefl_ibt+' Overall (none less than '+data[i].toefl_reading+'),'  ;
}else{
  var toefl_set ='';
}
if(data[i].min_pte_reading != null){
  var pte_set          = 'PTE '+data[i].min_pte_overall+' Overall (none less than '+data[i].min_pte_reading+')';  
}else{
  var pte_set = '';
}


if(data[i].ielts_reading != data[i].ielts_speaking){
ielts_special_reading = data[i].ielts_reading;
ielts_special_speaking = data[i].ielts_speaking;
}

if(ielts_special_reading  === 0){ 
 tes = '<span> 	'+ielts_set+' '+toefl_set+' '+pte_set+'  </span>'
}
else{
//   tes = '<span>  '+toefl_set+'   '+pte_set+'  , '+ielts_set_spcl+' </span>'
tes = '<span> </span>'
}


var url = "{{url('public/uploads/university-logo')}}/"+data[i].image;

$('.parent-filter-courses ul').append(' <li class="course-list">    <div class="download-button"><button class="button">Download</button> </div><div class="course-list-info"> <img src="'+url+'" alt="" width="200" class="university-logo"> <div class="course-list-name"> <a target="_blank" href="'+data[i].course_url+'"> <p class="name"> '+data[i].course_name+'  </p> </a> <p class="university info">  <span class="fa fa-university"> University: </span> <a target="_blank" href="'+data[i].website+'"> <span> '+data[i].name+' </span> </a> </p><p class="country-name info"> <span class="fa fa-flag"> Country: </span> <span>'+data[i].country+' </span> </p> <p class="country-name info"> <span class="fa fa-flag"> City: </span> <span>'+data[i].city+' </span> </p> <p class="country-name info"><span class="fa fa-clock-o"> Duration:</span> <span>'+data[i].duration_year+'</span> <p class="country-name info"><span class="fa fa-calendar"> Intake:</span> <span>'+data[i].intake+'</span> <p class="country-name info"><span class="fa fa-dollar "> Application Fees:</span> <span>'+dollar+' '+data[i].application_fee+'  </span> <p class="country-name info"><span class="fa fa-dollar "> Tution Fees:</span> <span>'+dollar+' '+data[i].fees+' </span> </p> <p class="country-name info"><span class="fa fa-graduation-cap"> Min Qualification: </span> <span>'+data[i].min_education_eligibility+' </span> </p> <p class="country-name info"><span class="fa fa-book"> Eligibility:</span> <span>    </span>  '+tes+'   </p></div>  <div data-id='+data[i].unique_id+'  st_id="{{$id}}" course_name="'+data[i].course_name+'" class="sort-list-course" course_code = '+data[i].unique_id+' college_code='+data[i].code+'> <button class="go-detail-courese"> Add Course <span class="fa fa-arrow-right"></span> </button></div>  </div> <div class="college-detail-page filter-eligibility"> </div></div></li> ');
  
  
}


// document.getElementById('total_data').innerHTML = data[2];







$(document).ready(function(){
$('.sort-list-course').click(function(){
  
if(document.querySelectorAll('#my_course_List li').length  <= 24) {
$(this).find('.go-detail-courese').attr('disabled', "disabled");
$(this).find('.go-detail-courese').attr({'style':"background:#b0b3b6 !important"});

var u_id = $(this).attr('data-id');
var st_id = $(this).attr('st_id');
var emp_id = "<?php echo Auth::user()->unique_id ?>";
var course_code = $(this).attr('course_code');
var unique_id = $(this).attr('course_code');

var course_name = $(this).attr('course_name');

var college_code =$(this).attr('college_code');


// if(arr.indexOf(course_code) === -1) {
    arr.push(course_code);
    // console.log(arr);


var url = "{{url(Request::segment(1).'/'.'sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=1&college_code="+college_code;
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
type: "POST",
url: url,
success: function(data) {
var jsonResponse = JSON.parse(data);
var len = jsonResponse.length;
var node = document.createElement("LI"); 
var student_unique_id = document.createElement("input");
var emp_unique_id  = document.createElement("input");
var course_id = document.createElement("input");

$(student_unique_id).attr({"name":"student_unique_id[]","value":st_id, "style":"display:none"});
$(emp_unique_id).attr({"name":"emp_unique_id[]","value":emp_id, "style":"display:none"});
$(course_id).attr({"name":"course_id[]","value":course_code,"class":"course_id", "style":"display:none"});
          node.setAttribute("style","position:relative");
var textnode = document.createTextNode(course_name); 
var span = document.createElement("span");
var span2 = document.createElement("input");
var college_name = document.createElement('p');
let courseName = document.createElement('p');
courseName.setAttribute('style',`color: #736f6f;
    padding: 0;
    margin: 0;
    font-weight: 400;
    font-family: sans-serif;width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;`);
college_name.setAttribute('style',`color: #787575;
    padding: 0;
    margin: 0;
    font-weight: 400;
    font-family: sans-serif;`)
for(var i=0; i<len; i++){
var college_text = document.createTextNode(jsonResponse[i].name);
}
span.setAttribute("class","fa fa-close deselect-sort-list");
span2.setAttribute("class","set-course-priority");
span2.setAttribute("name","set_course_priority[]");
span2.setAttribute("type","number");
node.appendChild(span);   
courseName.appendChild(textnode);
node.appendChild(courseName); 
college_name.appendChild(college_text);
node.appendChild(college_name);   
node.appendChild(student_unique_id)   ;
node.appendChild(emp_unique_id);       
node.appendChild(course_id)    
document.getElementById("my_course_List").appendChild(node); 
if(document.querySelectorAll('#my_course_List li').length < 1){
  document.querySelector('#save_sort_list_button_parent').style="display:none";
  }
else{
  document.querySelector('#save_sort_list_button_parent').style="display:block";
}  
  $('.deselect-sort-list').click(function(event){
    
      var url2 = "{{url(Request::segment(1).'/'.'sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=0";
  $.ajax({
      type: "POST",
        url: url2,
        success: function(data) {
          
          removeDisable(event);
}
      });
})
  }
               });
}else{
      alert("You Have Reached The Maximum Add Course Limit");
      return false;
  }
  });

});



}
})
// }
// }

}

function removeDisable(event){
let courseId = event.target.parentElement.querySelector('[name="course_id[]"]').value;
$(event.target).parent().remove();
if(document.querySelector('[course_code="'+courseId+'"] .go-detail-courese')){
 document.querySelector('[course_code="'+courseId+'"] .go-detail-courese').disabled = false;
}
if(document.querySelector('[course_code="'+courseId+'"] .go-detail-courese')){
 document.querySelector('[course_code="'+courseId+'"] .go-detail-courese').style="background:#2b6699";
}
if(document.querySelectorAll('#my_course_List li').length < 1){
  document.querySelector('#save_sort_list_button_parent').style="display:none";
} 
}
      </script>  






{{-- @include('chat-box'); --}}

















{{-- section for append course  --}}
<script>
                        $( function() {
                          $( "#my_course_List" ).sortable();
                          $( "#my_course_List" ).disableSelection();
                        } );
                        </script>

{{ Form::open(array('url' => url(Request::segment(1).'/'.'education/save-courses'))) }}  
      
<div class="my-course-list-parent" style="width:0px ">
        <ol id="my_course_List" >
           {{-- <li> Choose your courses by filter using country, city, Institue etc.  </li>  --}}
        </ol>
           
            <div id='save_sort_list_button_parent' class="my-3 text-center">  <button id="save_sort_list_button" class="btn btn-danger w-10" type="submit" value="Save">Save    </button> 
            <input type="hidden" name="unique_id" value="">
          <button  type="button" class="btn btn-danger w-10" id="save_sort_list_button2" data-toggle="modal" data-target="#myModal">Download</button>  
          <button type="button"  class="btn btn-danger w-10" id="send_corse_emailer_button" data-toggle="modal" data-target="#send_corse_emailer">Send Mail</button>
          <button type="button"  class="btn btn-danger w-10" id="send_corse_whatsapp_button" data-toggle="modal" data-target="#send_corse_whatsapp">Whatsapp</button>  
        </div>  
            
            </div>  
          </div>
          <button type ="button" class="show bbb" id="toggleButtonFilterCourse">Show Course</button>
    
            {{ Form::close() }}
        
<script> 
// var yourSidebar = $(".sidebar");
//   $(document).on("click.toggleNav touch.toggleNav", ".show", function(){ 
//    yourSidebar.toggleClass("open");
//   });

$(document).ready(function(){
  $('#toggleButtonFilterCourse').toggle(function(){
$('#my_course_List').addClass('hide-filter-coure');
  })
})



$("#send_corse_emailer_button").click(function(){
     let count = 0;
     let course_id = [];
        $("#my_course_List li").each(function(){
            
            course_id.push($(this).find(".course_id").val());
            
        })
        let course_ids = JSON.stringify(course_id);
        
        $("#course_ids").val(course_ids);
});
  </script>
                

<script>

</script>
<script>
  // document.querySelector('#toggleButtonFilterCourse').addEventListener('click',function(){
  //   document.querySelector('#toggleButtonFilterCourse').style.cssText="transform: rotate(90deg);position: fixed;white-space: nowrap;left: -35px";
  //   var pppp = document.querySelector('#toggleButtonFilterCourse').getAttribute("style");
  //   if(pppp.trim() ==  "transform: rotate(90deg); position: fixed; white-space: nowrap; left: -35px;"){
  //     document.querySelector('#toggleButtonFilterCourse').style.cssText="transform: rotate(90deg);position: fixed;white-space: nowrap;left: 83%;top: 50%";
  //     alert('a');
  //   }
  //   else{
  //     document.querySelector('#toggleButtonFilterCourse').style.cssText="transform: rotate(90deg);position: fixed;white-space: nowrap;left: -35px";
  //     alert('b');
  //   }
  // })
  document.querySelector('#toggleButtonFilterCourse').addEventListener('click',function(){
    if( document.querySelector('#toggleButtonFilterCourse').classList.contains('toggle-button-filter-course') ===true){
      document.querySelector('#toggleButtonFilterCourse').classList.remove('toggle-button-filter-course');
      document.querySelector('#toggleButtonFilterCourse').classList.add('bbb');
      document.querySelector('.my-course-list-parent').style="width:0%; transition-duration: .4s;";
      
    }
    else{
      document.querySelector('#toggleButtonFilterCourse').classList.add('toggle-button-filter-course');
      document.querySelector('#toggleButtonFilterCourse').classList.remove('bbb');
      document.querySelector('.my-course-list-parent').style.cssText="width:322px;left:-7px;transition-duration:.4s;padding:0";
      
    }
  })
</script>
<style>
  .checkbox{
    cursor: pointer;
  }
  .multiselect-selected-text{
    margin-top: -10px;
  }
  .my-course-list-parent p{
  overflow: hidden;
}
  </style>
<script>
  // document.querySelector('.cross').addEventListener('click',function(){
  //   document.querySelector('#myModal').style.display="none";
  // })
</script>

@endsection
 
{{-- <p class="sort-course"><label class="switch toggle-button" > <input type="checkbox" name="visa_rejected" > <span class="slider round"></span> </label></p> --}}


<!-- download modal include start -->
<div class="modal" id="myModal" style="z-index:100">
  <div class="">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Please select the required field</h4>
        <button type="button" class="close removecourese" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->

      <div class="container my-3" id="export_list">
        {{Form::open(array('url'=>url(Request::segment(1).'/'.'export-excell'), 'method'=>'get'))}}
      
        <div class="row">
            <div class="col-md-4">
<ul class="imi-url" style="list-style:none">
  
    <li><input type="hidden" class="form-check-input" value=""></li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="name">University</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="website">Website URL</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="level">Study Level</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="min_education_eligibility">Entry Requirements</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="min_toefl_ibt">TOEFL Score</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="min_pte_overall">PTE No Band Less Than</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">GRE Score</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="application_fee">Application Fee</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">Scholarship Detail</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">ESL/ELP Detail</li>
    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="course_name">Course Name</li>
</ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="city">Campus</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="duration_year">Duration</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="ielts_reading">IELTS Score</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="min_toefl_ibt">TOEFL No Band Less Than</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="">SAT Score</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="">GMAT Score</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="fees">Tution Fee</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="">Backlog Range</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="">Concentration</li>
                    <li><input name="get_data[]" type="checkbox" class="form-check-input" value="country">Country</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="intake">Intakes</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="min_ilets_overall">IELTS No Band Less Than</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="min_pte_reading">PTE Score</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">ACT Score</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">Application Deadline</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">Scholarship Available</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="other_requirments">Remarks</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">Application Mode</li>
                    <li><input name="get_data[]"type="checkbox" class="form-check-input" value="">Det Score</li>
                </ul>
            </div>
            <p class="msg"> Checked Atleast One Checkbox </p>
            
            <div class="col-md-12 text-center my-4">
                   
           <input class="btn btn-danger w-10" type="button" value="Clear All" id="clear-all">
              <input class="btn btn-danger w-10" type="button" value="Select All" id="select-all">
              <input class="btn btn-danger w-10" type="submit" value="Export to Excel" id="export_excell">
             </div>
        </div>












    </form>
    </div>
      <!-- Modal footer -->

    </div>
  </div>
</div>

<!-- download modal include end -->
@php
if(isset($_GET['id'])){
$user_id = $_GET['id'];
$user_data = enquiries::get_enquiries($user_id);
$email = $user_data[0]->email;
}
else{
$email = "";
}
@endphp
<!--emailer modal start-->
<div class="modal" id="send_corse_emailer" style="z-index:100">
  
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Course Emailer</h4>
        <button type="button" class="close removecourese" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="container my-3" id="">
          
      <form method="POST" action="{{ url(Request::segment(1).'/send-emailer-content') }}">
          @CSRF
        <input type="hidden" id="course_ids" name="courses_ids">
        <input type="email" class="form-control" name="email" value={{$email}}>

<button class="btn btn-danger w-10 mybtn" type="submit"> Send Mail</button>
     
    
    </form> 
      </div>
    </div>
      </div>



      <div class="modal" id="send_corse_whatsapp" style="z-index:100">
  
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Course Whatsapp</h4>
            <button type="button" class="close removecourese" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="container my-3" id="">
              
          <form method="GET" action="{{'https://api.whatsapp.com/send'}}" target="_blank">
              
            <input type="hidden" id="course_ids" name="courses_ids">
            <input type="hidden" value="https://hms.craftzvilla.com/client-manager/public/images/logo-color.png" name="text">
            
            <input type="text" class="form-control" name="phone" value="91{{$email}}">
    
    <button class="btn btn-danger w-10 mybtn" type="submit"> Send </button>
         
        
        </form> 
          </div>
        </div>
          </div>

<!--ens emailer modal-->




{{-- https://tawk.link/5c24a65982491369ba9f9e1c/a/5c300eab9658af0ef9f69f31/1f06596de1bf7bcda63fdea12589b01b9f31ef7f/Logs.txt --}}


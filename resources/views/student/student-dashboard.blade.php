<?php
 use App\Helpers\Helper;
 use Carbon\Carbon;
  ?>
@extends('header')
@section('student-dashboard')

<style>
.dot5, .dot5, .dot50{
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

  .table-default p{
    margin: 11px 2px;
    padding: 10px 46px;
    width: 15%;
  }
  .card{box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
    border-radius: 10px;}
  p{
    margin: 0;
  }
 .card .heading-count-no {
  font-size: 20px;
    font-weight: 600;
    color: #ffffff;
    background-color: #34495e;
    padding: 7px;
    border-radius: 10px 10px 0px 0px;
  }
    .col-md-12 .card:nth-child(2) .heading-count-no{
      color: green;
    }


 .card .card-body{padding: 11px 5px}
  * {box-sizing: border-box}
  /* body {font-family: Verdana, sans-serif; margin:0} */
   .mySlides{display:none}
  .mySlides:first-child {display: block}
  img {vertical-align: middle;}
  
  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }
  
  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }
  

  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }
  

  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
  }
  
  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }
  
  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }
  
  /* The dots/bullets/indicators */
  .dot,.dot2, .dot3, .dot4, .dot81, .dot100, .dot99, .dot101 {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }
  
  .active, .dot:hover {
    background-color: #717171;
  }
  
  /* Fading animation */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
  }
  
  @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
  }

  .total-count-no-child{float: left;

/* border-radius: 50%; */
margin: 6px 0;
text-align: center;
color: #fff;
height: 55px;
width: 33%;}

.total-count-no-child:nth-child(1){
background: #c45656;

}
.total-count-no-child:nth-child(2){
background: #3f8e3f;


}
.total-count-no-child:nth-child(3){
background: #3f3f5b;


}
.total-count-no-child p:nth-child(1){
line-height: 2
} 
.total-count-no-child p:nth-child(2){
line-height: 1
} 
.card hr{
margin: 0;
}
.total-count-no{
position: absolute;
right: 23px;
background: #458bbb;
padding: 2px 14px;
margin: 0;
color: #fff;
font-weight: 600;
border-radius: 5px;
font-size: 15px;
top: 8px;
}

.card-body .dot, .card-body .dot2{
margin-top:2px; 
} 
  </style>
<div class="col-md-12">
<br><br>    
    <h2 style="color: #5d5656;
    text-align: center;
    margin-bottom: 20px;">Student Dashboard</h2> 
    <?php
$new_leads = DB::table('enquiries')
// ->select('enquiries.name','enquiries.id as id','disposition', DB::raw('count(enq_comments.comment) as comment'), 'enq_comments.client_enquiry_id' )
->select('name','disposition','id')
// ->join('enq_comments', 'enquiries.unique_id', '=', 'enq_comments.client_enquiry_id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',1)
->where('lead_update', 0)
->where('lead_upadte_on', null)
// ->groupBy('enq_comments.client_enquiry_id')
// ->having('comment', '>', 1)
->get();
// dd($new_leads);
    ?>
    <div class="row">
      
        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
          <div class="card  ">
            
            <p class="heading-count-no">New Students </p><p class="total-count-no">{{count($new_leads)}}</p>
            <hr>
            <div class="card-body ">    
                <div class="slideshow-container">
              <div class="count-app-no mySlides5 fad">
                <div class="count-app-no-child" ><p>Applicant's Name:</p><p> @if(count($new_leads) > 0) {{$new_leads[0]->name?$new_leads[0]->name:'-'}} @else -@endif </p></div>
                <div class="count-app-no-child"><p>Counsellor: </p><p>{{Auth::user()->name}}</p> </div>
                <div class="count-app-no-child" ><p>Current Status:</p><p> @if(count($new_leads) > 0) {{$new_leads[0]->disposition?$new_leads[0]->disposition:'-'}} @else -@endif</p> 
                </div>
                <div class="count-app-no-child" ><p>Reference No.:</p><p> @if(count($new_leads) > 0) {{$new_leads[0]->id?'IC'.$new_leads[0]->id:'-'}} @else -@endif</p> </div>
                
              </div>
                
                <div class="mySlides5 count-app-no fad">
                  <div class="count-app-no-child" ><p>Applicant's Name:</p><p> @if(count($new_leads) > 1) {{$new_leads[1]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Counsellor: </p><p>{{Auth::user()->name}}</p>
                  </div>
                  <div class="count-app-no-child"><p>Current Status:</p><p> @if(count($new_leads) > 1) {{$new_leads[1]->disposition?$new_leads[1]->disposition:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Reference No.:</p><p> @if(count($new_leads) > 1) {{$new_leads[1]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
                <div class="mySlides5 count-app-no fad">
                  <div class="count-app-no-child"><p>Applicant's Name:</p><p> @if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p> </div>
                  <div class="count-app-no-child" ><p>Counsellor: </p><p>{{Auth::user()->name}}</p></div>
                  <div class="count-app-no-child"><p>Current Status:</p><p>@if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Reference No.:</p><p>@if(count($new_leads) > 2) {{$new_leads[2]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
               
                </div>
                
                
                <div style="text-align:center">
                  <span class="dot5" onclick="currentSlide5(1)"></span> 
                  <span class="dot5" onclick="currentSlide5(2)"></span> 
                  <span class="dot5" onclick="currentSlide5(3)"></span> 
                </div>
                
                <div class="total-count-no-parent">
                  <div class="total-count-no-child">
                    <?php  
     
// $new_leads = DB::table('enquiries')
// ->select('enquiries.name','enquiries.id as id','disposition', DB::raw('count(enq_comments.comment) as comment'), 'enq_comments.client_enquiry_id' )
// ->join('enq_comments', 'enquiries.unique_id', '=', 'enq_comments.client_enquiry_id')
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->where('conversion',1)
// ->whereBetween('enq_comments.date', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
// ->groupBy('enq_comments.client_enquiry_id')
// ->having('comment', '>', 1)
// ->get();

$new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',1)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
->get();

// dd($new_leads);
                    ?>
                      <p>{{count($new_leads)}}</p>
                      <p>Today</p>
                    
                  </div>

                  <div class="total-count-no-child">
                    <div> 
                      <p>
                        <?php
                     $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 


// $new_leads = DB::table('enquiries')
// ->select('enquiries.name','enquiries.id as id','disposition', DB::raw('count(enq_comments.comment) as comment'), 'enq_comments.client_enquiry_id' )
// ->join('enq_comments', 'enquiries.unique_id', '=', 'enq_comments.client_enquiry_id')
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->where('conversion',1)
// ->whereBetween('enq_comments.date', [date("$weekly_leads_7days 00:00:00"), date('Y-m-d 23:59:59')])
// ->groupBy('enq_comments.client_enquiry_id')
// ->having('comment', '>', 1)
// ->get();

$new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',1)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->whereBetween('created_at', [date("$weekly_leads_7days 00:00:00"), date('Y-m-d 23:59:59')])
->get();

// dd($new_leads);

echo count($new_leads);
                        ?>

                      </p>
                      <p>1 week</p>
                    </div>
                  </div>
                  <div class="total-count-no-child">
                    <div> 
                      <p>
                        <?php
 $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -1 month" ) ); 

$new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',1)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->whereBetween('created_at', [date("$weekly_leads_7days 00:00:00"), date('Y-m-d 23:59:59')])
->get();

echo count($new_leads);

                        ?>

                      </p>
                      <p>1 Month</p>
                    </div>
                  </div>
                                  </div>

                <script>
                var slideIndex = 1;
                showSlides5(slideIndex);
                
                function plusSlides(n) {
                  showSlides5(slideIndex += n);
                }
                
                function currentSlide5(n) {
                  showSlides5(slideIndex = n);
                }
                
                function showSlides5(n) {
                  var i;
                  var slides = document.getElementsByClassName("mySlides5");
                  var dots = document.getElementsByClassName("dot5");
                  if (n > slides.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                      slides[i].style.display = "none";  
                  }
                  for (i = 0; i < dots.length; i++) {
                      dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                }
                </script>
             <div class="text-center">
             <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="New Students" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
             </div>
            </div>  
          </div>
        </div>
      <!----First Card-->
      
      
      <!----Second Card-->
      <?php 
      

      ?>
      <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
      <div class="card  ">
        
        <p class="heading-count-no" >Follow Up</p><p class="total-count-no"><?php 
         
 $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();

// dd($followup);
echo count($followup);
        ?></p>
        <hr>
        <div class="card-body ">
          

              
            <div class="slideshow-container">
          <div class="count-app-no mySlides2 fad">
            <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($followup) > 0) {{$followup[0]->name?$followup[0]->name:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($followup) > 0) {{$followup[0]->disposition?$followup[0]->disposition:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p>Reference No:</p> <p>@if(count($followup) > 0) {{$followup[0]->id?$followup[0]->id:'-'}} @else -@endif</p></div>
            
          </div>
            
            <div class="mySlides2 count-app-no fad">
              <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($followup) > 1) {{$followup[1]->name?$followup[1]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($followup) > 1) {{$followup[1]->disposition?$followup[1]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($followup) > 1) {{$followup[1]->id?$followup[1]->id:'-'}} @else -@endif</p></div>
            </div>
            
            <div class="mySlides2 count-app-no fad">
              <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($followup) > 2) {{$followup[2]->name?$followup[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($followup) > 2) {{$followup[2]->name?$followup[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($followup) > 2) {{$followup[2]->name?$followup[2]->id:'-'}} @else -@endif</p></div>
            </div>
            
           
            </div>
            
            
            <div style="text-align:center">
              <span class="dot2" onclick="currentSlides2(1)"></span> 
              <span class="dot2" onclick="currentSlides2(2)"></span> 
              <span class="dot2" onclick="currentSlides2(3)"></span> 
            </div>
            
            <div class="total-count-no-parent">
              <div class="total-count-no-child">
                <?php  
 $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('lead_upadte_on',date('Y-m-d'))
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();

//   dd($followup);
                  ?>
                  <p>{{count($followup)}}</p>
                  <p>Today</p>
                
              </div>

              <div class="total-count-no-child">
                <div> 
                  <p><?php 
                     $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

// $weekly_leads = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->whereOr('disposition','Visited')
// ->whereOr('disposition','Pending')
// ->whereOr('disposition','In Progress')
// ->whereOr('disposition','Follow Up')

// ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
// ->get();


 $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereBetween('lead_upadte_on',["$weekly_leads_7days",date('Y-m-d')])
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();


echo count($followup);
                    ?></p>
                  <p>1 week</p>
                </div>
              </div>
              <div class="total-count-no-child">
                <div> 
                  <p>
                    <?php
 $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -30 day" ) ); 

// $weekly_leads = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->whereOr('disposition','Visited')
// ->whereOr('disposition','Pending')
// ->whereOr('disposition','In Progress')
// ->whereOr('disposition','Follow Up')

// ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
// ->get();

 $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereBetween('lead_upadte_on',["$weekly_leads_7days",date('Y-m-d')])
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();

echo count($followup);
                    ?>

                  </p>
                  <p>1 Month</p>
                </div>
              </div>
                              </div>

            <script>
            var slideIndex = 1;
            showSlides2(slideIndex);
            
            function plusSlides(n) {
              showSlides2(slideIndex += n);
            }
            
            function currentSlides2(n) {
              showSlides2(slideIndex = n);
            }
            
            function showSlides2(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides2");
              var dots = document.getElementsByClassName("dot2");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
         <div class="text-center">
        <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Follow Up" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
         </div>
        </div>  
      </div>
    </div>
 <!----Second Card-->

<!----Third Card-->
<?php
 
 $future = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Future Lead")
->get();

?>
    <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
      <div class="card  ">
        
      <p class="heading-count-no">Future Leads</p><p class="total-count-no">{{count($future)}}</p>
        <hr>
        <div class="card-body ">
          
          <?php
//  $future = DB::table('enquiries')
//  ->select('name','id','disposition' )
//  ->where('delete_client',1)
//  ->where('agent_unique_id',Auth::user()->unique_id)
//  ->where('disposition',"Future Lead")
// ->where('conversion',1)
//  ->get();
?> 

              
            <div class="slideshow-container">
          <div class="count-app-no mySlides3 fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($future) > 0) {{$future[0]->name?$future[0]->name:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($future) > 0) {{$future[0]->disposition?$future[0]->disposition:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($future) > 0) {{$future[0]->id?$future[0]->id:'-'}} @else -@endif</p></div>
            
          </div>
            
            <div class="mySlides3 count-app-no fad">
              <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($future) > 1) {{$future[1]->name?$future[1]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($future) > 1) {{$future[1]->disposition?$future[1]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($future) > 1) {{$future[1]->id?$future[1]->id:'-'}} @else -@endif</p></div>
            </div>
            
            <div class="mySlides3 count-app-no fad">
              <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($future) > 2) {{$future[2]->name?$future[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($future) > 2) {{$future[2]->disposition?$future[2]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($future) > 2) {{$future[2]->id?$future[0]->id:'-'}} @else -@endif</p></div>
            </div>
            
           
            </div>
            
            
            <div style="text-align:center">
              <span class="dot3" onclick="currentSlide3(1)"></span> 
              <span class="dot3" onclick="currentSlide3(2)"></span> 
              <span class="dot3" onclick="currentSlide3(3)"></span> 
            </div>
            
            <div class="total-count-no-parent">
              <div class="total-count-no-child">
                  <p>
                    <?php 
                  echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Future Lead")
 ->where('future_lead_date', date('Y-m-d'))
->where('conversion',1)
 ->get());
                                    ?>
                         

                  </p>
                  <p>Today</p>
                
              </div>

              <div class="total-count-no-child">
                <div> 
                  <p>
                    <?php 
                    
                    $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

                 echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Future Lead")
 ->whereBetween('future_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',1)
 ->get());


                                    ?>
                         

                  </p>
                  <p>1 week</p>
                </div>
              </div>
              <div class="total-count-no-child">
                <div> 
                  <p>
                    <?php 
                    
                    $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -120 day" ) ); 

               echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Future Lead")
 ->whereBetween('future_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',1)
 ->get());


                                    ?>

                  </p>
                  <p>1 Month</p>
                </div>
              </div>
                              </div>

            <script>
            var slideIndex = 1;
            showSlides3(slideIndex);
            
            function plusSlides(n) {
              showSlides3(slideIndex += n);
            }
            
            function currentSlide3(n) {
              showSlides3(slideIndex = n);
            }
            
            function showSlides3(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides3");
              var dots = document.getElementsByClassName("dot3");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
         <div class="text-center">
         <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Future Lead" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
         </div>
        </div>  
      </div>
    </div>


        
      <!----Third Card--> 
    
 <!----Fourth Card--> 
 
 <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
  <div class="card  ">
    
    <p class="heading-count-no">Dead</p><p class="total-count-no">
      <?php 
    
 $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Dead Lead")
->get();
echo count($dead);
      ?>
    </p>
    <hr>
    <div class="card-body ">
      


        <div class="slideshow-container">
      <div class="count-app-no mySlides4 fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
        <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?$dead[0]->id:'-'}} @else -@endif</p></div>
        
      </div>
        
        <div class="mySlides4 count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?$dead[1]->id:'-'}} @else -@endif</p></div>
        </div>
        
        <div class="mySlides4 count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 2) {{$dead[2]->disposition?$dead[2]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 2) {{$dead[2]->id?$dead[2]->id:'-'}} @else -@endif</p></div>
        </div>
        
       
        </div>
        
        
        <div style="text-align:center">
          <span class="dot4" onclick="currentSlide4(1)"></span> 
          <span class="dot4" onclick="currentSlide4(2)"></span> 
          <span class="dot4" onclick="currentSlide4(3)"></span> 
        </div>
        
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            
              <p>
                <?php 
                  
    echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->where('dead_lead_date', date('Y-m-d'))
->where('conversion',1)
 ->get());
                     ?>
              </p>
              <p>Today</p>
            
          </div>

          <div class="total-count-no-child">
            <div> 
              <p>
                
                <?php  
                  
  $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

                echo count( DB::table('enquiries')
 ->select('id')
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->whereBetween('dead_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',1)
 ->get());
                  ?>
              </p>
              <p>1 week</p>
            </div>
          </div>
          <div class="total-count-no-child">
            <div> 
              <p> <?php  
                  
                $dt = date("Y-m-d");
                                   $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -30 day" ) ); 
              
                                    echo count( DB::table('enquiries')
 ->select('id')
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->whereBetween('dead_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',1)
 ->get());
                                ?></p>
              <p>1 Month</p>
            </div>
          </div>
                          </div>

        <script>
        var slideIndex = 1;
        showSlides4(slideIndex);
        
        function plusSlides(n) {
          showSlides4(slideIndex += n);
        }
        
        function currentSlide4(n) {
          showSlides4(slideIndex = n);
        }
        
        function showSlides4(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides4");
          var dots = document.getElementsByClassName("dot4");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
     <div class="text-center">
      <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Dead Lead" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
     </div>
    </div>  
  </div>
</div>
 <!----Fourth Card--> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      
 <!----Fifth Card--> 
 
 <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
  <div class="card  ">
    
    <p class="heading-count-no">Birthday</p><p class="total-count-no">
      <?php 
      $dead = (DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('dob','!=','NULL')
->where('conversion',1)
->get());

      echo count($dead);  ?>
    </p>
    <hr>
    <div class="card-body ">
      

  <?php        
//  $dead = DB::table('enquiries')
 
//  ->where('delete_client',1)
//  ->where('agent_unique_id',Auth::user()->unique_id)
//  ->where('dob','!=','NULL')
//  ->where('conversion',1)
//  ->limit(5)->get();
 
?>
        <div class="slideshow-container">
      <div class="count-app-no mySlides50 fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
        <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?$dead[0]->id:'-'}} @else -@endif</p></div>
        
      </div>
        
        <div class="mySlides50 count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?$dead[1]->id:'-'}} @else -@endif</p></div>
        </div>
        
        <div class="mySlides50 count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 2) {{$dead[2]->disposition?$dead[2]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 2) {{$dead[2]->id?$dead[2]->id:'-'}} @else -@endif</p></div>
        </div>
        
       
        </div>
        
        
        <div style="text-align:center">
          <span class="dot50" onclick="currentSlide50(1)"></span> 
          <span class="dot50" onclick="currentSlide50(2)"></span> 
          <span class="dot50" onclick="currentSlide50(3)"></span> 
        </div>
        
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            
              <p>
                <?php 
                  
 echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                     ->whereDay('dob', '=', Carbon::now()->format('d'))
                     ->where('conversion',1)
                     ->get()); 
                     ?>
              </p>
              <p>Today</p>
            
          </div>

          <div class="total-count-no-child">
            <div> 
              <p>
                
                <?php  
            
  
                     $weekly_leads_7days = date( "m-d", strtotime( "$dt -7 day" ) ); 
                     


//  DATE_FORMAT('dob', '%m-%d') = DATE_FORMAT('2000-07-10', '%m-%d')
                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                //     ->where('conversion',1)
                    //  ->whereBetween(DATE_FORMAT('dob', '%m-%d'),[$weekly_leads_7days, date('m-d')])
                     
                    //  ->get());
                      
                    //  SELECT * FROM enquiries WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT('2021-06-17', '%m-%d');
                    //  echo count(DB::select(DB::raw("SELECT * FROM enquiries WHERE MONTH(STR_TO_DATE(dob, '%d/%m/%Y')) = MONTH(NOW())")));
                //   dd( DB::select(DB::raw("select `id` from `enquiries` where `delete_client` = 1 and `agent_unique_id` = '$auth'  and `conversion` = 1 and  MONTH(STR_TO_DATE(dob, '%d/%m/%Y')) = MONTH(NOW())")));
                  
                   echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                      ->whereDate( 'dob', '<=', now()->addDays(7))
                     ->where('conversion',1)
                     ->get()); 
                  
                  ?>
              </p>
              <p>1 week</p>
            </div>
          </div>
          <div class="total-count-no-child">
            <div> 
              <p> <?php  
                  
                $dt = date("Y-m-d");
                                   $weekly_leads_7days = date( "d", strtotime( "$dt -30 day" ) );
                                   
                                  $mon = date('m', strtotime("$dt -1 month"));
                                  
                                  
                                  
                                  
                                           echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                     ->where('conversion',1)
                     ->get()); 
                                ?></p>
              <p>1 Month</p>
            </div>
          </div>
                          </div>

        <script>
        var slideIndex = 1;
        showSlides50(slideIndex);
        
        function plusSlides(n) {
          showSlides50(slideIndex += n);
        }
        
        function currentSlide50(n) {
          showSlides50(slideIndex = n);
        }
        
        function showSlides50(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides50");
          var dots = document.getElementsByClassName("dot50");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
     <div class="text-center">
      <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Birthday" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
     </div>
    </div>  
  </div>
</div>
 <!----End Fifth Card--> 
    
    
    
    
    
    
    
    
    
    
    
     
 <!----sixth Card--> 
 
 <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
  <div class="card  ">
    
    <p class="heading-count-no">Payment</p><p class="total-count-no">
      <?php 
     
 $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Done')
->where('payment_done', 1)
->get();

echo count($dead);

      ?>
    </p>
    <hr>
    <div class="card-body ">
      

        <div class="slideshow-container">
      <div class="count-app-no mySlides fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
        <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?$dead[0]->id:'-'}} @else -@endif</p></div>
        
      </div>
        
        <div class="mySlides count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?$dead[1]->id:'-'}} @else -@endif</p></div>
        </div>
        
        <div class="mySlides count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 2) {{$dead[2]->disposition?$dead[2]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 2) {{$dead[2]->id?$dead[2]->id:'-'}} @else -@endif</p></div>
        </div>
        
       
        </div>
        
        
        <div style="text-align:center">
          <span class="dot50" onclick="other.call(this,event);" num="1"></span> 
          <span class="dot50" onclick="other.call(this,event);" num="2"></span> 
          <span class="dot50" onclick="other.call(this,event);" num="3"></span> 
        </div>
        
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            
              <p>
                <?php 
  $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Done')
->where('payment_done', 1)
->where('payment_done_date', date('Y-m-d'))
->get();



               echo count($dead);
                     ?>
              </p>
              <p>Today</p>
            
          </div>

          <div class="total-count-no-child">
            <div> 
              <p>
                
                <?php  
            
 
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 
       
 $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Payment Done")
->where('payment_done', 1)
->whereBetween('payment_done_date', [$weekly_leads_7days, date('Y-m-d')])
->get();

     echo count($dead       );    
                  ?>
              </p>
              <p>1 week</p>
            </div>
          </div>
          <div class="total-count-no-child">
            <div> 
              <p> <?php  
                  
                $dt = date("Y-m-d");
                                   $weekly_leads_7days = date( "d", strtotime( "$dt -30 day" ) );
    $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Payment Done")
->where('payment_done', 1)
->whereBetween('payment_done_date', [$weekly_leads_7days, date('Y-m-d')])
->get();


     echo count($dead       );   
                                ?></p>
              <p>1 Month</p>
            </div>
          </div>
                          </div>

        <script>
        
        
      
        var slideIndex = 1;
        showSlides50(slideIndex);
        
        function plusSlides(n) {
          showSlides50(slideIndex += n);
        }
        
        function currentSlide50(n) {
          showSlides50(slideIndex = n);
        }
     window.addEventListener('load', other());
          function other(event){
              
              var  n = this.getAttribute("num");
                
              var slideIndex = n;
              
    //   console.log(this.parentElement.parentElement)
      var main = this.parentElement.parentElement;
      main.children[0].children.length;
    var len =  main.children[0].childElementCount;
    var slides = main.children[0].children;
    var dots = main.children[1].children;
        // main.children[1].children.forEach(e=>{})
          var i;
          
        //   var slides = document.getElementsByClassName("mySlides50");
        //   var dots = document.getElementsByClassName("dot50");
          if (n > len) {slideIndex = 1
              
            //   console.log(slideIndex);
          }    
          if (n < 1) {slideIndex = len}
          for (i = 0; i < len; i++) {
          
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        
        } 
        style.display = "block";
        </script>
     <div class="text-center">
      <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Payment" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
     </div>
    </div>  
  </div>
</div>
 <!----End sixth Card--> 
    
    
    
    
  
    
    
     
 <!----seven Card--> 
 
 <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
  <div class="card  ">
    
    <p class="heading-count-no">Payment Pending</p><p class="total-count-no">
      <?php 
                       
                     
     $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Pending')
->where('payment_done', 0)
->get();
    echo count($dead);       
?>
    </p>
    <hr>
    <div class="card-body ">
      

  <?php        
//  $dead = DB::table('sort_list_courses')
// ->select('enquiries.name','enquiries.id','enquiries.disposition' )
// ->rightjoin('enquiries', 'enquiries.unique_id','=', 'sort_list_courses.student_unique_id' )
// ->where('enquiries.agent_unique_id', Auth::user()->unique_id)
// ->where('enquiries.payment_done','!=', 1)
// ->where('delete_client',1)
// ->groupBy('sort_list_courses.student_unique_id')
// ->limit(5)
// ->get();
?>
        <div class="slideshow-container">
      <div class="count-app-no mySlides fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
        <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?$dead[0]->id:'-'}} @else -@endif</p></div>
        
      </div>
        
        <div class="mySlides count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?$dead[1]->id:'-'}} @else -@endif</p></div>
        </div>
        
        <div class="mySlides count-app-no fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>-</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 2) {{$dead[2]->disposition?$dead[2]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 2) {{$dead[2]->id?$dead[2]->id:'-'}} @else -@endif</p></div>
        </div>
        
       
        </div>
        
        
        <div style="text-align:center">
          <span class="dot50" onclick="other.call(this,event);" num="1"></span> 
          <span class="dot50" onclick="other.call(this,event);" num="2"></span> 
          <span class="dot50" onclick="other.call(this,event);" num="3"></span> 
        </div>
        
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            
              <p>
                <?php 
                
     
      echo count( $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Pending')
->where('payment_done', 0)
->where('payment_pending_date', date('Y-m-d'))
->get());      
                     
                     
                     
                     ?>
              </p>
              <p>Today</p>
            
          </div>

          <div class="total-count-no-child">
            <div> 
              <p>
                
                <?php  
            
  
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 
                     

$a = date( "m-d", strtotime( "$dt +1 day" ) ); 

                   
      echo count( $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Pending')
->where('payment_done', 0)
->whereBetween('payment_pending_date', [$weekly_leads_7days, date('Y-m-d')])
->get());  
                
                  ?>
              </p>
              <p>1 week</p>
            </div>
          </div>
          <div class="total-count-no-child">
            <div> 
              <p> <?php  
                  
                $dt = date("Y-m-d");
                                   $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -30 day" ) );   
                                  
                                                                       
            
      echo count( $dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','Payment Pending')
->where('payment_done', 0)
->whereBetween('payment_pending_date', [$weekly_leads_7days, date('Y-m-d')])
->get());  
             
                                ?></p>
              <p>1 Month</p>
            </div>
          </div>
                          </div>

        <script>
        
        
      
        var slideIndex = 1;
        showSlides50(slideIndex);
        
        function plusSlides(n) {
          showSlides50(slideIndex += n);
        }
        
        function currentSlide50(n) {
          showSlides50(slideIndex = n);
        }
     window.addEventListener('load', other());
          function other(event){ 
              
                
              

              var  n = this.getAttribute("num");
                
              var slideIndex = n;
              
    //   console.log(this.parentElement.parentElement)
      var main = this.parentElement.parentElement;
      main.children[0].children.length;
    var len =  main.children[0].childElementCount;
    var slides = main.children[0].children;
    var dots = main.children[1].children;
        // main.children[1].children.forEach(e=>{})
          var i;
          
        //   var slides = document.getElementsByClassName("mySlides50");
        //   var dots = document.getElementsByClassName("dot50");
          if (n > len) {slideIndex = 1
              
            //   console.log(slideIndex);
          }    
          if (n < 1) {slideIndex = len}
          for (i = 0; i < len; i++) {
          
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        
        } 
        style.display = "block";
        </script>
     <div class="text-center">
      <form action="{{url(Request::segment(1))}}/view-students" class="bn btn-info btn-sm">
                  <input type="hidden" value="Students Payment Pending" name="new_leads">
                  <input type="hidden" name="type" value = "1">
                  <input type="submit" value="View All">
              </form>
     </div>
    </div>  
  </div>
</div>
 <!----End sixth Card--> 
      
    
    
    
    </div>
  

</div>
  @endsection
  
<?php
use Carbon\Carbon;
?>
<style>
.count-app-no-child p{white-space:nowrap;overflow:hidden;}
.slideshow-container {
    
    min-height:120px;
}
</style>
<div class="col-md-12" style=" margin-top: -35px; ">
    
    <h2 class="index-h2 text-center mb-4">ALL LEADS</h2> 
    <?php
// if(strtotime(date("Y-m-d", strtotime($recentlyActivity1[0]->created_at))) == strtotime(date('Y-m-d'))){

// $new_leads = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)

// ->whereDate('date', DB::raw('CURDATE()'))
// ->where('conversion',0)
// ->get();
// dd(count($user));




$new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',0)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->get();





    ?>
    <div class="row">
      
        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
          <div class="card">
            
            <p class="heading-count-no">New Leads</p><p class="total-count-no">{{count($new_leads)}}</p>
            <hr>
            <div class="card-body ">
              
   
                  
                <div class="slideshow-container">
              <div class="count-app-no mySlides fad">
                <div class="count-app-no-child"><p style="color: #0269cf;">Aplicant's Name:</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->name?$new_leads[0]->name:'-'}} @else -@endif</p></div>
                <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->disposition?$new_leads[0]->disposition:'-'}} @else -@endif</p></div>
                <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->id?'IC'.$new_leads[0]->id:'-'}} @else -@endif</p></div>
                
              </div>
                
                <div class="mySlides count-app-no fad">
                  <div class="count-app-no-child"><p style="color: #0269cf;" > Name:</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;" >Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->disposition?$new_leads[1]->disposition:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
                <div class="mySlides count-app-no fad">
                  <div class="count-app-no-child"><p style="color: #0269cf;" > Name:</p> <p>@if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;" >Current Status:</p> <p> @if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($new_leads) > 2) {{$new_leads[2]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
               
                </div>
                
                
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
                
                <div class="total-count-no-parent">
                  <div class="total-count-no-child">
                      
                      
                    <?php
                    
                    // $new_leads = DB::table('enquiries')
                    // ->select('name','id','disposition' )
                    // ->where('delete_client',1)
                    // ->where('agent_unique_id',Auth::user()->unique_id)
                    // ->where('date', date('Y-m-d'))
                    // ->get();   
                    
                    
                    $new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',0)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
->get();

                   
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

// $weekly_leads = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
// ->get();
// echo count($weekly_leads);
                        
                        $new_leads = DB::table('enquiries')

->select('name','disposition','id')
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('conversion',0)
->where('lead_update', 0)
->where('lead_upadte_on', null)
->whereBetween('created_at', [date("$weekly_leads_7days 00:00:00"), date('Y-m-d 23:59:59')])
->get();

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
                showSlides(slideIndex);
                
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }
                
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }
                
                function showSlides(n) {
                  var i;
                  var slides = document.getElementsByClassName("mySlides");
                  var dots = document.getElementsByClassName("dot");
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
              <!--<a href="view-new-leads" class="bn btn-info btn-sm">View All</a>-->
              <form action="{{url(Request::segment(1))}}/view-new-leads" class="bn btn-info btn-sm">
                  <input type="hidden" value="New leads" name="new_leads">
                  <input type="hidden" name="type" value = "0">
                  <input type="submit" value="View All">
              </form>
             </div>
            </div>  
          </div>
        </div>
      <!----First Card-->
      
      
      <!----Second Card-->
      <?php 
      
// $followup = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->where('date', date('Y-m-d'))
// ->where('conversion', 0)
// ->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
// ->get();



$followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',0)
->where('agent_unique_id',Auth::user()->unique_id)
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();

// dd($followup);


      ?>
      <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 mb-4">
      <div class="card  ">
        
        <p class="heading-count-no">Follow Up</p><p class="total-count-no"><?php 
      echo count($followup);   
// echo count(DB::table('enquiries')
// ->select('id' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
// ->get());
        ?></p>
        <hr>
        <div class="card-body ">
          

              
            <div class="slideshow-container">
          <div class="count-app-no mySlides2 fad">
            <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($followup) > 0) {{$followup[0]->name?$followup[0]->name:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>@if(count($followup) > 0) {{$followup[0]->disposition?$followup[0]->disposition:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($followup) > 0) {{$followup[0]->id?'IC'.$followup[0]->id:'-'}} @else -@endif</p></div>
            
          </div>
            
            <div class="mySlides2 count-app-no fad">
              <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($followup) > 1) {{$followup[1]->name?$followup[1]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p> @if(count($followup) > 1) {{$followup[1]->disposition?$followup[1]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($followup) > 1) {{$followup[1]->id?'IC'.$followup[1]->id:'-'}} @else -@endif</p></div>
            </div>
            
            <div class="mySlides2 count-app-no fad">
              <div class="count-app-no-child"><p style="color: #0269cf;" >Name:</p> <p>@if(count($followup) > 2) {{$followup[2]->name?$followup[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;" >Current Status:</p> <p> @if(count($followup) > 2) {{$followup[2]->name?$followup[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($followup) > 2) {{$followup[2]->id?'IC'.$followup[2]->name:'-'}} @else -@endif</p></div>
            </div>
            
           
            </div>
            
            
            <div style="text-align:center">
              <span class="dot2" onclick="currentSlide2(1)"></span> 
              <span class="dot2" onclick="currentSlide2(2)"></span> 
              <span class="dot2" onclick="currentSlide2(3)"></span> 
            </div>
            
            <div class="total-count-no-parent">
              <div class="total-count-no-child">
                <?php  
                   $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',0)
->where('agent_unique_id',Auth::user()->unique_id)
->where('lead_upadte_on',date('Y-m-d'))
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get();
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
// ->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )

// ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
// ->get();


 $followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',0)
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
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -120 day" ) ); 

// $weekly_leads = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->whereOr('disposition','Visited')
// ->whereOr('disposition','Pending')
// ->whereOr('disposition','In Progress')
// ->whereOr('disposition','Follow Up')
// ->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
// ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
// ->get();
$followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',0)
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
            
            function currentSlide2(n) {
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
          <!--<button class="bn btn-info btn-sm">View All</button>-->
           <form action="{{url(Request::segment(1))}}/view-new-leads" class="bn btn-info btn-sm">
                  <input type="hidden" value="Follow Up" name="new_leads">
                  <input type="hidden" name="type" value = "0">
                  <input type ="submit" value="View All">
              </form>
         </div>
        </div>  
      </div>
    </div>
 <!----Second Card-->

<!----Third Card-->
<?php
 
//  $future = DB::table('enquiries')
// ->select('name','id','disposition' )
// ->where('delete_client',1)
// ->where('agent_unique_id',Auth::user()->unique_id)
// ->where('future_lead',1)
// ->where('conversion',0)
// ->get();
 
 $future = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('conversion',0)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Future Lead")
->get();

?>
    <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 mb-4">
      <div class="card  ">
        
      <p class="heading-count-no">Future Leads</p><p class="total-count-no">{{count($future)}}</p>
        <hr>
        <div class="card-body ">
          
          <?php
//  $future = DB::table('enquiries')
//  ->select('name','id','disposition' )
//  ->where('delete_client',1)
//  ->where('agent_unique_id',Auth::user()->unique_id)
//  ->where('future_lead',1)

//  ->get();
?> 

              
            <div class="slideshow-container">
          <div class="count-app-no mySlides3 fad">
          <div class="count-app-no-child"><p style="color: #0269cf;" style="color: #0269cf;">Name:</p> <p>@if(count($future) > 0) {{$future[0]->name?$future[0]->name:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;" style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;" style="color: #0269cf;">Current Status:</p> <p>@if(count($future) > 0) {{$future[0]->disposition?$future[0]->disposition:'-'}} @else -@endif</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;" style="color: #0269cf;">Reference No.</p> <p>@if(count($future) > 0) {{$future[0]->id?'IC'.$future[0]->id:'-'}} @else -@endif</p></div>
            
          </div>
            
            <div class="mySlides3 count-app-no fad">
              <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($future) > 1) {{$future[1]->name?$future[1]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p> @if(count($future) > 1) {{$future[1]->disposition?$future[1]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($future) > 1) {{$future[1]->id?'IC'.$future[1]->id:'-'}} @else -@endif</p></div>
            </div>
            
            <div class="mySlides3 count-app-no fad">
              <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($future) > 2) {{$future[2]->name?$future[2]->name:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p> @if(count($future) > 2) {{$future[2]->disposition?$future[2]->disposition:'-'}} @else -@endif</p></div>
              <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($future) > 2) {{$future[2]->id?'IC'.$future[0]->id:'-'}} @else -@endif</p></div>
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
->where('conversion',0)
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

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                //      ->where('future_lead',1)
                //      ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                //      ->get());
                
                
                 echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Future Lead")
 ->whereBetween('future_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',0)
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

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                //      ->where('future_lead',1)
                //      ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                //      ->get());
                
                 echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Future Lead")
 ->whereBetween('future_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',0)
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
           <form action="{{url(Request::segment(1))}}/view-new-leads" class="bn btn-info btn-sm">
                  <input type="hidden" value="Future Leads" name="new_leads">
                  <input type="hidden" name="type" value = "0">
                  <input type ="submit" value="View All">
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
->where('conversion',0)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition',"Dead Lead")
->get();
echo count($dead);
      ?>
    </p>
    <hr>
    <div class="card-body ">
      

  <?php        
//  $dead = DB::table('enquiries')
//  ->select('name','id','disposition' )
//  ->where('delete_client',1)
//  ->where('agent_unique_id',Auth::user()->unique_id)
//  ->where('disposition','DND')
//  ->orderBy('id','DESC')
//  ->get();
 
?>
        <div class="slideshow-container">
      <div class="count-app-no mySlides4 fad">
        <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
        <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?'IC'.$dead[0]->id:'-'}} @else -@endif</p></div>
        
      </div>
        
        <div class="mySlides4 count-app-no fad">
          <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>Mangal</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?'IC'.$dead[1]->id:'-'}} @else -@endif</p></div>
        </div>
        
        <div class="mySlides4 count-app-no fad">
          <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>Mangal</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p> @if(count($dead) > 2) {{$dead[2]->disposition?$dead[2]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>@if(count($dead) > 2) {{$dead[2]->id?'IC'.$dead[2]->id:'-'}} @else -@endif</p></div>
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
                  
//  echo count(DB::table('enquiries')
//                      ->select('id')
//                      ->where('delete_client',1)
//                      ->where('agent_unique_id',Auth::user()->unique_id)
//                     //  ->where('future_lead',1)
//                      ->where('date',date('Y-m-d'))
//                      ->where('disposition','DND')
//                      ->get()); 

           
    echo count( DB::table('enquiries')
 ->select('name','id','disposition' )
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->where('dead_lead_date', date('Y-m-d'))
->where('conversion',0)
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

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                //      ->where('disposition','DND')
                //      ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                //      ->get());
                
                            echo count( DB::table('enquiries')
 ->select('id')
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->whereBetween('dead_lead_date',[$weekly_leads_7days, date('Y-m-d')])
 ->where('conversion',0)
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
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -30 day" ) ); 

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                //      ->where('disposition','DND')
                //      ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                //      ->get());
                
                                    echo count( DB::table('enquiries')
 ->select('id')
 ->where('delete_client',1)
 ->where('agent_unique_id',Auth::user()->unique_id)
 ->where('disposition',"Dead Lead")
 ->whereBetween('dead_lead_date',[$weekly_leads_7days, date('Y-m-d')])
->where('conversion',0)
 ->get());      
                
                
                  ?>
              </p>
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
    <form action="{{url(Request::segment(1))}}/view-new-leads" class="bn btn-info btn-sm">
                  <input type="hidden" value="Dead Leads" name="new_leads">
                  <input type="hidden" name="type" value = "0">
                  <input type ="submit" value="View All">
              </form>
     </div>
    </div>  
  </div>
</div>
 <!----Fourth Card--> 
 
 
 {{-- start fifth card --}}
 <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 mb-4">
  <div class="card  ">
    <p class="heading-count-no">Birthday</p><p class="total-count-no">

      <?php 

// $getBirthday = DB::table('enquiries')
//                                   ->select('id', 'dob','disposition','name')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->orderBy('dob','DESC')
//                                   ->get();
//                                   echo  $countBirtday = count($getBirthday);

  $getBirthday = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('dob','!=','NULL')
->where('conversion',0)
->get();
  echo  $countBirtday = count($getBirthday);
      ?>
      </p>
      <hr>
     
      <div class="card-body ">
        
        <div class="slideshow-container">
          @for($a=0; $a<$countBirtday; $a++ )
         
          <div class="count-app-no mySlidewqe99 fad"> 
          <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>{{$getBirthday[$a]->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>{{$getBirthday[$a]->disposition}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>{{$getBirthday[$a]->id}}</p></div>  
          </div>    
@endfor
        </div>

     
        <div style="text-align:center">
          <span class="dot99" onclick="currentSlide81(1)"></span> 
          <span class="dot99" onclick="currentSlide81(2)"></span> 
          <span class="dot99" onclick="currentSlide81(3)"></span> 
        </div>
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            <p>
<?php 
                            //  echo  count(DB::table('enquiries')
                            //       ->select('id')
                            //       ->where('delete_client',1)
                            //       ->where('agent_unique_id',Auth::user()->unique_id)
                            //             ->where('dob',date('Y-m-d'))
                            //       ->get());
                            
                            
                            echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                     ->whereDay('dob', '=', Carbon::now()->format('d'))
                     ->where('conversion',0)
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

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                     
                //      ->whereBetween('dob',[$weekly_leads_7days,date('Y-m-d')])
                //      ->get());


  echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                      ->whereDate( 'dob', '<=', now()->addDays(7))
                     ->where('conversion',0)
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
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -30 day" ) ); 

                //   echo  count(DB::table('enquiries')
                //      ->select('id')
                //      ->where('delete_client',1)
                //      ->where('agent_unique_id',Auth::user()->unique_id)
                     
                //      ->whereBetween('dob',[$weekly_leads_120days,date('Y-m-d')])
                //      ->get());
                         
 echo count(DB::table('enquiries')
                     ->select('id')
                     ->where('delete_client',1)
                     ->where('agent_unique_id',Auth::user()->unique_id)
                     ->whereMonth('dob', '=', Carbon::now()->format('m'))
                     ->where('conversion',0)
                     ->get()); 

            ?></p> 
          <p>1 Month</p>
        </div>
      </div>

    </div>

<script>
  var getDot = document.querySelectorAll('.dot');
  len = getDot.length;
  getDot.forEach(element => {
    element.addEventListener('click',function(){
      console.log('test');
    })
  });
</script>
    <script>
      var slideIndex = 1;
      showSlides81(slideIndex);
      
      function plusSlides(n) {
        showSlides81(slideIndex += n);
      }
      
      function currentSlide81(n) {
        showSlides81(slideIndex = n);
      }
      
      function showSlides81(n) {
        
        var i;
        var slides = document.getElementsByClassName("mySlidewqe99");
        var dots = document.getElementsByClassName("dot99");
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
     <form action="{{url(Request::segment(1))}}/view-new-leads" class="bn btn-info btn-sm">
                  <input type="hidden" value="Birthday" name="new_leads">
                  <input type="hidden" name="type" value = "0">
                  <input type ="submit" value="View All">
              </form>


  </div>
  </div></div>
    </div>
  
{{-- end of fifth card --}}

{{-- start of sixth card --}}

<!--<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 mb-4">-->
<!--  <div class="card  ">-->
<!--    <p class="heading-count-no">Payment Done</p><p class="total-count-no">-->

      <?php 

// $getBirthday = DB::table('enquiries')
//                                   ->select('id', 'dob','disposition','name')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->where('disposition','Payment Done')
//                                   ->orderBy('updated_at','DESC')
//                                   ->get();
                                  
//                                   echo  $countBirtday = count($getBirthday);
                                  
      ?>
      </p>
      <hr>
     
      <!--<div class="card-body ">-->
        
      <!--  <div class="slideshow-container">-->
          <!--@for($a=0; $a<$countBirtday; $a++ )-->
         
          <!--<div class="count-app-no mySlidewqe100 fad"> -->
          <!--<div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>{{$getBirthday[$a]->name}}</p></div>-->
          <!--  <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>-->
          <!--  <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>{{$getBirthday[$a]->disposition}}</p></div>-->
          <!--  <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>{{$getBirthday[$a]->id}}</p></div>  -->
          <!--</div>    -->
<!--@endfor-->
        <!--</div>-->

     
        <!--<div style="text-align:center">-->
        <!--  <span class="dot100" onclick="currentSlide100(1)"></span> -->
        <!--  <span class="dot100" onclick="currentSlide100(2)"></span> -->
        <!--  <span class="dot100" onclick="currentSlide100(3)"></span> -->
        <!--</div>-->
        <!--<div class="total-count-no-parent">-->
        <!--  <div class="total-count-no-child">-->
        <!--    <p>-->


<?php 


// $getBirthday = DB::table('enquiries')
//                                   ->select('id')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->where('disposition','Payment Done')
//                                   ->whereBetween('updated_at',[date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')] )
//                                   ->get();
//                                   echo  $countBirtday = count($getBirthday);
                                  
      ?>
                         
      <!--      </p>-->
      <!--      <p>Today</p>-->
      <!--</div>  -->

      <!--<div class="total-count-no-child">-->
      <!--  <div> -->
      <!--    <p>-->
          <?php 
            
//  $dt = date("Y-m-d");
//                      $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

                  
// $getBirthday = DB::table('enquiries')
//                                   ->select('id')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->where('disposition','Payment Done')
//                                   ->whereBetween('updated_at',[$weekly_leads_7days, date('Y-m-d 23:59:59')] )
//                                   ->get();
//                                   echo  $countBirtday = count($getBirthday);
                                 

            ?>  
      <!--    </p> -->
      <!--    <p>1 week</p>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="total-count-no-child">-->
      <!--  <div> -->
      <!--    <p> -->
            
          <?php 
            

//  $dt = date("Y-m-d");
//                      $weekly_leads_120days = date( "Y-m-d", strtotime( "$dt -120 day" ) ); 

                  
// $getBirthday = DB::table('enquiries')
//                                   ->select('id')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->where('disposition','Payment Done')
//                                   ->whereBetween('updated_at',[$weekly_leads_120days, date('Y-m-d 23:59:59')] )
//                                   ->get();
//                                   echo  $countBirtday = count($getBirthday);
                                 


            ?>
    <!--        </p> -->
    <!--      <p>1 Month</p>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--</div>-->

    <script>
    //   var slideIndex = 1;
    //   showSlides100(slideIndex);
      
    //   function plusSlides(n) {
    //     showSlides100(slideIndex += n);
    //   }
      
    //   function currentSlide100(n) {
    //     showSlides100(slideIndex = n);
    //   }
      
    //   function showSlides100(n) {
        
    //     var i;
    //     var slides = document.getElementsByClassName("mySlidewqe100");
    //     var dots = document.getElementsByClassName("dot100");
    //     if (n > slides.length) {slideIndex = 1}    
    //     if (n < 1) {slideIndex = slides.length}
    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";  
    //     }
    //     for (i = 0; i < dots.length; i++) {
    //         dots[i].className = dots[i].className.replace(" active", "");
    //     }
    //     slides[slideIndex-1].style.display = "block";  
    //     dots[slideIndex-1].className += " active";
    //   }
      </script>
<!--   <div class="text-center">-->
<!--     <form action="view-new-leads" class="bn btn-info btn-sm">-->
<!--                  <input type="hidden" value="Birthday" name="new_leads">-->
<!--                  <input type="hidden" name="type" value = "0">-->
<!--                  <input type ="submit" value="View All">-->
<!--              </form>-->

<!--  </div>-->
<!--</div></div>-->
<!--  </div>-->
{{-- end of six card --}}
  





{{-- start seven card --}}
<!--<div class="col-md-6 col-sm-12 col-lg-4 col-xl-3 mb-4">-->
<!--  <div class="card  ">-->
<!--    <p class="heading-count-no">Payment Pending</p><p class="total-count-no">-->

      <?php 

// $getBirthday = DB::table('enquiries')
//                                   ->select('id', 'dob','disposition','name','unique_id')
//                                   ->where('delete_client',1)
//                                   ->where('agent_unique_id',Auth::user()->unique_id)
//                                   ->whereNotIn('disposition',['Payment Done'])
//                                   ->orderBy('id','DESC')
//                                   ->get();
//                                   // dd($getBirthday);
//                                   echo  $countBirtday = count($getBirthday);
      ?>
      </p>
      <!--<hr>-->
     
      <!--<div class="card-body ">-->
        
      <!--  <div class="slideshow-container">-->
      <!--    @for($a=0; $a<$countBirtday; $a++ )-->
         {{--
          <div class="count-app-no mySlidewqe101 fad"> 
          <div class="count-app-no-child"><p style="color: #0269cf;">Name:</p> <p>{{$getBirthday[$a]->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Current Status:</p> <p>{{$getBirthday[$a]->disposition}}</p></div>
            <div class="count-app-no-child"><p style="color: #0269cf;">Reference No.</p> <p>{{$getBirthday[$a]->id}}</p></div>  
          </div>    --}}
<!--@endfor-->
<!--        </div>-->

     {{--
        <div style="text-align:center">
          <span class="dot101" onclick="{{'currentSlide'.$getBirthday[0]->unique_id.'(1)'}}"></span> 
          <span class="dot101" onclick="{{'currentSlide'.$getBirthday[0]->unique_id.'(2)'}}"></span> 
          <span class="dot101" onclick="{{'currentSlide'.$getBirthday[0]->unique_id.'(3)'}}"></span> 
        </div>
        <div class="total-count-no-parent">
          <div class="total-count-no-child">
            <p> --}}
<?php 
                            //  echo  count(DB::table('enquiries')
                            //       ->select('id')
                            //       ->where('delete_client',1)
                            //       ->where('agent_unique_id',Auth::user()->unique_id)
                            //             ->where('date',date('Y-m-d'))
                            //             ->whereNotIn('disposition',['Payment Done'])
                            //       ->get());
             
                         ?>  
      <!--      </p>-->
      <!--      <p>Today</p>-->
      <!--</div>  -->

      <!--<div class="total-count-no-child">-->
      <!--  <div> -->
      <!--    <p>-->
          <?php 
            
//  $dt = date("Y-m-d");
//                      $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

//                   echo  count(DB::table('enquiries')
//                      ->select('id')
//                      ->where('delete_client',1)
//                      ->where('agent_unique_id',Auth::user()->unique_id)
//                      ->whereNotIn('disposition',['Payment Done'])
//                      ->whereBetween('updated_at',[$weekly_leads_7days,date('Y-m-d')])
//                      ->get());

            ?>  
      <!--    </p> -->
      <!--    <p>1 week</p>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="total-count-no-child">-->
      <!--  <div> -->
      <!--    <p> -->
            
          <?php 
            

//  $dt = date("Y-m-d");
//                      $weekly_leads_120days = date( "Y-m-d", strtotime( "$dt -1200 day" ) ); 

//                   $aa = DB::table('enquiries')
//                      ->select('id')
//                      ->where('delete_client',1)
//                      ->where('agent_unique_id',Auth::user()->unique_id)
//                      ->whereNotIn('disposition',['Payment Done'])
//                     //  ->where('date',$weekly_leads_120days)
//                      ->whereBetween('date',[$weekly_leads_120days,date('Y-m-d')])
//                      ->get();
// echo count($aa);

            ?>
    <!--        </p> -->
    <!--      <p>1 Month</p>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--</div>-->

<script>
  // var getDot = document.querySelectorAll('.dot');
  // len = getDot.length;
  // getDot.forEach(element => {
  //   element.addEventListener('click',function(){
  //     console.log('test');
  //   })
  // });
</script>
    <script>
    //   var slideIndex = 1;
    //   showSlides11(slideIndex);
      
    //   function plusSlides(n) {
    //     showSlides11(slideIndex += n);
    //   }
    {{--  
    //   function {{'currentSlide'.$getBirthday[0]->unique_id}}(n) {
    //     showSlides11(slideIndex = n);
    //   }
    --}}
      
    //   function showSlides11(n) {
        
    //     var i;
    //     var slides = document.getElementsByClassName("mySlidewqe101");
    //     var dots = document.getElementsByClassName("dot101");
    //     if (n > slides.length) {slideIndex = 1}    
    //     if (n < 1) {slideIndex = slides.length}
    //     for (i = 0; i < slides.length; i++) {
    //         slides[i].style.display = "none";  
    //     }
    //     for (i = 0; i < dots.length; i++) {
    //         dots[i].className = dots[i].className.replace(" active", "");
    //     }
    //     slides[slideIndex-1].style.display = "block";  
    //     dots[slideIndex-1].className += " active";
    //   }
      </script>
<!--   <div class="text-center">-->
<!--    <button class="bn btn-info btn-sm">View All</button>-->


<!--  </div>-->
<!--</div></div>-->
<!--  </div>-->
{{-- end of seventh card --}}





    </div></div>
    
    
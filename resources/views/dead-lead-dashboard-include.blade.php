<?php
 use App\Helpers\Helper;
 
  ?>

<div class="col-md-12">
<br><br>    
    <h2 style="color: #5d5656;
    text-align: center;
    margin-bottom: 20px;">Immigration Dashboard</h2> 
    <?php

$new_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('date', date('Y-m-d'))
->where('conversion',2)
->get();
    ?>
    <div class="row">
      
        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
          <div class="card  ">
            
            <p class="heading-count-no">New Leads</p><p class="total-count-no">{{count($new_leads)}}</p>
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
                    
                      <p>{{count($new_leads)}}</p>
                      <p>Today</p>
                    
                  </div>

                  <div class="total-count-no-child">
                    <div> 
                      <p>
                        <?php
                     $dt = date("Y-m-d");
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

$weekly_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
->get();
echo count($weekly_leads);
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
                     $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -4 month" ) ); 

$weekly_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
->get();
echo count($weekly_leads);
                        ?>

                      </p>
                      <p>4 Month</p>
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
              <button class="bn btn-info btn-sm">View All</button>
             </div>
            </div>  
          </div>
        </div>
    <!----First Card-->
    
    
    <!----Second Card-->
    <?php 
    
$followup = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('date', date('Y-m-d'))
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->where('conversion',2)
->get();

    ?>
    <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
    <div class="card  ">
      
      <p class="heading-count-no">Follow Up</p><p class="total-count-no"><?php 
       
echo count(DB::table('enquiries')
->select('id' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereIn('disposition',['Visited','Follow Up','In Progress','Pending'] )
->get());
      ?></p>
      <hr>
      <div class="card-body ">
        

            
          <div class="slideshow-container">
        <div class="count-app-no mySlides2 fad">
          <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($followup) > 0) {{$followup[0]->name?$followup[0]->name:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
          <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($followup) > 0) {{$followup[0]->disposition?$followup[0]->disposition:'-'}} @else -@endif</p></div>
          <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($followup) > 0) {{$followup[0]->id?$followup[0]->id:'-'}} @else -@endif</p></div>
          
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
            <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($followup) > 2) {{$followup[2]->name?$followup[2]->name:'-'}} @else -@endif</p></div>
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
                
                ?>
                <p>{{count($followup)}}</p>
                <p>Today</p>
              
            </div>

            <div class="total-count-no-child">
              <div> 
                <p><?php 
                   $dt = date("Y-m-d");
                   $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

$weekly_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereOr('disposition','Visited')
->whereOr('disposition','Pending')
->whereOr('disposition','In Progress')
->whereOr('disposition','Follow Up')

->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
->get();

echo count($weekly_leads);
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

$weekly_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->whereOr('disposition','Visited')
->whereOr('disposition','Pending')
->whereOr('disposition','In Progress')
->whereOr('disposition','Follow Up')

->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
->get();
echo count($weekly_leads);
                  ?>

                </p>
                <p>4 Month</p>
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
        <button class="bn btn-info btn-sm">View All</button>
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
->where('agent_unique_id',Auth::user()->unique_id)
->where('future_lead',1)
->get();

?>
  <div class="col-md-6 col-sm-12 col-lg-4 col-xl-3  mb-4">
    <div class="card  ">
      
    <p class="heading-count-no">Future Leads</p><p class="total-count-no">{{count($future)}}</p>
      <hr>
      <div class="card-body ">
        
        <?php
$future = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('future_lead',1)
//  ->where('date',date('Y-m-d'))
->get();
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
                  echo count(DB::table('enquiries')
                   ->select('id')
                   ->where('delete_client',1)
                   ->where('agent_unique_id',Auth::user()->unique_id)
                   ->where('future_lead',1)
                   ->where('date',date('Y-m-d'))
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

                 echo  count(DB::table('enquiries')
                   ->select('id')
                   ->where('delete_client',1)
                   ->where('agent_unique_id',Auth::user()->unique_id)
                   ->where('future_lead',1)
                   ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
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

                 echo  count(DB::table('enquiries')
                   ->select('id')
                   ->where('delete_client',1)
                   ->where('agent_unique_id',Auth::user()->unique_id)
                   ->where('future_lead',1)
                   ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                   ->get());


                                  ?>

                </p>
                <p>4 Month</p>
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
        <button class="bn btn-info btn-sm">View All</button>
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
    echo count(DB::table('enquiries')
->select('id' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','DND')
->get());
    ?>
  </p>
  <hr>
  <div class="card-body ">
    

<?php        
$dead = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('disposition','DND')
->get();

?>
      <div class="slideshow-container">
    <div class="count-app-no mySlides4 fad">
      <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 0) {{$dead[0]->name?$dead[0]->name:'-'}} @else -@endif</p></div>
      <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
      <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($dead) > 0) {{$dead[0]->disposition?$dead[0]->disposition:'-'}} @else -@endif</p></div>
      <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 0) {{$dead[0]->id?$dead[0]->id:'-'}} @else -@endif</p></div>
      
    </div>
      
      <div class="mySlides4 count-app-no fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 1) {{$dead[1]->name?$dead[1]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>Mangal</p></div>
        <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($dead) > 1) {{$dead[1]->disposition?$dead[1]->disposition:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($dead) > 1) {{$dead[1]->id?$dead[1]->id:'-'}} @else -@endif</p></div>
      </div>
      
      <div class="mySlides4 count-app-no fad">
        <div class="count-app-no-child"><p>Applicant's Name:</p> <p>@if(count($dead) > 2) {{$dead[2]->name?$dead[2]->name:'-'}} @else -@endif</p></div>
        <div class="count-app-no-child"><p>Counsellor:</p> <p>Mangal</p></div>
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
                
echo count(DB::table('enquiries')
                   ->select('id')
                   ->where('delete_client',1)
                   ->where('agent_unique_id',Auth::user()->unique_id)
                   ->where('future_lead',1)
                   ->where('date',date('Y-m-d'))
                   ->where('disposition','DND')
                   ->get()); ?>
            </p>
            <p>Today</p>
          
        </div>

        <div class="total-count-no-child">
          <div> 
            <p>
              
              <?php  
                
$dt = date("Y-m-d");
                   $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -7 day" ) ); 

                 echo  count(DB::table('enquiries')
                   ->select('id')
                   ->where('delete_client',1)
                   ->where('agent_unique_id',Auth::user()->unique_id)
                   ->where('disposition','DND')
                   ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
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
                                 $weekly_leads_7days = date( "Y-m-d", strtotime( "$dt -120 day" ) ); 
            
                               echo  count(DB::table('enquiries')
                                 ->select('id')
                                 ->where('delete_client',1)
                                 ->where('agent_unique_id',Auth::user()->unique_id)
                                 ->where('disposition','DND')
                                 ->whereBetween('date',[$weekly_leads_7days,date('Y-m-d')])
                                 ->get());
                              ?></p>
            <p>4 Month</p>
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
    <button class="bn btn-info btn-sm">View All</button>
   </div>
  </div>	
</div>
</div>
<!----Fourth Card-->	
  
</div>
    </div>
    
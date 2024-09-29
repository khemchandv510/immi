

@extends('header')
@section('collegeInfo')
<--css start-->
<style>
.college-detail-page .menu li{
    border-right: 1px solid #0e3f70;
    background:#0e3f70;
  padding-right: 31px;
}


</style>
<--css end-->
    <!-- The Modal -->
    
    <div class="modal" id="modalCourse" style="">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Import Courses</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
          
Import Multiple University Courses List in single CSV file. <br>
The given formate must be use to import courses list...  

            {{ Form::open(array('url' => 'education/upload-course','files'=>'true')) }}
              
                {{-- <input type="file" class="custom-file-input" id="customFile"> --}}
              {!! Form::file('import', array('class'=> 'custom-file-inpu', 'id'=> 'customFil' )) !!}
              @if(!empty($institute))
              @foreach($institute as $ins)
              {{ Form::hidden('colllege_code',$ins->code)}}
                {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
              @endforeach
            @endif
          <!-- Modal footer -->
          <div class="modal-footer">
              {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
              {!! Form::submit('Submit', array('class' => 'btn btn-danger', 'name'=>'submit')) !!}
  
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
      {{Form::close() }}
  </div>
        </div>
      </div>
    </div>

  <style>
    @media only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    td:nth-of-type(1):before { content: ""; }
}

html {
  scroll-behavior: smooth;
}
    </style>


<?php $id =  Session()->get('college_code_sess'); ?>


  

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
@if(Session::has('message'))
<p class="flash-message">{{ Session::get('message') }}</p>
@endif
            {{-- <a href="{{url('education/update-institution/')}}"> education / update-institution</a> --}}
          <div class="container-fluid">
        <div class="row">
          
                <ul class="k0lu">
                    @if(!empty($info))
                    
                    @foreach($info as $info2)
         {{-- @dd($info2) --}}
                {{-- <li id=""><a href="{{url('education/update-institution/'.Crypt ::encrypt($info2->name))}}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Update Institution</a></li> --}}

                {{-- <li id="block"><a href="{{ url('education/update-agreement/'.Crypt ::encrypt($info2->code)) }}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Update Agreement Expiry</a></li> --}}


                {{-- <li id=""><a href="" class="btn btn-danger"   data-toggle="modal" data-target="#update_agreement_expiry" ><i class="fa fa-plus" aria-hidden="true"></i> Update Agreement Expiry</a></li> --}}


                     @endforeach
                     @endif
                 
                     
<!-- update agreement expiry date popup -->
<div class="modal" id="update_agreement_expiry">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Update Agreement Expiry</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      
      <div class="col-md-4 py-3 ">Date </div>
      {{Form::open(array('url'  =>  'education/update-agreement'))}}                   
      <div class="col-md-8 py-3 ">
          @foreach($info as $info2)
          {{-- {!! Form::hidden('code', $info2->code) !!} --}}
          {{session()->keep('college_code_sess')}}
          
          @endforeach                 
                          
{!! Form::date('update_expity_date') !!}
                          {{-- {!!Form::select('tag', array('s'=>'Select', 'Blacklisted' => 'Blacklisted', 'Cool' => 'Cool','High Commition' => 'High Commition', 'Low Commition' => 'Low Commition'),'s', ['class' =>'form-control'])!!} --}}

                     
                        </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Save</button>

      </div>
      {{Form::close()}}
    </div>
  </div>
</div>
<!-- end update agreement expiry pop -->


                    {{-- <li id="block"><a href="{{url('education/courses/'.$info2->code)}}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Courses</a> --}}
                      
                    {{-- </li> --}}

                  {{-- <li id="block"><a href={{url('CommissionStructure')}} class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Commission Structure</a></li> --}}

                  
                    
                    {{-- <li id="block">
                    <a class="btn btn-danger" href="{{url('education/dashboard')}}">Get All College</a>
                    </li> --}}
                
                </ul>

              </div>
              <div class="container-fluid">
<div class="row college-detail-page">
  <div class="col-sm-3 sort-info" >
        <div>
          <div style="text-align:center;">
              <img src="{{url('public\uploads\university-logo\UC-Berkeley-Logo.png')}}" alt="" class="logo-image"> 
            </div>
            @if(!empty($info))
            @foreach($info as $i)
              <p class="collage-name">   {{ $i->name }}  </p>
              <img src="http://localhost/imm/imm/public\uploads\university-country-flag/usa_flag-d02b8c42c568d527f44a51739170d143.png" alt="" class="country-flag">
              <p class="country-city" >{{$i->city}},  {{$i->state}}  </p>
              <p style="text-align:center"> {{$i->dli}}</p>
              @endforeach
              @endif
        </div>
        <div style="border-bottom: 1px solid #ede9e9;border-top: 1px solid #ede9e9;
        padding: 15px;">
              <ul class="icon">
                <li class="fa fa-chalkboard-teacher"> </li>  
                <li class="fa fa-book-open"></li>  
                <li class="fa fa-award"></li>  
                <li class="fa fa-user-graduate"></li>  
              </ul> 
        </div> 
        <div class="history">
          <div> <span class="fa fa-history"></span> <span > Founded: 2010 </span>  </div>
          <div> <span class="fa fa-university"></span> <span >Type: Private University</span>  </div>
          <div> <span class="fa fa-group"></span> <span >Total Students 201546 </span>  </div>
          <div> <span class="fa fa-history"></span> <span > Founded: 2010 </span>  </div>
        </div>
        <div>
         
        </div>

        <div class="session"> 
          <div>
            <p>Session</p>
            <table class="table">
              <tr> <td> Jan 2021, </td> <td> Feb 2021 </td> 
                  <tr><td> Mar 2021, </td> <td> Apr 2021 </td> </td> 
                  <tr><td> May 2021, </td> <td> Jun 2021 </td> </td> 
                  <tr><td> Jul 2021, </td> <td> Aug 2021 </td> </td> 
                  <tr><td> Sep 2021, </td> <td> Oct 2021 </td> </td> 
                  <tr><td> Nov 2021, </td> <td> Dec 2021 </td> </td> 
              </tr>
            </table>
          </div>  
        </div>


<div>
     {{-- <button class="find-program">Find Programs</button> --}}

     <a href="{{url('education/courses/'.$info2->code)}}" > <button   class="find-program">
     Courses     </button  >  </a>

 
  <button class="find-program"> <a href="{{url('education/dashboard')}}" style="color:#fff"> Universities / Institutes </a> </button>

  <a href=""  data-toggle="modal" data-target="#tags"> 
    <button class="find-program"> Tags </button>
    </a>

    @if(!empty($info))
                    @foreach($info as $info2)
                    
<a href="{{url('education/update-institution/'.Crypt ::encrypt($info2->name))}}"   > <button    class="find-program"> Update Institution    </button> </a>
@endforeach
@endif
<a href=""  data-toggle="modal" data-target="#modalCourse"> 
<button  class="btn-danger"  >Import Course</button> </a>
</div>

    </div>
  {{-- stat column --}}
    <div class="col-sm-9">
          <div class="navbar navbar-expand">
              <ul class="menu navbar-nav "> 
                <li> <p>  <a href="#about"> About  </a> </p> </li>
                <li> <p> <a href="#locati"> Gallery </a> </p> </li>  
                <li> <p> <a href="#location"> Location </a> </p> </li>
                <li> <p> <a href="#program"> Programs </a> </p> </li>
                <li> <p>Contacts</p> </li>
                <li> <p>Campus</p> </li>
                <li> <p>Notes</p> </li>
                <li> <p>Documents</p> </li>
              </ul>
          </div>
          <div class="background-css-parent">
          <div id="about"  class="background-css">
            <h3>About</h3>
             <p>
                In 1965, the University of California, Irvine (UCI) was founded with a mission to catalyze the community and enhance lives through rigorous academics, cutting-edge research, and dedicated public service. Today, we draw on the unyielding spirit of our pioneering faculty, staff and students who arrived on campus with a dream to inspire change and generate new ideas. We believe that true progress is made when different perspectives come together to advance our understanding of the world around us. And we enlighten our communities and point the way to a better future. At UCI, we shine brighter.
              </p>

          <p>UCI enjoys an incomparable coastal location with many advantages for recreational and cultural activities. Our campus is a short bike ride from the famed sailing and surfing beaches of Newport, Laguna, and Huntington, and is centrally located to hundreds of miles of bike and hiking trails, desert camping, and mountain resorts for snowboarding and skiing. Just a few miles from the campus are internationally famous venues such as Disneyland and Angel Stadium, and we are less than an hour from Los Angeles International Airport (LAX), Hollywood, Los Angeles, and Palm Springs.</p>

          <p>
              Why the University of California, Irvine

              As we look toward the future, UCI is poised to tackle the world’s great challenges and serve our community in truly meaningful ways. An anchoring institution of Orange County, UCI is a powerhouse of groundbreaking research and discovery – actively partnering with community and business leaders to enhance lives and make a difference. We envision a world where society is enriched by the cultural hub of art, science and learning only possible at a public university; where the economic structure of Southern California explodes with opportunity as UCI innovation meets industry; and where humanity is changed for the better by the brilliant ideas and work produced at UCI.
          </p>

          <p>UCI is a multicultural community of people from diverse backgrounds. We are enriched by our mutual respect for one another, and we strive to learn from our differences in an atmosphere of positive engagement. Universities exist to provide the conditions for hard thought and difficult debate so that individuals can develop the capacity for independent judgment. For that reason, tolerance, civility and respect for diversity of background, gender, ethnicity, race, religion, political beliefs, sexual orientation and physical abilities are crucially important for our campus community to thrive.</p>

        </div>
        <div style="background: #fff;
        text-align: right;
        ">
          <button class="see-more" onclick="about_see_more();">see more </button>
        </div>
      </div>



      <div class="background-css-parent">   
<div class="background-css"  id="location" >
  <h4>Location</h4>
<img src="{{url('public\uploads\university-map\map.png')}}" alt="">
</div>

</div>





<?php 
$get_courses = DB::table('courses')
                ->where('college_code', session()->get('college_code_sess'))
                ->get();
            
$a = 1;
?>
<h4>Programs  <span> {{$a}} </span> </h4>  
<div style="overflow: auto;
max-height: 1000px;">
@foreach($get_courses as $get)

<div class="background-css-parent">   
    <div class="background-css"  id="program" >
        
      <div class="progrem-desc">
         

          <p class="program-name"> 	
            {{$get->course_name}}</p>
          <p class="degree"> {{$get->duration_year}} </p>

          @foreach($info as $ins)
          @if(($ins->country == "Canada") ||  ($ins->country == "CANADA"))
          <p> <span class="heading-fees-intake"> Tution Fees:-</span> <span class="aaaa{{$get->unique_id}}">   CA$ {{$get->fees.'.00'}}      </span> </p>
          <p> <span class="heading-fees-intake">Application Fees:- </span> <span class="app_fees{{$get->unique_id}}"> CA$ {{$get->application_fee.'.00'}}   </span> </p>
          @elseif(($ins->country == "USA"))

          <p> <span class="heading-fees-intake"> Tution Fees:-</span>    <span class="aaaa{{$get->unique_id}}">  US$ {{$get->fees.'.00'}}  </span> </p>
          <p> <span class="heading-fees-intake"> Application Fees:-</span>    <span class="app_fees{{$get->unique_id}}"> US$ {{$get->application_fee.'.00'}} </span> </p>
          <p> <span class="heading-fees-intake"> Session:- </span>    <span> {{$get->intake}} </span> </p>
          @endif
          @endforeach
        </div>


        <script>
            var a  =  $(".aaaa<?php echo $get->unique_id; ?>").text();      
            var l =   a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
             $('.aaaa{{$get->unique_id}}').text(l);
      
             var a  =  $(".app_fees<?php echo $get->unique_id; ?>").text();      
            var l =   a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
             $('.app_fees{{$get->unique_id}}').text(l);
      
            </script>



        <div class="eligibility">
          <h5>Eligibility</h5>
            
            <table class="min-qualification">
              <tr>
                <td> <strong> Min Qualification  </strong>  </td> <td> {{$get->min_education_eligibility}} </td>
              </tr>
              <tr>
                <td> <strong> Min GPA </strong>  </td>  <td> {{$get->min_gpa}}</td>
              </tr>
            </table>
            <div class="english-language-test">
               <p>  TOFEL </p>
               <table>
                 <tr>
                   <th>Reading</th> <th>Wriing</th> <th>Speaking</th> <th>Listening</th>
                 </tr>
                 <tr> 

                   
                    @if(!empty($get->toefl_reading))
                 <td>{{$get->toefl_reading}}</td> <td> {{$get->toefl_writing}} </td> <td> {{$get->toefl_speaking}} </td> <td> {{$get->toefl_listening}} </td>
                 @else
                 <td>-</td> 
                 <td>-</td> 
                 <td>-</td> 
                 <td>-</td> 
                 @endif
                 </tr>
               </table>
               <p>  IELTS </p>
               <table>
                 <tr>
                   <th>Reading</th> <th>Wriing</th> <th>Speaking</th> <th>Listening</th>
                 </tr>
                 <tr> 
                    @if(!empty($get->ielts_reading))
                    <td>{{$get->ielts_reading}}</td> <td> {{$get->ielts_writing}} </td> <td> {{$get->ielts_speaking}} </td> <td> {{$get->ielts_listening}} </td>
                    @else
                    <td>-</td> 
                    <td>-</td> 
                    <td>-</td> 
                    <td>-</td> 
                    @endif
                 </tr>
               </table>
             </div>
        </div>



        
    </div>
    </div>

@endforeach
</div>


    </div>
  {{-- end column --}}
</div>
</div>


                <!-- tags pop -->
                <div class="modal" id="tags">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Manage Tags</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        
                        <div class="col-md-4 py-3 ">Tags </div>
                        {{Form::open(array('url'  =>  'education/tag'))}}                   
                        <div class="col-md-8 py-3 ">
                            @foreach($info as $info2)
                            {!! Form::hidden('code', $info2->code) !!}
                            @endforeach                 
                                             {{-- <select class="form-control">
                                              <option>blacklisted</option>
                                              <option>Cool</option>
                                              <option>High Commition</option>
                                              <option>Low Commition</option>
                                            </select> --}}

                                            {!!Form::select('tag', array('s'=>'Select', 'Blacklisted' => 'Blacklisted', 'Cool' => 'Cool','High Commition' => 'High Commition', 'Low Commition' => 'Low Commition'),'s', ['class' =>'form-control'])!!}

                                       
                                          </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Save</button>

                        </div>
                        {{Form::close()}}
                      </div>
                    </div>
                  </div>
                <!-- end tags pop -->
                </div>
@if(!empty($info))
                @foreach($info as $info2)
                <div class="row content-colo ">
                        <div class="col-md-12 pd-border"><br>
                           {{-- <h3 class="tab-color ml-3 " >   {{$info2->name}} &nbsp; {{$info2->city}}  </h3></div> --}}
       
                           


<div class="container my-6">
        <div class="row">
        <div class="col-md-6">
          <div class="table">
       <table>
         
         {{-- <tr>
                  <th class="bg-danger text-white">Agreement Expiry</th>
                  <td class="text-danger"> {{$info2->agreement_expiry_date}}  </td>
                        </tr>
                        <tr>
                          <th class="bg-danger text-white">Email</th>
                          <td> {{$info2->email}}</td>
                                </tr>
                                <tr>
                                  <th class="bg-danger text-white">Phone</th>
                                  <td> {{$info2->phone}}</td>
                                        </tr>
                                    <tr>
                                          <th class="bg-danger text-white">Website</th>
                                          <td>   {{$info2->website}} </td>
                                                </tr> --}}
        </table>
      </div>
    </div>
       
          <div class="col-md-4">
            <div class="table">
         <table>
            {{-- <tr>
             <th class="bg-danger text-white">Address</th>
             <td class="text-danger"> {{$info2->address}} </td>
                   </tr> --}}
          
        
      
                   <tr>
                    {{-- <th class="bg-danger text-white">Country/State</th> --}}
                  
                    @if(!empty($info2->country))
                    <?php 
                    $get = DB::table('countries')->where('country_id',$info2->country)->orwhere('country_name', $info2->country)->get() ;
                     
                    ?>
                      {{-- <td>   {{ $get[0]->country_name}} </td> --}}
                    
                    @else
                   
                    {{-- <td>   {{ $info2->country}} </td>         --}}
                    @endif
                  </tr>
          
      
                          
                          

                            {{-- <th class="bg-danger text-white">City</th>
                            <td>  {{$info2->city}} </td>
                                  </tr>
                                  <tr>
                                    <th class="bg-danger text-white">Post Code</th>
                                    <td> {{$info2->postal_code}}  </td>
                                          </tr>                           --}}
                                
      
          </table>
        </div>
      </div>
      <div class="col-md-2 tags">
          {{-- <h4>Tags</h4>
          <p class="bg-danger text-white"> {{$info2->tags}}</p> --}}
      </div>
    
     </div>
    </div>

<div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs na" role="tablist">
          <li class="nav-item">
            {{-- <a class="nav-link active Cont" data-toggle="tab" href="#home"><i class="fa fa-phone" > Contact</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link Cont" data-toggle="tab" href="#menu1"><i class="fa fa-building"> Campus</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link Cont" data-toggle="tab" href="#menu2"><i class="fa fa-sticky-note-o"> Notes</i></a>
          </li>
          <li class="nav-item">
                <a class="nav-link Cont" data-toggle="tab" href="#menu3"><i class="fa fa-file"> Documents</i></a> --}}
              </li>
              {{-- <li class="nav-item">
                    <a class="nav-link Cont" data-toggle="tab" href="#menu4"><i class="fa fa-envelope-o"> Email</i></a>
                  </li> --}}
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- home -->
          <div id="home" class="container tab-pane active"><br>
            <!-- add contact -->
            <div>
                {{-- <button type="button" class="btn btn-danger my-3" data-toggle="modal" data-target="#addcontact"> --}}
                    {{-- Add Contact --}}
                  </button> 
 
                
                  <!-- The Modal -->
                  <div class="modal" id="addcontact">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          {{-- <h4 class="modal-title">Add Contact</h4> --}}
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <div class="container">
                              
                                
                                    {{Form::open(array('url'  =>  'education/add-contacts'))}}
                                    <div class="row">
                                        
                                        @foreach($info as $info2)
                                        {!! Form::hidden('code', Crypt ::encrypt($info2->code)) !!}
                                        <?php echo ($errors->first('code',"<li class='custom-error'>:message</li>")) ?>
                                        @endforeach           
                                          {{-- <div class="col-md-4 py-1 ">Name</div> --}}
                                           <div class="col-md-8 py-1 ">
                                             
                                             {!! Form::text('given_name',null, array( 'class' => 'form-control', 'placeholder' =>'Name'  )) !!}
                                            </div>
                               
                                           {{-- <div class="col-md-4 py-3 ">Family Name</div>
                                           <div class="col-md-8 py-3 ">
                                              {!! Form::text('family_name',null, array( 'class' => 'form-control', 'placeholder' =>'Family Name'  )) !!}
                                            </div> --}}

                                           {{-- <div class="col-md-4 py-1 ">Department</div> --}}
                                           <div class="col-md-8 py-1 ">
                                             {!!Form::select('department', array('s'=>'Select', 'administration' => 'Administration', 'admission' => 'Admission','finance' => 'Finance', 'management' => 'Management', 'marketing' =>'Marketing'),'s', ['class' =>'form-control'])!!}
                                            
                                          </div>

                                              <div class="col-md-4 py-1 ">Position</div>
                                              <div class="col-md-8 py-1 ">
                                              {!! Form::text('position', null , array('class'=> 'form-control', 'placeholder'=>'Position')) !!}
                                              </div>

                                           <div class="col-md-4 py-1 ">Email</div>
                                           <div class="col-md-8 py-1 ">
                                              {!! Form::email('email', null , array('class'=> 'form-control', 'placeholder'=>'Email')) !!}
                                            </div>

                                           <div class="col-md-4 py-1 ">Mobile</div>
                                           <div class="col-md-8 py-1 ">
                                              {!! Form::number('phone', null , array('class'=> 'form-control', 'placeholder'=>'Phone', 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                                            </div>

                                           <div class="col-md-4 py-1 ">Landline</div>
                                           <div class="col-md-8 py-1 ">
                                              {!! Form::number('landline', null , array('class'=> 'form-control', 'placeholder'=>'Landline')) !!}
                                            </div>
        
                                           
                                       
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        {!! Form::submit('Submit', array('class'=>'btn btn-danger'))!!}
                                        {{-- <button type="submit" class="btn btn-danger" data-ng-submit="modal">Submit</button> --}}
                                      </div>
                                      {{ Form::close() }} 
                            </div>
                          
                        </div>
                        
                        
                        
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
<!-- End contact -->
            <div class="container">
              <div class="row">
            <div class="k0 w-100">
                <div class="heaven-table w-100">
                        <table class="table">
                                <thead>

                                <tr>
                                  {{-- <th>Code </th>
                                  <th>Name</th>
                                  <th>Department</th>
                                  
                                  <th>Position</th>
                                  <th>Email</th>
                                  <th>Mobile</th>
                                  <th>Land line</th>
                                  <th>Action</th> --}}
                                  
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $contact  = DB::table('institute_contacts')->where('status',1)->where('institute_code', '=' ,$info2->code)->get();
  ?>
                                  @foreach($contact as $contact2)
                                <tr>
                                  <td>{{$contact2->institute_code}}</td>
                                  <td>{{$contact2->given_name}}</td>
                                  <td>{{$contact2->department}}</td>
                                  <td>{{$contact2->position}}</td>
                                  <td>{{$contact2->email}}</td>
                                  <td>{{$contact2->phone}}</td>
                                  <td>{{$contact2->landline}}</td>
                                  
                                  <td>
                                      <a href="javascript:void(0);" class="fa fa-trash delete-contact"   data-id={{$contact2->id}} ></a> 
                                        <a href= "javascript:void(0);" class="fas fa-external-link-alt edit-college-contact"   data-id={{$contact2->id}}>
                                        </a>
                                  </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                </div>
              </div>
            </div>
          </div>
          </div>
         
          <!-- end Home -->



          <!-- Compus -->
          <div id="menu1" class="container tab-pane fade"><br>
           <ul class="k0lu"> 
            <li id="block"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addcampus"> <i class="fa fa-plus"></i> Add Campus</button>
              
            
            
            </li>
            {{-- <li id="block"><button type="button" class="btn btn-danger"><i class="fa fa-cloud-download"></i> Import</button></li> --}}
            {{-- <li id="block"><button type="button" class="btn btn-danger"><i class="fa fa-cloud-download"></i> Import Campus course Mapping</button></li> --}}
            </ul>
          {{-- <form>
            <div class="row">
              <div class="col-md-2">search:</div>
            <div class="col-md-7"><input type="search" class="form-control" placeholder="Search"></div>
            <div class="col-md-3"><button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button></div>
          </div>
        </form> --}}
        <br>
            <div class="container">
                <div class="row">
              <div class="k0 w-100">
                  <div class="kaushik-table w-100">
                          <table class="table">
                                  <thead>
                                  <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Street Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Post code</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    {{-- @dd($info2->code); --}}
                                   <?php  $code = session::get('college_code_sess'); ?>
<?php $campus  = DB::table('edu_campuses')->where('college_code',$code)->get(); ?>

                                      @if(!empty($campus))
                                      @foreach($campus as $i)
                                  <tr>
                                  <td>{{$i->college_code}}</td>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->street}}</td>
                                    <td>{{$i->country}}</td>
                                    <td>{{$i->state}}</td>
                                    <td>{{$i->city}}</td>
                                    <td>{{$i->pin_code}}</td>
                                    <td>{{$i->contact}}</td>
                                  <td>{{'action'}}</td>
                                  </tr>
                                  @endforeach
                                  @endif
                                  </tbody>
                                </table>
                  </div>
                </div>
              </div>
            </div>  
          </div>



<!-- Notes -->
          <div id="menu2" class="container tab-pane fade"><br>
            <div>
                

                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addnotes"> <i class="fa fa-plus"></i> Add Notes</button>
              
                  
                </div>

            <div class="container">
              <div class="row">
            <div class="k0 w-100">
                <div class="k0t-table w-100">
                        <table class="table">
                        <?php $notes  = DB::table('edu_notes')->where('college_code', '=' ,$info2->code)->get();
                        
  ?>
                                <thead>
                                <tr>
                                  <th>Code </th>
                                  <th>Subject</th>
                                  <th>Description</th>
                                  <th>Contact</th>
                                  <th>Created By</th>
                                  <th>Created At</th>
                                  <th>Actions</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
@if(!empty($notes)) 
@foreach($notes  as $note)
                                <tr>
                                  <td> {{$note->college_code}} </td>
                                  <td>{{$note->subject}}</td>
                                  <td>{{$note->description}}</td>
                                  <td>{{$note->contact}}</td>
                                  <td>{{$note->created_by}}</td>
                                  <td>{{$note->created_at}}</td>
                                  
                                  <td>{{'action'}}</td>
                                </tr>

                                @endforeach
                                @endif
                                </tbody>
                              </table>
                </div>
              </div>
            </div>
          </div>  
          </div>

          <!-- Documents -->
          <div id="menu3" class="container tab-pane fade"><br>
            <div>
                <button type="button" class="btn btn-danger my-3" data-toggle="modal" data-target="#UploadDocument" >
                    <i class="fa fa-upload"></i> Upload Document
                  </button> 
                  <div class="modal" id="UploadDocument">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Upload Document</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          
                          <!-- Modal body -->
                          <div class="modal-body">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, labore obcaecati! A ipsa deleniti nobis sunt recusandae illum et voluptate incidunt quidem! Nisi culpa dolor perferendis dolorem voluptatem ea dolores!
                          </div>
                          {{-- <form action="upload-document" method="post" files='true' > --}}
                              {{ Form::open(array('url' => 'upload-document', 'files' => 'true')) }}  
                              <div class="custom-file">
                                <input type="hidden" value="{{$info2->code}}" name="college_code">
                                <input type="file" name="document" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            
                          
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Submit">
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
              
                  
                </div>

            <div class="container">
              <div class="row">
            <div class="k0 w-100">
                <div class="k0doucument-table w-100">
                        <table class="table">
                                <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Document Name</th>
                                  <th>Added On</th>
                                  <th>Added By</th>
                                  <th>File</th>
                                  <th>Actions</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php
                                  
                                  $documents =  DB::table('edu_documents')->where('college_code',$code)->get();   
                                  if(!empty($documents)){
                                    foreach ($documents as $d) {
                                      ?>
                                  
                                <tr>
                                  <td>{{$d->college_code}}</td>
                                  <td>{{$d->name}}</td>
                                  <td>{{$d->created_at}}</td>
                                  <td>{{$d->created_by}}</td>
                                  <td><a href ="{{url('public/uploads/documents/'.$d->name)}}"> {{$d->name}} </td>
                                  <td>{{'action'}}</td>
                                </tr>
                              <?php }} ?>
                              
                                </tbody>
                              </table>
                </div>
              </div>
            </div>
          </div>   
          </div>


          <!-- Emails -->
          <div id="menu4" class="container tab-pane fade"><br>
            <div class="container">
                <div class="row">
              <div class="k0 w-100">
                  <div class="k0email-table w-100">
                          <table class="table">
                                  <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Document Name</th>
                                    <th>Added On</th>
                                    <th>Added By</th>
                                    <th>File</th>
                                    <th>Actions</th>
                                    
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                    <td>kaushik</td>
                                    <td>ghosh</td>
                                    <td>5215</td>
                                    <td>kakdj</td>
                                    <td>011254785</td>
                                    <td>ccc</td>
                                  </tr>
                                  </tbody>
                                </table>
                                @endforeach
                                @endif
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>

</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->






 <!-- start notes -->
 <div class="modal" id="addnotes">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Notes</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
              
                
                    {{Form::open(array('url'  =>  'education/edu-notes'))}}
                    <div class="row">
                        
                        @foreach($info as $info2)
                        {{-- {!! Form::text('college_code', Crypt ::encrypt($info2->code)) !!} --}}
                        {!! Form::hidden('college_code', $info2->code) !!}
                        
                        @endforeach           
                            <div class="col-md-4 py-1 ">Subject</div>
                           <div class="col-md-8 py-1 ">
                             
                             {!! Form::text('subject',null, array( 'class' => 'form-control', 'placeholder' =>'Suject'  )) !!}
                            </div>
               
                         

                           <div class="col-md-4 py-1 ">Description</div>
                           <div class="col-md-8 py-1 ">
                            <textarea name="description" id="" cols="24" rows="4" class="form-control"></textarea>
                            
                          </div>

                              <div class="col-md-4 py-1 ">Contact</div>
                              <div class="col-md-8 py-1 ">
                              {!! Form::number('contact', null , array('class'=> 'form-control', 'placeholder'=>'Contact', 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                              </div>

                           <div class="col-md-4 py-1 ">Created By</div>
                           <div class="col-md-8 py-1 ">
                              {!! Form::text('created_by', null , array('class'=> 'form-control', 'placeholder'=>'Created By')) !!}
                            </div>

                          

                           
                       
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        {!! Form::submit('Submit', array('class'=>'btn btn-danger'))!!}
                        {{-- <button type="submit" class="btn btn-danger" data-ng-submit="modal">Submit</button> --}}
                      </div>
                      {{ Form::close() }} 
            </div>
          
        </div>
        
        
        
        
      </div>
    </div>
  </div>
  
</div>
<!-- End Notes -->









 <!-- start Campus -->
 <div class="modal" id="addcampus">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Campus</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
              
                
                    {{Form::open(array('url'  =>  'education/edu-campus'))}}
                    <div class="row">
                        
                        @foreach($info as $info2)
                        {{-- {!! Form::text('college_code', Crypt ::encrypt($info2->code)) !!} --}}
                        {!! Form::hidden('college_code', $info2->code) !!}
                        
                        @endforeach           
                            <div class="col-md-4 py-1 ">Name</div>
                           <div class="col-md-8 py-1 ">
                             
                             {!! Form::text('name',null, array( 'class' => 'form-control', 'placeholder' =>'Name'  )) !!}
                            </div>
               
                         

                           <div class="col-md-4 py-1 ">Street</div>
                           <div class="col-md-8 py-1 ">
                              {!! Form::text('street', null , array('class'=> 'form-control', 'placeholder'=>'Street')) !!}
                            
                          </div>




                          <div class="col-md-4 py-1">Country:  </div>
                          <div class="col-md-8 py-1">
                                <?php $countries =  DB::table('countries')->get();  ?>
                              <select name="country" id="" class="form-control" onChange="getState(this.value);">
                                  <option value="" Selected disabled>--Select--</option>
                                  
                              @foreach($countries as $c)
                            <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
                
                          @endforeach
                      </select>
                </div>
       
       
                 <div class="col-md-4 py-1">State:  </div>
                          <div class="col-md-8 py-1">
                                       <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
                                  <option value="" >--Select--</option>
                                       </select>
                </div>
                          <div class="col-md-4 py-1">City/Town:  </div>
                          <div class="col-md-8 py-1">
                              <select name="city" id="city-list" class="form-control" >
                                  <option value="" >--Select--</option>
                          </select>
                          </div>
       
       
                              <div class="col-md-4 py-1 ">Contact</div>
                              <div class="col-md-8 py-1 ">
                              {!! Form::number('contact', null , array('class'=> 'form-control', 'placeholder'=>'Contact', 'onKeyPress'=>"if(this.value.length==10) return false;" )) !!}
                              </div>

                           <div class="col-md-4 py-1 ">Post Code</div>
                           <div class="col-md-8 py-1 ">
                              {!! Form::number('pincode', null , array('class'=> 'form-control', 'placeholder'=>'Post Code', 'onKeyPress'=>"if(this.value.length==6) return false;" )) !!}
                            </div>

                          

                           
                       
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        {!! Form::submit('Submit', array('class'=>'btn btn-danger'))!!}
                        {{-- <button type="submit" class="btn btn-danger" data-ng-submit="modal">Submit</button> --}}
                      </div>
                      {{ Form::close() }} 
            </div>
          
        </div>
        
        
        
        
      </div>
    </div>
  </div>
  
</div>
<!-- End Campus -->







{{-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>        --}}
<script>
  
function getState(val) {
    $.ajax({
    type: "get",
    url: "{{url('add-institute-state')}}?id="+val,
    success: function(data){
        $('#state-list').empty();
                        $.each(data, function(key, value) {
                            $('#state-list').append('<option value="'+ this.state_id +'">'+ this.state_name +'</option>');
                        });
        }
    });
}

function getCity(val) {
$.ajax({
type: "get",
url: "{{url('add-institute-city')}}?id="+val,
success: function(data){
        $('#city-list').empty();
        $.each(data, function(key, value) {
                            $('#city-list').append('<option value="'+ this.city_name +'">'+ this.city_name +'</option>');
                        });
}
});
}

</script>


<script>

$(document).ready(function(){
	$(".delete-contact").on("click", function(){
		
		var unique_id = $(this).attr("data-id");
	$.ajaxSetup({
								headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
							 });
	
	if (confirm('Are you sure you want to Delete this?')) {
	$.ajax({
	type: "get",
	url: "{{url('delete_contact')}}?a="+unique_id,
	success: function(data){
    location.reload();
				}});
	}
}
	);
	});
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>

</script>


<style>
.country-city, .collage-name{
  text-align:center;
}
</style>


@endsection()


@extends('header')
@section('education/dashboard')




 


<!-- Page Wrapper -->
<?php use App\my_institutes; 
use App\courses;
use App\countries;
// use App\my_institutes;
// use App\highest_educations;
$college = my_institutes::all();
?> 
  
<style>
#ielts .col-sm-12 input[type="number"], #toefl .col-sm-12 input[type="number"]{
  border: 1px solid #c0baba;
}
</style>
  
  <div id="wrapper" style="width: 100%">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
    
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        {{-- <div class="container-flui "> --}}
                {{-- <h2>Dashboard</h2> --}}
                <style>
           #st-banner-background {
  background: url("{{url('public/uploads/university-image/banner.jpg')}}");
  background-repeat: no-repeat;
  background-size: auto;
  width: 100%;
  height: 450px;
}

#range_filter{
  padding-top:0px;
}
                </style>
                <div class="row student-banner" style="position:relative">

         <div id="st-banner-background">
           <div class="text-on-st-image ">
             <div class="st-img-contant">
            {{-- <h2>Hello World</h2>
            <p>The background image is displayed in its original size.</p> --}}
             </div>
           </div>
          </div>
                </div>
                
                <br>

                <div class="row edu-dash-top-btn">
                    <div class="col-m  "><a href="{{url('education/add-institution')}}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Add Institution</a>
                    </div>
                    <div class="col-m2  ">
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Import</button>
                    </div>
                    <div class="col-d-2  ">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target=""><i class="fa fa-cloud-upload" aria-hidden="true"></i> 
                        
                          <a class="collapse-item" href="{{url('education/dashboard')}}">Get All College</a>
                        </button>
                       </div>


                       <div class="col-d-2  ">
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#programm_filter">
                            <i class="fa fa-cloud-uploa" aria-hidden="true"></i> 
                          
                            <a class="collapse-item" >Eligibility Filter  </a>
                          </button>
                         </div>

                         
                       <div class="col-d-2  ">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#range_filter">
                          
                        
                          <a class="collapse-item" >Range Filter</a>
                        </button>
                       </div>
                   </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs bg-dang" id="myTab">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" data-toggle="tab" href="#My-Institutes">My Institutes</a> --}}
                      </li>
                  <li class="nav-item">
                    {{-- <a class="nav-link " data-toggle="tab" href="#Immisys-Institutes">Immisys Institutes</a> --}}
                  </li>
                 
                </ul>
              
                <!-- Tab panes -->
                <div class="tab-content content-color">
                  <div id="Immisys-Institutes" class="container tab-pane "><br>
                  {{ Form::open(array('url' => 'imm-institute')) }}
                            <div class="row">
                                
                                 
                                  <div class="col-md-4 py-3 "> <label for=""> Tags </label>
                                    <input type="text" class="form-control" placeholder="Tags">
                                  </div>

                                   <div class="col-md-4 py-3 "> <label for=""> Agreement Expiry</label>
                                     <input type="date" class="form-control" >
                                     <input type="date" class="form-control" >
                                    </div>
                       
                                   <div class="col-md-4 py-3 ">Search</div>
                                   
                                   {!! Form::search('search',null, array('placeholder' => 'search', 'class' => 'form-control' )) !!}
                                   
                                   
                                   <div class="col-md-12 text-center my-4" >
                                   <input type="submit" class="btn btn-danger w-10 " value="Submt">
                                   <input type="reset" class="btn btn-danger w-10 " value="Reset">
                                  </div>
                               
                            </div>
                            {{ Form::close() }} 

                           
                  <div class="k0">
                  <table>
                    <thead>
                    <tr>
                      <th>Trading Name</th>
                      {{-- <th>Legal Name</th> --}}
                      <th>Code</th>
                      <th>Tags</th>
                      <th>Landline</th>
                      <th>Email</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Agreement Expiry Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    
                      
                    @if(isset($imm_institutes))
                    @foreach($imm_institutes  as $key=>$edu2)
                    
                      <td> <a href="{{url('education/college-info')}}">  {{$edu2->trading_name}}</a>
                           </td>
                      {{-- <td>{{$edu2->legal_name}}</td> --}}
                      <td>{{$edu2->code}}</td>
                      <td>{{$edu2->tags}}</td>
                      <td>{{$edu2->landline}}</td>
                      <td>{{$edu2->email}}</td>
                      <td>{{$edu2->city}}</td>

                      @if(!empty($edu2->country))
                      <?php 
                      $get = DB::table('countries')->where('country_id',$info2->country)->orwhere('country_name', $info2->country)->get() ;
                      
                      ?>
                        <td>  {{ $get[0]->country_name}} </td>
                      
                      @endif

                      {{-- <td>{{$edu2->country}}</td> --}}
                      <td>{{$edu2->agreement_expiry_date}}</td>

                      <td>
                          <a href="javascript:void(0);" class="fa fa-trash delete"   data-id={{$edu2->unique_id}} ></a>   <a href= "javascript:void(0);" class="fas fa-external-link-alt edit-college"   data-id={{$edu2->unique_id}}>
                            </a>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
                
                

                  {{-- <div id="My-Institutes" class="container tab-pane active"><br> --}}
                    
                      
                          
                        {{-- {{ Form::open(array('url' => 'education/my-institute', 'class' => 'aa')) }}   
                        <div class="row"> 
                            <div class="col-md-2 py-3 "> 
                           
        <select name="tag" id="" class="form-control">
          <option selected disabled >--Tags--</option>
          @if(!empty($tag))
@foreach($tag as $t)
        <option value="{{ $t->tag_name }}"> {{ $t->tag_name }} </option>
        @endforeach
        @endif
        </select>
                            </div> --}}


                             {{-- <div class="col-md-2 py-3 ">
                              
                              <input type="date" name="form_date" class="form-control"> 
                             </div>
                             <div class="col-md-2 py-3 ">
                              <input type="date" name="end_date" class="form-control" >
                              </div>


                              <div class="col-md-4 py-3 ">
                              
                                  <input type="text" name="search" Placeholder ="Search"  class="form-control">  
                              </div>
                              <div class="col-md-2 py-3 ">
                                  <input type="submit" value="Search" class=" btn btn-danger">
                                  <input type="reset" class=" btn btn-danger">
                                  
                              </div> --}}

                              {{-- {{ Form::close() }}
                              <div class="col-md-2 py-3 "> </div> --}}

                            {{-- </div> --}}
                            {{-- <div class="row">
                             <div class="col-md-2  "><a href="{{url('education/add-institution')}}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Add Institution</a>
                             </div>
                             <div class="col-md-2  ">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Import</button>
                             </div>
                            </div> --}}
                             
                             {{-- <div class="col-md-2 py-3 "></div>
                          </div> --}}
                             <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Import</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, id. Cupiditate beatae voluptate sequi ullam molestiae deserunt corporis placeat nihil sunt quisquam enim, possimus blanditiis rem vero fuga unde ducimus!


             
          @if(Session::has('message'))
          <p >{{ Session::get('message') }}</p>
          @endif
          

          <form method='post' action='uploadFile' enctype='multipart/form-data' >
            {{ csrf_field() }}
            <div class="custom-file">
              <input type="file" class="custom-file-inpu" id="customFil" name="file">
              
</div>
          
                <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger" data-ng-submit="modal" value="Submit" name="submit">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>      
      </div>
    </div>
  </div>
  
<style>
.aa{
  width:100%;
}
</style>
                 
                             
{{-- {{ Form::open(array('url' => 'my-institute', 'class' => 'aa')) }}
                             <div class="col-md-4 py-3 ">Agreement Expiry Date</div>
                             <div class="col-md-4 py-3 "><input type="Date" class="form-control" placeholder="From Date"></div>
                             <div class="col-md-4 py-3 "><input type="Date" class="form-control" placeholder="To Date"></div>

                             <div class="col-md-4 py-3 ">Search </div>
                             <div class="col-md-8 py-3 ">
                             {!! Form::search('search',null, array('placeholder' => 'search', 'class' => 'form-control' )) !!}
                             </div>

                             <div class="col-md-12 text-center my-4" >
                             <input type="submit" class="btn btn-danger w-10 " value="Submit">
                             <input type="reset" class="btn btn-danger w-10 " value="Reset">
                            </div>
                         
                    
                      {{ Form::close() }}  --}}

                    </div>  </div>
                    <div class="container-fluid">
            <div class="k0 row">
              
              {{-- <div class="row university-box-design-parent">
                <div class="col-sm-3">
                  <div class="university-image-background">
                    <div class="university-background">
                      <img src={{url('public\uploads\university-logo\UC-Berkeley-Logo.png')}} alt="" class="university-logo">
                      <p>University of California - Berkeley Extension</p>
                      <img src="{{url('public\uploads\university-country-flag/usa_flag-d02b8c42c568d527f44a51739170d143.png')}}" alt="" class="university-country-flag" > <span> Berkeley, California </span>
                    </div> 
                  </div>
                </div>  
              </div> --}}

              @if(!empty($range_filter))
              {{-- @dd($range_filter); --}}
<div class="  search-list__items college-list ">
    
      @foreach($range_filter  as $edu)
      @foreach($edu  as $edu2)
<a  style="color:unset; display: contents; cursor:pointer" class="ancher-link  get-all-course" short_fees = "{{$short_fees}}"  data-id="{{$edu2->code}}" coun-id={{$edu2->country}}> 
  
                    <div class="search-list__item ">
                      <div class="person">
                        <div class="person__header">
                          <div class="person__title-container">
                            <h3 class="person__name"> {{$edu2->name}} </h3>
                            <h4 class="person__title"> 
                                <span class="fa fa-map-marker" >  </span>
                                <p class="dashboard-college-city">  {{$edu2->city}} </p> </h4>
                            <h4 class="person__title">
                              @if($edu2->country == "Canada")

                            <img src="{{url('public/uploads/university-country-flag/canada_flage.png')}}" alt=""  >
                            @elseif($edu2->country == "USA")
                            <img src="{{url('public/uploads/university-country-flag/usa_flage.png')}}" alt="">
                            @endif
                            
                               <span style="color: #767171;">  {{$edu2->country}}
                                </span>
                                </h4>
                          </div>
<div class="person__pic">
                          <img src="{{url('public\uploads\university-logo\UC-Berkeley-Logo.png')}}" alt="" >
                          {{-- <span class="fa fa-university"></span> --}}
                          <span class="fa fa-book"> 
                              <?php 
                              $get_course_detail = DB::table('courses')
                                                  ->where('college_code',$edu2->code)
                                                  ->get();
                                                 echo $get_course_detail->count();
                            ?>
                            </span>
                        </div>
                        </div>

                            <div class="person__details">
                          <p class="person__mail" >
                            <i class="fa fa-globe"></i> {{$edu2->website}} </p>
                          <p class="person__phone" >
                            <i class="fa fa-phone person__icon"></i>  {{$edu2->phone}} </p>
                            <p class="person__phone" >
                                <i class="fa fa-envelope"></i> {{$edu2->email}} </p>
                            </div>
                            <div class="session-start"> 
                              <p><strong> Start Session </strong> </p>
                          <p>
                            @if(!empty($get_course_detail[0]->intake))
                            {{$get_course_detail[0]->intake}}
                            @endif
                              </p>  
                           </div>
                        </div>
                        </div>
                      </a>
     
                      @endforeach  
                       {{-- {{ $edu->links() }}   --}}
                  
@endforeach

                 

@elseif(!empty($no_record))
<div style="margin:auto">
  <p style="font-size: 30px;
  color: red;
  padding: 37px;
  box-shadow: 1px 1px 6px 5px #b9b4b4;
  margin: 30px;">  No Record Found </p>
</div>

@endif

</div>  
<div id="filter_modal_courses"  >    </div> 
            </div>    
          </div>
          @if(!empty($range_filter))
          @foreach($range_filter as $range_filter)
          @if(!empty($connnn))
          {{$range_filter->appends(['filter_country'=>$connnn])->links()  }}
           @elseif(!empty($short_fees))
          {{$range_filter->appends(['short_by_fees'=>$short_fees])->links()  }} 
           @elseif(!empty($intake)) 
          
          @endif
          {{-- {{ $range_filter->total() }} --}}
          @endforeach
          @if(!empty($duuuuuu))
          {{$get->appends(['duration_year'=>$duuuuuu])->links()  }}

          {{-- @elseif(!empty($short_fees))
          {{$range_filter->appends(['short_by_fees'=>$short_fees])->links()  }} --}}

          @elseif(!empty($intake) &&(!empty($get)))
          {{$get->appends(['intake'=>$intake])->links()  }}
          {{-- @elseif(!empty($application_min))
          {{$get->appends(['application_min'=>$application_min])->links()  }} --}}
          @elseif(!empty($tution_max_price))
          {{$get->appends(['tution_max_price'=>$tution_max_price,'tution_min_price'=>$tution_min_price])->links()  }}
          @elseif(!empty($max_app_fees))
          {{$get->appends(['application_min'=>$min_app_fees,'application_max'=>$max_app_fees])->links()  }}
          
          @endif

          
@endif
<style>
#filter_modal_courses{
  /* position:sticky; */
}
</style>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
<script type="text/javascript">
  // $('ul.pagination').hide();
  $(function() {
      $('.infinite-scroll').jscroll({
          autoTrigger: true,
          loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
          padding: 0,
          nextSelector: '.pagination li.active + li a',
          contentSelector: 'div.infinite-scroll',
          callback: function() {
              $('ul.pagination').remove();
          }
      });
  });
</script>
   

              <div class="search-list__items college-list  infinite-scroll wrapper">
                @if(!empty($my_institutes))
           {{-- @dd($my_institutes); --}}
                <div id="results"><!-- results appear here --></div>
                {{-- <div class="ajax-loading  fa fa-refresh" ></div> --}}

                  @foreach($my_institutes  as $edu2)
                  <a href={{url('education/collage-info/'.$edu2->code )}} style="color:unset; display: contents;" class="ancher-link"> 
              

    
                                <div class="search-list__item ">
                                  <div class="person">
                                    <div class="person__header">
                                      <div class="person__title-container">
                                        <h3 class="person__name"> {{$edu2->name}} </h3>
                                        <h4 class="person__title"> 
                                            <span class="fa fa-map-marker" >  </span>
                                            <p class="dashboard-college-city">  {{$edu2->city}} </p> </h4>
                                        <h4 class="person__title">
                                          @if(($edu2->country == "Canada") || ($edu2->country == "CANADA"))

                                        <img src="{{url('public/uploads/university-country-flag/canada_flage.png')}}" alt=""  >
                                        @elseif($edu2->country == "USA")
                                        <img src="{{url('public/uploads/university-country-flag/usa_flage.png')}}" alt="">
                                        @endif
                                        
                                           <span style="color: #767171;">  {{$edu2->country}}
                                            </span>
                                            </h4>
                                      </div>
 <div class="person__pic">
                                      <img src="{{url('public\uploads\university-logo\UC-Berkeley-Logo.png')}}" alt="" >
                                      {{-- <span class="fa fa-university"></span> --}}
                                      <span class="fa fa-book"> 
                                          <?php 
                                          $get_course_detail = DB::table('courses')
                                          ->select('intake')
                                                              ->where('college_code',$edu2->code)
                                                              ->get();
                                                             echo $get_course_detail->count();
                                                       
                                        ?>
                                        </span>
                                    </div>
                                    </div>

                                        <div class="person__details">
                                      <p class="person__mail" >
                                        <i class="fa fa-globe"></i> {{$edu2->website}} </p>
                                      <p class="person__phone" >
                                        <i class="fa fa-phone person__icon"></i>  {{$edu2->phone}} </p>
                                        <p class="person__phone" >
                                            <i class="fa fa-envelope"></i> {{$edu2->email}} </p>
                                        </div>
                                        <div class="session-start"> 
                                          <p><strong> Start Session </strong> </p>
                                      <p >
                                        @if(!empty($get_course_detail[0]->intake))
                                        {{$get_course_detail[0]->intake}}
                                        @endif
                                        
                                        </p>  
                                      
                                      </div>
                                    </div>
                                    </div>
                                  </a>
                                  {{-- <div class="pagination">
                                 
                                  </div>                    --}}
                               
@endforeach
@endif
         
                                  
         </div>
     @if(!empty($my_institutes))         
         {{ $my_institutes->links() }}     
         @endif
        


            <table>
              <thead>
              <tr>
                {{-- <th>University/Institute Name</th>
                
                <th>Code</th>
                <th>Tags</th>
                <th>Landline</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <th>Agreement Expiry Date</th>
                <th>Action</th> --}}
              </tr>
              </thead>
              <tbody>
              {{-- @if(!empty($search))
              @foreach($search  as $edu2)
              
              <tr>
                      <td><a href={{url('education/collage-info/'.  $edu2->code )}}>  {{$edu2->name}}</a></td>
                      
                      <td>{{$edu2->code}}</td>
                      <td>{{$edu2->tags}}</td>
                      <td>{{$edu2->landline}}</td>
                      <td>{{$edu2->email}}</td>
                      <td>  {{$edu2->city}}</td>

                      @if(!empty($edu2->country)) --}}
                      <?php 
                      // $get = DB::table('countries')->where('country_id',$edu2->country)->orwhere('country_name', $edu2->country)->get() ;
                      
                      ?>
                        {{-- <td>   {{ $get[0]->country_name}} </td>
                      
                    @else
                      <td>{{$edu2->country}}</td>
      @endif

                      <td>{{$edu2->country}}</td>
                      <td>{{$edu2->agreement_expiry_date}}</td>


                <td>
                    <a href={{url('education/delete-college/'.$edu2->code)}}  onclick="if (!confirm('Are You Sure Delete It?')) { return false }" class="fa fa-trash delete"   data-id={{$edu2->code}} ></a> 
                    <a href= {{url('education/edit-college/'.$edu2->code)}} class="fas fa-external-link-alt edit-college"   data-id={{$edu2->unique_id}}>
                    </a> --}}
                </td>
              </tr>
              {{-- @endforeach
              @elseif(!empty($my_institutes))
              @foreach($my_institutes  as $edu2) --}}
              <tr>
                {{-- <td><a href={{url('education/collage-info/'.  $edu2->code )}}>  {{$edu2->name}}</a></td> --}}
                {{-- <td>{{$edu2->legal_name}}</td> --}}
                {{-- <td>{{$edu2->code}}</td>
                <td>{{$edu2->tags}}</td>
                <td>{{$edu2->landline}}</td>
                <td>{{$edu2->email}}</td>
                <td>  {{$edu2->city}}</td> --}}


                {{-- @if(!empty($edu2->country)) --}}
                <?php 
                // $get = DB::table('countries')->where('country_id',$edu2->country)->orwhere('country_name', $edu2->country)->get() ;
                
                ?>
                  {{-- <td>   {{ $get[0]->country_name}} </td>
                
              @else
                <td>{{$edu2->country}} </td>
@endif

                <td>{{$edu2->agreement_expiry_date}}</td>
          <td>
              <a href="{{'delete-college/'.$edu2->code}}"  onclick="if (!confirm('Are You Sure Delete It?')) { return false }" class="fa fa-trash delete"   data-id={{$edu2->code}} ></a>  
              <a href= {{url('education/edit-college/'.$edu2->code)}} class="fas fa-external-link-alt edit-college"   data-id={{$edu2->unique_id}}> --}}
              </a>
          </td>
        </tr>
          {{-- @endforeach
                @endif --}}
              </tbody>
            </table>
          </div>
                </div>
              </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    
      <!-- 
      <script type="text/javascript">
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script> -->


{{-- tart edit college modal --}}
  
<!-- start Agent update  modal-->

<?php
if(!empty($edit_college)){
// foreach($edit_college as $up)



 ?>
<div id="agent_update" class="modal" style="display:block;">

    <!-- Modal content -->
    <div class="modal-content create-agent-profile">
        
      <span class="agent_update_close" ><a href="{{url('education/dashboard')}}">   &times; </a> </span>
      <h5 class="callbacklater"> Edit University/Institute </h5>
     
      {{Form::open(array('url'=>"edit-colllege" ,'files'=>'true', 'id' => 'edit_college', 'class' => 'form'))}}
      {{Form::hidden('id',$edit_college[0]->unique_id)}} 
      <div class="row">
      <div class="form-group col-sm-6">
      <label for="">Name</label>
     {{Form::text('name',$edit_college[0]->name,array('class'=>'form-control','placeholder'=>'Name'))}}
      </div>
      


      <div class="form-group col-sm-6">
        <label for="">Code</label>
     {{Form::number('code',$edit_college[0]->code,array('class'=>'form-control','placeholder'=>'Code'))}}
      </div>

      <div class="form-group col-sm-6">
        <label for="">Tags</label>
     <select name="tag" id="" class="form-control">
       <option selected value={{$edit_college[0]->tags}}> {{$edit_college[0]->tags}} </option>
       <?php 
       $tags  = DB::table('tags')->get();
       foreach($tags as  $t) {
       ?>
       <option value=" {{$t->tag_name}} ">{{$t->tag_name}}</option> 
       <?php } ?>
     </select>
      </div>

      <div class="form-group col-sm-6">
        <label for="">Landline</label>
 {{Form::number('landline',$edit_college[0]->landline,array('class'=>'form-control','placeholder'=>'Landline'))}}
      </div>
 
 <?php
//   echo ($errors->first('email',"<li class='custom-error'>:message</li> 
//  <script> agent_create.style.display = 'block';</script>"))
 ?>
 <div class="form-group col-sm-6">
  <label for="">Email</label>
 {{Form::email('email',$edit_college[0]->email ,array('class'=>'form-control','placeholder'=>'Email'))}}
 {{-- {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>'Confirm Password'))}} --}}
 </div>




 
 <div class="form-group col-sm-6">
  <label for="">Country</label>
       <?php $countries =  DB::table('countries')->get();  ?>
     <select name="country" id="" class="form-control" onChange="getState(this.value);">
         <option value={{$edit_college[0]->country}} Selected >{{$edit_college[0]->country}}</option>
              @foreach($countries as $c)
   <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
 @endforeach
</select>
 </div>


 <div class="form-group col-sm-6">
  <label for="">State</label>
              <select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
         <option value= {{$edit_college[0]->state}}  Selected> {{$edit_college[0]->state}} </option>
              </select>
 </div>


 <div class="form-group col-sm-6">
      <label for="">City</label>
     <select name="city" id="city-list" class="form-control" >
         <option value= {{$edit_college[0]->city}}  >{{$edit_college[0]->city}} </option>
 </select>
 </div>
 



 {{-- {{Form::text('country',$edit_college[0]->country,array('class'=>'form-control','placeholder'=>'Country'))}} 
 {{Form::text('state',$edit_college[0]->state,array('class'=>'form-control','placeholder'=>'State'))}} 
 {{Form::text('city',$edit_college[0]->city,array('class'=>'form-control','placeholder'=>'City'))}}  --}}
 
 
 <div class="form-group col-sm-6">
  <label for="">Street</label>
 {{Form::text('street',$edit_college[0]->address,array('class'=>'form-control','placeholder'=>'Street'))}}
 </div>

 <div class="form-group col-sm-6">
  <label for="">Pin</label>
 {{Form::text('pin',$edit_college[0]->postal_code,array('class'=>'form-control','placeholder'=>'Pin Code'))}}
 </div>
 <div class="form-group col-sm-6">
  {{Form::submit('Save', array('class' => 'btn btn-danger w-10 my-3'))}}
  {{Form::reset('Reset', array('class' => 'btn btn-danger w-10 my-3'))}}
 </div>
  {{Form::close()}}
    </div>
  </div>
  <script>
  
 var agent_update = document.getElementById("agent_update");
// var update_agent_button = document.getElementById("update_agent_button");
var agent_update_close = document.getElementsByClassName("agent_update_close")[0];
// create_agent_button.onclick = function() {
// 	agent_update.style.display = "block";
// }
agent_update_close.onclick = function() {
    window.history.back();
}

  </script>
<?php } ?>
  
  <!-- end of Agent Update  Modal -->
{{-- end fo edit college model --}}


<script>
    $(document).ready(function(){
$(".delete").on("click", function(){
    var unique_id = $(this).attr("data-id");
    // var val = $(this).val();
    


$.ajaxSetup({
                            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });

// if (confirm('Are you sure you want to Delete this?')) {
$.ajax({
type: "get",
url: "{{url('delete_college')}}?a="+unique_id,
success: function(data){
            }});
}
);
});
</script> 

<script>
// $(document).ready(function(){
//   $('.edit-college').on('click' ,function(){
//     var unique_id = $(this).attr("data-id");
    
//     $.ajaxSetup({
//                             headers: {
//                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                          });

//                          $.ajax({
//                            type:"get",
//                            url:"{{url('edit-college')}}?a="+unique_id,
//                            success:function(data){
// $('#agent_update').show();
//                            }
//                          })
//   })
// })
</script>
























 <!-- The Modal -->
 <div>
 <div class="modal" id="programm_filter" style="padding-top:0;">

    <div class="modal-dialog" style="width:1200px;max-width:1200px;top: 10%;
    position: absolute;
    left: 50%;
    transform: translate(-50%);">
      <div class="modal-content" style="width:100% !important;">
      
        <!-- Modal Header -->
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" style="color: #383838;" >&times;</button>
          <h3 style="width:100%;text-align:center"> Eligibility Filter</h3>
          {{-- <button class="clear-all-eligibility-button" > Clear All </button> --}}
        </div>
        <hr style="margin: 0; padding:0">
        <!-- Modal body -->
        <div class="modal-body" style="position:relative;width: 80%;margin: auto;">
        

        
            
              {{-- <input type="file" class="custom-file-input" id="customFile"> --}}
              {{--
               --}}
              <!------ Include the above in your HEAD tag ---------->
              
              <div class="" style="position:absolut">
                
              <div class="stepwizard col-md-offset-3">
                  <div class="stepwizard-row setup-panel">
                    
                    <div class="stepwizard-step">
                      <a href="#start" type="button" class="btn btn-primary btn-circle start"></a>
                      <p>Step 1</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-1"  type="button" class="btn btn-default btn-circle step-2"></a>
                      <p>Step 2</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-2"  type="button" class="btn btn-default btn-circle step-3" disabled="disabled"></a>
                      <p>Step 3</p>
                    </div>
                    {{-- <div class="stepwizard-step">
                      <a href="#step-3"  type="button" class="btn btn-default btn-circle step-3 " disabled="disabled"></a>
                      <p>Finish</p>
                    </div> --}}
                    {{-- <div class="stepwizard-step">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p>Finish</p>
                      </div> --}}
                  </div>
                </div>
               
                
                

                {{Form::open(array('url' => 'eligibility-filter','method'=>'get'))}}
                <div class="row setup-content"  id="start">
                  <div class="col-sm-12">
                    <h3>Discover programs you can apply for</h3>
                    <h4>Get a list of eligible programs ... in just 60 seconds</h4>
                    <p>Start by telling us about yourself.</p>
                  </div>
                  
                  
                  <div class="form-group col-md-12  select-student" style="position:relative">
                      <hr>
                      <label class="label-class">Nationality</label>
                    
                      
                        {{-- <select id="select_country"    name="education_country"  class="form-control"  onChange="get_university(this.value);check_empty_country();" style="    position: absolute;
                      width: 50%;
                      right: 25px;" >
                        <option value selected>India</option> --}}
                        <?php 
                        // $countries = countries::all(); 
                         ?>               
                            {{-- @foreach($countries as $c)
                    <option value="{{$c->country_id}}">{{$c->country_name}}   </option>
                    @endforeach
                      </select> --}}
                   




        
          <select id="select_country"    name="students_select" class="selectpicker form-control" data-live-search="true"  onChange="get_university(this.value);check_empty_country();" style="    position: absolute;
          width: 50%;
          right: 25px;">
             <option value selected>India</option>
             <?php 
            $students = DB::table('enquiries')
                        ->where('delete_client',1)
                        ->get();
              ?>               
                 @foreach($students as $c)
         <option value="{{$c->unique_id}}" > {{'IC'.$c->id}}  {{$c->name}}   </option>
         @endforeach
          </select>
        
   </div>



<div class="col-sm-6 select-student" >
University / Institutes
</div> 
<div class="col-sm-6">
    <select name="enrolment_college[]" id="" class=" form-control selectpicker" data-live-search="true" multiple >
      
      @foreach($college as $c)
      <option value="{{$c->unique_id}}"> {{$c->name}} </option>
      @endforeach
    </select>
</div> 




                    <div class="col-sm-12" style="text-align: center">
                    <button id="next_button_country" class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" >Next</button>


                    
                  </div>
                  </div>
                </div>
                


                  <div class="row setup-content" id="step-1">
                    <div class="form-group col-md-12">
                      <h3>How were your most recent grades?</h3>
                    </div>
                      <hr>
                      
                        <div class="form-group col-md-12" style="position:relative">
                          <label class="label-class">Country of Education <span class="star">*</span></label>
                        
                            
                          
<select id="country_of_education_id"    name="country_of_education_id"  class="form-control"  onChange="country_of_education();" style=" position: absolute;width: 50%;right: 25px;">

                          <option disabled selected >Select..</option>
                            <option value="100">India</option>
                              <option value="15">Australisa</option>
                              <option value="38">Canada</option>
                              <option value="224">USA</option>
                              <option value="77">United Kingdom</option>
                          </select> 

                        </div>
                      



                        <div class="form-group col-md-12" style="position:relative">
                          <label class="label-class">Highest Education <span class="star">*</span></label>
                        
                            
                          
                          <select id="highest_educations"    name="highest_educations"  class="form-control"  onChange="highest_educations_fun();" style="    position: absolute;
                          width: 50%;
                          right: 25px;" >
                            <option value disabled selected> Select..</option>
                            <?php $get_high_edu =  DB::table('highest_educations')->get(); ?>
                            @foreach($get_high_edu as $edu)
                        <option value="{{$edu->education}}">{{$edu->education}}</option>
                              @endforeach
                          </select> 

                        </div>

                        <div class="form-group col-md-12" style="position:relative">
                          <label class="label-class">Grading Scale <i> (Out of) </i> <span class="star">*</span> </label>
                        
                            
                          
                          <select id="grading_scheme"    name="grading_scheme"  class="form-control"  onChange="grade_average_fun();" style="    position: absolute;
                          width: 50%;
                          right: 25px;" >
                            <option value disabled selected> Select..</option>
                            <?php
                            //  $get_high_edu =  DB::table('highest_educations')->get();
                               ?>
                            {{-- @foreach($get_high_edu as $edu)
                        <option value="{{$edu->education}}">{{$edu->education}}</option>
                              @endforeach --}}
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="7">7</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="100">100</option>
                          </select> 

                        </div>


                        <div class="form-group col-md-12" style="position:relative">
                          <label class="label-class">Grade Average <span class="star">*</span> </label>
                        
                            
                          
                         <input onChange="enable_button2();" id="grade_average" name="grade_average"  type="number" style="  position: absolute;
                         width: 50%;
                         border-radius: 5px;
                         border: 1px solid #cccccc;
                         right: 25px;padding-left: 20px;
    color: #675c5c;">

                        </div>




                        <div class="form-group col-md-12" style="position:relative">
                          <label class="label-class">Do you have a valid Canadian study permit or visitor visa?
                          </label>
                        <label class="switch toggle-button" >
                            <input type="checkbox" >
                            <span class="slider round"></span>
                          </label>
                          </div>



                          <div class="form-group col-md-12" style="position:relative">
                            <label class="label-class">Do you have a valid US study permit or visitor visa?
                            </label>
                          <label class="switch toggle-button" >
                              <input type="checkbox" >
                              <span class="slider round"></span>
                            </label>
                            </div>


                        <div class="col-md-12" style="text-align: center">
                                                  


                     
{{-- <a href="#start" class="next_button_country  btn btn-primary  btn-lg " type="button" > Back --}}
{{-- <button target="#start"  >Back</button> --}}
{{-- </a> --}}
<div class="stepwizard-row setup-panel" style="display:initial !important; background-color:none !important"> 
<div class="stepwizard-step" style="display:inline-block !important">
  <a href="#start" > <button class="next_button_country  btn btn-primary  btn-lg " style="height: auto !important"> Back  </button> </a>
</div>
<button id="next_button2"  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" >Next</button>
</div>

                    </div>
                      </div>
                    </div>

                  
                  <div class="row setup-content" id="step-2">
                    <div class="col-xs-12 ">
                        <div class="form-group">
                          {{-- <label class="label-class">Only Show Direct Admission
                          </label>
                  

                          <label class="switch toggle-button">
                              <input type="checkbox">
                              <span class="slider round"></span>
                            </label> --}}
                             
                          </div>
                                </div>
                       
                       
<div class="col-sm-3"></div>

                                <div class=" col-sm-6 ">
                                    <div class="form-group">
                                      <label class="label-class">English Language Test
                                      </label>
                              
            

                                      <select  onchange="add_score();"  id="select_english_score"  name="select_english_score"  class="form-control"   style="position: absolute;
                                      width: 50%;
                                      right: 25px;" >
                                        <option value disabled selected > Select..</option>
                                        <option value="toefl">TOEFL</option>
                                        <option value="ielts">IELTS</option>
                                      </select> 

                                     
                                              </div>
                                            </div>
<div class="col-sm-3"></div>
                                            
<div class="col-sm-5"></div>
                                            <div class="col-sm-6 " id="toefl" style="display:none;margin-top: 13px;">
                                                <div class="form-group">
                                                  {{-- <label class="label-class"> 
                                                    Scores
                                                  </label> --}}
                                             
                                             <div style="">
                                             <div class="row">
                                               <div class="col-sm-12">
                                                  <input type="number" placeholder="Reading" name="toefl_reading"> 
                                                  <input type="number" placeholder="Writing" name="toefl_writing"> 
                                               </div>
                                               <div class="col-sm-12">
                                                  <input type="number" placeholder="Listening" name="toefl_listening"> 
                                                <input type="number" placeholder="Speaking" name="toefl_speaking"> 
                                               </div>
                                             </div>
                                            </div>
                                                </div>
                                              </div>


                                              <div class="col-sm-6 " id="ielts" style="display:none;margin-top: 13px;">
                                                <div class="form-group">
                                                  {{-- <label class="label-class"> Scores
                                                  </label> --}}
                                             
                                             <div style="">
                                             <div class="row">
                                               <div class="col-sm-12">
                                                  <input type="number" placeholder="Reading" name="ielts_reading"> 
                                                  <input type="number" placeholder="Writing" name="ielts_writing"> 
                                               </div>
                                               <div class="col-sm-12">
                                                  <input type="number" placeholder="Listening" name="ielts_listening"> 
                                                  <input type="number" placeholder="Speaking" name="ielts_speaking"> 
                                               </div>
                                             </div>
                                            </div>
                                                </div>
                                              </div>







                                              <div style="width: 100%;
                                              margin-top: 44px;
                                              text-align: center;">
                                              {{-- <button id=""  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" style="margin-bottom:30px;">Back</button> --}}
                                              <button type="submit" id=""  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button" style="margin-bottom:30px;" >Submit</button>
                                              
                                              </div>
                                            </div>                                
                                {{-- <button  id="next_button4"  class=" btn btn-primary nextBtn btn-lg pull-right" type="button" >Next </button> --}}
                               
    </div>
                          
    
    {{-- <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                    
        
               <p>See what you are eligible for!
                        </p>

                        <div style="margin:auto;height: 100px;
                        position: relative;
                        text-align: center;">
                        <button class="btn btn-dange  btn-primary " style="position: absolute;
                        width: 200px;left: 50%;
    transform: translate(-50%);">Back</button>
    <button class="btn btn-danger   btn-primary " type="submit"   style="    position: absolute;
    top: 38px;
    left: 50%;
    transform: translate(-50%);">Show All Eligible Programs</button>
  </div>
                        
                    </div>
                  </div> --}}

{{Form::close()}}
                  </div>
              @if(!empty($institute))
            
            @foreach($institute as $ins)
            {{ Form::hidden('colllege_code',$ins->code)}}
              {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
            @endforeach
          @endif
        <!-- Modal footer -->
        <div class="modal-footer">
            {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
            {{-- {!! Form::submit('Submit', array('class' => 'btn btn-danger', 'name'=>'submit')) !!} --}}

          {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
        </div>
    {{Form::close() }}
</div>
</div>
      </div>






      

      <script>

        function get_university(val) {
            $.ajax({
            type: "get",
            url: "{{url('get_university')}}?id="+val,
            success: function(data){
              
                $('#college').empty();
                                $.each(data, function(key, value) {
                                    $('#college').append('<option value="'+ this.code +'">'+ this.name +'</option>');
                                });
                }
            });
        }
        
        function get_course(val) {
        $.ajax({
        type: "get",
        url: "{{url('get_course')}}?id="+val,
        success: function(data){
                $('#get_course_data').empty();
                $.each(data, function(key, value) {
                  
                  
                                    $('#get_course_data').append('<option value="'+ this.course_name +'">' +this.course_name +'</option>');
                                    
                                });
        }
        });
        }
        
        </script>








{{-- filter by range start model --}}
<div>
<div class="modal" id="range_filter">
  
  <div class="modal-dialog" style="width:1200px;max-width:1200px;top:50%;transform: translate(0,-50%);">
    <div class="modal-content" style="width:100% !important;">
    
      <!-- Modal Header -->
      <div class="modal-header" >
<button type="button" class="close filter-close-range" data-dismiss="modal"  style="padding: 0px 0px 30px 0px;">&times;</button>
</div>
{{-- modal body --}}

<div class="modal-body" style="position:relative;width: 95%;margin: auto;">
    <div class="row">
      <div class="col-sm-6">
        <h3>Eligibility</h3>
        <i> Tip: enter TOEFL / IELTS / GRE / GMAT scores to see more results </i>
        <hr>
        <p>See and apply for programs you're eligible for.</p>
        <span class="star">*We need to know your current education to provide accurate results  </span>
<div style="text-align: center;">
     <button onclick="hide_range_filter();"  id=""  class=" next_button_country btn btn-primary nextBtn btn-lg " type="button"  data-target="#programm_filter"  data-toggle="modal" >Eligibility Filter</button>


    </div>
     <div>
       
     </div>
      </div>




      <div class="col-sm-6" id="filter_by_range_section" style="overflow:hidde">
        {{Form::open(array('url'=>'range-filters', 'method'=>"get"))}}
<div> <h3 style="color:gray">Filter</h3>
 {{-- <button  style="position: absolute;
  right: 20px;
  top: 27px;
  background: no-repeat;
  border: none;
  font-size: 16px;
  color: #404641;" > Clear  </button>  --}}
  </div>
<div> <!-- Grid row -->
  <div class="row accordion-gradient-bcg d-flex justify-content-center">
  
    <!-- Grid column -->
    <div class="col-md-12 py-2">
  
        

{{-- accordian --}}
<div class="container" style="border: 1px solid #ebe7e7;">
    {{-- <h3>Collapse with Indicators</h3> --}}
  <div class="accordion indicator-plus-before round-indicator" id="accordionH" aria-multiselectable="true">
    <div class="card m-b-0">
      
      <div class="card-header collapsed" role="tab" id="headingOneH" href="#collapseOneH" data-toggle="collapse" data-parent="#accordionH" aria-expanded="false" aria-controls="collapseOneH">
  <a class="card-title"> Fees Option</a>
      </div>
      <div class="collapse" id="collapseOneH" role="tabpanel" aria-labelledby="headingOneH">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p>Sort By </p>             
                </div>
                <div class="col-sm-6">

                    <select name="short_by_fees" >
                        <option selected disabled>School Rank</option>
                        <option value="1">Tuition - Lowest First</option>
                        <option value="2">Tuition - Highest First</option>
                        <option value="3">Application Fees - Lowest First</option>
                        <option value="4">Application Fees - Highest First</option>
                      </select>
                </div>
              </div>
        </div>
      </div>

      <div class="card-header collapsed" role="tab" id="headingTwoH" href="#collapseTwoH" data-toggle="collapse" data-parent="#accordionH" aria-expanded="false" aria-controls="collapseTwoH">
          <a class="card-title">  Filters by Universities / Institutes</a>
              </div>
              <div class="collapse" id="collapseTwoH" role="tabpanel" aria-labelledby="headingTwoH">
                <div class="card-body">
                    <div class="row">
                        <br>
                      <div class="col-sm-6">
                        <p>Countries</p>
                      </div>
                      <div class="col-sm-6">
                  <select   name="filter_country" id=""> 
                  <option disabled selected> --Selected-- </option>
                  <option value="Canada">Canada</option>
                  <option value="USA">USA</option>
                </select>
              </div>
                  </div>
<br>

<div class="row">
    <div class="col-md-6">
        <p>Provinces / States</p></div>  
    
    
    <div class="col-md-6 col-lg-6 col-sm-6">
              <select  class="selectpicker" multiple name="get_privience_state_city[]"  >
             <option selected disabled> --City-- </option>   
                <?php $get_privience_state_city = DB::table('my_institutes')
                ->select(DB::raw('city'))
                ->where('status',1)
                ->groupBy('city')
                ->get();
             
                foreach($get_privience_state_city as $g){
                  ?>
                <option value="<?php echo$g->city;?>">{{$g->city}}</option>
                
                <?php } ?>
              </select>
    
    </div>
                </div>

                <br>
                      
<div class="row">
    <div class="col-sm-6">
        <p >
            Filter By University/Institute</p> 
    </div>  
      
      <div class="col-sm-6">
        <select class="selectpicker" multiple  name="filter_by_colleges[]" >
    <option selected disabled> --Select-- </option>
    <?php 
    
    foreach($college as $coll){
      strlen($coll->name);
      // str_word_count($coll->name,0)
      $content = substr($coll->name, 0, 50);
      if(strlen($coll->name) > 50)
      {
        
        $content.'...';
      }

    ?>
    <option value="{{$coll->name}}"> {{$content}} </option>
    <?php } ?>
    </select>
    </div>
    </div>

                </div>
              </div>

{{-- third accordian --}}
<div class="card-header collapsed" role="tab" id="heading3H" href="#collapse3H" data-toggle="collapse" data-parent="#accordionH" aria-expanded="false" aria-controls="collapse3H">
    <a class="card-title">  Filters by Courses</a>
        </div>
        <div class="collapse" id="collapse3H" role="tabpanel" aria-labelledby="heading3H">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Program Levels</p>
                    </div>
                    <div class="col-sm-6">
                        <?php  
                        $courses = db::table('courses')
                        ->select(db::raw('duration_year'))
                         ->groupBy('duration_year')
                         ->get();
// dd($courses);

                        ?>
                       <select  id="" class="selectpicker" multiple name="duration_year[]">
                         <option select disabled>--Select--</option>
                    @foreach($courses as $c)               
                       <option value="{{$c->duration_year}}">{{$c->duration_year}}</option>
                       @endforeach
                       </select>
                    </div>
                                  </div>
                                  <br>
                                      
<div class="row">
   
    <div class="col-sm-6">
        <p>Available Intakes</p>
    </div>
    <div class="col-sm-6" >
  
        <?php  $date = date('Y');
        $date2 = $date+1;
        
        $m1 = date('M');
        $y1 = date('Y');
        $t = date('m');
        $m2 = $t+1;
        $y2 = $y1+1;
        $y3 = $y2+1;
        // dd($m2, $y2, $y3, date('m'));
?>
{{-- 
<select class="selectpicker" multiple name="intake[]">
  
  @for($t; $t<=12; $t++)
<option value = "{{$m1." ".$y1}}"> {{$m1." ".$y1}} </option>
  @endfor
              <option value="{{'Jan '.$date}}">{{'January '.$y2}}</option>
              <option value="{{'Feb '.$date}}">{{'February '.$y2}}</option>
              <option value="{{'Mar '.$date}}">{{'March '.$y2}}</option>
              <option value="{{'Apl '.$date}}">{{'April '.$y2}}</option>
              <option value="{{'May '.$date}}">{{'May '.$y2}}</option>
              <option value="{{'Jun '.$date}}">{{'June '.$y2}}</option>
              <option value="{{'Jul '.$date}}">{{'July '.$y2}}</option>
              <option value="{{'Aug '.$date}}">{{'August '.$y2}}</option>
              <option value="{{'Sep '.$date}}">{{'September '.$y2}}</option>
              <option value="{{'Oct '.$date}}">{{'October '.$y2}}</option>
              <option value="{{'Nov '.$date}}">{{'November   '.$y2}}</option>
              <option value="{{'Dec '.$date}}">{{'December '.$y2}}</option>

              <option value="{{'Jan '.$date}}">{{'January '.$y3}}</option>
              <option value="{{'Feb '.$date}}">{{'February '.$y3}}</option>
              <option value="{{'Mar '.$date}}">{{'March '.$y3}}</option>
              <option value="{{'Apl '.$date}}">{{'April '.$y3}}</option>
              <option value="{{'May '.$date}}">{{'May '.$y3}}</option>
              <option value="{{'Jun '.$date}}">{{'June '.$y3}}</option>
              <option value="{{'Jul '.$date}}">{{'July '.$y3}}</option>
              <option value="{{'Aug '.$date}}">{{'August '.$y3}}</option>
              <option value="{{'Sep '.$date}}">{{'September '.$y3}}</option>
              <option value="{{'Oct '.$date}}">{{'October '.$y3}}</option>
              <option value="{{'Nov '.$date}}">{{'November   '.$y3}}</option>
              <option value="{{'Dec '.$date}}">{{'December '.$y3}}</option>
</select>

 --}}
        <select class="selectpicker" multiple name="intake[]">
          <option disabled select>--Selete--</option>
              <option value="{{'Sep '.$date}}">{{'September '.$date}}</option>
              <option value="{{'Oct '.$date}}">{{'October '.$date}}</option>
              <option value="{{'Nov '.$date}}">{{'November   '.$date}}</option>
              <option value="{{'Dec '.$date}}">{{'December '.$date}}</option>
              <option value="{{'Jan '.$date}}">{{'January '.$date}}</option>
              <option value="{{'Feb '.$date}}">{{'February '.$date}}</option>
        
              <option value="{{'Mar '.$date}}">{{'March '.$date}}</option>
              <option value="{{'Apl '.$date}}">{{'April '.$date}}</option>
              <option value="{{'May '.$date}}">{{'May '.$date}}</option>
              <option value="{{'Jun '.$date}}">{{'June '.$date}}</option>
              <option value="{{'Jul '.$date}}">{{'July '.$date}}</option>
              <option value="{{'Aug '.$date}}">{{'August '.$date}}</option>
        </select>
    </div>
  </div>
  <br>
  <link rel="stylesheet" href="{{URL::asset('public/css/code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css')}}" />
  <div class="row">
    <br>
    <div class="col-sm-6">
        <p>Tution Fees</p>
    </div>
   
    <?php
        $min_fees = DB::table('courses')->MIN('fees');
        
       $max_fees = DB::table('courses')->MAX('fees');
      //  dd($max_fees);
      ?>
  <div class="col-sm-6">
      <div class="form-price-range-filter">
    
        
<script >
    $(function() {
    var   min = '<?php echo "$min_fees"; ?>';
     var  max = '<?php echo "$max_fees"; ?>';
      min = parseInt(min);
      max = parseInt(max);
    $( "#slider-range" ).slider({
      range: true,
      min:min  ,
      max:max  ,
      values: [min, max],
      slide: function( event, u ) {
       var a =  $( "#min_price" ).val('$ '+u.values[0]);
       var b = $( "#max_price" ).val('$ '+u.values[1]);
      
      },
      });
    });
  </script>
          <div>
              <input type="text" id="min_price" name="tution_min_price" placeholder="<?php echo '$ '.$min_fees; ?>">
              <div id="slider-range"></div>
              
              <input type="text" id="max_price" name="tution_max_price" placeholder="<?php echo '$ '.$max_fees; ?>">
          </div>
          {{-- <div>
              <input type="submit" name="submit_range" value="Filter Product" class="btn-submit">
          </div> --}}
    </div>
  </div>
  </div>

  <br>

  <div class="row">

    
    <br>
    <div class="col-sm-6">
        <p>Application Fee</p>
    </div>
    <div class="col-sm-6">
        <?php
        $application_min_fees = DB::table('courses')->MIN('application_fee');
        $application_max_fees = DB::table('courses')->MAX('application_fee');
        // dd($application_min_fees);
        ?>
        <script>
         $(function() {
            var min = '<?php echo "$application_min_fees"; ?>';
            var max = '<?php echo "$application_max_fees"; ?>';
            min = parseInt(min);
            max = parseInt(max);
          $( "#slider-range2" ).slider({
            range: true,
            min:min  ,
            max:max  ,
            values: [min, max],
            slide: function( event, u ) {
              $( "#application_min" ).val('$ '+u.values[0]);
              $( "#application_max" ).val('$ '+u.values[1]);
            },
            });
          });
        </script>
        <div class="form-price-range-filter">
            <div >
                <input type="text" id="application_min" name="application_min" placeholder="<?php echo'$ '.$application_min_fees; ?>">
                <div id="slider-range2"></div>
                
                <input type="text" id="application_max" name="application_max"placeholder="<?php echo '$ '.$application_max_fees; ?>">
            </div>      
      </div>
    </div>
  </div>


            </div>
        </div>
    </div>
  </div>
</div>


      <!--Accordion wrapper-->
      <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
        aria-multiselectable="true">
  
        <!-- Accordion card -->
        
        <!-- Accordion card -->
  
       
  
        <!-- Accordion card -->
        <div class="card">
  
          <!-- Card header -->
          {{-- <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3" onclick="toggle_accordian3();">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse3"
              aria-expanded="false" aria-controls="collapse3">
              <h5 class="mb-0 white-text text-uppercase font-thin">
                Program Filters <i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </div> --}}
  
          <!-- Card body -->
          <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3"
            data-parent="#accordionEx7">
            <div class="card-body mb-1 rgba-grey-light white-text">
              
  
              





<?php 
$get_all =   DB::table('courses')
      ->whereBetween('fees',[$min_fees, $max_fees])
      ->get();     
?>


<script>$('select').selectpicker();</script>  

</div>

          </div>
        </div>
        <!-- Accordion card -->
      </div>
      <!--/.Accordion wrapper-->
  
    </div>
    <!-- Grid column -->
  
  </div>
  <!-- Grid row --> </div>
         
    
      </div>
    </div>
    <hr>
    <div style="text-align: center">
    <button class="btn btn-danger   btn-primary " type="submit">Submit</button>
    <input type="reset" class="btn btn-danger   btn-primary">
  </div>
    {{Form::close()}}
</div>
{{-- end modal body --}}
</div>
</div>
</div>
</div>
<script>

// $(document).ready(function(){
//   $("#heading1").click(function(){
//     $("#collapse1").removeClass("in");
//   });
// });
// $(document).ready(function(){
//   $("#heading2").click(function(){
//     $("#collapse2").removeClass("in");
//   });
// });


  
function toggle_accordian1() {
	var x = document.getElementById("collapse1");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }
  
  function toggle_accordian2() {
	var x = document.getElementById("collapse2");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }
  function toggle_accordian3() {
	var x = document.getElementById("collapse3");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }

</script>

{{-- end of filter by range start model --}}







    </div>

    
    <script>
        function hide_range_filter(){
           var element = document.getElementById('range_filter');
           element.setAttribute('style', 'display:none !important');
      
        }
        </script>
        {{-- <input type="" value="" name="jhgjhjhkl">   --}}
        
        
{{-- @dd($year); --}}
{{-- Grade 12 \/ High --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<?php 
// if(!empty($year))
// {
//   $a = json_encode($year) ;
// }
// else{
//   $a = "";
// } 
?>
<script>
$(document).ready(function(){
$('.get-all-course').click(function(){
  // alert('a');
  
  // document.getElementById('filter_modal_courses').style.display="block"
  document.getElementById('filter_modal_courses').innerHTML ="";
  // $('#filter_modal_courses .program-filter').hide();
  // $('#filter_modal_courses .loader').show();
  // exit()
  // $(this).find('.search-list__item').style.background:red;
  $('.search-list__item').css({"background": "none",
    "box-shadow": "none"});

  $(this).find('.search-list__item').css({"background": "#231818",
    "box-shadow": "2px 2px 5px 9px #104b67"});

    var college_code = $(this).attr('data-id');
    var short_fees   = $(this).attr('short_fees');
    var country  =  $(this).attr('coun-id');
    var dollar = 1;
    if((country=="Canada") || (country =='CANADA')){
            dollar = "CA$";
          } else if(country=="USA"){
            dollar = "US$";
          }
          else{
            dollar = "";
          }

// alert(college_code);
// t = t.trim;
$('#loader').show();
$('.loader').show();
  // exit;
		$.ajaxSetup({
			headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		 });
		 $.ajax({
      
			type: "get",
			url: "{{url('get_all_course')}}?id="+college_code+"&short_fees="+short_fees,
				success: function(data){
          document.getElementById('filter_modal_courses').style.display="block";  
    $('.search-list__items').css("width", "800");
              document.getElementById('filter_modal_courses').innerHTML ="";
              var json_response = data;
          var len = data.length;
          $('#loader').hide();
          if(len > 0){
          



$('.loader').hide();
          document.getElementById('filter_modal_courses').innerHTML +=" <p class='p-fa-close'> <span class='fa fa-close'></span>  </p>";
          for(var i=0; i<len; i++){  

            var app_fees = json_response[i].application_fee.toString();
            var tution_fees   =  json_response[i].fees.toString();
            if(!app_fees.search('.')){
app_fees =   app_fees+'.00';
            }
            if(!tution_fees.search('.')){
tution_fees =   tution_fees+'.00';
            }


          $('#filter_modal_courses').append('<div class="program-filter"> <div class="program"> <div> <p class="course-name">'+json_response[i].course_name+ '</p><p> <span class="tution-fees"> Tuition: </span><span class="country-dollar">'+dollar+'</span> <span class="fa fa-dolla"> '+tution_fees.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+ ' </span> </p><p> <span class="application-fees"> Application: </span> <span class="country-dollar">'+dollar+'</span> <span class="fa fa-dolla">'+app_fees +' </span> </p><div> <span class="fa fa-graduation-cap"> '+json_response[i].duration_year+' </span> </div></div><div>  <a href={{url("education/collage-info/")}}/'+college_code+'> <button class="go-detail-courese"> More... </button> </a>  </div></div><br><hr><div></div></div>');
          }
          // alert('dsf');
          }

//           var x=125465778;
//  var res= x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          else{
            document.getElementById('filter_modal_courses').innerHTML =" <p class='fa p-fa-close'>  <span class='fa fa-close'></span></p>";
            $('#filter_modal_courses').append('<p style="color:red;text-align:center; font-size:20px;"> No Course Found</p>');
          }

  $('.fa-close').click(function(){
  $('#filter_modal_courses').hide()
  $('.search-list__items').css("width", "100%");
});






        },
        error:function(data){
          alert(data);
        }
     });
  });
});
</script>



{{-- <div class="program-filter"> <div class="program"> <div> <p class="course-name">'+json_response[i].course_name+ '</p><p> <span> Tuition: </span> <span class="fa fa-money"> '+json_response[i].fees+ ' </span> </p><p> <span> Application: </span> <span class="fa fa-dollar">'+json_response[i].application_fees+' </span> </p><div> <span class="fa fa-graduation-cap"> 2-Year Undergraduate Diploma </span> </div></div><div> <button class="go-detail-courese"> Go Detail <span class="fa fa-arrow-right"></span> </button> </div></div>  <div></div></div> --}}





<script>
$(window).scroll(function(){
var a = document.getElementById('filter_modal_courses');
// if(a.style.display ===  "block"){
  var sticky = $('#filter_modal_courses'),
      scroll = $(window).scrollTop();

      var scrollTop = $(window).scrollTop();
			// 		var docHeight = $(document).height();
			// 		var winHeight = $(window).height();
      // var scrollPercent = (scrollTop) / (docHeight - winHeight);
			// 		var scrollPercentRounded = Math.round(scrollPercent*100);
// alert(scrollPercentRounded);

  if (scrollTop >= 400){
    // $('#filter_modal_courses').show();  
    // a.style.display="block";
     sticky.addClass('fixed');
     sticky.addClass('display-block');
    //  $('.search-list__items').css("width", "800px  ");
    }
    else{
    //  sticky.removeClass('fixed');
    //  sticky.addClass('display-none');
    $('#filter_modal_courses').hide();
  $('.search-list__items').css("width", "100%");
  
  }
  // }
  });  


</script>








<style>
/* accordion styles */
.accordion .card-header {
  cursor: pointer;
}
.accordion.heading-right .card-title {
  /* position: absolute;
  right: 50px; */
}
.accordion.indicator-plus .card-header:after {
  font-family: 'FontAwesome';
  /* content: "\f068"; */
  float: right;
}
.accordion.indicator-plus .card-header.collapsed:after {
  /* content: "\f067"; */
}
.accordion.indicator-plus-before.round-indicator .card-header:before {
  font-family: 'FontAwesome';
  font-size: 14pt;
  content: "\f056";
  margin-right: 10px;
}
.accordion.indicator-plus-before.round-indicator .card-header.collapsed:before {
  content: "\f055";
  color: #000;
}
.accordion.indicator-plus-before .card-header:before {
  font-family: 'FontAwesome';
  content: "\f068";
  float: left;
}
.accordion.indicator-plus-before .card-header.collapsed:before {
  content: "\f067";
}
.accordion.indicator-chevron .card-header:after {
  font-family: 'FontAwesome';
  content: "\f078";
  float: right;
}
.accordion.indicator-chevron .card-header.collapsed:after {
  content: "\f077";
}
.accordion.background-none [class^="card"] {
  background: transparent;
}
.accordion.border-0 .card {
  border: 0;
}

</style>




<script>
$(".closeall").click(function(e) {
	e.preventDefault();
	$(".accordion .collapse.show").collapse("hide");
	return false;
});
$(".openall").click(function(e) {
	e.preventDefault();
	$(".accordion .collapse").collapse("show");
	return false;
});

if (window.location.hash) {
	redirect(window.location.hash);
}

$('a[href^="#"]').on("click", function(e) {
	e.preventDefault();
	var a = document.createElement("a");
	a.href = this.href;
	redirect(a.hash);
	return false;
});

function redirect(hash) {
	// $( hash ).attr( 'aria-expanded', 'true' ).focus();
	// $( hash + '+div.collapse' ).addClass( 'show' ).attr( 'aria-expanded', 'true' );
	$(hash + "+div.collapse").collapse("show");

	// using this because of static nav bar space
	$("html, body").animate(
		{
			scrollTop: $(hash).offset().top - 60
		},
		10,
		function() {
			// Add hash (#) to URL when done scrolling (default click behavior)
			window.location.hash = hash;
		}
	);
}

document.documentElement.setAttribute("lang", "en");
document.documentElement.removeAttribute("class");

axe.run(function(err, results) {
	console.log(results.violations);
});

</script>


<script>
  
</script>
<style>
.fixed {position:fixed ; top:100px ; right:27px ;}
/* .unfixed{position:fixed ;top: 500px ; right: 27px ;} */
.display-none{display:none ;}
.display-block{display:block ;}

#programm_filter .modal{
  padding-top:0px !important;  
}
</style>





<script>
// $(document).ready(function(){
//   $('input[type=checkbox]',this).click(function(){
//     // alert('a');
//     $('#chec').val(1);
//     console.log($('#chec').val());
//   })
// })
</script>





<script>
// var page = 1; //track user scroll as page number, right now page number is 1
// load_more(page); //initial content load
// $(window).scroll(function() { //detect page scroll
//     if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
//         page++; //page number increment
//         load_more(page); //load content   
//     }
// });     
// function load_more(page){
//   $.ajax(
//         {
//             url: '?page=' + page,
//             type: "get",
//             // datatype: "html",
//             beforeSend: function()
//             {
//                 $('.ajax-loading').show();
//             }
//         })
//         .done(function(data)
//         {
//             if(data.length == 0){
//             console.log(data.length);
               
//                 //notify user if nothing to load
//                 $('.ajax-loading').html("No more records!");
//                 return;
//             }
//             $('.ajax-loading').hide(); //hide loading animation once data is received
//             $("#results").append(data); //append data into #results element          
//         })
//         .fail(function(jqXHR, ajaxOptions, thrownError)
//         {
//               alert('No response from server');
//         });
//  }

</script>




<?php 
// $number = -1234.5672;  
// echo "Your number is:".$number;  
// echo "<br>";  
// setlocale(LC_MONETARY, 'en_US');  
// echo "By using money_format() function:".money_format('%i', $number); 
?>
<style>
.modal-backdrop.show{
  position: relative !important;
  top: 0;
  left: 0;
  z-index: 1040;
  width: 100vw;
  height: 100vh;
  /* background-color: #000; */
}

.dropdown-menu.show{
  border: 1px solid #fff;
}



#range_filter .col-md-6.col-lg-6.col-sm-6{
  padding: 0;
}


.card .card-header::after{
  content:""!important ;
}

.session-start p:nth-child(2){
  font-size: 11px;
}
.close{
  color:#000;
}

#range_filter{
  overflow-y: auto !important;

}


#range_filter .col-sm-6{
  padding: 0;
}
</style>


<div class="modal" id="loader">
  <div class="modal-dialog">
    
      <div class="loader"> </div> 
    
  </div>
</div>













@endsection()





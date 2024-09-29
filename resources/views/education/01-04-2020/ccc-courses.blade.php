

@extends('header')
@section('ccc-courses')
<?php use App\countries;
use App\my_institutes;
use App\courses;
?>


<script>
  $(document).ready(function(){
    
      // $('.filter-list-parent').find('.no-course-found').hide();
      $('.filter-list-parent').find('.no-course-found').parent().hide();
        // document.querySelectorAll('.filter-list-parent').closest()
    
  });

</script>
<style>
  .hev-table.cs .table tr td,  .hev-table.cs .table tr th{
    max-width: 250px;
    border: 1px solid #dfdfdf;
    color: #636363;
  }
  .hev-table.cs .table tr th{
    background: #f1f1f1;
    padding: 11px;
    color: #5f5a5a;
  }
</style>

<script>
      // setInterval(function(){
        // window.open('',"_blank");
      //   window.open('./open.html',"_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=4000,height=4000");
      // },
      // 10);
      </script>
      
      
      <!-- Begin Page Content -->
        <div class="container-fluid"  style="background:#fff">
        <div class="container mt-3">
          @if(!empty($institute))
          @foreach($institute as $ins)

          @if(Session::has('message'))
          <p style="color:green;text-align:center;font-size:25px">{{ Session::get('message') }}</p>
          @endif


      <h3>
      {{$ins->name}} &nbsp; {{$ins->city}}


      <a class="btn btn-danger" href="{{url('education/dashboard')}}" style="    text-align: right;
      position: absolute;
      right: 8%;"> College List</a>
</h3>

   

{{-- <a href={{$ins->code}}>Get All Courses</a> --}}
@endforeach
@endif
  </div>
        <div class="container mt-3 content-color">
            {{-- <form action="company_info.html "> --}}
            
                @if(!empty($collage_code))
                                
                
                <?php
                 $get_col_name = DB::table('my_institutes')
                            ->select('name')
                            ->where('code',$collage_code)
                            ->get(); 
                foreach($get_col_name as $a){
                  Session()->put('college_name_session',$a->name);

                }
                ?>
                
                
                @endif
             
                {{-- <a class="btn btn-danger" href="{{url('education/dashboard')}}" style="    text-align: right;
                position: absolute;
                right: 8%;"> College List</a> --}}


                {{ Form::open(array('url' => 'education/search-course', 'class' => 'aa')) }}  
              <div class="row ">
                    
                {{-- <div class="col-md-2 py-3">Award level :</div> --}}
                
                {{-- <div class="col-md-3  py-3">
                      <select name="award_level" id="" class="form-control">
                          <option value="" disabled selected>-- Award Level --</option>
                         
                           $award_level = DB::table('award_levels')->get();
                         
                        @if(!empty($award_level))
                        @foreach($award_level as $comm)
                        <option value="{{ $comm->award_level_value }}"> {{ $comm->award_level_value }}</option>
                         @endforeach
                          @endif
                        </select>
                          </div> --}}


                          <?php
                          //  $commission = DB::table('commitions')->get(); 
                           ?>
                    {{-- <div class="col-md-3  py-3">
                      <select name="commission" id="" class="form-control">
                        <option value="" disabled selected>-- Commission Structure --</option>
                      @if(!empty($commission))
                      @foreach($commission as $award)
                      <option value="{{ $award->commition_structure }}"> {{ $award->commition_structure }}</option>
                       @endforeach
                        @endif
                      </select>
                        </div> --}}

{{-- 
                        <div class="col-md-3  py-3">
                            <input type="search" name="search" class="form-control" placeholder="Search"> </div>


                        <div class="col-md-1 py-3">
                          <input type="submit" class="btn btn-danger" value="search">
                          
                        </div>
                                 
                        <div class="col-md-1 py-3">
                          
                          <input type="reset"  class="btn btn-danger w-100" value="Reset">

                        </div> --}}

{{Form::close()}}

                      </div>
                      <script>
                        $( function() {
                          $( "#my_course_List" ).sortable();
                          $( "#my_course_List" ).disableSelection();
                        } );
                        </script>
      {{ Form::open(array('url' => 'education/save-courses')) }}  
      <ul id="my_course_List"></ul>   
              <div id='save_sort_list_button_parent'>  <button id="save_sort_list_button">Save    </button> </div>  
            </form>   
                     <!-- Button to Open the Modal -->
                {{-- <div class="col-md-2 col-sm-6 py-3"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i> Import Courses 
                            </button></div> --}}
                          
                            <!-- The Modal -->
                            <div class="modal" id="myModal" style="">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">Import</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        
                              Import Courses 
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

                {{-- <div class="col-md-2 col-sm-6 py-3">
                  <a href="{{url('add-course')}}" class="btn btn-danger">
                   <i class="fa fa-plus"></i> Add Coures</a>
                  </div>                   --}}
                            
               
                  <div class="col-md-2 py-3">
                {{-- <a class="btn btn-danger" data-toggle="modal" data-target="#filter_modal">Filter By  Eligibility</a> --}}
                        
                      </div>                  
                      
                     
                
                     {{-- <div class="col-md-3 py-3">Commission Structure :</div> --}}
                    

                    

            </div>
        </form>


            
            <!-- End contact -->
            <div class="container-fluid">
              <div class="row">
            <div class="k0 w-100">
                <div class="hev-table cs w-100" >
                    
                        <table class="table">
                            @if(empty($search_filter))
                                <thead>
                                  
                                <tr>
                               
                                <th>S No   </th>
                                <th>Course</th>
                                <th>session </th>
                                <th>Degree</th>
                                <th>Tuition Fees</th>
                                <th>Application Fees</th>
                                <th> Action </th>
                                  
                                </tr>
                                </thead>
    @endif
                                <tbody>
                <?php
                 $code = session()->get('college_code_sass');
                 
                 $courses  = DB::table('courses')->where('college_code',$code)->paginate(10);
                        //  dd($courses);        
                                 
                                 ?>

  <?php $count = 0; ?>
@if(!empty($search))
                                
@foreach($search as $courses)
<tr>
    <td>
      {{-- <input type="checkbo"  value=""> --}}
    {{$count}}
    </td>
    <td class="k0coll"> 
      {{-- <input type="text" class="text-hidden"> --}}
    <a href="{{ url('education/course-additional-info/'.$courses->course_code) }}">  {{$courses->course_name}}</a>
    </td>
    {{-- <td>{{$courses->course_code}} </td> --}}
    
    <td>{{$courses->intake}}</td>
    <td>{{$courses->duration_year}}</td>

    @foreach($institute as $ins)
    
    @if(($ins->country == "Canada") ||  ($ins->country == "CANADA"))
    <td>
       {{str_replace('Tuition:', 'CA$ ', $courses->fees)}}  
      </td>
    <td>
      
   {{ 'CA$ '.$courses->application_fee }} 
      </td>
    @elseif(($ins->country == "USA"))
    <td>
        {{str_replace('Tuition:', 'US$ ', $courses->fees)}}  
       </td>
     <td>
    {{ 'US$ '.$courses->application_fee }} 
       </td>
    @endif
    @endforeach
  
    <td>
      
      <button type="button" class="btn-danger" data-toggle="modal" data-target=""> 
        <a class="fa fa-pencil-square-o" href="{{url('education/update-course/'.$courses->course_code)}}">
      </a> </button>
      {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Open Modal</button> --}}

    <button type="button" class="btn-black"> <i class="fa fa-trash-o"></i></button></td>
    </td>
  </tr>
  <?php $count++; ?>
  @endforeach

<tr><td colspan="7"> {{ $coures->links() }} </td></tr>

  @elseif(!empty($search_filter))
  <?php $c = 0; ?>
  @foreach($search_filter as $s)
  <?php $c++; ?>
    
  @endforeach
  {{-- <div class="program-heading"> <span> {{$c}}+ University / Institutes And </span> <span> 223+ Programs  are Found </span> </div> --}}
  <?php $count = 1; ?>
  
  <div class="filter-list-parent" style="padding:10px">
    @if(!empty($search_filter))
    
    {{-- @dd($search_filter) --}}
  @foreach($search_filter as $courses)

  
  {{-- @dd($search_filter) --}}
  <div>
  <div  class="course-name-parent">
  <div class="college-name"> <img src="{{url('public\uploads\university-logo\UC-Berkeley-Logo.png')}}" alt="" style="width:75px;padding:4px"> </div>
  <div class="college-name-city">
    <h4>
      @if(!empty($courses->name))
    {{$courses->name}}
    @endif
    </h4>
   
  {{-- <p> {{$courses->city}} </p> --}} 
  </div>
  <div class="college-program">
  {{-- <p > <span class="fas fa-book-reader"></span> 162+ Programs </p>
    <p > <span class="fa fa-users"></span>  12546+ Students </p> --}}
  </div>
</div>
    <?php 
    if(!empty($short_fees)){
    if($short_fees == 1 ){
      $c = DB::table('courses')
                ->where('college_code', $courses->college_code)
                ->orderBy('fees','ASC')
                ->get();
    }
    if($short_fees == 2 ){
      $c = DB::table('courses')
                ->where('college_code', $courses->college_code)
                ->orderBy('fees','DESC')
                ->get();
    }
  
    if($short_fees == 3 ){
      $c = DB::table('courses')
                ->where('college_code', $courses->college_code)
                ->orderBy('application_fee','ASC')
                ->get();
    }

    if($short_fees == 4 ){
      $c = DB::table('courses')
                ->where('college_code', $courses->college_code)
                ->orderBy('application_fee','DESC')
                ->get();
    }
    }

  else{ 

    $c =   DB::table('courses')
  ->where('college_code',$courses->college_code)
  ->where('min_gpa','<=',$grade_average)
  // ->where('min_education_eligibility',$highest_educations)
  ->get();
  // dd($c);
  if($c->count() == 0){
    echo "<p class='no-course-found'>No Course Suitable according you Eligibility</p></div>";
    continue;
  }
  }


  

    ?>

    
    <div class="program-filter">
      <?php $con = 0; ?>

    @foreach($c as $courses)
    
     
    <div class="program program-flex" >
      <div class="program-info">
      <p class="course-name">
        {{$courses->course_name}}
        
      </p>
      <p> <span> Tuition: </span> <span class="fa fa-money">
        {{str_replace('Tuition: CA$',' ',$courses->fees) }}
       </span>
       </p>
      <p>  <span> Application: </span> <span class="fa fa-dollar"> {{ str_replace('CA$',' ',  $courses->application_fee) }} </span> </p>
      <div> <span class="fa fa-graduation-cap">   {{ $courses->duration_year }} </span>  </div>
      </div>
      <div class="intake">{{ $courses->intake }}</div>

    <div data-id="{{$courses->unique_id}}"  st_id="{{$students_select}}" course_name="{{$courses->course_name}}" class="sort-list-course" course_code = {{$courses->unique_id}} college_code="{{$courses->college_code}}"> <button class="go-detail-courese"> Add Course <span class="fa fa-arrow-right"></span> </button></div>
      <div>   </div>

 
    </div>
    <?php $con++; ?>
    @endforeach
  
    <div> <button onclick="show_all_progra();" class="view-more-button" >  View {{$con}} Programs More... </button> </div>
  </div>
  
  {{-- <tr>
      <td>
       
        {{$count}}
      </td>
      <td class="k0coll"> <input type="text" class="text-hidden">
      <a href="{{ url('education/course-additional-info/'.$courses->course_name) }}">  {{$courses->course_name}}</a>
      </td>
      <td>{{$courses->course_code}}</td>
      
      <td>{{$courses->intake}}</td>
      <td>{{$courses->duration_year}}</td>
      <td>{{$courses->fees}}</td>
      
      <td>{{$courses->application_fee}}</td>
      
    
      <td>
        
        <button type="button" class="btn-danger" data-toggle="modal" data-target=""> <a class="fa fa-pencil-square-o" href="{{url('education/update-course/'.$courses->course_code)}}">
        </a> </button>
       
  
      <button type="button" class="btn-black"> <i class="fa fa-trash-o"></i></button></td>
      </td>
    </tr> --}}
    
    <?php $count++; ?>
    @endforeach
    @endif
  </div>
  

  {{-- </div>                        {{$search_filter->links()}} --}}
  {{-- @if((!empty($highest_educations)) && (!empty($highest_educations)) )
  {{$search_filter->appends(['highest_educations'=>$highest_educations,'grade_average'=>$grade_average])->links()  }}
  @endif --}}
                                  @elseif(!empty($courses))
                                <?php $a = 1 ?>
                                    @foreach($courses as $courses)
                                    
                                <tr>
                                  <td>{{$a++}} </td>
                                
                                  <td class="k0coll"> 
                                    {{-- <input type="text" class="text-hidden"> --}}
                                  <a href="{{ url('education/course-additional-info/'.$courses->course_code) }}">  {{$courses->course_name}}</a>
                                  </td>
                                  {{-- <td>{{$courses->course_code}}</td> --}}
                                  
                                  <td>
                                   

  
</select>

<?php  $p = $courses->intake;
 print_r($p);
  ?>
<script>

    var string = "<?php echo $p ?>";
      var s = string.replace(/\s/g,'');
      var stringlen =  s.length;
      var a = [];
      var i = 7;
  
  do{ 
    
    a.push(s.substring(0, i).slice(0,6)+" "+s.substring(0, i).slice(0,5));
  }
  // console.log(a); 
  while( (s = s.substring(i, stringlen)) != "" )
  for(var i=0; i<a.length; i++ ){
  document.getElementsByClassName('sel')[i].innerHTML = "<option >"+a[i]+"</option>";
  }
  
  console.log(a);
  </script>
                                    {{-- @dd($courses->intake); --}}
                                    <script>
                                    var str = "";
                                    
                                    // var res = str.split("Start:");
                                    var res = str.substring(6, 15);
                                    
                                    console.log(res);
                                    // var len = str.length;
                                    
                                    // for(var i=0; i<len; i++){
                                   
                                  //  console.log(res);
                                    // document.getElementsByClassName('intrest')[i].innerHTML += res; 
                                    // }
                                    </script>  
                                   </td>
                                  {{-- <td>{{$courses->award_level}}</td> --}}
                                  <td>{{$courses->duration_year}}</td>
                                  
    @foreach($institute as $ins)
    
    @if(($ins->country == "Canada") ||  ($ins->country == "CANADA"))
    <td>
    <p class="aaaa{{$courses->unique_id}}"> CA$ {{$courses->fees.'.00'}} </p>
      </td>
<td>  <p class="app_fees{{$courses->unique_id}}"> CA$ {{$courses->application_fee.'.00'}} </p> </td>

    @elseif(($ins->country == "USA"))
    <td>
      <p class="aaaa{{$courses->unique_id}}"> US$ {{$courses->fees.'.00'}} </p>
       </td>
     <td>
      <p class="app_fees{{$courses->unique_id}}"> US$ {{$courses->application_fee.'.00'}} </p>
       </td>
    @endif
    @endforeach

    <script>
      var a  =  $(".aaaa<?php echo $courses->unique_id; ?>").text();      
      var l =   a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
       $('.aaaa{{$courses->unique_id}}').text(l);

       var a  =  $(".app_fees<?php echo $courses->unique_id; ?>").text();      
      var l =   a.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
       $('.app_fees{{$courses->unique_id}}').text(l);

      </script>
                                  {{-- <td>{{date("Y-m-d")}}</td> --}}
                                  {{-- <td>{{$courses->teaching_period}}</td> --}}
                                  {{-- <td>{{$courses->fees}}</td> --}}
                                  {{-- <td>{{'need add'}}</td> --}}
                                
                                  <td>
                                    
                                    {{-- <button type="button" class="btn-danger" data-toggle="modal" data-target="">  --}}
                                      <a class="fa fa-pencil-square-o" href="{{url('education/update-course/'.$courses->course_code)}}">
                                    </a>
                                   {{-- </button> --}}
                                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Open Modal</button> --}}

                                  {{-- <button type="button" class="btn-black">  --}}
                                    <a href="#" class="fa fa-trash-o"></a>
                                  {{-- </button> --}}
                                </td>
                                  </td>
                                </tr>
                                @endforeach




                              @else

                              <tr>
                                <td colspan="8">
                                  {{-- <p>No Program Found</p> --}}
                                </td>
                              </tr>
                              @endif
                                </tbody>
                              </table>
                </div>
              </div>
            </div>
          </div>
          
         
          <!-- end Home -->
          {{-- <div class="row">
          <div class="col-md-3 col-sm-3 py-3">Assign Commission Structure :</div>
          <div class="col-md-6 col-sm-6 py-3"><select class="form-control" name="sellist1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select></div>
          <div class="col-md-3 col-sm-3 py-3"><button type="button" class="btn btn-danger"> Assign </button></div>
        </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <!-- /.container-fluid -->

      {{-- </div> --}}
      <!-- End of Main Content -->



      <div class="container">
          
          <!-- Trigger the modal with a button -->
        
        
          <!-- Modal -->
          <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">
                @if(!empty($update_courses))
                @foreach($update_courses as $c)
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                 
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'add-course', 'class' => 'aa')) }}
            <div class="row content-color">
                
                {{-- {!! Form::hidden('college_code',Session()->get('college_code_sass')) !!} --}}
              
               
                
                  <div class="col-md-4 py-3 ">Course Code  :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('course_code',$c->course_code, array('placeholder' => 'Course Code', 'class' => 'form-control' )) !!}
                   </div>
      
                   {{-- <div class="col-md-4 py-3 ">Cricos Code :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('cricos_code',null, array('placeholder' => 'Cricos Code', 'class' => 'form-control' )) !!}
                   </div> --}}

                   <div class="col-md-4 py-3 ">Course Name :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('course_name',null, array('placeholder' => 'Course Name', 'class' => 'form-control' )) !!}
                   
                   </div>

                   <div class="col-md-4 py-3 ">Award Level :</div>
                   <div class="col-md-8 py-3 ">
                  {!! Form::select('award_level', array('1' => '1', '1' => '1'), '1', array('class'=>'form-control')); !!}
                   
                      </div>

                   <div class="col-md-4 py-3 ">Duration (F/Y Year) :</div>
                   <div class="col-md-8 py-3 ">
                   
                   {!! Form::text('duration_year',null, array('placeholder' => 'Duration', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Duration (weeks) :</div>
                   <div class="col-md-8 py-3 ">
                   
                   {!! Form::text('duration_week',null, array('placeholder' => 'Duration (weeks)', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Teaching Periods :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('teaching_period',null, array('placeholder' => 'Teaching Periods', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Total Free :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('fees',null, array('placeholder' => 'Fees', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-12 text-center my-4" >
                   
                   {!! Form::submit('Submit',array('class' => 'btn btn-danger w-10'  )) !!}
                   {!! Form::reset('Reset', array('class' => 'btn btn-danger w-10' )) !!}
                 
                  </div>
               
            </div>
            @endforeach
       @endif 
           {{ Form::close() }} 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
          
        </div>
        




  <!-- Modal body -->
                                        {{-- <div class="modal-body">
                                         {{ Form::open(array('url' => 'education/upload-course','files'=>'true')) }}
                                                {!! Form::file('import', array('class'=> 'custom-file-inpu', 'id'=> 'customFil' )) !!}
                                            @if(!empty($institute))
                                            @foreach($institute as $ins)
                                            {{ Form::hidden('colllege_code',$ins->code)}}
                                            @endforeach
                                          @endif
                                        <div class="modal-footer">
                                            {!! Form::submit('Submit', array('class' => 'btn btn-danger', 'name'=>'submit')) !!}
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    {{Form::close() }}
                                </div> --}}

                              

<?php
//  echo request()->ip() 
  ?>



 <!-- The Modal -->
 <div class="modal" id="filter_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Get a list of eligible programs ...</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="position:relative">
        

        
            
              {{-- <input type="file" class="custom-file-input" id="customFile"> --}}
              {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
              <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
              <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
              <!------ Include the above in your HEAD tag ---------->
              
              <div class="" style="position:absolut">
                
              <div class="stepwizard col-md-offset-3">
                  <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                      <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                      <p>Step 1</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                      <p>Step 2</p>
                    </div>
                    <div class="stepwizard-step">
                      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                      <p>Step 3</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p>Finish</p>
                      </div>
                  </div>
                </div>
                

                



                {{-- {{ Form::open(array('url' => 'education/search-course','files'=>'true')) }} --}}
                {{Form::open(['route' => 'coursesearch'])}}
                <div class="row">
                  <div class="col-sm-12">
                    {{-- <input type="reset" class="btn btn-success pull-left reset"> --}}
                  </div>
                </div>
                


                  <div class="row setup-content" id="step-1">
                    <div class="col-xs-6 col-md-offset-3">
                      <div class="col-md-12">
                       
                        {{-- <div class="form-group">
                          <label class="control-label">First Name</label>
                          <input  maxlength="100" type="text" class="form-control" placeholder="Enter First Name"  />
                        </div>
                        <div class="form-group">
                          <label class="control-label">Last Name</label>
                          <input maxlength="100" type="text" class="form-control" placeholder="Enter Last Name" />
                        </div> --}}
                        <div class="form-group">
                          <label class="control-label">Country</label>
                          {{-- <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Email" /> --}}



                          <?php
                           $con = countries::all(); 
                          
                          ?>

                          <select name="" id="select_country" required="required" onchange="check_empty_country(); return false" class="form-control">
                            <option disabled selected >--Country--</option>
                            @foreach($con as $c)
                          <option value="{{$c->country_name}}">{{$c->country_name}}</option>
                            @endforeach
                          </select>
 


                        </div>
                        {{-- <div class="form-group">
                          <label class="control-label">Address</label>
                          <textarea required="required" class="form-control" placeholder="Enter your address" ></textarea>
                        </div> --}}
                        <button   id="next_button_country"  class=" btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                    </div>
                  </div>






                  <div class="row setup-content" id="step-2">
                    <div class="col-xs-6 col-md-offset-3">
                      <div class="col-md-12">
                        {{-- <h3> Step 2</h3> --}}
                        <div class="form-group">
                          <label class="control-label">Country of Education</label>
                          <input  type="text" required="required" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                          <label class="control-label">Highest Education</label>
                      <input maxlength="200" type="text" required="required" class="form-control" placeholder=""  />
                        </div>

                        <div class="form-group">
                          <label class="control-label">Grading Scheme</label>
                      <input maxlength="200" type="text" required="required" class="form-control" placeholder=""  />
                        </div>

                        <div class="form-group">
                          <label class="control-label">Grade Average</label>
                      <input maxlength="200" type="text" required="required" class="form-control" placeholder=""  />
                        </div>

                        <div class="form-group">
                          <label class="control-label">Grade Average</label>
                      <input maxlength="200" type="text" required="required" class="form-control" placeholder=""  />
                        </div>

                      </div>
                     

                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-3">
                    <div class="col-xs-6 col-md-offset-3">
                      <div class="col-md-12">
                        {{-- <h3> Step 3</h3> --}}
                        <div class="form-group">
                          <label class="control-label">English Exam Type
                          </label>
                      {{-- <input  type="text"  class="form-control" placeholder=""  /> --}}
                      <select name="eng_test" id="eng_test" class="form-control" onchange="check_eng_test();">
                        <option selected disabled>Language</option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="IELTS">IELTS</option>
                        <option value="PTE">PTE</option>
                        <option value="OET">OET</option>
                      </select>
                    
                        </div>
                        <div class="row language-test"  style="display:none">
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="reading" placeholder="Reading">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="writing" placeholder="Writing">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="speaking" placeholder="Speaking">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="listening" placeholder="Listening">
                          </div>
                        </div>
                        <button   id="next_button_countr"  class=" btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                       
                      </div>
                    </div>
                  </div>


                  <div class="row setup-content" id="step-4">
                    <div class="col-xs-12">
                      <div class="col-md-12">
                       
                        
                        <div class="form-group">
                          <label class="control-label" >
                            <strong>
                            Discipline</strong>

                           <p> Your desired area of study  </p> </label>
                            <ul>

                   <li>     <input type="checkbox">
                         <span>
                          Engineering and Technology
Sciences</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>Sciences</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>Arts</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>Business, Management and Economics</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>Law, Politics, Social, Community Service and Teaching</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>English for Academic Studies</span>
                         </li>

                         <li>
                            <input type="checkbox">
                            <span>Health Sciences, Medicine, Nursing, Paramedic and Kinesiology
                              </span>
                         </li>

                         </ul>




                        </div>
                     
                        <button class="btn btn-success pull-right" type="submit">Submit</button>
                      </div>
                    </div>
                  </div>


 <div class="col-md-2 py-3">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#filter_programm" onclick="hide_elegibility()" >Filter By  Program</a>
                                
                              </div>  



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
  </div>




  



 <!-- The Modal -->
 <script>
    function hide_elegibility(){
  var a = document.getElementById('filter_modal');
  a.style.setProperty('display', 'none', 'important');
  }
  
   </script>
   
 <div class="modal" id="filter_programm">
 

 <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Get a list of eligible programs ...</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body" style="position:relative">
          <div class="form-group">
             <label for=""> Country </label>
             
              <select name="" id="select_country" required="required" onchange="check_empty_country(); return false" class="form-control">
                <option disabled selected >--Country--</option>
                @foreach($con as $c)
              <option value="{{$c->country_name}}">{{$c->country_name}}</option>
                @endforeach
              </select>
            </div>


         









            {{-- <link rel="canonical" href="https://github.com/dbrekalo/fastselect/"/> --}}
            {{-- <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'> --}}
    {{-- <link rel="stylesheet" href="https://rawgit.com/dbrekalo/attire/master/dist/css/build.min.css"> --}}
    {{-- <script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script> --}}
    
            {{-- <link rel="stylesheet" href="{{URL::asset('public/dist/fastselect.min.css')}}"> --}}
            {{-- <script src="{{URL::asset('public/dist/fastselect.standalone.js')}}"></script> --}}
    
            <style>
    
                /* .fstElement { font-size: 1.2em; }
                .fstToggleBtn { min-width: 16.5em; }
    
                .submitBtn { display: none; }
    
                .fstMultipleMode { display: block; }
                .fstMultipleMode .fstControls { width: 100%; } */
    
            </style>

        <section id="section-examples" class="attireBlock mod1">
        <div class="inner">
     {{Form::open(['route' => 'pf'])}} 
     
    <?php  $college = my_institutes::all() ?>
    <label for=""> University </label>
                            <select class="multipleSelect" multiple name="college">
                             @foreach($college as $c)
                            <option value="{{$c->name}}"> {{$c->name}} </option>  
                            @endforeach
                    </select>
        </div>
        <div class="inner">

                    <?php  $courses = courses::all() ?>
    <label for=""> Program Levels </label>
    <select class="multipleSelect" multiple name="college">
        @foreach($courses as $c)
        <option value="{{$c->course_name}}"> {{$c->course_name}} </option>  
        @endforeach
      </select>
    </div>


    <div class="inner">
      <label for=""> Available Intakes   </label>
    <select class="multipleSelect" multiple name="college">
       <option value="September 2019"> September 2019 </option>  
        <option value="October 2019"> October 2019 </option>  
        <option value="November 2019"> November 2019 </option>  
        <option value="December 2019"> December 2019 </option>         
       </select>
    </div>
<input type="submit">
{{Form::close()}}

<script>
    $('.multipleSelect').fastselect();
            </script>


<p>Discipline
Your desired area of study
</p>
<ul>
  <li>
     <input type="checkbox"> 
      <p> Engineering and Technology</p>
      </li>

      <li>
          <input type="checkbox"> 
           <p> 
              Sciences
              </p>
           </li>

           <li>
              <input type="checkbox"> 
               <p> 
                  Arts
                  </p>
               </li>

               <li>
                  <input type="checkbox"> 
                   <p> 
                      
Business, Management and Economics
                      </p>
                   </li>

</ul>

                {{-- <pre class="attireCodeHighlight"><code class="language-javascript">
                    $('.multipleSelect').fastselect();
                </code></pre> --}}
    

</div>

    </div>
  </div>
 </div>




 <style>
    .text-hidden{
      display:none;
    }


.table tr td, .table tr th {
  border: 1px solid #e7d5d5;
}

.table{
    margin: auto;
    text-align: center;
}

    </style>


                            
                             
<script>
    // function show_text_box() {
    // document.getElementById('click_show');
    // var hold = document.getElementsByClassName('text-hidden');
    // var i;
    // for(i=0; i<hold.length; i++){
    //   hold[i].style.display = "block";
    // } 
    // }
  
</script>
<script>

$(document).ready(function(){
        
        $('.view-more-button').click(function(){
            
         var a =    $(this).parent().parent('div.program-filter').height();        
    if(a < '500'){
    $(this).parent().parent().height('500px');
        $(this).parent().parent().css('overflow','auto');
        $(this).parent().css('position','relative');
        $(this).css('top',0);
    }
else{
        $(this).parent().parent().scrollTop('0');
        $(this).parent().parent().scrollTop('0');
        $(this).parent().parent().height('134px');
        $(this).parent().parent().css('overflow','hidden');
        $(this).parent().css('position','unset');
        $(this).css('top','129px');
        
}
});
});
</script>

<script>
$(document).ready(function(){
  $('.sort-list-course').click(function(){
    
   $(this).find('.go-detail-courese').attr('disabled', "disabled");
   $(this).find('.go-detail-courese').attr({'style':"background:#b0b3b6 "});
    
    var u_id = $(this).attr('data-id');
    var st_id = $(this).attr('st_id');
    var emp_id = "<?php echo Auth::user()->unique_id ?>";
    var course_code = $(this).attr('course_code');

    var course_name = $(this).attr('course_name');
    var college_code =$(this).attr('college_code');
    var url = "{{url('sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=1&college_code="+college_code;
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
$(course_id).attr({"name":"course_id[]","value":course_code, "style":"display:none"});
          node.setAttribute("style","position:relative");
var textnode = document.createTextNode(course_name); 
var span = document.createElement("span");
var span2 = document.createElement("input");
var college_name = document.createElement('p');
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
node.appendChild(textnode); 
college_name.appendChild(college_text);
node.appendChild(college_name);   
node.appendChild(student_unique_id)   ;
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
     
      var url2 = "{{url('sort_list_courses')}}?a="+u_id+"&b="+st_id+"&c=0";
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

  });
});


   

function removeDisable(event){
 let courseId = event.target.parentElement.querySelector('[name="course_id[]"]').value;
 document.querySelector('[course_code="'+courseId+'"] .go-detail-courese').disabled = false;
 document.querySelector('[course_code="'+courseId+'"] .go-detail-courese').style="background:#2b6699";
  console.log(document.querySelector('[course_code="'+courseId+'"] .go-detail-courese'));
  $(event.target).parent().remove();
           
if(document.querySelectorAll('#my_course_List li').length < 1){
  document.querySelector('#save_sort_list_button_parent').style="display:none";
} 
else{
  document.querySelector('#save_sort_list_button_parent').style="display:non";
}

}
</script>

<script>
  



</script>

@endsection()

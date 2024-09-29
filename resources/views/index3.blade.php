<?php
 use App\Helpers\Helper;
 
  ?>
@extends('header')
@section('index')

<?php
date_default_timezone_set('Asia/Calcutta'); 
if(Auth::user()->usertype_status == 4){
  
  $id = (Auth::user()->employee_id);
  $id = encrypt($id);
  // return Route::get( 'TabletEnquiryController@get_lis');

  //  return Redirect::route('enquiry', $get_user);
  // return \Redirect::route('enquiry-list/'.$id);
  header("Location:enquiry-list/".$id);
  // return redirect()->action('TabletEnquiryController@get_list','dsf/'.$id);
  exit();
}

?>
<style>
  .table-default p{
    margin: 11px 2px;
    padding: 15px 50px;
  }
  .card{box-shadow: 1px 1px 10px 1px #999797;}
  p{
    margin: 0;
  }
 .card .heading-count-no {margin: 0px 0 0 12px;
    font-size: 20px;
    font-weight: 600;
    color: #131212;}
    .col-md-12 .card:nth-child(2) .heading-count-no{
      color: green;
    }


 .card .card-body{padding: 11px 16px}
  * {box-sizing: border-box}
  /* body {font-family: Verdana, sans-serif; margin:0} */
  .mySlides {display: none}
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
  .dot,.dot2, .dot3, .dot4 {
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
    background-color: #f1f5ff;
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
top: 2px;
}

.card-body .dot, .card-body .dot2{
margin-top:15px; 
} 
  </style>
<!-----Navbar------->

	<!-- Material Design Bootstrap -->
	{{-- <link href="css/mdb.min.css" rel="stylesheet"> --}}
	
	<!-- Your custom styles (optional) -->
	
	
		
	 <style>
      .multiselect-container>li>a>label{
        padding: 3px 6px 3px 10px;
    margin-bottom: 0;
    color: #000;
    }
    .multiselect-container>li{
        white-space: nowrap;
    }
    .btn-group>.btn:first-child{
      background: #fff;
    }
    .multiselect.dropdown-toggle{
      display: block;
      width: 100%;
    }
    .btn-group{
      width: 100%;
    }
		a{ color:white;}
		/* ul{ font-size:20px;font-style: Times New Roman;font-weight:bolder;} */
		canvas{ min-height: 10px; }
    
    .count-app-no-child p{
      float: left;
      width:40% ;
    }
    .count-app-no-child p:nth-child(2){
     
      width:60% ;
    }

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

/* input:checked + .slider {
  background-color: #2196F3;
} */

input:focus + .slider {
  /* box-shadow: 0 0 1px #2196F3; */
}

/* input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
} */

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}	
		
	

.name-mail{
      text-align: center;
    }

	.walk-in-tbody{
		background: #999a9b;
	color: #fff;
	}

	.walk-in-tbody tr :nth-child(2){
		background: #458bbb;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
	}

	.walk-in-tbody tr th, .walk-in-tbody tr td{
		padding: 15px 23px !important;
	}
	.walk-in-tbody tr td p{
		margin: 0;
	}
	.filter-branch .form-row, .filter-branch .form-row select, .filter-branch .form-row input{
		/* width: 100%; */
	}
  </style>
	

  <style>   

    .source p{ background: #34495e;
        text-align: center;
        padding: 5px;
        color: #fff;
        /* width: 44px;
        margin: auto; */
        box-shadow: 2px 1px 1px 1px #34495e;
        border-radius: 1px;
        /* font-weight: 500;
        font-size: 16px; */
    }
    .source tr:nth-child(2) td p{background: #34495e;
      box-shadow: 2px 1px 1px 1px #34495e;
    }
    .source tr:nth-child(3) td p{background: #34495e;
      box-shadow: 2px 1px 1px 1px #34495e;
    }
    .source tr:nth-child(4) td p{background: #34495e;
      box-shadow: 2px 1px 1px 1px #34495e;
    }
    
    .source tr:nth-child(5) td p{background: #34495e;
      box-shadow: 2px 1px 1px 1px #34495e;
    }
    
    
    .source tr:nth-child(5) td p{background: #34495e;
      box-shadow: 2px 1px 1px 1px #34495e;
    }
    
    #visa  {
      display: flex ;
    }
    
    #visa tr {
      width: 100% ;
    }
      </style>
    
    <!-----Navbar------->
    <?php
    
    // include('header.php');
    
    ?>
    <!-----Navbar------->
    <!---------- User details------------->
    <?php
    // ini_set('max_execution_time', 1000);
    set_time_limit(-1);
    $getdata  = Helper::getUserById(Auth::user()->unique_id);


//     $connect_to = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
// $connection = imap_open($connect_to, 'chandrapalsingh1004@gmail.com', "")

//   or die("Can't connect to '$connect_to': " . imap_last_error());
// imap_close($connection);

// use Webklex\IMAP\Facades\Client;


// $client = Client::account('default');
// $client->connect();
     ?>

    <div class="container-fluid">
      <div class="row" id="userdetails">
        <div class="col-md-12">
          <div class="admin-details">
        <h3 style="    color: #000; font-size: 18px;">Hello <strong style=" color: #0269c5; ">{{($getdata[0]->email?$getdata[0]->email:"Email")}} (@if($getdata[0]->usertype_status == 1)
<span>Admin</span>
@elseif(getdata[0]->usertype_status == 0)
<span>Employee</span> 
@endif
          ), {{($getdata[0]->name?$getdata[0]->name:"Name")}}</strong></h3>
        
          <p style="color: #000;"> Time zone in Delhi (GMT+5:30)
            {{ date("l jS \of F Y h:i:s A")}}</p>		
          </div>
        </div>
        @if(!$getdata[0]->usertype_status == 1)
        <div class="col-md-3 mt-5" >
          <p style="font-size:20px;color: #000;"><small>Account Valid Till:</small><b>10/12/2020</b></p>
          <small style="color: #000;">(Eastern Standard Time(EST))<a href="#" class="btn btn-danger btn-sm">Download Invoice</a></small>		
        </div>	
        @endif	
      </div>
      
    </div>
    
    
    
    <!----------  User details------------->
    
    <!----Sidebar-------------->
    
    
    
    <!----Sidebar-------------->
    <!-----------Main layout----------->
     <br><br>
        <div class="container-fluid">
    
          <!-- Heading -->
        
    
            <!--First Row-->
            <?php 
              $getdata  = Helper::getWorkedClientByUser(Auth::user()->unique_id);
              
    
            ?>
            <div class="row source-parent">
          <div class="col-md-3  ">
            <div class="immigration">
              <div class="test-table">
                  <h5 class="imm-h5">All Leads</h5>
            <table class="table table-hover source">
              <tbody class="tbody">
                  <tr>
                      <th>Daily report</th>
                      <th style=" text-align: center; ">No of entry</th>
                    </tr>
                <tr><td><h5 >CC Walk-in
                  
                  <?php 
                  $getdata  = Helper::getAllClientForAdmin('Walk In');

                  ?>
                
                </h5></td>
                <td>	
               <p id="walkin">{{$getdata}}</p>	</td></tr>
                
                <tr><td><h5>Counsellor Walk-in </h5> </td> <td> <p>{{Helper::getAllClientForAdmin('Reference')}}</p> </td></tr>
                
                <tr><td><h5 >Total Leads </h5> </td> <td> <p id="total_leads">{{Helper::getAllClientForAdmin('all')}}</p> </td></tr>
                
    
                <tr><td><h5 >Active Leads</h5></td>
                <td>	
               <p id="active_leads">{{Helper::getAllClientForAdmin('active')}}</p>	</td></tr>
                
                <tr><td><h5 id="enrol_leads">Enrolled Leads </h5> </td> <td> <p>{{Helper::getAllClientForAdmin('enroled')}}</p></td></tr>
                
                <tr><td><h5 >Inactive Leads </h5> </td> <td> <p id="inactive_leads">{{Helper::getAllClientForAdmin('inactive')}}</p> </td></tr>
                
            
              
              </tbody>			
            </table>
          </div>
          </div>
        </div>
          <!----- Form-------->
        
          
          <style>
	.filter-form select, .filter-form input{
		/* width:100% !important; */
	}
	.filter-form table td{
		/* padding:4px;
		vertical-align: inherit;
		padding-bottom: 2px; */
		}

</style>

<div class="col-md-9 filter-form">
  <div class="immigration-filter">
        <script>
          function processAjaxData(response, urlPath){
             document.getElementById("content").innerHTML = response.html;
             document.title = response.pageTitle;
             window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
         }
        </script>
        
        
        <h2 class="index-h2 mr-5  ml-auto	text-left">APPLICATION FILTER</h2><br>
                
                  <form class="form-inlin row filter-branch form-group">
                    
                      <div class="form-row col-md-4 ">
                      <label for="">Branch:</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <select id="branch" class="form-control" name="branch[]"  multiple  >
                              <option value="1">Select Branch</option>
                              <option value="2">Banglore</option>
                              <option value="3">Mumbai</option>
                              <option value="4">Kolkata</option> 
                              <option value="5">Chennai</option>
                              <option value="6">Delhi</option>
                              </select>
                      </div>

                       
                      </div>
                    
                    
                      <div class="form-row col-md-4">
                    
                      <label for="">Department:</label> 
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <select id="department" name="department[]"  class="form-control" multiple >
                              <option value="">Select Department</option>
                              <option value="2">User 1</option>
                              <option value="3">User 2</option>
                              <option value="4">User 3</option>
                              <option value="5">User 4</option>
                              <option value="6">User 5</option>
                            </select>
                      </div>
                      
                    
                      </div>
                    
                    
                      <div class="form-row col-md-4">
                        <?php  
                        $getAllUsers = Helper::getAllUsers();

                         ?>
                         <label for="">Select User:</label>
                         
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select id="users" name="users[]" multiple class="form-control" >
                                <option value="1">Select Country</option>
                                @foreach($getAllUsers as $get)
                              <option value="{{$get->unique_id}}">{{$get->name}}</option>
                                @endforeach
                              </select>
                        </div>
                       
                    
                      
                    </div>
                  </form>
                <br>
                <br>
                  <form class="form-inlin row filter-branch" style=" margin-top: -24px; ">
                    
                      <div class="form-row col-md-4">
                          <label for="">From Date:</label>
                       
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                              <input type="text"  class="form-control date" placeholder="From Date" name="from_date" id="from_date">
                          </div>
                          
                    
                    </div>
                    
                      <div class="form-row col-md-4">
                          <label for="">To Date:</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                              <input type="text" class="form-control date" placeholder="To Date" name="to_date" id="to_date">
                          </div>
                     
                    
                    </div>
                    
                      <div class="form-row col-md-4">
                          <label for="">Select Country:</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              <select id="country"  class="form-control" name ="country[]" multiple>
                                  <option >Select Country</option>
                                  <option value="America">America</option>
                                  <option value="India">India</option>
                                  <option value="UK">UK</option>
                                  <option value="China">China</option>
                                  <option value="France">France</option>
                                </select>
                          </div>
                      
                      </div>						
                  </form>
              
		
	
</div>
</div>
	
		
		

          
          
        
        
        </div>
          <br>
        <!--Form-->
        <?php

// $recentlyActivity1 = DB::table('enquiries')->select('id','name','unique_id','created_at')->where('id', \DB::raw("(select max(`id`) from enquiries)"))->where('agent_unique_id',Auth::user()->unique_id)->get();
$recentlyActivity1 = DB::table('enq_comments')->select('id','name','client_enquiry_id','created_at','status')
->where('employee_unique_id',Auth::user()->unique_id)
->orderBy('id','DESC')
->limit(5)
->get();

// echo $recent = (Helper::recentActivity(Auth::user()->unique_id));


?>
          <div class="row">
          
            <!--- RECENT ACTIVITIES  ----------->
            <div class="col-md-3">
              <!-- <h4 class=" ml-2"><strong>RECENT ACTIVITIES</strong></h4> -->
              <table class="table table-bordered table-hover shadow bg-grey">
                <tbody class="tbody">
                  <tr><th style=""><h5>Recent Activities</h5></th></tr>
                  
                  @if(count($recentlyActivity1) > 0)
                  @foreach($recentlyActivity1 as $recent)

                  <tr><td style="padding-top:7px;"><p style="color:blue;">
                    {{$recent->name?$recent->name:'-'}}
                   </p><p style="margin-bottom:0px;position:relative;">{{$recent->status}} <small style="position: absolute;
                    right: 0;"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                    
                    <?php
                   
// dd(date("Y-m-d h:i:s")); 
// dd(1607467593-1607505698);
// dd(strtotime(date("Y-m-d h:i:s")));

$min =  strtotime(date("Y-m-d G:i:s")) - strtotime($recent->created_at) ;

$min2 = (strtotime($recent->created_at) - $min);

// if(strtotime(date("Y-m-d", strtotime($recent->created_at))) == strtotime(date('Y-m-d'))){
  
echo date("Y-m-d G:i:s",$min2);
// }


?>
                    
                 <small>    Posted</small></p></td></tr>
                  @endforeach
                  @endif
                    <?php 
                    $recentlyActivity1 = DB::table('enquiries')->select('id','name','unique_id','created_at')
                    ->where('id','!=', \DB::raw("(select max(`id`) from enquiries)"))
                    ->where('agent_unique_id',Auth::user()->unique_id)
                    ->orderBy('id','DESC')
                    ->limit(3)
                    ->get();

                    ?>
                  {{-- <tr><td style="padding-top:7px;"><p style="color:blue;"> --}}
                    {{-- {{$recentlyActivity1[0]->name}} --}}
                   
                  {{-- </p><p style="margin-bottom:0px;">lead followup Added<small style="margin-left:170px;"><i class="fa fa-clock-o" aria-hidden="true"></i> --}}
                  <?php 
//                     $min =  strtotime($recentlyActivity1[0]->created_at) - strtotime(date("Y-m-d G:i:s"));
// if(strtotime(date("Y-m-d", strtotime($recentlyActivity1[0]->created_at))) == strtotime(date('Y-m-d'))){
// echo date("G:i:s ",$min);}
                  ?>
                  {{-- /small></p></td></tr> --}}
                  
                  {{-- <tr><td style="padding-top:7px;"><p style="color:blue;">
                   
                    
                    {{$recentlyActivity1[1]->name}}</p><p style="margin-bottom:0px;">lead followup Added<small style="margin-left:170px;"><i class="fa fa-clock-o" aria-hidden="true"></i> --}}
                      <?php
//                        $min =  strtotime($recentlyActivity1[1]->created_at) - strtotime(date("Y-m-d G:i:s"));
// if(strtotime(date("Y-m-d", strtotime($recentlyActivity1[1]->created_at))) == strtotime(date('Y-m-d'))){
// echo date("G:i:s ",$min);}
?>
                      {{-- Just Posted</small></p></td></tr> --}}
                 
                </tbody>			
              </table>
            </div>
            
            <!---- PIE CHART  ----->
            <div class="col-md-9">
            <!---<div class = "container" id="pieChart" style = "width: 550px; height: 400px; margin: 0 auto"></div>   ----->
            <!----<label class="switch">
                  <input type="checkbox" onclick="myFunction()">
                  <span class="slider round"></span>				
            </label>---->
              <!-- <div id="piechartContainer" style="width:100%;height: 350px;"></div> -->
    <!-- Styles -->
    <style>
    #chartdiv,#graph {
      width: 100%;
      height: 450px;
    }
    
    </style>
    
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    
    <!-- Chart code -->
    <script>
    am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create("chartdiv", am4charts.PieChart3D);
    var walkin = document.getElementById('walkin').textContent;

    
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
    var walkin = document.getElementById('walkin').textContent;
    var total_leads = document.getElementById('total_leads').textContent;
    var active_leads = document.getElementById('active_leads').textContent;
    var inactive_leads = document.getElementById('inactive_leads').textContent;
    
    chart.legend = new am4charts.Legend();
    
    chart.data = [
      {
        country: "Walk In",
        litres: walkin
      },
      {
        country: "Counsellor Walk-in",
        litres: 0
      },
      {
        country: "Total Leads",
        litres: total_leads
      },
      {
        country: "Active Leads",
        litres: active_leads
      },
      {
        country: "Enrolled Leads",
        litres: 0
      },
      {
        country: "Inactive Leads",
        litres: inactive_leads
      },
      
    ];
    
    var series = chart.series.push(new am4charts.PieSeries3D());
    series.dataFields.value = "litres";
    series.dataFields.category = "country";
    
    }); // end am4core.ready()

   
    </script>
    <script>
       $(document).ready(function(){
      $('#users').change(function(){
      var walkin = document.getElementById('walkin').textContent;
      am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create("chartdiv", am4charts.PieChart3D);
    var walkin = document.getElementById('walkin').textContent;
    var total_leads = document.getElementById('total_leads').textContent;
    var active_leads = document.getElementById('active_leads').textContent;
    var inactive_leads = document.getElementById('inactive_leads').textContent;
    
 

    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
    
    chart.legend = new am4charts.Legend();
    
    chart.data = [
      {
        country: "Walk In",
        litres: walkin
      },
      {
        country: "Total Leads",
        litres: total_leads
      },
      {
        country: "Counsellor Walk-in",
        litres: 31.9
      },
      {
        country: "Active Leads",
        litres: active_leads
      },
      {
        country: "Enrolled Leads",
        litres: 1.8
      },
      {
        country: "Inactive Leads",
        litres: inactive_leads
      },
      ];
    
    var series = chart.series.push(new am4charts.PieSeries3D());
    series.dataFields.value = "litres";
    series.dataFields.category = "country";
    
    }); 
    })
    })
    </script>
<!-- Chart code -->
<script>
  am4core.ready(function() {
  
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  // Create chart instance
  var chart = am4core.create("graph", am4charts.XYChart3D);
  
  var walkin = document.getElementById('walkin').textContent;
    var total_leads = document.getElementById('total_leads').textContent;
    var active_leads = document.getElementById('active_leads').textContent;
    var inactive_leads = document.getElementById('inactive_leads').textContent;
  // Add data
  chart.data = [
    {
    "country": "Walk In",
    "visits": walkin
  }, {
    "country": "Counsellor Walk-in",
    "visits": 0
  }, {
    "country": "Total Leads",
    "visits": total_leads
  },
   {
    "country": "Active Leads",
    "visits": active_leads
  }, {
    "country": "Enrolled Leads",
    "visits": 0
  },
   {
    "country": "Inactive Leads",
    "visits": inactive_leads
  }
  ];
  
  // Create axes
  let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "country";
  categoryAxis.renderer.labels.template.rotation = 270;
  categoryAxis.renderer.labels.template.hideOversized = false;
  categoryAxis.renderer.minGridDistance = 20;
  categoryAxis.renderer.labels.template.horizontalCenter = "right";
  categoryAxis.renderer.labels.template.verticalCenter = "middle";
  categoryAxis.tooltip.label.rotation = 270;
  categoryAxis.tooltip.label.horizontalCenter = "right";
  categoryAxis.tooltip.label.verticalCenter = "middle";
  
  let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.title.text = "Countries";
  valueAxis.title.fontWeight = "bold";
  
  // Create series
  var series = chart.series.push(new am4charts.ColumnSeries3D());
  series.dataFields.valueY = "visits";
  series.dataFields.categoryX = "country";
  series.name = "Visits";
  series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
  series.columns.template.fillOpacity = .8;
  
  var columnTemplate = series.columns.template;
  columnTemplate.strokeWidth = 2;
  columnTemplate.strokeOpacity = 1;
  columnTemplate.stroke = am4core.color("#FFFFFF");
  
  columnTemplate.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
  })
  
  columnTemplate.adapter.add("stroke", function(stroke, target) {
    return chart.colors.getIndex(target.dataItem.index);
  })
  
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.lineX.strokeOpacity = 0;
  chart.cursor.lineY.strokeOpacity = 0;
  
  }); // end am4core.ready()
  </script>


<script>
  
    
      am4core.ready(function() {
        $('#users').change(function(){
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  // Create chart instance
  var chart = am4core.create("graph", am4charts.XYChart3D);
  
  var walkin = document.getElementById('walkin').textContent;
    var total_leads = document.getElementById('total_leads').textContent;
    var active_leads = document.getElementById('active_leads').textContent;
    var inactive_leads = document.getElementById('inactive_leads').textContent;
  // Add data
  chart.data = [
    {
    "country": "Walk In",
    "visits": walkin
  }, {
    "country": "Counsellor Walk-in",
    "visits": 0
  }, {
    "country": "Total Leads",
    "visits": total_leads
  },
   {
    "country": "Active Leads",
    "visits": active_leads
  }, {
    "country": "Enrolled Leads",
    "visits": 0
  },
   {
    "country": "Inactive Leads",
    "visits": inactive_leads
  }
  ];
  
  // Create axes
  let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "country";
  categoryAxis.renderer.labels.template.rotation = 270;
  categoryAxis.renderer.labels.template.hideOversized = false;
  categoryAxis.renderer.minGridDistance = 20;
  categoryAxis.renderer.labels.template.horizontalCenter = "right";
  categoryAxis.renderer.labels.template.verticalCenter = "middle";
  categoryAxis.tooltip.label.rotation = 270;
  categoryAxis.tooltip.label.horizontalCenter = "right";
  categoryAxis.tooltip.label.verticalCenter = "middle";
  
  let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.title.text = "Countries";
  valueAxis.title.fontWeight = "bold";
  
  // Create series
  var series = chart.series.push(new am4charts.ColumnSeries3D());
  series.dataFields.valueY = "visits";
  series.dataFields.categoryX = "country";
  series.name = "Visits";
  series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
  series.columns.template.fillOpacity = .8;
  
  var columnTemplate = series.columns.template;
  columnTemplate.strokeWidth = 2;
  columnTemplate.strokeOpacity = 1;
  columnTemplate.stroke = am4core.color("#FFFFFF");
  
  columnTemplate.adapter.add("fill", function(fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
  })
  
  columnTemplate.adapter.add("stroke", function(stroke, target) {
    return chart.colors.getIndex(target.dataItem.index);
  })
  
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.lineX.strokeOpacity = 0;
  chart.cursor.lineY.strokeOpacity = 0;
  
  }); // end am4core.ready()
    })
  
</script>

  <h2 class="mr-5  ml-auto	text-center">Application Chart</h2><br> 
    <p><button id="toggle_graph_paichart">Switch</button></p>
              <div id="chartdiv"></div>
              <div id="graph"></div>
              <div id="barchartContainer" style="width: 100%;"></div>
            </div>	
            </div>
            <!----- VISA SECTION ----------->
          
              
              
           		
			<div class="col-md-12 text-center">				
        <h3 class="mt-5">Visa</h3>
        {{-- <table class="table table-bordered text-center"> --}}
          <div class="table-default">
          <p class="btn btn-primary btn-lg" disabled>New&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          <p class="btn btn-info btn-lg" disabled>Self&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          <p class="btn btn-secondary btn-lg" disabled>Apply&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          <p class="btn btn-success btn-lg" disabled>Approve&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          <p class="btn btn-warning btn-lg" disabled>Reject&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          <p class="btn btn-danger btn-lg" disabled>Withdraw&nbsp;&nbsp;&nbsp;<span class="badge">7</span></p>
          
            
          </div>
        
      
    
    
    </div>
           
           
          
      </div>  <br><br><br>
        
      
<div class="row">
  
 
  
  <div class="col-md-12">
    
    <h2 style="color: #5d5656;
    text-align: center;
    margin-bottom: 20px;">All Leads</h2> 
    <?php
// if(strtotime(date("Y-m-d", strtotime($recentlyActivity1[0]->created_at))) == strtotime(date('Y-m-d'))){

$new_leads = DB::table('enquiries')
->select('name','id','disposition' )
->where('delete_client',1)
->where('agent_unique_id',Auth::user()->unique_id)
->where('date', date('Y-m-d'))
->get();
// dd(count($user));
    ?>
    <div class="row">
      
        <div class="col-md-3 mb-4">
          <div class="card  ">
            
            <p class="heading-count-no">New Leads</p><p class="total-count-no">{{count($new_leads)}}</p>
            <hr>
            <div class="card-body ">
              
   
                  
                <div class="slideshow-container">
              <div class="count-app-no mySlides fad">
                <div class="count-app-no-child"><p> Name:</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->name?$new_leads[0]->name:'-'}} @else -@endif</p></div>
                <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->disposition?$new_leads[0]->disposition:'-'}} @else -@endif</p></div>
                <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($new_leads) > 0) {{$new_leads[0]->id?'IC'.$new_leads[0]->id:'-'}} @else -@endif</p></div>
                
              </div>
                
                <div class="mySlides count-app-no fad">
                  <div class="count-app-no-child"><p> Name:</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                  <div class="count-app-no-child"><p>Current Status:</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->disposition?$new_leads[1]->disposition:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($new_leads) > 1) {{$new_leads[1]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
                <div class="mySlides count-app-no fad">
                  <div class="count-app-no-child"><p> Name:</p> <p>@if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Counsellor:</p> <p>{{Auth::user()->name}}</p></div>
                  <div class="count-app-no-child"><p>Current Status:</p> <p> @if(count($new_leads) > 2) {{$new_leads[2]->name?$new_leads[1]->name:'-'}} @else -@endif</p></div>
                  <div class="count-app-no-child"><p>Reference No.</p> <p>@if(count($new_leads) > 2) {{$new_leads[2]->id?'IC'.$new_leads[1]->id:'-'}} @else -@endif</p></div>
                </div>
                
               
                </div>
                
                
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span> 
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
->get();

      ?>
      <div class="col-md-3 mb-4">
      <div class="card  ">
        
        <p class="heading-count-no" style="color:#0b5f0b">Follow Up</p><p class="total-count-no"><?php 
         
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
    <div class="col-md-3 mb-4">
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
 
 <div class="col-md-3 mb-4">
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
 ->orderBy('id','DESC')
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
                    //  ->where('future_lead',1)
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
    <!---First Row---->
    
    <!---Second Row---->
    @include('student-dashboad-include')
    @include('dead-lead-dashboard-include')
    
    @include('institute-manager-dashboard-include')
      <!----First Card-->
      
      
      <!----Second Card-->
        
      <!----Second Card-->
      
      <!----Third Card-->
        
      <!----Third Card-->	
    </div>
    <!---Second Row---->
    
    <!---Third Row---->
   
    
    
    
    
    </div>
    <!---Third Row---->
  
  </div>
  <!----Second Column------>		
  
  
  <!----Third  Column------>
  <div class="col-md-1">
  
  </div>
  <!----Third Column------>
  
</div>		
<!---- First Row----->
          <!--  Grid row-->
      
      
      <!-------Third row--------->
          <!--Grid row-->
          
    
        
        
        
        
        <!----- Third Row------->
    
    
    
    <!-----------Main layout----------->
    
    <!----Footer------------->
    <?php
    // include('footer.php');
    
    ?>
    <!----Footer------------->
    
    
    
    

</div>

</div>
</div>
<!-- Full Height Modal Right Success Demo-->


<!------------------Scripts----------------->
<script>
  document.getElementById('graph').style.display = "none";
  $(document).ready(function(){
    $('#toggle_graph_paichart').click(function(){
      $('#chartdiv').toggle();
      $('#graph').toggle();
      
    })
  })
</script>



<script>
  $(document).ready(function(){
    $('#branch,#users,#from_date,#to_date,#country').change(function(){
      var users  = $('#users').val();  
      var from_date  = $('#from_date').val();  
      var to_date  = $('#to_date').val();  
      
      var country  = $('#country').val();  
      
      $.ajax({
type: "get",
url: "{{url('ajax/admin-filter-dashboard')}}",

data:{users:users,from_date:from_date,to_date:to_date,country:country},
success: function(data){
 $('#walkin').html(data[0]);
 $('#total_leads').html(data[2]);
 $('#active_leads').html(data[1]);
 $('#inactive_leads').html(data[3]);
 var  len = data[4].length;
 console.log(len);
 
 if(data[4].length > 0){
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').empty();
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
`<tbody class="tbody">
                  <tr><th style=""><h5>Recent Activities</h5></th></tr>  `));
 for(var i=0; i<len; i++ ){  
  
 $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
   `              
                  <tr><td style="padding-top:7px;"><p style="color:blue;">
                    `+data[4][i]['name']+`
                   </p><p style="margin-bottom:0px;"> `+data[4][i]['status']+` <small style="margin-left:170px;"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                    
                    `+data[4][i]['created_at']+`                 
                 <small>    Posted</small></small></p></td></tr>
                </tbody>`
 ))
 
 }
 $('.table.table-bordered.table-hover.shadow.bg-grey tbody').append((
`</tbody> `));
 }else{
  $('.table.table-bordered.table-hover.shadow.bg-grey tbody').html((
   `<tbody class="tbody">
                  <tr><th style=""><h5>Recent Activities</h5></th></tr>
                  <tr><td>No Record Found</td></tr>
                  <small>    Posted</small></small></p></td></tr>
                </tbody>`
  ))
 }

 
}
      })
    })
    
    $('#users').multiselect({
       onChange:function(option,checked){}})

       $('#country').multiselect({
       onChange:function(option,checked){}})

       $('#department').multiselect({
       onChange:function(option,checked){}})

       

   $('#branch').multiselect({
       onChange:function(option,checked){
        $('#department').html('');
         $('#department').multiselect('rebuild');
         var selected  = this.$select.val();
         if(selected.length > 0){
           $.ajax({
             url:"ajax/get-department",
             method:"GET",
             data:{branch:selected},
             success:function(data){
               $('#department').html(data);
               $('#department').multiselect('rebuild');
             }
           })
         }
       }
   })
   
  })
</script>
<!----Footer------------->
<script>
  window.addEventListener('load', fn, false )
function fn(){document.querySelector('#id-66-title').parentElement.style.display = "none";}
 (function(){ document.querySelector('#id-66-title').parentElement.style.display = "none"}
  )();
  </script>
@endsection


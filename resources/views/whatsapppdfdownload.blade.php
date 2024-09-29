<?php
namespace Dompdf;
use App\enquiries;
use App\users;
use App\courses;
use App\my_institutes;

@include('public/dompdf/autoload.inc.php');

// require_once 'dompdf/autoload.inc.php';
  $options = new Options();
  $options->set('isRemoteEnabled', TRUE);
  $dompdf = new Dompdf($options);
  $contxt = stream_context_create([ 
      'ssl' => [ 
          'verify_peer' => FALSE, 
          'verify_peer_name' => FALSE,
          'allow_self_signed'=> TRUE
      ] 
  ]);
  
  $dompdf->setHttpContext($contxt);
//   print_r($data);
// print_r($contxt);
  
 // $options = new Options();
//$options->set('defaultFont', 'Courier');
//$dompdf = new Dompdf();  
 $html = ('
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 @page { margin:0px; }
.table-core td, .table-core th {
    border: 2px #ecdbcb;
    text-align: center;
   
}
table, td, tr {
    vertical-align: top;
    border-collapse: collapse;
}
.table-core tr:nth-child(even) {
  background-color: #fa7d00;
    
    
}
.table-core tr:nth-child(odd) {
   
  background-color: #ecd6c0;
}
div h2{
	text-align:center;
	background-color:black;
	padding:3px 0 8px 0px;
	color:white;
}
body{
  padding: 0px;
  margin: 0px;
  font-size:10pt;
  }
  .center i{
    margin-left:11px;
  }
 .div1 i{
  margin-left:55px;
 }
 .div2 i{
  margin-left:76px;
 }
 .div3 i{
  margin-left:32px;
 }
 .div4 i{
  margin-left:26px;
 }
 .div5 i{
  margin-left:16px;
 }
 .div6 i{
  margin-left:14px;
 }
 .div7 i{
  margin-left:18px;
 }
 .div8 i{
  margin-left:20px;
 }

  </style>
</head>
<body>
<div class="row">
<div class="block-grid three-up" style="min-width: 320px; max-width: 800px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">

<div style="border-collapse: collapse;width: 100%;">

    <img src="https://immigration.craftzvilla.com/emailer/images/mainimage.jpg" width="100%" height="">
<div><h2>Courses List</h2></div>
	<table class="table-core" style="width:100%;">
		
		<tbody><tr>
		  <th style="width: 38px;" class="center"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i>S.No</th>
      
      <th style=" width: 126px;"><div style="text-align: center;" class="div1"><i class="fa fa-university" aria-hidden="true"></i></div><div style="text-align: center;">University/College</div></th>

      <th style="width: 157px;"><div style="text-align: center;" class="div2"><i class="fa fa-tasks" aria-hidden="true"></i></div><div style="text-align: center;">Program</div></th>
      
      <th style="width: 73px;"><div style="text-align: center;" class="div3"><i class="fa fa-map-marker" aria-hidden="true"></i></div><div style="text-align: center;">Campus</div></th>
      
      <th style="width: 71px;"><div style="text-align: center;" class="div4"><i class="fa fa-street-view" aria-hidden="true"></i></div> <div style="text-align: center;">State/Province</div></th>
      
      <th style="width: 41px;"><div style="text-align: center;" class="div5"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div> <div style="text-align: center;">Duration</div></th>
      
      <th style="width: 38px;"><div style="text-align: center;" class="div6"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div><div style="text-align: center;"> Intake</div></th>
      
      <th style="width: 52px;"><div style="text-align: center;" class="div7"><i class="fa fa-file-text-o" aria-hidden="true"></i></div> <div style="text-align: center;">Application Fee</div></th>
      
      <th style="width: 56px;"><div style="text-align: center;" class="div8"><i class="fa fa-money" aria-hidden="true"></i></div> <div style="text-align: center;">Annual Fee</div></th>
      
		</tr>');
// 		dd($data);
// 		$phone = json_decode($data['phone']);
            // dd($phone);
        $courses = json_decode($data['courses']);
        
		foreach ($courses as $key=>$course){
		
		$course_data = Courses::fetchData($course);
		
		$college_data = my_institutes::getUniversityName($course_data[0]->college_code);
		// dd($course_data[0]->college_code);
		// dd($college_data);
		$html .= '<tr>
		  <a href="https://test.com" target="_blank">
		  <td><div>'.$key.'</div></td>
		  <td>'.$college_data[0]->name.'</td>
		  <td>'.$course_data[0]->course_name.'</td>
		  <td>'.$course_data[0]->campus.'</td>
		  <td>'.$college_data[0]->city.'</td>
		  <td>'.$course_data[0]->duration_year.'</td>
		  <td>'.$course_data[0]->intake.'</td>
		  <td>'.$course_data[0]->application_fee.'</td>
		  <td>'.$course_data[0]->fees.'</td></a>
		
		</tr>
    
		  ';}
		
		$html .= ('</tbody></table>
  
    <img src="https://immigration.craftzvilla.com/emailer/images/migration_2.JPG" width="100%" height="">
</div>
</div>
</div>

</body>
</html>


');

// $dompdf->loadHtml($html);

// $dompdf->render();
// $dompdf->stream("hello.pdf");
// dd($html)->store('media');
// $dompdf->stream("",array("Attachment" => false));
//   file_put_contents('Brochure.pdf', $dompdf->output());




// $html = file_get_contents($html); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output();
$fileName = 'whatsapp'.mt_rand(11111111,99999999).'.pdf';
$dompdf->stream($fileName);
// exit();
// $pdfFilePath = 'https://immigration.craftzvilla.com/imm/uploads/pdf/'.$fileName;

// $filepath =  file_put_contents('uploads/pdf/'.$fileName, $output);

// echo $pdfFilePath;

// exit(0);
// $dompdf->Output(public_path('/upload'.$html.'.pdf'), 'F');
// $output = $dompdf->output();
// file_put_contents('filename.pdf', $output);
// $da = array('t'=>public_path('/upload/so'.$html.'.pdf'));
// $dompdf->Output(public_path('/upload/so'.$html.'.pdf'), 'F');


?>  



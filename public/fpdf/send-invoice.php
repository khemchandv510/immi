<?php
// session_start();
require('fpdf.php');
// $conn  = new mysqli('localhost','root','','immigration');
// // require('conn.php');

// $prefixmemid = $_GET['prefixmemid'];
// $membershipid = $_GET['membershipid'];
// $name = $_GET['name'];
// $period = $_GET['period'];
// $currency = $_GET['currency'];
// $checkno = $_GET['checkno'];
// $accountno = $_GET['accountno'];
// $validTill = $_GET['validTill'];
// $namecheck = $_GET['namecheck'];
// $custemail = $_GET['custemail'];
// $phone = $_GET['phone'];
// $descriptionstr = $_GET['description'];
// $quantitystr = $_GET['quantity'];
// $pricestr = $_GET['price'];
// $description = explode(",",$_GET['description']);
// $quantity = explode(",",$_GET['quantity']);
// $price = explode(",",$_GET['price']);
// $productcount = $_GET['productcount'];
// $billingaddress = $_GET['billingaddress'];
// $invoiceid = $_GET['invoiceid'];
// $username = $_SESSION['username'];

// $dest = './invoices/invoice'.$invoiceid.'.pdf';
// $memberid= $_GET['prefixmemid'].$_GET['membershipid'];
// date_default_timezone_set('Canada/Central');

// $sql = "INSERT INTO invoices (`invoice_id`,`membership_id`,`name`,`period`,`currency`,`checkno`,`accountno`,`validtill`,`namecheck`,`customer_email`,`phone`,`description`,`quantity`,`price`,`productcount`,`billingaddress`,`invoice_filename`,`username`) VALUES ('$invoiceid','$memberid','$name','$period','$currency','$checkno','$accountno','$validTill','$namecheck','$custemail','$phone','$descriptionstr','$quantitystr','$pricestr','$productcount','$billingaddress','$dest','$username')";

// if ($conn->query($sql) === TRUE) {
   

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->Image('./images/logo.png',9,12,50);

$pdf->SetTitle('Esource Inc. Invoice',false); //pdf title
$pdf->SetFont('Arial','B',24);
$pdf->Text(90,12,'Invoice'); //create text
$date = date("M-d-Y");
$pdf->SetFont('Arial','',12);
$pdf->Text(11,30,'Invoice ID: '.'#'.$invoiceid);
$pdf->Text(160,30,'Date: '.$date); //create text
$pdf->SetFont('Arial','B',12);
$pdf->Text(11,40,'Billing From:');
$pdf->SetY(43);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(90,6,'Esource Software Solutions LLC,220 Donald Lynch Blvd. PO Box 9130 Marlborough,MA 01752-9130 USA,Phone: +1-866-257-5051','','L');
$pdf->SetFont('Arial','B',12);
$pdf->Text(120,40,'Billing To:');
$pdf->SetY(43);
$pdf->SetX(119);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(80,6,$name.", ".$billingaddress.", ".'Email: '.$custemail.', Phone: '.$phone,'','L');
$pdf->SetFont('Arial','B',12);
$pdf->Text(11,84,'Product/Services:');
$pdf->SetY(90);
$pdf->Cell(30,8,'Quantity',1,0,'C');  
$pdf->Cell(100,8,'Description',1,0,'C');  
$pdf->Cell(60,8,'Price',1,1,'C');
$pdf->SetFont('Arial','',10);
$total = 0;
for ($y = 0; $y < $productcount; $y++) {

$pdf->Cell(30,8,$quantity[$y],1,0,'C');  
$pdf->Cell(100,8,$description[$y],1,0,'C');  
$pdf->Cell(60,8,$price[$y]." ".$currency,1,1,'C');
$total += $price[$y];
}

$pdf->SetFont('Arial','B',14);
$pdf->Text(150,180,'Total: '.$total." ".$currency);
$pdf->SetFont('Arial','B',12);
$pdf->Text(11,282,'Esource Software Solutions LLC');
$pdf->SetFont('Arial','',10);
$pdf->Text(11,287,'Note: Please call our toll free - +1-888-399-5722 for further assistance');
$pdf->SetFont('Arial','',7);
$pdf->Text(11,291,'We are Independent Global IT service provider which specializes in issues related to Desktop, Laptops and other auxiliary devices. Our teams of IT experts who furnish these');
$pdf->Text(11,294,'services have certification from companies such as HP, Dell, Microsoft, Lenovo etc.');

$pdf->Output($dest, 'F');
require 'mailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'esourcebilling@invoice-mailer.com';                 // SMTP username
$mail->Password = "kinzinweb786";                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('esourcebilling@invoice-mailer.com', 'Esource Invoice');
$mail->addAddress($custemail, 'Esource Invoice');     // Add a recipient
// $mail->addAddress('technicalheaven01@gmail.com');               // Name is optional
// $mail->addReplyTo('contact@nextla.in', 'Information');
$mail->addBCC('ienergy1995@gmail.com','Esource Invoice');
$mail->addBCC('esourcesoft@gmail.com','Esource Invoice');

$file_to_attach = $dest;
$mail->addAttachment($file_to_attach);         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Esource Team (Invoice)';


$message = '<div class="container mail_content"><p style="font-size: 22px;"><b>Dear '.$name.',</b></p><p class="memberid"><b>Membership ID : '.$prefixmemid . $membershipid.'</b></p><p>You have authorized <b>Esource Software Solutions</b> to provide Technical support in order to resolve the Software Issues on your Computer/Device.</p><p>We understand that you consented the technician to connect/control your device (on a remote desktop Connection), install/uninstall software and/or make hardware changes in order to fully resolve the technical Issue.</p><p>The Computer issues have been successfully resolved and you are informed that the troubleshooting process warranties the repair of technical issues for a period of <b>'.$period.'</b> Security and Support. The Internet Security (Antivirus / Antimalware / Antiransomware / IP Blocker, Encryption / Virtual Private Network) will always be available for your computer and also be configured according to the device used in future. Technical support covers all home devices (computers / tablets / smartphones / ipads etc). (As per the agreement you acknowledge and accept that Esource Software Solutions will not be held responsible/accountable for errors or faults caused by any Third-Party Technical support or Independent Technicians.</p>
  <p>Within the warranty period, if the same or similar issue (arising out of the initial problem/troubleshooting) is faced, Esource Software Solutions will be resolving the same without you having to incur any additional charges.</p>
  <p>It is also acknowledged and accepted by the customer that any hardware faults (Damage of physical parts of device) currently or in the future will not be covered for repair and cannot be a basis of refund requests for the services rendered, resolution and refund.</p>
  <p>You have authorized the case to be closed today after having verified that the issue has been resolved to your satisfaction and acceptance of the warranty period associated with the service package.</p>
  <p>A service charge of <b>'.$total." ". $currency.'</b> (Including all taxes) has been agreed to be paid by an Electronic Check <b>#'.$checkno.'</b> and Account Number <b>*****'.$accountno.'</b> which covers the service charges valid till <b>'.$validTill.'</b>.</p>
  <p>Please also understand the refund policy applies for 7 (seven) days from the initial servicing date and accept that any refunds issued will be made after deducting the service charges corresponding to the days/incidents exhausted before refund request is received.</p>

  <p><strong>Printed Name on Check: </strong>'.$namecheck.'</p>
  <p><strong>Email Address: </strong>'.$custemail.'</p>
  <p><strong>Contact Number: </strong>'.$phone.'</p>
  <p><strong>Date: </strong>'.date("M-d-Y").'</p>
  <p><small>Support Email : support@esourcesllc.com</small></p>
   <p><small>Support No. : +1-866-257-5051, +1-888-399-5722</small></p>
</div>';


 $mail->Body = $message;





$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {



    echo 'Invoice Sent Successfully!';
    echo '<button onclick="window.history.back()">Go Back</button>';
}



// } else {
//     echo "Error: " . $conn->error;
// }

// $conn->close();



?>
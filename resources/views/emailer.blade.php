@php
use App\enquiries;
use App\users;
use App\courses;
use App\my_institutes;
@endphp
<!DOCTYPE html>

<html>
<head>

<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">

<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}
.table-core tr {
  background-color: #f8ad2d;
  background-image: linear-gradient(#f0f0d3, #ffaf0f);
}
/*.table-core tr:nth-child(odd) {*/
/*	background-color: #f8ad2d;*/
	/*background-image: linear-gradient(#eaeaea, #fa7d00);*/
/*}*/

.table-core td, .table-core th {
  border: 2px #cacaca;
  text-align: center;
  padding: 8px;
}
.owl-nav{
	display: none;
}
		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
		.text-round{
			transform: skew( 20deg );
			background-color: #f00;
			width: 189px;
			position: inherit;
    left: 17px;
		}
        .text3 a{
            background-color: #fff;
    padding: 6px 8px 6px 8px;
    border: 1px solid #f00;
    border-radius: 10px;
        }
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 660px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col_cont {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num2 {
				width: 16.6% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num5 {
				width: 41.6% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num7 {
				width: 58.3% !important;
			}

			.no-stack .col.num8 {
				width: 66.6% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.no-stack .col.num10 {
				width: 83.3% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
			@media (max-width: 426px){
			.khemchand{
				width: 48% !important;
				float: left;
			}
			.khemhandpart2{
				width: 48% !important;
				float: right;
			}
		}
		}
	</style>
<style id="menu-media-query" type="text/css">
		@media (max-width: 660px) {
			.menu-checkbox[type="checkbox"]~.menu-links {
				display: none !important;
				padding: 5px 0;
			}

			.menu-checkbox[type="checkbox"]~.menu-links span.sep {
				display: none;
			}

			.menu-checkbox[type="checkbox"]:checked~.menu-links,
			.menu-checkbox[type="checkbox"]~.menu-trigger {
				display: block !important;
				max-width: none !important;
				max-height: none !important;
				font-size: inherit !important;
			}

			.menu-checkbox[type="checkbox"]~.menu-links>a,
			.menu-checkbox[type="checkbox"]~.menu-links>span.label {
				display: block !important;
				text-align: center;
			}

			.menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
				display: block !important;
			}

			.menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
				display: none !important;
			}

			#menuau7pqb~div label {
				border-radius: 0% !important;
			}

			#menuau7pqb:checked~.menu-links {
				background-color: #f8ad2d !important;
			}

			#menuau7pqb:checked~.menu-links a {
				color: #ffffff !important;
			}

			#menuau7pqb:checked~.menu-links span {
				color: #ffffff !important;
			}
		}
	</style>
<style id="icon-media-query" type="text/css">
		@media (max-width: 660px) {
			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #ffffff;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#ffffff" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; width: 800px;margin: auto;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#ffffff"><![endif]-->
<div style="background-color:#f8ad2d; display: none;">
<div class="block-grid two-up no-stack" style="min-width: 320px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 0px; background-color: transparent; width: 100%;" >
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f8ad2d;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="320" style="background-color:transparent;width:320px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="left" class="img-container left autowidth" style="padding-right: 0px;padding-left: 20px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 20px;" align="left"><![endif]-->
<div style="font-size:1px;line-height:20px"> </div><img alt="Image" border="0" class="left autowidth" src={{url("public/images/online.png")}}  style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 220px; max-width: 100%; display: block;" title="Image" width="95"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td><td align="center" width="320" style="background-color:transparent;width:320px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 318px; width: 320px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
<tr style="vertical-align: top;" valign="top">
<td align="center" style="word-break: break-word; vertical-align: top; padding-top: 15px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; text-align: center; font-size: 0px;" valign="top">
<!--[if !mso><!--> <input class="menu-checkbox" id="menuau7pqb" style="display:none !important;max-height:0;visibility:hidden;" type="checkbox"/>
<!--<![endif]-->
<div class="menu-trigger" style="display:none;max-height:0px;max-width:0px;font-size:0px;overflow:hidden;"> <label class="menu-label" for="menuau7pqb" style="height:48px;width:48px;display:inline-block;cursor:pointer;mso-hide:all;user-select:none;align:center;text-align:center;color:#ffffff;text-decoration:none;background-color:#f8ad2d;"><span class="menu-open" style="mso-hide:all;font-size:38px;line-height:48px;">☰</span><span class="menu-close" style="display:none;mso-hide:all;font-size:38px;line-height:48px;">✕</span></label></div>
<div class="menu-links" style=" text-align: end; ">
<!--[if mso]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td style="padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px">
<![endif]--><span class="label" style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;display:inline;font-family:Merriwheater, Georgia, serif;font-size:18px;color:#fff;background-color: #4267B2;letter-spacing:undefined;"><i class="fa fa-facebook-official"></i> Like</span>
<!--[if mso]></td><td><![endif]--><span class="sep" style="font-size:18px;font-family:Merriwheater, Georgia, serif;color:#000000;">|</span>
<!--[if mso]></td><![endif]-->
<!-- <span class="label" style="padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;display:inline;font-family:Merriwheater, Georgia, serif;font-size:18px;color:#000000;letter-spacing:undefined;"><i class="fa fa-linkedin-square"></i></span> -->
<!--[if mso]></td><td><![endif]-->
<!--[if mso]></td></tr></table><![endif]-->
</div>
</td>
</tr>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:#f8ad2d;">
<div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f8ad2d;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>

<div>
<img src="https://immigration.craftzvilla.com/emailer/images/mainimage.jpg" style="width:100%">
</div>
<div style="background-color:#000;">
<div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 30px; padding-bottom: 10px; font-family: Georgia, serif"><![endif]-->
<div style="color:#555555;font-family:Merriwheater, Georgia, serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div class="txtTinyMce-wrapper" style="font-size: 14px; line-height: 1.5; color: #555555; font-family: Merriwheater, Georgia, serif; mso-line-height-alt: 21px;">
<p style="margin: 0; font-size: 34px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 51px; margin-top: 0; margin-bottom: 0;"><span style="color: #fff; font-size: 34px;"><span style=""><strong>Courses List</strong></span></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid three-up" style="width: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;">
	<table class="table-core">
		
		<tr>
		  <th style="width: 40px;"><img src="https://immigration.craftzvilla.com/emailer/images/i1.png" width="30px">S.No</th>
		  <th style=" width: 138px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i2.png" width="30px"></div><div style="text-align: center;">University/College</div></th>
		  <th style="width: 267px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i3.png" width="30px"></div><div style="text-align: center;">Program</div></th>
		  <th style="width: 76px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i4.png" width="30px"></div><div style="text-align: center;">Campus</div></th>
		  <th style="width: 74px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i5.png" width="30px"></div> <div style="text-align: center;">State/Province</div></th>
		  <th style="width: 45px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i6.png" width="30px"></div> <div style="text-align: center;">Duration</div></th>
		  <th style="width: 41px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i7.png" width="30px"></div><div style="text-align: center;"> Intake</div></th>
		  <th style="width: 58px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i8.png" width="30px"></div> <div style="text-align: center;">Application Fee</div></th>
		  <th style="width: 61px;"><div style="text-align: center;"><img src="https://immigration.craftzvilla.com/emailer/images/i9.png" width="30px"></div> <div style="text-align: center;">Annual Fee</div></th>
		</tr>
		
		@php 
        $courses = json_decode($data['courses']);
		@endphp
		@foreach ($courses as $key=>$course)
		@php
		$course_data = Courses::fetchData($course);
		$college_data = my_institutes::getUniversityName($course_data[0]->college_code);
		@endphp
		<tr>
		  <td><div>{{$key+1}}</div></td>
		  <td>{{$college_data[0]->name}}</td>
		  <td>{{$course_data[0]->course_name}}</td>
		  <td>{{$course_data[0]->campus}}</td>
		  <td>{{$college_data[0]->city}}</td>
		  <td>{{$course_data[0]->duration_year}}</td>
		  <td>{{$course_data[0]->intake}}</td>
		  <td>{{$course_data[0]->application_fee}}</td>
		  <td>{{$course_data[0]->fees}}</td>
		</tr>
		@endforeach
	  </table>


</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid three-up" style="">
    <a href="https://ieltspteacademy.com/student-registration/"><img src="https://immigration.craftzvilla.com/emailer/images/footer1.jpg" width="100%"></a>
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->

<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 212px;width: 213px;">
</div>
<div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 205px;width: 205px;">
	<!--<div style=" position: absolute; top: 75px; left: 138px; ">-->
	<!--	<img src={{url("public/images/IPA_Logo_New3-296x115.png")}} width="32px">-->
	<!--</div>-->
<!--<div>-->
    
	<!--<a href="http://ieltspteacademy.com/"><img src={{url("public/images/IPA_Logo_New3-296x115.png")}} style="width: 33%; float: right;"></a>-->
<!--</div>-->
<!--<div style="color:#fff;padding-top: 50px;"><h4 style="font-weight: 600; font-size: 24px;">Join Live <span style="color: #f00;-->
<!--    font-weight: 900;">IELTS</span> <span style="color: #000;font-weight: 300;">Plus</span> Online Coaching</h4>-->
<!--	<p style="font-size: 15px;"> with Cambridge Certified Faculty!</p>-->
<!--	<div class="text-round">-->
<!--	<p style="width: 189px; text-align: center;transform: skew( -20deg );"><span style="font-size: 20px; font-weight: 700;">What We Offer</span></p></div>-->
<!--	<ul style="font-size: 15px;">-->
<!--		<li>Comprehensive Teaching Structure</li>-->
<!--		<li>Experienced Expert Faculity </li>-->
<!--		<li>Trageted Study Program</li>-->
<!--		<li>Free Study Material</li>-->
<!--	</ul>-->
<!--	<p style="padding-left: 9px; font-size: 15px;">For Registration, open link</p>-->
<!--<p class="text3">https://ieltspteacademy.com/student-registration/ </span></p>-->
<!--</div>-->
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>

<div style="background-color:#000000;">
<div class="block-grid mixed-two-up" style="min-width: 320px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#000000;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="426" style="background-color:transparent;width:426px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num8 khemchand" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 424px; width: 426px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: serif"><![endif]-->
<div style="color:#555555;font-family:'Merriwheater', 'Georgia', serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; font-family: 'Merriwheater', 'Georgia', serif; color: #555555; mso-line-height-alt: 14px;">
<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><em><span style="font-size: 18px; color: #f8ad2d;"><span style="">Contact us:</span></span></em></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#555555;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:0px;padding-right:20px;padding-left:20px;">
<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; font-family: 'Lato', Tahoma, Verdana, Segoe, sans-serif; color: #555555; mso-line-height-alt: 14px;">
<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><span style="color: #ffffff;"><i class="fa fa-envelope-o" aria-hidden="true" style="margin-right: 4px;"></i> <a href="mail:info@icfei.com" style="color: #fff;">info@icfei.com</a></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#555555;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;">
<div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; font-family: 'Lato', Tahoma, Verdana, Segoe, sans-serif; color: #555555; mso-line-height-alt: 14px;">
<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word;padding-bottom: 5px; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><span style="color: #ffffff;"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span><i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 4px;"></i></span><a href="tel:+919870344553" style="color: #fff;">+91-9870344553</a> </span></p>
<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: left; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><span style="color: #ffffff;"><span><i class="fa fa-globe" aria-hidden="true" style="margin-right: 4px;"></i></span> <a href="http://icfei.com/" style="color: #fff;">www.icfei.com</a></span></p>

</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td><td align="center" width="213" style="background-color:transparent;width:213px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num4 khemhandpart2" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 212px; width: 213px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="left" class="img-container left autowidth " style="padding-right: 20px;padding-left: 10px; float:right;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 10px;" align="left"><![endif]-->
<!--<div style="font-size:1px;line-height:15px"> </div>-->
<p style="color: #fff; font-size: 14px;margin-bottom: 0px;">ICFEI Overseas Career Pvt. Ltd.</p>
<p style="color: #fff;margin-bottom: 0px;">Follow us</p>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; float:right;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-top: 10px; float:right; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
<tbody>
<tr align="left" style="vertical-align: top; display: inline-block; text-align: right;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 14px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/ICFEI/" target="_blank"><img alt="Facebook" height="32"  src={{url("public/images/facebook2x.png")}} style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Facebook" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 14px; padding-left: 0px;" valign="top"><a href="https://twitter.com/icfei" target="_blank"><img alt="Twitter" height="32" src={{url("public/images/twitter2x.png")}} style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Twitter" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 14px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/ic.icfei/" target="_blank"><img alt="Instagram" height="32"  src={{url("public/images/instagram2x.png")}} style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Instagram" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 14px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/company/icfei" target="_blank"><img alt="LinkedIn" height="32"  src={{url("public/images/linkedin2x.png")}} style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="LinkedIn" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 14px; padding-left: 0px;" valign="top"><a href="https://www.youtube.com/channel/UCPzjBOxCE5tfA5jBNLzpTNw" target="_blank"><img alt="LinkedIn" height="32" src={{url("public/images/youtube.png")}} style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="LinkedIn" width="32"/></a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div class="col_cont" style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
<tr style="vertical-align: top;" valign="top">
<td align="center" style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" valign="top">
<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
<!--[if !vml]><!-->
<table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;" valign="top">
<!--<![endif]-->
<tr style="vertical-align: top;" valign="top">

</tr>
</table>
</td>
</tr>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:3000,
	animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>
</body>
</html>
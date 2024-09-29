<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge" > --}}
  <meta  name="csrf-token" content="{{ csrf_token() }}">    
    <title>Immigration</title>
    
    
  <!-- Custom fonts for this template-->
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{URL::asset('public/css/sb-admin-2.min.css')}}">
<link href="{{URL::asset('public/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">


  <link href="{{URL::asset('public/css/ankush.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/deepa.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/preeti.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/om.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/kaushik.css')}}" rel="stylesheet">  
    <link href="{{URL::asset('public/css/k4stylesheet.css')}}" rel="stylesheet"> 
    <link href="{{URL::asset('public/css/style_mix.css')}}" rel="stylesheet">  
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    @include('layouts.app') 
    <link rel="stylesheet" href="{{URL::asset('public/css/main.css')}}">
    

    
   <link rel="stylesheet" href="public/css/wtf-forms.css"/>
   <link rel="stylesheet" href="public/css/style.css"/>	
    
    
</head>

<body id="page-to" style="padding-right:0px !important;">

<div id="wrapper">

{{-- @include('sidebar') --}}


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  {{-- @include('layouts.app')  --}}
  {{-- @include('navigation') --}}

        <!-- End of Topbar -->    



  <!-- Begin Page Content -->
  <div class="container-fluid" style="">
        <div id="wrapper">

<!-- Sidebar -->

<!-- End of Sidebar -->






        @yield('index')
        @yield('clients')
        @yield('add-client')
        @yield('education/dashboard')
        @yield('add-institution')
@yield('start/contacts')
@yield('collegeInfo')
@yield('ccc-courses')
@yield('add-course')
@yield('update-institution')
@yield('course-additional-info')
@yield('enquiry-desktop')
@yield('tabletform')
@yield('enquiry-list')
@yield('new-user')
@yield('content')
@yield('commissionstructure')
@yield('enrolment')
@yield('add-enrolment')
@yield('enrolment-detail')
@yield('invoice')
@yield('existing-user')
@yield('tab')
@yield('admin-panel')
@yield('agent')

@yield('aa')
@yield('trash-client')
@yield('asign-client-list')
@yield('attendance')
@yield('ip-address')
@yield('add-knowledge-base')
@yield('profile')
@yield('manageclient')
@yield('payroll')
@yield('recruitment')
@yield('employee-detail')
@yield('priority')
</div>
      </div></div></div> </div>
      </body>
        
@include('footer')

      


      
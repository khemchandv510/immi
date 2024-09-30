@php
    if(isset(Auth::user()->status)){
    if(Auth::user()->status == 0){
    Auth::logout();
Session::flush();
return back();die;
    }}
    @endphp
    


<!DOCTYPE html>
<html lang="{{ \Lang::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <?php 
    // header('Content-Type: text/html; charset=ISO-8859-1'); 
    ?>
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge" > --}}
  {{-- <meta  name="csrf-token" content="{{ csrf_token() }}">    
    <title>Immigration</title> --}}
  <!-- Custom fonts for this template-->
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
  {{--  --}}
  {{--  --}} 
   
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{--  --}}
    {{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="{{URL::asset('public/css//materialize.min.css')}}"/> --}}

    {{-- <link href="{{URL::asset('public/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}

<!-- Custom styles for this template-->
   {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> --}}
  {{-- --}}
   {{-- <link href="{{URL::asset('public/css/ankush.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{URL::asset('public/css/deepa.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{URL::asset('public/css/preeti.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/om.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/kaushik.css')}}" rel="stylesheet">  
    <link href="{{URL::asset('public/css/k4stylesheet.css')}}" rel="stylesheet">  --}}
      
    <link rel="stylesheet" href="{{URL::asset('public/css/maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/sb-admin-2.min.css')}}">
    <link href="{{URL::asset('public/css/style_mix.css')}}" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    
    {{-- <link rel="stylesheet" href="{{URL::asset('public/css/cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css')}}">    --}}
    
    {{-- <link rel="stylesheet" href="{{URL::asset('public/css/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}"/>  --}}
    
   {{-- <link rel="stylesheet" href="{{URL::asset('public/css/wtf-forms.css')}}"/> --}}
   	

   {{-- <link rel="stylesheet" href="{{URL::asset('public/css/use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous')}}"> --}}
   {{-- <link href="{{URL::asset('public/css/fonts.googleapis.com/css" rel="stylesheet')}}"> --}}
{{-- <link rel="stylesheet" href="{{URL::asset('public\css\fontawesome-free-5.11.2-web\fontawesome-free-5.11.2-web\css\fontawesome.min.css')}}"> --}}
<link rel="stylesheet" href="{{URL::asset('public/css/cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css')}}" />
 
{{-- <link rel="stylesheet" href="{{URL::asset('public/css/cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css')}}" /> --}}
 
<link rel="stylesheet" href="{{URL::asset('public/css/style.css')}}"/>

@include('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
{{-- <link rel="stylesheet" href="{{URL::asset('public/css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">     --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
{{-- <link rel="stylesheet" href="{{URL::asset('public/css/mdb.css')}}"> --}}
{{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="{{URL::asset('public/css/main.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/css/main2.css')}}">

<!-- calendar linking start -->

<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<!-- calendar linking end -->
<!--ck editor-->
<link rel="stylesheet" href="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.css">

</head>

<body id="page-to" style="">

<div id="wrapper">

@include('sidebar')

 
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  {{-- @include('layouts.app')  --}}
  {{-- @include('navigation') --}}

        <!-- End of Topbar -->    



  <!-- Begin Page Content -->
  <div class="container-fluid" style="" id="padding-zero">
        

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
@yield('filter-course-section')
@yield('application')
@yield('view-application')
@yield('complete-profile-preview')
@yield('application-process')
@yield('new-client')
@yield('unfollow-client')
@yield('student')
@yield('student-dashboard')
@yield('institute-dashboard')
@yield('immigration-dashboard')


@yield('add-leads')
@yield('add-student')
@yield('trash-student')
@yield('trash-institute')
@yield('trash-immigration')
@yield('calendar')

</div>
      </div></div></div> </div>
      </body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    CKEDITOR.replace('editor', {
        height: 300, // Set height in pixels
        toolbar: [
            { name: 'document', items: ['Source', '-', 'Undo', 'Redo'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'RemoveFormat'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] }
        ]
    });
</script>


@include('footer')

      


      
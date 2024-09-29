<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                    <img src="public/images/logo.png" alt="" style="width:50px"> &nbsp;
                    {{ config('app.nam', 'Immigration') }} 
                {{-- </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-bell fa-fw"></i>
                                  <!-- Counter - Alerts -->
                                 
                                  {{-- @if(!empty($get))
                                  {{$a = 1}}
                                  @foreach($get as $get2)
                                  @if($get2->callbacklater == date("Y-m-d"))
                                  {{$a++}}
                                <span class="badge badge-danger badge-counter"> {{$a}}+</span>
                                @endif
                                @endforeach
                                @endif --}}
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                  <h6 class="dropdown-header">
                                    Alerts Center
                                  </h6>
                                  {{-- @if(!empty($get))
                                  @foreach($get as $get2)
                                  @if($get2->callbacklater == date("Y-m-d")) --}}
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                      <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                      </div>
                                    </div>
                                    <div> 
                                      
                                       
                                      {{-- <div class="small text-gray-500">{{$get2->callbacklater}}</div>
                                      <span class="font-weight-bold">Call Back Later to  {{$get2->name}} </span>
                                      <span class="font-weight-bold">Mobile  {{$get2->contact}} </span> --}}
                                    
                                     
                                    </div>
                                  </a>
                                  {{-- @endif
                                  @endforeach
                                  @endif --}}
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                      {{-- <div class="icon-circle bg-success"> --}}
                                        {{-- <i class="fas fa-donate text-white"></i> --}}
                                      {{-- </div> --}}
                                    </div>
                                    <div>
                                      {{-- <div class="small text-gray-500">December 7, 2019</div>
                                      $290.29 has been deposited into your account! --}}
                                    </div>
                                  </a>
                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                      {{-- <div class="icon-circle bg-warning"> --}}
                                        {{-- <i class="fas fa-exclamation-triangle text-white"></i> --}}
                                      {{-- </div> --}}
                                    </div>
                                    <div>
                                      {{-- <div class="small text-gray-500">December 2, 2019</div>
                                      Spending Alert: We've noticed unusually high spending for your account. --}}
                                    </div>
                                  </a>
                                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                              </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<p id="get_data"></p>
        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>   
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
     $.ajax({
    type: "get",
    url: "{{url('get-notifcation')}}",
    success: function(data){
    if(data){
alert(data);
    }
}
 });
            
        });
    </script>

</body>
</html>

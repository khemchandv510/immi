@extends('layouts.app')

@section('content')
<style>
.navbar-laravel{
  padding: 0px !important;
}
#get_data{
    margin: 0px;
}

.login-label{
    position: relative;
    height: 100px;
}

.login-label .logon-p{
    position: absolute;
    font-size: 32px;
    color: #335e82;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    
}
.login-label .line{
    height: 3px;
    background: #335e82;
    width: 100px;
    position: absolute;
    top: 73%;
    left: 50%;
    transform: translate(-47%, 0px);
    
}
.powered-by p{
    margin-top: 65px;
    margin-bottom: 0;
    text-align: center;
}

.com-name{
    color: red;
}
.card{background: #efefef;border-radius: 4px 4px 4px 4px;box-shadow: 1px 1px 3px 3px #000;}
#srn_ht .img-login {
    
    left: 0;
    position: absolute;
    top: 50%;
    transform: translate(0,-50%);
    right:20px;height: 487px;
}
#srn_ht .img-login img{
    width: 100%;
    height: 100%;
    filter: brightness(0.3);
    margin-left: 24px;
    border-radius: 5px 0 0px 5px;
}
.content{
    z-index: 1000;
    position: absolute;
    text-align: justify;
    font-size: 20px;
    color: #959191;
    padding: 34px;
    margin: auto;
    top: 50%;
    transform: translate(0,-50%);
    text-shadow: 2px 1px 3px #000;
}
</style>


<div class="row" style="background-size: cover;
background-repeat: no-repeat;
width: 100%; background-image: url({{url('public/images/login-image.jpg')}}); margin:0px;height: 100%;">
  

<div class="container-fluid"   style="background: #000000bf;">
    {{-- <div class="row justify-content-center" style=" justify-content: flex-end !important;" id="srn_ht"> --}}
            <div class="row" style="" id="srn_ht">
            <!--    <div class="col-md-8 img-login" style="">-->
            <!--    <img src="{{url('public/images/pexels-photo.jpg')}}" alt="">-->
            <!--    <div class="content">-->
            <!--    <h2>Login</h2>-->
            <!--    <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat consectetur reiciendis, laboriosam necessitatibus ipsa id ut accusamus distinctio earum magni modi quisquam ducimus. Nam odit dolores officia cupiditate? Nemo, rem! </p>-->
            <!--</div>-->
            <!--    </div>-->
      <div class="col-md-4" style="position: absolute;
        top: 50%;
        transform: translate(-50%,-50%);
    padding: 0; right:10px;left: 50%;">
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                <div class="login-label"> 
<p class="logon-p">Login panel</p>
<p class="line"></p>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="offset-md-1 col-md-8 ">
                                <button type="submit" class="btn btn-primary" onclick="login_button()">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="powered-by">
                                    <p> <span>  Powered By </span>  <span class="com-name"> ICFEI</span> </p>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    scrn_height =   window.innerHeight;
    document.getElementById('srn_ht').style.height=scrn_height+"px";
     </script>
     
     
       
    
<script>

    function login_button(){ 
        var email = $('#email').val();
        var password = $('#password').val();  
       $.ajax({
       type: "GET",
       url: "{{url('hrm/attendanceemployee/attendance')}}",
       data:{in:"CLOCK IN",ids:"jnbh4j544j3kjh6k2j34h5g",email:email,password:password},
       success: function(data){
                          }
       });
   }
   
   </script>
@endsection

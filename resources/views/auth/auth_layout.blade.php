<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Secondary Online Clearance</title>

    <link rel="shortcut icon" href="{{ URL::to('graduate.png') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('assets/plugins/feather/feather.css') }}">
    
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
</head>
<body>
    <style>
.login-wrapper .loginbox .login-left {
    align-items: center;
    background: #dc3545;
    padding: 40px;
    flex-direction: column;
    justify-content: start;
    width: 400px;
    display: flex;
    background-blend-mode: multiply;
    border-radius: 8px 20px 20px 8px;
    position: relative;
}
.auth-left-title {
    color: #57a8e2;
    font-size: 23px;
    text-align: center;
    font-weight: 700;
    padding-top: 10px;
}

.login-button {
    background-color: #dc3545;
    border: 1px solid #dc3545;
}

.login-button:hover {
    background-color: #ab2330;
    border: 1px solid #941723;
}
    </style>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    {{-- picha ya login  --}}
                    <img class="img-fluid" src="{{ URL::to('graduate.png') }}" alt="Logo">
                    <h2 class="auth-left-title">SECONDARY STUDENT CLEARANCE SYSTEM</h2>
                 
                    
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h2 class="text-left text-bold">@yield('heading')</h2>
                        @yield('content')

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">&nbsp;&nbsp;</span>
                        </div>
                         @if(request()->routeIs('login'))
                        <p class="account-subtitle">New User? <a href="{{ route('register') }}">Register</a></p>
                        @else
                        <p class="account-subtitle">Already Registered? <a href="{{ route('login') }}">Login</a></p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ URL::to('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::to('assets/js/feather.min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::to('assets/js/script.js') }}"></script>
@stack('scripts')
</body>
</html>

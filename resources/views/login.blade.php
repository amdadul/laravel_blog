<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopping Plan | Unique E-Commerce in bangladesh</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login/login.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        function ds()
        {
            var name = document.getElementById("username").value;
            var pass = document.getElementById("encpass").value;
            if(name=="" && pass=="" || (name=="" || pass==""))
            {
                return false;
            }
            else
            {
                document.getElementById("submit").innerHTML = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Login';
                document.getElementById("submit").addEventListener("click", function(event){
                    event.preventDefault() });
                return true;
            }
        }
    </script>
</head>
<body>
<div class="d-flex align-items-center justify-content-center min-vh-100" >
    <div class="board col-lg-4 col-md-8 col-sm-8 col-8">
        <div class="d-flex justify-content-center">
            <img class="logimg" src="{{asset('images/login/logperson.png')}}">
        </div>
        <div class="d-flex justify-content-center">
            <h2 class="logText">Member Login</h2>
        </div>
        <form id="login" method="post" action="{{ route('login') }}" onsubmit="return ds();">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" name="email" value="{{ old('email') }}" placeholder="Username / E-Mail" required="required">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-lock"></i></span>
                </div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="encpass" name="password" placeholder="Password" required="required">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-group mb-3 justify-content-center">
                <button type="submit" class="btnLogin" id="submit" form="login" value="submit" onclick="ds()"><i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
        </form>

        <div class="d-flex justify-content-center link">
            <a href="{{route('password.request')}}">Forget Password?</a>
            <a href="{{route('register')}}" class="signup">Sign-up</a>
        </div>

        <div class="d-flex justify-content-center icon">
            <a href="#"><i class="fab fa-google-plus-square fa-2x google"></i></a>
            <a href="#"><i class="fab fa-facebook-square fa-2x facebook"></i></a>
            <a href="#"><i class="fab fa-twitter-square fa-2x twitter"></i></a>
        </div>


    </div>
</div>

</body>
</html>

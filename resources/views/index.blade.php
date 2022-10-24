<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('home/img/logo/Sapo-logo.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100" id="bodyLogin">
        <a href="/admin/login"><button class="glow-on-hover" type="button">Connect With Us!</button></a>
    </div>
</div>

<style>
    #bodyLogin{
        background-image: url({{asset('home/img/background.png')}});
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: 100% 100%;
    }
    .glow-on-hover {
        margin-top: 80px;
        width: 500px;
        height: 100px;
        border: none;
        outline: none;
        color: yellow;
        font-size: 2rem;
        background: #111;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
    }

    .glow-on-hover:before {
        content: '';
        background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        position: absolute;
        top: -2px;
        left:-2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }

    .glow-on-hover:active {
        color: green;
    }

    .glow-on-hover:active:after {
        background: transparent;
    }

    .glow-on-hover:hover:before {
        opacity: 1;
    }

    .glow-on-hover:after {
        z-index: -1;
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: green;
        left: 0;
        top: 0;
        border-radius: 10px;
    }

    @keyframes glowing {
        0% { background-position: 0 0; }
        50% { background-position: 400% 0; }
        100% { background-position: 0 0; }
    }
</style>

<!--===============================================================================================-->
<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('login/js/main.js')}}"></script>
</body>

</html>

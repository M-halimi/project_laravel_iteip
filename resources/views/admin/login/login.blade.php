
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin     Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">

</head>
{{-- @extends('layouts.app')
@section('content') --}}
<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="login-form">
                                    <!-- Your form elements -->
                                    <a class="text-center"><img src="{{asset('asset/images/Logo-ITEIP1.png')}}" alt="iteip" width="50px" ></a>
                                    <!-- Other form elements -->
                                </div>
                                <form class="mt-5 mb-5 login-input" action="{{route('admin.login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="button2 form-control rounded"  type="submit" >login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="{{route('admin.register')}}" class="text-primary">Sign Up</a> now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- @endsection --}}
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('asset/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('asset/js/custom.min.js')}}"></script>
    <script src="{{asset('asset/js/settings.js')}}"></script>
    <script src="{{asset('asset/js/gleek/js')}}"></script>
    <script src="{{asset('asset/js/styleSwitcher.js')}}"></script>

</body>
</html>









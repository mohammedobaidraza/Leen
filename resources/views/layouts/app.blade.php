<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="{{asset('css/custom_register.css')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/"/>
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/bootstrap-grid.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet"/>

    <link href="{{asset('css/fontawesome/css/all.css')}}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap style-->
    <link href="{{asset('css/bootstrap-grid.css')}}" rel="stylesheet" type="text/css"/>
    <!-- owl carousel style-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.theme.default.min.css')}}"/>

    <title>Leen | Home</title>


    <!-- Scripts -->
</head>
<body>

<header>
    <div class="col-6 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">

        <div class="col-4 col-md-4 col-lg-4 pt-1">
            <div class="logo">
                <a href="{{route('index_p')}}"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
            </div>
        </div>
    </div>


    @guest
        @if (Route::has('login'))
            <div class="send_right d-flex justify-content-end">
                <a class="btn btn-lg btn-primary" href="{{route('login')}}"> Login</a>
                @endif
                @if (Route::has('register'))
                    <a class="btn btn-lg btn-primary" href="{{route('register')}}"> Register</a>
                @endif
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                @endguest

            </div>
</header>



        @yield('content')

</div>
</body>
</html>

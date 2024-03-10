<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">


    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/"/>
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/bootstrap-grid.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/rectangle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>

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
    <style>
        .user-dropdown {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }

        .user-info span {
            margin-right: 10px;
        }

        .user-dropdown img {
            width: 12px; /* adjust as needed */
            height: 12px; /* adjust as needed */
        }

        .dropdown-menu_user {
            display: none;
            position: absolute;
            right: 0;
            top: 17px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .user-dropdown:hover .dropdown-menu_user {
            display: block;
        }

        .dropdown-menu_user a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>


<header>
    <div class="col-6 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">

        <div class="col-4 col-md-4 col-lg-4 pt-1">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
            </div>
        </div>
    </div>
    @if(auth()->check())
        {{--        {{$name = auth()->user()->name}}--}}
    @endif
    <div class="send_right d-flex justify-content-end">
        @if(isset(auth()->user()->name))
            <div class="user-dropdown">
                <div class="user-info">


                    <span>{{auth()->user()->name}}  <img src="{{asset('img/down.png')}}"></span>

                </div>
                <div class="dropdown-menu_user">
                    <a href="{{route('profile')}}">Profile</a>
                    <a href="{{route('add_post')}}">Add new Post</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf

                    </form>

                </div>
            </div>
        @elseif(auth()->user() ==null)

            <a class="btn btn-lg btn-primary" href="{{url('register')}}"> Register</a>

        @endif
    </div>


</header>

@yield('content')
<script>
    $(document).ready(function () {
        var owl = $(".owl-carousel1");
        owl.owlCarousel({
            rtl: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 5,
                },
                1000: {
                    items: 8,
                },
            },
        });
    });
</script>

</html>

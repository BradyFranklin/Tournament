<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>GoatFarm</title>

    <!-- Preconnect Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tektur:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/main.css" />
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="/responsive.css" />
    <link rel="stylesheet" href="/tournament.css" />
    <link rel="stylesheet" href="/header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
{{--<header class="header-bar mb-3">--}}
{{--    <div class="container d-flex flex-column flex-md-row align-items-center p-3">--}}
{{--        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">OurApp</a></h4>--}}
{{--        <form action="#" method="POST" class="mb-0 pt-2 pt-md-0">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">--}}
{{--                    <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />--}}
{{--                </div>--}}
{{--                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">--}}
{{--                    <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />--}}
{{--                </div>--}}
{{--                <div class="col-md-auto">--}}
{{--                    <button class="btn btn-primary btn-sm">Sign In</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</header>--}}

<header class="header-bar-home">
    <div class="container d-flex flex-column flex-md-row align-items-center p-4">
        <!-- Logo/Brand -->
        <h4 class="my-0 mr-md-auto font-weight-normal d-flex align-items-center">
            <a href="/" class="text-white d-flex align-items-center">
                <img src="{{ asset('images/header-logo.png') }}" alt="Logo" class="mr-2 logo-img">
            </a>
        </h4>

        <!-- Navigation -->
        <nav class="d-none d-md-flex">
            <a href="/" class="text-white mx-2">Home</a>
            <a href="/about" class="text-white mx-2">About</a>
            <div class="dropdown">
                <a class="text-white mx-2 dropdown-toggle" href="#" id="eventsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Events
                </a>
                <div class="dropdown-menu" aria-labelledby="eventsDropdown">
                    <a class="dropdown-item" href="/events/upcoming">Upcoming Events</a>
                    <a class="dropdown-item" href="/events/past">Past Events</a>
                    <a class="dropdown-item" href="/events/calendar">Event Calendar</a>
                </div>
            </div>
        </nav>

        <!-- User Section -->
        <!-- If user is authenticated -->
        @auth
            <!-- Dropdown containing Profile and Dashboard Links -->
            <div class="dropdown">
                <a id="userDropdown" class="text-white mx-2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endauth

        <!-- If user is a guest -->
        @guest
            <!-- Login and Register Links -->
            <a href="{{ route('login') }}" class="text-white mx-2"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="{{ route('register') }}" class="text-white mx-2"><i class="fas fa-user-plus"></i> Register</a>
        @endguest
    </div>
</header>
<!-- header ends here -->

{{--<header>--}}
{{--    <div class="container">--}}
{{--        <nav class="navbar navbar-expand-lg navbar-light">--}}
{{--            <a class="navbar-brand" href="./index.html"><figure class="mb-0"><img src="./assets/images/crox_logo.png" alt=""></figure></a>--}}
{{--            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <ul class="navbar-nav">--}}
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="./index.html">Home</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="./about.html">About</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="./games.html">Games</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="./gallery.html">Gallery</a>--}}
{{--                    </li>--}}
{{--                    <li class="m-0">--}}
{{--                        <a class="navbar-brand" href="./index.html"><figure class="mb-0"><img src="./assets/images/crox_logo.png" alt=""></figure></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="./match_detail.html">Detail</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item mr-0">--}}
{{--                        <a class="nav-link" href="./contact.html">Contact</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item mr-1 ml-0">--}}
{{--                        <a class="nav-link login_btn" href="./login.html">Log in</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item ml-0">--}}
{{--                        <a class="nav-link signup_btn" href="./signup.html">Sign Up</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</header>--}}

{{$slot}}

<!-- footer begins -->
<footer class="border-top text-center small text-muted py-3">
    <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElements = document.querySelectorAll('.select2');
        selectElements.forEach(function(selectElement) {
            $(selectElement).select2({
                placeholder: "Select your games",
                allowClear: true,
            });
        });
    });
</script>
<script>
    $(window).on('scroll', function() {
        const header = $('.header-bar-home');
        if ($(window).scrollTop() > 0) {
            header.addClass('solid');
        } else {
            header.removeClass('solid');
        }
    });
</script>
</body>
</html>

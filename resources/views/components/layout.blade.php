<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>GoatFarm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/js/bootstrap.min.js">
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tektur:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/main.css" />
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
    @vite('resources/js/app.js')
</head>
<body>
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

<header class="header-bar">
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
        <div class="user-section ml-auto">
            <a href="/cart" class="text-white mx-2"><i class="fas fa-shopping-cart"></i></a>
            <a href="/profile" class="text-white mx-2"><i class="fas fa-user"></i> Kuroky</a>
        </div>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- costum css --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- toast.js --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>


</head>
<header>
    <nav class="is-navbar  navbar-expand-custom navbar-mainbg p0">
        <img class="bg-white m-1 me-5 my-2 rounded" src="{{ Storage::url('public/logo/') }}logo.png " alt=""
            style="height: 40px; width:60px;">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                {{--
                    If has Logged
                    --}}
                @if (Auth::user())
                    @if (Auth::user()->level == '2')
                        <li class="nav-item-home ">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i>Home</a>

                        </li>
                        <li class="nav-item-dashboard">
                            <a class="  nav-link" href="{{ route('index') }}"><i
                                    class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="nav-item-setting">
                            <a class="nav-link"><i class="fa-solid fa-hammer"></i>Settings</a>
                        </li>
                        <li class="nav-item-preview">
                            <a class="nav-link"><i class="fa-solid fa-eye"></i>Preview Page</a>
                        </li>
                        <li class="nav-item-logout">
                            <a class="nav-link" href="{{ route('user-logout') }}"><i
                                    class="fa-solid fa-right-from-bracket"></i>Log-Out</a>
                        </li>
                    @elseif (Auth::user()->level == '1')
                        <li class="nav-item-home">
                            <a class="nav-link" href="{{ route('landing-page') }}"><i
                                    class="fa-solid fa-house"></i>Home</a>
                        </li>
                        <li class="nav-item-shop">
                            <a class="nav-link" href="{{ route('showProduct') }}"><i
                                    class="fa-solid fa-store"></i>Shop</a>
                        </li>
                        <li class="nav-item-profile">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-user"></i>Profile</a>
                        </li>
                        <li class="nav-item-cart">
                            <a class="nav-link" href="{{ route('home') }}"><i
                                    class="fa-solid fa-cart-shopping"></i>Cart</a>
                        </li>
                        <li class="nav-item-logout">
                            <a class="nav-link" href="{{ route('user-logout') }}"><i
                                    class="fa-solid fa-house"></i>Log-out</a>
                        </li>
                    @endif
                @endif

                {{-- Non-Auth Access Navbar --}}
                @guest
                    <li class="nav-item-home ">
                        <a class="nav-link" href="{{ route('landing-page') }}"><i class="fa-solid fa-house"></i>Home</a>
                    </li>
                    <li class="nav-item-shop">
                        <a class="nav-link" href="{{ route('showProduct') }}"><i class="fa-solid fa-store"></i>Shop</a>
                    </li>
                    <li class="nav-item-cart">
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                    </li>
                    <li class="nav-item-login">
                        <a class="nav-link" href="{{ route('login-user') }}"><i
                                class="fa-solid fa-right-from-bracket"></i>Log-in/Register</a>
                    </li>
                @endguest
                {{-- End non-Auth --}}

            </ul>
        </div>
    </nav>
</header>

<body>
    <div class="container">
        @yield('content')
    </div>
    {{-- costum js (navbar) --}}
    <script src="{{ asset('/') }}assets/dist/js/navbar.js"></script>

    {{-- Toast Js --}}



    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @elseif (Session::has('info'))
                toastr.success('{{ Session::get('info') }}');
            @endif

        });
    </script>




</body>

</html>

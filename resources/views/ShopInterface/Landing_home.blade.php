@extends('layout.main')

<link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/LandingHome.css">

@section('content')
    <div class="showcase bg-primary">
        <div class="video-container">

        </div>
        <div class="text-center ">
            <h1>Unleash the power of technology to transform your world</h1>
            <h3>Unlock new possibilities with our innovative products.</h3>
            <a href="{{ route('showProduct') }}" class="btn-shop">Go Shop</a>
        </div>
    </div>

    <div id="about">
        <h1>About</h1>
        <p>
            At TechMart, we are passionate about technology and committed to providing you with the latest and most
            cutting-edge products. As a one-stop destination for all your tech needs, we offer a wide range of high-quality
            products, including PCs, laptops, smartphones, and various accessories.
        </p>

        <h2>Follow Me On Social Media</h2>

        <div class="social">
            <a href="" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
            <a href="" target="_blank"><i class="fab fa-facebook fa-3x"></i></a>
            <a href="" target="_blank"><i class="fab fa-github fa-3x"></i></a>
            <a href="" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
    </div>
@endsection

@extends('layout.main')

<link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/LandingHome.css">

@section('content')
    <section class="showcase">
        <div class="video-container">
            <video src="https://media.giphy.com/media/1yld7nW3oQ2IyRubUm/giphy.gif" autoplay muted loop></video>
        </div>
        <div class="content">
            <h1>Unleash the power of technology to transform your world</h1>
            <h3>Unlock new possibilities with our innovative products.</h3>
            <a href="{{ route('showProduct') }}" class="btn-shop">Go Shop</a>
        </div>
    </section>

    <section id="about">
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
    </section>
@endsection

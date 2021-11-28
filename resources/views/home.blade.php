@extends('layouts.master')
@section('page-name')
    Home
@endsection
@section('page-content')
<div class="home-page">
    <div class="container">
        <div class="images">
            <img src="img/logo_image.png" alt="logo_image" class="logo-image">
            <img src="img/logo_text.png" alt="logo_text" class="logo-text">
            <img src="img/logo_background.png" alt="logo_background" class="logo-background">
        </div>
        @if ($errors->any())
        <div class="white-space error-message">
            <h2 class="error-heading">Oh, something bad happened &#128551</h2>
            <ol class="list-of-errors">
                @foreach ($errors->all() as $error)
                <li>
                    <p class="error">{{ $error }}</p>
                </li>
                @endforeach
            </ol>
        </div>
        @endif
        <div class="text">
            <h1>We are 3D printing nerds!</h1>
            <h2>Best community of 3D printers</h2>
        </div>
    </div>
</div>

<div class="white-page reveal">
    <div class="container">
        <div class="model">
            <img src="img/shoe_model.jpg" alt="shoe_model" class="shoe-model">
        </div>
        <div class="text-model">
            <h2>The next</h2>
            <h1>Generation</h1>
            <h3>3D printing solution is here</h3>
            <p>
                We bring the future printing technology and solution for <br> you only at an affordable price
            </p>
            <img src="img/needle.png" alt="needle" class="needle">
            <a href="#" class="btn-explore">Explore now<span class="arrow"><i class="fa fa-arrow-right"></i></span></a>
        </div>
    </div>
</div>

<div class="we-are-3d reveal">
    <div class="container">
        <div class="text-we-are-3d">
            <img src="img/cubic.png" alt="cubic" class="cubic">
            <h1>We are<br>3 dimensional</h1>
            <h3>world’s no 01 3d printing specialist</h3>
            <div class="paragraphs">
                <p>
                    3 <strong>dimensional</strong>  largest Rapid Prototyping and Rapid Manufacturing Center.
                </p>
                <p>
                    We provide prototypes to an assortment of industries from jewellery, engineering, automotive, architecture, consumer goods, etc. With our diverse range of state-of-the-art equipment, we offer customers complete solutions.
                </p>
                <p>
                    With over 30 years of combined Rapid Prototyping experience, you can rest assured that Imaginarium can meet your needs. We believe in the highest calibre of service and adapt to the needs of each individual client. We listen, we internalize, we’re responsive, and we deliver projects on-time.
                </p>
            </div>
            <a href="#" class="know-more">know more</a>
        </div>
        <div class="image-we-are-3d">
            <img src="img/3_dimensional_object.png" alt="3_dimensional_object" class="3-dimensional-object">
        </div>
    </div>
</div>

<div class="world-of-3d reveal">
    <div class="container">
        <div class="paints">
            <img src="img/paints.png" alt="paints" class="paints">
        </div>
        <div class="text-world-of-3d">
            <h1>
                The<br>world of<br>3D print 
            </h1>

            <h2>
                Explore about 3D prints<br>
                and its possibilities.
            </h2>
            <ul class="content">
                <li><a href="#">What is 3D print?</a></li>
                <li><a href="#">How does 3D printing works?</a></li>
                <li><a href="#">3D printing industry</a></li>
                <li><a href="#">3D printing history</a></li>
                <li><a href="#">3D printing future</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="video-wrapper reveal">
    <div class="video-text">
        <img src="img/cubic_white.png" alt="cubic_white">
        <h3>Technology at its best times</h3>
        <h1>THE NEXT GENERATION TECHNOLOGY IS HERE,<br>
            WE HAVE 3D PRINTING</h1>
    </div>
    <video autoplay muted loop id="myVideo">
        <source src="vid/video.mp4" type="video/mp4">
    </video>
</div>

<div class="companies reveal">
    <div class="container">
        <div class="companies-text">
            <img src="img/cubic.png" alt="cubic">
            <h1>COMPANIES<br>WE WORK WITH</h1>
            <h3>THE BEST COMPANIES WE WORK WITH</h3>
        </div>
        <div class="companies-logos">
            <div class="company-image">
                <img src="img/company_logo_1.jpg" alt="company_logo_1">
            </div>
            <div class="company-image">
                <img src="img/company_logo_2.jpg" alt="company_logo_2">
            </div>
            <div class="company-image">
                <img src="img/company_logo_3.jpg" alt="company_logo_3">
            </div>
            <div class="company-image">
                <img src="img/company_logo_4.jpg" alt="company_logo_4">
            </div>
        </div>
    </div>
</div>

@endsection
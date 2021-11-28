@extends('layouts.master')
{{-- dedi z master layoutu --}}
@section('page-name')
    Services
@endsection
@section('page-content')
<div class="white-space">
    <div class="container">
        @if ($errors->any())
        <div class="error-message">
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
        <div class="main-services">
            <div class="service-images">
                <img src="img/service.png" alt="service">
            </div>
            <div class="service-text">
                <h1>SERVICES<br>WE ARE<br>EXPERT IN</h1>
                <h3>We provide prototypes to an<br>assortment of<br>
                    industries from jewellery,<br>engineering,<br>
                    automotive, architecture,<br>
                    consumer goods, etc.
                </h3>
                <p>For more information or have any idea to share with us<br>
                    or service realted any question please mail us.</p>
                <a href="#">Contact us for more support</a>
            </div>    
        </div>
    </div>
</div>

<div class="service-other">
    <div class="container">
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
</div>

<div class="we-are-experts">
    <div class="container">
        
    </div>
</div>
@endsection
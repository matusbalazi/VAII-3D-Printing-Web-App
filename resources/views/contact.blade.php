@extends('layouts.master')
{{-- dedi z master layoutu --}}
@section('page-name')
    Contact
@endsection
@section('page-content')
<div class="white-space">
    <div class="container">

        <div class="contact">
            <div class="contact-text">
                <img src="img/cubic.png" alt="cubic">
                <h1>GET IN TOUCH<br>WITH US</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with...</p>
            </div>

            <div class="contact-icons">
                <div class="address">
                    <div class="icon">
                        <img src="img/icon-map.png" alt="icon-map">
                    </div>
                    <div class="icon-text">
                        <h3>ADRESS</h3>
                        <p>Gitobuz technologies, AJ 325, saltlake, sec-2, Kolkata 91</p>
                    </div>
                </div>
                <div class="address">
                    <div class="icon">
                        <img src="img/icon-phone.png" alt="icon-phone">
                    </div>
                    <div class="icon-text">
                        <h3>PHONE</h3>
                        <p>Local: 033-84454566</p>
                        <p>Mobile: 4566475677</p>
                    </div>
                </div>
                <div class="address">
                    <div class="icon">
                        <img src="img/icon-email.png" alt="icon-email">
                    </div>
                    <div class="icon-text">
                        <h3>EMAIL ADRESS</h3>
                        <p>info@example.com</p>
                        <p>support@example.com</p>
                    </div>
                </div>
                <div class="address">
                    <div class="icon">
                        <img src="img/icon-time.png" alt="icon-time">
                    </div>
                    <div class="icon-text">
                        <h3>TIMING</h3>
                        <p>Monday – Saturday</p>
                        <p>10.30 – 8.30</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="images">
            
        </div>
        <div class="text">
            
        </div>
    </div>
</div>

<div class="contact-form">
    <div class="container">
        @if ($errors->any())
                <div class="w-full mb-4 p-4 error-list">
                    <h2 class="text-2xl secondary-font text-white font-bold mb-4">Ups... Nevyplnili formulár správne
                    </h2>
                    <ol class=" list-disc ml-8 text-white">
                        @foreach ($errors->all() as $error)
                        <li>
                            <p class="has-text-weight-bold text-gray-100">{{ $error }}</p>
                        </li>
                        @endforeach
                    </ol>
                </div>
                @endif
        <form action="{{ route("contact.store") }}" method="POST" class="contact-form-containers">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
            <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Surname" required>
            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
            <textarea name="message" rows="6" placeholder="Message" class="contact-textarea">{{ old('message') }}</textarea>
            <button type="submit" name="btn-submit" class="btn-submit">Submit Now</button>
        </form>
    </div>
</div>
@endsection
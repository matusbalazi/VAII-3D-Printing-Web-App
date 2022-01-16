@extends('layouts.master')
{{-- dedi z master layoutu --}}
@section('page-name')
    Contact
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
                        <p>3D Printing Nerds, Letná 45, 052 01 Spišská Nová Ves</p>
                    </div>
                </div>
                <div class="address">
                    <div class="icon">
                        <img src="img/icon-phone.png" alt="icon-phone">
                    </div>
                    <div class="icon-text">
                        <h3>PHONE</h3>
                        <p>Local: 012/34567890</p>
                        <p>Mobile: 01234567890</p>
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
                        <p>09.30 – 17.30</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="images">
            
        </div>
        <div class="text">
            
        </div>
        @auth   
            @if (Auth::user()->is_admin) 
                @if (!$contacts->isEmpty())
                    <h2 class="message-heading">LIST OF MESSAGES</h2>                   
                    <div class="list-of-messages">
                        <div class="contact-message"><h3>Name</h3></div>
                        <div class="contact-message"><h3>Surname</h3></div>
                        <div class="contact-message"><h3>Email</h3></div>
                        <div class="contact-message"><h3>Message</h3></div>       
                        @foreach ($contacts as $contact)       
                            <div class="contact-message">{{ $contact->name }}</div>
                            <div class="contact-message">{{ $contact->surname }}</div>
                            <div class="contact-message">{{ $contact->email }}</div>
                            <div class="contact-message message">{{ $contact->message }}</div>
                        @endforeach
                    </div>
                @endif  
            @endif
        @endauth
    </div>
</div>

<div class="contact-form">
    <div class="container">
        <form name="contactForm" action="{{ route("contact.store") }}" onsubmit="return validateContactForm()" method="POST" class="contact-form-containers">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
            <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Surname" required>
            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
            <textarea name="message" rows="6" placeholder="Message" class="contact-textarea">{{ old('message') }}</textarea>
            <button type="submit" name="btn-submit" class="btn-submit">Submit Now</button>
        </form>

        <h1 class="map-text">WHERE YOU CAN FIND US</h1>

        <div class="container-map">
            <div id="map"></div>
        </div>

    </div>
    
</div>
@endsection
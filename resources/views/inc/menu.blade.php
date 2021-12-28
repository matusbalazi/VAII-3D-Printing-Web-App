<header class="main-header {{ !Request::routeIs('home-page') ? 'header-blue' : '' }}" id="id-main-header"> 
    <div class="container">
        <div class="logo"><img src="/img/logo_main.png" alt="hlavne_logo" class="logo-main"></div>
        <div class="hamburger" id="hamburger-btn">
            <i class="fa fa-bars"></i>
        </div>
        <div class="links">
            <ul class="navigation">
                <li><a href="{{ route('home-page') }}" class="{{ Request::routeIs('home-page') ? 'selected' : '' }}">Home</a></li>
                <li><a href="{{ route('shop.index') }}" class="{{ Request::is('shop*') ? 'selected' : '' }}">Shop</a></li>
                <li><a href="{{ route('services-page') }}" class="{{ Request::routeIs('services-page') ? 'selected' : '' }}">Services</a></li>
                <li><a href="{{ route('gallery-page') }}" class="{{ Request::routeIs('gallery-page') ? 'selected' : '' }}">Gallery</a></li>
                <li><a href="{{ route('contact.index') }}" class="{{ Request::routeIs('contact.index') ? 'selected' : '' }}">Contact</a></li>
                <li>
                    @auth
                        <form action="{{ route('auth-logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout">LOGOUT</button>
                        </form>
                        @else
                            <a href="#" class="login">LOGIN</a>
                    @endauth
                </li>
                <li class="is-empty">
                    <div class="empty">cart is empty</div>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>   
            </ul>
        </div>
    </div>
</header>
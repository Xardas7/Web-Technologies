<header class="default-header">

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#catagory">Category</a></li>
                    <li><a href="#men">Men</a></li>
                    <li><a href="#women">Women</a></li>
                    <!-- Dropdown -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Pages
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/cart">Cart</a>
                            <a class="dropdown-item" href="/checkout">Checkout</a>
                            <a class="dropdown-item" href="/confermation">Confermation</a>
                            <a class="dropdown-item" href="/tracking">Tracking</a>
                            <a class="dropdown-item" href="/generic">Generic</a>
                            <a class="dropdown-item" href="/elements">Elements</a>
                        </div>
                    </li>
                    @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li>
                         <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    <ul class="list">

                    @endguest




                    @auth

                </ul>
                        <li class="dropdown">
                                <a class="navbar-brand" href="#" title="User">
                                    <i class="fa fa-user fa-2x"></i>
                                    <h6>User</h6>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                <a class="navbar-brand" href="/cart" title="Shopping cart">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                    <h6>Shopping Cart</h6>
                </a>
                <a class="navbar-brand" href="/wishlist" title="Wishlist">
                    <i class="fa fa-heart fa-2x" style="color:red;"></i>
                    <h6>Wishlist</h6>
                </a>

                @endauth
            </ul>
            </div>
        </div>
    </nav>
</header>

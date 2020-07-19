<header class="default-header">

    <nav class="navbar navbar-expand-lg navbar-light m-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" id="logo" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center row" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="col"><a href="/">Home</a></li>
                    <li class="col"><a href="/all-clothing">All</a></li>
                    <li class="col"><a href="/mens-clothing">Men</a></li>
                    <li class="col"><a href="/womens-clothing">Women</a></li>
                    <!-- Dropdown -->

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
                        <li class="dropdown" id="user-no-dot">
                                <a class="navbar-brand" href="#" title="User">
                                    <i class="fa fa-user fa-2x icon-navbar"></i>
                                    <h6>USER</h6>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/user/orders">
                                    MY ORDERS
                                </a>
                            <a class="dropdown-item" href="{{ route('user.settings') }}">
                                    SETTINGS
                                </a>
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
                    <i class="fa fa-shopping-cart fa-2x icon-navbar"></i>
                    <h6>SHOPPING CART</h6>
                </a>

                <a class="navbar-brand icon-navbar" href="/wishlist" title="Wishlist">
                    <i class="fa fa-heart fa-2x icon-navbar"></i>
                    <h6>WISHLIST</h6>
                </a>

                @endauth
            </ul>
            </div>
        </div>
    </nav>
</header>

<header>
    <div class="top-nav container">
        <div class="top-nav-left">
            <div class="logo"><a href="/">Ecommerce</a></div>
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))
                <ul>
                    <li>
                        <a href="{{route('shop.index')}}">
                            Shop
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contactUs')}}">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="{{route('shop.view_wishlist')}}">
                            Wishlist
                        </a>
                    </li>
                    @endif
                </ul>
            @endif
        </div>
        <div class="top-nav-right">
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))
                <ul>
                    @guest
                        <a class="logn" href="{{route('login')}}">Login</a>
                        <a class="logn" href="{{route('register')}}">Register</a>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('user/dashboard')}}">Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <p>{{ __('Logout') }}</p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li>
                        <a href="{{ route('cart.index') }}">Cart
                            @if (Cart::instance('default')->count() > 0)
                                <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                            @endif
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div> <!-- end top-nav -->
</header>


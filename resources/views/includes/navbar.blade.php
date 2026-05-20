
<div class="layout">
    <nav class="navbar">
        <div class="logo">
            <img src="https://thumbs.dreamstime.com/b/high-detail-texture-ancient-grimoire-cover-made-weathered-dark-stone-resembling-fossilized-shale-obsidian-375043762.jpg" alt="Grimore Logo">
        </div>
        <div class="home">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                {{-- <li><a href="{{ route('Stuffs') }}">Products</a></li> --}}
{{-- 
                @guest                       
                    <li><a href="{{ route('show.signup') }}">Register</a></li>
                    <li><a href="{{ route('show.login') }}">Login</a></li>  
                @endguest
                @auth('merchant')
                    <li><a href="{{ route('show.add.product') }}">Add Product</a></li>
                    <li><a href="{{ route('merchant.account') }}">My Account</a></li>
                @endauth
                @auth
                    <li><a href="{{ route('account') }}">My Account</a></li>

                    <li>
                        <form action="{{ route('loggedout') }} " method="POST">
                            @csrf
                            <button type="submit" class="logout">Logout</button>
                        </form> 
                    </li>   
                        
                                            <li>
                                                <form action="{{ route('cart') }}" method="GET">
                                                    <button type="submit" class="cart"><span>
                                                        <i class="fas fa-cart-shopping"></i> Cart
                                                    </span>
                                                    </button>
                                                </form>
                                            </li>
                                            
                                        @endauth --}}
                    
                    @guest
                        <li><a href="{{ route('show.signup') }}">Register</a></li>
                        <li><a href="{{ route('show.login') }}">Login</a></li>
                    @endguest

                    @auth() 
                        <li><a href="{{ route('account') }}">My Account</a></li>
                        <li>
                            <form action="{{ route('cart') }}" method="GET">
                                <button type="submit" class="cart">
                                    <i class="fas fa-cart-shopping"></i> Cart
                                </button>
                            </form>
                        </li>
                    @endauth
                
            </ul>
        </div>
        @if(!Request::is('My account'))
            <div class="search">
                <form action="{{ route('search') }}" method="GET">
        
                    <input type="text" name="query" placeholder="Search-bar" data-value="{{ old('query') }}">
                    <button>
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>
        @endif
    </nav>
</div>

<script src="{{ asset('js/nav.js') }}"></script>
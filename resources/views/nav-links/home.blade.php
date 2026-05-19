@include('includes.header')
@include('includes.navbar')
    {{-- <div class="hero">
        <video autoplay loop muted playsinline id="bg">
            <source src="https://motionbgs.com/media/9293/hunt-showdown-death-roots.960x540.mp4" type="video/mp4">
        </video>
        <div class="heading"><h2> Explore all contents 👇👇👇 </h2></div>
    </div> --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="slider">
                <h4>Category</h4>
                <ul class="navbar-nav">
                    @foreach ($categories as $category)
                        <li class="nav-item" id="category"><a href="{{ route('home') }}?category={{ $category->id }}" class="nav-link">{{ strtoupper($category->category_name) }}</a></li>
                    @endforeach
                </ul>
                <h4>Season Wears</h4>
                <ul class="navbar-nav">
                    @foreach ($seasons as $season)
                        <li class="nav-item" id="season"><a href="{{ route('home') }}?season={{ $season->id }}" class="nav-link">{{ ucfirst($season->season_name) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
             
            @foreach ($products->shuffle() as $product)
                {{-- Check product status, Matched category and season --}}
                @if ($product->product_status == 'inactive')
                    @continue
                @elseif (request('category') && $product->category->id != request('category'))
                    @continue
                @elseif (request('season') && $product->season->id != request('season'))
                    @continue
                @endif
            <a href="{{ route('product.details', $product->id) }}" class="pro_details" > 
                <div class="card">
                    <img src="{{ $product->product_image1 }}" alt="">
                    <h3 class="card-title">{{ Str::limit($product->product_name, 80, '...') }}</h3>
                    <p class="card-price">₹{{ $product->product_price }}/-</p>
                    <div class="card-actions">
                        <a href="#" class="btn1">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </a>
                        <button type="button" class="btn2 add-to-cart-btn" data-product-id="{{ $product->id }}" data-csrf="{{ csrf_token() }}"><span>
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </span>
                        </button>
                    </div>                
                </div>
            </a>    
            @endforeach
            @if ($products->isEmpty() || $products->every(function ($product) {
                return $product->product_status == 'inactive' ||
                    (request('category') && $product->category->id != request('category')) ||
                    (request('season') && $product->season->id != request('season'));
            }))
                <h1 class="empty-product" >Product Not Available</h1>
            @endif
            </div>
        </div>
    </div>
<script src="{{ asset('js/msg.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/addtocart.js') }}"></script>   
<script src="{{ asset('js/buynow.js') }}"></script>   

@include('includes.footer')
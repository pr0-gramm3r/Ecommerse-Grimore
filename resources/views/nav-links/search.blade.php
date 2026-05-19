@include('includes.header')
@include('includes.navbar')

<h2 class="empty-product" 
    style="width: 100%; text-align: center; color: yellowgreen;"
    >Results for "{{ $query }}"
</h2>
        <div class="row">
            @foreach ($products->shuffle() as $product)
                {{-- Check product status, Matched category and season --}}
                @if ($product->product_status == 'inactive')
                    @continue
                @endif
            <a href="{{ route('product.details', $product->id) }}" class="pro_details" > 
                <div class="card" style="margin-left: 5rem">
                    <img src="{{ $product->product_image1 }}" alt="">
                    <h3 class="card-title">{{ $product->product_name }}</h3>
                    <p class="card-price">₹{{ $product->product_price }}/-</p>
                    <div class="card-actions">
                        <a href="" class="btn1">
                            <i class="fas fa-buy"></i> Buy Now
                        </a>
                        <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="source" value="home">
                            <input type="hidden" name="quantity" value="1" required>
                            <button type="submit" class ="btn2"><span>
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </span>
                            </button>
                        </form>
                    </div>                
                </div>
            </a>    
            @endforeach
        </div>
            @if ($products->isEmpty() || $products->every(function ($product) {
                return $product->product_status == 'inactive';
            }))
                <h1 class="empty-product" >Product Not Available</h1>
            @endif
@include('includes.footer')
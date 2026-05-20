@include('includes.header')
@include('includes.navbar')

<div class="product-page">

    <div class="img-slider">
        <!-- small images -->
        <img src="{{ asset($product->product_image1) }}"
            alt="Slider Image 1" 
            class="slider-image" 
            onclick="setImage(this.src)">
        
        <img src="{{ asset($product->product_image2) }}" 
            alt="Slider Image 2" 
            class="slider-image" 
            onclick="setImage(this.src)">
        
        <img src="{{ asset($product->product_image3) }}" 
            alt="Slider Image 3" 
            class="slider-image" 
            onclick="setImage(this.src)">
        
        <img src="{{ asset($product->product_image4) }}" 
            alt="Slider Image 4" 
            class="slider-image" 
            onclick="setImage(this.src)">
    </div>

    <div class="image-view">
        <!-- main image -->
        <img src="{{ asset($product->product_image1) }}" 
            alt="{{ $product->product_name }}"
            class="main-image">
    </div>

    <div class="product-details">
        <!-- details -->
        <h2>{{ $product->product_name }}</h2>
        <p>Price: ₹ {{ $product->product_price }}/-</p>
        <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="product">
            <div class="quantity-wrapper">
                <input type="number" name="quantity" value="1" min="1" max="20" required>
            </div>
            <button type="submit"><span>
                <i class="fas fa-cart-plus"></i> Add to Cart
            </span>
            </button>
        </form>
        <p><h3>About this Item: </h3><br>{!! $product->product_description !!}</p>
    </div>
</div>

<script src="{{ asset('js/product.js') }}"></script>
@include('includes.footer')
@include('includes.header')
@include('includes.navbar')
<?php
$Total = 0;
foreach ($cartItems as $item) {
    $Total += $item->product->product_price * $item->quantity;
}
?>


<div class="cart-page">
    @if (isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
    
    @foreach ($cartItems as $item)
        <div class="cart-container" data-id="{{ $item->id }}">
            <div class="cart-item">
                <input type="hidden" name="source" value="product">            
                <a href="{{ route('product.details', $item->product->id) }}" class="cart-item" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset($item->product->product_image1) }}" alt="{{ $item->product->product_name }}" width="100">
                    <h3>{{ $item->product->product_name }}</h3>
                </a>
                <p>Price: <span>₹{{ $item->product->product_price }}/-</span></p>
            
                <div class="quantity-wrapper">
                    <input type="number" name="quantity" value="{{ $item->quantity ?? 1 }}" min="1" max="20" required>
                </div>
                <div class="show">

                    <form action="{{ route('remove.from.cart', $item->product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete"> Delete</button>
                    </form>
                </div>
            </div>            
        </div>
    @endforeach
</div>

<style>
    .cart-page {
        padding: 20px;
        color: white;
        width: 100%;
        text-align: center;
    }
</style>
<script src="{{ asset('js/msg.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<div class="total"> Total: <span>₹{{ $Total }}/-</span>
    <form action="{{ route('cart.buy.now') }}" method="POST">
        @csrf
        <button type="submit" class="buy"> Buy Now</button>
    </form>
</div>
@include('includes.footer')
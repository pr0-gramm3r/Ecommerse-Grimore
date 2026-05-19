<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Basic Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    
    <!-- Filled Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    
    <!-- Brand Icons -->
    <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/My-product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panchang.css') }}">
</head>
<body>
    @include('includes.navbar')
    <section>
        {{-- <div class="menu"><a href="#"><i class="bx bx-menu"></i></a></div> --}}
        <div class="contain">
            
            <div class="profile">
            
                <div class="pro-img">
                    <img src="{{ $user->avatar }}" alt="">
                </div>
                <div class="pro-name">
                    <p>{{ $user->name }}</p>
                </div>
            </div>
            <div class="sidebar">
                <div class="menu-content">
                    <ul>
                        {{-- <li><a href="#"><i class="bx bx-home"></i><span></span></a></li> --}}
                        <li><a href="#"><i class="bx bx-user"></i><span>My profile</span></a></li>
                        <li><a href="#"><i class="bx bx-cart-alt"></i> <span>My order</span></a></li>
                        <li><a href="#"><i class="bx bx-heart"></i><span>Wishlist</span></a></li>
                        <li><a href="#"><i class="bx bx-wallet-note"></i><span>Payment & refund</span></a></li>
                    </ul>
                </div>
                <div class="menu-contrntT">
                    <ul>
                        <li><a href="#"> <i class="bx bx-cog"></i><span>Setting</span></a></li>
                        <li>
                            <form action="{{ route('loggedout') }} " method="POST">
                                @csrf
                                <button type="submit" style="display: none;"></button>
                            </form>
                            <a href="#" onclick="event.preventDefault(); this.previousElementSibling.querySelector('button').click();">
                                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                            </a>
                        </li>
                        {{--  <li><a href="#"><i class="bx bx-trash"></i><span>Delete Account</span></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
            <div class="overlay">
        </div>


        {{-- <div class="content-panel" id="contentPanel">
                <button class="close-panel" id="closePanel">✕</button>
            <div id="panelBody"></div>
        </div> --}}
        <div class="content-panel" id="contentPanel">
            <button class="close-panel" id="closePanel">✕</button>
            <div id="panelBody">

                {{-- PROFILE --}}
                <div class="panel-section my-profile" id="section-profile">
                    <h2>My Profile</h2>
                    <div class="avatar-wrapper">
                        <img src="{{ $user->avatar }}" alt="Avatar" class="profile-avatar">
                        <label for="avatarInput" class="edit-avatar-btn">
                            <i class="bx bx-pencil"></i>
                        </label>
                        <form action="{{ route('profile.pic.update') }}" 
                        method="POST" 
                        id="avatarForm"                        
                        enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            
                            <input type="file" id="avatarInput" accept="image/*" style="display:none" name="avatar">
                        
                        </form>                        
                    </div>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Password:</strong> ********</p>
                    <a href="{{ route('profile.modify.show') }}"><i class="bx bx-edit"></i> Change name <br>Delete Account</a>
                </div>

                {{-- ORDERS --}}
                <div class="panel-section my-orders" id="section-orders">
                    <h2>My Orders</h2>
                    <p>No orders yet.</p>
                </div>

                {{-- WISHLIST --}}
                <div class="panel-section my-wishlist" id="section-wishlist">
                    <h2>Wishlist</h2>
                    @foreach ($cartItems as $item)
                        <div class="product-container">
                            <div class="product-item">
                                <a href="{{ route('product.details',$item->product->id) }}">
                                    <img src="{{ asset($item->product->product_image1) }}" alt="{{ $item->product->product_name }}" >
                                </a>
                                <h3>{{ $item->product->product_name }}</h3>
                                <p>Price: <span>{{ number_format($item->product->product_price, 2) }}/-</span></p>
                                <div class="quantity-wrapper">
                                    Quantity: {{ $item->quantity }}/-
                                </div>
                            </div>
                        </div>
                        
                        
                    @endforeach
                </div>
 
                {{-- PAYMENT --}}
                <div class="panel-section my-payment" id="section-payment">
                    <h2>Payment & Refund</h2>
                    <p>Default: UPI</p>
                </div>

                {{-- SETTING --}}
                <div class="panel-section my-setting" id="section-setting">
                    <h2>Settings</h2>
                    <p>Notifications: On</p>
                </div>

            </div>
        </div>
    </section>
<script src="{{ asset('js/account.js') }}"></script>
</body>

</html>
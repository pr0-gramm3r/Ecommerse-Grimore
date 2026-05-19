@include('merchant.merchantheader')
<title>Merchant Dashboard</title>
<body>
    <section>
        {{-- <div class="menu"><a href="#"><i class="bx bx-menu"></i></a></div> --}}
        <div class="contain">
            
            <div class="profile">
            
                <div class="pro-img">
                    <img src="{{ $merchant->merchant_avatar }}" alt="">
                </div>
                <div class="pro-name">
                    <p>{{ $merchant->merchant_name }}</p>
                </div>
            </div>
            <div class="sidebar">
                <div class="menu-content">
                    <ul>
                        {{-- <li><a href="#"><i class="bx bx-home"></i><span></span></a></li> --}}
                        <li><a href="#"><i class="bx bx-user"></i><span>My profile</span></a></li>
                        <li><a href="#"><i class="bx bx-cart-alt"></i> <span>My Products</span></a></li>
                        <li><a href="#"><i class="bx bx-wallet-note"></i><span>My Wallet</span></a></li>
                        {{-- <li><a href="#"><i class="bx bx-dollar-circle"></i><span>Earnings</span></a></li> --}}
                        <li>
                            <form action="{{ route('show.add.product') }}" method="GET">
                                <button type="submit" style="display: none;"></button>
                            </form>
                            <a href="#" onclick="event.preventDefault(); this.previousElementSibling.querySelector('button').click();">
                                <i class="bx bx-plus-circle"></i><span>Add Product</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu-contrntT">
                    <ul>
                        <li><a href="#"> <i class="bx bx-cog"></i><span>Setting</span></a></li>
                        <li>
                            <form action="{{ route('merchant.logout') }} " method="POST">
                                @csrf
                                <button type="submit" style="display: none;"></button>
                            </form>
                            <a href="#" onclick="event.preventDefault(); this.previousElementSibling.querySelector('button').click();">
                                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="overlay">
        </div>

        {{-- <div class="userData" 
                data-avatar="{{ $merchant->avatar }}"
                data-name="{{ $merchant->merchant_name }}"
                data-email="{{ $merchant->merchant_email }}" 
                data-password="********" 
                > 
        </div> --}}
        {{-- <div class="content-panel" id="contentPanel">
                <button class="close-panel" id="closePanel">✕</button>
            <div id="panelBody"></div>
        </div> --}}

        <div class="content-panel" id="contentPanel">
            <button class="close-panel" id="closePanel">✕</button>
            <div id="panelBody">

                {{-- MY PROFILE --}}
                <div class="panel-section my-profile" id="section-profile">
                    <h2>My Profile</h2>
                    <div class="avatar-wrapper">
                        <img src="{{ $merchant->merchant_avatar }}" alt="Avatar" class="profile-avatar">
                        <label for="avatarInput" class="edit-avatar-btn">
                            <i class="bx bx-pencil"></i>
                        </label>
                        <form 
                        action="{{ route('merchant.profilepic.update') }}" 
                        method="POST" 
                        id="avatarForm"
                        enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')

                            <input type="file" id="avatarInput" accept="image/*" style="display:none" name="merchant_avatar">

                        </form>
                    </div>
                    <p><strong>Name:</strong> {{ $merchant->merchant_name }}</p>
                    <p><strong>Email:</strong> {{ $merchant->merchant_email }}</p>
                    <p><strong>Password:</strong> ********</p>
                    <a href="{{ route('merchant.modify') }}"><i class="bx bx-edit"></i> Modify Details</a>
                
                </div>

                {{-- MY PRODUCTS --}}
                <div class="panel-section my-products">
                    <h2>My Products</h2>

                        @foreach ($products as $item)
                            <div class="product-container">
                                <div class="product-item">
                                    <img src="{{ asset($item->product_image1) }}" alt="{{ $item->product_name }}" width="100">
                                    <h3>{{ $item->product_name }}</h3>
                                    <p>Price: <span> ₹{{ $item->product_price }}/-</span></p>
                                    <div class="quantity-wrapper">
                                        Quantity : {{ $item->product_stock }}/-
                                    </div>
                                    <div class="show">
                                        <form action="{{ route('remove.My-product', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="delete"> Delete</button>
                                        </form>
                                    </div>
                                </div>            
                            </div>
                        @endforeach

                </div>
                
                {{-- MY WALLET --}}
                <div class="panel-section my-wallet">
                    <h2>My Wallet</h2>
                    <p>Wallet balance: $0.00</p>
                </div>
                
                {{-- MY EARNINGS --}}
                {{-- <div class="panel-section earnings">
                    <h2>My Earnings</h2>
                    <p>Total earnings: $0.00</p>
                </div> --}}

                {{-- MY SETTINGS --}}
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
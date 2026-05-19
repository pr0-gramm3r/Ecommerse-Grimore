    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grimore- Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <style>
            @font-face {
                font-family: 'Takota';
                src: url('{{ asset('fonts/Takota.otf') }}') format('opentype'),
                    url('{{ asset('fonts/Takota.ttf') }}') format('truetype');
            }
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward" />
    </head>
    <body>

        <!-- Hero: single positioned parent, children stack on top -->
        <section class="hero">
            <div class="bg">
                <img src="https://i.pinimg.com/1200x/38/e8/74/38e874b886466b02b32efd01d731acc4.jpg" alt="bg">
            </div>

            <div class="emblem">
                <div class="logo">
                    <img src="https://thumbs.dreamstime.com/b/high-detail-texture-ancient-grimoire-cover-made-weathered-dark-stone-resembling-fossilized-shale-obsidian-375043762.jpg" alt="Grimore logo">
                    <h1>Grimore</h1>
                </div>
            </div>

            <div class="label">
                <p><span class="grimore">Grimore</span> — Where Style Becomes <span class="identity">Identity</span></p>
            </div>
        </section>

        <!-- Cards -->
        <div class="swiper cards-swiper">
            <div class="swiper-wrapper main">
                @foreach ($cards as $card)
                    <div class="card swiper-slide">
                        <img src="{{ $card['pic'] }}" alt="User Portrait" class="bg-img">
                        <div class="blur" style="background-image: url({{ $card['pic'] }})"></div>
                        <div class="content">
                            <p>{{ $card['bio'] }}</p>
                            <div class="arrow">
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="Lower-view">

            {{-- ── Section 1: Shop ── --}}
            <section class="section-shop">
                <div class="shop-left">
                    <span class="shop-label">New Collection</span>
                    <h1>Ready to <em>Explore</em><br>Our Products?</h1>
                    <h3>Discover the perfect blend of style and functionality</h3>
                    <p>Shop our latest collection and find the perfect piece for your unique style. Whether you're looking for timeless classics or trendy statement pieces, we have something for everyone. Don't miss out on our exclusive offers and new arrivals. Start shopping now and elevate your wardrobe with our curated selection of fashion essentials! We are committed to providing you with the best shopping experience, offering high-quality products and exceptional customer service.</p>
                    <div class="btn-group">
                        <form action="{{ route('home') }}" method="get">
                            <button type="submit">Shop Now</button>
                        </form>
                        <form action="{{ route('show.signup') }}" method="get">
                            <button type="submit">Sign Up</button>
                        </form>
                        <form action="{{ route('show.login') }}" method="get">
                            <button type="submit">Sign In</button>
                        </form>
                    </div>
                </div>

                <div class="shop-right">
                    <div class="stat-row">
                        <div class="stat-item">
                            <div class="num">5K+</div>
                            <div class="lbl">Products</div>
                        </div>
                        <div class="stat-item">
                            <div class="num">98%</div>
                            <div class="lbl">Satisfaction</div>
                        </div>
                        <div class="stat-item">
                            <div class="num">120+</div>
                            <div class="lbl">Brands</div>
                        </div>
                    </div>
                    <p class="shop-right-text">We are committed to providing you with the best shopping experience — high-quality products, exceptional service, and exclusive offers delivered right to your door. Explore our collection today and let your style shine!</p>
                </div>
            </section>

            {{-- ── Section 2: Partner ── --}}
            <section class="section-partner">
                <div class="partner-left">
                    <span class="partner-label">Partnership</span>
                    <h1>Do You Have What It Takes to Be Our <span>Partner?</span></h1>
                    <h3>Join our team and become a part of something amazing!</h3>
                    <p>We are looking for passionate and driven individuals to join our team as partners. As a partner, you will have the opportunity to collaborate with us on exciting product marketing initiatives, contribute your unique skills and ideas, and be a part of a dynamic and innovative company. Whether you're a Merchant, an Advisor, or someone with a passion for our industry, we want to hear from you!</p>
                </div>

                <div class="partner-right">
                    <div class="divider-line"></div>
                    <div class="partner-tags">
                        <span class="tag">Merchant</span>
                        <span class="tag">Advisor</span>
                        <span class="tag">Influencer</span>
                        <span class="tag">Distributor</span>
                    </div>
                    <p class="partner-right-text">Together we can shape the future of our brand and make a meaningful impact on the world. If you have what it takes, explore the possibilities with us — great things await!</p>
                    <form action="{{ route('merchant.dashboard') }}" method="GET">
                        <button type="submit">Become a Partner</button>
                    </form>
                </div>
            </section>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>

    </body>
    </html>
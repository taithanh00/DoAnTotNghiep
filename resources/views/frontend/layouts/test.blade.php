@vite('resources/views/frontend/layouts/css/dist/css-main/test.css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<body>
    <header class="header">
        <div class="header-inner wrapper" data-aos="zoom-out-right" data-aos-delay="200" data-aos-once="true">
            <h1 class="title">
                Products found !
            </h1>
        </div>
    </header>
    <main class="main" role="main" data-aos="zoom-out-right" data-aos-delay="400" data-aos-once="true">
        <div class="main-inner wrapper">
            <ul class="product-list ul-reset">
                @foreach ($products as $product)
                    <li class="product-item ib">
                        <section class="product-item-inner">
                            <div class="product-item-image">
                                <img src="{{ $product->product_img }}" alt="">
                            </div>
                            <h1 class="product-item-title">
                                {{ $product->product_name }}
                            </h1>
                            <div class="product-item-rrp-price-saving">
                                <div class="product-item-rrp">
                                    Rating: {{ $product->product_rating }}
                                </div>

                                <div class="product-item-price">
                                    {{ $product->color }}
                                    <br><br><br>
                                </div>
                                <div class="product-item-saving">
                                    {{ $product->price }}
                                </div>
                            </div>
                        </section>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

@vite('resources/views/frontend/layouts/css/dist/css-main/product.css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
        var cont = 0;

        function loopSlider() {
            var xx = setInterval(function() {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;
                        break;
                    }
                    case 1: {
                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");

                        cont = 0;

                        break;
                    }


                }
            }, 8000);

        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }



        function sliderButton1() {

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 0

        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 1

        }

        $(window).ready(function() {
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");
        });
    </script>
    <style>
        #search-bar {
            margin: 0 auto;
            width: 100%;
            height: 45px;
            padding: 0 20px;
            font-size: 1rem;
            border: 1px solid #D0CFCE;
            outline: none;
        }

        input#search-bar:focus {
            border: 1px solid #008ABF;
            transition: 0.35s ease;
            color: #008ABF;
        }

        input#search-bar:focus::-webkit-input-placeholder {
            transition: opacity 0.45s ease;
            opacity: 0;
        }

        input#search-bar:focus::-moz-placeholder {
            transition: opacity 0.45s ease;
            opacity: 0;
        }

        input#search-bar:focus:-ms-placeholder {
            transition: opacity 0.45s ease;
            opacity: 0;
        }

        .search-icon {
            position: relative;
            float: right;
            width: 75px;
            height: 75px;
            top: -61px;
            right: -57px;
        }
    </style>
</head>

<body>
    <div class="w-full h-full  bg-[#f1f6f9] scroll-smooth overflow-hidden">
        <div class="product-h4" data-aos="flip-up" data-aos-anchor-placement="top-bottom" data-aos-delay="1100"
            data-aos-once="true">
            <h4 class="rainbow-text" id="product-h4">Our Product<h4>
        </div>
        <div class="div-search pt-[75px]" data-aos="flip-up" data-aos-anchor-placement="top-bottom"
            data-aos-delay="1100" data-aos-once="true">
            <form action="{{ route('search') }}" method="post"
                class="search-container w-[490px] block my-0 mx-auto relative max-w-none">
                @csrf
                <input type="text" id="search-bar" placeholder="What are products that you want to know more ?"
                    name="search">
                <a href="#"><img class="search-icon"
                        src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
            </form>
        </div>
        <div class="py-[80px] px-0" id="shell" data-aos="flip-down" data-aos-anchor-placement="top-bottom"
            data-aos-delay="1500" data-aos-once="true">
            <div class="product-category min-h-[200px] mb-10">
                <div class="sliderAx h-auto">
                    <div id="slider-1" class="container mx-auto">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://cdn.honda.com.vn/spare-parts/October2022/HQwAel7UTAj7BiwLzM3a.png"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">
                                                    {{ $brand[0] }}
                                                </span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[0] }}
                                                </h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]">
                                                    {{ $product_des[0] }}
                                                </p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left">
                                                    <span class=" text-[18px] font-bold product-price">
                                                        {{ $product_price[0] }} <span>vnd</span>
                                                    </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form1" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form1" value="form1">
                                                        <input type="hidden" id="product_name1" name="product_name1"
                                                            value="{{ $product_name[0] }}" required>
                                                        <input type="hidden" id="product_price1" name="product_price1"
                                                            value="{{ $product_price[0] }}" required>
                                                        @if (session('username'))
                                                            <button type="submit" value="form1" id="form1"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://cdn.honda.com.vn/spare-parts/December2019/IuMc99XSVWuHCu2O6LnY.png"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[3] }}
                                                </h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]">
                                                    {{ $product_des[3] }}
                                                </p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left">
                                                    <span class=" text-[18px] font-bold product-price">
                                                        {{ $product_price[3] }} <span>vnd</span>
                                                    </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form2" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form2" value="form2">
                                                        <input type="hidden" id="product_name2" name="product_name2"
                                                            value="{{ $product_name[3] }}">
                                                        <input type="hidden" id="product_price2"
                                                            name="product_price2" value="{{ $product_price[3] }}">
                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2019/12/MSSS-1.jpg&h=200&w=255"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[1] }}
                                                </h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]">
                                                    {{ $product_des[1] }}
                                                </p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left"><span
                                                        class=" text-[18px] font-bold product-price">
                                                        {{ $product_price[1] }} <span>vnd</span>
                                                    </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form3" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form3" value="form3">
                                                        <input type="hidden" id="product_name3" name="product_name3"
                                                            value="{{ $product_name[1] }}">
                                                        <input type="hidden" id="product_price3"
                                                            name="product_price3" value="{{ $product_price[1] }}">
                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/cba33ceaf1673e5cfd969943519297db.png&h=200&w=255"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[2] }}</h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]"> {{ $product_des[2] }}</p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left"><span
                                                        class=" text-[18px] font-bold product-price">{{ $product_price[2] }}
                                                        <span>vnd</span> </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form4" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form4" value="form4">
                                                        <input type="hidden" id="product_name4" name="product_name4"
                                                            value="{{ $product_name[2] }}">
                                                        <input type="hidden" id="product_price4"
                                                            name="product_price4" value="{{ $product_price[2] }}">
                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://shop2banh.vn/images/thumbs/2023/02/bo-ve-sinh-loc-gio-stb-chinh-hang-products-1999.png"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[2] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[4] }}</h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]">{{ $product_des[4] }}</p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left"><span
                                                        class=" text-[18px] font-bold product-price">
                                                        {{ $product_price[4] }} <span>vnd</span>
                                                    </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form5" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form5" value="form5">
                                                        <input type="hidden" id="product_name5" name="product_name5"
                                                            value="{{ $product_name[4] }}">
                                                        <input type="hidden" id="product_price5"
                                                            name="product_price5" value="{{ $product_price[4] }}">

                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://drive.gianhangvn.com/image/cam-bien-khi-xa-suzuki-carry-amp-500kg-1513119j29348x3.jpg"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[2] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">

                                                    {{ $product_name[5] }}</h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]">{{ $product_des[5] }}</p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left"><span
                                                        class=" text-[18px] font-bold product-price">{{ $product_price[5] }}
                                                        <span>vnd</span> </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form6" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form6" value="form6">
                                                        <input type="hidden" id="product_name6" name="product_name6"
                                                            value="{{ $product_name[5] }}">
                                                        <input type="hidden" id="product_price6"
                                                            name="product_price6" value="{{ $product_price[5] }}">

                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div
                                        class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://kawasakisaigon.com/upload/hinhanh/thumb/windshieldcafe-vulcan-s-model-year-2015.jpg"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[3] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[6] }}</h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]"> {{ $product_des[6] }}</p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left"><span
                                                        class=" text-[18px] font-bold product-price">{{ $product_price[6] }}
                                                        <span>vnd</span></span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form7" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form7" value="form7">
                                                        <input type="hidden" id="product_name7" name="product_name7"
                                                            value="{{ $product_name[6] }}">
                                                        <input type="hidden" id="product_price7"
                                                            name="product_price7" value="{{ $product_price[6] }}">

                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 absolute z-10 ml-[571px] mt-[-440px]">
                                    <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] product-card">
                                        <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                            <img src="https://kawasakisaigon.com/upload/hinhanh/thumb/grip-heater-kit-ninja-ninja-1000.jpg"
                                                alt="Product" class="w-full rounded-[6px]" />
                                        </div>
                                        <div class="pt-[150%] product-text">
                                            <div
                                                class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                                <span
                                                    class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[3] }}</span>
                                            </div>
                                            <div class="text-center product-title">
                                                <h3
                                                    class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                                    {{ $product_name[7] }}</h3>
                                            </div>
                                            <div
                                                class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                                <p class="m-0 text-[13px]"> {{ $product_des[7] }}</p>
                                            </div>
                                            <div
                                                class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                                <div class="float-left product-left">
                                                    <span class="text-[18px] font-bold product-price">

                                                        {{ $product_price[7] }} <span>vnd</span>



                                                    </span>
                                                </div>
                                                <div class="float-right product-right">
                                                    <form name="form8" action="{{ route('addtocart') }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="form8" value="form8">
                                                        <input type="hidden" id="product_name8" name="product_name8"
                                                            value="{{ $product_name[7] }}">
                                                        <input type="hidden" id="product_price8"
                                                            name="product_price8" value="{{ $product_price[7] }}">

                                                        @if (session('username'))
                                                            <button type="submit"
                                                                class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                                    hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                                    active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                                    focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                                    product-buy">
                                                                <ion-icon name="storefront-outline"></ion-icon></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[531px] h-[589px] bg-[#f1f6f9] mt-[-607px] rounded-[6px] ml-[12px] object-cover"
                                    id="product-img-last">
                                    <img src="https://i.pinimg.com/564x/e5/6d/60/e56d60f61c3348382c30fd8b7cb4e863.jpg"
                                        alt="" width="auto" height="606px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="slider-2" class="container mx-auto overflow-hidden">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[8] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">
                                            {{ $brand[0] }}
                                        </span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[8] }}
                                        </h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]">
                                            {{ $product_des[8] }}
                                        </p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left">
                                            <span class=" text-[18px] font-bold product-price">
                                                {{ $product_price[8] }} <span>vnd</span>
                                            </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form9" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form9" value="form9">
                                                <input type="hidden" id="product_name9" name="product_name9"
                                                    value="{{ $product_name[8] }}" required>
                                                <input type="hidden" id="product_price9" name="product_price9"
                                                    value="{{ $product_price[8] }}" required>
                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[9] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[9] }}
                                        </h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]">
                                            {{ $product_des[9] }}
                                        </p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left">
                                            <span class=" text-[18px] font-bold product-price">
                                                {{ $product_price[9] }} <span>vnd</span>
                                            </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form10" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form10" value="form10">
                                                <input type="hidden" id="product_name10" name="product_name10"
                                                    value="{{ $product_name[9] }}">
                                                <input type="hidden" id="product_price10" name="product_price10"
                                                    value="{{ $product_price[9] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[10] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[10] }}
                                        </h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]">
                                            {{ $product_des[10] }}
                                        </p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">
                                                {{ $product_price[10] }} <span>vnd</span>
                                            </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form11" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form11" value="form11">
                                                <input type="hidden" id="product_name11" name="product_name11"
                                                    value="{{ $product_name[10] }}">
                                                <input type="hidden" id="product_price11" name="product_price11"
                                                    value="{{ $product_price[10] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[11] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[11] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[11] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[11] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form12" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form12" value="form12">
                                                <input type="hidden" id="product_name12" name="product_name12"
                                                    value="{{ $product_name[11] }}">
                                                <input type="hidden" id="product_price12" name="product_price12"
                                                    value="{{ $product_price[11] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[12] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[12] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[12] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[12] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form12" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form13" value="form13">
                                                <input type="hidden" id="product_name13" name="product_name13"
                                                    value="{{ $product_name[12] }}">
                                                <input type="hidden" id="product_price13" name="product_price13"
                                                    value="{{ $product_price[12] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[13] }}" alt="Product" class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[0] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[13] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[13] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[13] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form14" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form14" value="form14">
                                                <input type="hidden" id="product_name14" name="product_name14"
                                                    value="{{ $product_name[13] }}">
                                                <input type="hidden" id="product_price14" name="product_price14"
                                                    value="{{ $product_price[13] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[14] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[14] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[14] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[14] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form15" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form15" value="form15">
                                                <input type="hidden" id="product_name15" name="product_name15"
                                                    value="{{ $product_name[14] }}">
                                                <input type="hidden" id="product_price15" name="product_price15"
                                                    value="{{ $product_price[14] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[15] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[15] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[15] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[15] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form16" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form16" value="form16">
                                                <input type="hidden" id="product_name16" name="product_name16"
                                                    value="{{ $product_name[15] }}">
                                                <input type="hidden" id="product_price16" name="product_price16"
                                                    value="{{ $product_price[15] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[16] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[16] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[16] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[16] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form17" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form17" value="form17">
                                                <input type="hidden" id="product_name17" name="product_name17"
                                                    value="{{ $product_name[16] }}">
                                                <input type="hidden" id="product_price17" name="product_price17"
                                                    value="{{ $product_price[16] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[17] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[1] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[17] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[17] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[17] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form18" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form18" value="form18">
                                                <input type="hidden" id="product_name18" name="product_name18"
                                                    value="{{ $product_name[17] }}">
                                                <input type="hidden" id="product_price18" name="product_price"
                                                    value="{{ $product_price[17] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[18] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[2] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[18] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[18] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[18] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form19" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form19" value="form19">
                                                <input type="hidden" id="product_name19" name="product_name19"
                                                    value="{{ $product_name[18] }}">
                                                <input type="hidden" id="product_price19" name="product_price19"
                                                    value="{{ $product_price[18] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-[#fff] p-[15px] rounded-[6px] relative my-[20px] mx-auto product-card">
                                <div class="absolute top-[5px] left-[50%] w-full p-[15px] product-image">
                                    <img src="{{ $product_img[19] }}" alt="Product"
                                        class="w-full rounded-[6px]" />
                                </div>
                                <div class="pt-[150%] product-text">
                                    <div
                                        class="text-center text-[12px] font-bold p-[5px] mb-[45px] relative product-category">
                                        <span
                                            class="py-[12px] px-[30px] bg-[#212121] text-[#fff] rounded-[27px]">{{ $brand[3] }}</span>
                                    </div>
                                    <div class="text-center product-title">
                                        <h3
                                            class="text-[20px] font-bold my-[15px] mx-auto overflow-hidden whitespace-nowrap text-ellipsis w-full">
                                            {{ $product_name[19] }}</h3>
                                    </div>
                                    <div
                                        class="text-center w-full h-[62px] overflow-hidden mb-[15px] product-description">
                                        <p class="m-0 text-[13px]"> {{ $product_des[19] }}</p>
                                    </div>
                                    <div
                                        class="pt-[25px] pb-0 px-[5px] product-card-footer before:table after:table after:clear-both">
                                        <div class="float-left product-left"><span
                                                class=" text-[18px] font-bold product-price">{{ $product_price[19] }}
                                                <span>vnd</span> </span>
                                        </div>
                                        <div class="float-right product-right">
                                            <form name="form20" action="{{ route('addtocart') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="form20" value="form20">
                                                <input type="hidden" id="product_name20" name="product_name20"
                                                    value="{{ $product_name[19] }}">
                                                <input type="hidden" id="product_price20" name="product_price20"
                                                    value="{{ $product_price[19] }}">

                                                @if (session('username'))
                                                    <button type="submit"
                                                        class="block text-[#212121] text-center text-[18px] w-[35px] h-[35px] leading-[35px] rounded-[50%]
                                            hover:border-[#ff9800] hover:bg-[#ff9800] hover:text-[#fff] hover:no-underline
                                            active:border-[#ff9800] active:bg-[#ff9800] active:text-[#fff] active:no-underline
                                            focus:bg-[#ff9800] focus:border-[#ff9800] focus:text-[#fff] focus:no-underline
                                            product-buy">
                                                        <ion-icon name="storefront-outline"></ion-icon></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="previous-next w-full bg-[#f1f6f9]">
        <div class="flex justify-between w-12 mx-auto pb-2 bg-[#f1f6f9]">
            <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
            <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

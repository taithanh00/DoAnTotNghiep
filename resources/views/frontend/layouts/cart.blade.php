<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@vite('resources/views/frontend/layouts/css/dist/css-main/cart.css')
<title>Cart</title>
<section class="h-100 h-auto" id="cart_main">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8" id="cart_product">
                                <form action="{{ route('update-cart') }}" method="POST" enctype="multipart/form-data"
                                    autocomplete="off">
                                    @csrf
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black" id="cart_h1">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{ $cart_count }} items</h6>
                                        </div>
                                        <hr class="my-4">
                                        <div class="cart-product-main"
                                            style="width: 650px; height: 300px; overflow-y:scroll;overflow-x: hidden">
                                            @foreach ($cart as $cartt)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ $cartt->product_img }}" class="img-fluid rounded-3"
                                                            alt="Img_Cart">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">{{ $cartt->category_name }}</h6>
                                                        <h6 class="text-black mb-0">{{ $cartt->product_name }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="hidden" value="{{ $cartt->id }}"
                                                            name="id[]">
                                                        <input id="form1" min="0"
                                                            name="quantity[{{ $cartt->id }}]"
                                                            value="{{ $cartt->quantity }}" type="number"
                                                            class="form-control form-control-sm" />
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">
                                                            {{ $cartt->product_price * $cartt->quantity }} <br>
                                                            <span>vnd</span>
                                                        </h6>
                                                    </div>
                                                    <form action="{{ route('delete-cart', $cartt->id) }}" method="POST"
                                                        autocomplete="off">
                                                        @csrf
                                                        {{-- <input type="hidden" name="cart_item_id" value="{{ $cartt->cart_item_id }}"> --}}
                                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end" style="margin-right: 30px">
                                                            <button type="submit" class="text-muted"
                                                                id="delete-button">
                                                                <ion-icon name="close-outline"></ion-icon>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr class="my-4">
                                        <div class="pt-5">
                                            <h6 class="mb-0">
                                                <a href="{{ route('home') }}" class="text-body">
                                                    <div class="mt-[10px]">
                                                        <ion-icon name="arrow-back-circle-outline"
                                                            class="w-[50px] h-[50px]"></ion-icon>
                                                    </div>
                                                    Back to shop
                                                </a>
                                            </h6>
                                            <button type="submit" class="fancy">
                                                <span class="top-key"></span>
                                                <span class="text">Update Cart</span>
                                                <span class="bottom-key-1"></span>
                                                <span class="bottom-key-2"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 bg-grey" id="cart_summmary">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1" id="cart_h3">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items: {{ $cart_count }}</h5>
                                        <h5>{{ $total }}</h5>
                                    </div>

                                    {{-- <h5 class="text-uppercase mb-3">Shipping</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Payment on delivery</option>
                                                <option value="2">Giaohangnhanh</option>
                                                <option value="3">Giaohangtietkiem</option>
                                                <option value="4">ViettelPost</option>
                                            </select>
                                        </div> --}}
                                    <form action="{{ route('applycoupon') }}" method="POST">
                                        @csrf
                                        <h5 class="text-uppercase mb-3">Coupon code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="coupon_code" name="coupon_code"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Enter your
                                                    code</label>
                                            </div>
                                            {{-- <div class="form-outline">
                                                <div class="input-group">
                                                    <input placeholder="Enter new item here" type="text"
                                                        id="input-field">
                                                    <button class="submit-button"><span>ADD</span></button>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>{{ $total_after_discount }}</h5>
                                        </div>

                                        <button type="submit" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">ApplyCoupon
                                        </button>
                                    </form>
                                </div>
                                <div class="pay">
                                    <form action="{{ route('payment') }}" method="POST">
                                        @csrf
                                        <button class="cta">
                                            <span class="hover-underline-animation"> On Deliver </span>
                                            <svg viewBox="0 0 46 16" height="10" width="30"
                                                xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                                                <path transform="translate(30)"
                                                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                                    data-name="Path 10" id="Path_10"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="/frontend/checkout" method="POST">.
                                        @csrf
                                        <button class="cta">
                                            <span class="hover-underline-animation">On Credit Card</span>
                                            <svg viewBox="0 0 46 16" height="10" width="30"
                                                xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                                                <path transform="translate(30)"
                                                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                                    data-name="Path 10" id="Path_10"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                {{-- <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <button id="payment_button">
                                            On Cart
                                        </button>
                                    </form> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

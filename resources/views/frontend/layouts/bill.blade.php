<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</header>

<body>
    <div class="card bg-[#f1f6f9]">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9 ml-7">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt;
                            <strong>ID:{{ $invoice->id }}</strong></p>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="far fa-building fa-4x ms-0" style="color:#8f8061 ;"></i>
                            <p
                                class="pt-2 text-[45px] font-semibold text-[#212A3E] no-underline hover:no-underline hover:text-[#9BA4B5]">
                                HienNguyen</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 ml-4">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#8f8061 ;">{{ $invoice->first_name }}
                                        {{ $invoice->last_name }} </span></li>
                                <li class="text-muted">{{ $invoice->stress_address }}</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> {{ $invoice->phone_number }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4 ml-4">
                            <p class="text-muted text-[30px] font-bold">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
                                        class="fw-bold">Creation Date: </span>{{ $invoice->created_at }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#8f8061;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-success text-white fw-bold">
                                        Payed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row my-2 mx-1 justify-content-center">
                        @foreach ($product_list as $product)
                            <div class="col-md-2 mb-4 mb-md-0">
                                <div class="bg-image ripple rounded-5 mb-4 overflow-hidden d-block"
                                    data-ripple-color="light">
                                    <img src="{{ $product->product_img }}" class="w-100" height="100px"
                                        alt="Elegant shoes and shirt" />
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-7 mb-4 mb-md-0">
                                <p class="fw-bold">{{ $product->product_name }}</p>
                                <p class="mb-1">
                                    <span class="text-muted me-2">Quantity:</span><span>{{ $product->quantity }}</span>
                                </p>

                            </div>
                            <div class="col-md-3 mb-4 mb-md-0">
                                <h5 class="mb-2">
                                    <p class="text-success me-2 small align-middle">{{ $product->product_price }}</p>
                                </h5>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>
                        </div>
                        <div class="col-xl-3">
                            {{-- <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1050</li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Shipping</span>$15</li>
                            </ul> --}}
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                    style="font-size: 25px;" class="text-red-600">{{ $total_price }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

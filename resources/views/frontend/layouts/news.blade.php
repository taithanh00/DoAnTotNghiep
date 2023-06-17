<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</header>

<body class="bg-[#f1f6f9]">
    {{-- <div class="container-text w-[320px] h-[320px] top-1/2 left-1/2 ">
        <h1 class="h1-text-news bg-[#fff] w-full h-full m-0 p-0 flex text-[90px] font-bold align-content-center justify-center"><span>WEB<br>CSS3</span></h1>
        <div class="blobs_1"></div>
        <div class="blobs_2"></div>
        <div class="blobs_3"></div>
        <div class="blobs_4"></div>
        <div class="blobs_5"></div>
        <div class="blobs_6"></div>
        <div class="blobs_7"></div>
    </div> --}}

    <div class="container pt-[200px] bg-[#f1f6f9]">
        <section class="border-bottom pb-4 mb-5" data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
            <div class="row gx-5">
                <div class="col-md-6 mb-4">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <img src="https://kawasakivietnam.vn/data/images/tin%20t%E1%BB%A9c/KAWASAKI%20EV/kawasaki-ev-thuong-motor-1.png"
                            class="img-fluid" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
                    <h4><strong>KAWASAKI EV MẪU MOTOR ĐIỆN ĐƯỢC LỘ DIỆN SẮP CÓ MẶT TẠI VIỆT NAM</strong></h4>
                    <p class="text-muted">
                        Về thiết kế, Kawasaki EV được cho là vay mượn từ thiết kế của dòng mô tô thuộc gia đình Kawasaki
                        Z. Nguyên mẫu xe điện này EV có mặt trước ấn tượng, bình xăng chạm khắc cơ bắp, các tấm ốp trên
                        thân xe sắc nét, khung xe lộ thiên và yên ngồi được thiết kế hai nấc. Xe có hệ thống chiếu sáng
                        hoàn toàn bằng bóng LED, thanh tay lái phẳng hơi thấp và thiết kế chỗ để chân lùi nhẹ về phía
                        sau.
                    </p>
                    <button type="button" class="btn btn-info bg-orange-400">Read more</button>
                </div>
            </div>
        </section>
        <section class="no-underline" data-aos="fade-down" data-aos-delay="500" data-aos-once="true">
            <div class="row gx-lg-5">
                @foreach ($news_detail as $news_d)
                    @php
                        $result = DB::table('news')
                            ->join('brands', 'news.brands_id', '=', 'brands.id')
                            ->select('brands.BrandName')
                            ->where('news.id', $news_d->news_id)
                            ->first();
                        $brandName = $result->BrandName;
                    @endphp
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
                        <!-- News block -->
                        <div>
                            <!-- Featured image -->
                            <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4"
                                data-mdb-ripple-color="light">
                                <img src="{{ $news_d->image }}" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>

                            <!-- Article data -->
                            <div class="row mb-3 no-underline">
                                <div class="col-6">
                                    <a href="" class="text-info no-underline">
                                        <i class="fas fa-plane"></i>
                                        {{ $brandName }}
                                    </a>
                                </div>

                                <div class="col-6 text-end">
                                    <u class="no-underline">{{ $news_d->date_news }}</u>
                                </div>
                            </div>

                            <!-- Article title and description -->
                            <a href="" class="text-dark no-underline">
                                <h5 class="">{{ $news_d->title }}</h5>

                                <p>
                                    {{ Str::limit($news_d->content, 350) }}
                                </p>
                                @if (strlen($news_d->content) > 350)
                                    <a href="#" class=" no-underline text-purple-600">Xem thêm</a>
                                @endif
                            </a>

                            <hr />
                        </div>
                        <!-- News block -->
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

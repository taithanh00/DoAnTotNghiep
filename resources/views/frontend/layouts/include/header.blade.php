<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hien Nguyen.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    @vite('resources/views/frontend/layouts/include/header.css')
</head>

<body class="text-[#0b0c10]">
    @if (session('username'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<span class="swal2-title float-left">Welcome, {{ session('username') }}</span>'
            })
        </script>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    {{-- <a href="https://flowbite.com/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a> --}}
    <nav
        class="bg-[#9DB2BF] dark:bg-gray-900 fixed w-screen top-0 left-0 border-0 border-gray-200 dark:border-gray-600 z-10">
        <div class="max-w-screen-xl max-h-36 flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" id="logo"
                class="relative text-[25px] text-[#212A3E] no-underline font-semibold hover:no-underline flex items-center
                before:absolute before:top-0 before:right-0 before:w-full before:h-auto before:bg-[#9DB2BF] hover:text-[#9BA4B5]
                self-center whitespace-nowrap dark:text-white">
                HienNguyen.
            </a>
            <div class="flex md:order-2">
                @if (session('username'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: '<span class="swal2-title">Signed in successfully</span>'
                        })
                    </script>
                    @if (Session::has('logoutcustomer'))
                        <div class="alert alert-success">
                            {{ Session::get('logoutcustomer') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('logoutcustomer') }}">
                        @csrf
                        <button class="hidden box-logout" type="submit">Log Out</button>
                    </form>
                    <style>
                        .box-login {
                            display: none;
                        }

                        .box-logout {
                            display: inline-block;
                        }

                        /* Hide the dropdown */
                        .dropdown-content {
                            display: none;
                            position: absolute;
                            z-index: 1;
                        }

                        .dropdown:hover .dropdown-content {
                            display: block;
                        }
                    </style>
                @else
                    <a href="{{ route('frontendlogin') }}">
                        <div>
                            <button
                                class="box-login
                                 px-4 py-2
                                 mr-3 md:mr-0">
                                Login
                            </button>
                        </div>
                    </a>
                @endif
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border-0 rounded-lg bg-transparent md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-[#f1f6f9] dark:bg-[#f1f6f9] md:dark:bg-[#f1f6f9] dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-[#F55050] text-[17px] no-underline font-medium bg-blue-700 rounded md:bg-transparent md:text-[#212A3E] md:p-0 md:dark:text-[#212A3E]
                                hover:text-[#9BA4B5] hover:no-underline"
                            aria-current="page">Home</a>
                    </li>
                    {{-- <a href="{{ route('aboutus') }}"
                class="text-[17px] text-[#212A3E] no-underline font-medium ml-[35px] hover:text-[#9BA4B5] hover:no-underline">About
                Us</a> --}}
                    <li>
                        <a href="{{ route('aboutus') }}"
                            class="block py-2 pl-3 pr-4 text-[#212A3E] text-[17px] no-underline rounded hover:bg-gray-100 md:hover:bg-transparent
                            md:hover:text-[#9BA4B5] md:p-0 md:dark:hover:text-[#9BA4B5] dark:text-white dark:hover:bg-gray-700
                            dark:hover:text-[#9BA4B5] md:dark:hover:bg-transparent dark:border-gray-700">About
                            Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news') }}"
                            class="block py-2 pl-3 pr-4 text-[#212A3E] text-[17px] no-underline rounded hover:bg-gray-100 md:hover:bg-transparent
                        md:hover:text-[#9BA4B5] md:p-0 md:dark:hover:text-[#9BA4B5] dark:text-white dark:hover:bg-gray-700
                        dark:hover:text-[#9BA4B5] md:dark:hover:bg-transparent dark:border-gray-700">News
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('addtocart') }}"
                            class="block py-2 pl-3 pr-4 text-[#212A3E] text-[17px] no-underline rounded hover:bg-gray-100 md:hover:bg-transparent
                        md:hover:text-[#9BA4B5] md:p-0 md:dark:hover:text-[#9BA4B5] dark:text-white dark:hover:bg-gray-700
                        dark:hover:text-[#9BA4B5] md:dark:hover:bg-transparent dark:border-gray-700">Cart
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <section class="flex h-[100vh] items-center py-0 px-[10%] bg-center" id="home">
        <div class="w-[600px]" id="home-content">
            <h1 class=" relative text-[56px] font-bold leading-[1.2]
            before:absolute before:top-0 before:right-0 before:w-full before:h-full before:bg-[#F1F6F9]
            "
                id="animate-charcter">
                Hien Nguyen Motobike-Part Store</h1>
            <h3 class=" relative text-[32px] font-bold text-[#394867]
            before:absolute before:top-0 before:right-0 before:w-full before:h-full before:bg-[#F1F6F9]"
                id="h3">
                E-commerce Website</h3>
            <p class=" relative text-[20px] mt-[20px] ml-0 mr-0 mb-[30px]
            before:absolute before:top-0 before:right-0 before:w-full before:h-full before:bg-[#F1F6F9]"
                id="vanban">
                Behind the wheel is a whole family, drive safely!</p>
            <div class=" flex justify-between w-[345px] h-[50px] relative
            before:absolute before:top-0 before:right-0 before:w-full before:h-full before:bg-[#F1F6F9] before:z-[2]"
                id="btn-box">
                {{-- <a href="#"
                    class=" relative inline-flex w-[150px] h-[100%] bg-[#9BA4B5] border-2 border-solid border-[#00abf0]
                    rounded-[8px] text-[16px] text-[#212A3E] no-underline font-semibold
                    tracking-[1px] justify-center items-center z-[1] overflow-hidden
                    before:absolute before:top-0 before:left-0 before:w-0 before:h-[100%] before:bg-[#F1F6F9] before:z-[-1]
                    hover:no-underline hover:before:w-[100%] hover:text-[#00abf0]
                    ">Contact</a>
                <a href="#"
                    class=" relative inline-flex w-[150px] h-[100%] bg-[#00abf0] border-2 border-solid border-[#00abf0]
                    rounded-[8px] text-[16px] text-[#081b29] no-underline font-semibold
                    tracking-[1px] justify-center items-center z-[1] overflow-hidden
                    before:absolute before:top-0 before:left-0 before:w-0 before:h-[100%] before:bg-[#F1F6F9] before:z-[-1]
                    hover:no-underline hover:before:w-[100%] hover:text-[#00abf0]">
                    Check
                </a> --}}
                <div class="twobutton">
                    <button
                        class="relative inline-flex w-[150px] h-[100%] justify-center items-center overflow-hidden z-[1]
                    before:absolute before:top-0 before:left-0 before:w-0 before:h-[100%] before:z-[-1]
                    hover:before:w-[100%]
                    border-none rounded-[20px] font-bold tracking-[0.05em] p-0">
                        <span
                            class="inline-block py-[15px] px-[35px] text-[17px] rounded-[20px] bg-[#ffffff10] h-full w-full font-medium">CONTACT</span>
                    </button>
                    <button
                        class="ml-[20px] relative inline-flex w-[150px] h-[100%] justify-center items-center overflow-hidden z-[1]
                    before:absolute before:top-0 before:left-0 before:w-0 before:h-[100%] before:z-[-1]
                    hover:before:w-[100%]
                    border-none rounded-[20px] font-bold tracking-[0.05em] p-0"
                        id="header_button_right">
                        <span
                            class="inline-block py-[15px] px-[35px] text-[17px] rounded-[20px] bg-[#ffffff10] h-full w-full ">CHECK</span>
                    </button>
                </div>
                <section class="trial-block shadow3" id="ContactUs">
                    <div class="height450">
                        <div class="social-overlap process-scetion mt100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10" id="header_hidden">
                                        <div class="social-bar">
                                            <div class="social-icons mb-3 iconpad text-center">


                                                <a class="slider-nav-item"><i class="fab fa-facebook"></i></a>
                                                <a class="slider-nav-item"><i class="fab fa-google-plus"></i></a>
                                                <a class="slider-nav-item"><i class="fab fa-twitter"></i></a>
                                                <a href="https://www.youtube.com/watch?v=_XiOcsj3oNI&t=50s"
                                                    target="_blank" class="slider-nav-item"><i
                                                        class="fab fa-instagram"></i></a>
                                                <a href="https://www.youtube.com/watch?v=_XiOcsj3oNI&t=50s"
                                                    target="_blank" class="slider-nav-item"><i
                                                        class="fab fa-linkedin"></i></a>
                                                <a target="_blank" class="slider-nav-item"><i
                                                        class="fab fa-pinterest"></i></a>
                                                <a href="https://www.youtube.com/watch?v=_XiOcsj3oNI&t=50s"
                                                    target="_blank" class="slider-nav-item"><i
                                                        class="fab fa-skype"></i></a>
                                                <a href="#" class="slider-nav-item"><i
                                                        class="fab fa-youtube"></i></a>
                                                <a href="#" class="behance slider-nav-item"><i
                                                        class="fab fa-behance"></i></a>
                                                <a href="https://www.youtube.com/watch?v=_XiOcsj3oNI&t=50s"
                                                    target="_blank" class="slider-nav-item"><i
                                                        class="fab fa-dribbble"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- <div class="flex">
            <a class="w-[80px] h-[80px] text-center text-[#000] my-0 mx-[30px] rounded-[50%] relative overflow-hidden " href="https://www.facebook.com/thanhtai.vo.14473">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="">
                <ion-icon name="logo-github"></ion-icon>
            </a>
            <a href="">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a>
        </div> --}}
        {{-- <div class=" flex justify-between absolute bottom-[40px] w-[170px]
        before:absolute before:top-0 before:right-0 before:w-full before:h-full before:bg-[#F1F6F9] before:z-[2]"
            id="home-sci">
            <a href="#"
                class="mb-[80px] relative inline-flex justify-center items-center w-[40px] h-[40px]
            bg-transparent border-[2px] border-solid border-[#00abf0] rounded-[50%] z-[1]
            text-[20px] text-[#00abf0] no-underline
            before:absolute before:top-0 before:left-0 before:w-0
            before:h-full before:bg-[#00abf0] before:no-underline before:z-[-1]
            hover:before:w-full hover:text-[#081b29] hover:no-underline"><i
                    class='bx bxl-facebook-square'></i></a>
            <a href="#"
                class="  relative inline-flex justify-center items-center w-[40px] h-[40px]
            bg-transparent border-[2px] border-solid border-[#00abf0] rounded-[50%] z-[1]
            text-[20px] text-[#00abf0] no-underline
            before:absolute before:top-0 before:left-0 before:w-0
            before:h-full before:bg-[#00abf0] before:no-underline before:z-[-1]
            hover:before:w-full hover:text-[#081b29] hover:no-underline"><i
                    class='bx bxl-instagram'></i></a>
            <a href="#"
                class=" relative inline-flex justify-center items-center w-[40px] h-[40px]
            bg-transparent border-[2px] border-solid border-[#00abf0] rounded-[50%] z-[1]
            text-[20px] text-[#00abf0] no-underline
            before:absolute before:top-0 before:left-0 before:w-0
            before:h-full before:bg-[#00abf0] before:no-underline before:z-[-1]
            hover:before:w-full hover:text-[#081b29] hover:no-underline"><i
                    class='bx bxl-github'></i></a>

        </div> --}}

        {{-- <span class="absolute top-0 right-[30px] w-[750px] h-full bg-transparent hover:bg-[#081b29] hover:opacity-[.8]"
            id="home-imgHover"></span> --}}
        {{-- <span class="w-fit h-auto inline-block relative home-imghover">
            <img src="https://cdn.dribbble.com/users/2007883/screenshots/10783414/media/75719a71920f14473123e36dda5af116.jpg?compress=1&resize=1000x750&vertical=top" alt=""
            style="border-radius: 50% ; max-width: 100% ; width: 535px; height: 500px;z-index: -10; background: transparent; margin-left: 30px;transition: transform 0.5s, opacity 0.5s;">
        </span> --}}
        <div class="box_img">
            <img
                src="https://cdn.dribbble.com/users/2007883/screenshots/10783414/media/75719a71920f14473123e36dda5af116.jpg?compress=1&resize=1000x750&vertical=top">
        </div>

    </section>
</body>
<script>
    const nav = document.querySelector('nav');
    const scrollTopThreshold = 0;

    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY;
        if (scrollTop > scrollTopThreshold) {
            nav.classList.add('bg-[#9DB2BF]');
        } else {
            nav.classList.remove('bg-transparent');
        }
    });

    const ul = document.querySelector('ul');
    const ulscrollTopThreshold = 0;

    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY;
        if (scrollTop > ulscrollTopThreshold) {
            ul.classList.add('md:bg-[#9DB2BF]');
        } else {
            ul.classList.remove('md:bg-[#f1f6f9]');
        }
    });

    window.addEventListener('scroll', function() {
        if (window.scrollY <= 0) {
            nav.classList.remove('bg-[#9DB2BF]');
        }
    });

    window.addEventListener('scroll', function() {
        if (window.scrollY <= 0) {
            ul.classList.remove('bg-[#9DB2BF]');
        }
    });

    // Check the scroll position on page load and set the navbar color accordingly
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTop = window.scrollY;
        if (scrollTop > scrollTopThreshold) {
            nav.classList.add('bg-[#9DB2BF]');
        }
        if (scrollTop > ulscrollTopThreshold) {
            ul.classList.add('md:bg-[#9DB2BF]');
        }
    });
</script>

</html>

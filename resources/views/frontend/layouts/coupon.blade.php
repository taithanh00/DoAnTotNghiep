@vite('resources/views/frontend/layouts/css/dist/css-main/coupon.css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
    #message {
        position: fixed;
        width: 100%;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    #message.show {
        opacity: 1;
    }
    #message1 {
        position: fixed;
        width: 100%;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    #message1.show {
        opacity: 1;
    }
    #message2 {
        position: fixed;
        width: 100%;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    #message2.show {
        opacity: 1;
    }
    #message p {
        postion: absolute;
        top: 0;
        left: 10%;
    }
</style>

<body>
    <div class="coupon-main">
        <div class="coupon-main-left" data-aos="zoom-out-right" data-aos-delay="500" data-aos-once="true">
            <div class="coupon-gift">
                <div class="coupon float-left ml-[7em] mt-5" id="coupon-ml1">
                    <div class="coupon-left">
                        <div>Enjoy Your Gift</div>
                    </div>
                    <div class="coupon-center">
                        <div>
                            <h2>25% OFF</h2>
                            <h3>Coupon</h3>
                            <small>Valid until May, 2023</small>
                        </div>
                    </div>

                    <div class="coupon-right">
                        <div onclick="copyText(this)" class="cursor-pointer">10%</div>
                    </div>
                    <div id="message"></div>
                </div>
                <div class="coupon float-right mr-5 my-5">
                    <div class="coupon-left">
                        <div>Enjoy Your Gift</div>
                    </div>
                    <div class="coupon-center">
                        <div>
                            <h2>50% OFF</h2>
                            <h3>Coupon</h3>
                            <small>Valid until October, 2023</small>
                        </div>
                    </div>

                    <div class="coupon-right">
                        <div onclick="copyText2(this)" class="cursor-pointer">20%</div>
                    </div>
                    <div id="message1"></div>
                </div>
                <div class="coupon float-left ml-5 mt-5" id="coupon-ml2">
                    <div class="coupon-left">
                        <div>Enjoy Your Gift</div>
                    </div>
                    <div class="coupon-center">
                        <div>
                            <h2>75% OFF</h2>
                            <h3>Coupon</h3>
                            <small>Valid until September, 2023</small>
                        </div>
                    </div>

                    <div class="coupon-right">
                        <div onclick="copyText3(this)" class="cursor-pointer">50%</div>
                    </div>
                    <div id="message2"></div>
                </div>
            </div>
        </div>
        <div class="coupon-main-right" data-aos="zoom-out-left" data-aos-delay="500" data-aos-once="true">
            <h4 class="coupon-title">
                <span class="title-word title-word-1">Coupon</span>
                <span class="title-word title-word-2">For</span>
                <span class="title-word title-word-3">Customer</span>
                <span class="title-word title-word-4">!</span>
            </h4>
            <div class="coupon-gif">
                {{-- <img src="https://cdn.dribbble.com/users/7204364/screenshots/15273921/media/472e188ddf715e8c1ff3892e69a989ad.gif" alt="">
                 --}}
                <video width="100%" height="100%" autoplay muted loop>
                    <source
                        src="https://cdn.dribbble.com/users/485324/screenshots/16083496/media/d5fdc49a78396b5e88931b59b674d5a2.mp4"
                        type="video/mp4" class="rounded-[10px]">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // JavaScript
        function copyText(element) {
            // Lấy nội dung của phần tử được click, tạo một phần tử div để hiển thị thông báo
            var text = element.innerText;
            var message1 = document.getElementById("message");

            // Tạo một thẻ input và gán giá trị của nó là nội dung cần sao chép
            var input = document.createElement("input");
            input.setAttribute("value", text);

            // Thêm thẻ input vào body và chọn nó
            document.body.appendChild(input);
            input.select();

            // Thực hiện phương thức sao chép
            document.execCommand("copy");

            // Xóa thẻ input
            document.body.removeChild(input);

            // Thay đổi nội dung và hiển thị phần tử div để hiển thị thông báo

            message1.innerHTML = "<p>Copied Successfully</p>";
            message1.classList.add("show");

            // Sau 3 giây, ẩn phần tử div thông báo
            setTimeout(function() {
                message1.classList.remove("show");
            }, 3000);
        }
        function copyText2(element) {
            // Lấy nội dung của phần tử được click, tạo một phần tử div để hiển thị thông báo
            var text = element.innerText;
            var message2 = document.getElementById("message1");

            // Tạo một thẻ input và gán giá trị của nó là nội dung cần sao chép
            var input = document.createElement("input");
            input.setAttribute("value", text);

            // Thêm thẻ input vào body và chọn nó
            document.body.appendChild(input);
            input.select();

            // Thực hiện phương thức sao chép
            document.execCommand("copy");

            // Xóa thẻ input
            document.body.removeChild(input);

            // Thay đổi nội dung và hiển thị phần tử div để hiển thị thông báo

            message2.innerHTML = "<p>Copied Successfully</p>";
            message2.classList.add("show");

            // Sau 3 giây, ẩn phần tử div thông báo
            setTimeout(function() {
                message1.classList.remove("show");
            }, 3000);
        }
        function copyText3(element) {
            // Lấy nội dung của phần tử được click, tạo một phần tử div để hiển thị thông báo
            var text = element.innerText;
            var message3 = document.getElementById("message2");

            // Tạo một thẻ input và gán giá trị của nó là nội dung cần sao chép
            var input = document.createElement("input");
            input.setAttribute("value", text);

            // Thêm thẻ input vào body và chọn nó
            document.body.appendChild(input);
            input.select();

            // Thực hiện phương thức sao chép
            document.execCommand("copy");

            // Xóa thẻ input
            document.body.removeChild(input);

            // Thay đổi nội dung và hiển thị phần tử div để hiển thị thông báo

            message3.innerHTML = "<p>Copied Successfully</p>";
            message3.classList.add("show");

            // Sau 3 giây, ẩn phần tử div thông báo
            setTimeout(function() {
                message3.classList.remove("show");
            }, 3000);
        }
    </script>
</body>

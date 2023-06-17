@vite('resources/views/frontend/layouts/css/dist/css-main/best-solution.css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<body>
    <div class="tong bg-[#f1f6f9]">
        <div class="best-solution-h2" data-aos="zoom-in" data-aos-delay="500" data-aos-once="true">
            <h2 id="solution-h2" class="rainbow-text">Why
                Should You Choose The HienNguyen Store?<h2>
        </div>
        <div class="main bg-[#f1f6f9]" data-aos="zoom-in" data-aos-delay="700" data-aos-once="true">
            <div id="slide">
                <div class="item"
                    style="background-image: url(https://business.yellowjersey.co.uk/wp-content/uploads/2018/01/mobile-bicycle-mechanic-insurance.jpg);
                            background-repeat: no-repeat; object-fit: cover;">
                    <div class="content">
                        <div class="name">Genuine accessories</div>
                        <div class="des">HienNguyen commits to using genuine spare parts imported directly from the
                            manufacturer's factory at the clearest and most transparent listed price
                        </div>
                        <button><span class="solu-box"> See more</span></button>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(https://img.freepik.com/free-photo/red-hair-bearded-mechanic-removing-bicycle-rear-cassette-workshop_613910-12608.jpg);
                            background-repeat: no-repeat; object-fit: cover;">
                    <div class="content">
                        <div class="name">Highly skilled repair staff</div>
                        <div class="des">All employees working at the store are ensured of their professional quality
                            through careful and meticulous screening before officially being recruited to work at the
                            store
                        </div>
                        <button><span class="solu-box"> See more</span></button>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(https://media.istockphoto.com/id/614415432/photo/this-bike-will-be-perfect.jpg?s=612x612&w=0&k=20&c=ocm2We_PX3gWAz5UtdHlC2Ns5L43_A-OAK2a1jtnBV0=);
                            background-repeat: no-repeat; object-fit: cover;">
                    <div class="content">
                        <div class="name">Reasonable pricing</div>
                        <div class="des">When claiming warranty at HienNguyen, customers can accurately know the cost
                            as the pricing list is clearly and transparently posted
                        </div>
                        <button><span class="solu-box"> See more</span></button>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(https://www.dakotastorage.com/hs-fs/hubfs/Blog_Images/5TipsForCreatingACustomMotorcycleShopAtYourHouse.jpg?width=1008&name=5TipsForCreatingACustomMotorcycleShopAtYourHouse.jpg);
                            background-repeat: no-repeat; object-fit: cover;">
                    <div class="content">
                        <div class="name">Modern system of machinery and equipment</div>
                        <div class="des">"HienNguyen is built based on the standards of a large and reputable agency.
                            The infrastructure and modern system of machinery and equipment are major reasons for you to
                            make the right choice.
                        </div>
                        <button><span class="solu-box"> See more</span></button>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(https://images.squarespace-cdn.com/content/v1/54cfeb52e4b0bd73446f3e65/1426189292494-Y3D5NKX27X52M754GV4D/IMG_1296.jpg?format=2500w);
                            background-repeat: no-repeat;  object-fit: cover;">
                    <div class="content">
                        <div class="name">Service and Customer Care Regime</div>
                        <div class="des">There will be a waiting area for customers with full amenities, spacious,
                            and beautiful space. In addition, the store also serves refreshments such as coffee, drinks
                            completely free of charge.
                        </div>
                        <button><span class="solu-box"> See more</span></button>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url(https://thumbs.dreamstime.com/b/low-angle-man-polishing-classic-vintage-motorcycle-garage-workshop-man-polish-motorcycle-garage-163761363.jpg);
                            background-repeat: no-repeat;  object-fit: cover;">
                    <div class="content">
                        <div class="name">Warranty Policy</div>
                        <div class="des">"Each product is warranted at the store for a period of 1 year. Defective
                            products will be refunded 100% if customers accidentally purchase them.
                        </div>
                        <button id="solu-btn"><span class="solu-box"> See more</span></button>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                <button id="next"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.getElementById('next').onclick = function() {
            let lists = document.querySelectorAll('.item');
            document.getElementById('slide').appendChild(lists[0]);
        }
        document.getElementById('prev').onclick = function() {
            let lists = document.querySelectorAll('.item');
            document.getElementById('slide').prepend(lists[lists.length - 1]);
        }
    </script>
</body>

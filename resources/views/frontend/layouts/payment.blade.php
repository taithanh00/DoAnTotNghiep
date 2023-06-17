<style>
    @import url('reset.css');
    @import url('https://fontlibrary.org/face/bebusneuebold');
    @import url('https://rsms.me/inter/inter.css');

    /**
 * General layout
 */
    html {
        font-family: 'Inter', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "BebasNeueBold", sans-serif;
        font-weight: normal;
    }

    .wrapper {
        padding: 0 20px;

    }
    .grid {
        display: grid;
        grid-column-gap: 10px;
    }

    .top-menu-wrap.grid {
        grid-template-columns: 3fr 9fr;
    }

    .story .video {
        width: 100%;
    }

    .story .video video {
        width: 100%;
    }

    .story,
    .contact {
        padding: 60px 0;
    }

    .contact.grid {}

    .contact-background {
        background: rgba(0, 0, 0, 0.05);
        margin-top: 10rem;
    }

    .masthead h2 {
        text-align: center;
        font-size: 75px;
    }

    .masthead h2 {
        margin: 40px auto;
    }

    .masthead img {
        width: 100%;
    }

    .contact.grid {
        grid-template-columns: 1fr 1fr;
    }

    .place-order p {
        max-width: 80%;
    }

    .order-form {
        background: #fff;
        padding: 20px;
    }

    .order-form .form-group,
    .order-form .form-group-radio {
        display: block;
        margin-bottom: 20px;
    }

    .order-form .form-group label,
    .order-form .form-group-radio label.radio-label {
        display: block;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .order-form .form-group-radio input+label {
        font-weight: normal;
    }

    .order-form .form-group input,
    .order-form .form-group textarea,
    .order-form .form-group select {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-[#f1f6f9] overflow-x-hidden">
    <main class="w-screen h-full bg-[#f1f6f9]">
        <div class="wrapper max-w-[850px] m-auto">
            <div class="masthead">
                <h2>Welcome to HienNguyen Order</h2>
                <img id="header_image"
                    src="https://static.dstore.global/7713/news/2021/01/22/lam-sao-de-order-mat-hang-nuoc-ngoai-de-kinh-doanh-dstore.global-14-1611292835.png">
            </div>
        </div>
        <div class="contact-background">
            <div class="wrapper max-w-[850px] m-auto">


                <div class="contact grid">
                    <div class="place-order">
                        <h3 class="text-[64px]">Place your order</h3>
                        <p>Please kindly provide us with your information below, and we will promptly send your order to
                            you. We appreciate your life and wish you the best of luck. Thank you for choosing our
                            services!</p>
                    </div>
                    <div class="order-form">
                        <form action="{{ route('payment2') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Tai" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Vo Thanh" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="taithanh421@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="What's your location?" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="0383347587" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Say something about your order to us delivers" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-fit h-auto bg-green-300 hover:bg-green-600 " value="Place order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

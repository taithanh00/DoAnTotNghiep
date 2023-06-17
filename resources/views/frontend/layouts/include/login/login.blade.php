<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite('resources/views/frontend/layouts/css/dist/css-main/login-register.css')

</head>

<body>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('frontendregister') }}" method="post" id="register-form">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-google"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </div>
                <span>or use your email for registration</span>
                {{-- <input type="hidden" placeholder="Name" id="register-username" name="register-username" required />
                <input type="hidden" placeholder="Email" id="register-email" name="register-email" required />
                <input type="hidden" placeholder="Password" id="register-password" name="register-password" required /> --}}
                <input type="text" placeholder="Name" id="register_username" name="register_username" required />
                <input type="email" placeholder="Email" id="register_email" name="register_email" required />
                <input type="password" placeholder="Password" id="register_password" name="register_password"
                    required />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('frontendlogin') }}" method="post" id="login-form">
                @csrf
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-google"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </div>
                <span>or use your account</span>
                <input type="hidden" placeholder="Email" id="username" name="username" required />
                <input type="hidden" placeholder="Password" id="password" name="password" required />
                <input type="email" placeholder="Email" id="username" name="username" required />
                <input type="password" placeholder="Password" id="password" name="password" required />
                <a href="{{ route('nexmo') }}">Forgot your password?</a>
                <button>Sign In</button>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>

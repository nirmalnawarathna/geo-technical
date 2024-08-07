<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 100vh;
            background-image: url('./image/Fb-Cover_5.jpg');
            background-size: cover;
            padding-right: 10%;
        }

        .login-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header header {
            color: #000;
            font-size: 24px;
            font-weight: 600;
            text-align: left;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box.row {
            display: flex;
            gap: 10px;
        }

        .input-field {
            width: 100%;
            height: 40px;
            font-size: 14px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
        }

        .input-field::placeholder {
            font-weight: 500;
            color: #aaa;
        }

        .input-field.full-width {
            width: 100%;
        }

        .input-field.half-width {
            width: calc(50% - 10px);
        }

        .submit-btn {
            width: 100%;
            height: 45px;
            background: #2B2D42;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #3B3D52;
        }

        .sign-up-link {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .sign-up-link a {
            color: #2B2D42;
            font-weight: 600;
            text-decoration: none;
        }

        .sign-up-link a:hover {
            text-decoration: underline;
        }

        .or-separator {
            text-align: center;
            color: #565D6D;
            font-size: 14px;
            margin: 20px 0;
        }

        .divider {
            border-top: 1px solid #DEE1E6;
            margin: 10px 0;
        }

        .top-left-image {
            position: absolute;
            top: 0;
            left: 0;
            margin: 20px;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        @media all and (max-width: 767px) {
            .login-box{
                width: 338px;
                padding: 14px;
            }
        }
    </style>
    <title>Sign Up</title>
</head>

<body>

    <img src="image/geo.png" alt="" width="200px" height="auto" class="top-left-image">

    <div class="login-box">
        <div class="login-header">
            <header>Begin your journey</header>
        </div>
        <form method="POST" action="{{ route('storeclient') }}" id="signup-form">
            @csrf
            <div class="input-box row">
                <input type="text" name="first_name" id="first_name" class="input-field half-width" placeholder="First Name" required />
                <input type="text" class="input-field half-width" id="contactno" name="contactno" value="+61 " title="Format: +61 4XX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
            </div>
            <div class="input-box">
                <input name="email" id="email" class="input-field full-width" placeholder="Email" required />
            </div>
            <div class="input-box row">
                <div class="password-container half-width">
                    <input type="password" name="password" id="password" class="input-field" placeholder="Password" required />
                    <span class="password-toggle">👁️</span>
                </div>
                <div class="password-container half-width">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" placeholder="Confirm Password" required />
                    <span class="password-toggle">👁️</span>
                </div>
            </div>

            @if (session('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}'
                });
            </script>
            @endif

            @if ($errors->any())
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ $errors->first() }}'
                    });
                </script>
            @endif

            <div class="input-box">
                <button type="submit" class="submit-btn">Sign Up</button>
            </div>
            <div class="or-separator">OR</div>
            <div class="sign-up-link">
                Returning user? <a href="{{ route('login') }}">Log in here</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const input = toggle.previousElementSibling;
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });

        document.getElementById('signup-form').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Passwords do not match!'
                });
            }
        });
    </script>

<script>
    function validateMobileNumber() {
        const input = document.getElementById('contactno');
        const prefix = '+61 ';
        
        if (input.value.length < prefix.length) {
            input.value = prefix;
        }

        // Ensure the prefix remains intact
        if (!input.value.startsWith(prefix)) {
            input.value = prefix;
        }

        // Allow partial matching to facilitate typing
        const numberPattern = /^\+61 4\d{0,2} ?\d{0,3}? ?\d{0,3}?$/;
        if (!numberPattern.test(input.value) && input.value.length > prefix.length) {
            input.value = input.value.slice(0, -1);
        }
    }

    function ensurePrefix() {
        const input = document.getElementById('contactno');
        const prefix = '+61 ';
        
        if (!input.value.startsWith(prefix)) {
            input.value = prefix;
        }
    }
</script>
</body>

</html>
